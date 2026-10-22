<?php
$grd=$grd;
$title="Percentiles and<br/>the t-Table";
$img1="images/t-table.jpg";
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

Percentiles represent data points or values below which a certain percentage of the data in a t-distribution falls. 
Identifying percentiles using the t-table is a statistical method for determining specific values in a t-distribution, which is commonly used in hypothesis testing, confidence interval estimation, and various statistical analyses. 
<br/><br/>
In the context of the t-table, these percentiles are associated with critical values, which are used to make decisions in statistical procedures. In this lesson, we will learn how to relate percentiles to the t-table.
<br/><br/><br/>
@blue
Key Aspects of the t-Table
@nblue
<br/><br/>
Below are the key aspects of the t-table.
<br/><br/>$vio<u> 
1. Definition of the t-table
</u>$black<br/><br/>
The t-table, also known as the t-distribution table, is a fundamental reference tool in statistics used for making statistical inferences about sample data. It plays a crucial role in situations where the sample size is small, 
or when the population standard deviation is unknown. 
<br/><br/>
The primary function of the t-table is to provide critical values, known as t-scores, that help statisticians and researchers establish confidence intervals and conduct hypothesis tests.
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img1'>
</td></tr></table>
<br clear='left'><br/>
One distinguishing feature of the t-distribution, as compared to the standard normal distribution (z-distribution), is its thicker tails. This thicker-tailed nature of the t-distribution makes it better suited for addressing scenarios where 
sample sizes are limited, and it accounts for the additional uncertainty introduced by smaller samples. 
<br/><br/>
When working with larger sample sizes, the t-distribution approaches the standard normal distribution, and the critical values become more similar to those obtained from the z-table.
<br/><br/>$vio<u> 
2. Degrees of freedom (df)
</u>$black<br/><br/>
Degrees of freedom (df) are a critical concept in the t-distribution and play a central role in determining the shape and characteristics of the distribution. In essence, degrees of freedom reflect the number of values in the final calculation of a statistic 
that are free to vary. In the context of hypothesis testing and confidence intervals, df are calculated based on the sample size and the specific statistical test being conducted. 
<br/><br/>
A higher number of degrees of freedom corresponds to a t-distribution that closely resembles the standard normal distribution, with thinner tails and less variability.
<br/><br/>
How df's are determined in common statistical scenarios are explained below.
<br/><br/>$pink<i> 
2.1. One-sample t-Test
</i>$black<br/><br/>
For a one-sample t-test, the degrees of freedom are equal to the sample size minus one (df = n - 1), where 'n' represents the number of observations in the sample. Essentially, df account for the variability within the sample.
<br/><br/>$pink<i> 
2.2. Two-sample t-Test<br/>(independent samples) 
</i>$black<br/><br/>
In a two-sample t-test comparing means of two independent groups, the degrees of freedom depend on whether you assume equal variances or not. When assuming equal variances, you calculate df by adding the sample sizes of the two groups and subtracting 
two (df = n1 + n2 - 2). This reflects the variability within both groups.
<br/><br/>
When assuming unequal variances (Welch's t-test), df are calculated using a more complex formula that considers the variances and sample sizes of both groups. This calculation similarly reflects the variability within the groups.
<br/><br/>$pink<i> 
2.3. Paired (dependent)<br/>samples t-test
</i>$black<br/><br/>
In a paired t-test, where measurements are paired or matched (e.g., before and after treatment), the degrees of freedom are simply the sample size minus one (df = n - 1). This accounts for the variability within the paired data.
<br/><br/>$pink<i> 
2.4. Analysis of<br/>variance (ANOVA)
</i>$black<br/><br/>
In one-way ANOVA, df are calculated for the between-groups (numerator) and within-groups (denominator) variations. The df for between-groups is equal to the number of groups minus one (df = k - 1), reflecting variability between the groups. 
The df for within-groups is calculated as the total sample size minus the number of groups (df = N - k), representing variability within the groups.
<br/><br/>$pink<i> 
2.5. Chi-square test<br/>of independence
</i>$black<br/><br/>
In a chi-square test of independence, df are determined by the number of rows (r) and columns (c) in the contingency table. The degrees of freedom are calculated as (r - 1) times (c - 1). This calculation accounts for the variability within 
the table while considering the constraints imposed by the number of categories.
<br/><br/>$vio<u> 
3. Percentiles and critical values
</u>$black<br/><br/>
Percentiles represent specific data values that divide a dataset into segments. For example, the 25th percentile represents a value below which 25% of the data falls.
<br/><br/>
Critical values, on the other hand, are values associated with specific levels of significance (&#945;) and are used to establish decision boundaries in statistical tests.
<br/><br/>
In the t-table, you can find critical values for different confidence levels (1 - &#945;) and degrees of freedom. For example, if you have 20 degrees of freedom and want to find the critical value for a 95% confidence level, 
you would look up the intersection of the 0.05 significance level (1 - 0.95) and 20 degrees of freedom in the table. 
<br/><br/>
For a two-tailed test, the critical value for a 95% confidence level and 20 degrees of freedom is approximately 2.086.  This means that 95% of the t-distribution falls within approximately &plusmn; 2.086 standard deviations from the mean.
<br/><br/>
The percentile score is the value you want to find in your dataset, representing the point below which a certain percentage of the data falls. For example, if you want to find the 90th percentile score, you're looking for the score below 
which 90% of the data falls.
<br/><br/>$vio<u> 
4. Using the t-table
</u>$black<br/><br/>
To identify a percentile (e.g., the 25th percentile) using the t-table, simply locate the appropriate row in the t-table corresponding to the desired degrees of freedom (df) and find the column that corresponds to the desired significance level (&#945;), 
which is equal to (1 - percentile).
<br/><br/>
The intersection of the row and column in the t-table will give you the critical value associated with that percentile.
<br/><br/><br/>
@blue
Steps Used in<br/>Relating Percentiles<br/>to Critical Values
@nblue
<br/><br/>
A percentile is a number on a statistical distribution whose less-than probability is the given percentage. For example, the 95th percentile of the t-distribution with n-1 degrees of freedom is that value wherein the left-tail (less-than) 
probability is 0.95 and the right-tail probability is 0.05.
<br/><br/>
Below are the steps used in relating a percentile to critical values in the t-table.
<br/><br/>$vio<u> 
1. Calculate the degrees of freedom (df).
</u>$black<br/><br/>
In the context of a t-test for a sample mean, the formula for calculating degrees of freedom is commonly expressed as df = n - 1, where \"n\" denotes the sample size.
<br/><br/>
This formula is derived from the idea that when estimating a population parameter, such as the mean, using sample data, there is some inherent loss of information due to the fact that the sample mean must be calculated. 
<br/><br/>
As a result, one degree of freedom is 'used up' in the process. Therefore, by subtracting 1 from the sample size, we account for this loss and arrive at the degrees of freedom.
<br/><br/>$vio<u> 
2. Determine the desired percentile.
</u>$black<br/><br/>
Decide on the specific percentile you are interested in. Common percentiles include 90%, 95%, and 99% in statistical analysis.
<br/><br/>$vio<u> 
3. Find the t-critical value.
</u>$black<br/><br/>
Use the t-table (or statistical software) to find the critical t-value associated with the desired percentile and degrees of freedom. The table provides t-values corresponding to different percentiles for different degrees of freedom.
<br/><br/>$vio<u> 
4. Interpret.
</u>$black<br/><br/>
The percentile chosen represents the percentage of the distribution that falls below the observed t-score. For a one-tailed test, for example, the critical value for a 95% confidence level and 15 degrees of freedom is 1.753. 
This implies that 95% of the t-distribution falls to the right of 1.753 standard deviations from the mean in the specified direction.
<br/><br/><br/>
@blue
Example of<br/>Relating a Percentile<br/>to its Critical Values
@nblue
<br/><br/>
Suppose you have conducted a t-test on a sample of exam scores with a sample size of 20. You want to determine the critical values (t-scores) within which 95% of the exam scores fall (2-tailed).
<br/><br/>
$red Solution:$black
<br/><br/>
$vio<u> 
1. Calculate the degrees<br/>of freedom (df).
</u>$black<br/><br/>
In this example, you have a sample of 20 exam scores. To use the t-table, you need to calculate the degrees of freedom (df), which is typically (n - 1) for a t-distribution.
df = 20 - 1 = 19.
<br/><br/>$vio<u> 
2. Determine the desired percentile.
</u>$black<br/><br/>
You are interested in a 95% confidence level, which means you're looking at the middle 95% of the distribution in a 2-tailed test.
<br/><br/>$vio<u> 
3. Find the t-critical value.
</u>$black<br/><br/>
Consulting a t-table or using statistical software with df=19 and a 95% confidence level (2-tailed), you find the critical t-value to be approximately 2.093.
<br/><br/>$vio<u> 
4. Interpret.
</u>$black<br/><br/>
The results above means that 95% of the exam scores fall within approximately &plusmn; 2.093 standard deviations from the mean.

"
?>
