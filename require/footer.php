<div class="ast_footer_wrapper ast_toppadder70 ast_bottompadder20">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="ast_footer_info">
					<!-- <img src="images/header/logo.png" alt="Logo"> -->
					<p>At <strong>Wealth4U with Vastu</strong>, we understand that every space carries a unique energy that influences your health, relationships, and success. With the expert guidance of <strong>Swikar Sethi</strong>, we provide clear, practical, and personalized Vastu and Astro-Vastu solutions that are easy to apply and highly effective. Our approach focuses on balancing natural energies to bring harmony, positivity, and prosperity into your everyday life.</p>
					<ul>
                      <li>
  <a href="https://www.facebook.com/vastu5byswikarsethi" target="_blank" rel="noopener">
    <i class="fa fa-facebook" aria-hidden="true"></i>
  </a>
</li>

<li>
  <a href="https://www.instagram.com/swikarsethi/" target="_blank" rel="noopener">
    <i class="fa fa-instagram" aria-hidden="true"></i>
  </a>
</li>

<li>
  <a href="https://www.youtube.com/@vastu5byswikarsethi" target="_blank" rel="noopener">
    <i class="fa fa-youtube-play" aria-hidden="true"></i>
  </a>
</li>

<li>
  <a href="https://www.linkedin.com/in/vastu5byswikarsethi/" target="_blank" rel="noopener">
    <i class="fa fa-linkedin" aria-hidden="true"></i>
  </a>
</li>

                    </ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="widget text-widget">
					<h4 class="widget-title">our newsletter</h4>
					<div class="ast_newsletter">
						<p>Our solutions are designed to be simple, practical, and easy to understand. At <strong>Wealth4U with Vastu</strong>, we ensure that every recommendation by <strong>Swikar Sethi</strong> is clear, effective, and tailored to your unique needs, helping you achieve balance, positivity, and long-lasting results.</p>

						<div class="ast_newsletter_box">
							<input type="text" placeholder="Email">
							<button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>						
						</div>
						
					</div>				
				</div>			
			</div>
			
			<div class="col-lg-2 col-md-2 col-sm-6 col-12">
				<div class="widget text-widget">
					<h4 class="widget-title">quick links</h4>
					<div class="ast_sociallink">
						<ul>
							<li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Appointment</a></li>
                            <li><a href="#">Contact</a></li>
						</ul>
					</div>				
				</div>			
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="widget text-widget">
					<h4 class="widget-title">get in touch</h4>
					<div class="ast_gettouch">
						<ul>
							<li><i class="fa fa-home" aria-hidden="true"></i> <p>Hebbal, Bengaluru, KA.</p></li>
                            <li><i class="fa fa-at" aria-hidden="true"></i><a href="mailto:swikar.sethi@vastu5.com">swikar.sethi@vastu5.com</a></li>
							<li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:9316918385">9316918385</a></li>

						</ul>
					</div>				
				</div>			
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="ast_copyright_wrapper">
					<p>&copy; 2026 Vastu5 by Swikar Sethi. All Rights Reserved.</p>
					
					

				</div>			
			</div>	
		</div>	
	</div>
</div>
<!-- Footer wrapper End-->
<!--Main js file Style--> 



<script type="18329c0190eb45dc0d1aa69c-text/javascript" src="js/jquery.js"></script> 
<script type="18329c0190eb45dc0d1aa69c-text/javascript" src="js/bootstrap.js"></script>
<script type="18329c0190eb45dc0d1aa69c-text/javascript" src="js/jquery.magnific-popup.js"></script>
<script type="18329c0190eb45dc0d1aa69c-text/javascript" src="js/owl.carousel.js"></script>
<script type="18329c0190eb45dc0d1aa69c-text/javascript" src="js/jquery.countTo.js"></script>
<script type="18329c0190eb45dc0d1aa69c-text/javascript" src="js/jquery.appear.js"></script>
<script type="18329c0190eb45dc0d1aa69c-text/javascript" src="js/custom.js"></script>
<!--Main js file End-->





<script>
// Show/hide button on scroll
const backToTop = document.getElementById("backToTop");
window.addEventListener("scroll", () => {
  if (window.scrollY > 300) {
    backToTop.classList.add("show");
  } else {
    backToTop.classList.remove("show");
  }
});

// Smooth scroll to top
backToTop.addEventListener("click", (e) => {
  e.preventDefault();
  window.scrollTo({ top: 0, behavior: "smooth" });
});
</script>


<script>
document.getElementById("menuBtn").addEventListener("click", function() {
    const menu = document.getElementById("mobileMenu");
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
});
</script>


