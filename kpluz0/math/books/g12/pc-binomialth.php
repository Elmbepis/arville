<?php
$grd=$grd;
$title="The Binomial Theorem";
$img1="images/aseries1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="

The binomial theorem is a fundamental result in algebra that describes the expansion of a power of a binomial, a mathematical expression involving two terms that are added or subtracted. 
<br/><br/>
The theorem states that for any nonnegative integer n and any real numbers a and b, the expression (a + b)<sup>n</sup> can be written as a sum of n + 1 terms, each of which is a product of a power of a and a power of b. 
<br/><br/>
The coefficients of each term are known as binomial coefficients, and are given by the formula 
<br/><br/>
$vio C(n, k) = n! / (k! (n-k)!) $black
<br/><br/>
where n! is the factorial of n, and k! is the factorial of k.
<br/><br/>
In the last lesson, we learned that we can get these binomial coefficients from Pascal's triangle.
<br/><br/>
The binomial theorem can be used to expand a binomial raised to any power, from a squared binomial to a binomial raised to the nth power. 
<br/><br/>
The general form of the theorem states that:
<br/><br/>
$vio (a + b)<sup>n</sup> = C(n,0)a<sup>n</sup> + C(n,1)a<sup>(n-1)</sup>b<sup>1</sup> + C(n,2)a<sup>(n-2)</sup>b<sup>2</sup> + ... + C(n,n-1)a<sup>1</sup>b<sup>(n-1)</sup> + C(n,n)b<sup>n</sup>$black
<br/><br/>
where C(n, k) is the binomial coefficient and a, b are any real numbers.
<br/><br/>$red<u>
Example # 1
</u>$black<br/><br/>
Use Pascal's triangle and the binomial theorem to expand this binomial expression: (a+b)<sup>2</sup>
<br/><br/>
The expression is raised to the power of 2, so we can get the coefficients for the expanded form from the second row of Pascal's triangle.
<br/><br/>
The coefficients are: $vio 1, 2, 1$black.
<br/><br/>
Thus, we can quickly expand the expression as follows:
<br/><br/>
$vio (a+b)<sup>2</sup> = a<sup>2</sup> + 2ab + b<sup>2</sup>
<br/><br/>$red<u>
Example # 2
</u>$black<br/><br/>
Use Pascal's triangle and the binomial theorem to expand this binomial expression: (a+b)<sup>3</sup>
<br/><br/>
The expression is raised to the power of 3, so we can get the coefficients for the expanded form from the third row of Pascal's triangle.
<br/><br/>
The coefficients are: $vio 1, 3, 3, 1$black.
<br/><br/>
Thus, we can quickly expand the expression as follows:
<br/><br/>
$vio (a + b)<sup>3</sup> = a<sup>3</sup> + 3a<sup>2</sup>b + 3ab<sup>2</sup> + b<sup>3</sup>$black
<br/><br/>$red<u>
Example # 3
</u>$black<br/><br/>
Use Pascal's triangle and the binomial theorem to expand this binomial expression: (a+b)<sup>4</sup>
<br/><br/>
The expression is raised to the power of 4, so we can get the coefficients for the expanded form from the fourth row of Pascal's triangle.
<br/><br/>
The coefficients are: $vio 1, 4, 6, 4, 1$black.
<br/><br/>
Thus, we can quickly expand the expression as follows:
<br/><br/>
$vio (a + b)<sup>4</sup> = a<sup>4</sup> + 4a<sup>3</sup>b + 6a<sup>2</sup>b<sup>2</sup> + 4ab<sup>3</sup> + b<sup>4</sup>$black
<br/><br/>
The binomial theorem can be used to simplify complex expressions, and it also has many applications in mathematics, science and engineering. 
<br/><br/>
For example, in Calculus, it can be used to find the derivatives and integrals of polynomials and power series. 
<br/><br/>
In Physics, it can be used in the study of wave propagation and quantum mechanics. 
<br/><br/>
In statistics, it can be used to calculate binomial distributions, which describe the probability of a specific number of successes in a fixed number of trials.
"
?>
