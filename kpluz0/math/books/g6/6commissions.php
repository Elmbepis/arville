<?php

$grd=$grd;
$title="Commissions";

if(!isset($format)){$format=0;}
if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:12pt;color:#000000'>"; 
	$tfont4="<span lang='EN-US' style='font-size:36pt;color:#800080'>"; 
	$tfont5="<span lang='EN-US' style='font-size:36pt;color:#CC0000'>"; 
	echo $tfont1;}
else{
	$tfont1="<span lang='EN-US' style='font-size:36pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:36pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:27pt;color:#000000'>"; 
	$tfont4="<span lang='EN-US' style='font-size:36pt;color:#800080'>"; 
	$tfont5="<span lang='EN-US' style='font-size:36pt;color:#CC0000'>"; 
	echo $tfont1;}

$article="
In the last lesson, we learned what sales taxes and discounts are.  
In this lesson, we will learn about the concept of commissions.
<br/><br/>
A commission is an amount of money paid to a salesperson for every sale that he or she makes. 
Here's the basic formula for commission:
<br/><br/>
$tfont2 Commission $tfont1 = $tfont2 Commission Rate $tfont4 x $tfont2 Sales $tfont1
<br/><br/>
Let's look at the following problem to understand the concept of commission: 
<br/><br/>
$tfont5<b>Commission Problem # 1:</b>$tfont1
<br/><br/>
How much commission would a car salesman make if he makes car sales totalling &#8369; 900000 and he is given a commission rate of 8%? 
<br/><br/>
$tfont2 Commission $tfont1 = Commission Rate $tfont4 x $tfont1 Sales<br/>
= 0.08 $tfont4 x $tfont1  &#8369; 900000 = $tfont2<b>  &#8369; 72000 </b>$tfont1
<br/><br/>
$tfont5<b>Commission Problem # 2:</b>$tfont1
<br/><br/>
What is the commission rate of a saleslady who earns &#8369; 3600 in commissions after selling &#8369; 30000 worth of shoes? 
<br/><br/>
$tfont2 Commission Rate $tfont1 = Commission $tfont4 &divide; $tfont1 Sales<br/>
= &#8369; 3600 $tfont4 &divide; $tfont1  &#8369; 30000 = 0.12 = $tfont2<b> 12% </b>$tfont1
<br/><br/>
$tfont5<b>Commission Problem # 3:</b>$tfont1
<br/><br/>
If a man was given a commission rate of 16% and earned a commission of &#8369; 12800, what was the total amount of his sales? 
<br/><br/>
$tfont2 Sales $tfont1 = Commission $tfont4 &divide; $tfont1 Commission Rate<br/>
= &#8369; 12800 $tfont4 &divide; $tfont1 16%<br/> 
= &#8369; 12800 $tfont4 &divide; $tfont1 0.16 = $tfont2<b> &#8369; 80000 </b>$tfont1
<br/><br/>
Let us look at more examples of commission problems.
<br/><br/><br/>
@blue
Examples of <br/>Commission Problems
@nblue
<br/>
@php1commissions@
<br/><br/>
If you refresh this page, it will give new examples of commission problems. 
You can therefore have as many examples as you want for this lesson! 
<br/><br/>
You can use this feature to practice solving commission problems. 

";

?>




















