<?php

$grd=$grd;
$format=$format;

$words="";

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

	if ($i<=3){
		$whole=rand(10,99);
		$swhole=gentens($whole);
		if(rand(1,5)==1){$dec=rand(2,9); $sdec=genones($dec);}
		else{$dec=rand(11,99); $sdec=gentens($dec);}
		}
	if ($i>=4 and $i<=7){
		$whole=rand(10,99);
		$swhole=gentens($whole);
		if(rand(1,5)==1){$dec=rand(11,99); $sdec=gentens($dec);}
		else{$dec=rand(1,9)*100+rand(11,99); $sdec=genhundreds($dec);}
		}
	if ($i>=8){
		$whole=rand(1,9)*100 + rand(10,99);
		$swhole=genhundreds($whole);
		$dec=rand(1,9)*100+rand(11,99); $sdec=genhundreds($dec);
		if(rand(1,5)>1){
			$tdec=rand(1,9); 
			$dec=$tdec*1000+$dec;
			$sdec=genones($tdec)." thousand ".$sdec;
			}
		}
	if ($i<3 or $i==4 or $i==8){$whole=0;}	
	if ($dec<10){$decname="tenths";}	
	if ($dec>9 and $dec<100){$decname="hundredths";}	
	if ($dec>99 and $dec<1000){$decname="thousandths";}	
	if ($dec>999 and $dec<10000){$decname="ten-thousandths";}	
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	echo "<font color='#800080'><b>".$whole."<font color='#0000CC'>.<font color='#800080'>".$dec;
	echo "<font color='#CC0000'> - </b>";
	if ($whole>0){echo "<font color='#000000'>".$swhole."<font color='#0000CC'> and <font color='#000000'>".$sdec." ".$decname;}
	else{echo "<font color='#000000'>".$sdec." ".$decname;}
	
	if ($i<10){echo "<br/><br/>";}
	}
echo "</td></tr></table>";
	
?>