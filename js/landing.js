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

    // 3. WhatsApp OTP Verification
    const phoneInput = document.getElementById('phone');
    const sendOtpBtn = document.getElementById('sendOtpBtn');
    const verifyOtpBtn = document.getElementById('verifyOtpBtn');
    const otpSection = document.getElementById('otpSection');
    const otpInput = document.getElementById('otp_input');
    const otpStatus = document.getElementById('otpStatus');

    const normalizePhone = (value) => value.replace(/\D/g, '');

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
            const phone = normalizePhone(phoneInput.value);
            if (!phoneInput.checkValidity() || phone === '') {
                showOtpStatus('Please enter a valid WhatsApp number first.', 'error');
                phoneInput.focus();
                return;
            }

            sendOtpBtn.disabled = true;
            const originalText = sendOtpBtn.textContent;
            sendOtpBtn.textContent = 'Sending...';

            fetch('send_otp.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ phone }),
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.status === 'sent') {
                        otpSection.style.display = 'block';
                        showOtpStatus('Code sent! Check your WhatsApp.', 'success');
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
                showOtpStatus('Please enter the code from WhatsApp.', 'error');
                return;
            }

            verifyOtpBtn.disabled = true;
            verifyOtpBtn.textContent = 'Verifying...';

            fetch('verify_otp.php', {
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
                        phoneInput.readOnly = true;
                        otpSection.style.display = 'none';
                        clearInterval(cooldownTimer);
                        sendOtpBtn.style.display = 'none';
                        showOtpStatus('✓ WhatsApp number verified.', 'success');
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
    if (phoneInput) {
        phoneInput.addEventListener('input', () => {
            if (verifiedPhone !== null && normalizePhone(phoneInput.value) !== verifiedPhone) {
                verifiedPhone = null;
                phoneInput.readOnly = false;
                sendOtpBtn.style.display = '';
                showOtpStatus('', '');
            }
        });
    }

    // 5. Form Validation (Q1 and Q5 required; WhatsApp number must be OTP-verified; Q7 optional)
    const form = document.getElementById('consultationForm');
    const validationMessage = document.getElementById('validationMessage');
    const confirmOverlay = document.getElementById('confirmOverlay');

    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const missing = [];
            if (form.q1 && form.q1.value.trim() === '') missing.push('Question 1');
            if (form.q3 && form.q3.value === '') missing.push('Question 3');
            if (form.q4 && form.q4.value === '') missing.push('Question 4');
            if (form.q5 && form.q5.value.trim() === '') missing.push('Question 5');

            if (missing.length > 0) {
                validationMessage.style.display = 'block';
                validationMessage.textContent = `Please answer: ${missing.join(', ')}.`;
                validationMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            if (verifiedPhone === null || verifiedPhone !== normalizePhone(phoneInput.value)) {
                validationMessage.style.display = 'block';
                validationMessage.textContent = 'Please verify your WhatsApp number (click "Send Code via WhatsApp" above) before submitting.';
                validationMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            // Hide validation if successful
            validationMessage.style.display = 'none';

            // Show confirmation overlay briefly
            confirmOverlay.classList.add('show');

            // Submit form after 2 seconds
            setTimeout(() => {
                form.submit();
            }, 2000);
        });
    }
});
