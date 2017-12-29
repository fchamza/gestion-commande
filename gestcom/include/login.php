<?php
	session_start();
	if(!empty($_POST)){
		include('config.php');
		$cp = 0;
		$pw   = sha1($_POST['password']);
		$req = "SELECT * FROM client WHERE email='".$_POST['email']."' and password='$pw'";
		$resultat = mysqli_query($con,$req);
		while ($row = mysqli_fetch_assoc($resultat)) {
			$_SESSION['nom']=$row['nom'];
			$_SESSION['prenom']=$row['prenom'];
			$_SESSION['IDclt']=$row['IDclt'];
			$cp++;
		}
		if($cp == 0){
			header("location:../index.php?error=1");
		}
		else header("location:../client/profile.php");
	}
	else header("location:../index.php");
?>