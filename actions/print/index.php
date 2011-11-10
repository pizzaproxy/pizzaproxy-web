<?php

ob_start();

$zettel = array();
$bon = array();

if (is_dir("data/zettel/")) {
	if ($dh = opendir($dir)) {
		while (($file = readdir($dh)) !== false) {
			if(strstr($file,"pdf")){
				$zettel[] = $file;
			}
		}
		closedir($dh);
	}
}

if (is_dir("data/bon/")) {
	if ($dh = opendir($dir)) {
		while (($file = readdir($dh)) !== false) {
			if(strstr($file,"pdf")){
				$bon[] = $file;
			}
		}
		closedir($dh);
	}
}

include 'templates/print/indexSuccess.php';

$_content = ob_get_clean();