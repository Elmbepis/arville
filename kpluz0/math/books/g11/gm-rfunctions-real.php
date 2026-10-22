<?php
$grd=$grd;
$title="Using Rational<br/>Functions to Represent<br/>Real-life Situations";
$img1="images/aseries1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="

Rational functions are used in numerical analysis for interpolation and approximation of functions, for example the Padé approximations introduced by Henri Padé. Approximations in terms of rational functions are well suited for computer algebra systems and other numerical software. Like polynomials, they can be evaluated straightforwardly, and at the same time they express more diverse behavior than polynomials.

Rational functions are used to approximate or model more complex equations in science and engineering including fields and forces in physics, spectroscopy in analytical chemistry, enzyme kinetics in biochemistry, electronic circuitry, aerodynamics, medicine concentrations in vivo, wave functions for atoms and molecules, optics and photography to improve image resolution, and acoustics and sound[citation needed].

In signal processing, the Laplace transform (for continuous systems) or the z-transform (for discrete-time systems) of the impulse response of commonly-used linear time-invariant systems (filters) with infinite impulse response are rational functions over complex numbers.<br/><br/><br/>
@blue
Examples of<br/>Rational Functions<br/>Used in Real Life
@nblue
<br/><br/>
Below are some examples of how rational functions are used to model real-life situations.
<br/><br/>
$vio<u>
1. Average cost problems
$black</u>
<br/><br/> 
Many application problems require finding an average value, which can result in functions with a denominator containing a variable, or rational functions.
<br/><br/>
For example, suppose we know that the cost of making a product is dependent on the number of items produced, x, and is given by the function C(x)=15,000+500x. 
<br/><br/>
Note, the cost function consists of a fixed cost ($15,000) and a variable cost (500x). 
<br/><br/>
The fixed cost doesn't change when more items are produced, whereas the variable cost increases as more cars are produced.  
<br/><br/>
If we want to know the average cost for producing x items, we would divide the cost function by the number of items, x. 
<br/><br/>
The average cost function, which yields the average cost per item for x items produced, is
<br/><br/>$vio
C(x)=(15,000+500x)/x$black, 
<br/><br/>
which is a rational function.
<br/><br/>
$vio<u>
2. Deflection of a Beam
$black</u>
<br/><br/> 
Consider the function that describes the deflection of a beam under load and given by:
<br/><br/>$vio
f(x) = (ax<sup>3</sup>+bx<sup>2</sup>+cx+d)/(ex<sup>3</sup>+fx<sup>2</sup>+gx+h)
<br/><br/>$black
where a, b, c, d, e, f, g, and h are constants that depend on the beam's geometry and material properties.
<br/><br/>
This rational function describes the relationship between the deflection of the beam, f(x) and the load applied to it, x. 
The numerator of the function represents the deflection caused by the load, while the denominator represents the stiffness of the beam.
<br/><br/>
$vio<u>
3. Downhill Speed of a Vehicle
$black</u>
<br/><br/> 
Suppose that the speed of a vehicle traveling down a hill is given by the function:

f(t) = 16t^2/(t^2 + 1)

where t represents time in seconds.

In this case, the function has a polynomial of degree 2 in the numerator and denominator. The numerator represents the vehicle's speed at time t, and the denominator represents a damping effect that causes the speed to approach a limiting value as time goes on.

To solve problems involving this function, one would typically need to evaluate the function for various values of t and interpret the results in the context of the problem.

<br/><br/>
$vio<u>
4. Value of Stock Over Time
$black</u>
<br/><br/> 
Suppose that the value of a stock is given by the function:

f(x) = 2x^2 + 5x - 3 / x^2 + x - 2

where x represents time in years.

In this case, both the numerator and denominator have polynomials of degree 2. The numerator represents the value of the stock at time x, and the denominator represents a factor that affects the stock's value over time.

To solve problems involving this function, one would typically need to evaluate the function for various values of x and interpret the results in the context of the problem.


<br/><br/>
$vio<u>
5. Power Output of a Wind Turbine
$black</u>
<br/><br/> 


Suppose the power output of a wind turbine is given by the function:

P(w) = 5w^3 - 2w^2 + 4w / w^2 + 3w - 4

where P represents the power output of the turbine in kilowatts and w represents the wind speed in meters per second.

In this case, both the numerator and denominator have polynomials of degree 3 and 2, respectively. The numerator represents the power output of the wind turbine at wind speed w, and the denominator represents the impact of wind resistance on the power output.

To solve problems involving this function, one would typically need to evaluate the function for various values of w and interpret the results in the context of the problem.

";
?>
