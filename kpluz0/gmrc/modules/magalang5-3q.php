<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Magalang sa mga Nakatatanda - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Magalang sa mga Nakatatanda";
$_SESSION['tnum']="*5e";

$questions=array(

"Alin sa mga sumusunod ang nagpapakita ng paggalang sa isang nakatatanda?=Pag-aalok ng upuan sa kanya sa pampublikong sasakyan>Pag-alis habang siya ay nagsasalita+Pagsagot nang pasigaw<Pagkukunwaring hindi siya napansin",
"Ang pag-akay sa isang lola habang siya ay tumatawid ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapakita ng paggalang sa nakatatanda?=Pag-alalay>Paggamit ng magalang na pananalita+Pagmamano at pagbati<Pagpapahayag ng pasasalamat",
"Ang paggamit ng \"po\" at \"opo\" sa pakikipag-usap sa mga nakatatanda ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapakita ng paggalang sa kanila?=Paggamit ng magalang na pananalita>Pag-alalay+Pagmamano at pagbati<Pagpapahayag ng pasasalamat",
"Ang pagsasabi ng \"Magandang umaga po\" kapag may nakasalubong na matanda ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapakita ng paggalang sa nakatatanda?=Pagmamano at pagbati>Pag-alalay+Pag-aalok ng tulong<Pagpapahayag ng pasasalamat",
"Alin sa mga sumusunod na paraan ng pagpapakita ng paggalang sa nakatatanda ang tumutukoy sa pagbigkas ng pagpapahalaga sa mga nagawa nila para sa atin noong malakas pa sila?=Pagpapahayag ng pasasalamat>Pag-alalay+Pag-aalok ng tulong<Pagmamano at pagbati",
"Ang hindi pagsagot sa ating mga magulang ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapakita ng paggalang sa nakatatanda?=Pagpapakita ng kababaang-loob>Pag-alalay+Pag-aalok ng tulong<Pagmamano at pagbati",
"Ang paghingi ng pahintulot na buhatin ang dala ng isang matanda ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapakita ng paggalang sa nakatatanda?=Pag-aalok ng tulong>Pagpapahayag ng pasasalamat+Pakikinig nang mabuti<Pagmamano at pagbati",
"Ang paglilinis ng bahay at pagdidilig ng hardin ay mga halimbawa ng alin sa mga sumusunod na paraan ng pagpapakita ng paggalang sa nakatatanda?=Pagtulong sa mga gawaing bahay>Paggamit ng magalang na pananalita+Pakikinig nang mabuti<Pagmamano at pagbati",
"Alin sa mga sumusunod ang hindi nagpapakita ng respeto sa mga nakatatanda?=Pagsagot sa kanila nang padabog>Pakikinig sa kanilang mga kwento+Pagmamano sa kanila<Pag-aalok sa kanila ng tulong",
"Alin sa mga sumusunod ang hindi nagpapakita ng respeto sa mga nakatatanda?=Pag-iwas sa kanilang mga kuwento>Pagsunod sa kanilang mga payo+Pagbati sa kanila<Pagdadala ng kanilang mga bitbit",
"Bakit kailangan nating makinig sa mga payo ng mga nakatatanda sa atin?=Dahil sila ay may karunungang makakatulong sa atin>Para hindi sila magalit sa atin+Para maituro sa kanila kung ano ang mali sa sinasabi nila<Dahil nakakaaliw ang mga payo nila",
"Alin sa mga sumusunod ang magagawa mo para maipakita ang kababaang-loob sa mga matatanda?=Pakikinig sa kanila at hindi pagsagot nang pabalang>Pagyayabang ng sariling kakayahan+Pagtawa sa kanilang mga payo<Pag-iwas sa kanilang pagpapaalala",
"Alin sa mga sumusunod ang dapat mong gawin kapag hindi ka sang-ayon sa sinasabi ng iyong mga magulang?=Makinig nang mahinahon at igalang ang kanilang pananaw>Makipagtalo nang pasigaw+Pigilin ang pag-uusap at umalis<Magkulong muna sa kuwarto",
"Alin sa mga sumusunod ang magalang na pagkilos tungo sa mga matatanda?=Pag-alalay sa kanilang paglalakad>Paglalaro malapit sa kanila+Pag-iingay sa tabi nila<Pagpapakita ng inip habang kausap sila",
"Alin sa mga sumusunod ang nagpapakita ng pagiging mapagpasalamat sa mga nakatatanda?=Pagpapahalaga sa mga payo nila>Pagputol sa kanilang pagkukuwento+Pakikipagtalo sa kanila<Hindi pagpansin sa kanilang pagsasakripisyo",
"Alin sa mga sumusunod ang kaugaliang Pilipinong nagpapakita ng respeto sa mga matatanda?=Pagmamano sa kanila>Pagpapaputok kapag Bagong Taon+Pagsasaya tuwing pista<Pagdedekorasyon para sa Pasko",
"Alin sa mga sumusunod ang hindi dapat natin gawin sa isang nakatatanda sa atin?=Pangungutya sa kanyang pagkilos>Pakikinig sa kanyang payo+Pagbibigay sa kanya ng tulong<Pagiging magalang sa pakikipag-usap sa kanya",
"Paano nakakatulong sa ating pagkatao ang pagbibigay-galang natin sa matatanda?=Natututo tayong magpakumbaba at magmalasakit>Nasasanay tayong maging makasarili+Natututo tayong manghingi ng pabor sa kanila<Nasasanay tayong magmataas sa kapwa",
"Alin sa mga ito ang dapat mong gawin para makapagpakita ng malasakit sa mga matatanda sa inyong tahanan?=Pagtulong sa mga gawaing bahay>Paglalaro sa labas buong araw+Pag-iingay habang natutulog sila<Pamamasyal kasama ang mga kaibigan",
"Alin sa mga ito ang magandang dahilan kung bakit dapat tayong magpakita ng respeto sa mga matatanda?=Nagiging mabuting halimbawa tayo sa iba>Nakapagmamataas tayo sa kanila+Napupuri tayo ng ating mga guro<Nakakahingi tayo sa kanila ng gusto natin",
"Alin sa mga sumusunod ang hindi ginagawa ng isang magalang na bata sa mga matatanda?=Pagbabalewala sa kanilang mga pangangailangan>Pakikinig sa kanilang mga kuwento+Pag-aalok sa kanila ng tulong<Pakikipag-usap sa kanila nang magalang",
"Kung mainit ang ulo ng iyong lolo, alin sa mga ito ang dapat mong gawin kapag kinausap mo siya?=Makinig at huwag sumagot nang pabalang>Magtaas ng boses+Gawing biro o katatawanan ang kanyang pagsasalita<Tumalikod habang nakikipag-usap",
"Alin sa mga sumusunod ang hindi nararamdaman ng isang matandang iginagalang ng kanyang mga mahal sa buhay?=Pagsisisi>Pagkakaroon ng halaga+Saya<Kapanatagan",
"Alin sa mga ito ang hindi kabilang sa mga epekto sa buong komunidad ng pagiging magalang ng lahat sa mga matatanda?=Mataas na antas ng krimen>Pagkakaisa+Kapayapaan<Paglaganap ng kabutihan",
"Alin sa mga sumusunod ang magiging epekto ng hindi pagbibigay-galang sa mga nakatatanda?=Pagkasira ng mga ugnayan sa iba>Paghaba ng sariling pasensya+Pagdami ng mga kaibigan<Personal na pag-unlad",
 
);

?>

</head>

</bod

</html>