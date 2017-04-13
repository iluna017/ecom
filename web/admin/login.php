<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
require ("../classControllers/LoginController.php");
$errorLogueo=false;
if(isset($_POST['usuario'])){
	$loginController= new LoginController();
	$loginController -> initServices();
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];
	$login["tableName"]="usuarios";
	$login["columnNames"]="AliasUsuario,Password";
	$login["where"]=" AliasUsuario='".$usuario."'";
	$isLogged=$loginController -> loginCont($login,$usuario,$password);
	if( $isLogged) {
		session_start();
		$_SESSION["loggedIn"] = 2;
		$_SESSION["username"] = $usuario;
		header('Location: menu.php'); //Redirects to the supplied url from the DB
	} else {
		if(isset($_POST['usuario'])){
			$errorLogueo=true;
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Rounded Flat User Login Form Flat Responsive Widget Template :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Rounded Flat User Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="../css/styleLogin.css" rel="stylesheet" type="text/css" media="all" />
<!--link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'-->
</head>
<body>
<form id="forma" name="forma" method="POST" action="login.php">
	<!-- main -->
		<div class="main">
			<h1>Administrador</h1>
			<div class="input_form">
				
					<input id="usuario" name="usuario" type="text" value="Usuario" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Usuario';}" required="">
					<input id="password" name="password" type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
				
			</div>
			<div class="ckeck-bg">
				<div class="checkbox-form">
					<div class="check-left">
						<div class="check">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Recordar mi Password</label>
						</div>
					</div>
					<div class="check-right">
						<form>
							<input type="submit" value="Entrar">
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<?php if($errorLogueo){?>
			<h5 style="color:ff0000">Error de Auntenticación!!!</h5>
			<?php } ?>
		</div>
		<div class="footer">
			<p>&copy 2016 MinegocioWeb.mx<br> All rights reserved.</a></p>
		</div>
	<!-- //main -->
	</form>
</body>
</html>