<?php
// api/book_tour.php - Process Tour Bookings & Custom Itinerary Inquiries via AJAX

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method.'
    ]);
    exit;
}

// Sanitize inputs
$name = isset($_POST['full_name']) ? trim(htmlspecialchars($_POST['full_name'])) : '';
$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
$phone = isset($_POST['phone']) ? trim(htmlspecialchars($_POST['phone'])) : '';
$tour_title = isset($_POST['tour_title']) ? trim(htmlspecialchars($_POST['tour_title'])) : 'Custom Itinerary Inquiry';
$travelers = isset($_POST['travelers']) ? intval($_POST['travelers']) : 2;
$travel_date = isset($_POST['travel_date']) ? trim(htmlspecialchars($_POST['travel_date'])) : '';
$special_requests = isset($_POST['notes']) ? trim(htmlspecialchars($_POST['notes'])) : '';

// Validation
if (empty($name) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Please provide a valid full name and email address.'
    ]);
    exit;
}

// Generate confirmation reference number
$ref_code = 'MLT-' . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6));

// Mock log / email save action
$booking_data = [
    'ref_code' => $ref_code,
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'tour_title' => $tour_title,
    'travelers' => $travelers,
    'travel_date' => $travel_date,
    'special_requests' => $special_requests,
    'timestamp' => date('Y-m-d H:i:s')
];

// Return JSON response
echo json_encode([
    'status' => 'success',
    'ref_code' => $ref_code,
    'message' => "Thank you, {$name}! Your booking request for '{$tour_title}' has been received. Reference ID: {$ref_code}. Our concierge will contact you at {$email} within 2 hours.",
    'details' => $booking_data
]);
exit;
