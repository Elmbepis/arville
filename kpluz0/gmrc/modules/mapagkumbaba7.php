<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagkumbaba - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagkumbaba";
$_SESSION['tnum']="*7d";

$questions=array(

"Ano ang kahulugan ng pagiging mapagkumbaba?=Pagpapahalaga sa iba nang hindi itinatataas ang sarili>Kawalan ng prinsipyo+Pagpapakita ng mga kakayahan<Pagtanggi sa tulong ng iba",
"Alin sa mga sumusunod ang nagpapakita ng kababaang-loob?=Pagtanggap ng pagkakamali>Pasigaw na pag-uutos sa mga kasama+Pagsingit sa pila<Pag-iwas sa tungkulin",
"Bakit mahalaga ang pagiging mapagkumbaba?=Upang mapanatiling mabuti ang mga ugnayan>Upang purihin ng ibang tao+Upang mapasunod ang kapwa<Upang hindi mapagalitan ng magulang",
"Alin sa mga sumusunod ang nagpapakita ng mapagkumbabang pakikitungo sa kaibigan?=Pakikinig sa kanilang opinyon>Pagmamagaling sa lahat ng bagay+Pag-iwas sa pakikihalubilo<Hindi pagpapatalo sa mga diskusyon",
"Alin sa mga sumusunod ang hindi elemento ng kababaang-loob?=Pagpapakita ng kahinaan>Paggalang sa opinyon ng iba+Hindi pagpapakita ng yabang<Paggalang sa damdamin ng iba",
"Ano ang unang hakbang sa paghingi ng tawad?=Pagtanggap ng pagkakamali>Pagdadahilan sa kasalanan+Paghingi ng tawad<Paglimot sa nangyari",
"Bakit mahalaga ang pagpapatawad?=Upang magkaroon ng kapayapaan>Upang makunsiyensya ang kaalitan+Upang ipakitang ikaw ang tama<Upang makuha ang respeto ng iba",
"Paano naipapakita ang wastong paraan ng pagpapatawad?=Pag-iisantabi ng galit at pagtanggap sa paumanhin>Pag-iwas sa kaalitan+Pasigaw na pangangaral sa taong nagkamali<Paninisi sa taong nagkamali",
"Alin sa mga sumusunod ang tamang reaksyon kung nasaktan ka ng kaibigan?=Magpakumbaba at makipag-usap nang maayos>Maghanap ng bagong kaibigan+Magalit at umiwas sa kanya<Sisihin siya sa nangyari",
"Ano ang nagiging epekto ng pagpapatawad?=Mas matatag na ugnayan>Mas maraming kaalitan+Mas magulong ugnayan<Kawalan ng katahimikan",
"Ano ang ibig sabihin ng pakikipagkasundo?=Pag-aayos ng relasyong nasira ng di-pagkakaunawaan>Pag-iwas sa pakikipag-ugnayan hanggang mawala ang problema+Pamimilit ng sariling pananaw para manaig<Paghahanap ng mga bagong kaibigan",
"Alin sa mga sumusunod ang nagpapakita ng tunay na pakikipagkasundo?=Paghingi ng tulong upang maayos ang hidwaan>Paglayo sa taong nakaalitan+Pagtatanggol sa sarili sa harap ng ibang tao<Pagsasabi ng masama tungkol sa nakaalitan",
"Alin sa mga sumusunod ang mahalaga sa pakikipagkasundo?=Pagpapakumbaba at paggalang>Tapang at kahandaang ipagtanggol ang sarili+Pagmamagaling para manaig<Pagtataas ng boses sa pakikipag-usap",
"Bakit kailangang maging sensitibo sa damdamin ng iba?=Upang mapabuti ang mga ugnayan at maiwasan ang hidwaan>Upang maitaas ang sarili+Upang makatanggap ng papuri<Upang mapansin at kahangaan ng iba",
"Bakit mahalaga ang kababaang-loob sa pakikpag-ugnayan?=Upang mapanatili ang respeto sa bawat isa>Upang makakuha ng pabor sa iba+Upang magkaroon ng pagkakataong manlamang sa iba<Upang maisulong ang sariling kapakanan",
"Alin sa mga sumusunod ang inaasahang epekto ng paghingi ng payo sa iba tungkol sa isang alitan?=Obhetibong paglilinaw ng sitwasyon at solusyon>Pagsasangkot ng mas marami sa problema+Paglala ang hidwaan<Pagtagal ng pakikipagkasundo",
"Ano ang dapat mong gawin kung hindi mo kaya ang isang sitwasyon ng pakikipag-ugnayan?=Humingi ng tulong o payo mula sa magulang o guro>Iwasan ang lahat ng kausap+Maghintay na magbago ang sitwasyon nang walang ginagawa<Mainis sa sarili at magmukmok",
"Alin sa mga sumusunod ang unang hakbang upang maipakita ang pagpapakumbaba sa isang alitan?=Paghingi ng tawad>Paninisi sa iba+Pagbabalewala sa sitwasyon<Pag-iwas sa kaalitan",
"Alin sa mga sumusunod ang nagpapakita ng pagpapakumbaba?=Paghingi ng tawad sa nagawa mong mali>Hindi pagpansin sa damdamin ng iba+Pagsasabi ng masama tungkol sa iba<Hindi pagtanggap sa opinyon ng iba",
"Ano ang tamang reaksyon kung nakatanggap ka ng kritisismo?=Tanggapin ito nang bukas ang isipan>Magtampo at umiwas sa nagbigay ng puna+Siraan sa ibang tao ang nagbigay ng puna<Ipagtanggol ang sarili kahit mali",
"Ano ang tamang paraan ng pagpapakumbaba kapag ikaw ay pinupuri?=Tanggapin ito nang may pasasalamat>Ipagyabang ito sa ibang tao+Ipagmalaking ikaw lamang ang ganito<Itanggi ang papuri at iwan ang kausap",
"Alin sa mga sumusunod ang dapat gawin kapag nakikipagkasundo?=Humingi ng tawad at magpatawad>Magmagaling upang manaig+Sisihin ang kaalitan para mailayo sa sarili ang kamalian<Magsama ng mga kaibigan tutuliga sa kaalitan",
"Alin sa mga sumusunod ang hindi makatutulong sa isang kaibigang nahihirapang magpatawad?=Pagtuligsa sa kanyang kaalitan>Pagtulong sa kanyang makipag-ugnayan nang mahinahon+Paghikayat na harapin niya ang isyu nang may pagpapakumbaba<Pagpapayong tanggapin niya ang nangyari",
"Alin sa mga sumusunod ang kailangan sa paghingi ng tawad?=Pagpapakita ng iyong sinseridad at pagsisisi>Pagpapasa ng sisi sa iba+Pagtataas ng boses<Agresibong pangangatwiran at pagtatanggol sa sarili",
"Ano ang dapat mong gawin kung hindi pa handang magpatawad ang iyong nasaktan?=Maghintay at ipakita ang sinseridad sa mabuting pagkilos>Pilitin siyang magpatawad agad+Iwasan na lamang siya habambuhay<Magparinig sa kanya ng masasama hanggang mapatawad ka niya",
 
);

?>

</head>

</bod

</html>