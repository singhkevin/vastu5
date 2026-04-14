<?php
if (parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) === '/index.php') {
    header('Location: /', true, 301);
    exit;
}

$status = $_GET['status'] ?? '';
$reason = $_GET['reason'] ?? '';
$reasonMessages = [
    'invalid' => 'Please fill all required fields with a valid email address.',
    'encoding' => 'Unable to process your request. Please try again.',
    'transport' => 'Connection error while sending your request. Please try again.',
    'upstream' => 'Service is temporarily unavailable. Please try again shortly.',
    'submit' => 'We could not complete your request. Please try again.',
];
$page_title = 'Vastu Consultant & Expert | Vastu for Home & Business | Vastu5';
$page_meta_description = 'Vastu5 by Swikar Sethi offers practical vastu consultation for homes and businesses with non-demolition remedies and MahaVastu-based alignment.';
$page_canonical = 'https://vastu5.com/';
$page_json_ld = json_encode([
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'ProfessionalService',
            'name' => 'Vastu5',
            'url' => 'https://vastu5.com/',
            'telephone' => '+91-9316918385',
            'email' => 'swikar.sethi@vastu5.com',
            'areaServed' => 'IN',
            'description' => 'Practical vastu consultation for residential and business spaces.',
        ],
        [
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'What is MahaVastu and how is it different from traditional vastu?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'MahaVastu is an applied directional framework that focuses on activities, utilities, and object placement to improve practical outcomes without unnecessary demolition.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Can vastu corrections be done without breaking walls?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Yes. Most Vastu5 recommendations are non-demolition and involve stepwise changes in space usage, object placement, and directional alignment.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Does Vastu5 provide business vastu consultation?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Yes. Vastu5 provides business and office vastu consultations focused on clarity, decision flow, team performance, and financial stability.',
                    ],
                ],
            ],
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
include 'require/header.php';
?>
<!-- Header End -->  
<!--Slider Start-->
<!--Slider Start-->
<!-- NEW BANNER SLIDER -->
<section class="banner-slider">
  <div class="slides">
    <div class="slide active" style="background-image:url('images/new/new_banner_2.jpg');">
      <div class="container">
        <div class="slide-content">
          <h1 class="slide-text text-uppercase">Vastu That Works for Life & Business Growth</h1>
          <p class="slide-text">Aligning Energy for Clarity, Stability & Success</p>
          <a href="#contact" class="banner-btn">Ask me How</a>
        </div>
      </div>
    </div>

    <div class="slide" style="background-image:url('images/new/2.jpg');">
      <div class="container">
        <div class="slide-content">
          <h2 class="slide-text text-uppercase">Transform Homes & Businesses with Proven Vastu</h2>
          <p class="slide-text">20+ Years of Expertise | Non-Demolition Remedies</p>
          <a href="#contact" class="banner-btn">Consult Now</a>
        </div>
      </div>
    </div>
  </div>

  <div class="slider-arrow prev">&#10094;</div>
  <div class="slider-arrow next">&#10095;</div>
</section>


<div class="ast_about_wrapper ast_about_wrapper_01 sunset-bg vastu-motion">

  <div class="container">
    <div class="row align-items-center">

      <!-- Image Column -->
      <div class="col-lg-5 col-md-5 col-sm-12 col-12 position-relative">
        <div class="ast_about_info_img wow animate__animated animate__fadeInLeft" data-wow-delay="0.2s ">
          <img src="images/content/about.jpeg" alt="About Wealth4U with Vastu" loading="lazy">
        </div>

        <!-- Vastu Compass In Front of Image -->
        <div class="vastu-compass-front"></div>
      </div>

      <!-- Content Column -->
      <div class="col-lg-7 col-md-7 col-sm-12 col-12" id="about_us">
        <div class="ast_about_info">

          <span class="section_tagline wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.2s">Vastu Wisdom • Natural Balance</span>
          <h4 class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.4s">Know About Vastu Shastra</h4>

          <p class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.6s">
            At <strong>Wealth4U with Vastu</strong>, we believe that every space carries
            a unique energy that directly influences health, wealth, and peace of mind.
            Guided by expert consultant <strong>Swikar Sethi</strong>, we help align
            living and working spaces with the timeless principles of
            <strong>Vastu Shastra</strong>.
          </p>

          <p class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.8s">
            Vastu Shastra is the ancient science of harmonizing the
            five natural elements—<strong> Earth, Water, Fire, Air, and Space</strong>.
            When directions, layout, and energy flow are properly balanced,
            they create an environment that supports stability, prosperity,
            and positive growth.
          </p>

          <p class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="1s">
            Our solutions focus on <strong>practical Vastu corrections without structural changes</strong>.
            Through simple adjustments and energy alignment techniques,
            we help enhance financial progress, family harmony,
            career success, and long-term well-being.
          </p>

        </div>
      </div>

    </div>
  </div>
</div>




