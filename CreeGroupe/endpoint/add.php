<?php
session_start();
include_once __DIR__ . '/../../DB_connection.php';

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le champ du titre est vide
    if (empty(trim($_POST["title"]))) {
        header("Location: ../index.php?mess=error");
        exit;
    }

  
    $title = $_POST['title'];
    $group_id = $_POST['group_id']; 

    // Préparer et exécuter la requête SQL pour insérer la tâche
    $stmt = $conn->prepare("INSERT INTO todos (title, group_id) VALUES (:title, :group_id)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':group_id', $group_id);

    if ($stmt->execute()) {
        header("Location: ../index.php"); // Rediriger vers la page d'accueil après l'ajout de la tâche
        exit;
    } else {
        echo "Une erreur s'est produite. Veuillez réessayer plus tard.";
    }
}
?>
