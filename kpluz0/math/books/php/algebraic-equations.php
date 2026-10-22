<?php

$grd=$grd;
$format=$format;

$vio="<font color='#800080'><b>";
$blue="<font color='#0000CC'><b>";
$red="<font color='#CC0000'><b>";
$black="<font color='#000000'></b>";

		
for ($i=1; $i<=20; $i+=1){

	echo "<table align='center' width='90%' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>";
	echo "<tr><td align='left'>";	
	echo "<p style='margin-left: 30px; margin-right: 30px; margin-top: 30px; margin-bottom: 30px;'>"; 

	if ($format==1){echo "<span lang='EN-US' style='font-size: 16pt'>";}
	else{echo "<span lang='EN-US' style='font-size: 36pt'>";}

	echo $red."Example #".$i.$black."<br/><br/>";
	
	do {$v1=rand(97,121);} while ($v1==108);
	$v2=$v1+1;
	$var1=chr($v1);
	$var2=chr($v2);

	$coeff=rand(2,9);
	if ($coeff==2){$scoeff="twice";}		
	if ($coeff==3){$scoeff="thrice";}		
	if ($coeff>3){$scoeff=$coeff." times ";}		
	
	$coeff2=rand(2,9);
	if ($coeff2==2){$scoeff2="twice";}		
	if ($coeff2==3){$scoeff2="thrice";}		
	if ($coeff2>3){$scoeff2=$coeff2." times ";}		
	
	$exp=rand(2,9);
	if ($exp==2){$texp="squared";}		
	if ($exp==3){$texp="cubed";}		
	if ($exp>3){$texp="raised to the ".$exp."th power";}		
	
	$const=rand(1,19);
	$const2=rand(1,19);
	$fac=rand(2,9);
	
	$eq=rand(($i*11),($i*25));
	if(rand(1,2)==1){$seq=" equals ";}else{$seq=" is equal to ";}
	$veq=$seq.$eq.".";
	$aeq=" = ".$eq;
	
	// 1 variable
	if ($i==1){$vexp=$scoeff." a number plus ".$const; $aexp=$coeff.$var1." + ".$const;}		
	if ($i==2){$vexp=$scoeff." a number minus ".$const; $aexp=$coeff.$var1." - ".$const;}		
	if ($i==3){$vexp=$scoeff." a number increased by ".$const; $aexp=$coeff.$var1." + ".$const;}		
	if ($i==4){$vexp=$scoeff." a number decreased by ".$const; $aexp=$coeff.$var1." - ".$const;}		
	if ($i==5){$vexp=$const." added to ".$scoeff." a number "; $aexp=$coeff.$var1." + ".$const;}		
	if ($i==6){$vexp=$const." subtracted from ".$scoeff." a number "; $aexp=$coeff.$var1." - ".$const;}		
	if ($i==7){$vexp=$const." more than ".$scoeff." a number "; $aexp=$coeff.$var1." + ".$const;}		
	if ($i==8){$vexp=$const." less than ".$scoeff." a number "; $aexp=$coeff.$var1." - ".$const;}		
	if ($i==9){$vexp="the sum of ".$scoeff." a number and ".$const; $aexp=$coeff.$var1." + ".$const;}	
	if ($i==10){$vexp="the difference between ".$scoeff." a number and ".$const; $aexp=$coeff.$var1." - ".$const;}	
	if ($i==11){$vexp="the sum of ".$scoeff." a number and ".$const.", if multiplied by ".$fac.", "; $aexp=$fac."(".$coeff.$var1." + ".$const.")";}		
	if ($i==12){$vexp="the sum of ".$scoeff." a number and ".$const.", if divided by ".$fac.", "; $aexp="(".$coeff.$var1." + ".$const.")/".$fac;}	
	if ($i==13){$vexp=$fac." times the sum of ".$scoeff." a number and ".$const; $aexp=$fac."(".$coeff.$var1." + ".$const.")";}			
	if ($i==14){$vexp="the sum of ".$scoeff." a number and ".$const.", if ".$texp.", "; $aexp="(".$coeff.$var1." + ".$const.")<sup>".$exp."</sup>";}		
	if ($i==15){$vexp="the difference between ".$scoeff." a number and ".$const.", if ".$texp.", "; $aexp="(".$coeff.$var1." - ".$const.")<sup>".$exp."</sup>";}		
	// 2 variables
	if ($i==16){
		$optr=rand(1,4);
		if($optr==1){$result="sum of"; $sign=" + ";} 
		if($optr==2){$result="difference between"; $sign=" - ";} 
		if($optr==3){$result="product of"; $sign="";} 
		if($optr==4){$result="quotient of"; $sign=" / ";} 
		$vexp="The ".$result." two numbers plus ".$const." is "; $veq=$eq."."; $aexp=$var1.$sign.$var2." + ".$const;
		}		
	if ($i==17){$vexp=$scoeff." a number minus ".$scoeff2." another number, if divided by ".$const.", "; $aexp="(".$coeff.$var1." - ".$coeff2.$var2.")/".$const;}		
	if ($i==18){$vexp=$scoeff." a number plus ".$scoeff2." another number, if ".$texp.", "; $aexp="(".$coeff.$var1." + ".$coeff2.$var2.")<sup>".$exp."</sup>";}		
	if ($i==19){$vexp=$scoeff." a number plus ".$const; $aexp=$coeff.$var1." + ".$const; $veq=$seq.$scoeff2." another number minus ".$const2."."; $aeq=" = ".$coeff2.$var2." - ".$const2;}		
	if ($i==20){$vexp=$scoeff." the product of two numbers minus ".$const; $aexp=$coeff.$var1.$var2." - ".$const; $veq=$seq.$scoeff2." the first number plus ".$const2."."; $aeq=" = ".$coeff2.$var1." + ".$const2;}		
		
	if ($i<=15){echo "Using ".$blue."'".$var1."'".$black." as your variable, translate the following verbal equation into an algebraic equation:";}
	else{echo "Using ".$blue."'".$var1."'".$black." and ".$blue."'".$var2."'".$black." as your variables, translate the following verbal equation into an algebraic equation:";}
	echo "<br/><br/>".$vio.(ucfirst($vexp)).$veq.$black;
	echo "<br/><br/>"."Answer: ".$blue.$aexp.$aeq.$black;

	echo "</td></tr></table><br/>";
	}
 
	
?>