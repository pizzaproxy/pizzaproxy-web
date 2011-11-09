<?php

class Bon {

	static public function doBon($orderid,$order){
		Bon::saveLaTeX($orderid, Bon::generateLaTeX($orderid, $order));
	}
	
	static public function generateLaTeX($orderid,$order){
		$tex = '\documentclass{bon}'."\n";
		$tex .= '\usepackage[paperwidth=72mm,paperheight=108mm,top=0mm, bottom=0mm, left=0mm, right=0mm]{geometry}'."\n";
		$tex .= '\begin{document}'."\n";
		$tex .= '\code{'.str_pad($orderid, 4, "0", STR_PAD_LEFT).'}'."\n";
		$tex .= '\head'."\n";
		$tex .= '\startorder'."\n";
	
		$total = 0;
		foreach($order as $item){
			$pizzaname = explode(" ", $item['name']);
			$name = implode(" ", $pizzaname[0-2]);
			$tex .=  '\addorder{'.$item['amount'].'}{'.$name.'}{'.helper::formatPriceLaTeX($item['amount']*$item['price']).'}'."\n";
			$total += ($item['amount']*$item['price']);
		}
		$tex .=  '\total{'.helper::formatPriceLaTeX($total).'}'."\n";
		$tex .=  '\finishorder'."\n";
	
		if(count($order) <= 10){
			$tex .=  '\vspace{'.(80-(count($order['items'])*8)).'pt}';
		}
		$tex .=  '\beginfooter'."\n";
		$tex .=  '\addfooter{HTTP://PIZZAPROXY.ORG}'."\n";
		$tex .=  '\addfooter{'.date("d.m.j G:i:s").'}'."\n";
		$tex .=  '\finishfooter'."\n";
		$tex .= '\end{document}'."\n";
		
		return $tex;
	}

	public static function saveLaTeX($orderid,$tex) {
		$fp = fopen('data/bon/'.$orderid.'.tex', 'w+');
		fwrite($fp, $tex);
		fclose($fp);
		if(file_exists('data/bon/'.$orderid.'.pdf')){
			unlink('data/bon/'.$orderid.'.pdf');
		}
		system("cd data/bon/; pdflatex $orderid.tex; rm *.log; rm *.aux;");
	}
	
	public static function printLaTeX($orderid) {
		//system("lpr");
	}


}
