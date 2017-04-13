<?php
require_once  ("dbService.php");
class sessionService{
	
	
	public function __construct() {
		 $this->db = new dbService();
		 $this->db -> initDbService();
	}
	
	public function login($loginDatos,$usuario,$password){
		$isLogged["ISLOGGED"]="false";
		$tableName = $loginDatos['tableName'];
		$columnNames = $loginDatos['columnNames'];
		$where = $loginDatos['where'];
		$jsondata   = $this->db->select($tableName,$columnNames,$where);
		$valores=count($jsondata);
		if($valores>0){
			if($jsondata[0][1]==$usuario && $jsondata[0][2]==$password){
				$isLogged=$jsondata;
				$isLogged["ISLOGGED"]="true";
			}
		}
		return $isLogged;
	}
	
	public function getSession($idUsuario,$usuario){
		session_start();
		$_SESSION['IDSESSION'] = session_id();
		$_SESSION["IDUSER"]    = $idUsuario;
		$_SESSION["USER"]      = $usuario;
		return $_SESSION;
	}
	
	public function setVarSession($varName,$varValue){
		$setted=false;
		//if(!(session_status() == PHP_SESSION_NONE)){
		if(session_id() == ''){
			session_start();
			$_SESSION[$varName]=$varValue;
			$setted=true;
		}
		return $_SESSION['IDSESSION'];
	}
	
	public function getVarSession($varName){
		$varValue="";
		//if(!(session_status() == PHP_SESSION_NONE)){
		session_start();
		if(session_id() != ''){		
			$varValue=$this->getKey($_SESSION,$varName);
		}
		return  $varValue;
	}
	function getKey($arr, $key) {
		if (array_key_exists($key, $arr)) {
			return $arr[$key];
		} else {
			return "";
		}
}	
}
?>