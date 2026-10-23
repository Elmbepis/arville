<?php 
require '../../pass-chk.php';
?>

<?php
$_SESSION['level']="Easy";
?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Using a Calendar - MathPluz.com</title>
<script language="JavaScript">
<!--
function FP_swapImg() {//v1.0
 var doc=document,args=arguments,elm,n; doc.$imgSwaps=new Array(); for(n=2; n<args.length;
 n+=2) { elm=FP_getObjectByID(args[n]); if(elm) { doc.$imgSwaps[doc.$imgSwaps.length]=elm;
 elm.$src=elm.src; elm.src=args[n+1]; } }
}

function FP_preloadImgs() {//v1.0
 var d=document,a=arguments; if(!d.FP_imgs) d.FP_imgs=new Array();
 for(var i=0; i<a.length; i++) { d.FP_imgs[i]=new Image; d.FP_imgs[i].src=a[i]; }
}

function FP_getObjectByID(id,o) {//v1.0
 var c,el,els,f,m,n; if(!o)o=document; if(o.getElementById) el=o.getElementById(id);
 else if(o.layers) c=o.layers; else if(o.all) el=o.all[id]; if(el) return el;
 if(o.id==id || o.name==id) return o; if(o.childNodes) c=o.childNodes; if(c)
 for(n=0; n<c.length; n++) { el=FP_getObjectByID(id,c[n]); if(el) return el; }
 f=o.forms; if(f) for(n=0; n<f.length; n++) { els=f[n].elements;
 for(m=0; m<els.length; m++){ el=FP_getObjectByID(id,els[n]); if(el) return el; } }
 return null;
}
// -->
</script>
</head>

<body background="../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../images/header1c.jpg', /*url*/'../../images/header1b.jpg', /*url*/'../../images/header2c.jpg', /*url*/'../../images/header2b.jpg', /*url*/'../../images/header3c.jpg', /*url*/'../../images/header3b.jpg', /*url*/'../../images/header4c.jpg', /*url*/'../../images/header4b.jpg', /*url*/'../../images/header5c.jpg', /*url*/'../../images/header5b.jpg', /*url*/'../../images/header6c.jpg', /*url*/'../../images/header6b.jpg')">

<div align="center">

<table width="900"><tr><td height="100">
	<div align="center">
		<table border="0" width="900" cellspacing="0" cellpadding="0">
			<tr>
				<td width="193" height="100" valign="top">
				<a href="/home-math.php">
				<img border="0" src="../../images/header-logo.jpg"></a></td>
				<td width="133" valign="top">
										<a href="/how-to-use-kpluz.php">
										<img border="0" id="img1" src="../../images/header1a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/header1b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/header1a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/header1c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/header1b.jpg')"></a></td>
				<td width="133" valign="top">
										<a href="/bluebars_student.php">
										<img border="0" id="img2" src="../../images/header2a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/header2b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/header2a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/header2c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/header2b.jpg')"></a></td>
				<td width="133" valign="top">
										<a href="/programs.php">
										<img border="0" id="img3" src="../../images/header3a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/header3b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/header3a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/header3c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/header3b.jpg')"></a></td>
				<td width="134" valign="top">
										<a href="/community.php">
										<img border="0" id="img4" src="../../images/header4a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img4',/*url*/'../../images/header4b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img4',/*url*/'../../images/header4a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img4',/*url*/'../../images/header4c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img4',/*url*/'../../images/header4b.jpg')"></a></td>
				<td width="134" valign="top">
										<a href="/contact.php">
										<img border="0" id="img5" src="../../images/header5a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img5',/*url*/'../../images/header5b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img5',/*url*/'../../images/header5a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img5',/*url*/'../../images/header5c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img5',/*url*/'../../images/header5b.jpg')"></a></td>
				<td width="134" valign="top">
										<a href="/logout.php">
										<img border="0" id="img6" src="../../images/header6a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img6',/*url*/'../../images/header6b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img6',/*url*/'../../images/header6a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img6',/*url*/'../../images/header6c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img6',/*url*/'../../images/header6b.jpg')"></a></td>
			</tr>
		</table>
	</div>
	</td></tr></table>

