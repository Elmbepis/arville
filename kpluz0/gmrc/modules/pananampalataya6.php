<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pananampalataya sa Diyos - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pananampalataya sa Diyos";
$_SESSION['tnum']="*63";

$questions=array(

"Alin sa mga sumusunod ang tunay na kahulugan ng pananampalataya?=Buhay na ugnayan sa Diyos>Pagsisimba kapag may okasyon+Pagsasaulo ng mga dasal<Pagbibigay ng limos sa simbahan",
"Bakit mahalaga ang pananampalataya sa panahon ng pagsubok?=Nagbibigay ito ng lakas upang hindi ka bumagsak>Nagiging awit ito ng pasasalamat+Nagpapaalala ito ng iyong mga kasalanan<Nagdudulot ito ng takot sa Diyos",
"Alin sa mga sumusunod ang tunay na kahulugan ng panalangin?=Taus-pusong pakikipag-usap sa Diyos>Paghingi ng mga pangangailangan+Pagsasabi ng paulit-ulit na mga salita<Isang obligasyong dapat gawin tuwing Linggo",
"Aling paraan ng pakikipag-ugnayan sa Diyos ang nagpapahalaga sa mga biyayang ibinibigay Niya sa atin?=Panalangin ng pasasalamat>Panalangin ng paghingi ng tawad+Panalangin ng paghingi ng gabay<Panalangin ng katahimikan",
"Aling paraan ng pakikipag-ugnayan sa Diyos ang ginagawa natin kapag nagsisisi tayo sa nagawang kasalanan?=Panalangin ng paghingi ng tawad>Panalangin ng pasasalamat+Panalangin ng paghingi ng gabay<Panalangin ng katahimikan",
"Aling paraan ng pakikipag-ugnayan sa Diyos ang ginagawa natin upang makakuha sa Kanya ng karunungan o patnubay?=Panalangin ng paghingi ng gabay>Panalangin ng pasasalamat+Panalangin ng paghingi ng tawad<Panalangin ng katahimikan",
"Aling paraan ng pakikipag-ugnayan sa Diyos ang hindi nangangailangan ng mga salita?=Panalangin ng katahimikan>Panalangin ng pasasalamat+Panalangin ng paghingi ng tawad<Panalangin ng paghingi ng gabay",
"Alin sa mga sumusunod ang dapat mong gawin bago ka matulog?=Magpasalamat sa Diyos sa mga nangyari sa araw na iyon>Humingi sa Diyos ng bagong cellphone+Magreklamo sa Diyos tungkol sa iyong mga problema<Manood ng TV hanggang makatulog",
"Alin sa mga sumusunod ang maaari mong sabihin sa pananalangin ng paghingi ng gabay?=Panginoon, patnubayan po Ninyo ako.>Panginoon, bigyan po Ninyo ako ng pera.+Panginoon, parusahan po Ninyo ang aking kaaway.<Panginoon, gawin po Ninyo akong sikat.",
"Alin sa mga sumusunod ang epekto ng matatag na pananampalataya sa pagharap mo sa isang problema?=Hindi ka madaling mawalan ng pag-asa>Sumusuko ka agad+Lagi kang umiiyak at nagrereklamo<Iniiwasan mo ang paglutas dito",
"Alin sa mga sumusunod ang isang paraan ng pagsasabuhay ng pakikipag-ugnayan sa Diyos?=Pagtatakda ng oras ng panalangin araw-araw>Pagdarasal tuwing may problema lamang+Pagsisimba tuwing Pasko lamang<Pagdarasal lamang kapag pinasama ng magulang",
"Bakit espesyal ang pananalanging kasama ang pamilya?=Dahil nagkakaisa kayo sa paglapit sa Diyos>Dahil mas maririnig kayo ng Diyos+Dahil hahangaan kayo ng mga kapitbahay na nakaririnig sa inyo<Dahil makakaiwas ka sa mga gawaing-bahay",
"Ano ang matutuklasan mo tungkol sa Diyos kapag regular kang nananalangin?=Na ang Diyos ay mahabagin, matiyaga, at hindi sumusuko sa iyo>Na ang Diyos ay malupit at mapaghiganti+Na walang pakialam sa iyo ang Diyos<Na ang Diyos ay hindi palaging nandiyan",
"Bakit hindi lahat ng ating mga panalangin ay nasasagot sa paraang gusto natin?=Dahil alam ng Diyos kung ano ang makabubuti sa atin>Dahil mali ang ginawa nating pananalangin+Dahil may nagawa tayong ikinagalit ng Diyos<Dahil hindi tayo karapat-dapat pagbigyan",
"Ano ang dapat mong gawin kung hindi sanay sa sama-samang pagdarasal ang iyong pamilya?=Magsimula nang mag-isa at unti-unti silang yayain>Pilitin silang magdasal kahit ayaw nila+Huwag na lang magdasal kahit mag-isa<Hayaan ang pamilya at magdasal na lamang nang mag-isa",
"Alin sa mga sumusunod ang hindi dapat matagpuan sa isang 'family prayer corner'?=Laruan>Imahen o larawan ng isang santo+Krus o rosaryo<Bibliya",
"Bakit mahalagang magdasal hindi lamang para sa iyong sarili kundi para rin sa iba?=Para matuto kang magmahal nang walang kapalit>Para purihin ka ng ibang tao+Para hindi ka parusahan ng Diyos<Para suwertehin ka sa buhay",
"Ano ang pangunahing layunin ng pagsusulat sa isang 'prayer journal'?=Upang makita mo kung paano sinagot ng Diyos ang iyong mga panalangin sa paglipas ng panahon>Upang mapatunayan mong walang sinasagot ang Diyos sa mga panalangin mo+Upang hindi mo makalimutan ang mga dasal<Upang hindi ka makalimot sa pagadarasal araw-araw",
"Ano ang dapat mong gawin kapag ikaw ay natutuksong gumawa ng masama?=Huminto at magdasal kahit sandali lamang>Magpadala sa tukso at humingi na lamang ng tawad pagkatapos+Huwag nang magdalawang-isip at gawin agad ang gusto nang hindi nakukunsensya<Huminto at mag-isip muna kung paano makakalusot sa gagawin",
"Alin sa mga sumusunod ang hindi isa sa mga paraan kung paano sumasagot ang Diyos sa iyong panalangin?=Sa pamamagitan ng isang tuksong gumawa ka ng masama>Sa pamamagitan ng iyong konsensiya+Sa pamamagitan ng iyong nababasa sa Bibliya<Sa pamamagitan ng mga taong nasa paligid mo",
"Alin sa mga sumusunod ang isa sa mga bunga ng palagiang pananalangin kasama ang pamilya?=Mas matatag na samahan ng pamilya>Mas maraming di-pagkakaunawaan sa pamilya+Mas marangyang buhay ng pamilya<Mas kaunting oras para magsama-sama",
"Alin sa mga sumusunod ang epekto ng pagpapatawad sa pamamagitan ng panalangin?=Ang galit ay napapalitan ng pag-unawa>Ang pag-unawa ay napapalitan ng galit+Walang di-pagkakaunawaan sa pamilya ang naaayos<Nawawala ang tiwala sa bawat isa",
"Ano ang epekto sa mga nakababata mong kapatid ng iyong pananalangin?=Natututo rin silang magdasal>Natatakot sila at lumalayo+Ginugulo nila ang iyong pagdarasal<Nagsasawa sila at umaayaw na sa pagdarasal",
"Alin sa mga sumusunod ang hindi kabilang sa mga bunga ng palagiang pananalangin kasama ang pamilya?=Mas maraming di-pagkakaunawaan>Mas matatag na samahan ng pamilya+Kapayapaan sa tahanan<Lakas sa panahon ng pagsubok",
"Ano ang maaari mong sabihin sa iyong mga magulang upang yayain sila sa sama-samang pagdarasal?=Ma, Pa, gusto ko po sanang magdasal tayo nang sabay-sabay bago matulog.>Ma, Pa, obligado po kayong sumama sa aking pagdarasal.+Ma, Pa, parurusahan po kayo ng Diyos kung hindi kayo sasamang magdasal.<Ma, Pa, mukhang ayaw nyo pong magdasal kaya huwag na lang.",

);

?>

</head>

</body

</html>