<?php
// Mga Karapatan ng Mamamayang Pilipino
// Grade-conditional: grades 1-2 focus on T/F; grades 3+ add rights-type classification.
$_SESSION['title'] = "Mga Karapatan ng Mamamayang Pilipino";

if ($grd > 2) {

    // ============================================================
    // GRADES 3+ (18 T/F + 21 fill-in = 39 questions)
    // ============================================================
    $questions = array(

        "Ang isang demokratikong bansa tulad ng Pilipinas ay hindi nagpapahalaga sa mga karapatan ng mamamayan.=mali>tama",
        "Hindi karapatan ng isang mamamayan ang magtamasa ng kapayapaan at kaligayahan sa buhay.=mali>tama",
        "Walang karapatang makipag-ugnayan sa pamahalaan ang mga mamamayan.=mali>tama",
        "Walang karapatang pumili ng magaling na abogado ang isang mamamayang nasasakdal.=mali>tama",
        "Walang karapatang malaman ng isang mamamayang nasasakdal ang kaso laban sa kanya.=mali>tama",
        "Ang isang mamamayang nasasakdal ay walang karapatang magkaroon ng testigo.=mali>tama",
        "Ang isang mamamayang nasasakdal ay walang karapatang magbayad ng piyansa upang pansamantalang makalaya.=mali>tama",
        "Walang karapatan laban sa malupit at di-makataong pagparusa ang isang mamamayang nasasakdal.=mali>tama",
        "Maaaring buksan ng isang tao ang liham na hindi para sa kanya.=mali>tama",
        "Maaaring ipakulong ng sinuman ang isang taong hindi nakababayad ng utang sa kanya.=mali>tama",
        "Bilang mamamayang Pilipino, mahalagang malaman natin ang ating mga karapatan.=tama>mali",
        "Ang mga karapatan ng mamamayan ay nauuri sa sibil, politikal, panlipunan, pangkabuhayan, at karapatan kapag nasasakdal.=tama>mali",
        "Ang mga karapatang sibil ay nauukol sa pagtatamasa ng mga mamamayan ng kapayapaan at kaligayahan sa buhay.=tama>mali",
        "Nauukol sa ugnayan ng mamamayan sa pamahalaan ang mga karapatang politikal.=tama>mali",
        "Ang karapatang marinig sa hukuman ay isang karapatan kapag nasasakdal.=tama>mali",
        "Ang isang nasasakdal ay may karapatan sa madalian at walang kinikilingang paglilitis.=tama>mali",
        "Ang karapatang tumanggap ng sapat na tulong ay isang karapatan kapag nasasakdal.=tama>mali",
        "Dapat kang ituring na inosente habang hindi napatutunayan ng korte na ikaw ay may kasalanan.=tama>mali",
        "Ang karapatang mabuhay ay isang karapatang ____.=sibil>politikal+panlipunan<pangkabuhayan",
        "Ang karapatang magsalita at ipahayag ang sarili ay isang karapatang ____.=sibil>politikal+panlipunan<pangkabuhayan",
        "Ang karapatang magkaroon ng tirahan at ari-arian ay isang karapatang ____.=sibil>politikal+panlipunan<pangkabuhayan",
        "Ang karapatang hindi mabilanggo dahil sa pagkakautang ay isang karapatang ____.=sibil>politikal+panlipunan<pangkabuhayan",
        "Ang karapatang laban sa sapilitang paglilingkod ay isang karapatang ____.=sibil>politikal+panlipunan<pangkabuhayan",
        "Ang karapatan sa pantay na proteksiyon sa batas ay isang karapatang ____.=sibil>politikal+panlipunan<pangkabuhayan",
        "Ang karapatan sa mabilis na paglilitis ay isang karapatang ____.=sibil>politikal+panlipunan<pangkabuhayan",
        "Ang karapatang bumoto ay isang karapatang ____.=politikal>sibil+panlipunan<pangkabuhayan",
        "Ang karapatan sa pagkamamamayan ay isang karapatang ____.=politikal>sibil+panlipunan<pangkabuhayan",
        "Ang karapatang bumuo ng samahang hindi labag sa batas ay isang karapatang ____.=politikal>sibil+panlipunan<pangkabuhayan",
        "Ang karapatang magpetisyon ay isang karapatang ____.=politikal>sibil+panlipunan<pangkabuhayan",
        "Ang karapatang gumanap ng tungkuling pampubliko ay isang karapatang ____.=politikal>sibil+panlipunan<pangkabuhayan",
        "Ang karapatang alamin ang mahahalagang impormasyon ukol sa pamamalakad ng pamahalaan ay isang karapatang ____.=politikal>sibil+panlipunan<pangkabuhayan",
        "Ang karapatang pumili ng relihiyon ay isang karapatang ____.=panlipunan>sibil+politikal<pangkabuhayan",
        "Ang karapatang maglakbay ay isang karapatang ____.=panlipunan>sibil+politikal<pangkabuhayan",
        "Ang karapatan sa lihim na korespondensiya at komunikasyon ay isang karapatang ____.=panlipunan>sibil+politikal<pangkabuhayan",
        "Ang karapatang pumili ng propesyon o hanapbuhay ay isang karapatang ____.=pangkabuhayan>sibil+politikal<panlipunan",
        "Ang karapatang maging ligtas sa maruming kapaligiran at pagawaan ay isang karapatang ____.=pangkabuhayan>sibil+politikal<panlipunan",
        "Ang karapatang makinabang sa mga likas na yaman ay isang karapatang ____.=pangkabuhayan>sibil+politikal<panlipunan",
        "Ang karapatang mabayaran nang wasto sa pribadong ari-arian na ginamit ng pamahalaan ay isang karapatang ____.=pangkabuhayan>sibil+politikal<panlipunan",
        "Ang karapatan sa edukasyon ay isang karapatang ____.=pangkabuhayan>sibil+politikal<panlipunan",
    );

} else {

    // ============================================================
    // GRADES 1-2 (29 T/F questions)
    // ============================================================
    $questions = array(

        "Hindi mahalaga sa isang demokrasya ang mga karapatan ng mamamayan.=mali>tama",
        "Hindi karapatan ng isang mamamayan ang magkaroon ng kapayapaan at kaligayahan sa buhay.=mali>tama",
        "Walang karapatang makipag-ugnayan sa pamahalaan ang mga mamamayan.=mali>tama",
        "Wala kang karapatang pumili ng abogado kung ikaw ay nasasakdal.=mali>tama",
        "Maaaring buksan ng isang tao ang liham na hindi para sa kanya.=mali>tama",
        "Hindi karapatan ng isang mamamayan ang magkaroon ng tahanan at mga ari-arian.=mali>tama",
        "Walang karapatang bumoto ng pinuno ang isang mamamayan.=mali>tama",
        "Hindi karapatan ng isang mamamayan ang maglingkod sa publiko.=mali>tama",
        "Walang karapatan ang sinumang bumuo ng samahang hindi labag sa batas.=mali>tama",
        "Wala tayong karapatang pumili ng ating relihiyon.=mali>tama",
        "Bawa't isa sa atin ay may karapatang manakit o manggulo sa komunidad.=mali>tama",
        "May karapatan tayong gumawa ng krimen o anumang kasamaan.=mali>tama",
        "Hindi natin karapatan ang maging ligtas sa ating paghahanapbuhay.=mali>tama",
        "May karapatan tayong manakit o manggulo sa ating kinaiinisan.=mali>tama",
        "May karapatan tayong manira o magsayang ng likas na yaman ng ating bansa.=mali>tama",
        "Hindi karapatan ng isang mamamayan ang lumabag sa batas.=tama>mali",
        "Bilang mamamayang Pilipino, mahalagang malaman natin ang ating mga karapatan.=tama>mali",
        "Ang bawa't tao ay may karapatang mabuhay.=tama>mali",
        "Ang bawa't tao ay may karapatang magsalita at magpahayag ng damdamin.=tama>mali",
        "May karapatan kang marinig sa hukuman kung ikaw ay nasasakdal.=tama>mali",
        "Ang isang nasasakdal ay may karapatan sa mabilis at patas na paglilitis.=tama>mali",
        "Dapat kang ituring na inosente habang hindi napatutunayan ng korte na ikaw ay nagkasala.=tama>mali",
        "Hindi maaaring ibilanggo ang isang tao dahil lamang sa kanyang utang.=tama>mali",
        "Lahat tayo ay dapat bigyan ng pantay na proteksyon ng batas.=tama>mali",
        "Bawa't isa sa atin ay may karapatang maglakbay.=tama>mali",
        "May karapatan tayong pumili ng ating hanapbuhay.=tama>mali",
        "May karapatan tayong maging ligtas mula sa maruming kapaligiran.=tama>mali",
        "May karapatan tayong makinabang sa likas na yaman ng ating bansa.=tama>mali",
        "Ang pagkakaroon ng edukasyon ay karapatan nating lahat.=tama>mali",
    );
}