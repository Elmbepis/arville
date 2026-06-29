<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagpasensiya - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagpasensiya";
$_SESSION['tnum']="*3c";

$questions=array(

"Ano ang ibig sabihin ng pagiging mapagpasensiya?=Pagiging mahinahon at maunawain palagi>Pagiging mapagmataas+Pagiging masayahin palagi<Pag-iwas sa mga pagsubok",  
"Ano ang ginagawa ng mapagpasensiyang bata kapag siya ay hindi napapansin?=Naghihintay nang mahinahon>Nagtatampo at umiiyak+Nagagalit sa lahat<Nanggugulo sa paligid",  
"Bakit mahalaga ang pasensiya sa pakikitungo sa kapwa?=Napapabuti nito ang mga ugnayan>Nagdudulot ito ng pagkainip+Napapababa nito ang tiwala sa sarili<Nakakatulong ito sa pagmamalaki",  
"Alin sa mga sumusunod ang hindi nagpapakita ng pasensiya sa isang kaklaseng mabagal magsalita?=Pagsabay sa kanyang pagsasalita>Pakikinig nang buong puso+Hindi pagsingit sa kanyang pagpapahayag<Pag-unawa sa kanyang sinasabi",  
"Ano ang dapat mong gawin kapag may batang naunang magsalita sa iyo?=Makinig muna hanggang siya ay matapos>Sumingit sa kanyang pagsasalita+Umalis habang nagsasalita siya<Magalit sa kanya",  
"Alin sa mga sumusunod ang palatandaan ng mapagpasensiyang bata?=Marunong maghintay ng kanyang pagkakataon>Palaging nagmamadali+Mabilis uminit ang ulo<Pumipila pero umaalis din agad",  
"Kapag may batang nakabangga sa iyo nang hindi sinasadya, ano ang dapat mong gawin?=Unawain siya at huwag magalit>Itulak siyang pabalik+Pagalitan siya<Tingnan siya nang masama",  
"Alin sa mga sumusunod ang hindi mo dapat gawin kung naiinis ka na sa isang kaklase?=Itulak siyang palayo sa iyo>Huminga muna nang malalim+Kausapin siya nang mahinahon<Pakalmahin ang sarili",  
"Alin sa mga sumusunod ang dapat mong iwasan upang makapagpakita ng pasensiya?=Pagsigaw habang nakikipag-usap>Pakikinig nang maigi+Paghihintay nang maayos<Pag-unawa sa pagkakamali ng iba",  
"Alin sa mga sumusunod ang nagpapakita ng pag-unawa sa pagkakamali ng kausap?=Maayos at magalang na pagpapayo sa kanya>Panlalait sa kanya+Paninisi sa kanya<Pananakot sa kanya",  
"Alin sa mga sumusunod ang karaniwang epekto ng pagiging mapagpasensiya?=Magandang ugnayan sa kapwa>Madalas na di-pagkakaunawaan+Pag-iwas ng mga kaibigan<Kawalan ng tiwala sa sarili",  
"Kapag may kaibigan kang hindi agad makatulong sa iyong proyekto, ano ang dapat mong gawin?=Unawain siya at maghintay>Pilitin siyang tumulong agad+Magtampo at lumayo sa kanya<Siraan siya sa ibang tao",  
"Ano ang dapat mong gawin kapag mahaba ang pila sa kantina?=Tahimik na pumila at maghintay>Sumingit sa unahan+Manggulo sa pila<Mag-alboroto sa gitna ng kantina",  
"Ano ang dapat mong gawin kung hindi ka nabibigyang-pansin ng taong nais mong kausapin?=Manatiling magalang at maghintay>Hampasin siya upang mapansin ka niya+Sumigaw nang malakas sa kanya<Hilahin siya sa braso para humarap siya sa iyo",  
"Paano ka makapagpapakita ng pasensiya sa isang kaklaseng napakalakas magsalita habang nakikipag-usap?=Paalalahanan siya sa mahinahon at magalang na paraan>Sigawan siyang pabalik+Tumalikod at iwan siyang mag-isa<Tawagin siyang maingay",  
"Alin sa mga sumusunod ang hindi natin ipinapakita kapag marunong tayong maghintay?=Pagiging mayabang>Disiplina+Respeto sa iba<Pagiging matiyaga",  
"Alin sa mga sumusunod ang palatandaan ng pagiging mapagpasensiya?=Pananatiling kalmado kahit may problema>Mabilis na pag-init ng ulo+Hindi pagtanggap sa pananaw ng iba<Pananakit sa ibang tao",  
"Alin sa mga sumusunod ang karaniwang epekto sa isang tao ng pagkakaroon niya ng mahabang pasensiya?=Mas magaan na pakiramdam>Kawalan ng pag-asa+Madalas na pagmamaktol<Pagtakas sa problema",  
"Alin sa mga sumusunod ang nagpapakita ng pagkakaroon ng pasensiya sa kapwa?=Pag-unawa sa kaalitan>Paninisi sa kapwa+Pagpipilit ng sariling gusto<Pagtatampo kapag hindi napagbigyan",  
"Kapag may ibang opinyon ang isa mong kaibigan, ano ang dapat mong gawin?=Igalang ang kanyang pananaw>Pilitin siyang sumang-ayon sa iyo+Tawanan ang kanyang ideya<Maliitin ang kayang pagkatao",  
"Paano mo maipapakita ang iyong pasensiya kapag mayroon kayong 'group work' sa klase?=Makinig sa lahat at makipagtulungan>Ipilit ang sariling ideya+Madaliin ang lahat sa pagtatrabaho<Tumayo at umalis kapag nainip",  
"Ano ang una mong dapat gawin kapag may nangyaring hindi maganda?=Kumalma at unawain ang buong sitwasyon>Sumigaw para ilabas ang takot+Maghanap ng masisisi<Tarantahin ang mga kasama",  
"Kapag may 'emergency,' alin sa mga sumusunod ang hindi makakatulong upang makapagpakita ng pasensiya?=Pagkataranta at pagmamadaling gumawa ng hakbang>Paghinga nang malalim+Pag-iisip muna bago magsalita<Pag-unawa sa sitwasyon",  
"Ano ang dapat mong gawin sa isang taong naiiba ang mga paniniwala?=Pakitunguhan pa rin siya nang maayos>Huwag siyang pansinin+Maliitin ang kanyang mga pananaw<Tuksuhin siya at pagtawanan",  
"Bakit mahalaga ang pag-unawa at pagpapasensiya sa iba?=Upang mapanatili ang kapayapaan>Para laging makuha ang iyong gusto+Para makapagmalaki sa kapwa<Para hindi mapagalitan ng magulang",  
 
);

?>

</head>

</bod

</html>