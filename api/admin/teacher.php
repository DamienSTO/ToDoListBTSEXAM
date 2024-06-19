<?php 

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../JWT.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$token = $input['token'] ?? '';

if (!$token) {
    http_response_code(400);
    echo json_encode(['error' => 'Token is required']);
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

    $sql = "SELECT user_id, username, role FROM user WHERE role = 2";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'users' => $users]);
    exit;
} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(['error' => 'Token verification failed', 'message' => $e->getMessage()]);
    exit;
}

?>
