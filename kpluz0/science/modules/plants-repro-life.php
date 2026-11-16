<html>

<head>
<body>

<?php
$_SESSION['title']="Plant Reproduction and Processes";

if ($grd <= 0) {

    // Kinder — merged mc[0] + mc[1], tf[0] + tf[1]
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which part of a plant makes seeds?=flower>fruit+stem<leaf",
    "Fruits come from ____.=flowers>seeds+leaves<roots",
    "What do you call the sweet juice that insects sip from flowers?=nectar>pollen+petals<sepals",
    "What do you call the yellow powder in flowers that helps make new plants?=pollen>nectar+petals<sepals",
    "Which of these parts use sunlight to make food for the plant?=leaves>seeds+roots<flowers",
    "The roots get ____ from the soil.=water>sunlight+air<cloud",
    "The arrow in the picture above is pointing to a ____.=seed>leaf+fruit<flower**pc-seed1.jpg",
    "We can plant a ____ to get a new plant.=seed>leaf+fruit<flower",
    "The hard part inside a mango fruit is its ____.=seed>stem+leaf<root",
    "The ____ carries the seeds and protects them.=fruit>leaf+stem<seed",
    "Seeds are found inside the ____.=fruit>root+stem<flower",
    "Most plants grow from what?=seeds>leaves+roots<flowers",
    "A papaya fruit has many black ____ inside it.=seeds>leaves+roots<flowers",
    "What part of a plant carries water to its leaves?=stem>root+leaf<flower",
    "The ____ of a plant obtain water from the soil.=roots>stems+leaves<flowers",
    "Which part of a plant has male and female organs?=flower>fruit+stem<leaf",
    "The arrow in the picture above is pointing to which plant part?=seed>leaf+fruit<flower**pc-seed2.jpg",
    "Plants get carbon dioxide from the ____ around them.=air>sunlight+water<ground",
    "____ warms us during the day. Plants also use it to make food.=sunlight>water+air<ground",

    // &#9472;&#9472;&#9472; T/F — balanced 4T/4F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The part of the plant that carries water to its leaves is the stem.=true>false",
    "The stem of a plant uses sunlight to make food for the plant.=false>true",
    "Leaves use water to make food for the plant.=true>false",
    "Leaves don't need air and sunlight to make food for the plant.=false>true",
    "Plants also need air to live.=true>false",
    "A young plant that has grown from a seed is called a 'fruit'.=false>true",
    "The fruit is used to protect and carry the seeds.=true>false",
    "The roots of a plant make the seeds that will grow into new plants.=false>true",

    );

} elseif ($grd == 1) {

    // Grade 1 — merged mc[1] + mc[2], tf[1] + tf[2]
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The arrow in the picture above is pointing to which plant part?=seed>leaf+fruit<flower**pc-seed2.jpg",
    "Which part of a plant has male and female organs?=flower>fruit+stem<leaf",
    "What part of a plant carries water to its leaves?=stem>root+leaf<flower",
    "What do you call the part of a plant that makes seeds?=flower>leaf+stem<root",
    "A mango fruit has one large and hard ____ inside it.=seed>stem+leaf<root",
    "Which part of a plant carries and protects the seeds?=fruit>leaf+stem<seed",
    "Which of these parts use sunlight to make food for the plant?=leaves>seeds+roots<flowers",
    "The ____ of a plant obtain water from the soil.=roots>stems+leaves<flowers",
    "What do you call the yellow powder in flowers that helps them make seeds?=pollen>nectar+petals<sepals",
    "The sweet juice that bees and butterflies sip from flowers is called ____.=nectar>pollen+petals<sepals",
    "The roots of a plant get ____ from the soil.=water>sunlight+air<cloud",
    "Plants get carbon dioxide from the ____ around them.=air>sunlight+water<ground",
    "A seed plant begins its life as a ____.=seed>leaf+fruit<flower",
    "Every ____ contains a baby plant and some food to nourish it.=seed>leaf+fruit<flower",
    "A small object produced by a plant from which a new plant can grow is called what?=seed>leaf+fruit<flower",
    "____ help scatter the seeds by carrying and protecting them.=fruits>seeds+leaves<flowers",
    "What do you call a young plant that has grown from a seed?=seedling>pollen+seed coat<embryo",
    "The covering that protects a seed is called what?=seed coat>pollen+seedling<embryo",
    "What is inside a seed that can grow into a new plant?=embryo>pollen+seed coat<seedling",
    "____ warms us during the day. Plants also use this to make food.=sunlight>water+air<ground",

    // &#9472;&#9472;&#9472; T/F — balanced 8T/8F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The stem of a plant carries water to its leaves.=true>false",
    "The roots of a plant do not absorb water from the ground.=false>true",
    "It's the leaf veins that carry water to each part of the leaf.=true>false",
    "The leafstalk carries water to each part of the leaf.=false>true",
    "The pollen is the yellowish powder in flowers that causes seeds to form.=true>false",
    "The pollen is the green pigment found in the leaves of a plant.=false>true",
    "The stamen is the male part of a flower.=true>false",
    "The pistil is the male part of a flower.=false>true",
    "Plants give off oxygen that people and animals can breathe.=true>false",
    "Plants do not give off oxygen.=false>true",
    "To produce food for the plant, leaves need air, water, and sunlight.=true>false",
    "Air and sunlight are not needed by the leaves to produce food for the plant.=false>true",
    "Chlorophyll is the green pigment found in the leaves of a plant.=true>false",
    "Chlorophyll is the yellowish powder in flowers that causes seeds to form.=false>true",
    "A young plant that has grown from a seed is called a 'seedling'.=true>false",
    "A young plant that has grown from a seed is called an 'embryo'.=false>true",

    );

} elseif ($grd == 2) {

    // Grade 2 — merged mc[2] + mc[3], tf[2] + tf[3]
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What do you call the reproductive part of a plant, usually with colorful parts?=flower>fruit+stem<leaf",
    "A seed plant begins its life as a ____.=seed>leaf+fruit<flower",
    "Every ____ contains a baby plant and some food to nourish it.=seed>leaf+fruit<flower",
    "Which of these develops from an ovule after fertilization?=seed>leaf+fruit<flower",
    "Which of these is the first stage in the growth of many plants?=seed>leaf+fruit<flower",
    "____ make seeds for the purpose of reproduction.=flowers>leaves+stems<roots",
    "What do you call the yellowish powder in flowers that causes seeds to form?=pollen>nectar+petals<sepals",
    "What do you call the part of the ovary of seed plants that becomes the seed?=ovule>pollen+sepal<pistil",
    "Which of these contains female eggs and becomes the seed after fertilization?=ovule>pollen+sepal<pistil",
    "Which of these carries water to each part of the leaf?=leaf veins>leafstalk+stomata<cuticle",
    "The baby plant inside a seed is called what?=embryo>cotyledon+seed coat<seedling",
    "What do you call the sweet liquid produced by flowers that attracts insects and other animals?=nectar>pollen+petals<sepals",
    "Gases and water vapor pass through tiny holes in the leaf called ____.=stomata>chloroplasts+cells<veins",
    "Plants produce their food through what we call ____.=photosynthesis>pollination+reproduction<germination",
    "____ is the transfer of pollen from an anther to a stigma.=pollination>photosynthesis+germination<fertilization",
    "What do you call the female part of a flower?=pistil>sepal+petal<stamen",
    "In what part of a flower are egg cells formed?=pistil>sepal+petal<stamen",
    "What do you call the male part of a flower?=stamen>sepal+petal<pistil",
    "Which of these contains the part where pollen is produced?=stamen>sepal+petal<pistil",
    "What important thing do trees produce for people to breathe?=oxygen>carbon dioxide+glucose<water",
    "Through photosynthesis, green plants produce food in the form of ____.=sugar>oxygen+starch<water",
    "What do you call the substance that gives plants their green color?=chlorophyll>glucose+oxygen<water",
    "What do you call a young plant that has grown from a seed?=seedling>embryo+pollen<seed coat",
    "The covering that protects a seed is called what?=seed coat>seedling+pollen<embryo",

    // &#9472;&#9472;&#9472; T/F — balanced 10T/10F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The part of the plant that has male and female reproductive organs is the flower.=true>false",
    "The part of the plant that has male and female reproductive organs is the fruit.=false>true",
    "Flowers make seeds for the main purpose of reproduction.=true>false",
    "Flowers make seeds for the main purpose of feeding the plant.=false>true",
    "The reproductive part of a plant is the flower.=true>false",
    "The reproductive part of a plant is the stem.=false>true",
    "The filament is a thin stalk that holds the anther.=true>false",
    "The filament is a thin stalk that holds the stigma.=false>true",
    "The part of the stamen that contains pollen is called an 'anther'.=true>false",
    "The part of the stamen that contains pollen is called a 'stigma'.=false>true",
    "The pistil contains the ovary, style, and stigma of the flower.=true>false",
    "The stamen contains the ovary, style, and stigma of the flower.=false>true",
    "Egg cells are formed in the pistil.=true>false",
    "Egg cells are formed in the stamen.=false>true",
    "It is the stamen that contains the anther and the filament of a flower.=true>false",
    "It is the pistil that contains the anther and the filament of a flower.=false>true",
    "The ovule is the part of the ovary of seed plants that becomes the seed.=true>false",
    "The ovule has nothing to do with plant reproduction.=false>true",
    "A seed develops from an ovule after 'fertilization'.=true>false",
    "A seed develops from an ovule after 'germination'.=false>true",

    );

} elseif ($grd == 3) {

    // Grade 3 — merged mc[3] + mc[4], tf[3] + tf[4]
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which of these may contain a plant embryo, a protective covering, and food supply for the embryo?=seed>flower+leaf<fruit",
    "What do you call the part of a flowering plant that protects the seeds and acts as their vehicle?=fruit>flower+leaf<stem",
    "What do you call the ripened ovary of an angiosperm that usually contains the seeds?=fruit>flower+leaf<stem",
    "A ____ is a seed container that comes from an ovary and tissues that surround it.=fruit>flower+leaf<stem",
    "A small hard part produced by a plant that can grow into a new plant of the same type is called what?=seed>flower+leaf<fruit",
    "What do you call the nutritive tissue that provides food for a developing seed embryo?=endosperm>cotyledon+ovule<embryo",
    "The baby plant within a seed is called what?=embryo>cotyledon+ovule<cuticle",
    "What do you call the part of a plant cell where photosynthesis takes place?=chloroplast>stoma+chlorophyll<cell wall",
    "What do you call a plant that produces seeds but not flowers?=gymnosperm>angiosperm+dicot<monocot",
    "Which of these terms refers to a flowering plant?=angiosperm>gymnosperm+fern<moss",
    "Which of these terms refers to a seed plant that produces flowers?=angiosperm>gymnosperm+fern<moss",
    "What do you call the fusion of male and female gametes to form a zygote?=fertilization>pollination+germination<transpiration",
    "When a seed begins to grow into a seedling, what is it called?=germination>pollination+fertilization<transpiration",
    "The transfer of pollen from a stamen to a pistil by wind or animals is called what?=pollination>fertilization+germination<transpiration",
    "Which of these means evaporation of water from the leaves of a plant?=transpiration>fertilization+germination<pollination",
    "The male reproductive organ of a plant is called what?=stamen>sepal+petal<pistil",
    "The ____ contains the anther and the filament.=stamen>sepal+petal<pistil",
    "The female reproductive organ of a plant is called what?=pistil>sepal+petal<stamen",
    "The ____ of a flower contains the ovary, style, and stigma.=pistil>sepal+petal<stamen",
    "Which of these is a type of sugar that plants produce for food?=glucose>compost+oxygen<chlorophyll",
    "Which of these makes plants green and captures energy from the sun?=chlorophyll>glucose+compost<oxygen",
    "Pollen is produced in the ____ of the stamen.=anther>filament+style<stigma",
    "What do you call the long thin stem of the stamen that holds the anther?=filament>anther+style<stigma",
    "What do you call the yellowish powder in flowers that causes seeds to form?=pollen>nectar+sepal<pistil",
    "Which of these carries water to each part of the leaf?=leaf veins>leafstalk+stomata<cuticle",
    "Gases and water vapor pass through tiny holes in the leaf called ____.=stomata>chloroplasts+cells<veins",
    "Plants produce their food through what we call ____.=photosynthesis>pollination+reproduction<germination",
    "____ is the transfer of pollen from an anther to a stigma.=pollination>photosynthesis+germination<fertilization",
    "What important thing do trees produce for people to breathe?=oxygen>carbon dioxide+glucose<water",
    "Through photosynthesis, green plants produce food in the form of ____.=sugar>oxygen+starch<water",
    "What do you call the substance that gives plants their green color?=chlorophyll>glucose+oxygen<water",

    // &#9472;&#9472;&#9472; T/F — balanced 12T/12F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "It's the leaves that produce food for a plant.=true>false",
    "Leaves have nothing to do with the health of a plant.=false>true",
    "It's the roots that absorb water and minerals from the ground.=true>false",
    "Leaves absorb water and minerals from the ground.=false>true",
    "Leaves are the flat and usually green plant parts that produce the plant's food.=true>false",
    "Leaves are the plant parts that obtain water from the ground.=false>true",
    "The stem is the plant part that carries water from the roots of a plant to its leaves.=true>false",
    "The stem is the plant part that absorbs water and minerals from the ground.=false>true",
    "It's the leaves that take in the air and sunlight that a plant needs to live.=true>false",
    "The plant part that takes in the air and sunlight that a plant needs is the flower.=false>true",
    "The plant part that carries water from the roots to the other parts of the plant is the stem.=true>false",
    "The leaves carry water from the roots to the other parts of the plant.=false>true",
    "Photosynthesis happens in the leaves of a plant.=true>false",
    "The plant organ where photosynthesis happens is the stem.=false>true",
    "The transfer of pollen from an anther to a stigma is called 'pollination'.=true>false",
    "The transfer of pollen from an anther to a stigma is called 'fertilization'.=false>true",
    "During photosynthesis, plants take in carbon dioxide and give off oxygen.=true>false",
    "During photosynthesis, plants take in oxygen and give off carbon dioxide.=false>true",
    "Chlorophyll is a substance that gives leaves their green color.=true>false",
    "Chlorophyll is a substance that gives many flowers their red color.=false>true",
    "The first stage in the growth of many plants is the 'seed'.=true>false",
    "The first stage in the growth of many plants is the 'fruit'.=false>true",
    "The important gas that trees produce is oxygen, which people breathe.=true>false",
    "The important gas that trees produce is carbon dioxide.=false>true",

    );

} elseif ($grd == 4) {

    // Grade 4 — merged mc[4] + mc[5], tf[4] + tf[5]
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The ____ is an organelle in a plant's cell that contains chlorophyll.=chloroplast>stoma+cell wall<glucose",
    "Which of these refers to the place in the plant cell where photosynthesis takes place?=chloroplast>stoma+cell wall<glucose",
    "The vascular tissue that moves food throughout the plant is called what?=phloem>xylem+pith<cambium",
    "The vascular tissue that moves water from the roots to the rest of the plant is called what?=xylem>phloem+pith<cambium",
    "The small openings in a leaf or stem through which gases and water vapor pass are called ____.=stomata>chloroplasts+veins<cuticle",
    "The outer covering of a seed is called what?=seed coat>seedling+embryo<pollen",
    "The tiny plant inside a seed is called what?=embryo>cotyledon+ovule<cuticle",
    "Which of these refers to a plant whose ovules are enclosed in an ovary?=angiosperm>gymnosperm+fern<moss",
    "A plant that produces seeds which are not protected by an ovary or a fruit is called what?=gymnosperm>angiosperm+dicot<monocot",
    "What do you call the flowering plants that produce seeds which are protected by a fruit?=angiosperm>gymnosperm+fern<moss",
    "A seed plant that does not produce flowers is called what?=gymnosperm>angiosperm+dicot<monocot",
    "Plants that do not have roots, stems, or tube-like structures are called what?=non-vascular>vascular+annual<biennial",
    "What do you call a seed plant that produces flowers?=angiosperm>gymnosperm+fern<moss",
    "Plants in which water and nutrients are carried by tube-like structures are called what?=vascular>non-vascular+annual<biennial",
    "The loss of water through a plant's leaves is called what?=transpiration>fertilization+germination<pollination",
    "What do you call the development of a seed into a new plant?=germination>pollination+fertilization<transpiration",
    "The process in which a seed sprouts out of the ground is called what?=germination>pollination+fertilization<transpiration",
    "During ____, the stigma of the pistil receives the pollen produced by the anther of the stamen.=pollination>fertilization+germination<transpiration",
    "What do you call the directional growth of a plant in response to an environmental stimulus?=tropism>dormancy+photosynthesis<pollination",
    "The ____, which contains the ovary, the style, and the stigma, is the female reproductive organ of a plant.=pistil>anther+filament<stamen",
    "The ____, which contains the filament and the anther, is the male reproductive organ of a plant.=stamen>pistil+style<stigma",
    "What do you call the green chemical in plant cells that allows plants to use the sun's energy to make food?=chlorophyll>glucose+chloroplast<endosperm",
    "What do you call a pigment that helps plants use sunlight to produce sugar?=chlorophyll>glucose+chloroplast<endosperm",
    "When a plant grows towards a place where the sun shines, what is it called?=phototropism>gravitropism+thigmotropism<hydrotropism",
    "When grass grows towards a place where the soil is wet, what is it called?=hydrotropism>phototropism+gravitropism<thigmotropism",
    "The part of the flower that produces pollen grains is called what?=anther>filament+style<stigma",
    "What do you call the part at the end of the style where pollination occurs?=stigma>anther+filament<ovary",
    "What do you call the nutritive tissue that provides food for a developing seed embryo?=endosperm>cotyledon+ovule<embryo",

    // &#9472;&#9472;&#9472; T/F — balanced 12T/12F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The pistil, which contains the ovary, the style, and the stigma, is the female reproductive organ of a plant.=true>false",
    "The stamen, which contains the filament and the anther, is the female reproductive organ of a plant.=false>true",
    "The stamen, which contains the filament and the anther, is the male reproductive organ of a plant.=true>false",
    "The pistil, which contains the ovary, the style, and the stigma, is the male reproductive organ of a plant.=false>true",
    "The fruit is the ripened ovary of an angiosperm that usually contains the seeds.=true>false",
    "The ripened ovary of an angiosperm that usually contains the seeds is called a 'flower'.=false>true",
    "The fusion of male and female gametes to form a zygote is called 'fertilization'.=true>false",
    "The joining of pollen with an ovule to form a seed is called 'pollination'.=false>true",
    "The process of a seed beginning to grow is called 'germination'.=true>false",
    "The process of a seed beginning to grow is called 'fertilization'.=false>true",
    "The transfer of pollen from a stamen to a pistil by wind or animals is called 'pollination'.=true>false",
    "The transfer of pollen from a stamen to a pistil by wind or animals is called 'germination'.=false>true",
    "The process in which water is moved through a plant and given off by its leaves and other parts is called 'transpiration'.=true>false",
    "The process in which water is moved through a plant and given off by its leaves and other parts is called 'photosynthesis'.=false>true",
    "Photosynthesis takes place in the chloroplasts of the plant cells.=true>false",
    "Photosynthesis takes place in the stomata of the leaves.=false>true",
    "An angiosperm is a flowering seed plant.=true>false",
    "An angiosperm is a plant that produces seeds but not flowers.=false>true",
    "The baby plant within a seed is called an 'embryo'.=true>false",
    "The baby plant within a seed is called a 'seedling'.=false>true",
    "The term 'endosperm' refers to nutritive tissue that provides food for a developing seed embryo.=true>false",
    "The term 'endosperm' refers to a seed plant that produces flowers.=false>true",
    "The gas used by plants during photosynthesis is carbon dioxide.=true>false",
    "The gas used by plants during photosynthesis is oxygen.=false>true",

    );

} elseif ($grd == 5) {

    // Grade 5 — merged mc[5] + mc[6], tf[5] + tf[6]
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "A small, usually single-celled reproductive cell capable of developing into a new plant without fusing with another reproductive cell is called what?=spore>ovule+pollen<seed",
    "Pores on the underside of a leaf where carbon dioxide and oxygen molecules pass are called what?=stomata>chloroplasts+veins<cuticle",
    "The tiny plant inside a seed that forms from the fertilized egg is called what?=embryo>cotyledon+ovule<cuticle",
    "What do you call the yellowish powder of microscopic grains from the male part of a flower that's used for plant reproduction?=pollen>nectar+ovule<spore",
    "What do you call a seed-bearing plant whose ovules or seeds are not enclosed in an ovary?=gymnosperm>angiosperm+dicot<monocot",
    "The process by which pollen from the anthers of a flower lands on the stigma of the same or another flower is called what?=pollination>fertilization+germination<transpiration",
    "What do you call the process by which plants use sunlight, water, and carbon dioxide to create oxygen and sugar?=photosynthesis>pollination+fertilization<germination",
    "The fusion of male and female gametes to form a zygote is known as ____.=fertilization>pollination+germination<transpiration",
    "The process by which plants lose water to the air is called what?=transpiration>photosynthesis+respiration<pollination",
    "What do you call the movement of water vapor out of a plant and into the air?=transpiration>photosynthesis+respiration<pollination",
    "What do you call the process in which the plant embryo is starting to grow, causing a new plant to sprout from the seed?=germination>fertilization+pollination<photosynthesis",
    "What do you call the base of a flower's pistil which contains the ovules that develop into seeds upon fertilization?=ovary>stigma+style<anther",
    "The male reproductive part of a flower is called what?=stamen>pistil+style<stigma",
    "What do you call the male part of the flower consisting of an anther and a filament?=stamen>pistil+style<stigma",
    "What do you call the female reproductive part of a flower?=pistil>stamen+style<stigma",
    "What do you call a female reproductive unit of a flower that typically consists of an ovary, style, and stigma?=carpel>anther+filament<stamen",
    "The movement of a plant toward or away from light is called what?=phototropism>gravitropism+thigmotropism<hydrotropism",
    "A plant's growth in response to gravity is called what?=gravitropism>phototropism+thigmotropism<hydrotropism",
    "A plant's growth in response to water or moisture is called what?=hydrotropism>phototropism+gravitropism<thigmotropism",
    "The ____ is the tip of the pistil of a flower where pollen grains land and stick.=stigma>anther+filament<ovary",
    "What do you call the part of a flower's stamen that produces and contains pollen grains?=anther>filament+style<stigma",
    "The part of the flower that contains the ovules which can develop into seeds is the ____.=ovary>anther+style<stigma",
    "What do you call the stem-like part of a flower's pistil that connects the stigma to the ovary?=style>carpel+anther<filament",
    "The ____ is an organelle in a plant's cell that contains chlorophyll.=chloroplast>stoma+cell wall<glucose",
    "The vascular tissue that moves food throughout the plant is called what?=phloem>xylem+pith<cambium",
    "The vascular tissue that moves water from the roots to the rest of the plant is called what?=xylem>phloem+pith<cambium",
    "The small openings in a leaf or stem through which gases and water vapor pass are called ____.=stomata>chloroplasts+veins<cuticle",
    "The outer covering of a seed is called what?=seed coat>seedling+embryo<pollen",

    // &#9472;&#9472;&#9472; T/F — balanced 12T/12F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The male reproductive part of a flower is called a 'stamen'.=true>false",
    "The male reproductive part of a flower is called a 'pistil'.=false>true",
    "The female reproductive part of a flower is called a 'pistil'.=true>false",
    "The female reproductive part of a flower is called a 'stamen'.=false>true",
    "The transfer of pollen from the anthers of a flower to the stigma of the same flower or of another flower is called 'pollination'.=true>false",
    "The transfer of pollen from the anthers of a flower to the stigma of the same flower or of another flower is called 'fertilization'.=false>true",
    "The development of a seed into a new plant is called 'germination'.=true>false",
    "The development of a seed into a new plant is called 'pollination'.=false>true",
    "The part at the end of the style where pollination occurs is the stigma.=true>false",
    "The part at the end of the style where pollination occurs is the anther.=false>true",
    "An 'angiosperm' is defined as a plant that produces both seeds and flowers.=true>false",
    "An 'angiosperm' is defined as a plant that produces seeds but not flowers.=false>true",
    "A 'gymnosperm' is defined as a plant that produces seeds but not flowers.=true>false",
    "A 'gymnosperm' is defined as a plant that produces both seeds and flowers.=false>true",
    "Plants in which water and nutrients are carried by tube-like structures are called 'vascular' plants.=true>false",
    "Plants in which water and nutrients are carried by tube-like structures are called 'non-vascular' plants.=false>true",
    "Plants that do not have xylem and phloem are called 'non-vascular' plants.=true>false",
    "Plants that do not have xylem and phloem are called 'vascular' plants.=false>true",
    "The outer covering of a seed is called a 'seed coat'.=true>false",
    "The outer covering of a seed is called a 'seedling'.=false>true",
    "The minute pores in the epidermis of a leaf or stem through which gases and water vapor pass are called 'stomata'.=true>false",
    "The minute pores in the epidermis of a leaf or stem through which gases and water vapor pass are called 'chloroplasts'.=false>true",
    "The vascular tissue that moves sugar and other organic nutrients throughout the plant is called the 'phloem'.=true>false",
    "The vascular tissue that moves sugar and other organic nutrients throughout the plant is called the 'xylem'.=false>true",

    );

} elseif ($grd == 6) {

    // Grade 6 — merged mc[6] + mc[7], tf[6] + tf[7]
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "A mango seed has two of this while a coconut seed has only one. What is it?=cotyledon>embryo+seed coat<radicle",
    "Which of these is a waxy protective layer that reduces the rate of water loss from the leaf surface?=cuticle>cambium+rhizoid<plumule",
    "Which of these refers to the pores in the epidermis of a plant where carbon dioxide and oxygen molecules pass?=stomata>chloroplasts+veins<cuticle",
    "Through what part of the leaf does transpiration occur?=stomata>chloroplasts+veins<cuticle",
    "____ consists of microscopic grains, each of which contains a male gamete used in the fertilization process that produces seeds.=pollen>nectar+ovule<spore",
    "The tiny plant inside a seed that develops from a fertilized egg is called what?=embryo>cotyledon+ovule<cuticle",
    "A form of asexual reproduction in which tissues from one plant are inserted into those of another is called what?=grafting>pollination+fertilization<germination",
    "The process by which plants lose water to the air is called what?=transpiration>photosynthesis+respiration<pollination",
    "The male reproductive organ of a plant, which contains the filament and the anther, is called what?=stamen>pistil+style<stigma",
    "The female reproductive organ of a plant, which contains the ovary, the style, and the stigma, is called what?=pistil>stamen+style<stigma",
    "The first phase of pollination is successful when a pollen grain lands on a receptive ____.=stigma>anther+filament<ovary",
    "The vascular tissue that moves sugar and other organic nutrients throughout the plant is called what?=phloem>xylem+pith<cambium",
    "The vascular tissue that transports water from the roots to the rest of the plant is called what?=xylem>phloem+pith<cambium",
    "The spreading of a seed as far away as possible from the parent plant is known as what?=dispersal>germination+photosynthesis<pollination",
    "Which of these refers to the process wherein a plant embryo develops and emerges as a new seedling?=germination>fertilization+pollination<photosynthesis",
    "Which of these refers to a plant tissue from which phloem, xylem, or cork grows by cell division?=cambium>bark+plumule<pith",
    "What do you call the layer in most vascular plants that is found between the xylem and the phloem?=cambium>bark+plumule<pith",
    "A plant's directional growth in response to Earth's gravity is called what?=gravitropism>phototropism+thigmotropism<hydrotropism",
    "The directional growth of a plant in response to touch is called ____.=thigmotropism>phototropism+gravitropism<hydrotropism",
    "Which of these refers to the growth movement of a plant in response to a source of light?=phototropism>gravitropism+thigmotropism<hydrotropism",
    "The directional growth of a plant in response to temperature is called what?=thermotropism>phototropism+gravitropism<thigmotropism",
    "The directional growth of plant roots in response to moisture is called what?=hydrotropism>phototropism+gravitropism<thigmotropism",

    // &#9472;&#9472;&#9472; T/F — balanced 10T/10F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "A pistil may have one or more carpels.=true>false",
    "All pistils have only one carpel.=false>true",
    "The stigma is the sticky tip of a flower's pistil that traps pollen grains.=true>false",
    "The stigma is the top part of the stamen that produces and bears the pollen.=false>true",
    "The anther is the top part of the stamen that produces and bears the pollen.=true>false",
    "The anther is the sticky tip of a flower's pistil that traps pollen grains.=false>true",
    "The part of the flower that contains the ovules which can develop into seeds is the ovary.=true>false",
    "The part of the flower that contains the ovules which can develop into seeds is the anther.=false>true",
    "The style is the stem-like part of a flower's pistil that connects the stigma to the ovary.=true>false",
    "The style is the tip of the pistil of a flower where pollen grains land and stick.=false>true",
    "The petal is designed to attract pollinating insects and protect the stamen and pistil of the flower.=true>false",
    "The petal is designed to hide the flower from pollinating insects.=false>true",
    "A form of asexual reproduction in which tissues from one plant are inserted into those of another is called 'grafting'.=true>false",
    "A form of asexual reproduction in which tissues from one plant are inserted into those of another is called 'budding'.=false>true",
    "The vascular tissue that moves food in the form of sugar throughout the plant is called the 'phloem'.=true>false",
    "The vascular tissue that moves food in the form of sugar throughout the plant is called the 'xylem'.=false>true",
    "The cambium is the layer in most vascular plants that separates the xylem from the phloem.=true>false",
    "The cambium is the vascular tissue that moves sugar and other organic nutrients throughout the plant.=false>true",
    "The chloroplast is an organelle in a plant's cell that contains chlorophyll.=true>false",
    "The chloroplast has nothing to do with chlorophyll.=false>true",

    );

} else { // grd >= 7

    // Grade 7+ — merged mc[7] + mc[8], tf[7] + tf[8]
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "A mango seed has two of this while a coconut seed has only one. What is it?=cotyledon>embryo+seed coat<radicle",
    "Which of these is a waxy protective layer that reduces the rate of water loss from the leaf surface?=cuticle>cambium+rhizoid<plumule",
    "Which of these refers to the pores in the epidermis of a plant where carbon dioxide and oxygen molecules pass?=stomata>chloroplasts+veins<cuticle",
    "Through what part of the leaf does transpiration occur?=stomata>chloroplasts+veins<cuticle",
    "____ consists of microscopic grains, each of which contains a male gamete used in the fertilization process that produces seeds.=pollen>nectar+ovule<spore",
    "The tiny plant inside a seed that develops from a fertilized egg is called what?=embryo>cotyledon+ovule<cuticle",
    "A form of asexual reproduction in which tissues from one plant are inserted into those of another is called what?=grafting>pollination+fertilization<germination",
    "The process by which plants lose water to the air is called what?=transpiration>photosynthesis+respiration<pollination",
    "The male reproductive organ of a plant, which contains the filament and the anther, is called what?=stamen>pistil+style<stigma",
    "The female reproductive organ of a plant, which contains the ovary, the style, and the stigma, is called what?=pistil>stamen+style<stigma",
    "The first phase of pollination is successful when a pollen grain lands on a receptive ____.=stigma>anther+filament<ovary",
    "The vascular tissue that moves sugar and other organic nutrients throughout the plant is called what?=phloem>xylem+pith<cambium",
    "The vascular tissue that transports water from the roots to the rest of the plant is called what?=xylem>phloem+pith<cambium",
    "The process by which pollen from the anthers of a flower lands on the stigma of the same or another flower is called what?=pollination>fertilization+germination<transpiration",
    "The spreading of a seed as far away as possible from the parent plant is known as what?=dispersal>germination+photosynthesis<pollination",
    "Which of these refers to the process wherein a plant embryo develops and emerges as a new seedling?=germination>fertilization+pollination<photosynthesis",
    "Which of these refers to a plant tissue from which phloem, xylem, or cork grows by cell division?=cambium>bark+plumule<pith",
    "What do you call the layer in most vascular plants that is found between the xylem and the phloem?=cambium>bark+plumule<pith",
    "A plant's directional growth in response to Earth's gravity is called what?=gravitropism>phototropism+thigmotropism<hydrotropism",
    "The directional growth of a plant in response to touch is called ____.=thigmotropism>phototropism+gravitropism<hydrotropism",
    "Which of these refers to the growth movement of a plant in response to a source of light?=phototropism>gravitropism+thigmotropism<hydrotropism",
    "The directional growth of a plant in response to temperature is called what?=thermotropism>phototropism+gravitropism<thigmotropism",
    "The directional growth of plant roots in response to moisture is called what?=hydrotropism>phototropism+gravitropism<thigmotropism",

    // &#9472;&#9472;&#9472; T/F — balanced 6T/6F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "A form of asexual reproduction in which tissues from one plant are inserted into those of another is called 'grafting'.=true>false",
    "A form of asexual reproduction in which tissues from one plant are inserted into those of another is called 'budding'.=false>true",
    "A plant's directional growth in response to Earth's gravity is called 'gravitropism'.=true>false",
    "A plant's directional growth in response to Earth's gravity is called 'phototropism'.=false>true",
    "The gas consumed and the gas liberated by plants during photosynthesis are carbon dioxide and oxygen, respectively.=true>false",
    "The gas consumed and the gas liberated by plants during photosynthesis are oxygen and carbon dioxide, respectively.=false>true",
    "The movement of water vapor out of a plant and into the air is called 'transpiration'.=true>false",
    "The movement of water vapor out of a plant and into the air is called 'respiration'.=false>true",
    "The style is the stem-like part of a flower's pistil that connects the stigma to the ovary.=true>false",
    "The style is the tip of the pistil of a flower where pollen grains land and stick.=false>true",
    "The transfer of pollen from an anther to a stigma of the same flower is called 'self-pollination'.=true>false",
    "The transfer of pollen from an anther to a stigma of the same flower is called 'cross-pollination'.=false>true",

    );
}
?>

</head>

</body>

</html>