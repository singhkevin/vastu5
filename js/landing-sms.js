document.addEventListener('DOMContentLoaded', () => {
    // 1. Capture & Persist UTM Parameters (with sessionStorage fallback)
    const urlParams = new URLSearchParams(window.location.search);
    const utmParams = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term'];
    const consultationForm = document.getElementById('consultationForm');

    if (consultationForm) {
        utmParams.forEach(param => {
            let val = urlParams.get(param);
            if (val) {
                sessionStorage.setItem(param, val);
            } else {
                val = sessionStorage.getItem(param);
            }
            if (val && !consultationForm.querySelector(`input[name="${param}"]`)) {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = param;
                hiddenInput.value = val;
                consultationForm.appendChild(hiddenInput);
            }
        });
    }

    // 2. Smooth Scroll for CTA
    const ctaButton = document.querySelector('.cta-button');
    if (ctaButton) {
        ctaButton.addEventListener('click', (e) => {
            e.preventDefault();
            document.querySelector('#booking-form').scrollIntoView({
                behavior: 'smooth'
            });
        });
    }

    // 3. Live character counter for Q1
    const q1Input = document.getElementById('q1');
    const q1CharCount = document.getElementById('q1CharCount');
    const Q1_MIN_LEN = 100;

    if (q1Input && q1CharCount) {
        q1Input.addEventListener('input', () => {
            const len = q1Input.value.trim().length;
            q1CharCount.textContent = len;
            q1CharCount.parentElement.classList.toggle('char-hint-ok', len >= Q1_MIN_LEN);
        });
    }

    // 4. SMS OTP Verification (Brevo)
    const phoneCountryCode = document.getElementById('phone_country_code');
    const phoneNumberInput = document.getElementById('phone_number');
    const phoneInput = document.getElementById('phone'); // hidden, combined value submitted to the server
    const sendOtpBtn = document.getElementById('sendOtpBtn');
    const verifyOtpBtn = document.getElementById('verifyOtpBtn');
    const otpSection = document.getElementById('otpSection');
    const otpInput = document.getElementById('otp_input');
    const otpStatus = document.getElementById('otpStatus');

    const normalizePhone = (value) => value.replace(/\D/g, '');

    function syncPhone() {
        if (phoneInput && phoneCountryCode && phoneNumberInput) {
            phoneInput.value = `+${phoneCountryCode.value} ${phoneNumberInput.value.trim()}`;
        }
    }

    if (phoneCountryCode && phoneNumberInput) {
        syncPhone();
        phoneCountryCode.addEventListener('change', syncPhone);
        phoneNumberInput.addEventListener('input', syncPhone);
    }

    let verifiedPhone = null;
    let resendCooldown = 0;
    let cooldownTimer = null;

    function showOtpStatus(message, type) {
        otpStatus.textContent = message;
        otpStatus.className = 'otp-status' + (type ? ' ' + type : '');
    }

    function startCooldown(seconds) {
        resendCooldown = seconds;
        sendOtpBtn.disabled = true;
        sendOtpBtn.textContent = `Resend (${resendCooldown}s)`;
        cooldownTimer = setInterval(() => {
            resendCooldown--;
            if (resendCooldown <= 0) {
                clearInterval(cooldownTimer);
                sendOtpBtn.disabled = false;
                sendOtpBtn.textContent = 'Resend Code';
            } else {
                sendOtpBtn.textContent = `Resend (${resendCooldown}s)`;
            }
        }, 1000);
    }

    if (sendOtpBtn && phoneInput) {
        sendOtpBtn.addEventListener('click', () => {
            syncPhone();
            const phone = normalizePhone(phoneInput.value);
            if (!phoneNumberInput.checkValidity() || phone === '') {
                showOtpStatus('Please enter a valid phone number first.', 'error');
                phoneNumberInput.focus();
                return;
            }

            sendOtpBtn.disabled = true;
            const originalText = sendOtpBtn.textContent;
            sendOtpBtn.textContent = 'Sending...';

            fetch('send_otp_sms.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ phone }),
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.status === 'sent') {
                        otpSection.style.display = 'block';
                        showOtpStatus('Code sent! Check your SMS inbox.', 'success');
                        otpInput.focus();
                        startCooldown(30);
                    } else {
                        sendOtpBtn.disabled = false;
                        sendOtpBtn.textContent = originalText;
                        showOtpStatus(data.message || 'Could not send code. Please try again.', 'error');
                    }
                })
                .catch(() => {
                    sendOtpBtn.disabled = false;
                    sendOtpBtn.textContent = originalText;
                    showOtpStatus('Network error. Please try again.', 'error');
                });
        });
    }

    if (verifyOtpBtn && otpInput && phoneInput) {
        verifyOtpBtn.addEventListener('click', () => {
            const phone = normalizePhone(phoneInput.value);
            const otp = otpInput.value.trim();

            if (otp === '') {
                showOtpStatus('Please enter the code from your SMS.', 'error');
                return;
            }

            verifyOtpBtn.disabled = true;
            verifyOtpBtn.textContent = 'Verifying...';

            fetch('verify_otp_sms.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ phone, otp }),
            })
                .then((res) => res.json())
                .then((data) => {
                    verifyOtpBtn.disabled = false;
                    verifyOtpBtn.textContent = 'Verify';
                    if (data.status === 'verified') {
                        verifiedPhone = phone;
                        phoneCountryCode.disabled = true;
                        phoneNumberInput.readOnly = true;
                        otpSection.style.display = 'none';
                        clearInterval(cooldownTimer);
                        sendOtpBtn.style.display = 'none';
                        showOtpStatus('✓ Phone number verified.', 'success');
                    } else {
                        showOtpStatus(data.message || 'Incorrect code. Please try again.', 'error');
                    }
                })
                .catch(() => {
                    verifyOtpBtn.disabled = false;
                    verifyOtpBtn.textContent = 'Verify';
                    showOtpStatus('Network error. Please try again.', 'error');
                });
        });
    }

    // Reset verification if the user edits the phone number after verifying
    if (phoneNumberInput && phoneCountryCode) {
        const resetIfChanged = () => {
            if (verifiedPhone !== null && normalizePhone(phoneInput.value) !== verifiedPhone) {
                verifiedPhone = null;
                phoneCountryCode.disabled = false;
                phoneNumberInput.readOnly = false;
                sendOtpBtn.style.display = '';
                showOtpStatus('', '');
            }
        };
        phoneNumberInput.addEventListener('input', resetIfChanged);
        phoneCountryCode.addEventListener('change', resetIfChanged);
    }

    // 5. Form Validation (Q1 and Q5 required; phone number must be OTP-verified; Q7 optional)
    const form = document.getElementById('consultationForm');
    const validationMessage = document.getElementById('validationMessage');
    const confirmOverlay = document.getElementById('confirmOverlay');
    const submitBtn = document.getElementById('submitBtn');
    let isSubmitting = false;

    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            if (isSubmitting) return;

            const OPEN_MIN_LEN = 20;
            const missing = [];
            if (form.q1 && form.q1.value.trim().length < Q1_MIN_LEN) missing.push('Question 1 (100+ characters)');
            if (form.q3 && form.q3.value === '') missing.push('Question 3');
            if (form.q4 && form.q4.value === '') missing.push('Question 4');
            if (form.q5 && form.q5.value.trim().length < OPEN_MIN_LEN) missing.push('Question 5 (please add a bit more detail)');
            if (form.q6_city && form.q6_city.value.trim() === '') missing.push('Question 6 (City)');
            if (form.q6_country && form.q6_country.value === '') missing.push('Question 6 (Country)');
            if (form.q7 && form.q7.value.trim() !== '' && form.q7.value.trim().length < OPEN_MIN_LEN) {
                missing.push('Question 7 (please add a bit more detail, or leave it blank)');
            }

            if (missing.length > 0) {
                validationMessage.style.display = 'block';
                validationMessage.textContent = `Please answer: ${missing.join(', ')}.`;
                validationMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            if (verifiedPhone === null || verifiedPhone !== normalizePhone(phoneInput.value)) {
                validationMessage.style.display = 'block';
                validationMessage.textContent = 'Please verify your phone number (click "Send Code via SMS" above) before submitting.';
                validationMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            // Hide validation if successful
            validationMessage.style.display = 'none';

            // Prevent duplicate submissions (double-click, Enter key, etc.)
            isSubmitting = true;
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.textContent = 'Sending...';
            }

            // Show confirmation overlay briefly
            confirmOverlay.classList.add('show');

            // Submit form after 2 seconds
            setTimeout(() => {
                form.submit();
            }, 2000);
        });
    }
});
