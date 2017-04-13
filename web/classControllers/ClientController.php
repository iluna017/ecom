<?php
require ("../phpServices/clientService.php");
require ("../phpServices/sessionService.php");

class ClientController {
	
	function initServices(){
		$this->cs= new clientService();
		$this->ss= new sessionService();
		$this->cs->initClientService();
	}
	
	function endServices(){
		$this->cs->endClientService();
	}
	
	function registra($usuario,$tablaCliente,$paramsCliente,$camposCliente,$tablaUsuario,$paramsUsuario,$camposUsuario,$tablaDirecciones,$paramsDireccion,$camposDireccion){
		$isRegister=$this->cs -> registraUsuarioCliente($usuario,$tablaCliente,$paramsCliente,$camposCliente,$tablaUsuario,$paramsUsuario,$camposUsuario,$tablaDirecciones,$paramsDireccion,$camposDireccion);
		if($isRegister['ESTATUS']==0){
			$_SESSION = $this-> ss -> getSession('\''.$isRegister["IDUSER"].'\'','\''.$isRegister["USER"].'\'');
			$isRegister['SESSION']["IDSESSION"]=$_SESSION['IDSESSION'];
			$isRegister['SESSION']["IDUSER"]=$_SESSION['IDUSER'];
			$isRegister['SESSION']["USER"]=$_SESSION['USER'];
		}
		return $isRegister;
	}
	
	function validarCliente($tableNameClient,$columnNames,$where){
		$isValid=$this->cs -> validaCliente($tableNameClient,$columnNames,$where);
		return $isValid;
	}
	
	function registraDireccionCliente($tableNameDireccion,$paramNamesDireccion,$valuesDireccion){
		$respuestaClient=$this->cs->registraDireccion($tableNameDireccion,$paramNamesDireccion,$valuesDireccion);
		return $respuestaClient;
	}
}

$json = $_POST['params'];
$data = json_decode($json,true);
$oper= $data['operation'];

if(isset($oper)){
	$client = new ClientController();
	$client -> initServices();
	switch($oper){
		case "registrarCliente":
		
			$idUsuario       = $data['idUsuario'];
			$tablaCliente    = $data['tableName'];
			$paramsCliente   = explode(",",$data['paramNames']);
			$camposCliente   = $data['values'];
			
			$tablaUsuario    = $data['tableNameUsuario'];
			$paramsUsuario   = explode(",",$data['paramNamesUsuario']);
			$camposUsuario   = $data['valuesUsuario'];
			
			$tablaDireccion  = $data['tableNameDireccion'];
			$paramsDireccion = explode(",",$data['paramNamesDireccion']); //$data['paramNamesDireccion'];
			$camposDireccion = $data['valuesDireccion'];
			
			$jsondata= $client -> registra($idUsuario,$tablaUsuario,$paramsUsuario,$camposUsuario,$tablaCliente,$paramsCliente,$camposCliente,$tablaDireccion,$paramsDireccion,$camposDireccion);
		break;
		
		case "validarCliente":
		
			$tableNameClient = $data['tableName'];
			$columnNames  = $data['columnNames'];
			$where        = $data['where'];
			$jsondata= $client -> validarCliente($tableNameClient,$columnNames,$where);
		break;
		
		case "agregarDireccion":
			$tableNameDireccion  = $data['tableNameDireccion'];
			$paramNamesDireccion = explode(",",$data['paramNamesDireccion']);
			$valuesDireccion     = $data['valuesDireccion'];
			$jsondata= $client -> registraDireccionCliente($tableNameDireccion,$paramNamesDireccion,$valuesDireccion);
		break;
	}
	
	header('Content-type: application/json; charset=utf-8');
	$client->endServices();
    echo json_encode($jsondata);
    exit();
}
?>