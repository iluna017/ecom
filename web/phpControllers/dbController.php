<?php
require("../phpServices/dbService.php");
 
//echo "Connected successfully";
$json = $_POST['params'];
//echo $json
$data = json_decode($json,true);
//print_r($data);
foreach ($data['operations'] as $operation){
	//echo $operation['operation']; // etc.	

	//$jsondata['MSG']=$data['operations'][0]['operation'];
//echo json_encode($jsondata);

$oper= $operation['operation'];

if(isset($oper)){
	$db= new dbService();
	$db -> initDbService();
	
	switch($oper){
		case "insertar":
			$tableName=$operation['tableName'];			
			$paramNames=explode(",",$operation['paramNames']);			
			$values=$operation['values'];			
			$respuesta=$db->insert($tableName,$paramNames,$values);
			$jsondata = $respuesta;	
		break;
		
		case "update":
			$tableName=$operation['tableName'];
			$updFields=$operation['updFields'];
			$where = $operation['where'];
			$respuesta=$db->update($tableName,$updFields,$where);
			$jsondata = $respuesta;
		break;
		
		case "select":
		
		$tableName=$operation['tableName'];
		$columnNames=$operation['columnNames'];
		$where = $db->inSelectClause($operation,$operation['where']);
		$jsondata= $db->select($tableName,$columnNames,$where);
		$jsondata;
		break;
		
		case "delete":
			$tableName=$operation['tableName'];
			$where = $operation['where'];
			$respuesta= $db->delete($tableName,$where);
			$jsondata = $respuesta;
		break;
	}
	$db -> endDbService();

   
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata);
    exit();
}
}
?>