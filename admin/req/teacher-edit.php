<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
        

if (
    isset($_POST['username'])   &&
    isset($_POST['teacher_id']) 
    ) {
    
    include '../../DB_connection.php';
    include "../data/teacher.php";


    $uname = $_POST['username'];

    $teacher_id = $_POST['teacher_id'];
    
    

    $data = 'teacher_id='.$teacher_id;

    if (empty($uname)) {
        $em  = "Username is required";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else if (!unameIsUnique($uname, $conn, $teacher_id)) {
        $em  = "Username is taken! try another";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else {
        $sql = "UPDATE teachers SET
                username = ? WHERE teacher_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname,$teacher_id]);
        $sm = "successfully updated!";
        header("Location: ../teacher-edit.php?success=$sm&$data");
        exit;
    }
    
  }else {
    $em = "An error occurred";
    header("Location: ../teacher.php?error=$em");
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