<div class="vastu-about-section" style="background: linear-gradient(135deg, #ffffff 0%, #fff8d7 100%);">
  <div class="container">
    
    <div class="row" style="padding:70px 0px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ast_heading text-center mb-5">
                <h2 class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.2s">AUO in <span>MahaVastu</span></h2>

                <!-- UNDERLINE IMAGE -->
                 <img src="images/new/underline.png" alt="Heading underline" class="heading-underline wow animate__animated animate__fadeInUp" data-wow-delay="0.3s" loading="lazy">

                 <p class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.4s">
                  <strong>How Swikar Sethi of Vastu5 Aligns Space for Real Results</strong>
                 </p>

            </div>
        </div>

      <!-- LEFT CONTENT -->
      <div class="col-lg-7 col-md-7 col-sm-12">
        <div class="vastu-content-box">

          <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.2s">
             At <strong>Vastu5,</strong> Vastu is not treated as superstition or guesswork. It is practiced as a <strong>living science,</strong> where spaces respond directly to how people live, work, and think inside them. One of the most powerful and practical tools used by <strong>Swikar Sethi,</strong> founder of Vastu5 and a MahaVastu practitioner with over 20 years of experience, is the concept of <strong>AUO – Activities, Utilities</strong>, and Objects.</p>
          <h5>What is AUO?</h5>
             <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.3s"><strong>AUO</strong> stands for:</p>
              <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.4s"> <span class="big-bullet">•</span><strong>Activities</strong> – what actions are performed in a space (sleeping, cooking, working, resting, studying, storing, socialising).</p>
              <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.4s"> <span class="big-bullet">•</span><strong>Utilities </strong> – functional systems like water storage, electrical equipment, kitchen appliances, machines, tanks, and wiring.</p>
              <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.4s"> <span class="big-bullet">•</span><strong>Objects</strong> – furniture, décor, metals, storage items, tools, and materials placed in a space.</p>
              <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.4s">According to MahaVastu, <strong>directions do not work on their own</strong>. They start working only when the <strong>right AUO is placed in the right elemental zone</strong>. Swikar Sethi’s Vastu5 approach focuses deeply on this principle, because most life problems arise not due to bad luck—but due to <strong>misaligned AUO</strong></p>
          <div class="vastu-more-content">
            <div style="background:#ffedbd; padding:15px; border-radius:6px;">
            <h5>AUO and the Five Elements — the Vastu5 Method</h5>
              <p>The AUO framework is closely connected to the Five Elements— <br> Earth, Water, Fire, Air, and Space. Each element governs specific life outcomes and must be supported through correct activities, utilities, and objects.</p>
              <p><strong>Space (WSW–NW)</strong> governs thinking power, creativity, skill, and expansion. Study areas, ideation zones, and calm resting spaces activate higher awareness and decision-making ability.</p>
              <p><strong>Water (NNW–NE)</strong> governs emotions, healing, resources, and clarity. Activities like meetings, relaxation, and storage of essentials work well here. Improper water-related AUO often causes emotional confusion or financial leakage.</p>
              <p><strong>Air (ENE–ESE)</strong> controls movement, creativity, networking, and children. Social spaces, hobbies, and learning activities flourish here. Misuse leads to restlessness or lack of motivation.</p>
              <p><strong>Fire (SE–South)</strong> is the zone of energy, authority, and transformation. Cooking, electrical utilities, and heating elements belong here. When Fire AUO is wrongly placed, it results in anger, burnout, or blocked progress.</p>
              <p><strong>Earth (SSW–SW)</strong> represents stability, relationships, and long-term security. Heavy storage, resting areas, and immovable objects belong here. Swikar ensures Earth zones are not disturbed, as imbalance here directly affects financial and emotional stability.</p>
            </div>
              <h5 class="mt-3">Why Vastu5 focuses on AUO — not demolition</h5>
              <p>What sets <strong>Swikar Sethi of Vastu5</strong> apart is his <strong>non-demolition, symptom-based approach</strong>. He does not randomly change things. He listens carefully to the client’s challenges—financial blocks, relationship stress, career stagnation—and then identifies <strong>which AUO is disturbing which element</strong>.</p>
              <p>By correcting <strong>Activities, Utilities, or Objects</strong>, the space begins to support the occupant naturally. This is why Vastu5 clients experience <strong>measurable improvement</strong>—especially in finance, stability, and decision-making—without structural changes.</p>
            <h5>Vastu that works with people</h5>
            <p>At Vastu5, the belief is simple:</p>
            <p><strong>Spaces work through people.</strong></p>
            <p>When AUO aligns with the Five Elements, the individual’s inherent nature strengthens. This alignment is what allows growth, clarity, and sustainable success to unfold.</p>
            <P>This is not belief—it is <strong>tested, applied, and proven practice</strong>.</p>
          </div>
              
          <button class="vastu-read-btn">Read More</button>

        </div>
      </div>

      <!-- RIGHT IMAGE (FIXED POSITION) -->
      <div class="col-lg-5 col-md-5 col-sm-12">
        <div class="vastu-image-box">
          <img src="images/new/art4.jpeg" alt="About Wealth4U with Vastu" loading="lazy">
        </div>
      </div>

    </div>
  </div>
</div>

