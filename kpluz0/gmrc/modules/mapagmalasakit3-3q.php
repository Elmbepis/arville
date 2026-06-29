<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagmalasakit sa Kapwa - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagmalasakit sa Kapwa";
$_SESSION['tnum']="*3d";

$questions=array(

"Ano ang ibig sabihin ng pagiging mapagmalasakit?=Pagtulong sa kapwa nang bukal sa puso>Paghingi ng tulong sa iba+Pag-iwas sa mga nangangailangan<Pagtawa sa problema ng iba",  
"Ano ang dapat mong gawin kung nahulog ang mga gamit ng isa mong kaklase?=Tumulong sa pagpulot ng mga ito>Tuksuhin at pagtawanan siya+Pagalitan siya<Huwag siyang pansinin",  
"Kapag may kaklase kang walang baon, ano ang dapat mong gawin?=Magbahagi ng sariling baon sa kanya>Umiwas sa kanya+Maliitin siya<Ipahiya siya sa lahat",  
"Alin sa mga sumusunod ang nagpapakita ng pagmamalasakit sa kaklaseng maysakit?=Pagtulong sa kanyang makapunta sa klinika>Paglayo sa kanya para hindi mahawa+Pagpigil sa kanyang makihalubilo sa klase<Panunukso sa kanya",  
"Ano ang ibig sabihin ng pagtulong mula sa puso?=Pagtulong nang bukal sa kalooban>Pagtulong para makatanggap ng papuri+Pagtulong para makatanggap ng pabuya<Pagtulong para makapagyabang",  
"Ano ang dapat mong gawin kapag may makita kang kaklaseng nag-iisa sa palaruan?=Lapitan siya at yayaing makipaglaro>Pabayaan siyang nag-iisa+Tuksuhin siya at pagtawanan<Paalisin siya sa palaruan",  
"Alin sa mga sumusunod ang dapat mong sabihin sa kaibigang kinakabahan sa pagsusulit?=Magtiwala ka sa sarili mo.>Lagot ka!+Mapapagalitan ka sa inyo.<Bakit hindi ka nag-aral?",  
"Ano ang dapat mong gawin kapag may makita kang batang umiiyak?=Tanungin siya kung kailangan niya ng tulong>Iwasan siya at layuan+Sigawan siyang huwag umiyak<Pagtawanan siya",  
"Alin sa mga sumusunod ang nagpapakita ng pagmamalasakit sa kapwa?=Pakikinig sa taong may problema>Pang-aagaw ng gamit ng kaklase+Pagdadamot ng baon sa iba<Pagkakalat sa silid-aralan",  
"Bakit dapat tayong magmalasakit sa ating kapwa?=Para lumaganap ang kabutihan>Para maipagmalaki natin ang ating kakayahan+Para makakuha tayo ng papuri<Para matuto tayong maging makasarili",  
"Kapag may kaklase kang nadulas at natumba, ano ang dapat mong gawin?=Tulungan siyang makatayo>Tumawa nang malakas sa kanya+Sumigaw na hindi siya nag-iingat<Huwag siyang pansinin",  
"Ano ang dapat mong gawin kapag may kaklase kang hindi makaintindi ng inyong aralin?=Turuan siya para maunawaan niya ito>Ipahiya siya sa buong klase+Pabayaan siyang malito<Lapitan siya at pagtawanan",  
"Ano ang dapat mong gawin kapag may kaibigan kang nagkamali?=Paalaalahanan siya sa maayos at magalang na paraan>Pagalitan siya+Maliitin ang kanyang kakayanan<Siraan siya sa ibang tao",  
"Ano ang dapat mong gawin kapag may makita kang batang nahihirapang magbitbit ng kanyang dala?=Tulungan siyang magbitbit>Tuksuhin siya at pagtawanan+Huwag siyang pansinin<Harangan ang kanyang daanan",  
"Alin sa mga sumusunod ang karaniwang epekto ng pagmamalasakit ng bawa't isa?=Magandang samahan ng lahat>Madalas na di-pagkakaunawaan+Pagkakaroon ng inggitan<Kawalan ng pagkakaisa",  
"Alin sa mga sumusunod ang nagpapakita ng pagmamalasakit sa isang batang nawalan ng laruan?=Pagtulong sa paghahanap nito>Pagsasabi sa kanyang pabaya siya+Pagbibirong nahanap mo na ang laruan kahit hindi<Pag-uwi sa bahay nang walang pakialam",  
"Kapag may kaklase kang nagalusan sa paglalaro, ano ang dapat mong gawin?=Tulungan siyang makapunta sa pagamutan>Pabayaan siyang mag-isa+Sumigaw na hindi siya nag-iingat<Takutin pa siyang lalo",  
"Alin sa mga sumusunod ang palatandaan ng pagiging mapagmalasakit?=Pagpapakita ng kabutihan kahit walang kapalit>Panlalait ng kaklase+Pagpapabaya sa mga nakababatang kapatid<Pagyayabang sa mga kaibigan",  
"Alin sa mga sumusunod ang maaari mong gawin para matulungan ang isang batang nalulungkot?=Kaibiganin siya at damayan>Gawing katatawanan ang kanyang kalagayan+Ipagkalat sa iba ang kanyang kalungkutan<Iwasan siya o layuan",  
"Alin sa mga sumusunod ang mahalagang tandaan sa ibibigay mong tulong?=Dapat itong manggaling sa puso>Kailangang malaki ang halaga nito+Makakatulong dapat ito sa iyong pag-angat<May katumbas dapat itong kapalit",  
"Ano ang dapat mong gawin kapag may kaklase kang mapag-isa at malayo ang loob sa inyo?=Tulungan siyang mapalapit sa lahat>Pabayaan na lang siyang mag-isa+Pagkatuwaan ang kanyang pagiging mapag-isa<Ipahiya siya sa buong klase",  
"Ano ang ibig sabihin ng pagtulong nang bukal sa loob?=Pagtulong nang buong kusa at walang pag-aalinlangan>Pagtulong para may makuhang kapalit+Pagtulong para maiangat ang sarili sa iba<Pagtulong na pinagsisisihan sa huli",  
"Alin sa mga sumusunod ang nagpapakita ng pagmamalasakit sa mga magulang?=Pagtulong sa mga gawaing-bahay>Paglalaro buong araw+Pagkukulong sa kuwarto<Pag-iwas sa mga utos",  
"Alin sa mga sumusunod ang nagpapakita ng pagmamalasakit sa mga kapatid?=Paggabay sa kanilang mga gawain>Panunukso sa kanila+Pagdadamot ng pagkain sa kanila<Pag-uutos sa kanila ng mabibigat na trabaho",  
"Alin sa mga sumusunod ang hindi makakatulong sa kaibigan mong may problema sa pamilya?=Panghuhusga at paninisi sa kanya>Pakikinig nang maigi sa kanya+Pagpapayo sa kanya sa maayos na paraan<Pag-unawa sa kanyang pinagdadaanan",  

);

?>

</head>

</bod

</html>