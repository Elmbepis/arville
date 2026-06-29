<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapanagutang Digital Citizen - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapanagutang Digital Citizen";
$_SESSION['tnum']="*96";

$questions=array(

"Alin sa mga sumusunod ang kahulugan ng 'netiquette'?=Ang magandang asal na dapat sundin sa online na pakikipag-ugnayan>Ang bilis ng internet connection sa isang lugar+Ang disenyo ng isang website o application<Isang cybersecurity system na ginagamit para puksain ang mga panganib sa social media",
"Bakit mas lalong nagiging mahalaga ang netiquette sa social media kumpara sa totoong buhay?=Dahil ang bawat komento online ay maaaring makita ng libu-libong tao sa isang iglap>Dahil mas madaling magalit ang tao online kaysa sa totong mundo+Dahil maaari mong sabihin ang kahit ano online<Dahil may bayad ang paggamit ng internet",
"Alin sa mga sumusunod ang maling paniniwala ng maraming kabataan tungkol sa social media?=Na dahil virtual ang social media, ang kanilang mga kilos ay hindi totoo o walang tunay na epekto>Na dapat kang mag-post araw-araw kung gusto mo sumikat+Na ang gumagamit lamang ng social media ay ang mga mayayaman<Na hindi mo na kailangang mag-aral dahil may social media na",
"Ano ang tinatawag na 'digital footprint' ng isang tao?=Ang bakas na iniiwan ng iyong online na pagkilos na maaaring makaapekto sa iyo hanggang sa iyong pagtanda>Ang mga litratong iyong ipino-post sa social media+Ang bilang ng iyong mga followers at friends online<Ang mga apps na ginagamit mo sa iyong cellphone",
"Alin sa mga sumusunod ang isa sa mga pangunahing gabay sa pagiging mabuting digital citizen?=Alamin na ang iyong online na pagkilos ay may pangmatagalang bakas>Mag-post ng maraming litrato upang maging sikat+Sumali sa lahat ng online trends kahit hindi mo gusto<Iwasang magkaroon ng social media account",
"Ano ang gintong panuntunan o 'Golden Rule' sa dihital na mundo?=Tratuhin ang iyong kapwa online gaya ng nais mong pagtrato sa iyo>Laging ipilit sa iba ang lahat ng iyong mga opinyon+Tratuhin ang iyong kapwa online sa paraang makakalamang ka<Iwanan ang mga taong hindi sumasang-ayon sa iyo",
"Ano ang dapat mong gawin tuwing magpo-post ka ng litrato ng isa mong kaibigan o kakilala?=Humingi ng pahintulot sa kanya>Lagyan muna ng caption ang litrato bago i-post+I-tag ang lahat ng kakilala ninyo kahit hindi sila kasama sa litrato<I-edit ang litrato gamit ang AI bago i-post",
"Alin sa mga sumusunod na gabay sa pagiging mabuting digital citizen ang nagbababala na ang bawat post mo, kabilang ang mga makakasira sa reputasyon mo, ay nananatili sa internet kahit burahin mo pa ito?=Alamin na ang iyong online na pagkilos ay may pangmatagalang bakas>Sumunod sa Golden Rule+Igalang ang privacy ng iba<Iwasan ang cyberbullying",
"Alin sa mga sumusunod na gabay sa pagiging mabuting digital citizen ang nagsasabing bago mo gawin ang isang bagay, tanungin mo muna ang sarili mo kung gusto mong gawin ito sa iyo ng iba?=Sumunod sa Golden Rule>Alamin na ang iyong online na pagkilos ay may pangmatagalang bakas+Igalang ang privacy ng iba<Iwasan ang cyberbullying",
"Ang pagbabahagi ng problema o sikreto ng iyong kaibigan sa social media ay lumalabag sa alin sa mga sumusunod na gabay sa pagiging mabuting digital citizen?=Igalang ang privacy ng iba>Protektahan ang iyong personal na impormasyon+Huwag magpakalat ng mga pekeng balita<Iwasan ang cyberbullying",
"Ang pagpapahiya ng isang tao sa 'comments section' at pagsali sa 'hate pages' ay lumalabag sa alin sa mga sumusunod na gabay sa pagiging mabuting digital citizen?=Iwasan ang cyberbullying>Protektahan ang iyong personal na impormasyon+Huwag magpakalat ng mga pekeng balita<Igalang ang privacy ng iba",
"Ang pagpo-'post' ng isang kuwentong nakakatawa pero hindi totoo at pagsasabing totoong nangyari ito ay lumalabag sa alin sa mga sumusunod na gabay sa pagiging mabuting digital citizen?=Huwag magpakalat ng mga pekeng balita>Protektahan ang iyong personal na impormasyon+Iwasan ang cyberbullying<Igalang ang privacy ng iba",
"Ang pagbibigay ng iyong tirahan, numero ng telepono, o password sa isang follower sa social media ay lumalabag sa alin sa mga sumusunod na gabay sa pagiging mabuting digital citizen?=Protektahan ang iyong personal na impormasyon>Huwag magpakalat ng mga pekeng balita+Iwasan ang cyberbullying<Igalang ang privacy ng iba",
"Ang pagbabasa at pag-unawa ng mga artikulo tungkol sa online safety ay bahagi ng alin sa mga sumusunod na gabay sa pagiging mabuting digital citizen?=Mag-aral tungkol sa digital literacy>Huwag magpakalat ng mga pekeng balita+Iwasan ang cyberbullying<Protektahan ang iyong personal na impormasyon",
"Alin sa mga sumusunod na gabay sa pagiging mabuting digital citizen ang nagbababala na ang labis na paggamit ng 'social media' ay nagdudulot ng pagkainggit, pagkabagabag, depresyon, kawalan ng pag-asa, at takot?=Kilalanin na ang social media ay may epekto sa iyong mental health>Huwag magpakalat ng mga pekeng balita+Sumunod sa Golden Rule<Protektahan ang iyong personal na impormasyon",
"Alin sa mga sumusunod na gabay sa pagiging mabuting digital citizen ang nagsasabing ang paggamit ng 'fake account' upang manira ng iba ay duwag at walang pananagutan?=Huwag magtago sa likod ng anonymity>Sumunod sa Golden Rule+Igalang ang privacy ng iba<Iwasan ang pagpapakalat ng fake news",
"Ano ang dapat mong gawin bago ka mag-share ng isang balita online?=Alamin muna kung mapagkakatiwalaan ang pinanggalingan nito>Baguhin ito nang kaunti para maging nakakatawa+Paikliin muna ito para madaling basahin<Hintayin muna itong mag-trending bago ito i-share",
"Alin sa mga sumusunod ang hindi halimbawa ng cyberbullying?=Pisikal na pananakit sa isang tao>Pagpapahiya sa isang tao sa comments section+Pagpapakalat online ng mga nakakahiyang litrato ng isang tao<Matinding pananakot sa isang tao online",
"Anong uri ng online culture ang dapat mong likhain?=Isang espasyo ng paggalang, kaligtasan, at kapayapaan>Isang espasyo ng paghuhusga at paninira+Isang espasyo kung saan laging tama ang iyong opinyon<Isang espasyo kung saan walang nagkakaiba ng opinyon",
"Ano ang dapat mong gawin sa mga pagtatalong online na hindi naman mahalaga?=Huwag patulan ang mga ito>Patulan ang mga ito para sumikat ka online+Isali sa mga ito ang lahat ng iyong mga kaibigan<I-post ang screenshot ng usapan upang mapagtawanan ng iyong mga followers",
"Ano ang dapat mong gawin kapag may makita kang mapaminsalang post o account?=I-report ito gamit ang report button>Balewalain lamang ito at huwag pansinin+I-share ito upang maging aware ang lahat<Mag-reply ng masama sa nag-post bilang pangontra",
"Alin sa mga sumusunod ang hindi kabilang sa mga uri ng nilalaman na dapat mong i-post sa social media?=Mga pekeng anunsyong kunwari ay galing sa pamahalaan>Impormasyong makatutulong sa iba+Mga aral o kaalaman<Magagandang karanasang makapagbibigay ng inspirasyon sa mambabasa",
"Kung mag-'like' o mag-'share' ka ng isang post na naninira ng iba, alin sa mga sumusunod ang malamang na magiging epekto nito sa iyo?=Masisira ang reputasyon mo dahil maiisip ng iba na sang-ayon ka sa paninira>Wala itong magiging epekto sa iyo dahil hindi naman ikaw ang gumawa ng post+Gaganda ang reputasyon mo dahil maiisip ng iba na sumusuporta ka sa malayang pagpapahayag<Maraming matutuwa sa iyo dahil tinulungan mo silang maging aware sa post",
"Alin sa mga sumusunod ang hindi kabilang sa mga uri ng group chat na dapat mong suportahan?=Group chat para sa mga chismis at nakakahiyang litrato>Group chat para sa pagtutulungan sa proyekto+Group chat para sa pagbabahagi ng inspirasyon<Group chat para sa pagpapalitan ng impormasyon tungkol sa isang libangan",
"Alin sa mga sumusunod ang hindi kabilang sa mga bunga ng pagiging mabuting digital citizen?=Pagkasira ng mga relasyon sa iba>Kapayapaan ng isip+Magandang reputasyon<Kaligtasan",

);

?>

</head>

</body

</html>