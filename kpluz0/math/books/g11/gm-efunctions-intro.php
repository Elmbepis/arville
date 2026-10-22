<?php
$grd=$grd;
$title="Introduction to<br/>Exponential Functions";
$img1="images/aseries1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$pink=$font."<font color='#CC0066'>";
$article="
Exponential functions are mathematical functions that involve a variable in the exponent. They take the form $blue f(x) = a<sup>x</sup>$black, where a is a constant and x is the variable. 
The constant a is called the base of the function and it can be any positive number, except 1. 
<br/><br/>
Exponential functions have many important applications in mathematics, science, and engineering, and they are used to model a wide range of phenomena such as population growth, radioactive decay, and many more.
<br/><br/>
One of the most important properties of exponential functions is that they grow at an increasing rate. 
This means that as the value of x increases, the value of the function increases at an increasing rate. This property is represented by the slope of the exponential function, which is always positive and increasing.
<br/><br/>$vio<u>
Graphing an<br/>Exponential Function
<br/><br/></u>$black
Exponential functions can be graphed on a coordinate plane by plotting points for various values of x and y. The graph of an exponential function will always be a curve that starts at the y-intercept and increases at an increasing rate as it moves to the right.
<br/><br/>
An important property of exponential functions is that they have an asymptote at y = 0. 
This means that as the value of x becomes very large, the value of the function approaches 0 but never reaches it. This property is represented by the y-intercept of the exponential function, which is always 0.
<br/><br/>
Exponential functions can also be transformed by shifting, stretching or compressing the graph horizontally or vertically. 
<br/><br/>$pink<i>
Shifting
<br/><br/></i>$black
For example, if we want to shift the graph of f(x) = a<sup>x</sup> horizontally, we can use the function f(x-h) = a<sup>(x-h)</sup> where h is the horizontal shift. 
<br/><br/>
Thus, the graph of the function f(x) = a<sup>(x-2)</sup> would be on the right side of the graph of the function f(x) = a<sup>x</sup> while the graph of the function f(x) = a<sup>(x+2)</sup> would be on the left side.
<br/><br/>
To shift the graph vertically, we can add a constant to the function in this manner: f(x) = a<sup>x</sup> + c where c is the vertical shift.
<br/><br/>$pink<i>
Stretching/Compressing
<br/><br/></i>$black
To stretch or compress the graph vertically, we can use the function f(x) = a<sup>kx</sup> where k is the vertical stretch or compression factor.
<br/><br/>$vio<u>
The Logarithm Function
<br/><br/></u>$black
In order to solve exponential equation, we can use logarithm function. The logarithm function is the inverse of the exponential function. 
If we have an equation of the form a<sup>x</sup> = y, we can use the logarithm with a base of a to solve for x as follows:<br/>$blue x = log<sub>a</sub>(y)$black.
<br/><br/>$vio<u>
The Natural Logarithm Function
<br/><br/></u>$black
The natural logarithm function, denoted by ln(x), is defined as the inverse of the exponential function e<sup>x</sup>. In other words, if y = e<sup>x</sup>, then $blue x = ln(y)$black.
<br/><br/>
The number e (approximately 2.71828) is a mathematical constant that is always used as the base of the natural logarithm. 
<br/><br/><br/>
@blue
Examples of Exponential<br/>Functions in Real Life
@nblue
<br/><br/>
Below are examples of exponential functions representing real life situations. 
<br/><br/>$vio<i>
1. The growth of bacteria in<br/>a petri dish
<br/><br/></i>$black
Bacteria can grow exponentially, meaning that the number of bacteria doubles at a constant rate. 
The function representing this growth could be $blue f(t) = 2<sup>t</sup>$black, where t is the number of hours since the bacteria were first introduced to the petri dish.
<br/><br/>$vio<i>
2.	The decay of radioactive<br/>material
<br/><br/></i>$black
Radioactive materials decay at a constant rate, meaning that the amount of material left after a certain amount of time can be modeled with an exponential function. 
The function representing this decay could be $blue f(t) = a(1/2)<sup>t</sup>$black, where a is the initial amount of material and t is the number of half-lives that have passed.
<br/><br/>$vio<i>
3.	The spread of a disease
<br/><br/></i>$black
The number of people infected with a disease can increase exponentially, especially in the early stages of an outbreak. 
The function representing this spread could be $blue f(t) = P<sub>0</sub>e<sup>kt</sup>$black, where P<sub>0</sub> is the initial number of people infected, e is Euler's number and k is the rate of spread.
<br/><br/>$vio<i>
4.	The growth of a savings<br/>account with compound interest
<br/><br/></i>$black
Money in a savings account that earns compound interest grows at an exponential rate. 
The function representing this growth could be $blue f(t) = P<sub>0</sub>(1+r)<sup>t</sup>$black, where P<sub>0</sub> is the initial amount of money, r is the interest rate, and t is the number of years the money has been in the account.
<br/><br/>$vio<i>
5.	The charging of a battery
<br/><br/></i>$black
A battery that is being charged follows an exponential function $blue f(t)= P<sub>0</sub>(1-e<sup>(-kt)</sup>)$black where P<sub>0</sub> is the initial charge, k is the rate constant, and t is time.
<br/><br/>$vio<i>
6.	The temperature of a<br/>cooling cup of coffee 
<br/><br/></i>$black
The temperature of a cup of coffee decreases exponentially as it cools. 
The function representing this cooling could be $blue f(t) = T<sub>0</sub>e<sup>(-kt)</sup>$black, where T<sub>0</sub> is the initial temperature, e is Euler's number, k is the cooling rate, and t is the time in minutes since the coffee was poured.
<br/><br/>$vio<i>
7.	The growth of a population
<br/><br/></i>$black
The population of a city or country can grow exponentially, especially in the early stages of development. 
The function representing this growth could be $blue f(t) = P<sub>0</sub>e<sup>kt</sup>$black, where P<sub>0</sub> is the initial population, e is Euler's number, and k is the growth rate.
<br/><br/>$vio<i>
8.	The concentration of a<br/>substance in a liquid over time
<br/><br/></i>$black
The concentration of a substance in a liquid can decrease exponentially over time, as the substance diffuses or is consumed. 
The function representing this change could be $blue f(t) = C<sub>0</sub>e<sup>(-kt)</sup>$black, where C<sub>0</sub> is the initial concentration, e is Euler's number, and k is the rate constant.
<br/><br/>$vio<i>
9.	The price of a stock over time
<br/><br/></i>$black
The price of a stock can increase or decrease exponentially over time, depending on market conditions. 
The function representing this change could be $blue f(t) = P<sub>0</sub>e<sup>(rt)</sup>$black, where P<sub>0</sub> is the initial price, e is Euler's number, and r is the rate of change.
<br/><br/>$vio<i>
10.	The spread of information<br/>in social networks
<br/><br/></i>$black
The rate at which information spreads through a social network can be modeled using an exponential function. 
The function representing this spread could be $blue f(t) = P<sub>0</sub>(1+r)<sup>t</sup>$black, where P<sub>0</sub> is the initial number of people who know the information, r is the rate of spread, and t is the number of time periods that have passed.
"
?>
