<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html> 
	<head>
	<meta charset="ISO-8859-1">
	<meta http-equiv="Content-Type" content="text/html">
	<title>Men&uacute;</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<?php include 'header.php';?>
	<script type="text/javascript">
$(document).ready(function() {
    $("body").css("display", "none");
    $("body").fadeIn(1000);

    $("a").click(function(event){
        event.preventDefault();
        linkLocation = this.href;
		//alert(linkLocation);
        $("body").fadeOut(1000, redirectPage);
    });

    function redirectPage() {
        window.location = linkLocation;
    }
});
</script>
	
	
</head> 

<body> 
<div class="panelHead"><h4>Men&uacute;</h4></div>
<br>
<div class="container">
  <div class="list-group" >
   <a href="store.php" style="background-color:#153CFF" class="list-group-item"><h5 style="color:#ffffff"> Tienda</h5></a>
   <a href="categoria.php" style="background-color:#153CFF" class="list-group-item"> <h5 style="color:#ffffff"> Categor&iacute;as</h5></a>
   <!-- a href="subcategoria.html" style="background-color:#5A66F2" class="list-group-item"> <h5 style="color:#ffffff"> Subcategor�as</h5></a>    -->
   <a href="producto.php" style="background-color:#153CFF" class="list-group-item"> <h5 style="color:#ffffff"> Productos</h5></a>
   <a href="clientes.php" style="background-color:#153CFF" class="list-group-item"><h5 style="color:#ffffff"> Clientes</h5></a>
   <!--a href="#" style="background-color:#153CFF" class="list-group-item"> <h5 style="color:#ffffff"> Whatsapp</h5></a>
   <a href="#" style="background-color:#153CFF" class="list-group-item"> <h5 style="color:#ffffff"> Plantillas </h5></a-->
  </div>
</div>
</body>
</html>
