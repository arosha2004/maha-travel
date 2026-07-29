<?php
// index.php - Maha Lanka Tours Home Page
$page_title = "Maha Lanka Tours | Premier Luxury & Authentic Sri Lanka Travel";
$current_page = "home";
require_once __DIR__ . '/api/tours_data.php';

$tours = get_all_tours();
$destinations = get_destinations_data();
include_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container hero-container">
        <!-- Left Side -->
        <div class="hero-content-left">
            <div class="hero-location-badge">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                <span>Sri Lanka</span>
            </div>
            
            <h1 class="hero-title">The Journey Beyond<br>Your Imaginary</h1>
            
            <p class="hero-subtitle">Discover thousands of beautiful places around the world with wonderful experiences you can imagine.</p>
            
            <div class="hero-buttons">
                <a href="#packages" class="btn btn-explore">Explore Now</a>
                <button class="btn-play">
                    <span class="play-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                    </span>
                    <span class="play-text">Play the video</span>
                </button>
            </div>
            
            <div class="hero-info-cards">
                <div class="info-card">
                    <span class="info-title">Excellence</span>
                    <p class="info-desc">Striving for exceptional quality in every aspect of our service.</p>
                </div>
                <div class="info-card">
                    <span class="info-title">Sustainable</span>
                    <p class="info-desc">Promoting responsible travel practices for a greener future.</p>
                </div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="hero-content-right">
            <div class="hero-image-cards">
                <div class="image-card card-1">
                    <img src="https://images.unsplash.com/photo-1506905925275-2244247509f6?q=80&w=600&auto=format&fit=crop" alt="Lake">
                    <div class="card-location">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <div>
                            <span class="card-loc-name">The Location Name</span>
                            <span class="card-loc-country">Country</span>
                        </div>
                    </div>
                </div>
                


                <div class="image-card card-2">
                    <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=600&auto=format&fit=crop" alt="Mountains">
                    <div class="card-location">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <div>
                            <span class="card-loc-name">The Location Name</span>
                            <span class="card-loc-country">Country</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Socials -->
        <div class="hero-socials">
            <a href="#" class="social-icon">ig</a>
            <a href="#" class="social-icon">fb</a>
            <a href="#" class="social-icon">tw</a>
            <a href="#" class="social-icon">in</a>
        </div>
    </div>
</section>

<!-- Stats Counter Banner -->
<section class="stats-banner">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">5,200+</div>
                <div class="stat-label">Happy Global Travelers</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">99.4%</div>
                <div class="stat-label">5-Star Trip Ratings</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label">Private & Carbon Neutral</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24 / 7</div>
                <div class="stat-label">Dedicated Concierge</div>
            </div>
        </div>
    </div>
</section>

<!-- Highlighted Destinations Grid -->
<section class="destinations-section">
    <div class="container">
        <div class="section-header">
            <div>
                <span class="section-tag">Iconic Wonders</span>
                <h2 class="section-title">Must-Visit <span>Sri Lankan</span> Destinations</h2>
                <p class="section-desc">From misty tea hills to ancient rock fortresses and turquoise coastal bays, discover Sri Lanka's world-renowned landmarks.</p>
            </div>
            <a href="destinations.php" class="btn btn-outline dest-view-all-btn">View All Destinations →</a>
        </div>

        <!-- Destination Cards Grid -->
        <div class="dest-cards-grid">
            <?php
            $dest_icons = [
                '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m8 3 4 8 5-5 5 15H2L8 3z"/></svg>',
                '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/><path d="M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/><path d="M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/></svg>',
                '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="22" x2="21" y2="22"/><line x1="6" y1="18" x2="6" y2="11"/><line x1="10" y1="18" x2="10" y2="11"/><line x1="14" y1="18" x2="14" y2="11"/><line x1="18" y1="18" x2="18" y2="11"/><polygon points="12 2 20 7 4 7 12 2"/></svg>',
                '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A60.4 60.4 0 0 1 2 2a60.4 60.4 0 0 1 18 9 60.4 60.4 0 0 1-9 9Z"/><path d="M2 2l18 18"/></svg>',
                '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>',
                '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>'
            ];
            $dest_tags  = ['Highlands','Coastal','Heritage','Nature','Wildlife','Scenic'];
            foreach (array_slice($destinations, 0, 6) as $i => $dest):
                $icon = $dest_icons[$i % count($dest_icons)];
                $tag  = $dest_tags[$i % count($dest_tags)];
            ?>
            <div class="dest-card <?php echo ($i === 0) ? 'dest-card--featured' : ''; ?>">
                <div class="dest-card__img-wrap">
                    <img src="<?php echo htmlspecialchars($dest['image']); ?>"
                         alt="<?php echo htmlspecialchars($dest['name']); ?>"
                         loading="lazy">
                    <div class="dest-card__overlay"></div>
                </div>
                <div class="dest-card__badge"><?php echo $icon; ?> <?php echo $tag; ?></div>
                <div class="dest-card__body">
                    <h3 class="dest-card__title"><?php echo htmlspecialchars($dest['name']); ?></h3>
                    <div class="dest-card__meta">
                        <span class="dest-card__rating">★ 4.9</span>
                        <span class="dest-card__sep">·</span>
                        <span class="dest-card__count">22 Tours</span>
                    </div>
                    <a href="destinations.php" class="dest-card__cta">Explore <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                </div>
        </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Curated Tour Packages Section -->
