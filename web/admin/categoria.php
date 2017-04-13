<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Categorías</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include 'header.php';?>
</head>
<body>
		<div class="modal fade" id="confirm" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content bodyModal">
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
	<div class="panelHead">
		<div style="display: inline-block">
			<h4>Categorías</h4>
		</div>
		<div style="display: inline-block; float: right">
			<a href="menu.php"> <img src="images/return.png" width="40"
				height="40"></a>
		</div>
	</div>
	<br />
	
	<form id="forma" name="forma" method="POST"
		action="categoria.php">
		<input type="hidden" name="IdCategoria" id="IdCategoria">
		<input type="hidden" name="TrId" id="TrId">
		<div class="container">
			<a href="#" class="back-to-top" onclick="nuevaCategoria()"></a>
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content bodyModal">
						<div class="panelHead">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Categorías</h4>
						</div>
						<div class="modal-body">
							<div class="alert alert-success" style="display: none"
								id="successDiv">
								<strong>Success!</strong> Indicates a successful or positive
								action.
							</div>
							<div class="alert alert-danger" style="display: none"
								id="alertDiv">
								<strong>Precaución!</strong> Existen campos que son
								obligatorios!!!
							</div>
							<span style="color: red">*</span><label for="inputEmail3"
								id="categoriaLabel" name="categoriaLabel">Categoría</label> <input
								type="text" class="form-control" id="categoria" name="categoria"
								placeholder="Categoría" maxlength="60">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success"
								data-backdrop="static" onclick="agregarCategoriaBtn()">Agregar</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
			<div class="backtable center">
				<table class="table table-hover" id="tabla-categorias"
					name="tabla-categorias">
					<thead style="background-color: #153CFF">
						<tr style="color: #fff">
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
	$(document).ready(function(){
		 $(window).keydown(function(event){
    		if(event.keyCode == 13) {
      			event.preventDefault();
      			return false;
    		}
  		});
		loadCategorias();
	});
	function nuevaCategoria(){
		$('#TrId').val('');
		$('#IdCategoria').val('');
		$('#categoria').val('');
		$('#myModal').modal('show');
	}
	function loadCategorias() {
		var params = {
			oper:"Obten",
			operations : [ {
				operation : 'select',
				tableName : 'categorias',
				columnNames : 'IdCategoria,Nombre',
				where : ''
			} ]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json",
				"../classControllers/CategoriesController.php");
		if (data.length > 0) {
			var actionDelete = "ACTION_IdCategoria,Nombre_<a href='#' onclick='borrarCategoriaBtn(this,IdCategoria,Nombre)'><img  width='30' height='30' src='images/delete.png'></a>";
			var actionEdit = "ACTION_IdCategoria,Nombre_<a href='#' onclick='editarCategoria(this,IdCategoria,Nombre)'><img  width='30' height='30' src='images/edit.png'></a>";
			var colNames = [ "Nombre", actionEdit, actionDelete ];
			fillTable('tabla-categorias', colNames, data, '150px');

		}
	}
	
	function agregarCategoriaBtn() {
		if (validateRequiredFields('categoria')) {
			cleanAlertDiv();
			var repetida;
			setTimeout(function() {
				repetida=isRepetida();
				if(!repetida){
					$('#myModal').modal('hide');
					waitingDialog.show('Categoría...');
					setTimeout(function() {
						if(isEmpty($('#IdCategoria').val())){
							agregarCategoria();
						}else{
							actualizarCategoria();		
						}				
					}, 1000);
				}else{
					modal('Mensaje','Esta Categoría, ya existe!!!');
				}	
			}, 1000);
		}
	}
	
	function isRepetida(){
		var repetida=false;
		var categoria = {
			oper : 'Repetido',
			operations : [ {
				operation: 'Repetido',
				tableName : 'categorias',
				descripcion : ' Nombre=\'' +$('#categoria').val()+'\''
				}]
		};	
		var myJSONText = JSON.stringify(categoria);
		var data = execAjax(myJSONText, "POST", "json", "../classControllers/CategoriesController.php");
		if(data[0]['Cuenta']!= '0'){
			repetida=true;
		}
		return repetida;
	}
	
	function agregarCategoria() {
		var params = {
			oper:"Nuevo",
			operations : [ {
				operation : 'insertar',
				tableName : 'categorias',
				paramNames : 'Nombre,Pagina,ActivoSN',
				values : '(\''+$('#categoria').val() + '\',\''+replaceChars($('#categoria').val())+'.html'+'\',\'S\')',
				nombre : $('#categoria').val(),
				plantilla:'../plantilla.html',
				pagina   :'../'+replaceChars($('#categoria').val())+'.html',
				catPath : '../images/'
			} ]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json",
				"../classControllers/CategoriesController.php");
		if (data["ESTATUS"] == 0) {
			modal('Mensaje', 'Registro realizado exitosamente!!!');
			setTimeout(function() {
				$('#myModal').modal('hide');
			}, 2500);
			var id = data["ID"];
			var actionDelete = "<a href='#' onclick='borrarCategoriaBtn(this,\""
					+ id
					+ "\",\""
					+ $('#categoria').val()
					+ "\")'><img  width='30' height='30' src='images/delete.png'></a>";
			var actionEdit = "<a href='#' onclick=\"editarCategoria(this,"
					+ "'"+id+ "'"
					+ ",'"
					+ $('#categoria').val()
					+ "')\"><img  width='30' height='30' src='images/edit.png'></a>";
			var idTr = getLastTrTable('tabla-categorias', 'id');
			idTr = parseInt(idTr) + 1;
			addRowTable(idTr, $('#categoria').val(), actionEdit, actionDelete);
		} else {
			modal('Mensaje', data["MSG"]);
		}
	}
	
	function actualizarCategoria(){
		//alert($('#'+$('#TrId').val()).find("td").eq(0).html());
		var params = {
			oper: "Actualiza",
			operations : [ {
				operation : 'update',
				tableName : 'categorias',
				updFields : 'Nombre="'+$('#categoria').val()+ '",Pagina="'+replaceChars($('#categoria').val())+'.html'+'",ActivoSN="S"',
				where : 'IdCategoria='+$('#IdCategoria').val(),
				plantilla: '../'+replaceChars($('#'+$('#TrId').val()).find("td").eq(0).html())+'.html',
				pagina   :'../'+replaceChars($('#categoria').val())+'.html'
			} ]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../classControllers/CategoriesController.php");
		if(data["ESTATUS"] == 0) {
			modal('Mensaje', 'Registro modificado exitosamente!!!');
			setTimeout(function() {$('#myModal').modal('hide');}, 2500);
			var id = data["ID"];
				var actionEdit = "<a href='#' onclick=\"editarCategoria(this,"
					+ "'"+id+ "'"
					+ ",'"
					+ $('#categoria').val()
					+ "')\"><img  width='30' height='30' src='images/edit.png'></a>";
			var actionDelete = "<a href='#' onclick='borrarCategoriaBtn(this,\""
					+ id
					+ "\",\""
					+ $('#categoria').val()
					+ "\")'><img  width='30' height='30' src='images/delete.png'></a>";
			$('#'+$('#TrId').val()).find("td").eq(0).html($('#categoria').val());
			$('#'+$('#TrId').val()).find("td").eq(1).html(actionEdit);
			$('#'+$('#TrId').val()).find("td").eq(2).html(actionDelete);
		} else {
			modal('Mensaje', data["MSG"]);
		}
	}

	function addRowTable(idTr, categoria, actionEdit, actionDelete) {
		$('#tabla-categorias').append(
				'<tr id='+idTr+' name='+idTr+'><td>' + categoria + '</td><td>'
						+ actionEdit + '</td><td>' + actionDelete
						+ '</td></tr>')
	}

	function borrarCategoriaBtn(ref, idCategoria, categoria) {
		var trId = $(ref).closest('tr').attr('id');
		//if (confirm('Esta seguro de eliminar la categoría [' + categoria + ']')) {
		$('#confirmLabel').text('Esta seguro de eliminar la categoría [' + categoria + ']');
		 $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .one('click', '#OK', function (e) {
        	 $('#confirm').modal('hide');
          waitingDialog.show('Borrando Categoría...');
			setTimeout(function() {
				eliminaCategoria(trId, idCategoria,categoria)
			}, 1000);
        });
			
		//}
	}

	function eliminaCategoria(trId, idCategoria,categoria) {
		var valida=validaCategoria(idCategoria);
		var cuenta=valida[0]["Cuenta"];
		if(cuenta=='0'){
			var data = borrarCategoria(idCategoria,categoria);
			if (data["ESTATUS"] == 0) {
				modal('Mensaje',data["MSG"]);
				$('tr[id="' + trId + '"]').remove();
			}
		}else{
			modal('Mensaje','No se puede eliminar, hay Productos asociados!!!');
		}
	}
	
	function validaCategoria(idCategoria) {
		var params = {
			oper: "Contiene",
			operations : [ {
				operation : 'Select',
				tableName : 'productos',
				where : 'IdCategoria="' + idCategoria + '"'
			} ]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json",
				"../classControllers/CategoriesController.php");
		return data;
	}
	
	function borrarCategoria(idCategoria,categoria) {
		var params = {
			oper: "Borra",
			operations : [ {
				operation : 'delete',
				tableName : 'categorias',
				where : 'IdCategoria="' + idCategoria + '"',
				pagina:'../'+replaceChars(categoria)+'.html',
				folderPath:'../images/'+idCategoria
			} ]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json",
				"../classControllers/CategoriesController.php");
		return data;
	}

	function editarCategoria(ref, idCategoria, Nombre) {
		$('#myModal').modal('show');
		$('#categoria').val(Nombre);
		$('#IdCategoria').val(idCategoria);
		$('#TrId').val($(ref).closest('tr').attr('id'));
	}
</script>