<?php
$grd=$grd;
$title="Converse Statements";

$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#BB0000'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#800080'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:26pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#BB0000'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#800080'>"; 
	}

$article="

In the last lesson, we learned that a conditional statement is a statement with a hypothesis $blue p $black followed by a conclusion $blue q $black wherein the conclusion will happen if the hypothesis happens, or  $blue p&#8594;q$black. 
In this lesson, we will discuss what converse statements are and how they are related to conditional statements.
<br/><br/>
A converse statement is a statement in which the hypothesis and conclusion of a conditional statement are interchanged. 
It is therefore a statement whose form is opposite that of a conditional statement.
<br/><br/>
As an example, consider the conditional statement, \"If a number is even, then it is divisible by 2.\"
Its converse statement would be:
<br/><br/>
$vio If a number is divisible by 2, then it is even.$black
<br/><br/>
Notice in the example above that the $blue p $black and $blue q $black of the conditional statement were interchanged in its converse statement.
<br/><br/>
Thus, to form the converse of a conditional statement, one simply needs to interchange the hypothesis and the conclusion of the latter.
<br/><br/>
Below are other examples of conditional statements with their corresponding converse statements.
<br/><br/>
1. $vio Conditional:$black If a number ends in 0, then it is a multiple of 10.<br/>
$blue Converse: $black If a number is a multiple of 10, then it ends in 0.
<br/><br/>
2. $vio Conditional:$black  If an angle is less than 90 degrees, then it is acute.<br/>
$blue Converse: $black If an angle is acute, then it is less than 90 degrees.
<br/><br/>
3. $vio Conditional:$black  If two lines don't intersect, then they are parallel.<br/>
$blue Converse: $black If two lines are parallel, then they don't intersect.
<br/><br/>
The converse statement is notated as  $blue q&#8594;p $black (if p, then q). Compare this with the notation for a  conditional statement: $blue p&#8594;q$black.
<br/><br/>
In the last lesson, we learned that $blue p&#8594;q $black is only false when the hypothesis $blue p$black is true and the conclusion $blue q$black is false. 
<br/><br/>
The truthfulness of a converse statement, on the other hand, depends on the truthfulness of the hypotheses of the conditional statement.
Below is the truth table for a converse statement showing this:
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Truth Table for a<br/>Converse Statement q&#8594;p </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 <b>p</b></td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 <b>q</b></td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 <b>qp</b></td>
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 T</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 T</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 T</td> 
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 T</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 F</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 T</td> 
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 F</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 T</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 F</td> 
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 F</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 F</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 T</td> 
</tr>
</table>
<br/><br/>
In the truth table above, qp is only false when the hypothesis $blue p$black is false and the conclusion $blue q$black is true; otherwise it is true. 
<br/><br/>
Thus, $blue q&#8594;p $black is either true or false, but not both, and its truth is determined by the $blue q&#8594;p $black truth table above.
<br/><br/>
One must realize that the converse statement is not always true, even for cases wherein the conditional statement is true.
<br/><br/>
Consider the following conditional statement: \"If you are a teacher, then you are a human.\"
This conditional statement is always true, but its converse statement is not always true:
<br/><br/>
$vio If you are a human, then you are a teacher.$black
<br/><br/>
The converse statement above is only true for certain cases, but not true always.
<br/><br/>
Below are other examples of converse statements that are not always true even if their corresponding conditional statements are always true.
<br/><br/>
$vio 1. Conditional: $black If two numbers are even, then their sum will be even.$black<br/>
$blue Converse (not always true): $black If the sum of two numbers is even, then they are even.$black
<br/><br/>
$vio 2. Conditional: $black If a triangle is equilateral, then it is isosceles.$black<br/>
$blue Converse (not always true): $black If a triangle is isosceles, then it is equilateral.$black
<br/><br/>
$vio 3. Conditional: $black If a quadrilateral is square, then it is a rectangle.$black<br/>
$blue Converse (not always true): $black If a quadrilateral is rectangle, then it is a square.$black
<br/><br/>
$red Exercise$black
<br/><br/>
Form a converse statement for each of the following conditional statements:
<br/><br/>
1. If today is Wednesday, then yesterday was Tuesday.
<br/><br/>
2. If a number is prime, then its factors are only itself and another number.
<br/><br/>
3. If a number is the square of a non-zero real number, then it is positive.
<br/><br/>
4. If a number is odd, then it is not divisible by 2.
<br/><br/>
5. If an angle is oblique, then it is not right.
<br/><br/>
$blue Possible Answers:$black
<br/><br/>
1. If yesterday was Tuesday, then today is Wednesday.
<br/><br/>
2. If a number's factors are only itself and another number is prime, then it is prime.
<br/><br/>
3. If a number is positive, then it is the square of a non-zero real number.
<br/><br/>
4. If a number is not divisible by 2, then it is odd.
<br/><br/>
5. If an angle is not right, then it is oblique.
"
?>
