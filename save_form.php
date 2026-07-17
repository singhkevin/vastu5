<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /#contact');
    exit;
}

$firstName = trim((string) ($_POST['first_name'] ?? ''));
$lastName = trim((string) ($_POST['last_name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$subject = trim((string) ($_POST['subject'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));

$utmSource = trim((string) ($_POST['utm_source'] ?? ''));
$utmMedium = trim((string) ($_POST['utm_medium'] ?? ''));
$utmCampaign = trim((string) ($_POST['utm_campaign'] ?? ''));
$utmContent = trim((string) ($_POST['utm_content'] ?? ''));
$utmTerm = trim((string) ($_POST['utm_term'] ?? ''));

if ($firstName === '' || $lastName === '' || $subject === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: /#contact?status=error&reason=invalid');
    exit;
}

// ---------------------------------------------------------
// Send Email Notification (Fallback/Backup)
// ---------------------------------------------------------
$to = 'swikar.sethi@vastu5.com';
$mailSubject = 'New Contact Form Lead: ' . $subject;
$mailBody = "You have received a new lead from the contact form.\n\n";
$mailBody .= "Name: $firstName $lastName\n";
$mailBody .= "Email: $email\n";
$mailBody .= "Subject: $subject\n";
$mailBody .= "Message:\n$message\n";

if ($utmSource || $utmMedium || $utmCampaign || $utmContent || $utmTerm) {
    $mailBody .= "\n--- Tracking Info ---\n";
    $mailBody .= "Source: $utmSource | Medium: $utmMedium | Campaign: $utmCampaign";
    if ($utmContent || $utmTerm) {
        $mailBody .= " | Content: $utmContent | Term: $utmTerm";
    }
    $mailBody .= "\n";
}

$headers = "From: no-reply@vastu5.com\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Cc: kevin@viralinbound.com, ashutosh.c@viralinbound.com\r\n";

@mail($to, $mailSubject, $mailBody, $headers);
// ---------------------------------------------------------

$url = 'https://script.google.com/macros/s/AKfycbyirFh7_dRfeuxENVUGbi0iS5UbFWe20p3ZmPB6kAYQpCuSfqzdeEgzGrhsUk5Z9hdz/exec';
$data = [
    'first_name' => $firstName,
    'last_name' => $lastName,
    'email' => $email,
    'subject' => $subject,
    'message' => $message,
    'utm_source' => $utmSource,
    'utm_medium' => $utmMedium,
    'utm_campaign' => $utmCampaign,
    'utm_content' => $utmContent,
    'utm_term' => $utmTerm,
];

$payload = json_encode($data);
if ($payload === false) {
    header('Location: /#contact?status=error&reason=encoding');
    exit;
}

$ch = curl_init($url);
if ($ch === false) {
    header('Location: /#contact?status=error&reason=transport');
    exit;
}

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
    $logData = date('Y-m-d H:i:s') . " | Contact Webhook Error | " . json_encode($data) . "\n";
    @file_put_contents(__DIR__ . '/log/failed_leads.log', $logData, FILE_APPEND);
    
    header('Location: /#contact?status=error&reason=upstream');
    exit;
}

$result = json_decode((string) $response, true);
if (is_array($result) && ($result['status'] ?? '') === 'success') {
    header('Location: /success/');
    exit;
}

$logData = date('Y-m-d H:i:s') . " | Contact Webhook Error | " . json_encode($data) . "\n";
@file_put_contents(__DIR__ . '/log/failed_leads.log', $logData, FILE_APPEND);

header('Location: /#contact?status=error&reason=submit');
exit;
