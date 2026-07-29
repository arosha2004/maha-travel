<?php
// destinations.php - Destination Guide Page
$page_title = "Destinations Guide | Maha Lanka Tours";
$current_page = "destinations";
require_once __DIR__ . '/api/tours_data.php';

$destinations = get_destinations_data();
include_once __DIR__ . '/includes/header.php';
?>

<section style="padding: 140px 0 60px; background: linear-gradient(180deg, var(--dark) 0%, var(--dark-surface) 100%); color: #fff; text-align: center;">
    <div class="container">
        <span class="section-tag" style="background: rgba(255,255,255,0.15); color: var(--accent-light);">Explore Sri Lanka</span>
        <h1 class="section-title" style="color: #fff; font-size: 3.25rem;">Destinations <span>& Wonders</span></h1>
        <p class="section-desc" style="margin: 0 auto; color: rgba(255,255,255,0.8);">Immerse yourself in UNESCO World Heritage sites, tea-blanketed mountain peaks, emerald national parks, and sun-kissed beaches.</p>
    </div>
</section>

<section class="destinations-section" style="padding: 60px 0 100px;">
    <div class="container">
        <div class="destinations-grid">
            <?php foreach ($destinations as $dest): ?>
                <div class="destination-card">
                    <img src="<?php echo htmlspecialchars($dest['image']); ?>" alt="<?php echo htmlspecialchars($dest['name']); ?>" loading="lazy">
                    <div class="destination-overlay">
                        <div class="destination-badge"><?php echo htmlspecialchars($dest['category']); ?></div>
                        <div class="destination-content">
                            <span class="dest-region">📍 <?php echo htmlspecialchars($dest['region']); ?> (Best: <?php echo htmlspecialchars($dest['best_time']); ?>)</span>
                            <h3 class="dest-title"><?php echo htmlspecialchars($dest['name']); ?></h3>
                            <p class="dest-desc"><?php echo htmlspecialchars($dest['desc']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
