<?php
// destinations.php - Full Destinations & Tours Page
$page_title = "Destinations & Tours | Maha Lanka Tours";
$current_page = "destinations";
require_once __DIR__ . '/api/tours_data.php';

$tours = get_all_tours();
$destinations = get_destinations_data();
include_once __DIR__ . '/includes/header.php';
?>

<style>
/* ===================================
   DESTINATIONS PAGE — FULL STYLES
   =================================== */

/* ── Original Hero Slider ── */
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
    z-index: 2;
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

/* ── Filter / Category Bar ── */
.dest-filter-bar {
    background: var(--beige-sand);
    padding: 20px 24px;
    position: sticky;
    top: 0;
    z-index: 90;
}
.dest-filter-bar .container {
    display: flex;
    align-items: center;
    gap: 12px;
    overflow-x: auto;
    scrollbar-width: none;
    padding: 4px;
}
.dest-filter-bar .container::-webkit-scrollbar { display: none; }
.dest-filter-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 10px 20px;
    font-size: 0.85rem;
    font-weight: 600;
    font-family: var(--font-body);
    color: #1a2a4c;
    background: #ffffff;
    border: none;
    border-radius: 999px;
    cursor: pointer;
    white-space: nowrap;
    transition: all 0.25s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}
.dest-filter-btn:hover { 
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}
.dest-filter-btn.active { 
    color: #ffffff; 
    background: var(--primary);
    box-shadow: 0 4px 12px rgba(46,79,158,0.3);
}

/* ── Page Body ── */
.dest-page-body {
    background: var(--beige-sand);
    min-height: 60vh;
    padding: 60px 0 80px;
}

/* ── Section Header ── */
.dest-section-header { text-align: center; margin-bottom: 48px; }
.dest-section-tag {
    display: inline-block;
    background: rgba(46,79,158,0.1);
    color: var(--primary);
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    padding: 6px 16px;
    border-radius: 999px;
    margin-bottom: 14px;
}
.dest-section-title {
    font-family: var(--font-heading);
    font-size: clamp(1.9rem, 4vw, 2.8rem);
    color: var(--text-dark);
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 12px;
}
.dest-section-title span { 
    color: var(--primary); 
    font-family: 'Reey', cursive; 
    font-weight: normal; 
}
.dest-section-desc {
    color: var(--gray-text);
    font-size: 1rem;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.7;
}

/* ── Tours Grid ── */
.all-tours-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
}
@media (max-width: 1024px) { .all-tours-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 640px)  { .all-tours-grid { grid-template-columns: 1fr; gap: 20px; } }

/* ── Tour Card ── */
.tc {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(15,23,42,0.07);
    transition: transform 0.35s cubic-bezier(0.4,0,0.2,1), box-shadow 0.35s ease;
    display: flex;
    flex-direction: column;
    animation: fadeInUp 0.45s ease forwards;
}
.tc:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(15,23,42,0.14);
}
.tc.hidden { display: none; }

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(22px); }
    to   { opacity: 1; transform: translateY(0); }
}

.tc__img-wrap {
    position: relative;
    width: 100%;
    aspect-ratio: 16 / 10;
    overflow: hidden;
}
.tc__img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s cubic-bezier(0.4,0,0.2,1);
}
.tc:hover .tc__img-wrap img { transform: scale(1.06); }

