<?php
$grd=$grd;
$title="Contrapositive Statements";

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

In this lesson, we will discuss what contropositive statements are and how they are related to the other types of statements that we've discussed in previous lessons: conditional, converse, and inverse statements.
<br/><br/>
A contrapositive statement is a statement in which the hypothesis and conclusion of a conditional statement are BOTH negated and interchanged. 
The contrapositive of the conditional statement 'if p, then q' is therefore 'if not q, then not p.'
<br/><br/>
A contrapositive statement is therefore formed by swapping the $blue p $black and $blue q $black of a conditional statement and then negating them both.
<br/><br/>
As an example, consider the conditional statement, \"If there are stars in the sky, then the sun has set.\"
Its contrapositive statement would be:
<br/><br/>
$vio If the sun has not set, then there are no stars in the sky.$black
<br/><br/>
Notice in the example above that the $blue p $black and $blue q $black of the conditional statement were both swapped and negated in its contrapositive statement.
<br/><br/>
Below are other examples of conditional statements with their corresponding contrapositive statements.
<br/><br/>
1. $vio Conditional:$black If two angles add up to 90 degrees, then they are complementary.<br/>
$blue Contrapositive: $black If two angles are not complementary, then they do not add up to 90 degrees.
<br/><br/>
2. $vio Conditional:$black If two triangles are similar, then their corresponding angles are congruent and their corresponding sides are in proportion.<br/>
$blue contrapositive: $black If their corresponding angles are not congruent or their corresponding sides are not in proportion, then two triangles are not similar.
<br/><br/>
3. $vio Conditional:$black If a number is rational, then it can be expressed as a fraction of two integers.<br/>
$blue contrapositive: $black If a number can not be expressed as a fraction of two integers, then it is not rational.
<br/><br/>
The contrapositive statement is notated as $blue &sim;q&#8594;&sim;p $black (if not q, then not p). 
Compare this with the notation for a  conditional statement: $blue p&#8594;q$black.
<br/><br/>
The contrapositive statement has the same logic as its corresponding conditional statement. 
Thus, $blue &sim;q&#8594;&sim;p $black and $blue p&#8594;q$black are logically equivalent.
<br/><br/>
Since conditional statements and their contrapositive statements are logically equivalent, they have the same truth table.
As such, a contrapositive statement is only false when the conditional statement's hypothesis $blue p$black is true and the conclusion $blue q$black is false.
Below is the truth table for an contrapositive statement:
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Truth Table for a<br/>Contrapositive Statement &sim;q&#8594;&sim;p </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 <b>p</b></td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 <b>q</b></td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 <b>&sim;q&#8594;&sim;p</b></td>
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 T</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 T</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 T</td> 
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 T</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 F</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 F</td> 
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 F</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 T</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 T</td> 
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 F</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 F</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 T</td> 
</tr>
</table>
<br/><br/>
Since conditional statements and their contrapositive statements have the same truth table, a contrapositive statement will be true if its corresponding conditional statement is true, despite being written differently.
Thus, they never contradict each other.
<br/><br/>
$red Exercise$black
<br/><br/>
Form a contrapositive statement for each of the following conditional statements:
<br/><br/>
1. If a thing can reproduce, then it is alive.
<br/><br/>
2. If an animal is a carnviore or omnivore, then it eats other animals.
<br/><br/>
3. If a side of a right triangle is the hypotenuse, then it is the longest side.
<br/><br/>
4. If a quadrilateral has four right angles, then it a rectangle.
<br/><br/>
5. If a polygon has 11 sides, then it is a hendecagon.
<br/><br/>
$blue Possible Answers:$black
<br/><br/>
1. If a thing is not alive, then it can not reproduce.
<br/><br/>
2. If an animal does not eat other animals, then it is not a carnivore nor omnivore.
<br/><br/>
3. If a side of a right triangle is not the longest side, then it is not the hypotenuse.
<br/><br/>
4. If a quadrilateral is not a rectangle, then it does not have four right angles.
<br/><br/>
5. If a polygon is not a hendecagon, then it does not have 11 sides.
"
?>
