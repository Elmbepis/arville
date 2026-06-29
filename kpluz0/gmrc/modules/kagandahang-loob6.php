<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagpapakita ng Kagandahang-Loob - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagpapakita ng Kagandahang-Loob";
$_SESSION['tnum']="*67";

$questions=array(

"Alin sa mga sumusunod ang hindi nagpapakita ng kagandahang-asal?=Pagsigaw sa matanda>Pagtuturo ng kabutihan sa mga bata+Paggalang sa kausap<Maayos na pakikitungo sa iba",
"Sino sa mga sumusunod ang hindi kabilang sa mga nakatatanda sa inyong pamilya?=Mga kapatid at pinsan>Mga magulang+Mga lolo at lola<Mga tiyo at tiya",
"Alin sa mga sumusunod ang dapat mong gamitin tuwing makikipag-usap ka sa nakatatanda?=\"Po\" at \"opo\">Palayaw ng kausap+Pananalitang nanlalait<Galit na boses",
"Ano ang dapat mong gawin tuwing aalis ka o darating sa presensiya ng nakatatanda?=Magmano nang magalang>Umiwas upang hindi makita+Dumaan nang hindi kumikibo<Magmano nang padabog",
"Ano ang dapat mong gawin kapag nagsasalita ang isang nakatatandang kausap mo?=Humarap sa kanya at makinig>Magbasa ng mga mensahe sa cellphone+Maglaro ng online games<Tumalikod at umalis",
"Ano ang dapat mong gawin kapag ang kasama mong nakatatanda ay mabagal kumilos?=Maging matiyaga at huwag magmadali>Mainis at madaliin siya+Iwanan siyang mag-isa at mauna na lamang<Pasanin siya sa iyong likod",
"Ano ang dapat mong gawin kapag ang isang nakatatanda ay paulit-ulit na nagsasalaysay ng parehong kuwento?=Pakinggan pa rin siya>Sabihing paulit-ulit na ang kanyang kuwento+Maglaro muna gamit ang cellphone<Umalis habang nagsasalita siya",
"Ang paggamit ng 'po' at 'opo' sa iyong pakikipag-usap ay halimbawa ng alin sa mga sumusunod na paraan ng wastong pakikitungo sa mga nakatatanda?=Pagiging magalang sa iyong pananalita>Pagiging magalang sa iyong pagkilos+Pagiging magalang sa iyong pakikinig<Pag-alala sa kanilang mga pangangailangan",
"Ang pagmamano tuwing ikaw ay aalis o darating ay halimbawa ng alin sa mga sumusunod na paraan ng wastong pakikitungo sa mga nakatatanda?=Pagiging magalang sa iyong pagkilos>Pagiging magalang sa iyong pananalita+Pagiging magalang sa iyong pakikinig<Pag-alala sa kanilang mga pangangailangan",
"Ang pagharap at pagtingin sa mga mata ng kausap na nagsasalita ay halimbawa ng alin sa mga sumusunod na paraan ng wastong pakikitungo sa mga nakatatanda?=Pagiging magalang sa iyong pakikinig>Pagiging magalang sa iyong pananalita+Pagiging matiyaga sa kanilang mga kahinaan<Pag-alala sa kanilang mga pangangailangan",
"Ang pagpapainom ng gamot sa tamang oras sa iyong lola ay halimbawa ng alin sa mga sumusunod na paraan ng wastong pakikitungo sa mga nakatatanda?=Pag-alala sa kanilang mga pangangailangan>Pagiging magalang sa iyong pananalita+Pagbabahagi ng iyong buhay sa kanila<Pagiging magalang sa iyong pakikinig",
"Ang hindi pagmamadali kapag mabagal kumilos ang iyong lolo ay halimbawa ng alin sa mga sumusunod na paraan ng wastong pakikitungo sa mga nakatatanda?=Pagiging matiyaga sa kanilang mga kahinaan>Pagiging magalang sa iyong pananalita+Pagbabahagi ng iyong buhay sa kanila<Pagiging magalang sa iyong pakikinig",
"Ang pagkukuwento ng iyong mga tagumpay o problema sa iyong lola ay halimbawa ng alin sa mga sumusunod na paraan ng wastong pakikitungo sa mga nakatatanda?=Pagbabahagi ng iyong buhay sa kanila>Pagiging magalang sa iyong pananalita+Pagiging matiyaga sa kanilang mga kahinaan<Pagiging magalang sa iyong pakikinig",
"Ang pagatatanong sa iyong lolo kung may masakit sa kanya ay halimbawa ng alin sa mga sumusunod na paraan ng wastong pakikitungo sa mga nakatatanda?=Pagkumusta sa kanila>Pagpapagaan sa kalagayan nila+Paggalang sa kanilang pagpapasya<Pagbabahagi ng oras sa kanila",
"Ang pagbubukas ng bentilador para malamigan ang iyong lola ay halimbawa ng alin sa mga sumusunod na paraan ng wastong pakikitungo sa mga nakatatanda?=Pagpapagaan sa kalagayan nila>Pagkumusta sa kanila+Paggalang sa kanilang pagpapasya<Pagbabahagi ng oras sa kanila",
"Ang hindi pagsalungat sa desisyon ng iyong mga magulang ay halimbawa ng alin sa mga sumusunod na paraan ng wastong pakikitungo sa mga nakatatanda?=Paggalang sa kanilang pagpapasya>Pagkumusta sa kanila+Pagpapagaan sa kalagayan nila<Pagbabahagi ng oras sa kanila",
"Ang pag-upo nang kalahating oras sa tabi ng iyong lola araw-araw para makipagkuwentuhan sa kanya ay halimbawa ng alin sa mga sumusunod na paraan ng wastong pakikitungo sa mga nakatatanda?=Pagbabahagi ng oras sa kanila>Pagkumusta sa kanila+Pagpapagaan sa kalagayan nila<Paggalang sa kanilang pagpapasya",
"Bakit hindi mo dapat ituring na pabigat ang isang matanda?=Dahil may dignidad din siyang dapat mong pahalagahan>Para mayroon siyang ipamana sa iyo+Upang makatanggap ng pabuyang pera mula sa kanya<Para hindi ka mapagalitan ng iyong magulang",
"Alin sa mga sumusunod ang maaari mong matutuhan mula sa iyong lolo na nakaligtas sa giyera?=Paano magkaroon ng katatagan at lakas ng loob>Paano manalo sa video games+Paano magkaroon ng maraming followers sa social media<Paano kumita ng malaki sa online selling",
"Alin sa mga sumusunod ang maaari mong matutuhan mula sa iyong lola na nagpalaki ng maraming anak sa kabila ng kahirapan?=Paano magsakripisyo at magmahal>Paano mag-upload ng mga online videos+Paano gumawa ng mga vlog<Paano maging mabuting netizen",
"Alin sa mga sumusunod ang nagpapakita ng pinakamabuting pakikitungo sa mga nakatatanda?=Kusang pag-aalok ng tulong bago pa man sila magsabi>Paghihintay na sumigaw sila ng saklolo bago ka tumulong+Hindi pagpansin sa kanila kung hindi ka naman inuutusan<Pagtatanong kung bakit ikaw kapag inutusan",
"Ano ang dapat mong gawin kung makita mong hindi nakatali ang sintas ng sapatos ng iyong lolo?=Ikaw na mismo ang kusang magtali nito para sa kanya>Sabihan siyang itali niya ito+Pagalitan siya dahil delikado ito<Iwanan siya at mauna nang maglakad",
"Kapag hindi ka sang-ayon sa desisyon ng nakatatanda, ano ang dapat mong gawin?=Igalang pa rin ito at sundin>Kutyain siya at sabihing lipas na ang kanyang panahon+Makipagtalo sa kanya hanggang sumuko siya<Iwanan na lang siyang mag-isa",
"Alin sa mga sumusunod ang hindi mo dapat gawin kapag nagsasalita ang kausap mong nakatatanda?=Tumalikod at umalis habang nagsasalita siya>Humarap sa kanya at tingnan ang kanyang mga mata+Itabi muna ang cellphone para makapakinig nang maayos<Tumangu-tango upang magpakita ng interes",
"Alin sa mga sumusunod ang dapat mong gawin kung ang isang nakatatanda sa inyong pamilya ay may sakit?=Tumulong mag-abot ng kanyang mga pangangailangan>Hayaan siyang mag-isa para hindi siya magambala+Sabihin sa kanyang hindi mo siya matutulungan dahil matanda na siya<Iwasan siya upang hindi ka mahawa",

);

?>

</head>

</body

</html>