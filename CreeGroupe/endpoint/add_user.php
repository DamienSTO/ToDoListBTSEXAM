<?php

if(isset($_POST['user_id'])){
    include_once __DIR__ . '/../../DB_connection.php';

    $user_id = $_POST['user_id'];
    $todo_id = $_POST['todo_id'];

    if(empty($user_id) || empty($todo_id)) {
        header("Location: ../index.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO user_todo VALUES (?,?)");
        $res = $stmt->execute([$user_id,$todo_id]);

        if($res){
            header("Location: ../index.php?mess=success"); 
        }else {
            header("Location: ../index.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}