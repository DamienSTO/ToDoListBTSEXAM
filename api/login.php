<?php
// login.php

require_once 'config.php';
require_once 'JWT.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$username = $input['username'] ?? '';
$password = $input['password'] ?? '';

if (!$username || !$password) {
    http_response_code(400);
    echo json_encode(['error' => 'Username and password required']);
    exit;
}

$user = getUserByUsername($conn, $username);

if ($user && password_verify($password, $user['password'])) {
    if($user["role"] != 1){
        http_response_code(400);
        echo json_encode(['error' => 'Vous n\'êtes pas adiminstrateur']); 
    }
    $payload = [
        'sub' => $user['user_id'],
        'iat' => time(),
        'exp' => time() + TOKEN_EXPIRY,
    ];
    $jwt = JWT::encode($payload, JWT_SECRET_KEY);

    echo json_encode(['success' => 'Login successful', 'token' => $jwt]);
} else {
    http_response_code(401);
    echo json_encode(['error' => 'Invalid username or password']);
}
?>