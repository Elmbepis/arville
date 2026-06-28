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
<title>Dynamic Verbs - Filipino sa KPluz.com</title>
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
										Dynamic Verbs</font></span></td>
									</tr>
									<tr>
										<td valign="top" background="images/tutorial-content.jpg">
										<div align="center">
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp;
											</font></p>
<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
											Another way of classifying
											<a href="t-verbs.php">verbs</a> is 
											to categorize them into dynamic or 
											stative verbs.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</font></p>
																	<p align="justify" style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Dynamic 
																	verbs</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333"> 
																	are verbs 
																	that denote 
																	an actual </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	action</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333"> 
																	on the part 
																	of the 
																	subject that 
																	may be 
																	physical 
																	(e.g., to 
																	swim), 
																	mental 
																	(e.g., to 
																	think), or 
																	perceptual 
																	(e.g., to 
																	see).&nbsp; 
																	They also 
																	happen over 
																	a certain 
																	period of time, which 
																	may or may 
																	not have yet 
																	occurred.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
																	</font></p>
											<table border="0" width="370" cellspacing="0" cellpadding="0">
												<tr>
													<td>
													<font face="Comic Sans MS" style="font-size: 13pt">
													<img border="0" src="images/note-top.jpg" width="370" height="44"></font></td>
												</tr>
												<tr>
													<td background="images/note-middle.jpg" width="370">
											<p style="margin:0 40px; " align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	The teacher
																	</font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	wrote</font><font face="Comic Sans MS" style="font-size: 14pt" color="#000080"> 
																	the day's 
																	lessons on a 
																	whiteboard.</font></p>
													</td>
												</tr>
												<tr>
													<td >
<font face="Comic Sans MS" style="font-size: 13pt">
<img border="0" src="images/note-bottom.jpg"></font></td>
												</tr>
												</table>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	In the 
																	sentence 
																	above, the 
																	word
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	'wrote'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333"> 
																	is a dynamic 
																	verb because 
																	it denotes 
																	an actual 
																	physical 
																	action on 
																	the part of 
																	the subject, </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000"> 
																	'teacher'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
																	</font></p>
											<table border="0" width="370" cellspacing="0" cellpadding="0">
												<tr>
													<td>
													<font face="Comic Sans MS" style="font-size: 13pt">
													<img border="0" src="images/note-top.jpg" width="370" height="44"></font></td>
												</tr>
												<tr>
													<td background="images/note-middle.jpg" width="370">
											<p style="margin:0 40px; " align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	The inventor
																	</font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	pondered</font><font face="Comic Sans MS" style="font-size: 14pt" color="#000080"> 
																	all day long 
																	how to solve 
																	his problem.</font></p>
													</td>
												</tr>
												<tr>
													<td >
<font face="Comic Sans MS" style="font-size: 13pt">
<img border="0" src="images/note-bottom.jpg"></font></td>
												</tr>
												</table>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	In the 
																	sentence 
																	above, the 
																	word
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	'pondered'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333"> 
																	is a dynamic 
																	verb because 
																	it denotes 
																	an actual 
																	mental 
																	action on 
																	the part of 
																	the subject, </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000"> 
																	'inventor'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
																	</font></p>
											<table border="0" width="370" cellspacing="0" cellpadding="0">
												<tr>
													<td>
													<font face="Comic Sans MS" style="font-size: 13pt">
													<img border="0" src="images/note-top.jpg" width="370" height="44"></font></td>
												</tr>
												<tr>
													<td background="images/note-middle.jpg" width="370">
											<p style="margin:0 40px; " align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	The inventor
																	</font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	pondered</font><font face="Comic Sans MS" style="font-size: 14pt" color="#000080"> 
																	all day long 
																	how to solve 
																	his problem.</font></p>
													</td>
												</tr>
												<tr>
													<td >
