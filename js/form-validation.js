/**
 * Universal Form Validation for Vastu5
 * Handles both the main contact form and the popup contact form.
 */
document.addEventListener("DOMContentLoaded", function () {
    const forms = [
        {
            id: "contactForm",
            captchaQuestionId: "captchaQuestion",
            captchaAnswerId: "captchaAnswer"
        },
        {
            id: "popupContactForm",
            captchaQuestionId: "popupCaptchaQuestion",
            captchaAnswerId: "popupCaptchaAnswer"
        }
    ];

    forms.forEach(formInfo => {
        const form = document.getElementById(formInfo.id);
        if (!form) return;

        const responseBox = form.querySelector(".response");
        const captchaQuestion = document.getElementById(formInfo.captchaQuestionId);
        const captchaAnswer = document.getElementById(formInfo.captchaAnswerId);

        // CAPTCHA Setup
        let num1 = Math.floor(Math.random() * 10) + 1;
        let num2 = Math.floor(Math.random() * 10) + 1;
        let correctAnswer = num1 + num2;

        if (captchaQuestion) {
            captchaQuestion.innerHTML = `Captcha: ${num1} + ${num2} = ?`;
        }

        form.addEventListener("submit", function (e) {
            if (responseBox) responseBox.innerHTML = "";

            // Required field validation
            const requiredFields = form.querySelectorAll('input[required], textarea[required]');
            for (let field of requiredFields) {
                if (field.value.trim() === "") {
                    e.preventDefault();
                    if (responseBox) responseBox.innerHTML = "<span style='color:red;'>All starred fields are required.</span>";
                    field.focus();
                    return;
                }
            }

            // Email validation
            const emailField = form.querySelector('input[type="email"]');
            if (emailField) {
                const email = emailField.value.trim();
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(email)) {
                    e.preventDefault();
                    if (responseBox) responseBox.innerHTML = "<span style='color:red;'>Please enter a valid email address.</span>";
                    emailField.focus();
                    return;
                }
            }

            // Captcha validation
            if (captchaAnswer) {
                const userAnswer = captchaAnswer.value.trim();
                if (userAnswer === "" || parseInt(userAnswer) !== correctAnswer) {
                    e.preventDefault();
                    if (responseBox) responseBox.innerHTML = "<span style='color:red;'>Captcha answer is incorrect.</span>";
                    captchaAnswer.focus();
                    return;
                }
            }
        });
    });
});
