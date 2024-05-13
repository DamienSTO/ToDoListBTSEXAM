<?php
// check-token.php

require_once 'config.php';
require_once 'JWT.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$token = $input['token'] ?? '';

if (!$token) {
    http_response_code(401);
    echo json_encode(['error' => 'Token required']);
    exit;
}

try {
    $decoded = JWT::decode($token, JWT_SECRET_KEY);
    echo json_encode(['success' => true, 'user_id' => $decoded['sub']]);
} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(['error' => 'Invalid or expired token']);
}
?>