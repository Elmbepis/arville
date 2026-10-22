<?php
$grd=$grd;
$title="Computing for Areas<br/>of Plane Regions";
$img1="images/riemann1.jpg";
$img2="images/riemann2.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$pink=$font."<font color='#CC0066'>";

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

Understanding how to compute the area of a plane region is a fundamental concept in calculus, with wide applications in mathematics, science, and engineering. When it comes to irregular or complex shapes, definite integration offers a powerful 
tool for precisely calculating these areas.
<br/><br/>
The process involves breaking down the region into smaller, manageable components and then summing their areas using definite integrals. This method can be applied to a variety of scenarios, from finding the area under a curve to determining the 
surface area of complex geometric figures.
<br/><br/><br/>
@blue
Steps Used in<br/>Computing for Areas<br/>of Plane Regions
@nblue
<br/><br/>
Below are the basic steps used in computing the area of a plane region using the definite integral.
<br/><br/>$vio<u> 
1. Partition the region.
</u>$black<br/><br/>
Divide the plane region into smaller, manageable subregions. Typically, you'll use horizontal or vertical lines to split the region into simpler shapes, such as rectangles, triangles, or curves. This partitioning is essential for approximating the area.
<br/><br/>$vio<u> 
2. Select a representative element.
</u>$black<br/><br/>
For each subregion, choose a representative point (often a coordinate) that characterizes the subregion. These points are used to determine the width and height of the individual elements. The choice of representative points depends on the specific 
shape of the subregions.
<br/><br/>$vio<u> 
3. Set up the integral.
</u>$black<br/><br/>
Calculate the area of each subregion in terms of its dimensions (length, width, or other relevant measurements). Express the area of each element as a function of a variable, typically x or y, and multiply these dimensions to obtain the differential area element, 
often denoted as dA.
<br/><br/>$vio<u> 
4. Sum the areas.
</u>$black<br/><br/>
To find the total area of the region, sum up the areas of all the subregions by setting up a definite integral. The integral limits should cover the entire region you're interested in calculating.
<br/><br/>
If you're working with a horizontal partition, the definite integral may be of the form:
<br/><br/>
A=&#8747;<sub>[a,b]</sub> dA
<br/><br/>
If you're dealing with a vertical partition, the integral may take the following form:
<br/><br/>
A=&#8747;<sub>[c,d]</sub> dA
<br/><br/>
The limits [a,b] or [c,d] represent the range of the region you're considering.
<br/><br/>$vio<u> 
5. Evaluate the integral.
</u>$black<br/><br/>
Integrate the differential area element (dA) over the specified interval. The result of the definite integral will provide the total area of the plane region.
<br/><br/><br/>
@blue
Example of<br/>Computing for the Area<br/>of a Plane Region
@nblue
<br/><br/>
Find the area of the region bounded by the x-axis, the y-axis, and the curve y=x<sup>2</sup> within the interval [0,2].
<br/><br/>
$red Solution:$black
<br/><br/>$vio<u> 
1. Partition the region.
</u>$black<br/><br/>
In this example, we'll use a horizontal partition. We divide the region into smaller subregions by drawing horizontal lines.
<br/><br/>$vio<u> 
2. Select a representative element.
</u>$black<br/><br/>
For each subregion, we choose a representative point (x<sub>i</sub>,y<sub>i</sub>) where x<sub>i</sub> is a point within the subregion, and y<sub>i</sub> = f(x<sub>i</sub>) = x<sub>i</sub><sup>2</sup>.
<br/><br/>$vio<u> 
3. Set up the integral.
</u>$black<br/><br/>
The area of the ith subregion is given by dA<sub>i</sub> =  x<sub>i</sub><sup>2</sup>&middot;&Delta;x, where &Delta;x is the width of the subregion.
<br/><br/>$vio<u> 
4. Sum the areas.
</u>$black<br/><br/>
To find the total area, we set up the definite integral as follows:
<br/><br/>
A = &#8747;<sub>[0,2]</sub>  x<sup>2</sup>dx
<br/><br/>$vio<u> 
5. Evaluate the integral.
</u>$black<br/><br/>
Now, we calculate the area by evaluating the definite integral as follows:
<br/><br/>
A=[1/3 x<sup>3</sup>]<sub>[0,2]</sub>  
<br/><br/>
= 1/3 (2<sup>3</sup> - 0<sup>3</sup>)
<br/><br/>
= $pink 8/3$black
<br/><br/>
Thus, the area of the region bounded by the x-axis, the y-axis, and the curve y=x<sup>2</sup> within the interval [0,2] is 8/3 sq. units.
 
"
?>
