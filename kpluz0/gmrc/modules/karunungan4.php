<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagpapakita ng Karunungan sa Pagpili ng Lider - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagpapakita ng Karunungan sa Pagpili ng Lider";
$_SESSION['tnum']="*4h";

$questions=array(

"Alin sa mga sumusunod ang dapat gawin sa pagpili ng lider-estudyante?=Suriin ang mga katangian at layunin ng mga kandidato>Pumili nang hindi nag-iisip+Sundan lang ang boto ng iba<Huwag bumoto",
"Ano ang ibig sabihin ng pagiging tapat ng isang lider?=Palaging gumagawa ng tama kahit walang nakatingin>Nagkukubli ng impormasyon+Palihim na gumagawa ng masama<Hindi nagsasabi ng totoo",
"Alin sa mga sumusunod ang tanda ng isang responsableng lider?=Tumutupad sa mga tungkulin sa tamang oras>Laging umaasa sa iba+Nagpapabaya sa mga gawain<Umiiwas sa mga problema",
"Alin sa mga sumusunod ang tanda ng pagiging makatarungan?=Pantay na pagtingin sa lahat>Pagbibigay ng pabor sa mga kaibigan+Pagbabalewala sa opinyon ng iba<Pagkiling sa sariling kagustuhan",
"Alin sa mga sumusunod ang tanda ng isang lider na may malasakit sa kapwa?=Inuuna ang kapakanan ng nakararami kaysa pansariling interes>Inuuna ang sariling kagustuhan+Hindi nakikinig sa sinasabi ng iba<Binabalewala ang mga nangangailangan",
"Ano ang kahulugan ng pagiging mabuting tagapagplano?=Pinag-iisipan ang mga hakbang para sa maayos na proyekto>Umiiwas sa responsibilidad+Hindi iniisip ang maaaring maging epekto ng mga desisyon<Ginagawa ang lahat ng bagay sa biglaang paraan",
"Bakit mahalagang magkaroon ng positibong pananaw ang isang lider?=Para maging inspirasyon siya sa iba>Para siya ay katakutan+Para mangibabaw siya sa lahat ng mga nasasakupan<Para maipakita niyang mas mahusay siya sa iba",
"Alin sa mga sumusunod ang hindi tanda ng isang mapagpakumbabang lider?=Nag-iisip na siya palagi ang tama>Tumatanggap ng kritisismo+Nagpapasalamat sa tulong ng iba<Marunong humingi ng paumanhin kung kinakailangan",
"Alin sa mga sumusunod ang dapat hanapin sa isang lider?=Pagiging mapamaraan sa paglutas ng problema>Pagiging pabaya sa mga tungkulin+Pagiging mapagmataas sa iba<Pagiging takot magkamali sa lahat ng oras",
"Bakit mahalaga ang pagkakaroon ng isang lider na may bisyon?=Para magabayan ang grupo sa tamang direksyon>Para maging paiba-iba ang landas na tinatahak ng grupo+Para walang magtanong sa kanyang mga layunin<Para maging magulo ang mga plano",
"Alin sa mga sumusunod ang inaasahang epekto ng pagpili ng tamang lider-estudyante?=Pagkakaisa sa mga mag-aaral>Pagsulpot ng mga kaguluhan+Pagdami ng mga problema ng grupo<Kakulangan ng paggabay sa mga estudyante",
"Ano ang ginagawa ng isang lider na mahusay sa paglutas ng problema?=Humahanap ng solusyong makakabuti sa lahat>Nagpapabaya sa problema+Pinipili ang solusyong may pansarili niyang kapakinabangan<Hindi nakikinig sa mungkahi ng iba",
"Paano makakakuha ng tiwala ang isang lider mula sa ibang estudyante?=Pagpapakita ng integridad at kakayahan>Pamimilit na siya palagi ang tama+Hindi pagpansin sa kapwa<Pagbibigay ng maling impormasyon",
"Alin sa mga sumusunod ang hindi mo kailangang suriin sa bawat kandidato bago ka bumoto?=Kanyang antas sa lipunan>Kanyang layunin at plataporma+Kanyang pakikitungo sa kapwa<Kanyang mga nagawa na",
"Bakit mahalaga ang karanasan ng isang lider?=Para maging handa siya sa pagharap sa mga hamon>Para magmukha siyang magaling+Para maiangat niya ang sarili sa iba<Para hindi na siya magsikap",
"Alin sa mga sumusunod ang dapat mong gawin kapag nakikinig ka sa isang kandidato?=Unawain ang kanyang sinasabi>Maglaro sa paligid+Makipagdaldalan sa katabi<Tawanan ang kanyang sinasabi",
"Alin sa mga sumusunod ang dapat mong alamin tungkol sa bawat kandidato?=Kanyang kakayahan at layunin>Kasaysayan ng kanyang pamilya+Kanyang antas sa lipunan<Kanyang mga kaibigan",
"Ano ang dapat mong gawin kung ang inyong lider ay gumawa ng maling desisyon?=Kausapin siya nang maayos>Pagtawanan siya+Huwag siyang pansinin<Siraan siya sa iba",
"Alin sa mga sumusunod ang ipinapakita ng isang mahusay na lider?=Detalyado at maayos na pagpaplano>Kawalan ng direksyon+Pagpapabaya sa mga proyekto<Pagtangging makinig sa iba",
"Ano ang pangunahing layunin ng tamang lider?=Magdala ng pag-unlad at kaayusan>Magpasimuno ng mga kaguluhan+Magpakitang-gilas para mapuri ng iba<Unahin ang pansariling interes",
"Paano natutulungan ng isang lider ang mga mag-aaral?=Sa pamamagitan ng tamang paggabay>Sa pamamagitan ng pagbibigay ng maling impormasyon+Sa pamamagitan ng pagkontrol sa kanila<Sa pamamagitan ng pagbabalewala sa kanilang mga hinaing",
"Alin sa mga sumusunod ang tanda ng pagiging mapagpakumbaba ng isang lider?=Pagiging bukas na matuto sa iba>Pagpapakitang mas magaling siya sa iba+Hindi pagpansin sa iba<Pagtangging tumanggap ng kritisismo",
"Ano ang ginagawa ng isang lider na mapamaraan?=Nakakahanap ng solusyon sa bawat problema>Umaasa sa tulong ng iba+Iniiwasan ang mga problema<Hindi nakikinig sa mungkahi ng iba",
"Alin sa mga sumusunod ang nagpapakita ng karunungan sa pagpili ng lider?=Pagboto batay sa kakayahan at integridad>Pagboto ng kaibigan o kakilala+Panggagaya sa boto ng karamihan<Hindi pagboto",
"Alin sa mga sumusunod ang tanda ng pagiging mahusay na lider?=Pagkilos na tugma sa kanyang sinasabi>Pagkilos na mapanlinlang+Pagkilos na inuuna ang sariling interes<Pag-iwas sa mga responsibilidad",

);

?>

</head>

</bod

</html>