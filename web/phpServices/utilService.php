<?php
class utilService{
	
	function createFolder($path, $folderName){
		$pathTotal= "";
		if (!file_exists($path."/".$folderName)) {
			$pathTotal=$path."/".$folderName;
			mkdir($pathTotal, 0777, true);
		}
		return $pathTotal;
	}
	function createFolderPath($path){
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}
		return $path;
	}
	function renameFolder($path,$folderName, $newFolderName){
		$renameFolder=false;
		if (!file_exists($path."/".$folderName)) {
			$renameFolder=rename("'".$path."/".$folderName."'","'".$newFolderName."'");
		}
		return $renameFolder;
	}
	
	function deleteFolder($dir){
		$respuesta="";
		try{ 
        if (is_dir($dir)) {
    		$objects = scandir($dir);
    		foreach ($objects as $object) {
    	  		if ($object != "." && $object != "..") {
        			if (filetype($dir."/".$object) == "dir") 
           				deleteFolder($dir."/".$object); 
        			else unlink   ($dir."/".$object);
      			}
   		 	}
    		reset($objects);
    		$respuesta=rmdir($dir);
  		}else{
  			$respuesta="No Entra";
  		}
		
		}catch(Exception $e) {
			$respuesta=$e->getMessage();
		}
		return $respuesta;
	}
	
	function deleteDocument($filePath){
		$isDeleted=TRUE;
		if (!unlink($filePath)){
    		$isDeleted=FALSE;
    	}
		return $isDeleted;
	}
	function copyFile($filePathSrc, $filePathDest){
		$newPath="";	
		if(copy($filePathSrc, $filePathDest)){
			$newPath=$filePathDest;
		}
		return $newPath;
	}
}
?>

