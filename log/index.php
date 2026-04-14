<?php
declare(strict_types=1);

$page_title = 'Site Update Log | Vastu5';
$page_meta_description = 'Track all recent website updates, fixes, and improvements made on Vastu5.';
$page_canonical = 'https://vastu5.com/log';

require __DIR__ . '/../require/header.php';
?>

<section class="ast_toppadder70 ast_bottompadder70" style="background: linear-gradient(135deg, #ffffff 0%, #fff8d7 100%);">
  <div class="container">
    <div class="ast_heading text-center mb-5">
      <h1>Website Update Log</h1>
      <p><strong>Recent fixes and improvements implemented on Vastu5.</strong></p>
    </div>

    <div style="max-width: 980px; margin: 0 auto; background: #fff; border: 1px solid #f3d7a9; border-radius: 12px; padding: 24px;">
      <h4>Latest Updates</h4>
      <ul style="margin-bottom: 18px;">
        <li>Created blog listing and article pages, with navigation support and article metadata handling.</li>
        <li>Fixed footer visibility issues by correcting footer positioning and stacking context.</li>
        <li>Improved blog hero/breadcrumb spacing to avoid overlap with header and mobile navigation.</li>
        <li>Redesigned mobile header behavior and fixed hamburger menu interactions.</li>
        <li>Removed sticky header behavior on scroll as requested.</li>
        <li>Made fixed-header nav text white for readability when header is in fixed state.</li>
      </ul>

      <h4>Form and Submission Improvements</h4>
      <ul style="margin-bottom: 18px;">
        <li>Hardened <code>save_form.php</code> with strict typing and server-side validation.</li>
        <li>Added robust submission failure handling with clear reason codes and redirect flow.</li>
        <li>Improved contact form field semantics: required labels, proper input types, and autocomplete.</li>
        <li>Removed duplicate/conflicting frontend form validation scripts to prevent runtime errors.</li>
      </ul>

      <h4>SEO and Technical Updates</h4>
      <ul style="margin-bottom: 18px;">
        <li>Added dynamic meta support in header for title, description, canonical, Open Graph, and Twitter tags.</li>
        <li>Added structured data (JSON-LD) for <code>ProfessionalService</code>.</li>
        <li>Fixed Facebook Pixel source URL loading issue.</li>
        <li>Cleaned hidden injected anchor markup from header output.</li>
        <li>Updated internal links in header/footer to valid section routes.</li>
      </ul>

      <h4>UX and Cleanup</h4>
      <ul>
        <li>Increased loader visibility duration and changed loader behavior to show on every page load.</li>
        <li>Removed empty spacer block causing visible layout gap near contact section.</li>
        <li>Cleaned unnecessary local artifacts from project directory (<code>ftp-mirror</code>, audit extract dump, temp files).</li>
      </ul>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../require/footer.php'; ?>
