<html>

<head>
<body>

<?php
$_SESSION['title']="Flowers and their Parts";

if ($grd <= 1) {

    // Kinder / Grade 1 — merged Easy + Medium
    $questions=array(

    // &#9472;&#9472;&#9472; Plant/flower basics &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What is the plant part in the picture?=flower>fruit+stem<leaf**pc-flower1.jpg",
    "What is the plant part in the picture?=flower>fruit+stem<leaf**pc-flower2.jpg",
    "Which plant part makes seeds?=flower>fruit+stem<leaf",
    "Fruits come from the ____ of the plant.=flowers>seeds+leaves<roots",
    "The ____ of a flower are usually its most colorful parts.=petals>sepals+pollen<nectar",
    "What do you call the sweet juice that insects sip from flowers?=nectar>sepals+pollen<petals",

    // &#9472;&#9472;&#9472; Flower parts — arrow identification (pc-flower-parts1) &#9472;
    "The orange arrow is pointing to a ____.=petal>sepal+stalk<leaf**pc-flower-parts1.jpg",
    "The blue arrow is pointing to a ____.=sepal>petal+stalk<leaf**pc-flower-parts1.jpg",
    "The red arrow is pointing to a ____.=leaf>sepal+stalk<petal**pc-flower-parts1.jpg",
    "The black arrow is pointing to a ____.=stalk>sepal+petal<leaf**pc-flower-parts1.jpg",
    "The purple arrow is pointing to a ____.=sepal>petal+stalk<leaf**pc-flower-parts1.jpg",
    "The green arrow is pointing to a ____.=petal>sepal+stalk<leaf**pc-flower-parts1.jpg",

    // &#9472;&#9472;&#9472; Arrow identification (pc-flower-parts2) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The blue arrow is pointing to a ____.=petal>sepal+stalk<leaf**pc-flower-parts2.jpg",
    "The black arrow is pointing to a ____.=sepal>petal+stalk<leaf**pc-flower-parts2.jpg",
    "The red arrow is pointing to a ____.=stalk>sepal+bud<petal**pc-flower-parts2.jpg",
    "The purple arrow is pointing to a ____.=bud>leaf+stalk<stem**pc-flower-parts2.jpg",

    // &#9472;&#9472;&#9472; Arrow identification (pc-flower-parts3) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The red arrow is pointing to a ____.=stalk>sepal+petal<leaf**pc-flower-parts3.jpg",
    "The black arrow is pointing to a ____.=sepal>petal+stalk<leaf**pc-flower-parts3.jpg",

    // &#9472;&#9472;&#9472; Arrow identification (pc-flower-parts13) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The blue arrow is pointing to a ____.=petal>sepal+stalk<leaf**pc-flower-parts13.jpg",

    // &#9472;&#9472;&#9472; Arrow identification (pc-flower-parts4) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The blue arrow is pointing to a ____.=petal>sepal+stalk<stamen**pc-flower-parts4.jpg",
    "The black arrow is pointing to a ____.=sepal>petal+stalk<pistil**pc-flower-parts4.jpg",
    "The red arrow is pointing to a ____.=stalk>sepal+stamen<petal**pc-flower-parts4.jpg",
    "What is the color of the arrow pointing to the place where pollen sticks?=purple>red+black<blue**pc-flower-parts4.jpg",

    // &#9472;&#9472;&#9472; Arrow identification (pc-flower-parts5) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The red arrow is pointing to a ____.=petal>sepal+stalk<leaf**pc-flower-parts5.jpg",
    "The black arrow is pointing to a ____.=stalk>sepal+petal<leaf**pc-flower-parts5.jpg",
    "The blue arrow is pointing to a ____.=sepal>petal+stalk<leaf**pc-flower-parts5.jpg",
    "What is the color of the arrow pointing to the place where insects sip nectar?=green>red+black<blue**pc-flower-parts5.jpg",

    // &#9472;&#9472;&#9472; T/F — balanced 6T/5F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Not all plants have flowers.=true>false",
    "All flowers become fruits.=false>true",
    "Some roses are not red.=true>false",
    "Fruits come from roots.=false>true",
    "Flowers have different shapes and colors.=true>false",
    "The arrow in the picture is pointing to a petal.=true>false**pc-petal1.jpg",
    "The purple parts of this flower are called 'sepals'.=false>true**pc-flower3.jpg",
    "The petals are the most colorful parts of a flower.=true>false",
    "The seeds are made by the leaves of the plant.=false>true",
    "The flat, red parts of a rose are called sepals.=false>true",
    "What bees and butterflies sip from flowers is called nectar.=true>false",

    );

} elseif ($grd == 2) {

    // Grade 2 — merged Easy + Medium
    $questions=array(

    // &#9472;&#9472;&#9472; Flower anatomy &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which part of a plant has male and female organs?=flower>fruit+stem<leaf",
    "The fruits that we eat come from ____.=flowers>leaves+stems<roots",
    "What do you call the colorful, pretty parts of a flower?=petals>sepals+pistil<stamen",
    "Sepals are used by flowers for ____.=protection>reproduction+making food<breathing",
    "Insects like bees and butterflies feed on the sweet ____ of flowers.=nectar>pollen+pistil<stamen",
    "What do you call the yellow powder in flowers that helps make new plants?=pollen>nectar+pistil<ovary",

    // &#9472;&#9472;&#9472; Male/female parts &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "All of the following are female flower parts except which one?=stamen>pistil+ovary<stigma",
    "All of the following are male flower parts except which one?=pistil>stamen+anther<filament",

    // &#9472;&#9472;&#9472; Flower identification &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What is the name of the flower in the picture?=sampaguita>rose+gumamela<daisy**pc-flower8.jpg",
    "What is the name of the flower in the picture?=rose>gumamela+sunflower<daisy**pc-flower9.jpg",
    "Name the flower shown in the picture.=sunflower>rose+tulip<daisy**pc-flowera.jpg",
    "Name the flower shown in the picture.=gumamela>tulip+sunflower<daisy**pc-flower6.jpg",

    // &#9472;&#9472;&#9472; Arrow identification (pc-flower-parts6) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The blue arrow is pointing to a ____.=petal>sepal+stalk<stamen**pc-flower-parts6.jpg",
    "The orange arrow is pointing to a ____.=sepal>petal+stalk<pistil**pc-flower-parts6.jpg",
    "The red arrow is pointing to which of these?=pedicel>sepal+stamen<receptacle**pc-flower-parts6.jpg",
    "The purple arrow is pointing to which of these?=receptacle>sepal+stamen<pedicel**pc-flower-parts6.jpg",
    "The black arrow is pointing to which of these?=pistil>pedicel+stamen<anther**pc-flower-parts6.jpg",
    "The green arrow is pointing to which of these?=stamen>pedicel+pistil<stigma**pc-flower-parts6.jpg",

    // &#9472;&#9472;&#9472; T/F — balanced 8T/7F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Not all plants produce flowers.=true>false",
    "All roses have red petals.=false>true",
    "All fruits come from flowers, but not all flowers become fruits.=true>false",
    "The flower in the picture is a daisy.=true>false**pc-flowerf.jpg",
    "The flower in the picture is called 'gumamela'.=false>true**pc-flower7.jpg",
    "The plant part that has male and female organs is the stem.=false>true",
    "The pollen is the yellowish powder in flowers that causes seeds to form.=true>false",
    "Egg cells are formed in the pistil.=true>false",
    "The stamen is the female part of a flower.=false>true",
    "The pistil is the female part of a flower.=true>false",
    "The colorful, pretty parts of a flower are called 'petals'.=true>false",
    "Pollen sticks to the stamen of the flower.=false>true",
    "Pollen is produced in the stamen of the flower.=true>false",
    "Mango and banana trees produce fruits, so they are flowering plants.=true>false",
    "Apple and orange trees are not flowering plants.=false>true",

    );

} elseif ($grd == 3) {

    // Grade 3 — merged Easy + Medium
    $questions=array(

    // &#9472;&#9472;&#9472; Flower basics &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What do you call the reproductive part of a plant, usually with colorful parts?=flower>fruit+stem<leaf",
    "____ make seeds for the purpose of reproduction.=flowers>leaves+stems<roots",
    "What do you call the sweet liquid produced by flowers that attracts insects and other animals?=nectar>pollen+sepal<pistil",
    "Which of these is the yellow powder that flowers use to make seeds?=pollen>nectar+pistil<stamen",
    "A flower's corolla is made up of its colorful ____.=petals>sepals+pistil<stamen",
    "What do you call the male part of a flower?=stamen>sepal+petal<pistil",
    "What do you call the female part of a flower?=pistil>sepal+petal<stamen",

    // &#9472;&#9472;&#9472; Flower identification &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What is the name of the flower in the picture?=daisy>rose+tulip<sunflower**pc-flowerf.jpg",
    "Name the flower shown in the picture.=ilang-ilang>sampaguita+tulip<daisy**pc-flower7.jpg",
    "Name the flower shown in the picture.=poinsettia>gumamela+tulip<daisy**pc-flowerb.jpg",

    // &#9472;&#9472;&#9472; Flowering vs. non-flowering (pc-fnonf1) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The plant marked as 'A' in the picture is called ____ and it is ____.=rose, flowering>rose, non-flowering+gumamela, flowering<gumamela, non-flowering**pc-fnonf1.jpg",
    "The plant marked as 'B' in the picture is called ____ and it is ____.=gumamela, flowering>rose, non-flowering+rose, flowering<gumamela, non-flowering**pc-fnonf1.jpg",
    "The plant marked as 'C' in the picture is called ____ and it is ____.=sampaguita, flowering>sampaguita, non-flowering+daisy, flowering<daisy, non-flowering**pc-fnonf1.jpg",
    "The plant marked as 'D' in the picture is called ____ and it is ____.=daisy, flowering>sampaguita, non-flowering+sampaguita, flowering<daisy, non-flowering**pc-fnonf1.jpg",
    "The plant marked as 'E' in the picture is called ____ and it is ____.=mango, flowering>mango, non-flowering+banana, flowering<banana, non-flowering**pc-fnonf1.jpg",
    "The plant marked as 'F' in the picture is called ____ and it is ____.=banana, flowering>mango, non-flowering+mango, flowering<banana, non-flowering**pc-fnonf1.jpg",

    // &#9472;&#9472;&#9472; Arrow identification (pc-flower-parts7) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The green arrow is pointing to which part of the flower?=petal>sepal+calyx<pedicel**pc-flower-parts7.jpg",
    "The pink arrow is pointing to which part of the flower?=sepal>petal+receptacle<pistil**pc-flower-parts7.jpg",
    "The red arrow is pointing to which part of the flower?=receptacle>pedicel+sepal<ovary**pc-flower-parts7.jpg",
    "The orange arrow is pointing to which part of the flower?=pedicel>receptacle+filament<ovary**pc-flower-parts7.jpg",
    "The black arrow is pointing to which part of the flower?=ovary>style+stigma<anther**pc-flower-parts7.jpg",
    "The blue arrow is pointing to which part of the flower?=style>filament+stigma<anther**pc-flower-parts7.jpg",
    "The purple arrow is pointing to which part of the flower?=stigma>filament+style<anther**pc-flower-parts7.jpg",
    "The brown arrow is pointing to which part of the flower?=anther>filament+style<stigma**pc-flower-parts7.jpg",
    "The gray arrow is pointing to which part of the flower?=filament>anther+style<stigma**pc-flower-parts7.jpg",

    // &#9472;&#9472;&#9472; Flowering vs. non-flowering (pc-fnonf2) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The plant marked as 'A' in the picture is called ____ and it is ____.=papaya, flowering>papaya, non-flowering+coconut, flowering<coconut, non-flowering**pc-fnonf2.jpg",
    "The plant marked as 'B' in the picture is called ____ and it is ____.=coconut, flowering>papaya, non-flowering+papaya, flowering<coconut, non-flowering**pc-fnonf2.jpg",
    "The plant marked as 'C' in the picture is called ____ and it is ____.=guava, flowering>guava, non-flowering+santol, flowering<santol, non-flowering**pc-fnonf2.jpg",
    "The plant marked as 'D' in the picture is called ____ and it is ____.=santol, flowering>guava, non-flowering+guava, flowering<santol, non-flowering**pc-fnonf2.jpg",
    "The plant marked as 'E' in the picture is called ____ and it is ____.=fern, non-flowering>fern, flowering+moss, flowering<moss, non-flowering**pc-fnonf2.jpg",
    "The plant marked as 'F' in the picture is called ____ and it is ____.=moss, non-flowering>fern, flowering+moss, flowering<fern, non-flowering**pc-fnonf2.jpg",

    // &#9472;&#9472;&#9472; Arrow grouping (pc-flower-parts7) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The purple, blue, and black arrows are pointing to parts that make up which organ?=pistil>stamen+anther<filament**pc-flower-parts7.jpg",
    "The brown and gray arrows are pointing to parts that make up which organ?=stamen>pistil+style<stigma**pc-flower-parts7.jpg",

    // &#9472;&#9472;&#9472; T/F — balanced 7T/6F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "All trees that produce fruits also bear flowers.=true>false",
    "All flowers smell good.=false>true",
    "The flower in the picture above is a sampaguita.=true>false**pc-flower8.jpg",
    "The flower in the picture above is a rose.=true>false**pc-flower9.jpg",
    "The flower in the picture above is an aster.=false>true**pc-flower6.jpg",
    "The plant part that has the male and female reproductive organs is the fruit.=false>true",
    "The reproductive part of a plant is the flower.=true>false",
    "The most colorful features of a flower are the petals.=true>false",
    "Sepals attract insects to the flower and protect the stamen and the pistil.=false>true",
    "The female reproductive part of a flower is the pistil.=true>false",
    "The male reproductive part of a flower is the pistil.=false>true",
    "It is the stamen that contains the ovary of a flower.=false>true",
    "Flowers make seeds for the main purpose of reproduction.=true>false",

    );

} elseif ($grd == 4) {

    // Grade 4 — merged Easy + Medium
    $questions=array(

    // &#9472;&#9472;&#9472; Flower anatomy &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What do you call the yellowish powder in flowers that causes seeds to form?=pollen>nectar+pistil<stamen",
    "The male reproductive organ of a plant is called what?=stamen>sepal+petal<pistil",
    "The ____ contains the anther and the filament.=stamen>sepal+petal<pistil",
    "The female reproductive organ of a plant is called what?=pistil>sepal+petal<stamen",
    "The ____ of a flower contains the ovary, style, and stigma.=pistil>sepal+petal<stamen",
    "Together, all the petals form the ____.=corolla>calyx+pistil<anther",
    "Pollen is produced in the ____ of the stamen.=anther>filament+style<stigma",
    "The ____ is the tip of the pistil of a flower where pollen grains land and stick.=stigma>style+anther<ovary",
    "What do you call the long thin stem of the stamen that holds the anther?=filament>anther+style<stigma",
    "The ____ of a flower's pistil contains one or more ovules that develop into seeds after being fertilized.=ovary>receptacle+style<stigma",
    "Which pair of organs are found in the pistil of a flower?=style and stigma>style and anther+stigma and filament<ovary and anther",
    "Which pair of organs are found in the stamen of a flower?=anther and filament>anther and style+filament and stigma<filament and style",

    // &#9472;&#9472;&#9472; Flower identification &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What is the name of the flower in the picture above?=daffodil>daisy+tulip<sunflower**pc-flowerd.jpg",
    "What is the name of the flower in the picture above?=anthurium>lilac+tulip<aster**pc-flowerc.jpg",
    "Name the flower shown in the picture above.=cosmos>marigold+tulip<lotus**pc-flower4.jpg",

    // &#9472;&#9472;&#9472; Arrow identification (pc-flower-parts8) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The green arrow is pointing to which part of the flower?=petal>sepal+calyx<pedicel**pc-flower-parts8.jpg",
    "The pink arrow is pointing to which part of the flower?=sepal>petal+receptacle<pistil**pc-flower-parts8.jpg",
    "The red arrow is pointing to which part of the flower?=receptacle>pedicel+sepal<ovary**pc-flower-parts8.jpg",
    "The orange arrow is pointing to which part of the flower?=pedicel>receptacle+filament<ovary**pc-flower-parts8.jpg",
    "The black arrow is pointing to which part of the flower?=ovary>style+stigma<anther**pc-flower-parts8.jpg",
    "The blue arrow is pointing to which part of the flower?=style>filament+stigma<anther**pc-flower-parts8.jpg",
    "The purple arrow is pointing to which part of the flower?=stigma>filament+style<anther**pc-flower-parts8.jpg",
    "The brown arrow is pointing to which part of the flower?=anther>filament+style<stigma**pc-flower-parts8.jpg",
    "The gray arrow is pointing to which part of the flower?=filament>anther+style<stigma**pc-flower-parts8.jpg",

    // &#9472;&#9472;&#9472; Arrow grouping (pc-flower-parts8) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The purple, blue, and black arrows are pointing to parts that make up which organ?=pistil>stamen+anther<filament**pc-flower-parts8.jpg",
    "The brown and gray arrows are pointing to parts that make up which organ?=stamen>pistil+style<stigma**pc-flower-parts8.jpg",

    // &#9472;&#9472;&#9472; T/F — balanced 8T/9F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The flower shown in the picture above is a poinsettia.=true>false**pc-flowerb.jpg",
    "The flower shown in the picture above is a daffodil.=false>true**pc-flower5.jpg",
    "The flower shown in the picture above is a chrysanthemum.=true>false**pc-flowere.jpg",
    "The male reproductive part of a flower is called a 'pistil'.=false>true",
    "The female reproductive part of a flower is called a 'pistil'.=true>false",
    "The part of a pistil that receives pollen is called an 'anther'.=false>true",
    "The filament is a thin stalk that holds the anther.=true>false",
    "The part of the stamen that contains the pollen is called an 'anther'.=true>false",
    "The pistil contains the filament and the anther.=false>true",
    "The leaf-like structure that encloses and protects a flower bud is called a 'sepal'.=true>false",
    "The stamen contains the ovary, style, and stigma.=false>true",
    "The common name for a flower's colorful corolla is 'sepals'.=false>true",
    "The yellow, pouch-like part of the stamen that holds pollen grains is called a 'style'.=false>true",
    "Pollen is trapped in the stigma of the pistil.=true>false",
    "Pollen is produced in the stigma of the pistil.=false>true",
    "The appearance of the petals aims to attract pollinating insects to the flower.=true>false",
    "The largest and most visible part of a flower is usually the sepal.=false>true",

    );

} elseif ($grd == 5) {

    // Grade 5 — merged Easy + Medium
    $questions=array(

    // &#9472;&#9472;&#9472; Flower anatomy &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The individual components of a ____ are the sepals.=calyx>corolla+filament<style",
    "Which of these attracts insects to the flower and protects the internal parts of the flower?=corolla>calyx+pistil<anther",
    "The ____, which contains the ovary, the style, and the stigma, is the female reproductive organ of a plant.=pistil>anther+filament<stamen",
    "Which of these consists of an anther and a filament?=stamen>pistil+style<stigma",
    "The stamen's anther is supported by a long, fine stalk called the ____.=filament>style+stigma<pistil",
    "What do you call the part of a flower's stamen that produces and contains pollen grains?=anther>filament+style<stigma",
    "What do you call the part at the upper end of the style where pollination occurs?=stigma>anther+filament<ovary",
    "Which of these consists of the corolla and the calyx of a flower?=perianth>pedicel+receptacle<inflorescence",
    "The part of the flower that contains the ovules which can develop into seeds after fertilization is the ____.=ovary>anther+style<stigma",
    "The plant structure that develops into a seed after fertilization is called what?=ovule>pollen+spore<ovary",
    "Which of the following is an arrangement of flower-bearing stalks on a branch of a plant?=inflorescence>peduncle+pedicel<receptacle",
    "The female reproductive unit of a flower, typically consisting of a stigma, style, and ovary, is called what?=carpel>anther+receptacle<pedicel",
    "All of the following contain the ovules except which one?=stamen>pistil+carpel<ovary",

    // &#9472;&#9472;&#9472; Flower identification &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What is the name of the flower in the picture above?=aster>marigold+tulip<lotus**pc-flower3.jpg",
    "What is the name of the flower in the picture above?=calla lily>marigold+lilac<aster**pc-flower5.jpg",
    "Name the flower shown in the picture above.=chrysanthemum>marigold+lilac<lotus**pc-flowere.jpg",

    // &#9472;&#9472;&#9472; Arrow identification (pc-flower-parts9) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The green arrow is pointing to which part of the flower?=petal>sepal+calyx<pedicel**pc-flower-parts9.jpg",
    "The pink arrow is pointing to which part of the flower?=sepal>petal+receptacle<pistil**pc-flower-parts9.jpg",
    "The red arrow is pointing to which part of the flower?=receptacle>pedicel+sepal<ovary**pc-flower-parts9.jpg",
    "The orange arrow is pointing to which part of the flower?=pedicel>receptacle+filament<ovary**pc-flower-parts9.jpg",
    "The black arrow is pointing to which part of the flower?=ovary>style+stigma<anther**pc-flower-parts9.jpg",
    "The blue arrow is pointing to which part of the flower?=style>filament+stigma<anther**pc-flower-parts9.jpg",
    "The purple arrow is pointing to which part of the flower?=stigma>filament+style<anther**pc-flower-parts9.jpg",
    "The brown arrow is pointing to which part of the flower?=anther>filament+style<stigma**pc-flower-parts9.jpg",
    "The gray arrow is pointing to which part of the flower?=filament>anther+style<stigma**pc-flower-parts9.jpg",

    // &#9472;&#9472;&#9472; T/F — balanced 10T/8F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "All angiosperms bear flowers.=true>false",
    "Flowering plants are called 'gymnosperms'.=false>true",
    "The flower shown in the picture above is a daisy.=true>false**pc-flowerf.jpg",
    "The flower shown in the picture above is a daisy.=false>true**pc-flowera.jpg",
    "The pistil, which contains the ovary, the style, and the stigma, is the flower's female reproductive organ.=true>false",
    "The stamen, which contains the filament and the anther, is the flower's male reproductive organ.=true>false",
    "The male reproductive organ of a flower is called a 'pistil'.=false>true",
    "Each of the brightly colored outer parts of the flower is called a 'sepal'.=false>true",
    "The sepal is a leaf-like structure that encloses and protects a flower bud.=true>false",
    "It is the pistil that contains the anther and the filament.=false>true",
    "A filament is the long thin stem of a stamen of a flower that holds the anther.=true>false",
    "The thickened part of the stem from which the flower organs grow is called the 'receptacle'.=true>false",
    "Carpels are found in the stamen.=false>true",
    "The term 'stamen' refers to the reproductive organ that contains the style and the stigma.=false>true",
    "The term 'pistil' refers to the reproductive organ that contains the style and the stigma.=true>false",
    "The stigma is the sticky tip of a flower's pistil that traps pollen grains.=true>false",
    "The style is the long, slender stalk that connects the stigma and the ovary.=true>false",
    "The anther is the sticky tip of a flower's pistil that traps pollen grains.=false>true",

    );

} else { // grd >= 6

    // Grade 6+ — merged Easy + Medium
    $questions=array(

    // &#9472;&#9472;&#9472; Flower anatomy — advanced terminology &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The part of the stamen of a flower that produces pollen grains is called what?=anther>filament+style<stigma",
    "Which of these consists of leaf-like structures that enclose and protect a flower bud?=calyx>corolla+filament<style",
    "The brightly colored outer parts of the flower that attract pollinators comprise the ____.=corolla>calyx+pistil<anther",
    "Which of the following refers to the arrangement of a cluster of flowers on a floral axis?=inflorescence>perianth+pedicel<receptacle",
    "Which of the following refers to the base of a flower's pistil which contains the ovules that develop into seeds upon fertilization?=ovary>anther+style<stigma",
    "Which of these refers to the reproductive structure that develops into a seed after fertilization?=ovule>pollen+spore<ovary",
    "The part of the flower stalk that directly attaches the flower to the plant's stem is called what?=pedicel>perianth+carpel<receptacle",
    "Together, the corolla and the calyx of a flower form what is known as the ____.=perianth>pedicel+receptacle<carpel",
    "Which of the following refers to the female organ of the flower, which contains the ovary, style, and stigma?=pistil>anther+filament<stamen",
    "Which of the following refers to the yellowish powder from the male part of a flower that's used for plant reproduction?=pollen>nectar+spores<anther",
    "The thickened tip of a flower stalk that bears the floral organs is called what?=receptacle>perianth+carpel<pedicel",
    "Which of the following refers to the male organ of the flower consisting of an anther and a filament?=stamen>pistil+style<stigma",
    "Which of these refers to the sticky tip of a flower's pistil that traps pollen grains?=stigma>anther+filament<ovary",
    "What do you call the stem-like part of a flower's pistil that connects the stigma to the ovary?=style>carpel+anther<filament",
    "Which of the following is a female reproductive unit of a flower that typically consists of a stigma, style, and ovary?=carpel>anther+receptacle<filament",
    "Which of the following refers to a stalk that supports an entire inflorescence?=peduncle>receptacle+pedicel<perianth",
    "A small stalk bearing a single flower within an inflorescence is called what?=pedicel>perianth+carpel<receptacle",
    "The non-reproductive part of the flower consisting of the corolla and the calyx is known as what?=perianth>pedicel+carpel<inflorescence",
    "Which of the following contains the female gamete that develops into a plant embryo after being fertilized?=ovule>pollen+spore<ovary",

    // &#9472;&#9472;&#9472; Arrow identification (pc-flower-partsa) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The blue arrow in the picture is pointing to which part of the flower?=pedicel>receptacle+perianth<peduncle**pc-flower-partsa.jpg",
    "The red arrow in the picture is pointing to which part of the flower?=peduncle>receptacle+perianth<pedicel**pc-flower-partsa.jpg",

    // &#9472;&#9472;&#9472; Arrow identification (pc-flower-partsb) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The green arrow in the picture is pointing to which part of the flower?=petal>sepal+calyx<pedicel**pc-flower-partsb.jpg",
    "The brown arrow in the picture is pointing to which part of the flower?=anther>filament+style<stigma**pc-flower-partsb.jpg",
    "The gray arrow in the picture is pointing to which part of the flower?=filament>anther+style<stigma**pc-flower-partsb.jpg",
    "The orange arrow in the picture is pointing to which part of the flower?=sepal>petal+receptacle<pistil**pc-flower-partsb.jpg",
    "The purple arrow in the picture is pointing to which part of the flower?=stigma>filament+style<anther**pc-flower-partsb.jpg",
    "The blue arrow in the picture is pointing to which part of the flower?=style>filament+stigma<anther**pc-flower-partsb.jpg",
    "The red arrow in the picture is pointing to which part of the flower?=bract>perianth+sepal<receptacle**pc-flower-partsb.jpg",
    "The black arrow in the picture is pointing to which part of the flower?=ovary>style+stigma<anther**pc-flower-partsb.jpg",
    "What is the color of the arrow pointing to the ovules?=pink>brown+yellow<black**pc-flower-partsb.jpg",
    "What is the color of the arrow pointing to some pollen?=yellow>brown+pink<black**pc-flower-partsb.jpg",

    // &#9472;&#9472;&#9472; T/F — balanced 11T/12F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "A pistil may have one or more carpels.=true>false",
    "All pistils have only one carpel.=false>true",
    "The pollen-containing anther of the flower is found in its stamen.=true>false",
    "The anther is the base of a flower's pistil which contains the ovules that develop into seeds.=false>true",
    "The female organ of the flower consisting of one or more carpels is called a 'stamen'.=false>true",
    "A carpel, which is in the pistil, contains the ovary, style, and stigma.=true>false",
    "The style is the tip of the pistil where pollen grains land and stick.=false>true",
    "The sticky tip of a flower's pistil that traps pollen grains is called the 'anther'.=false>true",
    "The ovary is the base of a flower's pistil which contains the ovules that develop into seeds upon fertilization.=true>false",
    "The part of the flower that contains the ovules which can develop into seeds is the anther.=false>true",
    "The top part of the stamen that produces and contains the pollen grains is called the 'anther'.=true>false",
    "The organ of the flower that consists of an anther and a filament is called a 'stamen'.=true>false",
    "The yellowish powder of microscopic grains from the male part of a flower that's used for plant reproduction is called 'pollen'.=true>false",
    "The expanded tip of a flower stalk that bears the floral organs is called the 'corm'.=false>true",
    "The outermost whorl of a flower, consisting of sepals and usually green in color, is called a 'corolla'.=false>true",
    "The female reproductive part of the flower consisting of one or more carpels is called a 'pistil'.=true>false",
    "It is the male reproductive organ of the flower that consists of an anther and a filament.=true>false",
    "It is the stigma that produces the yellowish microscopic grains that are used for plant reproduction.=false>true",
    "Ovules, from which the female gametophytes are produced, are found in the anther.=false>true",
    "A plant that dies after flowering and setting seeds once is described as monocarpic.=true>false",
    "If a fruit is produced without ovule fertilization, then it may be described as ascocarpic.=false>true",
    "The apical part of the flower's pistil on which pollen grains land and germinate is called an anther.=false>true",
    "Markings or patterns seen in flowers of some angiosperm species that guide pollinators to the center of the flower are called nectar guides.=true>false",

    );
}
?>

</head>

</body>

</html>