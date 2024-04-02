<?php 
session_start();
if (isset($_SESSION['user_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
      

if (
    isset($_POST['username']) &&
    isset($_POST['pass'])) {
    
    include '../../DB_connection.php';
    include "../data/user.php";

    $uname = $_POST['username'];
    $pass = $_POST['pass'];

  if (empty($uname)) {
    $em  = "Username is required";
    header("Location: ../user-add.php?error=$em&$data");
    exit;
  }else if (!unameIsUnique($uname, $conn)) {
    $em  = "Username is taken! try another";
    header("Location: ../user-add.php?error=$em&$data");
    exit;
  }else if (empty($pass)) {
    $em  = "Password is required";
    header("Location: ../user-add.php?error=$em&$data");
    exit;
  }else if (empty($pass)) {
        $em  = "Password is required";
        header("Location: ../user-add.php?error=$em&$data");
        exit;
    }else {
      
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $sql  = "INSERT INTO
                 user(username, password,role)
                 VALUES(?,?,3)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $pass]);
        $sm = "New user registered successfully";
        header("Location: ../user-add.php?success=$sm");
        exit;
  }
    
  }else {
    $em = "An error occurred";
    header("Location: ../user-add.php?error=$em");
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