<?php

$grd=$grd;
$title="Experimental and<br/>Theoretical Probability";
$img1="images/probability1.jpg";
$img2="images/probability2.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000CC'>";
$red=$font."<font color='#CC0000'>";
$black=$font."<font color='#000000'>";

if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#BB0000'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:29pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:29pt;color:#BB0000'>"; 
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
<br/><br/><br/>
@blue
Calculating Probabilities
@nblue
<br/>
There are two types of probability: theoretical probability and experimental probability. 
They basically mean the same thing, but are calculated in different ways.
Let's now look at the difference between them.
<br/><br/>
$vio<u>Theoretical Probability</u>$black
<br/><br/>
If we calculate the probability of an event using math and logical reasoning alone, what we'd get is its theoretical probability.
<br/><br/>
Mathematically, theoretical probability is the ratio of the number of outcomes in which the event occurs to the number of all possible outcomes.
<br/><br/>
An outcome in which the specified event occurs is called a favorable outcome.
Thus, the formula for theoretical probability is as follows:
<br/><br/><br/>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'><tr><td>
<table width='95%' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0'>
<tr><td align='left' width = '15%' style='padding-right:5px; padding-left:15px; padding-top:5px; padding-bottom:5px' rowspan='3'>$tfont2 <b>Theoretical Probability</b></td>
<td align='center' width = '10%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px' rowspan='3'>$tfont1 <b> = </b></td>
<td align='center' width = '75%' style='padding-right:5px; padding-left:5px; padding-top:20px; padding-bottom:5px'>$tfont1 <b># of Favorable Outcomes</b></td>
<tr><td background='../../images/books-frac-line1.jpg'>&nbsp;</td></tr>
<tr><td align='center'style='padding-right:15px; padding-left:5px; padding-top:5px; padding-bottom:20px'>$tfont1 <b># of Possible Outcomes</b></td>
</tr></table>
</td></tr></table>
<br/><br/>
Here, both the numerator and denominator are based on your knowledge about the event and some logical reasoning.
<br/><br/>
A probability of 1 or 100% means that the event would always occur, without a doubt.
On the other hand, a probability of 0 or 0% means that the event would never ever occur.
<br/><br/>
An event with a probability of 0.5 or 50% has equal chances of happening or not happening.
A probability greater than 50% means the event is likely to happen, while a probability less than 50% means the event is unlikely to happen.
<br/><br/>
$red<u>Example # 1</u>$black
<br/><br/>
What is the theoretical probability of a coin landing 'heads' if it's tossed in the air?
<br/><br/>
When tossed in the air, a coin could only land with either its head or its tail up.
This means that tossing a coin once has only two possible outcomes: 'heads' or 'tails'.
<br/><br/>
Based on logic, there is only 1 favorable outcome for this example ('heads'), since the other outcome ('tails') is not favorable. 
<br/><br/>
Thus, the theoretical probability of a coin landing 'heads' each time it's tossed is:<br/>
P = 1/2 = $red 0.5$black = $red 50%$black
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
Now, imagine tossing the same coin in the air 10 times. 
How many times would you expect it to land 'heads'? 
<br/><br/>
Based on our formula above, the number of tosses that would show 'heads' equals the theoretical probability of a toss showing 'heads' times the total number of tosses.
Thus:
<br/><br/>
# of times the coin lands 'heads'<br/>
= P x # of tosses<br/>
= 0.5 x 10 = $red 5 $black
<br/><br/>
Thus, if we toss a coin in the air 10 times, it would land 'heads'$red 5$black times.
<br/><br/>
Aside from tossing coins, there are other common ways to demonstrate the mathematics of probability.
Two of these are rolling dice and picking cards from a deck.
<br/><br/>
Rolling a die has six possible outcomes: '1', '2', '3', '4', '5', and '6'.
The probability of getting a '1' or any of these six numbers is 1/6.
Theoretically, you need to roll the die 6 times to get a particular number.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/>
A deck of playing cards has 52 cards.
There are 4 suits in the deck: 'hearts', 'clubs', 'diamonds', and 'spades'.
Each suit has 13 ranks from ace to king.
<br/><br/>
The probability of picking a particular suit from a deck of cards is therefore 13/52, which equals 1/4 or 25%.
This means that there's a 25% chance of picking a card of 'hearts' (or any particular suit) from the deck.
<br/><br/>
There are 4 cards for each rank in a deck (1 for each suit).
The probability of picking a particular rank from a deck of cards is therefore 4/52 or 1/13.
This means that the probability of picking a card of certain rank from the deck is only 1/13.
<br/><br/>
$vio<u>Experimental Probability</u>$black
<br/><br/>
Theoretical probability is what we expect to happen, but it isn't always what actually happens.
Probability that is based on what actually happens is called experimental probability.
<br/><br/>
The experimental probability of an event is the probability of its occurrence based on the results of an actual experiment. 
It is the ratio of the number of favorable outcomes to the total number of trials in the actual experiment.
<br/><br/>
The formula for experimental probability is as follows:
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
$red<u>Example # 2</u>$black
<br/><br/>
Say, for example, that we actually tossed the same coin in the air 10 times and got 6 heads and 4 tails after 10 tosses. 
Find the experimental probability of the coin landing heads.
<br/><br/>
Solution:
<br/><br/>
# of favorable outcomes = 6<br/>
# of trials = 10<br/>
Probability = 6/10 = $red 0.6 $black = $red 60% $black
<br/><br/>
Based on this exercise, the experimental probability of getting heads is therefore $red 0.6 $black or $red 60%$black. 
<br/><br/>
Note that this is different from its corresponding theoretical probability of $red 0.5$black, which we computed in Example # 1 above.
<br/><br/>
$red<u>Example # 3</u>$black
<br/><br/>
If, instead of just 10 tosses, we tossed the same coin in the air 100 times. 
Say that this time, we got 53 heads and 47 tails after 100 tosses. 
Find the experimental probability of the coin landing heads.
<br/><br/>
Solution:
<br/><br/>
# of favorable outcomes = 53<br/>
# of trials = 100<br/>
Probability = 53/100 = $red 0.53 $black = $red 53% $black
<br/><br/>
The difference between this experimental probability (0.53) and the theoretical probability (0.5) is only 0.03.
<br/><br/>
This example aims to point out that the more trials there are in a probability experiment, the closer the experimental probability should be to the theoretical probability.
<br/><br/>
Let us look at more examples of how to calculate probabilities.
<br/><br/><br/>
@blue
More Examples of How to<br/>Calculate Probabilities
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




















