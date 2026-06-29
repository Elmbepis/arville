<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagkumbaba - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagkumbaba";
$_SESSION['tnum']="*4d";

$questions=array(

"Alin sa mga sumusunod ang isang elemento ng pagiging mapagkumbaba?=Pagkilala sa sariling pagkukulang>Pagmamalaki ng sarili sa iba+Pagbabalewala sa mga natatamong biyaya<Pagtuligsa sa kaalitan",
"Alin sa mga sumusunod na pagsasakilos ng kababaang-loob ang tumutukoy sa pag-amin sa nagawang kamalian at kusang-loob na paghiling ng paumahin?=Paghingi ng tawad>Paggalang sa payo ng nakakatanda+Paghingi ng tulong<Pagpapasalamat sa maliit na bagay",
"Ang pagsunod sa mga tagubilin ng mga guro at magulang ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng kababaang-loob?=Paggalang sa payo ng nakakatanda>Paghingi ng tawad+Paghingi ng tulong<Pagpapasalamat sa maliit na bagay",
"Ang pagiging bukas sa pagtanggap ng suporta o pag-alalay ng kapwa kapag nahihirapan ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng kababaang-loob?=Paghingi ng tulong>Paghingi ng tawad+Paggalang sa payo ng nakakatanda<Pagpapasalamat sa maliit na bagay",
"Ang pagsasabi ng \"thank you\" tuwing nakatatanggap ng regalo mula sa kapwa ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng kababaang-loob?=Pagpapasalamat sa maliit na bagay>Paghingi ng tawad+Paggalang sa payo ng nakakatanda<Paghingi ng tulong",
"Ang pakikinig at pagpapahalaga mo sa kritisismo ng kapwa tungkol sa iyong sarili ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng kababaang-loob?=Pagtanggap ng puna>Paghingi ng tawad+Pagtulong sa kapwa<Pakikinig nang buong puso",
"Ang pagpapahalaga at pagpapasalamat sa kontribusyon ng ibang tao ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng kababaang-loob?=Pagkilala sa iba>Pagtanggap ng puna+Pagtulong sa kapwa<Pakikinig nang buong puso",
"Ang pagbibigay ng donasyon o libreng serbisyo sa nangangailangan ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng kababaang-loob?=Pagtulong sa kapwa>Pagtanggap ng puna+Pagkilala sa iba<Pakikinig nang buong puso",
"Ang pagbibigay ng oras at atensyon sa sinumang kausap ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng kababaang-loob?=Pakikinig nang buong puso>Pagtanggap ng puna+Pagkilala sa iba<Pagtulong sa kapwa",
"Alin sa mga sumusunod ang nagpapakita ng kababaang-loob?=Paghingi ng saklolo kapag kailangan>Pagmamalaki ng mga talento+Hindi pagpapatawad sa nagkasala<Pagsasantabi ng opinyon ng ibang tao",
"Alin sa mga sumusunod ang nagpapakita ng kababaang-loob sa paaralan?=Pagtanggap ng puna mula sa guro>Pakikipagtalo sa kaklase+Pagyayabang ng grado<Hindi pagsunod sa utos",
"Ano ang dapat mong gawin kung ikaw ay nagkasala sa isang kaibigan?=Humingi ng tawad>Ilihim ang kasalanan+Isisi sa iba ang pagkakasala<Umiwas sa kaibigan",
"Alin sa mga sumusunod ang nagpapakita ng kababaang-loob ng isang tao kapag may nagbigay sa kanya ng payo?=Pagtanggap at pagpapasalamat sa payo>Pagbabalewala sa payo+Pakikipagtalo sa nagpapayo<Pagtangging makinig sa payo",
"Ano ang dapat mong gawin kapag hindi mo naiintindihan ang aralin?=Humingi ng tulong sa guro o kaklase>Manatiling tahimik+Balewalain ang aralin<Sisihin ang pagtuturo ng guro",
"Alin sa mga sumusunod ang nagpapakita ng kababaang-loob sa loob ng bahay?=Pagtulong sa mga gawaing bahay>Pagkukulong sa silid+Pagsigaw sa mga kapatid<Hindi pagsunod sa magulang",
"Ano ang dapat mong gawin kung may nagawa kang pagkakamali sa paaralan?=Umamin at humingi ng paumanhin>Itanggi ang nagawang mali+Isisi ang nagawa sa kaklase<Iwasan ang guro",
"Bakit mahalaga ang pagpapakumbaba sa pakikipagkaibigan?=Upang mapanatili ang mabuting ugnayan>Upang maiangat ang sarili sa kaibigan+Upang magkaroon ng kumpetisyon<Upang makuha ang mga gusto",
"Alin sa mga sumusunod ang nagpapakita ng respeto sa pakikipag-usap?=Pakikinig habang nagsasalita ang kausap>Pagputol sa pagsasalita ng kausap+Pagpipilit ng sariling opinyon sa kausap<Pagbabalewala sa damdamin ng kausap",
"Ano ang dapat mong gawin kung pinupuri ka sa nagawa mong tulong?=Magpasalamat at kilalanin ang iba pang tumulong>Mainis sa mga pumupuri+Magmalaki at lalong iangat ang sarili<Balewalain ang mga papuri",
"Alin sa mga sumusunod ang nagpapakita ng pagpapakumbaba sa isang nakatatanda?=Paggalang at pagiging masunurin sa kanya>Pag-iwas sa kanya+Pagkakait ng tulong sa kanya<Pagsasantabi ng kanyang pananaw at damdamin",
"Bakit mahalaga ang pagtanggap ng puna mula sa iba?=Upang matuto at umunlad>Upang maipagtanggol ang sarili+Upang maipakita ang galit sa pumupuna<Upang makapagtampo",
"Paano mo maipapakita ang kababaang-loob matapos mong matagumpay na mabuo ang isang proyekto?=Pagpapasalamat sa mga tumulong>Pag-angkin sa lahat ng papuri+Pagmamalaki sa mga kaklase<Pagbabalewala sa mga suportang natanggap",
"Alin sa mga sumusunod ang hindi nagpapakita ng kababaang-loob?=Pagmamalaki ng nakamit na tagumpay>Paghingi ng saklolo+Pagkilala sa tulong ng iba<Paghingi ng tawad",
"Alin sa mga sumusunod ang nagpapakita ng kababaang-loob sa mga kaklase?=Paggalang sa kanilang mga opinyon>Pakikipag-unahan sa lahat ng bagay+Pagsingit sa mga pila<Pagsabat habang sila ay nagsasalita",
"Alin sa mga sumusunod ang dapat mong gawin matapos kang tulungan ng ibang tao?=Magpasalamat>Balewalain ang tulong+Humiling ng mas malaking tulong<Sabihing hindi mo kailangan ng tulong",

);

?>

</head>

</bod

</html>