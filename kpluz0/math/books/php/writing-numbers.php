<?php

$grd=$grd;
$format=$format;

function genones($num) {
	if ($num==1){$words="one";}
	if ($num==2){$words="two";}
	if ($num==3){$words="three";}
	if ($num==4){$words="four";}
	if ($num==5){$words="five";}
	if ($num==6){$words="six";}
	if ($num==7){$words="seven";}
	if ($num==8){$words="eight";}
	if ($num==9){$words="nine";}
	return $words;
	}

function gentens($num) {
	if ($num<20){
		if ($num==10){$words="ten";}
		if ($num==11){$words="eleven";}
		if ($num==12){$words="twelve";}
		if ($num==13){$words="thirteen";}
		if ($num==14){$words="fourteen";}
		if ($num==15){$words="fifteen";}
		if ($num==16){$words="sixteen";}
		if ($num==17){$words="seventeen";}
		if ($num==18){$words="eighteen";}
		if ($num==19){$words="nineteen";}
		}
	else{
		$dig1=substr($num,0,1);
		$dig2=substr($num,1,1);
		if ($dig1==2){$wten="twenty";}
		if ($dig1==3){$wten="thirty";}
		if ($dig1==4){$wten="forty";}
		if ($dig1==5){$wten="fifty";}
		if ($dig1==6){$wten="sixty";}
		if ($dig1==7){$wten="seventy";}
		if ($dig1==8){$wten="eighty";}
		if ($dig1==9){$wten="ninety";}
		$wone=genones($dig2);
		if ($wone==""){$words=$wten;}
		else{$words=$wten."-".$wone;}
		}
		return $words;
	}	
	
function genhundreds($num) {
	$dig1=substr($num,0,1);
	$dig2=substr($num,1,1);
	$dig3=substr($num,2,1);
	$numtens=$dig2*10+$dig3;
	$wtens=gentens($numtens,$wtens);
	$wones=genones($dig1,$wones);
	$words=$wones." hundred ".$wtens;
	return $words;
	}

echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
echo "<tr><td align='left'>";	
echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
for ($i=1; $i<=10; $i+=1){

	if ($grd==5){
		if ($i<=3){$dig7=rand(1,9);}
		if ($i>=4 and $i<=7){$dig7=rand(10,19);}
		if ($i>=8){$dig7=rand(20,99);}
		if ($dig7<10){
			$wones7=genones($dig7);
			$wmillions=$wones7." million";
			}
		else{
			$wtens7=gentens($dig7);
			$wmillions=$wtens7." million";
			}
		$dig4=rand(1,9)*100 + rand(10,99);
		$wthousands=genhundreds($dig4)." thousand";
		$dig1=rand(1,9)*100 + rand(10,99);
		$whundreds=genhundreds($dig1);
		if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
		else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
		echo "<font color='#800080'><b>".$dig7.",".$dig4.",".$dig1;
		echo "<font color='#CC0000'> - </b>";
		echo "<font color='#000000'>".$wmillions." ".$wthousands." ".$whundreds;
		}
	
	if ($grd==4){
		if ($i<=5){$dig4=0;}
		if ($i>=6 and $i<=8){$dig4=1;}
		if ($i>=9){$dig4=rand(2,9);}
		$dig4=$dig4*100 + rand(10,99);
		if ($dig4<100){$wthousands=gentens($dig4)." thousand";}
		else{$wthousands=genhundreds($dig4)." thousand";}
		$dig1=rand(1,9)*100 + rand(10,99);
		$whundreds=genhundreds($dig1);
		if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
		else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
		echo "<font color='#800080'><b>".$dig4.",".$dig1;
		echo "<font color='#CC0000'> - </b>";
		echo "<font color='#000000'>".$wthousands." ".$whundreds;
		}
	
	if ($grd==3){
		if ($i<=2){$dig4=1;}
		if ($i>=3 and $i<=5){$dig4=rand(2,9);}
		if ($i>=6 and $i<=8){$dig4=rand(1,2)*10 + rand(1,9);}
		if ($i>=9){$dig4=rand(3,9)*10 + rand(1,9);}
		if ($dig4>9){$wthousands=gentens($dig4)." thousand";}
		else{$wthousands=genones($dig4)." thousand";}
		$dig1=rand(1,9)*100 + rand(10,99);
		$whundreds=genhundreds($dig1);
		if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
		else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
		echo "<font color='#800080'><b>".$dig4.",".$dig1;
		echo "<font color='#CC0000'> - </b>";
		echo "<font color='#000000'>".$wthousands." ".$whundreds;
		}
	
	if ($i<10){echo "<br/><br/>";}
	}
echo "</td></tr></table>";
	
?>