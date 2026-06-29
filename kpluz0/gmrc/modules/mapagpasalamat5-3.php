<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagpasalamat sa mga OFW - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagpasalamat sa mga OFW";
$_SESSION['tnum']="*5i";

$questions=array(

"Bakit tinatawag na isang pangunahing haligi ng pambansang ekonomiya ang mga OFW?=Dahil ang perang ipinapadala nila ay umiikot sa mga negosyo sa ating bansa>Dahil ang kanilang mga pasalubong ay nagpapasaya sa kanilang pamilya+Dahil marami silang binibili sa ibang bansa<Dahil ang kanilang pag-uwi ay inaabangan ng kanilang mga mahal sa buhay",
"Alin sa mga sumusunod ang hindi isa sa mga katangiang ipinapakita ng mga OFW sa ibang bansa?=Pagiging tamad>Pagiging masayahin+Pagiging madiskarte<Pagiging responsable",
"Alin sa mga sumusunod ang pinakamalaking pagsubok sa isang OFW habang nagtatrabaho sa ibang bansa?=Pagkakalayo sa pamilya>Pagkakaroon ng maraming pera+Pagiging malaya sa problema<Pagkakaroon ng maraming kaibigan",
"Alin sa mga sumusunod na hamon sa isang OFW ang may kaugnayan sa pagkakalayo niya sa kanyang pamilya nang matagal?=Kalungkutan>Mahirap na trabaho+Malupit na amo<Panganib",
"Alin sa mga sumusunod na hamon sa isang OFW ang tumutukoy sa napakahabang oras ng paggawa ng mga nakakapagod na gawain?=Mahirap na trabaho>Kalungkutan+Malupit na amo<Panganib",
"Ang hindi pagpapakain nang tama at pananakit sa mga kababayan nating 'domestic helper' ng kanilang pinagsisilbihan ay halimbawa ng alin sa mga sumusunod na hamon sa mga OFW?=Malupit na amo>Kalungkutan+Mahirap na trabaho<Panganib",
"Ang pagtatrabaho sa mga bansang may digmaan, rebolusyon, o terorismo ay halimbawa ng alin sa mga sumusunod na hamon sa mga OFW?=Panganib>Kalungkutan+Malupit na amo<Mahirap na trabaho",
"Alin sa mga sumusunod na paraan ng pagpapasalamat sa mga OFW ang tumutukoy sa pagsusulat ng liham o pagpapadala ng 'video message' sa kamag-anak na OFW?=Pagpapanatili ng ugnayan>Paggalang ng mga bata sa mga kasamang kapamilya+Pagiging mabuting kaibigan sa mga anak ng OFW<Pag-aaral nang mabuti",
"Alin sa mga sumusunod na paraan ng pagpapasalamat sa mga OFW ang tumutukoy sa pagpapakita ng mga anak ng OFW ng pagmamahal sa mga kapamilyang naiwang nag-aaaruga sa kanila, tulad ng mga tiyo at tiya?=Paggalang ng mga bata sa mga kasamang kapamilya>Pagpapanatili ng ugnayan+Pagiging mabuting kaibigan sa mga anak ng OFW<Pag-aaral nang mabuti",
"Alin sa mga sumusunod na paraan ng pagpapasalamat sa mga OFW ang maipapakita ng sinumang bata sa pamamagitan ng pag-iwas sa anumang biro o komentaryong maaaring makasakit sa damdamin ng mga anak ng OFW?=Pagiging mabuting kaibigan sa mga anak ng OFW>Pagpapanatili ng ugnayan+Paggalang ng mga bata sa mga kasamang kapamilya<Pag-aaral nang mabuti",
"Alin sa mga sumusunod na paraan ng pagpapasalamat sa mga OFW ang maipapakita ng mga batang suportado ng isang OFW sa pamamagitan ng pagsisikap na makakuha ng matataas na marka sa paaralan?=Pag-aaral nang mabuti>Pagpapanatili ng ugnayan+Pagpapalaganap ng kaalaman tungkol sa mga OFW<Pagiging mabuting kaibigan sa mga anak ng OFW",
"Ang paglikha ng isang \"Thank You\" card, sanaysay, o tulang nagpapahayag ng pasasalamat sa isang OFW ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapasalamat sa mga OFW?=Pagbuo ng mensahe ng pasasalamat>Pagpapalaganap ng kaalaman tungkol sa mga OFW+Pagiging mabuting kaibigan sa mga anak ng OFW<Pag-aaral nang mabuti",
"Ang pagpili ng paksang may kaugnayan sa OFW sa mga proyekto o talakayan sa paaralan ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapasalamat sa mga OFW?=Pagpapalaganap ng kaalaman tungkol sa mga OFW>Pagbuo ng mensahe ng pasasalamat+Pagiging mabuting kaibigan sa mga anak ng OFW<Pagpapanatili ng ugnayan",
"Alin sa mga sumusunod ang hindi nararanasan ng karamihan sa mga OFW?=Pagkakaroon ng madali at komportableng trabaho>Kalungkutan dahil malayo sa pamilya+Mahahabang oras ng pagtatrabaho<Pananabik makauwi",
"Bakit itinuturing na mga bayani ang mga OFW?=Dahil nagsasakripisyo sila para sa pamilya at bansa, hindi para sa sarili>Dahil marami silang pera+Dahil marami silang natututunan sa ibang bansa<Dahil idolo sila ng marami nilang kamag-anak",
"Ano ang bunga ng pagbibiro sa isang anak ng OFW tungkol sa kanyang pagkakalayo sa kanyang magulang?=Nakakasakit ito ng damdamin ng anak ng OFW>Napapatawa nito ang anak ng OFW+Napapalakas nito ang loob ng bata<Wala itong epekto dahil biro lang naman",
"Alin sa mga sumusunod ang magagawa ng isang anak ng OFW upang mapanatili ang kanyang ugnayan sa kanyang magulang na nasa malayong lugar?=Regular na komunikasyon tulad ng video call>Paggunita sa kanilang mga masasayang sandali+Pagdarasal para sa kaligtasan ng magulang na OFW<Pagtitig sa larawan ng magulang na OFW",
"Bakit dapat magpakita ang isang anak ng OFW ng paggalang sa mga kapamilyang nag-aalaga sa kanya?=Para hindi mag-alala ang magulang na OFW>Para kabahan ang magulang na OFW tungkol sa kanilang situwasyon+Para padalhan siya ng pera ng magulang na OFW<Para umuwi agad ang magulang na OFW",
"Alin sa mga sumusunod ang hindi kabilang sa mga itinuturing na panganib na kinakaharap ng ilang OFW sa kanilang bansang pinagtatrabahuhan?=Culture shock>Digmaan+Rebolusyon<Terorismo",
"Ano ang pinakamagandang balitang maibibigay ng isang bata sa kanyang magulang na OFW?=Pagiging honor student sa paaralan>Pagbagsak sa isang subject sa paaralan+Nakakagulat na tsismis tungkol sa isang kapitbahay<Paglago ng ekonomiya ng ating bansa",
"Alin sa mga sumusunod ang hindi dapat isulat ng isang bata sa liham na ipapadala niya sa magulang na OFW?=Mga hinaing at reklamong hindi naman mahalaga>Pagpapahayag ng pagmamahal at suporta+Paglalahad ng mga nangyayari sa paaralan<Mga balita tungkol sa kalagayan ng pamilya",
"Bakit mo kailangang maging mapag-unawa sa isang kaibigang anak ng isang OFW?=Dahil nalulungkot o nahihirapan siya sa pagkakalayo ng kanyang magulang>Dahil madali siyang nakakahingi ng pera sa magulang na OFW+Dahil marami siyang laruan mula sa ibang bansa<Dahil madalas siyang makatanggap ng bagong damit mula sa magulang na OFW",
"Kapag bumalik na ang isang OFW, paano makakatulong sa Pilipinas ang mga kaalaman at kasanayang nakuha niya mula sa pagtatrabaho niya sa ibang bansa?=Maituturo niya ang mga ito sa mga lokal na manggagawa>Ang mga ito ang magpapaalala sa kanya tungkol sa bansang pinanggalingan+Maipagmamalaki niya ang mga ito sa kanyang mga kaibigan<Maisusulat niya ang mga ito sa kanyang diary",
"Ano ang karaniwang nararamdaman ng mga OFW tuwing sasapit ang Pasko o kaarawan ng isang kapamilya?=Matinding pangungulila>Kawalan ng pag-asa+Pag-aalala tungkol sa kinabukasan ng pamilya<Mababang tiwala sa sarili",
"Alin sa mga sumusunod ang hindi dapat gawin ng isang anak ng OFW?=Hindi pagsunod sa mga utos ng kapamilyang nag-aalaga sa kanya>Pagtulong sa mga gawaing-bahay+Pagsisikap sa pag-aaral<Pagpapanatili ng ugnayan sa magulang na OFW",

);

?>

</head>

</bod

</html>