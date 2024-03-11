<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
      

if (
    isset($_POST['username']) &&
    isset($_POST['pass'])) {
    
    include '../../DB_connection.php';
    include "../data/teacher.php";

    $uname = $_POST['username'];
    $pass = $_POST['pass'];

  if (empty($uname)) {
    $em  = "Username is required";
    header("Location: ../teacher-add.php?error=$em&$data");
    exit;
  }else if (!unameIsUnique($uname, $conn)) {
    $em  = "Username is taken! try another";
    header("Location: ../teacher-add.php?error=$em&$data");
    exit;
  }else if (empty($pass)) {
    $em  = "Password is required";
    header("Location: ../teacher-add.php?error=$em&$data");
    exit;
  }else if (empty($pass)) {
        $em  = "Password is required";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else {
        // hashing the password
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $sql  = "INSERT INTO
                 teachers(username, password )
                 VALUES(?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $pass]);
        $sm = "New teacher registered successfully";
        header("Location: ../teacher-add.php?success=$sm");
        exit;
  }
    
  }else {
    $em = "An error occurred";
    header("Location: ../teacher-add.php?error=$em");
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