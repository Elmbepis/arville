<html>

<head>
<body>

<?php
$_SESSION['title']="Plants and their Characteristics";

if ($grd <= 0) {

    // Kinder — merged Easy (mc[0]) + Medium (mc[1])
    $questions=array(

    // &#9472;&#9472;&#9472; Plant parts & functions &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "We can plant a ____ to get a new plant.=seed>stem+leaf<root",
    "Seeds are found inside the ____.=fruit>stem+leaf<root",
    "The ____ use sunlight to make food for the plant.=leaves>seeds+roots<flowers",
    "What is in this picture?=roots>seeds+leaves<flowers**pc-roots1.jpg",
    "The ____ hold the plant in the ground.=roots>stems+leaves<flowers",
    "Plants use their ____ to make food.=leaves>roots+stems<flowers",
    "Which part carries water to its leaves?=stem>seed+leaf<root",
    "What do you call the part of a plant that makes seeds?=flower>stem+leaf<root",
    "Which part holds the plant upright?=stem>seed+leaf<root",
    "A mango fruit has one large and hard ____ inside it.=seed>stem+leaf<root",
    "Which part of a plant carries and protects the seeds?=fruit>seed+stem<leaf",

    // &#9472;&#9472;&#9472; Plant types &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What kind of plant is this?=tree>shrub+vine<grass**pc-tree1.jpg",
    "What kind of plant is this?=tree>shrub+vine<grass**pc-tree2.jpg",
    "A very tall, large, and strong plant is called a ____.=tree>shrub+vine<grass",
    "What kind of plant is this?=shrub>tree+vine<grass**pc-shrub1.jpg",
    "What kind of plant is this?=shrub>tree+vine<grass**pc-shrub2.jpg",
    "What kind of plant is this?=vine>tree+shrub<grass**pc-vine1.jpg",
    "What kind of plant is this?=vine>tree+shrub<grass**pc-vine2.jpg",
    "A ____ is a plant that climbs sticks and walls.=vine>tree+shrub<grass",
    "What kind of plant is this?=water plant>tree+shrub<vine**pc-waterplant1.jpg",
    "What kind of plant is this?=water plant>tree+shrub<vine**pc-waterplant2.jpg",
    "A ____ lives in water.=water plant>tree+shrub<vine",
    "A small, woody plant is called a ____.=shrub>tree+herb<vine",
    "A ____ is a small plant with soft stems that can stand on its own.=herb>tree+shrub<vine",

    // &#9472;&#9472;&#9472; Seeds, fruits, needs &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Most plants grow from what?=seeds>leaves+roots<flowers",
    "The apples that we pick from apple trees and eat are ____.=fruits>seeds+leaves<flowers",
    "A papaya fruit has many black ____ inside it.=seeds>leaves+roots<flowers",
    "Fruits come from ____.=flowers>seeds+leaves<roots",
    "A plant uses its roots to stay on the ____.=ground>sunlight+water<air",
    "The roots get ____ from the soil.=water>sunlight+air<cloud",
    "____ warms us during the day. Plants also use it to make food.=sunlight>water+air<ground",

    // &#9472;&#9472;&#9472; T/F — balanced 8T/7F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "This is a tree.=true>false**pc-tree4.jpg",
    "This is a water plant.=false>true**pc-tree5.jpg",
    "This is a tree.=true>false**pc-tree6.jpg",
    "This is a water plant.=false>true**pc-shrub4.jpg",
    "This is a shrub.=true>false**pc-shrub5.jpg",
    "This is a vine.=false>true**pc-shrub6.jpg",
    "This is a vine.=true>false**pc-vine4.jpg",
    "This is a water plant.=false>true**pc-vine5.jpg",
    "These are water plants.=true>false**pc-waterplant7.jpg",
    "These are trees.=false>true**pc-waterplant9.jpg",
    "The roots hold the plant in the ground.=true>false",
    "Plants can live without water.=false>true",
    "Plants need sunlight to live.=true>false",
    "Plants can live without air.=false>true",
    "This plant lives in water.=true>false**pc-waterplant8.jpg",

    );

} elseif ($grd == 1) {

    // Grade 1 — merged Easy (mc[1]) + Medium (mc[2])
    $questions=array(

    // &#9472;&#9472;&#9472; Plant parts & functions &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which part carries water to its leaves?=stem>seed+leaf<root",
    "What do you call the part of a plant that makes seeds?=flower>stem+leaf<root",
    "Which part holds the plant upright?=stem>seed+leaf<root",
    "A mango fruit has one large and hard ____ inside it.=seed>stem+leaf<root",
    "Which part of a plant carries and protects the seeds?=fruit>seed+stem<leaf",
    "Every ____ contains a baby plant and some food to nourish it.=seed>flower+leaf<fruit",
    "The ____ connects the roots to the leaves.=stem>flower+seed<fruit",
    "The plant becomes taller as the ____ grows upwards.=stem>root+leaf<fruit",
    "Which part of a plant has male and female organs?=flower>root+leaf<stem",
    "Which part of a plant protects the seeds?=fruit>flower+leaf<stem",

    // &#9472;&#9472;&#9472; Leaves, roots, seeds, fruits &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Most plants grow from what?=seeds>leaves+roots<flowers",
    "The apples that we pick from apple trees and eat are ____.=fruits>seeds+leaves<flowers",
    "A papaya fruit has many black ____ inside it.=seeds>leaves+roots<flowers",
    "Fruits come from ____.=flowers>seeds+leaves<roots",
    "____ catch sunlight and breathe in air for the plant.=leaves>stems+roots<seeds",
    "Which of these parts use sunlight to make food for the plant?=leaves>stems+roots<seeds",
    "Which of these parts hold the plant in the ground?=roots>stems+leaves<seeds",
    "Which of these obtain water and minerals from the ground?=roots>stems+leaves<seeds",
    "____ help scatter the seeds by carrying and protecting them.=fruits>stems+flowers<leaves",

    // &#9472;&#9472;&#9472; Plant types &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "A plant that grows to be very large and strong is called a ____.=tree>shrub+herb<vine",
    "A plant that lives in water is called a ____.=water plant>tree+shrub<herb",
    "A plant that climbs sticks and walls is called a ____.=vine>tree+shrub<herb",
    "A small, woody plant is called a ____.=shrub>tree+herb<vine",
    "A ____ is a small plant with soft stems that can stand on its own.=herb>tree+shrub<vine",
    "A ____ grows in the desert, has no leaves, but has tiny thorns or spines.=cactus>tree+shrub<herb",
    "A plant that lives underwater is called a ____.=water plant>tree+shrub<herb",

    // &#9472;&#9472;&#9472; Flower parts & needs &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The yellow powder in flowers that helps make new plants is called what?=pollen>nectar+seed coat<seedling",
    "Insects like bees and butterflies feed on the sweet ____ of flowers.=nectar>pollen+seed coat<seedling",
    "What do you call a young plant that has grown from a seed?=seedling>pollen+seed coat<nectar",
    "The covering that protects a seed is called what?=seed coat>pollen+seedling<nectar",
    "Plants get carbon dioxide from the ____ around them.=air>sunlight+water<ground",
    "The roots of a plant get ____ from the soil.=water>sunlight+air<ground",
    "A plant uses its roots to hold onto the ____.=ground>sunlight+water<air",

    // &#9472;&#9472;&#9472; T/F — balanced 8T/8F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The petals are the most colorful parts of a flower.=true>false",
    "The most colorful parts of a flower are the sepals.=false>true",
    "Leaves need sunlight to make food for the plant.=true>false",
    "Leaves don't need water to make food for the plant.=false>true",
    "Leaves need air to make food for the plant.=true>false",
    "The plants in the picture are trees.=false>true**pc-waterplant4.jpg",
    "The plants in the picture are water plants.=true>false**pc-waterplant5.jpg",
    "The plants in the picture are shrubs.=false>true**pc-waterplant6.jpg",
    "A young plant that has grown from a seed is called a 'seedling'.=true>false",
    "The roots of a plant make the seeds that will grow into new plants.=false>true",
    "The flower is the plant part that makes the seeds.=true>false",
    "The fruit protects and carries the flowers.=false>true",
    "Plants also need air to live.=true>false",
    "Plants can live without air.=false>true",
    "A plant uses its leaves to get water from the ground.=false>true",
    "A plant uses its leaves to make food.=true>false",

    );

} elseif ($grd == 2) {

    // Grade 2 — merged Easy (mc[2]) + Medium (mc[3])
    $questions=array(

    // &#9472;&#9472;&#9472; Plant parts & structures &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which part of a plant has male and female organs?=flower>root+leaf<stem",
    "Every ____ contains a baby plant and some food to nourish it.=seed>flower+leaf<fruit",
    "The ____ connects the roots of a plant with its leaves and supports the plant.=stem>root+leaf<fruit",
    "What do you call the plant part that carries water from the roots to the other parts of the plant?=stem>root+leaf<fruit",
    "Which of these may contain a plant embryo, a protective covering, and food supply for the embryo?=seed>flower+leaf<fruit",
    "What do you call the reproductive part of a plant, usually with colorful parts?=flower>root+leaf<stem",
    "Which part of a plant protects the seeds?=fruit>flower+leaf<stem",

    // &#9472;&#9472;&#9472; Leaves & photosynthesis &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The plant organ where photosynthesis happens is called what?=leaves>stems+roots<seeds",
    "Chlorophyll is the green pigment found in the ____ of a plant.=leaves>stems+roots<seeds",
    "____ are the parts of a plant that are flat, typically green, and produce food for a plant.=leaves>stems+roots<seeds",
    "Which of these is the plant part that takes in the air and sunlight that a plant needs?=leaves>stems+roots<seeds",
    "Which of these does a plant use to make food?=leaves>stems+roots<seeds",
    "____ catch sunlight and breathe in air for the plant.=leaves>stems+roots<seeds",

    // &#9472;&#9472;&#9472; Roots &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "____ attach and hold the plant firmly in the ground.=roots>stems+leaves<seeds",
    "The ____ are the underground plant organs that absorb water and minerals.=roots>stems+leaves<seeds",
    "The ____ grow downwards into the soil to absorb water and hold the plant firmly to the ground.=roots>stems+leaves<seeds",

    // &#9472;&#9472;&#9472; Flowers, seeds, fruits &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "____ make seeds for the purpose of reproduction.=flowers>stems+leaves<seeds",
    "The fruits that we eat come from ____.=flowers>stems+leaves<seeds",
    "____ help scatter the seeds by carrying and protecting them.=fruits>stems+flowers<leaves",
    "Cotyledons are sometimes called what?=seed leaves>seed coat+seedling<pollen",

    // &#9472;&#9472;&#9472; Seeds & plants terms &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The baby plant inside a seed is called what?=embryo>cotyledon+ovule<bulb",
    "The yellow powder in flowers that causes seeds to form is called what?=pollen>nectar+seed coat<seedling",
    "The sweet juice that bees and butterflies sip from flowers is called ____.=nectar>pollen+seed coat<seedling",
    "A leaf of the baby plant inside the seed is called what?=cotyledon>embryo+seed coat<bulb",

    // &#9472;&#9472;&#9472; Plant life cycles & types &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Plants that grow, flower, make seeds, and die in one year are called ____ plants.=annual>biennial+perennial<dicot",
    "A plant that needs two years to complete its life cycle is called what?=biennial>annual+perennial<monocot",
    "What do you call a plant that lives for more than two years?=perennial>annual+biennial<dicot",
    "A plant that lacks specialized tissues for transporting water and nutrients is called a ____ plant.=nonvascular>vascular+annual<perennial",
    "A short plant with a woody stem and many woody branches is called a ____.=shrub>tree+herb<vine",
    "A ____ can be a 'climber' or a 'creeper'.=vine>tree+shrub<herb",
    "A plant that lives underwater is called a ____.=water plant>tree+shrub<herb",
    "A ____ grows in the desert, has no leaves, but has tiny thorns or spines.=cactus>tree+shrub<herb",

    // &#9472;&#9472;&#9472; Processes &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Plants produce their food through a process called ____.=photosynthesis>pollination+reproduction<germination",
    "____ is the transfer of pollen from the anthers of a flower to the stigma of the same flower or of another flower.=pollination>photosynthesis+germination<fertilization",

    // &#9472;&#9472;&#9472; Natural resources &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The brown or black material in soil that is formed when plants and animals decay is called what?=humus>oxygen+chlorophyll<glucose",
    "What important thing do trees produce for people to breathe?=oxygen>humus+glucose<chlorophyll",
    "Through photosynthesis, green plants produce food in the form of ____.=sugar>oxygen+humus<chlorophyll",
    "What do you call the substance that gives plants their green color?=chlorophyll>humus+oxygen<glucose",
    "Plants get carbon dioxide from the ____ around them.=air>sunlight+water<ground",

    // &#9472;&#9472;&#9472; T/F — balanced 15T/15F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "It is the stem that supports the plant and keeps it upright as it grows.=true>false",
    "The leaves support the plant and keep it upright as it grows.=false>true",
    "It's the roots that obtain water from the ground.=true>false",
    "The stem obtains water from the ground.=false>true",
    "It's the stem that carries water to the leaves of a plant.=true>false",
    "Roots carry water to the leaves of a plant.=false>true",
    "A plant uses its leaves to make food.=true>false",
    "A stem is the plant part that gets water from the ground.=false>true",
    "Leaves use air, sunlight, and water to make food for the plant.=true>false",
    "Leaves don't need air and sunlight to make food for the plant.=false>true",
    "The covering of a seed is called the 'seed coat'.=true>false",
    "The covering of a seed is called the 'embryo'.=false>true",
    "A young plant that has grown from a seed is called a 'seedling'.=true>false",
    "A young plant that has grown from a seed is called an 'embryo'.=false>true",
    "The part of a plant that we usually eat and has seeds inside is the fruit.=true>false",
    "The part of a plant that we usually eat and has seeds inside is the flower.=false>true",
    "A small object from which a new plant can grow is called a 'seed'.=true>false",
    "A small object from which a new plant can grow is called a 'leaf'.=false>true",
    "Plants give off oxygen that people and animals can breathe.=true>false",
    "Plants do not give off oxygen.=false>true",
    "The petals are the most colorful parts of a flower.=true>false",
    "The most colorful parts of a flower are the sepals.=false>true",
    "Leaves need sunlight to make food for the plant.=true>false",
    "Leaves don't need sunlight to make food for the plant.=false>true",
    "Plants need water to live.=true>false",
    "Plants can live without water.=false>true",
    "Plants need sunlight to live.=true>false",
    "Plants can live without sunlight.=false>true",
    "Plants need air to live.=true>false",
    "Plants can live without air.=false>true",

    );

} elseif ($grd == 3) {

    // Grade 3 — merged Easy (mc[3]) + Medium (mc[4])
    $questions=array(

    // &#9472;&#9472;&#9472; Plant parts & reproduction &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What do you call the reproductive part of a plant, usually with colorful parts?=flower>root+leaf<stem",
    "The ____ connects the roots of a plant with its leaves and supports the plant.=stem>root+leaf<fruit",
    "What do you call the plant part that carries water from the roots to the other parts of the plant?=stem>root+leaf<fruit",
    "Which of these may contain a plant embryo, a protective covering, and food supply for the embryo?=seed>flower+leaf<fruit",
    "____ make seeds for the purpose of reproduction.=flowers>stems+leaves<seeds",
    "The part of a flowering plant that protects the seeds and acts as their vehicle is called what?=fruit>flower+leaf<stem",
    "A ____ is a seed container that comes from an ovary and tissues that surround it.=fruit>flower+leaf<stem",

    // &#9472;&#9472;&#9472; Leaves & photosynthesis &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The plant organ where photosynthesis happens is called what?=leaves>stems+roots<seeds",
    "Chlorophyll is the green pigment found in the ____ of a plant.=leaves>stems+roots<seeds",
    "____ are the parts of a plant that are flat, typically green, and produce food for a plant.=leaves>stems+roots<seeds",
    "Which of these is the plant part that takes in the air and sunlight that a plant needs?=leaves>stems+roots<seeds",

    // &#9472;&#9472;&#9472; Roots &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "____ attach and hold the plant firmly in the ground.=roots>stems+leaves<seeds",
    "The ____ are the underground plant organs that absorb water and minerals.=roots>stems+leaves<seeds",
    "The ____ grow downwards into the soil to absorb water and hold the plant firmly to the ground.=roots>stems+leaves<seeds",

    // &#9472;&#9472;&#9472; Seeds & cotyledons &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "A leaf of the baby plant inside the seed is called what?=cotyledon>embryo+seed coat<bulb",
    "Cotyledons are sometimes called what?=seed leaves>seed coat+embryo<bulb",
    "The baby plant inside a seed is called what?=embryo>cotyledon+seed coat<bulb",

    // &#9472;&#9472;&#9472; Flowers &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What does a flower produce that sometimes causes allergy or hay fever?=pollen>nectar+seed coat<seedling",
    "What do you call the yellowish powder in flowers that causes seeds to form?=pollen>nectar+seed coat<seedling",
    "The sweet juice that bees and butterflies sip from flowers is called ____.=nectar>pollen+seed coat<seedling",

    // &#9472;&#9472;&#9472; Leaf structures &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The tiny holes in a leaf or stem through which gases and water vapor pass are called ____.=stomata>ovules+bulbs<chloroplasts",
    "What do you call the part of a plant cell where photosynthesis takes place?=chloroplast>stoma+chlorophyll<cell wall",
    "Which of these carries water to different parts of the leaf?=leaf vein>stoma+pollen<ovule",

    // &#9472;&#9472;&#9472; Plant life cycles & types &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Plants that grow, flower, make seeds, and die in one year are called ____ plants.=annual>biennial+perennial<dicot",
    "A plant that needs two years to complete its life cycle is called what?=biennial>annual+perennial<monocot",
    "What do you call a plant that lives for more than two years?=perennial>annual+biennial<dicot",
    "A plant that lacks specialized tissues for transporting water and nutrients is called a ____ plant.=nonvascular>vascular+annual<perennial",
    "It is the biggest and strongest type of plant and it can live for very long. What is it?=tree>shrub+herb<vine",
    "Which type of plant is smaller than a tree and has many small, woody branches?=shrub>tree+herb<vine",
    "Which type of plant is small, has soft stems, but can stand on its own?=herb>tree+shrub<vine",
    "Which type of plant has to climb a stick or a wall for support because its soft and weak stems can't stand on their own?=vine>tree+shrub<herb",

    // &#9472;&#9472;&#9472; Processes &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Plants produce their food through a process called ____.=photosynthesis>pollination+reproduction<germination",
    "____ is the transfer of pollen from the anthers of a flower to the stigma of the same flower or of another flower.=pollination>photosynthesis+germination<fertilization",

    // &#9472;&#9472;&#9472; Natural resources &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The brown or black material in soil that is formed when plants and animals decay is called what?=humus>oxygen+chlorophyll<glucose",
    "What important thing do trees produce for people to breathe?=oxygen>humus+glucose<chlorophyll",
    "Through photosynthesis, green plants produce food in the form of ____.=sugar>oxygen+humus<chlorophyll",
    "What do you call the substance that gives plants their green color?=chlorophyll>humus+oxygen<glucose",

    // &#9472;&#9472;&#9472; T/F — balanced 20T/19F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The pollen is the yellowish powder in flowers that causes seeds to form.=true>false",
    "The pollen is the green pigment found in the leaves of a plant.=false>true",
    "Flowers make seeds for the main purpose of reproduction.=true>false",
    "Flowers make seeds for the main purpose of feeding the plant.=false>true",
    "The reproductive part of a plant is the flower.=true>false",
    "The reproductive part of a plant is the stem.=false>true",
    "It's the leaves that produce food for a plant.=true>false",
    "Leaves have nothing to do with the health of a plant.=false>true",
    "It's the roots that absorb water and minerals from the ground.=true>false",
    "Leaves absorb water and minerals from the ground.=false>true",
    "The main body or stalk of a plant is called a 'stem'.=true>false",
    "The main body or stalk of a plant is called 'roots'.=false>true",
    "Leaves are the flat and usually green plant parts that produce the plant's food.=true>false",
    "Leaves are the plant parts that obtain water from the ground.=false>true",
    "The stem is the plant part that carries water from the roots of a plant to its leaves.=true>false",
    "The stem is the plant part that absorbs water and minerals from the ground.=false>true",
    "It's the leaves that take in the air and sunlight that a plant needs to live.=true>false",
    "The plant part that takes in the air and sunlight that a plant needs is the flower.=false>true",
    "It's the roots that attach and hold the plant firmly in the ground.=true>false",
    "The stem attaches and holds the plant firmly in the ground.=false>true",
    "The plant part that carries water from the roots to the other parts of the plant is the stem.=true>false",
    "The leaves carry water from the roots to the other parts of the plant.=false>true",
    "The tiny holes in a leaf where gases and water vapor pass are called 'stomata'.=true>false",
    "The tiny holes in a leaf where gases and water vapor pass are called 'spores'.=false>true",
    "It's the leaf veins that carry water to each part of the leaf.=true>false",
    "The leafstalk carries water to each part of the leaf.=false>true",
    "To produce food for the plant, leaves need air, water, and sunlight.=true>false",
    "Air and sunlight are not needed by the leaves to produce food for the plant.=false>true",
    "Photosynthesis happens in the leaves of a plant.=true>false",
    "The plant organ where photosynthesis happens is the stem.=false>true",
    "Plants produce their food through photosynthesis.=true>false",
    "Plants produce their food through pollination.=false>true",
    "The transfer of pollen from an anther to a stigma is called 'pollination'.=true>false",
    "The transfer of pollen from an anther to a stigma is called 'fertilization'.=false>true",
    "A dicot is a plant that has two cotyledons.=true>false",
    "A dicot is a plant that has one cotyledon.=false>true",
    "A monocot is a plant that has only one cotyledon.=true>false",
    "A monocot is a plant that has two cotyledons.=false>true",
    "Nonvascular plants lack specialized tissues for transporting water and nutrients.=true>false",
    "A plant that has no roots, stems, or leaves is called an 'annual plant'.=false>true",

    );

} elseif ($grd == 4) {

    // Grade 4 — merged Easy (mc[4]) + Medium (mc[5])
    $questions=array(

    // &#9472;&#9472;&#9472; Fruit & seed reproduction &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What do you call the ripened ovary of an angiosperm that usually contains the seeds?=fruit>flower+leaf<stem",
    "A ____ is a seed container that comes from an ovary and tissues that surround it.=fruit>flower+leaf<stem",
    "What do you call the part of a flowering plant that protects the seeds and acts as their vehicle?=fruit>flower+leaf<stem",
    "A small hard part produced by a plant that can grow into a new plant of the same type is called what?=seed>flower+leaf<fruit",
    "What do you call the sweet liquid produced by flowers that attracts insects and other animals?=nectar>pollen+seed coat<embryo",

    // &#9472;&#9472;&#9472; Chloroplast & photosynthesis &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What do you call the part of a plant cell where photosynthesis takes place?=chloroplast>stoma+chlorophyll<cell wall",
    "What do you call the green chemical in plant cells that allows plants to use the sun's energy to make food?=chlorophyll>glucose+chloroplast<endosperm",

    // &#9472;&#9472;&#9472; Cotyledon & embryo &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which of these refers to the first leaf that sprouts from a seed?=cotyledon>embryo+seed coat<ovule",
    "A leaf of the plant embryo inside a seed is called what?=cotyledon>embryo+seed coat<ovule",
    "The baby plant within a seed is called what?=embryo>cotyledon+ovule<cuticle",
    "The ____ is a protective layer covering the epidermis of leaves, young shoots, and other aerial plant organs.=cuticle>cotyledon+ovule<embryo",

    // &#9472;&#9472;&#9472; Plant life cycles & taxonomy &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "A plant that is in a resting or non-growing state is called what?=dormant>annual+perennial<dicot",
    "Which of these terms refers to plants that live for more than two years?=perennial>annual+biennial<dicot",
    "What do you call a plant that has two cotyledons?=dicot>monocot+annual<perennial",
    "What do you call a plant that has only one cotyledon?=monocot>dicot+annual<perennial",
    "What do you call a plant that produces seeds but not flowers?=gymnosperm>angiosperm+dicot<monocot",
    "Which of these terms refers to a flowering plant?=angiosperm>gymnosperm+dicot<monocot",
    "What do you call a plant that has tubes that transport minerals and water?=vascular>non-vascular+annual<biennial",

    // &#9472;&#9472;&#9472; Processes &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What do you call the joining of pollen with an ovule to form a seed?=fertilization>pollination+germination<transpiration",
    "The process of a seed beginning to grow is called what?=germination>pollination+fertilization<transpiration",
    "The transfer of pollen from a stamen to a pistil by wind or animals is called what?=pollination>fertilization+germination<transpiration",
    "The loss of water through a plant's leaves is called what?=transpiration>fertilization+germination<pollination",

    // &#9472;&#9472;&#9472; Natural resources &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What do you call a mixture of plant parts and soil that has been piled up, soaked with water and allowed to rot?=compost>humus+oxygen<glucose",
    "Which of these is a type of sugar that plants produce for food?=glucose>compost+oxygen<chlorophyll",
    "Which of these makes plants green and captures energy from the sun?=chlorophyll>glucose+compost<oxygen",

    // &#9472;&#9472;&#9472; Plant species &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What do you call the plant with tall stems whose flowers have big bright yellow petals?=sunflower>oak tree+cactus<pitcher plant",
    "What is the name of the tree that produces acorns?=oak tree>sunflower+cactus<pitcher plant",
    "What is the name of the prickly plant that grows in the desert?=cactus>sunflower+oak tree<pitcher plant",
    "What do you call the plant that uses bright colors, a pleasant aroma, and a deep pouch to trap insects?=pitcher plant>sunflower+oak tree<Venus flytrap",
    "What do you call the carnivorous plant with hinged leaves that can open and close to trap insects?=Venus flytrap>sunflower+oak tree<pitcher plant",

    // &#9472;&#9472;&#9472; Plant structure &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "____ are the parts of a plant that are flat, typically green, and produce food for a plant.=leaves>stems+roots<seeds",
    "The vascular tissue that transports water from the roots to the rest of the plant is called what?=xylem>phloem+cambium<tap root",
    "The minute pores in the epidermis of a leaf or stem through which gases and water vapor pass are called ____.=stomata>ovules+bulbs<spores",
    "Which of these are used for the movement of oxygen and carbon dioxide into and out of the plant?=stomata>ovules+chloroplasts<spores",
    "Which of these is the equivalent of human sperm in plants?=pollen>nectar+ovule<spore",
    "Which of these refers to a leaf of a fern or cycad, which usually consists of many divisions or leaflets?=frond>palm+rhizome<tuber",
    "Which of these refers to a layer of wood produced by the growth of a woody plant in one year?=annual ring>tuber+rhizoid<pith",

    // &#9472;&#9472;&#9472; T/F — balanced 20T/19F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The fruit is the ripened ovary of an angiosperm that usually contains the seeds.=true>false",
    "The ripened ovary of an angiosperm that usually contains the seeds is called a 'flower'.=false>true",
    "The thin stalk that connects a leaf to the plant's stem is called a 'petiole'.=true>false",
    "The thin stalk that connects a leaf to the plant's stem is called a 'pedicle'.=false>true",
    "The joining of pollen with an ovule to form a seed is called 'fertilization'.=true>false",
    "The joining of pollen with an ovule to form a seed is called 'pollination'.=false>true",
    "A seed that's beginning to grow is undergoing what we call 'germination'.=true>false",
    "A seed that's beginning to grow is undergoing what we call 'fertilization'.=false>true",
    "The transfer of pollen from a stamen to a pistil by wind or animals is called 'pollination'.=true>false",
    "The transfer of pollen from a stamen to a pistil by wind or animals is called 'germination'.=false>true",
    "Photosynthesis takes place in the chloroplasts of the plant cells.=true>false",
    "Photosynthesis takes place in the stomata of the leaves.=false>true",
    "A plant that produces seeds but not flowers is called a 'gymnosperm'.=true>false",
    "A plant that produces seeds but not flowers is called an 'angiosperm'.=false>true",
    "An angiosperm is a flowering seed plant.=true>false",
    "An angiosperm is a plant that produces seeds but not flowers.=false>true",
    "A plant that has tubes for transporting minerals and water inside it is called a 'vascular' plant.=true>false",
    "A plant that has tubes for transporting minerals and water inside it is called a 'non-vascular' plant.=false>true",
    "The baby plant within a seed is called an 'embryo'.=true>false",
    "The baby plant within a seed is called a 'seedling'.=false>true",
    "Growing vegetables in water without soil is called 'hydroponics'.=true>false",
    "Growing vegetables in water without soil is called 'grafting'.=false>true",
    "The seed container that comes from an ovary and tissues that surround it is called a 'fruit'.=true>false",
    "The seed container that comes from an ovary and tissues that surround it is called a 'seed coat'.=false>true",
    "A small hard part produced by a plant that can grow into a new plant of the same type is called a 'seed'.=true>false",
    "A small hard part produced by a plant that can grow into a new plant of the same type is called a 'fruit'.=false>true",
    "A plant that is in a resting or non-growing state is said to be 'dormant'.=true>false",
    "A plant that is in a resting or non-growing state is said to be 'germinating'.=false>true",
    "Chlorophyll is the green pigment in leaves that gets energy from the sun for photosynthesis.=true>false",
    "Chlorophyll is not important in the photosynthesis of plants.=false>true",
    "Botany is the branch of science that deals with plants.=true>false",
    "Zoology is the study of plant life.=false>true",
    "The gas used by plants during photosynthesis is carbon dioxide.=true>false",
    "The gas used by plants during photosynthesis is oxygen.=false>true",
    "The gas given off by plants during photosynthesis is oxygen.=true>false",
    "The gas given off by plants during photosynthesis is carbon dioxide.=false>true",
    "When plants lose water through their leaves, it is called 'transpiration'.=true>false",
    "When plants lose water through their leaves, it is called 'respiration'.=false>true",

    );

} elseif ($grd == 5) {

    // Grade 5 — merged Easy (mc[5]) + Medium (mc[6])
    $questions=array(

    // &#9472;&#9472;&#9472; Plant structure &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which of these is a place in the plant cell where photosynthesis takes place?=chloroplast>stoma+chlorophyll<cell wall",
    "What do you call a plant's main, stout root from which smaller roots grow?=tap root>fibrous root+lateral root<storage root",
    "The leaf of the embryo within the seed of a plant is called what?=cotyledon>embryo+seed coat<ovule",
    "The ____ is a protective layer covering the epidermis of leaves, young shoots, and other aerial plant organs.=cuticle>cotyledon+ovule<embryo",
    "A tissue that surrounds an embryo of a seed and provides food for its growth is called what?=endosperm>cotyledon+ovule<embryo",
    "A ____ is an underground stem that grows horizontally and helps the plant to spread.=rhizome>tuber+corm<bulb",
    "A ____ is a swollen and rounded underground stem found in some plants and used for storing food.=corm>tuber+rhizome<bulb",
    "The ____ is an organelle in a plant's cell that contains chlorophyll.=chloroplast>stoma+chlorophyll<cell wall",

    // &#9472;&#9472;&#9472; Plant taxonomy &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Plants in which water and nutrients are carried by tube-like structures are called what?=vascular>non-vascular+annual<biennial",
    "Which of these refers to a plant whose ovules are enclosed in an ovary?=angiosperm>gymnosperm+dicot<monocot",
    "A plant that produces seeds which are not protected by an ovary or a fruit is called what?=gymnosperm>angiosperm+dicot<monocot",
    "What do you call the flowering plants that produce seeds which are protected by a fruit?=angiosperm>gymnosperm+monocot<dicot",
    "A non-flowering plant that bears seeds directly on the surface of scales or leaves that are often arranged in cones is called what?=gymnosperm>angiosperm+dicot<monocot",
    "What do you call an angiosperm with two cotyledons in each seed?=dicot>monocot+annual<biennial",
    "What do you call an angiosperm with just one cotyledon in each seed?=monocot>dicot+annual<biennial",
    "Plants that do not have roots, stems, or tube-like structures are called what?=non-vascular>vascular+annual<biennial",
    "Plants that live, reproduce, and continue to grow for many years are called ____ plants.=perennial>annual+biennial<dicot",
    "Plants that get nourishment by trapping and consuming insects are called what?=carnivorous>non-vascular+annual<biennial",

    // &#9472;&#9472;&#9472; Flower structure &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The calyx and the corolla are parts of what?=flowers>stems+leaves<roots",
    "The male reproductive part of a flower is called what?=stamen>pistil+corolla<calyx",
    "What do you call the female reproductive part of a flower?=pistil>stamen+corolla<calyx",

    // &#9472;&#9472;&#9472; Processes &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The process by which plants lose water to the air is called what?=transpiration>photosynthesis+respiration<pollination",
    "What do you call the movement of water vapor out of a plant and into the air?=transpiration>photosynthesis+respiration<pollination",
    "The process in which a seed sprouts out of the ground is called what?=germination>fertilization+pollination<photosynthesis",
    "What do you call the phenomenon wherein the growth and turns of a plant are affected by a stimulus in its environment?=tropism>dormancy+photosynthesis<pollination",
    "The state of much lower activity that some plants go into in order to survive cold weather is called what?=dormancy>tropism+photosynthesis<pollination",
    "The fusion of male and female gametes to form a zygote is known as ____.=fertilization>pollination+germination<transpiration",
    "What do you call the process by which plants use sunlight, water, and carbon dioxide to create oxygen and sugar?=photosynthesis>pollination+fertilization<germination",
    "When pollen from a flower lands on the stigma of the same or another flower, what is it called?=pollination>fertilization+germination<transpiration",

    // &#9472;&#9472;&#9472; Plant hormones &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What do you call the green chemical in plant cells that allows plants to use the sun's energy to make food?=chlorophyll>glucose+chloroplast<endosperm",
    "What do you call a pigment that helps plants use sunlight to produce sugar?=chlorophyll>glucose+chloroplast<endosperm",

    // &#9472;&#9472;&#9472; Plant responses &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The movement of a plant toward or away from light is called what?=phototropism>gravitropism+thigmotropism<hydrotropism",
    "A plant's movement or growth in response to Earth's gravity is called what?=gravitropism>phototropism+thigmotropism<hydrotropism",

    // &#9472;&#9472;&#9472; T/F — balanced 24T/24F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The small openings in leaves where oxygen and carbon dioxide pass are called 'stomata'.=true>false",
    "The small openings in leaves where oxygen and carbon dioxide pass are called 'chloroplasts'.=false>true",
    "A plant's main, stout root that goes deep into the soil and from which smaller roots grow is called a 'tap root'.=true>false",
    "A plant's main, stout root that goes deep into the soil and from which smaller roots grow is called a 'lateral root'.=false>true",
    "A leaf of the embryo of a seed plant is called a 'cotyledon'.=true>false",
    "A leaf of the embryo of a seed plant is called a 'radicle'.=false>true",
    "The waxy covering of leaves and other aerial plant organs is called 'cuticle'.=true>false",
    "Leaves and other aerial plant organs are protected by a waxy covering called 'stomata'.=false>true",
    "The male reproductive part of a flower is called the 'stamen'.=true>false",
    "The male reproductive part of a flower is called the 'pistil'.=false>true",
    "The female reproductive part of a flower is called the 'pistil'.=true>false",
    "The female reproductive part of a flower is called the 'stamen'.=false>true",
    "The transfer of pollen from the anthers of a flower to the stigma of the same flower or of another flower is called 'pollination'.=true>false",
    "The transfer of pollen from the anthers of a flower to the stigma of the same flower or of another flower is called 'fertilization'.=false>true",
    "The development of a seed into a new plant is called 'germination'.=true>false",
    "The development of a seed into a new plant is called 'pollination'.=false>true",
    "A plant's growth response to gravity is called 'gravitropism'.=true>false",
    "A plant's growth response to gravity is called 'phototropism'.=false>true",
    "The loss of water through a plant's leaves is called 'transpiration'.=true>false",
    "The loss of water through a plant's leaves is called 'respiration'.=false>true",
    "The part at the end of the style where pollination occurs is the stigma.=true>false",
    "The part at the end of the style where pollination occurs is the anther.=false>true",
    "Through photosynthesis, green plants produce food mainly in the form of sugar.=true>false",
    "Through photosynthesis, green plants produce food mainly in the form of proteins.=false>true",
    "An 'angiosperm' is defined as a plant that produces both seeds and flowers.=true>false",
    "An 'angiosperm' is defined as a plant that produces seeds but not flowers.=false>true",
    "A 'gymnosperm' is defined as a plant that produces seeds but not flowers.=true>false",
    "A 'gymnosperm' is defined as a plant that produces both seeds and flowers.=false>true",
    "A plant that produces seeds which are not protected by an ovary or a fruit is called a 'gymnosperm'.=true>false",
    "A plant that produces seeds which are not protected by an ovary or a fruit is called an 'angiosperm'.=false>true",
    "The flowering plants that produce seeds which are protected by a fruit are called 'angiosperms'.=true>false",
    "The flowering plants that produce seeds which are protected by a fruit are called 'gymnosperms'.=false>true",
    "Plants in which water and nutrients are carried by tube-like structures are called 'vascular' plants.=true>false",
    "Plants in which water and nutrients are carried by tube-like structures are called 'non-vascular' plants.=false>true",
    "Plants that do not have xylem and phloem are called 'non-vascular' plants.=true>false",
    "Plants that do not have xylem and phloem are called 'vascular' plants.=false>true",
    "Plants that live, reproduce, and continue to grow for many years are called 'perennial' plants.=true>false",
    "Plants that live, reproduce, and continue to grow for many years are called 'annual' plants.=false>true",
    "The outer covering of a seed is called a 'seed coat'.=true>false",
    "The outer covering of a seed is called a 'seedling'.=false>true",
    "Chlorophyll is the green pigment in leaves that helps plants absorb sunlight to produce sugar by photosynthesis.=true>false",
    "Chlorophyll is the green pigment in leaves that helps plants absorb air and water for photosynthesis.=false>true",
    "The tiny plant inside a seed is called an 'embryo'.=true>false",
    "The tiny plant inside a seed is called a 'seedling'.=false>true",
    "Plants that get nourishment by trapping and consuming insects are called 'carnivorous' plants.=true>false",
    "Plants that get nourishment by trapping and consuming insects are called 'non-vascular' plants.=false>true",
    "A spore is a reproductive cell that can become a new plant without fusing with another reproductive cell.=true>false",
    "A spore is a reproductive cell that needs to fuse with another reproductive cell in order to produce a new plant.=false>true",

    );

} elseif ($grd == 6) {

    // Grade 6 — merged Easy (mc[6]) + Medium (mc[7])
    $questions=array(

    // &#9472;&#9472;&#9472; Plant structure &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "A dicotyledon seed has two of this. What is it?=cotyledon>embryo+seed coat<radicle",
    "A monocotyledon seed has only one ____.=cotyledon>embryo+seed coat<radicle",
    "The ____ is an organelle in a plant's cell that contains chlorophyll.=chloroplast>stoma+chlorophyll<cell wall",
    "A ____ is an underground stem that grows horizontally and helps the plant to spread?=rhizome>tuber+corm<bulb",
    "A ____ is a swollen and rounded underground stem found in some plants and used for storing food.=corm>tuber+rhizome<bulb",
    "Which of these is the main root of a plant that goes deep into the soil and from which smaller roots grow?=tap root>fibrous root+lateral root<storage root",
    "The small openings in a leaf where carbon dioxide and oxygen molecules pass are called what?=stomata>ovules+bulbs<chloroplasts",

    // &#9472;&#9472;&#9472; Reproductive parts &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What do you call the yellowish powder of microscopic grains from the male part of a flower that's used for plant reproduction?=pollen>nectar+seed coat<endosperm",
    "The tiny plant inside a seed that forms from the fertilized egg is called what?=embryo>cotyledon+ovule<cuticle",

    // &#9472;&#9472;&#9472; Plant taxonomy &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What do you call a seed-bearing plant whose ovules or seeds are not enclosed in an ovary?=gymnosperm>angiosperm+dicot<monocot",
    "A flowering plant that produces seeds which are enclosed within a fruit is classified as what?=angiosperm>gymnosperm+dicot<monocot",

    // &#9472;&#9472;&#9472; Processes &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What do you call the process in which water is moved through a plant and given off by its leaves and other parts?=transpiration>photosynthesis+respiration<pollination",
    "What do you call the process by which plants use sunlight, water, and carbon dioxide to create oxygen and sugar?=photosynthesis>pollination+fertilization<germination",
    "The fusion of male and female gametes to form a zygote is known as ____.=fertilization>pollination+germination<transpiration",
    "When the plant embryo is starting to sprout as a new plant from the seed, what is it called?=germination>fertilization+pollination<photosynthesis",
    "When pollen from a flower lands on the stigma of the same or another flower, what is it called?=pollination>fertilization+germination<transpiration",

    // &#9472;&#9472;&#9472; Flower parts &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The male reproductive part of a flower is called what?=stamen>pistil+corolla<calyx",
    "What do you call the female reproductive part of a flower?=pistil>stamen+corolla<calyx",

    // &#9472;&#9472;&#9472; Plant responses &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The movement of a plant toward or away from light is called what?=phototropism>gravitropism+thigmotropism<hydrotropism",
    "A plant's movement or growth in response to Earth's gravity is called what?=gravitropism>phototropism+thigmotropism<hydrotropism",

    // &#9472;&#9472;&#9472; Advanced &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The minute pores in the epidermis of a leaf or stem through which gas molecules and water vapor pass are called ____.=stomata>ovules+bulbs<chloroplasts",
    "Which of these refers to an underground stem that grows horizontally and helps the plant to spread?=rhizome>tuber+corm<bulb",
    "Which of these is a reproductive cell that can develop into a new plant without combining with another reproductive cell?=spore>ovule+pollen<seed",
    "Through what part of the leaf does transpiration occur?=stomata>ovules+bulbs<chloroplasts",

    // &#9472;&#9472;&#9472; T/F — balanced 19T/19F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The process in which water is moved through a plant and given off by its leaves and other parts is called 'transpiration'.=true>false",
    "The process in which water is moved through a plant and given off by its leaves and other parts is called 'photosynthesis'.=false>true",
    "The term 'endosperm' refers to the tissue that surrounds an embryo of a seed and provides food for its growth.=true>false",
    "The term 'endosperm' refers to a seed plant that produces flowers.=false>true",
    "A rhizome is an underground stem that grows horizontally and helps the plant to spread.=true>false",
    "A rhizome is the tip of a flower stalk that bears the floral organs.=false>true",
    "A small, usually single-celled reproductive cell capable of developing into a new plant without fusing with another reproductive cell is called a 'spore'.=true>false",
    "A small, usually single-celled reproductive cell capable of developing into a new plant without fusing with another reproductive cell is called an 'endosperm'.=false>true",
    "The minute pores in the epidermis of a leaf or stem through which gases and water vapor pass are called 'stomata'.=true>false",
    "The minute pores in the epidermis of a leaf or stem through which gases and water vapor pass are called 'chloroplasts'.=false>true",
    "The petiole, also known as a leafstalk, connects a leaf to the plant's stem.=true>false",
    "The petiole refers to an underground stem that grows horizontally and helps the plant to spread.=false>true",
    "The male part of the flower consisting of an anther and a filament is called a 'stamen'.=true>false",
    "The male part of the flower consisting of an anther and a filament is called a 'pistil'.=false>true",
    "The female part of the flower consisting of one or more carpels is called a 'pistil'.=true>false",
    "The female part of the flower consisting of one or more carpels is called a 'stamen'.=false>true",
    "The development of a seed into a new plant is called 'germination'.=true>false",
    "The development of a seed into a new plant is called 'transpiration'.=false>true",
    "A plant's movement or growth in response to Earth's gravity is called 'gravitropism'.=true>false",
    "A plant's movement or growth in response to Earth's gravity is called 'phototropism'.=false>true",
    "A gymnosperm is a seed-bearing plant whose ovules or seeds are not enclosed in an ovary.=true>false",
    "A gymnosperm is a plant that produces both seeds and flowers.=false>true",
    "The tiny plant that forms from the fertilized egg of a flower is called an 'embryo'.=true>false",
    "The tiny plant that forms from the fertilized egg of a flower is called a 'seedling'.=false>true",
    "Chlorophyll is the green pigment in leaves that captures energy from the sun for use in photosynthesis.=true>false",
    "Chlorophyll is not involved in the process of photosynthesis.=false>true",

    );

} else { // grd >= 7

    // Grade 7+ — merged Easy (mc[7]) + Medium (mc[8])
    // Legacy grades 7-10 all map to this band.
    $questions=array(

    // &#9472;&#9472;&#9472; Plant structures & tissues &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The minute pores in the epidermis of a leaf or stem through which gas molecules and water vapor pass are called ____.=stomata>ovules+bulbs<chloroplasts",
    "Which of these refers to an underground stem that grows horizontally and helps the plant to spread?=rhizome>tuber+corm<bulb",
    "A rounded underground stem that is used for food storage and looks like a bulb but is uniform and solid inside is called what?=corm>tuber+rhizome<bulb",
    "Which of these is a reproductive cell that can develop into a new plant without combining with another reproductive cell?=spore>ovule+pollen<seed",
    "A dicotyledon seed has two of this. What is it?=cotyledon>embryo+seed coat<radicle",
    "Which of these refers to an enlarged and fleshy underground storage organ present in plants such as crocuses and gladioli?=corm>tuber+rhizome<bulb",
    "A waxy, waterproof layer on the epidermis of leaves that helps a plant minimize its loss of water is called what?=cuticle>radicle+rhizoid<plumule",
    "A large and stout plant root that grows downward from which other roots sprout horizontally is called what?=tap root>fibrous root+lateral root<storage root",
    "The vascular tissue that moves sugar and other organic nutrients throughout the plant is called what?=phloem>xylem+pith<cambium",
    "The vascular tissue that transports water from the roots to the rest of the plant is called what?=xylem>phloem+pith<cambium",

    // &#9472;&#9472;&#9472; Reproductive parts &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which of these is the tiny plant in the seed that forms when an egg is fertilized?=embryo>cotyledon+ovule<cuticle",
    "What do you call the powdery substance consisting of microscopic grains that produce a seed plant's male gametes?=pollen>nectar+ovule<spore",
    "The male organ of the flower, which consists of an anther and a filament, is referred to by which of these?=stamen>pistil+corolla<calyx",
    "The female organ of the flower, which contains the ovary, style, and stigma, is referred to by which of these?=pistil>stamen+corolla<calyx",
    "What do you call the base of a flower's pistil which contains the ovules that develop into seeds upon fertilization?=ovary>stigma+style<anther",

    // &#9472;&#9472;&#9472; Plant taxonomy &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What do you call a seed-bearing plant whose seeds are not protected by a container?=gymnosperm>angiosperm+dicot<monocot",
    "A flowering plant that produces seeds which are enclosed within a fruit is classified as what?=angiosperm>gymnosperm+dicot<monocot",

    // &#9472;&#9472;&#9472; Processes &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The process by which pollen from the anthers of a flower land on the stigma of the same or another flower is called what?=pollination>fertilization+germination<transpiration",
    "The union of male and female gametes of plants to produce a plant zygote is called what?=fertilization>pollination+germination<transpiration",
    "Which of these refers to the process by which plants use the sun's energy to create sugar and oxygen from carbon dioxide and water?=photosynthesis>pollination+fertilization<germination",
    "What do you call the movement of water vapor out of a plant and into the air?=transpiration>photosynthesis+respiration<pollination",
    "What do you call the process in which the plant embryo grows such that a new plant starts to emerge from the seed?=germination>fertilization+pollination<photosynthesis",
    "The spreading of a seed as far away as possible from the parent plant is known as what?=dispersal>germination+photosynthesis<pollination",

    // &#9472;&#9472;&#9472; Plant responses &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The response of a plant to changes in temperature is called what?=thermotropism>phototropism+gravitropism<thigmotropism",
    "What do you call the movement in which a plant moves or grows in response to touch or contact stimuli?=thigmotropism>phototropism+gravitropism<thermotropism",
    "The movement or growth of a plant toward or away from a source of light is referred to as what?=phototropism>gravitropism+thigmotropism<thermotropism",
    "A plant's movement or growth in response to Earth's gravity is called what?=gravitropism>phototropism+thigmotropism<thermotropism",

    // &#9472;&#9472;&#9472; T/F — balanced 4T/4F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Glucose is a type of sugar that plants produce through photosynthesis for its nourishment.=true>false",
    "Glucose is a substance that is very harmful to plants.=false>true",
    "The gas consumed by plants during photosynthesis is carbon dioxide.=true>false",
    "The gas consumed by plants during photosynthesis is oxygen.=false>true",
    "The transfer of pollen from an anther to a stigma of the same flower is called 'self-pollination'.=true>false",
    "The transfer of pollen from an anther to a stigma of the same flower is called 'cross-pollination'.=false>true",
    "Plant cells have cell walls, which are not present in animal cells.=true>false",
    "Animal cells have cell walls, which are not present in plant cells.=false>true",

    );
}
?>

</head>

</body>

</html>