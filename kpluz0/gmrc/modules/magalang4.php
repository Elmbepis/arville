<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Magalang - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Magalang";
$_SESSION['tnum']="*42";

$questions=array(

"Alin sa mga sumusunod na tungkulin ng mga bata sa paggalang sa mga karapatan ng iba ang tumutukoy sa pag-intindi na ang bawat bata ay dapat magkaroon ng makakain, matutulugan, kaligtasan, edukasyon, at iba pa?=Pag-unawa sa mga karapatan>Paggalang sa mga hangganan+Pagtanggap sa mga kaibahan<Pagpapakita ng empatiya",
"Alin sa mga sumusunod na tungkulin ng mga bata sa paggalang sa mga karapatan ng iba ang tumutukoy sa pagbibigay ng sapat na personal na espasyo sa kapwa at pag-iwas na makasakit dito?=Paggalang sa mga hangganan>Pag-unawa sa mga karapatan+Pagtanggap sa mga kaibahan<Pagpapakita ng empatiya",
"Alin sa mga sumusunod na tungkulin ng mga bata sa paggalang sa mga karapatan ng iba ang tumutukoy sa pagtrato sa lahat nang pantay-pantay, anuman ang kanilang mga katangian o paniniwala?=Pagtanggap sa mga kaibahan>Pag-unawa sa mga karapatan+Paggalang sa mga hangganan<Pagpapakita ng empatiya",
"Alin sa mga sumusunod na tungkulin ng mga bata sa paggalang sa mga karapatan ng iba ang tumutukoy sa pag-unawa at pagbibigay-halaga sa mga damdamin at pinagdadaanan ng kapwa?=Pagpapakita ng empatiya>Pag-unawa sa mga karapatan+Paggalang sa mga hangganan<Pagtanggap sa mga kaibahan",
"Alin sa mga sumusunod na tungkulin ng mga bata sa paggalang sa mga karapatan ng iba ang tumutukoy sa pakikinig nang maingat, pagsasalita nang maayos, at pagpapahayag nang hindi nanlalait o nangmamaliit ng iba?=Pakikipagtalastasan nang may respeto>Pagtanggap sa mga kaibahan+Mapayapang pagtugon sa mga alitan<Pagsuporta sa kapwa",
"Alin sa mga sumusunod na tungkulin ng mga bata sa paggalang sa mga karapatan ng iba ang tumutukoy sa pagresolba ng mga di-pagkakaunawaan sa paraang hindi gumagamit ng karahasan, pang-aapi, o panggigipit?=Mapayapang pagtugon sa mga alitan>Pagtanggap sa mga kaibahan+Pakikipagtalastasan nang may respeto<Pagsuporta sa kapwa",
"Alin sa mga sumusunod na tungkulin ng mga bata sa paggalang sa mga karapatan ng iba ang tumutukoy sa pagbibigay ng tulong sa mga kapwang nangangailangan?=Pagsuporta sa kapwa>Pagtanggap sa mga kaibahan+Pakikipagtalastasan nang may respeto<Mapayapang pagtugon sa mga alitan",
"Alin sa mga sumusunod na tungkulin ng mga bata sa paggalang sa mga karapatan ng iba ang nagpapanatili ng kaayusan sa pamamagitan ng pagbibgay ng kaalaman sa mga bata tungkol sa mga bagay na hindi dapat nila labagin?=Pag-unawa sa mga karapatan>Paggalang sa mga hangganan+Pagtanggap sa mga kaibahan<Pagpapakita ng empatiya",
"Alin sa mga sumusunod na tungkulin ng mga bata sa paggalang sa mga karapatan ng iba ang nagpapanatili ng kaayusan sa pamamagitan ng pagpapababa ng tensyong maaaring magmula sa panggigipt sa personal na espasyo ng kapwa?=Paggalang sa mga hangganan>Pag-unawa sa mga karapatan+Pagtanggap sa mga kaibahan<Pagpapakita ng empatiya",
"Alin sa mga sumusunod na tungkulin ng mga bata sa paggalang sa mga karapatan ng iba ang nagpapanatili ng kaayusan sa pamamagitan ng pagsusulong ng pagkakaisa sa pagitan ng mga batang hindi magkakapareho ang mga katangian, katayuan, o paniniwala?=Pagtanggap sa mga kaibahan>Pag-unawa sa mga karapatan+Paggalang sa mga hangganan<Pagpapakita ng empatiya",
"Alin sa mga sumusunod na tungkulin ng mga bata sa paggalang sa mga karapatan ng iba ang nagpapanatili ng kaayusan sa pamamagitan ng pagdudulot ng malalim na pag-unawa at pagsasaalang-alang sa nararamdaman ng kapwa?=Pagpapakita ng empatiya>Pakikipagtalastasan nang may respeto+Paggalang sa mga hangganan<Pagtanggap sa mga kaibahan",
"Alin sa mga sumusunod na tungkulin ng mga bata sa paggalang sa mga karapatan ng iba ang nagpapanatili ng kaayusan sa pamamagitan ng pagtulong na maiwasan ang paggamit ng mga salitang maaaring makasakit o magdulot ng di-pagkakaunawaan?=Pakikipagtalastasan nang may respeto>Pagtanggap sa mga kaibahan+Pag-unawa sa mga karapatan<Pagsuporta sa kapwa",
"Alin sa mga sumusunod na tungkulin ng mga bata sa paggalang sa mga karapatan ng iba ang nagpapanatili ng kaayusan sa pamamagitan ng paggamit ng mga paraang magalang at makatuwiran sa pagresolba sa mga di-pagkakaunawaan?=Mapayapang pagtugon sa mga alitan>Pagtanggap sa mga kaibahan+Pakikipagtalastasan nang may respeto<Pagsuporta sa kapwa",
"Alin sa mga sumusunod na pagsasakilos ng paggalang sa mga karapatan ng iba ang kumikilala sa kalayaan ng bawat batang magkaroon ng sariling pananaw at maihayag ito nang walang pag-aalinlangan?=Pagbibigay-galang sa opinyon ng iba>Pagtatanggol ng karapatan ng iba+Pakikipagtulungan sa komunidad<Makataong pakikisalamuha",
"Alin sa mga sumusunod na pagsasakilos ng paggalang sa mga karapatan ng iba ang tumutukoy sa pagtindig upang ipaglaban ang pagbibigay ng hustisya sa isang taong naaabuso o naaapi?=Pagtatanggol ng karapatan ng iba>Pagbibigay-galang sa opinyon ng iba+Pakikipagtulungan sa komunidad<Makataong pakikisalamuha",
"Alin sa mga sumusunod na pagsasakilos ng paggalang sa mga karapatan ng iba ang tumutukoy sa pakikilahok sa mga gawain ng pamayanang nagtataguyod sa mga karapatan ng mga bata?=Pakikipagtulungan sa komunidad>Pagbibigay-galang sa opinyon ng iba+Pagtatanggol ng karapatan ng iba<Makataong pakikisalamuha",
"Ang pagtulong sa isang kamag-aral na nahihirapan sa kanyang aralin, pagpapahiram ng gamit sa isang kasamahan, o simpleng pakikinig sa mga problema ng iba ay mga halimbawa ng alin sa mga sumusunod na pagsasakilos ng paggalang sa mga karapatan ng iba?=Makataong pakikisalamuha>Pagbibigay-galang sa opinyon ng iba+Pagtatanggol ng karapatan ng iba<Pakikipagtulungan sa komunidad",
"Ano ang ibig sabihin ng paggalang sa mga hangganan ng kapwa?=Pagrespeto sa kanilang personal na espasyo>Pagsang-ayon sa kanilang opinyon+Pagtindig laban sa mga nang-aapi sa kanila<Pagtanggap sa kanilang kultura",
"Alin sa mga sumusunod ang nagpapakita ng pagtanggap sa mga kaibahan ng kapwa?=Pantay-pantay na pagtrato sa bawat isa>Pagpapanggap na katulad ka ng iyong kausap+Pag-iwas sa mga taong hindi mo katulad<Pagsang-ayon sa lahat ng sinasabi ng iyong kausap",
"Alin sa mga sumusunod ang HINDI elemento ng pakikipagtalastasan nang may respeto?=Pangmamaliit ng kausap>Pakikinig nang maingat+Pagsasalita nang maayos<Pagpapahayag nang walang panlalait",
"Alin sa mga sumusunod ang HINDI maituturing na pagpapakita ng suporta sa kapwa bata?=Pagpapalala ng mga alitan>Pagbibigay ng tulong sa oras ng pangangailangan+Pakikinig at pagpapakita ng empatiya<Pakikilahok sa mga gawaing nagsusulong sa mga karapatan ng mga bata",
"Alin sa mga sumusunod ang HINDI isa sa mga tunay na layunin ng pagkilala sa mga karapatan ng kapwa bata?=Pagsusulong ng sariling kapakanan>Pag-iwas sa mga di-pagkakaunawaan+Pagpapanatili ng kaayusan at kapayapaan<Pagsusulong ng pagkakaisa",
"Alin sa mga sumusunod ang epekto ng pagpapakita ng empatiya sa kapwa?=Paglikha ng positibong ugnayan>Paglala ng alitan+Pag-iwas ng kapwa<Pagtaas ng tensyon",
"Alin sa mga sumusunod ang halimbawa ng mapayapang pagtugon sa mga alitan?=Pakikipag-usap nang malumanay hanggang maresolba ang problema>Pagsigaw sa kaalitan+Paggamit ng karahasan<Pag-iwas sa nakaalitan",
"Alin sa mga sumusunod ang maaaring gawin kapag nakakita ng pang-aapi sa kapwa bata?=Paghingi ng tulong sa nakatatanda upang maipagtanggol ang naapi>Paggamit ng karahasan upang maipagtanggol ang naapi+Pagbabalewala sa nasaksihang pang-aapi<Pag-iwas sa taong nang-api",

);

?>

</head>

</bod

</html>