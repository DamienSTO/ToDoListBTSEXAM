<?php 
session_start();
if (isset($_SESSION['user_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['student_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/user.php";

     $id = $_GET['student_id'];
     if (removeStudent($id, $conn)) {
      $sm = "Successfully deleted!";
        header("Location: user.php?success=$sm");
        exit;
     }else {
        $em = "Unknown error occurred";
        header("Location: user.php?error=$em");
        exit;
     }


  }else {
    header("Location: user.php");
    exit;
  } 
}else {
   header("Location: teacher.php");
   exit;
} 