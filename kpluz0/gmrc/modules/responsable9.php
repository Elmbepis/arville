<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Responsable - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Responsable";
$_SESSION['tnum']="*92";

$questions=array(

"Alin sa mga sumusunod ang maihahambing sa pagkakaroon ng personal na misyon sa buhay?=Pagkakaroon ng mapa sa isang mahabang paglalakbay>Pagkakaroon ng pagkain sa isang digmaan+Pagkakaroon ng mataas na kita sa isang hanapbuhay<Pagkakaroon ng maraming tauhan sa isang kuwento",
"Alin sa mga sumusunod ang nagpapahiwatig ng kahulugan ng personal na misyon sa buhay?=Ang dahilan kung bakit ka bumabangon tuwing umaga>Ang iyong hanapbuhay na nagbibigay sa iyo ng kita+Ang iyong listahan ng mga bagay na gusto mong magkaroon<Ang iyong iskedyul ng mga gagawin sa maghapon",
"Ano ang magiging bunga ng pagkakaroon mo ng matibay na misyon sa buhay?=Ang buhay mo ay magkakaroon ng direksyon at magiging makahulugan>Ang buhay mo ay magiging serye lamang ng mga reaksyon sa mga pangyayari sa paligid mo+Mawawala lahat ng mga pagsubok sa buhay mo<Mas yayaman ka kaysa mga kaibigan mo",
"Kapag mayroon kang misyon sa buhay, ikaw ay maihahambing sa alin sa mga sumusunod?=Kapitang may sariling barkong nakokontrol niya>Dahong nililipad ng hangin+Taong nakasakay sa isang balsang sumasabay lamang sa agos<Ibong nakakulong sa isang hawla",
"Alin sa mga sumusunod ang nagpapahiwatig ng kahulugan ng pagiging responsable?=Pagkilala na ikaw ang may kontrol sa sarili mong buhay>Pagsunod sa mga kagustuhan ng ibang tao+Pag-iwas sa mga problema at pagsubok sa buhay<Paghihintay na utusan bago kumilos",
"Kung ikaw mismo ay hindi gumawa ng mga hakbang upang magplano at maghanda para sa iyong kinabukasan, alin sa mga sumusunod ang hindi mo maaaring gawin?=Sisihin ang iba kung saan ka mapupunta>Pasalamatan ang mga taong tumutulong sa iyo+Tumulong sa kapwang nangangailangan sa abot ng iyong makakaya<Humingi ng katarungan para sa mga naaapi",
"Ang paglilista ng mga prinsipyong hindi mo kayang labagin ay bahagi ng alin sa mga sumusunod na hakbang upang matukoy ang iyong personal na misyon sa buhay?=Tukuyin ang iyong mga pagpapahalaga>Kilalanin ang iyong mga kakayahan at talento+Isipin ang problemang nais mong malutas<Bumuo ng draft ng iyong misyon",
"Ang pagsusuri kung saan ka mahusay o magaling ay bahagi ng alin sa mga sumusunod na hakbang upang matukoy ang iyong personal na misyon sa buhay?=Kilalanin ang iyong mga kakayahan at talento>Tukuyin ang iyong mga pagpapahalaga+Isipin ang problemang nais mong malutas<Bumuo ng draft ng iyong misyon",
"Alin sa mga sumusunod na hakbang upang malaman mo ang iyong personal na misyon sa buhay ang may kaugnayan sa pag-alam kung anong negatibong aspeto ng mundo ang nais mong pabutihin?=Isipin ang problemang nais mong malutas>Kilalanin ang iyong mga kakayahan at talento+Tukuyin ang iyong mga pagpapahalaga<Bumuo ng draft ng iyong misyon",
"Alin sa mga sumusunod na hakbang upang malaman mo ang iyong personal na misyon sa buhay ang tumutukoy sa pagsusulat ng iyong ideya sa papel at paghingi sa iba ng feeback tungkol dito?=Bumuo ng draft ng iyong misyon>Kilalanin ang iyong mga kakayahan at talento+Tukuyin ang iyong mga pagpapahalaga<Isipin ang problemang nais mong malutas",
"Alin sa mga sumusunod na hakbang upang malaman mo ang iyong personal na misyon sa buhay ang tumutukoy sa paggawa ng mga aksyon upang makumpirma kung ang iyong misyon ay para sa iyo o hindi?=Subukan ang iyong misyon sa maliliit na paraan>Rebisahin ang iyong misyon habang ikaw ay lumalago+Isulat ang iyong misyon sa isang lugar na lagi mong nakikita<Isipin ang problemang nais mong malutas",
"Alin sa mga sumusunod na hakbang upang malaman mo ang iyong personal na misyon sa buhay ang dapat mong gawin dahil patuloy kang natututo at nagkakaroon ng mga bagong karanasan?=Rebisahin ang iyong misyon habang ikaw ay lumalago>Subukan ang iyong misyon sa maliliit na paraan+Isulat ang iyong misyon sa isang lugar na lagi mong nakikita<Tukuyin ang iyong mga pagpapahalaga",
"Alin sa mga sumusunod na hakbang upang malaman mo ang iyong personal na misyon sa buhay ang naglalayong patibayin ang iyong determinasyon sa pamamagitan ng araw-araw na pagpapaalala?=Isulat ang iyong misyon sa isang lugar na lagi mong nakikita>Subukan ang iyong misyon sa maliliit na paraan+Rebisahin ang iyong misyon habang ikaw ay lumalago<Tukuyin ang iyong mga pagpapahalaga",
"Alin sa mga sumusunod ang dapat maging ugat ng iyong personal na misyon sa buhay?=Ang mga pagpapahalagang hindi mo kayang labagin>Ang iyong kagustuhang magkaroon ng maraming pera+Ang mga bagay na nagpapasaya sa iyo<Ang iyong mga mapapait na karanasan",
"Alin sa mga sumusunod ang maaari mong itanong sa iyong sarili upang matukoy mo ang iyong mga natatanging kakayahan?=Ano ang madali para sa akin na hindi madali para sa iba?>Ano ang misyon ko sa buhay?+Paano ko maaabot ang aking mga pangarap?<Ano ang aking mga pagpapahalaga?",
"Alin sa mga sumusunod na hakbang sa pagsasakatuparan ng iyong misyon sa buhay ang tumutukoy sa pagsusulat ng isang pangungusap na direktang naglalahad ng iyong nais gawin?=Gumawa ng mission statement>Tumukoy ng tatlong posibleng hamon sa iyong misyon+Maghanda ng solusyon para sa bawat hamon sa iyong misyon<Gumawa ng konkretong timeline para sa iyong misyon",
"Alin sa mga sumusunod na hakbang sa pagsasakatuparan ng iyong misyon sa buhay ang tumutukoy sa paglilista ng mga bagay na maaaring humadlang o pumigil sa iyong misyon?=Tumukoy ng tatlong posibleng hamon sa iyong misyon>Gumawa ng mission statement+Maghanda ng solusyon para sa bawat hamon sa iyong misyon<Gumawa ng konkretong timeline para sa iyong misyon",
"Alin sa mga sumusunod na hakbang sa pagsasakatuparan ng iyong misyon sa buhay ang tumutukoy sa pagpaplano kung paano mo mapagtatagumpayan ang mga hadlang sa iyong misyon?=Maghanda ng solusyon para sa bawat hamon sa iyong misyon>Gumawa ng mission statement+Tumukoy ng tatlong posibleng hamon sa iyong misyon<Gumawa ng konkretong timeline para sa iyong misyon",
"Alin sa mga sumusunod na hakbang sa pagsasakatuparan ng iyong misyon sa buhay ang tumutukoy sa paglalagay ng mga tiyak na petsa sa mga milestones at katuparan ng iyong misyon?=Gumawa ng konkretong timeline para sa iyong misyon>Gumawa ng mission statement+Tumukoy ng tatlong posibleng hamon sa iyong misyon<Maghanda ng solusyon para sa bawat hamon sa iyong misyon",
"Alin sa mga sumusunod na hakbang sa pagsasakatuparan ng iyong misyon sa buhay ang tumutukoy sa pagsusulat ng bawat maliit na hakbang na iyong ginagawa patungo sa iyong misyon?=Magsimula ng mission journal>Humanap ng grupong may parehong layunin+Gumawa ng taunang mission review<Humindi sa mga bagay na labag sa iyong misyon",
"Alin sa mga sumusunod na hakbang sa pagsasakatuparan ng iyong misyon sa buhay ang tumutukoy sa pagsali sa isang komunidad na ang hangarin ay katulad ng iyong misyon?=Humanap ng grupong may parehong layunin>Magsimula ng mission journal+Gumawa ng taunang mission review<Humindi sa mga bagay na labag sa iyong misyon",
"Ang pagdiriwang ng iyong mga tagumpay at pagsusuri ng mga bagay na kailangan mo pang paghusayan ay bahagi alin sa mga sumusunod na hakbang sa pagsasakatuparan ng iyong misyon sa buhay?=Gumawa ng taunang mission review>Magsimula ng mission journal+Humanap ng grupong may parehong layunin<Humindi sa mga bagay na labag sa iyong misyon",
"Alin sa mga sumusunod na hakbang sa pagsasakatuparan ng iyong misyon sa buhay ang tumutukoy sa pag-iwas o pagtanggi sa mga bagay na maaaring maglihis ng iyong landas o sumira sa iyong pokus?=Humindi sa mga bagay na labag sa iyong misyon>Magsimula ng mission journal+Gumawa ng taunang mission review<Humanap ng grupong may parehong layunin",
"Alin sa mga sumusunod ang nagbibigay ng kahulugan hindi lamang sa iyong sariling buhay kundi sa buhay ng mga taong nakapaligid sa iyo?=Ang iyong personal na misyon sa buhay>Ang iyong kayamanan+Ang iyong posisyon sa lipunan<Ang iyong kasikatan",
"Alin sa mga sumusunod ang hindi kabilang sa mga bunga ng pagiging responsable at pagkakaroon ng personal na misyon?=Kawalan ng kontribusyon sa lipunan>Direksyon at pokus sa iyong buhay+Lakas upang harapin ang mga hamon<Kapayapaan ng loob at kasiyahan"
 
);

?>

</head>

</body

</html>