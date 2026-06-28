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
<title>Adverbs of Frequency - Filipino sa KPluz.com</title>
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
										Adverbs of Frequency</font></span></td>
									</tr>
									<tr>
										<td valign="top" background="images/tutorial-content.jpg">
										<div align="center">
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;</font></p>
<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#0000CC">
											ADVERBS OF FREQUENCY</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;
											</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
											Adverbs of frequency are
											<a href="t-adverbs.php">adverbs</a> that 
											tell us how often an action happens.&nbsp; 
											They can be further categorized into 
											adverbs of definite frequency and 
											adverbs of indefinite frequency. </font>
											<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
											Adverbs of definite frequency</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
											specify the exact frequency at which 
											an action happens. </font>
											<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
											Adverbs of indefinite frequency</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
											only indicate the relative frequency 
											at which an action happens.&nbsp;&nbsp; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
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
											<p style="margin-left: 35px; margin-right: 30px; margin-top: 0; margin-bottom: 0" align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	Ronnie goes 
																	to church
																	</font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	every day.</font></p>
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
																	phrase </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	'every day'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	is the adverb. 
																	It is an 
																	adverb 
																	of definite 
																	frequency 
																	because it 
																	specifies 
																	the exact 
																	frequency at 
																	which the 
																	action of 
																	the verb </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	'goes'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333"> 
																	happens 
																	(every day).</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	&nbsp;</p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	Adverbs of 
																	Definite 
																	Frequency:</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	&quot;hourly&quot;, 
																	&quot;daily&quot;, 
																	&quot;weekly&quot;, 
																	&quot;monthly&quot;, 
																	&quot;yearly&quot;, 
																	&quot;every 
																	second&quot;, 
																	&quot;every 
																	minute&quot;, 
																	&quot;once a 
																	day&quot;, &quot;twice 
																	per hour&quot;, 
																	&quot;thrice a 
																	year&quot;, 
																	&quot;once&quot;, 
																	&quot;twice&quot;, 
																	&quot;thrice&quot;, 
																	&quot;four times&quot;</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">&nbsp;&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	Sentences 
																	with Adverbs 
																	of Definite 
																	Frequency:</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	1. Mrs. Luna 
																	buys a new 
																	car </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	every four 
																	years</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	2. He needs 
																	to take his 
																	medication </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	daily</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	3. Ivan took 
																	the same 
																	exam </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	thrice</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	before 
																	finally 
																	passing it.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	Let's look 
																	at another 
																	sentence:</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
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
																	Dennis
																	</font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	rarely</font><font face="Comic Sans MS" style="font-size: 14pt" color="#000080"> 
																	uses the new 
																	computer 
																	that he 
																	bought.</font></p>
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
																	phrase </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	'rarely'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	is the adverb. 
																	It is an 
																	adverb 
																	of 
																	indefinite 
																	frequency 
																	because it 
																	only 
																	describes 
																	the relative 
																	frequency at 
																	which the 
																	action of 
																	the verb </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	'goes'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333"> 
																	happens.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	&nbsp;</p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	Adverbs of 
																	Indefinite 
																	Frequency:</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	&quot;always&quot;, 
																	&quot;seldom&quot;, 
																	&quot;often&quot;, 
																	&quot;rarely&quot;, 
																	&quot;frequently&quot;, 
																	&quot;sometimes&quot;, 
																	&quot;occasionally&quot;</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">&nbsp;&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	Sentences 
																	with Adverbs 
																	of 
																	Indefinite 
																	Frequency:</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	1. </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Sometimes</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	we go to the 
																	beach to 
																	cool off. </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	2. Mr. 
																	Paciano 
																	takes his 
																	grandsons to 
																	the movies</font><font face="Comic Sans MS" style="font-size: 13pt" color="#990000"> 
																	often</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	3. I play 
																	golf </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	once in a 
																	while</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	to meet new 
																	friends.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
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