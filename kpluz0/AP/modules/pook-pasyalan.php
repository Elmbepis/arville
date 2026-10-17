<?php
// Mga Magagandang Tanawin at Pook-Pasyalan sa Pilipinas
// Grade-conditional: grades 1-2 use simpler wording; grades 3+ use detailed wording.
// Images at AP/modules/images/kalikasan/
$_SESSION['title'] = "Mga Tanawin at Pook-Pasyalan sa Pilipinas";

if ($grd <= 2) {

    // ============================================================
    // GRADES 1-2 — simpler wording (25 questions)
    // ============================================================
    $questions = array(

        "Hindi maganda ang hugis ng Bulkang Mayon.=mali>tama**AP/modules/images/kalikasan/bundok-mayon.jpg",
        "Ang 'Puerto Princesa Underground River' ay isang mahabang ilog sa ilalim ng yungib sa Palawan.=tama>mali**AP/modules/images/kalikasan/ppur.jpg",
        "Ang Bundok ng Apo ang pinakamataas na bundok sa Pilipinas.=tama>mali**AP/modules/images/kalikasan/bundok-apo.jpg",
        "Ang ipinapakita sa larawan ay ang 'Chocolate Hills' ng Bohol.=tama>mali**AP/modules/images/kalikasan/chocolate-hills.jpg",
        "Ang ipinapakita sa larawan ay ang 'Rice Terraces' ng Banaue.=tama>mali**AP/modules/images/kalikasan/banaue-terraces.jpg",
        "Ang Boracay ay isang sikat na beach sa Pilipinas.=tama>mali",
        "Ang Bulkang Mayon ay matatagpuan sa Albay.=tama>mali",
        "Ang underground river na napasama sa 'New Seven Wonders of Nature' ay nasa ____.=Puerto Princesa>Aklan+Camarines Sur<Coron**AP/modules/images/kalikasan/ppur.jpg",
        "Makikita ang Talon ng ____ sa Lanao del Norte.=Maria Cristina>Hinulugang Taktak+Daranak<Pagsanjan**AP/modules/images/kalikasan/talon-ng-ma-cristina.jpg",
        "Kilala ang ____ sa mga vinta, isang uri ng bangkang may makulay na layag.=Zamboanga>Zambales+Bohol<Cebu**AP/modules/images/kalikasan/vinta.jpg",
        "Sa ____ matatagpuan ang 'Philippine Eagle National Center'.=Davao>Bukidnon+Cotabato<Maguindanao**AP/modules/images/kalikasan/phil-eagle.jpg",
        "Ang napakagandang 'Boracay Beach' ay nasa lalawigan ng ____.=Aklan>Cebu+Palawan<Bohol**AP/modules/images/kalikasan/boracay.jpg",
        "Ang hagdan-hagdang palayan ng Banaue sa ____ ay itinanghal ng UNESCO bilang isang 'World Heritage Site'.=Ifugao>Benguet+Abra<Kalinga**AP/modules/images/kalikasan/banaue-terraces.jpg",
        "Ang ipinakikita sa larawan ay ang Bundok ____ sa Albay.=Mayon>Banahaw+Arayat<Apo**AP/modules/images/kalikasan/bulkang-mayon.jpg",
        "Ang ipinakikita sa larawan ay ang lungsod ng ____.=Vigan>Maynila+Cebu<Davao**AP/modules/images/kalikasan/vigan.jpg",
        "Ang ipinakikita sa larawan ay ang Bulkang ____ sa Batangas.=Taal>Mayon+Pinatubo<Kanlaon**AP/modules/images/kalikasan/bulkang-taal.jpg",
        "Ang Krus ni Magellan ay matatagpuan sa lungsod ng ____.=Cebu>Maynila+Vigan<Davao**AP/modules/images/kalikasan/krus-magellan.jpg",
        "Ang Rizal Park o Luneta ay matatagpuan sa lungsod ng ____.=Maynila>Cebu+Vigan<Davao",
        "Ang Chocolate Hills ay matatagpuan sa ____.=Bohol>Cebu+Palawan<Mindoro",
        "Ang pinakamataas na bundok sa Pilipinas ay ang Bundok ____.=Apo>Mayon+Taal<Pinatubo",
        "Ang Talon ng Maria Cristina ay nasa Lungsod ng Iligan sa ____.=Lanao del Norte>Batangas+Cebu<Palawan",
        "Ang lungsod ng ____ ay kilala sa mga makasaysayang bahay at kalsadang bato nito.=Vigan>Maynila+Cebu<Davao",
        "Ang 'Puerto Princesa Underground River' ay matatagpuan sa lalawigan ng ____.=Palawan>Aklan+Cebu<Bohol",
        "Ang Bulkang Taal ay matatagpuan sa lalawigan ng ____.=Batangas>Laguna+Cavite<Quezon",
        "Ang Boracay ay tinaguriang isa sa pinakamagandang dalampasigan sa buong ____.=mundo>Asya+Europa<Aprika",
    );

} else {

    // ============================================================
    // GRADES 3+ — more detailed wording (25 questions)
    // ============================================================
    $questions = array(

        "Ang PPUR ng Palawan ay isang lawang matatagpuan sa ibabaw ng isang bulkan.=mali>tama",
        "Ang PPUR ay isang mahabang ilog sa ilalim ng yungib na matatagpuan sa Palawan.=tama>mali",
        "Ang ipinapakita sa larawan ay ang 'Chocolate Hills' ng Bohol.=tama>mali**AP/modules/images/kalikasan/chocolate-hills.jpg",
        "Ang ipinapakita sa larawan ay ang 'Banaue Rice Terraces'.=tama>mali**AP/modules/images/kalikasan/banaue-terraces.jpg",
        "Ang Bulkang Mayon ay matatagpuan sa lalawigan ng Albay.=tama>mali",
        "Ang Boracay ay isang sikat na beach sa Pilipinas.=tama>mali",
        "Ang 'Banaue Rice Terraces' ay isang World Heritage Site ayon sa UNESCO.=tama>mali",
        "Ang 'Chocolate Hills' ay matatagpuan sa Bohol.=tama>mali",
        "Ang 'Puerto Princesa Underground River' ay isa sa 'New Seven Wonders of Nature'.=tama>mali",
        "Ang underground river na napasama sa 'New Seven Wonders of Nature' ay nasa ____.=Puerto Princesa>Aklan+Camarines Sur<Coron**AP/modules/images/kalikasan/ppur.jpg",
        "Makikita ang Talon ng ____ sa Lungsod ng Iligan sa Lanao del Norte.=Maria Cristina>Hinulugang Taktak+Daranak<Pagsanjan**AP/modules/images/kalikasan/talon-ng-ma-cristina.jpg",
        "Mula sa Ilog Agus ang Talon ng ____ na may taas na 320 talampakan.=Maria Cristina>Hinulugang Taktak+Daranak<Pagsanjan**AP/modules/images/kalikasan/talon-ng-ma-cristina.jpg",
        "Kilala ang ____ sa mga vinta, isang tradisyunal na bangkang matatagpuan sa mga baybayin.=Zamboanga>Zambales+Bohol<Cebu**AP/modules/images/kalikasan/vinta.jpg",
        "Sa ____ matatagpuan ang 'Philippine Eagle National Center' kung saan pinararami ang pambansang ibon.=Davao>Bukidnon+Cotabato<Maguindanao**AP/modules/images/kalikasan/phil-eagle.jpg",
        "Ang Bundok ____ ay nasa pagitan ng Davao at Hilagang Cotabato.=Apo>Banahaw+Kanlaon<Hibok-Hibok**AP/modules/images/kalikasan/bundok-hibok-hibok.jpg",
        "Ang Rizal Shrine na dating tirahan ni Jose Rizal ay nasa Lungsod ng Dapitan sa ____.=Zamboanga del Norte>Zamboanga del Sur+Davao<Cotabato",
        "Ang napakagandang 'Boracay Beach' na kahugis ng buto ng aso ay nasa lalawigan ng ____.=Aklan>Cebu+Palawan<Bohol**AP/modules/images/kalikasan/boracay.jpg",
        "Ang hagdan-hagdang palayan ng Banaue sa ____ ay itinanghal ng UNESCO bilang isang 'World Heritage Site'.=Ifugao>Benguet+Abra<Kalinga",
        "Ang ipinapakita sa larawan ay ang Bundok ____.=Mayon>Banahaw+Apo<Arayat**AP/modules/images/kalikasan/bulkang-mayon.jpg",
        "Ang ipinapakita sa larawan ay ang lungsod ng ____.=Vigan>Maynila+Cebu<Davao**AP/modules/images/kalikasan/vigan.jpg",
        "Ang ipinapakita sa larawan ay ang Bulkang ____.=Taal>Mayon+Pinatubo<Kanlaon**AP/modules/images/kalikasan/bulkang-taal.jpg",
        "Ang Krus ni Magellan ay matatagpuan sa lungsod ng ____.=Cebu>Maynila+Vigan<Davao",
        "Ang lungsod ng Vigan ay matatagpuan sa lalawigan ng ____.=Ilocos Sur>Ilocos Norte+La Union<Pangasinan",
        "Ang 'Banaue Rice Terraces' ay kilala rin sa tawag na '____'.=Eight Wonder of the World>Seven Wonder of the World+Modern Wonder of the World<Ancient Wonder of the World",
        "Ang Bulkang Mayon ay kilala sa tawag na '____' dahil sa perpektong hugis nito.=perpektong kono>perpektong bilog+perpektong piramide<perpektong silindro",
    );
}