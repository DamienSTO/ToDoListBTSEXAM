<?php 
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 2) {
    

}  
$user_id = $_SESSION['user_id'];
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = 0; 
    header("Location: ../login.php");
    exit; 
}
include_once __DIR__ . '/../DB_connection.php';


$user_id = $_SESSION['user_id'];
$group_query = $conn->prepare("SELECT groupes.group_id, groupes.group_name FROM groupes WHERE user_id = ?  ORDER BY groupes.group_name ASC");
$group_query->execute([$user_id]);
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
                            $todo_query = $conn->prepare("SELECT title,todo_id, checked FROM todos WHERE group_id = ? ORDER BY title ASC");
                            $todo_query->execute([$group['group_id']]);
                            $todos = $todo_query->fetchAll(PDO::FETCH_ASSOC);
                            
                            if (!empty($todos)) : ?>
                                <ul>
                                <?php foreach ($todos as $todo) : ?>
                                     
                                    <li>
                                        <span class="text-muted">Todo:</span> <?= $todo['title']; ?>
                                        <input type="checkbox" class="check-box" data-todo-id="<?php echo $todo['todo_id']; ?>" <?php echo $todo['checked'] ? 'checked' : ''; ?>>
                                        <button class="remove-to-do btn btn-warning btn-sm " data-todo-id="<?= $todo['todo_id']; ?>">Supprimer</button>
                                        
                                    </li>
                                    
                                <?php endforeach; ?>
                                </ul>
                                <a href="group_details.php?group_id=<?= $group['group_id']; ?>">Voir les détails du groupe <?= $group['group_name']; ?></a>
                            <button class="remove-group btn btn-danger btn-sm float-end" data-group-id="<?= $group['group_id']; ?>">Supprimer</button>
                                <?php foreach ($groups as $group) : ?>
                                    <?php
                                   
                                    $todo_query = $conn->prepare("SELECT title, todo_id, checked FROM todos WHERE group_id = ? ORDER BY title ASC");
                                    $todo_query->execute([$group['group_id']]);
                                    $todos = $todo_query->fetchAll(PDO::FETCH_ASSOC);
                                    
                                    
                                    $total_todos = count($todos);
                                    $completed_todos = 0;
                                    foreach ($todos as $todo) {
                                        if ($todo['checked']) {
                                            $completed_todos++;
                                        }else{}
                                    }
                                    
                                    
                                    $percentage = $total_todos > 0 ? ($completed_todos / $total_todos) * 100 : 0;
                                    $percentage = round($percentage); 
                                    ?>
                                    
                                        
                                        <?php if ($total_todos > 0) : ?>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: <?= $percentage ?>%;" aria-valuenow="<?= $percentage ?>" aria-valuemin="0" aria-valuemax="100"><?= $percentage ?>%</div>
                                            </div>
                                        <?php endif; ?>
                                        
                                    
                                    
                                <?php endforeach; ?>
                                
                            <?php else : ?>
                                <span class="text-muted">Aucune Todo associée à ce groupe.</span>
                                
                        
                                
                            <?php endif; ?>
                            <br>
                            
                            
                            
                            
                            
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
    $(".check-box").click(function(){
                const id = $(this).attr('data-todo-id');
                const h2 = $(this).next();

                $.post('./endpoint/done.php', { todo_id: id }, function(data){
                    if (data !== 'error') {
                        h2.toggleClass('checked', data === '0');
                    }
                }); 
            });
    $('.check-box').change(function() {
        var totalTodos = $(this).closest('ul').find('.check-box').length;
        var completedTodos = $(this).closest('ul').find('.check-box:checked').length;
        var percentage = (completedTodos / totalTodos) * 100;
        $(this).closest('li').find('.progress-bar').css('width', percentage + '%').attr('aria-valuenow', percentage).text(percentage.toFixed(2) + '%');
    });
            $(document).ready(function(){
        $('.remove-group').click(function(){
            const groupId = $(this).data('group-id');

            $.post("./endpoint/delete_group.php", { group_id: groupId }, function(data){
                if (data === 'success') {
                    
                    location.reload();
                } else {
                    alert('Erreur lors de la suppression du groupe.');
                }
            });
        });
    });
});
     
        
</script>
