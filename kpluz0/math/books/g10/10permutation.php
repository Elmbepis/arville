<?php
$grd=$grd;
$title="Permutation of Objects";
$img1="images/pythagorean1.jpg";
$img2="images/dist-formula1.jpg";
$img3="images/dist-formula2.jpg";
$img4="images/dist-formula3.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="

The Fundamental Counting Principle is stated as follows:
<br/><br/>
<i>If one event can occur in $red m $black different ways and a second event can occur in $red n $black different ways, then together the events can occur in $red m x n $black different ways, 
assuming that the second event is not influenced by the first event.</i>
<br/><br/>
The Fundamental Counting Principle allows us to count elements of a set without actually listing them.
Sometimes, the application of this principle involves the evaluation of factorial expressions.
<br/><br/>
$vio<u>Factorials</u>$black
<br/><br/>
The factorial of a non-negative integer n, denoted by n!, is simply the product of all positive integers less than or equal to n:
<br/><br/>
n! = n&sdot;(n-1)&sdot;(n-2)&sdot;(n-3)...&sdot;3&sdot;2&sdot;1
<br/><br/>
$red<u>Example # 1</u>$black
<br/><br/>
Find the value of 5!.
<br/><br/>
$blue Solution: $black
<br/><br/>
5! = 5&sdot;4&sdot;3&sdot;2&sdot;1 = $vio 120 
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
Find the value of 9!.
<br/><br/>
$blue Solution: $black
<br/><br/>
5! = 9&sdot;8&sdot;7&sdot;6&sdot;5&sdot;4&sdot;3&sdot;2&sdot;1 = $vio 362880 $black
<br/><br/>
Note that by convention, the value of 0! is 1.
<br/><br/><br/>
@blue
Permutation
@nblue
<br/><br/>
Permutation refers to the mathematical calculation of the number of ways that a particular set of elements can be arranged in a definite order, where the order of the arrangement of the elements matters. 
Each possible arrangement of the given elements is also called a permutation of that set.
<br/><br/>
Roughly speaking, permutation refers to how many ways a group of things can be arranged.
<br/><br/>
To illustrate this concept, consider the set {a, b, c}.  How many different ways can we arrange the letters 'a', 'b', and 'c'?
Let's look at the possible arrangements of these letters:
<br/><br/>
$vio abc&nbsp;&nbsp;&nbsp;acb&nbsp;&nbsp;&nbsp;bac&nbsp;&nbsp;&nbsp;bca&nbsp;&nbsp;&nbsp;cab&nbsp;&nbsp;&nbsp;cba $black
<br/><br/>
As we can see above, there are six ways that the letters 'a', 'b', and 'c' may be arranged.
The set  {a, b, c} therefore has 6 permutations.
<br/><br/>
The determine the number of permutations that a given set has, we don't need to list down all possible arrangements.
We can apply the Fundamental Counting Principle to do this.
<br/><br/>
In the example above involving set {a, b, c}, the first position may be filled in 3 ways.
It can be filled by 'a', 'b', or 'c'.
<br/><br/>
For every way that the first position is filled, there will only be two ways to fill the second position.
For example, if the first position is filled with an 'a', the second position can only be filled with a 'b' or a 'c'.
<br/><br/>
For every way that the first and second positions are filled, there will only be one way left to fill the second position.
For example, if the first two positions are filled with an 'a' and a 'b', the third position can only be filled with a 'c'.
<br/><br/>
We can get the total number of arrangements or permutations by multiplying together the numbers of ways that the positions may be filled:
<br/><br/>
# of permutations = 3 x 2 x 1 = 3! = 6
<br/><br/>
Thus, we arrived at the same number of permutations for  {a, b, c} without actually listing down each permutation: 3! = 6.
<br/><br/>
In general, the number of permutations of $red n $black distinct objects is denoted by <sub>n</sub>P<sub>n</sub> or P(n,n) if all of the objects are included in each arrangement or permutation.
The notation P(n,n) is read 'the permutation of n objects taken n at a time.'
P(n,n) is given by the following formula:
<br/><br/>
$vio<b>P(n,n) = n!</b>$black
<br/><br/>
$red<u>Example # 3</u>$black
<br/><br/>
How many permutations of the letters U, V, W, X, Y, and Z are there?
<br/><br/>
$blue Solution: $black
<br/><br/>
There are six elements (letters) in the set, so their permutation may be computed as follows:
<br/><br/>
P(6,6) = 6! = 6&sdot;5&sdot;4&sdot;3&sdot;2&sdot;1 = $vio 120 $black
<br/><br/>
$red<u>Example # 4</u>$black
<br/><br/>
How many ways can you arrange a blue chair, yellow chair, white chair, and red chair in one row?
<br/><br/>
$blue Solution: $black
<br/><br/>
There are 4 chairs to arrange, so their permutation may be computed as follows:
<br/><br/>
P(4,4) = 4! = 4&sdot;3&sdot;2&sdot;1 = $vio 24 $black
<br/><br/>
Sometimes, we want to know the number of permutations of $red n $black elements but only taken $red r $black at a time.
This means that only $red r $black out of the $red n $black objects will be included in every arrangement or permutation.
<br/><br/>
In general, the number of permutations of $red n $black distinct elements taken $red r $black at a time, denoted by <sub>n</sub>P<sub>r</sub> or P(n,r), is given by the following formula:
<br/><br/>
$vio<b>P(n,r) = n! / (n-r)!</b>$black
<br/><br/>
for 0 &le; r &le; n
<br/><br/>
$red<u>Example # 5</u>$black
<br/><br/>
Ferdie's owns 7 paintings but his wall has enough space for only three of them.
How many different ways can his paintings fill up this wall?
<br/><br/>
$blue Solution: $black
<br/><br/>
Basically, the question is how many ways can you arrange 7 paintings if each arrangement only includes 3 paintings.
In other words, we need to find the permutation of 7 paintings taken 3 at a time, or P(7,3).
<br/><br/>
P(7,3) = 7! / (7-3)! = 7!/4! = 5040/24 = $vio 210 $black
<br/><br/>
Here's another way of doing it:
<br/><br/>
P(7,3) = 7! / (7-3)! = 7!/4! = 7&sdot;6&sdot;5&sdot;4! / 4!<br/>= 7&sdot;6&sdot;5 = $vio 210 $black
<br/><br/>
We can also apply the Fundamental Counting Principle because there 7 paintings available for the first spot on the wall, 6 paintings available for the second spot, and 5 paintings available for the third and last spot.
If we multiply them together, we'd get 7&sdot;6&sdot;5 = $vio 210 $black 
<br/><br/>
$red<u>Example # 6</u>$black
<br/><br/>
How many different ways can 8 people be seated in a row of 5 chairs?
<br/><br/>
$blue Solution: $black
<br/><br/>
To solve this problem, we need to find the permutation of 8 people taken 5 at a time, or P(8,5).
<br/><br/>
P(8,5) = 8! / (8-5)! = 8!/3!<br/>= 8&sdot;7&sdot;6&sdot;5&sdot;4&sdot;3! / 3! = 8&sdot;7&sdot;6&sdot;5&sdot;4 = $vio 6720 $black
<br/><br/>
Lastly, we need to know how to calculate permutations of sets that contain indistinct elements, or elements that are the same.
<br/><br/>
In general, the number of distinguishable permutations P of $red n $black distinct elements taken $red n $black at a time, 
with $red r<sub>1</sub> $black like elements, $red r<sub>2</sub> $black like elements of another kind, and so on, is given by the following formula:
<br/><br/>
$vio<b>P = n! / (r<sub>1</sub>!r<sub>2</sub>!r<sub>3</sub>!...)</b>$black
<br/><br/>
$red<u>Example # 6</u>$black
<br/><br/>
How many different and distinct ways can the letters in the word MISSISSIPPI (all caps) be arranged?
<br/><br/>
$blue Solution: $black
<br/><br/>
The word MISSISSIPPI has eleven letters.
It also has 4 I's, 4 S's, and 2 P's.
We can therefore apply the formula above in this manner:
<br/><br/>
P = 11! / (4!&sdot;4!&sdot;2!) = 11! / (24&sdot;24&sdot;2)<br/>= 39916800 / 1152 = $vio 34650 $black







"
?>
