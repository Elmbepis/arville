<?php
// Mga Pagdiriwang sa Pilipinas
// Grade-conditional: grades 1-3 use simpler wording; grades 4+ use detailed wording
$_SESSION['title'] = "Mga Pagdiriwang sa Pilipinas";

if ($grd < 4) {

    // === Grades 1-3 ===
    $questions = array(
        "Ang ____ ay ipinagdiriwang natin tuwing Enero 1.=Bagong Taon>Pasko+Pasko ng Pagkabuhay<Araw ng mga Patay",
        "Ang ____ ay ipinagdiriwang natin tuwing ika-25 ng Disyembre.=Pasko>Ramadan+Pasko ng Pagkabuhay<Araw ng mga Patay",
        "Inaalala tuwing ____ ang paghihirap at pagkamatay sa Krus ni Hesus.=Mahal na Araw>Ramadan+Pasko<Araw ng mga Patay",
        "Tuwing ____, nagsusuot ang mga taga-Bacolod ng iba't ibang maskarang nakangiti.=Pista ng Masskara>Pasko+Pista ng Pahiyas<Ati-atihan",
        "Inaalala natin tuwing ____ ang mga yumao nating mahal sa buhay.=Araw ng mga Patay>Ramadan+Pasko ng Pagkabuhay<Pista ng Sinulog",
        "Ang ____ ay ginaganap tuwing ika-2 ng Nobyembre.=Araw ng mga Patay>Ramadan+Pasko ng Pagkabuhay<Ati-Atihan",
        "Isinasabuhay sa ____ ang paghahanap nina Sta. Elena at Constantino sa banal na krus.=Santakrusan>Pista ng Sinulog+Pasko ng Pagkabuhay<Ati-atihan",
        "Ginaganap ang ____ tuwing Mayo.=Santakrusan>Pista ng Panagbenga+Pista ng Higantes<Ati-atihan",
        "Inaalala natin tuwing ____ ang pagsilang ni Hesus.=Pasko>Pista ng Moriones+Pasko ng Pagkabuhay<Pista ng Sinulog",
        "Ang ____ ay isang pista sa Kalibo, Aklan tuwing Enero.=Ati-atihan>Pista ng Kadayawan+Pasko ng Pagkabuhay<Pista ng Panagbenga",
        "Ginaganap ang ____ sa Kalibo, Aklan bilang pagdakila sa Santo Niño.=Ati-atihan>Pista ng Moriones+Pasko ng Pagkabuhay<Pista ng Panagbenga",
        "Sa pagdiriwang ng ____, nagsasabit tayo ng mga banderitas at naghahanda ng mga pagkain.=Pista>Santakrusan+Pasko ng Pagkabuhay<Bagong Taon",
        "Sa panahon ng ____, ang mga Muslim ay kumakain at umiinom lamang bago sumikat ang araw.=Ramadan>Santakrusan+Pasko ng Pagkabuhay<Ati-atihan",
        "Ang ____ ay araw ng pasasalamat ng mga Muslim sa pagtatapos ng Ramadan.=Eid al-Fitr>Pista ng Sinulog+Pasko ng Pagkabuhay<Ati-atihan",
        "Ang ____ ang gumugunita ng pagpapahayag ni Hen. Aguinaldo ng kalayaan ng Pilipinas mula sa mga Kastila.=Araw ng Kalayaan>Araw ng mga Bayani+Araw ni Rizal<Araw ng Kagitingan",
        "Ang ____ ay ipinagdiriwang natin tuwing Hunyo 12.=Araw ng Kalayaan>Araw ng mga Bayani+Araw ni Rizal<Araw ng Kagitingan",
        "Ang ____ ay ipinagdiriwang natin tuwing Abril 9.=Araw ng Kagitingan>Araw ng mga Bayani+Araw ni Rizal<Araw ng Kalayaan",
        "Ang ____ ay ipinagdiriwang natin tuwing huling Lunes ng buwan ng Agosto.=Araw ng mga Bayani>Araw ng Kalayaan+Araw ni Bonifacio<Araw ng Kagitingan",
        "Ang ____ ay ipinagdiriwang natin tuwing Nobyembre 30.=Araw ni Bonifacio>Araw ng Kalayaan+Araw ni Rizal<Araw ng mga Bayani",
        "Ang ____ ay ipinagdiriwang natin tuwing Disyembre 30.=Araw ni Rizal>Araw ng Kalayaan+Araw ni Bonifacio<Araw ng mga Bayani",
        "Tuwing Pebrero 25, ginugunita natin ang ____.=Rebolusyon sa EDSA>Araw ng Kalayaan+Araw ni Rizal<Araw ni Bonifacio",
        "Ang ____ ay ipinagdiriwang natin tuwing Mayo 1.=Araw ng Manggagawa>Araw ng Kalayaan+Araw ng Kagitingan<Araw ng mga Bayani",
        "Ang Pista ng Moriones ay ginaganap tuwing Semana Santa sa lalawigan ng ____.=Marinduque>Iloilo+Cebu<Aklan",
        "Ang ____ ay ginaganap sa Baguio tuwing Pebrero upang ipagmalaki ang kasaganahan ng mga bulaklak dito.=Pista ng Panagbenga>Pista ng Kadayawan+Pista ng Pahiyas<Pista ng Sinulog",
        "Ang ____ ay isa pang tawag sa Araw ng mga Patay na ipinagdiriwang tuwing Nobyembre 1.=Undas>Pasko+Pista<Bagong Taon",
    );

} else {

    // === Grades 4+ (more detailed wording) ===
    $questions = array(
        "Inaalala tuwing ____ ang paghihirap at pagkamatay sa Krus ni Hesus.=Mahal na Araw>Ramadan+Pasko<Araw ng mga Patay",
        "Tuwing linggo ng Oktubre 19, ipinagdiriwang ng mga taga-Bacolod ang ____.=Pista ng Masskara>Santakrusan+Pista ng Pahiyas<Ati-atihan",
        "Tuwing ____, nagsusuot ang mga taga-Bacolod ng iba't ibang maskarang nakangiti.=Pista ng Masskara>Pasko+Pista ng Pahiyas<Ati-atihan",
        "Inaalala natin tuwing ____ ang mga yumao nating mahal sa buhay.=Araw ng mga Patay>Ramadan+Pasko ng Pagkabuhay<Pista ng Sinulog",
        "Isinasabuhay sa ____ ang paghahanap nina Sta. Elena at Constantino sa banal na krus na pinagpakuan kay Kristo.=Santakrusan>Pista ng Sinulog+Pasko ng Pagkabuhay<Ati-atihan",
        "Inaalala natin tuwing ____ ang pagsilang ni Hesus.=Pasko>Santakrusan+Pasko ng Pagkabuhay<Pista ng Sinulog",
        "Ito ay isang pista sa Aklan upang gunitain ang mapayapang pagkakasundo ng mga ninuno nating Ati sa pagdating ng mga Malay.=Ati-atihan>Pista ng Moriones+Pasko ng Pagkabuhay<Pista ng Panagbenga",
        "Sa pagdiriwang ng ____, nagsasabit tayo ng mga banderitas at naghahanda ng mga pagkain.=Pista>Santakrusan+Pasko ng Pagkabuhay<Bagong Taon",
        "Sa panahon ng ____, ang mga Muslim ay kumakain at umiinom lamang bago sumikat ang araw bilang tanda ng kanilang pag-aayuno.=Ramadan>Santakrusan+Pasko ng Pagkabuhay<Pista ng Moriones",
        "Ang ____ ay araw ng pasasalamat ng mga Muslim sa pagtatapos ng Ramadan.=Eid al-Fitr>Pista ng Sinulog+Pasko ng Pagkabuhay<Ati-atihan",
        "Ang ____ ang gumugunita ng pagpapahayag ni Hen. Aguinaldo ng kalayaan ng Pilipinas mula sa mga Kastila.=Araw ng Kalayaan>Araw ng mga Bayani+Araw ni Rizal<Araw ng Kagitingan",
        "Ang ____ ay ipinagdiriwang natin tuwing Hunyo 12.=Araw ng Kalayaan>Araw ng mga Bayani+Araw ni Rizal<Araw ng Kagitingan",
        "Ang ____ ay ipinagdiriwang natin tuwing Abril 9.=Araw ng Kagitingan>Araw ng mga Bayani+Araw ni Rizal<Araw ng Kalayaan",
        "Ang ____ ay ipinagdiriwang natin tuwing Agosto 29.=Araw ng mga Bayani>Araw ng Kalayaan+Araw ni Bonifacio<Araw ng Kagitingan",
        "Ang ____ ay ipinagdiriwang natin tuwing Nobyembre 30.=Araw ni Bonifacio>Araw ng Kalayaan+Araw ni Rizal<Araw ng mga Bayani",
        "Ang ____ ay ipinagdiriwang natin tuwing Disyembre 30.=Araw ni Rizal>Araw ng Kalayaan+Araw ni Bonifacio<Araw ng mga Bayani",
        "Ang ____ ay ipinagdiriwang natin tuwing Mayo 1.=Araw ng Manggagawa>Araw ng Kalayaan+Araw ng Kagitingan<Araw ng mga Bayani",
        "Tuwing Pebrero 25, ginugunita natin ang ____.=Rebolusyon sa EDSA>Araw ng Kalayaan+Araw ni Rizal<Araw ni Bonifacio",
        "Ang ____ ay isang pagdiriwang sa Paranaque kung saan ginagawa ang isang parada ng mga kabataang babaeng pinapayungan ng kanilang mga eskorteng may hawak na makulay na parasol.=Sunduan>Karakol Festival+Aliwan Fiesta<Sinukwan Festival",
        "Ang ____ ay pagdiriwang na ginaganap sa Laguna, Cavite, Batangas, Bulacan, and Rizal kung saan nagsasayaw ang mga taong karamihan ay matatandang babae habang nagpuprusisyon.=Karakol Festival>Sunduan+Aliwan Fiesta<Sinukwan Festival",
        "Ang Pista ni ____ na ginaganap sa isang lungsod sa Kalakhang Maynila ay kilala sa tradisyong 'basaan' o pagsasabuyan ng tubig bilang paggunita sa pagbibinyag kay Hesus.=San Juan Bautista>ni Sta. Elena+San Isidro<San Roque",
        "Ang ____ ay isang pagdiriwang na ginaganap tuwing Disyembre sa San Fernando, Pampanga kung saan tampok ang isang masayang patimpalak ng sayawan.=Sinukwan Festival>Karakol Festival+Aliwan Fiesta<Sunduan",
        "Ang ____ ay ginaganap sa Baguio tuwing Pebrero upang ipagmalaki ang kasaganahan ng mga bulaklak dito.=Pista ng Panagbenga>Pista ng Kadayawan+Pista ng Pahiyas<Pista ng Sinulog",
        "Ang ____ ay ginaganap sa Quezon tuwing Mayo bilang pasasalamat sa masaganang ani ng palay.=Pista ng Pahiyas>Pista ng Moriones+Pista ng Masskara<Ati-atihan",
        "Ang ____ ay ginaganap sa Cebu tuwing Enero bilang parangal sa Santo Niño.=Pista ng Sinulog>Ati-atihan+Pista ng Moriones<Pista ng Panagbenga",
        
    );
}