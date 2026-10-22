<?php

$grd=$grd;
$format=$format;

function lowestfrac($numer,$denom) {
	$primes = array(2,3,5,7,11,13,17,19,23,29); 	
	for ($i=0; $i<=(count($primes)-1); $i+=1){
		$fac=$primes[$i];
		while ($numer%$fac==0 and $denom%$fac==0){$numer=$numer/$fac; $denom=$denom/$fac;}
		} 
	if (isset($whole)){$frac=$whole." ".$numer."/".$denom;}
	else{$frac=$numer."/".$denom;}
	return $frac;
	}	

for ($i=1; $i<=5; $i+=1){

	if ($i<=2){$pct=rand(1,99);}
	if ($i==3){$pct=rand(101,999);}
	if ($i==4){$pct=rand(1,99)+(rand(1,9)*0.1);}
	if ($i==5){$pct=rand(1,200)+(rand(1,9)*0.1)+(rand(1,9)*0.01);}
	
	$qpct=$pct;
	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	echo "<font color='#CC0000'><b>Example #".$i."</b><br/><br/>";
	echo "<font color='#000000'>Convert ".$pct."% "." into a fraction and a decimal number.";
	echo "<font color='#800080'><br/><br/>Step 1. Conversion into a Fraction.<font color='#000000'><br/><br/>";
	echo "To convert ".$pct."% into a fraction, simply drop the percent sign and put 100 under it as a denominator.<br/><br/>";
	$denom=100;
	unset($whole);
	echo $pct."% = ";
	if ($i<=2){
		echo $pct."/".$denom;
		$numer=$pct;
		$lowestfrac=lowestfrac($numer,$denom);
		$frac=$pct."/".$denom;
		if ($lowestfrac!=$frac){echo "<br/><br/>Reduce the fraction in lowest terms.<br/><br/>".$qpct."/".$denom." = ".$lowestfrac;}
		echo "<br/><br/>Thus, <font color='#0000CC'><b>".$qpct."%</b><font color='#000000'> = ";
		if ($lowestfrac!=$frac){echo "<font color='#0000CC'><b>".$lowestfrac."</b><font color='#000000'>.";}
		else{echo "<font color='#0000CC'><b>".$pct."/".$denom."</b><font color='#000000'>.";}
		}
	if ($i==3){
		echo $pct."/".$denom;
		$numer=$pct;
		if ($numer>$denom){
			$whole=floor($numer/$denom);
			$numer=$numer-($whole*100);
			} 
		$lowestfrac=lowestfrac($numer,$denom);
		if (isset($whole)){$lowestfrac=$whole." ".$lowestfrac;}
		$frac=$pct."/".$denom;
		if ($lowestfrac!=$frac){echo "<br/><br/>Reduce the fraction in lowest terms.<br/><br/>".$qpct."/".$denom." = ".$lowestfrac;}
		echo "<br/><br/>Thus, <font color='#0000CC'><b>".$qpct."%</b><font color='#000000'> = ";
		if ($lowestfrac!=$frac){echo "<font color='#0000CC'><b>".$lowestfrac."</b><font color='#000000'>.";}
		else{echo "<font color='#0000CC'><b>".$pct."/".$denom."</b><font color='#000000'>.";}
		}
	if ($i==4){
		echo $pct."/".$denom;
		echo "<br/><br/>Multiply both the numerator and denominator by 10 to make the numerator a whole number.<br/><br/>";
		echo $pct."/100 = ".($pct*10)."/1000<br/>";
		$pct=$pct*10; $denom=1000;
		$numer=$pct;
		if ($numer>$denom){
			$whole=floor($numer/$denom);
			$numer=$numer-($whole*100);
			} 
		$lowestfrac=lowestfrac($numer,$denom);
		if (isset($whole)){$lowestfrac=$whole." ".$lowestfrac;}
		$frac=$pct."/".$denom;
		if ($lowestfrac!=$frac){echo "<br/>Reduce the fraction in lowest terms.<br/><br/>".$pct."/".$denom." = ".$lowestfrac."<br/>";}
		echo "<br/>Thus, <font color='#0000CC'><b>".$qpct."%</b><font color='#000000'> = ";
		if ($lowestfrac!=$frac){echo "<font color='#0000CC'><b>".$lowestfrac."</b><font color='#000000'>.";}
		else{echo "<font color='#0000CC'><b>".$pct."/".$denom."</b><font color='#000000'>.";}
		}
	if ($i==5){
		echo $pct."/".$denom;
		echo "<br/><br/>Multiply both the numerator and denominator by 100 to make the numerator a whole number.<br/><br/>";
		echo $pct."/100 = ".($pct*100)."/10000<br/>";
		$pct=$pct*100; $denom=10000;
		$numer=$pct;
		if ($numer>$denom){
			$whole=floor($numer/$denom);
			$numer=$numer-($whole*10000);
			} 
		$lowestfrac=lowestfrac($numer,$denom);
		if (isset($whole)){$lowestfrac=$whole." ".$lowestfrac;}
		$frac=$pct."/".$denom;
		if ($lowestfrac!=$frac){echo "<br/>Reduce the fraction in lowest terms.<br/><br/>".$pct."/".$denom." = ".$lowestfrac;}
		//else{echo $pct."/".$denom;}
		echo "<br/><br/>Thus, <font color='#0000CC'><b>".$qpct."%</b><font color='#000000'> = ";
		if ($lowestfrac!=$frac){echo "<font color='#0000CC'><b>".$lowestfrac."</b><font color='#000000'>.";}
		else{echo "<font color='#0000CC'><b>".$pct."/".$denom."</b><font color='#000000'>.";}
		}
	echo "<font color='#800080'><br/><br/>Step 2. Conversion into a Decimal Number.<font color='#000000'><br/><br/>";
	echo "To convert ".$qpct."% into a decimal number, simply drop the percent sign and multiply it by 0.01.<br/><br/>";
	echo $qpct." x 0.01 = ".($qpct*0.01);
	echo "<br/><br/>Thus, <font color='#0000CC'><b>".$qpct."%</b><font color='#000000'> = <font color='#0000CC'><b>".($qpct*0.01)."</b><font color='#000000'>.";
	echo "</td></tr></table><br/>";
	}
	
?>