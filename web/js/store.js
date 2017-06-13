ruta="";
function setRuta(miRuta){
	ruta=miRuta;
}
function getIdTienda() {
	var data = execAjax("", "POST", "text", ruta+"json/store.json");
	var json = $.parseJSON(data);
	var idTienda = json.Tienda.IdTienda;
	$('#idTienda').val(idTienda);
	return idTienda;
}

function loadTheme(idTienda) {
	var tema = getTheme(idTienda);
	less.modifyVars({
		'@theme' : '#' + tema[0]["FrontColor"],
		'@body' : '#' + tema[0]["BodyColor"]
	});
}

function getTheme(idTienda) {
	var tema = "";
	var params = {
		operations : [{
			operation : 'select',
			tableName : 'TiendaTema',
			columnNames : 'IdTienda,FrontColor,BodyColor',
			where : 'IdTienda=' + idTienda
		}]
	};
	var myJSONText = JSON.stringify(params);
	var data = execAjax(myJSONText, "POST", "json", ruta+"phpControllers/dbController.php");
	if (data.length > 0) {
		tema = data;
	}
	return tema;
}

function loadDatosTienda(idTienda) {
	var params = {
		operations : [{
			operation : 'select',
			tableName : 'Tienda',
			columnNames : 'IdTienda,Nombre,CP,Calle,Colonia,Delegacion,Entidad,Correo,Telefono,Celular,Descripcion',
			where : 'IdTienda=' + idTienda
		}]
	};
	var myJSONText = JSON.stringify(params);
	var data = execAjax(myJSONText, "POST", "json", ruta+"phpControllers/dbController.php");
	if (data.length > 0) {
		$('#direccion').html(data[0]["Calle"]);
		$('#colonia').html('<span>' + data[0]["Colonia"] + '</span>');
		$('#delMun').html('<span>' + data[0]["Delegacion"] + '</span>');
		$('#entidad').html('<span>' + data[0]["Entidad"] + '</span>');
		$('#telefono').html('<span>' + data[0]["Telefono"] + '</span>');
		$('#telefonoTienda').html('<span>' + data[0]["Telefono"] + '</span>');
		$('#celular').html('<span>' + data[0]["Celular"] + '</span>');
		$('#celularTienda').html('<span>' + data[0]["Celular"] + '</span>');
		$('#descripcion').html('<span>' + data[0]["Descripcion"] + '</span>');
		$('#correo').html('<span><a href="mailto:' + data[0]["Correo"] + '">' + data[0]["Correo"] + '</a></span>');
		$('#correoTienda').html('<a href="mailto:' + data[0]["Correo"] + '">' + data[0]["Correo"] + '</a>');
	}

}

function buildMenuList(idStore) {
	var menu = $('#menuList');
	var params = {
		operations : [{
			operation : 'select',
			tableName : 'Categorias',
			columnNames : 'IdCategoria,Nombre,Pagina',
			where : 'IdTienda=' + idStore
		}]
	};
	var li = "";
	var myJSONText = JSON.stringify(params);
	var data = execAjax(myJSONText, "POST", "json", ruta+"phpControllers/dbController.php");
	if (data.length > 0) {
		for (var i = 0; i < data.length; i++) {
			li = '<li class="menu__item">' + '<a class="menu__link" href="' + data[i]["Pagina"] + '">' + data[i]["Nombre"] + '</a></li>';
			$('#inicio').after(li);
		}
	}
}

function buildSocialStore(idStore) {
	var params = {
		operations : [{
			operation : 'select',
			tableName : 'TiendaSocial',
			columnNames : 'Facebook,Twitter,Youtube,Pinterest',
			where : 'IdTienda=' + idStore
		}]
	};
	var myJSONText = JSON.stringify(params);
	var data = execAjax(myJSONText, "POST", "json", ruta+"phpControllers/dbController.php");
	if (data.length > 0) {
		if (!isEmpty(data[0]["Facebook"])) {
			$('#UlSocial').append('<li><a class="btn btn-social-icon btn-facebook">' + '<span class="fa fa-facebook"></span>' + '</a></li>');
		}
		if (!isEmpty(data[0]["Twitter"])) {
			$('#UlSocial').append('<li><a class="btn btn-social-icon btn-twitter">' + '<span class="fa fa-twitter"></span>' + '</a></li>');
		}
		if (!isEmpty(data[0]["Youtube"])) {
			$('#UlSocial').append('<li><a class="btn btn-social-icon btn-google">' + '<span class="fa fa-google"></span>' + '</a></li>');
		}
		if (!isEmpty(data[0]["Pinterest"])) {
			$('#UlSocial').append('<li><a class="btn btn-social-icon btn-pinterest">' + '<span class="fa fa-pinterest"></span>' + '</a></li>');
		}
	}
}

