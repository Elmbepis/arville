<?php
$grd=$grd;
$title="The Polar<br/>Coordinate System";
$img1="images/polar1.jpg";
$img2="images/polar2.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="

The polar coordinate system is a two-dimensional coordinate system in which a point is represented by an ordered pair of values, (r, &theta;), 
where r is the distance from the origin to the point and &theta; is the angle between the positive x-axis and the line connecting the origin to the point. 
<br/><br/>
The origin is a fixed point in the plane, known as the pole, and the angle is measured in radians, counterclockwise from the positive x-axis.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
Below are some examples of polar coordinates.
<br/><br/>
1. $vio(3, 0)$black represents the point on the positive x-axis, 3 units away from the origin.
<br/><br/>
2. $vio(3, &pi;/4)$black represents the point 3 units away from the origin and at an angle of 45 degrees (or &pi;/4 radians) counterclockwise from the positive x-axis.
<br/><br/>
3. $vio(6, &pi;/2)$black represents the point on the positive y-axis, 6 units away from the origin.
<br/><br/>
4. $vio(5, &pi;)$black represents the point on the negative x-axis, 5 units away from the origin.
<br/><br/>
5. $vio(8, 3&pi;/2)$black represents the point on the negative y-axis, 8 units away from the origin.
<br/><br/>
6. $vio(6, &pi;/3)$black represents a point 6 units away from the origin and at an angle of 60 degrees (or &pi;/3 radians) counterclockwise from the positive x-axis.
<br/><br/>
7. $vio(7, 5&pi;/6)$black represents a point 7 units away from the origin and at an angle of 150 degrees (or 5&pi;/6 radians) counterclockwise from the positive x-axis.
<br/><br/>
8. $vio(6, 5&pi;/4)$black represents a point 6 units away from the origin and at an angle of 225 degrees (or 5&pi;/4 radians) counterclockwise from the positive x-axis.
<br/><br/>
9. $vio(6, -&pi;/6)$black represents a point 6 units away from the origin and at an angle of -30 degrees (or -&pi;/6 radians) counterclockwise from the positive x-axis.
<br/><br/>
10. $vio(8, -&pi;/4)$black represents a point 8 units away from the origin and at an angle of -45 degrees (or -&pi;/4 radians) counterclockwise from the positive x-axis.
<br/><br/>
Below are the plots of the points given as examples above.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/>
In the polar coordinate system, the x-coordinate of a point is given by rcos(&theta;) and the y-coordinate is given by rsin(&theta;). 
<br/><br/>
The distance between two points in the polar coordinate system is given by the Euclidean distance formula: 
<br/><br/>
$vio d = sqrt[(x<sub>2</sub>-x<sub>1</sub>)<sup>2</sup> + (y<sub>2</sub>-y<sub>1</sub>)<sup>2</sup>]$black
<br/><br/>
where: <br/>
x<sub>1</sub> = r1cos(&theta;<sub>1</sub>)<br/>
x<sub>2</sub> = r2cos(&theta;<sub>2</sub>)<br/>
y<sub>1</sub> = r1sin(&theta;<sub>1</sub>)<br/>
y<sub>2</sub> = r2sin(&theta;<sub>2</sub>)
<br/><br/>$vio<u>
Polar Form of<br/>Complex Numbers
</u>$black<br/><br/>
One of the most important applications of the polar coordinate system is in the field of complex numbers. In this context, the polar coordinate system is used to represent a complex number in the form of a magnitude and an angle. 
<br/><br/>
A complex number can be represented as z = r(cos(&theta;) + i sin(&theta;)), where i is the imaginary unit. This representation is known as the polar form of a complex number.
<br/><br/>$vio<u>
Applications in Math,<br/>Science, and Engineering
</u>$black<br/><br/>
The polar coordinate system is particularly useful when working with problems involving rotational symmetry, such as those found in physics and engineering. 
In such problems, the angle &theta; often represents the direction or phase of a quantity, and the distance r represents the magnitude.
<br/><br/>
The polar coordinate system is also useful in the field of mathematics, particularly in the study of calculus. The graph of a function in the polar coordinate system is known as a polar curve. 
These are often used to represent curves that have rotational symmetry or that are defined in terms of angles or directions.
<br/><br/>$vio<u>
Limitations of the<br/>Polar Coordinate System
</u>$black<br/><br/>
However, the polar coordinate system also has some limitations. For example, it is not well-suited for representing lines or shapes that are not defined in terms of angles or directions. 
Additionally, polar coordinates can cause difficulty when working with certain geometric constructions, such as those involving parallel lines.
"
?>
