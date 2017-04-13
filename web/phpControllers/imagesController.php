<?php
/*
echo "<ul>";

$d = dir("../images");

echo "Handle: " . $d->handle . "<br>";
echo "Path: " . $d->path . "<br>";
echo "Path: " .dirname("minegocioMX"). "<br>";
echo "Path " .realpath("../images");

while (false !== ($entry = $d->read())) {
	echo "<li><a href=\"/images/" . $entry . "\">" . $entry . "</a></li>";
}
$d->close();

echo "</ul>";
*/
require("../phpServices/imageServices.php");


$json = $_POST['params'];
//echo $json
$data = json_decode($json,true);
//print_r($data);
foreach ($data['operations'] as $operation){

	$oper= $operation['operation'];

	if(isset($oper)){
		$realImageDir=realpath("../images");
		$imageService= new imageServices();
		switch($oper){
			case "rotar":

				$imageTmp=$operation['image'];
				$image=$realImageDir."\\".$imageTmp;
				$degrees=$operation['degrees'];
				$image=$imageService-> rotateImg($image,$degrees);
				$jsondata['IMG'] = $image;
			break;
		}
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($jsondata);
		exit();
	}
}

?>

