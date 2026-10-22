<?php
$grd=$grd;
$title="Regions Under<br/>the Normal Curve";
$img1="images/bm-dec1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$pink=$font."<font color='#CC0066'>";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:18pt;color:#CC0066'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#BB0000'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:30pt;color:#CC0066'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#BB0000'>"; 
	}

$article="

Regions under the normal curve refer to specific areas or portions of the bell-shaped curve that represents a normal distribution. These regions have specific probabilistic interpretations and are often used in statistics and data analysis to make inferences, 
calculate probabilities, and determine critical values. 
<br/><br/>
Statisticians and analysts use tables, calculators, or software to determine the probabilities associated with these regions, allowing them to make informed decisions and draw meaningful conclusions from data.
<br/><br/><br/>
@blue
Key Regions Under<br/>the Normal Curve
@nblue
<br/><br/>
Below are the key regions under the normal curve.
<br/><br/>$vio<u> 
1. Total area under the curve
</u>$black<br/><br/>
The entire area under the normal curve represents the probability of all possible outcomes. It is equal to 1 or 100% since, in probability theory, the total probability of all possible events must sum to 1.
<br/><br/>$vio<u> 
2. Left-tail region
</u>$black<br/><br/>
The left-tail region refers to the area under the curve to the left of a specific value or point on the horizontal axis. It represents the probability that a random variable is less than or equal to that value. In statistical terms, it's denoted as P(X &#8804; x), where X is the random variable and x is the specified value.
<br/><br/>$vio<u> 
3. Right-tail region
</u>$black<br/><br/>
The right-tail region is the area under the curve to the right of a given point on the horizontal axis. It represents the probability that a random variable is greater than or equal to that value and is expressed as P(X &#8805; x).
<br/><br/>$vio<u> 
4. Between two values 
</u>$black<br/><br/>
You can also calculate the probability that a random variable falls between two specific values. This region corresponds to the area under the curve between those values and is expressed as P(a &#8804; X &#8804; b), where 'a' and 'b' are the lower and upper bounds.
<br/><br/>$vio<u> 
5. Outside two values
</u>$black<br/><br/>
The complementary region to the previous one, which is the area outside the range defined by two values. This is often used for calculating probabilities of extreme events and is expressed as P(X < a or X > b).
<br/><br/>$vio<u> 
6. Central Region
</u>$black<br/><br/>
Another important region under the normal curve is the area within a certain number of standard deviations from the mean. This is particularly useful because of the 68-95-99.7 rule, 
which tells us that a significant portion of the data falls within one, two, or three standard deviations from the mean. 
<br/><br/>
For example, you can calculate P(&#956; - &#963; &#8804; X &#8804; &#956; + &#963;), P(&#956; - 2&#963; &#8804; X &#8804; &#956; + 2&#963;), and so on.

"
?>
