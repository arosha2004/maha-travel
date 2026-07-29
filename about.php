<?php
// about.php - About Us Page
$page_title = "About Us | Maha Lanka Tours";
$current_page = "about";
include_once __DIR__ . '/includes/header.php';
?>

<section style="padding: 140px 0 60px; background: linear-gradient(180deg, var(--dark) 0%, var(--dark-surface) 100%); color: #fff; text-align: center;">
    <div class="container">
        <span class="section-tag" style="background: rgba(255,255,255,0.15); color: var(--accent-light);">Our Story & Commitment</span>
        <h1 class="section-title" style="color: #fff; font-size: 3.25rem;">Crafting <span>Unforgettable Journeys</span></h1>
        <p class="section-desc" style="margin: 0 auto; color: rgba(255,255,255,0.8);">Maha Lanka Tours was founded with a single mission: to showcase the breathtaking beauty, rich heritage, and warm hospitality of Sri Lanka with world-class luxury standards.</p>
    </div>
</section>

<section class="why-section" style="padding: 80px 0;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center;">
            <div>
                <span class="section-tag">Who We Are</span>
                <h2 class="section-title">Passionate Local Experts, <span>Global Luxury Standards</span></h2>
                <p style="color: var(--gray-text); margin-bottom: 20px; font-size: 1.05rem;">
                    For over 12 years, Maha Lanka Tours has curated bespoke luxury itineraries for discerning travelers from around the world. We believe that true luxury lies in authentic connections—savoring Ceylon tea with local plantation workers, standing atop ancient Sigiriya before the crowds arrive, and watching blue whales glide through ocean waters.
                </p>
                <p style="color: var(--gray-text); margin-bottom: 24px; font-size: 1.05rem;">
                    Our fleet of luxury vehicles, private chauffeur guides, and 24/7 concierge team ensure every moment of your vacation is seamless, secure, and extraordinary.
                </p>
                <button class="btn btn-emerald btn-plan-trip">Meet Our Concierge Team</button>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1546708973-b339540b5162?auto=format&fit=crop&w=800&q=80" alt="Maha Lanka Experience" style="border-radius: var(--radius-lg); box-shadow: var(--card-shadow);">
            </div>
        </div>
    </div>
</section>

<section class="why-section" style="padding: 60px 0 100px; background: #f8fafc;">
    <div class="container">
        <div class="section-header" style="text-align: center; justify-content: center; flex-direction: column; align-items: center;">
            <span class="section-tag">Our Pillars</span>
            <h2 class="section-title">The Four <span>Core Promises</span></h2>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🏅</div>
                <h3 class="feature-title">Top 1% Rated Service</h3>
                <p class="feature-desc">Consistently rated 5 stars on TripAdvisor & Google Reviews with 500+ glowing testimonials.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🤝</div>
                <h3 class="feature-title">Private & Tailor-Made</h3>
                <p class="feature-desc">No shared bus tours. 100% private custom itineraries tailored to your pace and preferences.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🌱</div>
                <h3 class="feature-title">Eco & Rainforest Offset</h3>
                <p class="feature-desc">100% carbon-neutral operations supporting rainforest reforestation initiatives in Sinharaja.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💎</div>
                <h3 class="feature-title">Best Price Guarantee</h3>
                <p class="feature-desc">Direct contracts with 5-star hotels and luxury resorts ensuring unbeatable pricing without middleman markups.</p>
            </div>
        </div>
    </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
