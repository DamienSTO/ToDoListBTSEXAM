<?php 
session_start();
if (isset($_SESSION['user_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
        

if (
    isset($_POST['username'])   &&
    isset($_POST['user_id']) 
    ) {
    
    include '../../DB_connection.php';
    include "../data/user.php";


    $uname = $_POST['username'];

    $user_id = $_POST['user_id'];
    
    

    $data = 'user_id='.$user_id;

    if (empty($uname)) {
        $em  = "Username is required";
        header("Location: ../user-edit.php?error=$em&$data");
        exit;
    }else if (!unameIsUnique($uname, $conn, $user_id)) {
        $em  = "Username is taken! try another";
        header("Location: ../user-edit.php?error=$em&$data");
        exit;
    }else {
        $sql = "UPDATE user SET
                username = ? WHERE role = 3 AND user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname,$user_id]);
        $sm = "successfully updated!";
        header("Location: ../user-edit.php?success=$sm&$data");
        exit;
    }
    
  }else {
    $em = "An error occurred";
    header("Location: ../user.php?error=$em");
    exit;
  }

  }else {
    header("Location: ../../logout.php");
    exit;
  } 
}else {
    header("Location: ../../logout.php");
    exit;
} 