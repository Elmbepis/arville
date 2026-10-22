<?php
$grd=$grd;
$title="Asymptotes of an<br/>Exponential Function";
$img1="images/efunc-asymp1.jpg";
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
We've already learned before that an asymptote is a straight line that a curve approaches, but never touches. It is essentially a line that represents a limit for a curve. 
<br/><br/>
Asymptotes can be horizontal, vertical, or oblique (slanting). 
In the case of exponential functions, we are primarily interested in horizontal and vertical asymptotes.
<br/><br/><br/>
@blue
Horizontal Asymptotes
@nblue
<br/><br/>
Recall that a basic exponential function takes the form $blue f(x) = a<sup>x</sup>$black, where a is a constant and x is the variable.
<br/><br/>
A horizontal asymptote is a straight horizontal line that a curve approaches as x approaches positive or negative infinity. 
<br/><br/>$vio<u>
Determining the Presence<br/>of a Horizontal Asymptote
$black</u><br/><br/>
In the case of exponential functions, the presence of a horizontal asymptote depends on the value of 'a'. There are three cases to consider, as discussed below.
<br/><br/>$pink<i>
Case 1. 0 < a < 1
</i>$black<br/><br/>
If 0 < a < 1, the function approaches the x-axis (y = 0) as x approaches infinity. The curve is decreasing and will never touch the x-axis. Hence, the x-axis is the horizontal asymptote.
<br/><br/>$pink<i>
Case 1. a = 1
</i>$black<br/><br/>
When a = 1, the function is constant, and there is no horizontal asymptote. The function is just a straight line at y = 1.
<br/><br/>$pink<i>
Case 1. a > 1
</i>$black<br/><br/>
When a > 1, the function approaches infinity as x approaches infinity. The curve is increasing and will never touch any finite horizontal line. Hence, there is no horizontal asymptote.
<br/><br/>$vio<u>
Determining the Equation<br/>of the Horizontal Asymptote
$black</u><br/><br/>
To mathematically determine the equation of the horizontal asymptote of an exponential function, you can follow the steps below.
<br/><br/>$pink<i>
Step 1: Check the value of 'a'.
</i>$black<br/><br/>
Determine whether the base 'a' of the exponential function is greater than 1, less than 1, or equal to 1.
<br/><br/>$pink<i>
Step 2: Consider the limit as<br/>x approaches positive infinity.
</i>$black<br/><br/>
If the value of 'a' is greater than 1, the exponential function will approach infinity as x approaches infinity. 
In this case, there is no horizontal asymptote. 
<br/><br/>
$blue If a > 1: $vio lim(x&rarr;&infin;) a<sup>x</sup> = $blue &#8734; $black
<br/><br/>
If the value of 'a' is less than 1, the exponential function will approach 0 as x approaches infinity. 
In this case, the x-axis is the horizontal asymptote. To find the limit, take the limit of the function as x approaches infinity:
<br/><br/>
$blue If 0 < a < 1: $vio lim(x&rarr;&infin;) a<sup>x</sup> = $blue 0 $black
<br/><br/>$pink<i>
Step 3: Consider the limit as<br/>x approaches negative infinity.
</i>$black<br/><br/>
If the value of 'a' is less than 1, the exponential function will approach infinity as x approaches negative infinity. 
In this case, there is no horizontal asymptote. 
<br/><br/>
$blue If 0 < a < 1: $vio lim(x&rarr;-&infin;) a<sup>x</sup> = $blue &infin; $black
<br/><br/>
If the value of 'a' is greater than 1, the exponential function will approach 0 as x approaches negative infinity. In this case, the x-axis is the horizontal asymptote. 
<br/><br/>
$blue If a > 1: $vio lim(x&rarr;-&infin;) a<sup>x</sup> = $blue 0 $black
<br/><br/>$pink<i>
Step 4: Write the equation of<br/>the horizontal asymptote.
</i>$black<br/><br/>
If the exponential function has a horizontal asymptote, write the equation of the asymptote. If the function approaches the x-axis, 
the equation of the horizontal asymptote is $blue y = 0$black. If the function approaches infinity, there is no horizontal asymptote.
<br/><br/>$vio<u>
Example:
$black</u><br/><br/>
Consider the function f(x) = (1/2)<sup>x</sup>. We can determine the horizontal asymptote as follows:
<br/><br/>$pink<i>
Step 1: Check the value of 'a'.
</i>$black<br/><br/>
The base 'a' of the function is 1/2, which is less than 1.
<br/><br/>$pink<i>
Step 2: Consider the limit as<br/>x approaches positive infinity.
</i>$black<br/><br/>
lim(x&rarr;&#8734;) (1/2)<sup>x</sup> = 0
<br/><br/>$pink<i>
Step 3: Consider the limit as<br/>x approaches negative infinity.
</i>$black<br/><br/>
lim(x&rarr;-&#8734;) (1/2)<sup>x</sup> = &#8734;
<br/><br/>$pink<i>
Step 4: Write the equation of<br/>the horizontal asymptote.
</i>$black<br/><br/>
The function approaches the x-axis as x approaches infinity. Hence, the equation of the horizontal asymptote is $blue y = 0$black.
<br/><br/><br/>
@blue
Vertical Asymptotes
@nblue
<br/><br/>
A vertical asymptote is a straight vertical line that a curve approaches as x approaches a certain value (usually a number where the function is undefined). 
A typical exponential function, however, is defined for all real numbers, and therefore has no vertical asymptotes.
<br/><br/>
Although an exponential function in its basic form doesn't have a vertical asymptote, there are cases wherein a certain exponential function might have one.
One such case is if the function has this form instead: f(x) = b<sup>(1/x)</sup>. Below is an example of why this form has a verticl asymptote.
<br/><br/>$vio<u>
Example:
$black</u><br/><br/>
Consider the function f(x) = e<sup>1/x</sup>. We can determine the vertical asymptote by evaluating the limits of the function as x approaches zero from both negative infinity and positive infinity.  
<br/><br/>$pink<i>
Step 1: Consider the limit as<br/>x approaches zero from positive infinity.
</i>$black<br/><br/>
lim(x&rarr;0<sup>+</sup>) e<sup>1/x</sup> = +&#8734
<br/><br/>
This only means that the xth root of e, or any base for that matter, increases towards positive infinity as x decreases towards zero.
<br/><br/>
Hoewever, the value of x never actually reaches zero because the function would be undefined at that point. This means that there is a vertical asymptote at x=0.
<br/><br/>$pink<i>
Step 2: Consider the limit as<br/>x increases to positive infinity from zero.
</i>$black<br/><br/>
lim(x&rarr;+&#8734;) e<sup>1/x</sup> = 1;
<br/><br/>
This only means that the xth root of e, or any base for that matter, approaches 1 as x increases towards positive infinity from zero.
<br/><br/>$pink<i>
Step 3: Consider the limit as<br/>x decreases to negative infinity from zero.
</i>$black<br/><br/>
lim(x&rarr;-&#8734;) e<sup>1/x</sup> = 1;
<br/><br/>
This only means that the xth root of e, or any base for that matter, approaches 1 as x decreases towards negative infinity from zero.
<br/><br/>$pink<i>
Step 4: Write the equation of<br/>the vertical asymptote.
</i>$black<br/><br/>
As mentioned earlier, the function f(x) = e<sup>1/x</sup> approaches positive infinity as x approaches zero. Hence, the function has a vertical asymptote and its equation is $blue x = 0$black.
<br/><br/>
Below is the graph of f(x)=e<sup>1/x</sup> showing the vertical asymptote at x=0 and the horizontal asymptote at y=1.
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Graph of f(x)=e<sup>1/x</sup> </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>

"
?>
