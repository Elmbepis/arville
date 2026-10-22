<?php
$grd=$grd;
$title="Probability of Mutually<br/>Exclusive Events";
$img1="images/venn3.jpg";
$img2="images/venn4.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="

Two events are said to be mutually exclusive if they can't happen at the same time.
<br/><br/>
For example, turning left and turning right are mutually exclusive events because you can't do them both at the same time.
Getting a 'head' and getting a 'tail' from a single coin toss are another example of mutually exclusive events.
<br/><br/>
Two events that are mutually exclusive do not have any outcomes in common, i.e., they do not have an intersection.
Mathematically, events A and B are mutually exclusive if:
<br/><br/>$vio
A &cap; B = {}$black and $vio<br/>
P(A &cap; B) = P(A and B) = 0.$black
<br/><br/>
In the last lesson, we learned that the probability of the union of two events A and B, P(A &cup; B), is given by the following formula:
<br/><br/>
$vio P(A &cup; B) = P(A) + P(B) - P(A &cap; B)$black
<br/><br/>
If A and B are mutually exclusive, then the formula above is reduced into the following formula because A and B do not have an intersection:
<br/><br/>
$vio P(A &cup; B) = P(A) + P(B)$black
<br/><br/>
$red<u>Example # 1</u>$black
<br/><br/>
A die is rolled.  
Let A be the event of getting a '1' or a '3'.
Let B be the event of getting a '2' or a '4'.
Find P(A &cap; B) and P(A &cup; B) .
<br/><br/>
$blue Solution: $black
<br/><br/>
A = {1,3}: 2 outcomes
<br/><br/>
B = {2,4}: 2 outcomes
<br/><br/>
S = {1,2,3,4,5,6}: 6 outcomes
<br/><br/>
P(A) = 2/6 = $vio 1/3$black
<br/><br/>
P(B) = 2/6 = $vio 1/3$black
<br/><br/>
P(A &cap; B) = P(A and B) = {}, so A and B are mutually exclusive. Thus:
<br/><br/>
P(A &cup; B) = P(A or B) = P(A) + P(B) = 1/3 + 1/3 = $vio 2/3$black
<br/><br/>
$vio<u>E-complement</u>$black
<br/><br/>
If E is an event in a sample space S, then any outcome in S that is not in E is said to be in E-complement, &Emacr;.
E and &Emacr; are mutually exclusive events.
<br/><br/>
P(E &cup; &Emacr;) = P(S) since E &cup; &Emacr; = S.
<br/><br/>
Thus,
P(E) + P(&Emacr;) = 1 and
<br/><br/>
P(&Emacr;) = 1 - P(E)
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
The probability of getting a defective toy from a box of new toys is 0.11.
Find the probability that you will pick a toy that is NOT defective from that box.
<br/><br/>
$blue Solution: $black
<br/><br/>
Let E be the event of picking a defective toy.
Let &Emacr; be the event of getting a nondefective toy.
<br/><br/>
P(&Emacr;) = 1 - P(E) = 1 - 0.11 = $vio 0.89
"
?>
