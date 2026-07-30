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
                    <div class="feature-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <h3 class="feature-title">Headquarters Office</h3>
                    <p class="feature-desc">Maha Lanka Towers, 45 Galle Road, Colombo 03, Sri Lanka</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    </div>
                    <h3 class="feature-title">Phone & WhatsApp</h3>
                    <p class="feature-desc">
                        Direct Line: +94 11 234 5678<br>
                        24/7 WhatsApp: +94 77 123 4567
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                    </div>
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
