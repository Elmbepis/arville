<?php

$grd=$grd;
$format=$format;

if ($format==1){$font="<span lang='EN-US' style='font-size: 16pt'>";}
else{$font="<span lang='EN-US' style='font-size: 36pt'>";}
$small="<span lang='EN-US' style='font-size: 16pt'>";

$red=$font."<font color='#CC0000'><b>";
$blue=$font."<font color='#0000CC'><b>";
$vio=$font."<font color='#800080'><b>";
$black=$font."<font color='#000000'></b>";

$animals1=array("crocodile","dog","donkey","lion","mouse","ostrich","turtle");
$animals2=array("bird","fox","hippo","monkey","pig","turkey");
$acount1=count($animals1)-1;
$acount2=count($animals2)-1;

		
function getord($num){		
	if ($num==1){$ordnum="first";}
	if ($num==2){$ordnum="second";}
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
	return $ordnum;
	}	
		
for ($i=1; $i<=3; $i+=1){

	echo "<table align='center' width='100%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' bordercolor='#FEDB9A'>";
	echo "<tr><td align='center'>";	
	
	if ($i==1){
	
		echo "<table align='center' width='900' cellspacing='0' cellpadding='0'><tr>";
		
		echo "<td colspan='5' align='center'><br/>";
		echo $red."Example #".$i.$small."<br/><br/>".$black;
		$num=rand(2,10);
		$ordnum=getord($num);
		echo "Which animal is ".$ordnum."?<br/><br/>";
		echo "</td></tr>";
		
		echo "<tr>";
		$strchk="**";
		for($j=1; $j<=5; $j+=1){
			do{
				$animal[$j]=$animals1[rand(0,$acount1)];
				}
			while (strpos($strchk,$animal[$j])>0);
			$strchk=$strchk.$animal[$j];	
			$img="images/ordinal/".$animal[$j].".jpg";		
			echo "<td align='center'><img border='0' src='$img'></td>";
			}	
		echo "</tr>";
			
		$arrow="images/ordinal/arrow.jpg";
		$first="images/ordinal/first.jpg";
		echo "<tr><td width='20%'><img border='0' src='$first'></td><td width='20%'>&nbsp</td><td width='20%'>&nbsp</td><td width='20%'>&nbsp</td><td width='20%' align='center'><img border='0' src='$arrow'></td></tr>";
	
		echo "<tr>";
		for($j=10; $j>=6; $j+=-1){
			do{
				$animal[$j]=$animals2[rand(0,$acount2)];
				}
			while (strpos($strchk,$animal[$j])>0);
			$strchk=$strchk.$animal[$j];	
			$img="images/ordinal/".$animal[$j].".jpg";		
			echo "<td align='center'><img border='0' src='$img'></td>";
			}	
		echo "</tr>";
		
		echo "<tr><td align='center' colspan='5'>";
		echo $font."<br/>The ".$animal[$num]." is ".$ordnum.".<br/>";
		echo "</td></tr>";
				
		echo "</table>$small<br/>";
		}
	
	if ($i>1){
	
		echo "<table align='center' width='900' cellspacing='0' cellpadding='0'><tr>";
		
		echo "<td colspan='5' align='center'><br/>";
		echo $red."Example #".$i.$small."<br/>".$black;
		
		$phrases=array("a red apple and a big orange","is eating the watermelon","will study her math lessons","the black bird flying above","a cup of hot coffee with milk",
			"are playing basketball there", "his only cousin and his friend", "the angry lion in the cage", "the third planet from the sun", "their thick coloring book",
			"the hottest day last week", "the biggest fish in the pond", "building two sand castles", "the old vegetable farmer", "always eats a healthy lunch");
		
		do{
			if ($i==2){$num=rand(6,15);}
			else{$num=rand(11,20);}
			$ordnum=getord($num);
			if ($i==2){$phrase[2]=$phrases[rand(0,(count($phrases)-1))];}
			else{ 
				do{$phrase[3]=$phrases[rand(0,(count($phrases)-1))];} while($phrase[3]==$phrase[2]);
				}	
			$phrase0=str_replace(" ","",$phrase[$i]);
			$letter=substr($phrase0,($num-1),1);
			}
		while ($letter=='l' or $letter=='i' or $letter=='');	
		
		echo "<p style='margin-left: 30px; margin-right: 30px;'>"; 
		echo "Not counting spaces, what is the ".$ordnum." letter in the phrase ".$vio."'".$phrase[$i]."'".$black."?<br/>";
		echo "</td></tr>";
		
		echo "<tr><td align='center' colspan='5'>";
		echo "<p style='margin-left: 30px; margin-right: 30px;'>"; 
		echo $font."The ".$ordnum." letter in the phrase '".$phrase[$i]."' is ".$blue."'<b>".$letter."</b>'".$black.".<br/>";
		echo "</td></tr>";
				
		echo "</table>$small<br/>";
		}
	
	echo "</td></tr></table>";
	if ($i<3){echo "<br/>";}
	}
	echo $small."<br/>".$font;
?>