<section class="packages-section" id="packages">
    <div class="container">
        <div class="section-header">
            <div>
                <span class="section-tag">Bespoke Itineraries</span>
                <h2 class="section-title">Handcrafted <span>Tour Packages</span></h2>
                <p class="section-desc">Curated by local travel experts with private AC transport, top-tier boutique stays, and authentic insider activities.</p>
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-tabs">
            <button class="tab-btn active" data-category="all"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-2px; margin-right:4px;"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3Z"/></svg> All Packages</button>
            <button class="tab-btn" data-category="cultural"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-2px; margin-right:4px;"><line x1="3" y1="22" x2="21" y2="22"/><line x1="6" y1="18" x2="6" y2="11"/><line x1="10" y1="18" x2="10" y2="11"/><line x1="14" y1="18" x2="14" y2="11"/><line x1="18" y1="18" x2="18" y2="11"/><polygon points="12 2 20 7 4 7 12 2"/></svg> Cultural Heritage</button>
            <button class="tab-btn" data-category="adventure"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-2px; margin-right:4px;"><path d="m8 3 4 8 5-5 5 15H2L8 3z"/></svg> Adventure & Nature</button>
            <button class="tab-btn" data-category="beach"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-2px; margin-right:4px;"><path d="M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/><path d="M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/><path d="M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/></svg> Beach & Ocean</button>
            <button class="tab-btn" data-category="wildlife"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-2px; margin-right:4px;"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg> Wildlife Safari</button>
            <button class="tab-btn" data-category="luxury"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-2px; margin-right:4px;"><path d="M6 3h12l4 6-10 12L2 9z"/><path d="M11 3 8 9l4 12 4-12-3-6"/><path d="M2 9h20"/></svg> Luxury & Romance</button>
        </div>

        <!-- Coverflow Slider — Centered within container -->
        <div class="tours-coverflow-wrap">
            <div class="swiper tours-coverflow-swiper">
                <div class="swiper-wrapper">
                    <?php
                    // Duplicate tours array so Swiper has enough slides for seamless loop (needs >= slidesPerView * 2)
                    $looped_tours = array_merge($tours, $tours);
                    foreach ($looped_tours as $tour): ?>
                        <div class="swiper-slide tour-cf-slide" data-category="<?php echo htmlspecialchars($tour['category_code']); ?>">
                            <div class="tour-cf-card">
                                <div class="tour-cf-img">
                                    <img src="<?php echo htmlspecialchars($tour['image']); ?>" alt="<?php echo htmlspecialchars($tour['title']); ?>" loading="lazy">
                                    <span class="tour-cf-badge"><?php echo htmlspecialchars($tour['badge']); ?></span>
                                    <div class="tour-cf-price">$<?php echo htmlspecialchars($tour['price']); ?><span> / person</span></div>
                                </div>
                                <div class="tour-cf-body">
                                    <div class="tour-cf-meta">
                                        <span class="tour-cf-duration"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-2px; margin-right:4px;"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><?php echo htmlspecialchars($tour['duration']); ?></span>
                                        <span class="tour-cf-rating">★ <?php echo htmlspecialchars($tour['rating']); ?> <em>(<?php echo htmlspecialchars($tour['reviews_count']); ?>)</em></span>
                                    </div>
                                    <h3 class="tour-cf-title"><?php echo htmlspecialchars($tour['title']); ?></h3>
                                    <p class="tour-cf-desc"><?php echo htmlspecialchars($tour['subtitle']); ?></p>
                                    <div class="tour-cf-highlights">
                                        <?php foreach (array_slice($tour['highlights'], 0, 3) as $hl): ?>
                                            <span class="highlight-tag">✓ <?php echo htmlspecialchars($hl); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="tour-cf-footer">
                                        <button class="btn btn-emerald btn-quick-view">Quick View</button>
                                        <button class="btn btn-primary btn-plan-trip">Book Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-prev tcf-prev"></div>
                <div class="swiper-button-next tcf-next"></div>
                <div class="swiper-pagination tcf-dots"></div>
            </div>
        </div>
    </div>
</section>


<!-- Why Choose Maha Lanka Tours -->
<section class="why-section">
    <div class="container">
        <div class="section-header" style="text-align: center; justify-content: center; flex-direction: column; align-items: center;">
            <span class="section-tag">The Maha Advantage</span>
            <h2 class="section-title">Why Travel With <span>Maha Lanka</span></h2>
            <p class="section-desc">We deliver uncompromised luxury, total reliability, and authentic local immersion on every journey.</p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><path d="M9 17h6"/><circle cx="17" cy="17" r="2"/></svg>
                </div>
                <h3 class="feature-title">Private Luxury Vehicles</h3>
                <p class="feature-desc">Travel in pristine air-conditioned SUVs or luxury vans with experienced, government-licensed English-speaking chauffeur guides.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3Z"/></svg>
                </div>
                <h3 class="feature-title">Handpicked Boutique Stays</h3>
                <p class="feature-desc">We personally audit every hotel, tea estate bungalow, and beachfront resort to ensure world-class standards.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                </div>
                <h3 class="feature-title">24/7 Dedicated Concierge</h3>
                <p class="feature-desc">Enjoy peace of mind with a dedicated trip manager reachable via WhatsApp/Call anytime during your stay in Sri Lanka.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A60.4 60.4 0 0 1 2 2a60.4 60.4 0 0 1 18 9 60.4 60.4 0 0 1-9 9Z"/><path d="M2 2l18 18"/></svg>
                </div>
                <h3 class="feature-title">100% Carbon Offset</h3>
                <p class="feature-desc">We plant native trees in Sri Lanka's central rainforest reserves for every kilometer driven on your tour.</p>
            </div>
        </div>
    </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
