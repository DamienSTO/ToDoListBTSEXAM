<?php

if(isset($_POST['todo_in_id'])){
    include_once __DIR__ . '/../../DB_connection.php';

    $id = $_POST['todo_in_id'];

    if(empty($id)){
       echo 0;
    }else {
        $stmt = $conn->prepare("DELETE FROM todos_in WHERE todo_in_id=?");
        $res = $stmt->execute([$id]);

        if($res){
            echo 1;
        }else {
            echo 0;
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}