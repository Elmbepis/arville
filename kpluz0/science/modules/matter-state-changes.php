<?php
// State Changes in Matter — modern standalone question bank.
// Grades 3–10 share one combined pool; legacy Easy/Medium/Hard selection removed.
// The original question topics are retained, with repeated facts consolidated.
$_SESSION['title'] = 'State Changes in Matter';
$questions = [];

if ($grd >= 3) {
    $questions = [
        'Water changes into ice at its ____.=freezing point>boiling point+melting point<dew point',
        'Ice changes into liquid water at its ____.=melting point>boiling point+freezing point<dew point',
        'Water boils and turns into water vapor at its ____.=boiling point>freezing point+melting point<dew point',
        'A gas turning into a liquid is doing what?=condensing>boiling+freezing<melting',
        'A liquid changing into a gas is doing what?=vaporizing>condensing+freezing<melting',
        'A solid turning into a liquid is doing what?=melting>boiling+freezing<condensing',
        'A solid turning into a gas without becoming a liquid first is ____.=subliming>boiling+vaporizing<melting',
        'A liquid turning into a solid is doing what?=freezing>boiling+subliming<melting',
        'Heating a solid to its melting point can make it ____.=melt>freeze+condense<boil',
        'Heating a liquid to its boiling point can make it ____.=boil>freeze+condense<sublime',
        'If you cool a liquid substance down enough, you will make it ____.=freeze>melt+condense<boil',
        'Cooling water vapor enough can make it ____.=condense>freeze+boil<sublime',
        'At normal atmospheric pressure, the ____ of water is 100 degrees Celsius.=boiling point>freezing point+melting point<dew point',
        'At normal atmospheric pressure, the ____ of pure water is 0 degrees Celsius.=freezing point>boiling point+melting point<dew point',
        'What do you call the process in which a liquid vaporizes even if it\'s not boiling?=evaporation>condensation+sublimation<deposition',
        'The process wherein a solid changes into a gas without first becoming a liquid is called ____.=sublimation>condensation+evaporation<deposition',
        'The process wherein a gas changes into a solid without first becoming a liquid is called ____.=deposition>condensation+sublimation<distillation',
        'The process by which a gas changes back into its liquid phase is called what?=condensation>evaporation+sublimation<deposition',
        'Heating matter makes its particles ____, causing the particles to move away from each other.=more energetic>less energetic+lose energy<break down',
        'In the picture, \'A\' represents the particles of which state of matter?=solid>liquid+gas<plasma**msch1.jpg',
        'In the picture, \'B\' represents the particles of which state of matter?=liquid>solid+gas<plasma**msch1.jpg',
        'In the picture, \'C\' represents the particles of which state of matter?=gas>liquid+solid<plasma**msch1.jpg',
        'If you put a glass of water in the freezer, it will become ice.=true>false',
        'Water doesn\'t change as it boils.=false>true',
        'Ice cubes will turn into liquid water if you take them out of the freezer.=true>false',
        'Water turns into solid as it dries up under the sun.=false>true',
        'As water boils, liquid water turns into water vapor.=true>false',
        'When water evaporates, it turns into dew.=false>true',
        'Dew is water vapor in the air that has condensed.=true>false',
        'A gas that is changing into a liquid is evaporating.=false>true',
        'A liquid that is changing into a solid is freezing.=true>false',
        'A liquid that is changing into a gas is condensing.=false>true',
        'A solid that is changing into a liquid is melting.=true>false',
        'Once a liquid reaches its boiling point, it will become solid.=false>true',
        'A liquid will become solid once it reaches its freezing point.=true>false',
        'The droplets of water outside a cold glass of water come from the water inside the glass.=false>true',
        'A damp shirt will usually dry on its own when hung because the water in it will evaporate into the air.=true>false',
        'Water will only vaporize if it is boiling.=false>true',
        'Melting is the process by which matter changes from solid to liquid.=true>false',
        'Sublimation is the process by which a solid turns into a liquid then into a gas.=false>true',
        'Dry ice turning into gas without melting first is an example of sublimation.=true>false',
        'The process in which a solid changes into a gas without first becoming a liquid is called \'deposition\'.=false>true',
        'The process in which a gas changes into a solid without first becoming a liquid is called \'deposition\'.=true>false',
        'A gas has no definite volume because its particles are closer to each other than those of a solid.=false>true',
    ];
}
?>