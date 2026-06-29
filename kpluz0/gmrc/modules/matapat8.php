<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Matapat - GMRC in KPluz.com    </title>
<body>

<?php

// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Matapat";
$_SESSION['tnum']="*8e";

$questions=array(

"Alin sa mga sumusunod ang nagpapakahulugan sa pagiging matapat?=Pagtutugma ng salita at gawa>Pagiging palakaibigan+Pagpapakita ng sipag at tiyaga<Pagiging masayahin",
"Alin sa mga sumusunod ang isa sa mga karaniwang anyo ng paglabag sa katapatan?=Pagsisinungaling>Pagiging tamad+Pagsusungit sa kapwa<Kawalan ng pasensiya",
"Alin sa mga sumusunod ang pinakawastong dahilan kung bakit dapat mong tuparin ang bawa't pangakong binibitiwan mo?=Para hindi mawala ang tiwala ng kapwa mo sa iyo>Para makahingi ka ng pabor sa iba balang araw+Para hindi ka siraan ng iyong kapwa<Para makaiwas ka sa parusa",
"Ano ang ipinapakita mo kapag umaamin ka sa iyong pagkakamali?=Katapatan sa sarili at sa iba>Kahinaan ng loob+Pagkukunwari<Pagmamataas sa iba",
"Alin sa mga sumusunod ang nagpapakita ng pagiging totoo sa salita at gawa?=Pagtupad sa mga ipinangako>Paglilihim ng problema sa magulang+Pagkukunwaring masaya kahit malungkot<Pagiging palakaibigan",
"Alin sa mga sumusunod ang halimbawa ng tahimik na pagsisinungaling?=Pagsang-ayon sa mali ng kaibigan>Pakikipagtalo sa kaklase+Pagtawa nang malakas sa ideya ng kausap<Pagsalungat sa hindi nagsasabi ng totoo",
"Alin sa mga sumusunod ang inaasahang bunga ng hindi mo pagtupad sa iyong mga pangako?=Pagkasira ng tiwala sa iyo ng iba>Mas magandang ugnayan sa iyong mga kasamahan+Pagtaas ng tiwala mo sa sarili<Pagbibigay sa iyo ng mahalagang tungkulin",
"Ang pagkakaila o hindi pag-amin sa isang kasalanang nagawa mo ay maituturing na alin sa mga sumusunod?=Paglabag sa katapatan>Pag-unawa sa sarili+Pagiging bukas sa pagbabago<Pagtatanggol ng sariling karapatan",
"Ano ang dapat mong gawin kapag may nagawa kang kasalanan sa kapwa?=Umamin sa pagkakamali>Isisi sa iba ang kasalanan+Manahimik lamang<Magdahilan o magpalusot",
"Alin sa mga sumusunod ang karaniwang epekto ng pagsisinungaling?=Pagkasira ng tiwala ng iba sa atin>Pagkakaroon ng magandang pananaw sa buhay+Pagtatagumpay sa lahat ng gawain<Pagkakaroon ng maraming oportunidad",
"Alin sa mga sumusunod ang ginagamit sa tapat na komunikasyon?=Pakikinig nang maigi at may paggalang>Panunukso o pagbibiro habang nakikinig+Paglilihim ng impormasyon sa kausap<Pagpapalakbay ng isip habang nagsasalita ang kausap",
"Alin sa mga sumusunod ang hindi makikita sa isang taong matapat?=Pagiging mapagbalatkayo>Pagkakaroon ng prinsipyo+Pagrespeto sa damdamin ng kapwa<Pag-amin sa nagawang kasalanan",
"Alin sa mga sumusunod ang pangunahing kahalagahan sa lipunan ng pagiging matapat ng mga mamamayan nito?=Pagpapalaganap ng tiwala at pagkakaisa>Pagbibigay ng kasiyahan o aliw+Mataas na pag-aambisyon ng lahat<Madaling pagkontrol ng pamahalaan sa mga tao",
"Kailan mas nasusubok at nagiging mahalaga ang pagpapakita ng katapatan?=Kapag mahirap sabihin ang totoo>Kapag maganda at ikakatuwa ng makaririnig ang iyong sasabihin+Kapag hindi mo kakilala ang kausap<Kapag walang pakialam ang mga nakikinig",
"Ano ang dapat mong gawin para magkaroon ka ng malinis na konsensiya?=Magsabi ng totoo kahit mahirap>Magpalusot kapag nahuling may pagkakasala+Maglihim ng pagkakamali<Isisi sa iba ang sariling kasalanan",
"Alin sa mga sumusunod ang pangunahing benepisyong nakukuha mo sa pagiging matapat sa iyong kapwa?=Kapayapaan ng loob>Pagiging sikat sa iba+Pagdami ng mga kaibigan<Lalong pagyaman",
"Alin sa mga sumusunod ang hindi halimbawa ng katapatan?=Paglilihim upang makaiwas sa parusa>Pagtupad sa mga pangako+Pag-amin sa sariling pagkakamali<Pagkilos ayon sa sariling paninindigan",
"Kailan mo masasabing ang isang tao ay hindi tapat?=Kung iba ang kanyang iniisip, sinasabi, at ginagawa>Kung siya ay tahimik at mapag-isa+Kung hindi siya madaling magalit<Kung magaling siyang makipagdebate",
"Alin sa mga sumusunod ang hindi makasisira ng respeto ng iba sa atin?=Pagiging magalang>Pagsisinungaling+Pagtupad sa binitiwang salita<Paninira nang patalikod",
"Alin sa mga sumusunod ang dapat mong iwasan upang mapanatili mo ang iyong katapatan?=Pagpanig sa ginawang mali ng iyong kaibigan>Paglalahad ng totoong pangyayari+Pagsunod sa mga alituntunin ng paaralan<Pag-iwas sa pandaraya sa pagsusulit",
"Alin sa mga sumusunod ang ipinapakita ng pagtupad sa lahat ng mga pangako, maliit man o malaki?=Pagiging maaasahan>Pagpapakitang-tao+Pagmamataas sa kapwa<Kawalan ng prinsipyo",
"Alin sa mga sumusunod ang hindi makikita sa isang lipunang binubuo ng mga taong matapat?=Kawalan ng tiwala sa bawat isa>Mababang antas ng kriminalidad+Kaayusan ng paligid<Pantay na hustisya para sa lahat",
"Alin sa mga sumusunod ang hindi isa sa mga karaniwang sanhi ng pagkasira ng tiwala ng iba sa isang tao?=Paghingi ng paumanhin sa nagawang pagkakamali>Pagsisinungaling tungkol sa isang pangyayari+Panlilinlang sa negosyo<Pagbabalatkayo para magmukhang mabait",
"Alin sa mga sumusunod ang pinakaepektibong paraan ng pagtuturo ng katapatan sa iba?=Pagiging mabuting halimbawa sa kanila>Pananakot o pagbabanta sa kanila+Panlalait o pangmamaliit sa kanila<Pagbabalewala sa kanilang mga nagagawang tama",
"Alin sa mga sumusunod ang magandang ugaliin upang manatili kang tapat sa sarili araw-araw?=Pagninilay sa sinasabi at ginagawa>Paggaya sa mga ginagawa ng mga kaibigan+Pagsunod sa mga uso sa kabataan<Pagpaplano kung paano mapapahanga ang iba",

);

?>

</head>

</body>

</html>