<?php

$grd=$grd;
$format=$format;

$lim=5;
if ($grd==4){$lim=3;}
if ($grd>=6){$lim=7;}
for ($i=1; $i<=$lim; $i+=1){
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


if ($grd>=6){
if($i==1){
	if (rand(1,2)==1){$ht = "head";} else {$ht = "tail";}
	$t = rand(5,25)*2;
	if ($grd<5){$t = rand(1,10)*2;}
    $ans=$t/2;
	echo $red."Example #".$i.$black."<br/><br/>Find the number of times a coin would land with its $ht up if you toss it in the air ".$vio.$t.$black." times.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "The theoretical probability (P) of a coin landing with its $ht up when tossed is 1/2 or 0.5.<br/><br/>";
    if ($ht=="head"){echo "# of Tosses Showing 'Heads'";} else{echo "# of Tosses Showing 'Tails'";}
    echo "<br/>= P x Total # of Tosses<br/>";
    echo "= 0.5 x $t<br/>";
    echo "= $ans<br/><br/>";
    echo "Thus, if you toss a coin in the air $t times, it would land with its $ht up ".$vio.$ans.$black." times.";
	}

if($i==2){
	$t = rand(11,30)*6;
	if ($grd<5){$t = rand(1,10)*6;}
    $ans=$t/6;
    $dnum=rand(1,6);
	echo $red."Example #".$i.$black."<br/><br/>Find the number of times a die would show a '$dnum' if you roll it ".$vio.$t.$black." times.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "The theoretical probability (P) of a die showing a '$dnum' when it is rolled is 1/6.<br/><br/>";
    echo "# of Die Rolls Showing a '$dnum'";
    echo "<br/>= P x Total # of Rolls<br/>";
    echo "= 1/6 x $t<br/>";
    echo "= $ans<br/><br/>";
    echo "Thus, if you roll a die $t times, it would show a '$dnum' ".$vio.$ans.$black." times.";
	}

if($i==3){
	$letter=chr(rand(65,70));
    $t=rand(5,30)*20;
    do{$p=rand(2,19)*5;}while($p<25 or $p>75);
    $f=$t*$p/100;
	echo $red."Example #".$i.$black."<br/><br/>A spinning wheel has 6 sectors that are labelled A to F."; 
	echo "<br/><br/>If you spin the wheel ".$vio.$t.$black." times and it stopped at the letter '$letter' ".$vio.$f.$black." times, find the experimental probability that it would ";
	$qopt=rand(1,2);
	if ($qopt==1){echo "stop at the letter '$letter' if you spin it again.<br/><br/>";}
	else{echo "not stop at the letter '$letter' if you spin it again.<br/><br/>";}
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "Probability of stopping at '$letter'<br/>= favorable outcomes / trials<br/>";
    echo "= $f / $t<br/>";
    echo "= ".($f/$t)." = ".$p."%<br/><br/>";
    if ($qopt==1){echo "Thus, based on the experiment, there's a  ".$vio.$p."%".$black." chance that the wheel would stop at the letter '$letter' if you spin it again.";}
    else{
    	echo "Probability of not stopping at '$letter'<br/>= 100% - $p% = ".(100-$p)."%<br/><br/>";
    	echo "Thus, based on the experiment, there's a  ".$vio.(100-$p)."%".$black." chance that the wheel would not stop at the letter '$letter' if you spin it again.";
    	}
	}

if($i==4){
	$letter=chr(rand(65,90));
	$p=rand(1,15)*5;
    $t=rand(5,30)*20;
    $f=$t*$p/100;
	echo $red."Example #".$i.$black."<br/><br/>The letters of the alphabet were written individually on cards. Some letters were written on more cards than others."; 
	echo "The cards were then placed inside a sack.";
	echo "<br/><br/>You then randomly pick a single card from the sack ".$vio.$t.$black." times, always returning the card back to the sack before picking again.<br/><br/>";
	echo "If you picked the letter '$letter' ".$vio.$f.$black." times, find the experimental probability that you would ";
	$qopt=rand(1,2);
	if ($qopt==1){echo "pick the letter '$letter' if you pick a card again.<br/><br/>";}
	else{echo "not pick the letter '$letter' if you pick a card again.<br/><br/>";}
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "Probability of picking '$letter'<br/>= favorable outcomes / trials<br/>";
    echo "= $f / $t<br/>";
    echo "= ".($f/$t)." = ".$p."%<br/><br/>";
    if ($qopt==1){echo "Thus, based on the experiment, there's a  ".$vio.$p."%".$black." chance that you would pick the letter '$letter' if you pick a card again.";}
    else{
    	echo "Probability of not picking '$letter'<br/>= 100% - $p% = ".(100-$p)."%<br/><br/>";
    	echo "Thus, based on the experiment, there's a  ".$vio.(100-$p)."%".$black." chance that you would not pick the letter '$letter' if you pick a card again.";
    	}
	}

if($i==5){
	$number=rand(1,20);
	$p=rand(1,15)*5;
    $t=rand(5,30)*20;
    $f=$t*$p/100;
	echo $red."Example #".$i.$black."<br/><br/>The numbers 1 to 20 were written individually on cards. Some numbers were written on more cards than others."; 
	echo "The cards were then placed inside a sack.";
	echo "<br/><br/>You then randomly pick a single card from the sack ".$vio.$t.$black." times, always returning the card back to the sack before picking again.<br/><br/>";
	echo "If you picked the number '$number' ".$vio.$f.$black." times, find the experimental probability that you would ";
	$qopt=rand(1,2);
	if ($qopt==1){echo "pick the number '$number' if you pick a card again.<br/><br/>";}
	else{echo "not pick the number '$number' if you pick a card again.<br/><br/>";}
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "Probability of picking '$number'<br/>= favorable outcomes / trials<br/>";
    echo "= $f / $t<br/>";
    echo "= ".($f/$t)." = ".$p."%<br/><br/>";
    if ($qopt==1){echo "Thus, based on the experiment, there's a  ".$vio.$p."%".$black." chance that you would pick the number '$number' if you pick a card again.";}
    else{
    	echo "Probability of not picking '$number'<br/>= 100% - $p% = ".(100-$p)."%<br/><br/>";
    	echo "Thus, based on the experiment, there's a  ".$vio.(100-$p)."%".$black." chance that you would not pick the number '$number' if you pick a card again.";
    	}
	}

if($i==6){
	$suit=rand(1,4);
	if ($suit==1){$suit="hearts";}
	if ($suit==2){$suit="diamonds";}
	if ($suit==3){$suit="clubs";}
	if ($suit==4){$suit="spades";}
	$t = rand(11,30)*4;
	if ($grd<5){$t = rand(1,10)*4;}
    $ans=$t/4;
	echo $red."Example #".$i.$black."<br/><br/>Say you have ".$vio.$t.$black." new decks of cards and you pick one card from each of them. ";
	echo "Find the number of cards you'd pick with a suit of '$suit'.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "The theoretical probability (P) of picking a card of '$suit' from a new deck of cards is 13/52 or 1/4.<br/><br/>";
    echo "# of '".(ucfirst($suit))."' Cards Picked";
    echo "<br/>= P x Total # of Card Picks<br/>";
    echo "= 1/4 x $t<br/>";
    echo "= $ans<br/><br/>";
    echo "Thus, you'd pick ".$vio.$ans.$black." cards of '$suit' if you pick one card each from $t new decks of cards.";
	}

if($i==7){
	$card="a '".rand(1,13)."'";
	if ($card==1){$card="an ace";}
	if ($card==8){$card="an '8'";}
	if ($card==11){$card="a jack";}
	if ($card==12){$card="a king";}
	if ($card==13){$card="a queen";}
	$t = rand(11,25)*13;
	if ($grd<5){$t = rand(1,10)*13;}
    $ans=$t/13;
	echo $red."Example #".$i.$black."<br/><br/>Say you have ".$vio.$t.$black." new decks of cards and you pick one card from each of them. ";
	echo "Find the number of cards you'd pick showing $card.<br/><br/>";
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "The theoretical probability (P) of picking a card showing $card from a new deck of cards is 4/52 or 1/13.<br/><br/>";
    echo "# of Cards Picked Showing $card";
    echo "<br/>= P x Total # of Card Picks<br/>";
    echo "= 1/13 x $t<br/>";
    echo "= $ans<br/><br/>";
    echo "Thus, you'd pick ".$vio.$ans.$black." cards showing $card if you pick one card each from $t new decks of cards.";
	}
}

if ($grd==5){
if($i==1){
	if (rand(1,2)==1){$ht = "head"; $nht="tail";} else {$ht = "tail"; $nht="head";}
    $t=rand(5,30)*20;
    do{$p=rand(2,19)*5;}while($p>40 and $p<60);
    $f=$t*$p/100;
	echo $red."Example #".$i.$black."<br/><br/>An unfair coin was tossed in the air ".$vio.$t.$black." times.<br/><br/>";
	echo "If it landed '".$ht."s' ".$vio.$f.$black." times, find the experimental probability that it would land '";
	$qopt=rand(1,2);
	if ($qopt==1){echo $ht."s' the next time it's thrown in the air.<br/><br/>";}
	else{echo $nht."s' the next time it's thrown in the air.<br/><br/>";}
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "Probability of landing '".$ht."s'<br/>= favorable outcomes / trials<br/>";
    echo "= $f / $t<br/>";
    echo "= ".($f/$t)." = ".$p."%<br/><br/>";
    if ($qopt==1){echo "Thus, based on the experiment, there's a  ".$vio.$p."%".$black." chance that the coin would land with its $ht up the next time it's thrown in the air.";}
    else{
    	echo "Probability of landing '".$nht."s'<br/>= 100% - $p% = ".(100-$p)."%<br/><br/>";
    	echo "Thus, based on the experiment, there's a  ".$vio.(100-$p)."%".$black." chance that the coin would land with its $nht up the next time it's thrown in the air.";
    	}
	}

if($i==2){
    $dnum=rand(1,6);
    $t=rand(5,30)*20;
    do{$p=rand(2,19)*5;}while($p<25 or $p>75);
    $f=$t*$p/100;
	echo $red."Example #".$i.$black."<br/><br/>You rolled an unfair die ".$vio.$t.$black." times.<br/><br/>";
	echo "If it showed the number '$dnum' ".$vio.$f.$black." times, find the experimental probability that it would ";
	$qopt=rand(1,2);
	if ($qopt==1){echo "show a '$dnum' if you roll it again.<br/><br/>";}
	else{echo "not show a '$dnum' if you roll it again.<br/><br/>";}
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "Probability of showing a '$dnum'<br/>";
    echo "= favorable outcomes / trials<br/>";
    echo "= $f / $t<br/>";
    echo "= ".($f/$t)." = ".$p."%<br/><br/>";
    if ($qopt==1){echo "Thus, based on the experiment, there's a  ".$vio.$p."%".$black." chance that the die would show a '$dnum' if you roll it again.";}
    else{
    	echo "Probability of not showing a '$dnum'<br/>= 100% - $p% = ".(100-$p)."%<br/><br/>";
    	echo "Thus, based on the experiment, there's a  ".$vio.(100-$p)."%".$black." chance that the die would not show a '$dnum' if you roll it again.";
    	}
	}

if($i==3){
	$letter=chr(rand(65,70));
    $t=rand(5,30)*20;
    do{$p=rand(2,19)*5;}while($p<25 or $p>75);
    $f=$t*$p/100;
	echo $red."Example #".$i.$black."<br/><br/>A spinning wheel has 6 sectors that are labelled A to F."; 
	echo "<br/><br/>If you spin the wheel ".$vio.$t.$black." times and it stopped at the letter '$letter' ".$vio.$f.$black." times, find the experimental probability that it would ";
	$qopt=rand(1,2);
	if ($qopt==1){echo "stop at the letter '$letter' if you spin it again.<br/><br/>";}
	else{echo "not stop at the letter '$letter' if you spin it again.<br/><br/>";}
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "Probability of stopping at '$letter'<br/>= favorable outcomes / trials<br/>";
    echo "= $f / $t<br/>";
    echo "= ".($f/$t)." = ".$p."%<br/><br/>";
    if ($qopt==1){echo "Thus, based on the experiment, there's a  ".$vio.$p."%".$black." chance that the wheel would stop at the letter '$letter' if you spin it again.";}
    else{
    	echo "Probability of not stopping at '$letter'<br/>= 100% - $p% = ".(100-$p)."%<br/><br/>";
    	echo "Thus, based on the experiment, there's a  ".$vio.(100-$p)."%".$black." chance that the wheel would not stop at the letter '$letter' if you spin it again.";
    	}
	}

if($i==4){
	$letter=chr(rand(65,90));
	$p=rand(1,15)*5;
    $t=rand(5,30)*20;
    $f=$t*$p/100;
	echo $red."Example #".$i.$black."<br/><br/>The letters of the alphabet were written individually on cards. Some letters were written on more cards than others."; 
	echo "The cards were then placed inside a sack.";
	echo "<br/><br/>You then randomly pick a single card from the sack ".$vio.$t.$black." times, always returning the card back to the sack before picking again.<br/><br/>";
	echo "If you picked the letter '$letter' ".$vio.$f.$black." times, find the experimental probability that you would ";
	$qopt=rand(1,2);
	if ($qopt==1){echo "pick the letter '$letter' if you pick a card again.<br/><br/>";}
	else{echo "not pick the letter '$letter' if you pick a card again.<br/><br/>";}
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "Probability of picking '$letter'<br/>= favorable outcomes / trials<br/>";
    echo "= $f / $t<br/>";
    echo "= ".($f/$t)." = ".$p."%<br/><br/>";
    if ($qopt==1){echo "Thus, based on the experiment, there's a  ".$vio.$p."%".$black." chance that you would pick the letter '$letter' if you pick a card again.";}
    else{
    	echo "Probability of not picking '$letter'<br/>= 100% - $p% = ".(100-$p)."%<br/><br/>";
    	echo "Thus, based on the experiment, there's a  ".$vio.(100-$p)."%".$black." chance that you would not pick the letter '$letter' if you pick a card again.";
    	}
	}

if($i==5){
	$number=rand(1,20);
	$p=rand(1,15)*5;
    $t=rand(5,30)*20;
    $f=$t*$p/100;
	echo $red."Example #".$i.$black."<br/><br/>The numbers 1 to 20 were written individually on cards. Some numbers were written on more cards than others."; 
	echo "The cards were then placed inside a sack.";
	echo "<br/><br/>You then randomly pick a single card from the sack ".$vio.$t.$black." times, always returning the card back to the sack before picking again.<br/><br/>";
	echo "If you picked the number '$number' ".$vio.$f.$black." times, find the experimental probability that you would ";
	$qopt=rand(1,2);
	if ($qopt==1){echo "pick the number '$number' if you pick a card again.<br/><br/>";}
	else{echo "not pick the number '$number' if you pick a card again.<br/><br/>";}
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "Probability of picking '$number'<br/>= favorable outcomes / trials<br/>";
    echo "= $f / $t<br/>";
    echo "= ".($f/$t)." = ".$p."%<br/><br/>";
    if ($qopt==1){echo "Thus, based on the experiment, there's a  ".$vio.$p."%".$black." chance that you would pick the number '$number' if you pick a card again.";}
    else{
    	echo "Probability of not picking '$number'<br/>= 100% - $p% = ".(100-$p)."%<br/><br/>";
    	echo "Thus, based on the experiment, there's a  ".$vio.(100-$p)."%".$black." chance that you would not pick the number '$number' if you pick a card again.";
    	}
	}

}

if ($grd==4){
if($i==1){
	if (rand(1,2)==1){$ht = "head"; $nht="tail";} else {$ht = "tail"; $nht="head";}
    $t=rand(5,30)*20;
    do{$p=rand(2,19)*5;}while($p>40 and $p<60);
    $f=$t*$p/100;
	echo $red."Example #".$i.$black."<br/><br/>An unfair coin was tossed in the air ".$vio.$t.$black." times.<br/><br/>";
	echo "If it landed '".$ht."s' ".$vio.$f.$black." times, find the probability that it would land '";
	$qopt=rand(1,2);
	if ($qopt==1){echo $ht."s' the next time it's thrown in the air.<br/><br/>";}
	else{echo $nht."s' the next time it's thrown in the air.<br/><br/>";}
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "Probability of landing '".$ht."s'<br/>";
    echo "= $f / $t<br/>";
    echo "= ".($f/$t)." = ".$p."%<br/><br/>";
    if ($qopt==1){echo "Thus, based on the experiment, there's a  ".$vio.$p."%".$black." chance that the coin would land with its $ht up the next time it's thrown in the air.";}
    else{
    	echo "Probability of landing '".$nht."s'<br/>= 100% - $p% = ".(100-$p)."%<br/><br/>";
    	echo "Thus, based on the experiment, there's a  ".$vio.(100-$p)."%".$black." chance that the coin would land with its $nht up the next time it's thrown in the air.";
    	}
	}

if($i==2){
    $dnum=rand(1,6);
    $t=rand(5,30)*20;
    do{$p=rand(2,19)*5;}while($p<25 or $p>75);
    $f=$t*$p/100;
	echo $red."Example #".$i.$black."<br/><br/>You rolled an unfair die ".$vio.$t.$black." times.<br/><br/>";
	echo "If it showed the number '$dnum' ".$vio.$f.$black." times, find the probability that it would ";
	$qopt=rand(1,2);
	if ($qopt==1){echo "show a '$dnum' if you roll it again.<br/><br/>";}
	else{echo "not show a '$dnum' if you roll it again.<br/><br/>";}
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "Probability of showing a '$dnum'<br/>";
    echo "= $f / $t<br/>";
    echo "= ".($f/$t)." = ".$p."%<br/><br/>";
    if ($qopt==1){echo "Thus, based on the experiment, there's a  ".$vio.$p."%".$black." chance that the die would show a '$dnum' if you roll it again.";}
    else{
    	echo "Probability of not showing a '$dnum'<br/>= 100% - $p% = ".(100-$p)."%<br/><br/>";
    	echo "Thus, based on the experiment, there's a  ".$vio.(100-$p)."%".$black." chance that the die would not show a '$dnum' if you roll it again.";
    	}
	}

if($i==3){
	$letter=chr(rand(65,70));
    $t=rand(5,30)*20;
    do{$p=rand(2,19)*5;}while($p<25 or $p>75);
    $f=$t*$p/100;
	echo $red."Example #".$i.$black."<br/><br/>A spinning wheel has 6 sectors that are labelled A to F."; 
	echo "<br/><br/>If you spin the wheel ".$vio.$t.$black." times and it stopped at the letter '$letter' ".$vio.$f.$black." times, find the probability that it would ";
	$qopt=rand(1,2);
	if ($qopt==1){echo "stop at the letter '$letter' if you spin it again.<br/><br/>";}
	else{echo "not stop at the letter '$letter' if you spin it again.<br/><br/>";}
    echo $red."</b>Solution:<br/><br/>".$black;
    echo "Probability of stopping at '$letter'<br/>";
    echo "= $f / $t<br/>";
    echo "= ".($f/$t)." = ".$p."%<br/><br/>";
    if ($qopt==1){echo "Thus, based on the experiment, there's a  ".$vio.$p."%".$black." chance that the wheel would stop at the letter '$letter' if you spin it again.";}
    else{
    	echo "Probability of not stopping at '$letter'<br/>= 100% - $p% = ".(100-$p)."%<br/><br/>";
    	echo "Thus, based on the experiment, there's a  ".$vio.(100-$p)."%".$black." chance that the wheel would not stop at the letter '$letter' if you spin it again.";
    	}
	}

}

echo "</td></tr></table>";
if ($i<($lim+1)){echo "<br/>";}
}
	
?>