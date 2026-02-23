<?php
require_once 'config.php';

try {
    $stmt = $pdo->query("SELECT version()");
    $version = $stmt->fetch();
    echo json_encode([
        'success' => true,
        'message' => 'Database connected successfully',
        'version' => $version['version']
    ]);
} catch(PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Database connection failed: ' . $e->getMessage()
    ]);
}
?>
