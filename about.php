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
        background: #E8DCCB; /* Darker beige background */
        position: relative;
        overflow: hidden;
    }
    .testimonials-section::before {
        content: '';
        position: absolute;
        top: -200px; right: -200px;
        width: 600px; height: 600px;
        background: radial-gradient(circle, rgba(255,255,255,0.4) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }
    .testimonials-section::after {
        content: '';
        position: absolute;
        bottom: -150px; left: -150px;
        width: 450px; height: 450px;
        background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
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
        color: #d97706; /* Darker orange/amber for contrast */
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
        color: #0f1f45; /* Dark navy text */
        line-height: 1.25;
        margin-bottom: 14px;
    }
    .testimonials-title span { color: #F2B544; font-style: italic; }
    .testimonials-subtitle {
        color: #4b5563; /* Darker gray for readability on beige */
        font-size: 1rem;
        max-width: 480px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* ── Carousel outer ── */
    .testi-carousel-outer {
        position: relative;
        z-index: 1;
    }
    .testi-carousel-outer::before,
    .testi-carousel-outer::after {
        content: '';
        position: absolute;
        top: 0; bottom: 0;
        width: 120px;
        z-index: 3;
        pointer-events: none;
    }
    .testi-carousel-outer::before {
        left: 0;
        background: linear-gradient(to right, #E8DCCB 0%, transparent 100%);
    }
    .testi-carousel-outer::after {
        right: 0;
        background: linear-gradient(to left, #E8DCCB 0%, transparent 100%);
    }

    /* Scrollable track */
    .testi-track-wrapper {
        overflow: hidden;
        cursor: grab;
        user-select: none;
        -webkit-user-select: none;
    }
    .testi-track-wrapper:active { cursor: grabbing; }

    .testi-track {
        display: flex;
        gap: 24px;
        padding: 16px 4px 28px;
        will-change: transform;
        transition: transform 0.65s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .testi-track.no-transition { transition: none !important; }

    /* ── Individual Card — horizontal layout ── */
    .tc {
        background: rgba(255,255,255,0.45); /* Light glass */
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255,255,255,0.7);
        border-top: 1px solid rgba(255,255,255,0.9);
        border-left: 1px solid rgba(255,255,255,0.8);
        border-radius: 20px;
        padding: 30px 32px;
        min-width: 380px;
        max-width: 380px;
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
        gap: 18px;
        transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.04);
    }
    .tc::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent 0%, rgba(242,181,68,0.7) 50%, transparent 100%);
        opacity: 0;
        transition: opacity 0.35s ease;
    }
    .tc:hover {
        transform: translateY(-7px);
        box-shadow: 0 22px 50px rgba(0,0,0,0.12);
        border-color: rgba(242,181,68,0.4);
    }
    .tc:hover::after { opacity: 1; }

    /* Author row */
    .tc-author-row {
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .tc-avatar {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1rem;
        flex-shrink: 0;
        letter-spacing: 0.5px;
        border: 2px solid rgba(255,255,255,0.6);
        box-shadow: 0 4px 14px rgba(0,0,0,0.1);
    }
    .tc-author-info { flex: 1; min-width: 0; }
    .tc-name {
        color: #0f1f45;
        font-weight: 700;
        font-size: 0.97rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 3px;
    }
    .tc-role {
        color: #4b5563;
        font-size: 0.77rem;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .tc-big-quote {
        font-size: 4rem;
        line-height: 0.8;
        color: rgba(242,181,68,0.5);
        font-family: Georgia, 'Times New Roman', serif;
        margin-left: auto;
        align-self: flex-start;
        flex-shrink: 0;
        padding-top: 4px;
    }

    /* Stars */
    .tc-stars { display: flex; gap: 3px; }
    .tc-stars svg { color: #F2B544; }

    /* Review text */
    .tc-text {
        color: #333;
        font-size: 0.92rem;
        line-height: 1.75;
        font-style: italic;
        flex: 1;
    }

    /* Bottom tag */
    .tc-tag {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: rgba(242,181,68,0.2);
        color: #d97706;
        font-size: 0.67rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        padding: 4px 11px;
        border-radius: 999px;
        border: 1px solid rgba(242,181,68,0.3);
        width: fit-content;
    }

    /* ── Controls ── */
    .testi-controls {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        margin-top: 42px;
        position: relative;
        z-index: 1;
    }
    .testi-btn {
        width: 50px; height: 50px;
        border-radius: 50%;
        border: 1px solid #d1d5db;
        background: #fff;
        color: #0f1f45;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.25s ease;
        flex-shrink: 0;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    .testi-btn:hover {
        background: #F2B544;
        border-color: #F2B544;
        color: #fff;
        transform: scale(1.1);
    }
    .testi-dots { display: flex; gap: 8px; align-items: center; }
    .testi-dot {
        width: 8px; height: 8px;
        border-radius: 999px;
        background: rgba(0,0,0,0.15);
        border: none;
        cursor: pointer;
        padding: 0;
        transition: all 0.32s ease;
    }
    .testi-dot.active { width: 30px; background: #0f1f45; }

    /* Progress bar */
    .testi-progress {
        position: absolute;
        bottom: 0; left: 0;
        height: 3px;
        background: linear-gradient(90deg, #0f1f45, #1a3270);
        border-radius: 3px;
        width: 0%;
        z-index: 2;
        transition: width 0.12s linear;
    }

    /* ── Stats bar ── */
    .testi-stats {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 40px;
        flex-wrap: nowrap;
        margin-top: 56px;
        padding: 30px 40px;
        background: rgba(255,255,255,0.45);
        border-radius: 20px;
        border: 1px solid rgba(255,255,255,0.7);
        backdrop-filter: blur(12px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.04);
        width: max-content;
        max-width: 95%;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        z-index: 1;
    }
    .testi-stat { text-align: center; }
    .testi-stat-num {
        font-size: 2.1rem;
        font-weight: 800;
        color: #0f1f45;
        line-height: 1;
        font-family: var(--font-heading);
    }
    .testi-stat-lbl {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.6px;
        color: #4b5563;
        margin-top: 6px;
    }
    .testi-stat-sep {
        width: 1px; height: 48px;
        background: rgba(0,0,0,0.1);
    }
    @media (max-width: 640px) {
        .tc { min-width: 290px; max-width: 290px; padding: 22px 20px; }
        .testi-carousel-outer::before,
        .testi-carousel-outer::after { width: 40px; }
        .testi-stats { gap: 18px; padding: 22px 18px; }
        .testi-stat-sep { display: none; }
    }
</style>

<section class="testimonials-section" id="testimonials">
    <div class="container" style="max-width:1200px;">

        <div class="testimonials-header">
            <span class="testimonials-tag">★ What Travelers Say</span>
            <h2 class="testimonials-title">Real Stories from<br><span>Happy Travelers</span></h2>
            <p class="testimonials-subtitle">Hundreds of guests have experienced the magic of Sri Lanka with us. Here's what a few of them had to share.</p>
        </div>

        <div class="testi-carousel-outer">
            <div class="testi-track-wrapper" id="tcWrapper">
                <div class="testi-track" id="tcTrack">

                    <!-- Card 1 -->
                    <div class="tc">
                        <div class="tc-author-row">
                            <div class="tc-avatar" style="background:linear-gradient(135deg,#F2B544,#e09030);color:#0f1f45;">JM</div>
                            <div class="tc-author-info">
                                <div class="tc-name">James &amp; Mia Carter</div>
                                <div class="tc-role"><svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>London, United Kingdom</div>
                            </div>
                            <span class="tc-big-quote">"</span>
                        </div>
                        <div class="tc-stars">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        </div>
                        <p class="tc-text">Absolutely the most extraordinary travel experience of our lives. Maha Lanka Tours took care of every detail — from the luxury villa overlooking the ocean to the private sunrise climb up Sigiriya. Our guide felt like a dear friend by the end.</p>
                        <span class="tc-tag"><svg width="9" height="9" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>Verified Traveler</span>
                    </div>

                    <!-- Card 2 -->
                    <div class="tc">
                        <div class="tc-author-row">
                            <div class="tc-avatar" style="background:linear-gradient(135deg,#2E4F9E,#1a3270);color:#fff;">SC</div>
                            <div class="tc-author-info">
                                <div class="tc-name">Sophie &amp; Chris Müller</div>
                                <div class="tc-role"><svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>Berlin, Germany</div>
                            </div>
                            <span class="tc-big-quote">"</span>
                        </div>
                        <div class="tc-stars">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        </div>
                        <p class="tc-text">We saw blue whales in the wild, sipped champagne at a tea estate with panoramic views, and stayed in a boutique eco-villa — all perfectly arranged. The itinerary was 100% private, exactly as promised. Truly unforgettable.</p>
                        <span class="tc-tag"><svg width="9" height="9" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>Verified Traveler</span>
                    </div>

                    <!-- Card 3 -->
                    <div class="tc">
                        <div class="tc-author-row">
                            <div class="tc-avatar" style="background:linear-gradient(135deg,#2da87e,#1e7a5c);color:#fff;">AN</div>
                            <div class="tc-author-info">
                                <div class="tc-name">Anya Novikova</div>
                                <div class="tc-role"><svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>Sydney, Australia</div>
                            </div>
                            <span class="tc-big-quote">"</span>
                        </div>
                        <div class="tc-stars">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        </div>
                        <p class="tc-text">The Yala leopard safari was breathtaking — we spotted three leopards within the first hour! Our guide's knowledge of local wildlife was remarkable. I also loved the seamless hotel arrangements and the warm hospitality throughout.</p>
                        <span class="tc-tag"><svg width="9" height="9" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>Verified Traveler</span>
                    </div>

                    <!-- Card 4 -->
                    <div class="tc">
                        <div class="tc-author-row">
                            <div class="tc-avatar" style="background:linear-gradient(135deg,#9b59b6,#6c3483);color:#fff;">DP</div>
                            <div class="tc-author-info">
                                <div class="tc-name">David &amp; Priya Osei</div>
                                <div class="tc-role"><svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>Toronto, Canada</div>
                            </div>
                            <span class="tc-big-quote">"</span>
                        </div>
                        <div class="tc-stars">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        </div>
                        <p class="tc-text">Planning from Canada was seamless — Maha Lanka's team responded within hours every time. The Kandy cultural show, Temple of the Tooth visit, and whale-watching boat trip were highlights I'll cherish forever.</p>
                        <span class="tc-tag"><svg width="9" height="9" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>Verified Traveler</span>
                    </div>

                    <!-- Card 5 -->
                    <div class="tc">
                        <div class="tc-author-row">
                            <div class="tc-avatar" style="background:linear-gradient(135deg,#e84393,#c0265a);color:#fff;">LT</div>
                            <div class="tc-author-info">
                                <div class="tc-name">Léa Tremblay</div>
                                <div class="tc-role"><svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>Paris, France</div>
                            </div>
                            <span class="tc-big-quote">"</span>
                        </div>
                        <div class="tc-stars">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        </div>
                        <p class="tc-text">I travelled solo for two weeks and felt completely safe and cared for the entire time. The luxury tuk-tuk tour through Galle Fort, the stilt fishermen at sunrise — Maha Lanka curated magic moments I never would have found alone.</p>
                        <span class="tc-tag"><svg width="9" height="9" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>Verified Traveler</span>
                    </div>

                    <!-- Card 6 -->
                    <div class="tc">
                        <div class="tc-author-row">
                            <div class="tc-avatar" style="background:linear-gradient(135deg,#f37a27,#c0540a);color:#fff;">RK</div>
                            <div class="tc-author-info">
                                <div class="tc-name">Ravi &amp; Kamala Sharma</div>
                                <div class="tc-role"><svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>Mumbai, India</div>
                            </div>
                            <span class="tc-big-quote">"</span>
                        </div>
                        <div class="tc-stars">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        </div>
                        <p class="tc-text">From the Nine Arch Bridge train ride to surfing lessons in Arugam Bay, every day was a new adventure. The team remembered small details we mentioned months ago — a welcome fruit basket, our favourite Ceylon tea. Remarkable attention.</p>
                        <span class="tc-tag"><svg width="9" height="9" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>Verified Traveler</span>
                    </div>

                </div><!-- /.testi-track -->
            </div><!-- /.testi-track-wrapper -->
            <div class="testi-progress" id="tcProgress"></div>
        </div><!-- /.testi-carousel-outer -->

        <!-- Controls -->
        <div class="testi-controls">
            <button class="testi-btn" id="tcPrev" aria-label="Previous testimonial">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
            </button>
            <div class="testi-dots" id="tcDots"></div>
            <button class="testi-btn" id="tcNext" aria-label="Next testimonial">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
            </button>
        </div>

        <!-- Stats -->
        <div class="testi-stats">
            <div class="testi-stat"><div class="testi-stat-num">500+</div><div class="testi-stat-lbl">Happy Travelers</div></div>
            <div class="testi-stat-sep"></div>
            <div class="testi-stat"><div class="testi-stat-num">4.9★</div><div class="testi-stat-lbl">Average Rating</div></div>
            <div class="testi-stat-sep"></div>
            <div class="testi-stat"><div class="testi-stat-num">12+</div><div class="testi-stat-lbl">Years of Trust</div></div>
            <div class="testi-stat-sep"></div>
            <div class="testi-stat"><div class="testi-stat-num">30+</div><div class="testi-stat-lbl">Countries</div></div>
        </div>

    </div>
</section>

<script>
(function () {
    'use strict';
    var track    = document.getElementById('tcTrack');
    var wrapper  = document.getElementById('tcWrapper');
    var dotsEl   = document.getElementById('tcDots');
    var btnPrev  = document.getElementById('tcPrev');
    var btnNext  = document.getElementById('tcNext');
    var progEl   = document.getElementById('tcProgress');

    var VISIBLE   = 3;      // cards shown at once
    var GAP       = 24;     // px
    var INTERVAL  = 4200;   // ms auto-advance
    var STEPS     = 60;     // progress-bar ticks

    var origCards = Array.from(track.children);
    var total     = origCards.length;

    // Infinite clones
    origCards.slice(-VISIBLE).forEach(function(c){ track.insertBefore(c.cloneNode(true), track.firstChild); });
    origCards.slice(0, VISIBLE).forEach(function(c){ track.appendChild(c.cloneNode(true)); });

    var idx = 0;          // current real index
    var busy = false;
    var autoTmr, progTmr, progPct = 0;

    function cw() {
        var c = track.querySelector('.tc');
        return c ? c.offsetWidth + GAP : 0;
    }
    function offset(i) { return (VISIBLE + i) * cw(); }

    /* Dots */
    function makeDots() {
        dotsEl.innerHTML = '';
        for (var i = 0; i < total; i++) {
            var d = document.createElement('button');
            d.className = 'testi-dot' + (i === 0 ? ' active' : '');
            d.setAttribute('aria-label', 'Testimonial ' + (i+1));
            (function(n){ d.addEventListener('click', function(){ stopAuto(); goTo(n); startAuto(); }); })(i);
            dotsEl.appendChild(d);
        }
    }
    function syncDots() {
        var dots = dotsEl.querySelectorAll('.testi-dot');
        dots.forEach(function(d,i){ d.classList.toggle('active', i === idx); });
    }

    /* Navigate */
    function goTo(i, animate) {
        if (busy) return;
        busy = true;
        if (animate === false) {
            track.classList.add('no-transition');
        } else {
            track.classList.remove('no-transition');
        }
        idx = ((i % total) + total) % total;
        track.style.transform = 'translateX(-' + offset(idx) + 'px)';
        syncDots();
        resetProg();
        setTimeout(function(){ busy = false; }, 700);
    }

    /* After transition, silent-jump if we've gone past the real cards via clones */
    track.addEventListener('transitionend', function() {
        /* wrapped already by modulo, nothing needed */
    });

    function next(){ goTo(idx + 1); }
    function prev(){ goTo(idx - 1); }

    /* Auto */
    function startAuto() {
        clearInterval(autoTmr);
        autoTmr = setInterval(next, INTERVAL);
    }
    function stopAuto() {
        clearInterval(autoTmr);
        clearInterval(progTmr);
    }

    /* Progress bar */
    function resetProg() {
        clearInterval(progTmr);
        progPct = 0;
        progEl.style.width = '0%';
        var step = 100 / STEPS;
        var ms   = INTERVAL / STEPS;
        progTmr = setInterval(function(){
            progPct = Math.min(progPct + step, 100);
            progEl.style.width = progPct + '%';
        }, ms);
    }

    /* Drag */
    var dx = 0, dragging = false, startX = 0;
    wrapper.addEventListener('mousedown', function(e){
        dragging = true; startX = e.clientX; dx = 0;
        stopAuto(); track.classList.add('no-transition');
    });
    window.addEventListener('mousemove', function(e){
        if (!dragging) return;
        dx = e.clientX - startX;
        track.style.transform = 'translateX(-' + (offset(idx) - dx) + 'px)';
    });
    window.addEventListener('mouseup', function(){
        if (!dragging) return;
        dragging = false;
        track.classList.remove('no-transition');
        if (Math.abs(dx) > 60) { dx < 0 ? next() : prev(); }
        else { track.style.transform = 'translateX(-' + offset(idx) + 'px)'; }
        dx = 0; startAuto(); resetProg();
    });

    /* Touch */
    var tx = 0;
    wrapper.addEventListener('touchstart', function(e){ tx = e.touches[0].clientX; stopAuto(); }, {passive:true});
    wrapper.addEventListener('touchend',   function(e){
        var delta = e.changedTouches[0].clientX - tx;
        if (Math.abs(delta) > 48) { delta < 0 ? next() : prev(); }
        startAuto(); resetProg();
    }, {passive:true});

    /* Buttons */
    btnPrev.addEventListener('click', function(){ stopAuto(); prev(); startAuto(); });
    btnNext.addEventListener('click', function(){ stopAuto(); next(); startAuto(); });

    /* Pause on hover */
    wrapper.addEventListener('mouseenter', stopAuto);
    wrapper.addEventListener('mouseleave', function(){ startAuto(); resetProg(); });

    /* Init */
    makeDots();
    track.classList.add('no-transition');
    track.style.transform = 'translateX(-' + offset(0) + 'px)';
    requestAnimationFrame(function(){
        requestAnimationFrame(function(){
            track.classList.remove('no-transition');
            startAuto();
            resetProg();
        });
    });

    /* Recalc on resize */
    var resizeTmr;
    window.addEventListener('resize', function(){
        clearTimeout(resizeTmr);
        resizeTmr = setTimeout(function(){
            track.classList.add('no-transition');
            track.style.transform = 'translateX(-' + offset(idx) + 'px)';
            setTimeout(function(){ track.classList.remove('no-transition'); }, 50);
        }, 150);
    });
})();
</script>

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
