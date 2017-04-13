<?php
require("../phpServices/utilService.php");

$oper= $_POST['operation'];

if(isset($oper)){
	$util= new utilService();
	
	switch($oper){
		case "createFolder":
		$path       = $_POST['path'];
		$folderName = $_POST['folderName'];
		$folderPath=$util->createFolder($path,$folderName);
		$jsondata['PATH'] = $folderPath;	
		break;
	}	
	header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata);
    exit();
}
?>