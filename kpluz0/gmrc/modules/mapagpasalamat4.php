<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagpasalamat sa mga PWD - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagpasalamat sa mga PWD";
$_SESSION['tnum']="*4g";

$questions=array(

"Ano ang ibig sabihin ng 'PWD'?=Persons With Disability>People With Determination+People Without Direction<Persons With Doubts",
"Ano ang ipinapakita ng maraming PWD na nagtagumpay sa kabila ng kanilang kapansanan?=Sipag at tiyaga>Katamaran+Pagwawalang-bahala<Kawalan ng pag-asa",
"Alin sa mga sumusunod ang nagagawa ng mga nagsusumikap na atletang PWD?=Nagdadala ng karangalan sa Paralympics>Nagpapahinga buong araw+Nagtatago sa bahay<Hindi sumasali sa mga kompetisyon",
"Paano natin maipapakita ang respeto sa mga PWD?=Pakitunguhan sila nang may dignidad at paggalang>Apihin sila+Huwag silang pansinin<Gawing biro ang kanilang kapansanan",
"Alin sa mga ito ang maituturing na kontribusyon ng mga PWD sa lipunan?=Pagbibigay ng inspirasyon sa iba>Pagiging pabigat sa kapwa+Pagpapabaya sa kanilang paligid<Hindi pagtatrabaho",
"Ano ang tamang gawin kapag may makita kang produkto ng isang PWD?=Bilhin ito bilang pagsuporta>Huwag itong pansinin+Sabihing hindi maganda ang gawa nila<Pagtawanan ang produkto",
"Bakit dapat bigyan ng pagkilala ang mga PWD?=Para maipakitang mahalaga sila sa lipunan>Para mahikayat silang maging tamad+Para hindi sila magsikap<Para masira ang kanilang tiwala sa sarili",
"Ano ang magandang epekto ng pagsali ng mga PWD sa mga aktibidad?=Pagsusulong ng kanilang pagkakakilanlan>Pagkahiwalay nila sa lipunan+Pagpapabagal ng kanilang pag-asenso<Pagdami ng kanilang mga pagsubok",
"Alin sa mga sumusunod ang dapat nating gawin para sa mga PWD?=Bigyan sila ng inspirasyon at suporta>Huag silang kausapin+Maliitin ang kanilang kakayahan<Gawing biro ang kanilang kalagayan",
"Alin sa mga sumusunod ang inaasahang epekto ng pagtuturo at paglalahad ng mga tagumpay na nakamtan ng mga PWD?=Pagpapalaganap ng kamalayan sa kanilang ambag>Pagpapakita na hindi sila gaanong mahalaga+Pagkawala ng tiwala sa kanila<Pag-iwas ng mga tao sa kanila",
"Alin sa mga sumusunod ang hindi makatutulong sa edukasyon ng mga PWD?=Hindi pagtanggap ng mga unibersidad sa kanila>Pagbibigay ng scholarships sa kanila+Pagsasagawa ng workshops para sa kanila<Pagbibigay sa kanila ng mga kompyuter",
"Bakit mahalagang gawing 'accessible' sa mga PWD ang mga pampublikong lugar?=Upang mapadali ang kanilang paggalaw at paglalakbay>Para hindi sila makalabas ng bahay+Para hindi nila magamit ang mga pampublikong pasilidad<Para hindi sila makasali sa mga aktibidad",
"Alin sa mga sumusunod ang isang simpleng paraan ng pagkilala sa kontribusyon ng mga PWD?=Magbigay ng mga sertipiko o tropeo para sa kanilang mga tagumpay>Balewalain ang kanilang mga nagawa+Sabihan silang hindi gaanong mahalaga ang kanilang ambag<Huwag magdaos ng mga pagpaparangal sa kanila",
"Alin sa mga sumusunod ang tamang paraan ng pakikipag-usap sa mga PWD?=Paggamit ng magalang na pananalita>Pagtataas ng boses sa kanila+Pagtatawa sa kanila<Paggamit ng tonong nagpapakita ng pagkainis",
"Alin sa mga sumusunod ang dapat iwasan sa pakikitungo sa mga PWD?=Diskriminasyon at panlalait>Magalang na pakikipag-usap+Pagsuporta sa kanilang kabuhayan<Pagsasaalang-alang ng kanilang kapakanan",
"Ano ang tamang gawin sa mga aktibidad o gawaing pampamayanang tumutulong sa mga PWD?=Makilahok sa mga ito at magbigay ng suporta>Balewalain ang mga ito+Pigilan ang pagsali ng iba sa mga ito<Tawanan ang mga kalahok",
"Paano maipapakita ang pasasalamat sa mga PWD?=Pagtangkilik sa kanilang mga produkto>Pagbabalewala sa kanilang mga nagawa+Pag-iwas sa kanilang mga aktibidad<Pagkakalat ng maling impormasyon tungkol sa kanila",
"Ano ang dapat mong gawin upang matulungan ang kabuhayan ng mga PWD?=Bumili ng kanilang produkto at serbisyo>Iwasan ang kanilang mga negosyo+Tawanan ang kanilang mga tinda<Maliitin ang kanilang mga gawa",
"Alin sa mga sumusunod ang isa sa mga aral na matututunan natin mula sa mga PWD?=Pagpapakita ng sipag at tiyaga sa kabila ng mga hamon>Pag-iwas sa mga responsibilidad+Lubos na pagsandal sa ibang tao<Kawalan ng pag-asa sa buhay",
"Alin sa mga sumusunod ang dapat gawin kapag may 'talent exhibit' ang mga PWD?=Pumunta upang magbigay sa kanila ng suporta>Balewalain ang okasyon+Tawanan ang mga kalahok<Maliitin ang mga gawa nila",
"Bakit mahalaga ang pagpapalaganap ng impormasyon tungkol sa mga PWD?=Upang maunawaan ng lipunan ang kanilang kahalagahan>Upang maawa ang mga tao sa kanila+Upang palaganapin ang diskriminasyon laban sa kanila<Upang mabalewala ang kanilang mga kontribusyon",
"Alin sa mga sumusunod ang dapat gawin upang mas lumakas ang tiwala ng mga PWD sa kanilang sarili?=Bigyan sila ng pagkilala>Huwag silang pansinin+Balewalain ang kanilang nagawa<Pagkaitan sila ng mga oportunidad",
"Alin sa mga sumusunod ang tamang paraan ng pagpapakita ng malasakit sa mga PWD?=Pagsuporta sa kanilang mga kabuhayan at aktibidad>Pag-iwas sa kanila+Panlalait sa kanilang kakayahan<Pagbabalewala sa kanilang mga ambag",
"Ano ang maaaari mong gawin upang mas maraming tao pa ang makaalam ng mga talento at ambag ng mga PWD?=Ibahagi ang mga ito sa social media>Ilihim ang mga ito sa iba+Gawing katatawanan ang mga ito para hindi seryosohin ng iba<Maliitin ang mga ito sa publiko",
"Ano ang dapat nating gawin upang mas marami pang mga PWD ang matulungan?=Sumali sa mga programang sumusuporta sa kanila>Pagkaitan sila ng mga oportunidad+Sabihan silang hindi sila magaling<Laitin ang kanilang mga ambag",
"Ano ang dapat nating gawin upang makapagbigay ng inspirasyon sa mga PWD?=Kilalanin ang kanilang ambag at talento>Pagkaitan sila ng suporta+Ilayo sila sa mga oportunidad<Tawanan ang kanilang kalagayan",

);

?>

</head>

</bod

</html>