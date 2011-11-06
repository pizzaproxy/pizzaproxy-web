<?php echo '\documentstyle{order}';
echo '\begin{document}';
echo '\header{'.$servicename.'}{'.$servicephone.'}';
echo '\startorder';

foreach ($ordersSummary as $order){
  echo '\addorder{'.$order['numpizza'].'}{'.$order['menunumber'].'}{'.$order['name'].'}{'.helper::formatPriceLaTeX($order['price']).'}{'.helper::formatPriceLaTeX($order['numpizza']*$order['price']).'}';
  if (key_exists($order['pizzaid'], $ordersAlternatives)){
   foreach ($ordersAlternatives[$order['pizzaid']] as $i => $alternative){
     if ($i >= $config['alternatives_visible']){break;}
     echo '\alternative{'.$alternative['menunumber'].'}{'.$alternative['servicename'].'{}'.$alternative['phone'].'}';
    };
  };
};
echo '\total{'.helper::formatPriceLaTeX($total).'}';
echo '\finishorder';
echo '\startsummary';
foreach ($groupedOrders as $orderid => $orders){
echo '\neworder{'.$orderid.'}';
  foreach ($orders as $order){
    echo '\additem{'.$order['amount'].'}{'.$order['pizzaid'].'}{'.$order['name'].'}{'.helper::formatPriceLaTeX($order['amount'] * $order['price']).'}';
  };
  echo '\calc{'.helper::formatPriceLaTeX($groupedPrices[$order['orderid']]).'}';
};
echo '\finishsummary';
echo '\end{document}';