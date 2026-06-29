<html> 
<head><meta http-equiv="Content-Language" content="en-us"><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pakikiisa sa mga Gawaing Panrelihiyon - GMRC in KPluz.com    </title>   
</title><body>
<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pakikiisa sa mga Gawaing Panrelihiyon";
$_SESSION['tnum']="*2k";

$questions=array(

"Alin sa mga ito ang nagpapakita ng pakikiisa sa pananampalataya?=Pagtulong sa mahihirap>Paglabag sa mga alituntunin+Pag-iwas sa mga padasal<Panloloko ng kapwa",
"Alin sa mga ito ang gawaing panrelihiyong mapagmalasakit?=Pamamahagi ng pagkain sa mga nagugutom>Pakikipagtalo tungkol sa paniniwala+Pagkakalat ng maling balita<Pag-iingay sa lugar ng pagsamba ng ibang relihiyon",
"Sa aling layunin nagkakaisa maging ang mga magkakaibang relihiyon?=Sa paggawa ng mabuti sa kapwa>Sa pag-aangat ng sarili sa kapwa+Sa pag-iipon ng pansariling kayamanan<Sa paninira ng ibang tao",
"Alin sa mga ito ang mainam ibahagi sa iba pagkatapos mong sumali sa isang gawaing panrelihiyon?=Ang ligayang naramdaman sa pagsali>Ang pagkainip sa gawaing sinalihan+Ang pagod na naramdaman sa pagsali<Ang mga problemang nasaksihan sa gawain",
"Ano ang dapat mong gawin kung inanyayahan ka sa isang 'feeding program' ng inyong simbahan?=Magpaalam sa magulang at sumali>Tanggihan agad ang paanyaya+Tawanan ang nag-imbita<Huwag pansinin ang imbitasyon",
"Bakit mahalaga ang paggalang sa iba't ibang paniniwala?=Upang mapanatili ang kapayapaan>Upang maiangat ang sariling relihiyon sa iba+Para malito ang mga tao sa sasalihang relihiyon<Para dumami ang mga di-pagkakaunawaan",
"Alin sa mga ito ang ang hindi nagpapakita ng pakikiisa sa mga gawaing panrelihiyon?=Pagtawa sa mga suot ng mga kapanalig>Pagtulong sa pag-aayos ng lugar ng pagsamba+Pagsali sa sama-samang pananalangin<Pag-aambag para matulungan ang mga mahihirap",
"Ano ang matutunan natin sa pakikilahok sa mga gawaing panrelihiyon?=Ang halaga ng paglilingkod>Ang halaga ng pagkakaroon ng maraming pera+Mga lihim ng mga namumuno sa ating relihiyon<Mga kuwento ng kababalaghan",
"Ano ang dapat mong gawin kung ang iyong kaibigan ay may ibang relihiyon?=Igalang ang kanyang paniniwala>Pilitin siyang lumipat sa sariling relihiyon+Tawanan ang kanyang mga dasal<Iwasan siya",
"Alin sa mga ito ang mainam gawin kapag may padasal sa inyong barangay?=Makilahok sa pananalangin>Maglaro at mag-ingay sa gilid+Pigilan ang mga kaibigang sumali rito<Pagtawanan ang mga nagdarasal",
"Bakit mahalaga ang pag-aanyaya sa ibang sumali sa mga gawain ng inyong relihiyon?=Upang lumakas ang pagkakaisa at pagtutulungan ng mga kapanalig>Para mas malaki ang makuhang pera+Para mailayo ang mga tao sa ibang relihiyon<Para makilala ang mga sikat na kapanalig",
"Alin sa mga ito ang hindi mo dapat gawin sa isang lugar ng pagsamba?=Maglaro at mag-ingay>Magdasal nang tahimik+Makinig sa nagtuturo<Magbigay-galang sa iba",
"Ano ang dapat mong gawin kung may aktibidad ang inyong relihiyon para sa mga batang lansangan?=Sumama at tumulong>Tumangging makilahok at umiwas+Pagtawanan ang mga batang lansangan<Manggulo sa aktibidad",
"Bakit nagiging mas mabuting tao ang isang batang sumasali sa mga gawaing panrelihiyon?=Natututo siyang magmalasakit at maglingkod sa kapwa>Natututo siyang unahin ang kanyang sarili+Nasasanay siyang magmataas sa iba<Nasasanay siyang manlait ng ibang tao",
"Paano mo mahihikayat ang isang kamag-aral na sumama sa isang 'tree planting activity' ng inyong relihiyon?=Sabihing masaya at makabuluhan ang aktibidad>Magkunwaring may libreng gadyet siyang matatanggap+Takutin siya para sumama<Magsinungaling na dadalo ang paborito niyang artista",
"Ano ang epekto ng sama-samang pagdarasal para sa kapayapaan?=Pagkakaroon ng pag-asa at katiwasayan ng mga mamamayan>Pagkakagulo ng mga tao+Paglaganap ng inggitan sa komunidad<Pagkalat ng mga pekeng balita",
"Ano ang dapat mong gawin kung may matanggap na tulong ang iyong pamilya mula sa isang gawaing panrelihiyon?=Magpasalamat at suklian ito ng kabutihan>Tanggihan at pagtawanan ang tulong+Magmalaki at magalit sa tumutulong<Ipagkalat na walang kuwenta ang tulong na natanggap",
"Ano ang dapat mong ipakita sa mga nakakasalamuha mong taong iba ang relihiyon?=Paggalang>Pagmamayabang+Pagkainis<Pag-iwas",
"Ano ang hindi mo dapat gawin sa 'feeding program' ng isang relihiyong hindi mo kinabibilangan pero humingi ng tulong sa iyo?=Hayaang madumihan ang mga pagkain dito>Tumulong maghain ng pagkain sa mga bata+Tumulong magligpit pagkatapos<Ngumiti sa mga tao",
"Bakit mahalaga ang pagbabahagi ng mga aral na natutunan mo mula sa mga gawaing panrelihiyon?=Para mahikayat ang ibang sumali rin>Para dumami ang naiinggit sa iyo+Para makapagyabang ka sa mga kaibigan<Para mapuri ka ng guro",
"Alin sa mga ito ang maaaring gawin ng isang bata para makatulong sa isang gawaing panrelihiyon?=Pag-aabot ng maliliit na gamit>Pagbubuhat ng malalaking mesa+Pagdadala ng mabibigat na kahon<Pagluluto sa kalan ng mga pagkain",
"Alin sa mga ito ang hindi halimbawa ng gawaing panrelihiyon sa isang komunidad?=Panloloko sa mga tao para makakuha ng pera>Pagpapakain sa mga mahihirap+Pagpapabakuna sa mga bata<Pagtulong sa mga nasalanta ng kalamidad",
"Ano ang dapat mong gawin kung makatanggap ka ng libreng gamot mula sa isang grupong panrelihiyon?=Tanggapin ito at magpasalamat>Tanggihan at balewalain ito+Magalit sa nagbibigay<Kunin ito nang hindi nagpapasalamat",
"Ano ang pangunahing layunin ng pakikiisa sa mga gawaing panrelihiyon?=Maglingkod at magmalasakit sa kapwa>Makakuha ng mga regalo+Makatanggap ng bayad<Ang makaiwas sa mga gawaing bahay",
"Bakit dapat tayong makitungo nang maayos sa lahat ng mga relihiyon sa ating pamayanan?=Upang maitaguyod ang kapayapaan at pagmamahalan>Upang dumami ang mahihingan ng donasyon+Para madaling makapagpalit ng relihiyon<Para mapuri ng guro at magulang",

);

?>
</head>
</bod
</html>