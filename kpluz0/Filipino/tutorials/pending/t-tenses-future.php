<?php 
//Checks if there is a login cookie
if(isset($_COOKIE['KPluzID_my_site']) and isset($_COOKIE['KPluzKey_my_site']) )
//if there is a cookie, require a log-in if the password is invalid
{ 
	$username = $_COOKIE['KPluzID_my_site']; 
	$pass = $_COOKIE['KPluzKey_my_site'];
 	$kpluzbase = 9876+ord(substr($username,0,1))*ord(substr($username,2,1))*318+ord(substr($username,1,1))*ord(substr($username,3,1))*1113+substr($username,4,1)*substr($username,5,1)*825+substr($username,6,1)*substr($username,7,1)*115+ord(substr($username,0,1))*substr($username,6,1)*712+substr($username,7,1)*substr($username,7,1)*16*1989;
	$validpass0=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1234+234;
	$validpass1=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1345+345;
	$validpass2=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1456+456;
	$validpass3=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1567+567;
	$validpass4=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1678+678;
	$validpass5=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1789+789;
	$validpass6=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2123+987;
	$validpass7=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2234+876;
	$validpass8=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2345+765;
	$validpass9=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2456+654;
	$validpass10=$kpluzbase+ord(substr($username,0,1))*ord(substr($username,4,1))*(substr($username,5,1)+1)*2567+543;
	
	if ($pass==$validpass0){$grd=0;}			
	if ($pass==$validpass1){$grd=1;}			
	if ($pass==$validpass2){$grd=2;}			
	if ($pass==$validpass3){$grd=3;}			
	if ($pass==$validpass4){$grd=4;}			
	if ($pass==$validpass5){$grd=5;}			
	if ($pass==$validpass6){$grd=6;}			
	if ($pass==$validpass7){$grd=7;}			
	if ($pass==$validpass8){$grd=8;}			
	if ($pass==$validpass9){$grd=9;}			
	if ($pass==$validpass10){$grd=10;}			
	
	if (
		$pass != $validpass0 and $pass != $validpass1 and $pass != $validpass2 and $pass != $validpass3 and $pass != $validpass4 and $pass != $validpass5 
		and $pass != $validpass6 and $pass != $validpass7 and $pass != $validpass8 and $pass != $validpass9 and $pass != $validpass10
		) 
		
	{
	header("Location: /logout.php"); 
	}
	
	
}
//if there is no cookie, require a log-in
else
	{
	header("Location: /login.php"); 
	}
session_start();
if ($_SESSION['level']=="")
{$_SESSION['level']="Easy";}
?>




<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Forms of the Future Tense - Filipino sa KPluz.com</title>
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

<body bgcolor="#333333" background="../../bg-home.jpg" onload="FP_preloadImgs(/*url*/'button5.jpg',/*url*/'button6.jpg',/*url*/'../images/tutorial-bottomd.jpg',/*url*/'images/backb.jpg',/*url*/'../images/3c.jpg',/*url*/'../images/3b.jpg',/*url*/'../images/4c.jpg',/*url*/'../images/4b.jpg',/*url*/'../images/5c.jpg',/*url*/'../images/5b.jpg',/*url*/'../images/6c.jpg',/*url*/'../images/6b.jpg',/*url*/'../images/inner-logout-2c.jpg',/*url*/'../images/inner-logout-2b.jpg')">

