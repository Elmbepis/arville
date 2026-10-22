<?php
$grd=$grd;
$title="The Limit Laws";
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

In calculus, limit laws are a set of fundamental rules and properties that help us manipulate and analyze limits of functions. These laws provide a systematic way to evaluate limits in various scenarios. 
Understanding limit laws is crucial for solving many calculus problems and for gaining a deeper understanding of the behavior of functions.
<br/><br/><br/>
@blue
The Limit Laws
@nblue
<br/><br/>
Below are the main limit laws in calculus.
<br/><br/>$vio<u> 
1. Limit of a constant
</u>$black<br/><br/>
The limit of a constant function is equal to the constant itself. This is a straightforward property. Mathematically, this may be expressed as follows:
<br/><br/>
$pink lim<sub>x&rarr;a</sub> c = c$black
<br/><br/>
$blue Example:$black lim<sub>x&rarr;2</sub> 7 = 7
<br/><br/>$vio<u> 
2. Limit of a sum/difference
</u>$black<br/><br/>
The limit of a sum or difference of two functions can be found by taking the limit of each function separately and then adding or subtracting the results. Mathematically, this may be expressed as follows:
<br/><br/>
$pink lim<sub>x&rarr;a</sub> [f(x) &plusmn; g(x)] = lim<sub>x&rarr;a</sub> f(x) &plusmn; lim<sub>x&rarr;a</sub> g(x) $black
<br/><br/>
$blue Example:$black lim<sub>x&rarr;2</sub> (2x + 1) = lim<sub>x&rarr;2</sub> 2x + lim<sub>x&rarr;2</sub> 1 = 4 + 1 = 5
<br/><br/>$vio<u> 
3. Limit of a product
</u>$black<br/><br/>
The limit of a product of two functions is equal to the product of their individual limits.  Mathematically, this may be expressed as follows:
<br/><br/>
$pink lim<sub>x&rarr;a</sub> [f(x) &middot; g(x)] = lim<sub>x&rarr;a</sub> f(x) &middot; lim<sub>x&rarr;a</sub> g(x) $black
<br/><br/>
$blue Example:$black lim<sub>x&rarr;3</sub> [2x &middot; 3x] = lim<sub>x&rarr;3</sub> 2x &middot; lim<sub>x&rarr;3</sub> 3x = 6 &middot; 9 = 54
<br/><br/>$vio<u> 
4. Limit of a quotient
</u>$black<br/><br/>
The limit of a quotient of two functions is equal to the quotient of their individual limits, provided that the limit of the denominator is not zero. Mathematically, this may be expressed as follows:
<br/><br/>
$pink lim<sub>x&rarr;a</sub> [f(x) / g(x)] = lim<sub>x&rarr;a</sub> f(x) / lim<sub>x&rarr;a</sub> g(x) $black  if lim<sub>x&rarr;a</sub> g(x) &ne; 0
<br/><br/>
$blue Example:$black lim<sub>x&rarr;1</sub> [(x+2) / (x-2)] = lim<sub>x&rarr;1</sub> (x+2) / lim<sub>x&rarr;1</sub> (x-2) = 3/-1 = -3
<br/><br/>$vio<u> 
5. Limit of a power
</u>$black<br/><br/>
The limit of a function raised to a constant power is equal to the limit of the function raised to that power. Mathematically, this may be expressed as follows:
<br/><br/>
$pink lim<sub>x&rarr;a</sub> [f(x)<sup>n</sup>] = [lim<sub>x&rarr;a</sub> f(x)]<sup>n</sup> $black
<br/><br/>
$blue Example:$black lim<sub>x&rarr;2</sub> [(x+1)<sup>2</sup>] = [lim<sub>x&rarr;2</sub> (x+1)]<sup>2</sup> = 9
<br/><br/>$vio<u> 
6. Limit of a root
</u>$black<br/><br/>
The limit of a function under the nth root is equal to the nth root of the limit of the function. Mathematically, this may be expressed as follows:
<br/><br/>
$pink lim<sub>x&rarr;a</sub> [f(x)<sup>1/n</sup>] = [lim<sub>x&rarr;a</sub> f(x)]<sup>1/n</sup> $black
<br/><br/>
$blue Example:$black lim<sub>x&rarr;6</sub> [(x+3)<sup>1/2</sup>] = [lim<sub>x&rarr;6</sub> (x+3)]<sup>1/2</sup> = [9]<sup>1/2</sup> = 3
<br/><br/>$vio<u> 
7. Limit of a composite function
</u>$black<br/><br/>
The limit of a composite function can be found by taking the limit of the inner function and then applying the outer function to the result, provided that the limit of the inner function exists.
Mathematically, this may be expressed as follows:
<br/><br/>
$pink lim<sub>x&rarr;a</sub> [f(g(x))] = lim<sub>x&rarr;a</sub> f(lim<sub>x&rarr;a</sub> g(x)) $black
<br/><br/>
$blue Example:$black lim<sub>x&rarr;0</sub> [sin(3x)] = lim<sub>x&rarr;0</sub> sin(lim<sub>x&rarr;0</sub> 3x) = lim<sub>x&rarr;0</sub> sin (0) = 0
<br/><br/>$vio<u> 
8. Squeeze (Sandwich) Theorem
</u>$black<br/><br/>
If a function is bounded between two other functions in a certain interval containing a particular point, and the limits of the outer functions are equal to a common limit L,
then the function in the middle also has a limit of L. Mathematically, this may be expressed as follows:
<br/><br/>
If f(x) &le; g(x) &le; h(x) for all x in some interval containing a, except possibly at a itself, and lim<sub>x&rarr;a</sub> f(x) = lim<sub>x&rarr;a</sub> h(x) = L, then 
$pink lim<sub>x&rarr;a</sub> g(x) = L$black.
<br/><br/>
$blue Example:$black 
<br/><br/>
Consider lim<sub>x&rarr;0</sub> xsin(x+1).
<br/><br/>
Because -|x| &le; xsin(x+1) &le; |x| since |sin(x+1)| is bounded between 0 and 1, and lim<sub>x&rarr;0</sub> (-|x|) = lim<sub>x&rarr;0</sub> |x| = 0, then lim<sub>x&rarr;0</sub> xsin(x+1) = 0.

"
?>
