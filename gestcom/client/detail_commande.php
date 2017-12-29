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
.tt {
	float: right;
	text-align: right;
}
  </style>
  <title>détail d'une commande</title>
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
        			<a href="profile.php" class="btn btn-warning">Retour</a>
        		<br><br>
        		<div class="panel panel-primary">
					<div class="panel-heading">
						<center>détail d'une commande</center> 
					</div>
					<div class="panel-body">
						<?php
							if (isset($_GET['num'])) {
								$req = "SELECT  C.Numcom, C.DateCom,L.Codart,L.Qtcmd,A.Disgart,A.Puart,ROUND(A.Puart*L.Qtcmd,2) AS TOTAL FROM commande C INNER JOIN lignecommande L on C.Numcom=L.Numcom INNER JOIN article A on A.Codart=L.Codart where C.IDclt='".$_SESSION['IDclt']."' and C.Numcom='".$_GET['num']."'";

								$res=mysqli_query($con,$req);
								$ch='<table class="table table-stripped">
										<tr>
											<th>N° commande</th>
											<th>Date de commande</th>
											<th>Code article</th>
											<th>Quantité</th>
											<th>Désignation</th>
											<th>Prix unitaire</th>
											<th>Total par article</th>
										</tr>
              						';
              						$total=0;
								while($d = mysqli_fetch_assoc($res)) {
									$ch.='<tr><td>'.$d['Numcom'].'</td><td>'.$d['DateCom'].'</td><td>'.$d['Codart'].'</td><td>'.$d['Qtcmd'].'</td><td>'.$d['Disgart'].'</td><td>'.$d['Puart'].'</td><td>'.$d['TOTAL'].'</td></tr>';
									$total+=$d['TOTAL'];
								}
								echo $ch;
							}
							if($_GET['num']=="") header("location:profile.php");
						?>
							<tr>
								<td colspan="7">
									<label class="tt">Total : <?php echo $total; ?></label>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div> 
		</div>
	</div>
</body>
</html>