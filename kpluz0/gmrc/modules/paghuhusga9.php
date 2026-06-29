<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Maingat na Paghuhusga - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Maingat na Paghuhusga";
$_SESSION['tnum']="*94";

$questions=array(

"Alin sa mga sumusunod ang kahulugan ng pananahimik sa konteksto ng pagpapasya?=Pagkakaroon ng espasyo upang marinig ang iyong sarili>Kawalan ng tunog at ingaysa paligid+Pag-iwas sa lahat ng mga tao<Hindi pagsasalita",
"Alin sa mga sumusunod ang tatlong magkakaugnay na hakbang na dapat mong isagawa bago ka magpasya?=Pananahimik, pagninilay, at pananalangin>Pananahimik, pag-aaral, at pananalangin+Pananahimik, pagninilay, at pagtitimbang<Pananahimik, pagninilay, at pagsusuri",
"Ano ang naidudulot ng pananahimik sa iyong pagdedesisyon?=Paglikha ng kapaligirang payapa>Paggamit ng isip upang magsuri+Pag-angkla ng desisyon sa pananampalataya<Pagkawala ng pagdududa sa puso",
"Ano ang naidudulot ng pagninilay sa iyong pagdedesisyon?=Paggamit ng isip upang magsuri>Paglikha ng kapaligirang payapa+Pag-angkla ng desisyon sa pananampalataya<Pagkawala ng pagdududa sa puso",
"Ano ang naidudulot ng pananalangin sa iyong pagdedesisyon?=Pag-angkla ng desisyon sa pananampalataya>Paggamit ng isip upang magsuri+Paglikha ng kapaligirang payapa<Pagkawala ng pagdududa sa puso",
"Alin sa mga sumusunod ang kahulugan ng konsensiya?=Ang panloob na hukom na tumutulong sa iyong makilala ang tama sa mali>Ang tinig ng iyong mga magulang sa iyong isip na nagbibigsy ng payo+Ang takot na maparusahan ng Diyos<Ang mga aral sa simbahan na tumutulong sa ating makaiwas sa kasalanan",
"Ang iyong konsensiya ay hinuhubog ng iyong ____.=pamilya, kultura, at pananampalataya>pamilya at mga kaibigan+mga guro sa paaralan<sariling pag-iisip lamang",
"Ano ang mangyayari sa konsensiyang hindi ginagamit?=Ito ay nagiging manhid>Ito ay nagiging mas matalas at mas sensitibo+Ito ay hindi nagbabago<Ito ay bumibilis sa pagtugon",
"Alin sa mga sumusunod ang pangunahing gamit ng konsensiya?=Gabayan kang piliin ang mabuti at iwasan ang masama>Parusahan ka sa bawat pagkakamali+Pagdudahin ka sa sarili mong kakayahan<Patigilin ka sa pagkilos",
"Alin sa mga sumusunod ang kinakailangan ng konsensiya upang mapili nito ang tama?=Katotohanan>Kagandahan+Katanyagan<Kayamanan",
"Kung gusto mong makapagpakita ng mapanagutang pagpapasya, alin sa mga sumusunod ang hindi mo dapat gawin kapag may nagyaya sa iyong gumawa ng mali?=Mag-isip ng mga palusot kung sakaling mahuhuli>Huminto, pumikit, at magbilang hanggang sampu+Tanungin ang iyong sarili kung naaayon ito sa iyong pananampalataya<Tanungin ang iyong sarili kung makabubuti ito sa iyo at sa iba",
"Kung gusto mong makapagpakita ng mapanagutang pagpapasya, alin sa mga sumusunod ang hindi mo dapat gawin kapag labis kang nagagalit sa iyong kausap?=Sigawan siya nang malakas at awayin>Huminga nang malalim+Pumunta sa isang tahimik na lugar<Manalangin o magnilay",
"Kung gusto mong makapagpakita ng mapanagutang pagpapasya, alin sa mga sumusunod ang hindi mo dapat gawin kapag nahaharap ka sa isang malaking desisyon?=Lumayo at umiwas sa pamilya>Manalangin para sa karunungan+Maglista ng mga opsiyon<Maglaan ng isang linggo upang manahimik at magnilay",
"Kung gusto mong makapagpakita ng mapanagutang pagpapasya, alin sa mga sumusunod ang hindi mo dapat gawin kapag may taong nakagawa sa iyo ng kasalanan?=Agad na gumanti>Umupo muna at pakalmahin ang sarili+Tanungin ang iyong sarili kung ano ang itinuturo ng iyong paniniwala<Isipin ang sinasabi ng iyong pananampalataya tungkol sa pagpapatawad",
"Kung gusto mong makapagpakita ng mapanagutang pagpapasya, alin sa mga sumusunod ang hindi mo dapat gawin kapag natutukso kang mandaya habang mayroon kang pagsusulit?=Mag-isip ng mga paraan upang hindi mahuli>Huwag tumingin sa papel ng iyong katabi+Paalalahanan ang iyong sarili na masamang mandaya<Tanungin ang iyong sarili kung ano ang mararamdaman ng iyong mga magulang kung mahuhuli kang nandaraya",
"Kung gusto mong makapagpakita ng mapanagutang pagpapasya, alin sa mga sumusunod ang hindi mo dapat gawin kapag mayroon kayong di-pagkakaunawaan ng iyong kapatid?=Magparinig sa kanya ng masakit na pananalita>Pumunta sa iyong kuwarto at magnilay+Manalangin at hingin ang gabay ng Diyos<Alalahanin ang masasayang sandali ng inyong paglaki",
"Kung gusto mong makapagpakita ng mapanagutang pagpapasya, alin sa mga sumusunod ang hindi mo dapat gawin kapag humihingi ka ng pahintulot sa iyong mga magulang na mamasyal kasama ang iyong mga kaibigan?=Magsinungaling sa inyong pupuntahan>Ipaalam sa kanila kung sino ang mga kasama mo at kung bakit dapat silang pagkatiwalaan+Manalangin para magkaroon ka ng lakas ng loob na magsabi ng katotohanan<Manalangin para bigyan ng Diyos ng karunungan ang iyong mga magulang na magtiwala sa iyo",
"Kung gusto mong makapagpakita ng mapanagutang pagpapasya, alin sa mga sumusunod ang hindi mo dapat gawin kapag may kaklase kang nagkamali at pinagtatawanan sa klase?=Sumali sa pagtawa at panunukso ng iba>Alalahanin ang gintong panuntunan+Kausapin siya pagkatapos ng klase upang suportahan<Manalangin para bigyan ng Diyos ng karunungan ang mga kaklase mong tumatawa",
"Alin sa mga sumusunod ang nagpapahiwatig ng kahulugan ng pagpapatawad?=Pagpapalaya sa iyong sarili mula sa mabigat na kalooban>Pagkunsinti sa kasalanan+Pagpapanggap na walang nangyari<Paghihiganti sa tahimik na paraan",
"Alin sa mga sumusunod ang hindi mo dapat gamitin upang makagawa ka ng mapanagutang desisyon sa abot ng iyong makakaya?=Ang iyong galit>Ang iyong isip+Ang iyong pananampalataya<Ang iyong konsensiya",
"Alin sa mga sumusunod ang makakamtan mo kapag ginawa mo ang lahat ng iyong makakaya upang makagawa ng isang mapanagutang desisyon?=Kapayapaan>Kasikatan+Karunungan<Perpektong resulta",
"Alin sa mga sumusunod na bunga ng maingat na paghuhusga ang tumutukoy sa kawalan ng pagsisisi dahil hindi ka nagpadalus-dalos sa pagpapasya?=Kapayapaan ng loob>Kakayahang harapin ang anumang kahihinatnan+Mas matatag na pananampalataya<Paggalang mula sa lahat",
"Alin sa mga sumusunod na bunga ng maingat na paghuhusga ang tumutukoy sa pagtibay ng iyong paniniwala dahil nakikita mo ang positibong epekto nito sa iyong pang-araw-araw na buhay?=Mas matatag na pananampalataya>Kakayahang harapin ang anumang kahihinatnan+Kapayapaan ng loob<Paggalang mula sa lahat",
"Alin sa mga sumusunod na bunga ng maingat na paghuhusga ang tumutukoy sa pagtitiwala sa iyo ng ibang tao dahil alam nilang hindi ka pabigla-bigla sa pagpapasya?=Paggalang mula sa lahat>Kakayahang harapin ang anumang kahihinatnan+Kapayapaan ng loob<Mas matatag na pananampalataya",
"Alin sa mga sumusunod na bunga ng maingat na paghuhusga ang tumutukoy sa pagiging madali na para sa iyo ng pagkilala ng tama at mali?=Mas malinaw na konsensiya>Kakayahang harapin ang anumang kahihinatnan+Paggalang mula sa lahat<Mas matatag na pananampalataya",

);

?>

</head>

</body

</html>