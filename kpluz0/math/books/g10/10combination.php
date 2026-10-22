<?php
$grd=$grd;
$title="Combination of Objects";
$img1="images/pythagorean1.jpg";
$img2="images/dist-formula1.jpg";
$img3="images/dist-formula2.jpg";
$img4="images/dist-formula3.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="

In the last lesson, we've learned that permutation refers to the number of ways that a particular set of things can be arranged, where the order of the arrangement of the things matters. 
In this lesson, we will learn the concept of combination, and how it differs from permutation.
<br/><br/>
A combination of $red n $black elements of a set taken $red r $black at a time, denoted by <sub>n</sub>C<sub>r</sub> or C(n,r), is any subset of the given set with $red r $black elements.
<br/><br/>
A combination is similar to a permutation in the sense that they are both subsets taken from a given set.  They differ in the sense that the order of the objects matters in a permutation, but does not matter in a combination.
<br/><br/>
To illustrate this concept, let's again consider the set {a, b, c}.  
We saw in the last lesson that this set has 6 permutations: 
<br/><br/>
$vio abc&nbsp;&nbsp;&nbsp;acb&nbsp;&nbsp;&nbsp;bac&nbsp;&nbsp;&nbsp;bca&nbsp;&nbsp;&nbsp;cab&nbsp;&nbsp;&nbsp;cba $black
<br/><br/>
The same set, however, has only one combination: abc.  Because the order of elements in a combination doesn't matter, this combination is considered the same as acb, bac, bca, cab, or cba.
<br/><br/>
In general, the number of combinations of $red n $black elements taken $red r $black at the time is given by the following formula: 
<br/><br/>
$vio<b>C(n,r) = P(n,r)/r! = n! / r!(n-r)!</b>$black
<br/><br/>
for 0 &le; r &le; n
<br/><br/>
$red<u>Example # 1</u>$black
<br/><br/>
Fifteen people joined a singing contest.
Three major winners will be chosen while the rest of the contestants will just win a consolation prize.
<br/><br/>
1. In how many different ways can the 3 major winners be chosen?
<br/><br/>
2. In how many different ways can the 12 consolation prize winners be chosen?
<br/><br/>
$blue Solution: $black
<br/><br/>
1. C(15,3) = 15! / 3!(n-r)! = 15! / 3!(12!)<br/>= 15&sdot;14&sdot;13 / 3! = 2730 / 6 = $vio 455$black
<br/><br/>
2. C(15,12) = 15! / 12!(3)! = 15! / 12!(3!)<br/>= 15&sdot;14&sdot;13 / 3! = 2730 / 6 = $vio 455$black
<br/><br/>
Did you notice that the answer for both questions is the same?
This means that C(15,3) = C(15,12) = C(15,15-3).
<br/><br/>
This brings us to the point that, in general,  C(n,r) = C(n, n-r)
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
Given a drawer containing 18 different postcards, how many ways can you form groups of 14 postcards each?
<br/><br/>
$blue Solution: $black
<br/><br/>
C(18,14) = 18! / 14!(18-14)! = 18! / 14!(4!) = 18&sdot;17&sdot;16&sdot;15 / 4! = 73440 / 24 = $vio 3060$black
<br/><br/>
$red<u>Example # 3</u>$black
<br/><br/>
How many ways can you pick 3 keys from a sack containing 16 different keys?
<br/><br/>
$blue Solution: $black
<br/><br/>
C(16,3) = 16! / 3!(16-3)! = 16! / 3!(13!)<br/>= 16&sdot;15&sdot;14 / 3!= 3,360 / 6 = $vio 560$black
<br/><br/>
$red<u>Example # 4</u>$black
<br/><br/>
Given a standard deck of 52 cards, how many ways can you form groups of 2 cards each?
<br/><br/>
$blue Solution: $black
<br/><br/>
C(52,2) = 52! / 2!(52-2)! = 52! / 2!(50!)<br/>= 52&sdot;51 / 2! = 2,652 / 2 = $vio 1,326$black
<br/><br/>
$red<u>Example # 5</u>$black
<br/><br/>
Given a standard chess set with 32 pieces, how many ways can you form groups of 3 chess pieces each?
<br/><br/>
$blue Solution: $black
<br/><br/>
C(32,3) = 32! / 3!(32-3)! = 32! / 3!(29!)<br/>= 32&sdot;31&sdot;30 / 3! = 29,760 / 6 = $vio 4,960$black
<br/><br/>
$red<u>Example # 6</u>$black
<br/><br/>
If I have a box containing 25 different shirts, how many groups of 5 shirts each can I form?
<br/><br/>
$blue Solution: $black
<br/><br/>
C(25,5) = 25! / 5!(25-5)! = 25! / 5!(20!)<br/>= 25&sdot;24&sdot;23&sdot;22&sdot;21 / 5!<br/>= 6,375,600 / 120 = $vio 53,130$black

"
?>
