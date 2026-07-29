<?php
// tours.php - Tour Packages Catalog Page
$page_title = "Curated Tour Packages | Maha Lanka Tours";
$current_page = "tours";
require_once __DIR__ . '/api/tours_data.php';

$tours = get_all_tours();
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Header Banner -->
<section style="padding: 140px 0 60px; background: linear-gradient(180deg, var(--dark) 0%, var(--dark-surface) 100%); color: #fff; text-align: center;">
    <div class="container">
        <span class="section-tag" style="background: rgba(255,255,255,0.15); color: var(--accent-light);">Sri Lanka Bespoke Journeys</span>
        <h1 class="section-title" style="color: #fff; font-size: 3.25rem;">Our Luxury <span>Tour Packages</span></h1>
        <p class="section-desc" style="margin: 0 auto; color: rgba(255,255,255,0.8);">Choose from our handpicked itineraries or let us build a private custom route tailored to your exact dates, interests, and style.</p>
    </div>
</section>

<!-- Tours Content & Filter Section -->
<section class="packages-section" style="padding: 60px 0 100px;">
    <div class="container">
        <!-- Filter Tabs -->
        <div class="filter-tabs" style="justify-content: center; margin-bottom: 48px;">
            <button class="tab-btn active" data-category="all">All Journeys</button>
            <button class="tab-btn" data-category="cultural">🏛️ Cultural Heritage</button>
            <button class="tab-btn" data-category="adventure">🌿 Adventure & Highlands</button>
            <button class="tab-btn" data-category="beach">🏖️ Coastal & Ocean</button>
            <button class="tab-btn" data-category="wildlife">🐆 Wildlife Safaris</button>
            <button class="tab-btn" data-category="luxury">💍 Honeymoon & Luxury</button>
        </div>

        <div class="packages-grid">
            <?php foreach ($tours as $tour): ?>
                <div class="package-card" data-category="<?php echo htmlspecialchars($tour['category_code']); ?>">
                    <div class="package-img-wrapper">
                        <img src="<?php echo htmlspecialchars($tour['image']); ?>" alt="<?php echo htmlspecialchars($tour['title']); ?>" loading="lazy">
                        <span class="package-pill-badge"><?php echo htmlspecialchars($tour['badge']); ?></span>
                        <div class="package-price-tag">$<?php echo htmlspecialchars($tour['price']); ?> <span>/ person</span></div>
                    </div>

                    <div class="package-body">
                        <div class="package-meta">
                            <span>⏱️ <?php echo htmlspecialchars($tour['duration']); ?></span>
                            <div class="package-rating">★ <?php echo htmlspecialchars($tour['rating']); ?> (<?php echo htmlspecialchars($tour['reviews_count']); ?>)</div>
                        </div>

                        <h3 class="package-title"><?php echo htmlspecialchars($tour['title']); ?></h3>
                        <p class="package-desc"><?php echo htmlspecialchars($tour['subtitle']); ?></p>

                        <div style="margin-bottom: 16px;">
                            <strong style="font-size: 0.85rem; color: var(--dark);">Key Highlights:</strong>
                            <ul style="font-size: 0.85rem; color: var(--gray-text); margin-top: 6px;">
                                <?php foreach ($tour['highlights'] as $hl): ?>
                                    <li>✓ <?php echo htmlspecialchars($hl); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="package-footer">
                            <button class="btn btn-emerald btn-quick-view">View Details</button>
                            <button class="btn btn-primary btn-plan-trip">Book Now</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
