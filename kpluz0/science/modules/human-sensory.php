<html>
<head><meta charset="utf-8"></head>
<body>
<?php
$_SESSION['title'] = 'Human Sensory Organs';

if ($grd <= 0) {
    // Original question bank 0, with grade-appropriate additions: 12 MC + 8 TF.
    $questions = array(
        'What is this?=nose>eyes+ears<tongue**hb-nose1.jpg',
        'What is this?=tongue>eyes+ears<nose**hb-tongue1.jpg',
        'What are these?=eyes>ears+nose<tongue**hb-eyes1.jpg',
        'What are these?=eyes>ears+nose<tongue**hb-eyes2.jpg',
        'What do you use to see?=eyes>ears+nose<tongue**hb-seeing1.jpg',
        'What do you use to see?=eyes>ears+nose<tongue**hb-seeing2.jpg',
        'What do you use to hear?=ears>eyes+nose<tongue**hb-hearing1.jpg',
        'What do you use to hear?=ears>eyes+nose<tongue**hb-hearing2.jpg',
        'What do you use to smell?=nose>eyes+ears<tongue**hb-smelling1.jpg',
        'What do you use to smell?=nose>eyes+ears<tongue**hb-smelling2.jpg',
        'What do you use to taste?=tongue>eyes+ears<nose**hb-tasting1.jpg',
        'What do you use to taste?=tongue>eyes+ears<nose**hb-tasting2.jpg',
        'We use our eyes for seeing.=true>false**hb-seeing3.jpg',
        'Our eyes let us smell.=false>true**hb-seeing4.jpg',
        'We use our ears for hearing.=true>false**hb-hearing3.jpg',
        'Our ears let us smell.=false>true**hb-hearing4.jpg',
        'We use our nose for smelling.=true>false**hb-smelling3.jpg',
        'Our nose lets us hear.=false>true**hb-smelling4.jpg',
        'We use our tongue for tasting.=true>false**hb-tasting3.jpg',
        'Our tongue lets us smell.=false>true**hb-tasting4.jpg',
        'Which body part helps you hear music?=ears>eyes+nose<tongue',
        'Which body part helps you smell a flower?=nose>ears+eyes<tongue',
        'We use our skin to feel things.=true>false',
        'Our eyes help us hear sounds.=false>true',
        'We use our tongue to taste food.=true>false',
    );
}

elseif ($grd == 1) {
    // Original question bank 1, with grade-appropriate additions: 13 MC + 11 TF.
    $questions = array(
        'What body part is in the picture?=nose>eyes+ears<tongue**hb-nose1.jpg',
        'The arrow is pointing to a ____.=tongue>eyes+ears<nose**hb-tongue1.jpg',
        'Which body parts are shown in the picture?=eyes>ears+nose<tongue**hb-eyes1.jpg',
        'What do you use for smelling?=nose>eyes+ears<tongue',
        'Which body part can taste food?=tongue>eyes+ears<nose',
        'What do you use for hearing?=ears>eyes+nose<tongue',
        'What do you use to see things?=eyes>ears+nose<tongue',
        'We listen using our ____.=ears>eyes+nose<tongue',
        'We use our eyes for ____.=seeing>hearing+smelling<touching',
        'We use our ears for ____.=hearing>seeing+smelling<touching',
        'We use our nose for ____.=smelling>seeing+hearing<touching',
        'We use our tongue for ____.=tasting>seeing+hearing<smelling',
        'We use our skin for ____.=touching>seeing+hearing<smelling',
        'These are what we use for seeing.=true>false**hb-eyes2.jpg',
        'This is what we use for seeing.=false>true**hb-nose1.jpg',
        'We use our eyes for seeing.=true>false',
        'We use our ears for seeing.=false>true',
        'We use our nose for smelling.=true>false',
        'We use our tongue for seeing.=false>true',
        'The taste of sugar is sweet.=true>false',
        'We can see without light.=false>true',
        'Very loud sounds can hurt our ears.=true>false',
        'The taste of sugar is salty.=false>true',
        'Our skin gives us our sense of touch.=true>false',
        'Which sense organ helps you feel a soft pillow?=skin>eyes+ears<nose',
    );
}