<div class="swikar-about-section" style="background: linear-gradient(135deg, #ff6c29 0%, #FFCB79 40%, #FFF3B0 70%, #faea8e 100%);">
  <div class="container">
    
    <div class="row" style="padding:70px 0px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ast_heading text-center mb-5">
                <h2 class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.2s">Planets, Objects<span> & Space</span></h2>

                <!-- UNDERLINE IMAGE -->
                 <img src="images/new/underline1.png" alt="Heading underline" class="heading-underline wow animate__animated animate__fadeInUp" data-wow-delay="0.3s" loading="lazy">

                 <p class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.4s">
                  <strong>Program your space by using Advance techniques of AstroVastu</strong>
                 </p>

            </div>
        </div>
           
      <!-- right CONTENT -->
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="swikar-content-wrap">

          <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.2s">
              At <strong>Vastu5</strong>, Vastu is practiced as a <strong>precise science</strong>, not belief. Here, <strong>planets express themselves through objects placed in a space</strong>. Every item in your home or office—furniture, appliances, décor, storage, tools—carries <strong>planetary energy</strong>. When these objects are aligned correctly, life flows with clarity, stability, and growth. When they are misplaced, planetary imbalance reflects directly in health, finances, relationships, and decision-making. </p>
              <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.3s"><strong>Swikar Sethi</strong>, founder of Vastu5 and a practitioner with over 20 years of experience, calls this process <strong>Vastu Programming</strong>. This programming is not random adjustment—it is a conscious method to align <strong>space with the individual’s Astro chart</strong>. This is where <strong>Astro Vastu</strong> becomes powerful and results-oriented.</p>
              <h5 class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.4s">What is Programming in Astro Vastu?</h5>
              <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.5s"><strong>Programming</strong> means deliberately placing, activating, or correcting objects so that planetary energies start supporting the occupant. In Astro Vastu, planets do not work abstractly—they operate through <strong>objects, metals, colours, shapes, and utilities</strong>. Swikar Sethi programs a space by matching these planetary objects with the <strong>right direction and the person’s horoscope</strong>.</p>
              <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.6s">This is not decoration.</p>
               <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.7s">This is <strong>Astro-MahaVastu programming</strong>.</p>
              
          <div class="swikar-more-text">
            <div style="background:#ffedbd; padding:20px; border-radius:6px;">
            
            <h5>How planets work through objects</h5>
             <p><strong>According to Astro-MahaVastu:</strong></p>
             <p><span class="big-bullet">•</span><strong>Sun</strong> represents authority, leadership, and confidence. Objects like solar panels, electrical main switches (MCB), power backups, authority symbols, and central-focus items carry Sun energy. Improper programming here weakens decision-making and leadership.</p>
             <p><span class="big-bullet">•</span><strong>Moon</strong> governs emotions, comfort, and the mind. Beds, bedding, water items, fabrics, and healing objects reflect Moon energy. Incorrect programming causes emotional instability, anxiety, or sleep disturbances.</p>
             <p><span class="big-bullet">•</span><strong>Mars</strong> signifies fire, courage, discipline, and action. Fire appliances, gym equipment, tools, motors, gas burners, and sharp objects belong to Mars. Wrong programming here leads to anger, accidents, conflicts, or legal stress.</p>
             <p><span class="big-bullet">•</span><strong>Mercury</strong> controls intelligence, communication, business, and networking. Books, stationery, printers, Wi-Fi, phones, plants, musical instruments, and data systems are Mercury objects. Faulty programming results in confusion, delays, miscommunication, or learning issues.</p>
             <p><span class="big-bullet">•</span><strong>Jupiter</strong> governs growth, wisdom, prosperity, and guidance. Oversized objects, gold articles (except jewellery), religious or knowledge-based items represent Jupiter. Weak Jupiter programming stalls growth and financial expansion.</p>
             <p><span class="big-bullet">•</span><strong>Venus </strong> rules comfort, luxury, relationships, beauty, and pleasure. Furniture, décor, jewellery, fashion items, and beauty products belong to Venus. Disturbed Venus programming affects harmony and relationships.</p>
             <p><span class="big-bullet">•</span><strong>Saturn</strong> signifies discipline, storage, karma, and long-term stability. Old objects, antiques, storage cabinets, refrigerators, organisers, and meditative statues come under Saturn. Incorrect programming brings delays and heaviness.</p>
             <p><span class="big-bullet">•</span><strong>Rahu and Ketu</strong> work subtly. Rahu operates through clocks, screens, signboards, indicators, and attention-grabbing objects, while Ketu governs toilets, drainage, disposal items, foundations, and mystical objects. Wrong programming here creates confusion, instability, and sudden disruptions.</p>

            </div>
              <h5 class="wow animate__animated animate__fadeInUp animate__slow pt-4"  data-wow-delay="0.2s">The Vastu5 difference: Programming with Astro chart</h5>  
              <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.3s">What sets <strong>Swikar Sethi of Vastu5</strong> apart is that <strong>programming is always aligned with the client’s Astro chart</strong>. He does not shift objects blindly. He listens to symptoms—financial blocks, authority issues, emotional stress—and programs the space so planetary energies start working for the person.</p>
              <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.4s">This is <strong>Astro Vastu in action</strong>—where astrology becomes visible in space and results follow without demolition.</p>
              <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.5s">At Vastu5, <strong>space is programmed, not guessed</strong>.</p>
              <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.6s">When programming is correct, <strong>the space starts responding automatically</strong>.</p>
              <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.7s">This is Astro Vastu as it is meant to be—<strong>scientific, precise, and proven</strong>.</p>
            </div>
         <center><button class="swikar-read-toggle">Read More</button></center>

        </div>
      </div>

    

    </div>
  </div>
</div>




