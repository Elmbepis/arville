<?php
$_SESSION['title'] = 'Useful and Harmful Changes in Matter';

// Grades 3–10 share one bank, matching the original ungraded source.
// MC format: QUESTION=CORRECT>WRONG1+WRONG2<WRONG3
// Classification format: QUESTION=CORRECT>WRONG (two choices: useful / harmful).
// Image references require qimages/mchuh1.jpg and qimages/mchuh2.jpg.

    $questions = [
        'Harmful gases released into the air by human activities cause ____.=air pollution>land pollution+water pollution<noise pollution',
        'Which of the following is the best way to protect forests?=planting trees>burning tires+cutting trees<burning plants',
        'If you want to get rid of your garbage, you should not burn it because doing so would ____.=pollute the air>make the air hot+make you tired<cost money',
        'Chemicals and toxic wastes that factories let into rivers or seas lead to ____.=water pollution>land pollution+air pollution<noise pollution',
        'Breathing in polluted air causes harm to our ____.=lungs>stomach+kidneys<skin',
        'What the man is doing in the picture produces changes in matter that ____ the air we breathe.**mchuh1.jpg=pollute>purify+cleanse<improve',
        'What the man is doing in the picture produces changes in matter that cause ____.**mchuh2.jpg=water pollution>land pollution+air pollution<noise pollution',
        'Vehicle owners should have their vehicles checked regularly to reduce ____.=air pollution>land pollution+water pollution<soil pollution',
        'Air pollution can contribute to ____ rain, which is harmful to aquatic wildlife in streams and rivers.=acid>alkaline+fresh<icy',
        'Which of the following is NOT harmful to the environment?=recycling>burning forests+burning plastic<cooking with wood',
        'Which of the following is NOT useful to the environment?=polluting lakes>recycling+planting trees<cleaning streets',
        'Which of the following helps protect a forest habitat?=planting seedlings>burning trees+scattering trash<playing with nests',

        // Useful-or-harmful classification (two answer choices).
        'Is the following action useful or harmful? Cutting down trees indiscriminately.=harmful>useful',
        'Is the following action useful or harmful? Burning old batteries.=harmful>useful',
        'Is the following action useful or harmful? Burning plastic objects.=harmful>useful',
        'Is the following action useful or harmful? Throwing detergents into a river.=harmful>useful',
        'Is the following action useful or harmful? Dumping garbage on streets.=harmful>useful',
        'Is the following action useful or harmful? Burning old tires.=harmful>useful',
        'Is the following action useful or harmful? Burning garbage.=harmful>useful',
        'Is the following action useful or harmful? Denuding a rainforest.=harmful>useful',
        'Is the following action useful or harmful? Dynamite fishing.=harmful>useful',
        'Is the following action useful or harmful? Cutting down a forest to build a new mall.=harmful>useful',
        'Is the following action useful or harmful? Throwing plastic bags in canals.=harmful>useful',
        'Is the following action useful or harmful? Accidentally spilling oil into a sea.=harmful>useful',
        'Is the following action useful or harmful? Leaving mining wastes behind.=harmful>useful',
        'Is the following action useful or harmful? Using poorly maintained cars that burn fuel inefficiently.=harmful>useful',
        'Is the following action useful or harmful? Segregating wastes for proper disposal.=useful>harmful',
        'Is the following action useful or harmful? Using pieces of wood to build a chair.=useful>harmful',
        'Is the following action useful or harmful? Cutting and sewing cloth into a handkerchief.=useful>harmful',
        'Is the following action useful or harmful? Cutting and sewing fabric into clothes.=useful>harmful',
        'Is the following action useful or harmful? Letting biodegradable wastes turn into compost.=useful>harmful',
        'Is the following action useful or harmful? Connecting empty juice packs to make a handbag.=useful>harmful',
        'Is the following action useful or harmful? Reusing discarded plastic straws to make a curtain.=useful>harmful',
        'Is the following action useful or harmful? Combining used plastic spoons to build a toy.=useful>harmful',
        'Is the following action useful or harmful? Turning broken slippers into decorations.=useful>harmful',
        'Is the following action useful or harmful? Recycling plastic bottles into flower vases.=useful>harmful',
        'Is the following action useful or harmful? Cutting and sewing cloth to make a reusable grocery bag.=useful>harmful',
        'Is the following action useful or harmful? Recycling newspaper into a papier-mâché vase.=useful>harmful',
        'Is the following action useful or harmful? Safely reusing pieces of empty tin cans to make a Christmas lantern.=useful>harmful',
        'Is the following action useful or harmful? Baking a cake using different ingredients.=useful>harmful',
        'Is the following action useful or harmful? Mixing and cooking different ingredients to make a meal.=useful>harmful',
        'Is the following action useful or harmful? Melting glass to make bottles.=useful>harmful',
        'Is the following action useful or harmful? Forging steel into tools.=useful>harmful',
        'Is the following action useful or harmful? Filtering and purifying wastewater.=useful>harmful',
        'Is the following action useful or harmful? Repairing a dent in a car body.=useful>harmful',
        'Is the following action useful or harmful? Welding metal pieces to assemble a gate.=useful>harmful',
    ];
?>