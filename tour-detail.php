<?php
// tour-detail.php - Individual Tour Detail Page
require_once __DIR__ . '/api/tours_data.php';

$tour_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$tour = $tour_id ? get_tour_by_id($tour_id) : null;

// Redirect to destinations if tour not found
if (!$tour) {
    header('Location: destinations.php');
    exit;
}

$all_tours = get_all_tours();
$related = array_filter($all_tours, fn($t) => $t['id'] !== $tour['id'] && $t['category_code'] === $tour['category_code']);
if (count($related) < 2) {
    $related = array_filter($all_tours, fn($t) => $t['id'] !== $tour['id']);
}
$related = array_values(array_slice($related, 0, 3));

$page_title = htmlspecialchars($tour['title']) . " | Maha Lanka Tours";
$current_page = "destinations";

include_once __DIR__ . '/includes/header.php';
?>

<style>
/* ================================================
   TOUR DETAIL PAGE — FULL STYLES
   ================================================ */

/* ── Hero Section ── */
.td-hero {
    position: relative;
    height: 90vh;
    min-height: 560px;
    overflow: hidden;
    display: flex;
    align-items: flex-end;
}
.td-hero__bg {
    position: absolute;
    inset: 0;
    background-image: url('<?php echo htmlspecialchars($tour['image']); ?>');
    background-size: cover;
    background-position: center 30%;
    transform: scale(1.05);
    transition: transform 8s ease-out;
    animation: heroZoom 8s ease-out forwards;
}
@keyframes heroZoom {
    from { transform: scale(1.1); }
    to   { transform: scale(1.0); }
}
.td-hero__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(15, 23, 42, 0.1) 0%,
        rgba(15, 23, 42, 0.25) 40%,
        rgba(15, 23, 42, 0.82) 85%,
        rgba(15, 23, 42, 0.92) 100%
    );
}
.td-hero__content {
    position: relative;
    z-index: 2;
    width: 100%;
    padding: 0 0 60px;
    max-width: 1280px;
    margin: 0 auto;
    padding-left: 40px;
    padding-right: 40px;
    animation: fadeInUp 0.8s ease 0.2s both;
}
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to   { opacity: 1; transform: translateY(0); }
}
.td-hero__breadcrumb {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 20px;
    font-size: 0.82rem;
    color: rgba(255,255,255,0.65);
}
.td-hero__breadcrumb a {
    color: rgba(255,255,255,0.65);
    text-decoration: none;
    transition: color 0.2s;
}
.td-hero__breadcrumb a:hover { color: #F2B544; }
.td-hero__breadcrumb span { color: rgba(255,255,255,0.4); }

.td-hero__tags {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 18px;
}
.td-hero__tag {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}
.td-hero__tag--category {
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255,255,255,0.25);
    color: #fff;
}
.td-hero__tag--badge {
    background: #F2B544;
    color: #0f172a;
}
.td-hero__title {
    font-family: var(--font-heading);
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 700;
    color: #fff;
    line-height: 1.2;
    margin-bottom: 14px;
    text-shadow: 0 2px 20px rgba(0,0,0,0.3);
}
.td-hero__subtitle {
    font-size: 1.05rem;
    color: rgba(255,255,255,0.8);
    margin-bottom: 28px;
    max-width: 600px;
    line-height: 1.6;
}
.td-hero__stats {
    display: flex;
    align-items: center;
    gap: 28px;
    flex-wrap: wrap;
}
.td-hero__stat {
    display: flex;
    align-items: center;
    gap: 8px;
    color: rgba(255,255,255,0.85);
    font-size: 0.9rem;
    font-weight: 500;
}
.td-hero__stat strong { color: #fff; font-weight: 700; }
.td-hero__stat svg { opacity: 0.7; flex-shrink: 0; }
.td-hero__stat--rating strong { color: #F2B544; }

/* ── Scroll Down Button ── */
.td-hero__scroll {
    position: absolute;
    bottom: 30px;
    right: 48px;
    z-index: 3;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
    cursor: pointer;
    animation: bounce 2s infinite 2s;
}
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50%       { transform: translateY(8px); }
}
.td-hero__scroll span {
    font-size: 0.65rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: rgba(255,255,255,0.5);
    writing-mode: vertical-rl;
}
.td-hero__scroll svg { color: rgba(255,255,255,0.5); }

/* ── Main Layout ── */
.td-layout {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 40px;
    max-width: 1280px;
    margin: 0 auto;
    padding: 60px 40px 80px;
    align-items: start;
}
@media (max-width: 1100px) {
    .td-layout { grid-template-columns: 1fr; }
    .td-sidebar { order: -1; }
}
@media (max-width: 640px) {
    .td-layout { padding: 32px 20px 60px; gap: 28px; }
    .td-hero__content { padding-left: 20px; padding-right: 20px; padding-bottom: 40px; }
}

/* ── Main Content ── */
.td-main { min-width: 0; }

/* ── Section Labels ── */
.td-section-label {
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--primary);
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.td-section-label::after {
    content: '';
    flex: 1;
    height: 1px;
    background: rgba(46,79,158,0.15);
}

/* ── Overview Block ── */
.td-overview {
    background: var(--beige-sand);
    border-radius: 20px;
    padding: 32px;
    margin-bottom: 40px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    border: 1px solid rgba(46,79,158,0.08);
}
@media (max-width: 640px) { .td-overview { grid-template-columns: 1fr 1fr; gap: 16px; padding: 22px; } }
.td-ov-item {
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.td-ov-item__icon {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    background: rgba(46,79,158,0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 4px;
    color: var(--primary);
}
.td-ov-item__label { font-size: 0.72rem; font-weight: 600; color: var(--gray-text); text-transform: uppercase; letter-spacing: 0.08em; }
.td-ov-item__value { font-size: 1rem; font-weight: 700; color: var(--text-dark); }

/* ── Gallery ── */
.td-gallery { margin-bottom: 48px; }
.td-gallery-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    grid-template-rows: 200px 200px;
    gap: 12px;
    border-radius: 20px;
    overflow: hidden;
}
.td-gallery-item {
    overflow: hidden;
    cursor: pointer;
    position: relative;
}
.td-gallery-item:first-child { grid-row: 1 / 3; }
.td-gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s cubic-bezier(0.4,0,0.2,1);
}
.td-gallery-item:hover img { transform: scale(1.06); }
.td-gallery-item__overlay {
    position: absolute;
    inset: 0;
    background: rgba(15,23,42,0);
    transition: background 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}
.td-gallery-item:hover .td-gallery-item__overlay { background: rgba(15,23,42,0.25); }
.td-gallery-item__overlay svg { opacity: 0; transform: scale(0.8); transition: all 0.3s ease; color: #fff; }
.td-gallery-item:hover .td-gallery-item__overlay svg { opacity: 1; transform: scale(1); }
@media (max-width: 640px) {
    .td-gallery-grid { grid-template-columns: 1fr 1fr; grid-template-rows: 160px 160px; }
    .td-gallery-item:first-child { grid-row: auto; }
}

/* ── Highlights ── */
.td-highlights { margin-bottom: 48px; }
.td-highlights-list {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}
@media (max-width: 640px) { .td-highlights-list { grid-template-columns: 1fr; } }
.td-hl-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 16px 18px;
    background: #fff;
    border-radius: 14px;
    border: 1px solid rgba(46,79,158,0.08);
    transition: all 0.25s ease;
    box-shadow: 0 2px 8px rgba(15,23,42,0.04);
}
.td-hl-item:hover {
    border-color: rgba(46,79,158,0.2);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(15,23,42,0.08);
}
.td-hl-item__icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    background: linear-gradient(135deg, var(--primary), #1a3270);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: #fff;
    font-size: 0.8rem;
    font-weight: 700;
}
.td-hl-item__text { font-size: 0.88rem; font-weight: 500; color: var(--text-dark); line-height: 1.4; padding-top: 6px; }

/* ── Itinerary ── */
.td-itinerary { margin-bottom: 48px; }
.td-itinerary-list { display: flex; flex-direction: column; gap: 0; }
.td-it-item {
    position: relative;
    padding-left: 48px;
    padding-bottom: 32px;
}
.td-it-item:last-child { padding-bottom: 0; }
.td-it-item::before {
    content: '';
    position: absolute;
    left: 14px;
    top: 30px;
    width: 2px;
    height: calc(100% - 16px);
    background: linear-gradient(to bottom, rgba(46,79,158,0.3), rgba(46,79,158,0.05));
}
.td-it-item:last-child::before { display: none; }
.td-it-item__day {
    position: absolute;
    left: 0;
    top: 0;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: var(--primary);
    color: #fff;
    font-size: 0.68rem;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(46,79,158,0.35);
    z-index: 1;
}
.td-it-item__header {
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 18px;
    background: #fff;
    border-radius: 14px;
    border: 1px solid rgba(46,79,158,0.08);
    box-shadow: 0 2px 8px rgba(15,23,42,0.04);
    transition: all 0.25s ease;
    gap: 12px;
}
.td-it-item.open .td-it-item__header {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-color: transparent;
    background: var(--primary);
    color: #fff;
}
.td-it-item__header:hover { box-shadow: 0 4px 16px rgba(15,23,42,0.08); }
.td-it-item__title { font-size: 0.92rem; font-weight: 700; color: inherit; }
.td-it-item.open .td-it-item__title { color: #fff; }
.td-it-item__chevron { 
    flex-shrink: 0;
    transition: transform 0.3s ease;
    color: var(--gray-text);
}
.td-it-item.open .td-it-item__chevron { 
    transform: rotate(180deg);
    color: rgba(255,255,255,0.7);
}
.td-it-item__body {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s cubic-bezier(0.4,0,0.2,1);
    background: #fff;
    border: 1px solid rgba(46,79,158,0.08);
    border-top: none;
    border-radius: 0 0 14px 14px;
}
.td-it-item.open .td-it-item__body { max-height: 200px; }
.td-it-item__desc {
    padding: 14px 18px 18px;
    font-size: 0.88rem;
    color: var(--gray-text);
    line-height: 1.7;
}

/* ── Inclusions ── */
.td-inclusions { margin-bottom: 48px; }
.td-inclusions-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}
@media (max-width: 640px) { .td-inclusions-grid { grid-template-columns: 1fr; } }
.td-inc-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 18px;
    background: linear-gradient(135deg, rgba(46,79,158,0.04), rgba(46,79,158,0.02));
    border-radius: 12px;
    border: 1px solid rgba(46,79,158,0.1);
    font-size: 0.87rem;
    color: var(--text-dark);
    font-weight: 500;
}
.td-inc-item svg { color: #16a34a; flex-shrink: 0; }

/* ── Sidebar ── */
.td-sidebar { position: sticky; top: 100px; }

.td-booking-card {
    background: #fff;
    border-radius: 24px;
    border: 1px solid rgba(46,79,158,0.1);
    box-shadow: 0 20px 60px rgba(15,23,42,0.1);
    overflow: hidden;
    margin-bottom: 24px;
}
.td-booking-card__header {
    background: linear-gradient(135deg, var(--primary) 0%, #1a3270 100%);
    padding: 28px 28px 24px;
    position: relative;
    overflow: hidden;
}
.td-booking-card__header::before {
    content: '';
    position: absolute;
    top: -40px; right: -40px;
    width: 140px; height: 140px;
    border-radius: 50%;
    background: rgba(255,255,255,0.05);
}
.td-booking-card__header::after {
    content: '';
    position: absolute;
    bottom: -30px; left: -20px;
    width: 100px; height: 100px;
    border-radius: 50%;
    background: rgba(255,255,255,0.04);
}
.td-booking-card__price-label {
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: rgba(255,255,255,0.6);
    margin-bottom: 6px;
}
.td-booking-card__price {
    font-size: 2.8rem;
    font-weight: 800;
    color: #fff;
    line-height: 1;
    margin-bottom: 4px;
}
.td-booking-card__price sup { font-size: 1.4rem; vertical-align: super; }
.td-booking-card__per { font-size: 0.82rem; color: rgba(255,255,255,0.6); }
.td-booking-card__rating {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-top: 14px;
    font-size: 0.82rem;
    color: rgba(255,255,255,0.8);
}
.td-booking-card__stars { color: #F2B544; font-size: 0.9rem; }
.td-booking-card__body { padding: 24px 28px 28px; }
.td-booking-card__feature {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.85rem;
    color: var(--gray-text);
    padding: 10px 0;
    border-bottom: 1px solid #f1f5f9;
}
.td-booking-card__feature:last-of-type { border-bottom: none; margin-bottom: 8px; }
.td-booking-card__feature svg { color: var(--primary); flex-shrink: 0; }
.td-booking-card__feature strong { color: var(--text-dark); }

.td-btn-book-main {
    display: block;
    width: 100%;
    padding: 16px;
    background: linear-gradient(135deg, #F2B544 0%, #e0a534 100%);
    color: #0f172a;
    font-size: 1rem;
    font-weight: 800;
    font-family: var(--font-body);
    border: none;
    border-radius: 14px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 6px 24px rgba(242,181,68,0.4);
    margin-bottom: 12px;
    letter-spacing: 0.02em;
}
.td-btn-book-main:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 32px rgba(242,181,68,0.5);
    background: linear-gradient(135deg, #f5c355 0%, #e8b040 100%);
}
.td-btn-enquire {
    display: block;
    width: 100%;
    padding: 14px;
    background: transparent;
    color: var(--primary);
    font-size: 0.9rem;
    font-weight: 700;
    font-family: var(--font-body);
    border: 2px solid rgba(46,79,158,0.2);
    border-radius: 14px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    transition: all 0.25s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}
.td-btn-enquire:hover {
    background: rgba(46,79,158,0.06);
    border-color: var(--primary);
}
.td-booking-card__guarantee {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    font-size: 0.75rem;
    color: var(--gray-text);
    margin-top: 14px;
    text-align: center;
}
.td-booking-card__guarantee svg { color: #16a34a; flex-shrink: 0; }

/* ── Contact Card ── */
.td-contact-card {
    background: linear-gradient(135deg, #f3ebe1 0%, #ede3d5 100%);
    border-radius: 20px;
    padding: 24px;
    border: 1px solid rgba(46,79,158,0.08);
}
.td-contact-card h4 {
    font-family: var(--font-heading);
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 6px;
}
.td-contact-card p {
    font-size: 0.82rem;
    color: var(--gray-text);
    line-height: 1.5;
    margin-bottom: 16px;
}
.td-contact-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 14px;
    background: #fff;
    border-radius: 10px;
    margin-bottom: 8px;
    text-decoration: none;
    color: var(--text-dark);
    font-size: 0.85rem;
    font-weight: 600;
    transition: all 0.2s ease;
    border: 1px solid rgba(46,79,158,0.06);
}
.td-contact-item:hover {
    background: var(--primary);
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(46,79,158,0.2);
}
.td-contact-item:hover svg { color: #fff; }
.td-contact-item svg { color: var(--primary); flex-shrink: 0; transition: color 0.2s; }

/* ── Related Tours ── */
.td-related { padding: 80px 0; background: var(--beige-sand); }
.td-related .container { max-width: 1280px; margin: 0 auto; padding: 0 40px; }
@media (max-width: 640px) { .td-related .container { padding: 0 20px; } }
.td-related__header {
    text-align: center;
    margin-bottom: 44px;
}
.td-related__tag {
    display: inline-block;
    background: rgba(46,79,158,0.1);
    color: var(--primary);
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    padding: 6px 16px;
    border-radius: 999px;
    margin-bottom: 12px;
}
.td-related__title {
    font-family: var(--font-heading);
    font-size: clamp(1.7rem, 3.5vw, 2.4rem);
    font-weight: 700;
    color: var(--text-dark);
    line-height: 1.2;
}
.td-related__title span { color: var(--primary); font-family: 'Reey', cursive; font-weight: normal; }
.td-related-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}
@media (max-width: 1024px) { .td-related-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 640px)  { .td-related-grid { grid-template-columns: 1fr; } }

/* Related tour cards reuse .tc styles from destinations */
.td-rtc {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(15,23,42,0.07);
    transition: transform 0.35s cubic-bezier(0.4,0,0.2,1), box-shadow 0.35s ease;
    display: flex;
    flex-direction: column;
    text-decoration: none;
    color: inherit;
}
.td-rtc:hover { transform: translateY(-8px); box-shadow: 0 20px 50px rgba(15,23,42,0.14); }
.td-rtc__img {
    position: relative;
    width: 100%;
    aspect-ratio: 16/10;
    overflow: hidden;
}
.td-rtc__img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
.td-rtc:hover .td-rtc__img img { transform: scale(1.06); }
.td-rtc__price {
    position: absolute;
    bottom: 12px;
    right: 12px;
    background: rgba(15,23,42,0.82);
    backdrop-filter: blur(8px);
    color: #fff;
    font-size: 0.95rem;
    font-weight: 800;
    padding: 6px 12px;
    border-radius: 8px;
}
.td-rtc__price span { font-size: 0.68rem; font-weight: 400; opacity: 0.8; }
.td-rtc__body { padding: 20px; flex: 1; display: flex; flex-direction: column; }
.td-rtc__dur { font-size: 0.78rem; color: var(--gray-text); margin-bottom: 6px; display: flex; align-items: center; gap: 4px; }
.td-rtc__title { font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; color: var(--text-dark); line-height: 1.3; margin-bottom: 14px; }
.td-rtc__cta {
    margin-top: auto;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.84rem;
    font-weight: 700;
    color: var(--primary);
}
.td-rtc:hover .td-rtc__cta { gap: 10px; }
.td-rtc__cta svg { transition: transform 0.25s ease; }
.td-rtc:hover .td-rtc__cta svg { transform: translateX(4px); }

/* ── Lightbox ── */
.td-lightbox {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.95);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 24px;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
}
.td-lightbox.open { opacity: 1; pointer-events: all; }
.td-lightbox__img {
    max-width: 90vw;
    max-height: 85vh;
    object-fit: contain;
    border-radius: 12px;
    transform: scale(0.95);
    transition: transform 0.3s ease;
}
.td-lightbox.open .td-lightbox__img { transform: scale(1); }
.td-lightbox__close {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.2);
    color: #fff;
    font-size: 1.1rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}
.td-lightbox__close:hover { background: rgba(255,255,255,0.2); transform: scale(1.1); }

/* ── Floating Back Button ── */
.td-back-btn {
    position: fixed;
    top: 90px;
    left: 24px;
    z-index: 100;
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 9px 16px;
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(46,79,158,0.12);
    border-radius: 999px;
    color: var(--text-dark);
    font-size: 0.8rem;
    font-weight: 600;
    font-family: var(--font-body);
    cursor: pointer;
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 4px 16px rgba(15,23,42,0.1);
}
.td-back-btn:hover { background: var(--primary); color: #fff; transform: translateX(-2px); }
.td-back-btn:hover svg { color: #fff; }
.td-back-btn svg { color: var(--primary); transition: color 0.25s; }

/* ── WhatsApp Float ── */
.td-whatsapp-float {
    position: fixed;
    bottom: 32px;
    right: 28px;
    z-index: 200;
    width: 58px;
    height: 58px;
    border-radius: 50%;
    background: #25D366;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 28px rgba(37,211,102,0.4);
    text-decoration: none;
    transition: all 0.3s ease;
    animation: waPulse 3s infinite 3s;
}
.td-whatsapp-float:hover { transform: scale(1.1); box-shadow: 0 12px 36px rgba(37,211,102,0.5); }
@keyframes waPulse {
    0%, 100% { box-shadow: 0 8px 28px rgba(37,211,102,0.4); }
    50%       { box-shadow: 0 8px 28px rgba(37,211,102,0.4), 0 0 0 12px rgba(37,211,102,0.1); }
}

/* ── Responsive ── */
@media (max-width: 768px) {
    .td-hero { height: 75vh; }
    .td-overview { grid-template-columns: 1fr 1fr; }
    .td-back-btn { display: none; }
}
</style>

<!-- Back Button -->
<a href="destinations.php" class="td-back-btn">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
    All Tours
</a>

<!-- WhatsApp Float -->
<a href="https://wa.me/94XXXXXXXXX?text=Hi!%20I'm%20interested%20in%20the%20<?php echo urlencode($tour['title']); ?>%20tour."
   class="td-whatsapp-float" target="_blank" rel="noopener" title="Chat on WhatsApp">
    <svg width="28" height="28" viewBox="0 0 24 24" fill="#fff">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
        <path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.553 4.116 1.527 5.847L0 24l6.335-1.504A11.945 11.945 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.808 9.808 0 01-5.304-1.549l-.38-.226-3.762.893.938-3.652-.248-.396A9.781 9.781 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/>
    </svg>
</a>

<!-- ═══════════════ HERO SECTION ═══════════════ -->
<section class="td-hero" id="tourHero">
    <div class="td-hero__bg"></div>
    <div class="td-hero__overlay"></div>

    <div class="td-hero__content">
        <div class="td-hero__breadcrumb">
            <a href="index.php">Home</a>
            <span>›</span>
            <a href="destinations.php">Tours</a>
            <span>›</span>
            <span style="color: rgba(255,255,255,0.8);"><?php echo htmlspecialchars($tour['title']); ?></span>
        </div>

        <div class="td-hero__tags">
            <span class="td-hero__tag td-hero__tag--category">
                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                <?php echo htmlspecialchars($tour['region']); ?>
            </span>
            <span class="td-hero__tag td-hero__tag--badge"><?php echo htmlspecialchars($tour['badge']); ?></span>
            <span class="td-hero__tag td-hero__tag--category"><?php echo htmlspecialchars($tour['category']); ?></span>
        </div>

        <h1 class="td-hero__title"><?php echo htmlspecialchars($tour['title']); ?></h1>
        <p class="td-hero__subtitle"><?php echo htmlspecialchars($tour['subtitle']); ?></p>

        <div class="td-hero__stats">
            <div class="td-hero__stat">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <strong><?php echo htmlspecialchars($tour['duration']); ?></strong>
            </div>
            <div class="td-hero__stat td-hero__stat--rating">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="#F2B544" stroke="#F2B544" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                <strong><?php echo htmlspecialchars($tour['rating']); ?></strong>
                <span style="color: rgba(255,255,255,0.6);">(<?php echo htmlspecialchars($tour['reviews_count']); ?> reviews)</span>
            </div>
            <div class="td-hero__stat">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                <span>Private Tour</span>
            </div>
            <div class="td-hero__stat">
                <span style="font-size: 1.4rem; font-weight: 800; color: #F2B544;">$<?php echo number_format($tour['price']); ?></span>
                <span style="color: rgba(255,255,255,0.6);">/ person</span>
            </div>
        </div>
    </div>

    <div class="td-hero__scroll" onclick="document.getElementById('tourContent').scrollIntoView({behavior:'smooth'})">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
        <span>Scroll</span>
    </div>
</section>

<!-- ═══════════════ MAIN LAYOUT ═══════════════ -->
<div id="tourContent" style="background: var(--beige-sand); padding-top: 2px;">
<div class="td-layout">

    <!-- ── LEFT MAIN CONTENT ── -->
    <main class="td-main">

        <!-- Overview Strip -->
        <div class="td-overview" style="margin-top: 0;">
            <div class="td-ov-item">
                <div class="td-ov-item__icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <span class="td-ov-item__label">Duration</span>
                <span class="td-ov-item__value"><?php echo htmlspecialchars($tour['duration']); ?></span>
            </div>
            <div class="td-ov-item">
                <div class="td-ov-item__icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
                <span class="td-ov-item__label">Region</span>
                <span class="td-ov-item__value"><?php echo htmlspecialchars($tour['region']); ?></span>
            </div>
            <div class="td-ov-item">
                <div class="td-ov-item__icon" style="background: rgba(22,163,74,0.1); color: #16a34a;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
                <span class="td-ov-item__label">Rating</span>
                <span class="td-ov-item__value" style="color: #16a34a;"><?php echo htmlspecialchars($tour['rating']); ?> ★ <span style="font-size: 0.75rem; font-weight: 400; color: var(--gray-text);">(<?php echo $tour['reviews_count']; ?>)</span></span>
            </div>
            <div class="td-ov-item">
                <div class="td-ov-item__icon" style="background: rgba(242,181,68,0.12); color: #d97706;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                </div>
                <span class="td-ov-item__label">Tour Type</span>
                <span class="td-ov-item__value"><?php echo htmlspecialchars($tour['category']); ?></span>
            </div>
            <div class="td-ov-item">
                <div class="td-ov-item__icon" style="background: rgba(15,23,42,0.06); color: var(--text-dark);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                </div>
                <span class="td-ov-item__label">Group Type</span>
                <span class="td-ov-item__value">Private Only</span>
            </div>
            <div class="td-ov-item">
                <div class="td-ov-item__icon" style="background: rgba(46,79,158,0.1); color: var(--primary);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                </div>
                <span class="td-ov-item__label">From</span>
                <span class="td-ov-item__value" style="color: var(--primary);">$<?php echo number_format($tour['price']); ?> <span style="font-size: 0.72rem; font-weight: 400; color: var(--gray-text);">/ person</span></span>
            </div>
        </div>

        <!-- Gallery -->
        <?php if (!empty($tour['gallery'])): ?>
        <div class="td-gallery">
            <div class="td-section-label">Photo Gallery</div>
            <div class="td-gallery-grid">
                <?php foreach ($tour['gallery'] as $i => $img): ?>
                <div class="td-gallery-item" onclick="openLightbox('<?php echo htmlspecialchars($img); ?>')">
                    <img src="<?php echo htmlspecialchars($img); ?>"
                         alt="<?php echo htmlspecialchars($tour['title']); ?> - Photo <?php echo $i+1; ?>"
                         loading="lazy">
                    <div class="td-gallery-item__overlay">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Highlights -->
        <div class="td-highlights">
            <div class="td-section-label">Tour Highlights</div>
            <div class="td-highlights-list">
                <?php foreach ($tour['highlights'] as $i => $hl): ?>
                <div class="td-hl-item">
                    <div class="td-hl-item__icon"><?php echo str_pad($i+1, 2, '0', STR_PAD_LEFT); ?></div>
                    <span class="td-hl-item__text"><?php echo htmlspecialchars($hl); ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Itinerary -->
        <?php if (!empty($tour['itinerary'])): ?>
        <div class="td-itinerary">
            <div class="td-section-label">Day-by-Day Itinerary</div>
            <div class="td-itinerary-list">
                <?php foreach ($tour['itinerary'] as $i => $day): ?>
                <div class="td-it-item <?php echo ($i === 0) ? 'open' : ''; ?>" onclick="toggleItinerary(this)">
                    <div class="td-it-item__day"><?php echo $day['day']; ?></div>
                    <div class="td-it-item__header">
                        <span class="td-it-item__title">
                            <strong style="opacity: 0.6; margin-right: 6px;">Day <?php echo $day['day']; ?></strong>
                            <?php echo htmlspecialchars($day['title']); ?>
                        </span>
                        <svg class="td-it-item__chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </div>
                    <div class="td-it-item__body">
                        <p class="td-it-item__desc"><?php echo htmlspecialchars($day['desc']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Inclusions -->
        <?php if (!empty($tour['inclusions'])): ?>
        <div class="td-inclusions">
            <div class="td-section-label">What's Included</div>
            <div class="td-inclusions-grid">
                <?php foreach ($tour['inclusions'] as $inc): ?>
                <div class="td-inc-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    <?php echo htmlspecialchars($inc); ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

    </main>

    <!-- ── RIGHT SIDEBAR ── -->
    <aside class="td-sidebar">

        <!-- Booking Card -->
        <div class="td-booking-card">
            <div class="td-booking-card__header">
                <div class="td-booking-card__price-label">Price From</div>
                <div class="td-booking-card__price">
                    <sup>$</sup><?php echo number_format($tour['price']); ?>
                </div>
                <div class="td-booking-card__per">per person · all inclusive</div>
                <div class="td-booking-card__rating">
                    <span class="td-booking-card__stars">★★★★★</span>
                    <span><?php echo $tour['rating']; ?> · <?php echo $tour['reviews_count']; ?> reviews</span>
                </div>
            </div>
            <div class="td-booking-card__body">
                <div class="td-booking-card__feature">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <span><strong><?php echo htmlspecialchars($tour['duration']); ?></strong></span>
                </div>
                <div class="td-booking-card__feature">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                    <span>Private · <strong>100% Exclusive</strong></span>
                </div>
                <div class="td-booking-card__feature">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span><strong><?php echo htmlspecialchars($tour['region']); ?></strong></span>
                </div>
                <div class="td-booking-card__feature">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <span>Free Cancellation · <strong>Flexible dates</strong></span>
                </div>

                <a href="contact.php?tour=<?php echo urlencode($tour['title']); ?>&id=<?php echo $tour['id']; ?>"
                   class="td-btn-book-main">
                    ✈ Book This Tour
                </a>
                <a href="contact.php?tour=<?php echo urlencode($tour['title']); ?>&enquiry=1"
                   class="td-btn-enquire">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    Send an Enquiry
                </a>

                <div class="td-booking-card__guarantee">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    Secure booking · No hidden fees · Best price guaranteed
                </div>
            </div>
        </div>

        <!-- Contact Card -->
        <div class="td-contact-card">
            <h4>Need Help Planning?</h4>
            <p>Our Sri Lanka travel experts are available 24/7 to create your perfect itinerary.</p>
            <a href="tel:+94XXXXXXXXX" class="td-contact-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12.7 19.79 19.79 0 0 1 1.61 4.08 2 2 0 0 1 3.58 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.91a16 16 0 0 0 6.07 6.07l1.06-1.06a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                Call Us Directly
            </a>
            <a href="mailto:info@mahalankatours.com" class="td-contact-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                Email Us
            </a>
            <a href="https://wa.me/94XXXXXXXXX?text=Hi!%20I'm%20interested%20in%20<?php echo urlencode($tour['title']); ?>." 
               target="_blank" class="td-contact-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zM12 0C5.373 0 0 5.373 0 12c0 2.123.553 4.116 1.527 5.847L0 24l6.335-1.504A11.945 11.945 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.808 9.808 0 01-5.304-1.549l-.38-.226-3.762.893.938-3.652-.248-.396A9.781 9.781 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/></svg>
                WhatsApp Us
            </a>
        </div>

    </aside>
</div><!-- end td-layout -->
</div><!-- end bg wrapper -->

<!-- ═══════════════ RELATED TOURS ═══════════════ -->
<?php if (!empty($related)): ?>
<section class="td-related">
    <div class="container">
        <div class="td-related__header">
            <div class="td-related__tag">You May Also Like</div>
            <h2 class="td-related__title">More <span>Sri Lanka</span> Adventures</h2>
        </div>
        <div class="td-related-grid">
            <?php foreach ($related as $rt): ?>
            <a href="tour-detail.php?id=<?php echo $rt['id']; ?>" class="td-rtc">
                <div class="td-rtc__img">
                    <img src="<?php echo htmlspecialchars($rt['image']); ?>"
                         alt="<?php echo htmlspecialchars($rt['title']); ?>"
                         loading="lazy">
                    <div class="td-rtc__price">
                        $<?php echo number_format($rt['price']); ?><span> /person</span>
                    </div>
                </div>
                <div class="td-rtc__body">
                    <div class="td-rtc__dur">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <?php echo htmlspecialchars($rt['duration']); ?>
                        &nbsp;·&nbsp; ★ <?php echo htmlspecialchars($rt['rating']); ?>
                    </div>
                    <h3 class="td-rtc__title"><?php echo htmlspecialchars($rt['title']); ?></h3>
                    <div class="td-rtc__cta">
                        View Details
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ═══════════════ LIGHTBOX ═══════════════ -->
<div class="td-lightbox" id="tdLightbox" onclick="closeLightbox(event)">
    <button class="td-lightbox__close" onclick="closeLightboxBtn()">&#10005;</button>
    <img src="" alt="Gallery Image" class="td-lightbox__img" id="tdLightboxImg">
</div>

<script>
// Itinerary Accordion
function toggleItinerary(el) {
    el.classList.toggle('open');
}

// Lightbox
function openLightbox(src) {
    document.getElementById('tdLightboxImg').src = src;
    document.getElementById('tdLightbox').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeLightbox(e) {
    if (e.target === document.getElementById('tdLightbox')) closeLightboxBtn();
}
function closeLightboxBtn() {
    document.getElementById('tdLightbox').classList.remove('open');
    document.body.style.overflow = '';
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightboxBtn(); });

// Sticky header shrink check
window.addEventListener('scroll', () => {
    const hero = document.getElementById('tourHero');
    const backBtn = document.querySelector('.td-back-btn');
    if (hero && backBtn) {
        const scrolled = window.scrollY > 80;
        backBtn.style.background = scrolled
            ? 'rgba(255,255,255,0.97)'
            : 'rgba(255,255,255,0.9)';
    }
});
</script>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
