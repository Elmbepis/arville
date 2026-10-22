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
	
	
for ($i=1; $i<=5; $i+=1){

	do {$qnum=rand(1,8); $sqnum="*".$qnum;} while(strpos($allqnum,$sqnum)>0);
	$allqnum="*".$sqnum.$allqnum;

	do{
		if ($qnum==1){$q="temperature of a metal rod if it"; $verb="increased"; $nverb="decreased"; $units="degrees Celsius"; $lim1=20; $lim2=50;}
		if ($qnum==2){$q="weight of a box if it"; $verb="increased"; $nverb="decreased"; $units="pounds"; $lim1=10; $lim2=70;}
		if ($qnum==3){$q="volume of a liquid if it"; $verb="increased"; $nverb="decreased"; $units="liters"; $lim1=5; $lim2=80;}
		if ($qnum==4){$q="length of a spring that"; $verb="was stretched"; $nverb="was compressed"; $units="inches"; $lim1=20; $lim2=120;}
		if ($qnum==5){$q="height of a tree that"; $verb="grew"; $nverb="was cut"; $units="feet"; $lim1=8; $lim2=30;}
		if ($qnum==6){$q="mass of a block if it"; $verb="increased"; $nverb="decreased"; $units="kilograms"; $lim1=15; $lim2=70;}
		if ($qnum==7){$q="volume of a gas whose container"; $verb="expanded"; $nverb="was compressed"; $units="cubic feet"; $lim1=10; $lim2=50;}
		if ($qnum==8){$q="thickness of a book if it"; $verb="increased"; $nverb="decreased"; $units="millimeters"; $lim1=10; $lim2=50;}

		if ($i<=3){$orig=rand($lim1,$lim2); $rate=(rand(1,9))/10;}
		if ($i>=4){$orig=rand(($lim1*10),($lim2*10))/10; $rate=rand(11,300)/100;}
		if ($i>1 and rand(1,2)==1){$rate=$rate*-1; $verb=$nverb;}
		$new=$orig*(1+$rate);
		}
	while ($new<=1);	

	echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	
	echo "<font color='#CC0000'><b>Example #".$i."</b><br/><br/>";
	echo "<font color='#000000'>Find the percentage change (PC) in the $q $verb from <font color='#0000CC'><b> $orig</b><font color='#000000'> $units ";
	echo "to <font color='#0000CC'><b> $new</b><font color='#000000'> $units.";
	
	echo "<font color='#800080'><br/><br/>Solution:<font color='#000000'><br/><br/>";
	echo "
	<table border='0' width='75%' cellspacing='0' cellpadding='0'>
	<tr>
		<td rowspan='3' align='center'>$tfont1 PC</td>
		<td align='center' width='10%' height='17' rowspan='3'><img border='0' src='../../images/books-frac-equal1.jpg' width='97' height='17'></td>
		<td align='center'>$tfont1 Amount of Change</td>
	</tr>
	<tr>
		<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
	</tr>
	<tr>
		<td align='center'>$tfont1 Original Amount</td>
	</tr>
	</table><br/>
	";
	echo "PC = (".$new." - ".$orig.") / ".$orig."<br/>";
	echo "PC = ".($new-$orig)." / ".$orig."<br/>";
	echo "PC = ".$rate." = ".($rate*100)."%<br/><br/>";
	if ($rate>0){$change="increase";} else {$change="decrease";}
	echo "There was a percentage ".$change." of <font color='#800080'><b>".(abs($rate*100))."%</b><font color='#000000'>."; 
	
	echo "</td></tr></table><br/>";
	
	//if ($i<5){echo "<br/>";}
	
	}
	
?>