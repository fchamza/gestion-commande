<?php 
	session_start();
	if(isset($_SESSION['IDclt'])) header("location:client/profile.php");
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css" >
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <title>page authentification</title>

</head>
<body>
	<div class="authentification">
		<h3 class="text">Identifiez Vous</h3>
			<div class="formulaire">
				<?php
					if(isset($_GET['ins'])){
						echo " <div class='alert alert-success alert_pw'><center>Client bien inscrit</center></div>";
					}
				?>
				<form method="POST" action="include/login.php">
					<input type="text" name="email" placeholder="Email" required>
					<input type="password" name="password"  placeholder="Mot de passe" required>
					<div class="btnn"> 
						 <input type="submit" name="Sign In" value="Connexion" class="btn btn-primary">
						 <a href="inscription.php">inscription</a>
					</div>
					<?php
						if(isset($_GET['error'])){
							echo " <div class='alert alert-danger alert_pw'><center>Compte et/ou mot de passe incorrect !!</center></div>";
						}
					?>
				</form>
		</div>
	</div>
</body>
</html>