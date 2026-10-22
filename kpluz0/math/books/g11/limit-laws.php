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

The limit laws are a set of rules that help you evaluate limits of functions by using the properties of algebra and the behavior of limits. These laws make it easier to work with complex functions and understand how limits behave when functions are combined, added, subtracted, multiplied, divided, or raised to powers.

Here are the key limit laws explained in more detail:

Sum/Difference Law:

Rule: The limit of a sum or difference of two functions is the sum or difference of their individual limits, provided the individual limits exist.
Mathematically: 
lim
&#8289;
&#65533;
&#8594;
&#65533;
[
&#65533;
(
&#65533;
)
+
&#65533;
(
&#65533;
)
]
=
lim
&#8289;
&#65533;
&#8594;
&#65533;
&#65533;
(
&#65533;
)
+
lim
&#8289;
&#65533;
&#8594;
&#65533;
&#65533;
(
&#65533;
)
lim 
x&#8594;a
&#8203;
 [f(x)+g(x)]=lim 
x&#8594;a
&#8203;
 f(x)+lim 
x&#8594;a
&#8203;
 g(x)
Product Law:

Rule: The limit of the product of two functions is the product of their individual limits, provided the individual limits exist.
Mathematically: 
lim
&#8289;
&#65533;
&#8594;
&#65533;
[
&#65533;
(
&#65533;
)
&#8901;
&#65533;
(
&#65533;
)
]
=
lim
&#8289;
&#65533;
&#8594;
&#65533;
&#65533;
(
&#65533;
)
&#8901;
lim
&#8289;
&#65533;
&#8594;
&#65533;
&#65533;
(
&#65533;
)
lim 
x&#8594;a
&#8203;
 [f(x)&#8901;g(x)]=lim 
x&#8594;a
&#8203;
 f(x)&#8901;lim 
x&#8594;a
&#8203;
 g(x)
Quotient Law:

Rule: The limit of the quotient of two functions is the quotient of their individual limits, provided the individual limits exist and the denominator's limit is not zero.
Mathematically: 
lim
&#8289;
&#65533;
&#8594;
&#65533;
&#65533;
(
&#65533;
)
&#65533;
(
&#65533;
)
=
lim
&#8289;
&#65533;
&#8594;
&#65533;
&#65533;
(
&#65533;
)
lim
&#8289;
&#65533;
&#8594;
&#65533;
&#65533;
(
&#65533;
)
lim 
x&#8594;a
&#8203;
  
g(x)
f(x)
&#8203;
 = 
lim 
x&#8594;a
&#8203;
 g(x)
lim 
x&#8594;a
&#8203;
 f(x)
&#8203;
 
Constant Law:

Rule: The limit of a constant multiplied by a function is the constant multiplied by the limit of the function.
Mathematically: 
lim
&#8289;
&#65533;
&#8594;
&#65533;
[
&#65533;
&#8901;
&#65533;
(
&#65533;
)
]
=
&#65533;
&#8901;
lim
&#8289;
&#65533;
&#8594;
&#65533;
&#65533;
(
&#65533;
)
lim 
x&#8594;a
&#8203;
 [c&#8901;f(x)]=c&#8901;lim 
x&#8594;a
&#8203;
 f(x)
Power Law:

Rule: The limit of a power of a function is the power of the limit of the function, for positive integers.
Mathematically: 
lim
&#8289;
&#65533;
&#8594;
&#65533;
[
&#65533;
(
&#65533;
)
&#65533;
]
=
(
lim
&#8289;
&#65533;
&#8594;
&#65533;
&#65533;
(
&#65533;
)
)
&#65533;
lim 
x&#8594;a
&#8203;
 [f(x) 
n
 ]=(lim 
x&#8594;a
&#8203;
 f(x)) 
n
 
Root Law:

Rule: The limit of the nth root of a function is the nth root of the limit of the function, for positive integers.
Mathematically: 
lim
&#8289;
&#65533;
&#8594;
&#65533;
&#65533;
(
&#65533;
)
&#65533;
=
lim
&#8289;
&#65533;
&#8594;
&#65533;
&#65533;
(
&#65533;
)
&#65533;
lim 
x&#8594;a
&#8203;
  
n
  
f(x)
&#8203;
 = 
n
  
lim 
x&#8594;a
&#8203;
 f(x)
&#8203;
 
Composite Function Law:

Rule: If the limit of g(x) as x approaches "a" is "L," and the limit of f(x) as x approaches "L" exists, then the limit of the composite function f(g(x)) as x approaches "a" is the limit of f(x) as x approaches "L."
Mathematically: 
lim
&#8289;
&#65533;
&#8594;
&#65533;
&#65533;
(
&#65533;
(
&#65533;
)
)
=
lim
&#8289;
&#65533;
&#8594;
&#65533;
&#65533;
(
&#65533;
)
lim 
x&#8594;a
&#8203;
 f(g(x))=lim 
x&#8594;L
&#8203;
 f(x)
Using these limit laws, you can simplify and evaluate more complex limits by breaking them down into smaller, more manageable components. It's important to keep in mind that these laws apply under specific conditions, such as when the individual limits exist and certain restrictions are met (e.g., denominators not approaching zero in the quotient law).



<br/><br/><br/>
@blue

@nblue
<br/><br/>
 
<br/><br/>$vio<u> 
1. 
</u>$black<br/><br/>

"
?>
