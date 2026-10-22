<?php

$grd=$grd;
$title="Probability of Events";
$img1="images/probability3.jpg";
$img2="images/probability4.jpg";
$img3="images/probability1.jpg";
$img4="images/probability5.jpg";

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
Will it rain this weekend?
Will you bump into your friend at the mall?
Will you win the raffle?
A lot of things in life happen by chance.
<br/><br/>
Things that happen are called events.
The chance that an event would happen is called probability.
In this lesson, we will learn the mathematics of probability.
<br/><br/>
Let us first review some terms that we use to express probability:
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Probability Terms </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center' width = '40%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>&nbsp;Term&nbsp;</b></td>
<td align='center' width = '60%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Meaning</b></td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 'sure' or 'certain'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 the event will happen without a doubt</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 'likely'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 there's a greater chance the event will happen than not</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 'equally likely'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 two events have equal chances of happening</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 'unlikely'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 there's a greater chance the event will NOT happen</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 'impossible'</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 the event will never ever happen</td>
</tr></table>
<br/><br/>
Here are examples of how to use these terms:
<br/><br/>
1. After every sunset, sunrise is $vio sure $black to happen.
<br/><br/>
2. The smarter student is more $vio likely $black to win the math contest.
<br/><br/>
3. Both cars are very nice so they are $vio equally likely $black to be bought.
<br/><br/>
4. He did not study so it is $vio unlikely $black for him to top the test.
<br/><br/>
5. It's $vio impossible $black to go to the moon on an airplane.
<br/><br/>
Sometimes, it is not enough to use these terms to express the probability that an event would happen.
Fortunately, we can use math to express probabilities.
<br/><br/><br/>
@blue
Writing Probabilities<br/>as Fractions
@nblue
<br/>
Different events have different probabilities.
This means that some things are more likely to happen than others.
<br/><br/>
For example, winning a coin toss is more likely than winning the lottery. 
<br/><br/>
Now, take a look at the red and purple marbles in the picture below.
If you shake them in a box and pick one with your eyes closed, what color of marble are you more likely to pick? 
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
If your answer is red, then you are correct!
You are more likely to pick a red marble because there are more red marbles than purple ones.
<br/><br/>
We can say that the probability of picking a red marble is higher than the probability of picking a purple marble.
<br/><br/>
Do you know that the probability of an event is basically a number from 0 to 1?
An event is sure to happen if its probability equals 1.
It is impossible to happen if its probability equals 0.
<br/><br/>
An event with a probability greater than 0 but less than 1 may or may not happen.
The closer its probability is to 1, the more likely it is to happen.
<br/><br/>
We've learned before that fractions are a great way to express numbers that are less than 1.
We can therefore write the probability of an event as a fraction.
<br/><br/>
$red Example # 1:<br/><u>Picking Marbles</u>$black
<br/><br/>
Say that you put 7 red marbles and 2 purple marbles in a box.
The box would then contain 9 marbles.
<br/><br/>
Picking one marble from the box therefore has 9 possible outcomes:<br/>
- 7 outcomes for picking a red marble<br/>
- 2 outcomes for picking a purple marble
<br/><br/>
The probability of picking a red marble is therefore equal to 7 outcomes out of 9 possible outcomes, or $vio<b>7/9</b>$black. 
<br/><br/>
On the other hand, the probability of picking a purple marble is $vio<b>2/9</b>$black. 
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/>
Since $vio<b>7/9 > 2/9</b>$black, picking a red marble is indeed more likely than picking a purple marble.
<br/><br/>
$red Example # 2:<br/><u>Tossing a Coin</u>$black
<br/><br/>
Say that you toss a new coin in the air.
What is its probability of landing with its head up? 
<br/><br/>
There are two possible outcomes when you toss a coin in the air:<br/>
- 1 outcome for landing with its head up<br/>
- 1 outcome for landing with its tail up
<br/><br/>
Thus, the probability of the coin landing with its head up is equal to 1 outcome out of 2 possible outcomes, or $vio<b>1/2</b>$black.
<br/><br/>
Similarly, the probability of the coin landing with its tail up is $vio<b>1/2</b>$black. 
<br/><br/>
Thus, when you toss a coin in the air, its landing head up is equally likely as its landing tail up.
<br/><br/>
By the way, the fraction 1/2 is equal to 50%. 
Thus, a tossed coin has a 50% chance it would land head up and a 50% chance it would land tail up.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/>
$red Example # 3:<br/><u>Raffle Draw</u>$black
<br/><br/>
Say you join a raffle draw with 9 other people.
Each of you bought only 1 raffle ticket. 
What is the probability that you'll win the raffle? 
<br/><br/>
There are 10 raffle tickets so there are 10 possible outcomes for the raffle draw (one for each ticket). 
<br/><br/>
The probability of you winning the raffle is equal to 1 outcome out of 10 possible outcomes, or $vio<b>1/10</b>$black only.
Thus, it is unlikely for you to win the raffle.
<br/><br/>
The probability of someone else winning is $vio<b>9/10</b>$black. 
This means that you are very likely to lose the raffle to another person.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img4'>
</td></tr></table>
"
?>




