<div class="vastu5-about-section" style="background: linear-gradient(135deg, #ffffff 0%, #fff8d7 100%);padding:60px 0px">
  <div class="container">
    <div class="row">

      <!-- Heading -->
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ast_heading text-center mb-5">
                <h2 class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.2s">The Five <span>Elements</span></h2>

                <!-- UNDERLINE IMAGE -->
                 <img src="images/new/underline.png" alt="Heading underline" class="heading-underline wow animate__animated animate__fadeInUp" data-wow-delay="0.3s" loading="lazy">

                 <p class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.4s">
                  <strong>How They Shape Our Life and Living Spaces</strong>
                 </p>
            </div>
      </div>

      <!-- Image -->
      <div class="col-lg-5 col-md-5 col-sm-12">
        <div class="vastu5-image-wrap">
          <img src="images/new/art2.jpeg" alt="Vastu5 About" loading="lazy">
        </div>
      </div>

      <!-- Content -->
      <div class="col-lg-7 col-md-7 col-sm-12 mt-4 mt-md-0">
        <div class="vastu5-content-wrap">
            <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.3s">Since ancient times, Indian wisdom has explained life through the concept of the <strong>Five Elements</strong>, also known as Panchatatvas. These five elements are <strong>Space, Water, Air, Fire and Earth</strong>. Everything in this universe—including our body, mind, emotions, and the spaces we live or work in—is made from these elements. They are not just physical substances but subtle energies that influence our daily experiences.</p>
            <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.4s"><strong>Space</strong> is the first element. It represents openness, awareness, and possibility. Without space, nothing can exist. In our life, space relates to clarity, vision, and freedom. When space is blocked—either in the mind or in a building—people feel stuck, confused, or restricted.</p>
            <p class="wow animate__animated animate__fadeInUp animate__slow"  data-wow-delay="0.5s">Then comes <strong>Water</strong>, the element of flow and emotions. Water is connected to calmness, healing, relationships, and clarity. It supports emotional balance and adaptability. When water is balanced, people feel peaceful and emotionally strong. Imbalanced water can lead to emotional instability, fear, confusion, or lack of joy.</p>
           
          <!-- Hidden Text -->
          <div class="vastu5-more-text">
            <p>From water comes <strong>Air</strong>, the element of movement and growth. Air governs breathing, thoughts, communication, creativity, and enthusiasm. Balanced air brings freshness, ideas, and motivation. When air is disturbed, it can create restlessness, anxiety, overthinking, or lack of direction.<p>
            <p>Next is <strong>Fire</strong>, the element of transformation. Fire represents energy, confidence, action, power, and recognition. It helps us digest food, process emotions, and take decisive action in life. Balanced fire brings courage, leadership, and success. Too much or too little fire can result in anger, ego issues, burnout, or lack of motivation.<p>
            <p>Finally, <strong>Earth</strong> is the element of stability and grounding. Earth gives structure, discipline, nourishment, and security. It represents physical health, routine, and long-term stability. Balanced earth creates reliability and strength. If earth is weak, life may feel unstable, finances may fluctuate, and health issues may arise.</p>
            <p>These elements also work inside buildings. Every home or office has all five elements expressed through <strong>directions, shapes, colors, activities, and usage of space</strong>. When the elements are balanced in a building, the space naturally supports health, peace, relationships, and prosperity. When they are disturbed, people experience obstacles, stress, financial issues, or stagnation—often without knowing the cause.</P>
            <p>This <strong>Cycle of Creation and Control</strong>, where each element supports or regulates another. Understanding this cycle allows us to make conscious corrections—both within ourselves and in our surroundings.</p>
            <p>In simple terms, when we live in harmony with the Five Elements, life flows with ease. When we ignore them, imbalance shows up. Awareness and alignment of these elements help us create a balanced life, a supportive environment, and a clearer path toward growth and fulfillment.</p>
          </div>

          <button class="vastu5-read-toggle">Read More</button>

        </div>
      </div>

    </div>
  </div>
</div>



<div class="ast_timer_wrapper ast_toppadder70 ast_bottompadder40">
  <div class="ast_img_overlay"></div>
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ast_heading text-center mb-5">
                <h2 class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.2s">Our <span>Achievements</span></h2>

                <!-- UNDERLINE IMAGE -->
                 <img src="images/new/underline.png" alt="Heading underline" class="heading-underline wow animate__animated animate__fadeInUp" data-wow-delay="0.3s" loading="lazy">

                 <p class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.4s">
                  <strong>We bring years of expertise and practical guidance in Vastu Shastra to help you harmonize your spaces and life</strong>
                 </p>
            </div>
      </div>
      <div class="ast_counter_wrapper row text-center justify-content-center">

       

        <div class="col-lg-3 col-md-3 col-sm-6 col-12 wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.8s">
          <div class="ast_counter">
            <span><img src="images/content/timer_2.png" alt="timer" loading="lazy"></span>
             <h2 class="timer" data-from="0" data-to="20" data-speed="2500">0</h2>
            <h4>Years of Practical Experience</h4>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-12 wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="1s">
          <div class="ast_counter">
            <span><img src="images/content/timer_1.png" alt="timer" loading="lazy"></span>
            <h2 class="timer" data-from="0" data-to="954" data-speed="3000">0</h2>
            <h4>Clients Successfully Guided</h4>
          </div>
        </div>

        
      </div>
    </div>
  </div>
</div>

<!--Vastu Start-->



