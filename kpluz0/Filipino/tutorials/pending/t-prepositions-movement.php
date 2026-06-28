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
<title>The Point Plotting Theorem - Filipino sa KPluz.com</title>
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
										<p align="center" style="margin-top: 50px; margin-bottom: 10px">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 22pt" color="#990000">
										The Point-Plotting Theorem </font>
										</span></p>
										<p align="center" style="margin-top: 0; margin-bottom: 0">
										&nbsp;</td>
									</tr>
									<tr>
										<td valign="top" background="images/tutorial-content.jpg">
										<div align="center">
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											&nbsp;</p>
<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											&nbsp;</p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
											Using the
											<a href="geom-postulate-04.php">Ruler Placement Postulate</a>, 
											let's set up our coordinate system for 
											the line
											<img border="0" src="images/postulates/line-ab.jpg" width="30" height="20"> 
											in such a way that 
											point A will have a coordinate of 0 
											while point B will have a coordinate 
											equal to a positive number 
											r.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											&nbsp;&nbsp; </p>
											<div class="wrapper">
												<div id="static-pages">
													<div class="page-width">
														<div id="free-resources" class="page-right-side">
															<div class="page-chunk adjectives">
																<div class="page-chunk-pad">
																	<div class="wrapper">
																		<div id="static-pages2">
																			<div class="page-width">
																				<div id="free-resources2" class="page-right-side">
																					<div class="page-chunk prepositions">
																						<div class="page-chunk-pad">
																							<div class="wrapper">
																								<div id="static-pages3">
																									<div class="page-width">
																										<div id="free-resources3" class="page-right-side">
																											<div class="page-chunk default">
																												<div class="page-chunk-pad">
																													<div class="wrapper">
																														<div id="static-pages4">
																															<div class="page-width">
																																<div id="free-resources4" class="page-right-side">
																																	<div class="page-chunk default">
																																		<div class="page-chunk-pad">
																																			<div class="wrapper">
																																				<div id="static-pages5">
																																					<div class="page-width">
																																						<div id="free-resources5" class="page-right-side">
																																							<div class="page-chunk default">
																																								<div class="page-chunk-pad">
																																									<h1>Prepositions of Movement</h1>
																																									<p>&nbsp;</p>
																																									<p>There are 9 prepositions that pertain to movement:</p>
																																									<p>&nbsp;</p>
																																									<p><strong>To</strong></p>
																																									<p>‘To’ is used when there is a specific destination in mind. The destination can be a number of things:</p>
																																									<p>&nbsp;</p>
																																									<p>A place:</p>
																																									<p style="margin-left: 108pt;">I’m going to the doctor’s.</p>
																																									<p style="margin-left: 108pt;">Can you direct me to the nearest post office?</p>
																																									<p style="margin-left: 108pt;">&nbsp;</p>
																																									<p>An event:</p>
																																									<p style="margin-left: 108pt;">Are you going to the party?</p>
																																									<p style="margin-left: 108pt;">I have never been to a concert.</p>
																																									<p>&nbsp;</p>
																																									<p>A person:</p>
																																									<p>She came up to me.</p>
																																									<p>I go to my father for advice.</p>
																																									<p>&nbsp;</p>
																																									<p>A position:</p>
																																									<p>The bathroom is to your left.</p>
																																									<p>Keep to the left.</p>
																																									<p>&nbsp;</p>
																																									<p><strong>Towards</strong></p>
																																									<p>‘Towards’ is used in the following instances:</p>
																																									<p>When one has movement in a particular direction in mind, rather than simply a destination:</p>
																																									<p style="margin-left: 117pt;">He was walking menacingly towards me.</p>
																																									<p>&nbsp;</p>
																																									<p>Or to refer to a position, in relation to a direction from the point of view of the speaker:</p>
																																									<p style="margin-left: 117pt;">He was sitting with his back towards me.</p>
																																									<p style="margin-left: 117pt;">&nbsp;</p>
																																									<p>&nbsp;</p>
																																									<p><strong>Through</strong></p>
																																									<p>‘Through’ refers to the following types of movement:</p>
																																									<p>&nbsp;</p>
																																									<p>Within a space, which can be thought of as surrounding, enclosing or around the object:</p>
																																									<p style="margin-left: 108pt;">The train went through the tunnel.</p>
																																									<p>&nbsp;</p>
																																									<p>Movement across something, i.e. from one side of it to the other:</p>
																																									<p style="margin-left: 108pt;">He cut through the gauze.</p>
																																									<p>&nbsp;</p>
																																									<p><strong>Into</strong></p>
																																									<p>‘Into’ refers to the following types of movement:</p>
																																									<p>Movement from the outside to the inside of something that can be imagined as surrounding, enclosing or around the object:</p>
																																									<p style="margin-left: 117pt;">He got into the car.</p>
																																									<p style="margin-left: 117pt;">&nbsp;</p>
																																									<p>Movement causing something to hit something else:</p>
																																									<p style="margin-left: 108pt;">He swerved into the tree.</p>
																																									<p>&nbsp;</p>
																																									<p><strong>Across</strong></p>
																																									<p>‘Across’ is used to describe:</p>
																																									<p>&nbsp;</p>
																																									<p>Movement from one end of something to the other:</p>
																																									<p>He walked across the road.</p>
																																									<p>He strode across the bridge.</p>
																																									<p>&nbsp;</p>
																																									<p>Something’s position when it stretches over the surface it is on:</p>
																																									<p>There was a barricade across the road.</p>
																																									<p>&nbsp;</p>
																																									<p>To describe something’s position when it is at the opposite end from one’s position:</p>
																																									<p>We went to the restaurant across the road.</p>
																																									<p>&nbsp;</p>
																																									<p><strong>Over</strong></p>
																																									<p>‘Over’ is used in the following instances:</p>
																																									<p>&nbsp;</p>
																																									<p>To describe something’s position when it is above something else:</p>
																																									<p style="margin-left: 117pt;">The bottle is in the cabinet over the sink in the kitchen.</p>
																																									<p style="margin-left: 117pt;">&nbsp;</p>
																																									<p>To describe something’s position when it covers a surface:</p>
																																									<p style="margin-left: 117pt;">A white cloth had been spread over the corpse.</p>
																																									<p>&nbsp;</p>
																																									<p><strong>Along</strong></p>
																																									<p>‘Along’ is used to describe:</p>
																																									<p>&nbsp;</p>
																																									<p>Movement in a line:</p>
																																									<p style="margin-left: 108pt;">We walked along the river.</p>
																																									<p style="margin-left: 108pt;">&nbsp;</p>
																																									<p>The collective position of a group of things that are in a line:</p>
																																									<p style="margin-left: 117pt;">He lived in one of the houses along the river.</p>
																																									<p>&nbsp;</p>
																																									<p><strong>In</strong></p>
																																									<p>‘In’ is used in the following instances:</p>
																																									<p>&nbsp;</p>
																																									<p>Something’s position in relation to the area or space or place surrounding it:</p>
																																									<p style="margin-left: 72pt;">We are going to have our picnic in the park.</p>
																																									<p style="margin-left: 72pt;">I left my car in the garage.</p>
																																									<p style="margin-left: 72pt;">&nbsp;</p>
																																									<p>To express towards the inside of something:</p>
																																									<p style="margin-left: 72pt;">Put the pickle in the cabinet.</p>
																																									<p>&nbsp;</p>
																																									<p><strong>On</strong></p>
																																									<p>‘On’ is used in the following instances:</p>
																																									<p>&nbsp;</p>
																																									<p>To describe something’s position in relation to a surface:</p>
																																									<p style="margin-left: 108pt;">There was an array of food on the table.</p>
																																									<p>&nbsp;</p>
																																									<p>To describe movement in the direction of a surface:</p>
																																									<p style="margin-left: 117pt;">The rain falling on the roof kept me from sleeping.</p>
																																									<p style="margin-left: 117pt;">&nbsp;</div>
																																							</div>
																																						</div>
																																					</div>
																																				</div>
																																			</div>
																																			<p>&nbsp;</div>
																																	</div>
																																</div>
																															</div>
																														</div>
																													</div>
																												</div>
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<p style="margin-left: 108pt">&nbsp;</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
											<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp;
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