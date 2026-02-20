<?php
require_once 'config.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'POST':
        sendMessage();
        break;
    case 'GET':
        getMessages();
        break;
    case 'PUT':
        markAsRead();
        break;
}

function sendMessage() {
    global $pdo;
    $input = file_get_contents('php://input');
    error_log('Raw input: ' . $input);
    
    $data = json_decode($input, true);
    error_log('Decoded data: ' . print_r($data, true));
    
    // Accept both field formats for compatibility
    $fromUserId = $data['fromUserId'] ?? $data['from'] ?? null;
    $toUserId = $data['toUserId'] ?? $data['to'] ?? null;
    $message = $data['message'] ?? null;
    
    if (!$fromUserId || !$toUserId || !$message) {
        $error = 'Missing required fields. Received: ' . print_r($data, true);
        error_log($error);
        echo json_encode(['success' => false, 'message' => $error]);
        return;
    }
    
    try {
        $stmt = $pdo->prepare("INSERT INTO messages (from_user_id, to_user_id, message) VALUES (?, ?, ?)");
        $result = $stmt->execute([
            $fromUserId,
            $toUserId,
            $message
        ]);
        
        error_log('Insert result: ' . ($result ? 'success' : 'failed'));
        echo json_encode(['success' => true, 'message' => 'Message sent successfully']);
    } catch (PDOException $e) {
        error_log('Database error: ' . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
    }
}

function getMessages() {
    global $pdo;
    $userId = $_GET['user_id'] ?? null;
    
    if (!$userId) {
        echo json_encode(['error' => 'Missing user_id parameter']);
        return;
    }
    
    try {
        $stmt = $pdo->prepare("
            SELECT m.*, 
                   sender.name as from_name
            FROM messages m
            JOIN users sender ON m.from_user_id = sender.id
            WHERE m.to_user_id = ?
            ORDER BY m.sent_at DESC
        ");
        
        $stmt->execute([$userId]);
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        error_log('Messages fetched for user ' . $userId . ': ' . count($messages));
        echo json_encode($messages);
    } catch (PDOException $e) {
        error_log('Error fetching messages: ' . $e->getMessage());
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
}

function markAsRead() {
    global $pdo;
    $input = file_get_contents('php://input');
    error_log('markAsRead input: ' . $input);
    
    $data = json_decode($input, true);
    error_log('markAsRead data: ' . print_r($data, true));
    
    if (!isset($data['messageId'])) {
        error_log('No messageId provided');
        echo json_encode(['success' => false, 'message' => 'No messageId provided']);
        return;
    }
    
    try {
        $stmt = $pdo->prepare("UPDATE messages SET is_read = 1 WHERE id = ?");
        $result = $stmt->execute([$data['messageId']]);
        $rowsAffected = $stmt->rowCount();
        
        error_log('Update result: ' . ($result ? 'success' : 'failed') . ', rows affected: ' . $rowsAffected);
        
        echo json_encode(['success' => true, 'message' => 'Message marked as read', 'rowsAffected' => $rowsAffected]);
    } catch (PDOException $e) {
        error_log('markAsRead error: ' . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
    }
}
?>