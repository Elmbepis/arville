<?php
$grd=$grd;
$title="Rejection Regions for<br/>Population Means";
$img1="images/rejection-regions.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$pink=$font."<font color='#CC0066'>";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:18pt;color:#CC0066'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#BB0000'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:30pt;color:#CC0066'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#BB0000'>"; 
	}

$article="

Rejection regions for population means are specific regions in the probability distribution of a test statistic where, if the calculated test statistic falls within these regions, the null hypothesis in hypothesis testing is rejected. 
These regions are critical for making decisions about whether there is significant evidence to support the alternative hypothesis.
<br/><br/>
Rejection regions for population means are determined in hypothesis testing by setting up critical regions in the probability distribution that correspond to the chosen significance level (&#945;) and the type of test (one-tailed or two-tailed). 
<br/><br/><br/>
@blue
Steps to Determine<br/>Rejection Regions for<br/>Population Means
@nblue
<br/><br/>
The determination of the rejection region is crucial in hypothesis testing because it defines the boundaries beyond which you conclude that there is sufficient evidence to reject the null hypothesis in favor of the alternative hypothesis.
Below are the steps involved in determining rejection regions for population means.
<br/><br/>$vio<u> 
1. Choose a significance level.
</u>$black<br/><br/>
The significance level, often denoted as &#945; (alpha), is the probability of making a Type I error (rejecting a true null hypothesis). Common choices for &#945; include 0.05 (5%) and 0.01 (1%). 
The choice of &#945; depends on the desired level of confidence and the research context.
<br/><br/>$vio<u> 
2. Select the type of test.
</u>$black<br/><br/>
Determine whether the hypothesis test is one-tailed (also known as directional) or two-tailed (non-directional). The type of test depends on the research question and the nature of the hypothesis.
<br/><br/>$pink<i> 
2.1 One-Tailed Test
</i>$black<br/><br/>
In a one-tailed test, you are interested in detecting an effect in a specific direction (e.g., testing if a new drug is better than an existing drug). The rejection region is concentrated in one tail of the distribution.
<br/><br/>$pink<i> 
2.2 Two-Tailed Test
</i>$black<br/><br/>
In a two-tailed test, you are interested in detecting any significant difference, whether it's in one direction or the other (e.g., testing if the mean weight of a product is different from a specified value). The rejection region is split between both tails of the distribution.
<br/><br/>$vio<u> 
3. Determine the critical values.
</u>$black<br/><br/>
Critical values are specific values in the probability distribution that separate the rejection region from the non-rejection region. The critical values depend on the chosen &#945; level and the distribution used for the hypothesis test.
<br/><br/>$pink<i> 
3.1 Z-distribution
</i>$black<br/><br/>
If you are using the z-distribution (standard normal distribution), critical values can be found in standard normal distribution tables or calculated using statistical software. 
For a two-tailed test with &#945; = 0.05, the critical values are approximately &plusmn;1.96.
<br/><br/>$pink<i> 
3.2 T-distribution
</i>$black<br/><br/>
If you are using the t-distribution (for small sample sizes or when the population standard deviation is unknown), critical values depend on both &#945; and the degrees of freedom (df). 
You can find critical values in t-distribution tables or calculate them using statistical software.
<br/><br/>$vio<u> 
4. Mark or take note of<br/>the rejection region.
</u>$black<br/><br/>
Based on the chosen significance level (&#945;) and the type of test, mark or take note of the critical values on the probability distribution. For a one-tailed test, mark or take note of the critical value in the appropriate tail. 
For a two-tailed test, mark or take note of both critical values in both tails.
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img1'>
</td></tr></table>
<br clear='left'><br/>
$vio<u> 
5. Compare the test statistic.
</u>$black<br/><br/>
After calculating the test statistic from your sample data, compare it to the critical values marked or noted in the rejection region. If your test statistic falls within the rejection region, you reject the null hypothesis. 
If it falls outside the rejection region, you do not reject the null hypothesis.
<br/><br/><br/>
@blue
Example of Determining<br/>the Rejection Region for<br/>a Population Mean
@nblue
<br/><br/>
Suppose a chocolate bar manufacturer claims that their chocolate bars have an average weight of 50 grams. However, you suspect that the average weight is less than 50 grams. You decide to conduct a hypothesis test at a significance level (&#945;) of 0.05.
<br/><br/>
$red Solution:$black
<br/><br/>
Let the hypotheses be as follows:
<br/><br/>
Null Hypothesis (H0): &#956; = 50 grams, i.e., the population mean weight is 50 grams.
<br/><br/>
Alternative Hypothesis (Ha): &#956; < 50 grams, i.e., the population mean weight is less than 50 grams.
<br/><br/>$vio<u> 
1. Choose a significance level.
</u>$black<br/><br/>
In this case, you select &#945; = 0.05, which represents a 5% significance level.
<br/><br/>$vio<u> 
2. Select the type of test.
</u>$black<br/><br/>
Since you suspect that the average weight is less than 50 grams, you are conducting a one-tailed test in the left tail of the distribution.
<br/><br/>$vio<u> 
3. Determine the critical values.
</u>$black<br/><br/>
For a one-tailed test with &#945; = 0.05 using the standard normal distribution (z-distribution), you need to find the critical value. Using a standard normal distribution table or calculator, you find that the critical value corresponding 
to a 5% left-tailed test is approximately -1.645.
<br/><br/>$vio<u> 
4. Mark the rejection region.
</u>$black<br/><br/>
On the standard normal distribution curve, mark the critical value of -1.645 in the left tail. This marks the boundary of the rejection region.
<br/><br/>$vio<u> 
5. Compare the test statistic.
</u>$black<br/><br/>
Let's assume that the following data are obtained after collecting a sample of chocolate bars and calculating the sample mean weight:
<br/><br/>
Sample mean weight (x&#772;): 48 grams
<br/><br/>
Population standard deviation (&#963;): 5 grams (based on historical data)
<br/><br/>
Sample Size (n): 36 chocolate bars
<br/><br/>
z = (x&#772; - &#956;) / (&#963; / &#8730;n)
<br/><br/>
= (48 - 50) / (5 / &#8730;36)
<br/><br/>
= (-2) / (5 / 6)
<br/><br/>
z = $blue -2.4$black
<br/><br/>
Since the z-score (-2.4) falls to the left of the critical value (-1.645), it is inside the rejection region.
This means that you need to reject the null hypothesis and conclude that there is sufficient evidence to support your claim that the average weight of the chocolate bars is less than 50 grams.

"
?>
