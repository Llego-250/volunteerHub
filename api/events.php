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

switch ($method) {
    case 'POST':
        if (isset($_GET['action']) && $_GET['action'] == 'register') {
            registerForEvent();
        } else {
            createEvent();
        }
        break;
    case 'GET':
        getEvents();
        break;
    case 'DELETE':
        if (isset($_GET['action']) && $_GET['action'] == 'unregister') {
            unregisterFromEvent();
        } else {
            deleteEvent();
        }
        break;
}

function createEvent()
{
    global $pdo;
    $data = json_decode(file_get_contents('php://input'), true);

    $stmt = $pdo->prepare("INSERT INTO events (title, category, date, time, location, description, requirements, max_volunteers, organizer_id, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->execute([
        $data['title'],
        $data['category'],
        $data['date'],
        $data['time'],
        $data['location'],
        $data['description'],
        $data['requirements'] ?? null,
        $data['maxVolunteers'],
        $data['organizerId'],
        $data['image'] ?? 'fas fa-calendar'
    ]);

    $newId = $pdo->lastInsertId();

    echo json_encode(['success' => true, 'message' => 'Event created successfully', 'id' => $newId]);
}

function getEvents()
{
    global $pdo;

    // Get volunteers for a specific event
    if (isset($_GET['event_id']) && isset($_GET['action']) && $_GET['action'] == 'volunteers') {
        $sql = "SELECT u.id, u.name, u.email, u.phone, u.location 
                FROM users u 
                JOIN event_registrations er ON u.id = er.volunteer_id 
                WHERE er.event_id = ? AND u.role = 'volunteer'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['event_id']]);
        $volunteers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($volunteers);
        return;
    }

    // Get registered events for a specific volunteer
    if (isset($_GET['volunteer_id']) && isset($_GET['action']) && $_GET['action'] == 'registered') {
        $sql = "SELECT e.* FROM events e 
                JOIN event_registrations er ON e.id = er.event_id 
                WHERE er.volunteer_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['volunteer_id']]);
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($events);
        return;
    }

    $sql = "SELECT e.*, u.name as organizer, 
            (SELECT COUNT(*) FROM event_registrations er WHERE er.event_id = e.id) as volunteers
            FROM events e 
            JOIN users u ON e.organizer_id = u.id";

    if (isset($_GET['organizer_id'])) {
        $sql .= " WHERE e.organizer_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['organizer_id']]);
    } else {
        $stmt = $pdo->query($sql);
    }

    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($events);
}

function registerForEvent()
{
    global $pdo;
    $data = json_decode(file_get_contents('php://input'), true);

    // Check if event exists
    $stmt = $pdo->prepare("SELECT id FROM events WHERE id = ?");
    $stmt->execute([$data['eventId']]);
    if (!$stmt->fetch()) {
        echo json_encode(['success' => false, 'message' => 'Event not found']);
        return;
    }

    // Check if user exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE id = ?");
    $stmt->execute([$data['volunteerId']]);
    if (!$stmt->fetch()) {
        echo json_encode(['success' => false, 'message' => 'User not found']);
        return;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO event_registrations (event_id, volunteer_id) VALUES (?, ?)");
        $stmt->execute([$data['eventId'], $data['volunteerId']]);

        echo json_encode(['success' => true, 'message' => 'Registered successfully']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Already registered: ' . $e->getMessage()]);
    }
}

function unregisterFromEvent()
{
    global $pdo;
    $eventId = $_GET['event_id'];
    $volunteerId = $_GET['volunteer_id'];

    $stmt = $pdo->prepare("DELETE FROM event_registrations WHERE event_id = ? AND volunteer_id = ?");
    $stmt->execute([$eventId, $volunteerId]);

    echo json_encode(['success' => true, 'message' => 'Unregistered successfully']);
}

function deleteEvent()
{
    global $pdo;
    $eventId = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM events WHERE id = ?");
    $stmt->execute([$eventId]);

    echo json_encode(['success' => true, 'message' => 'Event deleted successfully']);
}
?>