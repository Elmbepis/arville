<?php
$grd=$grd;
$title="Intermediate and<br/>Extreme Value Theorems";
$img1="images/evt.jpg";
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

The Intermediate Value Theorem and the Extreme Value Theorem are two fundamental theorems in calculus that describe important properties of continuous functions on closed intervals. 
<br/><br/><br/>
@blue
The Intermediate<br/>Value Theorem
@nblue
<br/><br/>
The Intermediate Value Theorem (IVT) deals with the existence of values within a continuous function's range (output) between two specific points within its domain (input). Formally, it states the following.
<br/><br/>
\"If f(x) is a continuous function on a closed interval [a,b] and k is any number between f(a) and f(b), where f(a)&le;k&le;f(b) or f(b)&le;k&le;f(a), then there exists at least one number c in the open interval (a,b) such that f(c)=k.\" 
<br/><br/>
In simpler terms, if a continuous function f(x) starts at one value (e.g., f(a)) and ends at another value (e.g., f(b)) on a closed interval, then it must take on every value in between at some point within that interval. 
This means there is no \"jump\" or \"hole\" in the function's graph between a and b.
<br/><br/>
$blue Example 1$black
<br/><br/>
Consider the function $pink f(x) = 2x<sup>3</sup> - 6x + 1$black.
<br/><br/>
Say we want to confirm that the function has a root within the specific interval [1,2], which means that there exists a number c between 1 and 2 such that f(c)=0.
<br/><br/>
To apply the IVT, first note that f(x) is continuous on the closed interval [1,2] because it's a polynomial function and polynomials are continuous everywhere.
<br/><br/>
Find f(1) and f(2) as follows:
<br/><br/>
f(1) = 2(1)<sup>3</sup> - (6)(1) + 1 = $vio -3$black
<br/><br/>
f(2) = 2(2)<sup>3</sup> - (6)(2) + 1 = $vio 5$black
<br/><br/>
According to the IVT, since 0 is between -3 and 5, there must be at least one c in the interval (1,2) where f(c)=0. 
<br/><br/>
You can use an online root finder to determine that one of the 3 roots of this function is approximately $vio 1.6418$black, which is indeed between 1 and 2.
<br/><br/><br/>
@blue
The Extreme<br/>Value Theorem
@nblue
<br/><br/>
The Extreme Value Theorem (EVT) deals with the existence of both maximum and minimum values of a continuous function on a closed interval. Formally, it states the following.
<br/><br/>
\"If f(x) is a continuous function on a closed interval [a,b], then f(x) has both a maximum value M and a minimum value m on that interval.\"
<br/><br/>
In other words, there exist numbers c and d in the closed interval [a,b] such that f(c)=M (the maximum) and f(d)=m (the minimum).
<br/><br/>
In simpler terms, if a continuous function f(x) is defined on a closed interval [a,b], it is guaranteed to have both a highest point (maximum) and a lowest point (minimum) on that interval. 
This is important for optimization problems, as it allows us to find the highest and lowest values of a function within a specific range.
<br/><br/>
$blue Example$black
<br/><br/>
Consider the function $pink f(x) = x<sup>2</sup> - 4x + 5$black on the closed interval [1,5]. 
<br/><br/>
The maximum and minimum values of the function can be determined through its derivative (which we haven't learned to do yet) or graphically as follows:
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img1'>
</td></tr></table>
<br clear='left'><br/>
The graph above shows that the minimum occurs at x=2, which is between the interval [1,5].
<br/><br/>
f(2) = 2<sup>2</sup> - (4)(2) + 5 = $vio 1$black
<br/><br/>
f(5) = 5<sup>2</sup> - (4)(5) + 5 = $vio 10$black
<br/><br/>
According to the Extreme Value Theorem (EVT), since f(x) is continuous on the closed interval [1,5], it must have both a maximum and a minimum value on that interval.
<br/><br/>
In this case, the maximum value of f(x) on [1,5] is 10, which occurs at x = 5, which lies within the interval [1,5].
<br/><br/>
The minimum value of f(x) on [1,5] is 1, which occurs at x=2, which also lies within the interval [1,5].
 
"
?>
