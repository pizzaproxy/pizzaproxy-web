\documentstyle{order}

\begin{document}

\header{<?php echo $servicename?>}{<?php echo $servicephone?>}
\startorder
%
<?php foreach ($ordersSummary as $order):?>
\addorder{<?php echo $order["numpizza"]?>}{<?php echo $order["menunumber"]?>}{<?php echo $order["name"]?>}{<?php echo helper::formatPriceLaTeX($order["price"])?>}{<?php echo helper::formatPriceLaTeX($order["numpizza"]*$order["price"])?>}
<?php if (key_exists($order["pizzaid"], $ordersAlternatives)):?>
  <?php foreach ($ordersAlternatives[$order["pizzaid"]] as $i => $alternative):?>
    <?php if ($i >= $config["alternatives_visible"]):?>
      <?php break;?>
    <?php endif;?>
    \alternative{<?php echo $alternative["menunumber"]?>}{<?php echo $alternative["servicename"]?>}{<?php echo $alternative["phone"]?>}
  <?php endforeach;?>
<?php endif;?>
\total{<?php echo helper::formatPriceLaTeX($total)?>}
\finishorder

\startsummary
<?php foreach ($groupedOrders as $orderid => $orders):?>
\neworder{<?php echo $orderid ?>}
  <?php foreach ($orders as $order) : ?>
  \additem{<?php echo $order["amount"] ?>}{<?php echo $order["pizzaid"]?>}{<?php echo $order["name"]?>}{<?php echo helper::formatPriceLaTeX($order["amount"] * $order["price"])?>}
  <?php endforeach;?>
\calc{<?php echo helper::formatPriceLaTeX($groupedPrices[$order['orderid']])?>}
<?php endforeach;?>
\finishsummary
\end{document}