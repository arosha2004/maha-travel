<?php
// includes/footer.php - Site Footer & Global Modals
?>
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <a href="index.php" class="brand-logo">
                        <div class="logo-icon">M</div>
                        <div class="logo-text">
                            <span class="logo-title">MAHA LANKA</span>
                            <span class="logo-tagline">Tours & Indulgence</span>
                        </div>
                    </a>
                    <p class="footer-text">
                        Sri Lanka’s premier luxury & authentic tour agency. Custom tailor-made private tours with 5-star hospitality, local chauffeur guides, and 100% carbon-neutral travels across the resplendent island.
                    </p>
                    <div style="display: flex; gap: 12px;">
                        <span style="background: rgba(255,255,255,0.1); padding: 8px 14px; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">⭐ 4.9/5 Rating (500+ Reviews)</span>
                        <span style="background: rgba(255,255,255,0.1); padding: 8px 14px; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">🌱 Carbon Neutral</span>
                    </div>
                </div>

                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="index.php">Home Showcase</a></li>
                        <li><a href="tours.php">Curated Packages</a></li>
                        <li><a href="destinations.php">Destination Guide</a></li>
                        <li><a href="about.php">Our Story & Team</a></li>
                        <li><a href="contact.php">Contact & Support</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Top Experiences</h4>
                    <ul class="footer-links">
                        <li><a href="tours.php">Sigiriya & Cultural Triangle</a></li>
                        <li><a href="tours.php">Ella Hill Country Train</a></li>
                        <li><a href="tours.php">Yala Wildlife Safaris</a></li>
                        <li><a href="tours.php">Mirissa Whale Expedition</a></li>
                        <li><a href="tours.php">Luxury Honeymoon Villas</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Contact Concierge</h4>
                    <p style="color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-bottom: 12px;">
                        📍 45 Galle Road, Colombo 03, Sri Lanka<br>
                        📞 +94 11 234 5678 / +94 77 123 4567<br>
                        ✉️ concierge@mahalankatours.com
                    </p>
                    <button class="btn btn-primary btn-plan-trip" style="width: 100%; margin-top: 10px;">Request Callback</button>
                </div>
            </div>

            <div class="footer-bottom">
                <div>© <?php echo date('Y'); ?> Maha Lanka Tours. All Rights Reserved.</div>
                <div style="display: flex; gap: 20px;">
                    <a href="#" style="color: inherit;">Privacy Policy</a>
                    <a href="#" style="color: inherit;">Terms of Service</a>
                    <a href="#" style="color: inherit;">Sustainability Commitment</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Quick View & Booking Modal -->
    <div class="modal-backdrop" id="quick-modal">
        <div class="modal-container">
            <button class="modal-close-btn" id="modal-close">✕</button>
            <div class="modal-content-padding">
                <div class="section-tag">Instant Booking & Inquiry</div>
                <h3 class="section-title" id="modal-tour-title" style="font-size: 2rem; margin-bottom: 8px;">Book Your Ceylon Experience</h3>
                <p style="color: var(--gray-text); margin-bottom: 24px;">Fill out the brief form below. Our dedicated travel concierge will confirm your luxury itinerary within 2 hours.</p>

                <form id="modal-booking-form">
                    <input type="hidden" name="tour_title" id="modal-tour-input" value="Custom Tour Inquiry">
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                        <div class="search-field">
                            <label>Your Full Name *</label>
                            <input type="text" name="full_name" required placeholder="John Doe">
                        </div>
                        <div class="search-field">
                            <label>Email Address *</label>
                            <input type="email" name="email" required placeholder="john@example.com">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                        <div class="search-field">
                            <label>Phone / WhatsApp</label>
                            <input type="tel" name="phone" placeholder="+1 234 567 890">
                        </div>
                        <div class="search-field">
                            <label>Travelers Count</label>
                            <input type="number" name="travelers" min="1" max="20" value="2">
                        </div>
                        <div class="search-field">
                            <label>Target Travel Date</label>
                            <input type="date" name="travel_date" value="<?php echo date('Y-m-d', strtotime('+30 days')); ?>">
                        </div>
                    </div>

                    <div class="search-field" style="margin-bottom: 24px;">
                        <label>Special Requirements & Preferences</label>
                        <textarea name="notes" rows="3" style="width: 100%; padding: 12px; border: 1px solid var(--gray-border); border-radius: var(--radius-sm); font-family: var(--font-body); outline: none;" placeholder="e.g. Dietary preferences, 5-star hotel preference, room count, private guide language..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-emerald" style="width: 100%; height: 50px; font-size: 1.05rem;">Confirm & Submit Inquiry</button>
                </form>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>
</body>
</html>
