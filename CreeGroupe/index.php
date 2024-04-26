<?php 
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 2) {
    

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
   
    header("Location: ../login.php");
    exit; 
}
}
include_once __DIR__ . '/../DB_connection.php';


$todo_id = $conn->prepare("SELECT *, g.group_name FROM todos 
                            JOIN groupes AS g ON g.group_id = todos.group_id 
                            WHERE user_id = :user_id 
                            ORDER BY todo_id DESC LIMIT 2");
$todo_id->bindParam(':user_id', $user_id);
$todo_id->execute();
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
    <div class="card-prin">
        <?php 
        include "inc/navbar.php";
     ?>
     <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>AchieveGroupsHub</h2>
                    </div>
                    
                    <div class="card-body">
                    <h6>Attriber une tâche a un groupe !!<h6>
                        <form action="endpoint/add.php" method="POST" autocomplete="off" 
                        >
                            <div class="input-group mb-3">
                                <select name="group_id" id="group_id"  >
                                    
                                    <option value="null" disable>Selection un groupe</option>
                                    <?php
                                    include_once __DIR__ . '/../DB_connection.php';

                                    


                                    if (isset($_SESSION['user_id'])) {
                                        $user_id = $_SESSION['user_id'];
                                        
                                        $sql = "SELECT group_id, group_name FROM groupes WHERE user_id = :user_id";
                                        $requete = $conn->prepare($sql);
                                        $requete->bindParam(':user_id', $user_id);
                                        
                                      
                                        $requete->execute();
                                        
                                       
                                        if ($requete->rowCount() > 0) {
                                           
                                            while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<option value='" . $row['group_id'] . "'>" . $row['group_name'] . "</option>";
                                            }
                                        } else {
                                            echo "Aucun groupe trouvé.";
                                        }
                                    } else {
                                        echo "Identifiant de l'enseignant non défini dans la session.";
                                    }
                                
                                 
                                    ?>

                                </select>
                                <input type="text" required="true" name="title" class="form-control <?= isset($_GET['mess']) && $_GET['mess'] == 'error' ? 'is-invalid' : '' ?>" placeholder="<?= isset($_GET['mess']) && $_GET['mess'] == 'error' ? 'You must do something! Be Productive!' : 'What do you need to do?' ?>">
                                <div class="input-group-append">
                                    <button type="submit" required="true" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                        
                        <?php if ($todo_id->rowCount() <= 0) { ?>
                            <div class="alert alert-secondary text-center" role="alert">
                               <h3 class="text-center">Pas de missions pour aujourd'hui !</h3>
                            </div>
                        <?php } ?>
                        
                        <div class="list-group">
                                <?php while ($todos = $todo_id->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <div class="list-group-item">
                                        <button id="<?= $todos['todo_id']; ?>" class="remove-to-do">supprimer</button>
                                        <input type="checkbox" class="check-box" data-todo-id="<?php echo $todos['todo_id']; ?>" <?php echo $todos['checked'] ? 'checked' : ''; ?>>
                                        <h2 <?php echo $todos['checked'] ? 'class="checked"' : ''; ?>><?php echo $todos['title']; ?></h2>
                                        <h5 >Created by <?php echo $todos['group_name']; ?></h5>
                                        <small class="date-finished">Created: <?php echo $todos['date_time']; ?></small>
                                    </div>
                                <?php } ?>
                            </div>
                            <h2>Invitation de groupe</h2>

                            <select  id='group_id_invitation' require='true'>
                                    
                            <option  disable>Selection un groupe</option>
                                    <?php
                                    include_once __DIR__ . '/../DB_connection.php';

                                    


                                    if (isset($_SESSION['user_id'])) {
                                        $user_id = $_SESSION['user_id'];
                                        
                                        $sql = "SELECT group_id, group_name FROM groupes WHERE user_id = :user_id";
                                        $requete = $conn->prepare($sql);
                                        $requete->bindParam(':user_id', $user_id);
                                        
                                      
                                        $requete->execute();
                                        
                                       
                                        if ($requete->rowCount() > 0) {
                                           
                                            while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<option value='" . $row['group_id'] . "'>" . $row['group_name'] . "</option>";
                                            }
                                        } else {
                                            echo "Aucun groupe trouvé.";
                                        }
                                    } else {
                                        echo "Identifiant de l'enseignant non défini dans la session.";
                                    }
                                
                                 
                                    ?>  

                                </select>

                            <select id='add_user'>
                                <option value="null" disable>ajouter un utilisateur</option>
                                <?php
                                include_once __DIR__ . '/../DB_connection.php';
                                $requete = "SELECT user_id, username FROM user WHERE role = 3";
                                $resultat = $conn->query($requete);

                                if ($resultat->rowCount() > 0) {
                                    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='" . $row['user_id'] . "'>" . $row['username'] . "</option>";
                                    }
                                }

                                $conn = null;
                                ?>
                            </select>
                            
                            <button id="add-to-do-user">Confirmer</button>

                        </div>
                        
                        
                        <form action="endpoint/add_group.php" method="POST" autocomplete="off">
                            <h2>Création de groupe</h2>
                            <div class="input-group mb-3">
                                <input type="text" required="true" name="group_name" class="form-control" placeholder="Nom du groupe">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <textarea name="objet" class="form-control" placeholder="Objet du groupe"></textarea>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
                <div class="container text-center">

                    <div class="row row-cols-5">

                    <a href="" class="col btn btn-primary m-2 py-3 col-5">
                        <i class="fa fa-cogs fs-1" aria-hidden="true"></i><br>
                        Settings
                    </a> 
                    <a href="../logout.php" class="col btn btn-warning m-2 py-3 col-5">
                        <i class="fa fa-sign-out fs-1" aria-hidden="true"></i><br>
                        Logout
                    </a> 
                    </div>
                </div>
            </div>  
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
$(document).ready(function(){
    $('.remove-to-do').click(function(){
        const id = $(this).attr('id');
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

    $('#add-to-do-user').click(function(){
        var user_id = $('#add_user').val();
        var group_id = $('#group_id_invitation').val(); 

        $.ajax({
            url: './endpoint/add_user_to_group.php',
            method: 'POST',
            data: { user_id: user_id, group_id: group_id }, 
            success: function(response){
                if (response === 'success') {
                    alert('Utilisateur ajouté au groupe avec succès!'); 
                } else {
                    alert('Utilisateur ajouté au groupe avec succès!'); 
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Une erreur s\'est produite lors de la communication avec le serveur.');
            }
        });
    });
});
            </script>
            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                $(document).ready(function(){
                    $("#navLinks li:nth-child(1) a").addClass('active');
                });
            </script>
        
</body>

</html>