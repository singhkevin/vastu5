document.addEventListener('DOMContentLoaded', () => {
    // 1. Capture UTM Parameters
    const urlParams = new URLSearchParams(window.location.search);
    const utmParams = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term'];
    
    utmParams.forEach(param => {
        const val = urlParams.get(param);
        if (val) {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = param;
            hiddenInput.value = val;
            document.getElementById('consultationForm').appendChild(hiddenInput);
        }
    });

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

    // 3. Form Validation (min 2 of 7 questions)
    const form = document.getElementById('consultationForm');
    const validationMessage = document.getElementById('validationMessage');
    const confirmOverlay = document.getElementById('confirmOverlay');

    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Count answered qualification questions
            let answeredCount = 0;
            
            // Q1: Long text
            if (form.q1 && form.q1.value.trim() !== '') answeredCount++;
            
            // Q2: Radio
            const q2Checked = form.querySelector('input[name="q2"]:checked');
            if (q2Checked) answeredCount++;
            
            // Q3: Select
            if (form.q3 && form.q3.value !== '') answeredCount++;
            
            // Q4: Select
            if (form.q4 && form.q4.value !== '') answeredCount++;
            
            // Q5: Long text
            if (form.q5 && form.q5.value.trim() !== '') answeredCount++;
            
            // Q6: Short text
            if (form.q6_city && form.q6_city.value.trim() !== '' || form.q6_country && form.q6_country.value.trim() !== '') answeredCount++;
            
            // Q7: Long text
            if (form.q7 && form.q7.value.trim() !== '') answeredCount++;

            if (answeredCount < 2) {
                validationMessage.style.display = 'block';
                validationMessage.textContent = 'Please answer a minimum of any two qualification questions (Questions 1 to 7) to help me understand your situation.';
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
