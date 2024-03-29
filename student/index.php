<?php 
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['student_id'])) {
    header("Location: ../login.php");
    exit;
}

include_once __DIR__ . '/../DB_connection.php';

// Récupérez l'ID de l'étudiant connecté
$student_id = $_SESSION['student_id'];

// Traitement du formulaire pour créer une nouvelle tâche individuelle
if (isset($_POST['title'])) {
    $title = $_POST['title'];


}

// Récupérez les tâches assignées à l'étudiant actuellement connecté
$todo_id = $conn->prepare("SELECT todos.*, groupes.group_name FROM todos 
                           JOIN groupes ON groupes.group_id = todos.group_id 
                           JOIN user_groupe ON user_groupe.group_id = groupes.group_id
                           WHERE user_groupe.student_id = :student_id 
                           ORDER BY todo_id DESC LIMIT 2");

$todo_id_in = $conn->prepare("SELECT todo_in_id, title, checked FROM todos_in ");

$todo_id->bindParam(':student_id', $student_id);


$todo_id->execute();
$todo_id_in->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include "inc/navbar.php"; ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>AchieveGroupsHub</h2>
                    </div>
                    <div class="card-body">
                        <?php if ($todo_id->rowCount() <= 0) { ?>
                            <div class="alert alert-secondary text-center" role="alert">
                               <h3 class="text-center">Pas de missions pour aujourd'hui !</h3>
                            </div>
                        <?php } else { ?>
                            <div class="list-group">
                                <?php while ($todos = $todo_id->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <div class="list-group-item">
                                        <input type="checkbox" class="check-box" data-todo-id="<?= $todos['todo_id']; ?>" <?= $todos['checked'] ? 'checked' : ''; ?>>
                                        <h2 <?= $todos['checked'] ? 'class="checked"' : ''; ?>><?= $todos['title']; ?></h2>
                                        <h5>Created by <?= $todos['group_name']; ?></h5>
                                        <small class="date-finished">Created: <?= $todos['date_time']; ?></small>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <hr>

                        <h2>Crée une tâche personnelle</h2>
                        <form action="endpoint/add.php" method="POST" autocomplete="off">
                            <div class="input-group mb-3">
                                <input type="text" required="true" name="title" class="form-control <?= isset($_GET['mess']) && $_GET['mess'] == 'error' ? 'is-invalid' : '' ?>" placeholder="<?= isset($_GET['mess']) && $_GET['mess'] == 'error' ? 'Tu devrais faire quelque chose de productif !' : "Qu'est ce que vous avez besoins de faire ?" ?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                        <h2>Mes tâches</h2>
                        <?php if ($todo_id_in->rowCount() <= 0) { ?>
                            <div class="alert alert-secondary text-center" role="alert">
                               <h3 class="text-center">Pas de missions pour aujourd'hui !</h3>
                            </div>
                        <?php } else { ?>
                            <div class="list-todo_in">
                                <?php while ($todos_in = $todo_id_in->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <div class="list-todo-in-item">
                                        
                                        <h2 <?= $todos_in['checked'] ? 'class="checked"' : ''; ?>><?= $todos_in['title']; ?>
                                        <input type="checkbox" class="check-box-in" data-todo-id="<?= $todos_in['todo_in_id']; ?>" <?= $todos_in['checked'] ? 'checked' : ''; ?>>
                                        <button id="<?= $todos_in['todo_in_id']; ?>" class="remove-to-do">supprimer</button>
                                        </h2>
                                        
                                    </div>  
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){

            $(".check-box").click(function(){
                const id = $(this).attr('data-todo-id');
                const h2 = $(this).next();

                $.post('./endpoint/done.php', { todo_id: id }, function(data){
                    if (data !== 'error') {
                        h2.toggleClass('checked', data === '0');
                    }
                });
            });
            $('.remove-to-do').click(function(){
                const id = $(this).attr('id');
                const parent = $(this).parent();

                $.post("./endpoint/delete.php", { todo_in_id: id }, function(data){
                    if (data) {
                        parent.hide(600);
                    }
                });
            });
            $(".check-box-in").click(function(){
                const id = $(this).attr('data-todo-id');
                const h2 = $(this).next();

                $.post('./endpoint/done_in.php', { todo_in_id: id }, function(data){
                    if (data !== 'error') {
                        h2.toggleClass('checked', data === '0');
                    }
                });
            });
        });
    </script>
</body>
</html>
