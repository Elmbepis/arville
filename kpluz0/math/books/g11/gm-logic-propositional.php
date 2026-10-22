<?php
$grd=$grd;
$title="Basic Concepts of<br/>Propositional Logic";
$img1="images/aseries1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";

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
Propositional logic, also known as propositional calculus, is a branch of logic that studies the relationships between statements that are either true or false. 
<br/><br/><br/>
@blue
Propositional Variables
@nblue
<br/><br/>
One of the key concepts in propositional logic is the concept of propositional variables. Propositional variables are letters or symbols that represent statements and can take on the values of true or false. 
<br/><br/>
Examples of propositional variables include 'p' and 'q'. Propositional variables are used to build propositional formulas, which are expressions that can be evaluated to be either true or false.
<br/><br/><br/>
@blue
Logical Operators
@nblue
<br/><br/>
A logical operator is a symbol or word that's used to connect propositional variables to form more complex statements. 
<br/><br/>
The most basic logical operator is 'and', represented by the symbol $red &#8743;$black, which connects two propositional variables and results in a true statement if both variables are true. 
<br/><br/>
The 'or' operator, represented by the symbol $red &#8744;$black, results in a true statement if at least one of the variables is true. 
<br/><br/>
The 'not' operator, represented by the symbol $red &#172;$black, negates the value of a propositional variable, resulting in a true statement if the variable is false, and a false statement if the variable is true. 
<br/><br/>
The 'if-then' operator, represented by the symbol $red &#8594;$black, results in a true statement if the first variable is false or if both variables are true. 
<br/><br/>
The 'if and only if' operator, represented by the symbol $red &#8596;$black, results in a true statement if both variables have the same truth value.
<br/><br/><br/>
@blue
Tautologies, Contradictions,<br/>and Contingencies
@nblue
<br/><br/>
A propositional formula is a tautology if it is always true for any combination of truth values of its propositional variables. 
<br/><br/>
A propositional formula is a contradiction if it is always false for any combination of truth values of its propositional variables. 
<br/><br/>
A propositional formula is a contingency if it is not a tautology or a contradiction, its truth value can be either true or false depending on the truth values of its propositional variables.
<br/><br/><br/>
@blue
Truth Tables
@nblue
<br/><br/>
A truth table is a table that shows the truth values of a propositional formula for all possible combinations of truth values of its component propositional variables. 
<br/><br/>
Below is an example of a truth table for a propositional formula involving two propositional variables p and q.
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Example of a Truth Table </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='900' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 p</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 q</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 p &#8743; q</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 p &#8744; q</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 &#172; p</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 p&#8594;q</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 p&#8596;q</td>
</tr>
<tr>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 T</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 T</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 T</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 T</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 F</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 T</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 T</td>
</tr>
<tr>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 T</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 F</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 F</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 T</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 F</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 F</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 F</td>
</tr>
<tr>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 F</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 T</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 F</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 T</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 T</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 T</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 F</td>
</tr>
<tr>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 F</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 F</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 F</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 F</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 T</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 T</td>
<td width='14%' align='center' valign='top' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:25px'>$tfont1 T</td>
</tr>
</table>
<br/><br/>
The first two columns of the table represent the possible combinations of truth values for the propositional variables p and q. 
The next four columns show the results of applying the logical operators $red &#8743;$black (and), $red &#8744;$black (or), $red &#172;$black (not), $red &#8594;$black (if-then) and $red &#8596;$black (if and only if) to p and q.
<br/><br/>
For example, in the first row, p is true (T) and q is true (T). 
<br/><br/>
When we apply the logical operator $red &#8743;$black (and) to p and q, we get 'p $red &#8743;$black q' which is also true (T). 
<br/><br/>
When we apply the logical operator $red &#8744;$black (or) to p and q, we get 'p $red &#8744;$black q' which is also true (T). 
<br/><br/>
When we apply the logical operator $red &#172;$black (not) to p, we get '$red&#172;$black p' which is false (F). 
<br/><br/>
When we apply the logical operator $red &#8594;$black (if-then) to p and q, we get 'p $red &#8594;$black q' which is true (T) and when we apply the logical operator $red &#8596;$black (if and only if) to p and q, we get 'p $red &#8596;$black q' which is true (T).
<br/><br/>
By looking at the truth table, we can see that the propositional formula p $red &#8743;$black q is true only when both p and q are true. On the other hand, the propositional formula p $red &#8744;$black q is true when at least one of p or q is true. 
<br/><br/>
The propositional formula $red&#172;$black p is true when p is false, the propositional formula p $red &#8594;$black q is true when p is false or when both p and q are true 
and the propositional formula p $red &#8596;$black q is true when p and q have the same truth value.
<br/><br/>
Truth tables provide a systematic way to determine the truth value of a propositional formula for all possible combinations of truth values of its component propositional variables and are a powerful tool for evaluating the validity of logical arguments.
"
?>
