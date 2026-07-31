<?php
// includes/footer.php - Site Footer & Global Modals
?>
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col" style="padding-right: 20px;">
                    <a href="index.php" class="brand-logo" style="margin-bottom: 30px; display: inline-block;">
                        <img src="images/mlankalogo_transparent.png" alt="Maha Lanka Tours Logo" style="height: 60px; width: auto; transform: scale(1.6); transform-origin: left center;">
                    </a>
                    <p class="footer-text" style="color: #222222; font-size: 0.95rem; line-height: 1.6; margin-bottom: 30px;">
                        Sri Lanka’s premier luxury & authentic tour agency. Custom tailor-made private tours with 5-star hospitality.
                    </p>
                    <p class="footer-text" style="color: #000000; font-size: 1rem; font-weight: 700; margin-bottom: 0; display: flex; align-items: center; gap: 8px;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg> +94 11 234 5678
                    </p>
                </div>

                <div class="footer-col">
                    <h4 style="font-family: var(--font-body); font-size: 1.05rem; font-weight: 700; margin-bottom: 24px; color: #000;">Top Experiences</h4>
                    <ul class="footer-links">
                        <li><a href="tours.php">Sigiriya & Cultural Triangle</a></li>
                        <li><a href="tours.php">Ella Hill Country Train</a></li>
                        <li><a href="tours.php">Yala Wildlife Safaris</a></li>
                        <li><a href="tours.php">Mirissa Whale Expedition</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4 style="font-family: var(--font-body); font-size: 1.05rem; font-weight: 700; margin-bottom: 24px; color: #000;">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="tours.php">Curated Packages</a></li>
                        <li><a href="destinations.php">Destination Guide</a></li>
                        <li><a href="about.php">Our Story & Team</a></li>
                        <li><a href="contact.php">Contact & Support</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4 style="font-family: var(--font-body); font-size: 1.05rem; font-weight: 700; margin-bottom: 24px; color: #000;">Stay In Touch</h4>
                    <ul class="footer-links">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">YouTube</a></li>
                        <li><a href="#">TripAdvisor</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <div style="color: #444444;">Copyright © <?php echo date('Y'); ?> Maha Lanka Tours. All rights reserved.</div>
                <div style="display: flex; gap: 30px; color: #444444;">
                    <a href="#" style="color: inherit;">Privacy</a>
                    <a href="#" style="color: inherit;">Terms</a>
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

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="js/main.js?v=<?php echo time(); ?>"></script>
</body>
</html>
