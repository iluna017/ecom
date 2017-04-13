<?php
class imageServices {

	function rotateImg($image, $degrees) {
		// define image path
		// $image="C:\\xampp\\htdocs\\minegocioMX\\images\\was.png";
		// $degrees = 90;
		$info = getimagesize ( $image );
		
		if ($info ['mime']) {
			if ($info ['mime'] == 'image/gif') {
				$canvas = imagecreatefromgif ( $image );
				// Rotates the image
				$rotate = imagerotate ( $canvas, $degrees, 0 );
				// Save the image as output.jpg
				imagegif ( $rotate, $image );
			} elseif ($info ['mime'] == 'image/jpeg') {
				$canvas = imagecreatefromjpeg ( $image );
				// Rotates the image
				$rotate = imagerotate ( $canvas, $degrees, 0 );
				// Save the image as output.jpg
				imagejpeg ( $rotate, $image );
			} elseif ($info ['mime'] == 'image/png') {
				$canvas = imagecreatefrompng ( $image );
				// Rotates the image
				$rotate = imagerotate ( $canvas, $degrees, 0 );
				// Save the image as output.jpg
				imagepng ( $rotate, $image );
			}
		}
		// Clear the memory of the tempory image
		imagedestroy ( $canvas );
		return $image;
	}
}
