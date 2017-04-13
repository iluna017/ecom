<?php
require("../phpServices/sessionService.php");

$json = $_POST['params'];
//echo $json
$data = json_decode($json,true);
$oper= $data['operation'];

if(isset($oper)){
	$ss= new sessionService();
	$jsondata="";
	switch($oper){
		case "getSession":
			$_SESSION="";
			$usuario       = $data['idusuario'];
			$password = $data['password'];
			$loginDatos["tableName"]="usuarios";
			$loginDatos["columnNames"]="IdUsuario,NombreUsuario,Password,AliasUsuario";
			$loginDatos["where"]=" NombreUsuario='".$usuario."'";
		
			$isLoged=$ss -> login($loginDatos,$usuario,$password);
			if($isLoged["ISLOGGED"]=="true"){
				$_SESSION = $ss -> getSession($isLoged[0][0],$isLoged[0][1]);
				$jsondata["ID"]                   = "0";
				$jsondata["ESTATUS"]              = "0";
				$jsondata["MSG"]                  = "Usuario autenticado!!!";
				$jsondata["SESSION"]["IDSESSION"] = $_SESSION["IDSESSION"];
				$jsondata["SESSION"]["IDUSER"]    = $_SESSION['IDUSER'];
				$jsondata["SESSION"]["IDCLIENT"]  = $_SESSION['IDCLIENT'];
			}else{
				$jsondata["ID"]="-1";$jsondata["ESTATUS"]="-1";
				$jsondata["MSG"]="Usuario no autenticado!!!";
			}
		break;
		case "setVariableSession":
			$varName  = $data['varName'];
			$varValue = $data['varValue'];
			$isSetted = $ss->setVarSession($varName,$varValue);
			if($isSetted){
				$jsondata["ID"]="0";$jsondata["ESTATUS"]="0";
				$jsondata["MSG"]="Valor agregado exitosamente!!!";
			}else{
				$jsondata["ID"]="-1";$jsondata["ESTATUS"]="-1";
				$jsondata["MSG"]="Valor no agregado!!!";
			}
		break;
		case "getVariableSession":
			$varName = $data['varName'];
			$varValue=$ss->getVarSession($varName);
			if($varValue!=""){
				$jsondata["ID"]="0";$jsondata["ESTATUS"]="0";
				$jsondata["MSG"]="Valor obtenido!!!";
				$jsondata[$varName]=$varValue;				
			}else{
				$jsondata["ID"]="-1";$jsondata["ESTATUS"]="-1";
				$jsondata["MSG"]="Valor no obtenido!!!";				
			}
		break;	
	}
	header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata);
    exit();
}
?>