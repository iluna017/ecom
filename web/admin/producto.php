<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Productos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php include 'header.php';?>
		<link rel="stylesheet" href="../css/flexslider.css" />
		<script type="text/javascript" src="../js/jquery.flexslider.js"></script>
		</head>
	<body>
		<div class="modal fade" id="confirm" role="dialog">
				<div class="modal-dialog">
					<div class="modal-contentNormal bodyModal">
						<div class="panelHead">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Mensaje</h4>
						</div>
						<div class="modal-body">
							<label for="inputEmail3" id="confirmLabel" name="confirmLabel"></label>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success"
								data-backdrop="static" id="OK">Aceptar</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
		<input type="hidden" id="idTienda" name="idTienda" value="">
		<input type="hidden" id="IdProducto" name="IdProducto" />
		<input type="hidden" id="IdProductoTemp" name="IdProductoTemp" />
		<input type="hidden" id="TrId" name="TrId" />
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
		<form name="forma" id="forma" method="POST" action="producto.php">
			<div class="panelHead">
				<div style="display: inline-block">
					<h4>Productos</h4>
				</div>
				<div style="display: inline-block; float: right">
					<a href="menu.php"><img src="images/return.png" width="40"
					height="40"></a>
				</div>
			</div>
			<br />
			<br />
			<a href="#" class="back-to-top" onclick="loadProductoNuevo()"></a>

			<div id="" name="" class="rowDiv col-xs-12">
				<label>Categoría:</label><select class="form-control"
				id="cmbCategorias" name="cmbCategorias"
				onchange="loadProductosBtn();"></select>
			</div>
			<!-- div id="" name="" class="rowDiv col-xs-12">
			<label>Subcategoría:</label> <select class="form-control"
			id="cmbSubcategorias" name="cmbSubcategorias">
			</select>
			</div -->
			<br />

			<div class="backtable center">
				<table class="table table-hover" id="tabla-productos"
				name="tabla-productos">
					<thead style="background-color: #153CFF">
						<tr style="color: #fff">
							<!--th>No</th-->
							<th width="80%">Producto</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
					<!-- Modal fullscreen -->
