<?php

$grd=$grd;
$format=$format;

$primes = array(2,3,5,7,11,13);

for ($i=1; $i<=5; $i+=1){

	if ($i==1){$num1=rand(1,2); $gcflim1=2; $gcflim2=29; $numlim=200;}
	if ($i==2 or $i==3){$num1=rand(2,3); $gcflim1=30; $gcflim2=79; $numlim=700;}
	if ($i>=4){$num1=rand(3,4); $gcflim1=80; $gcflim2=200; $numlim=1200;}
	do{
		$gcf=1;
		for ($j=1; $j<=$num1; $j+=1){
			$fac=$primes[rand(0,(count($primes)-1))];
			$gcf=$gcf*$fac;			
			}
		}			
	while ($gcf<$gcflim1 or $gcf>$gcflim2);	
	
	do{$numa=$primes[rand(0,(count($primes)-1))]; $num1=$gcf*$numa;} while($num1>$numlim);
	do{$numb=rand(2,20); $num2=$gcf*$numb;} while($num2==$num1 or $num2>$numlim  or $numb%$numa==0);
		
	//echo $i.". ".$gcf."=".$num1."=".$num2."<br/>";
	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 
	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}
	echo "<font color='#CC0000'><b>Example #".$i."</b><br/><br/>";
	do {$opt=rand(1,14); $sopt="*".$opt;} while(strpos($allopt,$sopt)>0);
	$allopt="*".$sopt.$allopt;
	if ($opt==1){$obj1="blue balls"; $obj2="red balls"; $place="in the gym";}
	if ($opt==2){$obj1="guppies"; $obj2="mollies"; $place="in an aquarium";}
	if ($opt==3){$obj1="pebbles"; $obj2="shells"; $place="in a bucket";}
	if ($opt==4){$obj1="gold coins"; $obj2="silver coins"; $place="in a bank's vault";}
	if ($opt==5){$obj1="birds"; $obj2="reptiles"; $place="in a zoo";}
	if ($opt==6){$obj1="plates"; $obj2="bowls"; $place="in the warehouse";}
	if ($opt==7){$obj1="cars"; $obj2="vans"; $place="in the parking lot";}
	if ($opt==8){$obj1="boys"; $obj2="girls"; $place="studying in our school";}
	if ($opt==9){$obj1="apples"; $obj2="oranges"; $place="at a fruit stand";}
	if ($opt==10){$obj1="paper clips"; $obj2="rubber bands"; $place="inside a drawer";}
	if ($opt==11){$obj1="books"; $obj2="magazines"; $place="in the library";}
	if ($opt==12){$obj1="duhat trees"; $obj2="santol trees"; $place="in a fruit orchard";}
	if ($opt==13){$obj1="white shirts"; $obj2="black shirts"; $place="in my bedroom";}
	if ($opt==14){$obj1="chickens"; $obj2="ducks"; $place="at a poultry farm";}
	echo "<font color='#000000'>If there are ".$num1." ".$obj1." and ".$num2." ".$obj2." ".$place.", what is the simplest expression of their ratio?";
	echo "<font color='#800080'><br/><br/>Step 1. Express the ratio.<font color='#000000'><br/><br/>";
	echo "The ratio of ".$obj1." to ".$obj2." is ".$num1.":".$num2.".";
	echo "<font color='#800080'><br/><br/>Step 2. Get the GCF of the numbers.<font color='#000000'><br/><br/>";
	echo "The GCF of ".$num1." and ".$num2." is ".$gcf.".";
	echo "<font color='#800080'><br/><br/>Step 3. Divide the numbers by their GCF.<font color='#000000'><br/><br/>";
	//echo $num1." divided by ".$gcf." equals ".$numa." while ".$num2." divided by ".$gcf." equals ".$numb.".";
	echo $num1." / ".$gcf." = <font color='#0000CC'><b>".$numa."</b><font color='#000000'> while ".$num2." / ".$gcf." = <font color='#0000CC'><b>".$numb."</b><font color='#000000'>.";
    echo "<br/><br/>Thus, the ratio of ".$obj1." to ".$obj2." in simplest form is <font color='#0000CC'><b>".$numa.":".$numb."</b><font color='#000000'>.";  
	echo "</td></tr></table><br/>";
	}
	
?>