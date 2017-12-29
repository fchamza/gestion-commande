<?php session_start(); 
  if (!isset($_SESSION['nom'])) {
    header("location:../index.php");
  }
  include '../include/config.php';
  	if(!empty($_POST)){
  		$codart = $_POST['article'];
		$req ="SELECT Codart,Puart,Qtestock FROM `article` WHERE codart=".$codart;
		$resultat = mysqli_query($con,$req);
		while($row = mysqli_fetch_assoc($resultat)){
			$data['codart']=$row['Codart'];
			$data['Puart']=$row['Puart'];
			$data['Qtestock']=$row['Qtestock'];
		}
		header('Content-type: application/json');
   		echo json_encode($data);
  	}
	else header('location:../index.php');
?>