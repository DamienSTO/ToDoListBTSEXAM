<?php

function adminPasswordVerify($admin_pass, $conn, $user_id) {
   $sql = "SELECT * FROM user WHERE user_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$user_id]);

   if ($stmt->rowCount() == 1) {
     $admin = $stmt->fetch();
     $pass = $admin['password'];

     if (password_verify($admin_pass, $pass)) {
         return true;
     } else {
         return false;
     }
   } else {
    return false;
   }
}
