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
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/sigiriya_rock.png">
</head>
<body>

    <header class="site-header">
        <div class="container">
            <div class="header-wrapper">
                <a href="index.php" class="brand-logo">
                    <div class="logo-icon">M</div>
                    <div class="logo-text">
                        <span class="logo-title">MAHA LANKA</span>
                        <span class="logo-tagline">Tours & Indulgence</span>
                    </div>
                </a>

                <nav class="nav-menu">
                    <a href="index.php" class="nav-link <?php echo $current_page == 'home' ? 'active' : ''; ?>">Home</a>
                    <a href="tours.php" class="nav-link <?php echo $current_page == 'tours' ? 'active' : ''; ?>">Tour Packages</a>
                    <a href="destinations.php" class="nav-link <?php echo $current_page == 'destinations' ? 'active' : ''; ?>">Destinations</a>
                    <a href="about.php" class="nav-link <?php echo $current_page == 'about' ? 'active' : ''; ?>">About Us</a>
                    <a href="contact.php" class="nav-link <?php echo $current_page == 'contact' ? 'active' : ''; ?>">Contact Us</a>
                </nav>

                <div class="header-actions">
                    <button class="btn btn-primary btn-plan-trip">Plan My Trip</button>
                    <button class="mobile-toggle" aria-label="Toggle navigation">☰</button>
                </div>
            </div>
        </div>
    </header>
