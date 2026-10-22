<?php
$grd=$grd;
$title="The Substitution Rule";
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

The Substitution Rule, also known as the Change of Variables Rule, is a powerful technique in calculus used to simplify the integration of complex functions. It allows you to rewrite an integral in terms of a new variable, making the 
integration process more manageable. The rule is particularly useful when dealing with integrals involving composite functions, trigonometric functions, or exponential functions.
<br/><br/>
The Substitution Rule states that if you have an integral of the form 
<br/><br/>
$pink &#8747; f(g(x))g'(x)dx$black 
<br/><br/>
where g(x) is a differentiable function, you can perform a substitution using a new variable u=g(x), which simplifies the integral to &#8747; f(u)du.
<br/><br/>
The Substitution Rule can be expressed mathematically as follows:
<br/><br/>
&#8747; f(g(x))g'(x)dx = &#8747; f(u)du
<br/><br/><br/>
@blue
Steps Used in Applying<br/>the Substitution Rule
@nblue
<br/><br/>
Below are the steps used in the application of the Substitution Rule.
<br/><br/>$vio<u> 
1. Identify a composite function. 
</u>$black<br/><br/>
Start by identifying a composite function within the integral, typically in the form of u=g(x), where u is a new variable, and g(x) is an expression within the integral.
<br/><br/>$vio<u> 
2. Find du/dx. 
</u>$black<br/><br/>
Calculate the derivative du/dx to express how u changes concerning x. This step is essential to establish a connection between the old variable 
x and the new variable u.
<br/><br/>$vio<u> 
3. Rewrite the integral.
</u>$black<br/><br/>
Substitute u for g(x) and du for dx within the integral. This step transforms the integral into a new one in terms of the variable u.
<br/><br/>$vio<u> 
4. Integrate with respect to u.
</u>$black<br/><br/>
Integrate the new integral with respect to u. This part is typically more straightforward, as the integral may become a basic form that can be easily solved.
<br/><br/>$vio<u> 
5. Back-substitute.
</u>$black<br/><br/>
After finding the integral with respect to u, replace u with the original expression g(x) to express the final result in terms of x.
<br/><br/>$vio<u> 
6. Adjust limits, if necessary.
</u>$black<br/><br/>
If the integral has definite limits, make sure to adjust them based on the new variable u before integrating. The limits must be transformed accordingly to match the substitution.
<br/><br/><br/>
@blue
Example of Applying<br/>the Substitution Rule
@nblue
<br/><br/>
Evaluate the following integral:
<br/><br/>
$pink &#8747; 2xcos(x<sup>2</sup>)dx$black
<br/><br/>
$red Solution:
<br/><br/>$vio<u> 
1. Identify a composite function. 
</u>$black<br/><br/>
In this case, u=x<sup>2</sup> is a good choice.
<br/><br/>$vio<u> 
2. Find du/dx. 
</u>$black<br/><br/>
du/dx = 2x
<br/><br/>$vio<u> 
3. Rewrite the integral.
</u>$black<br/><br/>
Substitute u for x<sup>2</sup> and du for dx to get:
<br/><br/>
&#8747; cos(u) du
<br/><br/>$vio<u> 
4. Integrate with respect to u.
</u>$black<br/><br/>
Since the derivative for the sine function is the cosine function, then
<br/><br/>
&#8747; cos(u) du = sin(u) + C
<br/><br/>$vio<u> 
5. Back-substitute.
</u>$black<br/><br/>
Replace u with x<sup>2</sup> to get:
<br/><br/>
&#8747; cos(u) du = sin(x<sup>2</sup>) + C or
<br/><br/>
$pink &#8747; 2xcos(x<sup>2</sup>)dx = sin(x<sup>2</sup>) + C$black
<br/><br/>
Thus, the original integral &#8747; 2xcos(x<sup>2</sup>)dx simplifies to sin(x<sup>2</sup>) + C using the Substitution Rule.
 
"
?>