function obtenSlidersStore(idStore) {
	var params = {
		operations : [{
			operation : 'select',
			tableName : 'SliderTienda',
			columnNames : 'IdTienda,IdSlider,Nombre',
			where : 'IdTienda=' + idStore
		}]
	};
	var myJSONText = JSON.stringify(params);
	var data = execAjax(myJSONText, "POST", "json", ruta+"phpControllers/dbController.php");
	if (data.length > 0) {
		for (var i = 0; i < data.length; i++) {
			$('#slidersTienda').append('<li><img src="images/Sliders/' + data[i]["Nombre"] + '" /></li>');
		}
	}
}

function obtenLogotipoStore(idStore) {
	var params = {
		operations : [{
			operation : 'select',
			tableName : 'logotienda',
			columnNames : 'IdTienda,IdLogo,Nombre',
			where : 'IdTienda=' + idStore
		}]
	};
	var myJSONText = JSON.stringify(params);
	var data = execAjax(myJSONText, "POST", "json", ruta+"phpControllers/dbController.php");
	if (data.length > 0) {
			$('#logoTienda').append('<img src="images/Logos/' + data[0]["Nombre"] + '" />');
		}
	}

function initGallery() {
	$('#horizontalTab').easyResponsiveTabs({
		type : 'default', //Types: default, vertical, accordion
		width : 'auto', //auto or any width like 600px
		fit : true // 100% fit in a container
	});
}

function getProductImages(idTienda) {
	var params = {
		oper : 'Principal',
		operations : [{
			operation : 'select',
			tableName : 'ImagenProducto img',
			columnNames : 'Distinct img.IdProducto,img.IdCategoria,img.Nombre',
			where : ' img.IdTienda=' + idTienda
		}]
	};
	var myJSONText = JSON.stringify(params);
	var data = execAjax(myJSONText, "POST", "json", ruta+"phpControllers/dbController.php");
	var array = [];
	var idProducto;
	for (var i = 0; i < data.length; i++) {
		idProducto = data[i]["IdProducto"];
		if (isEmpty(array[idProducto])) {
			array[idProducto] = data[i];
		}
	}
	return array;
}
function getProducts(idTienda,idCategoria) {
	var params = {
		oper : 'Productos',
		cat : idCategoria,
		producto : {
			operation : 'select',
			tableName : 'Productos p',
			columnNames : 'p.IdCategoria,p.IdProducto,p.Nombre,p.Precio,p.OfertaSN,p.Porcentaje',
			where : 'p.IdTienda=' + idTienda + ' AND p.IdCategoria='+idCategoria
		}
	};
	var myJSONText = JSON.stringify(params);
	var jsonS = execAjax(myJSONText, "POST", "json", ruta+"classControllers/ProductController.php");
	return jsonS;
}
function buildCategory(category) {
	var cat = $('#categories');
	var liCat = "";
	for (var i = 0; i < category.length; i++) {
		liCat = '<li class="resp-tab-item" aria-controls="tab_item-' + i + '" role="tab"><span><h3>' + category[i] + '</h3></span></li>';
		cat.append(liCat);
	}
}


function buildPrincipals(idTienda, jsonS,category, sticker,attrs,init,limit,pagination) {
	var attrs = ["Id", "Nombre", "Precio", "Descuento", "Imagen", "IdCategoria", "IdProducto"];
	buildProducts(idTienda, jsonS, category, sticker, attrs,init,limit,pagination);
}

function buildProductsBtn(init,limit,pagination){
	var idTienda=getIdTienda();
	var products=jsonS;
	var categorys=[$('#categorys').val()];
	var stickers=[$('#stickers').val()];
	var attrs = ["Id", "Nombre", "Precio", "Descuento", "Imagen", "IdCategoria", "IdProducto"];
	waitingDialog.show('Más Productos...');
	setTimeout(function(){buildProducts(idTienda, products, categorys, stickers, attrs,init,limit,pagination);},1000);
}

