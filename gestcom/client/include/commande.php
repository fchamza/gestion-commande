<?php
	session_start();
	if(!empty($_GET)){
		include("../../include/config.php");

		$req = "INSERT INTO `commande`( `IDclt`, `DateCom`) VALUES (".$_SESSION['IDclt'].",CURDATE())";
		mysqli_query($con,$req);
		
		$req ="";
		$req = "SELECT `Numcom` FROM commande ORDER BY `Numcom` DESC LIMIT 0, 1";
		$res = mysqli_query($con,$req);
		while($row = mysqli_fetch_assoc($res)){
			$Num = $row['Numcom'];
		}
		
		$cp =$_GET['cpt'];
		for($i=1;$i<=$cp;$i++) {
			$req ="";
			$req = "INSERT INTO `lignecommande`(`Numcom`, `Codart` , Qtcmd) VALUES (".$Num.",".$_GET['c'.$i].",".$_GET['Q'.$i].")";
			mysqli_query($con,$req);
		}
		$data['cpt']='ok';

		header('Content-type: application/json');
   		echo json_encode($data);
	}
	else header("location : ../deco.php");

?>