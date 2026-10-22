<?php

$grd=$grd;
$title="Experimental Probability";
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
A lot of things in life happen by chance.
If you toss a coin in the air, there's a chance that it would land with the head up and there's also an equal chance that it would land with the tail up.
<br/><br/>
The chance that an event would happen is called probability.
In this lesson, we will learn the mathematics of probability.
<br/><br/>
Let us first review some words that we use to convey the probability that an event would happen:
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
Although the words above are often enough to express the probability of simple events happening in our daily lives, 
they don't say much about the level of certainty that an event would happen.
<br/><br/>
Fortunately, we can apply math to calculate the probability of an event happening.
This allows us to come up with a number that expresses the probability of the event more objectively and accurately. 
<br/><br/>
$vio<u>Definition of Experimental Probability</u>$black
<br/><br/>
Say that you had an old coin and you wanted to know the probability that it would land with its head up when it's tossed in the air.
<br/><br/>
To find out, you tossed the coin 100 times and made a tally of how many times it landed 'heads' and how many times it landed 'tails'.
This is the tally that you made:
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Coin Toss Results </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center' width = '25%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>&nbsp;Outcome&nbsp;</b></td>
<td align='center' width = '45%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Tally</b></td>
<td align='center' width = '30%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Total</b></td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 'Heads'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally5$tallyd<br/>$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally5$tallyd<br/>$tally5$tallyd$tally1$tally1</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 47</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 'Tails'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally5$tallyd<br/>$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally5$tallyd<br/>$tally5$tallyd$tally5$tallyd$tally1$tally1$tally1</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 53</td>
</tr></table>
<br/><br/>
Based on the table above, your old coin landed 'heads' only 47% of the time and landed 'tails' 53% of the time. 
Thus, your coin is a little bit more likely to land 'tails' than land 'heads'.
<br/><br/>
You may then predict that if you toss the same coin in the air again, there's only a 47% chance that it would land 'heads'.
This is the experimental probability of your coin landing 'heads'.
<br/><br/>
We may therefore define the experimental probability of an event as the likelihood that the specified event would occur based on the results of previous experiments.
<br/><br/><br/>
@blue
Calculating Experimental Probabilities
@nblue
<br/>
The event that you want to know the probability of, such as the coin landing 'heads' in the example above, is called the favorable outcome of the experiment.
<br/><br/>
The number of times you did the experiment, such as the number of times you tossed the coin, is called the number of trials.
<br/><br/>
In our activity above, we got 47 favorable outcomes out of 100 trials, or an experimental probability of 47% that the coin would land 'heads' if tossed. 
<br/><br/>
Here, then, is the formula for experimental probability:
<br/><br/><br/>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'><tr><td>
<table width='95%' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0'>
<tr><td align='center' width = '15%' style='padding-right:5px; padding-left:15px; padding-top:5px; padding-bottom:5px' rowspan='3'>$tfont2 <b>Experimental Probability</b></td>
<td align='center' width = '10%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px' rowspan='3'>$tfont1 <b> = </b></td>
<td align='center' width = '75%' style='padding-right:5px; padding-left:5px; padding-top:20px; padding-bottom:5px'>$tfont1 <b># of Favorable Outcomes</b></td>
<tr><td background='../../images/books-frac-line1.jpg'>&nbsp;</td></tr>
<tr><td align='center'style='padding-right:15px; padding-left:5px; padding-top:5px; padding-bottom:20px'>$tfont1 <b># of Trials</b></td>
</tr></table>
</td></tr></table>
<br/><br/>
This formula gives us another definition of experimental probability: the ratio of the number of favorable outcomes to the total number of trials in an experiment.
<br/><br/>
$red<u>Example # 1</u>$black
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
Find the experimental probability that the basketball player would make his next shot.
<br/><br/>
$red Solution:$black
<br/><br/>
# of favorable outcomes = 32<br/>
# of trials = 50<br/>
Probability of making his next shot<br/>= 32/50 = $vio 0.64 $black = $vio 64% $black
<br/><br/>
Thus, the experimental probability that the basketball player would make his next shot is $vio 64%$black. 
<br/><br/>
Now, find the experimental probability that the basketball player would miss his next shot.
<br/><br/>
$red Solution:$black
<br/><br/>
The probability of getting an unfavorable outcome is equal to 100% minus the probability of getting a favorable outcome.
Thus:
<br/><br/>
Probability of missing his next shot<br/>= 100% - 64% = 36% $black
<br/><br/>
Let us now look at more examples of how to calculate experimental probabilities.
In some of the examples below, you'd encounter the terms 'unfair coin' and 'unfair die'.
<br/><br/>
A coin is unfair if it lands 'heads' more frequently than 'tails' or vice versa.
A die is unfair if it shows a particular number more frequently than others. 
<br/><br/><br/>
@blue
More Examples of Calculating<br/>Experimental Probabilities
@nblue
<br/>
@php1probability@
<br/>
If you refresh this page, it will give new examples of how to calculate experimental probabilities. 
You can therefore have as many examples as you want for this lesson! 
<br/><br/>
You can use this feature to practice calculating experimental probabilities. 
"
?>




















