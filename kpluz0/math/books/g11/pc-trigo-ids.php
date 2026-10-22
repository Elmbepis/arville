<?php
$grd=$grd;
$title="Fundamental<br/>Trigonometric Identities";
$img1="images/aseries1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:24pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:18pt;color:#CC0066'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#BB0000'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:36pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:30pt;color:#CC0066'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#BB0000'>"; 
	}

$article="

Trigonometric identities are equations that involve trigonometric functions and are true for all values of the variables. 
These identities are useful in solving trigonometric equations and in simplifying trigonometric expressions.
<br/><br/>
The most basic trigonometric identities include the reciprocal identities, quotient identities, Pythagorean identities, and genative angle identitites.
<br/><br/><br/>
@blue
Reciprocal Identitites
@nblue
<br/><br/>
Reciprocal identities refer to trigonometric functions that are reciprocals of each other.
The reciprocal identities are:
<br/><br/>
<table align='center' bgcolor='#EBF4FD' bordercolor='#A8D3FE'><tr><td style='padding-right:50px; padding-left:50px; padding-top:50px; padding-bottom:50px' width='450' height='50' align='center'>
$tfont1
csc(&theta;) = 1/sin(&theta;)<br/>
sec(&theta;) = 1/cos(&theta;)<br/>
cot(&theta;) = 1/tan(&theta;)
</td></tr></table>
<br/><br/>
@blue
Quotient Identitites
@nblue
<br/><br/>
Quotient identities pertain to trigonometric functions that are quotients of other trigonometric functions.
The quotient identities are:
<br/><br/>
<table align='center' bgcolor='#EBF4FD' bordercolor='#A8D3FE'><tr><td style='padding-right:50px; padding-left:50px; padding-top:50px; padding-bottom:50px' width='500' height='50' align='center'>
$tfont1
tan(&theta;) = sin(&theta;)/cos(&theta;)<br/>
cot(&theta;) = cos(&theta;)/sin(&theta;)
</td></tr></table>
<br/><br/>
@blue
Pythagorean Identitites
@nblue
<br/><br/>
Pythagorean identities involve squares of trigonometric functions that follow the Pythagorean Theorem.
The Pythagorean identities are:
<br/><br/>
<table align='center' bgcolor='#EBF4FD' bordercolor='#A8D3FE'><tr><td style='padding-right:50px; padding-left:50px; padding-top:50px; padding-bottom:50px' width='550' height='50' align='center'>
$tfont1
sin<sup>2</sup>(&theta;) + cos<sup>2</sup>(&theta;) = 1<br/>
1 + tan<sup>2</sup>(&theta;) = sec<sup>2</sup>(&theta;)<br/>
1 + cot<sup>2</sup>(&theta;) = csc<sup>2</sup>(&theta;)
</td></tr></table>
<br/><br/>
@blue
Negative Angle Identitites
@nblue
<br/><br/>
Negative angle identities relate the trigonometric functions of a positive angle with the same functions of its negative.
The negative angle identities are:
<br/><br/>
<table align='center' bgcolor='#EBF4FD' bordercolor='#A8D3FE'><tr><td style='padding-right:50px; padding-left:50px; padding-top:50px; padding-bottom:50px' width='450' height='50' align='center'>
$tfont1
sin (-&theta;)  =  -sin &theta;<br/>
cos (-&theta;)  =  cos &theta;<br/>
tan (-&theta;)  =  -tan &theta;<br/>
csc (-&theta;)  =  -csc &theta;<br/>
sec (-&theta;)  =  sec &theta;<br/>
cot (-&theta;)  =  -cot &theta;
</td></tr></table>

"
?>
