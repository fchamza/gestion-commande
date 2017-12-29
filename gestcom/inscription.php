<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css" >
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="insc">
<div class="col-md-6 col-xs-6 spacer">
	<div class="panel panel-primary">
		<div class="panel-heading"><center>Inscription</center></div>
			<div class="panel-body"><center>
		<form name="f" method="post" action="include/insc.php">
			<table class="table1">
				<tr>
					<td><label>Email : </label></td><td><input type="text" name="mail" class="form-control" required pattern="[a-zA-Z][a-zA-Z0-9_.-]+[@][a-zA-Z]+[.][a-zA-Z]{2,4}" placeholder="Tapez votre email..."></td><td id="verif">*</td>
				</tr>
				<tr>
					<td><label class="control-label">Password : </label></td><td><input type="Password" name="pass" class="form-control" required placeholder="********"></td><td id="verif">*</td>
				</tr>
				<tr>
					<td><label class="control-label">Confirmation password : </label></td><td><input type="password" class="form-control" name="cpass" required placeholder="********"></td><td id="verif">*</td>
				</tr>
				<tr>
					<td><label class="control-label">Nom : </label></td><td><input type="text" name="nom" class="form-control" placeholder="Tapez votre nom..." required></td><td id="verif">*</td>
				</tr>
				<tr>
					<td><label class="control-label">Prenom : </label></td><td><input type="text" name="prenom" class="form-control" placeholder="Tapez votre prenom..." required></td><td id="verif">*</td>
				</tr>
				<tr>
					<td colspan="3"><center><input type="submit" value="S'inscrire" class="btn btn-primary">&nbsp;<a href="index.php" class="btn btn-default">Se connecter</a></center></td>
				</tr>
				<?php
						if(isset($_GET['error']))
							echo 	"<div class='alert alert-danger alert_pw'>
										<center>Email déja existe !</center>
									</div>";
						if(isset($_GET['passerror']))
							echo   "<div class='alert alert-danger alert_pw'>
										<center>Password non identique !</center>
									</div>";
				?>
			</table>
		</form>	
		</center></div>
		</div>
</div></div>
</body>
</html>