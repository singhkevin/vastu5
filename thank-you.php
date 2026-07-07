<?php
// thank-you.php - Post Consultation Submission
$page_title = 'Thank You | Vastu5';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/landing.css">
    
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
      fbq('track', 'Lead'); // Fires on load of this thank you page
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1725660742080649&ev=Lead&noscript=1"
    /></noscript> 
    <!-- End Meta Pixel Code -->

    <!-- Google tag (gtag.js) Event snippet for Conversion -->
    <!--
      <script async src="https://www.googletagmanager.com/gtag/js?id=AW-YOUR_GOOGLE_ADS_ID"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'AW-YOUR_GOOGLE_ADS_ID');
        
        gtag('event', 'conversion', {'send_to': 'AW-YOUR_GOOGLE_ADS_ID/YOUR_CONVERSION_LABEL'});
      </script>
    -->
</head>
<body>

    <main class="thank-you-container">
        <h1>Thank you — your details have been received.</h1>
        <p>I will personally review your answers and reach out within 24 hours to schedule your consultation.</p>
        
        <a href="https://wa.me/919316918385" target="_blank" class="whatsapp-btn">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.031 0C5.383 0 0 5.383 0 12.031C0 14.675 0.865 17.135 2.316 19.167L0.75 24L5.702 22.463C7.625 23.633 9.771 24.195 12.031 24.195C18.679 24.195 24.062 18.812 24.062 12.164C24.062 5.516 18.679 0 12.031 0ZM18.777 17.185C18.497 17.973 17.382 18.625 16.518 18.799C15.938 18.914 15.111 19.012 11.956 17.702C8.143 16.118 5.679 12.235 5.485 11.977C5.293 11.719 3.918 9.882 3.918 7.974C3.918 6.066 4.887 5.141 5.271 4.75C5.58 4.437 6.062 4.291 6.545 4.291C6.702 4.291 6.842 4.298 6.965 4.305C7.35 4.321 7.544 4.34 7.801 4.962C8.11 5.714 8.864 7.558 8.96 7.751C9.057 7.944 9.172 8.196 9.038 8.466C8.903 8.736 8.788 8.871 8.595 9.083C8.403 9.295 8.216 9.463 8.018 9.68C7.805 9.907 7.583 10.148 7.828 10.573C8.073 10.998 8.857 12.278 10.009 13.303C11.498 14.629 12.703 15.05 13.165 15.243C13.627 15.436 14.07 15.398 14.398 15.044C14.726 14.69 15.651 13.592 16.036 13.111C16.422 12.63 16.788 12.688 17.212 12.842C17.636 12.996 19.893 14.113 20.355 14.344C20.817 14.575 21.126 14.69 21.242 14.883C21.358 15.076 21.358 16.021 18.777 17.185Z"/>
            </svg>
            Chat on WhatsApp
        </a>
    </main>

</body>
</html>