<div align="center">
	<div align="center">
		<table border="0" width="800" cellspacing="0" cellpadding="0" id="table7">
			<tr>
				<td>
								<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table112">
					<tr>
						<td width="263" valign="top">
						<img border="0" src="../../images/1.jpg"></td>
						<td>
						<img border="0" src="../../images/2.jpg"><table border="0" width="100%" cellspacing="0" cellpadding="0" id="table113">
									<tr>
										<td width="145">
										<a href="/home-filipino.php">
										<img border="0" id="img1" src="../../images/3a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/3b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/3a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/3c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/3b.jpg')"></a></td>
										<td width="140">
										<a href="/what-is-kpluz.php">
										<img border="0" id="img2" src="../../images/4a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/4b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/4a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/4c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/4b.jpg')"></a></td>
										<td width="139">
										<a href="/join-kpluz.php">
										<img border="0" id="img3" src="../../images/5a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/5b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/5a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/5c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/5b.jpg')"></a></td>
										<td>
										<a href="/contact.php">
										<img border="0" id="img4" src="../../images/6a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img4',/*url*/'../../images/6b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img4',/*url*/'../../images/6a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img4',/*url*/'../../images/6c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img4',/*url*/'../../images/6b.jpg')"></a></td>
									</tr>
								</table>
						</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td valign="top">
			<img border="0" src="../images/7.jpg" width="800" height="16"></td>
			</tr>
			<tr>
				<td>
				<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table61">
					<tr>
						<td width="264" valign="top" background="../images/inner-left-spacer.jpg">
			<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table90">
				<tr>
					<td>
					<img border="0" src="../images/inner-left-top-2.jpg" width="264" height="47"></td>
				</tr>
				<tr>
					<td>
					<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table91">
						<tr>
							<td width="67">
							<img border="0" src="../images/inner-logout-left-2.jpg" width="67" height="40"></td>
							<td width="143">
							<a href="/logout.php">
							<img border="0" id="img5" src="../images/inner-logout-2a.jpg" height="40" width="143" alt="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img5',/*url*/'../images/inner-logout-2b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img5',/*url*/'../images/inner-logout-2a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img5',/*url*/'../images/inner-logout-2c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img5',/*url*/'../images/inner-logout-2b.jpg')" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text"></a></td>
							<td>
							<img border="0" src="../images/inner-logout-right-2.jpg" width="54" height="40"></td>
						</tr>
					</table>
					</td>
				</tr>
				<tr>
					<td background="../images/inner-logout-bottom-2.jpg" height="83">
					&nbsp;</td>
				</tr>
				</table>
						</td>
						<td valign="top" background="../images/inner-right-spacer.jpg">
						<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table64">
				<tr>
<?php	
			if ($grd<7){
				echo "<td background='../images/inner-main.jpg' height='170'>&nbsp;</td>";
				}
			else{
				echo "<td background='../images/high-header.jpg' height='170'>&nbsp;</td>";
				}
?>				
				</tr>
				</table>
						</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td>
				<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table32">
					<tr>
						<td>
						<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table51">
							<tr>
								<td height="82" valign="bottom">
								<img border="0" src="images/tutorial-top.jpg"></td>
							</tr>
							<tr>
								<td valign="bottom" background="tutorial-content.jpg">
								<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table110">
									<tr>
										<td height="64" valign="bottom" background="images/tutorial-title.jpg">
										<p align="center" style="margin-left: 120px; margin-right: 100px; margin-top: 50px; margin-bottom: 0">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 22pt" color="#990000">
										Forms of the
										Future Tense</font></span></td>
									</tr>
									<tr>
										<td valign="top" background="images/tutorial-content.jpg">
										<div align="center">
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp; &nbsp;&nbsp;
											</font></p>
<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</font></p>
																							<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0"><font face="Comic Sans MS"><span style="font-size: 13pt;"><font color="#333333">The future tense expresses an action in the future.&nbsp; Like the past and present tenses, it has four forms: </font><font color="#990000">simple</font><font color="#333333">, </font><font color="#990000">progressive</font><font color="#333333"> (or continuous),</font><font color="#990000"> perfect</font><font color="#333333">, </font><font color="#990000">perfect progressive</font><font color="#333333"> (or perfect continuous)</font></span></font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;
											</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
											<font face="Comic Sans MS">
											<span style="font-size: 13pt;">
											<font color="#0000CC">1. </font><a href="http://www.englishleap.com/grammar/simple-past-tense">
											<span style="text-decoration: none">
											<font color="#0000CC">SIMPLE FUTURE TENSE</font></span></a></span></font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
											<font face="Comic Sans MS" color="#333333">
											<span style="font-size: 13pt">&nbsp;
											</span></font></p>
																							<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0"><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">The simple future tense&nbsp; is used to express an action that will happen in the future.&nbsp; It is formed by combining 'will' with the basic form of the verb.&nbsp; </font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;
											</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
											One may also combine 'am going to', 
											'is going to', or 'are going to' 
											(whichever is applicable) with the 
											'-ing' form (present participle) of 
											the verb, especially if it refers to 
											an action that is either already 
											planned or predicted based on 
											available information.</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp; &nbsp;
																	</font></p>
											<table border="0" width="370" cellspacing="0" cellpadding="0">
												<tr>
													<td>
													<font face="Comic Sans MS" style="font-size: 13pt">
													<img border="0" src="images/note-top.jpg" width="370" height="44"></font></td>
												</tr>
												<tr>
													<td background="images/note-middle.jpg" width="370">
											<p style="margin-left: 55px; margin-right: 50px; margin-top: 0; margin-bottom: 0" align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	I </font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	will help</font><font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	the kids 
																	build their 
																	treehouse.</font></p>
													</td>
												</tr>
												<tr>
													<td >
