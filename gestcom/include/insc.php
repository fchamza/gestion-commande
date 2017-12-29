<?php
	if(!empty($_POST)){
		include 'config.php';
		$cp=0;
		if($_POST['pass']!=$_POST['cpass']) header("location:../inscription.php?passerror=1");
		else {
			$req="INSERT INTO client(nom,prenom, email, password) VALUES ('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['mail']."','".sha1($_POST['pass'])."')";
			$resultat=mysqli_query($con,$req);
			while ($row = mysqli_fetch_assoc($resultat)) $cp++;
			if($cp!=0) header('location:../index.php?ins=1');
			else header("location:../inscription.php?error=1");
		}
	}
	else header("location:../inscription.php");
?>