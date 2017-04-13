<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Tienda</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include 'header.php';?>
</head>
<body>
	<input type="hidden" id="idTienda" name="idTienda" value="">
	<div class="panelHead">
		<div style="display: inline-block">
			<h4>Configuración Tienda</h4>
		</div>
		<div style="display: inline-block; float: right">
			<a href="../menu.php"> <img src="../images/return.png" width="40"
				height="40"></a>
		</div>
	</div>
	<br />
        
	<div class="container">
		<ul class="nav nav-pills">
			<li><a href="../store.php"><h4>Tienda</h4></a></li>
			<li><a href="ofertas.php"><h4>Ofertas</h4></a></li>
			<li><a href="destacados.php"><h4>Destacados</h4></a></li>
			<li><a href="nuevos.php"><h4>Nuevos</h4></a></li>
			<li><a href="tema.php"><h4>Tema</h4></a></li>
			<li class="active"><a href="social.php"><h4>Social</h4></a></li>
		</ul>
		<br />
		<div class="col-xs-12">
			<div class="alert alert-success" style="display:none" id="successDiv">
  			<strong>Success!</strong> Indicates a successful or positive action.
		</div>
        <div class="alert alert-danger" style="display:none" id="alertDiv">
    		<strong>Precaución!</strong> Existen campos que son obligatorios!!!
  		</div>
		</div>
		<div class="col-xs-12">
			<span style="color:red">*</span>
			<label for="inputEmail3" id="nombreLabel" name="nombreLabel">Facebook</label>
			<input type="text" class="form-control" id="facebook" name="facebook"
				placeholder="Facebook" maxlength="150"/>
		</div>
		<div class="col-xs-12">
			<span style="color:red">*</span>
			<label for="inputEmail3" id="cpLabel" name="cpLabel">Twitter</label> <input type="text"
				class="form-control" id="twitter" name="twitter" placeholder="Twitter"
				maxlength="150">
		</div>

		<div class="col-xs-12">
			<span style="color:red">*</span>
			<label for="inputEmail3" id="calleLabel" name="calleLabel">Youtube</label> <input type="text"
				class="form-control" id="youtube" name="youtube" placeholder="Youtube"
				maxlength="150">
		</div>
		<div class="col-xs-12">
			<span style="color:red">*</span>
			<label for="inputEmail3" id="calleLabel" name="calleLabel">Instragram</label> <input type="text"
				class="form-control" id="instagram" name="instagram" placeholder="Instragram"
				maxlength="150">
		</div>
		<div class="col-xs-12">
		&nbsp;
		</div>
		<div class="col-xs-12">
			<div style="float: right">
				<button type="button" class="btn btn-success" data-dismiss="modal"
					onclick="datosTiendaBtn()">Agregar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>


</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {
		setRuta('../../');
		var idTienda = getIdTienda();
		loadDatosTienda(idTienda);
	});

	function loadDatosTienda(idTienda) {
		var params = {
			operations : [ {
				operation : 'select',
				tableName : 'tiendasocial',
				columnNames : 'IdTienda,Facebook,Twitter,Youtube,Pinterest',
				where : 'IdTienda=' + idTienda
			} ]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json",
				"../../phpControllers/dbController.php");
		fillField("facebook", data[0]["Facebook"]);
		fillField("twitter", data[0]["Twitter"]);
		fillField("youtube", data[0]["Youtube"]);
		fillField("pinterest", data[0]["Pinterest"]);		
	}
	
</script>