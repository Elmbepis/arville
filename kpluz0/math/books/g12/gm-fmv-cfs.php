<?php
$grd=$grd;
$title="Fair Market Value<br/>of a Cash Flow Stream";
$img1="images/aseries1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$pink=$font."<font color='#CC0066'>";
$article="

The concept of the fair market value (FMV) or economic value of a cash flow (payment stream) on a particular date is used to represent the worth of that payment stream at that specific date. This single amount
reflects the present value of the payment stream, considering factors like time value of money and other relevant economic considerations.
<br/><br/>
The term \"focal date\" refers to the specific date for which this calculation is being made. It's the point in time at which you want to determine the value of the payment stream. To calculate the fair market value or economic value on the focal date, 
you need to take into account the time value of money, which means that a dollar received or paid in the future is worth less than a dollar received or paid today due to the potential for earning interest or investment returns.
<br/><br/>
By discounting each payment in the cash flow back to the focal date, you can calculate the equivalent single amount that represents the value of the entire payment stream as of that date. This equivalent amount is often used for various financial purposes, 
such as valuing investments, assessing the worth of assets, or making financial decisions based on the current value of future cash flows.
<br/><br/>
Calculating the fair market value or economic value of a cash flow on a particular date involves discounting the future cash flows to their present value. This process takes into account the time value of money, which means that a sum of money 
received or paid in the future is worth less than the same amount received or paid today due to the opportunity to earn interest or returns on investments.
<br/><br/><br/>
@blue
Calculating the<br/>FMV of a Cash Flow
@nblue
<br/><br/>
Below are the basic steps for calculating the fair market value of a cash flow.
<br/><br/>$vio<u> 
1. Identify the cash flow. 
</u>$black<br/><br/>
Start by identifying the single future cash flow you want to value. This could be a payment, investment, or any financial transaction.
<br/><br/>$vio<u> 
2. Determine the interest rate. 
</u>$black<br/><br/>
Know the relevant interest rate or discount rate that reflects the cost of waiting or the opportunity to earn returns on investments.
<br/><br/>$vio<u> 
3. Calculate the present value.
</u>$black<br/><br/>
Calculate the fair market value today of the single cash flow using the applicable present value formula as follows:
<br/><br/>
$pink PV = FV / (1 + r)<sup>n</sup>$black for a future lump sum
<br/><br/>
where PV is the present value of the lump sum, FV is the future lump sum amount, r is the interest rate, and n is the number of periods until the lump sum is received,
<br/><br/>
or
<br/><br/>
$vio PV = P x (1 - (1 + r)<sup>-n</sup>) / r$black for an annuity
<br/><br/>
where PV is the present value, P is the periodic payment, r is the interest rate, and n is the number of periods.
<br/><br/>$vio<u> 
4. Interpret the result.
</u>$black<br/><br/>
The present value you calculate represents the fair market value or economic value of the single cash flow on the particular date. It tells you what the future cash flow is worth in today's money.
<br/><br/>
$red<u>
Example 1
</u>$black
<br/><br/>
Suppose you are considering an investment that promises to pay you &#8369;100,000 in 3 years. Determine the present value of this future payment today if the annual interest is 5%.
<br/><br/>
$vio Solution:$black
<br/><br/>
PV = FV / (1 + r)<sup>n</sup>
<br/><br/>
= &#8369;100,000 / (1 + .05)<sup>3</sup>
<br/><br/>
= $blue &#8369;86,383.76$black
<br/><br/>
Thus, the present value of receiving &#8369;100,000 in 3 years with a 5% annual interest rate is approximately &#8369;86,383.76. 
<br/><br/>
$red<u>
Example 2
</u>$black
<br/><br/>
Mr. Luna received two offers on a lot that he wants to sell. Mr. Ocampo has offered &#8369;50,000 and &#8369;1 million lump sum payment 5 years from now. On the other hand, Mr. Cruz has offered
&#8369;50,000 plus &#8369;40,000 every quarter for five years. Assuming an interest of 5% compounded annually, which offer has a higher market value?
<br/><br/>
$vio Solution:$black
<br/><br/>
Offer 1 FMV Calculation:
<br/><br/>
PV<sub>1</sub> = FV<sub>1</sub> / (1 + r)<sup>n</sup>
<br/><br/>
= &#8369;1 million / (1 + .05)<sup>5</sup>
<br/><br/>
= &#8369;783,526.16$black
<br/><br/>
Offer<sub>1</sub> FMV = DP<sub>1</sub> + PV<sub>1</sub>
<br/><br/>
= &#8369;50,000 + &#8369;783,526.17$black
<br/><br/>
= $blue &#8369;833,526.17$black
<br/><br/>
Offer 2 FMV Calculation:
<br/><br/>
F<sub>1</sub> = F<sub>2</sub> 
<br/><br/>
(1 + i<sub>4</sub>/4)<sup>4t</sup> = (1 + i<sub>1</sub>/1)<sup>1t</sup>
<br/><br/>
(1 + i<sub>4</sub>/4)<sup>4t</sup> = (1 + i<sub>1</sub>/1)<sup>1t</sup>
<br/><br/>
(1 + i<sub>4</sub>/4)<sup>4</sup> = (1.05)<sup>1</sup>
<br/><br/>
(1 + i<sub>4</sub>/4) = 1.05<sup>1/4</sup>
<br/><br/>
(1 + i<sub>4</sub>/4) = 1.0122722
<br/><br/>
i<sub>4</sub>/4 = j = 0.0122722
<br/><br/>
where j is the equivalent monthly interest.
<br/><br/>
In this case, we need to use the PV formula for an ordinary annuity as follows: 
<br/><br/>
PV<sub>2</sub> = P x (1 - (1 + r)<sup>-n</sup>) / r
<br/><br/>
= &#8369;40,000 x (1 - (1 + 0.0122722)<sup>-20</sup>) / 0.0122722
<br/><br/>
= &#8369;40,000 x (1 - 0.7835267) / 0.0122722
<br/><br/>
= &#8369;705,572.92
<br/><br/>
Offer<sub>2</sub> FMV = DP<sub>2</sub> + PV<sub>2</sub>
<br/><br/>
= &#8369;50,000 + &#8369;705,572.92$black
<br/><br/>
= $blue &#8369;755,572.92$black
<br/><br/>
Thus, the Mr. Ocampo's offer, which has a fair market value of &#8369;833,526.17, is higher than Mr. Cruz's offer, which has a fair market value of only &#8369;705,572.92.

"
?>
