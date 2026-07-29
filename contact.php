<?php
// contact.php - Contact & Inquiry Page
$page_title = "Contact Us | Maha Lanka Tours";
$current_page = "contact";
include_once __DIR__ . '/includes/header.php';
?>

<section style="padding: 140px 0 60px; background: linear-gradient(180deg, var(--dark) 0%, var(--dark-surface) 100%); color: #fff; text-align: center;">
    <div class="container">
        <span class="section-tag" style="background: rgba(255,255,255,0.15); color: var(--accent-light);">Get In Touch</span>
        <h1 class="section-title" style="color: #fff; font-size: 3.25rem;">We’re Here to <span>Plan Your Trip</span></h1>
        <p class="section-desc" style="margin: 0 auto; color: rgba(255,255,255,0.8);">Have questions about Sri Lanka travel visas, weather seasons, or custom itineraries? Talk to our expert travel concierge.</p>
    </div>
</section>

<section style="padding: 80px 0 100px;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1.5fr; gap: 48px;">
            <!-- Contact Cards -->
            <div style="display: flex; flex-direction: column; gap: 24px;">
                <div class="feature-card">
                    <div class="feature-icon">📍</div>
                    <h3 class="feature-title">Headquarters Office</h3>
                    <p class="feature-desc">Maha Lanka Towers, 45 Galle Road, Colombo 03, Sri Lanka</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">📞</div>
                    <h3 class="feature-title">Phone & WhatsApp</h3>
                    <p class="feature-desc">
                        Direct Line: +94 11 234 5678<br>
                        24/7 WhatsApp: +94 77 123 4567
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">✉️</div>
                    <h3 class="feature-title">Email Inquiry</h3>
                    <p class="feature-desc">
                        General: info@mahalankatours.com<br>
                        VIP Concierge: concierge@mahalankatours.com
                    </p>
                </div>
            </div>

            <!-- Contact Form -->
            <div style="background: #fff; padding: 40px; border-radius: var(--radius-lg); box-shadow: var(--card-shadow); border: 1px solid var(--gray-border);">
                <span class="section-tag">Send Us A Message</span>
                <h3 class="section-title" style="font-size: 2rem; margin-bottom: 24px;">Direct <span>Concierge Inquiry</span></h3>

                <form id="contact-form">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                        <div class="search-field">
                            <label>Your Name *</label>
                            <input type="text" name="name" required placeholder="John Smith">
                        </div>
                        <div class="search-field">
                            <label>Email Address *</label>
                            <input type="email" name="email" required placeholder="john@example.com">
                        </div>
                    </div>

                    <div class="search-field" style="margin-bottom: 16px;">
                        <label>Subject</label>
                        <input type="text" name="subject" placeholder="e.g. Custom 10-Day Honeymoon Quote">
                    </div>

                    <div class="search-field" style="margin-bottom: 24px;">
                        <label>Message / Trip Details *</label>
                        <textarea name="message" rows="5" required style="width: 100%; padding: 12px; border: 1px solid var(--gray-border); border-radius: var(--radius-sm); font-family: var(--font-body); outline: none;" placeholder="Tell us your expected travel dates, number of people, preferred destinations, or any special requests..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-emerald" style="width: 100%; height: 50px; font-size: 1.05rem;">Send Message Now</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
