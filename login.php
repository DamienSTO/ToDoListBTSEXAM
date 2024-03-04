<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AchieveHub</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="logo.png">

</head>
<body class="body-login">
	<div class="black-fill"><br /><br />
		<div class="d-flex justify-content-center align-items-center flex-column">
		<form class="login"
			method="post"
			action="req/login.php">
			<div class="text-center">
				<img src="logo.png"
					width="100">
			</div>
			<h3>SE CONNECTER</h3>
			<?php if (isset($_GET['error'])) { ?>
			<div class="alert alert-danger" role="alert">
				<?=$_GET['error'] ?>
			</div>
			<?php } ?>

		  <div class="mb-3">
		    <label class="form-label">Nom d'utilisateur</label>
		    <input type="text" 
		    class="form-control"
		    name="uname" 
		    >
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Mot de passe</label>
		    <input type="password" 
		    	class="form-control" 
		    	name="pass">
		  </div>
		   <div class="mb-3">
		    <label class="form-label">Connecter en tant que :</label>
		    <select class="form-control" 
		    		name="role">
		    	<option value="1">Admin</option>
		    	<option value="3">Student</option>
		    	<option value="2">Teacher</option>
		    </select>
		  </div>

		  <button type="submit" class="btn btn-primary">Se connecter</button>
		  <a href="index.php" class="text-decoration-none">Home</a>
		</form>

		<br /><br />
		<div class="text-center text-light">
			<?php
				$pass = 'noir';
				$pass = password_hash($pass, PASSWORD_DEFAULT);
				echo $pass;

			?>
		Copyright &copy; 2024 AchieveHub. All rights reserved.
		</div>

	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>