.tc__badge {
    position: absolute;
    top: 14px;
    left: 14px;
    background: var(--primary);
    color: #fff;
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 5px 12px;
    border-radius: 999px;
    z-index: 2;
    box-shadow: 0 2px 8px rgba(46,79,158,0.35);
}
.tc__badge.badge--adventure { background: #e65c00; }
.tc__badge.badge--beach     { background: #0891b2; }
.tc__badge.badge--wildlife  { background: #16a34a; }
.tc__badge.badge--luxury    { background: linear-gradient(135deg, #b8860b, #f2b544); }

.tc__price-chip {
    position: absolute;
    bottom: 14px;
    right: 14px;
    background: rgba(15,23,42,0.82);
    backdrop-filter: blur(8px);
    color: #fff;
    font-size: 1rem;
    font-weight: 800;
    padding: 7px 14px;
    border-radius: 10px;
    z-index: 2;
    line-height: 1;
}
.tc__price-chip span { font-size: 0.7rem; font-weight: 400; opacity: 0.8; }

.tc__body { padding: 22px 22px 20px; display: flex; flex-direction: column; flex: 1; }
.tc__meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
}
.tc__duration {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 0.8rem;
    color: var(--gray-text);
    font-weight: 500;
}
.tc__rating {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 0.82rem;
    font-weight: 700;
    color: #16a34a;
}
.tc__rating em { font-style: normal; font-weight: 400; color: var(--gray-text); font-size: 0.78rem; }

.tc__title {
    font-family: var(--font-heading);
    font-size: 1.18rem;
    font-weight: 700;
    color: var(--text-dark);
    line-height: 1.35;
    margin-bottom: 6px;
}
.tc__subtitle { font-size: 0.84rem; color: var(--gray-text); line-height: 1.5; margin-bottom: 14px; }
.tc__highlights { display: flex; flex-direction: column; gap: 5px; margin-bottom: 18px; flex: 1; }
.tc__hl-tag { font-size: 0.79rem; color: #374151; line-height: 1.4; }

.tc__footer { display: flex; gap: 10px; margin-top: auto; }
.tc__btn-qv {
    flex: 1;
    padding: 11px 0;
    background: var(--gray-bg);
    color: var(--text-dark);
    font-size: 0.84rem;
    font-weight: 600;
    font-family: var(--font-body);
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.25s ease;
}
.tc__btn-qv:hover { background: #e2d9ce; }
.tc__btn-book {
    flex: 1;
    padding: 11px 0;
    background: var(--primary);
    color: #fff;
    font-size: 0.84rem;
    font-weight: 700;
    font-family: var(--font-body);
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.25s ease;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
}
.tc__btn-book:hover { background: #263f7e; transform: scale(1.02); }

/* ── No results ── */
.no-results { text-align: center; padding: 60px 24px; color: var(--gray-text); display: none; }
.no-results.visible { display: block; }

/* ── Destination Highlights ── */
.dest-highlights-section { padding: 80px 0; background: #fff; }
.dest-highlights-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
}
@media (max-width: 1024px) { .dest-highlights-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 640px)  { .dest-highlights-grid { grid-template-columns: 1fr; } }

.dh-card {
    position: relative;
    border-radius: 18px;
    overflow: hidden;
    aspect-ratio: 4 / 3;
    cursor: pointer;
    box-shadow: 0 6px 28px rgba(15,23,42,0.1);
}
.dh-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s cubic-bezier(0.4,0,0.2,1); }
.dh-card:hover img { transform: scale(1.08); }
.dh-card__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, rgba(15,23,42,0.05) 0%, rgba(15,23,42,0.72) 100%);
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 24px;
    transition: background 0.35s ease;
}
.dh-card:hover .dh-card__overlay { background: linear-gradient(to bottom, rgba(15,23,42,0.1) 0%, rgba(15,23,42,0.85) 100%); }
.dh-card__category {
    display: inline-block;
    background: rgba(255,255,255,0.18);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255,255,255,0.25);
    color: #fff;
    font-size: 0.68rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 999px;
    margin-bottom: 8px;
    width: fit-content;
}
.dh-card__name { font-family: var(--font-heading); font-size: 1.35rem; font-weight: 700; color: #fff; line-height: 1.2; margin-bottom: 4px; }
.dh-card__region { font-size: 0.8rem; color: rgba(255,255,255,0.75); margin-bottom: 8px; }
.dh-card__desc {
    font-size: 0.8rem;
    color: rgba(255,255,255,0.82);
    line-height: 1.5;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s ease, opacity 0.35s ease;
    opacity: 0;
}
.dh-card:hover .dh-card__desc { max-height: 80px; opacity: 1; }
.dh-card__best-time {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.74rem;
    color: #F2B544;
    font-weight: 600;
    margin-top: 8px;
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
}
.dest-cta-section::after {
    content: '';
    position: absolute;
    bottom: -60px; left: -60px;
    width: 260px; height: 260px;
    background: rgba(255,255,255,0.04);
    border-radius: 50%;
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

/* ── Quick View Modal ── */
.qv-modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(15,23,42,0.7);
    backdrop-filter: blur(6px);
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 24px;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
}
.qv-modal-overlay.open { opacity: 1; pointer-events: all; }
.qv-modal {
    background: #fff;
    border-radius: 24px;
    overflow: hidden;
    max-width: 740px;
    width: 100%;
    max-height: 88vh;
    overflow-y: auto;
    box-shadow: 0 32px 80px rgba(15,23,42,0.3);
    transform: translateY(24px) scale(0.97);
    transition: transform 0.35s cubic-bezier(0.4,0,0.2,1);
}
.qv-modal-overlay.open .qv-modal { transform: translateY(0) scale(1); }
.qv-modal__header { position: relative; }
.qv-modal__img { width: 100%; height: 260px; object-fit: cover; display: block; }
.qv-modal__close {
    position: absolute;
    top: 14px;
    right: 14px;
    background: rgba(255,255,255,0.92);
    border: none;
    border-radius: 50%;
    width: 38px;
    height: 38px;
    font-size: 1.1rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
    box-shadow: 0 2px 10px rgba(0,0,0,0.15);
    color: var(--text-dark);
    transition: all 0.2s ease;
}
.qv-modal__close:hover { transform: scale(1.1); }
.qv-modal__body { padding: 28px 32px 36px; }
.qv-modal__badge-row { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; flex-wrap: wrap; }
.qv-modal__badge { background: var(--primary); color: #fff; font-size: 0.68rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 4px 12px; border-radius: 999px; }
.qv-modal__category { background: rgba(46,79,158,0.08); color: var(--primary); font-size: 0.72rem; font-weight: 600; padding: 4px 12px; border-radius: 999px; }
.qv-modal__title { font-family: var(--font-heading); font-size: 1.6rem; font-weight: 700; color: var(--text-dark); margin-bottom: 6px; line-height: 1.25; }
.qv-modal__subtitle { color: var(--gray-text); font-size: 0.92rem; margin-bottom: 20px; }
.qv-modal__info-row { display: flex; align-items: center; gap: 24px; padding: 16px 0; border-top: 1px solid #f1f5f9; border-bottom: 1px solid #f1f5f9; margin-bottom: 22px; flex-wrap: wrap; }
.qv-modal__info-item { display: flex; align-items: center; gap: 7px; font-size: 0.87rem; color: var(--gray-text); font-weight: 500; }
.qv-modal__info-item strong { color: var(--text-dark); }
.qv-modal__hl-title { font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: var(--gray-text); margin-bottom: 12px; }
.qv-modal__hls { display: flex; flex-direction: column; gap: 8px; margin-bottom: 24px; }
.qv-modal__hl { display: flex; align-items: center; gap: 10px; font-size: 0.9rem; color: var(--text-dark); }
.qv-modal__hl::before { content: ''; width: 8px; height: 8px; border-radius: 50%; background: var(--primary); flex-shrink: 0; }
.qv-modal__footer { display: flex; align-items: center; justify-content: space-between; padding-top: 20px; border-top: 1px solid #f1f5f9; gap: 16px; flex-wrap: wrap; }
.qv-modal__price { font-size: 1.6rem; font-weight: 800; color: var(--text-dark); }
.qv-modal__price span { font-size: 0.82rem; font-weight: 400; color: var(--gray-text); }
.qv-modal__book-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--primary);
    color: #fff;
    font-size: 0.95rem;
    font-weight: 700;
    font-family: var(--font-body);
    padding: 13px 28px;
    border-radius: 12px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.25s ease;
}
.qv-modal__book-btn:hover { background: #263f7e; }
</style>

<!-- ═══════════════ ORIGINAL HERO SLIDER ═══════════════ -->
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

<!-- ═══════════════ ALL TOURS GRID ═══════════════ -->
<div class="dest-page-body" id="toursSection">
    <div class="container dest-section-header">
        <span class="dest-section-tag">Bespoke Itineraries</span>
        <h2 class="dest-section-title">All <span>Tour Packages</span></h2>
        <p class="dest-section-desc">Every tour is private, flexible, and personally crafted by our Sri Lanka travel experts.</p>
    </div>

    <!-- ═══════════════ FILTER BAR ═══════════════ -->
    <div class="dest-filter-bar" style="margin-bottom: 2rem;">
        <div class="container" style="justify-content: center; flex-wrap: wrap;">
            <button class="dest-filter-btn active" data-filter="all">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3Z"/></svg>
                All Tours
            </button>
            <button class="dest-filter-btn" data-filter="cultural">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="22" x2="21" y2="22"/><line x1="6" y1="18" x2="6" y2="11"/><line x1="10" y1="18" x2="10" y2="11"/><line x1="14" y1="18" x2="14" y2="11"/><line x1="18" y1="18" x2="18" y2="11"/><polygon points="12 2 20 7 4 7 12 2"/></svg>
                Cultural Heritage
            </button>
            <button class="dest-filter-btn" data-filter="adventure">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m8 3 4 8 5-5 5 15H2L8 3z"/></svg>
                Adventure &amp; Nature
            </button>
            <button class="dest-filter-btn" data-filter="beach">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/><path d="M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/><path d="M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/></svg>
                Beach &amp; Ocean
            </button>
            <button class="dest-filter-btn" data-filter="wildlife">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                Wildlife Safari
            </button>
            <button class="dest-filter-btn" data-filter="luxury">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3h12l4 6-10 12L2 9z"/><path d="M11 3 8 9l4 12 4-12-3-6"/><path d="M2 9h20"/></svg>
                Luxury &amp; Romance
            </button>
        </div>
    </div>

    <div class="all-tours-grid" id="toursGrid">

        <?php
        $badge_class_map = [
            'Bestseller'   => 'badge--top',
            'Top Scenic'   => 'badge--top',
            'Popular'      => 'badge--beach',
            'Adventure'    => 'badge--adventure',
            'Luxury Ultra' => 'badge--luxury',
        ];
        foreach ($tours as $tour):
            $bc = $badge_class_map[$tour['badge']] ?? 'badge--top';
        ?>
        <div class="tc" data-category="<?php echo htmlspecialchars($tour['category_code']); ?>"
             data-tour-id="<?php echo (int)$tour['id']; ?>">
            <div class="tc__img-wrap">
                <img src="<?php echo htmlspecialchars($tour['image']); ?>"
                     alt="<?php echo htmlspecialchars($tour['title']); ?>"
                     loading="lazy">
                <span class="tc__badge <?php echo $bc; ?>"><?php echo htmlspecialchars($tour['badge']); ?></span>
                <div class="tc__price-chip">
                    $<?php echo number_format($tour['price']); ?><span> / person</span>
                </div>
            </div>
            <div class="tc__body">
                <div class="tc__meta">
                    <span class="tc__duration">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <?php echo htmlspecialchars($tour['duration']); ?>
                    </span>
                    <span class="tc__rating">
                        ★ <?php echo htmlspecialchars($tour['rating']); ?>
                        <em>(<?php echo htmlspecialchars($tour['reviews_count']); ?>)</em>
                    </span>
                </div>
                <h3 class="tc__title"><?php echo htmlspecialchars($tour['title']); ?></h3>
                <p class="tc__subtitle"><?php echo htmlspecialchars($tour['subtitle']); ?></p>
                <div class="tc__highlights">
                    <?php foreach (array_slice($tour['highlights'], 0, 3) as $hl): ?>
                    <span class="tc__hl-tag">&#10003; <?php echo htmlspecialchars($hl); ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="tc__footer">
                    <button class="tc__btn-qv" onclick="openQuickView(<?php echo (int)$tour['id']; ?>)">Quick View</button>
                    <a href="contact.php?tour=<?php echo urlencode($tour['title']); ?>" class="tc__btn-book">Book Now</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="no-results" id="noResults">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin:0 auto 16px; display:block; opacity:0.35;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <p style="font-size:1rem; font-weight:600;">No tours found in this category</p>
        <p style="font-size:0.85rem; margin-top:6px;">Try selecting a different filter above.</p>
    </div>
</div>

<!-- ═══════════════ DESTINATION HIGHLIGHTS ═══════════════ -->
<section class="dest-highlights-section">
    <div class="container">
        <div class="dest-section-header">
            <span class="dest-section-tag">Places to Discover</span>
            <h2 class="dest-section-title">Iconic Sri Lankan <span>Destinations</span></h2>
            <p class="dest-section-desc">Each destination tells a thousand-year story. Explore the places that make Sri Lanka truly unforgettable.</p>
        </div>
    </div>
    <div class="dest-highlights-grid">
        <?php foreach ($destinations as $dest): ?>
        <div class="dh-card">
            <img src="<?php echo htmlspecialchars($dest['image']); ?>"
                 alt="<?php echo htmlspecialchars($dest['name']); ?>"
                 loading="lazy">
            <div class="dh-card__overlay">
                <span class="dh-card__category"><?php echo htmlspecialchars($dest['category']); ?></span>
                <h3 class="dh-card__name"><?php echo htmlspecialchars($dest['name']); ?></h3>
                <p class="dh-card__region">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:inline-block;vertical-align:-1px;margin-right:3px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <?php echo htmlspecialchars($dest['region']); ?>
                </p>
                <p class="dh-card__desc"><?php echo htmlspecialchars($dest['desc']); ?></p>
                <div class="dh-card__best-time">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#F2B544" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    Best time: <?php echo htmlspecialchars($dest['best_time']); ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ═══════════════ CTA BANNER ═══════════════ -->
<section class="dest-cta-section">
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

<!-- ═══════════════ QUICK VIEW MODAL ═══════════════ -->
<div class="qv-modal-overlay" id="qvOverlay" role="dialog" aria-modal="true">
    <div class="qv-modal" id="qvModal">
        <div class="qv-modal__header">
            <img src="" alt="" class="qv-modal__img" id="qvImg">
            <button class="qv-modal__close" id="qvClose" aria-label="Close">&#10005;</button>
        </div>
        <div class="qv-modal__body">
            <div class="qv-modal__badge-row">
                <span class="qv-modal__badge" id="qvBadge"></span>
                <span class="qv-modal__category" id="qvCategory"></span>
            </div>
            <h2 class="qv-modal__title" id="qvTitle"></h2>
            <p class="qv-modal__subtitle" id="qvSubtitle"></p>
            <div class="qv-modal__info-row">
                <div class="qv-modal__info-item">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <span id="qvDuration"></span>
                </div>
                <div class="qv-modal__info-item">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span id="qvRegion"></span>
                </div>
                <div class="qv-modal__info-item">
                    <span style="color:#f59e0b;">&#9733;</span>
                    <strong id="qvRating"></strong>
                    <span id="qvReviews"></span>
                </div>
            </div>
            <div class="qv-modal__hl-title">Tour Highlights</div>
            <div class="qv-modal__hls" id="qvHighlights"></div>
            <div class="qv-modal__footer">
                <div class="qv-modal__price">$<span id="qvPrice"></span><span> / person</span></div>
                <a href="#" class="qv-modal__book-btn" id="qvBookBtn">
                    Book This Tour
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
// Tours data for Quick View
const toursData = <?php echo json_encode(array_map(function($t) {
    return [
        'id'            => $t['id'],
        'title'         => $t['title'],
        'subtitle'      => $t['subtitle'],
        'badge'         => $t['badge'],
        'category'      => $t['category'],
        'duration'      => $t['duration'],
        'price'         => $t['price'],
        'rating'        => $t['rating'],
        'reviews_count' => $t['reviews_count'],
        'region'        => $t['region'],
        'image'         => $t['image'],
        'highlights'    => $t['highlights'],
    ];
}, $tours), JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_SLASHES); ?>;

// ── Filter Logic ──
document.querySelectorAll('.dest-filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.dest-filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');

        const filter = this.dataset.filter;
        const cards  = document.querySelectorAll('.tc');
        let visible  = 0;

        cards.forEach(card => {
            if (filter === 'all' || card.dataset.category === filter) {
                card.classList.remove('hidden');
                card.style.animationName = 'none';
                card.offsetHeight;
                card.style.animationName = '';
                visible++;
            } else {
                card.classList.add('hidden');
            }
        });

        document.getElementById('noResults').classList.toggle('visible', visible === 0);
        document.getElementById('toursSection').scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
});

// ── Quick View Modal ──
const overlay = document.getElementById('qvOverlay');

function openQuickView(id) {
    const tour = toursData.find(t => t.id === id);
    if (!tour) return;

    document.getElementById('qvImg').src      = tour.image;
    document.getElementById('qvImg').alt      = tour.title;
    document.getElementById('qvBadge').textContent    = tour.badge;
    document.getElementById('qvCategory').textContent = tour.category;
    document.getElementById('qvTitle').textContent    = tour.title;
    document.getElementById('qvSubtitle').textContent = tour.subtitle;
    document.getElementById('qvDuration').textContent = tour.duration;
    document.getElementById('qvRegion').textContent   = tour.region;
    document.getElementById('qvRating').textContent   = tour.rating;
    document.getElementById('qvReviews').textContent  = '(' + tour.reviews_count + ' reviews)';
    document.getElementById('qvPrice').textContent    = Number(tour.price).toLocaleString();
    document.getElementById('qvBookBtn').href         = 'contact.php?tour=' + encodeURIComponent(tour.title);

    document.getElementById('qvHighlights').innerHTML =
        tour.highlights.map(hl => '<div class="qv-modal__hl">' + hl + '</div>').join('');

    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';
}

document.getElementById('qvClose').addEventListener('click', closeQV);
overlay.addEventListener('click', e => { if (e.target === overlay) closeQV(); });
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeQV(); });

function closeQV() {
    overlay.classList.remove('open');
    document.body.style.overflow = '';
}


</script>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
