<?php
$pizzaids = $_POST['pizzaids'];
$orderid = $_POST['orderid'];

if (!empty($pizzaids)) {
  if ($_POST['new']) {
      $neworder = Order::addOrder($pizzaids);
  } else if ($_POST['preorder']) {
      $neworder = Order::addPreOrder($pizzaids);
  } else if ($_POST['add'] && !empty($orderid)) {
      $neworder = Order::addToExcistingOrder($pizzaids, $orderid);
  }
}

header("Location: /index.php");
exit();
