<?php
$grd=$grd;
$title="Solving Oblique Triangles";
$img1="images/sine-law2.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="
Solving an oblique triangle means being able to calculate the unknown measures of its angles and sides based on the known information about its other angles and sides.
<br/><br/>
You can always solve an oblique triangle using either the Law of Sines or the Law of Cosines if you know the measurements of:
<br/><br/>
1)  one side and two angles (ASA or AAS), or 
<br/><br/>
2) two sides and an angle opposite to any of these sides (SSA), or 
<br/><br/>
3) two sides and their included angle (SAS), or 
<br/><br/>
4) all its three sides (SSS).
<br/><br/>
$vio<u>Review of the Law of Sines</u>$black
<br/><br/>
For any triangle ABC,  wherein A, B, and C are the angles opposite to the sides a, b, and c:
<br/><br/>
a/sin A = b/sin B = c/sin C
<br/><br/>
$vio<u>Review of the Law of Cosines</u>$black
<br/><br/>
For any triangle ABC,  wherein A, B, and C are the angles opposite to the sides a, b, and c:  
<br/><br/>
a<sup>2</sup> = b<sup>2</sup> + c<sup>2</sup> - 2bc cos A
<br/><br/>
b<sup>2</sup> = a<sup>2</sup> + c<sup>2</sup> - 2ac cos B
<br/><br/>
c<sup>2</sup> = a<sup>2</sup> + b<sup>2</sup> - 2ab cos C
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
For all of the following examples of solving oblique triangles, refer to the figure above. 
<br/><br/>
$red<b>Case 1:</b><br/>$vio 1 side and 2 angles are given$black 
<br/><br/>
a = 64;  &angle;B =  85&deg;  &angle;C =  52&deg; 
<br/><br/>
$blue Solution:$black
<br/><br/>
&angle;A = 180&deg; - 85&deg; - 52&deg; = $blue 43&deg;$black
<br/><br/>
Apply the Law of Sines:
<br/><br/>
c = 64/sin(43) x sin(52) = 64/0.682 x 0.788 = $blue 73.9$black
<br/><br/>
b = 64/sin(43) x sin(85) = 64/0.682 x 0.9962 = $blue 93.48$black
<br/><br/>
$red<b>Case 2:</b><br/>$vio 2 sides and an angle<br/>opposite to one of them are given$black  
<br/><br/>
&angle;C =  52&deg;;  a = 64;  c = 73.9
<br/><br/>
$blue Solution:$black
<br/><br/>
Apply the Law of Sines:
<br/><br/>
73.9/sin(52) = 64/sin A
<br/><br/>
sin A = (64/73.9) x sin(52) = 0.682
<br/><br/>
&angle;A = sin<sup>-1</sup> (0.682) = $blue 43&deg;$black
<br/><br/>
&angle;B = 180&deg; - 52&deg; - 43&deg; = $blue 85&deg;$black
<br/><br/>
b = 73.9/sin(52) x sin(85) = $blue 93.42$black
<br/><br/>
$red<b>Case 3:</b><br/>$vio 2 sides and their<br/>included angle are given$black  
<br/><br/>
&angle;A =  43&deg;  b = 93.4;  c = 73.9; 
<br/><br/>
$blue Solution:$black
<br/><br/>
Apply the Law of Cosines:
<br/><br/>
a<sup>2</sup> = b<sup>2</sup> + c<sup>2</sup> - 2bc cos A
<br/><br/>
a<sup>2</sup> = (93.4)<sup>2</sup> + (73.9)<sup>2</sup> - 2(93.4)(73.9) cos(43)
<br/><br/>
a<sup>2</sup> = 8723.56 + 5461.21 - (13804.52)(0.73135) = 4088.834
<br/><br/>
a = sqrt(4088.834) = $blue 63.94$black
<br/><br/>
Apply the Law of Sines:
<br/><br/>
63.94/sin 43 = 93.4/sinB
<br/><br/>
sin B = (93.4/63.94) x sin(43) = 0.9962
<br/><br/>
&angle;B = sin<sup>-1</sup>(0.9962) = $blue 85&deg;$black
<br/><br/>
&angle;C = 180&deg; - 43&deg; - 85&deg; = $blue 52&deg;$black
<br/><br/>
$red<b>Case 4:</b><br/>$vio all 3 sides are given$black  
<br/><br/>
a =  64;  b = 93.4;  c = 73.9; 
<br/><br/>
$blue Solution:$black
<br/><br/>
Apply the Law of Cosines:
<br/><br/>
cos A = (b<sup>2</sup> + c<sup>2</sup> - a2)/2bc
<br/><br/>
cos A = ((93.4)<sup>2</sup> + (73.9)<sup>2</sup> - (64)2)/[(2)(93.4)(73.9)]
<br/><br/>
cos A = 10088.77 / 13804.52 = 0.7308
<br/><br/>
&angle;A = cos<sup>-1</sup>(0.7308) = $blue 43&deg;$black
<br/><br/>
Apply the Law of Sines:
<br/><br/>
sin B = (93.4/64) x sin(43) = 0.9953
<br/><br/>
&angle;B = sin<sup>-1</sup>(0.9953) = $blue 84.4&deg;$black
<br/><br/>
&angle;C = 180 - 43 - 84.4 = $blue 52.6&deg;$black
"
?>
