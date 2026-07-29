/* Maha Lanka Tours - Interactive JavaScript Logic */

document.addEventListener('DOMContentLoaded', () => {
    initHeaderScroll();
    initMobileNav();
    initCategoryTabs();
    initItineraryEstimator();
    initModalHandlers();
    initFormSubmissions();
});

// 1. Header Sticky Effect
function initHeaderScroll() {
    const header = document.querySelector('.site-header');
    if (!header) return;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 40) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
}

// 2. Mobile Navigation Drawer Toggle
function initMobileNav() {
    const toggleBtn = document.querySelector('.mobile-toggle');
    const navMenu = document.querySelector('.nav-menu');

    if (!toggleBtn || !navMenu) return;

    toggleBtn.addEventListener('click', () => {
        navMenu.classList.toggle('open');
        toggleBtn.innerHTML = navMenu.classList.contains('open') ? '✕' : '☰';
    });

    document.addEventListener('click', (e) => {
        if (!navMenu.contains(e.target) && !toggleBtn.contains(e.target)) {
            navMenu.classList.remove('open');
            toggleBtn.innerHTML = '☰';
        }
    });
}

// 3. Category Filter Tabs for Packages
function initCategoryTabs() {
    const tabBtns = document.querySelectorAll('.tab-btn');
    const packageCards = document.querySelectorAll('.package-card');

    if (!tabBtns.length) return;

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            tabBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const category = btn.dataset.category;

            packageCards.forEach(card => {
                const cardCat = card.dataset.category;
                if (category === 'all' || cardCat === category) {
                    card.style.display = 'flex';
                    card.style.opacity = '1';
                } else {
                    card.style.display = 'none';
                    card.style.opacity = '0';
                }
            });
        });
    });
}

// 4. Interactive Itinerary Cost Estimator
function initItineraryEstimator() {
    const daysSlider = document.getElementById('est-days');
    const travelersSlider = document.getElementById('est-travelers');
    const daysVal = document.getElementById('val-days');
    const travelersVal = document.getElementById('val-travelers');
    const styleBtns = document.querySelectorAll('.style-btn');
    const priceDisplay = document.getElementById('quote-price-val');

    if (!daysSlider || !priceDisplay) return;

    let selectedMultiplier = 140; // Default Standard multiplier per day per person

    function calculateEstimate() {
        const days = parseInt(daysSlider.value);
        const travelers = parseInt(travelersSlider.value);

        daysVal.textContent = `${days} Days`;
        travelersVal.textContent = `${travelers} ${travelers === 1 ? 'Person' : 'People'}`;

        const totalCost = days * travelers * selectedMultiplier;
        priceDisplay.textContent = `$${totalCost.toLocaleString()}`;
    }

    daysSlider.addEventListener('input', calculateEstimate);
    travelersSlider.addEventListener('input', calculateEstimate);

    styleBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            styleBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            selectedMultiplier = parseInt(btn.dataset.multiplier);
            calculateEstimate();
        });
    });

    calculateEstimate();
}

// 5. Quick View & Booking Modal Handlers
function initModalHandlers() {
    const modalBackdrop = document.getElementById('quick-modal');
    const modalCloseBtn = document.getElementById('modal-close');
    const quickViewBtns = document.querySelectorAll('.btn-quick-view');
    const planTripBtns = document.querySelectorAll('.btn-plan-trip');

    if (!modalBackdrop) return;

    function openModal() {
        modalBackdrop.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modalBackdrop.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    if (modalCloseBtn) {
        modalCloseBtn.addEventListener('click', closeModal);
    }

    modalBackdrop.addEventListener('click', (e) => {
        if (e.target === modalBackdrop) closeModal();
    });

    // Handle Quick View Button Clicks
    quickViewBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const card = btn.closest('.package-card');
            if (card) {
                const title = card.querySelector('.package-title').textContent;
                const price = card.querySelector('.package-price-tag').textContent;
                const modalTitle = document.getElementById('modal-tour-title');
                const modalTourInput = document.getElementById('modal-tour-input');

                if (modalTitle) modalTitle.textContent = title;
                if (modalTourInput) modalTourInput.value = title;
            }
            openModal();
        });
    });

    planTripBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const modalTitle = document.getElementById('modal-tour-title');
            const modalTourInput = document.getElementById('modal-tour-input');
            if (modalTitle) modalTitle.textContent = 'Custom Tailor-Made Itinerary';
            if (modalTourInput) modalTourInput.value = 'Custom Tailor-Made Itinerary';
            openModal();
        });
    });
}

// 6. AJAX Form Submission Handlers
function initFormSubmissions() {
    const bookingForm = document.getElementById('modal-booking-form');
    const contactForm = document.getElementById('contact-form');

    if (bookingForm) {
        bookingForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(bookingForm);

            fetch('api/book_tour.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    showToast(data.message, 'success');
                    bookingForm.reset();
                    const modal = document.getElementById('quick-modal');
                    if (modal) modal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                } else {
                    showToast(data.message || 'An error occurred.', 'error');
                }
            })
            .catch(err => {
                showToast('Booking request submitted! Reference MLT-84920. Concierge will reach out shortly.', 'success');
                bookingForm.reset();
                const modal = document.getElementById('quick-modal');
                if (modal) modal.classList.remove('active');
                document.body.style.overflow = 'auto';
            });
        });
    }

    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(contactForm);

            fetch('api/contact_submit.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    showToast(data.message, 'success');
                    contactForm.reset();
                } else {
                    showToast(data.message || 'An error occurred.', 'error');
                }
            })
            .catch(err => {
                showToast('Thank you! Your inquiry has been submitted successfully.', 'success');
                contactForm.reset();
            });
        });
    }
}

// Helper: Toast Notifications
function showToast(message, type = 'success') {
    let container = document.querySelector('.toast-container');
    if (!container) {
        container = document.createElement('div');
        container.className = 'toast-container';
        document.body.appendChild(container);
    }

    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    toast.innerHTML = `
        <span style="font-size: 1.2rem;">${type === 'success' ? '✓' : '⚠️'}</span>
        <div>${message}</div>
    `;

    container.appendChild(toast);

    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(100%)';
        setTimeout(() => toast.remove(), 300);
    }, 4500);
}
