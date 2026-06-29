<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pakikiisa sa mga Kapanalig - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pakikiisa sa mga Kapanalig";
$_SESSION['tnum']="*8o";

$questions=array(

"Alin sa mga sumusunod ang isa sa mga pangunahing layunin ng mga personal na gampaning panrelihiyon tulad ng pananalangin?=Palakasin ang ugnayan sa Diyos>Ipakita sa iba na ikaw ay relihiyoso+Pilitin ang Diyos na ibigay ang mga kahilingan<Makaiwas sa mga gawaing-bahay",
"Alin sa mga sumusunod ang isa sa mga pangunahing layunin ng mga panlipunang gampanin tulad ng pagtulong sa nangangailangan?=Maisabuhay ang mga aral ng sariling pananampalataya>Makuha ang paghanga ng buong komunidad+Makatanggap ng pabuya sa mga pinuno ng barangay<Makaiwas sa pagpapangaral ng mga nakatatanda",
"Paano mo dapat ituring ang pagganap sa iyong mga gampaning panrelihiyon?=Bilang magpagkukunan ng lakas, gabay, at pag-asa>Bilang mabigat at nakakapagod na pasanin+Bilang opsyonal na gawain lamang tuwing marami kang libreng oras<Bilang dahilan para makipagkita sa mga kaibigan",
"Alin sa mga sumusunod ang inaasahang bunga ng kusang-loob na pakikilahok sa mga gawaing panrelihiyon?=Pagkakaroon ng mas malalim na koneksyon sa Diyos at mga kapanalig>Pagiging kapos sa oras para sa sarili at sa pamilya+Pagbaba ng kita dahil sa mas kaunting oras para maghanapbuhay<Lalong paglayo ng loob sa mga taong iba ang paniniwala",
"Alin sa mga sumusunod ang hindi kabilang sa mga katangiang nahuhubog ng paglahok sa mga gampaning panrelihiyon?=Pagiging makasarili>Pagiging mapagpasensya+Pagiging mapagpatawad<Pagiging mapagmalasakit",
"Alin sa mga sumusunod na hakbang o paraan ng pakikibahagi sa mga gampaning panrelihiyon ang tumutukoy sa pagkilala sa mga pangunahing ritwal, dasal, at pananagutang kaakibat ng iyong pananampalataya?=Pag-alam sa sariling mga gampanin>Pagiging tapat sa mga personal na gawain+Aktibong pagsali sa mga pagdiriwang at ritwal<Pagbabahagi ng pag-asa at inspirasyon sa iba",
"Alin sa mga sumusunod na hakbang o paraan ng pakikibahagi sa mga gampaning panrelihiyon ang tumutukoy sa pagpapakita ng dedikasyon sa pagsasakatuparan ng iyong mga gampaning pansarili tulad ng araw-araw na pananalangin, pagbabasa ng banal na kasulatan, at pagmumuni-muni?=Pagiging tapat sa mga personal na gawain>Pag-alam sa sariling mga gampanin+Aktibong pagsali sa mga pagdiriwang at ritwal<Pagbabahagi ng pag-asa at inspirasyon sa iba",
"Ang pagdalo at pag-aambag ng oras at talento sa mga misa, pagsamba, pista, o iba pang pagtitipon ay anyo ng alin sa mga sumusunod na hakbang o paraan ng pakikibahagi sa mga gampaning panrelihiyon?=Aktibong pagsali sa mga pagdiriwang at ritwal>Pag-alam sa sariling mga gampanin+Pagiging tapat sa mga personal na gawain<Pagbabahagi ng pag-asa at inspirasyon sa iba",
"Alin sa mga sumusunod na hakbang o paraan ng pakikibahagi sa mga gampaning panrelihiyon ang tumutukoy sa paggamit ng mga aral at karanasang natutunan mo mula sa iyong pananampalataya upang magbigay ng lakas ng loob sa mga taong dumaraan sa pagsubok?=Pagbabahagi ng pag-asa at inspirasyon sa iba>Pag-alam sa sariling mga gampanin+Aktibong pagsali sa mga pagdiriwang at ritwal<Pagiging tapat sa mga personal na gawain",
"Alin sa mga sumusunod na hakbang o paraan ng pakikibahagi sa mga gampaning panrelihiyon ang tumutukoy sa pagpapakita rin ng pagkilala, pag-unawa, at respeto sa mga relihiyong naiiba sa iyong pananampalataya?=Paggalang sa lahat ng mga paniniwala>Pagiging tapat sa mga personal na gawain+Aktibong pagsali sa mga pagdiriwang at ritwal<Paglilingkod nang walang hangad na kapalit",
"Alin sa mga sumusunod na hakbang o paraan ng pakikibahagi sa mga gampaning panrelihiyon ang tumutukoy sa pagsisilbi nang libre sa mga proyektong pangkawanggawa ng inyong simbahan o samahan, tulad ng pag-aalaga sa mga may sakit at pagtulong sa mga nasalanta?=Paglilingkod nang walang hangad na kapalit>Pag-alam sa sariling mga gampanin+Aktibong pagsali sa mga pagdiriwang at ritwal<Paggalang sa lahat ng mga paniniwala",
"Alin sa mga sumusunod ang hindi kabilang sa mga karaniwang epekto ng pagtupad ng mga tao sa kanilang mga tungkuling panrelihiyon sa pamayanan?=Pagkalabag ng mga karapatang pantao>Pagpapanatili ng kapayapaan+Pagpapalaganap ng kabutihan<Pagtataguyod ng pagkakaisa",
"Alin sa mga sumusunod ang maidudulot sa iyo ng pagiging tapat mo sa iyong mga personal na gawaing panrelihiyon tulad ng pananalangin?=Mas matibay na pananampalataya>Kawalan ng pag-asa+Mababang tiwala sa sarili<Pagkahilig sa mga materyal na bagay",
"Alin sa mga sumusunod ang nagpapakita ng tunay na pananampalataya sa Diyos?=Paglilingkod sa kapwa nang walang hangad na kapalit>Pagbibigay ng malaking donasyon sa simbahan para mapansin+Pagsusuot ng mga simbolong panrelihiyon araw-araw<Hindi pagpapatawad sa isang taong humihingi ng pangalawang pagkakataon",
"Bakit mahalagang magpakita tayong lahat ng paggalang sa iba't ibang pananampalataya?=Upang magkaroon ng kapayapaan at pagkakaisa>Upang mapuri ng ibang tao+Upang makatanggap ng pabuya mula sa simbahan<Upang maiangat ang sariling relihiyon sa iba",
"Alin sa mga sumusunod ang hindi dapat gawin ng mga magkakapanalig sa pananampalataya?=Paninira sa kapwa mananampalataya para makakuha ng mataas na puwesto>Pagtutulungan para makamit ang iisang layunin+Pagtanggap sa bawat isa bilang kapwa mananampalataya<Pagbibigayan ng suporta sa panahon ng pangangailangan",
"Alin sa mga sumusunod ang dapat mong gawing motibasyon sa pagsali sa mga gawaing paglilingkod?=Pagnanais tumulong sa mga nangangailangan>Paghahangad na mapansin at mapuri ng mga pinuno+Pag-iwas sa mga gawaing-bahay<Pag-aangat ng sarili sa iba",
"Alin sa mga sumusunod ang pangunahing dahilan kung bakit dapat kang magpakita ng dedikasyon sa pagsasagawa ng iyong mga personal na gampaning panrelihiyon?=Para mapatibay mo ang personal na ugnayan sa Diyos>Para maipagyabang mo sa iba na ikaw ay relihiyoso+Para mapatunayan mo sa iyong sarili na ikaw ang pinakamaka-Diyos sa inyong magkakaibigan<Para makaiwas sa mga utos ng magulang",
"Alin sa mga sumusunod ang mangyayari kung ang iyong pakikiisa sa mga gampaning panrelihiyon ay mekanikal lamang at hindi bukal sa iyong kalooban?=Mawawalan ito ng espirituwal na halaga kaya tatamarin kang makiisa>Gagaan ang iyong pakiramdam+Mas marami kang maisasakatuparang gampanin<Mas hahangaan ka ng iyong mga kapanalig",
"Alin sa mga sumusunod ang pinakaepektibong paraan ng pagiging mabuting halimbawa sa labas ng inyong lugar ng pagsamba?=Pagkakawanggawa upang makatulong sa nangangailangan>Pag-iwas sa pakikisalamuha sa mga taong may ibang relihiyon+Pagsusuot ng mga damit na may relihiyosong simbolo araw-araw<Paninirang-puri sa mga taong masama ang ugali",
"Ano ang dapat mong gawin kung may kapanalig kang dumaraan sa matinding pagsubok?=Alukin siya ng tulong na kayang ibigay at ipagdasal siya>Ipagsabi ang kanyang problema sa iba+Sabihan siyang ito ay parusa sa mga kasalanang nagawa niya<Iwasan siya para hindi ka madamay sa kanyang problema",
"Alin sa mga sumusunod ang naiaambag ng pakikiisa ng mga tao sa kanilang mga kapanalig sa pagbuo ng maayos na lipunan?=Nagtataguyod ito ng diwa ng pagmamahal at paglilingkod sa kapwa>Nagsisimula ito ng pagpapagalingan ng mga magkakapanalig+Nagiging daan ito upang hindi magkasundo ang mga taong magkakaiba ang paniniwala<Nagtuturo ito ng pag-uuna ng sariling kagustuhan",
"Alin sa mga sumusunod ang hindi kabilang sa mga kabutihang naidudulot ng pagdalo ng mga mamamayan sa mga pagtitipon ng komunidad?=Napapalaganap nito ng inggitan at siraan>Nagpapatibay ito ng pagkakaisa+Nagbibigay ito ng pagkakataon sa lahat na makapag-ambag sa pamayanan<Naghahatid ito ng pakiramdam na maaari mong asahan ang tulong ng iyong kapwa",
"Alin sa mga sumusunod ang nagpapakita ng paggalang sa sariling pananampalataya?=Taimtim na pagsasabuhay ng mga aral nito>Pamimilit sa lahat ng mga nakakasalubong na makinig sa mga aral nito+Paninira sa ibang mga relihiyon<Pagpapakita sa ibang mas maalam ka sa relihiyon kaysa sa kanila",
"Alin sa mga sumusunod ang hindi naglalarawan sa tunay na pakikiisa sa mga kapanalig?=Ito ay hindi nangangailangan ng dedikasyon>Ito ay kusang-loob at buong-puso+Ito ay pagsasabuhay ng pakikilahok sa mga gampaning panrelihiyon<Ito ay nagtataguyod ng pagmamahal at pagkakaisa sa pamayanan",

);

?>

</head>

</bod

</html>