<!--Services Start-->
<a href="#contact">
<div class="ast_service_wrapper ast_toppadder70 ast_bottompadder50" style="background: linear-gradient(135deg, #ffffff 0%, #fff8d7 100%);">
  <div class="container" id="our_services">
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ast_heading text-center mb-5">
                <h2 class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.2s">Our <span>Services</span></h2>

                <!-- UNDERLINE IMAGE -->
                 <img src="images/new/underline.png" alt="Heading underline" class="heading-underline wow animate__animated animate__fadeInUp" data-wow-delay="0.3s" loading="lazy">

                 <p class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.4s">
                  <strong>We bring years of expertise and practical guidance in Vastu Shastra to help you harmonize your spaces and life</strong>
                 </p>
            </div>
      </div>
    <div class="row justify-content-center"> <!-- Added justify-content-center -->

      <div class="col-lg-4 col-md-4 col-sm-6 col-12 wow animate__animated animate__fadeInLeft" data-wow-delay="0.2s">
        <div class="ast_service_box">
          <img src="images/new/s2.jpg" alt="Residential Vastu Consultation service" loading="lazy">
          <h4>Residential Vastu Consultation</h4>
          
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-6 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
        <div class="ast_service_box">
          <img src="images/new/s1.jpg" alt="Commercial and Office Vastu service" loading="lazy">
          <h4>Commercial & Office Vastu</h4>
         
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-6 col-12 wow animate__animated animate__fadeInRight" data-wow-delay="0.2s">
        <div class="ast_service_box">
          <img src="images/new/s3.png" alt="Industrial and Factory Vastu service" loading="lazy">
          <h4>Industrial & Factory Vastu</h4>
        </div>
      </div>

      <!-- Extra services will automatically wrap and be centered -->
      <div class="col-lg-4 col-md-4 col-sm-6 col-12 wow animate__animated animate__fadeInLeft" data-wow-delay="0.2s">
        <div class="ast_service_box">
          <img src="images/new/s4.jpg" alt="Plot and land selection vastu service" loading="lazy">
          <h4>Plot & Land Selection</h4>
          
        </div>
      </div>

	  <div class="col-lg-4 col-md-4 col-sm-6 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
        <div class="ast_service_box">
          <img src="images/new/s5.jpg" alt="Vastu corrections service" loading="lazy">
          <h4>Vastu Corrections</h4>
        </div>
      </div>
	 

	    <div class="col-lg-4 col-md-4 col-sm-6 col-12 wow animate__animated animate__fadeInRight" data-wow-delay="0.2s">
        <div class="ast_service_box">
          <img src="images/new/service_img.jpeg" alt="Online and on-site vastu consultation service" loading="lazy">
          <h4>Online & On-site Consultations</h4>
          
        </div>
      </div>
    </div>
  </div>
</div>
</a>
<!--Services End-->

<!--WhyWe Us Start-->
<div class="ast_whywe_wrapper ast_toppadder70 ast_bottompadder70 why-unique"
     style="background: linear-gradient(135deg, #ff6c29 0%, #FFCB79 40%, #FFF3B0 70%, #faea8e 100%);";>
  <div class="container">

    <div class="row align-items-center  why-grid" style="justify-content:space-evenly;">

      <!-- LEFT IMAGE -->
     <!-- LEFT IMAGE -->
<div class="col-lg-4 col-md-12 col-sm-12 mb-4 mb-lg-0">
  <div class="why-image-wrapper">

    <!-- Single Image -->
    <div class="why-image single wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.2s">
      <img src="images/new/about2.jpg" alt="Vastu Consultant" loading="lazy">
    </div>

  </div>
</div>



      <!-- RIGHT CONTENT -->
      <div class="col-lg-7 col-md-12 col-sm-12">

        <div class="ast_heading text-start mb-4">
          <h2 class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.2s">Why <span>Choose Me</span></h2>
          <img src="images/new/underline1.png" alt="Heading underline" class="heading-underline why-choose wow animate__animated animate__fadeInUp" data-wow-delay="0.3s" loading="lazy">
         <p class="why-desc wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.4s" style="width:100%;text-align:left">
            At <strong>Wealth4U with Vastu</strong>, I blend traditional Vastu wisdom with
            scientific understanding to deliver practical, ethical, and result-oriented solutions —
            without unnecessary demolition.
          </p>
        </div>

        <!-- Feature Cards -->
        <div class="row g-4">

          <div class="col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
            <div class="why-card horizontal">
              <span class="why-icon"> <i class="fa fa-home text-white" ></i></span>
              <div>
                <h4>No Unnecessary Demolition</h4>
                <p>Effective corrections without breaking or structural changes.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.8s">
            <div class="why-card horizontal">
              <span class="why-icon"><i class="fa fa-puzzle-piece text-white"></i></span>
              <div>
                <h4>Practical Remedies</h4>
                <p>Simple, easy-to-follow solutions for daily life.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay="2s">
            <div class="why-card horizontal">
              <span class="why-icon"><i class="fa fa-balance-scale text-white"></i></span>
              <div>
                <h4>Traditional + Scientific</h4>
                <p>Ancient Vastu applied with modern understanding.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay="3s">
            <div class="why-card horizontal">
              <span class="why-icon"><i class="fa fa-user text-white"></i></span>
              <div>
                <h4>Personalized Consultation</h4>
                <p>Solutions designed specifically for your space.</p>
              </div>
            </div>
          </div>

          <div class="col-md-12 wow animate__animated animate__fadeInUp" data-wow-delay="4s">
            <div class="why-card horizontal">
              <span class="why-icon"> <i class="fa fa-lock text-white"></i></span>
              <div>
                <h4>Ethical & Confidential</h4>
                <p>Complete privacy, honesty, and result-oriented guidance.</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

  </div>
</div>
<style>
	/* Left Image */
/* ============================= */
/* LEFT IMAGE – DOUBLE IMAGE */
/* ============================= */
.why-image-wrapper {
  position: relative;
  max-width: 100%;
}

.why-image.single img {
   /* adjust size if needed */
  border-radius: 14px;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
}

/* ============================= */
/* MOBILE FIX */
/* ============================= */
@media (max-width: 991px) {
  .why-image.small {
    position: relative;
    width: 70%;
    bottom: 0;
    right: 0;
    margin: 20px auto 0;
  }
}


/* Description */


/* Horizontal Cards */
.why-card.horizontal {
  display: flex;
  align-items: flex-start;
  gap: 15px;
  background: #fff;
  padding: 22px 20px;
  border-radius: 18px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.08);
  transition: all 0.4s ease;
}

.why-card.horizontal:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 45px rgba(0,0,0,0.15);
}

