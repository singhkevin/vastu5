<?php
declare(strict_types=1);

// verify_otp_sms.php - TEST VARIANT paired with send_otp_sms.php. Uses sms_otp_* session keys.

session_start();
header('Content-Type: application/json');

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
$phone = preg_replace('/\D/', '', $rawPhone);
$otp = trim((string) ($_POST['otp'] ?? ''));

$sessionPhone = $_SESSION['sms_otp_phone'] ?? null;
$sessionCode = $_SESSION['sms_otp_code'] ?? null;
$sessionExpires = $_SESSION['sms_otp_expires'] ?? 0;

if ($phone === '' || $otp === '' || $sessionCode === null) {
    jsonError('Please request a new code.');
}

if (time() > $sessionExpires) {
    unset($_SESSION['sms_otp_code'], $_SESSION['sms_otp_phone'], $_SESSION['sms_otp_expires']);
    jsonError('This code has expired. Please request a new one.');
}

if ($phone !== $sessionPhone || !hash_equals($sessionCode, $otp)) {
    jsonError('Incorrect code. Please check your SMS and try again.');
}

// Mark verified, clear the one-time code
$_SESSION['sms_otp_verified_phone'] = $phone;
unset($_SESSION['sms_otp_code'], $_SESSION['sms_otp_expires']);

echo json_encode(['status' => 'verified']);
