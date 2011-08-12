<?php

include dirname(__FILE__) . '/lib/Database.php';
include dirname(__FILE__) . '/lib/Order.php';
include dirname(__FILE__) . '/lib/Pizza.php';
include dirname(__FILE__) . '/lib/ProxyPizza.php';
include dirname(__FILE__) . '/lib/PizzaService.php';
include dirname(__FILE__) . '/lib/OrderProxy.php';
include dirname(__FILE__) . '/lib/helper.class.php';

$setupok = Database::createTables();

if(php_sapi_name() == 'cli') {
    if($setupok) {
        echo "Setup OK\n";
        echo "Event: ".helper::getConfig("event")."\n";
        echo "ApiUser:";
        foreach(helper::getConfig("apiuser") as $username => $password){
            echo $user." ";
        }
        echo "\n";
    }else{
        echo "Setup NOT OK\n";
    }
    die;
}
?>
<html>
<head>
<title>
PizzaProxy
</title>
<meta http-equiv="REFRESH" content="5;url=index.php">
</head>
<body>
<?php if($setupok):?>
  Setup OK
<?php else:?>
  Oops! NOT OK
<?php endif;?>
</body>
</html>
