<?php

if(isset($_POST['todo_id'])){
    include_once __DIR__ . '/../../DB_connection.php';

    $id = $_POST['todo_id'];

    if(empty($id)){
       echo 'error';
    }else {
        $todos = $conn->prepare("SELECT todo_id, checked FROM todos WHERE todo_id=?");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $uId = $todo['todo_id'];
        $checked = $todo['checked'];

        $uChecked = $checked ? 0 : 1;

        $res = $conn->query("UPDATE todos SET checked=$uChecked WHERE todo_id=$uId");

        if($res){
            echo $checked;
        }else {
            echo "error";
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}