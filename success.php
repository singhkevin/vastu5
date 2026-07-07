<!DOCTYPE html>
<?php
if (parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) === '/success.php') {
    header('Location: /success/', true, 301);
    exit;
}
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Message Sent</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Meta Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1725660742080649');
  fbq('track', 'PageView');
  fbq('track', 'Lead');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1725660742080649&ev=Lead&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

<style>
    body {
        background: #f8f9fa;
    }
    .success-box {
        max-width: 500px;
        margin: 100px auto;
        padding: 40px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        text-align: center;
    }
    .countdown {
        font-size: 32px;
        font-weight: bold;
        color: #198754;
    }
</style>
</head>

<body>

<div class="success-box">
    <h2 class="text-success mb-3">✅ Message Sent Successfully</h2>
    <p>Thank you for contacting us. We’ll get back to you soon.</p>
    <p>Redirecting to home page in</p>
    <div class="countdown" id="counter">3</div>
</div>

<script>
let count = 3;
let counter = document.getElementById("counter");

let timer = setInterval(function () {
    count--;
    counter.textContent = count;

    if (count === 0) {
        clearInterval(timer);
        window.location.href = "/";
    }
}, 1000);
</script>

</body>
</html>
