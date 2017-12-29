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
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
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
input[type=text] , select{
  width: 80%; padding: 12px 20px; display: inline-block; text-align: center;
    border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box
}
input[type=number] {
	width: 60%; padding: 12px 20px; display: inline-block; 
    border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box
}
.plus {
	width: 30px;
	height: 30px;
	margin : 20px
}
.plus1{
	margin-top : 25px
}
.moin {
	width: 30px;
	height: 30px;

}
.moin1 {
	margin-top: 30px;
	background-color: white;
	border: none
}
.bdr {
	margin-top: 20px;
	border: none;
	background-color: white;
	float: left;
}
.bdr:hover , .bdr:focus , .bdr:active {
	background-color: white;
}
.total {
	color: blue ;
	float: right;
}
.m_conf {
	float: right;
}
  </style>
  <title>Ajouter une commande</title>
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
						<center>Ajouter une commande</center> 
					</div>
					<div class="panel-body">
							<center><table>
							<tr>
								<td>
									<label>Article : </label><br>
									<select class="form-control1" name="article1" id="article1" onchange="remp(cp);" required>
										<option>sélectionner un article</option>
								<?php
									$req ="SELECT Codart,Disgart FROM `article` ";
									$ch='';
									$resultat = mysqli_query($con,$req);
									while($row = mysqli_fetch_assoc($resultat)){ 
										$ch.='<option value="'.$row['Codart'].'">'.$row['Disgart'].'</option>';
									}
									$ch.='</select></td>';

									echo $ch;
								?>
								<td>
									<label>Code article : </label><br>
									<input type="text" name="codart" id="codart1" disabled>
								</td>
								<td>
									<label>Prix unitaire : </label><br>
									<input type="text" name="Puart" id="Puart1" disabled>
								</td>
								<td>
									<label>Quantité : </label><br>
									<input type="number" min="1" name="Qtestock" id="Qtestock1" onchange="tot_par_act();">
								</td>
								<td>
									<label>Total par article : </label><br>
									<input type="text" name="totalA" id="totalA1" value="0"  disabled>
								</td>
							</tr> 
							<tr id="add_ligne1"></tr>
							<tr>
								<td colspan="4">
									<button type="button" id="ajouterLigne" class="bdr">
										<img src="img/plus.png" class="plus">
										<label class="plus1">Ajouter un article </label>
									</button>		
								</td>
								<td colspan="1" >
									<label>Total Est</label>
									<input type="text" name="total" id="total" disabled="">
								</td>
							</tr>
							<tr> 
								<td colspan="5"> 
									<button type="button" class="btn btn-info btn-lg m_conf" data-toggle="modal" data-target="#Confirmer" id="modal">
										Confirmer
									</button>
								</td>
							</tr>
							</table></center>
							<div id="Confirmer" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title"><center>Confirmation</center></h4>
							      </div>
							      <div class="modal-body">
							      	<form> 
							      		<div id="conf_com"></div>
							      		</div>
							      		<div class="modal-footer">
							      			<button type="button" id="Valider" onclick="valider();" class="btn btn-primary">
							        			Valider
							        		</button>
							        		<button type="button" class="btn btn-danger" data-dismiss="modal">
							        			Annuler
							        		</button>
							     		</div>
							      	</form>
							    </div>

							  </div>
							</div>
					</div>
				</div>
        	</div>
        </div>
    </div>
   <script>
   		//load
   		var cp  = 1;
   		var cpt = 0;
		var total = 0;
		if($("#totalA1").val() == 0) $('#modal').attr("disabled", "");
		//modal ---- confirmation
		$('#modal').click(function(){
			var ch="<center><table class='table'><tr><th>Article</th><th>Code article</th><th>Prix unitaire</th><th>Quantité</th><th>Total par article</th></tr>";
			cpt = 0;
			for(var i=1;i<=cp;i++){
				if($('#article'+i).val() != "sélectionner un article" && $('#totalA'+i).val() != 0){
					ch+="<tr><td>"+$('#article'+i).val()+"</td><td>"+$('#codart'+i).val()+"</td><td>"+$('#Puart'+i).val()+"</td><td>"+$('#Qtestock'+i).val()+"</td><td>"+$('#totalA'+i).val()+"</td><tr>";
					cpt++;
				}
			}
			ch +="<tr><td colspan='3'>Nombre article :<br><input type='text' name='Puart' value='"+cpt+"' disabled></td><td colspan='2'>Total :<br><input type='text' name='Puart' value='"+$('#total').val()+"' disabled></td></tr></table></center>";
			$("#conf_com").html(ch);
		});
		// remplir les champs
   		function remp(cp) {
   			$('#totalA'+cp).attr("value", "");
	   		var codart = $("#article"+cp).val();
	   		if (codart =='sélectionner un article'){
	   			$('#codart'+cp).attr("value", "");
			    $('#Puart'+cp).attr("value", "");
			    $('#Qtestock'+cp).attr("max" , "");
	   		}
	   		else {
		   		$.ajax({
			        url: "remp.php",
			        type: "POST",
			        data: { article : codart},
			        dataType: "json",
			        success: function(data) {
			         	$('#codart'+cp).attr("value", data.codart);
			         	$('#Puart'+cp).attr("value", data.Puart);
			         	$('#Qtestock'+cp).attr("max" , data.Qtestock);
			        },
			      });
	   		}	
		}
		// calculer total
		function tot_par_act(){
			$('#modal').removeAttr("disabled", "");
			var qte = $('#Qtestock'+cp).val();
			var pri = $('#Puart'+cp).val();
			$('#totalA'+cp).attr("value" , (qte*pri).toFixed(2));
			for(var i=0;i<=cp;i++) {
				if(i==0) total =0;
				else total += parseFloat($("#totalA"+i).val());
			}
			$('#total').attr("value" , total);
		}
		//validation 
		function valider() {
			var ch ="cpt="+cpt;
			for(var i=1;i<=cp;i++){
					ch+= "&c"+i+"="+$('#codart'+i).val();
					ch+= "&Q"+i+"="+$('#Qtestock'+i).val();
			}
			$.ajax({
			    url: 'include/commande.php',
			    type: "GET",
			    data: ch,
				dataType: "json",
			    success: function(data) {
			    	if(data.cpt = 'ok')  top.location.href="profile.php";
			    },
			});

		}
		// ajouter ligne commande
	   	$('#ajouterLigne').click(function(){
	   		cp++;
	   		$('#Qtestock'+(cp-1)).attr("disabled" , "");
	   		$('#article'+(cp-1)).attr("disabled" , "");
			var ch = '<td><label>Article : </label><br><select class="form-control1" name="article'+cp+'" id="article'+cp+'" onchange="remp(cp);" required><option>sélectionner un article</option>';
			$("#add_ligne"+(cp-1)).html(ch);
			ch=ch+ '<?php				
						$ch ='';
						$req ="SELECT Codart,Disgart FROM article ";
						$resultat = mysqli_query($con,$req);
						while($row = mysqli_fetch_assoc($resultat)){ 
							$ch.='<option value="'.$row['Codart'].'">'.$row['Disgart'].'</option>';
						}
						$ch.='</select></td>';
						echo $ch;
					?>';
			ch+='<td><label>Code article : </label><br><input type="text" name="codart" id="codart'+cp+'" disabled></td><td><label>Prix unitaire : </label><br><input type="text" name="Puart" id="Puart'+cp+'" disabled></td><td><label>Quantité : </label><br><input type="number" min="1" name="Qtestock1" id="Qtestock'+cp+'" onchange="tot_par_act();"></td><td><label>Total par article : </label><br><input value="0" type="text" name="totalA" id="totalA'+cp+'"  disabled></td><td></td>';

			$("#add_ligne"+(cp-1)).html(ch);
			$("#add_ligne"+(cp-1)).after( "<tr id='add_ligne"+cp+"'></tr>" );		
		});
		//supprime ligne
		/*
		function moin(x){
			$( "#add_ligne"+(x-1) ).remove();
			$('#Qtestock'+(x-1)).removeAttr("disabled", "");
	   		$('#article'+(x-1)).removeAttr("disabled" , "");
		}*/
  </script>
</body>
</html>