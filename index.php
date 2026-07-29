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
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">✨ Voted Sri Lanka’s Top Boutique Tour Operator 2026</div>
            <h1 class="hero-title">Experience the <span>Resplendent Island</span> in Unmatched Luxury</h1>
            <p class="hero-subtitle">Custom tailor-made itineraries, private 5-star chauffeur guides, authentic local experiences, and 100% carbon-neutral travels across Sri Lanka.</p>
            
            <div style="display: flex; gap: 16px; flex-wrap: wrap;">
                <a href="#packages" class="btn btn-primary">Explore Packages</a>
                <button class="btn btn-outline btn-plan-trip">Build Custom Trip</button>
            </div>
        </div>

        <!-- Floating Search Widget -->
        <div class="search-widget">
            <div class="search-field">
                <label>Destination</label>
                <select name="destination">
                    <option value="">All Regions</option>
                    <option value="sigiriya">Sigiriya & Cultural Triangle</option>
                    <option value="ella">Ella & Hill Country</option>
                    <option value="mirissa">Mirissa & Southern Coast</option>
                    <option value="yala">Yala Wildlife Reserve</option>
                    <option value="kandy">Kandy Sacred City</option>
                </select>
            </div>

            <div class="search-field">
                <label>Experience Type</label>
                <select name="category">
                    <option value="">All Categories</option>
                    <option value="cultural">Cultural Heritage</option>
                    <option value="adventure">Adventure & Nature</option>
                    <option value="beach">Beach & Ocean</option>
                    <option value="wildlife">Wildlife Safari</option>
                    <option value="luxury">Luxury & Honeymoon</option>
                </select>
            </div>

            <div class="search-field">
                <label>Duration</label>
                <select name="duration">
                    <option value="">Any Duration</option>
                    <option value="1-5">1 - 5 Days</option>
                    <option value="6-8">6 - 8 Days</option>
                    <option value="9+">9+ Days</option>
                </select>
            </div>

            <button class="btn btn-emerald search-btn" onclick="document.getElementById('packages').scrollIntoView({behavior: 'smooth'})">
                🔍 Find Tours
            </button>
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
                <p class="section-desc">From misty tea hills to ancient rock fortresses and turquoise coastal bays, discover Sri Lanka’s world-renowned landmarks.</p>
            </div>
            <a href="destinations.php" class="btn btn-outline" style="border-color: var(--primary); color: var(--primary);">View All Destinations →</a>
        </div>

        <div class="destinations-grid">
            <?php foreach (array_slice($destinations, 0, 6) as $dest): ?>
                <div class="destination-card">
                    <img src="<?php echo htmlspecialchars($dest['image']); ?>" alt="<?php echo htmlspecialchars($dest['name']); ?>" loading="lazy">
                    <div class="destination-overlay">
                        <div class="destination-badge"><?php echo htmlspecialchars($dest['category']); ?></div>
                        <div class="destination-content">
                            <span class="dest-region">📍 <?php echo htmlspecialchars($dest['region']); ?></span>
                            <h3 class="dest-title"><?php echo htmlspecialchars($dest['name']); ?></h3>
                            <p class="dest-desc"><?php echo htmlspecialchars($dest['desc']); ?></p>
                        </div>
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

        <!-- Packages Grid -->
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

                        <div class="package-highlights-list">
                            <?php foreach (array_slice($tour['highlights'], 0, 3) as $hl): ?>
                                <span class="highlight-tag">✓ <?php echo htmlspecialchars($hl); ?></span>
                            <?php endforeach; ?>
                        </div>

                        <div class="package-footer">
                            <button class="btn btn-emerald btn-quick-view">Quick View</button>
                            <button class="btn btn-primary btn-plan-trip">Book Now</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
