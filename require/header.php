<?php
$docTitle = $page_title ?? 'Vastu Consultant & Expert | Vastu for Home & Business | Vastu5';
$docDescription = $page_meta_description ?? 'Vastu consultant and vastu expert services for home and business by Swikar Sethi at Vastu5.';
$docCanonical = $page_canonical ?? 'https://vastu5.com/';
$docOgImage = $page_og_image ?? 'https://vastu5.com/images/new/new_banner_2.jpg';
$docOgType = $page_og_type ?? 'website';
$docJsonLd = $page_json_ld ?? json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'ProfessionalService',
    'name' => 'Vastu5',
    'url' => 'https://vastu5.com/',
    'telephone' => '+91-9316918385',
    'email' => 'swikar.sethi@vastu5.com',
    'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => 'Bengaluru',
        'addressRegion' => 'KA',
        'addressCountry' => 'IN',
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo htmlspecialchars($docTitle, ENT_QUOTES, 'UTF-8'); ?></title>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="description" content="<?php echo htmlspecialchars($docDescription, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="keywords" content="vastu consultant, vastu expert, vastu for home, business vastu, vastu remedies, astro vastu">
<meta name="author" content="Vastu5">
<meta name="MobileOptimized" content="320">
<link rel="canonical" href="<?php echo htmlspecialchars($docCanonical, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:type" content="<?php echo htmlspecialchars($docOgType, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:title" content="<?php echo htmlspecialchars($docTitle, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($docDescription, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($docCanonical, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:image" content="<?php echo htmlspecialchars($docOgImage, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($docTitle, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($docDescription, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="twitter:image" content="<?php echo htmlspecialchars($docOgImage, ENT_QUOTES, 'UTF-8'); ?>">
<script type="application/ld+json"><?php echo $docJsonLd; ?></script>
<!--Srart Style -->
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/fonts.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Favicon Link -->
<link rel="shortcut icon" type="image/png" href="images/header/favicon.ico">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
  new WOW().init();
</script>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1624167494576352');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1624167494576352&amp;ev=PageView&amp;noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
</head>
<body>
<!-- Header Start -->
<div class="ast_top_header" style="    background: linear-gradient(135deg, #ff6c29 0%, #FFCB79 40%, #FFF3B0 70%, #faea8e 100%);">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="ast_contact_details">
					<ul>
						<li><i class="fa fa-phone" aria-hidden="true"></i> 9316918385</li>
						<li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span class="__cf_email__" data-cfemail="ef9c9a9f9f809d9baf988a8d9c869b8ac18c8082">swikar.sethi@vastu5.com</span></a></li>
					</ul>
				</div>
				<div class="ast_autho_wrapper">
					<ul class="social_icons">
    <li>
    <a href="https://www.facebook.com/vastu5byswikarsethi" target="_blank" rel="noopener">
        <i class="fa fa-facebook"></i>
    </a>
</li>

<li>
    <a href="https://www.instagram.com/swikarsethi/" target="_blank" rel="noopener">
        <i class="fa fa-instagram"></i>
    </a>
</li>

<li>
    <a href="https://www.youtube.com/@vastu5byswikarsethi" target="_blank" rel="noopener">
        <i class="fa fa-youtube-play"></i>
    </a>
</li>

<li>
    <a href="https://wa.me/919316918385" target="_blank" rel="noopener">
        <i class="fa fa-whatsapp"></i>
    </a>
</li>

