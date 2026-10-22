<?php

$grd=$grd;
$format=$format;

if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:12pt;color:#000000'>"; 
	echo $tfont1;}
else{
	$tfont1="<span lang='EN-US' style='font-size:36pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:36pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:27pt;color:#000000'>"; 
	echo $tfont1;}
	
	
for ($i=1; $i<=1; $i+=1){

	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}

	$price=rand(75,150)*100;
	$rate=rand(8,30)*.5;
	$tax=$price*$rate/100;
	echo "<font color='#CC0000'><b>Example #".(($i-1)*5+1)."</b><br/><br/>";
	echo "<font color='#000000'>How much is the sales tax for an item that costs <font color='#0000CC'><b> &#8369; ".$price."</b><font color='#000000'> ";
	echo "if the sales tax rate is <font color='#0000CC'><b>".$rate."%</b><font color='#000000'>?";
	echo "<font color='#800080'><br/><br/>Solution:<br/><font color='#000000'>Sales Tax = Price x Sales Tax Rate<br/>";
	echo "= &#8369; ".$price." x ".$rate."%<br/>";
	echo "= &#8369; ".$price." x ".($rate/100)."<br/>";
	echo "= <font color='#800080'><b>&#8369; ".($price*$rate/100)."</b><font color='#000000'>";
	echo "</td></tr></table><br/>";
		
	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	$price=rand(75,150)*100;
	$rate=rand(8,30)*.5;
	$tax=$price*$rate/100;
	echo "<font color='#CC0000'><b>Example #".(($i-1)*5+2)."</b><br/><br/>";
	echo "<font color='#000000'>Find the sales tax rate if the price of the item is <font color='#0000CC'><b>&#8369; ".$price."</b><font color='#000000'> ";
	echo "and the sales tax is <font color='#0000CC'><b>&#8369; ".$tax."</b><font color='#000000'>.";
	echo "<font color='#800080'><br/><br/>Solution:<br/><font color='#000000'>Sales Tax Rate = Sales Tax / Price<br/>";
	echo "= &#8369; ".$tax." / &#8369; ".$price."<br/>";
	echo "= ".($tax/$price)." = <font color='#800080'><b>".$rate."%</b><font color='#000000'>";
	echo "</td></tr></table><br/>";
	
	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}

	$price=rand(75,150)*100;
	$rate=rand(1,16)*5;
	$disc=$price*$rate/100;
	echo "<font color='#CC0000'><b>Example #".(($i-1)*5+3)."</b><br/><br/>";
	echo "<font color='#000000'>How much is the discount if an item originally costs <font color='#0000CC'><b> &#8369; ".$price."</b><font color='#000000'> ";
	echo "and the discount rate is <font color='#0000CC'><b>".$rate."%</b><font color='#000000'>?";
	echo "<font color='#800080'><br/><br/>Solution:<br/><font color='#000000'>Discount = Regular Price x Discount Rate<br/>";
	echo "= &#8369; ".$price." x ".$rate."%<br/>";
	echo "= &#8369; ".$price." x ".($rate/100)."<br/>";
	echo "= <font color='#800080'><b>&#8369; ".($price*$rate/100)."</b><font color='#000000'>";
	echo "</td></tr></table><br/>";
		
	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	$price=rand(75,150)*100;
	$rate=rand(1,16)*5;
	$disc=$price*$rate/100;
	echo "<font color='#CC0000'><b>Example #".(($i-1)*5+4)."</b><br/><br/>";
	echo "<font color='#000000'>Find the discount rate if the original price of the item is <font color='#0000CC'><b>&#8369; ".$price."</b><font color='#000000'> ";
	echo "and the discount is <font color='#0000CC'><b>&#8369; ".$disc."</b><font color='#000000'>.";
	echo "<font color='#800080'><br/><br/>Solution:<br/><font color='#000000'>Discount Rate = Discount / Regular Price<br/>";
	echo "= &#8369; ".$disc." / &#8369; ".$price."<br/>";
	echo "= ".($disc/$price)." = <font color='#800080'><b>".$rate."%</b><font color='#000000'>";
	echo "</td></tr></table><br/>";
		
	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	$price=rand(75,150)*100;
	$rate=rand(1,16)*5;
	$disc=$price*$rate/100;
	echo "<font color='#CC0000'><b>Example #".(($i-1)*5+5)."</b><br/><br/>";
	echo "<font color='#000000'>Find the sale price of an item with an original price of <font color='#0000CC'><b>&#8369; ".$price."</b><font color='#000000'> ";
	echo "if the discount rate is <font color='#0000CC'><b>".$rate."%</b><font color='#000000'>.";
	echo "<font color='#800080'><br/><br/>Solution:<br/><font color='#000000'>Sale Price = Regular Price x (100-Discount Rate)/100<br/>";
	echo "= &#8369; ".$price." x (100 - ".$rate.")/100<br/>";
	echo "= &#8369; ".$price." x ".((100-$rate)/100)."<br/>";
	echo "= &#8369; ".($price-$disc)."</b><font color='#000000'>";
	echo "</td></tr></table><br/>";
	

	
	//if ($i<5){echo "<br/>";}
	
	}
	
?>