<font face="Comic Sans MS" style="font-size: 13pt">
<img border="0" src="images/note-bottom.jpg"></font></td>
												</tr>
												</table>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	In the 
																	sentence 
																	above, the 
																	verb </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	'will help'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	is in simple 
																	future 
																	tense 
																	because it 
																	refers to an 
																	action that 
																	the subject 
																	intends to 
																	do in the 
																	future.</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp; &nbsp;
																	</font></p>
											<table border="0" width="370" cellspacing="0" cellpadding="0">
												<tr>
													<td>
													<font face="Comic Sans MS" style="font-size: 13pt">
													<img border="0" src="images/note-top.jpg" width="370" height="44"></font></td>
												</tr>
												<tr>
													<td background="images/note-middle.jpg" width="370">
											<p style="margin-left: 55px; margin-right: 50px; margin-top: 0; margin-bottom: 0" align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	We </font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	are going to 
																	buy</font><font face="Comic Sans MS" style="font-size: 14pt" color="#000080"> 
																	a new car 
																	tomorrow.</font></p>
													</td>
												</tr>
												<tr>
													<td >
<font face="Comic Sans MS" style="font-size: 13pt">
<img border="0" src="images/note-bottom.jpg"></font></td>
												</tr>
												</table>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	In the 
																	sentence 
																	above, the 
																	verb </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	'are going 
																	to buy'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	is in simple 
																	future 
																	tense 
																	because it 
																	refers to an 
																	action that 
																	has already 
																	been planned 
																	before.</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp; &nbsp;
																	</font></p>
											<table border="0" width="370" cellspacing="0" cellpadding="0">
												<tr>
													<td>
													<font face="Comic Sans MS" style="font-size: 13pt">
													<img border="0" src="images/note-top.jpg" width="370" height="44"></font></td>
												</tr>
												<tr>
													<td background="images/note-middle.jpg" width="370">
											<p style="margin-left: 55px; margin-right: 50px; margin-top: 0; margin-bottom: 0" align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	With their 
																	great 
																	teamwork, 
																	they </font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	are going to 
																	win</font><font face="Comic Sans MS" style="font-size: 14pt" color="#000080"> 
																	tonight.</font></p>
													</td>
												</tr>
												<tr>
													<td >
<font face="Comic Sans MS" style="font-size: 13pt">
<img border="0" src="images/note-bottom.jpg"></font></td>
												</tr>
												</table>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	In the 
																	sentence 
																	above, the 
																	verb </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	'are going 
																	to win'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	is in simple 
																	future 
																	tense 
																	because it 
																	refers to an 
																	action that 
																	is predicted 
																	based on 
																	available 
																	information.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp; 
																	</font> </p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	'Simple 
																	Future 
																	Tense' Verbs:</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	&quot;will 
																	ask&quot;, 
																	&quot;will 
																	bring&quot;, 
																	&quot;will 
																	cure&quot;, 
																	&quot;will 
																	drop&quot;, 
																	&quot;will 
																	earn&quot;, 
																	&quot;will 
																	fix&quot;, 
																	&quot;will go&quot;, 
																	&quot;will 
																	hire&quot;, 
																	&quot;will 
																	look&quot;, 
																	&quot;will mix&quot;, 
																	&quot;will 
																	plan&quot;, 
																	&quot;will raise&quot;, 
																	&quot;will 
																	shine&quot;, 
																	&quot;will test&quot;, 
																	&quot;will use&quot;, 
																	&quot;will 
																	win&quot; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp; 
																	</font> </p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	Sentences 
																	with 'Simple 
																	Future 
																	Tense' Verbs:</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	1. Luke
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	will ask</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	for more 
																	donations.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	2. Grace
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	will clean</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333"> 
																	the house.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	3. Those 
																	singers
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	will perform </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	for the 
																	benefit of 
																	that 
																	orphanage.</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
																	</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
																	</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
											<font face="Comic Sans MS">
											<span style="font-size: 13pt;">
											<font color="#0000CC">2. </font>
											<a href="http://www.englishleap.com/grammar/simple-past-tense">
											<font color="#0000CC">
											<span style="text-decoration: none">
											FUTURE PROGRESSIVE TENSE</span></font></a></span></font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
											<font face="Comic Sans MS" color="#333333">
											<span style="font-size: 13pt">&nbsp;
											</span></font></p>
																							<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0"><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">The future progressive tense is used to express a continuing action that will be happening in the future.&nbsp; It is formed by combining 'will be' with the '-ing' form (present participle) of the verb.</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;
																	</font></p>
											<table border="0" width="370" cellspacing="0" cellpadding="0">
												<tr>
													<td>
													<font face="Comic Sans MS" style="font-size: 13pt">
													<img border="0" src="images/note-top.jpg" width="370" height="44"></font></td>
												</tr>
												<tr>
													<td background="images/note-middle.jpg" width="370">
											<p style="margin-left: 55px; margin-right: 50px; margin-top: 0; margin-bottom: 0" align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	Jason
																	</font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	will be 
																	hosting </font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	the party 
																	tonight.</font></p>
													</td>
												</tr>
												<tr>
													<td >
