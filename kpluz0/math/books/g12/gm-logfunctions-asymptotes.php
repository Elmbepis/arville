<?php
$grd=$grd;
$title="Asymptotes of a<br/>Logarithmic Function";
$img1="images/logfunc-asymp1.jpg";
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
The logarithmic function can be written as y = log<sub>b</sub>(x), where b is the base of the logarithm and x is the argument of the function.
<br/><br/>
Finding the asymptotes of a logarithmic function involves identifying the values of x for which the function approaches infinity or negative infinity. 
<br/><br/>
These values are known as vertical asymptotes, and they can be found by analyzing the behavior of the function as x approaches certain values.
<br/><br/><br/>
@blue
Finding the Asymptotes<br/>of a Logarithmic Function
@nblue
<br/><br/>
Below are the steps to find the asymptotes of a logarithmic function.
<br/><br/>$vio<u>
Step 1: Identify the base<br/>of the logarithmic function.
$black</u><br/><br/>
The base of the logarithmic function is the value that the logarithm is taken with respect to. It is typically denoted by 'b' and can be any positive real number greater than 1.
<br/><br/>$vio<u>
Step 2: Determine the domain<br/>of the logarithmic function.
$black</u><br/><br/>
The domain of the logarithmic function is the set of all values of x for which the function is defined. Since the logarithm of a negative number is not defined, the domain of the logarithmic function is x > 0.
<br/><br/>$vio<u>
Step 3: Identify the vertical<br/>asymptotes of the logarithmic<br/>function.
$black</u><br/><br/>
The vertical asymptote of a typical logarithmic function occurs when x approaches 0. This is because as x approaches 0 from the right, the value of the logarithmic function approaches negative infinity. 
<br/><br/>
As x increases to positive infinity, the value of the logarithmic function also increases to positive infinity, so a typical logarithmic function has no vertical asymptote for x approaching positive infinity.
<br/><br/>
To find the vertical asymptote(s) of a logarithmic function in general, evaluate the limits of f(x) as x approaches zero and as x increases to positive infinity.
<br/><br/>$vio<u>
Step 4: Identify the horizontal<br/>asymptote of the logarithmic<br/>function.
$black</u><br/><br/>
A logarithmic function in its basic form does not have any horizontal asymptote in its domain, since there is no limit to the value of f(x) as x approaches zero or as x increases to positive infinity.
<br/><br/>
However, certain forms of logarithmic functions might have a horizontal asymptote. In such as case, one needs to evaluate the limits of the value of f(x) as x approaches zero and as x increases to positive infinity.
<br/><br/>$vio<u>
Step 5: Plot the graph of<br/>the logarithmic function.
$black</u><br/><br/>
Once the asymptotes of the logarithmic function have been identified, the graph of the function can be plotted. 
<br/><br/>$vio<u>
Example:
$black</u><br/><br/>
As an example, consider the function $blue y = log(x)$black and follow the steps above. 
<br/><br/>$vio<u>
Step 1: Identify the base<br/>of the logarithmic function.
$black</u><br/><br/>
The base of the logarithmic function f(x)=log(x) is 10.
<br/><br/>$vio<u>
Step 2: Determine the domain<br/>of the logarithmic function.
$black</u><br/><br/>
The domain of the logarithmic function f(x)=log(x) is 10 is all positive numbers because the logarithm of any number less than or equal to zero is undefined.
<br/><br/>$vio<u>
Step 3: Identify the vertical<br/>asymptotes of the logarithmic<br/>function.
$black</u>
<br/><br/>$pink<i>
Step 3.1: Consider the limit as<br/>x approaches zero from positive infinity.
</i>$black<br/><br/>
lim(x&rarr;0<sup>+</sup>) log(x) = -&#8734
<br/><br/>
The function f(x)=log(x) decreases towards negative infinity as x decreases from positive infinity towards zero.
Hoewever, the value of x never actually reaches zero because the function would be undefined if x &le; 0. This means that there is a vertical asymptote as x moves towards zero from positive infinity and this is the line $blue x=0$black.
<br/><br/>$pink<i>
Step 3.2: Consider the limit as<br/>x increases to positive infinity from zero.
</i>$black<br/><br/>
lim(x&rarr;+&#8734;) log(x) = +&#8734;
<br/><br/>
The function f(x)=log(x) increases towards positive infinity as x increases towards positive infinity. The function f(x)=log(x) is defined for x>0, so it does not have a vertical asymptote as x increases to positive infinity from zero.
<br/><br/>$vio<u>
Step 4: Identify the horizontal<br/>asymptote of the logarithmic<br/>function.
$black</u>
<br/><br/>$pink<i>
Step 4.1: Consider the limit as<br/>x approaches zero from positive infinity.
</i>$black<br/><br/>
lim(x&rarr;0<sup>+</sup>) log(x) = -&#8734
<br/><br/>
The function f(x)=log(x) decreases towards negative infinity as x approaches zero. 
Thus, there is no limit to the value of f(x) in this case, which means that f(x) has no horizontal asymptote as x decreases from positive infinity towards zero.
<br/><br/>$pink<i>
Step 4.2: Consider the limit as<br/>x increases to positive infinity from zero.
</i>$black<br/><br/>
lim(x&rarr;+&#8734;) log(x) = +&#8734;
<br/><br/>
The function f(x)=log(x) increases towards positive infinity as x increases towards positive infinity. 
There's no limit to the value of f(x) for x>0, so the function f(x)=log(x) does not have a horizontal asymptote as  increases to positive infinity from zero.
<br/><br/>$pink<i>
Step 5: Plot the graph of<br/>the logarithmic function.
</i>$black<br/><br/>
Below is the graph of f(x)=log(x) showing the vertical asymptote at x=0.
Although the graph seems to show a horizontal asymptote because f(x)=log(x) rises very, very slowly for x>0, this function actually has no horizontal asymptote anywhere.
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Graph of f(x)=e<sup>log(x)</sup> </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
"
?>
