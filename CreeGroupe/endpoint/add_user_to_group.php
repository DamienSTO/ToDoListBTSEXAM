<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id']) && isset($_POST['group_id'])) {
    include_once __DIR__ . '/../../DB_connection.php';

    $user_id = $_POST['user_id'];
    $group_id = $_POST['group_id'];
    
    if(empty($user_id) || empty($group_id)) {
        echo "error: Les identifiants d'utilisateur ou de groupe sont manquants.";
    } else {
        $stmt = $conn->prepare("INSERT INTO user_groupe (group_id, user_id) VALUES (?, ?)");
        $res = $stmt->execute([$group_id, $user_id]);
        
        if($res) {
            echo "success: Utilisateur ajouté au groupe avec succès!";
        } else {    
            echo "error: Une erreur s'est produite lors de l'ajout de l'utilisateur au groupe.";
        }
        
        exit();
    }
} else {
    echo "error: Requête invalide ou données manquantes.";
    
}
?>
