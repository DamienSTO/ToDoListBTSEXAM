<?php

if(isset($_POST['todo_id'])){
    include_once __DIR__ . '/../../DB_connection.php';

    $id = $_POST['todo_id'];

    if(empty($id)){
       echo 'error';
       exit();
    } else {
        // Utilisation d'une requête préparée pour éviter les attaques par injection SQL
        $todos = $conn->prepare("SELECT todo_id, checked FROM todos WHERE todo_id=?");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $uId = $todo['todo_id'];
        $checked = $todo['checked'];

        // Inversion de l'état de la case à cocher
        $uChecked = $checked ? 0 : 1;

        // Utilisation d'une requête préparée pour éviter les attaques par injection SQL
        $res = $conn->prepare("UPDATE todos SET checked=? WHERE todo_id=?");
        $res->execute([$uChecked, $uId]);

        if($res){
            echo $checked;
        } else {
            echo "error";
        }
        $conn = null;
        exit();
    }
} else {
    header("Location: ../index.php?mess=error");
    exit();
}
?>
