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

function getdenom($num){		
	if ($num==1){$ordnum="first";}
	if ($num==2){$ordnum="half";}
	if ($num==3){$ordnum="third";}
	if ($num==4){$ordnum="fourth";}
	if ($num==5){$ordnum="fifth";}
	if ($num==6){$ordnum="sixth";}
	if ($num==7){$ordnum="seventh";}
	if ($num==8){$ordnum="eighth";}
	if ($num==9){$ordnum="ninth";}
	if ($num==10){$ordnum="tenth";}
	if ($num==11){$ordnum="eleventh";}
	if ($num==12){$ordnum="twelfth";}
	if ($num==13){$ordnum="thirteenth";}
	if ($num==14){$ordnum="fourteenth";}
	if ($num==15){$ordnum="fifteenth";}
	if ($num==16){$ordnum="sixteenth";}
	if ($num==17){$ordnum="seventeenth";}
	if ($num==18){$ordnum="eighteenth";}
	if ($num==19){$ordnum="nineteenth";}
	if ($num==20){$ordnum="twentieth";}
	if ($num==30){$ordnum="thirtieth";}
	if ($num==40){$ordnum="fortieth";}
	if ($num==50){$ordnum="fiftieth";}
	if ($num==60){$ordnum="sixtieth";}
	if ($num==70){$ordnum="seventieth";}
	if ($num==80){$ordnum="eightieth";}
	if ($num==90){$ordnum="ninetieth";}
	if ($num>20 and $num<30){$ordnum="twenty-".getdenom($num-20);}
	if ($num>30 and $num<40){$ordnum="thirty-".getdenom($num-30);}
	if ($num>40 and $num<50){$ordnum="forty-".getdenom($num-40);}
	if ($num>50 and $num<60){$ordnum="fifty-".getdenom($num-50);}
	if ($num>60 and $num<70){$ordnum="sixty-".getdenom($num-60);}
	if ($num>70 and $num<80){$ordnum="seventy-".getdenom($num-70);}
	if ($num>80 and $num<90){$ordnum="eighty-".getdenom($num-80);}
	if ($num>90 and $num<100){$ordnum="ninety-".getdenom($num-90);}
	return $ordnum;
	}	


