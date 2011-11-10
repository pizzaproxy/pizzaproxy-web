<?php

ob_start();

$zettel = array();
$bon = array();

$dir = "data/zettel/";
if (is_dir($dir)) {
	if ($dh = opendir($dir)) {
		while (($file = readdir($dh)) !== false) {
			if(strstr($file,"pdf")){
				$zettel[] = $file;
			}
		}
		closedir($dh);
	}
}

$dir = "data/bon/";
if (is_dir($dir)) {
	if ($dh = opendir($dir)) {
		while (($file = readdir($dh)) !== false) {
			if((strstr($file,"pdf")) and !($file == "pizzaproxy_logo.pdf")){
				$bon[] = $file;
			}
		}
		closedir($dh);
	}
}

include 'templates/print/indexSuccess.php';

$_content = ob_get_clean();