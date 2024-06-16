<?php 

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../JWT.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$token = $input['token'] ?? '';
$admin_pass = $input['admin_pass'] ?? '';
$new_pass = $input['new_pass'] ?? '';
$c_new_pass = $input['c_new_pass'] ?? '';
$user_id = $input['user_id'] ?? '';

if (!$token || !$admin_pass || !$new_pass || !$c_new_pass || !$user_id) {
    http_response_code(400);
    echo json_encode(['error' => 'Token, admin_pass, new_pass, c_new_pass, and user_id are required']);
    exit;
}

if ($new_pass !== $c_new_pass) {
    http_response_code(400);
    echo json_encode(['error' => 'New password and confirmation password do not match']);
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

    $admin_user_id = $decoded['sub'];

    if (!adminPasswordVerify($admin_pass, $conn, $admin_user_id)) {
        http_response_code(401);
        echo json_encode(['error' => 'Incorrect admin password']);
        exit;
    }

    $hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);

    $sql = "UPDATE user SET password = ? WHERE role = 2 AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$hashed_password, $user_id]);

    echo json_encode(['success' => 'The password has been changed successfully!']);
    exit;
} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(['error' => 'Token verification failed', 'message' => $e->getMessage()]);
    exit;
}

/**
 * Verify the admin's password.
 *
 * @param string $admin_pass
 * @param PDO $conn
 * @param int $admin_user_id
 * @return bool
 */
function adminPasswordVerify($admin_pass, $conn, $admin_user_id) {
    $sql = "SELECT password FROM user WHERE user_id = ? AND role = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$admin_user_id]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($admin && password_verify($admin_pass, $admin['password'])) {
        return true;
    }
    
    return false;
}
?>