<div class="modal modal-fullscreen fade in" id="modal-fullscreen" role="dialog" style="overflow-y: scroll!important;">
  <div class="modal-dialog">
  		<div class="modal-content bodyModal">
					<div class="panelHead">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Producto</h4>
						
					</div>
					<div class="modal-body">
						<div id="modalBody" name="modalBody" class="single">
						
						</div>
					
						</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
				</div>
      </div>
      		<!--END Modal fullscreen -->
			<!--div class="modal fade" id="myModalSingle" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content bodyModal">
						<div class="panelHead">
							<button type="button" class="close" data-dismiss="modal">
								&times;
							</button>
							<h4 class="modal-title">Nuevo Producto</h4>
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
			</div-->
			
		</form>
	</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {
		getIdTienda();
		loadCategoriasCmb('cmbCategorias');
		var height = $(window).height();
		$('.modal-content').css('height', (height - 120) + 'px');
		$('.modal-content').css('overflow-y', 'auto');
		$(window).keydown(function(event) {
			if (event.keyCode == 13) {
				event.preventDefault();
				return false;
			}
		});
	});

	function getIdTienda() {
		var data = execAjax("", "POST", "text", "json/store.json");
		var json = $.parseJSON(data);
		var idTienda = json.Tienda.IdTienda;
		$('#idTienda').val(idTienda);
		return idTienda;
	}

	function loadProductoNuevo() {
		$('#productoDetail').modal('show');
		loadCategoriasCmb('cmbCategoriaP');
		cleanProducto();
		cleanTableI();
	}

	function loadProducto() {
		$('#productoDetail').modal('show');
		loadCategoriasCmb('cmbCategoriaP');
	}

	function cleanProducto() {
		$('#IdProducto').val('');
		$('#TrId').val('');
		$('#cmbCategoriaP').val('');
		$('#nombre').val('');
		$('#descripcion').val('');
		$('#precio').val('');
		$('#oferta').val('');
		chkField('chk_oferta', 'N');
	}

	function cleanTableI() {
		cleanTable('tabla-imagenes');
		var tabla = $('#tabla-imagenes');
		var tr = '';
		var idProducto = randomInt(0, 999999);
		$('#IdProductoTemp').val('');
		$('#IdProductoTemp').val(idProducto);
		for (var i = 1; i < 5; i++) {
			tr = '<tr id="Img_' + i + '"><td><span class="btn btn-primary" onclick="selectImage(this)" >Seleccionar</span>' + '<input type="file" id="fileIn_' + i + '" name="fileIn_' + i + '" onchange="loadImageInit('+i+','+idProducto+')" style="font-size: 8px;display:none;"></td></tr>';
			tabla.append(tr);
		}
	}
	
	function addNombreImagen(file) {
		var imagen = $('#' + file).val();
		imagen = imagen.substring(imagen.lastIndexOf('\\') + 1, imagen.length);
		$('#' + file).after('<span>' + imagen + '</span>');
	}

	function activarOferta() {
		if (checkedC('chk_oferta') == 'S')
			enableDis('oferta', false);
		else
			enableDis('oferta', true);
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
		var data = execAjax(myJSONText, "POST", "json", "../phpControllers/dbController.php");
		if (data.length > 0) {
			var colNames = ["IdCategoria", "Nombre"];
			fillCombo(cmbName, colNames, data)
		}
	}

	function loadSubcategoriasCmb(cmbCategoria, cmbSubcategoria) {
		var params = {
			operations : [{
				operation : 'select',
				tableName : 'subcategorias',
				columnNames : 'IdSubCategoria,Nombre',
				where : 'IdCategoria=' + $('#' + cmbCategoria).val()
			}]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../phpControllers/dbController.php");
		if (data.length > 0) {
			var colNames = ["IdSubCategoria", "Nombre"];
			fillCombo(cmbSubcategoria, colNames, data)
		}
	}

	function loadProductosBtn() {
		if (!isEmpty($('#cmbCategorias').val())) {
			waitingDialog.show('Cargando Productos...');
			setTimeout(function() {
				loadProductos()
			}, 1000);
		} else {
			cleanTable('tabla-productos');
		}
	}

	function loadProductos() {
		cleanTable('tabla-productos');
		var params = {
			operations : [{
				operation : 'select',
				tableName : 'productos',
				columnNames : 'IdCategoria,IdProducto,Nombre',
				where : 'IdCategoria=' + $('#cmbCategorias').val()
			}]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../phpControllers/dbController.php");
		var actionDelete = "ACTION_IdCategoria,IdProducto,Nombre_<a href='#' onclick='borrarProductoBtn(this,IdCategoria,IdProducto,Nombre)'><img  width='30' height='30' src='images/delete.png'></a>";
		var actionEdit = "ACTION_IdCategoria,IdProducto_<a href='#' onclick='editarProductoBtn(this,IdCategoria,IdProducto)'><img  width='30' height='30' src='images/edit.png'></a>";
		var actionSee = "ACTION_IdCategoria,IdProducto_<a href='#' onclick='verProductoBtn(IdCategoria,IdProducto)'><img  width='30' height='30' src='images/see2.png'></a>";
		var colNames = ["Nombre", actionSee, actionEdit, actionDelete];
		fillTable('tabla-productos', colNames, data, '150px');
	}
	function editarProductoBtn(ref, idCategoria, idProducto) {
		$('#IdProducto').val(idProducto);
		loadProducto();
		var data = getProducto(idCategoria, idProducto);
		$('#cmbCategoriaP').val(data['Producto'][0]["IdCategoria"]);
		$('#nombre').val(data['Producto'][0]["Nombre"]);
		$('#descripcion').val(data['Producto'][0]["Descripcion"]);
		$('#precio').val(data['Producto'][0]["Precio"]);
		chkField('chk_oferta', data['Producto'][0]["OfertaSN"]);
		activarOferta();
		$('#oferta').val(data['Producto'][0]["Porcentaje"]);
		buildListProductoEdit(idCategoria, idProducto, data);
		$('#TrId').val($(ref).closest('tr').attr('id'));
		productosList = data;
	}

	function getProducto(idCategoria, idProducto) {
		var params = {
			oper : 'Obten',
			producto : [{
				operation : 'select',
				tableName : 'productos',
				columnNames : 'IdCategoria,IdProducto,Nombre,Descripcion,Precio,OfertaSN,Porcentaje',
				where : 'IdCategoria=' + idCategoria + ' and IdProducto=' + idProducto
			}, {
				operation : 'select',
				tableName : 'imagenproducto',
				columnNames : 'IdProducto,IdImagen,Nombre',
				where : 'IdProducto=' + idProducto
			}]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../classControllers/ProductController.php");
		return data;
	}

	var productosList;
	var indexList;


	function verProductoBtn(idCategoria, idProducto) {
		waitingDialog.show('Cargando Producto...');
		setTimeout(function() {
			var data = getProducto(idCategoria, idProducto);
			loadSingleProducto(idCategoria, idProducto, data);
		}, 1000);
	}
	
	function selectImage(selectBtn){
		var idCategoria=$('#cmbCategoriaP').val();
		if(isEmpty(idCategoria)){
			modal('Mensaje','Debe seleccionar una categoría');
		}else{
			$(selectBtn).parent().find('input[type=file]').click();
		}
	}
	
	function loadImageInit(index,idProducto){
		var idCategoria=$('#cmbCategoriaP').val();
		loadImgProductoBtn(idCategoria , idProducto, index,'../images/' + idCategoria + '/' + idProducto);
		addNombreImagen('fileIn_' + index);
	}
	
	function buildListProductoEdit(idCategoria, idProducto, data) {
		cleanTable('tabla-imagenes');
		var tabla = $('#tabla-imagenes');
		for (var i = 0; i < data['Imagen'].length; i++) {
			idImagen = data['Imagen'][i]["IdImagen"];
			nombre = data['Imagen'][i]["Nombre"];
			tabla.append('<tr id="Img_' + (i + 1) + '"><td>' + nombre + '</td>' + '<td><a href="#myModal2" role="button" class="btn" data-toggle="modal" onclick="verImagen(' + idCategoria + ',' + idProducto + ',\'' + nombre + '\',' + (i+1) + ')">Ver</a></td>' + '<td><a href="#" onclick="borrarImgProductoBtn(this,\'' + idCategoria + '\',\'' + idProducto + '\',\'' + idImagen + '\',\'' + nombre + '\')"><img  width="30" height="30" src="images/delete.png"></a></td>' + '</tr>');
		}
		var imagesEmpty = 4;
		for (var j = (i + 1); j <= imagesEmpty; j++) {
			tr = $('<tr id="Img_' + (j) + '" name="Img_' + (j) + '"></tr>');
			fileInput = '<td><span class="btn btn-primary" onclick="$(this).parent().find(\'input[type=file]\').click();">Seleccionar</span><input type="file" id="fileIn_' + (j) + '" name="fileIn_' + (j) + '" onchange="loadImgProductoBtn(' + idCategoria + ',' + idProducto + ',' + (j) + ',\'../images/' + idCategoria + '/' + idProducto + '\')" style="font-size: 8px;display:none;"></td>';
			tr.append(fileInput);
			tabla.append(tr);
		}
	}

	function verImagen(idCategoria, idProducto, nombre, index) {
		var d = new Date();
		var imagen = '<img align="middle" id="imagen" name="imagen" style="width:auto;max-width:100%;max-height:450;height=auto" src="../images/' + idCategoria + '/' + idProducto + '/' + nombre + '?' + d.getTime() + '">';
		imagen += '<img class="left_img" src="../images/after-button.png" width="80" height="80" onclick="beforeImagen()"><img class="right_img" src="../images/next-button.png" onclick="nextImagen()" width="80" height="80">';
		imagen += '<img class="rotate" src="images/redo.png" width="80" height="80" onclick=\'rotate("imagen","' + idCategoria + '/' + idProducto + '/' + nombre + '")\'>';
		modal('Imagen', imagen);
		indexList = index-1;
	}

	function nextImagen() {
		if (indexList == productosList["Imagen"].length - 1) {
			indexList = 0;
			if(productosList["Imagen"][indexList]==""){
				if((indexList +1 ) != productosList["Imagen"].length){indexList += 1;}
			}
			verImagen(productosList["Producto"][0]["IdCategoria"], productosList["Producto"][0]["IdProducto"], productosList["Imagen"][indexList]["Nombre"], 0);
			indexList += 1;
		}
		else {
			indexList += 1;
			if(productosList["Imagen"][indexList]==""){
				if((indexList +1 ) < productosList["Imagen"].length){indexList += 1;}	
			}
			verImagen(productosList["Producto"][0]["IdCategoria"], productosList["Producto"][0]["IdProducto"], productosList["Imagen"][indexList]["Nombre"], indexList+1);
		}
	}

	function beforeImagen() {
		if(indexList <= 0) {
			indexList = (productosList["Imagen"].length - 1);
			if(productosList["Imagen"][indexList]==""){
				if((indexList -1 ) != productosList["Imagen"].length){indexList -= 1;}	
			}
			verImagen(productosList["Producto"][0]["IdCategoria"], productosList["Producto"][0]["IdProducto"], productosList["Imagen"][indexList]["Nombre"], indexList+1);
		} else {
			indexList -= 1;
			if(productosList["Imagen"][indexList]==""){
				if((indexList -1 ) != productosList["Imagen"].length){indexList -= 1;}	
			}
			verImagen(productosList["Producto"][0]["IdCategoria"], productosList["Producto"][0]["IdProducto"], productosList["Imagen"][indexList]["Nombre"], indexList+1);
		}
	}

	function buildListProducto(idCategoria,idProducto,data){
		var ul=$('#ulSlider');
		var li="";
		var height=$('#modal-fullscreen').height();
		height=250;
		//alert(data['Imagen'].length);
		for(var i=0;i<data['Imagen'].length;i++){
			li = $('<li id="'+(i+1)+'" name="'+(i+1)+'" class="liStyle" data-thumb=../images/'+idCategoria+'/'+idProducto+'/'+data['Imagen'][i]['Nombre']+'"><div style="overflow-y:scroll;max-width:100%;width:auto;height:auto;max-height:380"><img style="width:100%;height:auto" src="../images/'+idCategoria+'/'+idProducto+'/'+data['Imagen'][i]['Nombre']+'" /></div></li>');
			ul.append(li);
		}		
	}
	
	function loadSingleProducto(idCategoria,idProducto,data) {
		$('#modal-fullscreen').modal('show');
		$('#modalBody').html('');
		var body='<div class="container" style="width:100%">'+
		 '<div class="col-md-6 single-right-left animated wow slideInUp animated"'+
		 '	data-wow-delay=".5s"'+
		 '	style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">'+
		 '	<div class="grid images_3_of_2">'+
		 '		<div class="flexslider">'+
		 '			<ul class="slides ulStyle" id="ulSlider" name="ulSlider">'+
		'</ul>'+
		'</div>'+
		'</div>'+
		'</div>'+
		'<div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">'+
		'<h3 style="color: #153CFF" id="title" name="title">'+data['Producto'][0]["Nombre"]+'</h3>'+
		'<p>'+
		'	<span id="price" name="price" class="item_price">$'+addCommas(data['Producto'][0]["Precio"])+'</span>'+
		'	<del id="discount" name="discount"></del>'+
		'</p>'+
		'<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">'+
		'	<h6>Descripción:</h6>'+
		'	<p id="description" name="description">'+data['Producto'][0]["Descripcion"]+'</p>'+	
		'</div> '+
		'</div>'+
		'<div class="clearfix"></div>';
		$('#modalBody').html(body);
		buildListProducto(idCategoria,idProducto,data);
		setTimeout(function(){
			$('.flexslider').flexslider({
				animation : "slide",
				controlNav : "thumbnails"
			});	
		}, 1000);	
	}

	function agregarProductoBtn() {
		if (validateRequiredFields('cmbCategoriaP,nombre,precio')) {
			var repetido="";
			cleanAlertDiv();
			setTimeout(function() {
				repetido=isRepetido();
				if(!repetido){
					$('#myModal').modal('hide');
					waitingDialog.show('Procesando Producto...');
					setTimeout(function() {
						if (isEmpty($("#IdProducto").val())){
							addProductoCompleto();							
						}
						else {
							actualizarProducto();
						}
					}, 1000);
				}else{
					modal('Mensaje','Este Producto, ya existe!!!');
				}	
			}, 1000);
		}
	}

	function addProductoCompleto() {
		data = agregarProducto();
		if (data["MSG"].indexOf('Error') == -1) {
			var idProducto = data["ID"];
			var idCategoria = $('#cmbCategoriaP').val();
			addImages(idCategoria, idProducto, "../images/" + $('#cmbCategoriaP').val() + "/" + idProducto);
			setTimeout(function() {
				updateImages(idCategoria,$('#IdProductoTemp').val(),idProducto);
			}, 2500);
			var actionDelete = "<a href='#' onclick=\"borrarProductoBtn(this,'" + idCategoria + "','"+ idProducto + "','" + $('#nombre').val() + "')\"><img  width='30' height='30' src='images/delete.png'></a>";
			var actionEdit = "<a href='#' onclick=\"editarProductoBtn(this,'" + idCategoria + "','" + idProducto + "')\"><img  width='30' height='30' src='images/edit.png'></a>";
			var actionSee = "<a href='#' onclick=\"verProductoBtn('" + idCategoria + "','" + idProducto + "')\"><img  width='30' height='30' src='images/see2.png'></a>";
			var idTr = getLastTrTable('tabla-categorias', 'id');
			idTr = parseInt(idTr) + 1;
			addRowTable(idTr,$('#nombre').val(), actionSee, actionEdit, actionDelete);
			modal('Mensaje', 'Producto creado exitosamente!!!');
			setTimeout(function() {
				$('#productoDetail').modal('hide');
			}, 2500);
		} else {
			modal('Mensaje',data["MSG"]);
		}
	}
	
	function updateImages(idCategoria,oldIdProducto,idProducto) {
		var producto = {
			oper : 'ActualizaImg',
			tableName: 'imagenProducto',
			updFields: 'IdProducto='+oldIdProducto,
			where    : 'IdProducto='+idProducto,
			operation : 'ActualizaImg',
			folderName: idCategoria+'/'+oldIdProducto,
			newFolderName: idCategoria+'/'+idProducto,
			path: '../images'
		};
		var myJSONText = JSON.stringify(producto);
		var data = execAjax(myJSONText, "POST", "json", "../classControllers/ProductController.php");
		if (data.length > 0) {
			
		}
	}
	function isRepetido(){
		var repetido=false;
		var producto = {
			oper : 'Repetido',
			tableName : 'productos',
			descripcion : ' Nombre=\'' +$('#nombre').val()+'\''
		};
		var myJSONText = JSON.stringify(producto);
		var data = execAjax(myJSONText, "POST", "json", "../classControllers/ProductController.php");
		if(data[0]['Cuenta']!= '0'){
			repetido=true;
		}
		return repetido;
	}
	
	function borrarProducto(idCategoria,idProducto) {
		var params = {
			oper : 'BorraProd',
			producto : {
				operation : 'delete',
				tableName : 'productos',
				where : 'IdProducto="' + idProducto + '"',
				tableNameImg: 'imagenproducto',
				whereImg : 'IdProducto="' + idProducto + '"',
				prodPath: '../images/' + idCategoria + '/' + idProducto + ''			
			}
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../classControllers/ProductController.php");
		return data;
	}

	

	

	function agregarProducto() {
		var producto = {
			oper : 'Nuevo',
			tableName : 'productos',
			paramNames : 'IdCategoria,IdSubCategoria,Nombre,Descripcion,Precio,OfertaSN,Porcentaje',
			idCategoria : $('#cmbCategoriaP').val(),
			descripcion : ' Nombre=\'' +$('#nombre').val()+'\'',
			values : '(\''+$('#cmbCategoriaP').val() +'\',0,'+ 
			// +  $('#cmbCategoriaSP').val()
		    '\'' + $('#nombre').val() + '\',\'' + $('#descripcion').val() + '\',\'' + $('#precio').val() + '\',\'' + checkedC('chk_oferta') + '\',\'' + $('#oferta').val()+'\')'
		};
		var myJSONText = JSON.stringify(producto);
		var data = execAjax(myJSONText, "POST", "json", "../classControllers/ProductController.php");
		if (data["MSG"].indexOf('Error') == -1) {
			//modal('Mensaje', 'Registro modificado exitosamente!!!');
		}
		return data;
	}
	
	function agregarImagen(idCategoria, idProducto, nombreImagen, counter) {
		var idImagen = "";
		var imagen = {
			oper : 'Imagen',
			tableName : 'imagenproducto',
			paramNames : 'IdProducto,Nombre,IdTienda,IdCategoria',
			values : '(\''+idProducto + '\',\'' + nombreImagen + '\',\'' + $('#idTienda').val() + '\',\'' + idCategoria+'\')'
		}
		var myJSONText = JSON.stringify(imagen);
		var data = execAjax(myJSONText, "POST", "json", "../classControllers/ProductController.php");
		if (!data["MSG"].indexOf("Error") != -1) {
			idImagen = data["ID"];
			$('tr[id="Img_' + counter + '"]').html('<td>' + nombreImagen + '</td>' + '<td><a href="#myModal2" role="button" class="btn" data-toggle="modal" onclick="verImagen(' + idCategoria + ',' + idProducto + ',\'' + nombreImagen + '\',' + counter + ')">Ver</a></td>' + '<td><a href="#" onclick="borrarImgProductoBtn(this,\'' + idCategoria + '\',\'' + idProducto + '\',\'' + idImagen + '\',\'' + nombreImagen + '\')"><img  width="30" height="30" src="images/delete.png"></a></td>');
			$('#TrId').val(counter);
		}
		return idImagen;
	}

	function actualizarProducto() {
		var producto = {
			oper : 'Actualiza',
			tableName : 'productos',
			updFields : 'Nombre="' + $('#nombre').val() + '",' + 'Descripcion="' + $('#descripcion').val() + '",' + 'Precio="' + $('#precio').val() + '",' + 'OfertaSN="' + checkedC('chk_oferta') + '",' + 'Porcentaje="' + $('#oferta').val() + '"',
			where : 'IdProducto=' + $('#IdProducto').val()
		};
		var myJSONText = JSON.stringify(producto);
		var data = execAjax(myJSONText, "POST", "json", "../classControllers/ProductController.php");
		if (data["MSG"].indexOf('Error') == -1) {
			modal('Mensaje', 'Registro modificado exitosamente!!!');
			$('#' + $('#TrId').val()).find("td").eq(0).html($('#nombre').val());
			setTimeout(function() {
				$('#productoDetail').modal('hide');
			}, 2500);
		}
		return data;
	}

	function addRowTable(trId,nombre, actionSee, actionEdit, actionDelete) {
		var tr = '';
		tr = '<tr id="'+trId+'" name="'+trId+'"><td>' + nombre + '</td><td>' + actionSee + '</td><td>' + actionEdit + '</td><td>' + actionDelete + '</td></tr>';
		$('#tabla-productos').append(tr);
	}

	function addImages(idCategoria, idProducto, imagesPath) {
		for (var i = 1; i < 5; i++) {
			if(!isEmpty($('#fileIn_' + i).val())){
				//loadImgProducto(idCategoria, idProducto, i, imagesPath);
				result=productosList["Imagen"][i-1];
				result["idProducto"]=idProducto;
			}
		}
	}

	function loadImgProductoBtn(idCategoria, idProducto, counter, imagesPath) {
		var imagen = "";
		waitingDialog.show('Agregando Imagen...');
		setTimeout(function() {
			imagen = loadImgProducto(idCategoria, idProducto, counter, imagesPath);
		}, 1000);
	}
	
	function loadImgProducto(idCategoria, idProducto, counter, imagesPath) {
		var result = '';
		var idImagen = '';
		var formdata = new FormData();
		var sampleFile = $('#fileIn_' + counter).prop("files")[0];
		var imageName=$('#fileIn_' + counter).prop("files")[0].name;
		var ext=imageName.substring(imageName.lastIndexOf('.')+1,imageName.length);
		var filename = 'Imagen_' + counter+'.'+ext;
		formdata.append("file", sampleFile);
		formdata.append("path", imagesPath);
		formdata.append("name", filename);
		$.ajax({
			data : formdata,
			type : "POST",
			enctype : "multipart/form-data",
			url : "../phpServices/uploadService.php",
			cache : false,
			processData : false,
			contentType : false,
			async : false,
			success : function(data) {
				idImagen = agregarImagen(idCategoria, idProducto, filename, counter);
				result = {
					"IdImagen" : idImagen,
					"IdProducto" : idProducto,
					"Nombre" : filename
				};
				if (productosList != null) {
					productosList["Imagen"][($('#TrId').val() - (1))] = result;
				}
				waitingDialog.hide();
			},
			error : function(jqXHR, exception, error) {
				//waitingDialog.hide();
				//alert("error:"+jqXHR.responseText);
				alert(error);
				waitingDialog.hide();
				result = '';
			}
		});
		return result;
	}
	
	function rotate(imagen, images){
		waitingDialog.show('Rotando Imagen...');
		setTimeout(function() {
			imgRotate(imagen, images);
		}, 1000);
	}
	
	function imgRotate(imagen, images) {
		var params = {
			operations : [{
				operation : 'rotar',
				image : images,
				degrees : 90
			}]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../phpControllers/imagesController.php");
		d = new Date();
		$('#' + imagen).attr('src', '../images/' + images + '?' + d.getTime());
	}
	
	function borrarProductoBtn(ref, idCategoria ,idProducto, nombre) {
		var trId = $(ref).closest('tr').attr('id');
		$('#confirmLabel').text('Esta seguro de eliminar el Producto [' + nombre + ']');
		$('#confirm').modal({ backdrop: 'static', keyboard: false })
        .one('click', '#OK', function (e) {
        	 $('#confirm').modal('hide');
          	waitingDialog.show('Borrando Producto...');
				setTimeout(function() {
					borrarProductoFnt(trId,idCategoria,idProducto)
			}, 1000);
        });
	}

	
	function borrarProductoFnt(trId,idCategoria, idProducto) {
		var data = borrarProducto(idCategoria,idProducto);
		if (data["MSG"].indexOf('Error') == -1) {
			modal('Mensaje', data["MSG"]);
			$('tr[id="' + trId + '"]').remove();
		}
	}
		
	function borrarImgProductoBtn(ref, idCategoria, idProducto, idImagen, nombre) {
		var trId = $(ref).closest('tr').attr('id');
		if (confirm('Esta seguro de eliminar la imagen [' + nombre + ']')) {
			waitingDialog.show('Borrando Imagen...');
			setTimeout(function() {
				borrarImgProducto(trId, idCategoria, idProducto, idImagen, nombre)
			}, 1000);
		}
	}

	function borrarImgProducto(trId, idCategoria, idProducto, idImagen, nombre) {
		var params = {
			oper : 'BorraImg',
			productoImg : {
				operation : 'delete',
				tableName : 'imagenproducto',
				where : 'IdImagen="' + idImagen + '"',
				imgProducto : "../images/" + idCategoria + "/" + idProducto + "/" + nombre
			}
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../classControllers/ProductController.php");
		if (data["ESTATUS"] == "0") {
			modal('Mensaje', 'Imagen eliminada exitosamente!!!');
			var id= trId.substring(trId.lastIndexOf('_')+1,trId.length);
			$('tr[id="' + trId + '"]').html('<tr id="' + trId + '"><td><span class="btn btn-primary" onclick="$(this).parent().find(\'input[type=file]\').click();">Seleccionar</span><input type="file" id="fileIn_' + id + '" name="fileIn_' + id + '"' + ' style="font-size: 8px;display:none" onchange="loadImgProductoBtn(' + idCategoria + ',' + idProducto + ',' + id + ',\'../images/' + idCategoria + '/' + idProducto + '\')"></td><td></td><td></td></tr>');
			productosList["Imagen"][(id-1)]='';
		}
		
		//var aux=productosList;
		//alert(aux);
	}
</script>