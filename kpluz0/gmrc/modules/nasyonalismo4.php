<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagpapakita ng Nasyonalismo - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagpapakita ng Nasyonalismo";
$_SESSION['tnum']="*4f";

$questions=array(

"Alin sa mga sumusunod ang nilalaro ng dalawang koponan - isang nagbabantay habang nakatapak sa guhit sa lupa at isang tumatakbong dapat makalusot sa bantay?=Patintero>Tumbang Preso+Luksong Tinik<Piko",
"Alin sa mga sumusunod ang ginagamitan ng isang lata at isang tsinelas, kung saan ang nag-iisang taya ay nanghahabol ng mga nagpapataob ng lata gamit ang tsinelas?=Tumbang Preso>Patintero+Luksong Tinik<Piko",
"Alin sa mga sumusunod ang mayroong dalawang manlalarong nagtutupi ng kanilang mga paa upang makagawa ng hadlang na tatalunin naman ng iba pang manlalaro?=Luksong Tinik>Patintero+Tumbang Preso<Piko",
"Alin sa mga sumusunod ang gumagamit ng isang grid ng mga kahon sa lupa kung saan lulundag-lundag sa isang paa ang mga manlalaro upang makuha ang kanilang pamato?=Piko>Patintero+Tumbang Preso<Luksong Tinik",
"Alin sa mga sumusunod ang gumagamit ng isang bagay na kailangang tamaan ng paa ng manlalaro nang maraming beses nang hindi nahuhulog sa lupa?=Sipa>Luksong Baka+Palosebo<Taguan",
"Alin sa mga sumusunod ang mayroong isang tayang nakayuko para makalundag ang iba pang manlalaro sa ibabaw ng kanyang likod?=Luksong Baka>Sipa+Palosebo<Taguan",
"Alin sa mga sumusunod ang laro ng lahi kung saan ang mga manlalaro ay magkukubli para hanapin ng nag-iisang taya?=Taguan>Sipa+Palosebo<Luksong Baka",
"Alin sa mga sumusunod ang gumagamit ng isang posteng pinahiran ng mantika na dapat maakyat ng mga kalahok upang makuha nila ang premyo sa tuktok nito?=Palosebo>Luksong Baka+Sipa<Taguan",
"Ano ang pangunahing kahalagahan ng mga laro ng lahi sa ating bansa?=Magpasa ng kultura sa susunod na henerasyon>Magpakita ng abilidad ng mga batang Filipino+Magamit ng mga bata bilang pampalipas ng oras<Makapagbigay ng premyo sa mga kalahok",
"Sa larong piko, ano ang kadalasang ginagamit na pamato?=Bato>Tansan+Tsinelas<Lata",
"Sa larong luksong baka, ano ang ginagawa ng tinatawag na \"baka\"?=Nakayuko habang nilulundagan ang likod>Tumatalon nang mataas+Humahabol sa ibang manlalaro<Nanunuwag ng mga kalahok",
"Alin sa mga sumusunod ang kadalasang hindi kinakailangan sa paglalaro ng mga laro ng lahi?=Bola>Diskarte+Kooperasyon<Bilis",
"Ano ang pangunahing silbi ng mga laro ng lahi sa kultura ng mga Filipino?=Pagpapanatili ng mga tradisyon>Pagbibigay ng libangan sa kabataan+Pagkuha ng paghanga ng mga dayuhan<Paglilinang sa mga kakayahan ng mga bata",
"Aling aspeto ng pagkatao ang hindi gaanong nagagamit at nalilinang ng mga laro ng lahi?=Ispiritwal>Sosyal+Pisikal<Mental",
"Alin sa mga sumusunod na laro ang pinakanangangailangan ng disiplina sa pagsunod sa mga patakaran?=Piko>Palosebo+Sipa<Luksong Baka",
"Alin sa mga sumusunod ang hindi laro ng lahi?=Basketbol>Sipa+Luksong Baka<Patintero",
"Bakit mahalaga ang paggalang sa mga patakaran ng isang laro ng lahi?=Upang matuto ng disiplina at pagiging patas>Upang maiwasan ang away+Upang hindi matalo<Upang makakuha ng papuri",
"Alin sa mga sumusunod na laro ng lahi ang nagsasanay sa mga bata ng bilis, diskarte, at koopersayon?=Patintero>Palosebo+Luksong Baka<Sipa",
"Alin sa mga sumusunod ang hinuhubog sa mga bata ng larong palosebo?=Determinasyon>Kooperasyon+Talino<Bilis",
"Alin sa mga sumusunod ang sinasanay sa mga bata ng larong 'Chinese garter'?=Paglukso>Pagtakbo+Paghahagis<Pagsipa",
"Alin sa mga sumusunod na laro ng lahi ang nangangailangan ng pamato?=Piko>Patintero+Taguan<Luksong Tinik",
"Alin sa mga sumusunod na laro ng lahi ang masarap gawin sa gabi?=Taguan>TUmbang preso+Piko<Luksong Tinik",
"Ano ang pangunahing layunin ng larong sipa?=Mapanatili ang sipa sa hangin nang matagal>Madala ang sipa sa base+Maagaw sa kalaban ang sipa<Mahanap ang nakatagong sipa",
"Sa luksong tinik, ano ang ginagawa upang mapahirap ang laro habang tumatagal?=Dinadagdagan ang taas ng luluksuhin>Binibilisan ang paglukso+Nilalagyan ng harang ang luluksuhin<Hinahawakan ang lumulukso",
"Alin sa mga sumusunod na laro ng lahi ang karaniwang nilalaro tuwing piyesta?=Palosebo>Tumbang Preso+Luksong Tinik<Piko",
"Ano ang pangunahing layunin ng pagkilala sa mga makasaysayang lugar sa ating pamayanan?=Pagpapakita ng pagmamahal sa bansa at kultura>Pagkakaroon ng karagdagang turista+Pagtukoy sa mga lugar na maaaring pagkakitaan<Pagiging sikat sa ibang tao",
"Alin sa mga sumusunod ang maituturing na isang makasaysayang lugar?=Isang tanyag na parkeng may bantayog ni Rizal>Isang modernong shopping mall+Isang gusaling katatayo pa lamang<Isang palaruan sa lungsod",
"Bakit mahalagang pangalagaan ang mga makasaysayang lugar?=Upang makapagbigay ang mga ito ng inspirasyon at alaala ng kabayanihan>Upang magamit ang mga ito sa pagnenegosyo+Upang makapagyabang ang pamayanang nangangalaga sa mga ito<Upang matakot ang mga susunod na henerasyon sa mga dayuhan",
"Alin sa mga sumusunod ang pangunahing epekto sa kabataan ng pagdalaw nila sa mga makasaysayang lugar?=Kamalayan sa kasaysayan at kultura>Kaalaman sa pagnenegosyo+Kasanayan sa pamamasyal<Kagustuhang makapanglamang sa kapwa",
"Alin sa mga sumusunod ang epektibong paraan ng pagpapalaganap ng kaalaman tungkol sa mga makasaysayang lugar?=Paggamit ng social media upang magbahagi ng impormasyon>Pagpapakita ng kawalan ng interes sa kasaysayan+Pag-iwas sa mga seminar at talakayan tungkol sa mga ito<Pagsusulat sa personal na diary ng tungkol sa mga ito",
"Alin sa mga sumusunod ang hindi paraan kung paano nakakatulong ang mga makasaysayang lugar sa pagpapasigla ng ekonomiya ng isang pamayanan?=Pagbubuhol ng trapiko>Pag-akit ng mga turista+Pagdami ng mga pagawaan ng mga souvenir<Pagsigla ng mga restoran",

);

?>

</head>

</bod

</html>