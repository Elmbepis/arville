<?php

$grd=$grd;
$title="Pagiging Mapagpasalamat sa<br/>mga Pilipinong Nag-ambag";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000CC'>";
$red=$font."<font color='#CC0000'>";
$black=$font."<font color='#000000'>";
$orange=$font."<font color='#f06805'>";
$pink=$font."<font color='#CC0066'>";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#BB0000'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:26pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#BB0000'>"; 
	}

$article="

Maraming Pilipino ang nagsakripisyo, nagtiyaga, at nagmalasakit upang gawing mas mabuti ang ating bansa. 
Sa araling ito, matututunan natin kung paano tayo makapagpapasalamat sa mga Pilipinong nag-ambag sa ating bansa sa pamamagitan ng pagkilala sa kanilang mga kontribusyon at pagbibigay-pugay sa kanila.
<br/><br/><br/>
@blue
Kahalagahan ng Pagkilala<br/>sa mga Pilipinong Nag-ambag
@nblue
<br/>
Ang kasaysayan ng Pilipinas ay puno ng mga bayani at natatanging Pilipinong nag-iwan ng marka sa iba't ibang larangan - mula sa sining, agham, edukasyon, pulitika, palakasan, hanggang sa paglilingkod sa kapwa. Ang kanilang mga kuwento ay hindi 
lamang dapat manatili sa mga aklat; dapat ipagmalaki at ibahagi ang mga ito, at gawing inspirasyon ng bawat batang Pilipino. 
<br/><br/>
Kapag kinikilala natin ang kanilang mga kontribusyon, ipinapakita nating hindi natin sila kinakalimutan. Ipinapakita nating ang kanilang mga sakripisyo at tagumpay ay may halaga sa ating kasalukuyang buhay.
<br/><br/>
Ang ating bansa ay hindi magiging kung ano ito ngayon kung wala ang mga taong nagbigay ng kanilang panahon, talento, at maging ng kanilang buhay para sa kapakanan ng nakararami. Ang ating kalayaan, ang ating karapatan sa edukasyon, ang mga natuklasan
ng ating mga siyentipiko, ang ating mga akdang pampanitikang kinikilala sa buong mundo - lahat ng mga ito ay bunga ng pagsisikap ng mga Pilipinong nagmalasakit sa bayan. 
<br/><br/>
Ang pagiging mapagpasalamat ay nangangahulugan ng pagkilala sa kanilang mga kontribusyon at pagpapahalaga sa mga bagay na kanilang iniwan sa atin.
<br/><br/><br/>
@blue
Mga Kontribusyon ng<br/>mga Pilipinong Nag-ambag
@nblue
<br/>
Napakarami ng mga Pilipinong dapat nating kilalanin at pasalamatan dahil sa kanilang mga kontribusyon sa ating bansa. Ang mga sumusunod ay ilan lamang sa kanila.
<br/><br/>$vio<u>
Mga Bayani ng Kalayaan
</u><br/><br/>$black
$pink<i>
Dr. Jose Rizal
</i><br/><br/>$black
Si Dr. Jose Rizal ang ating pambansang bayani. Isinulat niya ang \"Noli Me Tangere\" at \"El Filibusterismo,\" mga nobelang gumising sa damdaming makabayan ng mga Pilipino laban sa pang-aabuso ng mga Kastila. Ipinakita niya na ang panulat ay maaaring maging 
sandata laban sa kawalang-katarungan.
<br/><br/>$pink<i>
Andres Bonifacio
</i><br/><br/>$black
Si Andres Bonifacio ang Ama ng Himagsikang Pilipino. Itinatag niya ang Katipunan, isang lihim na samahang naglayong makamit ang kalayaan ng Pilipinas sa pamamagitan ng rebolusyon. Ang kanyang tapang at pagmamahal sa bayan ay nagbigay-daan sa pagsiklab ng 
Rebolusyong Pilipino noong 1896.
<br/><br/>$pink<i>
Melchora Aquino (Tandang Sora)
</i><br/><br/>$black
Si Melchora Aquino ang \"Ina ng Katipunan.\" Tinanggap niya at pinakain ang mga katipunero sa kanyang bahay. Ipinakita niya na hindi hadlang ang edad upang maglingkod sa bayan.
<br/><br/>$pink<i>
Gabriela Silang
</i><br/><br/>$black
Pagkamatay ng kanyang asawang si Diego Silang, si Gabriela Silang ang nanguna sa rebolusyon sa Ilocos. Siya ang kauna-unahang babaeng namuno sa isang pag-aalsa sa Pilipinas. Ipinakita niya na ang mga babae ay may kakayahan ding mamuno at lumaban para sa bayan.
<br/><br/>$pink<i>
Heneral Antonio Luna
</i><br/><br/>$black
Bayani ng Digmaang Pilipino-Amerikano, ipinakita ni Heneral Antonio Luna ang kanyang husay at tapang sa pakikipaglaban upang ipagtanggol ang bansa laban sa mga banyagang mananakop.
<br/><br/>$pink<i>
Apolinario Mabini
</i><br/><br/>$black
Kilala si Apolinario Mabini bilang \"Dakilang Lumpo.\" Sa kabila ng kanyang kapansanan, nagsilbi siyang tagapayo ni Emilio Aguinaldo at sumulat ng mga dokumentong naglatag ng pundasyon ng pamahalaang Pilipino. Ang kanyang talino at dedikasyon ay patunay na ang 
kapansanan 
ay hindi hadlang sa paglilingkod.
<br/><br/>$vio<u>
Mga Pilipinong Kinikilala sa Buong Mundo
</u><br/><br/>$black
$pink<i>
Manny Pacquiao
</i><br/><br/>$black
Si Manny Pacquiao ay kilala bilang \"Pambansang Kamao.\" Siya ang tanging boksingero sa kasaysayan ng mundo na nanalo ng kampeonato sa walong magkakaibang 'weight divisions.' Sa kanyang tagumpay, ipinagmalaki niya ang bandila ng Pilipinas sa buong mundo at 
nagbigay-inspirasyon siya sa maraming kabataang Pilipinong mangarap nang mataas.
<br/><br/>$pink<i>
Lea Salonga
</i><br/><br/>$black
Isang 'world-class' na mang-aawit at aktres sa Broadway si Lea Salonga. Siya ang unang gumanap bilang Kim sa 'musical' na \"Miss Saigon\" at siya rin ang tinig ni Jasmine sa \"Aladdin\" at Mulan sa \"Mulan\" ng Disney. Ipinakita niya na ang talentong 
Pilipino ay kayang tumayo sa pandaigdigang entablado.
<br/><br/>$pink<i>
Hidilyn Diaz
</i><br/><br/>$black
Si Hidilyn Diaz ang kauna-unahang Pilipinong nagwagi ng gintong medalya sa Olympics (Tokyo 2020). Nagawa niya ito sa larangan ng weightlifting. Ang kanyang tagumpay ay patunay na ang tiyaga, disiplina, at pananampalataya ay may gantimpala.
<br/><br/>$vio<u>
Mga Pilipinong Siyentipiko at Imbentor
</u><br/><br/>$black
$pink<i>
Dr. Fe del Mundo
</i><br/><br/>$black
Si Dr. Fe del Mundo ay isang kilalang pedyatrisyan at pambansang siyentipiko ng Pilipinas. Siya ang nagtatag ng unang pediatric hospital sa bansa at siya ang kauna-unahang babaeng nailuklok bilang National Scientist. 
<br/><br/>
Gumawa siya ng maraming imbensyon para sa kalusugan ng mga bata, kabilang ang 'bamboo incubator' na ginagamit sa mga liblib na lugar na walang kuryente.
<br/><br/>$pink<i>
Dr. Eduardo Quisumbing
</i><br/><br/>$black
Si Dr. Eduardo Quisumbing ay isang dalubhasa sa mga halamang gamot. Tumuklas siya ng maraming halamang may kakayahang gamutin ang iba't ibang sakit. Malaki ang kanyang kontribusyon sa pagpapaunlad ng tradisyonal na gamot sa Pilipinas.
<br/><br/>$pink<i>
Dr. Gregorio Zara
</i><br/><br/>$black
Si Dr. Gregorio Zara ang imbentor ng 'videophone,' ang kauna-unahang 'device' na nagbigay-daan sa 'video calling.' Dahil sa kanyang imbensyon, mas naging madali ang komunikasyon sa malalayong distansya.
<br/><br/>$pink<i>
Arturo Alcaraz
</i><br/><br/>$black
Si Arturo Alcaraz ay isang heologong nanguna sa paggamit ng geothermal energy sa Pilipinas. Dahil sa kanyang pag-aaral, ang Pilipinas ay naging isa sa pinakamalaking prodyuser ng geothermal energy sa buong mundo.
<br/><br/>$vio<u>
Mga Pilipinong Nagtaguyod ng<br/>Kalikasan at Karapatang Pantao
</u><br/><br/>$black
$pink<i>
Gina Lopez
</i><br/><br/>$black
Si Gina Lopez ay dating kalihim ng Department of Environment and Natural Resources (DENR). Ipinaglaban niya ang pangangalaga sa kalikasan at pagsasara ng mga minahang sumisira sa kapaligiran. Ang kanyang pagmamahal sa kalikasan ay nagbigay-inspirasyon sa 
maraming kabataang maging tagapagtaguyod ng Mother Earth.
<br/><br/>$pink<i>
Cory Aquino
</i><br/><br/>$black
Si Cory Aquino ang unang babaeng pangulo ng Pilipinas at ang nagbalik ng demokrasya sa bansa matapos ang diktadurang Marcos. Ang kanyang mapayapang pamumuno sa panahon ng EDSA People Power Revolution ay nagbigay-inspirasyon sa buong mundo.
<br/><br/><br/>
@blue
Pagsasakilos ng Pasasalamat<br/>sa mga Pilipinong Nag-ambag
@nblue
<br/>
Ang pagkilala sa mga dakilang Pilipino ay hindi lamang dapat sa pamamagitan ng pagbabasa o pagsusulit. Narito ang ilang mga konkretong paraan upang maipakita mo ang iyong pagkilala at pasasalamat sa kanila.
<br/><br/>$vio<u>
1. Gumawa ng \"Hero Wall\" sa inyong silid.
</u><br/><br/>$black
Pumili ng isang pader sa iyong kuwarto o sa inyong bahay. Magdikit ng mga larawan ng mga Pilipinong hinahangaan mo. Sa ilalim ng bawat larawan, isulat ang kanilang nagawa at kung paano ka nila na-inspire. Ito ay magsisilbing paalala sa iyo araw-araw na ikaw ay 
may mga huwarang dapat tularan.
<br/><br/>$vio<u>
2. Sumulat ng liham ng pasasalamat.
</u><br/><br/>$black
Pumili ng isang buhay pang Pilipinong hinahangaan mo - maaaring ito ay ang iyong guro, isang kapitbahay na tumutulong sa komunidad, o isang sikat na personalidad tulad nina Lea Salonga o Hidilyn Diaz. Sumulat ng liham na nagpapasalamat sa kanilang kontribusyon. 
<br/><br/>$vio<u>
3. Gumawa ng timeline ng mga<br/>dakilang Pilipino.
</u><br/><br/>$black
Sa isang malaking papel, gumuhit ng timeline mula sa panahon ng mga bayani hanggang sa kasalukuyan. Ilagay ang mga pangalan at larawan ng mga Pilipinong may mahalagang ambag sa bawat panahon. I-display ito sa inyong silid-aralan o sa inyong bahay upang maging 
inspirasyon din sa iba.
<br/><br/>$vio<u>
4. Ibahagi ang kanilang kwento sa iba.
</u><br/><br/>$black
Sa tuwing may pagkakataon, ikuwento mo sa isang kaibigan o kapamilya ang tungkol sa isang Pilipinong hinahangaan mo. Sabihin mo ang kanyang nagawa at kung bakit dapat siyang tularan. Ang pagbabahagi ng kanilang kwento ay isang paraan upang panatilihing buhay 
ang kanilang memorya at inspirasyon.
<br/><br/>$vio<u>
5. Gumawa ng poster o sanaysay.
</u><br/><br/>$black
Kung may proyekto sa inyong paaralan, samantalahin ang pagkakataon upang gumawa ng poster o sanaysay tungkol sa isang Pilipinong may mahalagang kontribusyon. Ilagay ang iyong mga natutuhan at kung paano ka niya binigyang-inspirasyon.
<br/><br/>$vio<u>
6. Makilahok sa mga gawaing<br/>nagpupugay sa ating mga bayani.
</u><br/><br/>$black
Tuwing Buwan ng Wika (Agosto) o Araw ng mga Bayani (huling Linggo ng Agosto), siguraduhing lumahok sa mga programa sa inyong paaralan o komunidad. Maaari kang sumali sa sabayang pagbigkas ng tula ni Balagtas, sa pagsuot ng kasuotang Pilipino, o sa pag-awit 
ng mga makabayang awitin.
<br/><br/>$vio<u>
7. Tularan ang kanilang<br/>mabubuting katangian.
</u><br/><br/>$black
Ang pinakamahusay na paraan upang parangalan ang ating mga bayani ay ang pamumuhay ayon sa kanilang mga aral. Kung hinahangaan mo si Jose Rizal dahil sa kanyang pagmamahal sa edukasyon, mag-aral kang mabuti. Kung hinahangaan mo si Andres Bonifacio dahil sa 
kanyang tapang, ipagtanggol mo ang iyong kaklaseng binu-bully. Kung hinahangaan mo si Dr. Fe del Mundo dahil sa kanyang malasakit sa maysakit, tumulong ka sa iyong kapatid na may sakit. Ang pagtulad ay ang pinakamataas na uri ng pagpupugay.
<br/><br/>$vio<u>
8. Suportahan ang mga<br/>organisasyong Pilipino.
</u><br/><br/>$black
Kung may kakayahan ang iyong pamilya, maaari kayong magbigay ng donasyon sa mga organisasyong tumutulong sa mahihirap tulad ng Philippine Red Cross, Gawad Kalinga, o iba pang lokal na organisasyon. Kung hindi man, maaari kang mag-volunteer ng iyong oras - 
tulad ng pagtulong sa pag-eempake ng 'relief goods' o pagtuturo sa mga batang hindi nakakapag-aral.
<br/><br/>$vio<u>
9. Igalang ang mga simbolo<br/>ng ating bansa.
</u><br/><br/>$black
Ang pagkilala sa ating mga bayani ay kaakibat ng paggalang sa watawat, sa pambansang awit, at sa iba pang simbolo ng ating bansa. Sa tuwing aawit ng Lupang Hinirang, tumayo nang tuwid, ilagay ang kanang kamay sa dibdib, at awitin ito nang buong paggalang.
<br/><br/>$vio<u>
10. Panatilihing buhay ang ating kultura.
</u><br/><br/>$black
Ang ating mga bayani ay lumaban upang mapanatili ang ating pagkakakilanlan bilang Pilipino. Maging bahagi ka ng pagpapanatili nito sa pamamagitan ng pagsasalita ng wikang Filipino, pagbabasa ng panitikang Pilipino, at pagtangkilik sa sariling atin.
<br/><br/><br/>
@blue
Mga Bunga ng Pagpapasalamat<br/>sa Ating Mga Bayani
@nblue
<br/>
Ang patuloy na pagkilala at pagpapahalaga sa mga kontribusyon ng mga dakilang Pilipino ay magdudulot sa iyo at sa iyong komunidad ng mga sumusunod na biyaya.
<br/><br/>$vio<u>
1. Mas malalim na pagmamahal<br/>sa bayan
</u><br/><br/>$black
Kapag alam mo ang mga sakripisyong ginawa para sa iyong kalayaan at kaunlaran, lalo mong mamahalin ang iyong bansa at hindi mo ito gugustuhing sirain.
<br/><br/>$vio<u>
2. Inspirasyon upang pagbutihin<br/>ang iyong sarili
</u><br/><br/>$black
Ang kanilang mga kwento ay nagsisilbing liwanag sa madilim na mga araw. Kapag ikaw ay nahihirapan, ang pag-alala sa kanilang tiyaga ay magbibigay sa iyo ng lakas upang magpatuloy.
<br/><br/>$vio<u>
3. Pagkamulat sa mga isyu ng lipunan
</u><br/><br/>$black
Ang pag-aaral sa kanilang mga kontribusyon ay magtuturo sa iyo ng mga problemang kinaharap ng ating bansa noon at patuloy na kinakaharap hanggang ngayon. Magiging mas mapanuri ka at mas handang kumilos para sa ikabubuti ng bayan.
<br/><br/>$vio<u>
4. Pagkakaisa ng mga Pilipino
</u><br/><br/>$black
Kapag sama-sama nating pinararangalan ang ating mga bayani, nadarama nating tayo ay iisa - isang lahing may iisang kasaysayan, iisang pinagmulan, at iisang pangarap.
<br/><br/>$vio<u>
5. Pag-asa para sa kinabukasan
</u><br/><br/>$black
Ang tagumpay ng ating mga bayani ay patunay na ang Pilipino ay may kakayahang sumikat sa anumang larangan. Hindi tayo mahina. Tayo ay mayaman sa talento, talino, at tibay ng loob.

"
?>
