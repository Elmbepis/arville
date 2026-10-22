<?php

$grd=$grd;
$format=$format;


for ($i=1; $i<=4; $i+=1){
echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
echo "<tr><td align='left'>";	
echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 

if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:20pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:12pt;color:#000000'>"; 
	echo $tfont1;}
else{
	$tfont1="<span lang='EN-US' style='font-size:36pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:40pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:27pt;color:#000000'>"; 
	echo $tfont1;}

$vio="<font color='#800080'><b>";
$red="<font color='#CC0000'><b>";
$blue="<font color='#0000CC'><b>";
$black="</b><font color='#000000'>";


if($i==1){
	$t1 = rand(2,10);
	$t2 = rand(11,20);
	$t3 = rand(21,30);
	$a1=$t1*1000;
	$a2=$t2*1000;
	$a3=$t3*1000;
	echo $red."Example # $i :<br/></b>Kilograms into Grams$black<br/><br/>Convert $t1 kilograms, $t2 kilograms, and $t3 kilograms into grams.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 1000 grams in one kilogram, we simply need to multiply the number of kilograms by 1000 to get the number of grams. Thus:<br/><br/>";
    echo "$t1 kg = ($t1 x 1000) g = $vio $a1 g$black<br/>";
    echo "$t2 kg = ($t2 x 1000) g = $vio $a2 g$black<br/>";
    echo "$t3 kg = ($t3 x 1000) g = $vio $a3 g$black<br/>";
	}

if($i==2){
	$a1 = rand(2,10);
	$a2 = rand(11,20);
	$a3 = rand(21,30);
	$t1=$a1*1000;
	$t2=$a2*1000;
	$t3=$a3*1000;
	echo $red."Example # $i :<br/></b>Grams into Kilograms$black<br/><br/>Convert $t1 grams, $t2 grams, and $t3 grams into kilograms.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 1000 grams in one kilogram, we simply need to divide the number of grams by 1000 to get the number of kilograms. Thus:<br/><br/>";
    echo "$t1 g = ($t1 &div; 1000) kg<br/>= $vio $a1 kg$black<br/><br/>";
    echo "$t2 g = ($t2 &div; 1000) kg<br/>= $vio $a2 kg$black<br/><br/>";
    echo "$t3 g = ($t3 &div; 1000) kg<br/>= $vio $a3 kg$black<br/><br/>";
	}

if($i==3){
	$t1 = rand(2,10);
	$t2 = rand(11,20);
	$t3 = rand(21,30);
	$a1=$t1*1000;
	$a2=$t2*1000;
	$a3=$t3*1000;
	echo $red."Example # $i :<br/></b>Grams into Milligrams$black<br/><br/>Convert $t1 grams, $t2 grams, and $t3 grams into milligrams.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 1000 milligrams in one gram, we simply need to multiply the number of grams by 1000 to get the number of milligrams. Thus:<br/><br/>";
    echo "$t1 g = ($t1 x 1000) mg<br/>= $vio $a1 mg$black<br/><br/>";
    echo "$t2 g = ($t2 x 1000) mg<br/>= $vio $a2 mg$black<br/><br/>";
    echo "$t3 g = ($t3 x 1000) mg<br/>= $vio $a3 mg$black<br/>";
	}

if($i==4){
	$a1 = rand(2,10);
	$a2 = rand(11,20);
	$a3 = rand(21,30);
	$t1=$a1*1000;
	$t2=$a2*1000;
	$t3=$a3*1000;
	echo $red."Example # $i :<br/></b>milligrams into grams$black<br/><br/>Convert $t1 milligrams, $t2 milligrams, and $t3 milligrams into grams.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 1000 milligrams in one gram, we simply need to divide the number of milligrams by 1000 to get the number of grams. Thus:<br/><br/>";
    echo "$t1 mg = ($t1 &div; 1000) g<br/>= $vio $a1 g$black<br/><br/>";
    echo "$t2 mg = ($t2 &div; 1000) g<br/>= $vio $a2 g$black<br/><br/>";
    echo "$t3 mg = ($t3 &div; 1000) g<br/>= $vio $a3 g$black<br/>";
	}
    
echo "</td></tr></table>";
if ($i<5){echo "<br/>";}
}
	
?>