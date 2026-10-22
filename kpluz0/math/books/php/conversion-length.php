<?php

$grd=$grd;
$format=$format;


for ($i=1; $i<=10; $i+=1){
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
	$a1=$t1*100;
	$a2=$t2*100;
	$a3=$t3*100;
	echo $red."Example # $i :<br/></b>Meters into Centimeters$black<br/><br/>Convert $t1 meters, $t2 meters, and $t3 meters into centimeters.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 100 centimeters in one meter, we simply need to multiply the number of meters by 100 to get the number of centimeters. Thus:<br/><br/>";
    echo "$t1 m = ($t1 x 100) cm = $vio $a1 cm$black<br/>";
    echo "$t2 m = ($t2 x 100) cm = $vio $a2 cm$black<br/>";
    echo "$t3 m = ($t3 x 100) cm = $vio $a3 cm$black<br/>";
	}

if($i==2){
	$a1 = rand(2,10);
	$a2 = rand(11,20);
	$a3 = rand(21,30);
	$t1=$a1*100;
	$t2=$a2*100;
	$t3=$a3*100;
	echo $red."Example # $i :<br/></b>Centimeters into Meters$black<br/><br/>Convert $t1 centimeters, $t2 centimeters, and $t3 centimeters into meters.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 100 centimeters in one meter, we simply need to divide the number of centimeters by 100 to get the number of meters. Thus:<br/><br/>";
    echo "$t1 cm = ($t1 &div; 100) m = $vio $a1 m$black<br/>";
    echo "$t2 cm = ($t2 &div; 100) m = $vio $a2 m$black<br/>";
    echo "$t3 cm = ($t3 &div; 100) m = $vio $a3 m$black<br/>";
	}

if($i==3){
	$t1 = rand(2,10);
	$t2 = rand(11,20);
	$t3 = rand(21,30);
	$a1=$t1*1000;
	$a2=$t2*1000;
	$a3=$t3*1000;
	echo $red."Example # $i :<br/></b>Meters into Millimeters$black<br/><br/>Convert $t1 meters, $t2 meters, and $t3 meters into millimeters.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 1000 millimeters in one meter, we simply need to multiply the number of meters by 1000 to get the number of millimeters. Thus:<br/><br/>";
    echo "$t1 m = ($t1 x 1000) mm<br/>= $vio $a1 mm$black<br/><br/>";
    echo "$t2 m = ($t2 x 1000) mm<br/>= $vio $a2 mm$black<br/><br/>";
    echo "$t3 m = ($t3 x 1000) mm<br/>= $vio $a3 mm$black<br/>";
	}

if($i==4){
	$a1 = rand(2,10);
	$a2 = rand(11,20);
	$a3 = rand(21,30);
	$t1=$a1*1000;
	$t2=$a2*1000;
	$t3=$a3*1000;
	echo $red."Example # $i :<br/></b>Millimeters into Meters$black<br/><br/>Convert $t1 millimeters, $t2 millimeters, and $t3 millimeters into meters.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 1000 millimeters in one meter, we simply need to divide the number of millimeters by 1000 to get the number of meters. Thus:<br/><br/>";
    echo "$t1 mm = ($t1 &div; 1000) m<br/>= $vio $a1 m$black<br/><br/>";
    echo "$t2 mm = ($t2 &div; 1000) m<br/>= $vio $a2 m$black<br/><br/>";
    echo "$t3 mm = ($t3 &div; 1000) m<br/>= $vio $a3 m$black<br/>";
	}

if($i==5){
	$t1 = rand(2,7);
	$t2 = rand(8,15);
	$t3 = rand(16,25);
	$a1=$t1*1000;
	$a2=$t2*1000;
	$a3=$t3*1000;
	echo $red."Example # $i :<br/></b>Kilometers into Meters$black<br/><br/>Convert $t1 kilometers, $t2 kilometers, and $t3 kilometers into meters.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 1000 meters in one kilometer, we simply need to multiply the number of kilometers by 1000 to get the number of meters. Thus:<br/><br/>";
    echo "$t1 km = ($t1 x 1000) m = $vio $a1 m$black<br/>";
    echo "$t2 km = ($t2 x 1000) m = $vio $a2 m$black<br/>";
    echo "$t3 km = ($t3 x 1000) m = $vio $a3 m$black<br/>";
	}

