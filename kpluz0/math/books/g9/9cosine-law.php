<?php
$grd=$grd;
$title="The Law of Cosines";
$img1="images/sine-law2.jpg";
$img2="images/cosine-law1.jpg";
$img3="images/cosine-law2.jpg";
$img4="images/cosine-law3.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="
The Law of Cosines relates the lengths of the sides of a triangle to the cosine of one of its angles.
<br/><br/>
Consider the triangle below whose interior angles are &angle;A, &angle;B, and &angle;C and whose corresponding opposite sides are a, b, and c, respectively.
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
Based on the triangle above, the Law of Cosines may be mathematically expressed as follows:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/>
$blue<u>Derivation</u>$black
<br/><br/>
To derive the Law of Cosines, let's refer to triangle ABC in the figure below whose altitude is h:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/><br/>
Consider ABD:
<br/><br/>
1. By the Pythagorean theorem, c<sup>2</sup> = z<sup>2</sup> + h<sup>2</sup>
<br/><br/>
2. By the definition of the cosine function, cos A = z/c or z = c cos A
<br/><br/>
Now consider CBD:
<br/><br/>
1. By the Pythagorean Theorem,<br/>a<sup>2</sup> = (b - z)<sup>2</sup> + h<sup>2</sup>
<br/><br/>
2. a<sup>2</sup> = b<sup>2</sup> -2bz +z<sup>2</sup> +h<sup>2</sup>
<br/><br/>
3. a<sup>2</sup> = b<sup>2</sup> - 2bz + c<sup>2</sup>
<br/><br/>
4. a<sup>2</sup> = b<sup>2</sup> - 2b (c cos A) + c<sup>2</sup>
<br/><br/>
5. a<sup>2</sup> = b<sup>2</sup> + c<sup>2</sup> - 2bc cos A
<br/><br/>
The formulas for sides b and c may also be derived in a similar manner.
<br/><br/>
The Law of Cosines is very useful in solving for the third side of a triangle if its two other sides and their enclosed angle (SAS) are given.
<br/><br/><br/>
$red<u>Example Exercise</u>$black
<br/><br/>
Consider the triangle below.
If a = 6.01 units, b = 11.4 units, and c = 8.5 units, how many degrees is &angle;A? 
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img4'>
</td></tr></table>
<br/><br/>
$blue Solution:$black
<br/><br/>
a<sup>2</sup> = b<sup>2</sup> + c<sup>2</sup> - 2bc cos A
<br/><br/>
cos A = (a<sup>2</sup> - b<sup>2</sup> - c<sup>2</sup>)/-2bc 
<br/><br/>
cos A =[(6.01)<sup>2</sup>-(11.4)<sup>2</sup>-(8.5)<sup>2</sup>]/[(-2)(11.4)(8.5)]
<br/><br/>
cos A = -166.0899/-193.8 = 0.857
<br/><br/>
&angle;A = cos<sup>-1</sup>(0.857) = $vio 31&deg;$black


"
?>
