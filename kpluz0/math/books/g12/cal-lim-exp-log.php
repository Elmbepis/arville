<?php
$grd=$grd;
$title="Limits of Exponential<br/>and Log Functions";
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

Limits of exponential and logarithmic functions are an important topic in calculus. Understanding these limits helps us analyze the behavior of functions as they approach certain values. 
<br/><br/><br/>
@blue
Limits of<br/>Exponential Functions
@nblue
<br/><br/>
Recall that exponential functions are mathematical functions that involve a variable in the exponent. They take the form $blue f(x) = a<sup>x</sup>$black, where a is a constant and x is the variable. 
The constant a is called the base of the function and it can be any positive number, except 1. 
<br/><br/>
One of the most important properties of exponential functions is that they grow at an increasing rate. 
This means that as the value of x increases, the value of the function increases at an increasing rate. This property is represented by the slope of the exponential function, which is always positive and increasing.
<br/><br/>
To find the limit of an exponential function as x approaches a specific value, we need to consider the following cases.
<br/><br/>$vio<u> 
Case 1. Limit as x approaches infinity<br/>or negative infinity
</u>$black
<br/><br/>$pink<i> 
Case 1.1 a>1
</i>$black<br/><br/>
If a>1, then lim<sub>x&rarr;&infin;</sub> a<sup>x</sup> = &infin; and lim<sub>x&rarr;-&infin;</sub> a<sup>x</sup> = 0.
<br/><br/>
$blue Example # 1:$black lim<sub>x&rarr;&infin;</sub> 5<sup>x</sup> = &infin;
<br/><br/>
$blue Example # 2:$black lim<sub>x&rarr;-&infin;</sub> 4<sup>x</sup> = 0
<br/><br/>$pink<i> 
Case 1.2 0&lt;a&lt;1
</i>$black<br/><br/>
If 0&lt;a&lt;1, then lim<sub>x&rarr;&infin;</sub> a<sup>x</sup> = 0 and lim<sub>x&rarr;-&infin;</sub> a<sup>x</sup> = &infin;.
<br/><br/>
$blue Example # 1:$black lim<sub>x&rarr;&infin;</sub> 0.25<sup>x</sup> = 0
<br/><br/>
$blue Example # 2:$black lim<sub>x&rarr;-&infin;</sub> 0.33<sup>x</sup> = &infin;
<br/><br/>$vio<u> 
Case 2. Limit as x approaches<br/>a specific value c
</u>$black<br/><br/>
lim<sub>x&rarr;c</sub> a<sup>x</sup> = a<sup>c</sup>
<br/><br/>
$blue Example:$black lim<sub>x&rarr;2</sub> 3<sup>x</sup> = 3<sup>2</sup> = 9
<br/><br/>
Note the limit of an exponential function depends on the value of the base a and the direction in which x is approaching (positive infinity, negative infinity, or a specific value c).
<br/><br/><br/>
@blue
Limits of<br/>Logarithmic Functions
@nblue
<br/><br/>
Recall that a logarithmic function f(x) is a function that contains a logarithm of an expression containing the variable x. 
<br/><br/>
A logarithm is usually written as log base b of x, or simply log<sub>b</sub>x, where x is the value produced if b is raised to the logarithm.
Thus, in the function $blue f(x)=log<sub>b</sub>x$black, f(x) is the exponent to which b must be raised to produce the number x.
<br/><br/>
To find the limit of a logarithmic function as x approaches a specific value, we need to consider the following cases.
<br/><br/>$vio<u> 
Case 1. Limit as x approaches infinity<br/>or negative infinity
</u>$black<br/><br/>
The limit of a logarithmic function as x approaches infinity or negative infinity is given as follows:
<br/><br/>$pink<i> 
Case 1.1 Limit as x approaches infinity
</i>$black<br/><br/>
lim<sub>x&rarr;&infin;</sub> log<sub>a</sub>(x) = &infin;
<br/><br/>
$blue Example:$black lim<sub>x&rarr;&infin;</sub> log<sub>2</sub>(x) = &infin;
<br/><br/>$pink<i> 
Case 1.2 As x approaches 0 from the right
</i>$black<br/><br/>
lim<sub>x&rarr;0+</sub> log<sub>a</sub>(x) = -&infin;
<br/><br/>
$blue Example:$black lim<sub>x&rarr;0+</sub> log<sub>10</sub>(x) = -&infin;
<br/><br/>$vio<u> 
Case 2. Limit as x approaches<br/>a specific value c > 0
</u>$black<br/><br/>
lim<sub>x&rarr;c+</sub> log<sub>a</sub>(x) = log<sub>a</sub>(c)
<br/><br/>
$blue Example:$black lim<sub>x&rarr;c+</sub> log<sub>10</sub>(x) = log<sub>10</sub>(c)

"
?>