</ul>


					<!---->
					<div id="login-dialog" class="zoom-anim-dialog mfp-hide">
						<h1>Login Form</h1>
						<form>
							<input type="text" placeholder="Email">
							<input type="password" placeholder="Password">
							<div class="ast_login_data">
								<label class="tp_custom_check" for="remember_me">Remember me <input type="checkbox" name="ast_remember_me" value="yes" id="ast_remember_me"><span class="checkmark"></span>
								</label>
								<a href="#">Forgot password ?</a>
							</div>
							<button type="submit" class="ast_btn">Login</button>
							<p>Create An Account ? <a href="#">SignUp</a></p>
						</form>
					</div>
					<div id="signup-dialog" class="zoom-anim-dialog mfp-hide">
						<h1>signup form</h1>
						<form>
							<input type="text" placeholder="Name">
							<input type="text" placeholder="Email">
							<input type="password" placeholder="Password">
							<input type="text" placeholder="Mobile Number">
							<select>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
							<button type="submit" class="ast_btn">submit</button>
							<p>Have An Account ? <a href="#">Login</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="ast_header_bottom">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3 col-10 mobile-header">
        <div class="ast_logo">
          <a href="index.php"><img src="images/header/logo.png" alt="Logo" title="Logo" loading="lazy"></a>
        </div>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-9 col-2 d-flex justify-content-end">
        <div class="ast_main_menu_wrapper">
          <div class="ast_menu">
           <ul>
              <li><a href="index.php" class="<?php if(basename($_SERVER['PHP_SELF']) == 'index.php'){ echo 'active'; } ?>">Home</a></li>
              <li><a href="index.php#about_us">About Us</a></li>
              <li><a href="index.php#our_services">Services</a></li>
              <li><a href="index.php#contact">Appointment</a></li>
              <li><a href="index.php#contact">Contact</a></li>
           </ul>
          </div>
        </div>
        <button class="ast_menu_btn" id="menuBtn"><i class="fa fa-bars" aria-hidden="true"></i></button>
      </div>
    </div>
  </div>

  <!-- Mobile menu overlay -->
          <div class="mobile-menu" id="mobileMenu">
            <ul>
               <li><a href="index.php" class="<?php if(basename($_SERVER['PHP_SELF']) == 'index.php'){ echo 'active'; } ?>">Home</a></li>
               <li><a href="index.php#about_us">About Us</a></li>
               <li><a href="index.php#our_services">Services</a></li>
               <li><a href="index.php#contact">Appointment</a></li>
               <li><a href="index.php#contact">Contact</a></li>
            </ul>
          </div>
</div>
<style>
  /* HEADER OVER BANNER */
.ast_header_bottom {
    position: relative; /* change from absolute */
    width: 100%;
    z-index: 999;
    background: #fffcf6; /* solid background */
    height: 100px;  
    margin-top:0px;
}


.banner-slider {
    padding-top: 0px;   /* height of header */
}
.banner-slider .slide .container {
    padding: 0;
    margin: 0;
    max-width: 100%;
}


</style>

<!-- WhatsApp Floating Button -->
<a href="https://wa.me/9316918385" target="_blank" class="whatsapp-btn">
  <i class="fa fa-whatsapp"></i>
</a>

<!-- Back to Top Button -->
<a href="#" class="back-to-top" id="backToTop">
  <i class="fa fa-angle-double-up"></i>
</a>


<!-- Site Loader -->

<div id="siteLoader">
   <img src="images/header/logo.png" alt="Loading..." class="loader-logo" loading="lazy">
</div>
<!-- POPUP FORM -->
<div class="popup-overlay" id="popupForm" onclick="closePopup()" style="display:none;">
  <div class="popup-box" onclick="event.stopPropagation()">
    <span class="close-btn" onclick="closePopup()">×</span>

    <h3>Contact Us</h3>

    <form class="contact-form" action="save_form.php" method="POST">

      <div class="row-2">
        <div class="field">
          <label>First Name</label>
          <input type="text" required name="first_name">
        </div>
        <div class="field">
          <label>Last Name</label>
          <input type="text" name="last_name" required>
        </div>
      </div>

      <div class="row-2">
        <div class="field">
          <label>Email</label>
          <input type="email" name="email" required>
        </div>
        <div class="field">
          <label>Subject</label>
          <input type="text" name="subject">
        </div>
      </div>

      <div class="row-1">
        <div class="field">
          <label>Message</label>
          <textarea rows="4" name="message"></textarea>
        </div>
      </div>

      <div class="row-1">
        <div class="field">
          <label>Captcha: 1 + 6 = ?</label>
          <input type="text">
        </div>
      </div>

      <button type="submit" class="send-btn">Send</button>

    </form>
  </div>
</div>

<style>
/* --- Fullscreen Loader --- */
#siteLoader {
  position: fixed;
  inset: 0;
  background: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  transition: opacity 0.6s ease, visibility 0.6s ease;
}

/* --- Loader Text Animation --- */
.loader-logo {
    width: 140px;
    height: auto;
    animation: loaderFade 1.2s infinite ease-in-out;
  }

  @keyframes loaderFade {
    0% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.10); opacity: 0.6; }
    100% { transform: scale(1); opacity: 1; }
  }

/* --- Hide After Load --- */
body.loaded #siteLoader {
  opacity: 0 !important;
  visibility: hidden !important;
}

</style>








