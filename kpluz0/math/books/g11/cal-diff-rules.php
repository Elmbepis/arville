<?php
$grd=$grd;
$title="The Rules of<br/>Differentiation";
$img1="images/evt.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$pink=$font."<font color='#CC0066'>";
$orange=$font."<font color='#f06805'>";

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

Differentiation rules are a set of mathematical rules and formulas used in calculus to find the derivatives of various functions. These rules make it easier to calculate derivatives without having to go through the limit definition of a 
derivative every time. 
<br/><br/>
Explained below are some of the key differentiation rules.
<br/><br/>$vio<u> 
1. Constant Rule
</u>$black<br/><br/>
The derivative of a constant c is always zero.
<br/><br/>
$blue Example:$black d(5)/dx = 0 
<br/><br/>$vio<u> 
2. Power Rule
</u>$black<br/><br/>
The derivative of x<sup>n</sup> where n is a constant is nx<sup>n&#8722;1</sup>.
<br/><br/>
$blue Example:$black d(x<sup>3</sup>)/dx = 3x<sup>2</sup> 
<br/><br/>$vio<u> 
3. Constant Multiple Rule
</u>$black<br/><br/>
The derivative of a constant times a function is the constant times the derivative of the function.
<br/><br/>
$blue Example:$black d(3x<sup>2</sup>)/dx = 3 &middot; d(x<sup>2</sup>)/dx = 3 &middot; 2x = 6x
<br/><br/>$vio<u> 
4. Sum Rule
</u>$black<br/><br/>
The derivative of a sum of functions is the sum of their derivatives.
This is mathematically expressed as follows:
<br/><br/>
d(f(x)+g(x))/dx = d(f(x))/dx + d(g(x))/dx
<br/><br/>
$blue Example:$black d(x<sup>4</sup> + 2x<sup>3</sup> + 5x)/dx = 4x<sup>3</sup> + 6x<sup>2</sup> + 5
<br/><br/>$vio<u> 
5. Difference Rule
</u>$black<br/><br/>
The derivative of a difference of functions is the difference of their derivatives.
This is mathematically expressed as follows:
<br/><br/>
d(f(x)-g(x))/dx = d(f(x))/dx - d(g(x))/dx
<br/><br/>
$blue Example:$black d(3x<sup>3</sup> - 4x<sup>2</sup> - 7x - 3)/dx = 9x<sup>2</sup> - 8x - 7
<br/><br/>$vio<u> 
6. Product Rule
</u>$black<br/><br/>
The derivative of the product of two functions f(x) and g(x) is given by:
<br/><br/>
d(f(x)&middot;g(x))/dx = f(x)&middot;g'(x) + g(x)&middot;f'(x)
<br/><br/>
$blue Example:$black
<br/><br/>
Let f(x)=2x and g(x) = x<sup>3</sup>
<br/><br/>
d((2x)(x<sup>3</sup>))/dx = (2x)(3x<sup>2</sup>) + (2)(x<sup>3</sup>)
<br/><br/>
= 6x<sup>3</sup> + 2x<sup>3</sup> 
<br/><br/>
= 8x<sup>3</sup>
<br/><br/>$vio<u> 
7. Quotient Rule
</u>$black<br/><br/>
The derivative of the quotient of two functions f(x) and g(x) is given by:
<br/><br/>
d(f(x)/g(x))/dx = [f'(x)&middot;g(x) - f(x)&middot;g'(x)] / (g(x))<sup>2</sup>
<br/><br/>
$blue Example:$black
<br/><br/>
Let f(x)=x<sup>2</sup> and g(x) = x
<br/><br/>
d(x<sup>2</sup>/x)/dx = [(2x)(x) - (x<sup>2</sup>)(1)] / x<sup>2</sup>
<br/><br/>
= [2x<sup>2</sup> - x<sup>2</sup>] / x<sup>2</sup> 
<br/><br/>
= x<sup>2</sup> / x<sup>2</sup>
<br/><br/>
= 1
<br/><br/>$vio<u> 
8. Chain Rule
</u>$black<br/><br/>
The Chain Rule deals with finding derivatives of composite functions. It may be expressed as follows:
<br/><br/>
dy/dx = dy/du &middot; du/dx
<br/><br/>
dy/dx = f'(g(x)) &middot; g'(x)
<br/><br/>
= derivative of outside function &middot; derivative of outside function
<br/><br/>
$blue Example 1:$black
<br/><br/>
Let f(x)=x<sup>2</sup> and g(x) = 2x
<br/><br/>
d(f(g(x))/dx = d(x<sup>2</sup>)/dx &middot; d(2x)/dx
<br/><br/>
= (2x)(2)
<br/><br/>
= 4x
<br/><br/>
$blue Example 2:$black
<br/><br/>
f'((3x+1)<sup>5</sup>) = 5(3x+1)<sup>4</sup> &middot; (3x+1)'
<br/><br/>
= 5(3x+1)<sup>4</sup> &middot;3
<br/><br/>
= (15)(3x+1)<sup>4</sup>
<br/><br/>$vio<u> 
9. Exponential Rule
</u>$black<br/><br/>
The derivative of e<sup>x</sup> is e<sup>x</sup>, and more generally, the derivative of a<sup>x</sup> (where a is a positive constant) is a<sup>x</sup>ln(a).
<br/><br/>
$blue Example:$black d(2<sup>x</sup>)/dx = 2<sup>x</sup>ln(2)
<br/><br/>$vio<u> 
10. Logarithmic Rule
</u>$black<br/><br/>
The derivative of ln(x) is 1/x.
<br/><br/>
$blue Example:$black d(ln(5x))/dx = 1/5x &middot; d(5x)/dx = 1/5x &middot; 5 = 1/x
<br/><br/>$vio<u> 
11. Rules of Differentiation for<br/>Trigonometric Functions
</u>$black<br/><br/>
Trigonometric functions, such as sine, cosine, tangent, secant, cosecant, and cotangent, frequently appear in calculus and mathematical modeling. Understanding how to differentiate these functions is essential for various applications in science, engineering, and mathematics. Here are the differentiation rules for some common trigonometric functions:
<br/><br/>$pink<i> 
1. Derivative of the Sine Function
</i>$black<br/><br/>
The derivative of the sine function with respect to x is the cosine function:
<br/><br/>
$orange d(sin(x))/dx = cos(x)$black
<br/><br/>$pink<i> 
2. Derivative of the Cosine Function
</i>$black<br/><br/>
The derivative of the cosine function with respect to x is the negative sine function:
<br/><br/>
$orange d(cos(x))/dx = -sin(x)$black
<br/><br/>$pink<i> 
3. Derivative of the Tangent Function
</i>$black<br/><br/>
The derivative of the tangent function with respect to x is the secant squared function:
<br/><br/>
$orange d(tan(x))/dx = sec<sup>2</sup>(x)$black
<br/><br/>$pink<i> 
4. Derivative of the Secant Function
</i>$black<br/><br/>
The derivative of the secant function with respect to x is the secant function multiplied by the tangent function:
<br/><br/>
$orange d(sec(x))/dx = sec(x) &middot; tan(x)$black
<br/><br/>$pink<i> 
5. Derivative of the Cosecant Function
</i>$black<br/><br/>
The derivative of the cosecant function with respect to x is the negative cosecant function multiplied by the cotangent function:
<br/><br/>
$orange d(csc(x))/dx = -csc(x) &middot; cot(x)$black
<br/><br/>$pink<i> 
6. Derivative of the Cotangent Function
</i>$black<br/><br/>
The derivative of the cotangent function with respect to x is the negative cosecant squared function:
<br/><br/>
$orange d(cot(x))/dx = -csc<sup>2</sup>(x)$black
 
"
?>
