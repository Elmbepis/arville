<?php

$grd=$grd;
$title="Percentage Change";
$img1="images/percent2.jpg";

if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:12pt;color:#000000'>"; 
	echo $tfont1;}
else{
	$tfont1="<span lang='EN-US' style='font-size:36pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:36pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:27pt;color:#000000'>"; 
	echo $tfont1;}

$article="
We often measure the amount of change in a numerical quantity by getting the difference between the final amount and the original amount. 
<br/><br/>
For example, if we want to measure the change in Jose's height this past year, we simply subtract his height last year from his height this year. 
Thus, if he's 126 centimeters tall today and was 120 centimeters a year ago, his height had increased by 6 centimeters. 
<br/><br/>
We can, however, also measure the change in a quantity in terms of percentage change. 
<br/><br/>
Percentage change is the amount of change in a quantity that's expressed as a percentage of the original amount. 
<br/><br/>
In our example, Jose's height increased by 6 centimeters the past year.  
This is 5% of 120 centimeters (his original height), so the percentage increase in his height is 5%.
<br/><br/>
The formula for percentage change is shown below. 
<br/><br/>
<table border='0' width='70%' cellspacing='0' cellpadding='0'>
<tr>
	<td rowspan='3' align='center'>$tfont2 PC</td>
	<td align='center' width='10%' height='17' rowspan='3'>$tfont1 = </td>
	<td align='center'>$tfont2 Amount of Change</td>
</tr>
<tr>
	<td background='../../images/books-frac-line-white.jpg'>&nbsp;</td>
</tr>
<tr>
	<td align='center'>$tfont2 Original Amount</td>
</tr>
</table>
<br/>
The amount of change is the difference between the final amount and the original amount. Therefore,
<br/><br/>
<table border='0' width='100%' cellspacing='0' cellpadding='0'>
<tr>
	<td rowspan='3' align='center'>$tfont2 PC</td>
	<td align='center' width='10%' height='17' rowspan='3'>$tfont1 = </td>
	<td align='center'>$tfont2 Final Amount - Original Amount</td>
</tr>
<tr>
	<td background='../../images/books-frac-line-white.jpg'>&nbsp;</td>
</tr>
<tr>
	<td align='center'>$tfont2 Original Amount</td>
</tr>
</table>
<br/>
If the result of the formula above is positive, then there was a percentage increase.
If the result of the formula above is negative, then there was a percentage decrease.
<br/><br/>
Let's apply this formula to find the percentage increase in Linda's savings, which grew from &#8369; 1500.00 to &#8369; 1800.00.   
<br/><br/>

<table border='0' width='100%' cellspacing='0' cellpadding='0'>
<tr>
	<td rowspan='3' align='center'>$tfont2 PC</td>
	<td align='center' width='10%' height='17' rowspan='3'>$tfont1 = </td>
	<td align='center'>$tfont2 Final Amount - Original Amount</td>
</tr>
<tr>
	<td background='../../images/books-frac-line-white.jpg'>&nbsp;</td>
</tr>
<tr>
	<td align='center'>$tfont2 Original Amount</td>
</tr>
</table>
<br/>
Thus,<br/><br/>
PC = (1800 - 1500)/1500<br/>
PC= 300/1500 = 1/5 = 0.20 = 20%
<br/><br/>
Thus, the percentage increase in Linda's savings is 20%.
<br/><br/>
Let us look at more examples of how to calculate percentage changes.
<br/><br/><br/>
@blue
Examples of How to Calculate<br/>Percentage Changes
@nblue
<br/>
@php1percent2@
<br/><br/>
If you refresh this page, it will give new examples of percentage change calculations. 
You can therefore have as many examples as you want for this lesson! 
<br/><br/>
You can use this feature to practice calculating percentage changes. 

";

?>




















