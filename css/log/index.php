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
        'timestamp' => '2026-04-20 20:05:00',
        'title' => 'About Swikar: Read More placement fix',
        'items' => [
            'Wrapped bio + expandable + button in a flow-root block so Read More renders after the teaser text (legacy floated paragraphs no longer pull the button to the top).',
        ],
    ],
    [
        'timestamp' => '2026-04-20 19:45:00',
        'title' => 'About Swikar: Read more toggle',
        'items' => [
            'Truncated homepage About Swikar Sethi copy after “very different fortunes.” with the remainder behind Read more / Read less.',
            'Added accessible toggle script in require/footer.php and shared button styling in css/style.css.',
        ],
    ],
    [
        'timestamp' => '2026-04-20 19:15:00',
        'title' => 'New blog: Growth Blueprint (Business Vastu & Astro Vastu)',
        'items' => [
            'Published conversational blog article from client reference material at /growth-blueprint-business-astro-vastu/.',
            'Added second card on /blog/, sitemap entry, and header active-state paths for the new post.',
        ],
    ],
    [
        'timestamp' => '2026-04-20 18:30:00',
        'title' => 'About Us: Swikar Sethi biography refresh',
        'items' => [
            'Rewrote the #about_us section on the homepage with updated professional background, Vastu journey, practice scope, and geography.',
            'Aligned Vastu5 copy and image alt text; updated AUO and Astro Vastu blurbs to reference 22+ years of focused practice for consistency.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 13:13:00',
        'title' => 'Removed .php from public page URLs',
        'items' => [
            'Added clean routes for /blog/, /mahavastu-for-business-and-wealth/, and /success/ using folder index pages.',
            'Added 301 redirects from legacy .php paths to their clean URL equivalents.',
            'Updated header/footer links, blog links, canonical URLs, and sitemap entries to use clean paths only.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 15:22:00',
        'title' => 'Clean URL redirect for /index.php',
        'items' => [
            'Added 301 redirect in index.php so /index.php resolves to /.',
            'Updated Home/logo links to root path (/) instead of index.php.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 15:14:00',
        'title' => 'Cleaned anchor URLs to remove index.php',
        'items' => [
            'Updated About/Services/Contact links in header and footer to use root anchors (e.g. /#about_us).',
            'Updated consultation CTA and form error redirects to root anchor URLs so .php does not appear in navigation URLs.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 15:06:00',
        'title' => 'Loader duration reduced to 2 seconds',
        'items' => [
            'Updated loader timeout in require/footer.php from 4.5 seconds to 2 seconds.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 15:00:00',
        'title' => 'Log grouped by date and sorted latest-first',
        'items' => [
            'Updated changelog rendering to sort by timestamp from latest to oldest.',
            'Grouped entries under each date so all updates for the same day appear together.',
        ],
    ],
    [
        'timestamp' => '2026-04-13 14:49:00',
        'title' => 'Added top padding above log page heading',
        'items' => [
            'Applied top padding to the /log heading block so the title has consistent space from the container edge.',
        ],
    ],
    [
        'timestamp' => '2026-04-13 14:44:00',
        'title' => 'Log page header overlap fix',
        'items' => [
            'Added log-content-shell class to the /log section.',
            'Applied responsive top clearance so log content starts below top header + menu bars.',
        ],
    ],
    [
        'timestamp' => '2026-04-13 14:36:00',
        'title' => 'Added top space above blog article H1',
        'items' => [
            'Applied explicit top padding to blog-article-head so H1 has visible space above it.',
            'Clarified separation between heading block spacing and article card padding.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 14:31:00',
        'title' => 'Blog title/subtitle paragraph spacing fix',
        'items' => [
            'Overrode legacy float-based heading styles for blog article heading block.',
            'Normalized title and subtitle spacing/alignment for clean vertical rhythm.',
            'Removed extra top gap before the first body paragraph in article card.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 14:23:00',
        'title' => 'MahaVastu article layout normalization',
        'items' => [
            'Moved article heading and content into a shared 920px wrapper for consistent width alignment.',
            'Replaced inline article styles with dedicated CSS classes for predictable sizing and spacing.',
            'Added responsive typography and padding rules so all article content fits cleanly on mobile and desktop.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 14:14:00',
        'title' => 'Reduced top gap on blog article section',
        'items' => [
            'Lowered blog-content-shell top margin across breakpoints.',
            'Overrode ast_toppadder70 for blog shell to reduce excessive top padding above article card.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 14:06:00',
        'title' => 'Article heading top padding adjusted',
        'items' => [
            'Increased top padding inside MahaVastu article card to balance heading gap with side spacing.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 14:02:00',
        'title' => 'Reduced blog top offset on mobile',
        'items' => [
            'Lowered mobile blog-content-shell margin-top values to reduce excess top gap while keeping header clearance.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 13:56:00',
        'title' => 'Mobile blog/menu overlap resolved',
        'items' => [
            'Added dedicated blog-content-shell class for blog listing and article pages.',
            'Applied mobile-specific top margin offsets so blog content clears top header + menu bars.',
            'Prevented article text from appearing under the menu region on small screens.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 13:49:00',
        'title' => 'Blog header/content overlap spacing fix',
        'items' => [
            'Added top offset and clear-both behavior to blog listing and article sections.',
            'Ensured blog content starts below the mobile header region instead of visually colliding with it.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 13:42:00',
        'title' => 'FAQ card size and placement normalized',
        'items' => [
            'Replaced inline FAQ card styles with dedicated faq-section / faq-list / faq-item classes.',
            'Added CSS safeguards to prevent inherited float-based styles from stretching FAQ card heights.',
            'Ensured FAQ block uses clean auto height and proper spacing below the map section.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 13:35:00',
        'title' => 'Contact map overlap layout fix',
        'items' => [
            'Resolved map/form overlap behavior by moving contact form into normal flow (non-absolute positioning).',
            'Removed artificial top padding dependency from .ast_contact_map and ensured map iframe scales cleanly.',
            'Added spacing below contact/map wrapper to keep FAQ section visually separated.',
        ],
    ],
    [
        'timestamp' => '2026-04-14 13:28:00',
        'title' => 'FAQ section spacing fix under map',
        'items' => [
            'Added top margin to the FAQ section on homepage so it no longer sticks to the map block above.',
        ],
    ],
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

$sortedEntries = $changeLogEntries;
usort($sortedEntries, static function (array $a, array $b): int {
    return strcmp($b['timestamp'], $a['timestamp']);
});

$groupedEntries = [];
foreach ($sortedEntries as $entry) {
    $entryDate = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $entry['timestamp'], $timezone);
    $dateLabel = $entryDate instanceof DateTimeImmutable ? $entryDate->format('d M Y') : $entry['timestamp'];
    $groupedEntries[$dateLabel][] = $entry;
}

require __DIR__ . '/../require/header.php';
?>

<section class="ast_toppadder70 ast_bottompadder70 log-content-shell" style="background: linear-gradient(135deg, #ffffff 0%, #fff8d7 100%);">
  <div class="container">
    <div class="ast_heading text-center mb-5">
      <h1>Website Update Log</h1>
      <p><strong>Recent fixes and improvements implemented on Vastu5.</strong></p>
    </div>

    <div style="max-width: 980px; margin: 0 auto; background: #fff; border: 1px solid #f3d7a9; border-radius: 12px; padding: 24px;">
      <p style="margin-bottom: 18px; color: #5f4633;">
        <strong>Rule:</strong> Every site change must be added here with date stamp.
      </p>

      <?php foreach ($groupedEntries as $dateLabel => $entriesForDate) { ?>
      <h4 style="margin: 0 0 10px; padding-top: 6px;"><?php echo htmlspecialchars($dateLabel, ENT_QUOTES, 'UTF-8'); ?></h4>
      <?php foreach ($entriesForDate as $entry) { ?>
      <article style="padding: 18px 16px; border: 1px solid #f3e1c0; border-radius: 10px; margin-bottom: 14px; background: #fffdf8;">
        <h4 style="margin: 0 0 10px;"><?php echo htmlspecialchars($entry['title'], ENT_QUOTES, 'UTF-8'); ?></h4>
        <ul style="margin-bottom: 0;">
          <?php foreach ($entry['items'] as $item) { ?>
          <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
          <?php } ?>
        </ul>
      </article>
      <?php } ?>
      <?php } ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../require/footer.php'; ?>
