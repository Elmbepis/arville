<?php

$grd=$grd;
$format=$format;

$words1=array(
	"angry", "brave", "bright", "broad", "bumpy", "cheap", "crazy", "curly", "dear", "dirty", "early", 
	"fierce", "fresh", "funny", "glad*", "great", "harsh", "healthy", "juicy", "large", "late", "lively", 
	"lonely", "lucky", "meaty", "messy", "near", "neat", "needy", "new", "nice", "noisy", "odd", "pale", 
	"proud", "quick", "quiet", "rainy", "rare", "red*", "rough", "salty", "scary", "shaky", "shiny", 
	"silly", "small", "smart", "smooth", "spicy", "steep", "tasty", "thick", "tight", "tough",
	);
$words2=array(
	"ancient", "beautiful", "brilliant", "cheerful", "dangerous", "difficult", "enjoyable", "foolish", 
	"forgetful", "frightening", "generous", "helpful", "intelligent", "interesting", "nervous", "pleasant",
	"powerful", "thoughtful", "useful", "valuable", "wonderful",
	);
	
if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:16pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:14pt;color:#000000'>"; 
	echo $tfont1;}
else{
	$tfont1="<span lang='EN-US' style='font-size:31pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:31pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:31pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:28pt;color:#000000'>"; 
	echo $tfont1;}
	
echo "<table align='center' width='900' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'><tr>";
echo "<td align='center' width='270'><p style='margin-top: 10px; margin-bottom: 10px;'>".$tfont3."<b>Positive</b></td>";
echo "<td align='center' width='300'><p style='margin-top: 10px; margin-bottom: 10px;'>".$tfont3."<b>Comparative</b></td>";
echo "<td align='center' width='330'><p style='margin-top: 10px; margin-bottom: 10px;'>".$tfont3."<b>Superlative</b></td></tr><tr>";

$count=count($words1)-1;	
for ($j=0; $j<=$count; $j+=1){
	echo "<td align='center' width='270'>";	
	echo "<p style='margin-left: 5px; margin-right: 5px; margin-top: 5px; margin-bottom: 5px;'>"; 
	if(isset($words1[$j]) and $j<=$count){
		echo str_replace("*","",$tfont1.$words1[$j])."</td>";
		if (substr($words1[$j],-1)=="e"){$base=$words1[$j];}
		else{
			if (substr($words1[$j],-1)=="y"){$base=substr($words1[$j],0,(strlen($words1[$j])-1)); $base=$base."ie";}
			else{$base=$words1[$j]."e";}
			}
		$base=str_replace("*","d",$base);	
		echo "<td align='center' width='300'>".$tfont1.$base."r"."</td>";
		echo "<td align='center' width='330'>".$tfont1.$base."st"."</td>";
		}
	echo "</tr><tr>";
	}

$count=count($words2)-1;	
for ($j=0; $j<=$count; $j+=1){
	echo "<td align='center' width='270'>";	
	echo "<p style='margin-left: 5px; margin-right: 5px; margin-top: 5px; margin-bottom: 5px;'>"; 
	if(isset($words2[$j]) and $j<=$count){
		echo $tfont4.$words2[$j]."</td>";
		echo "<td align='center' width='300'>".$tfont4."more ".$words2[$j]."</td>";
		echo "<td align='center' width='330'>".$tfont4."most ".$words2[$j]."</td>";
		}
	echo "</tr><tr>";
	}
	
echo "</tr></table>";
		
	
?>