<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagbigay - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagbigay";
$_SESSION['tnum']="*8p";

$questions=array(

"Alin sa mga sumusunod ang pinakamainam gawin para maipakita mong ang iyong pananampalataya ay hindi natatapos sa pagsamba lamang?=Araw-araw na pagtulong at pagmamalasakit sa kapwa>Pagdarasal nang malakas para marining ng kapitbahay+Pag-aaral ng banal na kasulatan araw-araw<Pagsusuot ng mga damit na may disenyong panrelihiyon",
"Alin sa mga sumusunod ang maituturing na pinakamahalagang tungkulin at paraan ng pagsamba?=Pagtulong sa mga nangangailangan>Pagdarasal nang matagal sa simbahan+Magandang pag-awit ng mga himnong panrelihiyon<Pagmamano sa mga pari",
"Alin sa mga sumusunod ang dapat mong gawing layunin tuwing ikaw ay magbibigay para maging tunay ito?=Pagpapabuti ng kalagayan ng binibigyan>Pagtataas ng iyong pangalan at reputasyon+Pagpapapansin sa mga mayayamang nais mong kaibiganin<Pang-iinsulto sa mga hindi nagbibigay",
"Alin sa mga sumusunod ang halimbawa ng paglalaan ng oras para makapaglingkod sa kapwa?=Pagtuturo sa mga batang lansangan tuwing Sabado>Pagsisimba tuwing Linggo+Pagtitinda ng mga gamit na panrelihiyon para kumita<Pagbabasa ng Bibliya tuwing gabi",
"Alin sa mga sumusunod ang hindi halimbawa ng paggamit ng talento para makapagsilbi sa kapwa?=Pagsali sa isang palaro kung magaling ka sa basketbol>Pagtuturo sa mga bata kung mahusay ka sa paaralan+Pagbibigay ng mga iginuhit na larawan sa mga maysakit kung mahusay ka sa sining<Pag-awit sa mga pagdiriwang kung mahusay kang kumanta",
"Sa konteksto ng pagsasabuhay ng pagmamalasakit sa kapwa, bakit mo kailangang maging mapagmasid sa paligid?=Para makahanap ng pagkakataong makatulong sa kapwa>Para makakita ng taong nagkakasala at mapagalitan siya+Para matukoy ang mga taong may problema at maiwasan sila<Para makatiyempo ng mayamang mahihingan ng pera ",
"Bakit itinuturing na isang anyo ng pagbibigay ang pagtatanim mo ng positibong saloobin sa iba?=Natutulungan nitong makabangon ang isang taong nawawalan na ng pag-asa>Napapaganda nito ang iyong reputasyon+Nagiging daan ito para makakuha ka ng biyaya mula sa iba<Mas nakokontrol mo ang iyong kapwa sa pamamagitan nito",
"Alin sa mga sumusunod ang tanda ng tunay na pagtulong sa kapwa?=Kapag ginagawa ito nang palihim>Kapag ginagawa ito habang maraming tao ang nanonood+Kapag ginagawa ito dahil may kapalit<Kapag ginagawa ito sa harap ng kamera",
"Alin sa mga sumusunod ang hindi magandang motibasyon sa pagtulong o pagbibigay sa kapwa?=Paghahangad ng papuri mula sa iba>Pagpapaganda ng kalagayan ng kapwa+Panghihikayat sa ibang tumulong din<Pagpapalaganap sa komunidad ng diwa ng pagmamalasakit",
"Ang pagsisilbi sa isang kawanggawa o pag-aalaga sa mga bata sa isang ampunan tuwing Sabado ay halimbawa ng alin sa mga sumusunod na hakbang o paraan para maisabuhay ang pagiging mapagbigay?=Paglalaan ng oras para sa paglilingkod>Paggamit ng iyong talento para sa kabutihan+Pagiging mapagmasid para makahanap ng mga matutulungan<Pagbabahagi ng positibong saloobin",
"Alin sa mga sumusunod na hakbang o paraan para maisabuhay ang pagiging mapagbigay ang tumutukoy sa pagtuklas ng iyong kakaibang kakayahan o kasanayan para maging kasangkapan mo ito sa pagtulong sa iba?=Paggamit ng iyong talento para sa kabutihan>Paglalaan ng oras para sa paglilingkod+Pagiging mapagmasid para makahanap ng mga matutulungan<Pagbabahagi ng positibong saloobin",
"Alin sa mga sumusunod na hakbang o paraan para maisabuhay ang pagiging mapagbigay ang tumutukoy sa pag-oobserba sa iyong paligid para mo hindi mapalampas ang mga pagkakataong makatulong sa kapwa?=Pagiging mapagmasid para makahanap ng mga matutulungan>Paglalaan ng oras para sa paglilingkod+Paggamit ng iyong talento para sa kabutihan<Pagbabahagi ng positibong saloobin",
"Alin sa mga sumusunod na hakbang o paraan para maisabuhay ang pagiging mapagbigay ang tumutukoy sa pagbibigay ng magandang pananaw sa isang taong nawawalan ng pag-asa upang palakasin ang loob niya?=Pagbabahagi ng positibong saloobin>Paglalaan ng oras para sa paglilingkod+Paggamit ng iyong talento para sa kabutihan<Pagiging mapagmasid para makahanap ng mga matutulungan",
"Alin sa mga sumusunod na hakbang o paraan para maisabuhay ang pagiging mapagbigay ang tumutukoy sa paglahok sa mga sama-samang aktibidad ng inyong komunidad upang magkawanggawa, tulad ng mga 'community pantry' o 'medical mission'?=Pagsali sa mga proyektong tumutulong sa mga nangangailangan>Paglilihim ng pagbibigay+Paggamit ng iyong talento para sa kabutihan<Paglalaan ng oras para sa paglilingkod",
"Alin sa mga sumusunod na hakbang o paraan para maisabuhay ang pagiging mapagbigay ang tumutukoy sa pagmamalasakit sa kapwa sa paraang hindi nakikita o nalalaman ng ibang tao?=Paglilihim ng pagbibigay>Pagsali sa mga proyektong tumutulong sa mga nangangailangan+Paggamit ng iyong talento para sa kabutihan<Paglalaan ng oras para sa paglilingkod",
"Kailan nagiging pagpaparangal sa Diyos ang pagtulong sa iyong kapwa?=Kapag nagmumula ito sa iyong puso>Kapag ginagawa mo ito upang makakuha ng gantimpala+Kapag napapansin at napupuri ito ng ibang tao<Kapag ipinagmamalaki mo ito sa social media",
"Bakit mahalagang alamin natin ang aktuwal na pangangailangan ng ating tinutulungan bago tayo tumulong?=Upang tunay na mapabuti ang kalagayan ng tinutulungan>Upang hindi sumobra ang ating pagbibigay+Para malaman natin kung paano tayo makakahingi ng kapalit sa ating pagtulong<Para mas lalo nating maipagyabang sa social media ang ating pagtulong",
"Alin sa mga sumusunod ang nagpapakitang kinikilala mong kaloob ng Diyos ang iyong pagtulong?=Pag-unawang ang lahat ng iyong tinatanggap ay mga biyaya mula sa Diyos na dapat mong ibahagi>Pagsasabing ikaw ay mayaman kaya marami kang natutulungan+Pagmamalaki sa social media na relihiyoso ka kaya mahilig kang tumulong<Pag-iisip na makakakuha ka ng gantimpala sa pamamagitan ng iyong pagtulong",
"Alin sa mga sumusunod ang hindi kabilang sa mga maaari mong ibahagi kung gusto mong tumulong pero wala kang materyal na bagay na maibigay?=Gamit na pag-aari ng ibang tao>Sariling oras+Pagsisilbi gamit ang iyong talento o kasanayan<Positibong saloobin",
"Ano ang dapat mong gawin kung may makita kang kamag-aral na walang baon?=Alukin siya ng bahagi ng iyong baon nang palihim>Magbahagi sa kanya ng iyong baon at ipagsigawan ito sa buong klase+Sabihan ang inyong gurong bigyan siya ng pambili ng pagkain<Huwag siyang pansinin dahil hindi mo naman siya responsibilidad",
"Bakit mas mainam na gawing lihim ang iyong pagbibigay sa kapwa?=Para mapanatili ang dignidad ng tumatanggap>Para mas lalong maipagyabang sa social media ang pagbibigay+Para hindi ka hingan ng tulong ng iba pang nangangailangan<Para hindi mo na kailangan pang magtawag ng mga saksi",
"Ano ang malamang na maging bunga ng walang pagsasaalang-alang mong pagbibigay ng isang bagay na sira o hindi na mapapakinabangan sa isang tao?=Pagka-insulto ng binigyan mo nito>Matinding pagpapasalamat ng nakatanggap nito+Pagkakaroon ng utang na loob sa iyo ng nakatanggap nito<Pagpuri sa iyo ng mga tao sa paligid",
"Sa paanong paraan ka dapat magbigay ng payo o positibong saloobin sa isang taong may pinagdadaanang pagsubok?=Sa paraang taimtim at nagmumula sa pag-unawa>Sa mahaba at detalyadong paraang nagpapakita ng iyong talino+Sa paraang sapilitan at may pananakot<Sa harap ng maraming tao para makakuha ng papuri",
"Alin sa mga sumusunod ang inaasahang bunga ng pagiging responsable at mapagbigay ng lahat ng mga mamamayan sa isang komunidad?=Kapayapaan, pagkakaisa, at pag-unlad>Pagpapagalingan ng mga tao sa pagbibigay+Pagdami ng mga tamad na umaasa sa tulong ng iba<Paglaganap ng mga inggitan at alitan sa pamayanan",
"Alin sa mga sumusunod ang hindi kabilang sa mga pangunahing layunin o benepisyo ng iyong pagiging mapagbigay sa kapwa?=Pagkunsinti sa mga taong tamad at ayaw magsikap>Pagsasabuhay ng pananampalataya+Personal na paglago o pag-unlad<Pagbuo ng mas mabuting lipunan",

);

?>

</head>

</bod

</html>