elseif ($grd == 2) {
    // Original question bank 2, with grade-appropriate additions: 10 MC + 11 TF.
    $questions = array(
        'The dentist takes care of what part of your body?=teeth>eyes+ears<nose',
        'What part of your body do you use for smelling?=nose>eyes+ears<tongue',
        'What part of your body can taste food?=tongue>eyes+ears<nose',
        'What part of your body do you use for hearing?=ears>eyes+nose<tongue',
        'What part of your body lets you see things?=eyes>ears+nose<tongue',
        'We listen using our ____.=ears>eyes+nose<tongue',
        'The body part in this picture is used for what?=smelling>seeing+hearing<touching**hb-nose1.jpg',
        'The body parts in this picture are used for what?=seeing>hearing+smelling<touching**hb-eyes1.jpg',
        'We use our tongue for ____.=tasting>seeing+hearing<smelling',
        'We use our skin for ____.=touching>seeing+hearing<smelling',
        'The picture above shows the body part that we use for tasting.=true>false**hb-tongue1.jpg',
        'Our ears are what we use for smelling things.=false>true',
        'The tongue is the part of our body that we use for tasting food.=true>false',
        'We will use our eyes if we want to listen to music.=false>true',
        'Our eyes and ears help us enjoy a movie.=true>false',
        'We feel if a thing is hot or cold using our hair.=false>true',
        'The five basic tastes are sweet, sour, salty, bitter, and umami.=true>false',
        'The taste of calamansi is bitter.=false>true',
        'The eyes are the sense organs for the sense of sight.=true>false',
        'The tongue is the sense organ for the sense of touch.=false>true',
        'The skin is the sense organ for the sense of touch.=true>false',
        'Which sense organ helps you feel the warmth of sunlight?=skin>eyes+ears<tongue',
        'Which sense organ helps you recognize the smell of food?=nose>eyes+ears<skin',
        'Our ears help us hear the ringing of a bell.=true>false',
        'We use our nose to see colors.=false>true',
    );
}

elseif ($grd == 3) {
    // Original question bank 3, with grade-appropriate additions: 12 MC + 8 TF.
    $questions = array(
        'Which of these is sensitive to light?=eyes>ears+nose<tongue',
        'Which of these is sensitive to sounds?=ears>eyes+nose<tongue',
        'Which sense organ contains structures that help us maintain balance?=ears>eyes+nose<tongue',
        'In which sense organ is the smallest bone in the human body found?=ears>eyes+nose<tongue',
        'Most of your taste buds are on your ____.=tongue>eyes+ears<nose',
        'Our ____ gives us our sense of touch.=skin>eyes+ears<nose',
        'The ____ is the largest organ of the body.=skin>eyes+ears<nose',
        'The eardrum is found in our sense organ for ____.=hearing>sight+smell<touch',
        'Saliva is important when using our sense of ____.=taste>sight+hearing<smell',
        'The pieces of skin that cover your eyes when they are closed are called what?=eyelids>eye lens+eyeballs<eyebrows',
        'Which part of the ear collects sound?=outer ear>middle ear+inner ear<eardrum',
        'Which of these allow us to tell sweet foods and salty foods apart?=taste buds>touch receptors+eardrum<retina',
        'Our eyes are sensitive to light.=true>false',
        'Our ears are sensitive to light.=false>true',
        'Aside from hearing, our inner ears also help us maintain balance.=true>false',
        'The smallest bone in our body is in our nose.=false>true',
        'The pieces of skin that cover your eyes when they are closed are called \'eyelids\'.=true>false',
        'The part of the ear that collects sound is the \'eardrum\'.=false>true',
        'We use our taste buds to tell sweet food and salty food apart.=true>false',
        'We can see things even without light.=false>true',
        'Which part of the eye opens and closes to protect it?=eyelids>eyebrows+eyelashes<iris',
        'Which sense helps you notice the rough surface of a rock?=touch>hearing+sight<smell',
        'Which sense organ detects the scent of perfume?=nose>tongue+skin<ears',
        'The tongue has taste buds that help us detect different tastes.=true>false',
        'The outer ear helps collect sound waves.=true>false',
    );
}

