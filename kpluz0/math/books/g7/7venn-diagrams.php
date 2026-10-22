<?php

$grd=$grd;
$title="Using Venn Diagrams";
$img1="images/venn1.jpg";
$img2="images/venn2.jpg";
$img3="images/venn3.jpg";
$img4="images/venn4.jpg";
$vio=$font."<font color='#800080'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";

$article="
A Venn diagram is an illustration that uses circles to visually represent the similarities and differences between two concepts. 
As it turns out, Venn diagrams are very useful in showing relationships between sets.
<br/><br/><br/>
@blue
Subsets and<br/>Universal Sets
@nblue
<br/><br/>
$vio<u>Subsets</u>$black
<br/><br/>
A set S is said to be a subset of another set T if every element of S is also an element of T. 
This relationship is written as: $vio<b> S &#8838; T </b>$black, which is read as 'S is a subset of T'.
<br/><br/>
For example, let:<br/>
A = {2,4,6,8} and <br/>
B = {1,2,3,4,5,6,7,8,9,10}.
<br/><br/>
Thus,<br/>
$vio<b>A &#8838; B</b>$black.
<br/><br/>
Any set S is a subset of itself, because every element of S is an element of S.
<br/><br/>
Thus,<br/>
$vio<b>S &#8838; S</b>$black.
<br/><br/>
Furthermore, the empty set &#8709; is a subset of every set S, because every element of the empty set is an element of S, since there are no elements in &#8709; at all.
<br/><br/>
Thus,<br/>
$vio<b>&#8709; &#8838; S</b>$black.
<br/><br/>
$vio<u>Universal Sets in<br/>a Venn Diagram</u>$black
<br/><br/>
When working with problems involving sets, it is convenient to have a larger set that contains all the sets being considered.
All the sets being considered are therefore subsets of this larger set. 
This larger set is called the universal set, and is usually given the symbol U. 
<br/><br/>
In a Venn diagram, the universal set is generally drawn as a large rectangle, and the subsets within it are represented by circles within this rectangle, as shown below.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
In the example Venn diagram above, the universal set U has three subsets:
<br/><br/>
A={9,7,4,1},<br/>
B={2,12}, and <br/>
C={10,8,3,11,5,6}.
<br/><br/>
Note that we can also say that the set U is the union of sets A, B, and C.
<br/><br/>
$vio<u>Subsets in a<br/>Venn Diagram</u>$black
<br/><br/>
If A is a subset of B, the circle representing A is placed inside the circle representing B in the Venn diagram, as shown below.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/>
In the Venn diagram above, 
<br/><br/>
A={5,4,2}, and<br/>
B={5,4,2,1,3,9,7,10}.
<br/><br/>
Set A is a subset of set B, so all the elements of set A are also elements of set B.
The circle representing set A is therefore put entirely inside the circle representing B.
<br/><br/>
$vio<u>Set Intersections<br/>in a Venn Diagram</u>$black
<br/><br/>
Recall that the intersection of two sets A and B consists of elements that belong to BOTH sets A and B.
<br/><br/>
In the Venn diagram, sets that intersect are represented by circles that overlap, with the common elements placed inside the overlapping area, as shown below.
The overlapping area is also often shaded.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/>
In the example Venn diagram above,
<br/><br/>
A={1,2,4,5,7,8},<br/>
B={3,4,6,8,9,10}, and <br/>
A &cap; B= {4,8}.
<br/><br/>
$vio<u>Set Unions in a<br/>Venn Diagram</u>$black
<br/><br/>
Recall that the union of sets A and B consists of the elements of set A combined with the elements of set B.
<br/><br/>
In the Venn diagram, a union of sets is usually represented by shaded circles, with the combined elements placed inside the shaded areas, as shown below.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img4'>
</td></tr></table>
<br/>
In the example Venn diagram above,
<br/><br/>
A={1,2,4,5,7,8},<br/>
B={3,4,6,8,9,10}, and <br/>
A &cup; B= {1,2,4,5,7,8,3,6,9,10}.


"
?>




















