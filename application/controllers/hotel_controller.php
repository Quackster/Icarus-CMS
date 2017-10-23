<?php

class Hotel extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function camera() {

		//$im = imagecreatefrompng("c_images/camera_photos/" . $_GET["image"]);

		header('Content-Type: image/png');
		exit (file_get_contents("c_images/camera_photos/" . $_GET["image"]));
		
		/*imagepng($im);
		imagedestroy($im);*/
	}
}