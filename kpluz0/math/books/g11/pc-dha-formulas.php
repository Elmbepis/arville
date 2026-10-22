<?php
$grd=$grd;
$title="Double- and<br/>Half-angle Formulas";
$img1="images/aseries1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:24pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:18pt;color:#CC0066'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#BB0000'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:36pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:30pt;color:#CC0066'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#BB0000'>"; 
	}

$article="

Double and half angle trigonometric identities are a set of trigonometric equations that relate the values of trigonometric functions for an angle to the values of trigonometric functions for two times or half the angle. 
<br/><br/>
These identities are useful in simplifying trigonometric expressions and solving trigonometric equations. 
<br/><br/><br/>
@blue
Double Angle<br/>Identities
@nblue
<br/><br/>
The double angle formulas are a set of identities that express the sine, cosine, and tangent of twice an angle in terms of the sine, cosine, and tangent of the original angle. 
<br/><br/>$vio<u>
Sine Double<br/>Angle Identity
</u>$black<br/><br/>
To find the sine of twice a given angle &#952;, use this formula:
<br/><br/>
<table align='center' bgcolor='#EBF4FD' bordercolor='#A8D3FE'><tr><td style='padding-right:50px; padding-left:50px; padding-top:50px; padding-bottom:50px' width='650' height='50' align='center'>
$tfont1
Sin(2&theta;) = 2sin&theta;cos&theta;
</td></tr></table>
<br/>
$red<u>Examples:$black</u>
<br/><br/>
1.  sine of twice 30&deg; = sin (60&deg;)<br/>= 2 sin 30 cos 30 
= 2(0.5)(0.866) = $blue 0.866$black
<br/><br/>
2. sine of twice 18&deg; = sin (36&deg;)<br/>= 2 sin 18 cos 18 
= 2(0.309)(0.951) = $blue 0.5877$black
<br/><br/>
3. sine of twice 37&deg; = sin (74&deg;)<br/>= 2 sin 37 cos 37 
= 2(0.6018)(0.7986) = $blue 0.9612$black
<br/><br/>$vio<u>
Cosine Double<br/>Angle Identity
</u>$black<br/><br/>
To find the cosine of twice a given angle &#952;, use any of these formulas:
<br/><br/>
<table align='center' bgcolor='#EBF4FD' bordercolor='#A8D3FE'><tr><td style='padding-right:50px; padding-left:50px; padding-top:50px; padding-bottom:50px' width='650' height='50' align='center'>
$tfont1
Cos(2&theta;) = cos<sup>2</sup>&theta; - sin<sup>2</sup>&theta;<br/>= 1 - 2sin<sup>2</sup>&theta;<br/>= 2cos<sup>2</sup>&theta; - 1
</td></tr></table>
<br/>
$red<u>Examples:$black</u>
<br/><br/>
1.  cosine of twice 45&deg; = cos (90&deg;)<br/>= 2cos<sup>2</sup>45 - 1
= 2(0.7071)<sup>2</sup> - 1 = 1 - 1 = $blue 0$black
<br/><br/>
2.  cosine of twice 17&deg; = cos (34&deg;)<br/>= 2cos<sup>2</sup>17 - 1
= 2(0.9563)<sup>2</sup> - 1 = 1.829 - 1 = $blue 0.829$black
<br/><br/>
3.  cosine of twice 60&deg; = cos (120&deg;)<br/>= 1 - 2sin<sup>2</sup>60
= 1 - 2(0.866)<sup>2</sup> = 1 - 1.5 = $blue -0.5$black
<br/><br/>
4.  cosine of twice 38&deg; = cos (76&deg;)<br/>= 1 - 2sin<sup>2</sup>38
= 1 - 2(0.6157)<sup>2</sup> = 1 - 0.758<sup>2</sup> = $blue 0.2418$black
<br/><br/>$vio<u>
Tangent Double<br/>Angle Identity
</u>$black<br/><br/>
To find the tangent of twice a given angle &#952;, use this formula:
<br/><br/>
<table align='center' bgcolor='#EBF4FD' bordercolor='#A8D3FE'><tr><td style='padding-right:50px; padding-left:50px; padding-top:50px; padding-bottom:50px' width='650' height='50' align='center'>
$tfont1
Tan(2&theta;) = (2tan&theta;)/(1 - tan<sup>2</sup>&theta;)
</td></tr></table>
<br/>
$red<u>Examples:$black</u>
<br/><br/>
1.  tangent of twice 30&deg; = tan (60&deg;)<br/>
= 2 tan 30 / (1 - tan<sup>2</sup>30) = 1.1547 / 0.6667 = $blue 1.732$black
<br/><br/>
2.  tangent of twice 60&deg; = tan (120&deg;)<br/>
= 2 tan 60 / (1 - tan<sup>2</sup>60) = 3.4641 / -2 = $blue -1.732$black
<br/><br/>
3.  tangent of twice 15&deg; = tan (30&deg;) <br/>
= 2 tan 15 / (1 - tan<sup>2</sup>15) = 0.5359 / 0.9282 = $blue 0.5774$black
<br/><br/><br/>
@blue
Half Angle<br/>Identities
@nblue
<br/><br/>
The half angle formulas are a set of identities that express the sine, cosine, and tangent of half an angle in terms of the sine, cosine, and tangent of the original angle. 
<br/><br/>$vio<u>
Sine Half<br/>Angle Identity
</u>$black<br/><br/>
To find the sine of half a given angle &#952;, use this formula:
<br/><br/>
<table align='center' bgcolor='#EBF4FD' bordercolor='#A8D3FE'><tr><td style='padding-right:50px; padding-left:50px; padding-top:50px; padding-bottom:50px' width='650' height='50' align='center'>
$tfont1
Sin(&theta;/2) = &plusmn;&#8730;[(1 - cos&theta;)/2]
</td></tr></table>
<br/>
It is important to note that the sign of the square root in the half angle formula for sine depends on the quadrant in which the angle lies. 
<br/><br/>
$red<u>Examples:$black</u>
<br/><br/>
1.  sine of half of 60&deg; = sin (30&deg;) <br/>
= +/- sqrt[(1 - cos 60)/2]<br/>
= +/- sqrt(0.25) = -0.5 or +0.5
<br/><br/>
Since 30&deg; is in the first quadrant, choose $blue +0.5$black.
<br/><br/>
2.  sine of half of 48&deg; = sin (24&deg;) <br/>
= +/- sqrt[(1 - cos 48)/2]<br/>
= +/- sqrt(0.1654) = -0.4067 or +0.4067
<br/><br/>
Since 24&deg; is in the first quadrant, choose $blue +0.4067$black.
<br/><br/>$vio<u>
Cosine Half<br/>Angle Identity
</u>$black<br/><br/>
To find the cosine of half a given angle &#952;, use this formula:
<br/><br/>
<table align='center' bgcolor='#EBF4FD' bordercolor='#A8D3FE'><tr><td style='padding-right:50px; padding-left:50px; padding-top:50px; padding-bottom:50px' width='650' height='50' align='center'>
$tfont1
Cos(&theta;/2) = &plusmn;&#8730;[(1 + cos&theta;)/2]
</td></tr></table>
<br/>
It is important to note that the sign of the square root in the half angle formula for cosine depends on the quadrant in which the angle lies. 
<br/><br/>
$red<u>Examples:$black</u>
<br/><br/>
1.  cosine of half of 60&deg; = cos (30&deg;)<br/>
= +/- sqrt[(1 + cos 60)/2]<br/>
= +/- sqrt(0.75) = -0.866 or +0.866
<br/><br/>
Since 30&deg; is in the first quadrant, choose $blue +0.866$black.
<br/><br/>
2. cosine of half of 80&deg; = cos (40&deg;) <br/>
= +/- sqrt[(1 + cos 80)/2]<br/>
= +/- sqrt(0.5868) = -0.766 or +0.766
<br/><br/>
Since 40&deg; is in the first quadrant, choose $blue +0.766$black.
<br/><br/>$vio<u>
Tangent Half<br/>Angle Identity
</u>$black<br/><br/>
To find the tangent of half a given angle &#952;, use any of these formulas:
<br/><br/>
<table align='center' bgcolor='#EBF4FD' bordercolor='#A8D3FE'><tr><td style='padding-right:50px; padding-left:50px; padding-top:50px; padding-bottom:50px' width='650' height='50' align='center'>
$tfont1
Tan(&theta;/2) = sin&theta;/(1 + cos&theta;)<br/>= (1 - cos&theta;)/sin&theta;
</td></tr></table>
<br/>
$red<u>Examples:$black</u>
<br/><br/>
1.  tangent of half of 90&deg; = tan (45&deg;)<br/>
= sin 90 / (1 + cos 90) = 1 / (1 + 0) = $blue 1$black
<br/><br/>
2.  tangent of half of 60&deg; = tan (30&deg;)<br/>
= sin 60 / (1 + cos 60) = 0.866 / (1 + 0.5) = $blue 0.5773$black
<br/><br/>
3.  tangent of half of 78&deg; = tan (39&deg;)<br/>
= sin 78 / (1 + cos 78) = 0.9781 / (1 + 0.2079) = $blue 0.80975$black

";
?>
