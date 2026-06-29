<html> 
<head><meta http-equiv="Content-Language" content="en-us"><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pakikiisa sa mga Gawaing Panrelihiyon - GMRC in KPluz.com    </title>   
</title><body>
<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pakikiisa sa mga Gawaing Panrelihiyon";
$_SESSION['tnum']="*39";

$questions=array(

"Ang ibig sabihin ng pakikiisa sa mga gawaing panrelihiyon ay pagsali sa alin sa mga sumusunod?=Mga gawaing may kaugnayan sa pananampalataya>Mga gawaing may kaugnayan sa kalikasan+Mga gawaing may kaugnayan sa palakasan<Mga gawaing may kaugnayan sa paghahanapbuhay",
"Bakit mahalaga ang pakikiisa sa mga gawaing panrelihiyon?=Upang maipakita ang pananampalataya sa Diyos>Upang mapuri ng guro+Upang makaiwas sa mga gawaing-bahay<Upang hindi mapagalitan ng magulang",
"Ano ang dapat mong gawin tuwing misa?=Makinig at makiisa sa panalangin>Matulog sa loob ng simbahan+Maglaro sa cellphone<Makipagkuwentuhan sa katabi",
"Ang pagmamahal sa Diyos ay maipapakita sa pamamagitan ng alin sa mga sumusunod?=Taos-pusong pananalangin at pagsamba>Pagiging sikat sa komunidad+Pagbili ng mga mamahaling gamit<Pag-iimpok ng maraming pera",
"Alin sa mga sumusunod ang halimbawa ng gawaing panrelihiyon?=Pagrorosaryo kasama ang pamilya>Paglalaro sa labas ng simbahan+Pag-aaral ng mga bagong sayaw<Pamamasyal kasama ang mga kaibigan",
"Bakit dapat tayong sumama sa pag-awit sa misa?=Upang makiisa sa pagsamba at mapalalim ang pananampalataya>Upang hangaan ng iba ang ating boses+Para hindi mainip sa misa<Para hindi mapagsabihan ng ating magulang",
"Ano ang dapat mong gawin kung hindi mo pa kabisado ang panalangin habang nagsisimba?=Makinig muna at subukang makasunod nang paunti-unti>Umalis na lang sa simbahan+Makipagkuwentuhan muna sa katabi<Gumamit muna ng cellphone para maaliw",
"Ano ang dapat mong gawin kapag may misa sa bahay?=Makibahagi sa panalangin at pag-awit>Lumabas para maglaro+Manood ng TV sa sala<Umidlip muna sa kwarto",
"Alin sa mga sumusunod ang gawaing makakatulong sa isang panrelihiyong okasyon?=Pagdadala ng kandila o bagay na gagamitin para rito>Pagpapatawa sa loob ng simbahan+Paglalaro sa paligid ng simbahan<Pagkanta rito sa pabirong paraan",
"Alin sa mga sumusunod ang maling pag-uugali sa loob ng simbahan?=Pakikipagdaldalan sa katabi>Pagiging tahimik+Pagiging magalang<Pagdarasal nang taimtim",
"Ano dapat ang una mong gawin bago ka magdasal?=Magpokus sa gagawing pagdarasal>Manood muna ng TV+Kumain muna ng meryenda<Magplano kung saan mamamasyal kinabukasan",
"Alin sa mga sumusunod ang nagpapakita ng pakikiisa sa mga gawaing panrelihiyon?=Pagsama sa pagdarasal ng pamilya>Paglalaro habang nagdarasal ang pamilya+Pagtawa sa pagdarasal ng pamilya<Pag-idlip hanggang matapos ang pagdarasal ng pamilya",
"Bakit kailangang lumahok ang bawat bata sa mga gawaing panrelihiyon?=Upang lumalim ang kanyang pananampalataya>Upang maiangat niya ang sarili sa iba+Para hindi siya pagalitan<Para maraming humanga sa kanya",
"Alin sa mga sumusunod ang dapat iwasan habang nakikilahok sa isang panrelihiyong gawain?=Pakikipagkuwentuhan sa katabi>Pakikiisa sa pagdarasal+Pag-awit ng mga papuri<Pagtulong sa pag-aalay",
"Alin sa mga sumusunod dapat mong gawin pagkatapos ninyong magsimba?=Magpatuloy sa pagiging mabait na bata sa bahay>Magyaya sa mall para bumili ng mamahaling laruan+Matulog sa bahay buong araw<Maglaro sa kalsada kasama ang mga kaibigan",
"Maipapakita mo ang iyong pagmamalasakit sa pananampalataya sa pamamagitan ng alin sa mga sumusunod?=Kusang pagsali sa mga gawaing panrelihiyon>Pamamasyal sa mga makasaysayang lugar+Pagbili ng mamahaling rosaryo<Panonood ng mga pelikulang nakakatakot",
"Alin sa mga sumusunod ang dapat mong gawin kapag may nananalangin sa bahay?=Makibahagi nang taos-puso>Magkulong sa sariling kuwarto+Magyayang kumain muna<Magpanggap na may sakit",
"Ano ang karaniwang layunin ng mga panrelihiyong pagtitipon?=Mapalalim ang pananampalataya sa Diyos>Makapagpalipas ng oras+Makakuha ng mga donasyon<Magkaroon ng ipo-post sa social media",
"Alin sa mga sumusunod ang dapat mong dalhin sa isang panrelihiyong gawain?=Rosaryo o Bibliya>Laruan+Cellphone o tablet<Baong pagkain",
"Alin sa mga sumusunod ang nagpapakita ng respeto sa isang banal na lugar?=Tahimik at magalang na pagkilos>Pagtakbo-takbo sa paligid+Pagkukuwentuhan habang kumakain<Pag-iingay habang nagkakatuwaan",
"Alin sa mga sumusunod ang hindi mo dapat gawin sa altar ng inyong bahay?=Gawin itong tambakan ng mga gamit>Ayusin ito palagi+Panatilihin itong malinis<Igalang ito",
"Bakit mahalaga ang taimtim na pananalangin?=Para mapalalim ang ugnayan sa Diyos>Para antukin at makatulog agad+Para mapuri ng mga magulang<Para makuha ang hinihinging laruan sa Diyos",
"Alin sa mga sumusunod ang pakinabang ng sama-samang pananalangin ng pamilya?=Pagkakaisa ng pamilya sa pananampalataya>Pagkawatak-watak ng pamilya sa pananampalataya+Paghina ng pananampalataya ng bawat isa<Kawalan ng direksiyon ng pamilya sa pananampalataya",
"Alin sa mga sumusunod ang nagpapakita ng pagkukusa sa isang panrelihiyong gawain?=Pag-aayos ng altar kahit walang nag-uutos>Pagpupunas ng mga upuan sa simbahan kapag inutusan+Pagwawalis ng sahig ng simbahan dahil may nagsabi<Pagsali sa pananalangin dahil niyaya",
"Ano dapat ang iyong layunin tuwing ikaw ay nagsisimba?=Pagpapalalim ng pananampalataya sa Diyos>Pagkakaroon ng bagong kaibigan+Pagpapakita ng iyong galing sa pag-awit<Pagpaparangya ng iyong bagong damit",

);

?>
</head>
</bod
</html>