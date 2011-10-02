<?php

if (key_exists("id", $_POST)) {
  
  Order::markAsPayed($_POST["id"]);
  
}

header("Location: /index.php?action=preorder");
exit();
