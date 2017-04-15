<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Ventas</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			include 'header.php';
		?>
	</head>
	<body>
		<div class="modal fade" id="confirm" role="dialog">
			<div class="modal-dialog">
				<div class="modal-contentNormal bodyModal">
					<div class="panelHead">
						<button type="button" class="close" data-dismiss="modal">
							&times;
						</button>
						<h4 class="modal-title">Mensaje</h4>
					</div>
					<div class="modal-body">
						<label for="inputEmail3" id="confirmLabel" name="confirmLabel"></label>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success"
						data-backdrop="static" id="OK">
							Aceptar
						</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">
							Cancelar
						</button>
					</div>
				</div>
			</div>
		</div>
		<form name="forma" id="forma">
			<input type="hidden" name="IdCliente" id="IdCliente">
			<input type="hidden" name="TrId" id="TrId">
			<div class="panelHead">
				<div style="display:inline-block">
					<h4>Ventas</h4>
				</div>
				<div style="display:inline-block;float:right">
					<a href="menu.php"><img src="images/return.png" width="40" height="40"></a>
				</div>
			</div>
			<br/>
			<br/>
			<div class="rowDiv col-xs-5">
				<label id="nombreLabel" name="nombreLabel">Fecha Inicio:</label>
							<input
							type="text" class="form-control" id="nombre"
							name="nombre" placeholder="Inicio"
							maxlength="80">
				<label id="nombreLabel" name="nombreLabel">Fecha Inicio:</label>
							<input
							type="text" class="form-control" id="nombre"
							name="nombre" placeholder="Fin"
							maxlength="80">
				
			</div>
			<br/>
			<a href="#" class="back-to-top" onclick="nuevoCliente()"></a>

			<div class="backtable center">
				<table class="table table-hover" id="tabla-clientes"
				name="tabla-clientes">
					<thead style="background-color:#153CFF">
						<tr style="color:#fff">
							<th>ID</th>
							<th>Cliente</th>
							<th>Fecha</th>
							<th>Ver</th>
							<th>Estatus</th>						
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog modal-sm">
					<div class="modal-content bodyModal">
						<div class="panelHead">
							<button type="button" class="close" data-dismiss="modal">
								&times;
							</button>
							<h4 class="modal-title">Nuevo Cliente</h4>
						</div>
						<div class="modal-body">
							<div class="alert alert-danger" style="display: none" id="alertDiv">
								<strong>Precaución!</strong> Existen campos que son
								obligatorios!!!
							</div>
							<label id="nombreLabel" name="nombreLabel">Nombre:</label>
							<input
							type="text" class="form-control" id="nombre"
							name="nombre" placeholder="Nombre"
							maxlength="80">
							<label id="paternoLabel" name="paternoLabel">Paterno:</label>
							<input
							type="text" class="form-control" id="paterno"
							name="paterno" placeholder="Paterno"
							maxlength="120">
							<label>Materno:</label>
							<input
							type="text" class="form-control" id="materno"
							name="materno" placeholder="Materno"
							maxlength="120">
							<label>Teléfono:</label>
							<input
							type="text" class="form-control" id="telefono"
							name="telefono" placeholder="Teléfono"
							maxlength="15" onkeypress="return numbersonly(event)">
							<div class="rowDiv col-xs-12">
								<label for="inputEmail3">
									<input id="whatsapp" name="whatsapp" type="checkbox">
									Whatsapp</label>
							</div>
							<label id="correoLabel" name="correoLabel">Correo:</label>
							<input
							type="text" class="form-control" id="correo"
							name="correo" placeholder="Correo"
							maxlength="80">
							<label>C.P:</label>
							<input
							type="text" class="form-control" id="cp"
							name="cp" placeholder="C.P"
							maxlength="5" onkeypress="return numbersonly(event)">
							<label>Colonia:</label>
							<input
							type="text" class="form-control" id="colonia"
							name="colonia" placeholder="Colonia"
							maxlength="120">
							<label>Entidad:</label>
							<input
							type="text" class="form-control" id="entidad"
							name="entidad" placeholder="Entidad"
							maxlength="100">
							<label>Calle:</label>
							<input
							type="text" class="form-control" id="calle"
							name="calle" placeholder="Calle"
							maxlength="150">

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-backdrop="static" onclick="agregarClienteBtn()">
								Agregar
							</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">
								Cancelar
							</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>

