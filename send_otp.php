<?php
declare(strict_types=1);

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
    jsonError('Please enter a valid WhatsApp number first.');
}

// Rate limit: at most one send per 30 seconds per session
$lastSent = $_SESSION['otp_last_sent'] ?? 0;
if (time() - $lastSent < 30) {
    jsonError('Please wait a few seconds before requesting another code.', 429);
}

$otp = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);

$_SESSION['otp_code'] = $otp;
$_SESSION['otp_phone'] = $phone;
$_SESSION['otp_expires'] = time() + 600; // 10 minutes
$_SESSION['otp_last_sent'] = time();
$_SESSION['otp_verified_phone'] = null;

$payload = json_encode([
    'template_name' => WATI_OTP_TEMPLATE_NAME,
    'broadcast_name' => 'consultation_otp_' . time(),
    'parameters' => [
        ['name' => '1', 'value' => $otp],
    ],
]);

$url = rtrim(WATI_API_ENDPOINT, '/') . '/api/v1/sendTemplateMessage?whatsappNumber=' . urlencode($phone);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . WATI_API_TOKEN,
    'Content-Type: application/json',
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

$response = curl_exec($ch);
$httpCode = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
$curlErrno = curl_errno($ch);

if ($curlErrno !== 0 || $response === false || $httpCode < 200 || $httpCode >= 300) {
    jsonError('Could not send the verification code. Please check your number and try again.', 502);
}

$result = json_decode((string) $response, true);
if (is_array($result) && isset($result['result']) && $result['result'] === false) {
    jsonError($result['info'] ?? 'Could not send the verification code. Please try again.', 502);
}

echo json_encode(['status' => 'sent']);
