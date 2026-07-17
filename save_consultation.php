<?php
declare(strict_types=1);

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /consultation');
    exit;
}

// 1. Collect required standard fields
$firstName = trim((string) ($_POST['first_name'] ?? ''));
$phone = trim((string) ($_POST['phone'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));

if (!preg_match("/^[A-Za-z\s'\-]{2,60}$/", $firstName)) {
    header('Location: /consultation?status=error&reason=invalid_name');
    exit;
}

if (!preg_match('/^[0-9+()\s\-]{7,20}$/', $phone)) {
    header('Location: /consultation?status=error&reason=invalid_phone');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: /consultation?status=error&reason=invalid_contact');
    exit;
}

// 2. Require OTP-verified phone number (set by verify_otp_sms.php for this session)
$normalizedPhone = preg_replace('/\D/', '', $phone);
$verifiedPhone = $_SESSION['sms_otp_verified_phone'] ?? null;
if ($verifiedPhone === null || $verifiedPhone !== $normalizedPhone) {
    header('Location: /consultation?status=error&reason=phone_not_verified');
    exit;
}
unset($_SESSION['sms_otp_verified_phone']); // one-time use per submission

// 3. Collect Qualification Questions
$q1 = trim((string) ($_POST['q1'] ?? ''));
$q2 = trim((string) ($_POST['q2'] ?? ''));
$q3 = trim((string) ($_POST['q3'] ?? ''));
$q4 = trim((string) ($_POST['q4'] ?? ''));
$q5 = trim((string) ($_POST['q5'] ?? ''));
$q6_city = trim((string) ($_POST['q6_city'] ?? ''));
$q6_country = trim((string) ($_POST['q6_country'] ?? ''));
$q6 = trim($q6_city . ' ' . $q6_country);
$q7 = trim((string) ($_POST['q7'] ?? ''));

// 4. Server-side validation (Q1, Q3, Q4, Q5, Q6 required; Q2, Q7 optional)
if ($q1 === '' || $q3 === '' || $q4 === '' || $q5 === '' || $q6_city === '' || $q6_country === '') {
    header('Location: /consultation?status=error&reason=incomplete');
    exit;
}

// Q7 (if answered) needs at least 20 characters
if ($q7 !== '' && mb_strlen($q7) < 20) {
    header('Location: /consultation?status=error&reason=too_short');
    exit;
}

// Q6 city/country: must look like place names
if (!preg_match("/^[A-Za-z\s'\-]{2,50}$/", $q6_city)) {
    header('Location: /consultation?status=error&reason=invalid_location');
    exit;
}
if (!preg_match("/^[A-Za-z\s'\-]{2,50}$/", $q6_country)) {
    header('Location: /consultation?status=error&reason=invalid_location');
    exit;
}

// 5. Collect UTM Params
$utmSource = trim((string) ($_POST['utm_source'] ?? ''));
$utmMedium = trim((string) ($_POST['utm_medium'] ?? ''));
$utmCampaign = trim((string) ($_POST['utm_campaign'] ?? ''));
$utmContent = trim((string) ($_POST['utm_content'] ?? ''));
$utmTerm = trim((string) ($_POST['utm_term'] ?? ''));

// 6. Format message for the existing Apps Script
$formattedMessage = "Phone: $phone\n\n--- Consultation Answers ---\n";
if ($q1) $formattedMessage .= "Q1 (Problem): $q1\n";
if ($q2) $formattedMessage .= "Q2 (Property Type): $q2\n";
if ($q3) $formattedMessage .= "Q3 (Biggest Issue): $q3\n";
if ($q4) $formattedMessage .= "Q4 (Duration): $q4\n";
if ($q5) $formattedMessage .= "Q5 (Previous Remedies): $q5\n";
if ($q6) $formattedMessage .= "Q6 (Location): $q6\n";
if ($q7) $formattedMessage .= "Q7 (Other Info): $q7\n";

if ($utmSource || $utmMedium || $utmCampaign || $utmContent || $utmTerm) {
    $formattedMessage .= "\n--- Tracking Info ---\n";
    $formattedMessage .= "Source: $utmSource | Medium: $utmMedium | Campaign: $utmCampaign";
    if ($utmContent || $utmTerm) {
        $formattedMessage .= " | Content: $utmContent | Term: $utmTerm";
    }
    $formattedMessage .= "\n";
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
$headers .= "Cc: kevin@viralinbound.com, ashutosh.c@viralinbound.com\r\n";

@mail($to, $mailSubject, $mailBody, $headers);
// ---------------------------------------------------------

// Prepare data for the existing webhook
$url = 'https://script.google.com/macros/s/AKfycbx01V3SV4J9ijjQPMdf58Bj7jLSuYB0GLvV3E9uTff8XVzi4AImpCqvBDeYAr9jndjL/exec';

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
    'utm_source' => $utmSource, 'utm_medium' => $utmMedium, 'utm_campaign' => $utmCampaign,
    'utm_content' => $utmContent, 'utm_term' => $utmTerm
];

$payload = json_encode($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
// Apps Script web apps answer POSTs with a 302 redirect to the JSON output,
// so the redirect must be followed to read the real response.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

$response = curl_exec($ch);
$httpCode = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
$curlErrno = curl_errno($ch);

if ($curlErrno !== 0 || $response === false || $httpCode < 200 || $httpCode >= 300) {
    // If webhook fails, fallback to local log to ensure no lost paid leads
    $logData = date('Y-m-d H:i:s') . " | " . json_encode($data) . "\n";
    @file_put_contents(__DIR__ . '/log/failed_leads.log', $logData, FILE_APPEND);
    
    // Still send to thank you page so user experience isn't broken, 
    // since we saved it locally.
    header('Location: /thank-you');
    exit;
}

$result = json_decode((string) $response, true);
if (is_array($result) && ($result['status'] ?? '') === 'success') {
    header('Location: /thank-you');
    exit;
}

// Fallback save and redirect
$logData = date('Y-m-d H:i:s') . " | Webhook Error | " . json_encode($data) . "\n";
@file_put_contents(__DIR__ . '/log/failed_leads.log', $logData, FILE_APPEND);

header('Location: /thank-you');
exit;
