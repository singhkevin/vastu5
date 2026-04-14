<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $url = "https://script.google.com/macros/s/AKfycbzIfadmRGiSwTSa9lirj9FyNSXeV6XXF7RygkrRwtDaAfFOdelLGhsoUR3CHXwJTzTMaw/exec";

    $data = [
        "first_name" => $_POST['first_name'] ?? '',
        "last_name"  => $_POST['last_name'] ?? '',
        "email"      => $_POST['email'] ?? '',
        "subject"    => $_POST['subject'] ?? '',
        "message"    => $_POST['message'] ?? ''
    ];

    $payload = json_encode($data);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);

    if (isset($result['status']) && $result['status'] === 'success') {
        header("Location: success.php");
        exit;
    } else {
         header("Location: success.php");
        exit;
        echo "Something went wrong. Please try again.";
    }
}
?>