<script type="text/javascript">
	$(document).ready(function() {
		$(window).keydown(function(event) {
			if (event.keyCode == 13) {
				event.preventDefault();
				return false;
			}
		});
		loadClientes();
	});

	function loadClientes() {
		var params = {
			operations : [{
				operation : 'select',
				tableName : 'clientes',
				columnNames : 'IdCliente,Nombre,Paterno,Materno,Telefono',
				where : ''
			}]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../phpControllers/dbController.php");
		if (data.length > 0) {
			var actionDelete = "ACTION_IdCliente,Nombre_<a href='#' onclick='borrarClienteBtn(this,IdCliente,Nombre)'><img  width='30' height='30' src='images/delete.png'></a>";
			var actionEdit = "ACTION_IdCliente,Nombre_<a href='#' onclick='editarClienteBtn(this,IdCliente,Nombre)'><img  width='30' height='30' src='images/edit.png'></a>";
			var colNames = ["Nombre", "Paterno", "Telefono", actionEdit, actionDelete];
			fillTable('tabla-clientes', colNames, data, '150px');
		}
	}

	function obtenCamposCliente() {
		var nombre = '\'' + $('#nombre').val() + '\'';
		var apPaterno = '\'' + $('#paterno').val() + '\'';
		var apMaterno = '\'' + defaultValue($('#materno').val(), '') + '\'';
		var telefono = '\'' + defaultValue($('#telefono').val(), '') + '\'';
		var whatsapp = '\'' + checkedC('whatsapp') + '\'';
		var correo = '\'' + $('#correo').val() + '\'';
		var cp = '\'' + defaultValue($('#cp').val(), '') + '\'';
		var colonia = '\'' + defaultValue($('#colonia').val(), '') + '\'';
		var entidad = '\'' + defaultValue($('#entidad').val(), '') + '\'';
		var calle = '\'' + defaultValue($('#calle').val(), '') + '\'';
		//var numero = '\''+defaultValue($('#numero').val(), '')+'\'';
		var campos = '(' + nombre + ',' + apPaterno + ',' + apMaterno + ',' + telefono + ',' + whatsapp + ',' + correo + ',' + cp + ',' + colonia + ',' + entidad + ',' + calle + ')';
		return campos;
	}

	function nuevoCliente() {
		$('#IdCliente').val('');
		$('#TrId').val('');
		clean('nombre,paterno,materno,telefono,CHK_whatsapp,correo,cp,colonia,entidad,calle');
		$('#myModal').modal('show');
	}

	function agregarClienteBtn() {
		if (validateRequiredFields('nombre,paterno,correo')) {
			cleanAlertDiv();
			$('#myModal').modal('hide');
			if (isEmpty($('#IdCliente').val())) {
				waitingDialog.show('Agregando Cliente...');
				setTimeout(function() {
					agregarCliente();
				}, 1000);
			} else {
				waitingDialog.show('Modificando Cliente...');
				setTimeout(function() {
					actualizarCliente();
				}, 1000);
			}
		}
	}

	function agregarCliente() {
		var params = {
			operations : [{
				operation : 'insertar',
				tableName : 'clientes',
				paramNames : 'Nombre,Paterno,Materno,Telefono,Whatsapp,Correo,CP,Colonia,Entidad,Calle',
				values : obtenCamposCliente()
			}]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../phpControllers/dbController.php");
		if (data["ESTATUS"] == '0') {
			modal('Mensaje', data["MSG"]);
			var actionDelete = "<a href='#' onclick='borrarClienteBtn(this,\"" + data["ID"] + "\",\"" + $('#nombre').val() + "\")'><img  width='30' height='30' src='images/delete.png'></a>";
			var actionEdit = "<a href='#' onclick='editarClienteBtn(this,\"" + data["ID"] + "\",\"" + $('#nombre').val() + "\")'><img  width='30' height='30' src='images/edit.png'></a>";
			addRowTable($('#nombre').val(), $('#paterno').val(), $('#telefono').val(), actionEdit, actionDelete);
		} else {
			modal('Mensaje', data["MSG"]);
		}
	}

	function actualizarCliente() {
		var params = {
			operations : [{
				operation : 'update',
				tableName : 'clientes',
				updFields : 'Nombre=\'' + $('#nombre').val() + '\',Paterno=\'' + $('#paterno').val() + '\',Materno=\'' + defaultValue($('#materno').val(), '') + '\',' + 'Telefono=\'' + defaultValue($('#telefono').val(), '') + '\',Whatsapp=\'' + checkedC('whatsapp') + '\',' + 'Correo=\'' + $('#correo').val() + '\',' + 'CP=\'' + defaultValue($('#cp').val(), '') + '\',' + 'Colonia=\'' + defaultValue($('#colonia').val(), '') + '\',' + 'Entidad=\'' + defaultValue($('#entidad').val(), '') + '\',' + 'Calle=\'' + defaultValue($('#calle').val(), '') + '\'',
				where : 'IdCliente=' + $('#IdCliente').val()
			}]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../phpControllers/dbController.php");
		if (data["ESTATUS"] == '0') {
			modal('Mensaje', data["MSG"]);
			$('#' + $('#TrId').val()).find("td").eq(0).html($('#nombre').val());
			$('#' + $('#TrId').val()).find("td").eq(1).html($('#paterno').val());
			$('#' + $('#TrId').val()).find("td").eq(2).html($('#telefono').val());
		} else {
			modal('Mensaje', data["MSG"]);
		}
	}

	function obtenCliente(idCliente) {
		var params = {
			operations : [{
				operation : 'select',
				tableName : 'clientes',
				columnNames : 'Nombre,Paterno,Materno,Telefono,Whatsapp,Correo,CP,Colonia,Entidad,Calle',
				where : 'IdCliente=' + idCliente
			}]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../phpControllers/dbController.php");
		if (data.length > 0) {
			$('#nombre').val(data[0]["Nombre"]);
			$('#paterno').val(data[0]["Paterno"]);
			$('#materno').val(data[0]["Materno"]);
			$('#telefono').val(data[0]["Telefono"]);
			chkField('whatsapp', data[0]["Whatsapp"]);
			$('#correo').val(data[0]["Correo"]);
			$('#cp').val(data[0]["CP"]);
			$('#colonia').val(data[0]["Colonia"]);
			$('#entidad').val(data[0]["Entidad"]);
			$('#calle').val(data[0]["Calle"]);
		}
	}

	function editarClienteBtn(ref, idCliente, Nombre) {
		$('#myModal').modal('show');
		$('#IdCliente').val(idCliente);
		$('#TrId').val($(ref).closest('tr').attr('id'));
		obtenCliente(idCliente);
	}

	function borrarClienteBtn(ref, idCliente, Nombre) {
		var trId = $(ref).closest('tr').attr('id');
		$('#confirmLabel').text('Esta seguro de eliminar al Cliente [' + Nombre + ']');
		$('#confirm').modal({ backdrop: 'static', keyboard: false })
        .one('click', '#OK', function (e) {
        	 $('#confirm').modal('hide');
          	waitingDialog.show('Borrando Producto...');
				setTimeout(function() {
					eliminaCliente(trId,idCliente)
			}, 1000);
        });
	}

	function eliminaCliente(trId, idCliente) {
		var data = borrarCliente(idCliente);
		if (data["ESTATUS"] == 0) {
			modal('Mensaje', data["MSG"]);
			$('tr[id="' + trId + '"]').remove();
		}
	}

	function borrarCliente(idCliente) {
		var params = {
			oper : "Borra",
			operations : [{
				operation : 'delete',
				tableName : 'clientes',
				where : 'IdCliente="' + idCliente + '"'
			}]
		};
		var myJSONText = JSON.stringify(params);
		var data = execAjax(myJSONText, "POST", "json", "../phpControllers/dbController.php");
		return data;
	}

	function addRowTable(nombre, paterno, telefono, actionEdit, actionDelete) {
		var idTr = getLastTrTable('tabla-clientes', 'id');
		idTr = parseInt(idTr) + 1;
		$('#tabla-clientes').append('<tr id="' + idTr + '" name="' + idTr + '"><td>' + nombre + '</td><td>' + paterno + '</td><td>' + telefono + '</td>' + '<td>' + actionEdit + '</td><td>' + actionDelete + '</td></tr>');
	}
</script>