<?php

if (key_exists("filename", $_POST)) {
  
  helper::printdocuments($_POST['filename'], $_POST['type']);
  
}

//header("Location: /index.php?action=preorder");
exit();
