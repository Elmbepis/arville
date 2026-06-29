<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagmahal - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagmahal";
$_SESSION['tnum']="*78";

$questions=array(

"Alin sa mga sumusunod ang pangunahing yunit ng lipunan kung saan unang natutunan ng isang bata ang pagmamahal?=Pamilya>Pamayanan+Simbahan<Paaralan",
"Alin sa mga sumusunod ang pinakamainam na paraan upang ipakita ang pagmamahal sa pamilya?=Pagsasakripisyo ng personal na oras para sa kanila>Pag-iwas sa kanila upang magkaroon ng kapayapaan+Pagbibigay ng materyal na bagay<Paglilihim ng problema mula sa kanila",
"Ano ang kahalagahan ng pagpapaabot ng suportang emosyonal sa pamilya?=Nagpapalakas ito ng loob ng bawat isa>Nagtuturo ito ng bagong kaalaman+Nagtuturo ito ng tamang asal<Naghahatid ito ng payo",
"Ang simpleng pakikipagkwentuhan at pagsasama-sama sa pagkain ay mga halimbawa ng alin sa mga sumusunod na paraan ng wastong pagpapakita ng pagmamahal?=Pagbibigay ng oras at pansin>Pag-aalaga sa bawat isa+Pagsasakripisyo para sa pamilya<Pagpapatawad at pag-unawa",
"Ang pag-aaruga sa kapamilyang may sakit ay halimbawa ng alin sa mga sumusunod na paraan ng wastong pagpapakita ng pagmamahal?=Pag-aalaga sa bawat isa>Pagsuporta sa mga interes ng bawat isa+Pagsasakripisyo para sa pamilya<Pagdiriwang ng mga tagumpay",
"Ang pagsasabi ng mga positibong salita, pag-udyok sa pag-abot ng mga pangarap, at pagtulong sa pagharap sa mga hamon ay mga halimbawa ng alin sa mga sumusunod na paraan ng wastong pagpapakita ng pagmamahal?=Pagpapaabot ng suportang emosyonal>Pagpapakita ng pisikal na pagmamahal+Pagsasakripisyo para sa pamilya<Pagpapatawad at pag-unawa",
"Alin sa mga sumusunod na paraan ng wastong pagpapakita ng pagmamahal ang tumutukoy sa pagsasantabi ng personal na kagustuhan o kaligayahan para sa ikabubuti ng pamilya?=Pagsasakripisyo para sa pamilya>Pagdiriwang ng mga tagumpay+Pagpapaabot ng suportang emosyonal<Pagpapatawad at pag-unawa",
"Ang pagpapanatili ng kapayapaan sa loob ng pamilya sa kabila ng mga pagkakaiba ng pananaw at hindi pagkakaintindihan ay pangunahing layunin ng alin sa mga sumusunod na paraan ng wastong pagpapakita ng pagmamahal?=Pagpapatawad at pag-unawa>Pag-aalaga sa bawat isa+Pagpapaabot ng suportang emosyonal<Pagsasakripisyo para sa pamilya",
"Alin sa mga sumusunod na paraan ng wastong pagpapakita ng pagmamahal ang tumutukoy sa pagtanaw ng utang na loob at pagpapahalaga sa mga bagay na natatamo mula sa mga kapamilya?=Pagpapakita ng pasasalamat>Pag-aalaga sa bawat isa+Pagsasakripisyo para sa pamilya<Pagtuturo ng tama",
"Ang pagtitiyak na hindi nag-iisa ang isang kapamilya sa pagkakamit ng kanyang mga pinapangarap ay tumutukoy sa alin sa mga sumusunod na paraan ng wastong pagpapakita ng pagmamahal?=Pagsuporta sa mga interes ng bawat isa>Pagpapakita ng pasasalamat+Pagsasakripisyo para sa pamilya<Pagpapatawad at pag-unawa",
"Ang mga simpleng kilos tulad ng pagyakap, paghalik, o paghawak sa kamay ay mga halimbawa ng alin sa mga sumusunod na paraan ng wastong pagpapakita ng pagmamahal?=Pagpapakita ng pisikal na pagmamahal>Pagtuturo ng tama+Pagsasakripisyo para sa pamilya<Pagpapatawad at pag-unawa",
"Alin sa mga sumusunod na paraan ng wastong pagpapakita ng pagmamahal ang tumutukoy sa pagbabahagi ng kaalaman at karanasan upang mahubog ang karakter ng isang kapamilya?=Pagtuturo ng tama>Pag-aalaga sa bawat isa+Pagpapakita ng pasasalamat<Pagpapaabot ng suportang emosyonal",
"Alin sa mga sumusunod na paraan ng wastong pagpapakita ng pagmamahal ang kadalasang isinasagawa sa pamamagitan ng pagdaraos ng isang maliit na salu-salo?=Pagdiriwang ng mga tagumpay>Pagtuturo ng tama+Pagpapakita ng pisikal na pagmamahal<Pagpapaabot ng suportang emosyonal",
"Ano ang layunin ng pagdiriwang ng mga tagumpay sa pamilya?=Iparamdam ang pagmamahal at suporta>Magyabang sa ibang tao+Inggitin ang mga hindi kasundo<Pagtakpan ang mga hindi magandang pangyayari",
"Alin sa mga sumusunod ang hindi halimbawa ng pisikal na pagpapakita ng pagmamahal sa pamilya?=Pagpuri>Pagyakap+Paghalik<Pag-akbay",
"Ano ang pangunahing layunin ng pagsuporta sa mga interes at pangarap ng bawat miyembro ng pamilya?=Magpalakas ng kumpiyansa>Magbahagi ng kaalaman+Magbigay ng gabay<Magturo ng pagpapakumbaba",
"Alin sa mga sumusunod ang hindi kabilang sa mga dapat gawin upang maipakita ang pagmamahal sa isang kapamilyang may sakit?=Iwasan siya>Alagaan siya+Pagsilbihan siya<Aliwin siya",
"Paano ipinapakita ang pagmamahal sa pamilya sa oras ng pagsubok?=Pagbibigay ng emosyonal na suporta>Pag-iwas sa pagtalakay sa problema+Pansamantalang paglipat ng tirahan<Paninisi sa bawat isa",
"Ano ang dapat gawin kapag may alitan o hindi pagkakaintindihan sa loob ng pamilya?=Pagpapatawad at pag-unawa>Pagkikimkim ng galit+Pagtatalo nang harapan<Pag-iwas sa bawat isa",
"Ano ang pangunahing layunin ng pagpapakita ng pasasalamat sa bawat miyembro ng pamilya?=Ipakita ang pagpapahalaga sa kanilang nagawa>Makahingi ng dagdag na benepisyo+Makakuha ng papuri sa pamilya<Mapahanga ang ibang tao",
"Ano ang pangunahing layunin ng pagbibigay ng oras sa pamilya?=Palakasin ang ugnayan at pagmamahalan>Magbahagi ng kaalaman+Makakuha ng papuri sa pamilya<Magbigay ng kontribusyong pinansyal",
"Ano ang pangunahing layunin ng pagtuturo ng mga tamang aral at pagpapahalaga sa mga bata?=Paghuhubog ng kanilang karakter>Pagpaparusa sa mga kasalanan+Pagpapakita ng pasasalamat<Pagbibigay ng kumpiyansa",
"Ano ang epekto ng pagmamahal ng pamilya sa isang indibidwal?=Nagiging mapagbigay at responsable siya>Nagiging makasarili siya+Nagiging matalino siya<Nagiging mapagmataas siya",
"Alin sa mga sumusunod ang HINDI nagpapakita ng pagmamahal sa mga magulang?=Pagwawalambahala ng kanilang pananaw>Pag-aalaga sa kanila kapag matanda na sila+Patuloy na paghingi ng payo at pagsunod sa kanila<Pagbibigay ng suportang pinansyal sa kanila",
"Alin sa mga sumusunod ang HINDI nakakatulong sa pagpapanatili ng kapayapaan sa pamilya?=Pagmamalaki>Pagpapatawad+Pag-unawa<Sinserong pakikipag-usap",

);

?>

</head>

</bod

</html>