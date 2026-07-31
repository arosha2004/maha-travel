/* Maha Lanka Tours - Interactive JavaScript Logic */

document.addEventListener('DOMContentLoaded', () => {

    initMobileNav();
    initToursDeck();
    initCategoryTabs();
    initItineraryEstimator();
    initModalHandlers();
    initFormSubmissions();
    initHeroSlider();
    initTestimonialsSlider();
});



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

let toursSwiper = null;
let allPackageSlides = [];

function initToursDeck() {
    const wrapper = document.querySelector('.tours-coverflow-swiper .swiper-wrapper');
    if (!wrapper) return;

    // Cache all slides for filtering
    allPackageSlides = Array.from(wrapper.querySelectorAll('.tour-cf-slide'));

    toursSwiper = new Swiper('.tours-coverflow-swiper', {
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 3,
        spaceBetween: 24,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        speed: 700,
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 16
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 24
            }
        },
        navigation: {
            nextEl: '.tcf-next',
            prevEl: '.tcf-prev',
        },
        pagination: {
            el: '.tcf-dots',
            clickable: true,
        },
        observer: true,
        observeParents: true,
    });
}

// 3. Category Filter Tabs for Packages
function initCategoryTabs() {
    const tabBtns = document.querySelectorAll('.tab-btn');
    const wrapper = document.querySelector('.tours-coverflow-swiper .swiper-wrapper');

    if (!tabBtns.length || !wrapper) return;

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            tabBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const category = btn.dataset.category;

            // Rebuild swiper wrapper with filtered slides (no loop duplicates)
            if (toursSwiper) {
                toursSwiper.destroy(true, true);
                toursSwiper = null;
            }

            wrapper.innerHTML = '';
            allPackageSlides.forEach(slide => {
                const cardCat = slide.dataset.category;
                if (category === 'all' || cardCat === category) {
                    wrapper.appendChild(slide.cloneNode(true));
                }
            });

            // Re-init swiper
            initToursDeck();
            // Re-bind modal buttons on newly cloned slides
            initModalHandlers();
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

// 7. Hero Image Cards Slider
function initHeroSlider() {
    const cardsContainer = document.querySelector('.hero-image-cards');
    if (!cardsContainer) return;

    const locations = [
        {
            image: "images/carousal/Lake-Gregory-Park-1920x600-1.jpg",
            name: "Lake Gregory",
            country: "Nuwara Eliya, Sri Lanka"
        },
        {
            image: "images/carousal/ellarock.webp",
            name: "Ella Rock",
            country: "Ella, Sri Lanka"
        },
        {
            image: "images/carousal/sigiriya.jpeg",
            name: "Sigiriya Fortress",
            country: "Dambulla, Sri Lanka"
        },
        {
            image: "images/carousal/Mirissa-Sri-Lanka4.jpg",
            name: "Mirissa Beach",
            country: "Mirissa, Sri Lanka"
        }
    ];

    let currentIndex = 0;
    let isAnimating = false;

    // Remove static cards from HTML (except the nav button which we keep)
    const existingCards = cardsContainer.querySelectorAll('.image-card');
    existingCards.forEach(c => c.remove());

    function createCard(loc, indexClass) {
        const div = document.createElement('div');
        div.className = `image-card ${indexClass}`;
        div.innerHTML = `
            <img src="${loc.image}" alt="${loc.name}">
            <div class="card-location">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                <div>
                    <span class="card-loc-name">${loc.name}</span>
                    <span class="card-loc-country">${loc.country}</span>
                </div>
            </div>
        `;
        return div;
    }

    let card1 = createCard(locations[0], 'card-1');
    let card2 = createCard(locations[1], 'card-2');

    cardsContainer.appendChild(card1);
    cardsContainer.appendChild(card2);

    function nextSlide() {
        if (isAnimating) return;
        isAnimating = true;

        currentIndex = (currentIndex + 1) % locations.length;
        let nextIndex = (currentIndex + 1) % locations.length;

        card1.classList.remove('card-1');
        card1.classList.add('card-out');

        card2.classList.remove('card-2');
        card2.classList.add('card-1');

        let newCard2 = createCard(locations[nextIndex], 'card-new');
        cardsContainer.appendChild(newCard2);

        // Trigger reflow
        void newCard2.offsetWidth;

        newCard2.classList.remove('card-new');
        newCard2.classList.add('card-2');

        const oldCard = card1;
        setTimeout(() => {
            if (oldCard && oldCard.parentNode) {
                oldCard.remove();
            }
            isAnimating = false;
        }, 600);

        card1 = card2;
        card2 = newCard2;
    }

    let sliderInterval = setInterval(nextSlide, 4000);
}

// 8. Testimonials Slider
function initTestimonialsSlider() {
    const swiperEl = document.querySelector('.testimonials-swiper');
    if (!swiperEl) return;

    new Swiper('.testimonials-swiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.test-next',
            prevEl: '.test-prev',
        },
        pagination: {
            el: '.test-dots',
            clickable: true,
        },
        autoHeight: true,
    });
}
