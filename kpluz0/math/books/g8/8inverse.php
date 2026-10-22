<?php
$grd=$grd;
$title="Inverse Statements";

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

In the last lesson, we learned that a converse statement is a statement in which the hypothesis $blue p $black and conclusion $blue q $black of a conditional statement are interchanged, or  $blue q&#8594;p$black. 
In this lesson, we will discuss what inverse statements are and how they are related to conditional and converse statements.
<br/><br/>
When the statement $blue p $black is true, the statement $blue 'not p' $black is false. Similarly, if $blue p $black is false, its negation $blue 'not p' $black is true. 
Negations are commonly denoted with a tilde $blue &sim;$black. So instead of writing $blue 'not p' $black we can write $blue '&sim;p' $black .
<br/><br/>
An inverse statement is a statement in which both the hypothesis $blue p $black and conclusion $blue q $black of a conditional statement are negated, or  $blue &sim;p&#8594;&sim;q$black.
The inverse of the conditional statement 'if p, then q' is therefore 'if not p, then not q.'
<br/><br/>
As an example, consider the conditional statement, \"If the sun is shining, then it is daytime.\"
Its inverse statement would be:
<br/><br/>
$vio If the sun is not shining, then it is not daytime.$black
<br/><br/>
Notice in the example above that the $blue p $black and $blue q $black of the conditional statement were both negated in its inverse statement.
<br/><br/>
Thus, to form the inverse of a conditional statement, one simply needs to negate the hypothesis and the conclusion of the latter.
<br/><br/>
Below are other examples of conditional statements with their corresponding inverse statements.
<br/><br/>
1. $vio Conditional:$black If a triangle is equilateral, then it is equiangular.<br/>
$blue Inverse: $black If a triangle is not equilateral, then it is not equiangular.
<br/><br/>
2. $vio Conditional:$black If a triangle has two sides of equal length, then it is an isosceles triangle.<br/>
$blue Inverse: $black If a triangle does not have two sides of equal length, then it is not an isosceles triangle.
<br/><br/>
3. $vio Conditional:$black If an angle is 90 degrees, then it is right.<br/>
$blue Inverse: $black If an angle is not 90 degrees, then it is not right.
<br/><br/>
The inverse statement is notated as $blue &sim;p&#8594;&sim;q $black (if not p, then not q). 
Compare this with the notation for a  conditional statement: $blue p&#8594;q$black.
<br/><br/>
The inverse statement has the same logic as the converse of its conditional statement. 
Thus, $blue &sim;p&#8594;&sim;q $black and $blue q&#8594;p$black are said to be logically equivalent.
<br/><br/>
Since inverse and converse statements are logically equivalent, they have the same truth table.
The truthfulness of an inverse statement also depends on the truthfulness of the hypotheses of the conditional statement.
Below is the truth table for an inverse (and converse) statement:
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Truth Table for an<br/>Inverse Statement &sim;p&#8594;&sim;q </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 <b>p</b></td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 <b>q</b></td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 <b>&sim;p&sim;q</b></td>
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
In the truth table above, &sim;p&sim;q is only false when the hypothesis $blue p$black is false and the conclusion $blue q$black is true; otherwise it is true. 
<br/><br/>
Thus, $blue &sim;p&#8594;&sim;q $black is either true or false, but not both, and its truth is determined by the $blue &sim;p&#8594;&sim;q $black truth table above.
<br/><br/>
One must realize that the inverse statement is not always true, even for cases wherein the conditional statement is true.
<br/><br/>
Consider the following conditional statement: \"If it rained last night, then the sidewalk is wet.\"
This conditional statement is always true, but its inverse statement is not always true:
<br/><br/>
$vio If it did not rain last night, then the sidewalk is not wet.$black
<br/><br/>
The inverse statement above is only true most of the time, but not always.
<br/><br/>
Below are other examples of inverse statements that are not always true even if their corresponding conditional statements are always true.
<br/><br/>
$vio 1. Conditional: $black If two numbers are odd, then their sum will be even.$black<br/>
$blue Inverse (not true): $black If two numbers are not odd, then their sum will not be even.$black
<br/><br/>
$vio 2. Conditional: $black If an angle is less than 90 degrees, then it is not right.$black<br/>
$blue Inverse (not always true): $black If an angle is not less than 90 degrees, then it is right.$black
<br/><br/>
$vio 3. Conditional: $black If a number ends in 2, then it is even.$black<br/>
$blue Inverse (not always true): $black If a number does not end in 2, then it is not even.$black
<br/><br/>
$red Exercise$black
<br/><br/>
Form an inverse statement for each of the following conditional statements and state if this inverse is always true or not:
<br/><br/>
1. If it's August, then last month was July.
<br/><br/>
2. If a number is composite, then its multiples are composite.
<br/><br/>
3. If a figure is a square, then it is a quadrilateral.
<br/><br/>
4. If two intersecting lines form a right angle, then they are perpendicular.
<br/><br/>
5. If the sum of the measures of two angles is 180 degrees, then the angles are supplementary.
<br/><br/>
$blue Possible Answers:$black
<br/><br/>
1. If it's not August, then last month was not July (always true).
<br/><br/>
2. If a number is not composite, then its multiples are not composite (not always true).
<br/><br/>
3. If a figure is not a square, then it is not a quadrilateral (not always true).
<br/><br/>
4. If two intersecting lines do not form a right angle, then they are not perpendicular (always true).
<br/><br/>
5. If the sum of the measures of two angles is not 180 degrees, then the angles are not supplementary (always true).
"
?>
