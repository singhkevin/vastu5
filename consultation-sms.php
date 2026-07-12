<?php
// consultation-sms.php - TEST VARIANT: SMS OTP via Brevo instead of WhatsApp OTP via Wati.
// Duplicate of consultation.php, isolated for experimentation. Does not affect the live page.
session_start();
$page_title = 'Book Your Vastu Consultation (SMS OTP test) | Vastu5';

$captchaNum1 = random_int(1, 9);
$captchaNum2 = random_int(1, 9);
$_SESSION['captcha_answer'] = $captchaNum1 + $captchaNum2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="description" content="Book a practical vastu consultation for your home or business.">
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/landing.css?v=<?= @filemtime(__DIR__ . '/css/landing.css') ?: time() ?>">
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

    <main class="form-section" id="booking-form">
        <div class="container">
            <div class="form-intro">
                Thank you for reaching out to me. To understand your situation better, please answer the questions below as thoroughly as you can — the more detail you share, the better prepared Acharya ji will be for your consultation. (Question 7 is optional.)
            </div>

            <form id="consultationForm" action="save_consultation_sms" method="POST" class="consultation-form">

                <div class="validation-message" id="validationMessage"></div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">Full Name <span class="required">*</span></label>
                        <input type="text" id="first_name" name="first_name" required
                               minlength="2" maxlength="60" pattern="[A-Za-z\s'\-]{2,60}"
                               title="Letters, spaces, hyphens and apostrophes only (min 2 characters)."
                               placeholder="John Doe">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number <span class="required">*</span></label>
                        <input type="tel" id="phone" name="phone" required
                               pattern="[0-9+()\s\-]{7,20}"
                               title="A valid phone number, 7-20 characters (digits, spaces, +, -, ( ) allowed)."
                               placeholder="+91 9876543210">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email Address <span class="required">*</span></label>
                    <input type="email" id="email" name="email" required placeholder="john@example.com">
                </div>

                <hr style="border: 0; border-top: 1px solid #e5e7eb; margin: 30px 0;">

                <p class="privacy-note">🔒 Your answers are kept confidential and used only to prepare for your consultation.</p>

                <div class="form-group">
                    <label for="q1">1. What made you contact me today? (What problem are you facing?) <span class="required">*</span></label>
                    <textarea id="q1" name="q1" required minlength="100"
                              title="Please write at least 100 characters."
                              placeholder="Describe your situation in detail (minimum 100 characters)..."></textarea>
                    <small class="char-hint"><span id="q1CharCount">0</span> / 100 characters minimum</small>
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
                    <label>6. In which city and country is your property located?</label>
                    <div class="form-row">
                        <input type="text" id="q6_city" name="q6_city" placeholder="City"
                               pattern="[A-Za-z\s'\-]{2,50}" title="Letters only (min 2 characters).">
                        <input type="text" id="q6_country" name="q6_country" placeholder="Country"
                               pattern="[A-Za-z\s'\-]{2,50}" title="Letters only (min 2 characters).">
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

                <div class="form-group">
                    <label for="captcha_answer">What is <?= $captchaNum1 ?> + <?= $captchaNum2 ?>? <span class="required">*</span></label>
                    <input type="number" id="captcha_answer" name="captcha_answer" min="0" max="18" step="1"
                           inputmode="numeric" autocomplete="off" required placeholder="Your answer">
                </div>

                <button type="submit" class="cta-button submit-btn">Send My Details</button>
            </form>
        </div>
    </main>

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
