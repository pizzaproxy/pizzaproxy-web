<?php

if (key_exists("id", $_POST)) {
  
  ProxyPizza::delete($_POST["id"]);
  
}

header("Location: /index.php?action=admin");
exit();