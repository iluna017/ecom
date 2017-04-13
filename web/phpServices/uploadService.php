<?php
require("utilService.php");

//if(isset($_POST['uplID'])){
	//$id= $_POST['uplID'];
	// A list of permitted file extensions
	try {
	$allowed = array('png', 'jpg', 'gif');

	//if(isset($_FILES['upl'.$id]) && $_FILES['upl'.$id]['error'] == 0){

		$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

		if(!in_array(strtolower($extension), $allowed)){
			echo '{"status":"error"}';
			exit;
		}
		$util = new utilService();
		$path=$_REQUEST['path'];
		$name=$_REQUEST['name'];
		$pathTotal=$util->createFolderPath($path);
		$pathTotal=$pathTotal."/";
		//if(move_uploaded_file($_FILES['file']['tmp_name'], $pathTotal.$_FILES['file']['name'])){
		$source=$_FILES['file']['tmp_name'];//$pathTotal.$_FILES['file']['name'];
		$destination=$pathTotal.$name;
		$info = getimagesize($source);
		
    	if ($info['mime'] == 'image/jpeg') 
        	$image = imagecreatefromjpeg($source);
   		elseif ($info['mime'] == 'image/gif') 
       		$image = imagecreatefromgif($source);
   			elseif ($info['mime'] == 'image/png') 
       			$image = imagecreatefrompng($source);
		 $file_size = filesize($source);
		 $quality=75;//CALIDAD DE LA IMAGEN
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
			
   		 if(imagejpeg($dst, $destination, $quality)){
			echo '{"status":"success"}';
			exit;		 		
		}
		  
		 /*if(move_uploaded_file($_FILES['file']['tmp_name'], $pathTotal.$_FILES['file']['name'])){
			$renameResult = rename($pathTotal.$_FILES['file']['name'],$pathTotal.$name);//$pathTotal.$_FILES['file']['name']);
			compress_image($pathTotal.$name,$pathTotal.'otra', 80);
			if ($renameResult == true) {
				echo '{"status":"success"}';
				exit;		
			}
		}*/
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