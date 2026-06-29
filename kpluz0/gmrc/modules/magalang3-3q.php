<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Magalang sa mga PWD - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Magalang sa mga PWD";
$_SESSION['tnum']="*3e";

$questions=array(

"Ano ang dapat mong gawin kung gusto mong tumulong sa isang PWD na naka-wheelchair?=Tanungin muna siya kung kailangan niya ng tulong>Agad na itulak ang kanyang wheelchair+Pilitin siyang magpatulak sa iyo ng kanyang wheelchair<Buhatin siya mula sa kanyang wheelchair",  
"Alin sa mga sumusunod ang nagpapakita ng paggalang sa isang PWD habang siya ay nagsasalita?=Pakikinig nang mabuti>Pagtawa sa kanya+Pagputol sa kanyang pagsasalita<Pagsasalita nang sabay sa kanya",  
"Alin sa mga sumusunod ang hindi mo dapat gawin sa mga may kapansanan?=Tuksuhin sila>Tulungan sila kung nais nila+Makinig sa kanila<Igalang sila",  
"Ano ang dapat mong gawin kung may kausap kang PWD na mahina ang pandinig?=Magsalita nang may sapat na lakas o magsulat>Sigawan siya sa abot ng iyong makakaya+Magalit sa kanya<Tumalikod at umalis",  
"Kapag nakikipag-usap sa isang PWD na naka-wheelchair, ano ang dapat mong gawin?=Yumuko o lumuhod para magpantay kayo>Tumayo nang tuwid sa harap niya+Itayo siya mula sa kanyang wheelchair<Ilipat siya sa isang karaniwang upuan",  
"Alin sa mga sumusunod ang dapat mong iwasan sa pakikitungo sa mga PWD?=Panunukso o pangmamaliit sa kanila>Pagpapakita sa kanila ng respeto+Pagbibigay ng tulong na hinihingi nila<Pakikinig sa kanilang mga kuwento",  
"Anong uri ng pananalita ang dapat mong gamitin kapag nakikipag-usap ka sa mga PWD?=Magalang at malinaw>Mabilis o minamadali+Puno ng yabang<Walang kabuluhan",  
"Bakit hindi mo dapat pagtawanan ang mga PWD?=Para mapanatili ang kanilang dignidad>Para bumaba ang kanilang tiwala sa sarili+Para mawalan sila ng pag-asa sa buhay<Para magalit sila sa mundo",  
"Alin sa mga sumusunod ang nagpapakita ng pagtanggap sa mga PWD?=Pantay at magalang na pakikitungo sa kanila>Madalas na pagtitig sa kanila+Hindi pagkausap sa kanila<Pagpaparamdam na nakakaawa sila",  
"Ano ang dapat mong gawin kung may PWD sa inyong klase?=Isama siya sa lahat ng mga gawaing kaya niya>Panatilihin siya sa isang sulok+Tuksuhin siya palagi<Pilitin siyang gumawa ng mga bagay na hindi niya kaya",  
"Kapag hindi mo naiintindihan ang sinasabi ng isang PWD, ano ang dapat mong gawin?=Magtanong nang maayos at magalang>Pagtawanan siya+Sabihing malabo siyang magsalita<Iwan siyang mag-isa",  
"Ano ang dapat mong gawin kung ayaw tanggapin ng isang PWD ang iniaalok mong tulong?=Igalang ang kanyang desisyon>Gawin pa rin ang pagtulong kahit ayaw niya+Pagtawanan ang kanyang pasya<Magalit sa kanyang pagtanggi",  
"Alin sa mga sumusunod ang nagpaparamdam sa mga PWD na sila ay mahalaga?=Pag-anyaya sa kanilang makilahok sa mga mga gawain>Pagpigil sa kanilang pakikilahok sa mga gawain+Pag-iwas na kausapin sila<Hindi pakikinig sa kanilang mga ideya",  
"Bakit hindi dapat iba ang pagtrato natin sa mga PWD?=Dahil sila ay kapantay natin at may kakayahan din>Para madali natin silang malinlang+Para makapagmalaki tayo sa kanila<Para makakuha tayo ng papuri sa iba",  
"Alin sa mga sumusunod ang palatandaan ng pagiging magalang sa mga PWD?=Pakikinig nang maigi sa kanila>Hindi pagtanggap sa kanilang mga ideya+Pagputol sa kanilang pagsasalita<Hindi pagtitiwala sa kanilang kakayahan",  
"Kapag may kaklase kayong PWD na nais makilahok sa inyong ginagawa, ano ang dapat n'yong gawin?=Isali siya agad at patulungin>Sabihing hindi niya kaya ang gawain+Huwag siyang pansinin<Gawing biro ang pagnanais niyang sumali",  
"Alin sa mga sumusunod ang dapat mong gawin kapag may PWD na nahihirapang kumilos?=Tanungin siya kung nais niyang magpatulong>Tulungan siya nang walang paalam+Gayahin nang pabiro ang kanyang pagkilos<Huwag siyang pansinin",  
"Ano ang dapat mong gawin kung may batang nanunukso sa isang PWD?=Ipagtanggol ang PWD sa mapayapang paraan>Sumali sa panunukso+Makipag-away sa nanunukso<Huwag silang pansinin",  
"Alin sa mga ito ang hindi isa sa mga dahilan kung bakit dapat nating tanggapin ang mga PWD sa ating pamayanan?=Para maramdaman nilang naaawa tayo sa kanila>Dahil marami rin silang maiaambag+Dahil pantay-pantay tayong lahat<Para mapalaganap ang pagkakaisa",  
"Ano ang dapat mong gawin kung naninibago ka sa pagkilos ng isang PWD?=Lawakan ang pag-unawa at manatiling magalang sa kanya>Umiwas at lumayo sa kanya+Tratuhin siyang mahina at dapat kaawaan<Pilitin siyang baguhin ang kanyang pagkilos",  
"Kapag ang kausap mong PWD ay hindi agad makapagsalita, ano ang dapat mong gawin?=Maghintay at matiyagang makinig>Madaliin siyang magsalita+Iwanan siyang mag-isa<Magpakita ng pagkainis sa kanya",  
"Alin sa mga sumusunod ang makakatulong sa pakikipagkaibigan sa isang PWD?=Makinig nang maigi sa kanyang mga kuwento>Sabihing naiiba siya+Magpumilit tumulong sa kanya kahit hindi kinakailangan<Humingi sa kanya ng maraming pabor",  
"Alin sa mga sumusunod ang nagpapakita ng pagtanggap sa mga PWD?=Pagpaparamdam sa kanilang magkakapantay tayong lahat>Pagpapatawa tungkol sa kanilang kalagayan+Hindi pagpayag na makilahok sila sa mga gawain<Hindi pagsang-ayon sa lahat ng mga ideya nila",  
"Alin sa mga sumusunod ang dapat mong iwasan kapag may makasalubong kang PWD?=Panunukso at pang-aalipusta>Pantay na pagtrato sa kanya+Paggalang<Kahandaang tumulong",  
"Kapag may isang PWD na humihingi ng tulong, ano ang dapat mong gawin kung hindi mo alam ang kailangan niya?=Tanungin siya kung anong tulong ang kailangan niya>Hulaan kung anong tulong ang kailangan niya+Tulungan siya sa iba-ibang paraan kahit ayaw niya<Huwag siyang pansinin",  

);

?>

</head>

</bod

</html>