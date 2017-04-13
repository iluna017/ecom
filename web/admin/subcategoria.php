<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Subcategorías</title>
<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="css/custom.css"/>
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jsFunctions.js"></script>
	<script type="text/javascript" src="js/modal.js"></script>
</head>
<body>
<div class="panelHead"><div style="display:inline-block"><h4>Subcategorías</h4></div><div style="display:inline-block;float:right"><a href="menu.html"><img src="images/return.png" width="40" height="40"></a></div></div><br/>
<br/>

<form id="forma" name="forma" method="POST" action="phpControllers/dbController.php">
<input type="hidden" name="operation" id="operation">
<input type="hidden" name="paramNames" id="paramNames">
<input type="hidden" name="tableName" id="tableName">
<input type="hidden" name="values" id="values">
<input type="hidden" name="columnNames" id="columnNames">
<input type="hidden" name="where" id="where">

<div class="container">
<div id="" name="" class="col-xs-12">
<label>Categoría:</label>
<select class="form-control" id="cmbCategorias" name="cmbCategorias" onchange="loadSubcategoriasBtn()">
</select>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>

<a href="#" class="back-to-top" data-toggle="modal" data-target="#myModal" onclick="loadCategoriasCmbModal()"></a>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content bodyModal">
        <div class="panelHead">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nueva Subcategoría</h4>
        </div>
        <div class="modal-body">
		<label>Categoría:</label>
         <select class="form-control" id="cmbCategoriasModal" name="cmbCategoriasModal">
		</select> 
		<label>Subcategoría:</label> 
		 <input
								type="text" class="form-control" id="subcategoria"
								name="subcategoria"
								maxlength="10">
        </div>
        <div class="modal-footer">
		<button type="button" class="btn btn-success" data-dismiss="modal" onclick="agregarSubCategoriaBtn()">Agregar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
		<div class="backtable">
			<table class="table table-hover" id="tabla-subcategorias" name="tabla-subcategorias">
			<thead style="background-color:#153CFF">
								<tr style="color:#fff">
									<th width="75%">Nombre</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							</tbody>	
			</table>
		</div>
						
	
</div>  
</form>
</body>
</html>
<script type="text/javascript">

$(document).ready(function() {
	loadCategoriasCmb();	
});

function loadCategoriasCmbModal(){
	$('#cmbCategorias').find('option').clone().appendTo('#cmbCategoriasModal');
}

function loadCategoriasCmb(){
	var params = {
		operation  : 'select',
		tableName  : 'Categorias',
		columnNames: 'IdCategoria,Nombre',
		where      : ''
	};
	var data = execAjax(params, "POST", "json","phpControllers/dbController.php");
	if(data.length>0){
		var colNames=["IdCategoria","Nombre"];
		fillCombo('cmbCategorias',colNames,data)	
	}
}
function loadSubcategoriasBtn(){
	waitingDialog.show('Cargando Subcategorias...');
	setTimeout(function(){loadSubcategorias()},1000);	
}

function loadSubcategorias(){
	var params = {
		operation  : 'select',
		tableName  : 'Subcategorias',
		columnNames: 'IdCategoria,IdSubCategoria,Nombre',
		where      : 'IdCategoria='+$('#cmbCategorias').val()
	};
	var data = execAjax(params, "POST", "json","phpControllers/dbController.php");
	if(data.length>0){
		var actionDelete="ACTION_IdCategoria,IdSubCategoria,Nombre_<a href='#' onclick='borrarSubCategoriaBtn(this,IdCategoria,IdSubCategoria,Nombre)'><img  width='30' height='30' src='images/delete.png'></a>";
		var actionEdit="ACTION_IdCategoria,IdSubCategoria,Nombre_<a href='#' onclick='editarSubCategoria(IdCategoria,IdSubCategoria,Nombre)'><img  width='30' height='30' src='images/edit.png'></a>";
		var colNames=["Nombre",actionEdit,actionDelete];
		fillTable('tabla-subcategorias',colNames,data,'150px');	
	}else{	
		cleanTable('tabla-subcategorias');
	}
}

function agregarSubCategoriaBtn(){
	waitingDialog.show('Agregando Subcategoría...');
	setTimeout(function(){agregarSubCategoria()},1000);
}

function obtenCamposSubCategoria(){
	var idCategoria  = $('#cmbCategoriasModal').val();
	var subCategoria = $('#subcategoria').val();
	var activoSN  = 'S';
	var campos=  idCategoria+','+subCategoria+','+activoSN;
	return campos;
}
function agregarSubCategoria(){
	var params = {
		operation : 'insertar',
		tableName : 'Subcategorias',
		paramNames: 'IdCategoria,Nombre,ActivoSN',
		values    : obtenCamposSubCategoria()
	}
	
	var data = execAjax(params, "POST", "json","phpControllers/dbController.php");
	if(data["MSG"].indexOf('Error')== -1){
		alert("Registro realizado exitosamente!!!");
		var id=data["MSG"];
		var actionDelete="<a href='#' onclick='borrarSubCategoriaBtn(this,\""+id+"\",\""+$('#subcategoria').val()+"\")'><img  width='30' height='30' src='images/delete.png'></a>";
		var actionEdit="<a href='#' onclick='editarSubCategoria("+id+","+$('#subcategoria').val()+")'><img  width='30' height='30' src='images/edit.png'></a>";
		var idTr=getLastTrTable('tabla-subcategorias','id');
		idTr= parseInt(idTr)+1;
		addRowTable(idTr,$('#subcategoria').val(),actionEdit,actionDelete);
	}else{
		alert(data["MSG"]);
	}
}
function addRowTable(idTr,subcategoria,actionEdit,actionDelete){
	$('#tabla-categorias').append('<tr id=\"'+idTr+'\" name=\"'+idTr+'\"><td>'+subcategoria+'</td><td>'+actionEdit+'</td><td>'+actionDelete+'</td></tr>');
}
function borrarSubCategoriaBtn(ref,idCategoria,idSubCategoria,categoria){
	var trId=$(ref).closest('tr').attr('id');
	if(confirm('Esta seguro de eliminar la subcategoría ['+categoria+']')){
		waitingDialog.show('Borrando Categoría...');
		setTimeout(function(){callDeleteSubCategory(trId,idCategoria,idSubCategoria)},1000);
	}
}
function callDeleteSubCategory(trId,idCategoria,idSubCategoria){
	var data=borrarSubCategoria(idCategoria,idSubCategoria);
	if(data["MSG"].indexOf('Error')== -1){
		alert(data["MSG"]);
		$('tr[id="'+trId+'"]').remove();
	}
}
function borrarSubCategoria(idCategoria,idSubCategoria){
	var params = {
		operation : 'delete',
		tableName : 'Subcategorias',
		where    :  'IdCategoria='+idCategoria+' and IdSubcategoria='+idSubCategoria
	}
	var data = execAjax(params, "POST", "json","phpControllers/dbController.php");
	return data;
}
</script>