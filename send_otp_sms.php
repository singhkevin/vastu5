<?php
declare(strict_types=1);

// send_otp_sms.php - TEST VARIANT: sends OTP via SMS using Brevo's Transactional SMS API.
// Uses sms_otp_* session keys (distinct from send_otp.php's otp_* keys) so this test
// page can't collide with the live WhatsApp OTP flow if both are open in one session.

session_start();
header('Content-Type: application/json');
require __DIR__ . '/config.php';

function jsonError(string $message, int $code = 400): void
{
    http_response_code($code);
    echo json_encode(['status' => 'error', 'message' => $message]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonError('Invalid request method.', 405);
}

$rawPhone = trim((string) ($_POST['phone'] ?? ''));
$phone = preg_replace('/\D/', '', $rawPhone); // digits only, e.g. 919876543210

if ($phone === '' || strlen($phone) < 8 || strlen($phone) > 15) {
    jsonError('Please enter a valid phone number first.');
}

// Rate limit: at most one send per 30 seconds per session
$lastSent = $_SESSION['sms_otp_last_sent'] ?? 0;
if (time() - $lastSent < 30) {
    jsonError('Please wait a few seconds before requesting another code.', 429);
}

$otp = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);

$_SESSION['sms_otp_code'] = $otp;
$_SESSION['sms_otp_phone'] = $phone;
$_SESSION['sms_otp_expires'] = time() + 600; // 10 minutes
$_SESSION['sms_otp_last_sent'] = time();
$_SESSION['sms_otp_verified_phone'] = null;

$payload = json_encode([
    'sender' => BREVO_SMS_SENDER,
    'recipient' => $phone,
    'content' => "$otp is your Vastu5 verification code. For your security, do not share this code.",
    'type' => 'transactional',
    'tag' => 'consultation-otp',
]);

$ch = curl_init('https://api.brevo.com/v3/transactionalSMS/sms');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'api-key: ' . BREVO_API_KEY,
    'Content-Type: application/json',
    'Accept: application/json',
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

$response = curl_exec($ch);
$httpCode = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
$curlErrno = curl_errno($ch);

if ($curlErrno !== 0 || $response === false || $httpCode < 200 || $httpCode >= 300) {
    $result = json_decode((string) $response, true);
    $detail = is_array($result) ? ($result['message'] ?? '') : '';
    jsonError('Could not send the verification code.' . ($detail ? " ($detail)" : ''), 502);
}

echo json_encode(['status' => 'sent']);
