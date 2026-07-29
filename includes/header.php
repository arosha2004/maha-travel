<?php
// includes/header.php - Site Navigation & Header
if (!isset($page_title)) {
    $page_title = "Maha Lanka Tours | Luxury & Authentic Sri Lanka Travel";
}
if (!isset($current_page)) {
    $current_page = "home";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover Sri Lanka in luxury & authenticity with Maha Lanka Tours. Custom tailor-made tour packages, expert chauffeur guides, 5-star hotels & 24/7 concierge.">
    <meta name="keywords" content="Sri Lanka Tours, Travel Sri Lanka, Sigiriya, Kandy, Ella Train, Yala Safari, Mirissa Whale Watching, Luxury Travel Sri Lanka">
    <meta name="author" content="Maha Lanka Tours">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="https://images.unsplash.com/photo-1586861635167-e5223aadc9fe?auto=format&fit=crop&w=64&q=80">
</head>
<body>

    <header class="site-header">
        <div class="container">
            <div class="header-wrapper">
                <a href="index.php" class="brand-logo" style="gap: 12px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1"></rect><rect x="14" y="3" width="7" height="7" rx="1"></rect><rect x="14" y="14" width="7" height="7" rx="1"></rect><rect x="3" y="14" width="7" height="7" rx="1"></rect></svg>
                    <span style="font-size: 1.5rem; font-weight: 700; font-family: var(--font-body);">Ventures</span>
                </a>

                <nav class="nav-menu">
                    <a href="destinations.php" class="nav-link <?php echo ($current_page == 'destinations') ? 'active' : ''; ?>">Destination</a>
                    <a href="about.php" class="nav-link <?php echo ($current_page == 'about') ? 'active' : ''; ?>">Services</a>
                    <a href="tours.php" class="nav-link <?php echo ($current_page == 'tours') ? 'active' : ''; ?>">Tour Packages</a>
                    <a href="contact.php" class="nav-link <?php echo ($current_page == 'contact') ? 'active' : ''; ?>">Contact</a>
                </nav>

                <div class="header-actions">
                    <a href="tours.php#packages" class="btn btn-primary" style="border-radius: 30px; padding: 10px 24px; font-weight: 600; text-decoration: none;">Book Now</a>
                    <button class="mobile-toggle" aria-label="Toggle navigation"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="12" x2="20" y2="12"/><line x1="4" y1="6" x2="20" y2="6"/><line x1="4" y1="18" x2="20" y2="18"/></svg></button>
                </div>
            </div>
        </div>
    </header>