<font face="Comic Sans MS" style="font-size: 13pt">
<img border="0" src="images/note-bottom.jpg"></font></td>
												</tr>
												</table>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	In the 
																	sentence 
																	above, the 
																	verb </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	'will be 
																	hosting'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	is in 
																	future 
																	progressive 
																	tense 
																	because it 
																	refers to an 
																	action that 
																	will be 
																	ongoing 
																	during a 
																	certain 
																	period in 
																	the future.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp; 
																	</font> </p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	'Future 
																	Progressive 
																	Tense' Verbs:</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	&quot;will 
																	be eating&quot;, 
																	&quot;will 
																	be cooking&quot;, 
																	&quot;will 
																	be doing&quot;, 
																	&quot;will 
																	be feeding&quot;, 
																	&quot;will 
																	be 
																	building&quot;,
																	&quot;will 
																	be 
																	exercising&quot;, 
																	&quot;will 
																	be 
																	reading&quot;, 
																	&quot;will 
																	be trying&quot;, 
																	&quot;will 
																	be waiting&quot; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp; 
																	</font> </p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	Sentences 
																	with 
																	'Future 
																	Progressive 
																	Tense' Verbs:</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	1. Kyle
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	will be 
																	talking</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333"> 
																	to his 
																	people this 
																	evening.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	2. Maria
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	will be showing</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333"> 
																	her products 
																	to investors 
																	tomorrow.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	3. Policemen
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	will be 
																	guarding</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333"> 
																	the entrance 
																	of the 
																	building 
																	tonight.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	4. I </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	will be 
																	fishing</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333"> 
																	in the lake 
																	this 
																	afternoon.</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
																	</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
																	</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
											<font face="Comic Sans MS">
											<span style="font-size: 13pt;">
											<font color="#0000CC">3. </font>
											<a href="http://www.englishleap.com/grammar/simple-past-tense">
											<font color="#0000CC">
											<span style="text-decoration: none">
											FUTURE PERFECT TENSE</span></font></a></span></font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
											<font face="Comic Sans MS" color="#333333">
											<span style="font-size: 13pt">&nbsp;
											</span></font></p>
																							<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0"><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">The future perfect tense&nbsp; is used to express an action that will have been completed or finished by a certain time in the future or before another action will have been completed.&nbsp; It is formed by combining 'will have' (whichever is applicable) with the past participle of the verb. </font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;
																	</font></p>
											<table border="0" width="370" cellspacing="0" cellpadding="0">
												<tr>
													<td>
													<font face="Comic Sans MS" style="font-size: 13pt">
													<img border="0" src="images/note-top.jpg" width="370" height="44"></font></td>
												</tr>
												<tr>
													<td background="images/note-middle.jpg" width="370">
											<p style="margin:0 30px; " align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	Dorothy
																	</font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	will
																	have 
																	accepted</font><font face="Comic Sans MS" style="font-size: 14pt" color="#000080"> 
																	the job 
																	offer by 
																	Wednesday 
																	next week.</font></p>
													</td>
												</tr>
												<tr>
													<td >
