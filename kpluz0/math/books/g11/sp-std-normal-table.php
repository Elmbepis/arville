<?php
$grd=$grd;
$title="Using the Standard<br/>Normal Table";
$img1="images/z-formula2.jpg";
$img2="images/z-table.jpg";
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

Using the standard normal table, also known as the Z-table or the standard normal distribution table, is a common practice in statistics and probability theory. It provides a way to find probabilities associated with specific values of the 
standard normal variable (Z) or Z-scores. The table is particularly useful when working with the standard normal distribution, which has a mean (&#956;) of 0 and a standard deviation (&#963;) of 1. 
<br/><br/>
In essence, the standard normal table simplifies the process of finding probabilities associated with Z-scores in a standard normal distribution. 
Many statistical software packages also provide functions for calculating these probabilities directly, but understanding how to use the table is a valuable skill in statistics.
<br/><br/><br/>
@blue
Using the Standard<br/>Normal Table
@nblue
<br/><br/>
The standard normal table typically presents a grid of values in rows and columns. The values in the table represent probabilities associated with Z-scores, which measure how many standard deviations a data point is from the mean 
(0 in the case of the standard normal distribution).
<br/><br/>
The rows of the table typically correspond to the tenths places of the Z-score (e.g., -3.9, -3.8, -3.7, ..., 0.0, 0.1, 0.2, ..., 3.7, 3.8, 3.9).
The columns correspond to the hundredths places of the Z-score (e.g., 0.00, 0.01, 0.02, ..., 0.98, 0.99).
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img2'>
</td></tr></table>
<br clear='left'><br/>
Below are the steps involved in using the standard normal table.
<br/><br/>$vio<u> 
1. Calculate the z-score.
</u>$black<br/><br/>
To use the table, first calculate the z-score for the value of interest using the formula:
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img1'>
</td></tr></table>
<br clear='left'><br/>
where z is the z-score, x is the value of interest, &#956; is the mean of the distribution (usually 0 for the standard normal distribution), and
&#963; is the standard deviation of the distribution (usually 1 for the standard normal distribution).
<br/><br/>$vio<u> 
2. Locate the probability. 
</u>$black<br/><br/>
Once you have the Z-score, find the corresponding probability in the table. 
<br/><br/>
To do this, locate the row that matches the integer part of the Z-score (e.g., for a Z-score of -1.25, find the row that starts with -1).
Move along the row to find the column that corresponds to the hundredths and thousandths places of the Z-score (e.g., for -1.25, move along the row to the column labeled 0.05).
<br/><br/>$vio<u> 
3. Interpret the probability.
</u>$black<br/><br/>
The value at the intersection of the row and column represents the probability associated with the Z-score. This probability corresponds to the area under the standard normal curve to the left of that Z-score.
<br/><br/>
For example, if you find that the probability associated with a Z-score of 1.25 is 0.8944 in the table, it means that approximately 89.44% of the data falls below 1.25 standard deviations from the mean in a standard normal distribution.
In other words, the probability of observing a value less than or equal to 1.25 standard deviations above the mean in a standard normal distribution is approximately 89.44%.
<br/><br/>$vio<u> 
4. Use complementary probabilities.
</u>$black<br/><br/>
In some cases, you may need to find the probability for values to the right of the Z-score (i.e., in the right tail of the distribution). To do this, subtract the probability you find in the table from 1. This gives you the probability in the right tail.

"
?>
