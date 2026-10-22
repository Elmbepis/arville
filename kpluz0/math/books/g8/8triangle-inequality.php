<?php
$grd=$grd;
$title="Triangle Inequality<br/>Theorems";
$img1="images/triangle-ineq1.jpg";
$img2="images/triangle-ineq2.jpg";
$img3="images/triangle-ineq3.jpg";
$img4="images/triangle-ineq4.jpg";
$img5="images/triangle-ineq5.jpg";
$red=$font."<font color='#BB0000'>";
$vio=$font."<font color='#800080'>";
$black=$font."<font color='#000000'>";

$article="
In this lesson, we will discuss the different theorems on inequalities within a single triangle.
<br/><br/><br/>
@blue
Basic Theorems on<br/>Triangle Inequality
@nblue
<br/><br/>
1. If two sides of a triangle are not congruent, then the angles opposite them are not congruent, and the larger angle is opposite the longer side.
<br/><br/>
2. If two angles of a triangle are not congruent, then the sides opposite them are not congruent, and the longer side is opposite the larger angle.
<br/><br/><br/>
@blue
Exterior Angle Theorem
@nblue
<br/><br/>
The Exterior Angle Theorem is stated as follows:
<br/><br/>
<i>In a triangle, the measure of an exterior angle is equal to the sum of the measures of the two interior angles opposite to it.</i>
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
$red<u>Proof</u>$black
<br/><br/>
1. Recall that any triangle has 3 internal angles whose sum is always 180&deg;. 
Thus, in the diagram above, &angle;A + &angle;B + &angle;C = 180&deg;.
<br/><br/>
2. &angle;C = 180&deg; - (&angle;A + &angle;B)
<br/><br/>
3. Recall that an exterior angle of a triangle is supplementary to its adjacent interior angle.
Thus, in the diagram above, &angle;E = 180&deg; - &angle;C.
<br/><br/>
4. Based on steps 2 and 3,<br/>&angle;E = 180&deg; - [180&deg; - (&angle;A + &angle;B)]<br/>
= &angle;A + &angle;B.
<br/><br/><br/>
@blue
Exterior Angle<br/>Inequality Theorem
@nblue
<br/><br/>
The Exterior Angle Inequality Theorem is stated as follows:
<br/><br/>
<i>The measure of any exterior angle of a triangle is greater than either of the opposite interior angles.</i>
<br/><br/>
This theorem follows from the Exterior Angle Theorem above.
This rule is satisfied by all the six external angles of a triangle.
<br/><br/><br/>
@blue
Triangle Inequality Theorem
@nblue
<br/><br/>
The Triangle Inequality Theorem is stated as follows:
<br/><br/>
<i>The sum of the length of any two sides of a triangle is greater than the length of the third side.</i>
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/>
$red<u>Proof</u>$black
<br/><br/>
1. Let D be a point on the ray opposite to <img src='images/segment-bc.jpg'>, such that BD = BA.
<br/><br/>
2. DC = DB + BC because B is between D and C.
<br/><br/>
3. DC = AB + BC because DB = AB.
<br/><br/>
4. Thus, m&angle;DAC = m&angle;DAB + m&angle;BAC.
<br/><br/>
5.  It then follows that m&angle;DAC > m&angle;DAB.
<br/><br/>
6. Based on the Isosceles Triangle Theorem, m&angle;BDA = m&angle;DAB because BD = BA.
<br/><br/>
7. Thus, m&angle;DAC > m&angle;BDA.
<br/><br/>
8. DC > AC because if two angles in a triangle are not congruent, then the longer side is opposite the larger angle.
<br/><br/>
9. Combining steps 3 and 8, we get AB + BC > AC, which is what we were trying to prove.
<br/><br/><br/>
@blue
Hinge Theorem
@nblue
<br/><br/>
The Hinge Theorem is stated as follows:
<br/><br/>
<i>If two sides of one triangle are respectively congruent to two sides of a second triangle, and the included angle of the first triangle is larger than the included angle of the second traingle, 
then the third side of the first triangle is longer than the third side of the second triangle.</i>
<br/><br/>
Consider triangle ABC and triangle DEF in the diagram below, wherein AB = DE and AC = DF.  If BAC > EDF, then BC > EF.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
$red<u>Proof</u>$black
<br/><br/>
1. Let us first construct AKC such that K is in the interior of BAC and triangle AKC is congruent to triangle DEF above, as shown in the left diagram below.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img4'>
</td></tr></table>
2. We then bisect BAK, and let D be the point where the bisector intersects, as shown in the right diagram above.
<br/><br/>
3. By congruence by SAS, we have &#9651;ADB &cong; &#9651;ADK.
<br/><br/>
4. Thus, DB = DK.
<br/><br/>
5. Applying the Triangle Inequality Theorem to &#9651;CKD, we get CK < CD + DK.
<br/><br/>
6. Thus, CK < CD + DB because DB = DK.
<br/><br/>
7. Since CK = EF and CD + DB = BC, we conclude that EF < BC, which is what we were trying to prove.
<br/><br/><br/>
@blue
Converse Hinge Theorem
@nblue
<br/><br/>
The Converse Hinge Theorem is stated as follows:
<br/><br/>
<i>If two sides of one triangle are respectively congruent to two sides of a second triangle, and the third side of the first triangle is longer than the third side of the second triangle, 
then the included angle of the first triangle is larger than the included angle of the second triangle.</i>
<br/><br/>
Consider triangle ABC and triangle DEF in the diagram below, wherein AB = DE and AC = DF.  If BC > EF, then BAC > EDF.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img5'>
</td></tr></table>


"
?>