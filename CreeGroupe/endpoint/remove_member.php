<?php
session_start();
include_once __DIR__ . '/../../DB_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['member_id'])) {
    $memberId = $_POST['member_id'];

    if ($memberId == $_SESSION['user_id']) {
        echo 'error';
        exit;
    }
    $stmt = $conn->prepare("DELETE ug FROM user_groupe ug INNER JOIN user u ON ug.user_id = u.user_id WHERE u.role = 3 AND ug.user_id = ?");
    $stmt->execute([$memberId]);

    if ($stmt->rowCount() > 0) {
        echo 'success'; 
    } else {
        echo 'error'; 
    }
} else {
    echo 'error'; 
}
?>
