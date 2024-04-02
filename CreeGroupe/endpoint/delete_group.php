<?php
session_start();
include_once __DIR__ . '/../../DB_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['group_id'])) {
    $groupId = $_POST['group_id'];


    $stmt = $conn->prepare("DELETE FROM groupes WHERE group_id = ?");
    $stmt->execute([$groupId]);

    if ($stmt->rowCount() > 0) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
?>