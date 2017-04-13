<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Tienda</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include 'header.php';?>
<script src="../../js/jscolor.js"></script>
</head>
<body>
<input type="hidden" id="idTienda" name="idTienda" value="">
<div class="panelHead"><div style="display:inline-block"><h4>Configuración Tienda</h4></div>
<div style="display:inline-block;float:right"><a href="../menu.php">
<img src="../images/return.png" width="40" height="40"></a></div></div>
<br/>

<div class="container">
<ul class="nav nav-pills">
    <li><a href="../store.php"><h4>Tienda</h4></a></li>
    <li><a href="ofertas.php"><h4>Ofertas</h4></a></li>
    <li><a href="destacados.php"><h4>Destacados</h4></a></li>
    <li><a href="nuevos.php"><h4>Nuevos</h4></a></li>
	<li class="active"><a href="tema.php"><h4>Tema</h4></a></li>
	<li><a href="social.php"><h4>Social</h4></a></li>
  </ul>
<br/>

	<div id="" name="" class="rowDiv col-xs-12">
		<label>Color Texto Tienda:</label> 
		<input type="text" class="form-control jscolor" id="color" name="color"
				placeholder="Color" maxlength="10"/>
	</div>
	<div id="" name="" class="rowDiv col-xs-12">
		<label>Color Fondo Tienda:</label> 
		<input type="text" class="form-control jscolor" id="colorFondo" name="colorFondo"
			placeholder="Color" maxlength="10"/>
	</div>			
	<div id="" name="" class="rowDiv col-xs-12">
		<button type="button" class="btn" data-dismiss="modal" onclick="aplicarTemaBtn()">Aplicar Tema</button>
	</div>
	<div id="" name="" class="rowDiv col-xs-12">
		&nbsp;
	</div>
	<div id="" name="" class="rowDiv col-xs-12">
		&nbsp;
	</div>
	<div id="" name="" class="rowDiv col-xs-12">
		&nbsp;
	</div>
	<div id="" name="" class="rowDiv col-xs-12">
		&nbsp;
	</div>		
	<div id="" name="" class="rowDiv col-xs-12">
		<canvas id="myCanvas" width="200" height="100" style="border:2px solid #000000;">
	</div>
</div>					
	
</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {
		setRuta('../../');
		getIdTienda();
		loadTema();
		loadThemeCanvas('TIENDA',$('#color').val(),$('#colorFondo').val());
		$('#color').change(function(){loadThemeCanvas('TIENDA',$('#color').val(),$('#colorFondo').val());});
		$('#colorFondo').change(function(){loadThemeCanvas('TIENDA',$('#color').val(),$('#colorFondo').val());});
	});
	function loadThemeCanvas(txt,fontColor,bodyColor){
		var canvas = document.getElementById("myCanvas");
		var ctx = canvas.getContext("2d");
 		ctx.save();
    	ctx.font = '32px arial';
    	ctx.textBaseline = 'top';
    	ctx.fillStyle = '#'+bodyColor;
    	var width = ctx.measureText(txt).width;
    	ctx.fillRect(0, 0, 200, 100);
    	ctx.fillStyle = '#'+fontColor;
    	ctx.fillText(txt, 20, 20);
	}
	
	function loadTema() {
		var params = {
			operations : [ {
				operation : 'select',
				tableName : 'tiendatema',
				columnNames : 'IdTienda,FrontColor,BodyColor',
				where : ' idTienda='+$('#idTienda').val()
			} ]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json",
				"../../phpControllers/dbController.php");
		if (data.length > 0) {
			fillField('color',data[0]['FrontColor']);
			$('#color').css('background-color','#'+data[0]['FrontColor']);
			fillField('colorFondo',data[0]['BodyColor']);
			$('#colorFondo').css('background-color','#'+data[0]['BodyColor']);
		}
	}
	
	function aplicarTemaBtn() {
		waitingDialog.show('Aplicando Cambio...');
		setTimeout(function() {
			//aplicarTema();
			actualizarTema();
		}, 1000);
	}
	
	function aplicarTema(){
		var params = {  
				operations:[
					{
				operation : 'insertar',
				tableName : 'tiendatema',
				paramNames: 'IdTienda,FrontColor,BodyColor',
				values    : $('#idTienda').val()+','+$('#color').val()
				}]
			};
			var myJSONText = JSON.stringify(params);
			//alert(myJSONText);
			var data = execAjax(myJSONText, "POST", "json","../../phpControllers/dbController.php");
			if (data["MSG"].indexOf('Error') == -1) {
				modal('Mensaje','Aplicado exitosamente!!!');
			}
	}
	function actualizarTema(){
		var params = {  
			operations:[{
			operation : 'update',
			tableName : 'tiendatema',
			updFields: 'FrontColor="'+$('#color').val()+'",BodyColor="'+$('#colorFondo').val()+'"',
			where    :'IdTienda='+$('#idTienda').val()
		}]};
		var myJSONText = JSON.stringify(params);
		//alert(myJSONText);
		var data = execAjax(myJSONText, "POST", "json","../../phpControllers/dbController.php");
		if (data["MSG"].indexOf('Error') == -1) {
			modal('Mensaje','Aplicado exitosamente!!!');
		}
		
	}	
</script>		