<?php 

echo '\documentclass{bon}'."\n";

echo '\usepackage[paperwidth=72mm,paperheight=108mm,top=0mm, bottom=0mm, left=0mm, right=0mm]{geometry}'."\n";

echo '\begin{document}'."\n";
echo '\code{'.str_pad($order['number'], 4, "0", STR_PAD_LEFT).'}'."\n";
echo '\head'."\n";
echo '\startorder'.'\n';

$total = 0;
foreach($order['items'] as $item){
	echo '\addorder{'.$item['amount'].'}{'.$item['name'].'}{'.helper::formatPriceLaTeX($item['amount']*$item['price']).'}'."\n";
    $total += ($item['amount']*$item['price']);
}
echo '\total{'.helper::formatPriceLaTeX($total).'}'."\n";
echo '\finishorder'."\n";

if(count($order['items']) <= 10){
	echo '\vspace{'.(100-(count($order['items'])*10)).'pt}';
}
echo '\beginfooter'."\n";
echo '\addfooter{HTTP://PIZZAPROXY.ORG}'."\n";
echo '\addfooter{'.date("d.m.j G:i:s").'}'."\n";
echo '\finishfooter'."\n";
echo '\end{document}'."\n";

