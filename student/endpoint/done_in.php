<?php

if(isset($_POST['todo_in_id'])){
    include_once __DIR__ . '/../../DB_connection.php';

    $id = $_POST['todo_in_id'];

    if(empty($id)){
       echo 'error';
       exit();
    } else {

        $todos = $conn->prepare("SELECT todo_in_id, checked FROM todos_in WHERE todo_in_id=?");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $uId = $todo['todo_in_id'];
        $checked = $todo['checked'];

        $uChecked = $checked ? 0 : 1;

        $res = $conn->prepare("UPDATE todos_in SET checked=? WHERE todo_in_id=?");
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
