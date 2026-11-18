<?php
// Importance of Animals to People — modern standalone question bank.
// The legacy module used one shared pool (no grade-specific banks).
// Intended for Grades 3–10; no questions are supplied for lower grades.
// One unsupported antibiotic question was removed; other questions were clarified.

$_SESSION['title'] = 'Importance of Animals to People';
$questions = [];

if ($grd >= 3 && $grd <= 10) {
    $questions = [
        'Which animal is NOT commonly used as a source of leather?=bees>cows+snakes<crocodiles',
        'Which animals produce honey?=bees>houseflies+ants<dragonflies',
        'Which animal does NOT lay eggs?=cows>chickens+ducks<ostriches',
        'Which animal does NOT produce milk for people to drink?=chickens>cows+goats<carabaos',
        'Which animal is NOT commonly used for transportation?=goose>horse+ox<donkey',
        'Which animal is NOT a source of poultry meat?=fish>chickens+ducks<turkeys',
        'Which fish is NOT commonly raised for people to eat?=goldfish>milkfish+tilapia<salmon',
        'Which fish is NOT commonly kept in home aquariums?=tuna>goldfish+guppies<mollies',
        'Which product does NOT come from chickens?=milk>meat+eggs<feathers',
        'Which product does NOT come from cows?=eggs>meat+milk<hide',
        'What covering from sheep is used to make wool clothing?=fleece>horns+hooves<meat',
        'Birds, bees, and butterflies help plants through ____.=pollination>watering+digging<aeration',
        'Animals that carry pollen between flowers are called ____.=pollinators>predators+decomposers<parasites',
        'Which animal traditionally helps Filipino farmers plow fields?=carabaos>dogs+goats<sheep',
        'Which animal is NOT commonly kept as a household pet?=crocodiles>dogs+cats<birds',
        'Chicken and cattle manure can be used to make ____.=fertilizer>human food+clothing<soap',
        'Which animals are trained to guide some people who are blind?=dogs>cats+birds<cows',
        'Animals breathe out ____ that plants can use in photosynthesis.=carbon dioxide>oxygen+carbon monoxide<nitrogen',
        'Which animals may be used by doctors to improve blood flow after certain surgeries?=leeches>snakes+bees<ants',
        'Which material comes from the tusks or teeth of animals such as elephants and walruses?=ivory>collagen+rubber<silk',
        'Which shelled animals can produce pearls?=oysters>octopuses+squids<slugs',
        'Which mineral found in liver and sardines helps the body make healthy red blood cells?=iron>calcium+iodine<potassium',
        'Which mineral found in milk helps keep bones strong?=calcium>iron+iodine<potassium',
        'Which shells are traditionally used for translucent windows in Philippine homes?=Capiz>Cockle+Bonnet<Dosina',
        'Which animals are commonly used in medical research because they share many genes with humans?=mice>snakes+lizards<turtles',
        'Engineers study the movements of ____ to design robots.=animals>plants+rocks<clouds',

        // True / False
        'Meat is a food that comes from animals.=true>false',
        'Bees help many flowering plants reproduce by carrying pollen.=true>false',
        'Elephants have been used to carry people and move heavy objects.=true>false',
        'Dogs can provide companionship to people.=true>false',
        'All new medicines must be tested on humans before any other testing.=false>true',
    ];
}
