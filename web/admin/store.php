<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Tienda</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include 'header.php';?>
</head>
<body>
	<input type="hidden" id="idTienda" name="idTienda" value="">
	<div class="panelHead">
		<div style="display: inline-block">
			<h4>Configuración Tienda</h4>
		</div>
		<div style="display: inline-block; float: right">
			<a href="menu.php"> <img src="images/return.png" width="40"
				height="40"></a>
		</div>
	</div>
	<br />
        
	<div class="container">
		<ul class="nav nav-pills">
			<li class="active"><a href="store.php"><h4>Tienda</h4></a></li>
			<li><a href="store/ofertas.php"><h4>Ofertas</h4></a></li>
			<li><a href="store/destacados.php"><h4>Destacados</h4></a></li>
			<li><a href="store/nuevos.php"><h4>Nuevos</h4></a></li>
			<li><a href="store/tema.php"><h4>Tema</h4></a></li>
			<li><a href="store/social.php"><h4>Social</h4></a></li>
		</ul>
		<br />
		<div class="col-xs-12">
			<div class="alert alert-success" style="display:none" id="successDiv">
  			<strong>Success!</strong> Indicates a successful or positive action.
		</div>
        <div class="alert alert-danger" style="display:none" id="alertDiv">
    		<strong>Precaución!</strong> Existen campos que son obligatorios!!!
  		</div>
		</div>
		<div class="col-xs-12">
			<span style="color:red">*</span>
			<label for="inputEmail3" id="nombreLabel" name="nombreLabel">Nombre</label>
			<input type="text" class="form-control" id="nombre" name="nombre"
				placeholder="Nombre" maxlength="150"
				onchange="validaInput('nombre')" />
		</div>
		<div class="col-xs-7">
			<span style="color:red">*</span>
			<label for="inputEmail3" id="cpLabel" name="cpLabel">C.P.</label> <input type="text"
				class="form-control" id="cp" name="cp" placeholder="C.P."
				maxlength="25">
		</div>

		<div class="col-xs-12">
			<span style="color:red">*</span>
			<label for="inputEmail3" id="calleLabel" name="calleLabel">Calle</label> <input type="text"
				class="form-control" id="calle" name="calle" placeholder="Calle"
				maxlength="120">
		</div>
		<div class="col-xs-12">
			<span style="color:red">*</span>
			<label for="inputEmail3" id="coloniaLabel" name="coloniaLabel">Colonia</label> <input type="text"
				class="form-control" id="colonia" name="colonia"
				placeholder="Colonia" maxlength="120">
		</div>
		<div class="col-xs-12">
			<span style="color:red">*</span>
			<label for="inputEmail3" id="delMunLabel" name="delMunLabel">Delegación/Municipio</label> <input
				type="text" class="form-control" id="delMun" name="delMun"
				placeholder="Delegación/Municipio" maxlength="120">
		</div>
		<div class="col-xs-12">
			<span style="color:red">*</span>
			<label for="inputEmail3" id="entidadLabel" name="entidadLabel">Entidad</label> <input type="text"
				class="form-control" id="entidad" name="entidad"
				placeholder="Entidad" maxlength="10">
		</div>
		<div class="col-xs-12">
			<span style="color:red">*</span>
			<label for="inputEmail3" id="correoLabel" name="correoLabel">Correo</label> <input type="text"
				class="form-control" id="correo" name="correo" placeholder="Correo"
				maxlength="25">
		</div>
		<div class="col-xs-12">
			<span style="color:red">*</span>
			<label for="inputEmail3" id="telefonoLabel" name="telefonoLabel">Teléfono</label> <input type="text"
				class="form-control" id="telefono" name="telefono"
				placeholder="Teléfono" maxlength="25">
		</div>
		<div class="col-xs-12">
			<label for="inputEmail3" id="celularLabel" name="celularLabel">Celular</label> <input type="text"
				class="form-control" id="celular" name="celular"
				placeholder="Celular" maxlength="25">
		</div>
		<div class="col-xs-12">
			<label for="inputEmail3" id="celularLabel" name="celularLabel">Descripción</label> 
			<textarea class="form-control" id="descripcion" name="descripcion"
				placeholder="Descripción" maxlength="250" cols="60" rows="3"></textarea>
		</div>
			<div class="col-xs-12">
			<label for="inputEmail3">Logotipo</label>
			 <table class="table table-bordered" id="tabla-logo" name="tabla-logo">
    		<tr><td><input type="file" id="logotipo" name="logotipo" onchange="logotipoBtn()" style="font-size: 12px;"></td></tr>
			</table>
		</div>
		<div class="col-xs-12">
			<label for="inputEmail3">Imágenes de Inicio</label> 
			<table class="table table-bordered" id="tabla-imagenes" name="tabla-imagenes">
    		<tr><td><input type="file" id="slideIn_1" name="slideIn_1" onchange="slideStoreBtn(1)" style="font-size: 12px;"></td></tr>
			<tr><td><input type="file" id="slideIn_2" name="slideIn_2" onchange="slideStoreBtn(2)" style="font-size: 12px;"></td></tr>
			<tr><td><input type="file" id="slideIn_3" name="slideIn_3" onchange="slideStoreBtn(3)" style="font-size: 12px;"></td></tr>
			<tr><td><input type="file" id="slideIn_4" name="slideIn_4" onchange="slideStoreBtn(4)" style="font-size: 12px;"></td></tr>
			</table>
		</div>
		<div class="col-xs-12">
			<div style="float: right">
				<button type="button" class="btn btn-success" data-dismiss="modal"
					onclick="datosTiendaBtn()">Agregar</button>
				<button type="button" onclick="" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>