<font face="Comic Sans MS" style="font-size: 13pt">
<img border="0" src="images/note-bottom.jpg"></font></td>
												</tr>
												</table>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	In the 
																	sentence 
																	above, the 
																	verb </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	'will have 
																	accepted'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	is in 
																	future 
																	perfect 
																	tense 
																	because it 
																	refers to an 
																	action that 
																	will be done 
																	sometime 
																	before the 
																	Wednesday of 
																	the 
																	following 
																	week 
																	arrives.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	&nbsp;&nbsp;
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp; 
																	</font> </p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	'Future 
																	Perfect 
																	Tense' Verbs:</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	&quot;will 
																	have 
																	bought&quot;, 
																	&quot;will 
																	have 
																	ceased&quot;, 
																	&quot;will 
																	have lived&quot;, 
																	&quot;will 
																	have 
																	learned&quot;, 
																	&quot;will 
																	have seen&quot;, 
																	&quot;will 
																	have thrown&quot;, 
																	&quot;will have read&quot;, 
																	&quot;will 
																	have begun&quot;, 
																	&quot;has 
																	become&quot;, 
																	&quot;have begun 
																	&quot; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp; 
																	</font> </p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	Sentences 
																	with 
																	'Future 
																	Perfect 
																	Tense' Verbs:</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	1. You </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	will have 
																	received</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	the package 
																	by the end 
																	of this 
																	month.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	2. Mr. 
																	Smith </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	will have 
																	reviewed</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	that report 
																	before you 
																	get it back.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	3. I </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	will have 
																	enrolled</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	already by 
																	the time you 
																	arrive here.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	4. The 
																	seller
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	will have 
																	delivered</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333"> 
																	the product 
																	when the 
																	need for it 
																	arises.</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
																	</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
																	</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
											<font face="Comic Sans MS">
											<span style="font-size: 13pt;">
											<font color="#0000CC">4. </font>
											<a href="http://www.englishleap.com/grammar/simple-past-tense">
											<font color="#0000CC">
											<span style="text-decoration: none">
											FUTURE PERFECT PROGRESSIVE TENSE</span></font></a></span></font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
											<font face="Comic Sans MS" color="#333333">
											<span style="font-size: 13pt">&nbsp;
											</span></font></p>
																							<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0"><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">The future perfect progressive tense&nbsp; is used to express a continuing action in the future that will have been going on for quite some time already.&nbsp; It is formed by combining 'will have been'&nbsp; with the '-ing' form (present participle) of the verb.</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;
																	</font></p>
											<table border="0" width="370" cellspacing="0" cellpadding="0">
												<tr>
													<td>
													<font face="Comic Sans MS" style="font-size: 13pt">
													<img border="0" src="images/note-top.jpg" width="370" height="44"></font></td>
												</tr>
												<tr>
													<td background="images/note-middle.jpg" width="370">
											<p style="margin:0 30px; " align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	By next 
																	month, Jojo
																	</font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	will have been 
																	practicing</font><font face="Comic Sans MS" style="font-size: 14pt" color="#000080"> 
																	karate for 
																	10 years 
																	already.</font></p>
													</td>
												</tr>
												<tr>
													<td >
