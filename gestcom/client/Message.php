<?php session_start(); 
  if (!isset($_SESSION['nom'])) {
    header("location:../index.php");
  }
  include '../include/config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css" >
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/modernizr.custom.js"></script>
  <style type="text/css">
    .dropdown1{
   float:left;
   margin-top:20px;
   height:35px;
   color: white;
   text-align: center;
}
#view{
  width: 10%;
  height: auto;
  margin-left: auto;
  margin-right: auto;
  display: block;
}
table{
  margin-top: 25px;
}

table tr td,table tr th{
  text-align: center;
}
.datee {
	margin-left : 10%;
	margin-right: 10%;
	margin-bottom: 20px;
	margin-top: 20px;
}
.datee input[type=date] {
  width: 100%; padding: 12px 20px; display: inline-block;
    border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box
}
.dw {
	width: 50%;
}
.menu{
	display: block;
    margin-left: 20% ;
    margin-top : 20px;
}
.btn1 {
	color: white;
	font-size: 14px
}
input[type=text]{
  width: 100%; padding: 12px 20px; display: inline-block;
    border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box
}
.table1 {
	width: 100%;
}
.message {
	overflow: hidden;
	word-wrap: break-word;
}
  </style>
  <title>Message</title>
</head>
<body>
	<header class="nav">
		<div class="container-fluid">
      		<div class="row">
      			<div class="col-md-2 col-xs-2 spacer">
      				<center><a href="profile.php"><img src="img/logo.png" id="logo"></a></center>
      			</div>
      			<div class="col-md-8 col-xs-8 spacer">
      				<nav class="menu">
      					<div class="col-md-2 col-xs-2 spacer">
      						<center>
      							<a href="profile.php" class="btn btn1">consulation</a>
      						</center>
      					</div>
      					<div class="col-md-4 col-xs-4 spacer">
      						<center>
      							<a href="ajouter_commande.php" class="btn btn1">Ajouter une commande</a>
      						</center>
      					</div>
      					<div class="col-md-2 col-xs-2 spacer">
      						<center>
      							<a href="support.php" class="btn btn1">support</a>
      						</center>
      					</div>
      				</nav>
      			</div>
      			<div class="col-md-2 col-xs-2 spacer">
              		<div class="dropdown1 dropdown">
              			<?php 
              				echo '<label data-toggle="dropdown" class="btn btn-danger">'.$_SESSION['nom']." ".$_SESSION['prenom'].'  <span class="caret"></span></label>';
              			?>
               			<ul class="dropdown-menu">
                  			<li><a href="deco.php">Deconnecter</a></li>
               			</ul>
              		</div>
      			</div>
     		</div>
   		</div>
	</header>
    <div class="container">
		<div class="row">
        	<div class="col-md-12 col-xs-12 spacer">
        	<br>
        	<a href="support.php" class="btn btn-warning">Retour</a>
        	<br><br>
        		<div class="panel panel-primary">
					<div class="panel-heading">
						<center>Message</center> 
					</div>
					<div class="panel-body">
					<?php
						$cp=1;
						$req ="SELECT * FROM `support` WHERE IDclt=".$_SESSION['IDclt'];
						$resultat = mysqli_query($con,$req);
						while($row = mysqli_fetch_assoc($resultat)){
							$ch='<div class="panel-group">
  							<div class="panel panel-default">
  								<div class="panel-heading">
  									<h4 class="panel-title">
  										<a data-toggle="collapse" href="#collapse'.$cp.'"> <b><u>Sujet</u> : <b>'.$row['sujet'].'</a>
    								</h4>
    							</div>
    							<div id="collapse'.$cp.'" class="panel-collapse collapse">
    								<div class="panel-body"><b><u>Message</u> : </b><br><br> <p class="message">'.$row['message'].'</p></div><div class="panel-footer message">';
    						if($row['reponse']!="") $ch=$ch.$row['reponse'].'</div></div></div><br><br>';
    						else $ch.='Pas de Réponse</div></div></div><br><br>';

    						echo $ch;

    						$cp++;
						}
						if($cp==1) 
						  echo "<center><label>aucun message</label></center>";
					?>

					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>