$fracall="***";
for ($i=1; $i<=12; $i+=1){

	$numlim1=1; $numlim2=9; $denlim1=2; $denlim2=10; $whole=0;
	if ($i==2){$whole=1;}
	if ($i==3 or $i==4){
		$numlim1=5; $numlim2=19; $denlim1=10; $denlim2=20; 
		}
	if ($i==5 or $i==6){
		$numlim1=20; $numlim2=49; $denlim1=21; $denlim2=50;
		}
	if ($i==7 or $i==8){
		$numlim1=2; $numlim2=18; $denlim1=5; $denlim2=19; $whole=rand(1,9);
		}
	if ($i==9 or $i==10){
		$numlim1=20; $numlim2=99; $denlim1=21; $denlim2=70; $whole=rand(1,9);
		}
	if ($i>=11){
		$numlim1=71; $numlim2=98; $denlim1=72; $denlim2=99; $whole=rand(11,99);
		}
 
	do{
		$numer=rand($numlim1,$numlim2);
		$denom=rand($denlim1,$denlim2); 
		$frac=$numer."/".$denom;
		} 
	while($denom<=$numer or strpos($fracall,$frac)>0);

	if ($numer<10){$snumer=genones($numer);}
	else{$snumer=gentens($numer);}
	$sdenom=getdenom($denom);
	if ($numer>1){$sdenom=$sdenom."s";}
	if (strpos($sdenom,"halfs")>0){$sdenom=str_replace("halfs","halves",$sdenom);}
	if ($whole>0 and $whole<10){$swhole=genones($whole);}
	if ($whole>0 and $whole>=10){$swhole=gentens($whole);}

	$fracall=$fracall.$frac."*";
	
	if ($format==1){$tfont1="<span lang='EN-US' style='font-size: 16pt'>"; $tfont2="<span lang='EN-US' style='font-size: 22pt'>";}
	else{$tfont1="<span lang='EN-US' style='font-size: 36pt'>"; $tfont2="<span lang='EN-US' style='font-size: 42pt'>";}
	
	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'>";	

	if ($whole==0){
		echo"
		<br/>
		<table align='center' border='0' width='100%' cellspacing='0' cellpadding='0' style='margin-left: 0'>
		<tr>
			<td align='center' width='8%' height='17' rowspan='3'>&nbsp;</td>
			<td align='center' width='15%'>$tfont2 <font color='#800080'><b>$numer</b></td>
			<td align='center' width='8%' height='17' rowspan='3'>$tfont2 :</td>
			<td align='left' width='65%' height='17' rowspan='3'>$tfont1 <font color='#800080'> $snumer <font color='#005000'> $sdenom</td>
			<td align='center' width='4%' height='17' rowspan='3'>&nbsp;</td>
		</tr>
		<tr>
			<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		</tr>
		<tr>
			<td align='center'>$tfont2 <font color='#005500'><b>$denom</b></td>
		</tr>
		</table>
		<br/>	
		";
		}
	
	else{
		echo"
		<br/>
		<table align='center' border='0' width='100%' cellspacing='0' cellpadding='0' style='margin-left: 0'>
		<tr>";
		if ($whole>9){
			echo"	
			<td align='center' width='4%' height='17' rowspan='3'>&nbsp;</td>
			<td align='center' width='10%' height='17' rowspan='3'>$tfont2 <font color='#CC0000'><b>$whole</td>
			<td align='center' width='12%'>$tfont2 <font color='#800080'><b>$numer</b></td>
			<td align='center' width='8%' height='17' rowspan='3'>$tfont2 :</td>
			<td align='left' width='62%' height='17' rowspan='3'>$tfont1 <font color='#CC0000'>$swhole <font color='#000000'>and 
			<font color='#800080'> $snumer <font color='#005000'> $sdenom</td>
			<td align='center' width='4%' height='17' rowspan='3'>&nbsp;</td>
			";
			}
		else{
			echo"	
			<td align='center' width='5%' height='17' rowspan='3'>&nbsp;</td>
			<td align='center' width='7%' height='17' rowspan='3'>$tfont2 <font color='#CC0000'><b>$whole</td>
			<td align='center' width='12%'>$tfont2 <font color='#800080'><b>$numer</b></td>
			<td align='center' width='10%' height='17' rowspan='3'>$tfont2 :</td>
			<td align='left' width='62%' height='17' rowspan='3'>$tfont1 <font color='#CC0000'>$swhole <font color='#000000'>and 
			<font color='#800080'> $snumer <font color='#005000'> $sdenom</td>
			<td align='center' width='4%' height='17' rowspan='3'>&nbsp;</td>
			";
			}
		echo
		"</tr>
		<tr>
			<td background='../../images/books-frac-line1.jpg'>&nbsp;</td>
		</tr>
		<tr>
			<td align='center'>$tfont2 <font color='#005500'><b>$denom</b></td>
		</tr>
		</table>
		<br/>	
		";
		}
	
	/*
	if($whole>0){echo "<font color='#800080'><b>".$whole." ".$numer."<font color='#0000CC'>/<font color='#800080'>".$denom;}
	else{echo "<font color='#800080'><b>".$numer."<font color='#0000CC'>/<font color='#800080'>".$denom;}
	echo "<font color='#CC0000'> - </b>";
	if ($whole>0){echo "<font color='#000000'>".$swhole."<font color='#0000CC'> and <font color='#000000'>".$snumer." ".$sdenom;}
	else{echo "<font color='#000000'>".$snumer." ".$sdenom;}
	*/
	
	echo "</td></tr></table>";
	if ($i<12){echo "<br/>";}
	}
	
?>