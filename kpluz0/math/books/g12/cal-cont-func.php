<?php
$grd=$grd;
$title="Continuity of a<br/>Function at a Number";
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

Continuity of a function at a specific number, often denoted as <i>a</i>, is a concept in calculus that characterizes how smoothly the function behaves at that particular point. In simpler terms, it assesses whether the function has any abrupt changes, 
jumps, or discontinuities at that specific number. 
<br/><br/><br/>
@blue
Definition of Continuity<br/>of a Function
@nblue
<br/><br/>
A function f(x) is considered continuous at a number <i>a</i> if the following three conditions are met.
<br/><br/>$vio<u> 
1. Existence of the Function at <i>a</i>
</u>$black<br/><br/>
To be continuous at <i>a</i>, the function f(x) should provide a value for f(a) that is well-defined and makes sense in the context of the function. In other words, f(a) should not be ambiguous or undefined. For example, you cannot have a situation wherein 
f(a) could be any number or where it's not defined at all.
<br/><br/>
There should also be no missing or disconnected portions in the graph of f(x) near <i>a</i>. There should be no \"holes\" or \"jumps\" in the graph that prevent one from finding the value of f(a).
<br/><br/>
If f(x) is defined for all real numbers except at x=a, where f(a) is undefined or where there's a gap in the graph, then the function is not continuous at <i>a</i>.
<br/><br/>
$blue Examples$black
<br/><br/>
Consider the function $pink f(x) = 1/x$black. This function is not defined at x=0 because division by zero is undefined in mathematics. Thus, this function is discontinuous at x=0.
<br/><br/>
As another example, consider the function $pink g(x)= x<sup>1/2</sup>$black. This function is defined for real numbers x &ge; zero. However, it is not defined for negative values of x, as the square root of a negative number is not a real number. Therefore, 
g(x) has a gap or undefined points in its domain for all negative values of x, making it dicontinuous for x<0.
<br/><br/>$vio<u> 
2. Existence of the Limit at <i>a</i>
</u>$black<br/><br/>
The limit of the function f(x) as x approaches <i>a</i> must exist. Mathematically, 
<br/><br/>
$pink lim<sub>x&rarr;a</sub> f(x) = L $black
<br/><br/>
where L is a specific real number.
<br/><br/>
$blue Example$black
<br/><br/>
Consider the function $pink f(x)=sin(1/x)$black. The limit of this function as x approaches 0, lim<sub>x&rarr;0</sub> sin(1/x), can not be assigned a specific value because the function doesn't converge to a finite real number as x approaches 0.
Thus, the function f(x)=sin(1/x) violates the existence of a limit at x=0, so it is discontinuous at that point.
<br/><br/>$vio<u> 
3. Equality of Limit and Function Value
</u>$black<br/><br/>
The limit of the function f(x) as x approaches <i>a</i> must be equal to the function value at <i>a</i>, i.e., f(a).
In simple terms, there should be no sudden \"jump\" or discontinuity between the limit and the actual value of the function at <i>a</i>.
<br/><br/>
Mathematically,
<br/><br/>
$pink lim<sub>x&rarr;a</sub> f(x) = f(a) $black
<br/><br/>
$blue Example$black
<br/><br/>
Consider the following function:$pink
<br/><br/>
f(x) = x if x &ne; 2<br/>
f(x) = 3 if x = 2$black
<br/><br/>
Now, let's examine the limit of f(x) as <i>a</i> approaches 2:
<br/><br/>
$pink lim<sub>x&rarr;2</sub> f(x) = 2 $black
<br/><br/>
However, when x is exactly equal to 2, the function f(x) is defined as f(2) = 3, which is not equal to the limit obtained above.
<br/><br/>
This discontinuity, wherein the limit and the function value are not equal at x=2, illustrates a violation of the requirement that the limit must be equal to the function value at the point of interest.
<br/><br/><br/>
@blue
Visual Representation of<br/>Continuity of a Function
@nblue
<br/><br/>
Graphically, the continuity of a function at a point <i>a</i> can be seen as follows.
<br/><br/>
1. The graph of the function should have a smooth, connected curve at x=a.
<br/><br/>
2. There should be no holes, jumps, or vertical asymptotes at x=a.
<br/><br/>
3. As you approach x=a from both the left and right sides, the function values should approach the same value, which is f(a).

"
?>
