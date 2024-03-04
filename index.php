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
		          <a class="nav-link" href="#about">A propos</a>
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
		<section id="about"
				class="d-flex justify-content-center align-items-center flex-column">
			<div class="carte-1">
			  <div class="row g-0">
			    <div class="col-md-4">
			      <img src="logo.png" class="img-fluid rounded-start" >
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">A propos</h5>
			        <p class="card-text"> pas encore fait</p>
			        <p class="card-text"><small class="text-muted"></small></p>
			      </div>
			    </div>
			  </div>
			</div>
		</section>
		<section id="contact"
				class="d-flex justify-content-center align-items-center flex-column">
				<form>
					<h3>Contactez-snous !</h3>
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
</body>
</html>