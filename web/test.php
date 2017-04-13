<?php

$operation = array(
    "where" => "IdTienda=0 AND IdProducto in_1 ",
    "in_1" => "Select IdProducto from destacados in_2",
	"in_2" => "Select Id from tabla");

$where =$operation["where"];
$i=1;

	$pos = strpos($where, 'in_'.$i);
	if($pos >0){
		while($pos > 0){
			$where=str_replace('in_'.$i,'IN('.$operation['in_'.$i].')',$where);
			$i++;
			$pos = strpos($where, 'in_'.$i);
		}
		
	}
	echo $where;    
?>