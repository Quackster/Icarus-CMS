<?php

$small = FALSE;
$fileName = $_GET["image"];

if (strpos($fileName, "_small.png") == TRUE) {
	$fileName = str_replace("_small.png", ".png", $fileName);
	$small = TRUE;
}

$url = "http://localhost/c_images/camera_photos/" . $fileName;
$image = imagecreatefrompng($url);

/*if ($small) {
	
	$width = 40;
	$height = 40;

	$new_image = imagecreatetruecolor ($width, $height); // new wigth and height
	imagealphablending($new_image , false);
	imagesavealpha($new_image , true);
	imagecopyresampled ( $new_image, $image, 0, 0, 0, 0, $width, $height, imagesx ( $image ), imagesy ( $image ) );
	$image = $new_image;
}*/

header('Content-Type: image/png');

imagepng($image);
imagedestroy($image);
?>