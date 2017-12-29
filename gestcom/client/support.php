<?php session_start(); 
  if (!isset($_SESSION['nom'])) {
    header("location:../index.php");
  }
  include '../include/config.php';
  if(!empty($_POST)){
  	$req = "INSERT INTO support(`IDclt`, `sujet`, `message`) VALUES (".$_SESSION['IDclt'].",'".$_POST['object']."','".$_POST['Message']."')";
  	mysqli_query($con,$req);
  }
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
  </style>
  <title>Support</title>
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
        		<a href="Message.php" class="btn btn-success">Message</a>
        		<br><br>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<center>Composer un nouveau message</center> 
					</div>
					<div class="panel-body">
						<form name="faa" method="POST" action="support.php">
							<table class="table">
								
										<?php 
											if(!empty($_POST)){
												echo "<tr>
														<td>
															<div class='alert alert-success'>
																Message bien envoyée
															</div>
														</td>
													</tr>
												";
											}
										?>
								<tr>
									<td>
										<input type="text" name="nom" value="<?php echo $_SESSION['nom']." ".$_SESSION['prenom'];  ?>" disabled>
									</td> 	
								</tr>
								<tr> 
									<td>
										<input type="text" name="object" placeholder="Sujet" required> 
									</td>
								</tr>
								<tr>
									<td> 
										<textarea rows="6" maxlength="1000" minlength="30" name="Message" class="form-control" placeholder="Message :" required></textarea>
										Min 30 et Max 1000 caractères
									</td>
								</tr>
								<tr>
									<td> 
										<input type="submit" value="envoyer" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form>
					</div>
        		</div>
        	</div>
    	</div>
    </div>
</body>
</html>