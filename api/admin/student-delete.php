<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../JWT.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$token = $input['token'] ?? '';
$user_id = $input['user_id'] ?? '';

if (empty($token)|| empty($user_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Token and user_id are required']);
    exit;
}

try {
    $decoded = JWT::decode($token, JWT_SECRET_KEY);
    $role = $decoded['role'];

    if ($role != 1) {
        http_response_code(403);
        echo json_encode(['error' => 'Vous n\'êtes pas administrateur']);
        exit;
    }

    $sql = "DELETE FROM user WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id]);

    echo json_encode(['success' => 'User deleted successfully']);
    exit;
} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(['error' => 'Token verification failed', 'message' => $e->getMessage()]);
    exit;
}
?>
