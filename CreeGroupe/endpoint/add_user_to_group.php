<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['student_id']) && isset($_POST['group_id'])) {
    include_once __DIR__ . '/../../DB_connection.php';

    $student_id = $_POST['student_id'];
    $group_id = $_POST['group_id'];

    if(empty($student_id) || empty($group_id)) {
        echo "error";
    } else {
        $stmt = $conn->prepare("INSERT INTO user_groupe (group_id, student_id) VALUES (?, ?)");
        $res = $stmt->execute([$group_id, $student_id]);

        if($res) {
            echo "success";
        } else {    
            echo "error";
        }
        $conn = null;
        exit();
    }
} else {
    echo "error";
}
?>
