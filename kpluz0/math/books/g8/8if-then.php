<?php
$grd=$grd;
$title="Conditional or<br/>If-Then Statements";

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

A conditional statement, also called an if-then statement, is a statement with a hypothesis followed by a conclusion wherein the conclusion will happen if the hypothesis happens. 
This is an example of a conditional statement:
<br/><br/>
$vio 'If you don't eat, you will be hungry.'$black
<br/><br/>
A conditional statement is symbolized by pq, in which p is a hypothesis and q is a conclusion. 
The logical connector in a conditional statement is the symbol $blue '&#8594;'$black.
<br/><br/>
The conditional statement $blue p&#8594;q $black intuitively means that  q  is true whenever  p  is true. It says nothing about the truth value of  q  when  p  is false. 
Using this as a guide, we define the conditional statement $blue p&#8594;q $black to be false only when p is true and q is false, that is, only when the hypothesis is true and the conclusion is false. 
<br/><br/>
In all other cases, $blue p&#8594;q $black is true. This is summarized in the table below, which is called a truth table for the conditional statement $blue p&#8594;q$black. Here, 'T' stands for 'true' and 'F' stands for 'false.'
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Truth Table for a<br/>Conditional Statement p&#8594;q </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 <b>p</b></td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 <b>q</b></td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 <b>pq</b></td>
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
In the truth table above, pq is only false when the hypothesis $blue p$black is true and the conclusion $blue q$black is false; otherwise it is true. 
<br/><br/>
Thus, $blue p&#8594;q $black is either true or false, but not both, and its truth is determined by the $blue p&#8594;q $black truth table above.
<br/><br/>
$vio If you get excellent grades, then you will never get into a good college$black
<br/><br/>
The conditional statement above is false because the conclusion that you'll never get into a good college is false if the hypothesis is true (you got excellent grades).  
<br/><br/>
$vio<u>Rewriting Statements<br/>in If-Then Form</u>$black
<br/><br/>
Some conditional statements are not written in 'if-then' form.
Once you've determined that a statement is conditional because it contains both a hypothesis and conclusion, you may apply the following steps to transform it into 'if-then' form:
<br/><br/>
1. Identify the $blue p$black (hypothesis) and the $blue q$black (conclusion) of the statement.
<br/><br/>
2. Rewrite the sentence in this format: 'If $blue p$black, then $blue q$black.'
<br/><br/>
Consider the statement below:
<br/><br/>
$vio Joy brings her umbrella whenever it is raining.$black
<br/><br/>
In the statement above, it is the rain that causes Joy to bring her umbrella.  Thus, the occurrence of rain is the $blue p$black and Joy's bringing of umbrella is the $blue q$black.
<br/><br/>
The statement may therefore be rewritten in if-then form as follows:
<br/><br/>
$vio If it is raining, then Joy brings her umbrella.$black 
<br/><br/>
Let's try another example:
<br/><br/>
$vio The angles in a triangle, or a polygon with three angles, always add up to 180 degrees.$black
<br/><br/>
In the statement above, it is being a triangle that causes the angles of a polygon to add up to 180 degrees.  Thus, being a triangle is the $blue p$black and having angles that add up to 180 degrees is the $blue q$black.
<br/><br/>
The statement may therefore be rewritten in if-then form as follows:
<br/><br/>
$vio If a polygon is a triangle, then its angles add up to 180 degrees.$black 
<br/><br/>
$red Exercise$black
<br/><br/>
Rewrite the following conditional statements in if-then form:
<br/><br/>
1. David eats pasta every Wednesday.
<br/><br/>
2. Every equilateral triangle has three congruent sides.
<br/><br/>
3. Squares have four right angles.
<br/><br/>
4. All angles less than 90 degrees are acute.
<br/><br/>
5. Only people over 40 years of age are allowed to run for president.
<br/><br/>
$blue Possible Answers:$black
<br/><br/>
1. If it's Wednesday, then David will eat pasta.
<br/><br/>
2. If a triangle is equilateral, then it has three congruent sides.
<br/><br/>
3. If a shape is a square, then it has four right angles.
<br/><br/>
4. If an angle is less than 90 degrees, then it is acute.
<br/><br/>
5. If a person is over 40 years of age, then he or she is allowed to run for president.
"
?>
