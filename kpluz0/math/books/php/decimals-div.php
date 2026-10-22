<?php

$grd=$grd;
$format=$format;

if ($format==1){$font="<span lang='EN-US' style='font-size: 16pt'>";}
else{$font="<span lang='EN-US' style='font-size: 36pt'>";}

$red=$font."<font color='#CC0000'><b>";
$blue=$font."<font color='#0000CC'><b>";
$black=$font."<font color='#000000'></b>";
$vio=$font."<font color='#800080'>";
$green=$font."<font color='#007700'><b>";
$gray=$font."<font color='#999999'><b>";
$small="<span lang='EN-US' style='font-size: 12pt'>";


for ($i=1; $i<=5; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	echo $red."Example #".$i.$black."$small <br/><br/>";

	if ($i==1){
		do {$quot=rand(1001,3300); $divis=rand(2,4); $divid=$quot*$divis;}
		while ($divid>9999);
		$divid1=substr($divid,0,1);
		$divid2=substr($divid,1,1);
		$divid3=substr($divid,2,1);
		$divid4=substr($divid,3,1);
		$quot1=substr($quot,0,1);
		$quot2=substr($quot,1,1);
		$quot3=substr($quot,2,1);
		$quot4=substr($quot,3,1);
		$prod1=$quot1*$divis;
		$diff11=$divid1-$prod1;
		$diff12=$divid2;
		$prod2=$quot2*$divis;
		if ($prod2>9){$prod21=substr($prod2,0,1); $prod22=substr($prod2,1,1);}
		else{$prod21=0; $prod22=$prod2;}
		$diff21=($diff11*10+$diff12)-$prod2;
		$diff22=$divid3;
		$prod3=$quot3*$divis;
		if ($prod3>9){$prod31=substr($prod3,0,1); $prod32=substr($prod3,1,1);}
		else{$prod31=0; $prod32=$prod3;}
		$diff31=($diff21*10+$diff22)-$prod3;
		$diff32=$divid4;
		$prod4=$quot4*$divis;
		if ($prod4>9){$prod41=substr($prod4,0,1); $prod42=substr($prod4,1,1);}
		else{$prod41=0; $prod42=$prod4;}
		
		do{
			if ($i<3){$places1=rand(1,3); $places2=rand(1,3);}
			else{$places1=rand(1,4); $places2=rand(1,4);}
			$dec1=$divid*(pow(10,(-1*$places1)));
			$dec2=$divis*(pow(10,(-1*$places2)));		
			$decans=$dec1/$dec2;
			}
		while ($decans>9999 or $dec1-floor($dec1)==0 or $dec2-floor($dec2)==0);	
		
		echo $font.$vio."<b>".$dec1." <img border='0' src='../../images/books-frac-div2.jpg'> ".$dec2." = ?<br/><br/>".$black;
		echo $green."Step 1. $black Move the decimal points of both the divisor and the dividend $places2 ";
		if ($places2>1){echo "places";}else{echo "place";} 
		echo " to the right to make the divisor a whole number:<br/><br/>";
		
		$divid1b=$divid1; $divid2b=$divid2; $divid3b=$divid3; $divid4b=$divid4; 
		
		$pos=strpos($dec1,".");
		if ($pos==1){$divid1b=$divid1.$gray.".".$black;}
		if ($pos==2){$divid2b=$divid2.$gray.".".$black;}
		if ($pos==3){$divid3b=$divid3.$gray.".".$black;}
		if ($pos==4){$divid4b=$divid4.$gray.".".$black;}
		
		$pos2=$pos+$places2;
		if ($pos2==1){$divid1b=$divid1.$red.".".$black; $divid1=$divid1b; $quot1=$quot1.$red.".".$black;}
		if ($pos2==2){$divid2b=$divid2.$red.".".$black; $divid2=$divid2b; $quot2=$quot2.$red.".".$black;}
		if ($pos2==3){$divid3b=$divid3.$red.".".$black; $divid3=$divid3b; $quot3=$quot3.$red.".".$black;}
		if ($pos2==4){$divid4b=$divid4.$red.".".$black; $divid4=$divid4b; $quot4=$quot4.$red.".".$black;}
		
		echo"
		<table border='0' width='75%' cellspacing='0' cellpadding='0'>
			<tr>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' width='45' align='center' valign='bottom'><img border='0' src='../../images/books-div-symbol-top.jpg'></td>
				<td height='17' width='19%' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' width='19%' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' width='19%' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' width='19%' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
			</tr>
			<tr>
				<td align='center'>$font $divis</td>
				<td height='56' width='45' align='center' valign='top'><img border='0' src='../../images/books-div-symbol-bottom.jpg'></td>
				<td align='center'>$font $divid1b</td>
				<td align='center'>$font $divid2b</td>
				<td align='center'>$font $divid3b</td>
				<td align='center'>$font $divid4b</td>
			</tr>
		</table>	
		";
		
		echo $green."<br/>Step 2. $black Divide the dividend by the divisor, putting the decimal point of the quotient directly above the decimal point of the dividend:<br/><br/>";
	
		echo "
		<table border='0' width='75%' cellspacing='0' cellpadding='0'>
			<tr>
				<td align='center'>$font &nbsp;</td>
				<td width='45'  align='center'>$font &nbsp;</td>
				<td width='20%' align='center'>$font $quot1</td>
				<td width='20%' align='center'>$font $quot2</td>
				<td width='20%' align='center'>$font $quot3</td>
				<td width='20%' align='center'>$font $quot4</td>
			</tr>
			<tr>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' width='45' align='center' valign='bottom'><img border='0' src='../../images/books-div-symbol-top.jpg'></td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
			</tr>
			<tr>
				<td align='center'>$font $divis</td>
				<td height='56' width='45' align='center' valign='top'><img border='0' src='../../images/books-div-symbol-bottom.jpg'></td>
				<td align='center'>$font $divid1</td>
				<td align='center'>$font $divid2</td>
				<td align='center'>$font $divid3</td>
				<td align='center'>$font $divid4</td>
			</tr>
			<tr>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font -</td>
				<td align='center'>$font $prod1</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
			</tr>
			<tr>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
			</tr>
			<tr>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font $diff11</td>
				<td align='center'>$font $diff12</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
			</tr>
			<tr>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font -</td>
				<td align='center'>$font $prod21</td>
				<td align='center'>$font $prod22</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
			</tr>
			<tr>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
			</tr>
			<tr>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font $diff21</td>
				<td align='center'>$font $diff22</td>
				<td align='center'>$font &nbsp;</td>
			</tr>
			<tr>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font -</td>
				<td align='center'>$font $prod31</td>
				<td align='center'>$font $prod32</td>
				<td align='center'>$font &nbsp;</td>
			</tr>
			<tr>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
			</tr>
			<tr>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font $diff31</td>
				<td align='center'>$font $diff32</td>
			</tr>
			<tr>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font -</td>
				<td align='center'>$font $prod41</td>
				<td align='center'>$font $prod42</td>
			</tr>
			<tr>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
			</tr>
			<tr>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font 0</td>
			</tr>
		</table>	
		";
		}

	else{
		do {$quot=rand(101,450); $divis=rand(11,39); $divid=$quot*$divis;}
		while ($divid>9999);
		$divid1=substr($divid,0,1);
		$divid2=substr($divid,1,1);
		$divid3=substr($divid,2,1);
		$divid4=substr($divid,3,1);
		$quot1=substr($quot,0,1);
		$quot2=substr($quot,1,1);
		$quot3=substr($quot,2,1);
		$prod1=$quot1*$divis;
		if ($prod1>9){$prod11=substr($prod1,0,1); $prod12=substr($prod1,1,1);}
		else{$prod11=0; $prod12=$prod1;}
		$diff1=($divid1*10+$divid2)-$prod1;
		if ($diff1>9){$diff11=substr($diff1,0,1); $diff12=substr($diff1,1,1);}
		else{$diff11=0; $diff12=$diff1;}
		$diff13=$divid3;
		$prod2=$quot2*$divis;
		if ($prod2>99){$prod21=substr($prod2,0,1); $prod22=substr($prod2,1,1); $prod23=substr($prod2,2,1);}
		if ($prod2>9 and $prod2<=99){$prod21=0; $prod22=substr($prod2,0,1); $prod23=substr($prod2,1,1);}
		if ($prod2<=9){$prod21=0; $prod22=0; $prod23=$prod2;}
		$diff2=($diff11*100+$diff12*10+$diff13)-$prod2;
		if ($diff2>9 and $diff2<=99){$diff21=substr($diff2,0,1); $diff22=substr($diff2,1,1);}
		if ($diff2<=9){$diff21=0; $diff22=$diff2;}
		$diff23=$divid4;
		$prod3=$quot3*$divis;
		if ($prod3>99){$prod31=substr($prod3,0,1); $prod32=substr($prod3,1,1); $prod33=substr($prod3,2,1);}
		if ($prod3>9 and $prod3<=99){$prod31=0; $prod32=substr($prod3,0,1); $prod33=substr($prod3,1,1);}
		if ($prod3<=9){$prod31=0; $prod32=0; $prod33=$prod3;}
		
		do{
			if ($i<3){$places1=rand(1,3); $places2=rand(1,3);}
			else{$places1=rand(1,4); $places2=rand(1,4);}
			$dec1=$divid*(pow(10,(-1*$places1)));
			$dec2=$divis*(pow(10,(-1*$places2)));		
			$decans=$dec1/$dec2;
			}
		while ($decans>999 or ($decans<101 and ($decans-floor($decans)==0)) or $dec1-floor($dec1)==0 or $dec2-floor($dec2)==0);	
		
		echo $font.$vio."<b>".$dec1." <img border='0' src='../../images/books-frac-div2.jpg'> ".$dec2." = ?<br/><br/>".$black;
		
		echo $green."Step 1. $black Move the decimal points of both the divisor and the dividend $places2 ";
		if ($places2>1){echo "places";}else{echo "place";} 
		echo " to the right to make the divisor a whole number:<br/><br/>";
		
		$divid1b=$divid1; $divid2b=$divid2; $divid3b=$divid3; $divid4b=$divid4; 
		
		$pos=strpos($dec1,".");
		if (substr($dec1,0,1)=="0" and substr($dec1,1,1)=="."){$divid1b=$gray.".".$black.$divid1;}
		else{
			if ($pos==1){$divid1b=$divid1.$gray.".".$black;}
			if ($pos==2){$divid2b=$divid2.$gray.".".$black;}
			if ($pos==3){$divid3b=$divid3.$gray.".".$black;}
			if ($pos==4){$divid4b=$divid4.$gray.".".$black;}
			}
		
		$pos2=$pos+$places2;
		if (substr($dec1,0,1)=="0" and substr($dec1,1,1)=="."){$pos2=$places2;}
		if ($pos2==1){$divid1b=$divid1.$red.".".$black; $divid1=$divid1b;}
		if ($pos2==2){$divid2b=$divid2.$red.".".$black; $divid2=$divid2b;}
		if ($pos2==3){$divid3b=$divid3.$red.".".$black; $divid3=$divid3b;}
		if ($pos2==4){$divid4b=$divid4.$red.".".$black; $divid4=$divid4b;}
		
		$pos3=strpos($decans,".");
		if (substr($decans,0,1)=="0" and substr($decans,1,1)=="."){$quot1=$red.".".$black.$quot1;}
		else{
			if ($pos3==1){$quot1=$quot1.$red.".".$black;}
			if ($pos3==2){$quot2=$quot2.$red.".".$black;}
			if ($pos3==3){$quot3=$quot3.$red.".".$black;}
			if ($pos3==4){$quot4=$quot4.$red.".".$black;}		
			}		
		 
		echo"
		<table border='0' width='75%' cellspacing='0' cellpadding='0'>
			<tr>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' width='45' align='center' valign='bottom'><img border='0' src='../../images/books-div-symbol-top.jpg'></td>
				<td height='17' width='19%' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' width='19%' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' width='19%' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' width='19%' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
			</tr>
			<tr>
				<td align='center'>$font $divis</td>
				<td height='56' width='45' align='center' valign='top'><img border='0' src='../../images/books-div-symbol-bottom.jpg'></td>
				<td align='center'>$font $divid1b</td>
				<td align='center'>$font $divid2b</td>
				<td align='center'>$font $divid3b</td>
				<td align='center'>$font $divid4b</td>
			</tr>
		</table>	
		";
		
		echo $green."<br/>Step 2. $black Divide the dividend by the divisor, putting the decimal point of the quotient directly above the decimal point of the dividend:<br/><br/>";

		echo "
		<table border='0' width='75%' cellspacing='0' cellpadding='0'>
			<tr>
				<td align='center'>$font &nbsp;</td>
				<td width='45'  align='center'>$font &nbsp;</td>
				<td width='19%' align='center'>$font &nbsp;</td>
				<td width='19%' align='center'>$font $quot1</td>
				<td width='19%' align='center'>$font $quot2</td>
				<td width='19%' align='center'>$font $quot3</td>
			</tr>
			<tr>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' width='45' align='center' valign='bottom'><img border='0' src='../../images/books-div-symbol-top.jpg'></td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
			</tr>
			<tr>
				<td align='center'>$font $divis</td>
				<td height='56' width='45' align='center' valign='top'><img border='0' src='../../images/books-div-symbol-bottom.jpg'></td>
				<td align='center'>$font $divid1</td>
				<td align='center'>$font $divid2</td>
				<td align='center'>$font $divid3</td>
				<td align='center'>$font $divid4</td>
			</tr>
			<tr>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font -</td>
				<td align='center'>$font $prod11</td>
				<td align='center'>$font $prod12</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
			</tr>
			<tr>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
			</tr>
			<tr>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font $diff11</td>
				<td align='center'>$font $diff12</td>
				<td align='center'>$font $diff13</td>
				<td align='center'>$font &nbsp;</td>
			</tr>
			<tr>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font -</td>
				<td align='center'>$font $prod21</td>
				<td align='center'>$font $prod22</td>
				<td align='center'>$font $prod23</td>
				<td align='center'>$font &nbsp;</td>
			</tr>
			<tr>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
			</tr>
			<tr>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font $diff21</td>
				<td align='center'>$font $diff22</td>
				<td align='center'>$font $diff23</td>
			</tr>
			<tr>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font -</td>
				<td align='center'>$font $prod31</td>
				<td align='center'>$font $prod32</td>
				<td align='center'>$font $prod33</td>
			</tr>
			<tr>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='center'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
				<td height='17' align='right' background='../../images/books-frac-line1.jpg'>&nbsp;</td>
			</tr>
			<tr>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font &nbsp;</td>
				<td align='center'>$font 0</td>
			</tr>
		</table>	
		";
		}

	$pos=strpos($decans,".");
	
	if ($pos>0){
		$whole=floor($decans);
		$dec=substr($decans,($pos+1));
		echo "<br/>Thus, ".$dec1." / ".$dec2." = ".$blue.$whole.$red.".</b>".$blue."</b>".$dec."<br/>";
		}
	else{echo "<br/>Thus, ".$dec1." / ".$dec2." = ".$blue.$decans."<br/>";}	

	echo "</td></tr></table><br/>";

	}
?>