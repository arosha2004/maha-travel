<?php
// api/contact_submit.php - Process Contact Form Submissions via AJAX

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method.'
    ]);
    exit;
}

$name = isset($_POST['name']) ? trim(htmlspecialchars($_POST['name'])) : '';
$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
$subject = isset($_POST['subject']) ? trim(htmlspecialchars($_POST['subject'])) : 'General Inquiry';
$message = isset($_POST['message']) ? trim(htmlspecialchars($_POST['message'])) : '';

if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill in all required fields with a valid email.'
    ]);
    exit;
}

$ticket_id = 'TICK-' . rand(10000, 99999);

echo json_encode([
    'status' => 'success',
    'ticket_id' => $ticket_id,
    'message' => "Thank you for getting in touch, {$name}! We have received your message regarding '{$subject}'. Ticket ID: {$ticket_id}."
]);
exit;