</div>

	<div align="center">
		<table border="0" width="800" cellspacing="0" cellpadding="0" id="table7">
			<tr>
				<td>
				<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table32">
					<tr>
						<td>
						<img border="0" src="../images/images/test67-top.jpg"></td>
					</tr>
					<tr>
						<td background="../images/images/test67-title.jpg" height="56" width="800" align="center">
						
						
			
						
						
						
						
						<span style="font-weight: 700">
						<font face="Verdana" style="font-size: 14pt" color="#000080">
						Using a Calendar</font></span></td>
					</tr>
					<tr>
						<td>
						<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table33">
							<tr>
								<td width="110" valign="top" height="34" background="../images/images/test67-left.jpg">
								&nbsp;</td>
								<td valign="top">
								<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table34">
									<tr>
										<td background="../images/images/test67-spacer.jpg" valign="top" width="582">
										<div align="center">
										<table border="0" width="90%" cellspacing="0" cellpadding="0" id="table37">
											<tr>
												<td>
												
												
<?php

$vio="<font face='Comic Sans MS' style='font-size: 16pt; font-weight: 700' color='#800080'>";
$red="<font face='Comic Sans MS' style='font-size: 16pt; font-weight: 700' color='#CC0066'>";
$qfont1="<font face='Comic Sans MS' style='font-size: 16pt; font-weight: 700' color='#333333'>";
$qfont2="<font face='Comic Sans MS' style='font-size: 15pt; font-weight: 700' color='#333333'>";
$qfont3="<font face='Comic Sans MS' style='font-size: 14pt; font-weight: 500' color='#333333'>";
 
if (empty($_POST['Submit1']))
{
	$points=1;
	$_SESSION['points'] = $points;
}
?>
												
												
												
												</td>
											</tr>
											<tr>
												<td>
												<p align="center">&nbsp;
												
												
												
<?php 
 

echo "<FORM name ='form1' method ='post' action ='calendar.php'>";

$tnum="*2v";

if(isset($_GET['ansclick'])){$ansclicked=$_GET['ansclick'];} 
else{$ansclicked="";} 

