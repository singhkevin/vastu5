<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /consultation.php');
    exit;
}

// 1. Collect required standard fields
$firstName = trim((string) ($_POST['first_name'] ?? ''));
$phone = trim((string) ($_POST['phone'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));

if ($firstName === '' || $phone === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: /consultation.php?status=error&reason=invalid_contact');
    exit;
}

// 2. Collect Qualification Questions
$q1 = trim((string) ($_POST['q1'] ?? ''));
$q2 = trim((string) ($_POST['q2'] ?? ''));
$q3 = trim((string) ($_POST['q3'] ?? ''));
$q4 = trim((string) ($_POST['q4'] ?? ''));
$q5 = trim((string) ($_POST['q5'] ?? ''));
$q6_city = trim((string) ($_POST['q6_city'] ?? ''));
$q6_country = trim((string) ($_POST['q6_country'] ?? ''));
$q6 = trim($q6_city . ' ' . $q6_country);
$q7 = trim((string) ($_POST['q7'] ?? ''));

// 3. Server-side validation (minimum 2 answers)
$answeredCount = 0;
if ($q1 !== '') $answeredCount++;
if ($q2 !== '') $answeredCount++;
if ($q3 !== '') $answeredCount++;
if ($q4 !== '') $answeredCount++;
if ($q5 !== '') $answeredCount++;
if ($q6 !== '') $answeredCount++;
if ($q7 !== '') $answeredCount++;

if ($answeredCount < 2) {
    header('Location: /consultation.php?status=error&reason=incomplete');
    exit;
}

// 4. Collect UTM Params
$utmSource = trim((string) ($_POST['utm_source'] ?? ''));
$utmMedium = trim((string) ($_POST['utm_medium'] ?? ''));
$utmCampaign = trim((string) ($_POST['utm_campaign'] ?? ''));

// 5. Format message for the existing Apps Script
$formattedMessage = "Phone: $phone\n\n--- Consultation Answers ---\n";
if ($q1) $formattedMessage .= "Q1 (Problem): $q1\n";
if ($q2) $formattedMessage .= "Q2 (Property Type): $q2\n";
if ($q3) $formattedMessage .= "Q3 (Biggest Issue): $q3\n";
if ($q4) $formattedMessage .= "Q4 (Duration): $q4\n";
if ($q5) $formattedMessage .= "Q5 (Previous Remedies): $q5\n";
if ($q6) $formattedMessage .= "Q6 (Location): $q6\n";
if ($q7) $formattedMessage .= "Q7 (Other Info): $q7\n";

if ($utmSource || $utmMedium || $utmCampaign) {
    $formattedMessage .= "\n--- Tracking Info ---\n";
    $formattedMessage .= "Source: $utmSource | Medium: $utmMedium | Campaign: $utmCampaign\n";
}

// ---------------------------------------------------------
// Send Email Notification (Fallback/Backup)
// ---------------------------------------------------------
$to = 'swikar.sethi@vastu5.com';
$mailSubject = 'New Consultation Lead: ' . $firstName;
$mailBody = "You have received a new consultation lead.\n\n";
$mailBody .= "Name: $firstName\n";
$mailBody .= "Email: $email\n";
$mailBody .= $formattedMessage;

$headers = "From: no-reply@vastu5.com\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Cc: kevin@viralinbound.com\r\n";

@mail($to, $mailSubject, $mailBody, $headers);
// ---------------------------------------------------------

// Prepare data for the existing webhook
$url = 'https://script.google.com/macros/s/AKfycbzIfadmRGiSwTSa9lirj9FyNSXeV6XXF7RygkrRwtDaAfFOdelLGhsoUR3CHXwJTzTMaw/exec';

// Send specific fields expected by script, plus all new ones in case script accepts dynamic fields
$data = [
    'first_name' => $firstName,
    'last_name' => $phone, // passing phone here so it doesn't get lost if script is strict
    'email' => $email,
    'subject' => 'New Consultation Lead (Landing Page)',
    'message' => $formattedMessage,
    
    // Pass raw data fields just in case the Apps script is updated later to read them
    'phone' => $phone,
    'q1' => $q1, 'q2' => $q2, 'q3' => $q3, 'q4' => $q4, 
    'q5' => $q5, 'q6_city' => $q6_city, 'q6_country' => $q6_country, 'q7' => $q7,
    'utm_source' => $utmSource, 'utm_medium' => $utmMedium, 'utm_campaign' => $utmCampaign
];

$payload = json_encode($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

$response = curl_exec($ch);
$httpCode = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
$curlErrno = curl_errno($ch);
curl_close($ch);

if ($curlErrno !== 0 || $response === false || $httpCode < 200 || $httpCode >= 300) {
    // If webhook fails, fallback to local log to ensure no lost paid leads
    $logData = date('Y-m-d H:i:s') . " | " . json_encode($data) . "\n";
    @file_put_contents(__DIR__ . '/log/failed_leads.log', $logData, FILE_APPEND);
    
    // Still send to thank you page so user experience isn't broken, 
    // since we saved it locally.
    header('Location: /thank-you.php');
    exit;
}

$result = json_decode((string) $response, true);
if (is_array($result) && ($result['status'] ?? '') === 'success') {
    header('Location: /thank-you.php');
    exit;
}

// Fallback save and redirect
$logData = date('Y-m-d H:i:s') . " | Webhook Error | " . json_encode($data) . "\n";
@file_put_contents(__DIR__ . '/log/failed_leads.log', $logData, FILE_APPEND);

header('Location: /thank-you.php');
exit;