function buildProducts(idTienda, jsonS, categories, stickers, attrs,init,limit, pagination) {
	var categorieNum = '';
	var productNum = '';
	var imagesProd = getProductImages(idTienda);
	for (var i = 0; i < categories.length; i++) { 
		if(!pagination){
			init=0; limit= jsonS[categories[i]].length;
		}else{
			if(limit > jsonS[categories[i]].length){
				limit=jsonS[categories[i]].length;
			}
		}		
		for (var k = init; k < limit; k++) {
			sticker = stickers[i];
			categorieNum+='<div tabindex="-1" id="producto_'+k+'" name="producto_'+k+'" class="col-md-3 product-men">' + 
			'<div class="men-pro-item simpleCart_shelfItem" style="overflow:hidden;height:150px">' + 
			buildImage(imagesProd[jsonS[categories[i]][k][attrs[6]]]["IdCategoria"] + '/' + 
			imagesProd[jsonS[categories[i]][k][attrs[6]]]["IdProducto"] + '/' + 
			imagesProd[jsonS[categories[i]][k][attrs[6]]]["Nombre"], sticker) + '</div>' +
			 buildProd(jsonS[categories[i]][k][attrs[5]],jsonS[categories[i]][k][attrs[6]],jsonS[categories[i]][k][attrs[1]], jsonS[categories[i]][k][attrs[2]], jsonS[categories[i]][k][attrs[3]]) + '</div>';
			categorieNum += productNum;
		}
		categorieNum += '<div class="clearfix"></div>';
		$('#gallery').html(categorieNum);
	}
	categorieNum = '';
}

function buildProd(idCategoria,idProducto,name, price, discount) {
	var prod = '<div class="simpleCart_shelfItem">' + '<h4><span class="item_name">' + name + '</span></h4>' + '<div class="info-product-price"><a class="item_add" href="javascript:;"><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i></a>' + '<span class="item_price">' + price + '</span></p>';
	if (!isEmpty(discount)) {
		prod += '<del>' + discount + '</del>';
	}
	prod += '</div>' + '<a href="#" onclick="verProductoBtn('+idCategoria+','+idProducto+')" class="item_add single-item hvr-outline-out button2">Más Detalle</a>' + '</div>';
	return prod;
}

function buildImage(imgSrc, sticker) {
	var image = '<div class="men-thumb-item">' + '<img src="images/' + imgSrc + '" alt="" class="pro-image-front">' + '<img src="images/' + imgSrc + '" alt="" class="pro-image-back">' + '<div class="men-cart-pro">' + '<div class="inner-men-cart-pro">' + '<a href="single.html" class="link-product-add-cart">Vista rápida</a>' + '</div>' + '</div>' + '<span class="product-new-top">' + sticker + '</span>' + '</div>';
	return image;
}

