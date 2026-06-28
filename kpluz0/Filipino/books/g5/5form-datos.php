<?php

$grd=$grd;
$title="Paglalagay ng Datos<br/>sa Isang 'Form'";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000CC'>";
$red=$font."<font color='#CC0000'>";
$black=$font."<font color='#000000'>";
$img1="images/form1.jpg";
$img2="images/form2.jpg";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#BB0000'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:26pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#BB0000'>"; 
	}


$article="
Bahagi na ng ating pang-araw-araw na buhay ang pagsagot sa mga 'form' upang matanggap sa isang paaralan, trabaho, o organisasyon, makagamit ng isang sistema, o makilahok sa isang kaganapan.
Hindi ka papayagan ng lipunang magawa ang mga ito nang hindi ka nagbibigay ng mga datos tungkol sa iyong sarili sa pamamagitan ng angkop na 'form'.
<br/><br/>
Sa araling ito, tatalakayin natin kung paano maglagay ng mga datos na hinihingi ng isang 'form'.
<br/><br/>
Ang 'form' ay isang nakalathalang dokumentong naglalayong kumuha ng personal na impormasyon o datos tungkol sa isang tao.
Ito ay naglalaman ng mga patlang kung saan isusulat ng gumagamit ng form ang mga hinihinging impormasyon.
<br/><br/>
Hindi pare-pereho ang hinihinging datos ng bawa't form, nguni't may mga impormasyong hinihingi ng karamihan ng 'forms'.
Tingnan natin ang mga datos na ito.
<br/><br/>
$vio<u>Pangalan</u>$black
<br/><br/>
Ang pangalan, o 'name' sa mga form na Ingles, ang pinakamadalas hinging impormasyon ng mga 'form.'
<br/><br/>
Bago mo isulat ang iyong pangalan sa isang 'form', suriin munang mabuti kung ilang patlang ang inilaan ng 'form' para rito.
May mga 'form' kasing hinihingi ang iyong unang pangalan ('first name'), gitnang pangalan ('middle name'), at apelyido ('last name' o 'surname') sa magkakahiwalay na patlang. 
<br/><br/>
$vio<u>Araw ng Kapanganakan</u>$black
<br/><br/>
Ang araw ng kapanganakan, o 'date of birth' sa mga form na Ingles, ay madalas ding hingin sa mga 'form.'
Ito ang eksaktong petsa kung kailan ka isinilang.
<br/><br/>
Bago mo isulat ang iyong araw ng kapanganakan sa isang 'form', suriin munang mabuti kung may mga nakalaang patlang para sa taon, buwan, at petsa ng iyong araw ng kapanganakan.
Kailangang maisulat mo ang mga detalyeng ito sa mga tamang patlang. 
<br/><br/>
$vio<u>Edad</u>$black
<br/><br/>
Ang edad, o 'age' sa mga form na Ingles, ay karaniwan ding hinihingi sa mga 'form.'
Ang impormasyong isusulat mo sa patlang para rito ay ang bilang ng mga taong itinagal mo na rito sa mundo.
<br/><br/>
$vio<u>Kasarian</u>$black
<br/><br/>
Ang kasarian, o 'sex' 0 'gender' sa mga form na Ingles, ay karaniwan ding hinihingi sa mga 'form.'
Ito ang nagsasabi kung ikaw ay lalaki o babae.
<br/><br/>
Kadalasan, may mga 'checkboxes' o maliliit na kahong minarkahan ng 'lalaki' o 'male' at 'babae' o 'female' sa bahaging ito ng form.
Lalagyan mo na lamang ng tsek ang kahon ng iyong kasarian.
<br/><br/>
$vio<u>Tirahan</u>$black
<br/><br/>
Ang tirahan, o 'address' sa mga form na Ingles, ay hinihingi rin ng maraming 'form.'
Kailangan mong ibigay rito ang tiyak na lokasyon ng iyong tahanan.
<br/><br/>
Karaniwang higit sa isa ang patlang na inilalaan ng isang 'form' para sa tirahan o 'address' dahil mahaba ito.
Bago mo isulat ang iyong tirahan sa isang 'form', suriin munang mabuti kung anong detalye ng iyong tirahan ang hinihingi ng bawa't patlang para rito.
<br/><br/>
Kung isang mahabang patlang lamang ang inilaan para rito, mainam kung maisusulat mo ang mga sumusunod: 1) bilang ng bahay, 2) pangalan ng kalye, 3) barangay ng inyong kalye, 4) lungsod o nayon ng inyong barangay,
at 5) lalawigan (kung naaangkop).
<br/><br/>
$vio<u>Pangalan ng mga Magulang</u>$black
<br/><br/>
May mga 'form' ding humihingi ng mga pangalan ng iyong mga magulang.
<br/><br/>
Suriin munang mabuti ang mga nakalaang patlang bago isulat ang mga pangalan ng iyong ama at ina upang matiyak na wasto ang mga detalyeng iyong ilalagay sa bawa't patlang.
<br/><br/>
Makikita sa ibaba ang isang bahagi ng 'form' na nilagyan na ng ilang mga datos na nabanggit sa itaas.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
$vio<u>Telepono</u>$black
<br/><br/>
Madalas ding hingin ng mga 'form' ang numero ng iyong telepono.
Maging maingat sa pagsulat ng iyong numero sa patlang na inilaan para rito.
<br/><br/>
$vio<u>Email</u>$black
<br/><br/>
May mga 'form' ding humihingi ng iyong 'email address'.
Tiyaking wasto ang pagkakabaybay ng iyong 'email address' kapag isinulat mo ito sa nakalaang patlang.
<br/><br/>
$vio<u>Petsa</u>$black
<br/><br/>
May mga 'form' na humihingi ng kasalukuyang petsa, tulad ng mga 'form' na ginagamit sa mga bangko.
Tiyaking tama ang petsa at ang anyo nito kapag isinulat mo ito sa patlang na nakalaan para rito.
<br/><br/>
$vio<u>Lagda</u>$black
<br/><br/>
May mga 'form' ding humihingi ng iyong lagda.
Sikaping lagdaan ang 'form' nang maayos at walang mali o dumi.
<br/><br/>
$vio<u>Pagkamamamayan</u>$black
<br/><br/>
Ang iyong pagkamamamayan o 'nationality' ay maaari ring hingin sa ilang 'form'.
Kung ikaw ay isang mamamayan ng bansang Pilipinas, 'Filipino' ang kailangan mong isagot dito.
<br/><br/>
$vio<u>Hanapbuhay</u>$black
<br/><br/>
May mga 'form' ding himihingi ng hanapbuhay o 'occupation'.
Dahil wala ka pang hanapbuhay, maaari mo itong sagutan ng 'student'.
<br/><br/>
$vio<u>Kalagayang Marital</u>$black
<br/><br/>
May mga 'form' ding himihingi ng kalagayang marital o 'marital status'.
Ito ang impormasyong nagsasaad kung ikaw ay mayroon na o wala pang asawa.
Dahil wala ka pang asawa, 'single' ang dapat mong isagot dito.
<br/><br/>
Makikita sa ibaba ang isang bahagi ng 'form' na nilagyan na ng ilang mga datos na nabanggit sa itaas.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
"
?>
