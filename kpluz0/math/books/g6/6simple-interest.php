<?php

$grd=$grd;
$title="Simple Interest";

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
If someone borrows a certain amount of money, he or she might have to pay an additional amount of money on top of the amount borrowed. 
<br/><br/>
This additional amount is called an interest, and is paid by the borrower for the opportunity to use the borrowed money for a certain period of time.
The original amount of money borrowed is called the principal.
<br/><br/>
The term 'simple interest' refers to interest that's computed using this simple formula:
<br/><br/>
$tfont2 Interest $tfont1 = $tfont2 Principal $tfont4 x $tfont2 Rate $tfont4 x $tfont2 Time $tfont1
<br/>
where time is measured in years.
<br/><br/>
Let's look at the following problem to understand the concept of simple interest: 
<br/><br/>
$tfont5<b>Simple Interest Problem # 1:</b>$tfont1
<br/><br/>
How much interest would you have to pay if you borrow &#8369; 10000 for 6 months at an interest rate of 5%? 
<br/><br/>
$tfont2 Interest $tfont1 = Principal $tfont4 x $tfont1 Rate $tfont4 x $tfont1 Time<br/>
= &#8369; 10000 $tfont4 x $tfont1 0.05 $tfont4 x $tfont1 $tfont1 1/2<br/> 
= $tfont2<b>  &#8369; 250 </b>$tfont1
<br/><br/>
We used 1/2 for 'Time' because 'Time' is measured in years and 6 months is half a year.
<br/><br/>
$tfont5<b>Simple Interest Problem # 2:</b>$tfont1
<br/><br/>
What is the interest rate if the simple interest paid is &#8369; 1200 and the principal of &#8369; 5000 was borrowed for 2 years? 
<br/><br/>
$tfont2 Rate $tfont1 = Interest $tfont4 &divide; $tfont1 (Principal x Time)<br/>
= &#8369; 1200 $tfont4 &divide; $tfont1 (&#8369; 5000 x 2)<br/>
= &#8369; 1200 $tfont4 &divide; $tfont1 &#8369; 10000 = 0.12 = $tfont2<b> 12% </b>$tfont1
<br/><br/>
$tfont5<b>Simple Interest Problem # 3:</b>$tfont1
<br/><br/>
What is the principal if it was borrowed for 3 years at an interest rate of 10% and the simple interest amounted to &#8369; 4500? 
<br/><br/>
$tfont2 Principal $tfont1 = Interest $tfont4 &divide; $tfont1 (Rate x Time)<br/>
= &#8369; 4500 $tfont4 &divide; $tfont1 (0.10 x 3)<br/> 
= &#8369; 4500 $tfont4 &divide; $tfont1 0.3 = $tfont2<b> &#8369; 15000 </b>$tfont1
<br/><br/>
$tfont5<b>Simple Interest Problem # 4:</b>$tfont1
<br/><br/>
For how long was a principal of &#8369; 8000 borrowed if the interest rate was 15% per year and the simple interest amounted to &#8369; 2400? 
<br/><br/>
$tfont2 Time $tfont1 = Interest $tfont4 &divide; $tfont1 (Principal x Rate)<br/>
= &#8369; 2400 $tfont4 &divide; $tfont1 (&#8369; 8000 x 0.15/year)<br/> 
= &#8369; 2400 $tfont4 &divide; $tfont1 &#8369; 1200/year = $tfont2<b> 2 years</b>$tfont1
<br/><br/>
Let us look at more examples of simple interest problems.
<br/><br/><br/>
@blue
Examples of <br/>Simple Interest Problems
@nblue
<br/>
@php1simple-interest@
<br/><br/>
If you refresh this page, it will give new examples of simple interest problems. 
You can therefore have as many examples as you want for this lesson! 
<br/><br/>
You can use this feature to practice solving simple interest problems. 

";

?>




