if ($ansclicked!="" and empty($_POST['Submit2']))
{
if (isset($_SESSION['answer'])){$ans=$_SESSION['answer'];}
$question=$_SESSION['q'];
$picfile=$_SESSION['picfile'];

	echo "<p align='center' style='margin-left: 25px; margin-right: 25px'>";
	echo "<font face='Comic Sans MS' style='font-size: 14pt; font-weight: 700' color='#800080'>";
	echo "Your answer is ";
	echo "<font face='Comic Sans MS' style='font-size: 14pt; font-weight: 700' color='#0000BB'>";
	echo "'".$ansclicked."'";
	echo "<font face='Comic Sans MS' style='font-size: 14pt; font-weight: 700' color='#800080'>";
	echo ".<br />";
	if ($ans==$ansclicked)
	{
	echo "<font face='Comic Sans MS' style='font-size: 16pt; font-weight: 700' color='#CC0066'>";
	echo "You are correct!<br />";
	 
	if ($_SESSION['pageload']!="old"){$_SESSION['score']=$_SESSION['score']+$_SESSION['points'];}
	
	//Update Database
	if ($_SESSION['pageload']!="old"){
	$con = mysql_connect("localhost","xigega65_EE","XigFanims1989");
	if (!$con){die('Could not connect: ' . mysql_error());}
	mysql_select_db("kpluz");
	$schooler=$_COOKIE['KPluzID_my_site'];
    $result = mysql_query("SELECT * FROM MPluz_accounts
 	WHERE Cardholder = '$schooler' ");
	$rec = mysql_fetch_array( $result );
	$easy=$rec['Easy'];
	$medium=$rec['Medium'];
	$hard=$rec['Hard'];
	
	$newtnum=$tnum;
	if ($_SESSION['level']=="Easy"){
		if (strlen($easy)<2){
			$newgrades="*".$newtnum."001001";
			mysql_query("UPDATE MPluz_accounts SET Easy = '$newgrades'
			WHERE Cardholder = '$schooler'");}
		else{
			$pos1=strpos($easy,$tnum);
			if ($pos1>0){
				$gradestring=substr($easy,$pos1,9);
				$correct=substr($gradestring,3,3);
				$all=substr($gradestring,6,3);
				$correct=$correct+1;
				$all=$all+1;
				$corlen=strlen($correct);
				for ($i=1; $i<=(3-$corlen); $i+=1){$correct="0".$correct;}
				$alllen=strlen($all);
				for ($i=1; $i<=(3-$alllen); $i+=1){$all="0".$all;}
				$newgrade=substr($gradestring,0,3).$correct.$all;
				$newgrades=substr($easy,0,$pos1).$newgrade.substr($easy,($pos1+9));
				mysql_query("UPDATE MPluz_accounts SET Easy = '$newgrades'
				WHERE Cardholder = '$schooler'");}
			else{
				$newgrades=$easy.$tnum."001001";
				mysql_query("UPDATE MPluz_accounts SET Easy = '$newgrades'
				WHERE Cardholder = '$schooler'");}
	}}
	if ($_SESSION['level']=="Medium"){
		if (strlen($medium)<2){
			$newgrades="*".$newtnum."001001";
			mysql_query("UPDATE MPluz_accounts SET Medium = '$newgrades'
			WHERE Cardholder = '$schooler'");}
		else{
			$pos1=strpos($medium,$tnum);
			if ($pos1>0){
				$gradestring=substr($medium,$pos1,9);
				$correct=substr($gradestring,3,3);
				$all=substr($gradestring,6,3);
				$correct=$correct+1;
				$all=$all+1;
				$corlen=strlen($correct);
				for ($i=1; $i<=(3-$corlen); $i+=1){$correct="0".$correct;}
				$alllen=strlen($all);
				for ($i=1; $i<=(3-$alllen); $i+=1){$all="0".$all;}
				$newgrade=substr($gradestring,0,3).$correct.$all;
				$newgrades=substr($medium,0,$pos1).$newgrade.substr($medium,($pos1+9));
				mysql_query("UPDATE MPluz_accounts SET Medium = '$newgrades'
				WHERE Cardholder = '$schooler'");}
			else{
				$newgrades=$medium.$tnum."001001";
				mysql_query("UPDATE MPluz_accounts SET Medium = '$newgrades'
				WHERE Cardholder = '$schooler'");}
	}}
	if ($_SESSION['level']=="Hard"){
		if (strlen($hard)<2){
			$newgrades="*".$newtnum."001001";
			mysql_query("UPDATE MPluz_accounts SET Hard = '$newgrades'
			WHERE Cardholder = '$schooler'");}
		else{
			$pos1=strpos($hard,$tnum);
			if ($pos1>0){
				$gradestring=substr($hard,$pos1,9);
				$correct=substr($gradestring,3,3);
				$all=substr($gradestring,6,3);
				$correct=$correct+1;
				$all=$all+1;
				$corlen=strlen($correct);
				for ($i=1; $i<=(3-$corlen); $i+=1){$correct="0".$correct;}
				$alllen=strlen($all);
				for ($i=1; $i<=(3-$alllen); $i+=1){$all="0".$all;}
				$newgrade=substr($gradestring,0,3).$correct.$all;
				$newgrades=substr($hard,0,$pos1).$newgrade.substr($hard,($pos1+9));
				mysql_query("UPDATE MPluz_accounts SET Hard = '$newgrades'
				WHERE Cardholder = '$schooler'");}
			else{
				$newgrades=$hard.$tnum."001001";
				mysql_query("UPDATE MPluz_accounts SET Hard = '$newgrades'
				WHERE Cardholder = '$schooler'");}
	}}
	mysql_close($con);
	
$_SESSION['pageload']="old";}
	$_SESSION['points']=0;	
	}
	
	
else
	{
	echo "Sorry, that is not correct.<br />";
 
	//Update Database
	if ($_SESSION['pageload']!="old"){
	$con = mysql_connect("localhost","xigega65_EE","XigFanims1989");
	if (!$con){die('Could not connect: ' . mysql_error());}
	mysql_select_db("kpluz");
	$schooler=$_COOKIE['KPluzID_my_site'];
    $result = mysql_query("SELECT * FROM MPluz_accounts
 	WHERE Cardholder = '$schooler' ");
	$rec = mysql_fetch_array( $result );
	$easy=$rec['Easy'];
	$medium=$rec['Medium'];
	$hard=$rec['Hard'];	
	
	$newtnum=$tnum;
	if ($_SESSION['level']=="Easy"){
		if (strlen($easy)<2){
			$newgrades="*".$newtnum."000001";
			mysql_query("UPDATE MPluz_accounts SET Easy = '$newgrades'
			WHERE Cardholder = '$schooler'");}
		else{
			$pos1=strpos($easy,$tnum);
			if ($pos1>0){
				$gradestring=substr($easy,$pos1,9);
				$correct=substr($gradestring,3,3);
				$all=substr($gradestring,6,3);
				$correct=$correct;
				$all=$all+1;
				$corlen=strlen($correct);
				for ($i=1; $i<=(3-$corlen); $i+=1){$correct="0".$correct;}
				$alllen=strlen($all);
				for ($i=1; $i<=(3-$alllen); $i+=1){$all="0".$all;}
				$newgrade=substr($gradestring,0,3).$correct.$all;
				$newgrades=substr($easy,0,$pos1).$newgrade.substr($easy,($pos1+9));
				mysql_query("UPDATE MPluz_accounts SET Easy = '$newgrades'
				WHERE Cardholder = '$schooler'");}
			else{
				$newgrades=$easy.$tnum."000001";
				mysql_query("UPDATE MPluz_accounts SET Easy = '$newgrades'
				WHERE Cardholder = '$schooler'");}
	}}
	if ($_SESSION['level']=="Medium"){
		if (strlen($medium)<2){
			$newgrades="*".$newtnum."001001";
			mysql_query("UPDATE MPluz_accounts SET Medium = '$newgrades'
			WHERE Cardholder = '$schooler'");}
		else{
			$pos1=strpos($medium,$tnum);
			if ($pos1>0){
				$gradestring=substr($medium,$pos1,9);
				$correct=substr($gradestring,3,3);
				$all=substr($gradestring,6,3);
				$correct=$correct;
				$all=$all+1;
				$corlen=strlen($correct);
				for ($i=1; $i<=(3-$corlen); $i+=1){$correct="0".$correct;}
				$alllen=strlen($all);
				for ($i=1; $i<=(3-$alllen); $i+=1){$all="0".$all;}
				$newgrade=substr($gradestring,0,3).$correct.$all;
				$newgrades=substr($medium,0,$pos1).$newgrade.substr($medium,($pos1+9));
				mysql_query("UPDATE MPluz_accounts SET Medium = '$newgrades'
				WHERE Cardholder = '$schooler'");}
			else{
				$newgrades=$medium.$tnum."000001";
				mysql_query("UPDATE MPluz_accounts SET Medium = '$newgrades'
				WHERE Cardholder = '$schooler'");}
	}}
	if ($_SESSION['level']=="Hard"){
		if (strlen($hard)<2){
			$newgrades="*".$newtnum."001001";
			mysql_query("UPDATE MPluz_accounts SET Hard = '$newgrades'
			WHERE Cardholder = '$schooler'");}
		else{
			$pos1=strpos($hard,$tnum);
			if ($pos1>0){
				$gradestring=substr($hard,$pos1,9);
				$correct=substr($gradestring,3,3);
				$all=substr($gradestring,6,3);
				$correct=$correct;
				$all=$all+1;
				$corlen=strlen($correct);
				for ($i=1; $i<=(3-$corlen); $i+=1){$correct="0".$correct;}
				$alllen=strlen($all);
				for ($i=1; $i<=(3-$alllen); $i+=1){$all="0".$all;}
				$newgrade=substr($gradestring,0,3).$correct.$all;
				$newgrades=substr($hard,0,$pos1).$newgrade.substr($hard,($pos1+9));
				mysql_query("UPDATE MPluz_accounts SET Hard = '$newgrades'
				WHERE Cardholder = '$schooler'");}
			else{
				$newgrades=$hard.$tnum."000001";
				mysql_query("UPDATE MPluz_accounts SET Hard = '$newgrades'
				WHERE Cardholder = '$schooler'");}
	}}
	mysql_close($con);
	

	
$_SESSION['pageload']="old";}
	$_SESSION['points']=0;	
    }
	
	if (isset($picfile) and !empty($picfile)){
	echo "<table border='0' width='100%' cellspacing='0' cellpadding='0' align='center'><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr><tr><td align='center'>";
	echo "<img border='1' src='$picfile'></td></tr></table>";
	}

	echo "<table width='75%' align='center'><tr><td align='center'>";
	echo "<br/><table border='0' width='370' cellspacing='0' cellpadding='0' align='center'><tr><td>";
	echo "<img border='0' src='../images/qnote7-top.jpg' width='100%'></td></tr><tr>";
	echo "<td background='../images/qnote7-middle.jpg' width='100%' align='center' style='padding-left:30px; padding-right:30px;'>";
	echo "<font face='Comic Sans MS' style='font-size: 16pt; font-weight: 700' color='#333333'>";
	echo $question."<br/><br/>";
	echo "<font face='Comic Sans MS' style='font-size: 16pt; font-weight: 700' color='#800080'>";
	echo "Answer: ";
	echo "<font face='Comic Sans MS' style='font-size: 16pt; font-weight: 700' color='#CC0066'>";
	echo $ans;
	echo "</td></tr>";
	echo "<tr><td ><img border='0' src='../images/qnote7-bottom.jpg'></font></td>";
	echo "</tr></table>";	
	echo "</td></tr><tr><td>&nbsp;</td></tr></table>";
 


//Check Streaks
	//end of Streak Check		

	
}

if ($ansclicked=="" or isset($_POST['Submit2']))
{
$page=substr($_SERVER["PHP_SELF"],1);
if (isset($_SESSION['curpage'])){if ($page != $_SESSION['curpage']){$_SESSION['curpage']=$page; $_SESSION['score']=0;}}
else{$_SESSION['curpage']=$page; $_SESSION['score']=0;}
$_SESSION['pageload']="new";



if(isset($_SESSION['allstr'])){if (strlen($_SESSION['allstr'])<3){$_SESSION['allstr']="*****";}}
else {$_SESSION['allstr']="*****";}

$m=rand(1,12);
$d=rand(1,30);
if ($m==2){$d=rand(1,28);}
$date = $m."/".$d."/2020";

$dt = strtotime($date);
$day = date("l", $dt);

$days=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
$months=array("X","January","February","March","April","May","June","July","August","September","October","November","December");
$month=$months[$m];
$ans=$day;
$choice[0]=$ans;
do{$choice[1]=$days[rand(0,(count($days)-1))];}while($choice[1]==$choice[0]);
do{$choice[2]=$days[rand(0,(count($days)-1))];}while($choice[2]==$choice[1] or $choice[2]==$choice[0]);
do{$choice[3]=$days[rand(0,(count($days)-1))];}while($choice[3]==$choice[2] or $choice[3]==$choice[1] or $choice[3]==$choice[0]);
shuffle($choice);
$fdate = $month." ".$d.", 2020";


$picfile="../images/others/calendar1.jpg";
 
$_SESSION['picfile']=$picfile;
if (isset($picfile) and !empty($picfile)){
	echo "<table border='0' width='100%' cellspacing='0' cellpadding='0' align='center'><tr><td align='center'>";
	echo "<img border='1' src='$picfile'></td></tr><tr><td>&nbsp;</td></tr></table>";
	}

$question="What day was $fdate?";
$_SESSION['answer']=$ans;
$_SESSION['q']=$question;

echo "<P align='center'>";
echo "<font face='Comic Sans MS' style='font-size: 15pt; font-weight: 600' color='#CC0066'>";

echo "<table border='0' width='80%' align='center' cellspacing='0' cellpadding='0' id='table61'>";
echo "<tr><td align='center' valign='center'>";
echo "<table border='0' width='370' cellspacing='0' cellpadding='0' align='center'><tr><td>";
echo "<img border='0' src='../images/qnote7-top.jpg' width='100%'></td></tr><tr>";
echo "<td background='../images/qnote7-middle.jpg' width='100%' align='center' style='padding-left:30px; padding-right:30px;'>";
echo "<font face='Comic Sans MS' style='font-size: 17pt; font-weight: 700' color='#333333'>";
echo $question."<br/>";
echo "</td></tr>";
echo "<tr><td ><img border='0' src='../images/qnote7-bottom.jpg'></font></td>";
echo "</tr></table>";	
echo "<font face='Comic Sans MS' style='font-size: 10pt; font-weight: 600' color='#800080'>";
echo "<br/>";
echo "<font face='Comic Sans MS' style='font-size: 16pt; font-weight: 600' color='#800080'>";
echo "Click on your answer.<br/><br/>";

$wt=200; $ht=50; $bgcolor="DDDDDD";
$lim1=9; $lim2=12; $lim3=15; $lim4=18; $lim5=30;
if (strlen($choice[0])>$lim1 or strlen($choice[1])>$lim1 or strlen($choice[2])>$lim1 or strlen($choice[3])>$lim1){$wt=230;}
if (strlen($choice[0])>$lim2 or strlen($choice[1])>$lim2 or strlen($choice[2])>$lim2 or strlen($choice[3])>$lim2){$wt=270;}
if (strlen($choice[0])>$lim3 or strlen($choice[1])>$lim3 or strlen($choice[2])>$lim3 or strlen($choice[3])>$lim3){$wt=310;}
if (strlen($choice[0])>$lim4 or strlen($choice[1])>$lim4 or strlen($choice[2])>$lim4 or strlen($choice[3])>$lim4){$wt=350;}
if (strlen($choice[0])>$lim5 or strlen($choice[1])>$lim5 or strlen($choice[2])>$lim5 or strlen($choice[3])>$lim5){$wt=460;}
if ($grd==5 and strpos(($ans.$choice[0].$choice[1].$choice[2].$choice[3]),"<sup>")>0){$wt=200;}

$bstyle="border-style: solid; border-width: 1px; padding-left: 0; padding-right: 0; padding-top: 1px; padding-bottom: 1px";
echo "<table align='center'><tr><td bordercolor='#EEEEEE' style='$bstyle' bgcolor='$bgcolor' width='$wt' height='$ht' align='center' width='50%' >";
echo "<a href='calendar.php?ansclick=$choice[0]' style='text-decoration: none'>";
echo "<font face='Comic Sans MS' style='font-size: 16pt; font-weight: 600' color='#0000CC'>";
echo $choice[0]."</a></td></tr><tr><td height='10'></td></tr><tr><td bordercolor='#EEEEEE' style='$bstyle' bgcolor='$bgcolor' width='$wt' height='$ht' align='center' valign='center' >";
echo "<a href='calendar.php?ansclick=$choice[1]' style='text-decoration: none'>";
echo "<font face='Comic Sans MS' style='font-size: 16pt; font-weight: 600' color='#0000CC'>";
echo $choice[1]."</a></td></tr>";
echo "<tr><td height='10'></td></tr><tr><td bordercolor='#EEEEEE' style='$bstyle' bgcolor='$bgcolor' width='$wt' height='$ht' align='center' valign='center' >";
echo "<a href='calendar.php?ansclick=$choice[2]' style='text-decoration: none'>";
echo "<font face='Comic Sans MS' style='font-size: 16pt; font-weight: 600' color='#0000CC'>";
echo $choice[2]."</a></td></tr>";
echo "<tr><td height='10'></td></tr><tr><td bordercolor='#EEEEEE' style='$bstyle' bgcolor='$bgcolor' width='$wt' height='$ht' align='center' valign='center' >";
echo "<a href='calendar.php?ansclick=$choice[3]' style='text-decoration: none'>";
echo "<font face='Comic Sans MS' style='font-size: 16pt; font-weight: 600' color='#0000CC'>";
echo $choice[3]."</a></td></tr>";
echo "</table></td></tr><tr><td>&nbsp;</td></tr>";
echo "</table>";

}
echo "<br/><P align='center'><Input type = 'Submit' Name = 'Submit2' VALUE = 'New Question'>";


echo "</font>";

echo "</font>";


?>
					

												

												
												
												</td>
											</tr>
											<tr>
												<td>
												&nbsp;</td>
											</tr>
											<tr>
												<td>
												&nbsp;</td>
											</tr>
											<tr>
												<td>
												
										
<?php

echo "<table align='center' cellspacing='0' cellpadding='0' ><tr><td align='center' width='114' height='85' background='../images/score-top-2.jpg'></td></tr>";
echo "<tr><td align='center' valign='top' width='114' height='60' background='../images/score-bottom-2.jpg'>";
echo "<font face='Comic Sans MS' style='font-size: 22pt; font-weight: 700' color='#800080'>";
if(isset($_SESSION['score'])){echo $_SESSION['score'];}
echo "</td></tr></table>";
?>						
												
												</td>
											</tr>
											<tr>
												<td>
												&nbsp;</td>
											</tr>
											<tr>
												<td>
												&nbsp;</td>
											</tr>
											<tr>
												<td>
												&nbsp;</td>
											</tr>
											<tr>
												<td>
												<div align="center">
												</div>
												</td>
											</tr>
											</table>
										</div>
										</td>
									</tr>
									<tr>
										<td>
										<img border="0" src="../images/images/test67-bottom.jpg"></td>
									</tr>
								</table>
								</td>
								<td width="108" valign="top" height="34" background="../images/images/test67-right.jpg">
								&nbsp;</td>
							</tr>
						</table>
						</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td bgcolor="#0086CE">
			<p align="center" style="margin-top: 5px; margin-bottom: 5px">
            <font style="font-size: 10pt"><span style="mso-spacerun: yes">
			<font face="Arial" color="#FFFFFF">
            Copyright&nbsp; 2010
        </font><b><font face="Arial" color="#365669">
        	<a href="/home-math.php"><font color="#FFFFFF">KPluz.com</font></a></font></b><font face="Arial" color="#FFFFFF">. All Rights Reserved.</font></span></font></p>
				</td>
			</tr>
			</table>
	</div>
</div>

</body>

</html>