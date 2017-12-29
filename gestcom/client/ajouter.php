<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="../js/jquery.js"></script>
</head>
<body>
	<table> 
		<tr> 
			<td>alksdqngs</td>
			<td>felkrgfmlkd</td>
		</tr>
		<tr id="ajouter"></tr>
		<tr> 
			<td colspan="2"><button type="button" id="btn">valider</button></td> 
			<td colspan="2"><button type="button" id="sup">valider</button></td> 
		</tr>
	</table>
	<script type="text/javascript"> 
		$(document).ready(function(){
	   		$('#btn').click(function(){
	   			var ch ="<td id='id1' name='ff'>dmlkvsdmlfkns</td>";
	   			$("#ajouter").append(ch);
			});
			$('#sup').click(function(){
				$("#id1").remove();
			});
		});
	</script>
</body>
</html>