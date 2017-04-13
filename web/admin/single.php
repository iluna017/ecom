<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Productos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			include 'header.php';
		?>
		<link rel="stylesheet" href="../css/flexslider.css"/>
		<script type="text/javascript" src="../js/jquery.flexslider.js"></script>
		<script type="text/javascript" src="../js/imagezoom.js"></script>
	</head>
	<body>
		<!--div class="panelHead"><h4>Producto</h4></div>
		<br/-->
		<div class="single">
			<div class="container">
				<div
				class="col-md-6 single-right-left animated wow slideInUp animated"
				data-wow-delay=".5s"
				style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides ulStyle" id="ulSlider" name="ulSlider">

							</ul>
						</div>
					</div>
				</div>
				<div
				class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated"
				data-wow-delay=".5s"
				style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
					<h3 style="color: #153CFF" id="title" name="title">dadsad</h3>
					<p>
						<span id="price" name="price" class="item_price">555</span>
						<del id="discount" name="discount"></del>
					</p>

					<div role="tabpanel"
					class="tab-pane fade in active bootstrap-tab-text" id="home"
					aria-labelledby="home-tab">
						<h6>Descripción:</h6>
						<p id="description" name="description"></p>
						<!--span>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span-->

					</div>
				</div>
				<div class="clearfix"></div>

			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {
		//loadTitle('Asics Gel Zaraca 4 Blue Sport Shoes');
		//loadPrice("$200.00","$250.00");
		//loadDescription("Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.");
	});

	function loadProducto(title, description, imagesArray) {
		loadTitle(title);
		loadDescription(description);
		loadImages(imagesArray);
	}

	function loadTitle(title) {
		$('#title').html(title);
	}

	function loadDescription(description) {
		$('#description').html(description);
	}

	function loadImages(imagesArray) {
		if (!isEmpty(imagesArray)) {
			$('').html('');
		}
	}

	function loadPrice(price, discount) {
		$('#price').text(price);
		if (!isEmpty(discount))
			$('#discount').html(discount);
	}
</script>