<?php
$grd=$grd;
$title="Polar Versus<br/>Rectangular Coordinates";
$img1="images/aseries1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="

Polar coordinates and rectangular coordinates are two ways of representing points in a two-dimensional coordinate system. Both systems have their own advantages and disadvantages, and the choice of which system to use depends on the nature of the problem.
<br/><br/>
Rectangular coordinates, also known as Cartesian coordinates, represent a point in a plane using an ordered pair of values (x, y). The x-coordinate gives the horizontal position of the point, and the y-coordinate gives the vertical position of the point. 
<br/><br/>
The origin of the coordinate system is the point (0,0), and the positive x-axis and the positive y-axis are the reference lines.
<br/><br/>
Polar coordinates, on the other hand, represent a point using an ordered pair of values (r, &#952;), where r is the distance from the origin to the point and &#952; is the angle between the positive x-axis and the line connecting the origin to the point. 
<br/><br/>
The origin of the polar coordinate system is known as the pole, and the angle is measured in radians, counterclockwise from the positive x-axis. The x-coordinate of a point in polar coordinates is given by rcos(&#952;) and the y-coordinate is given by rsin(&#952;).
<br/><br/>$vio<u>
Advantages of<br/>Rectangular Coordinates
</u>$black<br/><br/>
One of the main advantages of the rectangular coordinate system is that it is easy to visualize and understand. The x-coordinate and the y-coordinate represent the horizontal and vertical positions of the point, respectively, 
and the point can be located on the graph by simply plotting the x and y values. 
<br/><br/>
In the rectangular coordinate system, it's also easy to work with lines and shapes that are not defined in terms of angles or directions.
<br/><br/>$vio<u>
Advantages of<br/>Polar Coordinates
</u>$black<br/><br/>
On the other hand, the polar coordinate system is particularly useful when working with problems involving rotational symmetry, such as those found in physics and engineering. 
In such problems, the angle &#952; often represents the direction or phase of a quantity, and the distance r represents the magnitude. 
<br/><br/>
Another advantage of the polar coordinate system is that it can be useful in solving problems involving trigonometry. 
The trigonometric functions, such as sine and cosine, can be used to express the coordinates of a point in polar form, making it easier to perform calculations involving angles and distances. 
<br/><br/>
The polar coordinate system also allows for a more natural representation of cyclic and periodic phenomena, such as those found in physics and engineering.
<br/><br/><br/>
@blue
Converting Polar to<br/>Rectangular Coordinates
@nblue
<br/><br/>$vio<u>
Steps for Converting Polar<br/>into Rectangular Coordinates
</u>$black<br/><br/>
Below are the steps to convert polar coordinates into rectangular coordinates.
<br/><br/>
1. Identify the values of the polar coordinates. Polar coordinates consist of a radius and an angle. Let r be the radius and &#952; be the angle.
<br/><br/>
2. Use trigonometry to find the x and y components of the rectangular coordinates. The x-component is given by r &times; cos(&#952;), and the y-component is given by r &times sin(&#952;).
<br/><br/>
3. Write the rectangular coordinates as an ordered pair (x, y). The ordered pair represents the point in the Cartesian plane.
<br/><br/>$vio<u>
Examples
</u>$black<br/><br/>
Below are examples of converting polar to rectangular coordinates.
<br/><br/>
$red 1. Polar coordinates: (5, 30&deg;)<br/>$black
x = 5cos(30&deg;) = 4.33<br/>
y = 5sin(30&deg;) = 2.5<br/>
Rectangular coordinates: $vio(4.33, 2.5)$black
<br/><br/>
$red 2. Polar coordinates: (3, 45&deg;)<br/>$black
x = 3cos(45&deg;) = 2.12<br/>
y = 3sin(45&deg;) = 2.12<br/>
Rectangular coordinates: $vio(2.12, 2.12)$black
<br/><br/>
$red 3. Polar coordinates: (8, &pi;/2 rad)<br/>$black
x = 8cos(&pi;/2 rad) = 0<br/>
y = 8sin(&pi;/2 rad) = 8<br/>
Rectangular coordinates: $vio(0, 8)$black
<br/><br/>
$red 4. Polar coordinates: (11, 3&pi;/4 rad)<br/>$black
x = 11cos(3&pi;/4 rad) = -7.78<br/>
y = 11sin(3&pi;/4 rad) = 7.78<br/>
Rectangular coordinates: $vio(-7.78, 7.78)$black
<br/><br/>
$red 5. Polar coordinates: (6, 75&deg;)<br/>$black
x = 6cos(75&deg;) = 1.55<br/>
y = 6sin(75&deg;) = 5.8<br/>
Rectangular coordinates: $vio(1.55, 5.8)$black
<br/><br/><br/>
@blue
Converting Rectangular<br/>to Polar Coordinates
@nblue
<br/><br/>$vio<u>
Steps for Converting Rectangular<br/>into Polar Coordinates
</u>$black<br/><br/>
Below are the steps to convert polar coordinates into rectangular coordinates.
<br/><br/>
1. Calculate the magnitude or the distance of the point from the origin, r, using the Pythagorean theorem:
<br/><br/>
$vio r = sqrt(x<sup>2</sup> + y<sup>2</sup>)$black
<br/><br/>
2. Calculate the angle &theta; using the arctangent function:
<br/><br/>
$vio &theta; = arctan(y/x)$black
<br/><br/>
3. Write the polar coordinates as an ordered pair (r, &theta;). 
<br/><br/>$vio<u>
Examples
</u>$black<br/><br/>
Below are examples of converting rectangular to polar coordinates.
<br/><br/>
$red 1. Rectangular coordinates: (3, 4)<br/>$black
r = sqrt(3<sup>2</sup> + 4<sup>2</sup>) = 5<br/>
&theta; = atan(4/3) = 53.13&deg;<br/>
Polar coordinates: $vio(5, 53.13&deg)$black
<br/><br/>
$red 2. Rectangular coordinates: (2, 5)<br/>$black
r = sqrt(2<sup>2</sup> + 5<sup>2</sup>) = 5.385<br/>
&theta; = atan(5/2) = 68.2&deg;<br/>
Polar coordinates: $vio(5.385, 68.2&deg)$black
<br/><br/>
$red 3. Rectangular coordinates: (6, 3)<br/>$black
r = sqrt(6<sup>2</sup> + 3<sup>2</sup>) = 6.7<br/>
&theta; = atan(3/6) = 26.57&deg;<br/>
Polar coordinates: $vio(6.7, 26.57&deg)$black
<br/><br/>
$red 4. Rectangular coordinates: (-11, 11)<br/>$black
r = sqrt(11<sup>2</sup> + 11<sup>2</sup>) = 15.56<br/>
&theta; = atan(-11/11) = -45&deg; or 135&deg;<br/>
It's is in quadrant II so choose 135&deg;.<br/>
Polar coordinates: $vio(15.56, 135&deg)$black
<br/><br/>
$red 5. Rectangular coordinates: (-7, -9)<br/>$black
r = sqrt(-7<sup>2</sup> + -9<sup>2</sup>) = 11.4<br/>
&theta; = atan(-9/-7) = 52.12&deg; or 232.1&deg;<br/>
It's in quadrant III so choose 232.1&deg;.<br/>
Polar coordinates: $vio(11.4, 232.1&deg)$black

";
?>
