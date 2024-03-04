<?php

if(isset($_POST['title'])){
    include_once __DIR__ . '/../../DB_connection.php';

    $title = $_POST['title'];

    if(empty($title)){
        header("Location: ../student/index.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO todos(title) VALUE(?)");
        $res = $stmt->execute([$title]);

        if($res){
            header("Location: ../index.php?mess=success"); 
        }else {
            header("Location: ../index.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../student/index.php?mess=error");
}