\documentclass{bon}

\usepackage[paperwidth=72mm,paperheight=108mm,top=0mm, bottom=0mm, left=0mm, right=0mm]{geometry}

\begin{document}
\code{<?php echo str_pad($order['number'], 4, "0", STR_PAD_LEFT); ?>}
\head
\startorder
<?php 
    $total = 0;
    foreach($order['items'] as $item){
        echo "\addorder{".$item['amount']."}{".$item['name'].'}{'.helper::formatPriceLaTeX($item['amount']*$item['price']).'}'."\n";
        $total += ($item['amount']*$item['price']);
    }
    echo '\total{'.helper::formatPriceLaTeX($total).'}'."\n";
?>
\finishorder
<?php
    if(count($order['items']) <= 10){
        echo '\vspace{'.(120-(count($order['items'])*12)).'pt}';
    }
?>
\beginfooter
\addfooter{HTTP://PIZZAPROXY.ORG}
\addfooter{<?php echo date(); ?>}
\finishfooter
\end{document}

