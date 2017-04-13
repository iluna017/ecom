<?php
require ("../phpServices/dbService.php");
require ("../phpServices/utilService.php");
class CategoriesController {
	private $db;
	private $utils;
	public function __construct() {
	}

	function initServices() {
		$this -> db = new dbService();
		$this -> db -> initDbService();
		$this -> utils = new utilService();
	}
	
	function contieneProds($categoria){
		$tableName=$categoria['tableName'];
		$columnNames ='count(*) as Cuenta';
		$where = $categoria['where'];
		$jsondata   =$this->db->select($tableName,$columnNames,$where);
		return $jsondata;
	}
	
	function agregaCategoria($categoria) {
		$tableName = $categoria['tableName'];
		$paramNames = explode(",", $categoria['paramNames']);
		$values = $categoria['values'];
		//explode("|", $categoria['values']);
		$pagina = $categoria['pagina'];
		$nombre = $categoria['nombre'];
		$plantilla = $categoria['plantilla'];
		$catPath=$categoria['catPath'];
		$respuesta = $this -> db -> insert($tableName, $paramNames, $values);
		$this -> creaCategoriaArchivo($respuesta['ID'], $nombre, $plantilla, $pagina);
		$pathTotal=$catPath.$respuesta['ID'];
		$this -> utils -> createFolderPath($pathTotal);
		return $respuesta;
		//Identificador del producto
	}
	function obtenDescripcion($producto){
		$tableName  =$producto['tableName'];
		$columnNames ='count(*) as Cuenta';
		$where     =  $producto['descripcion'];
		$jsondata   =$this->db->select($tableName,$columnNames,$where);
		return $jsondata;
	}
	
	function actualizaCategoria($categoria) {
		$tableName = $categoria['tableName'];
		$updFields = $categoria['updFields'];
		$where = $categoria['where'];
		$plantilla = $categoria['plantilla'];
		$pagina = $categoria['pagina'];
		$respuesta = $this -> db -> update($tableName, $updFields, $where);
		$this -> utils -> copyFile($plantilla, $pagina);
		return $respuesta;
	}

	function obtenCategorias($categoria) {
		$tableName = $categoria['tableName'];
		$columnNames = $categoria['columnNames'];
		$where = $categoria['where'];
		$jsondata = $this -> db -> select($tableName, $columnNames, $where);
		return $jsondata;
	}

	function borraCategoria($categoria) {
		$tableName = $categoria['tableName'];
		$where = $categoria['where'];
		$pagina = $categoria['pagina'];
		$folderPath=$categoria['folderPath'];
		$respuesta = $this -> db -> delete($tableName, $where);
		$this -> utils ->deleteDocument($pagina);
		$isDeleted=$this -> utils ->deleteFolder($folderPath);
		//$respuesta['PATH']=$folderPath;
		//$respuesta['DELETED']=$isDeleted;
		return $respuesta;
	}

	function creaCategoriaArchivo($idCategoria, $nombre, $plantilla, $pagina) {
		$script = $this -> getScript($nombre, $idCategoria, $nombre);
		$archivo = $this -> utils -> copyFile($plantilla, $pagina);
		file_put_contents($archivo, $script, FILE_APPEND);
	}
	
	function validaRepetido($producto){
		$respuesta=obtenDescripcion($producto);
		return $respuesta;
	}
	
	function getScript($category, $idCategory, $stickers) {
		$script = '<script type="text/javascript">' . '$(document).ready(function() {' . 'var idTienda = getIdTienda();' . 'var category=["' . $category . '"];' . 'var categorys=["' . $idCategory . '"];' . 'var stickers=["' . $stickers . '"];' . 'var attrs = ["Id", "Nombre", "Precio", "Descuento", "Imagen", "IdCategoria", "IdProducto"];' . 'buildCategory(category);' . 'var jsonS = getProducts(idTienda,"' . $idCategory . '");' . 'buildPrincipals(idTienda,jsonS,categorys,stickers,attrs,0,limit,true);' . 'initGallery();' . '});' . '</script>';
		return $script;
	}

}

$json = $_POST['params'];
if (isset($json)) {
	$category = new CategoriesController();
	$category -> initServices();
	$categoryB = json_decode($json, true);
	$oper = $categoryB['oper'];
	switch($oper) {
		case "Nuevo" :
			$respuesta = $category -> agregaCategoria($categoryB['operations'][0]);
			$jsondata = $respuesta;
			break;
		case "Actualiza" :
			$respuesta = $category -> actualizaCategoria($categoryB['operations'][0]);
			$jsondata = $respuesta;
			break;
		case "Repetido":
			$jsondata=$category->obtenDescripcion($categoryB['operations'][0]);
			break;
		case "Obten" :
			$jsondata = $category -> obtenCategorias($categoryB['operations'][0]);
			break;
		case "Borra" :
			$respuesta = $category -> borraCategoria($categoryB['operations'][0]);
			$jsondata = $respuesta;
			break;
		case "Contiene":
			$respuesta = $category -> contieneProds($categoryB['operations'][0]);
			$jsondata = $respuesta;
	}
	header('Content-type: application/json; charset=utf-8');
	echo json_encode($jsondata);
	exit();
}
?>