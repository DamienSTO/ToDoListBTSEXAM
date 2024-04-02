<?php
session_start();
include_once __DIR__ . '/../../DB_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["group_name"]))) {
        header("Location: ../index.php?mess=error");
        exit;
    }

  
    $group_name = $_POST['group_name'];
    $teacher_id = $_SESSION['user_id'];
    $objet = $_POST['objet'];

    $stmt = $conn->prepare("INSERT INTO groupes (group_name, user_id, objet) VALUES (:group_name, :user_id, :objet)");
    $stmt->bindParam(':group_name', $group_name);
    $stmt->bindParam(':user_id', $teacher_id);
    $stmt->bindParam(':objet', $objet);

    if ($stmt->execute()) {
        header("Location: ../index.php"); 
        exit;
    } else {
        echo "Une erreur s'est produite. Veuillez réessayer plus tard.";
    }
}
?>
