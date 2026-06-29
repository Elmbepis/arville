<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagpasensiya - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagpasensiya";
$_SESSION['tnum']="*48";

$questions=array(

"Alin sa mga sumusunod na pagsasabuhay ng maayos at mapagpasensiyang komunikasyon ang tumutukoy sa pagbibigay sa kausap ng buong atensyon at hindi pagsasalita nang padabog o may galit?=Pagpapakita ng paggalang sa kapwa>Pag-iwas sa paninira sa iba+Paghingi ng paumanhin<Pagpapatawad",
"Alin sa mga sumusunod na pagsasabuhay ng maayos at mapagpasensiyang komunikasyon ang tumutukoy sa pakikinig muna sa panig na hindi sinasang-ayunan bago magbigay ng sariling opinyon?=Pagiging maunawain sa isang pagtatalo>Pag-iwas sa paninira sa iba+Paghingi ng paumanhin<Pagpapatawad",
"Ang pagsasabi ng \"nasaktan ako sa ginawa mo\" sa halip ng \"wala kang kuwentang kaibigan\" ay halimbawa ng alin sa mga sumusunod na pagsasabuhay ng maayos at mapagpasensiyang komunikasyon?=Paggamit ng magalang na pananalita>Pag-iwas sa paninira sa iba+Paghingi ng paumanhin<Pagpapatawad",
"Alin sa mga sumusunod na pagsasabuhay ng maayos at mapagpasensiyang komunikasyon ang tumutukoy sa pagsasaad ng pagsisisi sa nagawang kasalanan at pagsasabi ng 'pasensiya na'?=Paghingi ng paumanhin>Pag-iwas sa paninira sa iba+Pagiging maunawain sa isang pagtatalo<Pagpapatawad",
"Alin sa mga sumusunod na pagsasabuhay ng maayos at mapagpasensiyang komunikasyon ang tumutukoy sa pagiging mapagpakumbaba at maunawain sa isang taong humihingi sa iyo ng pasensiya?=Pagpapatawad>Pag-iwas sa paninira sa iba+Pagpapahayag ng pasasalamat<Paghingi ng paumanhin",
"Alin sa mga sumusunod na pagsasabuhay ng maayos at mapagpasensiyang komunikasyon ang nagpapakita ng iyong pagpapahalaga sa isang kabutihang natamo mula sa ibang tao?=Pagpapahayag ng pasasalamat>Pag-iwas sa paninira sa iba+Pagpapatawad<Paghingi ng paumanhin",
"Ang pag-aalok ng tulong kapag may nakikitang problema sa halip ng pagsasalita ng masama tungkol sa kapwa ay halimbawa ng alin sa mga sumusunod na pagsasabuhay ng maayos at mapagpasensiyang komunikasyon?=Pag-iwas sa paninira sa iba>Pagpapahayag ng pasasalamat+Pagpapatawad<Paghingi ng paumanhin",
"Ano ang pangunahing dahilan kung bakit mahalaga ang pagiging mapagpasensiya sa pakikipag-usap sa pamilya?=Upang magkaroon ng maayos na ugnayan at samahan>Upang mahingi ang gusto+Upang hindi mapagalitan<Upang makakuha ng papuri",
"Bakit mahalaga ang pagiging mapagpasensiya sa pakikipag-usap sa iba?=Para makaiwas sa gulo at pagtatalo>Para maipakitang mas magaling ka sa kausap+Para manalo sa pagtatalo<Para humanga ang mga nasa paligid",
"Bakit mahalagang matutunan ang tamang pakikipag-usap habang bata pa?=Upang maging handa sa pakikipag-ugnayan sa labas ng tahanan>Upang masanay manlamang sa kapwa+Upang mapuri ng mga guro<Upang maipakita sa ibang tao ang kahusayan",
"Ano ang epekto ng maayos na komunikasyon sa pamilya?=Nagiging mas matatag at masaya ang ugnayan ng bawat isa>Nagiging malayo ang loob ng bawat isa+Napapadalas ang mga di-pagkakaunawaan<Nagkakaroon ng mga kalituhan sa usapan",
"Alin sa mga sumusunod ang nagpapakita ng pagiging mapagpasensiya sa simpleng paraan?=Pakikinig muna bago magsalita>Pagsigaw para lalong maintindihan+Paggamit ng mga nakakainis na salita<Pagpipilit ng sariling opinyon",
"Ano ang dapat gawin kapag may hindi pagkakaintindihan sa isang kapatid?=Pakinggan muna ang kanyang panig bago magbigay ng opinyon>Magtaas ang boses para ipakita ang galit+Umalis na lang para hindi humaba ang pagtatalo<Ipagpilitang siya ang may mali",
"Alin sa mga sumusunod ang HINDI nagpapakita ng respeto sa kausap?=Pagtataas ng boses>Paggamit ng magagalang na pananalita+Pagbibigay ng atensyon<Pakikinig bago magkomento",
"Alin sa mga sumusunod ang tamang gawin kapag mayroong pagtatalo sa klase?=Pakinggan ang bawat panig at maghanap ng solusyon>Manahimik na lang kahit mali ang sinasabi ng iba+Makipagsigawan para manalo<Lumabas ng silid-aralan",
"Alin sa mga sumusunod ang isa sa magagandang epekto ng paggamit ng maayos na pananalita sa pagpapahayag ng damdamin?=Mas maayos na relasyon sa iba>Madalas na di-pagkakaunawaan+Pagliit ng bilang ng mga kaibigan<Kawalan ng respeto mula sa ibang tao",
"Paano mo magagamit ang pagiging mapagpasensiya sa pakikipag-usap sa mga kaklase?=Pagiging mahinahon kahit sa pagtatalo>Pagsigaw kapag hindi sila nakikinig+Pagsasabi ng masama tungkol sa iba<Pagbabalatkayo sa kausap",
"Ano ang dapat mong gawin sa mga kapatid na nagbigay ng tulong sa iyo?=Pasalamatan sila>Hingan sila ng paumanhin+Umiwas sa kanila<Humingi pa ng mga ibang gusto sa kanila",
"Ano ang dapat mong gawin kapag nasaktan ka ng isang kaibigan?=Sabihin sa kanyang nasaktan ka sa maayos na paraan>Gumanti sa kanya+Magsalita ng masama tungkol sa kanya<Itakwil siya bilang kaibigan",
"Ano ang dapat mong gawin kapag may humihingi ng paumanhin sa iyo?=Tanggapin ang paumanhin at magpatawad>Ipakita ang iyong galit+Tumalikod at umalis habang nagsasalita siya<Sabihing hindi mo siya mapapatawad sa maayos na paraan",
"Alin sa mga sumusunod ang dapat mong gawin kapag pinapagalitan ka ng magulang?=Unawain ang dahilan at magalang na humingi ng paumanhin>Sumagot nang pabalang+Umalis at magtago<Piliting makapagpalusot",
"Anong reaksyon ang nararapat mong ibigay kapag may nagtataas ng boses sa iyo?=Manatiling kalmado at kausapin siya nang mahinahon>Makipagtaasan ng boses sa kanya+Tumakbo at magtago<Hamunin siya ng away",
"Ano ang dapat mong gawin kung mayroon kang hindi nauunawaan sa inyong aralin sa klase?=Magtanong nang maayos sa guro>Ituon ang isip sa mga ibang bagay+Magtanong sa guro nang pabalang<Makipagdaldalan na lang sa katabi",
"Paano mo magagamit ang pagiging mapagpasensiya sa paglutas ng isang problema?=Sa pamamagitan ng masusing pag-aaral muna ng sitwasyon at pag-isip bago kumilos>Sa pamamagitan ng panghuhula ng gagawing solusyon+Sa pamamagitan ng padalus-dalos na pagkilos<Sa pamamagitan ng pagbabalewala at di pagpansin sa problema",
"Ano ang dapat mong gawin kung mayroon kang hindi naiintindihan sa sinasabi ng iba?=Humingi ng paliwanag sa maayos na paraan>Umiling at huwag na lang siyang pansinin+Makipagtalo hanggang maintindihan ang paksa<Magsabi rin ng mga bagay na mahirap maintindihan",

);

?>

</head>

</bod

</html>