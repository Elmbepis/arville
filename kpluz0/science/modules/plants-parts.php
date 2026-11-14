<html>

<head>
<body>

<?php
$_SESSION['title']="Parts of Plants";

if ($grd <= 1) {

    // Grade 0–1 — distinct images. T/F balanced 11T/10F.
    $questions=array(

    // &#9472;&#9472;&#9472; Plant part identification (picture MCQ) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What is in the picture?=flower>stem+leaf<root**pc-flower1.jpg",
    "What is in the picture?=flower>stem+leaf<root**pc-flower2.jpg",
    "What is in the picture?=flower>stem+leaf<seed**pc-flower3.jpg",
    "What is in the picture?=flower>stem+leaf<root**pc-flower4.jpg",
    "What is in the picture?=flower>root+leaf<seed**pc-flowerf.jpg",
    "What is in the picture?=leaf>seed+flower<root**pc-leaf1.jpg",
    "What is in the picture?=leaf>stem+flower<root**pc-leaf2.jpg",
    "What is in the picture?=leaf>stem+flower<seed**pc-leaf3.jpg",
    "What is in the picture?=leaf>stem+flower<root**pc-leaf4.jpg",
    "What are these?=leaves>roots+stems<flowers**pc-leaves1.jpg",
    "What are these?=leaves>roots+stems<seeds**pc-leaves5.jpg",
    "What are these?=stems>roots+leaves<flowers**pc-stems2.jpg",
    "What are these?=roots>fruits+leaves<flowers**pc-roots1.jpg",
    "What are these?=roots>stems+leaves<fruits**pc-roots4.jpg",
    "What are these?=roots>stems+leaves<flowers**pc-roots5.jpg",
    "What do you call the plant part shown in the picture?=leaf>stem+seed<flower**pc-leaf9.jpg",
    "What plant parts are these?=stems>flowers+leaves<seeds**pc-stems1.jpg",

    // &#9472;&#9472;&#9472; Fruit identification (picture MCQ) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What is this fruit?=apple>banana+mango<orange**fruit-apple.jpg",
    "What is this fruit?=banana>papaya+mango<orange**fruit-banana.jpg",
    "What is this fruit?=mango>banana+papaya<pear**fruit-mango.jpg",
    "What is this fruit?=papaya>grape+mango<pear**fruit-papaya.jpg",
    "What is this fruit?=grape>apple+mango<papaya**fruit-grape.jpg",

    // &#9472;&#9472;&#9472; Text-based MCQ &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which part of a plant holds the plant upright?=stem>leaf+root<flower",
    "Which part of a plant makes seeds?=flower>leaf+root<stem",
    "The hard part inside a mango fruit is its ____.=seed>root+stem<flower",
    "Seeds are found inside the ____.=fruit>root+stem<flower",
    "The arrow in this picture is pointing to a ____.=seed>leaf+fruit<flower**pc-seed1.jpg",
    "The arrow in this picture is pointing to a ____.=seed>root+fruit<flower**pc-seed2.jpg",
    "The part marked as 'A' in the picture is called what?=flower>stem+roots<leaf**pc-pparts1.jpg",
    "The part marked as 'B' in the picture is called what?=leaf>stem+roots<flower**pc-pparts1.jpg",
    "The part marked as 'C' in the picture is called what?=stem>leaf+roots<flower**pc-pparts1.jpg",
    "The part marked as 'D' in the picture is called what?=roots>stem+leaf<flower**pc-pparts1.jpg",

    // &#9472;&#9472;&#9472; True / False (picture) — balanced 11T/10F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "This is a leaf.=true>false**pc-leaf5.jpg",
    "This is a flower.=false>true**pc-leaf6.jpg",
    "This is a leaf.=true>false**pc-leaf7.jpg",
    "This is a flower.=false>true**pc-leaf8.jpg",
    "This is a flower.=true>false**pc-flower6.jpg",
    "This is a leaf.=false>true**pc-flower8.jpg",
    "This is a flower.=true>false**pc-flowera.jpg",
    "This is a leaf.=false>true**pc-flowerd.jpg",
    "This is a flower.=true>false**pc-flowere.jpg",
    "These are leaves.=false>true**pc-flowers1.jpg",
    "These are flowers.=true>false**pc-flowers2.jpg",
    "These are roots.=false>true**pc-flowers3.jpg",
    "These are fruits.=true>false**pc-fruits1.jpg",
    "These are flowers.=false>true**pc-fruits2.jpg",
    "These are fruits.=true>false**pc-fruits3.jpg",
    "These are flowers.=false>true**pc-leaves2.jpg",
    "These are leaves.=true>false**pc-leaves3.jpg",
    "These are roots.=false>true**pc-leaves4.jpg",
    "The arrow is showing the roots of the plant.=true>false**pc-roots2.jpg",
    "The arrow is showing the leaves of the tree.=false>true**pc-roots3.jpg",
    "The arrow is showing the stem of the plant.=true>false**pc-stem1.jpg",

    );

} elseif ($grd == 2) {

    // Grade 2 — T/F balanced 3T/3F.
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The flat, red parts of a rose are called ____.=petals>pollen+sepals<nectar",
    "The main body or stalk of a plant is called ____.=stem>root+leaf<fruit",
    "The ____ keeps the plant upright and holds its other parts above the ground.=stem>root+leaf<flower",
    "It's the stem that carries water to the leaves of a plant.=true>false",
    "Flowers carry water from the roots to the leaves.=false>true",
    "Which part of a plant protects the seeds?=fruit>flower+leaf<stem",
    "____ help scatter the seeds by carrying and protecting them.=fruits>stems+flowers<leaves",
    "Every ____ contains a baby plant and some food to nourish it.=seed>flower+leaf<fruit",
    "A leaf of the baby plant inside a seed is called a ____.=seed leaf>seed coat+seedling<pollen",
    "The part of a plant that we usually eat and has seeds inside is called what?=fruit>flower+leaf<stem",
    "The fruits that we eat come from ____.=flowers>stems+leaves<seeds",
    "____ catch sunlight and breathe in air for the plant.=leaves>stems+roots<seeds",
    "Which of these does a plant use to make food?=leaves>stems+roots<seeds",
    "The roots of a plant get ____ from the soil.=water>sunlight+air<rocks",
    "Which of these hold the plant very tightly in the soil?=roots>stems+leaves<seeds",
    "A plant uses its ____ to stay on the ground.=roots>stems+leaves<flowers",
    "The flower is the part of a plant that makes the seeds.=true>false",
    "The roots of a plant make the seeds that will grow into new plants.=false>true",
    "To produce food for the plant, leaves need air, water, and sunlight.=true>false",
    "Air and sunlight are not needed by the leaves to produce food for the plant.=false>true",
    "The plant part marked as 'A' in the picture is called what?=flower>stem+roots<leaf**pc-pparts2.jpg",
    "The plant part marked as 'B' in the picture is called what?=leaf>stem+roots<flower**pc-pparts2.jpg",
    "The plant part marked as 'C' in the picture is called what?=fruit>leaf+seed<flower**pc-pparts2.jpg",
    "The plant part marked as 'D' in the picture is called what?=stem>roots+leaf<flower**pc-pparts2.jpg",
    "The plant part marked as 'E' in the picture is called what?=roots>stem+leaf<flower**pc-pparts2.jpg",
    "The leaf part marked as 'A' in the picture is called what?=tip>midrib+vein<petiole**pc-lparts1.jpg",
    "The leaf part marked as 'B' in the picture is called what?=vein>tip+midrip<petiole**pc-lparts1.jpg",
    "The leaf part marked as 'C' in the picture is called what?=blade>vein+midrib<petiole**pc-lparts1.jpg",
    "The leaf part marked as 'D' in the picture is called what?=midrib>tip+vein<petiole**pc-lparts1.jpg",
    "The leaf part marked as 'E' in the picture is called what?=petiole>vein+midrib<tip**pc-lparts1.jpg",

    );

} elseif ($grd == 3) {

    // Grade 3 — T/F balanced 2T/2F. Advanced items moved to grade 4.
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The food-making factory of a plant consists of what?=leaves>stems+roots<seeds",
    "Which of these is the plant part that takes in the air and sunlight that a plant needs?=leaves>stems+roots<seeds",
    "Chlorophyll is the green pigment found in the ____ of a plant.=leaves>stems+roots<seeds",
    "The ____ grows upwards to make the plant taller and let it get more sunlight.=stem>root+leaf<fruit",
    "Which of the following is the reproductive part of a plant?=flower>root+leaf<fruit",
    "Which of the following is usually the most colorful part of a flower?=petal>sepal+stalk<pistil",
    "Bees and butterflies sip ____ from flowers.=nectar>pollen+sepals<petals",
    "A plant uses its roots to hold onto the ____.=ground>air+sunlight<cloud",
    "____ attach and hold the plant firmly in the ground.=roots>stems+leaves<seeds",
    "The ____ grow downwards into the soil to absorb water and hold the plant firmly to the ground.=roots>stems+leaves<seeds",
    "Which of these carries water to different parts of the leaf?=leaf vein>stoma+pollen<ovule",
    "Which of these gives leaves their green color and captures energy from the sun?=chlorophyll>glucose+oxygen<endosperm",
    "A leaf of the plant embryo inside a seed is called what?=cotyledon>seedling+seed coat<ovule",
    "What do you call the thin stalk that connects a leaf to the plant's stem?=petiole>cotyledon+ovule<bulb",
    "A ____ is a seed container that comes from an ovary and tissues that surround it.=fruit>flower+leaf<stem",
    "____ make seeds for the purpose of reproduction.=flowers>stems+leaves<seeds",
    "The tiny holes in a leaf or stem through which gases and water vapor pass are called ____.=stomata>ovules+bulbs<cells",
    "Which of these refers to the tough outer covering of the trunks of trees?=bark>branch+petiole<cuticle",

    // &#9472;&#9472;&#9472; Picture MCQ &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The part that a plant uses to reproduce is marked by which letter in the picture?=A>B+C<D**pc-pparts1.jpg",
    "The part that makes the plant upright and transports water and nutrients to its different parts is marked by which letter in the picture?=C>B+A<D**pc-pparts1.jpg",
    "The part that anchors a plant and obtains water and nutrients from the ground is marked by which letter in the picture?=D>B+C<A**pc-pparts1.jpg",
    "The part where photosynthesis takes place in a plant is marked by which letter in the picture?=B>A+C<D**pc-pparts1.jpg",
    "The leaf part marked as 'A' in the picture is called what?=tip>midrib+vein<petiole**pc-lparts2.jpg",
    "The leaf part marked as 'B' in the picture is called what?=lamina>vein+midrib<petiole**pc-lparts2.jpg",
    "The leaf part marked as 'C' in the picture is called what?=margin>vein+midrib<tip**pc-lparts2.jpg",
    "The leaf part marked as 'D' in the picture is called what?=vein>tip+midrip<margin**pc-lparts2.jpg",
    "The leaf part marked as 'E' in the picture is called what?=midrib>tip+vein<margin**pc-lparts2.jpg",
    "The leaf part marked as 'F' in the picture is called what?=petiole>vein+midrib<tip**pc-lparts2.jpg",

    // &#9472;&#9472;&#9472; T/F — balanced 2T/2F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "A small object produced by a plant from which a new plant can grow is called a 'seed'.=true>false",
    "A small object produced by a plant from which a new plant can grow is called a 'fruit'.=false>true",
    "The outer covering of a seed is called a 'seed coat'.=true>false",
    "The outer covering of a seed is called a 'seedling'.=false>true",

    );

} elseif ($grd == 4) {

    // Grade 4 — receives 6 advanced stem/root items from grade 3.
    // T/F balanced 6T/6F.
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "____ are the parts of a plant that are flat, typically green, and produce food for a plant.=leaves>stems+roots<seeds",
    "What do you call the part of a flowering plant that protects the seeds and acts as their vehicle?=fruit>flower+leaf<stem",
    "The vascular tissue that transports water from the roots to the rest of the plant is called what?=xylem>phloem+cambium<tap root",
    "The minute pores in the epidermis of a leaf or stem through which gases and water vapor pass are called ____.=stomata>ovules+bulbs<spores",
    "Which of these refers to the first leaf that sprouts from a seed?=cotyledon>seedling+seed coat<ovule",
    "The ____ is a protective layer covering the epidermis of leaves, young shoots, and other aerial plant organs.=cuticle>cotyledon+ovule<embryo",
    "What do you call the green chemical in plant cells that allows plants to use the sun's energy to make food?=chlorophyll>glucose+chloroplast<endosperm",
    "The tough outer covering of the stems of trees and other woody plants is called what?=bark>xylem+phloem<cambium",
    "Which of these may contain a plant embryo, a protective covering, and food supply for the embryo?=seed>flower+leaf<fruit",
    "Which of the following is the leaf part that helps in the drying of the leaf by making water drip faster from it?=tip>midrib+vein<petiole",
    "Which of the following is the leaf part that strengthens the leaf and keeps it in an upright position?=midrib>tip+vein<lamina",
    "Which of the following is the leaf part that transports water and nutrients to the rest of the leaf?=vein>tip+margin<petiole",
    "Which of the following is the leaf part that's primarily used in photosynthesis?=lamina>tip+margin<vein",
    "Which of the following is the leaf part that connects the leaf to the stem?=petiole>tip+margin<lamina",
    "The next layer immediately inside the bark of a tree is called what?=phloem>xylem+pith<cambium",
    "What do you call a plant's main, stout root that goes deep into the soil and from which smaller roots grow?=tap root>lateral root+fibrous root<storage root",
    "A dicot seed has two of this. What is it?=cotyledon>embryo+seed coat<bulb",
    "A monocotyledon seed has only one ____.=cotyledon>embryo+seed coat<bulb",
    "Which of these are used for the movement of oxygen and carbon dioxide into and out of the plant?=stomata>ovules+chloroplasts<spores",
    "Which of these is the equivalent of human sperm in plants?=pollen>nectar+ovule<spore",
    "Which of these refers to a leaf of a fern or cycad, which usually consists of many divisions or leaflets?=frond>palm+rhizome<tuber",
    "Which of these refers to a layer of wood produced by the growth of a woody plant in one year?=annual ring>tuber+rhizoid<pith",
    "What do you call the part of a plant cell where photosynthesis takes place?=chloroplast>stoma+chlorophyll<cell wall",

    // &#9472;&#9472;&#9472; Advanced stem/root items moved from grade 3 &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which of the following refers to plants whose stems are green with no woody parts?=herbaceous>undergound+aerial<aquatic",
    "Stems beneath the ground that can store food or survive harsh conditions are called ____ stems.=undergound>herbaceous+aerial<subaerial",
    "Stems that are erect and grow vertically above the ground are called ____ stems.=aerial>herbaceous+undergound<subaerial",
    "Stems that are weak and grow horizontally on the ground are called ____ stems.=subaerial>herbaceous+undergound<aerial",
    "Which of the following refers to a thick or stout root that grows downward and from which smaller roots come out?=taproot>fibrous root+lateral root<tertiary root",
    "Which of the following consists of a large number of thin roots growing in different directions?=fibrous root>taproot+lateral root<secondary root",

    // &#9472;&#9472;&#9472; Picture MCQ &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The developing part labelled as 'A' in the picture is called what?=bud>twig+petiole<seed**pc-pparts3.jpg",
    "The part labelled as 'B' in the picture is mainly used for ____.=reproduction>growth+photosynthesis<respiration**pc-pparts3.jpg",
    "The part mainly used for protecting and carrying seeds is labelled by which letter in the picture?=C>B+E<F**pc-pparts3.jpg",
    "The part labelled as 'D' in the picture is mainly used for ____.=photosynthesis>water absorption+reproduction<anchorage**pc-pparts3.jpg",
    "The part used for transporting water and nutrients from the roots to the leaves is labelled by which letter in the picture?=E>B+F<D**pc-pparts3.jpg",
    "The part mainly used for water and nutrient absorption and anchorage of the plant is labelled by which letter in the picture?=G>E+F<D**pc-pparts3.jpg",
    "The part that consists of an embryonic plant enclosed in a protective outer covering is labelled by which letter in the picture?=F>B+E<D**pc-pparts3.jpg",

    // &#9472;&#9472;&#9472; T/F — balanced 6T/6F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Photosynthesis happens in the leaves of a plant.=true>false",
    "The plant organ where photosynthesis happens is the stem.=false>true",
    "A plant that has no roots, stems, or leaves is called a 'simple plant'.=true>false",
    "A plant that has no roots, stems, or leaves is called an 'annual plant'.=false>true",
    "Leaves use air, sunlight, and water to make food for the plant.=true>false",
    "Leaves don't need air and sunlight to make food for the plant.=false>true",
    "The part of the root that provides protection to the root tip is called a 'root cap'.=true>false",
    "The part of the root that provides protection to the root tip is called a 'root hair'.=false>true",
    "Plants that have special tissues that carry water and food to their cells are called 'vascular' plants.=true>false",
    "Plants that have special tissues that carry water and food to their cells are called 'non-vascular' plants.=false>true",
    "An 'aerial root' is a root that grows down from a plant part that is above the ground.=true>false",
    "An 'aerial root' is a root that grows down from a plant part that is underground.=false>true",

    );

} elseif ($grd == 5) {

    // Grade 5 — T/F balanced 7T/7F.
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "After fertilization, the ____ develops into a seed containing the embryo.=ovule>nectar+pollen<spore",
    "A ____ is a reproductive cell produced by some plants that can develop into a new plant without combining with another reproductive cell.=spore>nectar+ovule<pollen",
    "A mango seed has two of this while a coconut seed has only one. What is it?=cotyledon>embryo+seed coat<radicle",
    "Which of the following pertains to a root that arises from any point other than the radicle or the root axis of the plant?=adventitious>primary+lateral<secondary",
    "Which of the following contains the male gametes that can fertilize the female ovule?=pollen>nectar+plumule<spore",
    "The vascular tissue that moves water from the roots to the rest of the plant is called ____.=xylem>phloem+pith<cambium",
    "The vascular tissue that moves food to the different parts of the plant is called what?=phloem>xylem+pith<cambium",
    "Which part of the cell is only found in plant cells?=cell wall>cell membrane+cytoplasm<nucleus",
    "Each of the short and thin filaments by which mosses and liverworts attach themselves to the material in which they grow is called what?=rhizoid>rhizome+cuticle<radicle",
    "What do you call the layer in most vascular plants that separates the xylem from the phloem?=cambium>bark+plumule<pith",
    "Which of these refers to a structure that covers the tip of a root and protects it from injury?=root cap>root hair+radicle<rootlet",

    // &#9472;&#9472;&#9472; Picture MCQ (asexual reproduction) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The plant part labelled as 'A' in the picture shown is called what?=crown>stolon or runner+adventitious root<daughter plant**pc-asexual1.jpg",
    "The plant part labelled as 'B' in the picture shown is called what?=stolon or runner>node+adventitious root<crown**pc-asexual1.jpg",
    "What's labelled as 'C' in the picture shown is called what?=daughter plant>stolon or runner+adventitious root<crown**pc-asexual1.jpg",
    "The plant part labelled as 'D' in the picture shown is called what?=node>stolon or runner+adventitious root<crown**pc-asexual1.jpg",
    "The plant part labelled as 'E' in the picture shown is called what?=adventitious root>stolon or runner+node<crown**pc-asexual1.jpg",
    "Which of the following is the plant part involved in the mode of asexual reproduction labelled as 'A' in the picture shown?=tuber>runner+rhizome<bulb**pc-asexual2.jpg",
    "Which of the following is the plant part involved in the mode of asexual reproduction labelled as 'B' in the picture shown?=leaf>corm+rhizome<bulb**pc-asexual2.jpg",
    "Which of the following is the plant part involved in the mode of asexual reproduction labelled as 'C' in the picture shown?=rhizome>corm+tuber<bulb**pc-asexual2.jpg",
    "Which of the following is the plant part involved in the mode of asexual reproduction labelled as 'D' in the picture shown?=runner>corm+rhizome<tuber**pc-asexual2.jpg",
    "Which of the following is the plant part involved in the mode of asexual reproduction labelled as 'E' in the picture shown?=bulb>corm+rhizome<tuber**pc-asexual2.jpg",
    "Which of the following is the plant part involved in the mode of asexual reproduction labelled as 'F' in the picture shown?=corm>tuber+rhizome<bulb**pc-asexual2.jpg",

    // &#9472;&#9472;&#9472; Picture MCQ (leaf parts / leaf shapes) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The leaf part that helps in the drying of the leaf by making water drip faster from it is marked by which letter in the picture?=A>E+D<F**pc-lparts2.jpg",
    "The leaf part that strengthens the leaf and keeps it in an upright position is marked by which letter in the picture?=E>B+D<F**pc-lparts2.jpg",
    "The leaf part that transports water and nutrients to the rest of the leaf is marked by which letter in the picture?=D>A+E<B**pc-lparts2.jpg",
    "The leaf part that's primarily used in photosynthesis is marked by which letter in the picture?=B>E+D<F**pc-lparts2.jpg",
    "The leaf part that connects the leaf to the stem is marked by which letter in the picture?=F>E+A<C**pc-lparts2.jpg",
    "Which letters mark the leaves that are best described as linear and ovate?=A and E>B and D+C and F<E and F**leaf-shapes.jpg",
    "Which letters mark the leaves that are best described as lanceolate and cordate?=B and F>A and D+C and E<E and F**leaf-shapes.jpg",
    "Which letters mark the leaves that are best described as oblong and elliptical?=C and D>A and D+B and C<E and F**leaf-shapes.jpg",

    // &#9472;&#9472;&#9472; T/F — balanced 7T/7F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The fruit is the ripened ovary of an angiosperm that usually contains the seeds.=true>false",
    "The ripened ovary of an angiosperm that usually contains the seeds is called a 'flower'.=false>true",
    "A petiole, also known as a leafstalk, connects a leaf to the plant's stem.=true>false",
    "A petiole is an underground stem that grows horizontally and helps the plant to spread.=false>true",
    "The waxy covering of leaves and other aerial plant organs is called 'cuticle'.=true>false",
    "Leaves and other aerial plant organs are protected by a waxy covering called 'stomata'.=false>true",
    "The chloroplast is an organelle in a plant's cell that contains chlorophyll.=true>false",
    "The chloroplast has nothing to do with chlorophyll.=false>true",
    "A form of asexual reproduction in which tissues from one plant are inserted into those of another is called 'grafting'.=true>false",
    "A form of asexual reproduction in which tissues from one plant are inserted into those of another is called 'budding'.=false>true",
    "In asexual reproduction of plants, the offsprings come from only one parent.=true>false",
    "Two parents are required for asexual reproduction of plants to take place.=false>true",
    "The term 'endosperm' refers to the tissue that surrounds an embryo of a seed and provides food for its growth.=true>false",
    "The term 'endosperm' refers to a seed plant that produces flowers.=false>true",

    );

} elseif ($grd == 6) {

    // Grade 6 — T/F balanced 4T/4F.
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The vascular tissue that moves sugar and other organic nutrients throughout the plant is called what?=phloem>xylem+pith<cambium",
    "The vascular tissue that transports water from the roots to the rest of the plant is called what?=xylem>phloem+pith<cambium",
    "A leaf in the embryo of a seed-bearing plant, one or more of which are the first leaves to appear from a germinating seed, is called what?=cotyledon>epicotyl+hypocotyl<radicle",
    "A small, usually single-celled reproductive cell capable of developing into a new plant without fusing with another reproductive cell is called what?=spore>stoma+ovule<pollen",
    "Which of these is a thick, underground stem with shoots and roots growing from it?=rhizome>tuber+bulb<rhizoid",
    "A large and stout plant root that grows downward from which other roots sprout horizontally is called what?=tap root>lateral root+fibrous root<storage root",
    "An enlarged, fleshy underground stem or root of a plant used for storing nutrients that is not a corm is called what?=tuber>rhizome+rhizoid<tap root",
    "A rounded underground stem that is used for food storage and looks like a bulb but is uniform and solid inside is called what?=corm>tuber+rhizoid<rhizome",
    "The parts labelled as 'A' in this cross-section of a tree trunk are collectively called what?=xylem>phloem+bark<cambium**pc-pparts4.jpg",
    "The part labelled as 'B' in this cross-section of a tree trunk is called what?=cambium>phloem+bark<xylem**pc-pparts4.jpg",
    "The part labelled as 'C' in this cross-section of a tree trunk is called what?=phloem>cambium+bark<xylem**pc-pparts4.jpg",
    "The part labelled as 'D' in this cross-section of a tree trunk is called what?=bark>cambium+phloem<xylem**pc-pparts4.jpg",
    "Which of the following refers to the outer leaf tissue that secretes a waxy coating called the cuticle that helps the plant retain water?=epidermis>mesophyll+vascular<chlorophyll",
    "Which of the following refers to the leaf tissue that's primarily used in photosynthesis?=mesophyll>epidermis+vascular<chlorophyll",
    "Which of the following refers to the leaf tissue that makes up the leaf veins?=vascular>epidermis+mesophyll<chlorophyll",
    "The part of an embryo that develops into the shoot that bears the first true leaves of a plant is called what?=plumule>radicle+hypocotyl<ovule",
    "A waxy, waterproof layer on the epidermis of leaves that helps a plant minimize its loss of water is called what?=cuticle>radicle+rhizoid<plumule",
    "Which of these is the plant tissue from which phloem and xylem grow by cell division?=cambium>bark+plumule<pith",
    "The ____ of a plant embryo develops into the primary root.=radicle>hypocotyl+epicotyl<plumule",
    "The ____ a plant embryo is beneath the seed leaves and directly above the root.=hypocotyl>radicle+epicotyl<plumule",
    "The ____ is the stem of a plant embryo that's located between the cotyledons and the first true leaves.=epicotyl>hypocotyl+radicle<plumule",

    // &#9472;&#9472;&#9472; T/F — balanced 4T/4F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Plant cells have cell walls, which are not present in animal cells.=true>false",
    "Animal cells have cell walls, which are not present in plant cells.=false>true",
    "The main constituent of plant cell walls which gives them their structure is called 'cellulose'.=true>false",
    "The main constituent of plant cell walls which gives them their structure is called 'cell membrane'.=false>true",
    "The thin, rootlike filaments that allow mosses to attach themselves to things are called 'rhizoids'.=true>false",
    "The thin, rootlike filaments that allow mosses to attach themselves to things are called 'rhizomes'.=false>true",
    "A plant stem that grows horizontally under the ground and often sends out roots and shoots is called a 'rhizome'.=true>false",
    "A plant stem that grows horizontally under the ground and often sends out roots and shoots is called a 'rhizoid'.=false>true",

    );

} else { // grd >= 7

    // Grade 7+ — 25 questions total. T/F balanced 1T/1F.
    // New MCQ: guard cells, phototropism, gravitropism, monocot leaf veins,
    // seed dispersal, ethylene, angiosperm/gymnosperm.
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ — plant anatomy & tissue &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which of these refers to an underground stem that grows horizontally and helps the plant to spread?=rhizome>tuber+rhizoid<corm",
    "In seed plants, a structure called the ____ contains the female gametophyte.=ovule>nectar+pollen<spore",
    "What do you call the vascular tissue that carries water upward from the roots to every part of the plant?=xylem>phloem+pith<cambium",
    "The waxy, waterproof layer on the epidermis of leaves and other aerial organs that helps a plant minimize its loss of water is called what?=cuticle>radicle+rhizoid<plumule",
    "What do you call the cellular plant tissue from which phloem, xylem, or cork grows by cell division?=cambium>bark+plumule<pith",
    "The part of a plant embryo that develops into a primary root is called what?=radicle>hypocotyl+epicotyl<plumule",
    "The part of a plant embryo that is beneath the seed leaves and directly above the root is called what?=hypocotyl>radicle+epicotyl<plumule",
    "Which of these is the stem of a plant embryo that's located between the cotyledons and the first true leaves?=epicotyl>hypocotyl+radicle<plumule",
    "Which of these is the part of an embryo that contains the epicotyl and the first true leaves of a plant?=plumule>hypocotyl+cotyledon<radicle",
    "Any of the long, soft, and fine hairs covering certain parts of certain plants is known as what?=villus>plumule+achene<rhizoid",
    "A small, dry, single-seeded fruit that does not split open to release the seed is called what?=achene>spore+pith<kernel",
    "Which of these refers to the main constituent of plant cell walls which gives them their structure?=cellulose>cambium+cytoplasm<vacuole",
    "Which of these is the plant hormone that regulates plant growth processes and is responsible for cell elongation?=auxin>insulin+adrenalin<progesterone",

    // &#9472;&#9472;&#9472; MCQ — plant physiology & taxonomy (new, +7) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What do you call the pair of specialized epidermal cells that surround each stoma and control its opening and closing?=guard cells>companion cells+tracheid cells<epidermal hairs",
    "What do you call a plant's growth response toward or away from light?=phototropism>gravitropism+thigmotropism<hydrotropism",
    "What do you call a plant's growth response to gravity, such as roots growing downward?=gravitropism>phototropism+hydrotropism<thigmotropism",
    "Which leaf vein pattern is typical of monocot plants?=parallel>netted+branching<palmate",
    "What is the term for the movement or transport of seeds away from the parent plant?=seed dispersal>germination+pollination<photosynthesis",
    "Which plant hormone is primarily responsible for the ripening of fruit?=ethylene>auxin+cytokinin<gibberellin",
    "Which of the following distinguishes angiosperms from gymnosperms?=seeds enclosed in fruit>seeds not enclosed+naked seeds<vascular tissue",

    // &#9472;&#9472;&#9472; Picture MCQ — tree cross-section &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The vascular tissue mainly used for carrying water from the roots to the upper parts of a plant is labelled with which letter in the picture?=A>B+C<D**pc-pparts4.jpg",
    "The plant tissue from which phloem and xylem grow by cell division is labelled with which letter in the picture?=B>A+C<D**pc-pparts4.jpg",
    "The vascular tissue mainly used by a plant for transporting glucose and nutrients to its different parts is labelled with which letter in the picture?=C>B+A<D**pc-pparts4.jpg",

    // &#9472;&#9472;&#9472; T/F — balanced 1T/1F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "A structure that covers the tip of a root and protects it from injury is called a 'root cap'.=true>false",
    "A large and stout plant root that grows downward from which other roots sprout horizontally is called a 'lateral root'.=false>true",

    );
}
?>

</head>

</body>

</html>