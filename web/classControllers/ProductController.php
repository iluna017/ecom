<?php
require("../phpServices/dbService.php");
require("../phpServices/utilService.php");
class ProductController{
		
	private $db;
	private $utils;
	
	public function __construct() {
    }
	
	function initServices(){
		$this->db= new dbService();
		$this->db -> initDbService();
		$this->utils =new utilService();
	}
	
	function endServices(){
		$this->db->endDbService();
	}
	
	function obtenDescripcion($producto){
		$tableName  =$producto['tableName'];
		$columnNames ='count(*) as Cuenta';
		$where     =  $producto['descripcion'];
		$jsondata   =$this->db->select($tableName,$columnNames,$where);
		return $jsondata;
	}
	
	function agregaProducto($producto){
		$tableName  =$producto['tableName'];
		$paramNames =explode(",",$producto['paramNames']);
		$values     =$producto['values'];
		//$values     =explode("|",$producto['values']);			
		$respuesta        =$this->db->insert($tableName,$paramNames,$values);
		return $respuesta;//Identificador del producto
	}
	
	function agregaImagenes($imagen){
		$tableName=$imagen['tableName'];			
		$paramNames=explode(",",$imagen['paramNames']);			
		$values=$imagen['values'];
		//$values=explode(",",$imagen['values']);
		$respuesta=$this->db->insert($tableName,$paramNames,$values);
		return $respuesta;
	}
	
	function obtenProductosCategoria($categoria,$producto){
		$jsondata[$categoria]=$this->obtenProductos($producto);
		return $jsondata;
	}
	
	function obtenProductos($producto){
		$tableName  =$producto['tableName'];
		$columnNames =$producto['columnNames'];
		$where     =  $producto['where'];
		$jsondata   =$this->db->select($tableName,$columnNames,$where);
		return $jsondata;
	}
	
	function obtenImagenes($producto){
		$tableName  =$producto['tableName'];
		$columnNames =$producto['columnNames'];
		$where     =  $producto['where'];
		$jsondata   =$this->db->select($tableName,$columnNames,$where);
		return $jsondata;
	}
	
	function actualizaProducto($producto){
		$tableName=$producto['tableName'];
		$updFields=$producto['updFields'];
		$where = $producto['where'];
		$respuesta=$this->db->update($tableName,$updFields,$where);
		return $respuesta;
	}
	
	function obtenerProducto($data){
		$jsondata['Producto']= $this->obtenProductos($data['producto'][0]);
		$jsondata['Imagen']  = $this->obtenImagenes($data['producto'][1]);
		return $jsondata;
	}
	
	function obtenProductosPrincipal($data){
		$jsondata['Ofertas']= $this->obtenProductos($data['producto'][0]);
		$jsondata['Destacados']  = $this->obtenProductos($data['producto'][1]);
		$jsondata['Nuevos']=$this->obtenProductos($data['producto'][1]);
		return $jsondata;
	}
	
	function borrarProducto($producto){
		$tableName=$producto['tableName'];
		$where = $producto['where'];	
		$prodPath=$producto['prodPath'];
		$respuesta= $this->db->delete($tableName,$where);
		$tableNameImg=$producto['tableNameImg'];
		$whereImg = $producto['whereImg'];	
		$respuesta2=$this->db->delete($tableNameImg,$whereImg);
		$isDeleted=$this->utils->deleteFolder($prodPath);
		$respuesta['DELETED']=$isDeleted;
		return $respuesta;
	}
	
	function borrarImagenProducto($producto){
		$tableName=$producto['tableName'];
		$where = $producto['where'];
		$imgPath=$producto['imgProducto'];
		$respuesta= $this->db->delete($tableName,$where);
		$isDeleted=$this->utils->deleteDocument($imgPath);
		//$respuesta="".$isDeleted;
		return $respuesta;
	}

	function actualizaImagenes($producto){
		$path=$producto['path'];
		$folderName=$producto['folderName'];
		$newFolderName=$producto['newFolderName'];
		
		$tableName=$producto['tableName'];
		$updFields=$producto['updFields'];
		$where = $producto['where'];
		$respuestaDB=$this->db->update($tableName,$updFields,$where);
		
		$respuesta= $this->utils->renameFolder($path,$folderName,$newFolderName);
		if($respuesta){
			$respuesta["ID"]="0";
			$respuesta["MSG"]="Actualizado exitosamente!!!";
		}else{
			$respuesta["ID"]="-1";
			$respuesta["MSG"]="Actualizado incorrectamente!!!";
		}
		return $respuesta;	
	}
	
	function validaRepetido($producto){
		$respuesta=obtenDescripcion($producto);
		return $respuesta;
	}
	
	function productoNuevo($producto){
		$respuesta="";
		$respuesta=$this->agregaProducto($producto);
		return $respuesta;
	}
	
}
	
	$json = $_POST['params'];
	if(isset($json)){
		$product = new ProductController();
		$product->initServices();
		$producto = json_decode($json,true);
		$oper= $producto['oper'];
		switch($oper){
		case "Nuevo":
			$respuesta= $product->productoNuevo($producto);
			$jsondata=$respuesta;
			break;
		case "ActualizaImg":
			$respuesta= $product->actualizaImagenes($producto);
			$jsondata=$respuesta;
		case "Actualiza":
			$respuesta= $product->actualizaProducto($producto);
			$jsondata=$respuesta;
			break;	
		case "Obten":
			$jsondata=$product->obtenerProducto($producto);
			break;
		case "Repetido":
			$jsondata=$product->obtenDescripcion($producto);
			break;
		case "Principal":
			$jsondata=$product->obtenProductosPrincipal($producto);
			break;
		case "Productos":
			$categoria=$producto['cat'];
			$jsondata = $product->obtenProductosCategoria($categoria,$producto['producto']);
			break;
		case "Imagen":
			$respuesta= $product->productoNuevo($producto);
			$jsondata=$respuesta;
			break;
		case "BorraImg":
			$respuesta= $product->borrarImagenProducto($producto['productoImg']);
			$jsondata=$respuesta;
			break;
		case "BorraProd":
			$respuesta= $product->borrarProducto($producto['producto']);
			$jsondata=$respuesta;
			break;
		}
			
		header('Content-type: application/json; charset=utf-8');
		$product->endServices();
		echo json_encode($jsondata);
    exit();
	}
	
?>		