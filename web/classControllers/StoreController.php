<?php
require("../phpServices/dbService.php");
require("../phpServices/utilService.php");
class StoreController{
	private $db;
	private $utils;

	public function __construct() {
    }
    
	function initServices(){
		$this->db= new dbService();
		$this->db -> initDbService();
		$this->utils =new utilService();
	}
	
	function creaTienda(){
		$tableName  =$producto['tableName'];
		$paramNames =explode(",",$producto['paramNames']);
		$values     =explode(",",$producto['values']);
		$msg        =$this->db->insert($tableName,$paramNames,$values);
		return $msg;//Identificador del producto
	}
	function existeTienda(){
		$tableName   = $producto['tableName'];
		$columnNames = $producto['columnNames'];
		$where       = $producto['where'];
		$jsondata    = $this->db->select($tableName,$columnNames,$where);
		return $jsondata;
	}
	
	function deleteSlider($slider){
		$tableName  = $slider['tableName'];
		$where      = $slider['where'];
		$sliderPath = $slider['sliderPath'];
		$respuesta  = $this->db->delete($tableName,$where);
		$isDeleted  = $this->utils->deleteDocument($sliderPath);
		$jsondata   = $respuesta;
		return $jsondata;
	}
}
$json = $_POST['params'];
	if(isset($json)){
		$store = new StoreController();
		$store->initServices();
		$storeJson = json_decode($json,true);
		$oper= $storeJson['oper'];
		switch($oper){
		case "borraSlider":
			$respuesta= $store->deleteSlider($storeJson['slider']);
			$jsondata=$respuesta;
			break;
		}
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($jsondata);
    	exit();
	}	
?>