<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="../css/custom.css"/>
	<link rel="stylesheet" href="../css/bootstrap.css"/>
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

<div class="container" style="border:2px solid red">
<img class="imageOne" src="images/was.png" width="800" height="500" id="imagen" name="imagen" >
<img class="imageTwo" src="images/redo.png" width="100" height="100" onclick="rotate()">
</div>
</body>
</html>
<script type="text/javascript">

function rotate(){
	//alert('Rotate');
	var src=$('#imagen').attr('src');
	var params = {  
			operations:[
				{
			operation  : 'rotar',
			image:'was.png',
			degrees:90}]
	};
	var myJSONText = JSON.stringify(params);
	var data = execAjax(myJSONText, "POST", "json","phpControllers/imagesController.php");
	//alert(data['IMG']);
	d = new Date();
	$('#imagen').attr('src',"images/was.png?"+d.getTime());
}


</script>