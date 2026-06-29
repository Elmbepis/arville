<?php
if (!isset($_SESSION['pageload'])){$_SESSION['pageload']="new";}
?>

<?php 
require '../../pass-chk.php';
?>

<?php
if(isset($_GET['mfile'])){$mfile=$_GET['mfile']; $_SESSION['mfile']=$mfile;} else{$mfile=$_SESSION['mfile'];}
if (isset($mfile)){$mfile="../../gmrc/modules/".$mfile;}
require($mfile);

$_SESSION['level']="Easy";
?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>
<?php
echo $module." - EnglishPluz.com";
?>
</title>
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
				<a href="/home-gmrc.php">
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
						<img border="0" src="../images/shs-top.jpg" width="800" height="41"></td>
					</tr>
					<tr>
						<td background="../images/shs-title.jpg" height="56" width="800" align="center">
						
						
			
						
						
						
						
						<p style="margin-top: -5px; margin-bottom: 0">
						<span style="font-weight: 700">
						<font face="Verdana" style="font-size: 15pt" color="#B9005C">
						<?php
						echo $_SESSION['title'];
						?>
						</font></span></td>
					</tr>
					<tr>
						<td>
						<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table33">
							<tr>
								<td width="90" valign="top" height="34" background="../images/shs-left.jpg">
								&nbsp;</td>
								<td valign="top">
								<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table34">
									<tr>
										<td background="../images/shs-spacer.jpg" valign="top" width="620">
										<div align="center">
										<table border="0" width="760" cellspacing="0" cellpadding="0" id="table37">
											<tr>
												<td>
												
												
												
												</td>
											</tr>
											<tr>
												<td>
												<p align="center">&nbsp;
												
												
												
												
												
												
<?php
$red="<font face='Arial' style='font-size: 14pt; font-weight: 700' color='#CC0066'>";
$vio="<font face='Arial' style='font-size: 14pt; font-weight: 700' color='#800080'>";
$gray="<font face='Arial' style='font-size: 14pt; font-weight: 500' color='#444444'>";
$qvio="<font face='Arial' style='font-size: 17pt; font-weight: 600' color='#800080'>";
$qred="<font face='Arial' style='font-size: 17pt; font-weight: 600' color='#CC0066'>";
$qvio2="<font face='Arial' style='font-size: 16pt; font-weight: 600' color='#800080'>";
$qred2="<font face='Arial' style='font-size: 16pt; font-weight: 600' color='#CC0066'>";
  
echo "<FORM name ='form1' method ='post' action ='q-display.php'>";

if (isset($_SESSION['tnum'])){$tnum=$_SESSION['tnum'];}
	
if(isset($_GET['ansclick'])){$ansclicked=$_GET['ansclick'];} 
else{$ansclicked="";} 

