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
            <button class="tab-btn active" data-category="all"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-2px; margin-right:4px;"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3Z"/></svg> All Journeys</button>
            <button class="tab-btn" data-category="cultural"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-2px; margin-right:4px;"><line x1="3" y1="22" x2="21" y2="22"/><line x1="6" y1="18" x2="6" y2="11"/><line x1="10" y1="18" x2="10" y2="11"/><line x1="14" y1="18" x2="14" y2="11"/><line x1="18" y1="18" x2="18" y2="11"/><polygon points="12 2 20 7 4 7 12 2"/></svg> Cultural Heritage</button>
            <button class="tab-btn" data-category="adventure"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-2px; margin-right:4px;"><path d="m8 3 4 8 5-5 5 15H2L8 3z"/></svg> Adventure & Highlands</button>
            <button class="tab-btn" data-category="beach"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-2px; margin-right:4px;"><path d="M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/><path d="M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/><path d="M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/></svg> Coastal & Ocean</button>
            <button class="tab-btn" data-category="wildlife"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-2px; margin-right:4px;"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg> Wildlife Safaris</button>
            <button class="tab-btn" data-category="luxury"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-2px; margin-right:4px;"><path d="M6 3h12l4 6-10 12L2 9z"/><path d="M11 3 8 9l4 12 4-12-3-6"/><path d="M2 9h20"/></svg> Honeymoon & Luxury</button>
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
                            <span><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-2px; margin-right:4px;"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> <?php echo htmlspecialchars($tour['duration']); ?></span>
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
