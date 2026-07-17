<?php
// consultation.php - Vastu Consultation Landing Page (SMS OTP via Brevo)
session_start();
$page_title = 'Book Your Vastu Consultation | Vastu5';
$countries = require __DIR__ . '/countries.php';

$errorMessages = [
    'invalid_name' => 'Please enter a valid full name (letters, spaces, hyphens and apostrophes only, at least 2 characters).',
    'invalid_phone' => 'Please enter a valid phone number.',
    'invalid_contact' => 'Please enter a valid email address.',
    'phone_not_verified' => "We couldn't confirm your phone number — please request a new code and verify it before submitting.",
    'incomplete' => 'Please answer all required questions before submitting.',
    'too_short' => 'One or more of your answers needs a bit more detail — please expand it and resubmit.',
    'invalid_location' => 'Please enter a valid city/country (letters only).',
];
$errorReason = (string) ($_GET['reason'] ?? '');
$errorText = $errorMessages[$errorReason] ?? ($errorReason !== '' ? 'Something went wrong with your submission. Please check your answers and try again.' : '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="description" content="Book a practical vastu consultation for your home or business.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/landing.css?v=<?= @filemtime(__DIR__ . '/css/landing.css') ?: time() ?>">
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
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1725660742080649&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
</head>
<body>

    <header>
        <div class="container">
            <div class="hero-content">
                <h1>Struggling with a problem in your home, office, or property? Let's find out if Vastu can help.</h1>
                <p>This is a real, personalized consultation—not a generic sales pitch. Get actionable advice tailored to your space.</p>
                <a href="#booking-form" class="cta-button">Book Your Consultation</a>
            </div>

            <div class="trust-section">
                <img src="images/content/about.jpeg" alt="Swikar Sethi" class="consultant-photo">
                <div class="trust-text">
                    <h3>Swikar Sethi</h3>
                    <p>Expert Vastu Consultant</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Hidden until the real video is ready: remove style="display: none;" to show -->
    <section class="video-section" style="display: none;">
        <div class="container">
            <h2>Watch: My Work, Approach & Solutions</h2>
            <p>A short introduction to who I am, how I work, and the results my clients have seen.</p>

            <!-- VIDEO PLACEHOLDER: replace this div with your real video embed
                 (e.g. <iframe> for YouTube/Vimeo, or a <video> tag) keeping class="video-frame" -->
            <div class="video-frame video-placeholder">
                <div class="video-placeholder-inner">
                    <span class="video-play-icon" aria-hidden="true">&#9654;</span>
                    <span>Video coming soon</span>
                </div>
            </div>
        </div>
    </section>

    <main class="form-section" id="booking-form">
        <div class="container">
            <div class="form-intro">
                Thank you for reaching out to me. To understand your situation better, please answer the questions below as thoroughly as you can — the more detail you share, the better prepared I will be for your consultation. (Question 7 is optional.)
            </div>

            <form id="consultationForm" action="save_consultation" method="POST" class="consultation-form">

                <div class="validation-message" id="validationMessage"<?= $errorText !== '' ? ' style="display:block"' : '' ?>><?= htmlspecialchars($errorText) ?></div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">Full Name <span class="required">*</span></label>
                        <input type="text" id="first_name" name="first_name" required
                               minlength="2" maxlength="60" pattern="[A-Za-z\s'\-]{2,60}"
                               title="Letters, spaces, hyphens and apostrophes only (min 2 characters)."
                               placeholder="John Doe" autocomplete="name">
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Phone Number <span class="required">*</span></label>
                        <div class="phone-row">
                            <select id="phone_country_code" aria-label="Country code" autocomplete="tel-country-code">
                                <?php foreach ($countries as $c): ?>
                                <option value="<?= htmlspecialchars($c['code']) ?>" title="<?= htmlspecialchars($c['name']) ?>"<?= $c['name'] === 'India' ? ' selected' : '' ?>><?= country_flag_emoji($c['iso2']) ?> +<?= htmlspecialchars($c['code']) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="tel" id="phone_number" required
                                   inputmode="numeric" pattern="[0-9]{6,14}"
                                   title="Phone number without the country code (digits only)."
                                   placeholder="9876543210" autocomplete="tel-national">
                        </div>
                        <input type="hidden" id="phone" name="phone">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email Address <span class="required">*</span></label>
                    <input type="email" id="email" name="email" required placeholder="john@example.com" autocomplete="email">
                </div>

                <hr style="border: 0; border-top: 1px solid #e5e7eb; margin: 30px 0;">

                <p class="privacy-note">🔒 Your answers are kept confidential and used only to prepare for your consultation.</p>

                <div class="form-group">
                    <label for="q1">1. What made you contact me today? (What problem are you facing?) <span class="required">*</span></label>
                    <textarea id="q1" name="q1" required
                              placeholder="Describe your situation in detail..."></textarea>
                </div>

                <div class="form-group">
                    <label>2. Is your concern related to your Home, Office, Shop, Factory, or Land (a plot)?</label>
                    <div class="radio-group">
                        <div class="radio-item"><input type="radio" id="q2_home" name="q2" value="Home"> <label for="q2_home">Home</label></div>
                        <div class="radio-item"><input type="radio" id="q2_office" name="q2" value="Office"> <label for="q2_office">Office</label></div>
                        <div class="radio-item"><input type="radio" id="q2_shop" name="q2" value="Shop"> <label for="q2_shop">Shop</label></div>
                        <div class="radio-item"><input type="radio" id="q2_factory" name="q2" value="Factory"> <label for="q2_factory">Factory</label></div>
                        <div class="radio-item"><input type="radio" id="q2_land" name="q2" value="Land (Plot)"> <label for="q2_land">Land (Plot)</label></div>
                        <div class="radio-item"><input type="radio" id="q2_other" name="q2" value="Other"> <label for="q2_other">Other</label></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="q3">3. What is the biggest issue you want to solve? <span class="required">*</span></label>
                    <select id="q3" name="q3" required>
                        <option value="">Select an option...</option>
                        <option value="Business">Business</option>
                        <option value="Money">Money</option>
                        <option value="Career">Career</option>
                        <option value="Health">Health</option>
                        <option value="Relationships">Relationships</option>
                        <option value="Marriage">Marriage</option>
                        <option value="Children">Children</option>
                        <option value="Peace of Mind">Peace of Mind</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="q4">4. How long have you been facing this problem? <span class="required">*</span></label>
                    <select id="q4" name="q4" required>
                        <option value="">Select duration...</option>
                        <option value="Less than 1 month">Less than 1 month</option>
                        <option value="1–6 months">1–6 months</option>
                        <option value="6 months–1 year">6 months–1 year</option>
                        <option value="Over 1 year">Over 1 year</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="q5">5. Have you already consulted any Vastu consultant or tried any remedies? If yes, what did you try? <span class="required">*</span></label>
                    <textarea id="q5" name="q5" required
                              placeholder="Details about previous consultations or remedies (write 'None' if not applicable)..."></textarea>
                </div>

                <div class="form-group">
                    <label>6. In which city and country is your property located? <span class="required">*</span></label>
                    <div class="form-row">
                        <input type="text" id="q6_city" name="q6_city" placeholder="City" required
                               pattern="[A-Za-z\s'\-]{2,50}" title="Letters only (min 2 characters).">
                        <select id="q6_country" name="q6_country" required>
                            <option value="">Select country...</option>
                            <?php foreach ($countries as $c): ?>
                            <option value="<?= htmlspecialchars($c['name']) ?>"<?= $c['name'] === 'India' ? ' selected' : '' ?>><?= htmlspecialchars($c['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="q7">7. Is there anything else you would like me to know before we speak?</label>
                    <textarea id="q7" name="q7" placeholder="Any other details..."></textarea>
                </div>

                <hr style="border: 0; border-top: 1px solid #e5e7eb; margin: 30px 0;">

                <div class="form-group">
                    <label>Last step — verify your phone number via SMS <span class="required">*</span></label>
                    <button type="button" id="sendOtpBtn" class="cta-button otp-btn">Send Code via SMS</button>

                    <div class="otp-section" id="otpSection">
                        <label for="otp_input">Enter the 6-digit code we texted you</label>
                        <div class="otp-row">
                            <input type="text" id="otp_input" inputmode="numeric" maxlength="6"
                                   pattern="[0-9]{6}" title="6-digit numeric code."
                                   autocomplete="off" placeholder="123456">
                            <button type="button" id="verifyOtpBtn" class="cta-button otp-btn">Verify</button>
                        </div>
                    </div>

                    <div class="otp-status" id="otpStatus"></div>
                </div>

                <button type="submit" id="submitBtn" class="cta-button submit-btn">Send My Details</button>
            </form>
        </div>
    </main>

    <?php if ($errorText !== ''): ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('validationMessage')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
        });
    </script>
    <?php endif; ?>

    <!-- Confirmation Overlay (shown via JS before actual submit) -->
    <div class="confirm-overlay" id="confirmOverlay">
        <div>
            <h2>Thank you for your answers.</h2>
            <p>They will help me understand your situation and guide you in the right direction.</p>
        </div>
    </div>

    <script src="js/landing-sms.js"></script>
</body>
</html>
