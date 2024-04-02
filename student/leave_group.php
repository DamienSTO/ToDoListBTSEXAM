<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_POST['group_id'])) {
   
    header("Location: ../login.php");
    exit;
}

include_once __DIR__ . '/../DB_connection.php';

$student_id = $_SESSION['user_id'];
$group_id = $_POST['group_id'];

$remove_query = $conn->prepare("DELETE FROM user_groupe WHERE user_id = ? AND group_id = ?");
$remove_query->execute([$student_id, $group_id]);


header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>
