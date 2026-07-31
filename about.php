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

<?php include_once __DIR__ . '/includes/footer.php'; ?>