elseif ($grd == 4) {
    // Original question bank 4: 16 MC + 9 TF.
    $questions = array(
        'The iris and the retina are found where?=eyes>ears+nose<tongue',
        'The hammer, anvil, and stirrup are found where?=ears>eyes+nose<tongue',
        'Which of these uses odor receptors to perform its sensing?=nose>eyes+ears<tongue',
        'Which of these uses touch receptors to perform its sensing?=skin>eyes+ears<nose',
        'Which sense organ contains most of our taste buds?=tongue>eyes+ears<nose',
        'The pupil, cornea, and lens are parts of the organ for the sense of ____.=sight>hearing+smell<touch',
        'The eardrum and cochlea are parts of the organ for the sense of ____.=hearing>sight+smell<touch',
        'Pressure, pain, heat, and cold are examples of what the sense of ____ can detect.=touch>sight+hearing<smell',
        'The part of the ear that we can see along the side of the head is called what?=outer ear>touch receptors+eardrum<taste buds',
        'The ____ is the transparent covering at the front of the eye.=cornea>iris+pupil<retina',
        'The colored part of the eye is called what?=iris>cornea+pupil<retina',
        'The ____ is the hole where light enters the eye.=pupil>cornea+iris<retina',
        'The white part of the eye is called what?=sclera>cornea+iris<pupil',
        'The part of the eye that senses light is the ____.=retina>cornea+iris<pupil',
        'Which of these receives and uses information from all our senses?=brain>heart+kidney<liver',
        'Which of these is NOT one of the five basic tastes?=spicy>sweet+sour<salty',
        'The nose is a sense organ for smelling.=true>false',
        'The fifth recognized taste after sweet, sour, salty, and bitter is \'spicy\'.=false>true',
        'Sounds that enter the ear travel through a tunnel called the \'outer ear canal\'.=true>false',
        '\'Spicy\' or \'hot\' is also a basic taste, just like \'sweet\' and \'sour\'.=false>true',
        'For you to taste what you eat, it must first be dissolved by a liquid such as your saliva.=true>false',
        'Light is not necessary for us to see objects.=false>true',
        'The pupil and the cornea are parts of the eye.=true>false',
        'The eardrum is located inside the cochlea.=false>true',
        'Our sensory system is part of our nervous system.=true>false',
    );
}

else {
    // Original question bank 5: 20 MC + 14 TF.
    $questions = array(
        'The three small bones called the hammer, anvil, and stirrup are found in which sense organ?=ears>eyes+nose<tongue',
        'The epidermis is the outermost layer of the ____.=skin>eyes+ears<nose',
        'The term \'auditory\' refers to the sense of ____.=hearing>sight+smell<touch',
        'The term \'olfactory\' refers to the sense of ____.=smell>sight+hearing<touch',
        'The part of the ear that is externally visible is called what?=outer ear>middle ear+inner ear<eardrum',
        'Sounds that enter the ear travel through a tunnel called the ____.=outer ear canal>outer ear+middle ear<inner ear',
        'The space after the eardrum that has three small bones is called what?=middle ear>outer ear+inner ear<eardrum',
        'The deepest part of the ear that controls hearing and balance is called what?=inner ear>outer ear+middle ear<eardrum',
        'What is the part of the ear that vibrates when sound waves reach it?=eardrum>outer ear+middle ear<inner ear',
        'What do you call the tunnel through which sound travels to reach the eardrum?=outer ear canal>outer ear+middle ear<inner ear',
        'Which part of the eye has cells that are sensitive to light?=retina>cornea+iris<pupil',
        'The lens of the eye focuses light on the ____.=retina>cornea+iris<pupil',
        'The ____ is the hole located in the center of the iris of the eye.=pupil>cornea+iris<retina',
        'What do you call the transparent dome that covers the front of the eye?=cornea>iris+pupil<retina',
        'What do you call the nerve that carries information from the eye to the brain?=optic nerve>auditory nerve+olfactory nerve<peripheral nerve',
        'What do you call the nerve that sends hearing information to the brain?=auditory nerve>optic nerve+olfactory nerve<peripheral nerve',
        'What do you call the nerve that sends information for the sense of smell to the brain?=olfactory nerve>optic nerve+auditory nerve<peripheral nerve',
        'Our ____ receives and responds to information from all our senses.=brain>heart+kidney<liver',
        'It is the ____ that tells us what our eyes see and what our ears hear.=brain>heart+kidney<liver',
        'The basic taste that corresponds to \'meaty\' and \'savory\' is ____.=umami>sweet+sour<salty',
        'The smallest bone in the human body is located in the ears.=true>false',
        'The part of the ear that is externally visible and collects sounds from around it is called the \'outer ear canal\'.=false>true',
        'The ear has very small bones called the hammer, anvil, and stirrup.=true>false',
        'It is our spinal cord that receives, processes, and responds to information from all our senses.=false>true',
        'The basic taste for food that is meaty and savory is \'umami\'.=true>false',
        'The very tiny bones in our ear are called \'auricles\'.=false>true',
        'The membrane separating the outer ear and middle ear that vibrates in response to sound waves is the eardrum.=true>false',
        'The hammer, anvil, and stirrup are small bones in the jaw.=false>true',
        'The tiny bone that passes vibrations from the hammer to the stirrup is the anvil.=true>false',
        'The stirrup is the tube through which sound travels from the outer ear to the eardrum.=false>true',
        'It is the inner ear that is responsible for keeping us in balance.=true>false',
        'The epidermis is the skin\'s innermost layer.=false>true',
        'The optic nerve carries information from the eye to the brain.=true>false',
        'The auditory nerve carries information for the sense of sight to the brain.=false>true',
    );
}

?>
</body>
</html>