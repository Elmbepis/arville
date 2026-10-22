<?php
$grd=$grd;
$title="The Fundamental<br/>Theorem of Calculus";
$img1="images/calc-fund-th1.jpg";
$img2="images/calc-fund-th2.jpg";
$img3="images/calc-fund-th3.jpg";
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

The fundamental theorem of calculus is a theorem that establishes a connection between the concept of integrating a function with that of differentiating a function. It consists two parts, the First Fundamental Theorem of Calculus and 
and the Second Fundamental Theorem of Calculus, which together play a central role in the field of calculus. 
<br/><br/><br/>
@blue
First Fundamental<br/>Theorem of Calculus
@nblue
<br/><br/>
The First Fundamental Theorem of Calculus states that if f(x) is a continuous function on a closed interval [a,b], and F(x) is an antiderivative of f(x) on that interval, then the definite integral of f(x) from a to b 
can be expressed as the difference in the values of F(x) at the upper and lower endpoints:
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img1'>
</td></tr></table>
<br clear='left'><br/>
In simpler terms, this theorem tells us that if we want to find the definite integral of a function f(x) over an interval [a,b], we can do so by finding an antiderivative F(x) of f(x), evaluating F(x) at the upper and lower endpoints b and a to get
F(b) and F(a), respectively, and then subtracting F(a) from F(b).
<br/><br/>
$red Example$black
<br/><br/>
Find the definite integral of the function f(x)=2x<sup>3</sup> from 1 to 3. 
<br/><br/>
$vio Solution:$black
<br/><br/>
In this case, a=1 and b=3.
<br/><br/>
First, we need to find an antiderivative F(x) of f(x) as follows:
<br/><br/>
F(x) = &#8747; 2x<sup>3</sup>dx = x<sup>4</sup>/2
<br/><br/>
F(b) = (3)<sup>4</sup>/2 = $pink 40.5$black
<br/><br/>
F(a) = (1)<sup>4</sup>/2 = $pink 0.5$black
<br/><br/>
F(x)<sub>[1,3]</sub> = &#8747;<sub>[1,3]</sub> 2x<sup>3</sup>dx 
<br/><br/>
= F(b) - F(a) = 40.5 - 0.5 
<br/><br/>
= $pink 40$black
<br/><br/><br/>
@blue
Second Fundamental<br/>Theorem of Calculus
@nblue
<br/><br/>
The Second Fundamental Theorem of Calculus establishes the relationship between differentiation and integration, highlighting that these two fundamental operations in calculus are essentially inverse processes. 
This theorem serves as a bridge between the act of finding the slope (derivative) of a function, representing the gradient of a curve, and the process of finding the area enclosed beneath that curve through integration. 
<br/><br/>
It states that if a function f is continuous over the interval [a, b] and differentiable across the interval (a, b), then the differentiation of the anti-derivative of the function gives back the function f. 
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img2'>
</td></tr></table>
<br clear='left'><br/>
In some texts, the Second Fundamental Theorem of Calculus is also be stated as follows:
<br/><br/>
If F(x) is any antiderivative of a continuous function f(x) on an interval containing a, then the derivative of the integral from a to x of 
f(t)dt is equal to:
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img3'>
</td></tr></table>
<br clear='left'><br/>
Here, the derivative of the integral with respect to x equals the original function f(x), while the lower limit of the integration is a constant $vio a$black.
In effect, the integral from $vio a$black to x represents the accumulation of values of the function f(t) as t varies from $vio a$black to x. It calculates the total area under the curve of the function between these two points.

"
?>
