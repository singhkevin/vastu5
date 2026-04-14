<?php
declare(strict_types=1);

$page_title = 'Site Update Log | Vastu5';
$page_meta_description = 'Track all recent website updates, fixes, and improvements made on Vastu5.';
$page_canonical = 'https://vastu5.com/log';
$timezone = new DateTimeZone('Asia/Kolkata');

/**
 * Manual changelog ledger.
 * Add a new entry at the top whenever site changes are made.
 */
$changeLogEntries = [
    [
        'timestamp' => '2026-04-14 13:18:00',
        'title' => 'On-page and technical SEO batch applied',
        'items' => [
            'Added robots.txt with sitemap reference and created sitemap.xml for key public pages.',
            'Improved homepage heading hierarchy by reducing multiple H1 tags to section H2 tags.',
            'Updated generic service image alt attributes with descriptive SEO-friendly text.',
            'Added FAQ section on homepage and included FAQPage schema in homepage JSON-LD.',
            'Applied defer loading to non-critical footer JavaScript assets for lighter initial render.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 12:49:00',
        'title' => 'Blog simplified to one MahaVastu article',
        'items' => [
            'Updated blog.php to show only one article card: "MahaVastu for Business and Wealth".',
            'Created a dedicated article page: blog-mahavastu-for-business-and-wealth.php.',
            'Wrote full article content using MahaVastu as the core keyword.',
            'Updated header active-state logic so Blog stays highlighted on the article page.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 12:52:00',
        'title' => 'Log display adjusted to date-only',
        'items' => [
            'Updated /log timestamp rendering to show date only (time hidden) as requested.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 12:39:00',
        'title' => 'Footer visibility restored globally',
        'items' => [
            'Found legacy footer CSS using fixed positioning with negative z-index, causing footer to disappear behind content.',
            'Added global override in css/style.css to keep .ast_footer_wrapper relative and visible on all pages.',
            'Ensured footer remains consistently visible across homepage, log page, and blog page.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 12:22:00',
        'title' => 'Added dedicated Blog page',
        'items' => [
            'Created new blog listing page at /blog (blog.php) with starter article cards.',
            'Added Blog link to desktop and mobile navigation in header.',
            'Added Blog link in footer quick links for easier discovery.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 12:08:00',
        'title' => 'Log policy update + timestamped changelog format',
        'items' => [
            'Updated /log to support dated and timed changelog entries.',
            'Added clear instruction in code comments to prepend every future change entry.',
            'Kept latest deployment/fix history visible in one chronological place.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 11:57:00',
        'title' => 'UX, menu, loader, and stability fixes deployed',
        'items' => [
            'Removed sticky header behavior and improved fixed-header readability.',
            'Fixed mobile menu open/close script failures caused by invalid top-level return usage.',
            'Extended loader visibility and then set loader to show on every page load.',
            'Removed empty spacing section near contact block and cleaned layout gaps.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 11:33:00',
        'title' => 'SEO + form reliability hardening',
        'items' => [
            'Added dynamic meta tags (title/description/canonical/OG/Twitter) and JSON-LD schema support.',
            'Hardened save_form.php with strict typing, validation, and upstream failure handling.',
            'Improved contact form accessibility with labels, required fields, and better error messaging.',
        ],
    ],
];

require __DIR__ . '/../require/header.php';
?>

<section class="ast_toppadder70 ast_bottompadder70" style="background: linear-gradient(135deg, #ffffff 0%, #fff8d7 100%);">
  <div class="container">
    <div class="ast_heading text-center mb-5">
      <h1>Website Update Log</h1>
      <p><strong>Recent fixes and improvements implemented on Vastu5.</strong></p>
    </div>

    <div style="max-width: 980px; margin: 0 auto; background: #fff; border: 1px solid #f3d7a9; border-radius: 12px; padding: 24px;">
      <p style="margin-bottom: 18px; color: #5f4633;">
        <strong>Rule:</strong> Every site change must be added here with date and time stamp.
      </p>

      <?php foreach ($changeLogEntries as $entry) {
          $entryDate = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $entry['timestamp'], $timezone);
          $stamp = $entryDate instanceof DateTimeImmutable ? $entryDate->format('d M Y') : $entry['timestamp'];
          ?>
      <article style="padding: 18px 16px; border: 1px solid #f3e1c0; border-radius: 10px; margin-bottom: 14px; background: #fffdf8;">
        <p style="margin: 0 0 6px; font-size: 13px; color: #8a6b45;"><strong><?php echo htmlspecialchars($stamp, ENT_QUOTES, 'UTF-8'); ?></strong></p>
        <h4 style="margin: 0 0 10px;"><?php echo htmlspecialchars($entry['title'], ENT_QUOTES, 'UTF-8'); ?></h4>
        <ul style="margin-bottom: 0;">
          <?php foreach ($entry['items'] as $item) { ?>
          <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
          <?php } ?>
        </ul>
      </article>
      <?php } ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../require/footer.php'; ?>
