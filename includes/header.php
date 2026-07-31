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
    <link rel="stylesheet" href="css/responsive.css?v=<?php echo time(); ?>">
    <link rel="icon" href="images/sigiriya_rock.png">
</head>
<body>

    <header class="site-header">
        <div class="container">
            <div class="header-wrapper">
                <a href="index.php" class="brand-logo" style="gap: 12px; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/mlankalogo_transparent.png" alt="Maha Lanka Tours Logo" style="height: 50px; width: auto; transform: scale(2.2); transform-origin: left center;">
                </a>

                <nav class="nav-menu">
                    <button class="mobile-close" aria-label="Close navigation">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                    </button>
                    <a href="index.php" class="nav-link <?php echo ($current_page == 'home') ? 'active' : ''; ?>">
                        Home 
                        <svg class="nav-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                    </a>
                    <a href="destinations.php" class="nav-link <?php echo ($current_page == 'destinations') ? 'active' : ''; ?>">
                        Destinations 
                        <svg class="nav-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                    </a>
                    <a href="about.php" class="nav-link <?php echo ($current_page == 'about') ? 'active' : ''; ?>">
                        About Us 
                        <svg class="nav-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                    </a>
                    <a href="contact.php" class="nav-link <?php echo ($current_page == 'contact') ? 'active' : ''; ?>">
                        Contact 
                        <svg class="nav-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                    </a>
                    <a href="tours.php#packages" class="nav-book-btn" style="margin-top:20px;display:inline-flex;align-items:center;justify-content:center;padding:12px 28px;background:linear-gradient(135deg,#0A192F,#162A45);color:#fff;border-radius:30px;font-weight:700;font-size:0.95rem;text-decoration:none;">Book Now</a>
                </nav>

                <div class="header-actions">
                    <a href="tours.php#packages" class="btn btn-primary" style="border-radius: 30px; padding: 10px 24px; font-weight: 600; text-decoration: none;">Book Now</a>
                    <button class="mobile-toggle" aria-label="Toggle navigation"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="12" x2="20" y2="12"/><line x1="4" y1="6" x2="20" y2="6"/><line x1="4" y1="18" x2="20" y2="18"/></svg></button>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Nav Overlay -->
    <div class="nav-overlay" id="nav-overlay"></div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var toggle = document.querySelector('.mobile-toggle');
        var menu   = document.querySelector('.nav-menu');
        var overlay = document.getElementById('nav-overlay');

        function openMenu() {
            if (menu) menu.classList.add('open');
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMenu() {
            menu.classList.remove('open');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        if (toggle) {
            toggle.addEventListener('click', function() {
                if (menu.classList.contains('open')) {
                    closeMenu();
                } else {
                    openMenu();
                }
            });
        }

        var closeBtn = document.querySelector('.mobile-close');
        if (closeBtn) {
            closeBtn.addEventListener('click', closeMenu);
        }

        if (overlay) {
            overlay.addEventListener('click', closeMenu);
        }

        // Close on nav link click
        var links = document.querySelectorAll('.nav-link');
        links.forEach(function(link) {
            link.addEventListener('click', closeMenu);
        });

        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeMenu();
        });
    });
    </script>
