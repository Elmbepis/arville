<?php
$grd=$grd;
$title="Applying<br/>Mathematical Induction<br/>to Prove Identities";
$img1="images/aseries1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="

In the last lesson, we learned the principle of mathematical induction and looked at examples of how it is used to prove mathematical statements.
The mathematical statements used in the examples of the previous lesson are called mathematical identities, or simply identities.
<br/><br/>
Identities are mathematical statements that are true for all values of the variables they contain. Proving identities using mathematical induction is a way to establish their validity for all natural numbers.
<br/><br/>
Applying mathematical induction to prove identities is a technique used in mathematics to prove that two mathematical expressions are equivalent for all natural numbers greater than or equal to a certain base case. 
<br/><br/>
Let us now look at more examples of using mathematical induction to prove identities.
In the following examples, we will use the same steps discussed in our previous lesson.
<br/><br/>$red<u>
Example # 1
</u>$black<br/><br/>
Prove that the sum of the first n squares is:
<br/><br/>
$blue 1<sup>2</sup> + 2<sup>2</sup> + 3<sup>2</sup> + ... + n<sup>2</sup> = n(n+1)(2n+1)/6
<br/><br/>
$vio<u>
Base case:
</u>$black
<br/><br/>
To prove this identity using induction, we can start with the base case n=1:
<br/><br/>
1<sup>2</sup> = 1(1+1)(2&times;1+1)/6 = (1)(2)(3)/6 = 1, which makes the base case true
<br/><br/>
$vio<u>
Induction step:
</u>$black
<br/><br/>
Assume that the formula holds true for some positive integer k:
<br/><br/>
1<sup>2</sup> + 2<sup>2</sup> + 3<sup>2</sup> + ... + k<sup>2</sup> = k(k+1)(2k+1)/6
<br/><br/>
We need to show that the formula also holds true for k+1:
<br/><br/>
1<sup>2</sup> + 2<sup>2</sup> + 3<sup>2</sup> + ... + (k+1)<sup>2</sup> = (k+1)((k+1)+1)(2(k+1)+1)/6
<br/><br/>
We can start by adding (k+1)<sup>2</sup> to both sides of the assumption:
<br/><br/>
1<sup>2</sup> + 2<sup>2</sup> + 3<sup>2</sup> + ... + k<sup>2</sup> + (k+1)<sup>2</sup>
<br/>
= k(k+1)(2k+1)/6 + (k+1)<sup>2</sup>
<br/><br/>
Simplifying the right-hand side:
<br/><br/>
k(k+1)(2k+1)/6 + (k+1)<sup>2</sup><br/> 
= (k+1)[k(2k+1)/6 + (k+1)]<br/>
= ((k+1)/6)(k(2k+1) + 6(k+1))<br/>
= ((k+1)/6)(2k<sup>2</sup> + k + 6k +6)<br/>
= ((k+1)/6)(2k<sup>2</sup> + 7k +6)<br/>
= ((k+1)/6)((k+2)(2k+3))<br/>
= (k+1)(k+2)(2k+3)/6<br/>
= $vio (k+1)(k+2)(2(k+1)+1)/6$black
<br/><br/>
This is the same as the formula for n = k+1, so the formula holds true for all positive integers n by induction.
<br/><br/>$red<u>
Example # 2
</u>$black<br/><br/>
Prove that 
<br/><br/>
$blue 1 + 2 + 2<sup>2</sup> + ... + 2<sup>n</sup> = 2<sup>(n+1)</sup> - 1 $black
<br/><br/>
for all non-negative integers n.
<br/><br/>
Base Case: When n=0, we have 1 = 2<sup>(0+1)</sup> - 1 = 1, which is true. Therefore, the property holds for the base case.
<br/><br/>
$vio<u>
Induction step:
</u>$black
<br/><br/>
Induction Step: Assume that the property holds for some arbitrary natural number k. That is,
<br/><br/>
1 + 2 + 2<sup>2</sup> + ... + 2<sup>k</sup> = 2<sup>(k+1)</sup> - 1.
<br/><br/>
We need to prove that the property also holds for k+1. That is, we need to show that
<br/><br/>
1 + 2 + 2<sup>2</sup> + ... + 2<sup>(k+1)</sup> = 2<sup>(k+2)</sup> - 1.
<br/><br/>
To do this, we add 2<sup>(k+1)</sup> to both sides of the equation for k:
<br/><br/>
1 + 2 + 2<sup>2</sup> + ... + 2<sup>k</sup> + 2<sup>(k+1)</sup> = 2<sup>(k+1)</sup> + (2<sup>(k+1)</sup> - 1)
<br/><br/>
Simplifying the right-hand side of the equation, we get:
<br/><br/>
2<sup>(k+1)</sup> + (2<sup>(k+1)</sup> - 1) = 2(2<sup>(k+1)</sup>) - 1<br/>= 2<sup>(k+2)</sup> - 1
<br/><br/>
Therefore,
<br/><br/>
$vio 1 + 2 + 2<sup>2</sup> + ... + 2<sup>(k+1)</sup> = 2<sup>(k+2)</sup> - 1$black
<br/><br/>
which completes the induction step.
<br/><br/>$red<u>
Example # 3
</u>$black<br/><br/>
Prove the following using mathematical induction:
<br/><br/>
$blue 1&times;2 + 2&times;3 + 3&times;4 + ... + n(n+1) = n(n+1)(n+2)/3$black
<br/><br/>
$vio<u>
Base case:
</u>$black
<br/><br/>
Base Case: When n=1, we have 1&times;2 = 1(1+1)(1+2)/3 = 6/3 = 2. Therefore, the property holds for the base case.
<br/><br/>
$vio<u>
Induction step:
</u>$black
<br/><br/>
Induction Step: Assume that the property holds for some arbitrary natural number k. That is,
<br/><br/>
1&times;2 + 2&times;3 + 3&times;4 + ... + k(k+1) = k(k+1)(k+2)/3.
<br/><br/>
We need to prove that the property also holds for k+1. That is, we need to show that
<br/><br/>
1&times;2 + 2&times;3 + 3&times;4 + ... + (k+1)(k+2) = (k+1)(k+2)(k+3)/3.
<br/><br/>
To do this, we add (k+1)(k+2) to both sides of the equation for k:
<br/><br/>
1&times;2 + 2&times;3 + 3&times;4 + ... + k(k+1) + (k+1)(k+2) = k(k+1)(k+2)/3 + (k+1)(k+2)
<br/><br/>
Simplifying the right-hand side of the equation, we get:
<br/><br/>
k(k+1)(k+2)/3 + (k+1)(k+2)<br/>
=(k<sup>2</sup>+k)(k+2)/3 + k<sup>2</sup>+3k+2<br/>
=(k<sup>2</sup>+k)(k+2)+3k<sup>2</sup>+9k+6 /3<br/>
=k<sup>3</sup>+3k<sup>2</sup>+2k+3k<sup>2</sup>+9k+6 /3<br/>
=k<sup>3</sup>+6k<sup>2</sup>+11k+6 /3<br/>
=(k+1)(k+2)(k+3)/3
<br/><br/>
Therefore,
<br/><br/>
$vio 1&times;2 + 2&times;3 + 3&times;4 + ... + (k+1)(k+2) = (k+1)(k+2)(k+3)/3$black
<br/><br/>
which completes the induction step.
"
?>
