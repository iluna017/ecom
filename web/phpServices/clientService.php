<?php
require_once  ("dbService.php");
class clientService{
	
	public function __construct() {
		
	}
	
	public function initClientService(){
		 $this->db = new dbService();
		$this->db -> initDbService();
	}
	
	public function endClientService(){
		$this->db -> endDbService();
	}
	
	public function registraUsuario($tableNameUser,$paramNamesUser,$valuesUser){
		$respuestaUser=$this-> db ->insert($tableNameUser,$paramNamesUser,$valuesUser);
		return $respuestaUser;
	}
	
	public function registraCliente($tableNameClient,$paramNamesClient,$valuesClient){
		$respuestaClient=$this-> db ->insert($tableNameClient,$paramNamesClient,$valuesClient);
		return $respuestaClient;
	}
	public function registraDireccion($tableNameDireccion,$paramNamesDireccion,$valuesDireccion){
		$respuestaClient=$this-> db ->insert($tableNameDireccion,$paramNamesDireccion,$valuesDireccion);
		return $respuestaClient;
	}
	
	public function validaCliente($tableNameClient,$columnNames,$where){
		$jsondata    = $this -> db -> select($tableNameClient,$columnNames,$where);
		return $jsondata;
	}
	
	public function registraUsuarioCliente($usuario,$tableNameUser,$paramNamesUser,$valuesUser,$tableNameClient,$paramNamesClient,$valuesClient,$tableNameDireccion,$paramNamesDireccion,$valuesDireccion){
		$registraRespuesta="";
		$respuestaUser      = $this -> registraUsuario($tableNameUser,$paramNamesUser,$valuesUser);
		$valuesClient       = '('.$respuestaUser['ID'].','.$valuesClient.')';
		$respuestaClient    = $this -> registraCliente($tableNameClient,$paramNamesClient,$valuesClient);
		$valuesDireccion    = '('.$respuestaUser['ID'].','.$valuesDireccion.')';
		$respuestaDireccion = $this -> registraDireccion($tableNameDireccion,$paramNamesDireccion,$valuesDireccion);
		if($respuestaClient['ESTATUS']==0 && $respuestaUser['ESTATUS']==0 && $respuestaDireccion['ESTATUS'] ==0){
			$registraRespuesta['ESTATUS']       = 0;
			$registraRespuesta['MSG']           = "Cliente registrado exitosamente!!!";
			$registraRespuesta['IDUSER']      = $respuestaClient['ID'];
			$registraRespuesta['USER']        = $usuario;
			$registraRespuesta['IDDIRECCION']   = $respuestaDireccion['ID'];
		}else{
			$registraRespuesta['ESTATUS']=-1;
		}
		return $registraRespuesta;
	}
	
}
?>