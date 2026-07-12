<?php
// config.example.php - Copy this file to config.php and fill in real values.
// config.php is git-ignored and must be uploaded to the server manually (not via git).

define('RESEND_API_KEY', 'your-resend-api-key-here');
define('RESEND_FROM_EMAIL', 'noreply@viralinboundnotifications.com');

define('WATI_API_ENDPOINT', 'https://live-mt-server.wati.io/your-tenant-id-here');
define('WATI_API_TOKEN', 'your-wati-api-token-here');
define('WATI_OTP_TEMPLATE_NAME', 'consultation_otp_verification');

// --- SMS OTP test (consultation-sms.php) — not used by the live WhatsApp OTP flow ---
define('BREVO_API_KEY', 'your-brevo-api-key-here');
define('BREVO_SMS_SENDER', 'Vastu5');