function verProductoBtn(idCategoria, idProducto) {
		//waitingDialog.show('Cargando Producto...');
		//setTimeout(function() {
		var data=getProducto(idCategoria,idProducto);
		loadSingleProducto(idCategoria,idProducto,data);
		//}, 1000);
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
	'<span class="item_id">ID:'+data['Producto'][0]["IdProducto"]+'</span>'+
	'<h3 style="color: @theme" id="title" name="title">'+data['Producto'][0]["Nombre"]+'</h3>'+
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
	function buildListProducto(idCategoria,idProducto,data){
		var ul=$('#ulSlider');
		var li="";
		var height=$('#modal-fullscreen').height();
		height=250;
		//alert(data['Imagen'].length);
		for(var i=0;i<data['Imagen'].length;i++){
			li = $('<li id="'+(i+1)+'" name="'+(i+1)+'" class="liStyle" data-thumb=../../images/'+idCategoria+'/'+idProducto+'/'+data['Imagen'][i]['Nombre']+'"><div style="overflow-y:hidden;height:'+height+'px"><img style="width:100%;height:auto" src="../../images/'+idCategoria+'/'+idProducto+'/'+data['Imagen'][i]['Nombre']+'" /></div></li>');
			ul.append(li);
		}		
	}
	
	function getProducto(idCategoria, idProducto) {
		var params = {
			oper : 'Obten',
			producto : [
					{
						operation : 'select',
						tableName : 'Productos',
						columnNames : 'IdCategoria,IdProducto,Nombre,Descripcion,Precio,OfertaSN,Porcentaje',
						where : 'IdCategoria =' + idCategoria
								+ ' and IdProducto=' + idProducto
					}, {
						operation : 'select',
						tableName : 'ImagenProducto',
						columnNames : 'IdProducto,IdImagen,Nombre',
						where : 'IdProducto=' + idProducto
					} ]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json",
				ruta+"classControllers/ProductController.php");
		return data;
	}
	function activarOferta() {
		if (checkedC('chk_oferta') == 'S')
			enableDis('oferta', false);
		else
			enableDis('oferta', true);
	}
		function buildListProductoEdit(idCategoria, idProducto, data) {
		cleanTable('tabla-imagenes');
		var tabla = $('#tabla-imagenes');
		for (var i = 0; i < data['Imagen'].length; i++) {
			idImagen = data['Imagen'][i]["IdImagen"];
			nombre = data['Imagen'][i]["Nombre"];
			tabla.append('<tr id="Img_' + (i + 1) + '"><td>' + nombre + '</td>' + '<td><a href="#myModal2" role="button" class="btn" data-toggle="modal" onclick="verImagen(' + idCategoria + ',' + idProducto + ',\'' + nombre + '\',' + (i+1) + ')">Ver</a></td>' + '<td><a href="#" onclick="borrarImgProductoBtn(this,\'' + idCategoria + '\',\'' + idProducto + '\',\'' + idImagen + '\',\'' + nombre + '\')"><img  width="30" height="30" src="../images/delete.png"></a></td>' + '</tr>');
		}
		var imagesEmpty = 4;
		for (var j = (i + 1); j <= imagesEmpty; j++) {
			tr = $('<tr id="Img_' + (j) + '" name="Img_' + (j) + '"></tr>');
			fileInput = '<td><span class="btn btn-primary" onclick="$(this).parent().find(\'input[type=file]\').click();">Seleccionar</span><input type="file" id="fileIn_' + (j) + '" name="fileIn_' + (j) + '" onchange="loadImgProductoBtn(' + idCategoria + ',' + idProducto + ',' + (j) + ',\'../images/' + idCategoria + '/' + idProducto + '\')" style="font-size: 8px;display:none;"></td>';
			tr.append(fileInput);
			tabla.append(tr);
		}
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
		var data = execAjax(myJSONText, "POST", "json", ruta+"phpControllers/dbController.php");
		if (data.length > 0) {
			var colNames = ["IdCategoria", "Nombre"];
			fillCombo(cmbName, colNames, data)
		}
	}
function loadProducto() {
		$('#productoDetail').modal('show');
		loadCategoriasCmb('cmbCategoriaP');
	}
	function paginationPage(size,maxPagination){
		var liUl='';
		var paginator=$('#ulPaginator');
		var limit=size/maxPagination;
		var pagination= Math.round(limit);
		
		for(var i=0; i< pagination;i++){
			init=i * maxPagination;
			limit=(i+1) * maxPagination;
			liUl='<li class="page-item"><a class="page-link" href="#" onclick="buildProductsBtn('+init+','+limit+',true)">'+(i+1)+'</a></li>';
			paginator.append(liUl);		
		}
	}
	function initPills(pillName,tabName,disPills){
		$("#"+pillName).addClass("active");
		jQuery("#"+tabName).show().siblings().hide();
		var pills=disPills.split(',');
		for(var i=0; i< pills.length;i++){
			$('#'+pills[i]).removeClass("active");
		}
	}
	
	function switchPill(tabsName,tabName,tabNameTo,tabContentTo){
		$("#"+tabName).removeClass("active");
		$("#"+tabNameTo).addClass("active");
		var currentAttrValue = jQuery(tabsName+' a').attr('href');
		// Show/Hide Tabs
		jQuery('#'+tabContentTo).show().siblings().hide();
		
<<<<<<< HEAD
	}
=======
	}
>>>>>>> branch 'master' of https://github.com/iluna017/ecom
