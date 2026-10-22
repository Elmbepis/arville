<?php

$grd=$grd;
$title="Areas of Basic<br/>Plane Figures";
$img1="images/area-square.jpg";
$img2="images/area-rectangle.jpg";
$img3="images/area-triangle.jpg";
$img4="images/area-trapezoid.jpg";
$img5="images/area-circle.jpg";
$img6="images/area-composite.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000CC'>";
$red=$font."<font color='#CC0000'>";
$black=$font."<font color='#000000'>";

$article="
In the last lesson, we learned how to calculate the perimeters of basic plane figures.
In this lesson, we will learn how to calculate their areas.
<br/><br/>
The amount of space occupied by a plane figure on a flat surface is called its area.
<br/><br/><br/>
@blue
Calculating Areas
@nblue
<br/>
$vio<u>Square</u>$black
<br/><br/>
The area of a square is equal to the length of its side squared.
This means that we simply need to multiply the length of one side by itself to get the square's area. 
<br/><br/>
The formula for the area of a square is:
<br/><br/>
$red<b> A = s<sup>2</sup> = s x s</b>$black
<br/><br/>
where 'A' is the area and 's' is the length of each side.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
In the picture above, the area of the yellow square whose side is 4 units long is 16 sq units.
It is made up of 16 smaller squares (count them), each of which has an area of 1 sq unit.
<br/><br/>
Now, let's try using our formula to find the area of a square with a side that's 5 meters long is:
<br/><br/>
A = (5 meters)<sup>2</sup><br/>
A = 5 meters x 5 meters<br/>
A = $vio<b>25 square meters</b>$black
<br/><br/>
Did you notice that the unit for area is not meter, but square meter?
A square meter (sq m) is the area occupied by a square whose side is 1 meter long. 
It's what you get when you multiply 1 meter by itself.
<br/><br/>
Similarly, a square centimeter (sq cm) is the area occupied by a square whose side is 1 centimeter long. 
<br/><br/>
$vio<u>Rectangle</u>$black
<br/><br/>
The area of a rectangle is the product of its length and its width.
<br/><br/>
The formula for the area of a rectangle is therefore:
<br/><br/>
$red<b>A = L x W</b>$black
<br/><br/>
where 'A' is the area, 'L' is the length, and 'W' is the width.
<br/><br/>
Using this formula, the area of a rectangle that is 6 centimeters long and 3 centimeters wide is:
<br/><br/>
A = 6 cm x 3 cm = $vio<b>18 sq cm</b>$black.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/>
$vio<u>Triangle</u>$black
<br/><br/>
The area of a triangle is one-half the product of its base and its height.
<br/><br/>
When calculating the area of a triangle, any of its sides can be a base.
The height is the length of the line segment perpendicular to the base, whose endpoints are at the base and the vertex opposite the base.
<br/><br/>
The formula for the area of a triangle is therefore:
<br/><br/>
$red<b>A = 1/2 x (b x h)</b>$black
<br/><br/>
where 'A' is the area, 'b' is the base, and 'h' is the height.
<br/><br/>
Using this formula, the area of a triangle whose base is 9 inches long and whose height is 4 inches long is:
<br/><br/>
A = 1/2 x (9 x 4) inches = $vio<b>18 sq in</b>$black.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/>
$vio<u>Trapezoid</u>$black
<br/><br/>
The area of a trapezoid is the product of one-half the sum of its bases and its height.
The height of a trapezoid is the length of the line segment perpendicular to both of its bases.
<br/><br/>
The formula for the area of a triangle is therefore:
<br/><br/>
$red<b>A = (a + b)/2 x h</b>$black
<br/><br/>
where 'A' is the area, 'a' and 'b' are the bases, and 'h' is the height.
<br/><br/>
Using this formula, the area of a trapezoid whose bases are 6 and 8 feet long and whose height is 5 feet long is:
<br/><br/>
A = (6 feet + 8 feet)/2  x 5 feet<br/>
A = 7 feet  x 5 feet = $vio<b>35 sq ft</b>$black.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img4'>
</td></tr></table>
<br/>
$vio<u>Circle</u>$black
<br/><br/>
The formula for the area of a circle is:
<br/><br/>
$red<b>A = &pi; x r<sup>2</sup></b>$black, or<br/>
$red<b>A = 3.14 x r<sup>2</sup></b>$black
<br/><br/>
where 'A' is the area, '&pi;' is a special number that's always equal to around 3.14, and 'r' is the radius of the circle.
<br/><br/>
The radius of a circle is any line segment that starts at its center and ends on its circumference. 
It is one-half the diameter of the circle.
<br/><br/>
Using the formula, the area of a circle whose radius is 10 meters long is:
<br/><br/>
A = 3.14 x (10 meters)<sup>2</sup><br/> 
A = 3.14 x (100 sq m)<br/> 
A = $vio<b>314 sq m</b>$black.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img5'>
</td></tr></table>
<br/>
If you are just given the diameter, you simply need to divide it by 2 to get the radius before applying the formula.
As an example, the area of a circle whose diameter is 10 meters is:
<br/><br/>
r = d/2 = 10/2 = 5 meters<br/>
A = 3.14 x (5 meters)<sup>2</sup><br/> 
A = 3.14 x (25 sq m)<br/> 
A = $vio<b>78.5 sq m</b>$black.
<br/><br/><br/>
@blue
More Examples of How to<br/>Calculate Areas
@nblue
<br/>
@php1areas-pf@
<br/>
If you refresh this page, it will give new examples of how to calculate areas. 
You can therefore have as many examples as you want for this lesson! 
<br/><br/>
You can use this feature to practice calculating areas. 
<br/><br/><br/>
@blue
Converting Sq Meters into<br/>Sq Centimeters and Vice Versa
@nblue
<br/>
We know that there are 100 centimeters in 1 meter.
Do you know how many sq centimeters there are in 1 sq meter?
<br/><br/>
Let's do the math:<br/>
1 m = 100 cm<br/>
Squaring both sides, we get:<br/>
1 sq meter = 10000 sq cm
<br/><br/>
Thus, there are 10000 sq cm in one sq m.
<br/><br/>
To convert an area in sq m into an area in sq cm, we need to multiply it by 10000.
<br/><br/>
To convert an area in sq cm into an area in sq m, we need to divide it by 10000.
<br/><br/>
$vio<u>Example # 1</u>$black
<br/><br/>
Convert 5 sq m into sq cm.
<br/><br/>
5 sq m = 5 x 10000 sq cm = 50000 sq cm.
<br/><br/>
$vio<u>Example # 2</u>$black
<br/><br/>
Convert 70000 sq cm into sq m.
<br/><br/>
70000 sq cm = (70000 &div; 10000) sq m = 7 sq m.
<br/>
"
?>




















