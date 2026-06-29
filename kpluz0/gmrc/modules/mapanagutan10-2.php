<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapanagutan sa Pagpaplano sa Buhay - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapanagutan sa Pagpaplano sa Buhay";
$_SESSION['tnum']="*a6";

$questions=array(

"Ano ang pagkakaiba ng pagpaplano at pangangarap?=Ang pagpaplano ay may konkretong hakbang; ang pangangarap ay walang konkretong hakbang>Ang pagpaplano ay para sa mayayaman; ang pangangarap ay para sa mahihirap+Ang pagpaplano ay panandalian; ang pangangarap ay pangmatagalan<Ang pagpaplano ay madali; ang pangangarap ay mahirap",
"Alin sa mga sumusunod ang dapat mong gawing gabay sa mga pangunahing desisyon mo sa iyong buhay?=Ang iyong mga pagpapahalaga>Ang opinyon ng iyong mga kaibigan+Ang trending sa social media<Ang iyong katayuang pinansyal",
"Alin sa mga sumusunod na hakbang sa pagsusuri ng iyong mga pagpapahalaga ang tumutukoy sa pag-alam kung anu-ano ang mga bagay na importante sa iyo?=Kilalanin ang iyong mga pagpapahalaga>Unawain ang mga kaakibat na sakripisyo at gantimpala+Pag-ugnay-ugnayin ang trabaho, bokasyon, at pagpapamilya<Tandaan na ang mga pagpapahalaga ay maaaring magbago",
"Alin sa mga sumusunod na hakbang sa pagsusuri ng iyong mga pagpapahalaga ang nagtatanong kung ano ang mga handa mong ibigay kapalit ng mga makukuha mo?=Unawain ang mga kaakibat na sakripisyo at gantimpala>Kilalanin ang iyong mga pagpapahalaga+Pag-ugnay-ugnayin ang trabaho, bokasyon, at pagpapamilya<Tandaan na ang mga pagpapahalaga ay maaaring magbago",
"Alin sa mga sumusunod na hakbang sa pagsusuri ng iyong mga pagpapahalaga ang nangangahulugang ang pagpaplano ay hindi paghahati-hati ng iyong buhay kundi paghahanap ng pagkakaisa nito?=Pag-ugnay-ugnayin ang trabaho, bokasyon, at pagpapamilya>Kilalanin ang iyong mga pagpapahalaga+Unawain ang mga kaakibat na sakripisyo at gantimpala<Tandaan na ang mga pagpapahalaga ay maaaring magbago",
"Alin sa mga sumusunod na hakbang sa pagsusuri ng iyong mga pagpapahalaga ang nagsasabing ang paghahanda sa buhay ay hindi nangangahulugang nakatali ka habambuhay sa iyong unang plano?=Tandaan na ang mga pagpapahalaga ay maaaring magbago>Kilalanin ang iyong mga pagpapahalaga+Unawain ang mga kaakibat na sakripisyo at gantimpala<Pag-ugnay-ugnayin ang trabaho, bokasyon, at pagpapamilya",
"Alin sa mga sumusunod na hakbang sa pagsusuri ng iyong mga pagpapahalaga ang nagsasabing ang pagiging mapanagutan ay nangangahulugang ikaw at ikaw lamang ang may-ari ng iyong buhay?=Huwag hayaang may magdikta ng iyong mga pagpapahalaga>Unawain ang mga kaakibat na sakripisyo at gantimpala+Pag-ugnay-ugnayin ang trabaho, bokasyon, at pagpapamilya<Tandaan na ang mga pagpapahalaga ay maaaring magbago",
"Alin sa mga sumusunod na hakbang sa pagbabalangkas ng mga plano mo sa buhay ang tumutukoy sa pagsusulat ng mga bagay na gagabay sa iyong mga desisyon sa trabaho, bokasyon, at pagpapamilya?=Gumawa ng personal na pahayag ng mga pagpapahalaga>Magsaliksik ng mga posibleng landas+Kausapin ang mga taong nasa mga landas na pinagpipilian mo<Magbalangkas ng isang 10-taong plano",
"Ang pag-alam kung anong mga kurso ang angkop sa iyong mga pinahahalagahan ay saklaw ng alin sa mga sumusunod na hakbang sa pagbabalangkas ng mga plano mo sa buhay?=Magsaliksik ng mga posibleng landas>Gumawa ng personal na pahayag ng mga pagpapahalaga+Kausapin ang mga taong nasa mga landas na pinagpipilian mo<Magbalangkas ng isang 10-taong plano",
"Ang pagtatanong ng isang taong nais magpari sa isang obispo kung ano ang mga hamon sa pagpapari ay halimbawa ng alin sa mga sumusunod na hakbang sa pagbabalangkas ng mga plano mo sa buhay?=Kausapin ang mga taong nasa mga landas na pinagpipilian mo>Gumawa ng personal na pahayag ng mga pagpapahalaga+Magsaliksik ng mga posibleng landas<Magbalangkas ng isang 10-taong plano",
"Alin sa mga sumusunod na hakbang sa pagbabalangkas ng mga plano mo sa buhay ang nagsasabing may plano ka dapat sa bawat yugto ng iyong buhay mula sa kasalukuyan hanggang sa iyong pagpapamilya?=Magbalangkas ng isang 10-taong plano>Magsaliksik ng mga posibleng landas+Kausapin ang mga taong nasa mga landas na pinagpipilian mo<Gumawa ng personal na pahayag ng mga pagpapahalaga",
"Alin sa mga sumusunod ang hindi kabilang sa mga pangangailangang dapat mong tukuyin sa bawat yugto ng iyong buhay?=Tamang katunggali>Tamang kaalaman+Tamang pag-uugali<Tamang kasanayan",
"Alin sa mga sumusunod na hakbang sa pagbabalangkas ng mga plano mo sa buhay ang tumutukoy sa paghahanda para sa mga di-inaasahang hamon tulad ng hindi pagpasa sa entrance exam o pagkawala ng trabaho?=Gumawa ng emergency plan>Maglaan ng oras para sa espiritwal at emosyonal na paghahanda+Konsultahin ang mga magulang o tagapayo<Repasuhin at i-update ang plano taun-taon",
"Alin sa mga sumusunod na hakbang sa pagbabalangkas ng mga plano mo sa buhay ang tumutukoy sa pagtitiyak na mayroon kang panahon para sa pananalangin, pagninilay, o pagbabasa ng mga aklat tungkol sa pagpapamilya?=Maglaan ng oras para sa espiritwal at emosyonal na paghahanda>Gumawa ng emergency plan+Konsultahin ang mga magulang o tagapayo<Repasuhin at i-update ang plano taun-taon",
"Alin sa mga sumusunod na hakbang sa pagbabalangkas ng mga plano mo sa buhay ang tumutukoy sa pagbabahagi ng iyong 10-taong plano at paghingi ng feedback tungkol dito?=Konsultahin ang mga magulang o tagapayo>Gumawa ng emergency plan+Maglaan ng oras para sa espiritwal at emosyonal na paghahanda<Repasuhin at i-update ang plano taun-taon",
"Alin sa mga sumusunod na hakbang sa pagbabalangkas ng mga plano mo sa buhay ang nagtatanong kung ano ang mga nagbago sa iyong mga pagpapahalaga?=Repasuhin at i-update ang plano taun-taon>Gumawa ng emergency plan+Maglaan ng oras para sa espiritwal at emosyonal na paghahanda<Konsultahin ang mga magulang o tagapayo",
"Alin sa mga sumusunod na hakbang sa pagbabalangkas ng mga plano mo sa buhay ang magagawa lamang sa pamamagitan ng maliliit na pagkilos na ginagawa nang tuluy-tuloy sa mahabang panahon?=Panindigan ang iyong plano>Gumawa ng emergency plan+Repasuhin at i-update ang plano taun-taon<Konsultahin ang mga magulang o tagapayo",
"Paano mo dapat tratuhin ang iyong trabaho, bokasyon, at pagpapamilya?=Bilang mga aspeto ng iisang buhay na nagkakaisa>Bilang magkakasunod na yugto+Bilang mga bagay na hindi magkakaugnay<Bilang mga opsyon na isa lamang ang dapat piliin",
"Alin sa mga sumusunod ang dapat mong itanong tungkol sa pagsasabuhay ng iyong mga pagpapahalaga?=Ano ang handa kong ibigay?>Ano ang makukuha ko?+Ano ang gusto ng iba?<Ano ang madali?",
"Sino ang dapat magdikta ng iyong mga pagpapahalaga?=Ikaw lamang>Ang iyong mga magulang+Ang iyong pinakamatalik na kaibigan<Ang lipunan",
"Alin sa mga sumusunod ang kahulugan ng terminong 'komitment'?=Kakayahang manatili sa iyong piniling landas kahit ito ay nagiging mahirap>Kakayahang magpasyang sumuko na lang kapag nahihirapan na+Paninindigang gawin lamang ang mga bagay na hindi nangangailangan ng sakripisyo<Kakayahang magbago ng desisyon tuwing may bagong oportunidad",
"Alin sa mga sumusunod ang hindi kabilang sa mga dapat mong isulat sa unang hakbang ng pagbabalangkas ng mga plano mo sa buhay?=Kung ano ang mga hamon ng bawat pagpapahalaga>Kung bakit mahalaga sa iyo ang bawat pagpapahalaga+Kung paano ka gagabayan ng bawat pagpapahalaga<Pinakamahahalaga mong pagpapahalaga",
"Sa pagbabalangkas ng mga plano mo sa buhay, ilang posibleng landas ang dapat mong ilista na naaayon sa iyong mga pagpapahalaga?=Hindi bababa sa lima>Eksaktong tatlo+Hindi hihigit sa tatlo<Higit sa isa",
"Sa iyong kasalukuyang edad, gaano katagal na plano ang dapat mong balangkasin para maitaguyod ang direksiyon ng iyong buhay?=10 taon>5 taon+50 taon<20 taon",
"Gaano kadalas mo dapat repasuhin at baguhin kung kinakailangan ang iyong plano?=Taun-taon>Buwan-buwan+Linggu-linggo<Kada dalawang taon",

);

?>

</head>

</body

</html>