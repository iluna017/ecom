<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Tienda</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include 'header.php';?>
<script type="text/javascript" src="../js/chart.js"></script>
</head>
<body>
<input type="hidden" id="idTienda" name="idTienda" value="">
<div class="panelHead"><div style="display:inline-block"><h4>Reportes</h4></div>
<div style="display:inline-block;float:right"><a href="menu.php">
<img src="images/return.png" width="40" height="40"></a></div></div>
<br/>
<div class="container">
<ul class="nav nav-pills">
    <li><a href="store.php"><h4>Clientes</h4></a></li>
    <li class="active"><a href="ofertas.php"><h4>Ventas</h4></a></li>
    <li><a href="destacados.php"><h4>Productos</h4></a></li>
    <!--li><a href="#">Menu 3</a></li-->
  </ul>

<br/>
	<canvas id="myChart" width="400" height="400"></canvas>
		
    </div>
</body>
</html>
<script type="text/javascript">
	

	var ctx = document.getElementById("myChart");
	var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

	
</script>	