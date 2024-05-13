<?php
// config.php

define('JWT_SECRET_KEY', 'your_secret_key_here');
define('TOKEN_EXPIRY', 3600); // 1 hour
include_once __DIR__ ."/../DB_connection.php";

function getUserByUsername($conn, $username) {
    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);

    if ($stmt->rowCount() == 1) {
        return $stmt->fetch();
    }

    return null;
}

?>