<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagpasalamat sa Magulang - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagpasalamat sa Magulang";
$_SESSION['tnum']="*56";

$questions=array(

"Alin sa mga sumusunod ang isang paraan ng pagpapakita ng pasasalamat sa mga magulang?=Pagtulong sa bahay>Pag-aaral ng bagong sayaw+Paglalaro ng basketbol<Pamamasyal sa mall",
"Ang respeto sa magulang ay maipapakita sa pamamagitan ng alin sa mga sumusunod?=Paggamit ng magalang na pananalita>Pagtataas ng boses+Pag-alis habang kinakausap<Hindi pakikinig sa kanilang payo",
"Bakit mahalaga ang pagpapasalamat sa ating mga magulang?=Pagpapahalaga ito sa kanilang mga sakripisyo>Paraan ito para makakuha ng gantimpala mula sa kanila+Paraan ito para hindi nila tayo pagalitan<Pagpapakita ito na mas mabait tayo kaysa sa ibang tao",
"Ano ang nararamdaman ng isang magulang kapag naririnig niya ang katagang \"mahal ko po kayo\" mula sa kanyang anak?=Labis na kaligayahan>Katiting na kagalakan+Bahagyang pagkatuwa<Kaunting saya",
"Alin sa mga sumusunod ang isa sa mga epekto ng taos-pusong pasasalamat sa pamilya?=Matatag na samahan sa pamilya>Madalas na tampuhan+Kawalan ng tiwala ng lahat sa bawat isa<Bihirang pagsasama-sama sa mga aktibidad",
"Alin sa mga sumusunod ang hindi halimbawa ng simpleng paraan ng pagpapakita ng pagmamahal ng isang bata sa magulang?=Pagbibigay ng mamahaling regalo>Pagyakap+Pagsasabing mahal mo sila<Pagpapakita ng paggalang",
"Ano ang dapat mong gawin kapag napagalitan ka ng iyong magulang?=Makinig at unawain ang dahilan>Sumagot nang pabalang+Umiyak sa loob ng kuwarto<Huwag silang kibuin nang ilang araw",
"Alin sa mga sumusunod ang nagpapakita ng pagiging mapagpasalamat sa mga magulang?=Pag-aaral nang mabuti sa paaralan>Paglilihim ng iyong tunay na damdamin+Pagpapabaya sa mga gamit na ibinigay nila<Pagkuha ng pagkaing hindi mo kayang ubusin",
"Ano ang dahilan kung bakit hindi agad napapansin ng mga anak ang mga sakripisyo ng kanilang mga magulang?=Tahimik lamang kasi silang nagtatrabaho araw-araw>Palagi kasing mainit ang kanilang ulo pagkagaling sa trabaho+Hindi kasi sila nag-aasikaso sa mga anak<Inuuna kasi nila ang kanilang sarili",
"Alin sa mga sumusunod ang nagpapakita ng malasakit sa mga magulang?=Pagtulong sa paghahanda ng mesa araw-araw>Pagtangging sumunod sa mga utos+Paglalaro ng video games buong araw<Pagbili ng mamahaling gadyet",
"Bilang bata, ang pasasalamat mo sa iyong mga magulang ay maipapakita mo araw-araw sa pamamagitan ng alin sa mga sumusunod?=Pagtulong sa mga gawain sa bahay>Pagbibigay sa kanila ng mamahaling regalo+Pagpapakain sa kanila sa mamahaling restaurant<Pag-aambag sa pambili ng mga pangangailangan ng pamilya",
"Alin sa mga sumusunod ang isa sa mga epekto ng pagiging mapagpasalamat sa mga magulang?=Mas bukas na komunikasyon sa pamilya>Mas maraming alitan sa pamilya+Madalas na pagkabigo sa mga gawain<Pagkakalayo ng loob ng bawat isa",
"Alin sa mga sumusunod ang hindi mo dapat gawin kapag binibigyan ka ng magandang payo ng iyong mga magulang?=Pagtanggi agad sa payo>Pakikinig nang mabuti sa payo+Pagsunod sa payo<Pag-unawa nang malalim sa payo",
"Alin sa mga sumusunod ang nagpapakita ng pasensiya kapag may di-pagkakaunawaan sa pamilya?=Pagiging mahinahon sa pagpapaliwanag>Pakikipagtalo nang pasigaw+Pagdadabog habang nagsasalita<Paninisi sa kausap",
"Alin sa mga sumusunod ang hindi kailangang gawin upang maipakita ang pasasalamat sa mga magulang?=Pagbibigay ng mamamahaling regalo sa kanila>Pag-aaral nang mabuti+Paggalang sa kanila sa lahat ng oras<Pagpapahalaga sa kanilang mga sakripisyo",
"Alin sa mga sumusunod ang hindi makatutulong sa pagpapatatag ng samahan ng pamilya?=Paglilihim>Pagmamahal+Pagpapasalamat<Paggalang",
"Alin sa mga sumusunod ang hindi halimbawa ng magagandang 'gestures' na maaari nating gawin para sa ating mga magulang?=Pagkalimot sa kanilang mga kaarawan>Pagsulat sa kanila ng isang magandang liham+Pagguhit ng kanilang larawan<Paggawa ng card na may magandang mensahe para sa kanila",
"Bakit mas magaan ang bawat araw sa isang pamilyang puno ng pasasalamat?=May pagkakaunawaan ang bawat isa rito>Walang nag-uusap sa loob nito+Palaging nagtatalo ang mga miyembro nito<May inggitan sa pagitan ng mga kasapi nito",
"Alin sa mga sumusunod ang hindi mo dapat ipakita kapag may tampuhan kayo ng iyong mga magulang?=Paninisi>Pag-unawa+Pasensiya<Pakikinig",
"Alin sa mga sumusunod ang hindi isa sa mga ginagawa ng ating mga magulang kung bakit tayo dapat magpasalamat sa kanila?=Pinababayaan nila tayo>Minamahal nila tayo+Ginagabayan nila tayo<Ibinibigay nila ang ating mga pangangailangan",
"Ano ang dapat mong gawin kapag abala ang iyong mga magulang sa mga gawaing-bahay?=Mag-alok ng tulong sa kanila>Umiwas sa kanilang mga ginagalawan+Magkulong muna sa kuwarto<Mamasyal muna sa labas",
"Alin sa mga sumusunod ang makakatulong sa samahan ng pamilya?=Pagkakaroon ng malasakit sa bawat isa>Pagkikimkim ng sama ng loob+Paninisi sa isang kapamilya<Madalas na pagrereklamo",
"Upang makapagpakita ng pasasalamat sa iyong mga magulang, alin sa mga sumusunod ang hindi mo dapat gawin?=Pagsagot nang pabalang>Pagyakap at paghalik sa kanila+Pag-aaral nang mabuti<Pakikinig sa kanilang mga sinasabi",
"Kailan mo dapat ipakita ang iyong pasasalamat sa iyong mga magulang?=Araw-araw sa pamamagitan ng mga simpleng paraan>Tuwing may okasyon lamang+Kapag may gusto kang hingin sa kanila<Pagkatapos ka nilang mapagalitan",
"Alin sa mga sumusunod ang dapat ipakita ng lahat kapag may problema ang pamilya?=Pagkakaisa>Pagiging makasarili+Pag-iinggitan<Kawalan ng pag-asa",

);

?>

</head>

</bod

</html>