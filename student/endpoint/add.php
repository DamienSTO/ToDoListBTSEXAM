<?php
session_start();

if (isset($_POST['title'])) {
    include_once __DIR__ . '/../../DB_connection.php';

    $title = $_POST['title'];
    $checked = $_POST['checked'];
    $user_id = $_SESSION['user_id'];

    if (empty($title)) {
        header("Location: ../index.php?mess=error");
        exit();
    } else {
        $stmt = $conn->prepare("INSERT INTO todos_in (title,checked) VALUES (?,?)");
        $res = $stmt->execute([$title,$checked]);

        if ($res) {
            $todo_in_id = $conn->lastInsertId();
            $stmt = $conn->prepare("INSERT INTO user_todo_in (user_id, todo_in_id) VALUES (?, ?)");
            $stmt->execute([$user_id, $todo_in_id]);
            header("Location: ../index.php?mess=success");
            exit();
        } else {
            header("Location: ../index.php");
            exit();
        }
    }
} else {
    header("Location: ../index.php?mess=error");
    exit();
}
?>
