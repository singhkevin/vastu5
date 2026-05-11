<?php
declare(strict_types=1);

if (parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) === '/blog.php') {
    header('Location: /blog/', true, 301);
    exit;
}

$page_title = 'Blog | Vastu5';
$page_meta_description = 'Insights from Vastu5 on home vastu, business vastu, astro-vastu, and practical space alignment.';
$page_canonical = 'https://vastu5.com/blog/';

require __DIR__ . '/require/header.php';
?>

<section class="ast_toppadder70 ast_bottompadder70 blog-content-shell" style="margin-top: 24px; clear: both; background: linear-gradient(135deg, #ffffff 0%, #fff8d7 100%);">
  <div class="container">
    <div class="ast_heading text-center mb-5">
      <h1>Vastu5 Blog</h1>
      <p><strong>Practical insights on MahaVastu, business growth, and space alignment.</strong></p>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
        <article class="ast_service_box" style="height: 100%;">
          <img src="images/new/compass.png" alt="MahaVastu for Business and Wealth" loading="lazy">
          <h4>MahaVastu for Business and Wealth</h4>
          <p>Explore how MahaVastu principles can improve business stability, team clarity, and wealth flow through practical, non-demolition corrections.</p>
          <a class="ast_btn" href="/mahavastu-for-business-and-wealth/">Read Article</a>
        </article>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
        <article class="ast_service_box" style="height: 100%;">
          <img src="images/new/s3.jpg" alt="Business workspace and directional alignment" loading="lazy">
          <h4>The Growth Blueprint: Business Vastu &amp; Astro Vastu</h4>
          <p>Why similar businesses land in different places—and how aligning space with your chart can sharpen finance, decisions, and momentum.</p>
          <a class="ast_btn" href="/growth-blueprint-business-astro-vastu/">Read Article</a>
        </article>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
        <article class="ast_service_box" style="height: 100%;">
          <img src="images/new/s1.jpg" alt="Vastu for New Home" loading="lazy">
          <h4>Vastu for New Home: What to Check Before You Move In</h4>
          <p>A practical guide for homebuyers — how to read your space before you settle in and why checking Vastu alignment early matters.</p>
          <a class="ast_btn" href="/vastu-for-new-home/">Read Article</a>
        </article>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
        <article class="ast_service_box" style="height: 100%;">
          <img src="images/new/s2.jpg" alt="Vastu for Office" loading="lazy">
          <h4>Vastu for Office: Workspace Layout and Business Outcomes</h4>
          <p>Aligning your office with directional energy for better decisions, stronger teams, and consistent growth through practical Office Vastu.</p>
          <a class="ast_btn" href="/vastu-for-office/">Read Article</a>
        </article>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
        <article class="ast_service_box" style="height: 100%;">
          <img src="images/new/s5.jpg" alt="Vastu Remedies Without Demolition" loading="lazy">
          <h4>Vastu Remedies Without Demolition</h4>
          <p>Learn how practical, non-demolition Vastu corrections can fix space issues without breaking walls or major renovations.</p>
          <a class="ast_btn" href="/vastu-remedies-without-demolition/">Read Article</a>
        </article>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/require/footer.php'; ?>
