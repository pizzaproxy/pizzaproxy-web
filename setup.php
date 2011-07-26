<?php

include dirname(__FILE__) . '/lib/database.php';
include dirname(__FILE__) . '/lib/Order.php';
include dirname(__FILE__) . '/lib/Pizza.php';
include dirname(__FILE__) . '/lib/ProxyPizza.php';
include dirname(__FILE__) . '/lib/PizzaService.php';
include dirname(__FILE__) . '/lib/OrderProxy.php';

$setupok = Database::createTables();

if(php_sapi_name() == 'cli') {
    if($setupok) {
        echo "Setup OK";
    }else{
        echo "Setup NOT OK";
    }
    die;
}
>
<html>
<head>
<title>
PizzaProxy
</title>
<meta http-equiv="REFRESH" content="10;url=index.php">
</head>
<body>
<?php if($setupok):?>
  Setup erfolgreich! :)
<?php else:?>
  Oops! Setup fehlgeschlagen :(
<?php endif;?>
</body>
</html>
