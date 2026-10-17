<?php
// Mga Uri ng Likas na Yaman
// Grade-conditional: grades 1-2 use 2 resource types (lupa/tubig); grades 3+ include all 4 types.
$_SESSION['title'] = "Mga Uri ng Likas na Yaman";

if ($grd <= 2) {

    // ============================================================
    // GRADES 1-2 — lupa vs tubig (2 choices, 25 questions)
    // ============================================================
    $questions = array(
        "Ang aso ay isang halimbawa ng yamang ____.=lupa>tubig",
        "Ang baboy ay isang halimbawa ng yamang ____.=lupa>tubig",
        "Ang baka ay isang halimbawa ng yamang ____.=lupa>tubig",
        "Ang bawang ay isang halimbawa ng yamang ____.=lupa>tubig",
        "Ang itik ay isang halimbawa ng yamang ____.=lupa>tubig",
        "Ang kabayo ay isang halimbawa ng yamang ____.=lupa>tubig",
        "Ang kamatis ay isang halimbawa ng yamang ____.=lupa>tubig",
        "Ang kambing ay isang halimbawa ng yamang ____.=lupa>tubig",
        "Ang mais ay isang halimbawa ng yamang ____.=lupa>tubig",
        "Ang manok ay isang halimbawa ng yamang ____.=lupa>tubig",
        "Ang munggo ay isang halimbawa ng yamang ____.=lupa>tubig",
        "Ang petsay ay isang halimbawa ng yamang ____.=lupa>tubig",
        "Ang palay ay isang halimbawa ng yamang ____.=lupa>tubig",
        "Ang talong ay isang halimbawa ng yamang ____.=lupa>tubig",
        "Ang gansa ay isang halimbawa ng yamang ____.=lupa>tubig",
        "Ang bangus ay isang halimbawa ng yamang ____.=tubig>lupa",
        "Ang dalag ay isang halimbawa ng yamang ____.=tubig>lupa",
        "Ang hito ay isang halimbawa ng yamang ____.=tubig>lupa",
        "Ang hipon ay isang halimbawa ng yamang ____.=tubig>lupa",
        "Ang karpa ay isang halimbawa ng yamang ____.=tubig>lupa",
        "Ang pusit ay isang halimbawa ng yamang ____.=tubig>lupa",
        "Ang tilapya ay isang halimbawa ng yamang ____.=tubig>lupa",
        "Ang tulya ay isang halimbawa ng yamang ____.=tubig>lupa",
        "Ang alimasag ay isang halimbawa ng yamang ____.=tubig>lupa",
        "Ang talaba ay isang halimbawa ng yamang ____.=tubig>lupa",
    );

} else {

    // ============================================================
    // GRADES 3+ — all 4 types (4 choices, 25 questions)
    // ============================================================
    $questions = array(

        "Ang aso ay isang halimbawa ng yamang ____.=lupa>tubig+gubat<mineral",
        "Ang baboy ay isang halimbawa ng yamang ____.=lupa>tubig+gubat<mineral",
        "Ang kalabaw ay isang halimbawa ng yamang ____.=lupa>tubig+gubat<mineral",
        "Ang palay ay isang halimbawa ng yamang ____.=lupa>tubig+gubat<mineral",
        "Ang kamatis ay isang halimbawa ng yamang ____.=lupa>tubig+gubat<mineral",
        "Ang manok ay isang halimbawa ng yamang ____.=lupa>tubig+gubat<mineral",
        "Ang bangus ay isang halimbawa ng yamang ____.=tubig>lupa+gubat<mineral",
        "Ang tilapya ay isang halimbawa ng yamang ____.=tubig>lupa+gubat<mineral",
        "Ang hipon ay isang halimbawa ng yamang ____.=tubig>lupa+gubat<mineral",
        "Ang alimango ay isang halimbawa ng yamang ____.=tubig>lupa+gubat<mineral",
        "Ang pusit ay isang halimbawa ng yamang ____.=tubig>lupa+gubat<mineral",
        "Ang talaba ay isang halimbawa ng yamang ____.=tubig>lupa+gubat<mineral",
        "Ang pating ay isang halimbawa ng yamang ____.=tubig>lupa+gubat<mineral",
        "Ang perlas ay isang halimbawa ng yamang ____.=tubig>lupa+gubat<mineral",
        "Ang narra ay isang halimbawa ng yamang ____.=gubat>lupa+tubig<mineral",
        "Ang kawayan ay isang halimbawa ng yamang ____.=gubat>lupa+tubig<mineral",
        "Ang molave ay isang halimbawa ng yamang ____.=gubat>lupa+tubig<mineral",
        "Ang bakawan ay isang halimbawa ng yamang ____.=gubat>lupa+tubig<mineral",
        "Ang ratan ay isang halimbawa ng yamang ____.=gubat>lupa+tubig<mineral",
        "Ang yakal ay isang halimbawa ng yamang ____.=gubat>lupa+tubig<mineral",
        "Ang ginto ay isang halimbawa ng yamang ____.=mineral>lupa+tubig<gubat",
        "Ang pilak ay isang halimbawa ng yamang ____.=mineral>lupa+tubig<gubat",
        "Ang bakal ay isang halimbawa ng yamang ____.=mineral>lupa+tubig<gubat",
        "Ang tanso ay isang halimbawa ng yamang ____.=mineral>lupa+tubig<gubat",
        "Ang marmol ay isang halimbawa ng yamang ____.=mineral>lupa+tubig<gubat",
    );
}