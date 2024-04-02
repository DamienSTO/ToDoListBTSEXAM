<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AchieveHub</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="logo.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">
</head>

<body class="body-home">
	<div class="black-fill"><br /><br />
		<div class="container">
		<nav class="navbar navbar-expand-lg bg-body-tertiary"
			id="homeNav">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="#">
		    	<img src="logo.png" width="40">
		    </a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="#">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#about">Enregistrer vous !</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#contact">Contacter</a>
		        </li>
		      </ul>
		     <ul class="navbar-nav me-right mb-2 mb-lg-0">
		      	</li>
		        <li class="nav-item">
		          <a class="nav-link" href="login.php">Se connecter</a>
		        </li>
		      </ul>
		  </div>
		    </div>
		</nav>
		<section class="welcome-text d-flex justify-content-center align-items-center flex-column">
			<img src="logo.png">
			<h4>
			AchieveHub</h4>
			<p>
			</p>
		</section>
		<section id="about" class="d-flex justify-content-center align-items-center flex-column">
			<form class="login" method="post">
				<div class="text-center">
					<img src="logo.png" width="100">
				</div>
				<h3>Enregistre toi !</h3>
				<?php if (isset($_GET['error'])) { ?>
					<div class="alert alert-danger" role="alert">
						<?=$_GET['error'] ?>
					</div>
				<?php } ?>

				<div class="mb-3">
					<label class="form-label">Nom d'utilisateur</label>
					<input type="text" class="form-control" name="uname">
				</div>

				<div class="mb-3">
					<label class="form-label">Mot de passe</label>
					<input type="password" class="form-control" name="pass">
				</div>

				<div class="mb-3">
					<label class="form-label">Crée le compte en tant que :</label>
					<select class="form-control" name="role">
						<option value="3">Invité</option>
						<option value="2">Créateur de tâches</option>
					</select>
				</div>

				<button type="submit" class="btn btn-primary">S'enregistrer</button>
				<a href="index.php" class="text-decoration-none">Home</a>
			</form>

			<?php
				include_once __DIR__ . '/DB_connection.php';

				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$username = $_POST['uname'];
					$password = $_POST['pass'];
					$role = $_POST['role'];

					
					$hashed_password = password_hash($password, PASSWORD_DEFAULT);

					
					$stmt = $conn->prepare("INSERT INTO user (username, password, role) VALUES (?, ?, ?)");
					$stmt->execute([$username, $hashed_password, $role]);

					
					echo '<script>alert("Enregistrement réussi !");</script>';
				}
				?>

		</section>
		<section id="contact"
				class="d-flex justify-content-center align-items-center flex-column">
				<form>
					<h3>Contactez-nous !</h3>
				  <div class="mb-3">
				    <label for="exampleInputEmail1" class="form-label">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
				  </div>
				  <div class="mb-3">
				    <label  class="form-label">Name</label>
				    <input type="text" class="form-control">
				  </div>
				  <div class="mb-3">
				    <label  class="form-label">Name</label>
				    <textarea class="form-control" rows="4"></textarea>
				  </div>
				  <button type="submit" class="btn btn-primary">Send</button>
				</form>
		</section>
		<div class="text-center text-light">
			Copyright &copy; 2024 AchieveHub. All rights reserved.
		</div>

	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<script>
         const pass_field = document.querySelector('.pass-key');
         const showBtn = document.querySelector('.show');
         showBtn.addEventListener('click', function(){
          if(pass_field.type === "password"){
            pass_field.type = "text";
            showBtn.textContent = "HIDE";
            showBtn.style.color = "#3498db";
          }else{
            pass_field.type = "password";
            showBtn.textContent = "SHOW";
            showBtn.style.color = "#222";
          }
         });
      </script>
</body>
</html>