<?php
$grd=$grd;
$title="The Limit of<br/>a Function";
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

The limit of a function is a fundamental concept in calculus that describes the behavior of a function as its input (usually denoted as \"x\") approaches a certain value. In other words, it describes what happens to the 
function's output as the input gets closer and closer to a particular point.
<br/><br/>
The concept of limits is crucial in understanding the continuity of functions, derivatives, and integral calculus. It forms the foundation for many concepts in calculus and helps us analyze the behavior of functions near specific points. 
<br/><br/><br/>
@blue
Outcomes of<br/>Limit Evaluation
@nblue
<br/><br/>
Mathematically, the limit of a function f(x) as x approaches a specific value, say \"a,\" is denoted as:
<br/><br/>
$pink lim<sub>x&rarr;a</sub>f(x)$black
<br/><br/>
This is read as \"the limit of f(x) as x approaches a.\"
<br/><br/>
To determine the limit, you evaluate the function's behavior as x gets arbitrarily close to the value \"a.\" There are three main possibilities for the outcome of this evaluation. These are presented below.
<br/><br/>$vio<u> 
1. The limit exists and is finite.
</u>$black<br/><br/>
If the values of the function f(x) approach a single finite value L as x gets closer to \"a,\" then the limit is said to exist and is equal to L. This is mathematically written as follows:
<br/><br/>
$pink lim<sub>x&rarr;a</sub>f(x) = L$black
<br/><br/>$vio<u> 
2. The limit is infinite.
</u>$black<br/><br/>
If the values of the function f(x) become arbitrarily large (positive or negative) as x approaches \"a,\" then the limit is said to be infinite. This is mathematically written as follows:
<br/><br/>
$pink lim<sub>x&rarr;a</sub>f(x) = &infin;$black
<br/><br/>$vio<u> 
3. The limit does not exist. 
</u>$black<br/><br/>
If the values of the function f(x) do not approach a single value as x approaches \"a,\" then the limit does not exist. This could happen if the function oscillates, jumps, or behaves erratically around the value \"a.\"
<br/><br/><br/>
@blue
Key Aspects of<br/>Limits of Functions
@nblue
<br/><br/>
Blow are the key aspects of limits of functions.
<br/><br/>$vio<u> 
1. Approaching a point
</u>$black<br/><br/>
When we talk about the limit of a function as <i>x</i> approaches a certain value <i>a</i>, we are interested in understanding the behavior of the function as 
<i>x</i> gets closer and closer to <i>a</i>. This gives us insights into what happens to the function as it gets arbitrarily close to that specific point.
<br/><br/>
As an example, consider the function<br/>$blue f(x) = 2x + 3$black. We want to find the limit of this function as <i>x</i> approaches 1.
<br/><br/>
To do this, we can directly substitute x=1 into the function as follows:
<br/><br/>
f(1) = 2(1) + 3  = 5
<br/><br/>
Thus, the limit of the function f(x) as <i>x</i> approaches 1 is 5. Mathematically, this may be expressed as follows:
<br/><br/>
$pink lim<sub>x&rarr;1</sub> (2x + 3) = 5$black
<br/><br/>$vio<u> 
2. Neighborhoods
</u>$black<br/><br/>
A \"neighborhood\" of a point <i>a</i> refers to a range of values around <i>a</i> within a certain distance. When discussing limits, we consider the behavior of the function within these neighborhoods as 
<i>x</i> approaches <i>a</i>.
<br/><br/>$vio<u> 
3. Existence and non-existence of limits
</u>$black<br/><br/>
A limit exists if the values of the function get arbitrarily close to a single value as <i>x</i> approaches <i>a</i>. If this value exists and is unique, the limit is well-defined. If the function values don't approach a single value, the limit doesn't exist.
<br/><br/>
An example of a function that has no limit as <i>x</i> approaches 0 is $blue h(x) = 1/x$black. Setting the value of x to zero in this function will result in a division by zero, which is undefined in mathematics.
<br/><br/>$vio<u> 
4. Finite and infinite limits
</u>$black<br/><br/>
A limit can be a finite value, meaning the function values approach a specific real number as <i>x</i> gets closer to <i>a</i>. Alternatively, a limit can be infinite if the function values grow or decrease without bound as 
<i>x</i> approaches <i>a</i>.
<br/><br/>
The function $blue h(x) = 1/x$black given as an example above also exhibits a limit of infinity as <i>x</i> approaches 0. Note that the output of this function increases as the value of the denominator (x) becomes smaller.
In essence, the output of the function approaches infinity as <i>x</i> approaches 0.
<br/><br/>
Mathematically, this may be expressed as follows:
<br/><br/>
$pink lim<sub>x&rarr;0</sub> (1/x) = &infin;$black
<br/><br/>$vio<u> 
5. Two-sided limits
</u>$black<br/><br/>
When discussing the limit as <i>x</i> approaches <i>a</i>, we often consider both the left-hand limit (as <i>x</i> approaches <i>a</i> from the left side) and the right-hand limit (as <i>x</i> approaches 
<i>a</i> from the right side). The limit exists if both the left-hand and right-hand limits are equal.
<br/><br/>
Consider the following function:
<br/><br/>
$blue f(t) = 0$black if t < 0<br/>
$blue f(t) = 1$black if t &ge; 0
<br/><br/>
The limit of f(t) is zero if t approaches zero from the left side but its limit is 1 if t approaches zero from the right side. Since the left-hand and right-hand limits of f(t) are not equal, then we can say that this function 
has a non-existent limit.
<br/><br/>$vio<u> 
6. Limit laws
</u>$black<br/><br/>
Limit laws are rules that allow us to manipulate and evaluate limits of functions using algebraic operations. These laws help simplify complex limits by breaking them down into simpler parts and leveraging algebraic properties.
The principal limit laws are discussed in the next lesson.
<br/><br/>$vio<u> 
7. Continuity
</u>$black<br/><br/>
A function is continuous at a point <i>a</i> if its limit as <i>x</i> approaches <i>a</i> equals the value of the function at <i>a</i>. In other words, there are no gaps, jumps, or breaks in the function's graph at <i>a</i>.
<br/><br/>$vio<u> 
8. Indeterminate forms
</u>$black<br/><br/>
Some expressions, like 0/0 and &infin;/&infin; are said to have indeterminate forms do not immediately provide information about the limit. Techniques such as L'Hopital's Rule can be used to evaluate these indeterminate forms.
<br/><br/>$vio<u> 
9. Limit at infinity
</u>$black<br/><br/>
The limit of a function as <i>x</i> approaches infinity (<i>x</i>&rarr;&infin;) or negative infinity (<i>x</i>&rarr;-&infin;)  describes the long-term behavior of the function as 
<i>x</i> becomes larger or smaller without bound.

"
?>
