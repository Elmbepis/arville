<?php
$grd=$grd;
$title="Representing a<br/>Rational Function<br/>Through Its Equation";
$img1="images/aseries1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="
In previous lessons, we learned how to represent rational functions using their tables of values and graphs.
In this lesson, we will discuss how to represent rational functions using their equations.
<br/><br/>
We've already learned that a rational function is a function of the form f(x) = p(x) / q(x), where p(x) and q(x) are polynomials in x, and q(x) is not the zero polynomial. 
<br/><br/>
The equations of rational functions involve variables in the numerator and denominator, and they can be written in a variety of forms. 
<br/><br/>
The domain of a rational function is all real numbers except those values of x for which q(x) = 0. These values are called the vertical asymptotes of the function.
<br/><br/> 
Let's now look at the different forms of equations that we can use to represent rational functions.
<br/><br/><br/>
@blue
Writing Rational Functions<br/>in Factored Form
@nblue
<br/><br/>
One way to represent a rational function is to write it in factored form. To do this, we can factor the numerator and denominator of the function into a product of linear factors. 
<br/><br/>
For example, consider the function
<br/><br/>
$vio f(x) = (x<sup>2</sup> + 3x + 2) / (x-1)$black. 
<br/><br/>
We can factor the numerator as (x+1)(x+2). Then, the function can be written as 
<br/><br/>
$vio f(x) = (x+1)(x+2) / (x-1)$black.
<br/><br/><br/>
@blue
Writing Rational Functions<br/>in Partial Fraction Form
@nblue
<br/><br/>
Another way to represent a rational function is to write it in partial fraction form. This involves expressing the function as a sum of simpler fractions whose denominators are linear factors. 
<br/><br/>
We can use algebraic techniques to decompose the rational function into partial fractions.
For example, consider the function
<br/><br/>
$vio f(x)=(4x + 12)/(x<sup>2</sup> + 4x)$black
<br/><br/>
Let's factor the denominator before doing the partial fraction decomposition. Hence:
<br/><br/>
(4x + 12)/(x<sup>2</sup> + 4x) = (4x + 12)/[x(x + 4)]<br/><br/>
Let us assume that: (4x + 12)/[(x)(x + 4)] = [A/x] + [B/(x + 4)] &#8594; (1)
<br/><br/>
The least common denominator (LCD) of the sum (on the right side) is x(x + 4). 
<br/><br/>
Multiplying both sides by x(x + 4), we get 4x + 12 = A(x + 4) + Bx &#8594; (2)
<br/><br/>
Now we have to solve it for A and B. For that, we set each linear factor to zero.
<br/><br/>
Substitute x + 4 = 0 , or x = -4 in (2):
<br/><br/>
4(-4) + 12 = A(0) + B(-4)<br/>-4 = -4B<br/>$vio B = 1$black.
<br/><br/>
Substitute x = 0 in (2):
<br/><br/>
4(0) + 12 = A(0 + 4) + B(0)<br/>12 = 4A<br/>$vio A = 3$black.
<br/><br/>
Substitute the values of A and B in (1), we get the partial fractions decomposition of the given expression:
<br/><br/>
(4x + 12)/[x(x + 4)] = [3/x] + [1/(x + 4)]
<br/><br/>
Thus,<br/>
f(x) = (4x + 12)/(x<sup>2</sup> + 4x)<br/>$vio = ([3/x] + [1/(x + 4)]$black.
<br/><br/><br/>
@blue
Writing Rational Functions<br/>in Long Division Form
@nblue
<br/><br/>
A third way to represent a rational function is to write it in long division form. This involves dividing the numerator by the denominator to obtain a quotient and a remainder. 
<br/><br/>
The quotient is a polynomial, and the remainder is a rational function whose numerator has a degree less than the degree of the denominator.
<br/><br/>
For example, consider the function 
<br/><br/>
$vio f(x) = (x<sup>2</sup> + 2x + 1) / (x-1)$black. 
<br/><br/>
We can use long division to write this function as: (x-1) &#x27CC; (x<sup>2</sup> + 2x + 1)
<br/><br/> 
To perform long division, we first divide f(x) by x-1 to obtain $blue x$black, which we then multiply by the denominator (x-1) to obtain x<sup>2</sup> - x. 
<br/><br/> 
We subtract this from the numerator (x<sup>2</sup> + 2x + 1) to obtain 3x + 1. 
<br/><br/> 
We then divide 3x-1 by x-1 again to get $blue 3$black, which we multiply by the denominator (x-1) to obtain 3x-3. 
<br/><br/> 
We subtract this from the last remainder (3x+1) to obtain 4, i.e., (3x+1)-(3x-3)=4. 
<br/><br/> 
At this point, the quotient is $blue (x+3), remainder 4$black.
This may be expressed as (x+3) + 4/(x-1). 
<br/><br/> 
Thus,<br/>
f(x) = (x<sup>2</sup> + 2x + 1) / (x-1)<br/>= $vio x + 3 + [4/(x-1)]$black
<br/><br/> 
The quotient x + 3 represents the non-rational part of the function, and the remainder 4/(x-1) represents the rational part of the function.
";
?>
