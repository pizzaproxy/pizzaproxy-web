<?php

ob_start();


$orders = Order::getOrders(null,Order::STATUS_PREORDERED);

include 'templates/preorder/indexSuccess.php';

$_content = ob_get_clean();
