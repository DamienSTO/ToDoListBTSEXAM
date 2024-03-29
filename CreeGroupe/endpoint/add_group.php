<?php
session_start();
include_once __DIR__ . '/../../DB_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["group_name"]))) {
        header("Location: ../index.php?mess=error");
        exit;
    }

  
    $group_name = $_POST['group_name'];
    $teacher_id = $_SESSION['teacher_id'];

    $stmt = $conn->prepare("INSERT INTO groupes (group_name, teacher_id) VALUES (:group_name, :teacher_id)");
    $stmt->bindParam(':group_name', $group_name);
    $stmt->bindParam(':teacher_id', $teacher_id);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Une erreur s'est produite. Veuillez réessayer plus tard.";
    }
}
?>
