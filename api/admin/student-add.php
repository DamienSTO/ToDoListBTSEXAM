<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../JWT.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$token = $input['token'] ?? '';
$username = $input['username'] ?? '';
$password = $input['password'] ?? '';

if (!$token || !$username || !$password) {
    http_response_code(400);
    echo json_encode(['error' => 'Token, username, and password are required']);
    exit;
}

try {
    $decoded = JWT::decode($token, JWT_SECRET_KEY);
    $user_id = $decoded['sub'];
    $role = $decoded['role'];

    if ($role != 1) {
        http_response_code(403);
        echo json_encode(['error' => 'Vous n\'êtes pas administrateur']);
        exit;
    }

    if (!unameIsUnique($username, $conn)) {
        http_response_code(409);
        echo json_encode(['error' => 'Username is taken! Try another']);
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (username, password, role) VALUES (?, ?, 3)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $hashed_password]);

    $newUserId = $conn->lastInsertId();

    echo json_encode(['success' => 'New user registered successfully', 'id' => $newUserId]);
    exit;
} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(['error' => 'Token verification failed', 'message' => $e->getMessage()]);
    exit;
}

/**
 * Check if the username is unique in the database.
 *
 * @param string $username
 * @param PDO $conn
 * @return bool
 */
function unameIsUnique($username, $conn) {
    $sql = "SELECT COUNT(*) FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
    $count = $stmt->fetchColumn();
    return $count == 0;
}
?>
