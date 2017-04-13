<?php

class dbService{

private $conn;

public function initConnection(){
	$servername = "localhost";
	$username = "adminMX";
	$password = "m1n3g0c10MX";
	$dbname="minegociomx";
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	mysqli_select_db($conn, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}
public function inSelectClause($operation,$where){
	$i=1;
	$pos = strpos($where, 'in_'.$i);
	if($pos >0){
		while($pos > 0){
			$where=str_replace('in_'.$i,'IN('.$operation['in_'.$i].')',$where);
			$i++;
			$pos = strpos($where, 'in_'.$i);
		}
		
	}
	return $where;
}
public function initDbService(){
	$conn= $this->initConnection();
	$this->conn=$conn;
}

public function endDbService(){
	if($this->conn!=null){
		$this->conn->close();
	}
}
public function select($tableName, $columnNames, $where){
	$sql="Select ".$columnNames." from ".$tableName;
	$rows = array();
	if(!empty($where)){
		$sql.=" where ".$where;
	}
	$results = $this-> conn -> query($sql) or trigger_error( $this-> conn ->error);
	while($row = $results -> fetch_array()) {
		$rows[] = $row;
	}
	return $rows;
}

public function delete($tableName,$where){
	$respuesta="";
	$sql="Delete from ".$tableName;
	if(!empty($where)){
		$sql.=" where ".$where;
	}
	if (mysqli_query($this->conn, $sql) === TRUE) {
		$respuesta['ID']="";
		$respuesta['ESTATUS']=0;
		$respuesta['MSG']="Registro eliminado exitosamente";
	}else{
		$respuesta['ID']="";
		$respuesta['ESTATUS']=-1;
		$respuesta['MSG']="Error:[".$sql."]";
	}
	return $respuesta;
}
public function insert($tableName,$paramNames,$valuesAr){
	$respuesta="";
	$names=$this->getNames($paramNames);
	//$values=$this->getValues($valuesAr);
	$sql="Insert into ".$tableName.$names." values".$valuesAr;
	if (mysqli_query($this->conn, $sql) === TRUE) {
		$respuesta['ID']= "".$this->conn->insert_id;
		$respuesta['ESTATUS']=0;
		$respuesta['MSG']="Registro agregado exitosamente!!!";
	}else{
		$respuesta['ID']="";
		$respuesta['ESTATUS']=-1;
		$respuesta['MSG']="Error:[".$sql."]";
	}
	return $respuesta;
}
public function update($tableName,$updFields,$where){
	$respuesta="";

	$sql="Update ".$tableName." SET ".$updFields;
	
	if(!empty($where)){
		$sql.=" where ".$where;
	}
	if (mysqli_query($this->conn, $sql)) {
		$respuesta['ID']="";	
		$respuesta['ESTATUS']=0;
		$respuesta["MSG"]= "Registro actualizado exitosamente!!!";
	} else {
		$respuesta['ID']="";
		$respuesta['ESTATUS']=-1;
		$respuesta["MSG"]= "Error al actualizar el registro:[".$sql . mysqli_error($this->conn)."]";		
	}
	return $respuesta;
}

private function getValues($valuesAr){
	$values="(";
	$arLength = count($valuesAr);
	for($i = 0; $i < $arLength; $i++) {
		if($i>0){
			$values=$values.",";
		}
		$values=$values."'".$valuesAr[$i]."'";
	}
	$values=$values.")";
	return $values;
}
private function getNames($paramNames){
	$params="(";
	$arLength = count($paramNames);
	for($i = 0; $i < $arLength; $i++) {
		if($i>0){
			$params=$params.",";
		}
		$params=$params.$paramNames[$i];
		
	}
	$params=$params.")";
	return $params;
}
}

?>