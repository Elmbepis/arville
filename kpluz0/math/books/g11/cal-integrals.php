<?php
$grd=$grd;
$title="The Table<br/>of Integrals";
$img1="images/integral1.jpg";
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

The Table of Integrals, often referred to as an integral table, is a valuable reference tool in calculus that provides a collection of common integrals and their corresponding solutions. It serves as a quick reference guide for students, mathematicians, 
and professionals when solving integration problems.
<br/><br/><br/>
@blue
Key Aspects of the<br/>Table of Integrals
@nblue
<br/><br/>
Explained below are some of the key aspects of the Table of Integrals.
<br/><br/>$vio<u> 
1. Integral formulas
</u>$black<br/><br/>
The table contains a wide range of integral formulas, including basic integrals, trigonometric integrals, exponential integrals, logarithmic integrals, and many others. These formulas represent the most common functions and their 
corresponding antiderivatives.
<br/><br/>$vio<u> 
2. Variable of integration
</u>$black<br/><br/>
Each entry in the table includes the variable of integration, typically denoted as x, as well as the expression to be integrated. It also specifies any limits of integration if the integral is definite.
<br/><br/>$vio<u> 
3. Solutions and constants<br/>of integration
</u>$black<br/><br/>
The table provides the antiderivative or integral solution, often including the constant of integration denoted as C. This constant accounts for the potential variety of functions that can be obtained from the integral.
<br/><br/>$vio<u> 
4. Common techniques
</u>$black<br/><br/>
The table often includes common integration techniques and strategies, such as integration by parts, substitution, trigonometric identities, and more.
<br/><br/>$vio<u> 
5. Useful identities
</u>$black<br/><br/>
Some integral tables incorporate important mathematical identities and relationships that are frequently used during integration.
<br/><br/>$vio<u> 
6. Definite integrals
</u>$black<br/><br/>
For definite integrals, the table may specify upper and lower limits of integration, along with the result of the evaluation.
<br/><br/><br/>
@blue
The Table<br/>of Integrals
@nblue
<br/><br/>
Below is a simplified and abbreviated version of such a Table of Integrals, showcasing some common integral formulas.
<br/><br/>$vio<u> 
1. Basic integrals
</u>$black<br/><br/>
&#8747; 1 dx = x + C
<br/><br/>
&#8747; x<sup>n</sup> dx = (1/(n+1)) x<sup>n+1</sup> + C
<br/><br/>$vio<u> 
2. Trigonometric integrals
</u>$black<br/><br/>
&#8747; sin(x) dx = -cos(x) + C
<br/><br/>
&#8747; cos(x) dx = sin(x) + C
<br/><br/>
&#8747; tan(x) dx = ln|sec(x)| + C
<br/><br/>
&#8747; cot(x) dx = ln|sin(x)| + C
<br/><br/>
&#8747; sec(x) dx = ln|sec(x) + tan(x)| + C
<br/><br/>
&#8747; csc(x) dx = -ln|csc(x) + cot(x)| + C
<br/><br/>
&#8747; sec<sup>2</sup>(x) dx = tan(x) + C
<br/><br/>
&#8747; csc(x) cot(x) dx = -csc(x) + C
<br/><br/>
&#8747; sec(x) tan(x) dx = sec(x) + C
<br/><br/>
&#8747; csc<sup>2</sup>(x)dx = - cot(x) + C
<br/><br/>$vio<u> 
3. Logarithmic integrals
</u>$black<br/><br/>
&#8747; (1/x) dx = ln(|x|) + C
<br/><br/>
&#8747; ln(x) dx = xln(x) - x + C
<br/><br/>
&#8747; ln|ax| dx = xln|ax| - x + C
<br/><br/>$vio<u> 
4. Exponential integrals 
</u>$black<br/><br/>
&#8747; e<sup>x</sup> dx = e<sup>x</sup> + C
<br/><br/>
&#8747; a<sup>x</sup> dx = (1/ln(a)) a<sup>x</sup> + C
<br/><br/>
&#8747; e<sup>kx</sup> dx = 1/k e<sup>kx</sup> + C
<br/><br/>$vio<u> 
5. Definite integrals
</u>$black<br/><br/>
&#8747;[a, b] f(x) dx = F(b) - F(a), where F(x) is the antiderivative of f(x)
<br/><br/>
$blue Example:$black 
<br/><br/>
The definite integral of the function f(x) = 2x from a=1 to b=3 is as follows:
<br/><br/>
F(x) = &#8747; 2xdx = x<sup>2</sup> + C
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img1'>
</td></tr></table>&nbsp;= F(3) - F(1) 
<br/><br/>
= (3<sup>2</sup> + C) - (1<sup>2</sup> + C) = 9 - 1 = $pink 8$black
<br/><br/>$vio<u> 
6. Integration by parts
</u>$black<br/><br/>
&#8747; u dv = uv - &#8747; v du
<br/><br/>
$blue Example:$black 
<br/><br/>
Solve: &#8747; xe<sup>x</sup>dx
<br/><br/>
Let u=x, which means du=dx.
<br/><br/>
Let dv = xe<sup>x</sup>dx, which means v = &#8747; e<sup>x</sup>dx = e<sup>x</sup>.
<br/><br/>
&#8747; u dv = uv - &#8747; v du
<br/><br/>
&#8747; xe<sup>x</sup>dx = xe<sup>x</sup> - &#8747; e<sup>x</sup> dx
<br/><br/>
= xe<sup>x</sup> -  (e<sup>x</sup> + C)
<br/><br/>
= $pink e<sup>x</sup>(x - 1) - C$black
 
"
?>
