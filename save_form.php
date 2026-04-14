<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php#contact');
    exit;
}

$firstName = trim((string) ($_POST['first_name'] ?? ''));
$lastName = trim((string) ($_POST['last_name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$subject = trim((string) ($_POST['subject'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));

if ($firstName === '' || $lastName === '' || $subject === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.php#contact?status=error&reason=invalid');
    exit;
}

$url = 'https://script.google.com/macros/s/AKfycbzIfadmRGiSwTSa9lirj9FyNSXeV6XXF7RygkrRwtDaAfFOdelLGhsoUR3CHXwJTzTMaw/exec';
$data = [
    'first_name' => $firstName,
    'last_name' => $lastName,
    'email' => $email,
    'subject' => $subject,
    'message' => $message,
];

$payload = json_encode($data);
if ($payload === false) {
    header('Location: index.php#contact?status=error&reason=encoding');
    exit;
}

$ch = curl_init($url);
if ($ch === false) {
    header('Location: index.php#contact?status=error&reason=transport');
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
    header('Location: index.php#contact?status=error&reason=upstream');
    exit;
}

$result = json_decode((string) $response, true);
if (is_array($result) && ($result['status'] ?? '') === 'success') {
    header('Location: success.php');
    exit;
}

header('Location: index.php#contact?status=error&reason=submit');
exit;
