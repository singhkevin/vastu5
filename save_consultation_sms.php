<?php
declare(strict_types=1);

// save_consultation_sms.php - TEST VARIANT paired with consultation-sms.php.
// Same validation as save_consultation.php, but checks sms_otp_verified_phone
// and logs to a separate test file instead of the real lead webhook/email,
// so test submissions never mix with real leads.

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /consultation-sms.php');
    exit;
}

// 1. Verify math captcha (bot protection)
$captchaAnswer = trim((string) ($_POST['captcha_answer'] ?? ''));
$expectedCaptcha = $_SESSION['captcha_answer'] ?? null;
unset($_SESSION['captcha_answer']); // one-time use

if ($expectedCaptcha === null || !is_numeric($captchaAnswer) || (int) $captchaAnswer !== (int) $expectedCaptcha) {
    header('Location: /consultation-sms.php?status=error&reason=captcha');
    exit;
}

// 2. Collect required standard fields
$firstName = trim((string) ($_POST['first_name'] ?? ''));
$phone = trim((string) ($_POST['phone'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));

if (!preg_match("/^[A-Za-z\s'\-]{2,60}$/", $firstName)) {
    header('Location: /consultation-sms.php?status=error&reason=invalid_name');
    exit;
}

if (!preg_match('/^[0-9+()\s\-]{7,20}$/', $phone)) {
    header('Location: /consultation-sms.php?status=error&reason=invalid_phone');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: /consultation-sms.php?status=error&reason=invalid_contact');
    exit;
}

// 3. Require OTP-verified phone number (set by verify_otp_sms.php for this session)
$normalizedPhone = preg_replace('/\D/', '', $phone);
$verifiedPhone = $_SESSION['sms_otp_verified_phone'] ?? null;
if ($verifiedPhone === null || $verifiedPhone !== $normalizedPhone) {
    header('Location: /consultation-sms.php?status=error&reason=phone_not_verified');
    exit;
}
unset($_SESSION['sms_otp_verified_phone']); // one-time use per submission

// 4. Collect Qualification Questions
$q1 = trim((string) ($_POST['q1'] ?? ''));
$q2 = trim((string) ($_POST['q2'] ?? ''));
$q3 = trim((string) ($_POST['q3'] ?? ''));
$q4 = trim((string) ($_POST['q4'] ?? ''));
$q5 = trim((string) ($_POST['q5'] ?? ''));
$q6_city = trim((string) ($_POST['q6_city'] ?? ''));
$q6_country = trim((string) ($_POST['q6_country'] ?? ''));
$q6 = trim($q6_city . ' ' . $q6_country);
$q7 = trim((string) ($_POST['q7'] ?? ''));

// 5. Server-side validation (Q1, Q3, Q4, Q5 required; Q2, Q6, Q7 optional)
if ($q1 === '' || $q3 === '' || $q4 === '' || $q5 === '') {
    header('Location: /consultation-sms.php?status=error&reason=incomplete');
    exit;
}

// Q6 city/country: optional, but must look like place names if provided
if ($q6_city !== '' && !preg_match("/^[A-Za-z\s'\-]{2,50}$/", $q6_city)) {
    header('Location: /consultation-sms.php?status=error&reason=invalid_location');
    exit;
}
if ($q6_country !== '' && !preg_match("/^[A-Za-z\s'\-]{2,50}$/", $q6_country)) {
    header('Location: /consultation-sms.php?status=error&reason=invalid_location');
    exit;
}

// Log the test submission locally (no webhook/email — this is a test harness)
$logData = date('Y-m-d H:i:s') . " | " . json_encode([
    'first_name' => $firstName, 'phone' => $phone, 'email' => $email,
    'q1' => $q1, 'q2' => $q2, 'q3' => $q3, 'q4' => $q4,
    'q5' => $q5, 'q6_city' => $q6_city, 'q6_country' => $q6_country, 'q7' => $q7,
]) . "\n";
@file_put_contents(__DIR__ . '/log/sms_test_submissions.log', $logData, FILE_APPEND);

header('Location: /thank-you');
exit;
