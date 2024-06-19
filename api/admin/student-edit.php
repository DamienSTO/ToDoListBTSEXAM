<?php 

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../JWT.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$token = $input['token'] ?? '';
$username = $input['username'] ?? '';
$user_id = $input['user_id'] ?? '';

if (empty($token) || empty($username) || empty($user_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Token, username, and user_id are required']);
    exit;
}

try {
    $decoded = JWT::decode($token, JWT_SECRET_KEY);
    $role = $decoded['role'];

    if ($role != 1) { // Check if the role is admin
        http_response_code(403);
        echo json_encode(['error' => 'Vous n\'êtes pas administrateur']);
        exit;
    }

    if (!unameIsUnique($username, $conn, $user_id)) {
        http_response_code(409);
        echo json_encode(['error' => 'Username is taken! Try another']);
        exit;
    }

    $sql = "UPDATE user SET username = ? WHERE role = 3 AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $user_id]);

    echo json_encode(['success' => 'Username successfully updated!']);
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
 * @param int $user_id
 * @return bool
 */
function unameIsUnique($username, $conn, $user_id) {
    $sql = "SELECT COUNT(*) FROM user WHERE username = ? AND user_id != ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $user_id]);
    $count = $stmt->fetchColumn();
    return $count == 0;
}
?>
