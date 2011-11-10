<?php

if (key_exists("id", $_POST)) {
  
  $orderid = $_POST["id"];
  Order::markAsPayed($orderid);
  Bon::doBon($orderid, Order::getOrder($orderid));
  
}

header("Location: /index.php?action=preorder");
exit();
