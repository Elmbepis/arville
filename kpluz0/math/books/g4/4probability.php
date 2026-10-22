<?php

$grd=$grd;
$title="Simple Probability<br/>Experiments";
$img1="images/probability1.jpg";
$img2="images/probability2.jpg";

$tally1="<img border='0' src='../books/images/tally1.jpg'>";
$tally2="<img border='0' src='../books/images/tally2.jpg'>";
$tally3="<img border='0' src='../books/images/tally3.jpg'>";
$tally4="<img border='0' src='../books/images/tally4.jpg'>";
$tally5="<img border='0' src='../books/images/tally5.jpg'>";
$tallyd="<img border='0' src='../books/images/tally-dash.jpg'>";

$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000CC'>";
$red=$font."<font color='#CC0000'>";
$black=$font."<font color='#000000'>";

if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#BB0000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:18pt;color:#800080'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:29pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:29pt;color:#BB0000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	}

$article="
Is there a chance of rain this weekend?
What's your chance of winning the lottery?
What are the odds of bumping into your friend at the mall?
A lot of things in life happen by chance.
<br/><br/>
Things that happen are called events.
The chance that an event would happen is called probability.
In this lesson, we will learn the mathematics of probability.
<br/><br/>
Let us first review some words that we use to express probability, or the likelihood that an event would happen:
<br/><br/>
$vio certain $black- the event would definitely happen 
<br/><br/>
$vio likely $black- the chance that the event would happen is greater than the chance that it wouldn't
<br/><br/>
$vio equally likely $black- two events have equal chances of happening
<br/><br/>
$vio unlikely $black- the chance that the event would not happen is greater than the chance that it would
<br/><br/>
$vio impossible $black- the event would definitely not happen
<br/><br/>
The words above are often enough to express whether an event is likely to happen or not. 
However, they don't say how certain it is that the event would or would not happen.
<br/><br/>
Fortunately, we can do experiments and apply math to determine the probabilities of some events more accurately. 
<br/><br/><br/>
@blue
Performing Simple<br/>Probability Experiments
@nblue
<br/>
We can perform simple probability experiments to find out the probability of an event happening.
To understand what this means, let's take a look at a few simple experiments on probability.
<br/><br/>
$red Experiment # 1:<br/><u>Tossing a  Coin</u>$black
<br/><br/>
Say that you had an old coin and you wanted to know the probability that it would land with its head up when it's tossed in the air.
<br/><br/>
To find out, you tossed the coin 50 times and made a tally of how many times it landed 'heads' and how many times it landed 'tails'.
This is the tally that you made:
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Coin Toss Results </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center' width = '20%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>&nbsp;Outcome&nbsp;</b></td>
<td align='center' width = '50%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Tally</b></td>
<td align='center' width = '30%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Probability</b></td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 'Heads'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally5</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 30/50 = 60%</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 'Tails'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally5</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 20/50 = 40%</td>
</tr></table>
<br/><br/>
Based on the table above, your old coin landed 'heads' 60% of the time and landed 'tails' only 40% of the time. 
Thus, your coin is a bit more likely to land 'heads' than land 'tails'.
<br/><br/>
You may then predict that if you toss the same coin in the air again, there's a 60% chance that it would land 'heads'.
This is the likelihood or probability of your coin landing 'heads'.
<br/><br/>
A coin that's fair has the same likelihood of landing 'heads' as landing 'tails'.
This means that it lands 'heads' 50% of the time and lands 'tails' the other 50% of the time. 
<br/><br/>
Your old coin is therefore an unfair coin because it lands 'heads' more often than it lands 'tails'.
<br/><br/>
As we saw in the experiment above, tossing a coin has two possible results: 'heads' or 'tails'.
These are said to be the possible outcomes of tossing a coin.
<br/><br/>
When performing a probability experiment, you must always be aware of its possible outcomes. 
<br/><br/>
$red Experiment # 2:<br/><u>Rolling a Die</u>$black
<br/><br/>
Rolling a die has 6 possible outcomes: '1', '2', '3', '4', '5', and '6'.
<br/><br/>
If a die is fair, each of these outcomes has an equal chance of happening.
The probability of a particular number showing up when you roll a fair die is 1/6.
<br/><br/>
Say you had a worn-out die and you wanted to know if it was still a fair die or not anymore.
<br/><br/>
To find out, you rolled the die 60 times and made a tally of how many times it showed each number.
This is the tally that you made:
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Die Rolling Results </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center' width = '25%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>&nbsp;Outcome&nbsp;</b></td>
<td align='center' width = '40%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Tally</b></td>
<td align='center' width = '35%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Probability</b></td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 '1'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 5/60 = 8%</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 '2'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally1$tally1$tally1</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 8/60 = 13%</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 '3'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally1$tally1</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 7/60 = 12%</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 '4'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally1</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 21/60 = 35%</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 '5'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 10/60 = 17%</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 '6'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally1$tally1$tally1$tally1</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 9/60 = 15%</td>
</tr></table>
<br/><br/>
You can easily see from the table above that your worn-out die is no longer fair. 
In fact, if you roll it again, there's a 35% chance that it would show the number '4'.
<br/><br/>
On the other hand, getting a '1' from this die is the most unlikely outcome, having a probability of just 8%.
<br/><br/>
$red Experiment # 3:<br/><u>Spinning a Wheel</u>$black
<br/><br/>
A spinning wheel is divided into 5 unequal sectors that are marked 'A' to 'E'.
When spun, the wheel may stop spinning at any of its 5 sectors.
Thus, it has 5 possible outcomes: 'A', 'B', 'C', 'D', and 'E'.  
<br/><br/>
Say that you spun this wheel 50 times and then made a tally of how often it stopped at a particular number.
This is the tally that you made:
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Wheel Spinning Results </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center' width = '25%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>&nbsp;Outcome&nbsp;</b></td>
<td align='center' width = '40%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Tally</b></td>
<td align='center' width = '35%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Probability</b></td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 'A'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 10/50 = 20%</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 'B'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally5</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 15/50 = 30%</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 'C'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 5/50 = 10%</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 'D'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 10/50 = 20%</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 'E'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 10/50 = 20%</td>
</tr></table>
<br/><br/>
You can easily see from the table above that the wheel has the greatest tendency to stop at 'B' and the least tendency to stop at 'C'. 
<br/><br/>
Based on this, you may conclude that the largest sector of the wheel is sector 'B' while its smallest sector is sector 'C'.
<br/><br/>
$red Experiment # 4:<br/><u>Shooting Free Throws</u>$black
<br/><br/>
A basketball player shot 50 free throws.
The results of his shooting is given by the following table:
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Free Throw Shooting Results </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='90%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center' width = '55%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>&nbsp;Outcome&nbsp;</b></td>
<td align='center' width = '45%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Total</b></td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Made Shots</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 32</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Missed Shots</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 18</td>
</tr></table>
<br/><br/>
Find the probability that the basketball player would make his next shot.
<br/><br/>
$red Solution:$black
<br/><br/>
Probability of making his next shot<br/>= 32/50 = $vio 0.64 $black = $vio 64% $black
<br/><br/>
Thus, the probability that the basketball player would make his next shot is $vio 64%$black. 
<br/><br/>
Now, find the probability that the basketball player would miss his next shot.
<br/><br/>
$red Solution:$black
<br/><br/>
Probability of missing his next shot<br/>= 18/50 = $vio 0.36 $black = $vio 36% $black
<br/><br/>
Note that the probability of the player missing his next shot is equal to 100% minus the probability of him making his next shot.
Thus, here's another solution to our last problem:
<br/><br/>
Probability of missing his next shot<br/>= 100% - 64% = $vio 36% $black
<br/><br/>
Let us now look at more examples of how to calculate probabilities.
<br/><br/><br/>
@blue
More Examples of<br/>Calculating Probabilities
@nblue
<br/>
@php1probability@
<br/>
If you refresh this page, it will give new examples of how to calculate probabilities. 
You can therefore have as many examples as you want for this lesson! 
<br/><br/>
You can use this feature to practice calculating probabilities. 
"
?>




















