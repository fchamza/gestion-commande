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
  </style>
  <title>Profile</title>
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
        <div class="col-md-12 col-xs-12 spacer"> <br>
        <form name="affiche_tt" method="POST" action="profile.php">
           <div class="col-md-4 col-xs-4 spacer">
            <center><button type="submit" name="aff-tt" class="btn btn-primary">Afficher Tout</button></center>
           </div>
        </form>
        <form name="affiche_par_date" method="POST" action="profile.php">
           <div class="col-md-8 col-xs-8 spacer">
          	 <div class="dropdown">
          	 	
  				  <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
  					Afficher les commandes entre 2 dates
  					<span class="caret"></span> 
  				  </button>
  				
  				<ul class="dropdown-menu dw">
    				<li class="datee">
    					<label>date de début</label> <br>
        				<input type="date" name="date_debut" required> 
        			</li>
        			<li class="datee">
        				<label>date de fin </label><br>
        				<input type="date" name="date_fin" required>
        			</li>
        			<li class="datee">
        				<br>
        				<center><input type="submit" class="btn btn-info" value="affiche"></center>
        			</li>
				</ul>
			</div>
           </div>

           <br>
        </form>

        <?php
            if (isset($_POST['aff-tt'])) {
              $r1 = "select * from commande where IDclt=".$_SESSION['IDclt'];                      
              $resultas=mysqli_query($con,$r1);
              $cpt=0;
              $ch='<table class="table table-stripped">
              <tr><th>N° Commande</th><th>Date Commande</th><th>Afficher Commande</th></tr>';
              while($d=mysqli_fetch_assoc($resultas)) {
                $cpt++;
                $ch=$ch."<tr><td>".$d['Numcom']."</td><td>".$d['DateCom']."</td><td><a href='detail_commande.php?num=".$d['Numcom']."'><img id='view' src='img/view.png'></a></td></tr>";
              }
              if($cpt!= 0) echo $ch;
              else echo "<br><br><div class='alert alert-warning'><h3><center>Aucun commande</center></h3></div>";
            }
            if(isset($_POST['date_debut']) && isset($_POST['date_fin'])){
            	$r1="SELECT * FROM commande WHERE DateCom BETWEEN '".$_POST['date_debut']."' AND '".$_POST['date_fin']."'";
            	$resultas=mysqli_query($con,$r1);
            	$cpt=0;
              	$ch='<table class="table table-stripped"><tr><th>N° Commande</th><th>Date Commande</th><th>Afficher Commande</th></tr>';
             	while($d=mysqli_fetch_assoc($resultas)) {
                	$cpt++;
               		$ch.="<tr><td>".$d['Numcom']."</td><td>".$d['DateCom']."</td><td><a href='detail_commande.php?num=".$d['Numcom']."'><img id='view' src='img/view.png'></a></td></tr>";
            	}
              	if($cpt!= 0) echo $ch;
              	else echo "<br><br><div class='alert alert-warning'><h3><center>Aucun commande</center></h3></div>";

            }
        ?>

          </table>
        </div>
      </div>
    </div>
</body>
</html>