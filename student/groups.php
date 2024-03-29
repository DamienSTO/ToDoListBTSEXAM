<?php
session_start();
if (isset($_SESSION['student_id']) && isset($_SESSION['role'])) {
    if (!$_SESSION['role'] == 'Student') {
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}

include_once __DIR__ . '/../DB_connection.php';


$student_id = $_SESSION['student_id'];
$group_query = $conn->prepare(
    "SELECT groupes.group_id, groupes.group_name 
    FROM groupes 
    JOIN user_groupe ON groupes.group_id = user_groupe.group_id 
    WHERE  user_groupe.student_id = ?  
    ORDER BY groupes.group_name ASC");
$group_query->execute([$student_id]);
$groups = $group_query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include "inc/navbar.php"; ?>
    <div class="container mt-5">
        <h2 class="text-center">Liste des groupes</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="list-group">
                    <?php foreach ($groups as $group) : ?>
                        <li class="list-group-item">
                            <strong><?= $group['group_name']; ?></strong>
                            
                            <?php
                            $todo_query = $conn->prepare("SELECT title,todo_id,checked FROM todos WHERE group_id = ? ORDER BY title ASC");
                            $todo_query->execute([$group['group_id']]);
                            $todos = $todo_query->fetchAll(PDO::FETCH_ASSOC);

                            if (!empty($todos)) : ?>
                                <ul>
                                <?php foreach ($todos as $todo) : ?>
                                    <li>
                                        <span class="text-muted">Todo:</span> <?= $todo['title']; ?>
                                        <input type="checkbox" class="check-box" data-todo-id="<?php echo $todo['todo_id']; ?>" <?php echo $todo['checked'] ? 'checked' : ''; ?>>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            <?php else : ?>
                                <span class="text-muted">Aucune Todo associée à ce groupe.</span>
                                
                            <?php endif; ?>
                            <br>
                            <?php if ($_SESSION['role'] == 'Student') : ?>
                                <form method="post" action="leave_group.php">
                                    <input type="hidden" name="group_id" value="<?= $group['group_id']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm float-end">Quitter le groupe</button>
                                </form>
                            <?php endif; ?>
                            
                           
                            
                            <a href="group_details.php?group_id=<?= $group['group_id']; ?>">
                                Voir les détails du groupe
                            </a>
                            
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
<script>
     $(document).ready(function(){
    $('.remove-to-do').click(function(){
        const id = $(this).data('todo-id'); // Récupère l'ID à partir de l'attribut data
        const parent = $(this).parent();

        $.post("./endpoint/delete.php", { todo_id: id }, function(data){
            if (data) {
                parent.hide(600);
            }
        });
    });
});
     
        
</script>
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
});
</script>