if($i==6){
	$a1 = rand(2,7);
	$a2 = rand(8,15);
	$a3 = rand(16,25);
	$t1=$a1*1000;
	$t2=$a2*1000;
	$t3=$a3*1000;
	echo $red."Example # $i :<br/></b>Meters into Kilometers$black<br/><br/>Convert $t1 meters, $t2 meters, and $t3 meters into kilometers.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 1000 meters in one kilometer, we simply need to divide the number of meters by 1000 to get the number of kilometers. Thus:<br/><br/>";
    echo "$t1 m = ($t1 &div; 1000) km<br/>= $vio $a1 km$black<br/><br/>";
    echo "$t2 m = ($t2 &div; 1000) km<br/>= $vio $a2 km$black<br/><br/>";
    echo "$t3 m = ($t3 &div; 1000) km<br/>= $vio $a3 km$black<br/>";
	}

if($i==7){
	$t1 = rand(3,9);
	$t2 = rand(10,20);
	$t3 = rand(21,40);
	$a1=$t1*12;
	$a2=$t2*12;
	$a3=$t3*12;
	echo $red."Example # $i :<br/></b>Feet into Inches$black<br/><br/>Convert $t1 feet, $t2 feet, and $t3 feet into inches.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 12 inches in one foot, we simply need to multiply the number of feet by 12 to get the number of inches. Thus:<br/><br/>";
    echo "$t1 ft = ($t1 x 12) in = $vio $a1 in$black<br/>";
    echo "$t2 ft = ($t2 x 12) in = $vio $a2 in$black<br/>";
    echo "$t3 ft = ($t3 x 12) in = $vio $a3 in$black<br/>";
	}

if($i==8){
	$a1 = rand(3,9);
	$a2 = rand(10,20);
	$a3 = rand(21,40);
	$t1=$a1*12;
	$t2=$a2*12;
	$t3=$a3*12;
	echo $red."Example # $i :<br/></b>Inches into Feet$black<br/><br/>Convert $t1 inches, $t2 inches, and $t3 inches into feet.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 12 inches in one foot, we simply need to divide the number of inches by 12 to get the number of feet. Thus:<br/><br/>";
    echo "$t1 in = ($t1 &div; 12) ft = $vio $a1 ft$black<br/>";
    echo "$t2 in = ($t2 &div; 12) ft = $vio $a2 ft$black<br/>";
    echo "$t3 in = ($t3 &div; 12) ft = $vio $a3 ft$black<br/>";
	}

if($i==9){
	$t1 = rand(2,6);
	$t2 = rand(7,15);
	$t3 = rand(16,25);
	$a1=$t1*3;
	$a2=$t2*3;
	$a3=$t3*3;
	echo $red."Example # $i :<br/></b>Yards into Feet$black<br/><br/>Convert $t1 yards, $t2 yards, and $t3 yards into feet.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 3 feet in one yard, we simply need to multiply the number of yards by 3 to get the number of feet. Thus:<br/><br/>";
    echo "$t1 yds = ($t1 x 3) ft = $vio $a1 ft$black<br/>";
    echo "$t2 yds = ($t2 x 3) ft = $vio $a2 ft$black<br/>";
    echo "$t3 yds = ($t3 x 3) ft = $vio $a3 ft$black<br/>";
	}

if($i==10){
	$a1 = rand(2,6);
	$a2 = rand(7,15);
	$a3 = rand(16,25);
	$t1=$a1*3;
	$t2=$a2*3;
	$t3=$a3*3;
	echo $red."Example # $i :<br/></b>Feet into Yards$black<br/><br/>Convert $t1 feet, $t2 feet, and $t3 feet into yards.<br/><br/>";
    echo $vio."</b>Solution:<br/><br/>".$black;
    echo "Since there are 3 feet in one yard, we simply need to divide the number of feet by 3 to get the number of yards. Thus:<br/><br/>";
    echo "$t1 ft = ($t1 &div; 3) yds= $vio $a1 yds$black<br/>";
    echo "$t2 ft = ($t2 &div; 3) yds= $vio $a2 yds$black<br/>";
    echo "$t3 ft = ($t3 &div; 3) yds= $vio $a3 yds$black<br/>";
	}
    
echo "</td></tr></table>";
if ($i<11){echo "<br/>";}
}
	
?>