<font face="Comic Sans MS" style="font-size: 13pt">
<img border="0" src="images/note-bottom.jpg"></font></td>
												</tr>
												</table>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	In the 
																	sentence 
																	above, the 
																	verb </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	'will have 
																	been 
																	practicing'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	is in 
																	future 
																	perfect 
																	progressive 
																	tense 
																	because it 
																	refers to a 
																	continuing 
																	action in 
																	the future that 
																	will have 
																	been ongoing 
																	for quite 
																	some time 
																	already.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp; 
																	</font> </p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	'Future 
																	Perfect 
																	Progressive 
																	Tense' Verbs:</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	&quot;will 
																	have been 
																	doing&quot;, 
																	&quot;will have 
																	been 
																	caring&quot;, 
																	&quot;will have 
																	been 
																	writing&quot;, 
																	&quot;will have 
																	been 
																	bringing&quot;, 
																	&quot;will have 
																	been 
																	making&quot;, 
																	&quot;will have 
																	been 
																	sharing&quot;, 
																	&quot;will have 
																	been 
																	singing&quot;, 
																	&quot;will have 
																	been 
																	letting&quot;, 
																	&quot;will have 
																	been 
																	painting&quot;, 
																	&quot;will have 
																	been 
																	training&quot; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp; 
																	</font> </p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	Sentences 
																	with 
																	'Future 
																	Perfect 
																	Progressive 
																	Tense' Verbs:</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	1. Ben </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	will have 
																	been calling</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	for help for 
																	three hours 
																	already.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	2. Two weeks 
																	from now, 
																	Miss 
																	Bautista </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	will have 
																	been 
																	teaching</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	in that 
																	school for 
																	thirty years 
																	already.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	3. By the 
																	time I 
																	finish this, 
																	you </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	will have 
																	been sitting</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	idly for an 
																	hour 
																	already.</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;
																	</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp; &nbsp;
																	</font></p>
											<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	Here are 
																	more 
																	examples of 
																	future 
																	tense forms 
																	to summarize 
																	what we've 
																	learned.</font></p>
											<table border="0" width="370" cellspacing="0" cellpadding="0">
												<tr>
													<td>
													<font face="Comic Sans MS" style="font-size: 13pt">
													<img border="0" src="images/note-top.jpg" width="370" height="44"></font></td>
												</tr>
												<tr>
													<td background="images/note-middle.jpg" width="370">
											<p style="margin-left: 30px; margin-right: 30px; margin-top: 5px; margin-bottom: 0" align="center">
																	<font face="Comic Sans MS" style="font-size: 16pt" color="#800080">
																	Future 
																	Tense Forms</font></p>
											<p style="margin-left: 30px; margin-right: 30px; margin-top: 8px; margin-bottom: 0" align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#333333">
																	Simple:</font></p>
											<p style="margin:0 30px; " align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	Lisa </font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	will play
																	</font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	the role of 
																	a princess.</font></p>
											<p style="margin-left: 30px; margin-right: 30px; margin-top: 8px; margin-bottom: 0" align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#333333">
																	Progressive:
																	</font></p>
											<p style="margin:0 30px; " align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	Lisa </font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	will be playing </font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	the role of 
																	a princess 
																	in our 
																	program next 
																	week.</font></p>
											<p style="margin-left: 30px; margin-right: 30px; margin-top: 8px; margin-bottom: 0" align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#333333">
																	Perfect:
																	</font></p>
											<p style="margin:0 30px; " align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	Lisa </font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	will have 
																	played
																	</font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	the role of 
																	a princess 
																	at the end 
																	of our 
																	program next 
																	week.</font></p>
											<p style="margin-left: 30px; margin-right: 30px; margin-top: 8px; margin-bottom: 0" align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#333333">
																	Perfect 
																	Progressive:
																	</font></p>
											<p style="margin-left: 30px; margin-right: 30px; margin-top: 0; margin-bottom: 5px" align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	After next 
																	week, Lisa
																	</font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	will have been 
																	playing
																	</font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	the role of 
																	a princess 
																	for three 
																	years 
																	already.</font></p>
													</td>
												</tr>
												<tr>
													<td >
<font face="Comic Sans MS" style="font-size: 13pt">
<img border="0" src="images/note-bottom.jpg"></font></td>
												</tr>
												</table>
																							<p style="margin-top: 0; margin-bottom: 0; margin-left:120px; margin-right:100px" align="justify"><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;&nbsp; </font></p>
											<p style="margin-top: 0; margin-bottom: 0; margin-left:120px; margin-right:100px" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-top: 0; margin-bottom: 0; margin-left:120px; margin-right:100px" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">To learn more about the different forms of past tense, <a href="t-tenses-past.php">click here</a>.</font></p>
											<div class="wrapper">
												<div id="static-pages0">
													<div class="page-width">
														<div id="free-resources0" class="page-right-side">
															<div class="page-chunk adjectives">
																<div class="page-chunk-pad">
																							<p style="margin-top: 0; margin-bottom: 0; margin-left:120px; margin-right:100px" align="justify"><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">To learn more about the different forms of present tense, <a href="t-tenses-present.php">click here</a>.</font></p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
											</font></p>
											<p style="margin-top: 10px; margin-bottom: 0" align="center">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp; &nbsp;&nbsp;&nbsp;</font><font face="Comic Sans MS" style="font-size: 13pt"><a href="tutorials.php"><img border="0" id="img8" src="images/backa.jpg" alt="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img8',/*url*/'images/backb.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img8',/*url*/'images/backa.jpg')"  fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text"></a></font></p>
										</div>
										</td>
									</tr>
								</table>
								<img border="0" src="images/tutorial-bottom.jpg" width="800" ></td>
							</tr>
							</table>
						</td>
					</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
				<img border="0" src="../images/footer.jpg"></td>
			</tr>
			<tr>
				<td height="33">
			<p align="center" style="margin-top: 5px; margin-bottom: 5px">
            <font style="font-size: 10pt"><span style="mso-spacerun: yes">
			<font face="Arial" color="#C2EBC2">
            Copyright © 2010
        </font><b><font face="Arial" color="#365669">
        	<a href="../home.php"><font color="#FFFF99">MathPluz.com</font></a></font></b><font face="Arial" color="#C2EBC2">. 
			All Rights Reserved.</font></span></font></p>
				</td>
			</tr>
			</table>
	</div>
</div>

</body>

</html>