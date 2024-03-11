<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
        

if (
    isset($_POST['username'])   &&
    isset($_POST['student_id']) 
    ) {
    
    include '../../DB_connection.php';
    include "../data/user.php";


    $uname = $_POST['username'];

    $student_id = $_POST['student_id'];
    
    

    $data = 'student_id='.$student_id;

    if (empty($uname)) {
        $em  = "Username is required";
        header("Location: ../user-edit.php?error=$em&$data");
        exit;
    }else if (!unameIsUnique($uname, $conn, $student_id)) {
        $em  = "Username is taken! try another";
        header("Location: ../user-edit.php?error=$em&$data");
        exit;
    }else {
        $sql = "UPDATE students SET
                username = ? WHERE student_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname,$student_id]);
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