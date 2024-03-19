<?php
session_start();
include_once __DIR__ . '/../../DB_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if (empty(trim($_POST["title"]))) {
        header("Location: ../index.php?mess=error");
        exit;
    }

  
    $title = $_POST['title'];
    $group_id = $_POST['group_id']; 

    $stmt = $conn->prepare("INSERT INTO todos (title, group_id) VALUES (:title, :group_id)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':group_id', $group_id);

    if ($stmt->execute()) {
        header("Location: ../index.php"); 
        exit;
    } else {
        echo "Une erreur s'est produite. Veuillez réessayer plus tard.";
    }
}
?>