</body>
</html>
<script type="text/javascript">

	$(document).ready(function() {
		setRuta('../');
		var idTienda = getIdTienda();
		loadDatosTienda(idTienda);
		obtenSlidersStore(idTienda);
		obtenLogoStore(idTienda);
	});

	function loadDatosTienda(idTienda) {
		var params = {
			operations : [ {
				operation : 'select',
				tableName : 'tienda',
				columnNames : 'IdTienda,Nombre,CP,Calle,Colonia,Delegacion,Entidad,Correo,Telefono,Celular,Descripcion',
				where : 'IdTienda=' + idTienda
			} ]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json",
				"../phpControllers/dbController.php");
		fillField("nombre", data[0]["Nombre"]);
		fillField("cp", data[0]["CP"]);
		fillField("calle", data[0]["Calle"]);
		fillField("colonia", data[0]["Colonia"]);
		fillField("delMun", data[0]["Delegacion"]);
		fillField("entidad", data[0]["Entidad"]);
		fillField("correo", data[0]["Correo"]);
		fillField("telefono", data[0]["Telefono"]);
		fillField("celular", data[0]["Celular"]);
		fillField("descripcion", data[0]["Descripcion"]);
	}

	function datosTiendaBtn(){
		if(validateRequiredFields('nombre,cp,calle,colonia,delMun,entidad,correo,telefono,descripcion')){
			cleanAlertDiv();
			waitingDialog.show('Modificando Tienda...');
			setTimeout(function() {
				actualizarDatosTienda()
			}, 1000);
		}
	}

	function datosTienda() {
		var params = {
			operations : [ {
				operation : 'insertar',
				tableName : 'tienda',
				paramNames : 'Nombre,CP,Calle,Colonia,Delegacion,Entidad,Correo,Telefono,Celular,Descripcion',
				values : $('#nombre').val() + ',' + $('#cp').val() + ','
						+ $('#calle').val() + ',' + $('#colonia').val() + ','
						+ $('#delMun').val() + ',' + $('#entidad').val() + ','
						+ $('#correo').val() + ',' + $('#telefono').val() + ','
						+ $('#celular').val() + ',' +$('#descripcion')
			} ]
		};
		var myJSONText = JSON.stringify(params);
		//alert(myJSONText);
		var data = execAjax(myJSONText, "POST", "json",
				"../phpControllers/dbController.php");
		if (data["MSG"].indexOf('Error') == -1) {
			modal("Mensaje","Registro realizado exitosamente!!!");
			var id = data["MSG"];
		} else {
			alert(data["MSG"]);
		}
	}
	function actualizarDatosTienda(){
		var params = {
			operations : [{
				operation : 'update',
				tableName : 'tienda',
				updFields: 'Nombre="'+$('#nombre').val()+'",'+
				'CP="'+$('#cp').val()+'",'+
				'Calle="'+$('#calle').val()+'",'+
				'Colonia="'+$('#colonia').val()+'",'+
				'Delegacion="'+$('#delMun').val()+'",'+
				'Entidad="'+$('#entidad').val()+'",'+
				'Correo="'+$('#correo').val()+'",'+
				'Telefono="'+$('#telefono').val()+'",'+
				'Celular="'+$('#celular').val()+'",'+
				'Descripcion="'+$('#descripcion').val()+'"',
				where:'IdTienda='+$('#idTienda').val()
			}]
		};
		var myJSONText = JSON.stringify(params);
		//alert(myJSONText);
		var data = execAjax(myJSONText, "POST", "json",
				"../phpControllers/dbController.php");
		if (data["MSG"].indexOf('Error') == -1) {
			modal("Mensaje","Operación realizada exitosamente!!!");
			var id = data["MSG"];
		} else {
			modal("Mensaje",data["MSG"]);
		}		
	}
	function agregarSlider(idStore,imagen,tipoImagen){
		var params = {  
				operations:[{
				operation : 'insertar',
				tableName : tipoImagen,
				paramNames : 'IdTienda,Nombre',
				values : '(\''+idStore + '\',\'' + imagen+'\')' }
				]};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json",
					"../phpControllers/dbController.php");
	 	return data;
	}
	
	function borrarSlider(ref,idSlider,nombre){
		var trId=$(ref).closest('tr').attr('id');
		if(confirm('Esta seguro de eliminar esta imagen ['+nombre+']')){
			waitingDialog.show('Borrando Slider...');
			setTimeout(function(){borrarSliderHtml(trId,idSlider,nombre)},1000);
		}
	}
	function borrarLogo(ref,idLogo,nombre){
		var trId=$(ref).closest('tr').attr('id');
		if(confirm('Esta seguro de eliminar esta imagen ['+nombre+']')){
			waitingDialog.show('Borrando Logo...');
			setTimeout(function(){borrarLogoHtml(trId,idLogo,nombre)},1000);
		}
	}
	
	function borrarLogoHtml(trId,idSlider,nombre){
		var data=borrarSliderDB(idSlider,nombre,'logotienda','IdLogo');
		if(data["MSG"].indexOf('Error')== -1){
			modal("Mensaje",data["MSG"]);
			fileInput='<td><input type="file" id="logotipo" name="logotipo" onchange="logoStoreBtn()" style="font-size: 12px;"></td>'
			$('tr[id="'+trId+'"]').html(fileInput);
		}
	}
	
	function borrarSliderHtml(trId,idSlider,nombre){
		var data=borrarSliderDB(idSlider,nombre,'slidertienda','IdSlider');
		if(data["MSG"].indexOf('Error')== -1){
			modal("Mensaje",data["MSG"]);
			fileInput='<td><input type="file" id="slideIn_'+trId+'" name="slideIn_'+trId+'" onchange="slideStoreBtn('+trId+')" style="font-size: 12px;"></td>'
			$('tr[id="'+trId+'"]').html(fileInput);
			if(slidersList.length!=0){
				slidersList[(trId-1)]="";
			}	
		}
	}
	function borrarSliderDB(idSlider,nombre,tabla,id){
		var params = {  
			oper : 'borraSlider',
			slider:{
			 operation : 'delete',
			 tableName : tabla,
			     where : id+'="'+idSlider+'"',
			sliderPath : '../images/Sliders/'+nombre
			}
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json","../classControllers/StoreController.php");
		return data;
	}
	var slidersList;
	var indexList;
	
	function nextImagen() {
		if (indexList == (slidersList.length-1)) {
			indexList = 0;
			if(slidersList[indexList]==""){
				if((indexList +1 ) != slidersList.length){indexList += 1;}				
			}
			verSlider(slidersList[indexList]["IdSlider"], slidersList[indexList]["Nombre"],0);
			indexList += 1;
		} else {
			indexList += 1;
			if(slidersList[indexList]==""){
				if((indexList +1 ) < slidersList.length){indexList += 1;}	
			}
			verSlider(slidersList[indexList]["IdSlider"], slidersList[indexList]["Nombre"],indexList+1);
			}
	}

	function beforeImagen() {
		if(indexList <= 0) {
			indexList = (slidersList.length)-1;
			if(slidersList[indexList]==""){
				if((indexList -1 ) != slidersList.length){indexList -= 1;}	
			}
			verSlider(slidersList[indexList]["IdSlider"], slidersList[indexList]["Nombre"], indexList+1);
		} else {
			indexList -= 1;
			if(slidersList[indexList]==""){
				if((indexList -1 ) != slidersList.length){indexList -= 1;}	
			}
			verSlider(slidersList[indexList]["IdSlider"],slidersList[indexList]["Nombre"], indexList+1);
		}
	}
	
	function verSlider(idSlider,nombreSlider,index){
		var d = new Date();
		var imagen='<img align="middle" id="imagen" name="imagen" width="260" height="260" src="../images/Sliders/'+nombreSlider+'?'+d.getTime()+'">';
		imagen += '<img class="left_img" src="../images/after-button.png" width="80" height="80" onclick="beforeImagen()"><img class="right_img" src="../images/next-button.png" onclick="nextImagen()" width="80" height="80">';
		imagen+='<img class="rotate" src="images/redo.png" width="100" height="100" onclick=\'rotate("imagen","Sliders/'+nombreSlider+'")\'>';
		indexList = index-1;
		modal('Imagen',imagen);
	}

	function verLogo(idLogo,nombreLogo,index){
		var d = new Date();
		var imagen='<img align="middle" id="imagen" name="imagen" width="260" height="260" src="../images/Logos/'+nombreLogo+'?'+d.getTime()+'">';
		imagen+='<img class="rotate" src="images/redo.png" width="100" height="100" onclick=\'rotate("imagen","Logos/'+nombreLogo+'")\'>';
		modal('Imagen',imagen);
	}
	
	function obtenLogoStore(idStore){
		var params = {  
				operations:[{
				operation : 'select',
				tableName : 'logotienda',
				columnNames : 'IdTienda,IdLogo,Nombre',
				where : 'IdTienda='+ idStore+' order by Nombre'}]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json","../phpControllers/dbController.php");
		var fileInput='';
		var actionSee='';
		var actionDelete='';
		if(data.length>0){
			cleanTable('tabla-logo');
			tabla=$('#tabla-logo');
			tr = $('<tr id="1" name="1"></tr>');
			nombre='<td>'+data[0]["Nombre"]+'</td>';
			actionDelete="<td><a href='#' onclick='borrarLogo(this,"+data[0]['IdLogo']+",\""+data[0]['Nombre']+"\")'><img  width='30' height='30' src='images/delete.png'></a></td>";
			actionSee = "<td><a href='#' onclick=\"verLogo("+data[0]['IdLogo']+",'"+data[0]['Nombre']+"',"+1+")\"><img  width='30' height='30' src='images/see2.png'></a></td>";
			tr.append(nombre+actionSee+actionDelete);
			tabla.append(tr);
		}
	}
	
	function obtenSlidersStore(idStore){
		var params = {  
				operations:[{
				operation : 'select',
				tableName : 'slidertienda',
				columnNames : 'IdTienda,IdSlider,Nombre',
				where : 'IdTienda='+ idStore+' order by Nombre'}]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json","../phpControllers/dbController.php");
		slidersList=data;
		var fileInput='';
		var actionSee='';
		var actionDelete='';
		if(data.length>0){
			cleanTable('tabla-imagenes');
			tabla=$('#tabla-imagenes');
			for(var i=0;i<data.length;i++){
				tr = $('<tr id="'+(i+1)+'" name="'+(i+1)+'"></tr>');
				nombre='<td>'+data[i]["Nombre"]+'</td>';
				actionDelete="<td><a href='#' onclick='borrarSlider(this,"+data[i]['IdSlider']+",\""+data[i]['Nombre']+"\")'><img  width='30' height='30' src='images/delete.png'></a></td>";
				actionSee = "<td><a href='#' onclick=\"verSlider("+data[i]['IdSlider']+",'"+data[i]['Nombre']+"',"+(i+1)+")\"><img  width='30' height='30' src='images/see2.png'></a></td>";
				//actionEdit = "<td><a href='#' onclick=\"editarSlider(this,'')\"><img  width='30' height='30' src='images/edit.png'></a></td>";
				//tr.append(nombre+actionSee+actionEdit+actionDelete);
				tr.append(nombre+actionSee+actionDelete);
				tabla.append(tr);
			}
			var slidersEmpty =data.length;
			for(var j=slidersEmpty;j<4;j++){
				tr = $('<tr id="'+(j+1)+'" name="'+(j+1)+'"></tr>');
				fileInput='<td><input type="file" id="slideIn_'+(j+1)+'" name="slideIn_'+(j+1)+'" onchange="slideStoreBtn('+(j+1)+')" style="font-size: 12px;"></td>';
				tr.append(fileInput);
				tabla.append(tr);
			}
		}
	}

	function logoStoreBtn(){
		waitingDialog.show('Agregando Logo...');
			setTimeout(function() {
				logoStore();
			}, 1000);
	}
	
	function slideStoreBtn(counter){
		waitingDialog.show('Agregando Slider...');
			setTimeout(function() {
				slidesStore(counter);
			}, 1000);
	}
	
	function logoStore() {
		var imagesPath="../images/Logos";
		var result = '';
		var formdata = new FormData();
		var sampleFile = $('#logo').prop("files")[0];
		var sliderName=$('#logo').prop("files")[0].name;
		var ext=sliderName.substring(sliderName.lastIndexOf('.')+1,sliderName.length);
		var filename = 'Logotipo'+'.'+ext;
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
				result=agregarSlider($('#idTienda').val(), filename,'logotienda');
				nombre='<td>'+filename+'</td>';
				if(result.length > 0){
					actionDelete="<td><a href='#' onclick='borrarLogo(this,"+result["ID"]+",\""+filename+"\")'><img  width='30' height='30' src='images/delete.png'></a></td>";
					actionSee = "<td><a href='#' onclick=\"verSlider("+result["ID"]+",'"+filename+"',"+(counter-1)+")\"><img  width='30' height='30' src='images/see2.png'></a></td>";
					$('tr[id="'+(counter)+'"]').html(nombre+actionSee+actionDelete);
				}
				waitingDialog.hide();
			},
			error : function(jqXHR, exception, error) {
				waitingDialog.hide();
				//alert("error:"+jqXHR.responseText);
				alert(error);
				result = '';
			}
		});
		return result;
	}
	
	
	function slidesStore(counter) {
		var imagesPath="../images/Sliders";
		var result = '';
		var formdata = new FormData();
		var sampleFile = $('#slideIn_' + counter).prop("files")[0];
		var sliderName=$('#slideIn_' + counter).prop("files")[0].name;
		var ext=sliderName.substring(sliderName.lastIndexOf('.')+1,sliderName.length);
		var filename = 'Slider_' + counter+'.'+ext;
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
				result=agregarSlider($('#idTienda').val(), filename,'slidertienda');
				if(slidersList.length!=0){
					slider={"IdSlider":result["ID"],"Nombre":filename,"IdTienda":$('#idTienda').val()};
					slidersList[counter-1]=slider;
					nombre='<td>'+filename+'</td>';
					actionDelete="<td><a href='#' onclick='borrarSlider(this,"+result["ID"]+",\""+filename+"\")'><img  width='30' height='30' src='images/delete.png'></a></td>";
					actionSee = "<td><a href='#' onclick=\"verSlider("+result["ID"]+",'"+filename+"',"+(counter-1)+")\"><img  width='30' height='30' src='images/see2.png'></a></td>";
					$('tr[id="'+(counter)+'"]').html(nombre+actionSee+actionDelete);
				}
				waitingDialog.hide();
			},
			error : function(jqXHR, exception, error) {
				waitingDialog.hide();
				//alert("error:"+jqXHR.responseText);
				alert(error);
				result = '';
			}
		});
		return result;
	}
	function rotate(imagen,images){
		waitingDialog.show('Rotando Slider...');
			setTimeout(function() {
				imgRotate(imagen,images);
			}, 1000);
	}
	
	function imgRotate(imagen,images){
	var params = {  
			operations:[
				{
			operation  : 'rotar',
			image:images,
			degrees:90}]
	};
	var myJSONText = JSON.stringify(params);
	var data = execAjax(myJSONText, "POST", "json","../phpControllers/imagesController.php");
	d = new Date();
	$('#'+imagen).attr('src','../images/'+images+'?'+d.getTime());
}
</script>