<!-- loader with popup -->
<script>
document.addEventListener("DOMContentLoaded", function () {

  const popup = document.getElementById("popupForm");
  let stayTimer;

  if (!popup) {
    console.error("popupForm not found");
    return;
  }

  // ===== LOADER LOGIC =====
  if (sessionStorage.getItem("loaderShown")) {
    document.body.classList.add("loaded");
    startStayTimer();
  } else {
    window.addEventListener("load", function () {
      setTimeout(() => {
        document.body.classList.add("loaded");
        sessionStorage.setItem("loaderShown", "true");
        startStayTimer();
      }, 2000); // loader time
    });
  }

  // ===== 30 SECOND STAY TIMER =====
  function startStayTimer() {
    stayTimer = setTimeout(() => {
      popup.style.display = "flex";
    }, 30000); // 30 seconds
  }

  // Cancel if user leaves early
  window.addEventListener("beforeunload", function () {
    clearTimeout(stayTimer);
  });

});

// Close popup
function closePopup(){
  document.getElementById("popupForm").style.display = "none";
}
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

  const form = document.getElementById("contactForm");
  const responseBox = document.querySelector(".response");

  // ===== CAPTCHA SETUP =====
  const num1 = Math.floor(Math.random() * 10) + 1;
  const num2 = Math.floor(Math.random() * 10) + 1;
  const correctAnswer = num1 + num2;

  document.getElementById("captchaQuestion").innerText =
    "What is " + num1 + " + " + num2 + "?";

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    responseBox.innerHTML = "";
    responseBox.style.color = "red";

    let errors = [];

    const firstName = form.first_name.value.trim();
    const lastName = form.last_name.value.trim();
    const email = form.email.value.trim();
    const subject = form.subject.value.trim();
    const message = form.message.value.trim();
    const captcha = document.getElementById("captchaAnswer").value.trim();

    // ===== VALIDATIONS =====
    if (firstName === "") errors.push("First name is required.");
    if (lastName === "") errors.push("Last name is required.");

    if (email === "") {
      errors.push("Email is required.");
    } else if (!validateEmail(email)) {
      errors.push("Please enter a valid email address.");
    }

    if (subject === "") errors.push("Subject is required.");
    if (message === "") errors.push("Message is required.");

    if (captcha === "") {
      errors.push("Captcha answer is required.");
    } else if (parseInt(captcha) !== correctAnswer) {
      errors.push("Captcha answer is incorrect.");
    }

    // ===== SHOW ERRORS OR SUBMIT =====
    if (errors.length > 0) {
      responseBox.innerHTML = errors.join("<br>");
      return;
    }

    // All validations passed
    responseBox.style.color = "green";
    responseBox.innerHTML = "Form submitted successfully.";

    form.submit(); // finally submit form
  });

  // Email format check
  function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

});
</script>





<!-- index page experience counter -->
<script>
document.querySelectorAll('.timer').forEach(counter => {
  const updateCount = () => {
    const target = +counter.getAttribute('data-to');
    const speed = +counter.getAttribute('data-speed');
    const start = +counter.innerText;

    // FIX: ensure small numbers count properly
    const increment = Math.max(1, Math.floor(target / (speed / 50)));

    if (start < target) {
      counter.innerText = start + increment;
      setTimeout(updateCount, 50);
    } else {
      counter.innerText = target;
    }
  };
  updateCount();
});
</script>


<!-- banner slider script -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const slides = document.querySelectorAll('.slide');
    let current = 0;
    let timer;

    function showSlide(index) {
        slides.forEach(slide => {
            slide.classList.remove('active');
            // reset text animation
            slide.querySelectorAll('.slide-text').forEach(el => {
                el.style.opacity = 0;
                el.style.transform = 'translateY(20px)';
            });
        });
        slides[index].classList.add('active');
    }

    function nextSlide() {
        current = (current + 1) % slides.length;
        showSlide(current);
    }

    function prevSlide() {
        current = (current - 1 + slides.length) % slides.length;
        showSlide(current);
    }

    function startSlider() {
        timer = setInterval(nextSlide, 5000);
    }

    function resetSlider() {
        clearInterval(timer);
        startSlider();
    }

    document.querySelector('.next').addEventListener('click', () => { nextSlide(); resetSlider(); });
    document.querySelector('.prev').addEventListener('click', () => { prevSlide(); resetSlider(); });

    startSlider();
});
</script>

<!-- artical first script -->
<script>
document.querySelector('.swikar-read-toggle').addEventListener('click', function () {
    const moreText = document.querySelector('.swikar-more-text');

    moreText.classList.toggle('show');
    this.textContent = moreText.classList.contains('show')
        ? 'Read Less'
        : 'Read More';
});
</script>
<!-- article first script -->

<!-- article script -->
<script>
document.querySelector('.vastu-read-btn').addEventListener('click', function () {
    const more = document.querySelector('.vastu-more-content');

    more.classList.toggle('show');
    this.textContent = more.classList.contains('show')
        ? 'Read Less'
        : 'Read More';
});
</script>
<!-- end -->

<!-- five article script -->
<script>
document.querySelector('.vastu5-read-toggle').addEventListener('click', function () {
  const moreText = document.querySelector('.vastu5-more-text');

  moreText.classList.toggle('show');
  this.textContent = moreText.classList.contains('show')
    ? 'Read Less'
    : 'Read More';
});
</script>
<!-- five article script end -->
</body>

</html>
