<?php
// Pagkilala sa Aking Pamilya
$_SESSION['title'] = "Pagkilala sa Aking Pamilya";

$questions = array(

    "Mas matanda ang bunso kaysa kuya.=mali>tama",
    "Ang ina ng aking tatay ay aking lolo.=mali>tama",
    "Ang ama ng aking nanay ay aking lola.=mali>tama",
    "Mas matanda ako sa aking ate.=mali>tama",
    "Mas bata sa akin ang aking kuya.=mali>tama",
    "Mas una akong ipinanganak kaysa kuya ko.=mali>tama",
    "Ang aking mga magulang ay sina Tatay at Nanay.=tama>mali",
    "Mas matanda ang ate kaysa bunso.=tama>mali",
    "Ang ama ng aking tatay ay aking lolo.=tama>mali",
    "Ang ina ng aking nanay ay aking lola.=tama>mali",
    "Ang ____ ay ang nakatatandang kapatid na babae.=ate>kuya+bunso<pinsan",
    "Ang ____ ay ang nakatatandang kapatid na lalaki.=kuya>ate+bunso<pinsan",
    "Ang ate at kuya ay mas ____ kaysa bunso.=matanda>bata+maliit<magaan",
    "Ang aking tatay at ____ ang aking mga magulang.=nanay>ate+kuya<pinsan",
    "Ang aking mga magulang ay ang aking ____ at ina.=ama>ate+kuya<pinsan",
    "Ang ____ ang haligi ng tahanan.=ama>ate+kuya<ina",
    "Ang ____ ang ilaw ng tahanan na gagabay sa mga anak.=ina>ate+kuya<ama",
    "____ ang isang lugar kung walang mga pamilyang magkakagalit dito.=Payapa>Magulo+Malungkot<Nakakatakot",
    "Dapat ____ ang iba't ibang pamilya sa isang pook.=magtulungan>maglaban+magyabangan<mag-away",
    "____ ang isang lugar kung maganda ang ugnayan ng mga pamilya rito.=Masaya>Magulo+Nakakatakot<Malungkot",
    "Ang pagtulong sa isang pamilyang nagigipit ay ____ gawain.=magandang>masamang+nakakatamad na<nakakapagod na",
    "Ang pamilya ninyo ay ____ din ng mga pamilyang tinutulungan ninyo.=tutulungan>iiwan+pababayaan<ipapahamak",
    "Dapat kang makaramdam ng ____ kung umuunlad ang pamilya ng iyong kaibigan.=saya>inggit+galit<lungkot",
    "Dapat kang makaramdam ng ____ kung nagtagumpay ang iyong kapatid sa isang bagay.=saya>inggit+galit<lungkot",
    "Ang ate at kuya ay dapat ____ sa mga gawaing bahay.=tumulong>umiwas+mainis<tamarin",
    "Dapat ____ ang mga anak sa kanilang mga magulang.=sumunod>umiwas+mag-utos<magatago",
    "Dapat ____ ng mga anak ang kanilang mga magulang.=igalang>suwayin+inisin<galitin",
    "____ manood ng TV habang kumakain.=Iwasang>Laging+Dapat<Mahalagang",
    "Dapat nating ____ ang ating pinagtulugan.=Iligpit>Ikalat+Guluhin<Iwanan",
    "Dapat ____ sina Ate at Kuya sa pagliligpit ng pinagkainan.=tumulong>tumakas+umangal<manggulo",
    "Ang anak ng kapatid ng aking ama o ina ay aking ____.=pinsan>pamangkin+tiyo<tiya",
    "Ang kapatid na lalaki ng aking ama o ina ay aking ____.=tiyo>pamangkin+pinsan<tiya",
    "Ang kapatid na babae ng aking ama o ina ay aking ____.=tiya>pamangkin+pinsan<tiyo",
    "Ang anak ng aking kapatid ay aking ____.=pamangkin>tiya+pinsan<tiyo",
    
);