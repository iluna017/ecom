<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="css/custom.css"/>
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<style>
		.container {
			position: relative;
			width: 100%;/*Or whatever you want*/
		}
		.imageOne {
  width: 100%;
}
		.imageTwo {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}
	</style>
	<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jsFunctions.js"></script>
	<script type="text/javascript" src="js/modal.js"></script>
</head>
<body>
<input type="text" id="categoria" name="categoria"><br/>
<input type="button" id="boton" onclick="copia()" value="Copiar">
</body>
</html>
<script type="text/javascript">

function copia(){
	//alert('Rotate');
	var categoria=$('#categoria').val();
	var params = {  
			operations:[
				{
			operation  : 'copiar',
			dirOrigen  : 'plantillas',
			dirDestino : 'categorias',
			archivoOrigen:'electronics.html',
			archivoDestino:categoria+'.html'
			}]
	};
	var myJSONText = JSON.stringify(params);
	var data = execAjax(myJSONText, "POST", "json","phpControllers/fileController.php");
	alert(data['FILE']);
}


</script>