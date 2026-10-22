<?php
$grd=$grd;
$title="Direct and<br/>Indirect Proof";
$img1="images/aseries1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="
In logic, there are two main methods of proof: direct proof and indirect proof. 
Both methods are used to establish the truth of a statement, but they differ in the approach used to do so.
<br/><br/>
$blue<u>
I. Direct Proof
</u>$black
<br/><br/>
A direct proof is a method of proof that starts with a set of premises and uses logical reasoning to deduce the conclusion. 
<br/><br/>
The reasoning is presented in a step-by-step fashion, with each step building upon the previous one. 
The conclusion is derived directly from the premises using logical reasoning. 
<br/><br/>
For example, in the direct proof of 'If x is even, then x+2 is even', we can start with the premise 'x is even' and using the property of even numbers, we can deduce that 'x+2 is also even.'
<br/><br/>
$blue<u>
II. Examples of<br/>Direct Proof
</u>$black
<br/><br/>
$red<u>
Example # 1
</u>$black
<br/><br/>$vio
Premise 1:$black x and y are even numbers.
<br/><br/>$vio
Premise 2:$black The sum of two even numbers is even. 
<br/><br/>$vio
Step 1:$black x = 2a (where a is an integer). 
<br/><br/>$vio
Step 2:$black y = 2b (where b is an integer). 
<br/><br/>$vio
Step 3:$black x + y = (2a) + (2b) = 2(a+b). 
<br/><br/>$vio
Step 4:$black Since 2(a+b) is an even number, x + y is even. 
<br/><br/>$vio
Conclusion:$black The sum of two even numbers is always even.
<br/><br/>
$red<u>
Example # 2
</u>$black
<br/><br/>$vio
Premise 1:$black n is a positive integer. 
<br/><br/>$vio
Premise 2:$black The sum of the first n positive integers is (n*(n+1))/2. 
<br/><br/>$vio
Step 1:$black The sum of the first n positive integers is 1 + 2 + 3 + ... + n. 
<br/><br/>$vio
Step 2:$black We can represent this sum as (1+n) + (2+n-1) + (3+n-2) + ... + (n/2 + n/2). 
<br/><br/>$vio
Step 3:$black Grouping these pairs of numbers gives (n+1) + (n+1) + ... + (n+1). 
<br/><br/>$vio
Step 4:$black Since there are n/2 pairs, the sum of the first n positive integers is n/2*(n+1) = (n*(n+1))/2. 
<br/><br/>$vio
Conclusion:$black The sum of the first n positive integers is (n*(n+1))/2.
<br/><br/>
$red<u>
Example # 3
</u>$black
<br/><br/>$vio
Premise 1:$black m and n are complementary angles. 
<br/><br/>$vio
Premise 2:$black The sum of complementary angles is 90 degrees. 
<br/><br/>$vio
Step 1:$black Let m = 90 - n. 
<br/><br/>$vio
Step 2:$black m + n = (90 - n) + n = 90. 
<br/><br/>$vio
Step 3:$black m and n are complementary angles. 
<br/><br/>$vio
Conclusion:$black The sum of complementary angles is always 90 degrees.
<br/><br/>
Note that these examples are written in a way that show the logical reasoning used to reach the conclusion, but in real life, the proof may be more complex and may require more steps.
<br/><br/>
$blue<u>
III. Indirect Proof
</u>$black
<br/><br/>
An indirect proof, also known as proof by contradiction, is a method of proof that starts by assuming the opposite of the statement to be proven and then shows that this assumption leads to a contradiction. 
<br/><br/>
Once a contradiction is reached, the assumption is abandoned and the original statement is concluded to be true. 
<br/><br/>
For example, in the indirect proof of 'there are no positive integers x and y such that x<sup>2</sup> = 2y<sup>2</sup>', we can assume that there exists a positive integer x and y such that x<sup>2</sup> = 2y<sup>2</sup>.
<br/><br/>
A contradiction is then reached by showing that x and y have to be even numbers which leads to x<sup>2</sup> being an even number and 2y<sup>2</sup> also being an even number, and since x<sup>2</sup> can't be equal to 2y<sup>2</sup>, the assumption is false and the statement is true.
<br/><br/>
It's important to note that both methods of proof can be used to prove a statement, but depending on the statement and the context, one method may be more suitable than the other. 
<br/><br/>
Direct proof is generally preferred when the statement is simple and can be proven directly by logical reasoning, while indirect proof is preferred when the statement is complex and it's hard to prove directly.
<br/><br/>
$blue<u>
IV. Examples of<br/>Indirect Proof
</u>$black
<br/><br/>
$red<u>
Example # 1
</u>$black
<br/><br/>$vio
Premise:$black There are no positive integers x and y such that x<sup>2</sup> = 2y<sup>2</sup>.
<br/><br/>$vio
Assumption:$black There exist positive integers x and y such that x<sup>2</sup> = 2y<sup>2</sup>. 
<br/><br/>$vio
Step 1:$black Since x<sup>2</sup> is even, x must be even. 
<br/><br/>$vio
Step 2:$black Since 2y<sup>2</sup> is even, y must be even. 
<br/><br/>$vio
Step 3:$black From x<sup>2</sup> = 2y<sup>2</sup>, we can deduce that x<sup>2</sup>/2 = y<sup>2</sup>. 
<br/><br/>$vio
Step 4:$black From x<sup>2</sup>/2 = y<sup>2</sup> and y being even, we can deduce that x<sup>2</sup>/2 must also be even.
<br/><br/>$vio
Step 5:$black But we know that x<sup>2</sup> is even, and since even/2 is always even, x<sup>2</sup>/2 is even. 
<br/><br/>$vio
Step 6:$black From x<sup>2</sup>/2 and 2y<sup>2</sup> both being even, we have reached a contradiction, because we can't have x<sup>2</sup>/2 and 2y<sup>2</sup> both being even. 
<br/><br/>$vio
Step 7:$black Therefore, our assumption that there exist positive integers x and y such that x<sup>2</sup> = 2y<sup>2</sup> is false. 
<br/><br/>$vio
Conclusion:$black there are no positive integers x and y such that x<sup>2</sup> = 2y<sup>2</sup>.
<br/><br/>
$red<u>
Example # 2
</u>$black
<br/><br/>$vio
Premise:$black The square root of 2 is not a rational number. 
<br/><br/>$vio
Assumption:$black The square root of 2 is a rational number. 
<br/><br/>$vio
Step 1:$black Let the square root of 2 be represented as a/b, where a and b are integers and b is not equal to zero. 
<br/><br/>$vio
Step 2:$black Squaring both sides of the equation, we get (a/b)<sup>2</sup> = 2. 
<br/><br/>$vio
Step 3:$black Simplifying the equation, we get a<sup>2</sup> = 2b<sup>2</sup>. 
<br/><br/>$vio
Step 4:$black Now we know that a<sup>2</sup> is even, which means that a is even. 
<br/><br/>$vio
Step 5:$black Since a is even, we can represent it as 2c, where c is an integer. 
<br/><br/>$vio
Step 6:$black Substituting this into the equation, we get (2c)<sup>2</sup> = 2b<sup>2</sup>. 
<br/><br/>$vio
Step 7:$black Simplifying, we get 4c<sup>2</sup> = 2b<sup>2</sup>. 
<br/><br/>$vio
Step 8:$black Dividing both sides of the equation by 2, we get 2c<sup>2</sup> = b<sup>2</sup>. 
<br/><br/>$vio
Step 9:$black Since b<sup>2</sup> is even, b must also be even. 
<br/><br/>$vio
Step 10:$black But we know that a and b are integers, and the ratio of an even number to an even number is always a rational number. 
<br/><br/>$vio
Step 11:$black Therefore, our assumption that the square root of 2 is a rational number leads to a contradiction. 
<br/><br/>$vio
Step 12:$black Therefore, the assumption is false and the square root of 2 is not a rational number. 
<br/><br/>$vio
Conclusion:$black The square root of 2 is not a rational number.
<br/><br/>
$red<u>
Example # 3
</u>$black
<br/><br/>$vio
Premise:$black The equation x<sup>2</sup> + y<sup>2</sup> = 1 has no solutions for x and y that are both rational numbers. 
<br/><br/>$vio
Assumption:$black The equation x<sup>2</sup> + y<sup>2</sup> = 1 has solutions for x and y that are both rational numbers. 
<br/><br/>$vio
Step 1:$black Let x = a/b, where a and b are integers and b is not equal to zero. 
<br/><br/>$vio
Step 2:$black Let y = c/d, where c and d are integers and d is not equal to zero. 
<br/><br/>$vio
Step 3:$black Substituting x and y into the equation, we get (a/b)<sup>2</sup> + (c/d)<sup>2</sup> = 1. 
<br/><br/>$vio
Step 4:$black Simplifying the equation, we get (a<sup>2</sup>)/(b<sup>2</sup>) + (c<sup>2</sup>)/(d<sup>2</sup>) = 1. 
<br/><br/>$vio
Step 5:$black Since a, b, c and d are integers, (a<sup>2</sup>)/(b<sup>2</sup>) and (c<sup>2</sup>)/(d<sup>2</sup>) are both rational numbers. 
<br/><br/>$vio
Step 6:$black But the sum of two rational numbers is always a rational number. 
<br/><br/>$vio
Step 7:$black However, we know that the left side of the equation is not equal to 1. 
<br/><br/>$vio
Step 8:$black Therefore, our assumption that the equation x<sup>2</sup> + y<sup>2</sup> = 1 has solutions for x and y that are both rational numbers leads to a contradiction. 
<br/><br/>$vio
Step 9:$black Therefore, the assumption is false and the equation x<sup>2</sup> + y<sup>2</sup> = 1 has no solutions for x and y that are both rational numbers. 
<br/><br/>$vio
Conclusion:$black The equation x<sup>2</sup> + y<sup>2</sup> = 1 has no solutions for x and y that are both rational numbers.
<br/><br/>
Note that these examples are written in a way that show the logical reasoning used to reach the conclusion, but in real life, the proof may be more complex and may require more steps.
"
?>