/* Icons */
.why-icon {
  min-width: 55px;
  height: 55px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 26px;
  background: linear-gradient(135deg, #FFB980, #FFE6B3);
  color: #4b2f14;
}

/* Text */
.why-card h4 {
  font-size: 17px;
  margin-bottom: 5px;
  color: #3b2d1f;
}

.why-card p {
  font-size: 14px;
  margin: 0;
  color: #6b4f3a;
}

/* Mobile */
@media (max-width: 991px) {
  .ast_heading.text-start {
    text-align: center !important;
  }
}
/* ============================= */
/* RIGHT SIDE – ATTRACTIVE LAYOUT */
/* ============================= */

.why-grid {
  position: relative;
}

/* Card Base */
.why-card.horizontal {
  display: flex;
  align-items: flex-start;
  gap: 18px;
  background: linear-gradient(135deg, #ffffff, #fffaf3);
  padding: 24px 22px;
  border-radius: 20px;
  border: 1px solid rgba(255,185,128,0.25);
  box-shadow: 0 12px 35px rgba(0,0,0,0.08);
  transition: all 0.35s ease;
  height: 100%;
}

/* Hover Effect */
.why-card.horizontal:hover {
  transform: translateY(-6px);
  box-shadow: 0 22px 50px rgba(0,0,0,0.16);
  border-color: #FFB980;
}

/* Icon Styling */
.why-icon {
  min-width: 60px;
  height: 60px;
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 28px;
  background: linear-gradient(135deg, #fea13c, #ff2c2c);
  color: #3b240f;
  box-shadow: 0 8px 18px rgba(255,152,0,0.35);
}

/* Text Styling */
.why-card h4 {
  font-size: 18px;
  margin-bottom: 6px;
  font-weight: 600;
  color: #2f2217;
}

.why-card p {
  font-size: 14.5px;
  line-height: 1.6;
  margin: 0;
  color: #6b4f3a;
}

/* Make last card stand out */
.col-md-12 .why-card {
  background: linear-gradient(135deg, #fff7ea, #ffffff);
  border-left: 6px solid #FF9800;
}

/* Heading Improvement */
.ast_heading h1 {
  font-size: 38px;
  font-weight: 700;
}

.ast_heading span {
  color: #FF9800;
}

.why-desc {
  font-size: 15.5px;
  color: #5f4633;
  margin-top: 10px;
}

/* ============================= */
/* MOBILE OPTIMIZATION */
/* ============================= */
@media (max-width: 991px) {
  .why-card.horizontal {
    align-items: center;
    text-align: left;
  }

  .why-icon {
    min-width: 52px;
    height: 52px;
    font-size: 24px;
  }

  .ast_heading.text-start {
    text-align: center !important;
  }
}

</style>
<!--WhyWe Us End------------------------------------------------------------------------------------------------->


<!-- TESTIMONIAL SECTION -->
<section class="ast_testimonial_wrapper ast_toppadder70 ast_bottompadder70" style="position: relative;background: linear-gradient(135deg, #ffffff 0%, #fff8d7 100%);">
  <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ast_heading text-center mb-5">
                <h2 class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.2s">Our <span>Clients Trust Me</span></h2>

                <!-- UNDERLINE IMAGE -->
                 <img src="images/new/underline.png" alt="Heading underline" class="heading-underline wow animate__animated animate__fadeInUp" data-wow-delay="0.3s" loading="lazy">

                 <p class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.4s">
                  <strong>Genuine feedback from people who experienced positive change</strong>
                 </p>
            </div>
    </div>
    
    <div class="testimonial-slider">

  <!-- Slide 1 -->
  <div class="testimonial-slide active">
    <div class="testimonial-glass">
      <i class="fa fa-quote-left quote-icon"></i>
      <p class="testimonial-text">
        After following the Vastu corrections, my business growth improved
        significantly within months. Highly practical guidance.
      </p>
      <div class="testimonial-user">
        <div class="user-avatar">R</div>
        <div>
          <h5>Ramesh Kumar</h5>
          <span>Business Owner</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Slide 2 -->
  <div class="testimonial-slide">
    <div class="testimonial-glass">
      <i class="fa fa-quote-left quote-icon"></i>
      <p class="testimonial-text">
        No demolition, no fear — just simple changes with powerful results.
        Peace and positivity returned to our home.
      </p>
      <div class="testimonial-user">
        <div class="user-avatar">S</div>
        <div>
          <h5>Sunitha Devi</h5>
          <span>Homemaker</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Slide 3 -->
  <div class="testimonial-slide">
    <div class="testimonial-glass">
      <i class="fa fa-quote-left quote-icon"></i>
      <p class="testimonial-text">
        Ethical, confidential and deeply knowledgeable.
        I strongly recommend Wealth4U with Vastu.
      </p>
      <div class="testimonial-user">
        <div class="user-avatar">A</div>
        <div>
          <h5>Anand Raj</h5>
          <span>IT Professional</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Slide 4 (NEW) -->
  <div class="testimonial-slide">
    <div class="testimonial-glass">
      <i class="fa fa-quote-left quote-icon"></i>
      <p class="testimonial-text">
        Career obstacles reduced and clarity improved.
        The guidance was very practical and reassuring.
      </p>
      <div class="testimonial-user">
        <div class="user-avatar">M</div>
        <div>
          <h5>Meena Shankar</h5>
          <span>HR Manager</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Slide 5 (NEW) -->
  <div class="testimonial-slide">
    <div class="testimonial-glass">
      <i class="fa fa-quote-left quote-icon"></i>
      <p class="testimonial-text">
        From stress to stability — the changes really worked.
        Thank you for such ethical consultation.
      </p>
      <div class="testimonial-user">
        <div class="user-avatar">K</div>
        <div>
          <h5>Karthik R</h5>
          <span>Entrepreneur</span>
        </div>
      </div>
    </div>
  </div>

</div>


    <div class="testimonial-dots">
  <span class="dot active" onclick="goSlide(0)"></span>
  <span class="dot" onclick="goSlide(1)"></span>
  <span class="dot" onclick="goSlide(2)"></span>
  <span class="dot" onclick="goSlide(3)"></span>
  <span class="dot" onclick="goSlide(4)"></span>
</div>

    <!-- Bottom-right decorative image -->
   <div class="testimonial-corner-img">
     <img src="images/new/test.png" alt="Vastu" loading="lazy" />
   </div>
  </div>
  

</section>

<style>

.testimonial-sub {
  font-size: 15px;
  color: #6b4f3a;
}

/* Slider */
.testimonial-slider {
  max-width: 680px;
  margin: auto;
}

/* Slide */
.testimonial-slide {
  display: none;
  animation: slideFade 0.9s ease;
}

.testimonial-slide.active {
  display: block;
}

@keyframes slideFade {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* SAME HEIGHT CARD */
.testimonial-glass {
  min-height: 360px; /* 🔥 SAME HEIGHT */
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  text-align: center;

  background: rgba(255, 255, 255, 0.6);
  backdrop-filter: blur(10px);
  border-radius: 22px;
  padding: 36px 28px;
  box-shadow: 0 18px 40px rgba(0,0,0,0.12);
  border: 1px solid rgba(255,255,255,0.4);
}

.testimonial-glass.active {
  border: 2px solid #FF9800;
}

/* Quote */
.quote-icon {
  font-size: 34px;
  color: #FF9800;
  margin-bottom: 18px;
}

/* Text */
.testimonial-text {
  flex-grow: 1; /* 🔥 push user section down */
  font-size: 15px;
  line-height: 1.8;
  color: #3f2d1c;
}

/* User */
.testimonial-user {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
  margin-top: 20px;
}

.user-avatar {
  width: 52px;
  height: 52px;
  background: linear-gradient(135deg, #fea13c, #ff2c2c);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
}

/* Dots */
.testimonial-dots {
  margin-top: 28px;
  text-align: center;
}

.dot {
  width: 12px;
  height: 12px;
  background: #ffcc80;
  border-radius: 50%;
  display: inline-block;
  margin: 0 6px;
  cursor: pointer;
}

.dot.active {
  background: #ff4d00ff;
  transform: scale(1.3);
}
.testimonial-corner-img {
  position: absolute;
  bottom: 0;
  right: 0;
  width: 100%; /* adjust size */
  max-width: 25%;
  z-index: 1;
  overflow: hidden;
  opacity: 0.85;
  pointer-events: none; /* so it won't block slider clicks */
}

.testimonial-corner-img img {
  width: 100%;
  transform-origin: center center; /* rotate around the center */
  animation: rotateClock 20s linear infinite; /* continuous clockwise rotation */
}

@keyframes rotateClock {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}


/* Make responsive for small screens */
@media (max-width: 768px) {
  .testimonial-corner-img {
    width: 120px;
  }
}

/* Mobile */
@media (max-width: 768px) {
  .testimonial-glass {
    min-height: 390px;
  }

  .testimonial-title {
    font-size: 30px;
  }
}


</style>
<script>
let currentSlide = 0;
const testimonialSlides = document.querySelectorAll(".testimonial-slide");
const testimonialDots = document.querySelectorAll(".dot");

function showSlide(index) {
  testimonialSlides.forEach((s, i) => {
    s.classList.toggle("active", i === index);
    testimonialDots[i].classList.toggle("active", i === index);
  });
}

function nextSlide() {
  currentSlide = (currentSlide + 1) % testimonialSlides.length;
  showSlide(currentSlide);
}

// Auto-rotate every 5 seconds
setInterval(nextSlide, 5000);

// Dot click
function goSlide(index) {
  currentSlide = index;
  showSlide(currentSlide);
}

// Initialize first slide
showSlide(currentSlide);
</script>

<!-- end ----------------------------------------------------------------------------------------------------------------------->

<div class="ast_timer_wrapper ast_toppadder70 ast_bottompadder40">
  <div class="ast_img_overlay"></div>
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ast_heading text-center mb-5">
                <h2 class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.2s">Get in<span> touch</span></h2>

                <!-- UNDERLINE IMAGE -->
                 <img src="images/new/underline.png" alt="Heading underline" class="heading-underline wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">

                 <p class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.4s">
                  <strong>We are always happy to help. Reach out to us for expert Vastu guidance, consultations, or any queries. Our team will connect with you at the earliest.</strong>
                 </p>
            </div>
      </div>
      <div class="ast_counter_wrapper row text-center">

        <div class="col-lg-4 col-md-3 col-sm-6 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
          <div class="ast_contact_info">
					<span><i class="fa fa-phone" aria-hidden="true"></i></span>
          
            <h4 class="text-white">Phone</h4>
            <h5><a href="tel:9316918385" class="text-white">9316918385</a></h5>
          </div>
        </div>

        <div class="col-lg-4 col-md-3 col-sm-6 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.8s">
          <div class="ast_contact_info">
					 <span><i class="fa fa-envelope-open-o" aria-hidden="true"></i></span>
         
            <h4 class="text-white">Email</h4>
            <h5 class="text-white"><a href="mailto:swikar.sethi@vastu5.com" class="text-white">swikar.sethi@vastu5.com</a></h5>
          </div>
        </div>

        <div class="col-lg-4 col-md-3 col-sm-6 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="1s">
          <div class="ast_contact_info">
					  <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
        
            <h4 class="text-white">Address</h4>
            <h5 class="text-white">Hebbal, Bengaluru, KA</h5>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>

<!--Content Us start-->
<div class="ast_mapnform_wrapper ast_toppadder70" style="    background: linear-gradient(135deg, #ff6c29 0%, #FFCB79 40%, #FFF3B0 70%, #faea8e 100%);">
	<div class="container">
		<div class="row">
			
       <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ast_heading text-center mb-5">
                <h2 class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.2s">find & message <span>here</span></h2>

                <!-- UNDERLINE IMAGE -->
                 <img src="images/new/underline1.png" alt="Heading underline" class="heading-underline wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">

                 <p class="wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.4s">
                  <strong>Find us on the map or message us directly. We’re always available to help you with expert Vastu advice.</strong>
                 </p>
            </div>
      </div>
		</div>
	</div>
	<div class="ast_contact_map" id="contact">
		<div class="ast_contact_form wow animate__animated animate__fadeInUp animate__slow" data-wow-delay="0.6s">
			<form id="contactForm" action="save_form.php" method="POST" novalidate>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-12">
					<label for="first_name">first name *</label>
					<input type="text" id="first_name" name="first_name" required autocomplete="given-name">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-12">
					<label for="last_name">last name *</label>
					<input type="text" id="last_name" name="last_name" required autocomplete="family-name">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-12">
					<label for="email">email *</label>
					<input type="email" id="email" name="email" required autocomplete="email">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-12">
					<label for="subject">subject *</label>
					<input type="text" id="subject" name="subject" required>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<label for="message">message *</label>
					<textarea rows="5" id="message" name="message" required></textarea>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <label id="captchaQuestion" for="captchaAnswer"></label>
    <input type="text" id="captchaAnswer" required placeholder="Enter answer">
</div>
				<div class="response" role="alert" aria-live="polite"><?php if ($status === 'error') { ?><span style='color:red;'><?php echo htmlspecialchars($reasonMessages[$reason] ?? $reasonMessages['submit'], ENT_QUOTES, 'UTF-8'); ?></span><?php } ?></div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<button class="ast_btn pull-right submitForm" type="submit" form-type="contact">send</button>
				</div>
				</div>
			</form>
		</div>

    

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14778.760606876362!2d77.58786199529595!3d13.034621896582847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae17a295d80a47%3A0x1a3ccbf328b14759!2sHebbal%2C%20Bengaluru%2C%20Karnataka!5e1!3m2!1sen!2sin!4v1765364553571!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>	</div>
</div>
<!--Content Us End-->

<section class="ast_toppadder70 ast_bottompadder70 faq-section" style="margin-top: 36px; background: linear-gradient(135deg, #ffffff 0%, #fff8d7 100%);">
  <div class="container">
    <div class="ast_heading text-center mb-5">
      <h2>Frequently Asked Questions</h2>
      <p><strong>Quick answers about MahaVastu consultations and practical corrections.</strong></p>
    </div>
    <div class="faq-list">
      <div class="faq-item">
        <h4>What is MahaVastu and how does it help in real life?</h4>
        <p>MahaVastu helps align activities, utilities, and objects with directional energy so your space supports better decisions, stability, and daily outcomes.</p>
      </div>
      <div class="faq-item">
        <h4>Do I need demolition for Vastu corrections?</h4>
        <p>In most cases, no. Vastu5 prioritizes non-demolition corrections using practical repositioning and functional alignment.</p>
      </div>
      <div class="faq-item">
        <h4>Can I get business or office Vastu consultation?</h4>
        <p>Yes. Business consultations focus on leadership zones, financial flow, operational clarity, and team productivity through practical MahaVastu methods.</p>
      </div>
    </div>
  </div>
</section>


<!-- Download wrapper removed: empty block created unnecessary gap -->
<!-- Footer wrapper start-->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("contactForm");
    const responseBox = form.querySelector(".response");

    // CAPTCHA
    let num1 = Math.floor(Math.random() * 10) + 1;
    let num2 = Math.floor(Math.random() * 10) + 1;
    let correctAnswer = num1 + num2;

    document.getElementById("captchaQuestion").innerHTML =
        "Captcha: " + num1 + " + " + num2 + " = ?";

    form.addEventListener("submit", function (e) {
        responseBox.innerHTML = "";

        // Required field validation
        const requiredFields = form.querySelectorAll(
            'input[name="first_name"], input[name="last_name"], input[name="email"], input[name="subject"], textarea[name="message"]'
        );

        for (let field of requiredFields) {
            if (field.value.trim() === "") {
                e.preventDefault();
                responseBox.innerHTML =
                    "<span style='color:red;'>All fields are required.</span>";
                field.focus();
                return;
            }
        }

        // Email validation
        let email = form.email.value.trim();
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            e.preventDefault();
            responseBox.innerHTML =
                "<span style='color:red;'>Please enter a valid email address.</span>";
            form.email.focus();
            return;
        }

        // Captcha validation
        let userAnswer = document.getElementById("captchaAnswer").value.trim();
        if (userAnswer === "" || parseInt(userAnswer) !== correctAnswer) {
            e.preventDefault();
            responseBox.innerHTML =
                "<span style='color:red;'>Captcha answer is incorrect.</span>";
            document.getElementById("captchaAnswer").focus();
            return;
        }
    });

});
</script>


<?php include 'require/footer.php'; ?>
