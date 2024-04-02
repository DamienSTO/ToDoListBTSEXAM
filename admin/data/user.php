<?php 


function getAllStudents($conn){
   $sql = "SELECT * FROM user WHERE role = 3";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $students = $stmt->fetchAll();
     return $students;
   }else {
   	return 0;
   }
}


function removeStudent($id, $conn){
   $sql  = "DELETE FROM user
           WHERE user_id=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}


function getStudentById($id, $conn){
   $sql = "SELECT * FROM user
           WHERE user_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() == 1) {
     $user = $stmt->fetch();
     return $user;
   }else {
    return 0;
   }
}


// Check if the username Unique
function unameIsUnique($uname, $conn, $user_id=0){
   $sql = "SELECT username, user_id FROM user
           WHERE username=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$uname]);
   
   if ($user_id == 0) {
     if ($stmt->rowCount() >= 1) {
       return 0;
     }else {
      return 1;
     }
   }else {
    if ($stmt->rowCount() >= 1) {
       $user = $stmt->fetch();
       if ($user['user_id'] == $user_id) {
         return 1;
       }else {
        return 0;
      }
     }else {
      return 1;
     }
   }
   
}


// Search 
function searchStudents($key, $conn){
   $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$key);
   $sql = "SELECT * FROM user
           WHERE role !=1 AND user_id =? 
           OR username =?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$key, $key]);

   if ($stmt->rowCount() >= 1) {
     $students = $stmt->fetchAll();
     return $students;
   }else {
    return 0;
   }
}