<font face="Comic Sans MS" style="font-size: 13pt">
<img border="0" src="images/note-bottom.jpg"></font></td>
												</tr>
												</table>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	In the 
																	sentence 
																	above, the 
																	word
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	'pondered'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333"> 
																	is a dynamic 
																	verb because 
																	it denotes 
																	an actual 
																	mental 
																	action on 
																	the part of 
																	the subject, </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000"> 
																	'inventor'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp; 
																	</font> </p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	Dynamic Verbs 
																	in Past 
																	Tense:</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font style="font-weight: 500; font-size: 13pt" color="#333333" face="Comic Sans MS">
																	&quot;achieved&quot;,
																	</font>
																	<font style="font-size: 13pt; font-weight: 500" color="#333333" face="Comic Sans MS">
																	&quot;adapted&quot;, 
																	&quot;administered&quot;, 
																	&quot;advertised&quot;, 
																	&quot;advised&quot;, 
																	&quot;aided&quot;, 
																	&quot;applied&quot;, 
																	&quot;approved&quot;, 
																	&quot;assembled&quot;, 
																	&quot;assessed&quot;, 
																	&quot;assisted&quot;, 
																	&quot;authorized&quot;, 
																	&quot;bought&quot;, 
																	&quot;budgeted&quot;, 
																	&quot;built&quot;, 
																	&quot;calculated&quot;, 
																	&quot;classified&quot;, 
																	&quot;cooperated&quot;, 
																	&quot;coordinated&quot;, 
																	&quot;collaborated&quot;, 
																	&quot;collected&quot;, 
																	&quot;combined&quot;, 
																	&quot;communicated&quot;, 
																	&quot;compared&quot;, 
																	&quot;compiled&quot;, 
																	&quot;computed&quot;, 
																	&quot;concentrated&quot;, 
																	&quot;conducted&quot;, 
																	&quot;constructed&quot;, 
																	&quot;consulted&quot;, 
																	&quot;contacted&quot;, 
																	&quot;contributed&quot;, 
																	&quot;controlled&quot;, 
																	&quot;created&quot;, 
																	&quot;debugged&quot;, 
																	&quot;decided&quot;, 
																	&quot;defined&quot;, 
																	&quot;delegated&quot;, 
																	&quot;delivered&quot;, 
																	&quot;demonstrated&quot;, 
																	&quot;described&quot;, 
																	&quot;designed&quot;, 
																	&quot;developed&quot;, 
																	&quot;diagnosed&quot;, 
																	&quot;directed&quot;, 
																	&quot;displayed&quot;, 
																	&quot;distributed&quot;, 
																	&quot;drafted&quot;, 
																	&quot;drew&quot;, 
																	&quot;edited&quot;, 
																	&quot;ensured&quot;, 
																	&quot;established&quot;, 
																	&quot;evaluated&quot;, 
																	&quot;examined&quot;, 
																	&quot;expanded&quot;, 
																	&quot;experimented&quot;, 
																	&quot;explored&quot;, 
																	&quot;expressed&quot;, 
																	&quot;facilitated&quot;, 
																	&quot;focused&quot;, 
																	&quot;forecasted&quot;, 
																	&quot;found&quot;, 
																	&quot;graded&quot;, 
																	&quot;guided&quot;, 
																	&quot;handled&quot;, 
																	&quot;harmonized&quot;, 
																	&quot;headed&quot;, 
																	&quot;hired&quot;, 
																	&quot;hosted&quot;, 
																	&quot;identified&quot;, 
																	&quot;implemented&quot;, 
																	&quot;improved&quot;, 
																	&quot;increased&quot;, 
																	&quot;informed&quot;, 
																	&quot;initiated&quot;, 
																	&quot;inspected&quot;, 
																	&quot;installed&quot;, 
																	&quot;integrated&quot;, 
																	&quot;investigated&quot;, 
																	&quot;launched&quot;, 
																	&quot;led&quot;, 
																	&quot;maintained&quot;, 
																	&quot;managed&quot;, 
																	&quot;marketed&quot;, 
																	&quot;modified&quot;, 
																	&quot;negotiated&quot;, 
																	&quot;operated&quot;, 
																	&quot;outlined&quot;, 
																	&quot;overhauled&quot;, 
																	&quot;participated&quot;, 
																	&quot;performed&quot;, 
																	&quot;pinpointed&quot;, 
																	&quot;planned&quot;, 
																	&quot;prepared&quot;, 
																	&quot;presented&quot;, 
																	&quot;produced&quot;, 
																	&quot;promoted&quot;, 
																	&quot;purchased&quot;, 
																	&quot;reduced&quot;, 
																	&quot;reorganized&quot;, 
																	&quot;researched&quot;, 
																	&quot;resolved&quot;, 
																	&quot;restored&quot;, 
																	&quot;revamped&quot;, 
																	&quot;reviewed&quot;, 
																	&quot;sampled&quot;, 
																	&quot;scheduled&quot;, 
																	&quot;selected&quot;, 
																	&quot;serviced&quot;, 
																	&quot;set&quot;, 
																	&quot;simplified&quot;, 
																	&quot;sold&quot;, 
																	&quot;solved&quot;, 
																	&quot;sought&quot;, 
																	&quot;specialized&quot;, 
																	&quot;spoke&quot;, 
																	&quot;streamlined&quot;, 
																	&quot;structured&quot;, 
																	&quot;studied&quot;, 
																	&quot;summarized&quot;, 
																	&quot;supervised&quot;, 
																	&quot;supplied&quot;, 
																	&quot;supported&quot;, 
																	&quot;surveyed&quot;, 
																	&quot;taught&quot;, 
																	&quot;tested&quot;, 
																	&quot;trained&quot;, 
																	&quot;translated&quot;, 
																	&quot;treated&quot;, 
																	&quot;troubleshot&quot;, 
																	&quot;updated&quot;, 
																	&quot;wrote&quot;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<span style="font-weight: 500">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#444444">&nbsp;&nbsp;
																	</font>
																	</span></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	If you 
																	notice, 
																	dynamic 
																	verbs are 
																	the same as
																	<a href="t-verbs-action.php">
																	'action 
																	verbs'</a>.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp; &nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
											See for contrast:
											<a href="t-verbs-stative.php">
											Stative Verbs</a></font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;
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