<?php
	try {
	$allowed = array('png', 'jpg', 'gif');
		//$source="20170121_140419.jpg";
		//$source="20170121_131623.jpg";
		//$source="62881024WF5350DSIL.png";
		//$source="117421024RME1436XMXS0.SIL.jpg";
		//$source="sony-bdp-s480.jpg";
		$source="BuffaloBR3D12U3USB30BluerayWriter.jpg";
		$destination="test.jpg";
		$extension = pathinfo($source, PATHINFO_EXTENSION);

		if(!in_array(strtolower($extension), $allowed)){
			echo '{"status":"error"}';
			exit;
		}
		
		$info = getimagesize($source);
		
    	if ($info['mime'] == 'image/jpeg') 
        	$image = imagecreatefromjpeg($source);
   		elseif ($info['mime'] == 'image/gif') 
       		$image = imagecreatefromgif($source);
   			elseif ($info['mime'] == 'image/png') 
       			$image = imagecreatefrompng($source);
		 $file_size = filesize($source);
			
   		//if(imagejpeg($image, $destination, 100)){
			list($width, $height) = getimagesize($source);
			$direction=$width-$height;
			if($direction!=0){
				if($direction < 0){
					if($width>900){$newWidth=900;}
					if($height>1600){$newHeight=1600;}
				}else{
					if($width>1600){$newWidth=1600;}
					if($height>900){$newHeight=900;}
				}
			}else{
				if($width>1600){$newWidth=1600;$newHeight=1600;}
				else{$newWidth=$width;$newHeight=$height;}					
			}
			$dst = imagecreatetruecolor($newWidth,$newHeight );
			imagecopyresampled($dst, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
			imagejpeg($dst, $destination, 75);
			echo '{"status":"success"}';
			exit;		 		
		//}
		  
		
	//}
	}
	catch(Exception $e) {
	echo '{"status":"'.$e->getMessage().'"}';
	exit;
	//echo 'Message: ' .$e->getMessage();
	}
	echo '{"status":"error"}';
	exit;
	//echo 'Message: ' .$e->getMessage();
//}
?>