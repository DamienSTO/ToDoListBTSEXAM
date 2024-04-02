<?php
session_start();
include_once __DIR__ . '/../DB_connection.php';

if (!isset($_SESSION['user_id'])) {
    // Redirection vers une page d'erreur ou une autre action appropriée si l'utilisateur n'est pas connecté
    header("Location: ../login.php");
    exit;
}

if (!isset($_GET['group_id'])) {
    header("Location: error.php");
    exit;
}

$group_id = $_GET['group_id'];

$sql_group = "SELECT g.*, u.username AS chef_username FROM groupes AS g
              JOIN user AS u ON g.user_id = u.user_id
              WHERE g.group_id = :group_id";
$stmt_group = $conn->prepare($sql_group);
$stmt_group->bindParam(':group_id', $group_id);
$stmt_group->execute();
$group_info = $stmt_group->fetch(PDO::FETCH_ASSOC);

// Vérification si l'utilisateur connecté est soit le chef du groupe, soit un membre du groupe
$is_group_member = false;
if ($_SESSION['user_id'] != $group_info['user_id']) {
    $sql_check_member = "SELECT COUNT(*) AS is_member FROM user_groupe WHERE user_id = :user_id AND group_id = :group_id";
    $stmt_check_member = $conn->prepare($sql_check_member);
    $stmt_check_member->bindParam(':user_id', $_SESSION['user_id']);
    $stmt_check_member->bindParam(':group_id', $group_id);
    $stmt_check_member->execute();
    $is_member_result = $stmt_check_member->fetch(PDO::FETCH_ASSOC);

    if ($is_member_result['is_member']) {
        $is_group_member = true;
    } else {
        header("Location: error.php");
        exit;
    }
}

$sql_members = "SELECT s.* FROM user AS s
                JOIN user_groupe AS ug ON s.user_id = ug.user_id
                WHERE ug.group_id = :group_id";
$stmt_members = $conn->prepare($sql_members);
$stmt_members->bindParam(':group_id', $group_id);
$stmt_members->execute();
$members = $stmt_members->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <h1>Détails du groupe <?php echo $group_info['group_name']; ?></h1>
    <p>Description du groupe : <?php echo $group_info['objet']; ?></p>
    <h2>Chef du groupe : <?php echo $group_info['chef_username']; ?></h2>
    
    <h2>Membres du groupe :</h2>
    <ul>
    <?php foreach ($members as $member): ?>
    <li>
        <?php echo $member['username']; ?>
        <?php if ($_SESSION['user_id'] == $group_info['user_id'] && !$is_group_member): ?>
            <button class="remove-member" data-member-id="<?= $member['user_id']; ?>">Retirer</button>
        <?php endif; ?>
    </li>
<?php endforeach; ?>
</ul>

    <button onclick="goBack()">Retour</button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function goBack() {
        window.history.back();
    }
    $(document).ready(function(){
        $('.remove-member').click(function(){
            const memberId = $(this).data('member-id');

            $.post("./endpoint/remove_member.php", { member_id: memberId }, function(data){
                if (data === 'success') {
                    location.reload();
                } else {
                    alert('Erreur lors du retrait du membre.');
                }
            });
        });
    });
</script>

</body>
</html>
