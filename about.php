<?php
// about.php - About Us Page
$page_title = "About Us | Maha Lanka Tours";
$current_page = "about";
include_once __DIR__ . '/includes/header.php';
?>

<style>
    /* ── About Hero Slideshow ─────────────────────────── */
    .about-hero {
        position: relative;
        height: 90vh;
        min-height: 520px;
        overflow: hidden;
        color: #fff;
        text-align: center;
    }

    /* Each slide image */
    .about-hero .slide {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        opacity: 0;
        transition: opacity 1.2s ease-in-out;
        z-index: 0;
    }
    .about-hero .slide.active {
        opacity: 1;
        z-index: 1;
    }

    /* Text container sits above slides */
    .about-hero .hero-content {
        position: absolute;
        inset: 0;
        z-index: 3;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 20px;
    }

    /* Dot indicators */
    .about-hero .slide-dots {
        position: absolute;
        bottom: 100px;   /* sits just above the glass-stats area */
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
        z-index: 4;
    }
    .about-hero .slide-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255,255,255,0.45);
        border: none;
        cursor: pointer;
        transition: background 0.35s, transform 0.35s;
        padding: 0;
    }
    .about-hero .slide-dot.active {
        background: #fff;
        transform: scale(1.3);
    }

    .hero-title {
        font-family: 'Reey', cursive;
        font-size: 4rem;
        font-weight: normal; /* Script fonts usually look better with normal weight */
        margin-bottom: 20px;
        line-height: 1.2;
    }
    
    .overlapping-cards-wrapper {
        position: relative;
        z-index: 10;
        padding-bottom: 80px;
        background-color: var(--beige-sand); /* Beige background for the lower part starts exactly below hero */
    }
    
    .cards-grid {
        position: relative;
        top: -130px; /* Visually pull the cards up over the hero section */
        margin-bottom: -130px; /* Remove the blank space left behind */
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        padding: 0 20px; /* Ensure cards don't touch edges on smaller screens */
    }

    .info-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-top: 1px solid rgba(255, 255, 255, 0.6);
        border-left: 1px solid rgba(255, 255, 255, 0.6);
        padding: 40px 30px;
        border-radius: var(--radius-md);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        text-align: center;
        transition: var(--transition);
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .info-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 45px rgba(0, 0, 0, 0.15);
        background: rgba(255, 255, 255, 0.25);
    }

    .card-icon-wrapper {
        width: 80px;
        height: 80px;
        background-color: var(--beige-sand); /* Beige background for icon */
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        color: var(--primary); /* Blue icon */
        transition: var(--transition);
    }

    .info-card:hover .card-icon-wrapper {
        background-color: var(--primary);
        color: var(--beige-sand);
    }

    .info-card h3 {
        font-family: var(--font-body);
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: var(--text-dark);
    }

    .info-card p {
        font-family: var(--font-body);
        font-size: 0.95rem;
        color: var(--gray-text);
        line-height: 1.6;
        font-style: italic;
    }
    
    @media (max-width: 991px) {
        .cards-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
    }
    
    @media (max-width: 576px) {
        .cards-grid {
            grid-template-columns: 1fr;
        }
        .hero-title {
            font-size: 3rem;
        }
        .glass-stats-box {
            flex-direction: column;
            gap: 15px;
            padding: 25px 0;
            bottom: -50px;
        }
        .stat-divider {
            width: 50%;
            height: 1px;
        }
    }
    
    /* Glass Stats Box */
    .glass-stats-box {
        position: absolute;
        bottom: 0;
        left: 0;
        z-index: 3;
        background: rgba(10, 18, 35, 0.55); /* Darker frosted glass */
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-top: 1px solid rgba(255, 255, 255, 0.5);
        border-radius: 0 0 var(--radius-lg) var(--radius-lg); /* Match image bottom corners */
        display: flex;
        align-items: center;
        padding: 30px 0;
        width: 100%;
        justify-content: space-evenly;
    }
    
    .stat-item {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;
    }

    .stat-num {
        font-family: var(--font-heading);
        font-size: 2.5rem;
        font-weight: 700;
        color: #F5A94E; /* Light warm orange */
        line-height: 1;
        margin-bottom: 8px;
    }

    .stat-label {
        font-family: var(--font-body);
        font-size: 0.8rem;
        font-weight: 700;
        color: rgba(255, 255, 255, 0.85); /* White labels for contrast */
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    .stat-divider {
        width: 1px;
        height: 50px;
        background-color: rgba(0, 0, 0, 0.15); /* Darker divider */
    }

    /* ── CTA Banner ── */
    .dest-cta-section {
        padding: 80px 24px;
        background: linear-gradient(135deg, var(--primary) 0%, #1a3270 100%);
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .dest-cta-section::before {
        content: '';
        position: absolute;
        top: -100px; right: -100px;
        width: 400px; height: 400px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
        z-index: 1;
    }
    .dest-cta-section::after {
        content: '';
        position: absolute;
        bottom: -60px; left: -60px;
        width: 260px; height: 260px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
        z-index: 1;
    }
    .dest-cta-bg-slider {
        position: absolute;
        inset: 0;
        z-index: 0;
        width: 100%;
        height: 100%;
    }
    .dest-cta-bg-slide {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        opacity: 0;
        animation: fadeCtaSlider 20s infinite;
    }
    .dest-cta-bg-slide:nth-child(1) { animation-delay: 0s; background-image: url('images/hero_sri_lanka.png'); }
    .dest-cta-bg-slide:nth-child(2) { animation-delay: 5s; background-image: url('images/mirissa_beach_whale.png'); }
    .dest-cta-bg-slide:nth-child(3) { animation-delay: 10s; background-image: url('images/kandy_temple.png'); }
    .dest-cta-bg-slide:nth-child(4) { animation-delay: 15s; background-image: url('images/yala_leopard_safari.png'); }

    .dest-cta-bg-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.4);
        z-index: 0;
    }

    @keyframes fadeCtaSlider {
        0%, 20% { opacity: 1; }
        25%, 95% { opacity: 0; }
        100% { opacity: 1; }
    }
    .dest-cta__tag {
        display: inline-block;
        background: rgba(242,181,68,0.2);
        color: #F2B544;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        padding: 6px 16px;
        border-radius: 999px;
        margin-bottom: 18px;
        position: relative;
        z-index: 1;
    }
    .dest-cta__title {
        font-family: var(--font-heading);
        font-size: clamp(1.8rem, 4vw, 2.8rem);
        font-weight: 700;
        color: #fff;
        line-height: 1.2;
        margin-bottom: 16px;
        position: relative;
        z-index: 1;
    }
    .dest-cta__title span { color: #F2B544; font-style: italic; }
    .dest-cta__desc {
        color: rgba(255,255,255,0.8);
        font-size: 1rem;
        max-width: 520px;
        margin: 0 auto 36px;
        line-height: 1.7;
        position: relative;
        z-index: 1;
    }
    .dest-cta__buttons { display: flex; justify-content: center; gap: 16px; flex-wrap: wrap; position: relative; z-index: 1; }
    .dest-cta__btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #F2B544;
        color: #0f172a;
        font-size: 0.95rem;
        font-weight: 700;
        font-family: var(--font-body);
        padding: 14px 32px;
        border-radius: 999px;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(242,181,68,0.4);
    }
    .dest-cta__btn-primary:hover { background: #e0a534; transform: translateY(-2px); box-shadow: 0 8px 28px rgba(242,181,68,0.5); }
    .dest-cta__btn-secondary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(10px);
        color: #fff;
        border: 1px solid rgba(255,255,255,0.3);
        font-size: 0.95rem;
        font-weight: 600;
        font-family: var(--font-body);
        padding: 14px 32px;
        border-radius: 999px;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .dest-cta__btn-secondary:hover { background: rgba(255,255,255,0.2); transform: translateY(-2px); }
</style>

<!-- Hero Section with Slideshow -->
<section class="about-hero" id="about-hero">

    <!-- Slide images -->
    <div class="slide active" style="background-image: url('images/slideshow1/169.jpg');"></div>
    <div class="slide" style="background-image: url('images/slideshow1/368.jpg');"></div>
    <div class="slide" style="background-image: url('images/slideshow1/jerry-kavan-i9eaAR4dWi8-unsplash.jpg');"></div>
    <div class="slide" style="background-image: url('images/slideshow1/wallpaperflare.com_wallpaper (1).jpg');"></div>
    <div class="slide" style="background-image: url('images/slideshow1/wallpaperflare.com_wallpaper (2).jpg');"></div>
    <div class="slide" style="background-image: url('images/slideshow1/wallpaperflare.com_wallpaper.jpg');"></div>

    <!-- Hero text -->
    <div class="hero-content">
        <h1 class="hero-title">We help travelers</h1>
    </div>

    <!-- Dot navigation -->
    <div class="slide-dots" id="slide-dots"></div>

</section>

<script>
(function() {
    const hero   = document.getElementById('about-hero');
    const slides = hero.querySelectorAll('.slide');
    const dotsEl = document.getElementById('slide-dots');
    let current  = 0;
    let timer;

    // Build dots
    slides.forEach((_, i) => {
        const btn = document.createElement('button');
        btn.className = 'slide-dot' + (i === 0 ? ' active' : '');
        btn.setAttribute('aria-label', 'Slide ' + (i + 1));
        btn.addEventListener('click', () => goTo(i));
        dotsEl.appendChild(btn);
    });

    const dots = dotsEl.querySelectorAll('.slide-dot');

    function goTo(n) {
        slides[current].classList.remove('active');
        dots[current].classList.remove('active');
        current = (n + slides.length) % slides.length;
        slides[current].classList.add('active');
        dots[current].classList.add('active');
    }

    function next() { goTo(current + 1); }

    function startTimer() {
        clearInterval(timer);
        timer = setInterval(next, 5000);
    }

    startTimer();
})();
</script>

<!-- Overlapping Cards Section -->
<div class="overlapping-cards-wrapper">
    <div class="container" style="max-width: 1100px;">
        <div class="cards-grid">
            <!-- Card 1 -->
            <div class="info-card">
                <div class="card-icon-wrapper">
                    <!-- Suitcase icon -->
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                </div>
                <h3>Travel</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit nullam nunc justo sagittis suscipit ultrices.</p>
            </div>
            
            <!-- Card 2 -->
            <div class="info-card">
                <div class="card-icon-wrapper">
                    <!-- Airplane icon -->
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.2-1.1.6L3 8l6 5-4 4-3-1-1 1 3 3 3 3 1-1-1-3 4-4 5 6l1.2-.7c.4-.2.7-.6.6-1.1z"></path>
                    </svg>
                </div>
                <h3>Benefits</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit nullam nunc justo sagittis suscipit ultrices.</p>
            </div>
            
            <!-- Card 3 -->
            <div class="info-card">
                <div class="card-icon-wrapper">
                    <!-- First Aid / Med-kit / Heart icon -->
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 7H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
                        <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"></path>
                        <path d="M12 11v6"></path>
                        <path d="M9 14h6"></path>
                    </svg>
                </div>
                <h3>About Us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit nullam nunc justo sagittis suscipit ultrices.</p>
            </div>
            
            <!-- Card 4 -->
            <div class="info-card">
                <div class="card-icon-wrapper">
                    <!-- Map/Pins icon -->
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                </div>
                <h3>Awards</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit nullam nunc justo sagittis suscipit ultrices.</p>
            </div>
        </div>
    </div>
</div>

<!-- Story Section -->
<section style="padding: 80px 0; background-color: var(--bg-white);">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center;">
            <div>
                <span class="section-tag" style="color: var(--primary); font-weight: 600; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 10px;">Who We Are</span>
                <h2 class="section-title" style="color: var(--text-dark); margin-bottom: 25px; font-size: 2.5rem; line-height: 1.2;">Passionate Local Experts, <br><span style="color: var(--primary);">Global Luxury Standards</span></h2>
                <p style="color: var(--gray-text); margin-bottom: 20px; font-size: 1.05rem;">
                    For over 12 years, Maha Lanka Tours has curated bespoke luxury itineraries for discerning travelers from around the world. We believe that true luxury lies in authentic connections—savoring Ceylon tea with local plantation workers, standing atop ancient Sigiriya before the crowds arrive, and watching blue whales glide through ocean waters.
                </p>
                <p style="color: var(--gray-text); margin-bottom: 30px; font-size: 1.05rem;">
                    Our fleet of luxury vehicles, private chauffeur guides, and 24/7 concierge team ensure every moment of your vacation is seamless, secure, and extraordinary.
                </p>
                <a href="contact.php" class="btn" style="background-color: var(--primary); color: #fff; padding: 12px 30px; border-radius: var(--radius-full); font-weight: 600; display: inline-block;">Meet Our Concierge Team</a>
            </div>
            <div style="position: relative;">
                <div style="position: absolute; top: -20px; right: -20px; bottom: 20px; left: 20px; background-color: var(--beige-sand); border-radius: var(--radius-lg); z-index: 1;"></div>
                <img src="images/sri_lanka_tea_estate.png" alt="Maha Lanka Experience" style="position: relative; z-index: 2; border-radius: var(--radius-lg); box-shadow: var(--card-shadow); width: 100%; height: 100%; object-fit: cover; aspect-ratio: 4/3; display: block;">
                
                <!-- Glass Stats Box -->
                <div class="glass-stats-box">
                    <div class="stat-item">
                        <span class="stat-num">12+</span>
                        <span class="stat-label">Years Exp</span>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <span class="stat-num">500+</span>
                        <span class="stat-label">Happy Clients</span>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <span class="stat-num">100%</span>
                        <span class="stat-label">Tailor-Made</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pillars Section -->
<section style="padding: 100px 0; background: var(--beige-sand);">
    <div class="container">
        <div class="section-header" style="text-align: center; justify-content: center; flex-direction: column; align-items: center; margin-bottom: 60px;">
            <span class="section-tag" style="color: var(--primary); font-weight: 600; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 10px;">Our Pillars</span>
            <h2 class="section-title" style="color: var(--text-dark); font-size: 2.5rem;">The Four <span style="color: var(--primary);">Core Promises</span></h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
            <div style="background: #fff; padding: 40px 30px; border-radius: var(--radius-md); box-shadow: 0 10px 30px rgba(0,0,0,0.03); text-align: center; transition: var(--transition);" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
                <div style="width: 70px; height: 70px; background: rgba(46, 79, 158, 0.1); color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                </div>
                <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 15px; color: var(--text-dark);">Top 1% Rated Service</h3>
                <p style="color: var(--gray-text); font-size: 0.95rem;">Consistently rated 5 stars on TripAdvisor & Google Reviews with 500+ glowing testimonials.</p>
            </div>
            <div style="background: #fff; padding: 40px 30px; border-radius: var(--radius-md); box-shadow: 0 10px 30px rgba(0,0,0,0.03); text-align: center; transition: var(--transition);" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
                <div style="width: 70px; height: 70px; background: rgba(46, 79, 158, 0.1); color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 15px; color: var(--text-dark);">Private & Tailor-Made</h3>
                <p style="color: var(--gray-text); font-size: 0.95rem;">No shared bus tours. 100% private custom itineraries tailored to your pace and preferences.</p>
            </div>
            <div style="background: #fff; padding: 40px 30px; border-radius: var(--radius-md); box-shadow: 0 10px 30px rgba(0,0,0,0.03); text-align: center; transition: var(--transition);" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
                <div style="width: 70px; height: 70px; background: rgba(46, 79, 158, 0.1); color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A60.4 60.4 0 0 1 2 2a60.4 60.4 0 0 1 18 9 60.4 60.4 0 0 1-9 9Z"/><path d="M2 2l18 18"/></svg>
                </div>
                <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 15px; color: var(--text-dark);">Eco & Rainforest Offset</h3>
                <p style="color: var(--gray-text); font-size: 0.95rem;">100% carbon-neutral operations supporting rainforest reforestation initiatives in Sinharaja.</p>
            </div>
            <div style="background: #fff; padding: 40px 30px; border-radius: var(--radius-md); box-shadow: 0 10px 30px rgba(0,0,0,0.03); text-align: center; transition: var(--transition);" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
                <div style="width: 70px; height: 70px; background: rgba(46, 79, 158, 0.1); color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3h12l4 6-10 12L2 9z"/><path d="M11 3 8 9l4 12 4-12-3-6"/><path d="M2 9h20"/></svg>
                </div>
                <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 15px; color: var(--text-dark);">Best Price Guarantee</h3>
                <p style="color: var(--gray-text); font-size: 0.95rem;">Direct contracts with 5-star hotels and luxury resorts ensuring unbeatable pricing without middleman markups.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════ TESTIMONIALS ═══════════════ -->
<style>
    /* ── Testimonials Section ─────────────────────────── */
    .testimonials-section {
        padding: 100px 0;
        background: linear-gradient(160deg, #0f1f45 0%, #1a3270 50%, #0f1f45 100%);
        position: relative;
        overflow: hidden;
    }
    .testimonials-section::before {
        content: '';
        position: absolute;
        top: -200px; right: -200px;
        width: 600px; height: 600px;
        background: radial-gradient(circle, rgba(242,181,68,0.08) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }
    .testimonials-section::after {
        content: '';
        position: absolute;
        bottom: -150px; left: -150px;
        width: 450px; height: 450px;
        background: radial-gradient(circle, rgba(255,255,255,0.04) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .testimonials-header {
        text-align: center;
        margin-bottom: 60px;
        position: relative;
        z-index: 1;
    }
    .testimonials-tag {
        display: inline-block;
        background: rgba(242,181,68,0.18);
        color: #F2B544;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        padding: 6px 18px;
        border-radius: 999px;
        margin-bottom: 16px;
        border: 1px solid rgba(242,181,68,0.3);
    }
    .testimonials-title {
        font-family: var(--font-heading);
        font-size: clamp(1.8rem, 3.5vw, 2.6rem);
        font-weight: 700;
        color: #fff;
        line-height: 1.25;
        margin-bottom: 14px;
    }
    .testimonials-title span { color: #F2B544; font-style: italic; }
    .testimonials-subtitle {
        color: rgba(255,255,255,0.65);
        font-size: 1rem;
        max-width: 480px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* Grid */
    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        position: relative;
        z-index: 1;
    }
    @media (max-width: 991px) {
        .testimonials-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 600px) {
        .testimonials-grid { grid-template-columns: 1fr; }
    }

    /* Card */
    .testi-card {
        background: rgba(255,255,255,0.07);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(255,255,255,0.13);
        border-top: 1px solid rgba(255,255,255,0.28);
        border-left: 1px solid rgba(255,255,255,0.28);
        border-radius: 20px;
        padding: 36px 32px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        transition: transform 0.35s ease, box-shadow 0.35s ease, background 0.35s ease;
        cursor: default;
    }
    .testi-card:hover {
        transform: translateY(-8px);
        background: rgba(255,255,255,0.12);
        box-shadow: 0 24px 48px rgba(0,0,0,0.35);
    }

    /* Featured card accent */
    .testi-card.featured {
        border-color: rgba(242,181,68,0.45);
        border-top-color: rgba(242,181,68,0.7);
        border-left-color: rgba(242,181,68,0.7);
        background: rgba(242,181,68,0.08);
    }
    .testi-card.featured:hover {
        background: rgba(242,181,68,0.14);
        box-shadow: 0 24px 48px rgba(242,181,68,0.15);
    }

    /* Quote icon */
    .testi-quote-icon {
        width: 44px;
        height: 44px;
        background: rgba(242,181,68,0.2);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #F2B544;
        flex-shrink: 0;
    }

    /* Stars */
    .testi-stars {
        display: flex;
        gap: 4px;
    }
    .testi-stars svg { color: #F2B544; }

    /* Review text */
    .testi-text {
        color: rgba(255,255,255,0.82);
        font-size: 0.96rem;
        line-height: 1.75;
        font-style: italic;
        flex: 1;
    }

    /* Divider */
    .testi-divider {
        height: 1px;
        background: linear-gradient(to right, rgba(255,255,255,0.15), transparent);
        margin: 0 -4px;
    }

    /* Avatar + author info */
    .testi-author {
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .testi-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
        flex-shrink: 0;
        letter-spacing: 0.5px;
    }
    .testi-author-info { flex: 1; }
    .testi-author-name {
        color: #fff;
        font-weight: 700;
        font-size: 0.95rem;
        margin-bottom: 2px;
    }
    .testi-author-location {
        color: rgba(255,255,255,0.5);
        font-size: 0.8rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Badge (e.g. "Verified Traveler") */
    .testi-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: rgba(242,181,68,0.15);
        color: #F2B544;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        padding: 4px 10px;
        border-radius: 999px;
        border: 1px solid rgba(242,181,68,0.3);
        white-space: nowrap;
    }
</style>

<section class="testimonials-section" id="testimonials">
    <div class="container" style="max-width: 1100px;">

        <!-- Header -->
        <div class="testimonials-header">
            <span class="testimonials-tag">★ What Travelers Say</span>
            <h2 class="testimonials-title">Real Stories from<br><span>Happy Travelers</span></h2>
            <p class="testimonials-subtitle">Hundreds of guests have experienced the magic of Sri Lanka with us. Here's what a few of them had to share.</p>
        </div>

        <!-- Cards Grid -->
        <div class="testimonials-grid">

            <!-- Card 1 — Featured -->
            <div class="testi-card featured">
                <div style="display:flex; align-items:center; justify-content:space-between;">
                    <div class="testi-quote-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M11.192 15.757c0-.88-.23-1.618-.69-2.217-.326-.412-.768-.683-1.327-.812-.55-.128-1.07-.137-1.54-.028-.16-.95.1-1.95.76-3 .66-1.06 1.63-1.9 2.91-2.52L9.088 5c-1.512.6-2.8 1.535-3.87 2.804-1.07 1.274-1.604 2.695-1.604 4.267 0 1.69.52 3.016 1.565 3.975 1.043.96 2.3 1.44 3.774 1.44 1.043 0 1.885-.304 2.524-.91.64-.608.96-1.385.96-2.328zm8.808 0c0-.88-.23-1.618-.69-2.217-.326-.42-.77-.692-1.327-.817-.56-.124-1.07-.13-1.54-.022-.16-.953.1-1.953.76-3.002.66-1.06 1.63-1.9 2.91-2.52L17.896 5c-1.512.6-2.8 1.535-3.87 2.804-1.07 1.274-1.604 2.695-1.604 4.267 0 1.69.52 3.016 1.565 3.975 1.043.96 2.3 1.44 3.774 1.44 1.043 0 1.885-.304 2.523-.91.64-.608.96-1.385.96-2.328z"/></svg>
                    </div>
                    <span class="testi-badge">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                        Verified Traveler
                    </span>
                </div>
                <div class="testi-stars">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                </div>
                <p class="testi-text">"Absolutely the most extraordinary travel experience of our lives. Maha Lanka Tours took care of every detail — from the luxury villa overlooking the ocean to the private sunrise climb up Sigiriya. Our guide felt like a dear friend by the end."</p>
                <div class="testi-divider"></div>
                <div class="testi-author">
                    <div class="testi-avatar" style="background: linear-gradient(135deg, #F2B544, #e09030); color: #0f1f45;">JM</div>
                    <div class="testi-author-info">
                        <div class="testi-author-name">James & Mia Carter</div>
                        <div class="testi-author-location">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            London, United Kingdom
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="testi-card">
                <div style="display:flex; align-items:center; justify-content:space-between;">
                    <div class="testi-quote-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M11.192 15.757c0-.88-.23-1.618-.69-2.217-.326-.412-.768-.683-1.327-.812-.55-.128-1.07-.137-1.54-.028-.16-.95.1-1.95.76-3 .66-1.06 1.63-1.9 2.91-2.52L9.088 5c-1.512.6-2.8 1.535-3.87 2.804-1.07 1.274-1.604 2.695-1.604 4.267 0 1.69.52 3.016 1.565 3.975 1.043.96 2.3 1.44 3.774 1.44 1.043 0 1.885-.304 2.524-.91.64-.608.96-1.385.96-2.328zm8.808 0c0-.88-.23-1.618-.69-2.217-.326-.42-.77-.692-1.327-.817-.56-.124-1.07-.13-1.54-.022-.16-.953.1-1.953.76-3.002.66-1.06 1.63-1.9 2.91-2.52L17.896 5c-1.512.6-2.8 1.535-3.87 2.804-1.07 1.274-1.604 2.695-1.604 4.267 0 1.69.52 3.016 1.565 3.975 1.043.96 2.3 1.44 3.774 1.44 1.043 0 1.885-.304 2.523-.91.64-.608.96-1.385.96-2.328z"/></svg>
                    </div>
                    <span class="testi-badge">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                        Verified Traveler
                    </span>
                </div>
                <div class="testi-stars">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                </div>
                <p class="testi-text">"We saw blue whales in the wild, sipped champagne at a tea estate with panoramic views, and stayed in a boutique eco-villa — all perfectly arranged. The itinerary was 100% private, exactly as promised. Truly unforgettable."</p>
                <div class="testi-divider"></div>
                <div class="testi-author">
                    <div class="testi-avatar" style="background: linear-gradient(135deg, #2E4F9E, #1a3270); color: #fff;">SC</div>
                    <div class="testi-author-info">
                        <div class="testi-author-name">Sophie & Chris Müller</div>
                        <div class="testi-author-location">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            Berlin, Germany
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="testi-card">
                <div style="display:flex; align-items:center; justify-content:space-between;">
                    <div class="testi-quote-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M11.192 15.757c0-.88-.23-1.618-.69-2.217-.326-.412-.768-.683-1.327-.812-.55-.128-1.07-.137-1.54-.028-.16-.95.1-1.95.76-3 .66-1.06 1.63-1.9 2.91-2.52L9.088 5c-1.512.6-2.8 1.535-3.87 2.804-1.07 1.274-1.604 2.695-1.604 4.267 0 1.69.52 3.016 1.565 3.975 1.043.96 2.3 1.44 3.774 1.44 1.043 0 1.885-.304 2.524-.91.64-.608.96-1.385.96-2.328zm8.808 0c0-.88-.23-1.618-.69-2.217-.326-.42-.77-.692-1.327-.817-.56-.124-1.07-.13-1.54-.022-.16-.953.1-1.953.76-3.002.66-1.06 1.63-1.9 2.91-2.52L17.896 5c-1.512.6-2.8 1.535-3.87 2.804-1.07 1.274-1.604 2.695-1.604 4.267 0 1.69.52 3.016 1.565 3.975 1.043.96 2.3 1.44 3.774 1.44 1.043 0 1.885-.304 2.523-.91.64-.608.96-1.385.96-2.328z"/></svg>
                    </div>
                    <span class="testi-badge">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                        Verified Traveler
                    </span>
                </div>
                <div class="testi-stars">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                </div>
                <p class="testi-text">"The Yala leopard safari was breathtaking — we spotted three leopards within the first hour! Our guide's knowledge of local wildlife was remarkable. I also loved the seamless hotel arrangements and the warm hospitality throughout."</p>
                <div class="testi-divider"></div>
                <div class="testi-author">
                    <div class="testi-avatar" style="background: linear-gradient(135deg, #2da87e, #1e7a5c); color: #fff;">AN</div>
                    <div class="testi-author-info">
                        <div class="testi-author-name">Anya Novikova</div>
                        <div class="testi-author-location">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            Sydney, Australia
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="testi-card">
                <div style="display:flex; align-items:center; justify-content:space-between;">
                    <div class="testi-quote-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M11.192 15.757c0-.88-.23-1.618-.69-2.217-.326-.412-.768-.683-1.327-.812-.55-.128-1.07-.137-1.54-.028-.16-.95.1-1.95.76-3 .66-1.06 1.63-1.9 2.91-2.52L9.088 5c-1.512.6-2.8 1.535-3.87 2.804-1.07 1.274-1.604 2.695-1.604 4.267 0 1.69.52 3.016 1.565 3.975 1.043.96 2.3 1.44 3.774 1.44 1.043 0 1.885-.304 2.524-.91.64-.608.96-1.385.96-2.328zm8.808 0c0-.88-.23-1.618-.69-2.217-.326-.42-.77-.692-1.327-.817-.56-.124-1.07-.13-1.54-.022-.16-.953.1-1.953.76-3.002.66-1.06 1.63-1.9 2.91-2.52L17.896 5c-1.512.6-2.8 1.535-3.87 2.804-1.07 1.274-1.604 2.695-1.604 4.267 0 1.69.52 3.016 1.565 3.975 1.043.96 2.3 1.44 3.774 1.44 1.043 0 1.885-.304 2.523-.91.64-.608.96-1.385.96-2.328z"/></svg>
                    </div>
                    <span class="testi-badge">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                        Verified Traveler
                    </span>
                </div>
                <div class="testi-stars">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                </div>
                <p class="testi-text">"Planning from Canada was seamless — Maha Lanka's team responded within hours every time. The Kandy cultural show, Temple of the Tooth visit, and whale-watching boat trip were highlights I'll cherish forever."</p>
                <div class="testi-divider"></div>
                <div class="testi-author">
                    <div class="testi-avatar" style="background: linear-gradient(135deg, #9b59b6, #6c3483); color: #fff;">DP</div>
                    <div class="testi-author-info">
                        <div class="testi-author-name">David & Priya Osei</div>
                        <div class="testi-author-location">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            Toronto, Canada
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="testi-card">
                <div style="display:flex; align-items:center; justify-content:space-between;">
                    <div class="testi-quote-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M11.192 15.757c0-.88-.23-1.618-.69-2.217-.326-.412-.768-.683-1.327-.812-.55-.128-1.07-.137-1.54-.028-.16-.95.1-1.95.76-3 .66-1.06 1.63-1.9 2.91-2.52L9.088 5c-1.512.6-2.8 1.535-3.87 2.804-1.07 1.274-1.604 2.695-1.604 4.267 0 1.69.52 3.016 1.565 3.975 1.043.96 2.3 1.44 3.774 1.44 1.043 0 1.885-.304 2.524-.91.64-.608.96-1.385.96-2.328zm8.808 0c0-.88-.23-1.618-.69-2.217-.326-.42-.77-.692-1.327-.817-.56-.124-1.07-.13-1.54-.022-.16-.953.1-1.953.76-3.002.66-1.06 1.63-1.9 2.91-2.52L17.896 5c-1.512.6-2.8 1.535-3.87 2.804-1.07 1.274-1.604 2.695-1.604 4.267 0 1.69.52 3.016 1.565 3.975 1.043.96 2.3 1.44 3.774 1.44 1.043 0 1.885-.304 2.523-.91.64-.608.96-1.385.96-2.328z"/></svg>
                    </div>
                    <span class="testi-badge">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                        Verified Traveler
                    </span>
                </div>
                <div class="testi-stars">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                </div>
                <p class="testi-text">"I travelled solo for two weeks and felt completely safe and cared for the entire time. The luxury tuk-tuk tour through Galle Fort, the stilt fishermen at sunrise — Maha Lanka curated magic moments I never would have found alone."</p>
                <div class="testi-divider"></div>
                <div class="testi-author">
                    <div class="testi-avatar" style="background: linear-gradient(135deg, #e84393, #c0265a); color: #fff;">LT</div>
                    <div class="testi-author-info">
                        <div class="testi-author-name">Léa Tremblay</div>
                        <div class="testi-author-location">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            Paris, France
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="testi-card">
                <div style="display:flex; align-items:center; justify-content:space-between;">
                    <div class="testi-quote-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M11.192 15.757c0-.88-.23-1.618-.69-2.217-.326-.412-.768-.683-1.327-.812-.55-.128-1.07-.137-1.54-.028-.16-.95.1-1.95.76-3 .66-1.06 1.63-1.9 2.91-2.52L9.088 5c-1.512.6-2.8 1.535-3.87 2.804-1.07 1.274-1.604 2.695-1.604 4.267 0 1.69.52 3.016 1.565 3.975 1.043.96 2.3 1.44 3.774 1.44 1.043 0 1.885-.304 2.524-.91.64-.608.96-1.385.96-2.328zm8.808 0c0-.88-.23-1.618-.69-2.217-.326-.42-.77-.692-1.327-.817-.56-.124-1.07-.13-1.54-.022-.16-.953.1-1.953.76-3.002.66-1.06 1.63-1.9 2.91-2.52L17.896 5c-1.512.6-2.8 1.535-3.87 2.804-1.07 1.274-1.604 2.695-1.604 4.267 0 1.69.52 3.016 1.565 3.975 1.043.96 2.3 1.44 3.774 1.44 1.043 0 1.885-.304 2.523-.91.64-.608.96-1.385.96-2.328z"/></svg>
                    </div>
                    <span class="testi-badge">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                        Verified Traveler
                    </span>
                </div>
                <div class="testi-stars">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                </div>
                <p class="testi-text">"From the Nine Arch Bridge train ride to surfing lessons in Arugam Bay, every day was a new adventure. The team remembered small details we mentioned months ago — a welcome fruit basket, our favourite Ceylon tea flavour. Remarkable attention."</p>
                <div class="testi-divider"></div>
                <div class="testi-author">
                    <div class="testi-avatar" style="background: linear-gradient(135deg, #f37a27, #c0540a); color: #fff;">RK</div>
                    <div class="testi-author-info">
                        <div class="testi-author-name">Ravi & Kamala Sharma</div>
                        <div class="testi-author-location">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            Mumbai, India
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.testimonials-grid -->

        <!-- Summary row -->
        <div style="display:flex; align-items:center; justify-content:center; gap:32px; flex-wrap:wrap; margin-top:56px; position:relative; z-index:1;">
            <div style="text-align:center;">
                <div style="font-size:2.4rem; font-weight:700; color:#F2B544; line-height:1;">500+</div>
                <div style="font-size:0.78rem; font-weight:700; text-transform:uppercase; letter-spacing:1.5px; color:rgba(255,255,255,0.55); margin-top:4px;">Happy Travelers</div>
            </div>
            <div style="width:1px; height:52px; background:rgba(255,255,255,0.15);"></div>
            <div style="text-align:center;">
                <div style="font-size:2.4rem; font-weight:700; color:#F2B544; line-height:1;">4.9★</div>
                <div style="font-size:0.78rem; font-weight:700; text-transform:uppercase; letter-spacing:1.5px; color:rgba(255,255,255,0.55); margin-top:4px;">Average Rating</div>
            </div>
            <div style="width:1px; height:52px; background:rgba(255,255,255,0.15);"></div>
            <div style="text-align:center;">
                <div style="font-size:2.4rem; font-weight:700; color:#F2B544; line-height:1;">12+</div>
                <div style="font-size:0.78rem; font-weight:700; text-transform:uppercase; letter-spacing:1.5px; color:rgba(255,255,255,0.55); margin-top:4px;">Years of Trust</div>
            </div>
            <div style="width:1px; height:52px; background:rgba(255,255,255,0.15);"></div>
            <div style="text-align:center;">
                <div style="font-size:2.4rem; font-weight:700; color:#F2B544; line-height:1;">30+</div>
                <div style="font-size:0.78rem; font-weight:700; text-transform:uppercase; letter-spacing:1.5px; color:rgba(255,255,255,0.55); margin-top:4px;">Countries Represented</div>
            </div>
        </div>

    </div>
</section>

<!-- ═══════════════ CTA BANNER ═══════════════ -->
<section class="dest-cta-section">
    <div class="dest-cta-bg-slider">
        <div class="dest-cta-bg-slide"></div>
        <div class="dest-cta-bg-slide"></div>
        <div class="dest-cta-bg-slide"></div>
        <div class="dest-cta-bg-slide"></div>
        <div class="dest-cta-bg-overlay"></div>
    </div>
    <div class="dest-cta__tag">Plan Your Journey</div>
    <h2 class="dest-cta__title">
        Ready to Experience<br><span>Sri Lanka</span> Your Way?
    </h2>
    <p class="dest-cta__desc">
        All our tours are 100% private and fully customisable. Tell us your dream itinerary and our experts will make it happen.
    </p>
    <div class="dest-cta__buttons">
        <a href="contact.php" class="dest-cta__btn-primary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            Get a Free Quote
        </a>
        <a href="about.php" class="dest-cta__btn-secondary">
            Learn About Us
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
    </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
