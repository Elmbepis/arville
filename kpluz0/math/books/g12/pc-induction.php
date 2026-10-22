<?php
$grd=$grd;
$title="The Principle of<br/>Mathematical Induction";
$img1="images/aseries1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$pink=$font."<font color='#CC0066'>";
$article="

The Principle of Mathematical Induction is a method for proving statements about the natural numbers. 
<br/><br/>
It is used to establish the truth of a given statement, called the induction hypothesis, for all natural numbers greater than or equal to a certain base case. 
The base case is usually the number 1 or 0, but it can be any natural number. 
<br/><br/>
The principle of mathematical induction is a powerful tool in number theory and is used to prove many important theorems in mathematics.
<br/><br/>
The basic idea behind the principle of mathematical induction is to prove that a statement is true for all natural numbers by showing that it is true for the base case and then using this fact to prove that it is true for the next number. 
<br/><br/><br/>
@blue
Steps of<br/>Mathematical Induction
@nblue
<br/><br/>
There are two steps to the principle of mathematical induction: the base case and the induction step.
<br/><br/>
$vio<u>
The Base Case
</u>$black
<br/><br/>
The base case step is the first step of the proof in mathematical induction, where the statement being proven is verified to be true for a particular value of the variable.
The purpose of the base case is to establish a foundation for the proof. 
<br/><br/>
The base case is usually the simplest case so a value of 0 or 1 is often used for the variable to verify the statement. 
<br/><br/>
If the statement is true for the base case, the proof may proceed to the inductive step.
<br/><br/>
$vio<u>
The Induction Step
</u>$black
<br/><br/>
In the induction step, the statement is assumed to be true for some arbitrary value of the variable (usually n). 
If the statement is verified to be true for n, then it must also be true for the next value (n+1), and so on.
<br/><br/>
The inductive step usually involves the two steps below.
<br/><br/>
$pink<i>
1. Induction Hypothesis
</i>$black
<br/><br/>
The induction hypothesis is the assumption that the statement is true for some arbitrary value of n. We use this assumption as a starting point for our proof.
<br/><br/>
$pink<i>
2. Induction Argument
</i>$black
<br/><br/>
The inductive argument is the part of the proof where we show that if the statement is true for n, then it must also be true for n+1. This is usually done by using algebraic manipulation and the induction hypothesis.
<br/><br/>
Once the base case and induction step are proven, the statement is considered to be true for all natural numbers greater than or equal to the base case.
<br/><br/>$red<u>
Example # 1
</u>$black<br/><br/>
Prove that the sum of the first n natural numbers is $vio n(n+1)/2$black.
<br/><br/>
$vio<u>
Base case:
</u>$black
<br/><br/>
When n = 1, then n(n+1)/2 = 1(1+1)/2 = 1. Since the sum of 1 and no other number is 1, then the property holds for the base case.
<br/><br/>
$vio<u>
Induction step:
</u>$black
<br/><br/>
Assume that the property holds for some arbitrary natural number k. That is, the sum of the first k natural numbers is k(k+1)/2.
<br/><br/>
We need to prove that the property also holds for k+1. That is, we need to show that the sum of the first k+1 natural numbers is (k+1)(k+2)/2.
<br/><br/>
To do this, we start with the basic equation for the sum of the first k natural numbers as follows:
<br/><br/>
$vio 1 + 2 + ... + k = k(k+1)/2 $black
<br/><br/>
We then add the next natural number, k+1, to both sides of the equation above to arrive at this equation:
<br/><br/>
$vio 1 + 2 + ... + k + (k+1) = k(k+1)/2 + (k+1)$black
<br/><br/>
Simplifying the right-hand side of the equation, we get:
<br/><br/>
k(k+1)/2 + (k+1) = (k<sup>2</sup> + k + 2k + 2)/2<br/>= (k<sup>2</sup> + 3k + 2)/2 = $vio (k+1)(k+2)/2$black
<br/><br/>
Therefore, the sum of the first k+1 natural numbers is (k+1)(k+2)/2. This matches the statement being proven and therefore completes the induction step.
<br/><br/>$red<u>
Example # 2
</u>$black<br/><br/>
Prove that the sum of the first n odd numbers is $vio n<sup>2</sup>$black.
<br/><br/>
$vio<u>
Base case:
</u>$black
<br/><br/>
When n=1, the sum of the first n odd numbers is 1, which is equal to 1<sup>2</sup>. Therefore, the property holds for the base case.
<br/><br/>
$vio<u>
Induction step:
</u>$black
<br/><br/>
Assume that the property holds for some arbitrary natural number k. That is, the sum of the first k odd numbers is k<sup>2</sup>.
<br/><br/>
We need to prove that the property also holds for k+1. That is, we need to show that the sum of the first k+1 odd numbers is (k+1)<sup>2</sup>.
<br/><br/>
To do this, we note that the (k+1)th odd number is 2k+1. Therefore, the sum of the first k+1 odd numbers is:
<br/><br/>
1 + 3 + ... + (2k-1) + (2k+1) = sum of first k odd numbers + (2k+1)
<br/><br/>
By the induction hypothesis, the sum of the first k odd numbers is k<sup>2</sup> which gives us this equation:
<br/><br/>
$vio 1 + 3 + ... + (2k-1) = k<sup>2</sup>$black
<br/><br/>
Substituting this expression back into the original equation, we get:
<br/><br/>
1 + 3 + ... + (2k-1) + (2k+1) = k<sup>2</sup> + (2k+1)
<br/><br/>
Simplifying the right-hand side of the equation, we get:
<br/><br/>
$vio k<sup>2</sup> + (2k+1) = k<sup>2</sup> + 2k + 1 = (k+1)<sup>2</sup>$black
<br/><br/>
Therefore, the sum of the first k+1 odd numbers is (k+1)<sup>2</sup>, which matches the statement being proven and therefore completes the induction step.
<br/><br/>$red<u>
Example # 3
</u>$black<br/><br/>
Prove that every natural number greater than 1 is either prime or can be expressed as a product of primes.
<br/><br/>
$vio<u>
Base case:
</u>$black
<br/><br/>
When n=2, 2 is a prime number. Therefore, the property holds for the base case.
<br/><br/>
$vio<u>
Induction step:
</u>$black
<br/><br/>
Assume that the property holds for some arbitrary natural number k. That is, every natural number between 2 and k (inclusive) is either prime or can be expressed as a product of primes.
<br/><br/>
We need to prove that the property also holds for k+1. That is, k+1 is either prime or can be expressed as a product of primes.
<br/><br/>
To do this, we consider two cases:
<br/><br/>
$pink<i>
Case 1: k+1 is a prime number.
</i>$black
<br/><br/>
In this case, the property holds.
<br/><br/>
$pink<i>
Case 2: k+1 is not a prime number.
</i>$black
<br/><br/>
In this case, k+1 can be expressed as a product of two natural numbers a and b such that a > 1, b > 1, and a &times; b = k+1. 
<br/><br/>
Since a and b are less than or equal to k, by the induction hypothesis, a and b are either prime or can be expressed as a product of primes. 
<br/><br/>
Therefore, k+1 can also be expressed as a product of primes.

";
?>
