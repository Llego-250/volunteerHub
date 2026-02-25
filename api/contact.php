<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

require_once 'config.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'POST':
        submitContact();
        break;
    case 'GET':
        getContacts();
        break;
}

function submitContact() {
    global $pdo;
    $data = json_decode(file_get_contents('php://input'), true);
    
    $stmt = $pdo->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->execute([
        $data['name'],
        $data['email'],
        $data['subject'],
        $data['message']
    ]);
    
    echo json_encode(['success' => true, 'message' => 'Contact form submitted successfully']);
}

function getContacts() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM contacts ORDER BY submitted_at DESC");
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($contacts);
}
?>