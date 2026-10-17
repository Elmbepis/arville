<?php
// Pangangalaga sa Likas na Yaman
$_SESSION['title'] = "Pangangalaga sa Likas na Yaman";

$questions = array(

    // ============================================================
    // T/F — mali
    // ============================================================
    "Lahat ng tao ay dapat payagang magtroso sa kagubatan.=mali>tama",
    "Dapat sunugin ang kagubatan upang ito'y mataniman ng mga palay at gulay.=mali>tama",
    "Magtapon tayo ng basura sa lawa.=mali>tama",
    "Gumamit tayo ng lambat na maliliit ang butas sa panghuhuli ng isda.=mali>tama",
    "Hayaan natin ang mga pabrikang magtapon ng mga kemikal sa ilog.=mali>tama",

    // ============================================================
    // T/F — tama
    // ============================================================
    "Nasisira ang kapaligiran dahil sa ating kapabayaan.=tama>mali",
    "Nakatutulong sa kapaligiran ang pagkakaroon ng mga hardin.=tama>mali",
    "Ang maruming usok ng mga sasakyan at pabrika ay nagiging sanhi ng karamdaman.=tama>mali",
    "Dapat isara ang gripo kung hindi gumagamit ng tubig.=tama>mali",
    "Dapat ipagbawal ang paggamit ng dinamita sa pangingisda.=tama>mali",
    "Dapat ipagbawal ang paggamit ng mga lason sa pangingisda.=tama>mali",
    "Tumulong tayo sa pagpapanatili ng kalinisan ng mga ilog.=tama>mali",

    // ============================================================
    // Matalinong pangangasiwa (16 questions)
    // ============================================================
    "Ang maagap na pagtatanim sa mga nakakalbong gubat ay ____ ng likas na yaman.=matalinong pangangasiwa>di-matalinong pangangasiwa",
    "Ang pagpigil sa gawaing pagkakaingin ay ____ ng likas na yaman.=matalinong pangangasiwa>di-matalinong pangangasiwa",
    "Ang pagputol ng punong may sapat na gulang lamang ay ____ ng likas na yaman.=matalinong pangangasiwa>di-matalinong pangangasiwa",
    "Ang pagtatanim ng punlang puno bilang kahalili ng pinutol na puno ay ____ ng likas na yaman.=matalinong pangangasiwa>di-matalinong pangangasiwa",
    "Ang pag-iwas sa paggamit ng mga kasangkapang nakapipinsala ng anyong lupa ay ____ ng likas na yaman.=matalinong pangangasiwa>di-matalinong pangangasiwa",
    "Ang pag-iwas sa paggamit ng bangkang de motor sa pangingisda ay ____ ng likas na yaman.=matalinong pangangasiwa>di-matalinong pangangasiwa",
    "Ang pagsasaayos sa lugar ng bakawan sa pangingisda ay ____ ng likas na yaman.=matalinong pangangasiwa>di-matalinong pangangasiwa",
    "Ang paggamit ng lambat na may malalaki o katamtamang mga butas ay ____ ng likas na yaman.=matalinong pangangasiwa>di-matalinong pangangasiwa",
    "Ang hindi pagtatapon ng dumi at basura sa ilog, dagat, lawa o sapa ay ____ ng likas na yaman.=matalinong pangangasiwa>di-matalinong pangangasiwa",
    "Ang pagkontrol sa polusyong idudulot ng pagmimina ay ____ ng likas na yaman.=matalinong pangangasiwa>di-matalinong pangangasiwa",
    "Ang pag-aaral sa makabago at siyentipikong pamamaraan ng pagmimina ay ____ ng likas na yaman.=matalinong pangangasiwa>di-matalinong pangangasiwa",
    "Ang pag-iingat upang maiwasang makasira ng lupang-minahan ay ____ ng likas na yaman.=matalinong pangangasiwa>di-matalinong pangangasiwa",
    "Ang pagpapalit ng pananim upang manatiling mataba ang lupa ay ____ ng likas na yaman.=matalinong pangangasiwa>di-matalinong pangangasiwa",
    "Ang pagtatanim ng mga puno upang mapigilan ang pagguho ng lupa ay ____ ng likas na yaman.=matalinong pangangasiwa>di-matalinong pangangasiwa",
    "Ang paggamit ng mga nabulok na dahon at basura sa paggawa ng kompos na pataba sa lupa ay ____ ng likas na yaman.=matalinong pangangasiwa>di-matalinong pangangasiwa",
    "Ang pagtatanim sa pagitang ng mga pananim upang ang lupang ibabaw ay mapanatiling mataba ay ____ ng likas na yaman.=matalinong pangangasiwa>di-matalinong pangangasiwa",

    // ============================================================
    // Di-matalinong pangangasiwa (16 questions)
    // ============================================================
    "Ang pagkakaingin ay ____ ng likas na yaman.=di-matalinong pangangasiwa>matalinong pangangasiwa",
    "Ang walang tigil na pagputol ng mga punongkahoy sa kagubatan ay ____ ng likas na yaman.=di-matalinong pangangasiwa>matalinong pangangasiwa",
    "Ang pagmimina nang kulang ang kaalamang panteknolohiya ay ____ ng likas na yaman.=di-matalinong pangangasiwa>matalinong pangangasiwa",
    "Ang pag-iwan ng basura sa kagubatan ay ____ ng likas na yaman.=di-matalinong pangangasiwa>matalinong pangangasiwa",
    "Ang paggamit ng dinamita sa pangingisda ay ____ ng likas na yaman.=di-matalinong pangangasiwa>matalinong pangangasiwa",
    "Ang paggamit ng kuryente sa pangingisda ay ____ ng likas na yaman.=di-matalinong pangangasiwa>matalinong pangangasiwa",
    "Ang paggamit ng lason o cyanide sa pangingisda ay ____ ng likas na yaman.=di-matalinong pangangasiwa>matalinong pangangasiwa",
    "Ang pagsasagawa ng sistemang muro-ami ay ____ ng likas na yaman.=di-matalinong pangangasiwa>matalinong pangangasiwa",
    "Ang pagtatapon ng dumi o basura sa mga anyong tubig ay ____ ng likas na yaman.=di-matalinong pangangasiwa>matalinong pangangasiwa",
    "Ang pagtatapon sa dumi ng mga pabrika sa mga katubigan ay ____ ng likas na yaman.=di-matalinong pangangasiwa>matalinong pangangasiwa",
    "Ang pagpapabaya sa pagdami ng water lily na nakahahadlang sa pagdaloy ng tubig ay ____ ng likas na yaman.=di-matalinong pangangasiwa>matalinong pangangasiwa",
    "Ang pagtatayo ng mga bahay iskwater sa tabing-ilog ay ____ ng likas na yaman.=di-matalinong pangangasiwa>matalinong pangangasiwa",
    "Ang paghuhukay upang magmina ng walang pahintulot ay ____ ng likas na yaman.=di-matalinong pangangasiwa>matalinong pangangasiwa",
    "Ang pagsasagawa ng pagmimina kahit walang sapat na kaalaman ay ____ ng likas na yaman.=di-matalinong pangangasiwa>matalinong pangangasiwa",
    "Ang pagtatapon ng pinagminahan sa ilog ay ____ ng likas na yaman.=di-matalinong pangangasiwa>matalinong pangangasiwa",
    "Ang labis na paggamit ng mga kemikal at pataba ay ____ ng likas na yaman.=di-matalinong pangangasiwa>matalinong pangangasiwa",
);