if ($ansclicked!="" and empty($_POST['Submit2']))
{
	
	if (isset($_SESSION['answer'])){$ans=$_SESSION['answer'];}
	if (isset($_SESSION['question'])){$question=$_SESSION['question'];}
	if (isset($_SESSION['pic'])){$pic=$_SESSION['pic'];}
	if (isset($_SESSION['subject'])){$subject=$_SESSION['subject'];}
	if (isset($_SESSION['module'])){$module=$_SESSION['module'];}
	if (isset($_SESSION['mfile'])){$mfile=$_SESSION['mfile'];}

	echo "<p align='center' style='margin-left: 25px; margin-right: 25px'>";
	echo "<font face='Arial' style='font-size: 14pt; font-weight: 700' color='#800080'>";
	
	echo "<table border='0' width='466' cellspacing='0' cellpadding='0' align='center'><tr><td>&nbsp;</td></tr><tr>";
	echo "<td width='100%' align='center' style='padding-top:15px; padding-bottom:23px; padding-left:38px; padding-right:38px;'>";
	echo "<font face='Arial' style='font-size: 14pt; font-weight: 700' color='#330033'>";
	echo "Ang sagot mo ay ";
	if (strlen($ansclicked)>25){echo "<br/>";}
	echo "<font face='Arial' style='font-size: 14pt; font-weight: 700' color='#0000BB'>";
	echo "'".$ansclicked."'";
	echo "<font face='Arial' style='font-size: 14pt; font-weight: 700' color='#800080'>";
	echo ".<br />";
	echo "</td></tr></table>";	

	if ($ans==$ansclicked)
	{
	echo "<font face='Arial' style='font-size: 16pt; font-weight: 700' color='#CC0066'>";
	echo "Ito ay tumpak!<br />";
	 
	if ($_SESSION['pageload']!="old"){$_SESSION['score']=	$_SESSION['score']+1;}	
	
	//Update Database
	if ($_SESSION['pageload']!="old"){
	$con = mysql_connect("localhost","xigega65_EE","XigFanims1989");
	if (!$con){die('Could not connect: ' . mysql_error());}
	mysql_select_db("kpluz");
	$schooler=$_COOKIE['KPluzID_my_site'];
    $result = mysql_query("SELECT * FROM GPluz_accounts
 	WHERE Cardholder = '$schooler' ");
	$rec = mysql_fetch_array( $result );
	$easy=$rec['Easy'];
	$medium=$rec['Medium'];
	$hard=$rec['Hard'];
	
	$newtnum=$tnum;
	if ($_SESSION['level']=="Easy"){
		if (strlen($easy)<2){
			$newgrades="*".$newtnum."001001";
			mysql_query("UPDATE GPluz_accounts SET Easy = '$newgrades'
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
				mysql_query("UPDATE GPluz_accounts SET Easy = '$newgrades'
				WHERE Cardholder = '$schooler'");}
			else{
				$newgrades=$easy.$tnum."001001";
				mysql_query("UPDATE GPluz_accounts SET Easy = '$newgrades'
				WHERE Cardholder = '$schooler'");}
	}}
	if ($_SESSION['level']=="Medium"){
		if (strlen($medium)<2){
			$newgrades="*".$newtnum."001001";
			mysql_query("UPDATE GPluz_accounts SET Medium = '$newgrades'
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
				mysql_query("UPDATE GPluz_accounts SET Medium = '$newgrades'
				WHERE Cardholder = '$schooler'");}
			else{
				$newgrades=$medium.$tnum."001001";
				mysql_query("UPDATE GPluz_accounts SET Medium = '$newgrades'
				WHERE Cardholder = '$schooler'");}
	}}
	if ($_SESSION['level']=="Hard"){
		if (strlen($hard)<2){
			$newgrades="*".$newtnum."001001";
			mysql_query("UPDATE GPluz_accounts SET Hard = '$newgrades'
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
				mysql_query("UPDATE GPluz_accounts SET Hard = '$newgrades'
				WHERE Cardholder = '$schooler'");}
			else{
				$newgrades=$hard.$tnum."001001";
				mysql_query("UPDATE GPluz_accounts SET Hard = '$newgrades'
				WHERE Cardholder = '$schooler'");}
	}}
	mysql_close($con);
	
$_SESSION['pageload']="old";}
	$_SESSION['points']=0;	
	}
	
	else
	{

	echo "Ito ay hindi tumpak.<br />";
 
	//Update Database
	if ($_SESSION['pageload']!="old"){
	$con = mysql_connect("localhost","xigega65_EE","XigFanims1989");
	if (!$con){die('Could not connect: ' . mysql_error());}
	mysql_select_db("kpluz");
	$schooler=$_COOKIE['KPluzID_my_site'];
    $result = mysql_query("SELECT * FROM GPluz_accounts
 	WHERE Cardholder = '$schooler' ");
	$rec = mysql_fetch_array( $result );
	$easy=$rec['Easy'];
	$medium=$rec['Medium'];
	$hard=$rec['Hard'];	
	
	$newtnum=$tnum;
	if ($_SESSION['level']=="Easy"){
		if (strlen($easy)<2){
			$newgrades="*".$newtnum."000001";
			mysql_query("UPDATE GPluz_accounts SET Easy = '$newgrades'
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
				mysql_query("UPDATE GPluz_accounts SET Easy = '$newgrades'
				WHERE Cardholder = '$schooler'");}
			else{
				$newgrades=$easy.$tnum."000001";
				mysql_query("UPDATE GPluz_accounts SET Easy = '$newgrades'
				WHERE Cardholder = '$schooler'");}
	}}
	if ($_SESSION['level']=="Medium"){
		if (strlen($medium)<2){
			$newgrades="*".$newtnum."001001";
			mysql_query("UPDATE GPluz_accounts SET Medium = '$newgrades'
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
				mysql_query("UPDATE GPluz_accounts SET Medium = '$newgrades'
				WHERE Cardholder = '$schooler'");}
			else{
				$newgrades=$medium.$tnum."000001";
				mysql_query("UPDATE GPluz_accounts SET Medium = '$newgrades'
				WHERE Cardholder = '$schooler'");}
	}}
	if ($_SESSION['level']=="Hard"){
		if (strlen($hard)<2){
			$newgrades="*".$newtnum."001001";
			mysql_query("UPDATE GPluz_accounts SET Hard = '$newgrades'
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
				mysql_query("UPDATE GPluz_accounts SET Hard = '$newgrades'
				WHERE Cardholder = '$schooler'");}
			else{
				$newgrades=$hard.$tnum."000001";
				mysql_query("UPDATE GPluz_accounts SET Hard = '$newgrades'
				WHERE Cardholder = '$schooler'");}
	}}
	mysql_close($con);
	

	
$_SESSION['pageload']="old";}
	$_SESSION['points']=0;	
    }

	if (isset($pic) and $pic!=""){
	echo "<br/><br/><table border='0' width='90%' align='center' cellspacing='0' cellpadding='0' id='table61'>";
	echo "<tr><td align='center' valign='center'>";
	echo "<br/><img border='1' src='$pic' align='center' style='margin-bottom:35px;'>";
	echo "</td></tr>";
	echo "</table>";
	}

	echo "<table border='0' width='466' cellspacing='0' cellpadding='0' align='center'><tr><td>&nbsp;</td></tr><tr>";
	echo "<td width='100%' align='center' style='padding-top:15px; padding-bottom:23px; padding-left:38px; padding-right:38px;'>";
	echo "<font face='Arial' style='font-size: 15pt; font-weight: 700' color='#330033'>";
	echo "Tanong:<br/>".$question."<br/><br/>";
	echo "<font face='Arial' style='font-size: 15pt; font-weight: 700' color='#CC0066'>";
	echo "Sagot: ";
	if (strlen($ans)>25){echo "<br/>";}
	echo $ans;
	echo "</td></tr></table>";	
				
}


if ($ansclicked=="" or isset($_POST['Submit2']))
{
$page=substr($_SERVER["PHP_SELF"],1);
if (isset($_SESSION['curpage'])){if ($page != $_SESSION['curpage']){$_SESSION['curpage']=$page; $_SESSION['score']=0;}}
else{$_SESSION['curpage']=$page; $_SESSION['score']=0;}
$_SESSION['pageload']="new";

if (!isset($_SESSION['allstr'])){$_SESSION['allstr']="***********";}	
do	{	
	$qarray=$questions;
	$count=count($qarray)-1;
	$qnum=rand(0,$count);
	$sarrnum=$grd;
	$sqnum=$qnum;
	if (strlen($grd)<2){$sarrnum="0".$grd;}
	if (strlen($qnum)<2){$sqnum="0".$qnum;}
	$qstr0=$sarrnum."-".(substr($tnum,1,2))."-".$sqnum;
	}
while ((strpos($_SESSION['allstr'],$qstr0)>0));
$_SESSION['allstr']=$_SESSION['allstr']."*".$qstr0;
//echo $_SESSION['allstr'];
$strlim=($count-1)*9;
if (strlen($_SESSION['allstr'])>$strlim){$_SESSION['allstr']=substr($_SESSION['allstr'],(-1*$strlim));}	
$qstring=$qarray[$qnum];
//echo $_SESSION['allstr'];

$picfile="";
if (strpos($qstring,".jpg")>0){
	$picpos1=strpos($qstring,"**");
	$picpos2=strpos($qstring,".jpg");
	$picfile=substr($qstring,($picpos1+2),($picpos2-$picpos1-2));
	$picfile="qimages/".$picfile.".jpg";
	}	
 
$pos1=strpos($qstring,"=");
$pos2=strpos($qstring,">");
$pos3=strpos($qstring,"+");
$pos4=strpos($qstring,"<");
$pos5=strpos($qstring,"**");
$ch[0]=substr($qstring,($pos1+1),($pos2-$pos1-1));
$ans=$ch[0];
$ch[1]=substr($qstring,($pos2+1),($pos3-$pos2-1));
$ch[2]=substr($qstring,($pos3+1),($pos4-$pos3-1));
$ch[3]=substr($qstring,($pos4+1));
if ($pos5>2){$ch[3]=substr($qstring,($pos4+1),($pos5-$pos4-1));}
$newquestion=substr($qstring,0,$pos1);
shuffle($ch);

$_SESSION['answer']=$ans;
$_SESSION['question']=$newquestion;
$_SESSION['pic']=$picfile;

echo "<P align='center'>";

if (isset($picfile) and $picfile!=""){
	echo "<table border='0' width='90%' align='center' cellspacing='0' cellpadding='0' id='table61'>";
	echo "<tr><td align='center' valign='center'>";
	echo "<br/><img border='1' src='$picfile' align='center' style='margin-bottom:35px;'>";
	echo "</td></tr>";
	echo "</table>";
	}

echo "<table border='0' width='90%' align='center' cellspacing='0' cellpadding='0' id='table61'>";
echo "<tr><td align='center' valign='center'>";

$qstyle="padding-left: 35; padding-right: 35; padding-top: 35px; padding-bottom: 40px";

echo "<br/><table align='center' bgcolor='#fdeeef' bordercolor='#fba0a5'><tr><td style='$qstyle' width='350' height='50' align='center'>";
echo $qvio.$newquestion;
echo "</td></tr></table>";	
echo "</td></tr>";

echo "<tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>";
echo "<tr><td align='center' valign='center'>";
echo "<font face='Arial' style='font-size: 16pt; font-weight: 600' color='#444444'>";
echo "Click on your answer below.<br/><br/><br/>";
$blankimg="../images/question-paper-1.jpg";

$wt=300; $ht=50; $bgcolor="DDDDDD";
$bstyle="border-style: solid; border-width: 1px; padding-left: 25; padding-right: 25; padding-top: 25px; padding-bottom: 25px";
$lim1=18; $lim2=22; $lim3=26; $lim4=30;
if (strlen($ch[0])>$lim1 or strlen($ch[1])>$lim1 or strlen($ch[2])>$lim1 or strlen($ch[3])>$lim1){$wt=350;}
if (strlen($ch[0])>$lim2 or strlen($ch[1])>$lim2 or strlen($ch[2])>$lim2 or strlen($ch[3])>$lim2){$wt=395;}
if (strlen($ch[0])>$lim3 or strlen($ch[1])>$lim3 or strlen($ch[2])>$lim3 or strlen($ch[3])>$lim3){$wt=440;}
if (strlen($ch[0])>$lim4 or strlen($ch[1])>$lim4 or strlen($ch[2])>$lim4 or strlen($ch[3])>$lim4){$wt=485;}
echo "<table align='center'><tr><td bordercolor='#EEEEEE' style='$bstyle' bgcolor='$bgcolor' width='$wt' height='$ht' align='center' width='50%' >";
echo "<a href='q-display.php?ansclick=$ch[0]' style='text-decoration: none'>";
echo "<font face='Arial' style='font-size: 16pt; font-weight: 500' color='#0000CC'>";
echo $ch[0]."</a></td></tr><tr><td height='10'></td></tr><tr><td bordercolor='#EEEEEE' style='$bstyle' bgcolor='$bgcolor' width='$wt' height='$ht' align='center' valign='center' >";
echo "<a href='q-display.php?ansclick=$ch[1]' style='text-decoration: none'>";
echo "<font face='Arial' style='font-size: 16pt; font-weight: 500' color='#0000CC'>";
echo $ch[1]."</a></td></tr>";
echo "<tr><td height='10'></td></tr><tr><td bordercolor='#EEEEEE' style='$bstyle' bgcolor='$bgcolor' width='$wt' height='$ht' align='center' valign='center' >";
echo "<a href='q-display.php?ansclick=$ch[2]' style='text-decoration: none'>";
echo "<font face='Arial' style='font-size: 16pt; font-weight: 500' color='#0000CC'>";
echo $ch[2]."</a></td></tr>";
echo "<tr><td height='10'></td></tr><tr><td bordercolor='#EEEEEE' style='$bstyle' bgcolor='$bgcolor' width='$wt' height='$ht' align='center' valign='center' >";
echo "<a href='q-display.php?ansclick=$ch[3]' style='text-decoration: none'>";
echo "<font face='Arial' style='font-size: 16pt; font-weight: 500' color='#0000CC'>";
echo $ch[3]."</a></td></tr>";
echo "</table></td></tr><tr><td>&nbsp;</td></tr>";
echo "</table><br/>";
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
echo "<table align='center' cellspacing='0' cellpadding='0' ><tr><td align='center' width='114' height='85' background='../images/score-top-wbg.jpg'></td></tr>";
echo "<tr><td align='center' valign='top' width='114' height='60' background='../images/score-bottom-wbg.jpg'>";
echo "<font face='Arial' style='font-size: 22pt; font-weight: 700' color='#800080'>";
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
										<img border="0" src="../images/shs-bottom.jpg" width="760" height="81"></td>
									</tr>
								</table>
								</td>
								<td width="90" valign="top" height="34" background="../images/shs-right.jpg">
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
        	<a href="/home-araling-panlipunan.php"><font color="#FFFFFF">KPluz.com</font></a></font></b><font face="Arial" color="#FFFFFF">. All Rights Reserved.</font></span></font></p>
				</td>
			</tr>
			</table>
	</div>
</div>

</body>

</html>