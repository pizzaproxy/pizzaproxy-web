<?php echo '\documentstyle{order}'."\n";
echo '\begin{document}'."\n";
echo '\header{'.$servicename.'}{'.$servicephone.'}'."\n";
echo '\startorder'."\n";

foreach ($ordersSummary as $order){
  echo '\addorder{'.$order['numpizza'].'}{'.$order['menunumber'].'}{'.$order['name'].'}{'.helper::formatPriceLaTeX($order['price']).'}{'.helper::formatPriceLaTeX($order['numpizza']*$order['price']).'}'."\n";
  if (key_exists($order['pizzaid'], $ordersAlternatives)){
   foreach ($ordersAlternatives[$order['pizzaid']] as $i => $alternative){
     if ($i >= $config['alternatives_visible']){break;}
     echo '\alternative{'.$alternative['menunumber'].'}{'.$alternative['servicename'].'}{'.$alternative['phone'].'}'."\n";
    };
  };
};
echo '\total{'.helper::formatPriceLaTeX($total).'}'."\n";
echo '\finishorder'."\n";
echo '\startsummary'."\n";
foreach ($groupedOrders as $orderid => $orders){
echo '\neworder{'.$orderid.'}'."\n";
  foreach ($orders as $order){
    echo '\additem{'.$order['amount'].'}{'.$order['pizzaid'].'}{'.$order['name'].'}{'.helper::formatPriceLaTeX($order['amount'] * $order['price']).'}'."\n";
  };
  echo '\calc{'.helper::formatPriceLaTeX($groupedPrices[$order['orderid']]).'}'."\n";
};
echo '\finishsummary'."\n";
echo '\end{document}';