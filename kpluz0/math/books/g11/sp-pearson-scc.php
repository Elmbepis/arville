<?php
$grd=$grd;
$title="Pearson's Sample<br/>Correlation Coefficient";
$img1="images/formula-pearson.jpg";
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

Pearson's sample correlation coefficient, often denoted as \"r,\" is a statistical measure that quantifies the strength and direction of the linear relationship between two continuous variables in a sample. 
It assesses how closely the data points in a scatter plot cluster around a straight line. 
<br/><br/><br/>
@blue
Formula for<br/>Pearson's Sample<br/>Correlation Coefficient
@nblue
<br/><br/>
Pearson's correlation coefficient (r) is calculated using the following formula:
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img1'>
</td></tr></table>
<br clear='left'><br/>
where <i>r</i> represents the correlation coefficient, x<sub>i</sub> and y<sub>i</sub> are the individual data points in the two variables, and x&#772; and y&#772;  are the sample means of the two variables.
<br/><br/>
The denominator consists of the product of the square roots of the sums of the squared deviations from the mean for each variable.
<br/><br/><br/>
@blue
Key Characteristics of<br/>Pearson's Correlation<br/>Coefficient
@nblue
<br/><br/>
Explained below are th key characteristics of Pearson's Correlation Coefficient.
<br/><br/>$vio<u> 
1. Range of values
</u>$black<br/><br/>
Pearson's correlation coefficient <i>r</i> ranges from -1 to 1, inclusive.
<br/><br/>$pink<i> 
1.1 <i>r</i> = 1
</i>$black<br/><br/>
When <i>r</i> = 1, there is perfect positive correlation, indicating that as one variable increases, the other increases proportionally.
<br/><br/>$pink<i> 
1.2 <i>r</i> = -1
</i>$black<br/><br/>
When <i>r</i> = -1, there is perfect negative correlation, indicating that as one variable increases, the other decreases proportionally.
<br/><br/>$pink<i> 
1.2 <i>r</i> = 0
</i>$black<br/><br/>
When <i>r</i> = 0, there is no linear correlation, suggesting that there is no discernible linear relationship between the variables.
<br/><br/>$vio<u> 
2. Strength of the relationship
</u>$black<br/><br/>
The absolute value of <i>r</i> indicates the strength of the linear relationship. The closer &VerticalLine;<i>r</i>&VerticalLine; is to 1, the stronger the linear relationship.
The closer &VerticalLine;<i>r</i>&VerticalLine; is to 0, the weaker the linear relationship.
<br/><br/>$vio<u> 
3. Direction of the relationship
</u>$black<br/><br/>
The sign of <i>r</i> (positive or negative) indicates the direction of the linear relationship.
<br/><br/>
If <i>r</i> is positive, then there is a positive correlation, where an increase in one variable tends to be associated with an increase in the other, and vice versa.
<br/><br/>
If <i>r</i> is negative, then there is a  negative correlation, where an increase in one variable tends to be associated with a decrease in the other, and vice versa.
<br/><br/>$vio<u> 
4. Sensitivity to outliers
</u>$black<br/><br/>
Pearson's correlation coefficient is sensitive to outliers, meaning that extreme values in the data set can have a significant impact on the calculated correlation. Outliers can disproportionately influence the correlation value, 
leading to potential distortion in the interpretation of the relationship between variables.
<br/><br/>
It's important to be cautious when interpreting the correlation coefficient if there are outliers present in the data, as they can skew the results and may not accurately represent the overall pattern of association between the variables. 
Consideration of other statistical measures and visual examination of the data, such as scatter plots, can help identify and understand the influence of outliers.
<br/><br/><br/>
@blue
Example of<br/>Application of Pearson's<br/>Correlation Coefficient
@nblue
<br/><br/>
As a researcher, you are interested in examining the relationship between the number of hours spent studying and the exam scores of a group of 10 students. 
<br/><br/>
You have collected raw data, recording the number of hours each student studied (independent variable, x) and their corresponding exam scores (dependent variable, y). 
<br/><br/>
Below is the dataset of study hours (in hours) and exam scores (out of 100) for the 10 students.
<br/><br/>
Study Hours (x): [10, 5, 8, 12, 9, 7, 11, 13, 4, 2]
<br/><br/>
Exam Scores (y): [80, 60, 75, 78, 72, 70, 82, 84, 58, 50]
<br/><br/>
Calculate Pearson's correlation coefficient <i>r</i> for this subset of the dataset to assess the linear correlation between study hours and exam scores among these 10 students.
<br/><br/>
$red Solution$black
<br/><br/>
x&#772; = (10 + 5 + 8 + 12 + 9 + 7 + 11 + 13 + 4 + 2) / 10
<br/><br/>
= 81/10 = 8.1
<br/><br/>
y&#772; = (80 + 60 + 75 + 78 + 72 + 70 + 82 + 84 + 58 + 50) / 10&#8203;
<br/><br/>
= 709/10 = 70.9
<br/><br/>
Deviations from the mean for study hours (x - x&#772;):
<br/><br/>
[10 - 8.1, 5 - 8.1, 8 - 8.1, 12 - 8.1, 9 - 8.1, 7 - 8.1, 11 - 8.1, 13 - 8.1, 4 - 8.1, 2 - 8.1]
<br/><br/>
= [1.9, -3.1, -0.1, 3.9, 0.9, -1.1, 2.9, 4.9, -4.1, -6.1]
<br/><br/>
Deviations from the mean for exam scores (y - y&#772;):
<br/><br/>
[80 - 70.9, 60 - 70.9, 75 - 70.9, 78 - 70.9, 72 - 70.9, 70 - 70.9, 82 - 70.9, 84 - 70.9, 58 - 70.9, 50 - 70.9]
<br/><br/>
= [9.1, -10.9, 4.1, 7.1, 1.1, -0.9, 11.1, 13.1, -12.9, -20.9]
<br/><br/>
Squares of deviations for study hours (x - x&#772;):
<br/><br/>
[3.61, 9.61, 0.01, 15.21, 0.81, 1.21, 8.41, 24.01, 16.81, 37.21]
<br/><br/>
Squares of deviations for exam scores (y - y&#772;):
<br/><br/>
[82.81, 118.81, 16.81, 50.41, 1.21, 0.81, 123.21, 171.61, 166.41, 436.81]
<br/><br/>
&#8721;(x&#8722;x&#772;)<sup>2</sup> = 116.9
<br/><br/>
&#8721;(y&#8722;y&#772;)<sup>2</sup> = 1168.9
<br/><br/>
&#8721;((x&#8722;x&#772;)(y&#8722;y&#772;)) = 17.29 + 33.79 - 0.41 + 27.69 + 0.99 + 0.99 + 32.19 + 64.19 + 52.89 + 127.49 = 357.1
<br/><br/>
r = 357.1 / sqrt((116.9)(1168.9)) 
<br/><br/>
= 357.1  / sqrt(136,644.41) 
<br/><br/>
= 357.1  / 369.654
<br/><br/>
= $vio 0.966$black
<br/><br/>
Thus, the Pearson's correlation coefficient <i>r</i> for the given data is approximately 0.966, indicating a strong positive linear relationship between study hours and the exam scores among these 10 students.
<br/><br/><br/>
@blue
Use Cases for Pearson's<br/>Correlation Coefficient
@nblue
<br/><br/>
The use cases for Pearson's correlation coefficient are diverse and span various fields, making it a versatile and widely applied statistical tool.
<br/><br/>$vio<u> 
1. Economics
</u>$black<br/><br/>
Economists frequently employ Pearson's correlation coefficient to analyze economic data. For instance, it helps assess the relationship between variables like inflation rates and unemployment rates, GDP and consumer spending, or interest rates and investment. 
Understanding these connections is crucial for economic forecasting, policy formulation, and decision-making in both public and private sectors.
<br/><br/>$vio<u> 
2. Social Sciences
</u>$black<br/><br/>
Social scientists utilize Pearson's correlation coefficient to explore relationships between various social and behavioral factors. It can be applied to study the associations between variables such as educational attainment and income, 
crime rates and demographic factors, or psychological variables like self-esteem and well-being. These insights contribute to a better understanding of social phenomena and inform policy interventions.
<br/><br/>$vio<u> 
3. Finance
</u>$black<br/><br/>
In finance, Pearson's correlation coefficient is indispensable for risk management and investment analysis. It helps assess the relationships between financial assets, such as stocks, bonds, or commodities. 
By analyzing correlations between these assets, investors can diversify their portfolios effectively and manage risks associated with market volatility.
<br/><br/>$vio<u> 
4. Biology
</u>$black<br/><br/>
Biologists and researchers use Pearson's correlation coefficient to investigate relationships in biological data. It aids in understanding the connections between variables like genetic traits and disease susceptibility, 
environmental factors and species distribution, or physiological measurements and health outcomes. These findings are crucial for advancing our knowledge of biology and medicine.
<br/><br/>$vio<u> 
5. Predictive modeling
</u>$black<br/><br/>
Pearson's correlation coefficient is valuable for predictive modeling. By quantifying the strength and direction of relationships between variables, it assists in building predictive models. For example, in marketing, it can be used to predict consumer 
behavior based on demographic data, helping businesses tailor their marketing strategies.
<br/><br/>$vio<u> 
6. Caution in interpreting causation:  
</u>$black<br/><br/>
While Pearson's correlation coefficient provides valuable insights into associations between variables, it's essential to exercise caution when interpreting these correlations as causation. 
<br/><br/>
High correlation does not imply causation, meaning that even if two variables are strongly correlated, it does not necessarily mean that changes in one variable cause changes in the other. Causation requires further investigation and 
consideration of potential confounding factors.

"
?>
