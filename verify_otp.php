<?php
declare(strict_types=1);

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

$sessionPhone = $_SESSION['otp_phone'] ?? null;
$sessionCode = $_SESSION['otp_code'] ?? null;
$sessionExpires = $_SESSION['otp_expires'] ?? 0;

if ($phone === '' || $otp === '' || $sessionCode === null) {
    jsonError('Please request a new code.');
}

if (time() > $sessionExpires) {
    unset($_SESSION['otp_code'], $_SESSION['otp_phone'], $_SESSION['otp_expires']);
    jsonError('This code has expired. Please request a new one.');
}

if ($phone !== $sessionPhone || !hash_equals($sessionCode, $otp)) {
    jsonError('Incorrect code. Please check your WhatsApp and try again.');
}

// Mark verified, clear the one-time code
$_SESSION['otp_verified_phone'] = $phone;
unset($_SESSION['otp_code'], $_SESSION['otp_expires']);

echo json_encode(['status' => 'verified']);
