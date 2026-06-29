<html> 
<head><meta http-equiv="Content-Language" content="en-us"><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagmalasakit sa Kalikasan - GMRC in KPluz.com    </title>   
</title><body>
<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagmalasakit sa Kalikasan";
$_SESSION['tnum']="*3a";

$questions=array(


"Alin sa mga sumusunod ang isa sa mga mabubuting gawing itinuturo sa atin ng ating pamilya para makapagmalasakit sa kalikasan?=Tamang pagtatapon ng basura>Pagpuputol ng mga puno+Pagsusunog ng basura sa bakuran<Labis na paggamit ng plastik",
"Alin sa mga sumusunod ang isa sa mga mabubuting gawing itinuturo sa atin ng ating pamilya para makapagmalasakit sa kalikasan?=Pagtitipid sa kuryente>Pagtatapon ng basura sa ilog+Pagsusunog ng lumang gulong sa kalsada<Pag-iiwang nakabukas ang gripong hindi ginagamit",
"Alin sa mga sumusunod ang isa sa mga mabubuting gawing itinuturo sa atin ng ating pamilya para makapagmalasakit sa kalikasan?=Pagtitipid sa tubig>Pag-iimbak ng basura sa kalye+Pagsusunog ng mga tuyong dahon<Pag-iiwang nakabukas ang ilaw na hindi ginagamit",
"Alin sa mga sumusunod ang isa sa mga mabubuting gawing itinuturo sa atin ng ating pamilya para makapagmalasakit sa kalikasan?=Pagreresiklo ng mga lumang bagay>Pagtatapon ng basura sa dagat+Pagsusunog ng mga halaman<Paggamit ng mausok na sasakyan",
"Alin sa mga sumusunod ang isa sa mga mabubuting gawing itinuturo sa atin ng ating pamilya para makapagmalasakit sa kalikasan?=Pagtatanim ng mga puno at halaman>Pagtatapon ng mga gamit na maaari pang pakinabangan+Pag-aaksaya ng pagkain<Pagtatapon ng balat ng kendi sa kalsada",
"Ang pagmamahal sa kalikasan ay maipapakita ng pamilya sa pamamagitan ng alin sa mga sumusunod?=Pagtitipid ng tubig at kuryente>Labis na pagkonsumo ng mga produkto+Pagbili ng maraming bagay na yari sa plastik<Pagluluto ng sobra-sobrang pagkain",
"Alin sa mga sumusunod ang natututunan ng mga bata mula sa kanilang mga magulang tungkol sa pangangalaga ng kalikasan?=Pagiging responsable sa kapaligiran>Pagbabalewala sa polusyon+Pagpapabaya sa mga anyong tubig<Pag-aaksaya ng mga likas na yaman",
"Alin sa mga sumusunod ang gamit sa bahay na dapat patayin kapag walang tao?=Ilaw>Telepono+Orasan<Doorbell",
"Bakit mas nagiging masaya ang pamilya kapag malinis ang paligid?=Dahil mabaho ito sa pang-amoy>Dahil maginhawa ito sa pakiramdam+Dahil walang nagkakasakit<Dahil maganda ito sa paningin",
"Alin sa mga sumusunod ang dapat mong iwasan upang hindi dumumi ang hangin?=Pagsusunog ng basura>Pagtatanim ng mga halaman at puno+Paglilinis ng mga ilog<Pagtitipid sa kuryente",
"Ano ang ginagawa ng isang bata sa paaralan kapag nasanay siyang magtipid ng tubig sa bahay?=Pagpatay sa gripo kapag hindi ginagamit>Pagtatanim ng mga halaman at puno+Paghihiwalay ng basurang nabubulok sa di-nabubulok<Pagreresiko ng mga lumang bagay",
"Ano ang ginagawa ng isang bata sa paaralan kapag nasanay siyang magtipid ng kuryente sa bahay?=Pagpatay sa ilaw kapag hindi ginagamit>Pag-iwas sa paggamit ng mga supot na plastik+Pagtuturo sa mga kaklase tungkol sa pagreresiklo<Pagdidilig ng mga halaman sa hardin",
"Alin sa mga sumusunod ang tamang paraan ng pamamahala sa basura?=Pagtatapon nito sa tamang basurahan>Pagsusunog nito sa bakuran+Pagbabaon nito sa lupa<Pagtatapon nito sa ilog",
"Alin sa mga sumusunod ang tamang paraan ng pamamahala sa basurang nabubulok?=Paggamit nito sa paggawa ng organikong abono>Pagtatapon nito sa lalagyan ng mga ireresiklo+Pag-iimbak nito sa isang bahagi ng kalsada<Paggamit nito upang makagawa ng bagong bagay",
"Alin sa mga sumusunod ang hindi isa sa mga tamang paraan ng pamamahala sa basurang hindi nabubulok?=Pagkokompost nito>Pagpapahakot nito sa mga basurero+Paggamit nito sa ibang paraan<Paggamit nito upang makagawa ng bagong bagay",
"Alin sa mga sumusunod ang masamang dulot ng pagsusunog ng basura sa sariling bakuran?=Polusyon sa hangin>Polusyon sa tubig+Pagkaubos ng mga hayop na ilang<Pagkakalbo ng kagubatan",
"Bakit mahalaga ang pagtitipid ng tubig?=Upang hindi ito maubos sa pinagkukunan nito>Upang tumagal ang buhay ng mga tubo ng tubig+Para hindi agad masira ang mga gripo<Para bumaba ang bayarin sa kuryente",
"Ano ang pangunahing benepisyo ng pagtatanim ng mga puno at halaman?=Pagkakaroon ng sariwang hangin>Pagbagsak ng maraming ulan+Pagpapabango ng paligid<Pagbabawas ng basura",
"Alin sa mga sumusunod ang mga uri ng basurang dapat paghiwalayin?=Nabubulok at di-nabubulok>Malaki at maliit+Mabigat at magaan<Mabango at mabaho",
"Ano ang dapat mong gamitin sa pamimili para maipakita mo ang iyong pagmamalasakit sa kapaligiran?=Bag na maaaring labhan at muling gamitin>Supot na plastik+Bag na isang beses lang magagamit<Mga kamay mo lamang",
"Alin sa mga sumusunod ang hindi isa sa mga dahilan ng paghihiwalay ng basurang di-nabubulok sa basurang nabubulok?=Para mapadali ang paggawa ng abono mula sa basurang di-nabubulok>Para mapadali ang pagreresiklo ng basurang di-nabubulok+Para mapadali ang pagkokompost ng basurang nabubulok<Para mabawasan ang basurang hahakutin ng mga basurero",
"Bakit mahalagang iwasan ang paggamit ng plastik?=Dahil mahirap itong mabulok>Dahil mahal ito+Dahil mabilis itong mabulok<Dahil madali itong makasugat",
"Alin sa mga sumusunod ang maaaring matutunan ng isang batang tumutulong sa paghahardin?=Pagmamahal sa kalikasan>Pagsasayang ng oras+Pag-aaksaya ng tubig<Pagbabalewala sa likas na yaman",
"Ano ang una mong dapat gawin kung may gamit kang biglang nasira?=Patingnan ito kung maaari pang ayusin>Itapon ito sa basurahan+Sunugin ito sa bakuran<Ibaon ito sa lupa",
"Alin sa mga sumusunod ang hindi makatutulong sa pagtitipid ng tubig?=Napakatagal na paggamit ng shower>Pagpatay sa mga gripong hindi ginagamit+Pagkukumpuni ng mga sirang tubo ng tubig<Pagdidilig gamit ang tubig na ipinanghugas ng pagkain",
"Alin sa mga sumusunod ang hindi makatutulong sa pagtitipid ng kuryente?=Napakatagal na pagpaplantsa sa bawat piraso ng damit>Pagpatay sa appliances na hindi ginagamit+Pagpatay ng ilaw sa maliwanag na lugar<Paggamit ng mga bumbilyang LED",

);

?>
</head>
</bod
</html>