<?php 
session_start();
if (isset($_POST['uname']) &&
    isset($_POST['pass'])) {

	include_once __DIR__ ."/../DB_connection.php";

	$uname = $_POST['uname'];
	$pass = $_POST['pass'];


	if (empty($uname)) {
		$em  = "Username is required";
		header("Location: ../login.php?error=$em");
		exit;
	} elseif (empty($pass)) {
		$em  = "Password is required";
		header("Location: ../login.php?error=$em");
		exit;
	} else {

        $sql = "SELECT * FROM user
        	    WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);
        if ($stmt->rowCount() == 1) {
			$user = $stmt->fetch();
			$user_id = $user['user_id'];
			$username = $user['username'];
			$password = $user['password'];
			$role = $user['role'];
			
			if ($username === $uname && password_verify($pass, $password)) {

				$_SESSION['user_id'] = $user_id;
				if ($role == '1') {
					$_SESSION['role'] = "Admin" ;
					header("Location: ../admin/index.php");
					exit;
				} elseif ($role == '2') {
					$_SESSION['role'] = "Teacher";
					header("Location: ../CreeGroupe/index.php");
					exit;
				} elseif ($role == 3) {
					$_SESSION['role'] = "Student";
					header("Location: ../Student/index.php");
					exit;
				} else {
					$em = "Erreur";
					header("Location: ../login.php?error=$em");
					exit;
				}
			} else {
				$em  = "Incorrect Username or Password";
				header("Location: ../login.php?error=$em");
				exit;
			}
		} else {
			$em  = "Incorrect Username or Password";
			header("Location: ../login.php?error=$em");
			exit;
		}
	}
} else {
	header("Location: ../login.php");
	exit;
}
?>
