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
            $dest_icons = ['🏔️','🌊','🏯','🌿','🦁','🌅'];
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
            <button class="tab-btn active" data-category="all">✨ All Packages</button>
            <button class="tab-btn" data-category="cultural">🏛️ Cultural Heritage</button>
            <button class="tab-btn" data-category="adventure">🌿 Adventure & Nature</button>
            <button class="tab-btn" data-category="beach">🏖️ Beach & Ocean</button>
            <button class="tab-btn" data-category="wildlife">🐆 Wildlife Safari</button>
            <button class="tab-btn" data-category="luxury">💍 Luxury & Romance</button>
        </div>
    </div>

    <!-- Coverflow Slider — full-width, outside container so cards bleed to edges -->
    <div class="tours-coverflow-wrap">
        <div class="swiper tours-coverflow-swiper">
            <div class="swiper-wrapper">
                <?php foreach ($tours as $tour): ?>
                    <div class="swiper-slide tour-cf-slide" data-category="<?php echo htmlspecialchars($tour['category_code']); ?>">
                        <div class="tour-cf-card">
                            <div class="tour-cf-img">
                                <img src="<?php echo htmlspecialchars($tour['image']); ?>" alt="<?php echo htmlspecialchars($tour['title']); ?>" loading="lazy">
                                <span class="tour-cf-badge"><?php echo htmlspecialchars($tour['badge']); ?></span>
                                <div class="tour-cf-price">$<?php echo htmlspecialchars($tour['price']); ?><span> / person</span></div>
                            </div>
                            <div class="tour-cf-body">
                                <div class="tour-cf-meta">
                                    <span class="tour-cf-duration">⏱️ <?php echo htmlspecialchars($tour['duration']); ?></span>
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
</section>

<!-- Interactive Itinerary Calculator Tool -->
<section class="estimator-section">
    <div class="container">
        <div class="section-header" style="color: #fff; margin-bottom: 32px;">
            <div>
                <span class="section-tag" style="background: rgba(255,255,255,0.15); color: var(--accent-light);">Live Cost Estimator</span>
                <h2 class="section-title" style="color: #fff;">Interactive <span>Trip Quote</span> Calculator</h2>
                <p class="section-desc" style="color: rgba(255,255,255,0.8);">Select your travel duration, group size, and preferred accommodation standard for an instant live estimate.</p>
            </div>
        </div>

        <div class="estimator-box">
            <div class="estimator-controls">
                <div class="control-group">
                    <label>Duration (Days)</label>
                    <div class="range-slider-wrapper">
                        <input type="range" id="est-days" min="3" max="14" value="7">
                        <span class="slider-val" id="val-days">7 Days</span>
                    </div>
                </div>

                <div class="control-group">
                    <label>Number of Travelers</label>
                    <div class="range-slider-wrapper">
                        <input type="range" id="est-travelers" min="1" max="10" value="2">
                        <span class="slider-val" id="val-travelers">2 People</span>
                    </div>
                </div>

                <div class="control-group">
                    <label>Travel & Stay Style</label>
                    <div class="style-selector">
                        <button class="style-btn" data-multiplier="110">Standard<br><span style="font-size:0.75rem; opacity:0.8;">3★ Hotels</span></button>
                        <button class="style-btn active" data-multiplier="150">Premium<br><span style="font-size:0.75rem; opacity:0.8;">4★ Boutique</span></button>
                        <button class="style-btn" data-multiplier="230">Luxury Ultra<br><span style="font-size:0.75rem; opacity:0.8;">5★ Villas</span></button>
                    </div>
                </div>
            </div>

            <div class="estimator-result">
                <div class="quote-label">Estimated Total Package Quote</div>
                <div class="quote-price" id="quote-price-val">$2,100</div>
                <p class="quote-note">Includes 100% private AC vehicle, chauffeur guide, accommodations, breakfast, and all taxes.</p>
                <button class="btn btn-primary btn-plan-trip" style="width: 100%; height: 50px;">Reserve This Estimate</button>
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
                <div class="feature-icon">🚘</div>
                <h3 class="feature-title">Private Luxury Vehicles</h3>
                <p class="feature-desc">Travel in pristine air-conditioned SUVs or luxury vans with experienced, government-licensed English-speaking chauffeur guides.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">✨</div>
                <h3 class="feature-title">Handpicked Boutique Stays</h3>
                <p class="feature-desc">We personally audit every hotel, tea estate bungalow, and beachfront resort to ensure world-class standards.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h3 class="feature-title">24/7 Dedicated Concierge</h3>
                <p class="feature-desc">Enjoy peace of mind with a dedicated trip manager reachable via WhatsApp/Call anytime during your stay in Sri Lanka.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🌱</div>
                <h3 class="feature-title">100% Carbon Offset</h3>
                <p class="feature-desc">We plant native trees in Sri Lanka's central rainforest reserves for every kilometer driven on your tour.</p>
            </div>
        </div>
    </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
