<html> 
<head><meta http-equiv="Content-Language" content="en-us"><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Responsable sa Pamayanan - GMRC in KPluz.com    </title>   
</title><body>
<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Responsable sa Pamayanan";
$_SESSION['tnum']="*3k";

$questions=array(

"Alin sa mga ito ang nagpapakita ng pagiging responsable sa barangay?=Pagpapanatili ng kalinisan ng paligid>Pag-iwas sa mga gawaing-bahay+Pag-iwas sa mga tao<Pagtapak sa mga halaman",
"Alin sa mga ito ang makakatulong para maging masaya at maayos ang isang pamayanan?=Sama-samang paggawa ng tama>Pag-aalitan ng mga pamilya+Panlalamang sa kapwa<Pagiging makasarili",
"Alin sa mga ito ang tungkulin ng mga naninirahan sa barangay?=Pagsunod sa mga alituntunin>Pagbibigay ng donasyon sa barangay+Pagbili ng mga mamahaling gamit<Pag-iwas sa mga kapitbahay",
"Alin sa mga ito ang mabuting asal na dapat gawin ng bawa't bata?=Pagiging magalang sa kapwa>Pag-iwas sa guro+Panunukso ng kaklase<Hindi pagsunod sa magulang",
"Alin sa mga ito ang makabuluhang gawain sa barangay na mainam salihan ng mga tao?=Pagtatanim ng mga puno>Paglalaro ng basketbol buong araw+Pagsusulat sa mga upuan sa parke<Pananakot sa mga batang naglalaro",
"Bakit dapat mong turuan ng kagandahang asal ang mga nakababata sa iyo?=Upang maging responsableng mamamayan sila>Para maging sunud-sunuran sila sa iyo+Upang hindi sila matutong mag-isip para sa sarili<Para mapuri ka ng iyong guro",
"Ano ang maaari mong sabihin sa isang kaklaseng hindi nagliligpit para mapaalalahanan siya?=Halika at magligpit na tayo.>Ang tamad mo naman!+Magligpit ka nga!<Bakit wala kang ginagawa?",
"Ano ang pangunahing layunin ng paggawa ng mga poster na may positibong mensahe o paalala?=Manghikayat ng kapwang gumawa ng mabuti>Manalo ng premyo sa isang art contest+Maiangat ang sarili sa iba<Mapuri ng guro",
"Bakit dapat purihin ang mabubuting gawain ng iba?=Upang mahikayat ang lahat na gumawa ng mabuti>Para malaman nilang ikaw ang dapat nilang sundin+Upang mainggit ang iba sa kanila<Para makakuha ka rin ng papuri",
"Ano ang epekto kapag walang tumutupad sa kanya-kanyang mga tungkulin sa barangay?=Kaguluhan at pag-aalitan>Pag-asenso ng lahat+Katiwasayan sa buong pamayanan<Pagkakaisa ng lahat",
"Ano ang dapat mong gawin sa iyong mga laruan pagkatapos mong maglaro?=Iligpit ang mga ito sa tamang lalagyan>Iwanan lang ang mga ito sa lapag+Ihagis ang mga ito sa ibabaw ng kama<Sipain ang mga ito sa ilalim ng mesa",
"Bakit dapat mong anyayahan ang iyong mga kaibigang sumali sa mga gawaing pambarangay?=Para maging mas masaya at mabilis ang paggawa>Para may mauutusan ka sa mga gawain+Para mapagod din sila tulad mo<Para mapuri ka ng mga opisyal ng barangay",
"Alin sa mga ito ang hindi nagpapakita ng pagiging responsable?=Pagsusulat sa dingding>Pagtulong sa pag-aayos ng silid-aralan+Pagsunod sa mga utos ng magulang<Pagliligpit ng mga ginamit na aklat",
"Alin sa mga ito ang pinakamainam gawin sa gabi?=Pagbabasa o paglilibang nang tahimik>Pagpapatugtog ng malakas na musika+Pagkanta nang malakas sa videoke<Maingay na pagkakatuwaan kasama ang mga kaibigan",
"Ano ang dapat mong gawin kung may makita kang sirang kagamitan sa palaruan ng barangay?=Ipagbigay-alam ito sa mga opisyal ng barangay para maayos>Paglaruan pa rin ito kahit hindi ito ligtas+Siraan pa lalo ito para mapalitan<Kunin ito at dalhin sa bahay",
"Ano ang kahulugan ng responsableng pagtupad sa tungkulin?=Paggawa ng nakatokang gawain nang walang palya kahit walang nakabantay>Paggawa ng nakatokang gawain kapag binabantayan+Kaagad na pagkilos kapag inutusan<Paggawa ng isang gawaing gusto mong gawin",
"Bakit dapat maging magiliw ang pagpapaalala mo sa iyong kapwa ng kanyang responsibilidad?=Upang hindi masaktan ang kanyang damdamin>Para mapahiya siya sa ibang tao+Upang makita ng lahat na mali siya<Para matakot siya sa iyo",
"Alin sa mga ito ang magagawa mo para mapahalagahan ang bawat isa sa inyong pamayanan?=Paggalang at pagiging patas sa lahat ng tao>Pag-aangat ng sarili sa iba+Pagpapakita ng talento para sumikat<Pagbibigay ng pera sa lahat ng mamamayan",
"Ano ang dapat mong gawin sa isang kaklaseng hindi marunong maghiwalay ng basura?=Turuan siya sa maayos na paraan>Tuksuhin siya at pagtawanan+Pigilan siyang magtapon ng basura<Pabayaan lang siyang gumawa ng mali",
"Ano ang wastong reaksyon kapag pinuri ka sa iyong pagiging responsable?=Magpasalamat at ipagpatuloy ang pagiging responsable>Magyabang sa lahat ng kakilala+Tumigil sa pagiging responsable<Magpakita ng pagtatampo dahil noon ka pa dapat pinuri",
"Alin sa mga ito ang hindi nagpapakita ng pagiging responsable sa barangay?=Pag-iwas sa mga utos>Pagsunod sa mga patakaran+Paggalang sa kapwa<Pag-aaral nang mabuti",
"Alin sa mga ito ang magsusulong ng pag-unlad ng isang barangay?=Pagtupad ng bawat mamamayan sa kanyang mga tungkulin>Pag-aatang ng lahat ng mga tugkulin sa balikat ng kapitan+Pagpapabaya ng mga tao sa kanilang trabaho<Kawalan ng ambisyon ng mga kabataan",
"Alin sa mga ito ang hindi mo dapat isama sa isang poster na naglalayong magbigay ng positibong mensahe?=Masakit na pananalita>Magandang larawan+Maliliwanag na kulay<Mga salitang nagbibigay ng inspirasyon",
"Bakit mahalaga ang sama-samang pagkilos ng mga mamamayan sa paggawa ng tama?=Dahil mas epektibo ang pagkilos kung may pagkakaisa>Para mapagod ang lahat+Para unahin ng bawat isa ang sariling kagustuhan<Dahil mas madaling magmagaling kapag magkakasama sa paggawa",
"Ano ang dapat mong gawin kapag humingi ang inyong guro ng tulong sa paglilinis ng silid-aralan?=Sumali nang kusa at maging aktibo>Magtago sa sulok para hindi mapansin+Magpanggap na may sakit<Humiling ng bayad bago tumulong",

);

?>
</head>
</bod
</html>