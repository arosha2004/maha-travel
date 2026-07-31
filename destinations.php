<?php
// destinations.php - Destination Guide Page
$page_title = "Destinations Guide | Maha Lanka Tours";
$current_page = "destinations";
require_once __DIR__ . '/api/tours_data.php';

$destinations = get_destinations_data();
include_once __DIR__ . '/includes/header.php';
?>

<style>
/* New Destinations Layout Styles */
.hero-slider {
    position: relative;
    width: 100%;
    height: 60vh;
    min-height: 400px;
    background-image: url('https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=1920&q=80');
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.hero-arrow {
    color: white;
    font-size: 3rem;
    padding: 0 30px;
    cursor: pointer;
    text-shadow: 0 2px 5px rgba(0,0,0,0.5);
    user-select: none;
    font-family: sans-serif;
    font-weight: 300;
}
.hero-dots {
    position: absolute;
    bottom: 25px;
    width: 100%;
    text-align: center;
}
.hero-dot {
    display: inline-block;
    width: 6px;
    height: 6px;
    background-color: rgba(255,255,255,0.4);
    border-radius: 50%;
    margin: 0 4px;
    cursor: pointer;
    box-shadow: 0 1px 3px rgba(0,0,0,0.3);
}
.hero-dot.active {
    background-color: white;
}

.intro-section {
    padding: 80px 20px;
    text-align: center;
    background-color: #f7f7f7;
}
.intro-text {
    max-width: 900px;
    margin: 0 auto 40px;
    color: #666;
    font-size: 1.05rem;
    line-height: 1.8;
}
.intro-quote {
    font-family: 'Georgia', serif;
    font-style: italic;
    font-size: 2rem;
    color: #444;
    font-weight: normal;
}
.intro-quote span {
    font-weight: bold;
    font-style: italic;
}

.tours-section {
    padding: 80px 20px 60px;
    background-color: #fff;
    text-align: center;
}
.tours-section h2 {
    font-size: 2.2rem;
    color: #666;
    margin-bottom: 15px;
    font-weight: 300;
}
.tours-subtitle {
    color: #888;
    margin-bottom: 50px;
    font-size: 1rem;
}

.tours-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
}
@media (max-width: 992px) {
    .tours-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (max-width: 576px) {
    .tours-grid {
        grid-template-columns: 1fr;
    }
}
.tour-box {
    position: relative;
    aspect-ratio: 1 / 1;
    overflow: hidden;
    cursor: pointer;
}
.tour-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}
.tour-box:hover img {
    transform: scale(1.05);
}
.tour-box-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.5));
    display: flex;
    align-items: center;
    justify-content: center;
}
.tour-box h3 {
    color: white;
    font-size: 1.4rem;
    font-weight: 500;
    margin: 0;
    text-shadow: 0 2px 4px rgba(0,0,0,0.6);
}

.footer-note {
    padding: 40px 20px 80px;
    text-align: center;
    background-color: #fff;
    color: #777;
    font-size: 0.95rem;
}
</style>

<div class="hero-slider">
    <div class="hero-arrow">&#10094;</div>
    <div class="hero-dots">
        <span class="hero-dot active"></span>
        <span class="hero-dot"></span>
        <span class="hero-dot"></span>
        <span class="hero-dot"></span>
        <span class="hero-dot"></span>
        <span class="hero-dot"></span>
    </div>
    <div class="hero-arrow">&#10095;</div>
</div>

<section class="intro-section">
    <div class="container">
        <p class="intro-text">
            Seamless service is our top priority, so that you can relax and enjoy your experience to the full. Priding ourselves<br>
            on flexibility, we will turn your requirements and wishes into reality at all times. In doing so, we make sure that we<br>
            support local companies and act sustainably, working directly with local partners.
        </p>
        <div class="intro-quote">
            "<span>Seamless</span> Is Our Byword"
        </div>
    </div>
</section>

<section class="tours-section">
    <div class="container">
        <h2>Individual Travel</h2>
        <p class="tours-subtitle">We are your personal experts for Sri Lanka's beautiful regions and beyond!</p>
        
        <div class="tours-grid">
            <?php 
            // Display first 4 destinations
            $display_destinations = array_slice($destinations, 0, 4);
            foreach ($display_destinations as $dest): 
            ?>
                <div class="tour-box">
                    <img src="<?php echo htmlspecialchars($dest['image']); ?>" alt="<?php echo htmlspecialchars($dest['name']); ?>" loading="lazy">
                    <div class="tour-box-overlay">
                        <h3><?php echo htmlspecialchars($dest['name']); ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="footer-note">
    Whether it's our own travel project or additions to your existing programmes, the creative possibilities are endless.
</div>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
