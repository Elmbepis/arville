<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Matatag sa mga Pagsubok - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Matatag sa mga Pagsubok";
$_SESSION['tnum']="*88";

$questions=array(

"Ano ang ibig sabihin ng pagiging matatag sa harap ng pagsubok?=Pagsagupa sa hamon nang may positibong pananaw>Pagbabalewala sa mga problema+Pagpapabaya sa mga tungkulin<Madaling pagsuko sa mga hamon",
"Alin sa mga sumusunod ang pagsubok na pinakamadalas pagdaanan ng karamihan sa mga pamilya?=Suliraning pinansyal>Pagpapaaral ng mga anak sa ibang bansa+Pagkakaroon ng malubhang sakit ng isang kapamilya<Pagkakawalay nang matagal sa bawat isa",
"Alin sa mga sumusunod ang isa sa mga bunga ng pagtutulungan ng mga kasapi ng isang pamilya sa paglutas ng isang problema?=Mas mabilis na pagkalutas ng problema>Mas mataas na tensyon sa loob ng pamilya+Pagkasira ng kanilang mga ugnayan<Paglala ng problemang kinakaharap",
"Ano ang dapat mong gawin kapag may di-pagkakaunawaan ka sa isang kapamilya?=Makipag-usap sa kanya nang maayos>Umiwas sa lahat ng kapamilya+Makipagtalo sa kanya nang pasigaw<Isisi sa kanya ang di-pagkakaunawaan",
"Ano ang mahalagang gawin kapag may trahedya sa pamilya?=Magbigayan ng suporta sa bawat isa>Magsisihan+Harapin nang mag-isa ang problema<Magpanggap na walang nangyari",
"Alin sa mga sumusunod ang hindi kabilang sa mga karaniwang epekto ng pagkakaroon ng malubhang sakit ng isang kapamilya?=Mapagpasalamat na mentalidad ng pamilya>Emosyonal at mental na pagsubok sa pamilya+Paghamon sa pananampalataya ng pamilya<Pinansyal na problema ng pamilya",
"Ano ang maaaring idulot sa isang bata ng mataas na ekspektasyon ng kanyang mga magulang?=Pagkabalisa at kawalan ng ganang mag-aral>Pagkawili sa pagpasok sa paaralan+Pagdami ng mga kaibigan<Pagiging masayahin palagi",
"Ang bukas na komunikasyon sa pamilya ay nakatutulong sa isang mag-aaral sa paanong paraan?=Pagbalanse ng mga ekspektasyon sa kanya at sa kanyang kakayahan>Pagkakaroon ng labis na ekspektasyon sa kanya+Pagkakaroon ng mababang ekspektasyon sa kanya<Kawalan ng interes ng mga magulang sa kanyang pag-unlad",
"Ano ang dapat mong gawin kapag may bagong miyembro sa inyong pamilya?=Tanggapin siya sa pamilya nang taos-puso>Umiwas sa kanya sa lahat ng oras+Ituring siyang hindi miyembro ng pamilya<Pagkaitan siya ng mga karapatan sa tahanan",
"Kapag may pagbabago sa komposisyon ng isang pamilya, ano ang dapat gawin ng mga miyembro nito?=Umangkop sa bagong situwasyon>Tumira na lang sa ibang bahay+Magsisihan<Mag-iwasan sa loob ng tahanan",
"Kapag naaapektuhan ang isang pamilya ng isang problemang panlipunan, ano ang dapat gawin ng mga miyembro nito?=Magtulungan at magkaisa>Manisi ng ibang pamilya+Umalis sa komunidad<Magkulong sa kanya-kanyang kuwarto",
"Alin sa mga sumusunod ang epekto sa isang indibiduwal ng wastong pag-unawa sa mga pagsubok na kanyang pinagdadaanan?=Katatagan>Kawalan ng pag-asa+Pagkalihis ng landas<Pagkabalisa o pagkalito",
"Alin sa mga sumusunod ang nagpapatatag sa isang indibiduwal?=Pagbangon sa bawat pagkabigo>Pagsuko sa bawat pagsubok+Pagrereklamo sa bawat paghihirap<Paninisi sa bawat problema",
"Alin sa mga sumusunod ang bunga ng pagtutulungan sa pamilya sa gitna ng isang pagsubok?=Mas matibay na ugnayan>Paglala ng problema+Mas madalas na tampuhan<Pagsuko ng lahat",
"Alin sa mga sumusunod na pagsubok sa pamilya ang tumutukoy sa kakulangan ng kakayahang tugunan ang mga pangunahing pangangailangan ng pamilya?=Suliraning pinansyal>Hidwaan sa pamilya+Suliranin sa kalusugan o pagkawala ng isang kapamilya<Pagbabago sa komposisyon ng pamilya",
"Ang hindi pagkakasundo sa pagitan ng mag-asawa at inggitan ng magkapatid ay mga halimbawa ng alin sa mga sumusunod na pagsubok sa pamilya?=Hidwaan sa pamilya>Suliraning pinansyal+Suliranin sa kalusugan o pagkawala ng isang kapamilya<Mataas na ekspektasyon ng magulang sa bata",
"Ang pagbibigay ng oras para magluksa at magdamdam ay pinakamahalaga sa alin sa mga sumusunod na pagsubok sa pamilya?=Pagkawala ng isang kapamilya>Suliraning pinansyal+Hidwaan sa pamilya<Suliraning panlipunan",
"Alin sa mga sumusunod na pagsubok sa pamilya ang karaniwang nagreresulta sa labis na pagkabalisa ng isang mag-aaral at pagkawala ng kanyang kumpiyansa sa sarili?=Mataas na ekspektasyon ng magulang sa bata>Suliraning pinansyal+Suliraning panlipunan<Hidwaan sa pamilya",
"Ang paghihiwalay ng mga magulang at pagdaragdag ng bagong miyembro sa pamilya ay mga halimbawa ng alin sa mga sumusunod na pagsubok sa pamilya?=Pagbabago sa komposisyon ng pamilya>Suliraning pinansyal+Suliraning panlipunan<Hidwaan sa pamilya",
"Ang pagiging biktima ng isang krimen o natural na kalamidad ay halimbawa ng alin sa mga sumusunod na pagsubok sa pamilya?=Suliraning panlipunan>Suliraning pinansyal+Pagbabago sa komposisyon ng pamilya<Hidwaan sa pamilya",
"Bakit mahalaga ang epektibong komunikasyon sa pamilya?=Upang magkaisa sa paglutas ng anumang suliranin>Para makapagpaligsahan ang mga kasapi nito+Para makapagtalo sa maliliit na bagay<Para maputol ang ugnayan ng lahat",
"Alin sa mga sumusunod ang epekto sa isang indibiduwal ng aktibo niyang pagtugon sa mga pagsubok?=Personal na pag-unlad>Madalas na pagrereklamo+Kawalan ng direksyon sa buhay<Mababang tiwala sa sarili",
"Ano ang dapat iwasan ng isang indibiduwal sa panahon ng pagdaan sa isang hamon o pagsubok?=Pagpapabaya sa emosyonal na kalusugan>Pagiging bukas ng isipan+Paghingi ng tulong<Pagtanggap sa realidad",
"Ano ang dapat gawin ng isang indibiduwal kapag nakararanas siya ng tensyon o stress?=Maglaan ng oras sa mga hilig at libangan>Ituon ang isip sa mga suliranin+Magkaroon ng negatibong pananaw<Manood ng mga malulungkot na pelikula",
"Alin sa mga sumusunod ang maaaring ituring na biyaya sa kalagitnaan ng isang pagsubok?=Maliliit ngunit mgagandang bagay na patuloy na tinatamasa>Pagkakaroon ng mas malaking problema ng isang kaibigan+Pagdating ng isang mas malaking hamon<Mga kabiguan sa buhay ng ibang tao",

);

?>

</head>

</bod

</html>