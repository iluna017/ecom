<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Tienda</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			include 'header.php';
		?>
		<link rel="stylesheet" href="../../css/flexslider.css" />
		<script type="text/javascript" src="../../js/jquery.flexslider.js"></script>
	</head>
	<body>
		<!-- Modal fullscreen -->
		<div class="modal modal-fullscreen fade in" id="modal-fullscreen" role="dialog" style="overflow-y: scroll!important;">
			<div class="modal-dialog">
				<div class="modal-content bodyModal">
					<div class="panelHead">
						<button type="button" class="close" data-dismiss="modal">
							&times;
						</button>
						<h4 class="modal-title">Producto</h4>

					</div>
					<div class="modal-body">
						<div id="modalBody" name="modalBody" class="single">

						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">
							Cerrar
						</button>
					</div>
				</div>
			</div>
		</div>
		<!--END Modal fullscreen -->
		<div class="modal fade" id="productoDetail" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content bodyModal">
					<div class="panelHead">
						<button type="button" class="close" data-dismiss="modal">
							&times;
						</button>
						<h4 class="modal-title">Nuevo Producto</h4>
					</div>
					<div class="modal-body" >
						<div class="alert alert-danger" style="display:none" id="alertDiv">
							<strong>Precaución!</strong> Existen campos que son obligatorios!!!
						</div>
						<div class="rowDiv col-xs-12">
							<span style="color:red">*</span><label id="cmbCategoriaPLabel" name="cmbCategoriaPLabel">Categoría:</label>
							<select class="form-control" id="cmbCategoriaP" name="cmbCategoriaP"></select>
							<!--onchange="loadSubcategoriasCmb('cmbCategoriaP','cmbCategoriaSP')"-->
						</div>
						<!-- div class="rowDiv col-xs-12">
						<label>Subcategoría:</label>
						<select class="form-control" id="cmbCategoriaSP" name="cmbCategoriaSP">
						</select>
						</div -->
						<div class="rowDiv col-xs-12">
							<span style="color:red">*</span><label id="nombreLabel" name="nombreLabel">Nombre:</label>
							<input type="text" class="form-control" id="nombre"
							name="nombre" maxlength="40">
						</div>
						<div class="rowDiv col-xs-12">
							<label>Descripción:</label>
							<textarea class="form-control" id="descripcion"
			name="descripcion" maxlength="100"></textarea>
						</div>
						<div class="rowDiv col-xs-6">
							<span style="color:red">*</span><label id="precioLabel" name="precioLabel">Precio:</label>
							<input type="text" class="form-control" id="precio"
							name="precio" onkeypress="return numbersonly(event)" placeholder="Precio" maxlength="20">
						</div>
						<div class="rowDiv col-xs-12">
							<div class="col-xs-3">
								<label for="inputEmail3">
									<br>
									<input id="chk_oferta" name="chk_oferta" type="checkbox" onclick="activarOferta();">
									Oferta </label>
							</div>
							<div class="col-xs-9">
								<div class="col-xs-4">
									<input type="text" class="form-control" id="oferta" name="oferta" onkeypress="return numbersonly(event)" placeholder="Oferta" maxlength="2" disabled>
								</div>
							</div>
						</div>
						<!--div class="rowDiv col-xs-3">
						<label for="inputEmail3">
						<input id="chk_oferta" name="chk_oferta" type="checkbox" onclick="activarOferta();">Oferta
						</label>
						<input type="text" class="form-control" id="oferta"
						name="oferta" placeholder="Oferta" maxlength="2" disabled>
						</div-->
						<div class="rowDiv col-xs-12">
							&nbsp;
						</div>
						<div class="rowDiv col-xs-12">

							<label for="inputEmail3">Imágenes de Inicio</label>
							<table class="table table-bordered" id="tabla-imagenes" name="tabla-imagenes">
								<tr>
									<td>
									<input type="file" id="fileIn_1" name="fileIn_1" style="font-size: 8px;display:none;">
									</td>
								</tr>
								<tr>
									<td>
									<input type="file" id="fileIn_2" name="fileIn_2" style="font-size: 8px;display:none;">
									</td>
								</tr>
								<tr>
									<td>
									<input type="file" id="fileIn_3" name="fileIn_3" style="font-size: 8px;display:none;">
									</td>
								</tr>
								<tr>
									<td>
									<input type="file" id="fileIn_4" name="fileIn_4" style="font-size: 8px;display:none;">
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="modal-footer" >
						<button type="button" class="btn btn-success" data-backdrop="static" onclick="agregarProductoBtn()">
							Agregar
						</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">
							Cancelar
						</button>
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" id="idTienda" name="idTienda" value="">
		<div class="panelHead">
			<div style="display:inline-block">
				<h4>Configuración Tienda</h4>
			</div>
			<div style="display:inline-block;float:right">
				<a href="../menu.php"> <img src="../images/return.png" width="40" height="40"></a>
			</div>
		</div>
		<br/>

		<div class="container">
			<ul class="nav nav-pills">
				<li>
					<a href="../store.php"><h4>Tienda</h4></a>
				</li>
				<li>
					<a href="ofertas.php"><h4>Ofertas</h4></a>
				</li>
				<li>
					<a href="destacados.php"><h4>Destacados</h4></a>
				</li>
				<li class="active">
					<a href="nuevos.php"><h4>Nuevos</h4></a>
				</li>
				<li>
					<a href="tema.php"><h4>Tema</h4></a>
				</li>
				<li>
					<a href="social.php"><h4>Social</h4></a>
				</li>
			</ul>
			<br/>

			<div id="" name="" class="rowDiv col-xs-12">
				<label>Categoría:</label><select class="form-control"
				id="cmbCategorias" name="cmbCategorias"
				onchange="loadProductosBtn();"></select>
			</div>
					<div class="rowDiv col-xs-12">
							<label id="nombreLabel" name="nombreLabel">Activo S/N:</label>
							<input type="checkbox" id="activoSN" name="activoSN">
						</div>
			<div class="backtable center">
				<table class="table table-hover" id="tabla-productos"
				name="tabla-productos">
					<thead style="background-color: #153CFF">
						<tr style="color: #fff">
							<!--th>No</th-->
							<!--th>Agregar</th-->
							<th width="80%">Productos</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class="backtable center">
				<table class="table table-hover" id="tabla-destacados"
				name="tabla-destacados">
					<thead style="background-color: #153CFF">
						<tr style="color: #fff">
							<!--th>Eliminar</th-->
							<th width="80%">Destacados</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>

	</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {
		setRuta('../../');
		getIdTienda();
		loadCategoriasCmb('cmbCategorias');
		loadNuevos();
	});

	function loadNuevos() {
		var params = {
			operations : [{
				operation : 'select',
				tableName : 'productos',
				columnNames : 'IdCategoria,IdProducto,Nombre',
				where : 'IdTienda=' + $('#idTienda').val() + ' AND IdProducto in_1 ',
				in_1 : 'Select IdProducto from nuevos'
			}]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../../phpControllers/dbController.php");
		if (data.length > 0) {
			var actionSee = "ACTION_IdCategoria,IdProducto_<a href='#' onclick='verProductoBtn(IdCategoria,IdProducto)'><img  width='30' height='30' src='../images/see2.png'></a>";
			var actionEdit = "ACTION_IdCategoria,IdProducto_<a href='#' onclick='editarProductoBtn(this,IdCategoria,IdProducto)'><img  width='30' height='30' src='../images/edit.png'></a>";
			var actionSelect = "SELECT_IdCategoria,IdProducto_<img  width='30' height='30' src='../images/minus	.png' onclick='removerDestacadosBtn(this,IdCategoria,IdProducto)'>";
			var colNames = ["Nombre", actionSee, actionEdit, actionSelect];
			fillTable('tabla-destacados', colNames, data, '190px');
		}
	}

	function loadCategoriasCmb(cmbName) {
		var params = {
			operations : [{
				operation : 'select',
				tableName : 'categorias',
				columnNames : 'IdCategoria,Nombre',
				where : ''
			}]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../../phpControllers/dbController.php");
		if (data.length > 0) {
			var colNames = ["IdCategoria", "Nombre"];
			fillCombo(cmbName, colNames, data)
		}
	}

	function loadProductosBtn() {
		waitingDialog.show('Cargando Productos...');
		setTimeout(function() {
			loadProductos()
		}, 1000);
	}

	function loadProductos() {
		var params = {
			operations : [{
				operation : 'select',
				tableName : 'productos',
				columnNames : 'IdCategoria,IdProducto,Nombre',
				where : 'IdCategoria=' + $('#cmbCategorias').val()
			}]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../../phpControllers/dbController.php");
		var actionAdd = "SELECT_IdCategoria,IdProducto_<img  width='30' height='30' src='../images/add.png' onclick='agregarDestacadosBtn(this,IdCategoria,IdProducto)'>";
		var actionEdit = "ACTION_IdCategoria,IdProducto_<a href='#' onclick='editarProductoBtn(this,IdCategoria,IdProducto)'><img  width='30' height='30' src='../images/edit.png'></a>";
		var actionSee = "ACTION_IdCategoria,IdProducto_<a href='#' onclick='verProductoBtn(IdCategoria,IdProducto)'><img  width='30' height='30' src='../images/see2.png'></a>";
		var colNames = ["Nombre", actionSee, actionEdit, actionAdd];

		fillTable('tabla-productos', colNames, data, '190px');
	}

	function agregarDestacadosBtn(ref, IdCategoria, IdProducto) {
		waitingDialog.show('Agregando Nuevo...');
		setTimeout(function() {
			agregaDestacados(ref, IdCategoria, IdProducto);
		}, 1000);
	}

	function agregaDestacados(ref, IdCategoria, IdProducto) {
		var params = {
			operations : [{
				operation : 'insertar',
				tableName : 'nuevos',
				paramNames : 'IdTienda,IdProducto',
				values : '(\'' + $('#idTienda').val() + '\',\'' + IdProducto + '\')'
			}]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../../phpControllers/dbController.php");
		var trId = $(ref).closest('tr').attr('id');
		if (data["ESTATUS"] == 0) {
			$('#tabla-destacados').append('<tr id="' + trId + '">' + $('tr[id="' + trId + '"]').html().replace('add', 'minus').replace('agregarDestacadosBtn', 'removerDestacadosBtn') + '</tr>');
			$(ref).closest('tr').remove();
		} else {
			modal('Mensaje', data['MSG']);
		}
	}

	function removerDestacadosBtn(ref, IdCategoria, IdProducto) {
		waitingDialog.show('Eliminando Nuevo...');
		setTimeout(function() {
			removerDestacados(ref, IdCategoria, IdProducto);
		}, 1000);
	}

	function removerDestacados(ref, IdCategoria, IdProducto) {
		var params = {
			operations : [{
				operation : 'delete',
				tableName : 'nuevos',
				where : ' IdTienda=' + $('#idTienda').val() + ' AND IdProducto=' + IdProducto
			}]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../../phpControllers/dbController.php");
		var trId = $(ref).closest('tr').attr('id');
		if (data["MSG"].indexOf('Error') == -1) {
			$(ref).closest('tr').remove();
		}
	}
</script>
