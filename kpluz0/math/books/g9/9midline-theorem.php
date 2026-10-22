<?php

$grd=$grd;
$title="The Midline Theorem";
$img1="images/midline-theorem.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000CC'>";
$red=$font."<font color='#CC0000'>";
$black=$font."<font color='#000000'>";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#0000BB'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#800080'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:26pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#0000BB'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#800080'>"; 
	}

$article="
The Midline Theorem is stated as follows:
<br/><br/>
The segment between the midpoints of two sides of a triangle is parallel to the third side and half as long.
<br/><br/>
Consider the following diagram:
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
In triangle ABC above, if D and E are the midpoints of <img src='images/segment-ab.jpg'> and <img src='images/segment-bc.jpg'>, then <img src='images/segment-de.jpg'> is parallel to <img src='images/segment-ac.jpg'> and DE = 1/2 AC. 
<br/><br/><br/>
@blue
Proof of the<br/>Midline Theorem
@nblue
<br/>
The table below presents the proof to the Midline Theorem.
<br/><br/>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 Statements</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 Reasons</td>
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont3 1. EF = DE</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1. Point Plotting Theorem</td>
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont3 2. EB = EC</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 2. definition of midpoint</td>
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont3 3. &angle;x &#8773; &angle;y</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 3. Vertical Angle Theorem</td>
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont3 4. &#9651;EFC &#8773; &#9651;EDB</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 4. SAS</td>
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont3 5. &angle;v &#8773; &angle;w</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 5. definition of congruent triangles</td>
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont3 6. segment AB &#8741; segment CF</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 6. The AIP Theorem</td>
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont3 7. AD = DB</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 7. definition of midpoint</td>
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont3 8. DB = FC</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 8. definition of congruent triangles</td>
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont3 9. AD = FC</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 9. transitive property</td>
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont3 10. ADFC is a parallelogram.</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 10. definition of a parallelogram</td>
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont3 11. segment DE &#8741; segment AC</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 11. definition of a parallelogram</td>
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont3 12. DF = DE + EF = 2DE</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 12. Step 1 and Addition Property of Equality</td>
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont3 13. AC = 2DE</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 13. Transitive Property</td>
</tr>
<tr>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont3 14. DE = 1/2 AC</td>
<td align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 14. Multiplication Property of Equality</td>
</tr>
</table>


"
?>




















