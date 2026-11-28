<?php
// Filipino/modules/form-pagpuno.php
// Static question bank for q-display-legacy.php.

$_SESSION['title'] = "Paglalagay ng mga Datos sa mga 'Forms'";

$questions = [
    "Ang ipinapakitang form ay para sa pagdedeklara ng mga ____.=dala-dala ng dumarating sa bansa>dala-dala ng umaalis sa bansa+kasamahan ng dumarating sa bansa<kasamahan ng umaalis sa bansa**Filipino/modules/images/atbp/form1.jpg",
    "Alin sa mga sumusunod ang kabuuang impormasyong hinihingi ng mga patlang na itinuturo ng mga asul na palaso?=buong pangalan>kasarian+apelyido<pagkamamamayan**Filipino/modules/images/atbp/form1.jpg",
    "Alin sa mga sumusunod ang impormasyong hinihingi ng patlang na itinuturo ng pulang palaso?=kasarian>kaarawan+lugar ng kapanganakan<pagkamamamayan**Filipino/modules/images/atbp/form1.jpg",
    "Alin sa mga sumusunod ang impormasyong hinihingi ng patlang na itinuturo ng lilang palaso?=kaarawan>kasarian+lugar ng kapanganakan<pagkamamamayan**Filipino/modules/images/atbp/form1.jpg",
    "Alin sa mga sumusunod ang maaaring ilagay sa patlang na itinuturo ng kahel na palaso?=Filipino>Agosto 25, 2008+Maynila<Alex Cruz**Filipino/modules/images/atbp/form1.jpg",
    "Alin sa mga sumusunod ang maaaring ilagay sa patlang na itinuturo ng berdeng palaso?=Pilipinas>Hunyo 12, 2009+Makati<Jose Santos**Filipino/modules/images/atbp/form1.jpg",
    "Alin sa mga sumusunod ang maaaring ilagay sa patlang na itinuturo ng itim na palaso?=(0917)881-3735>Oktubre 15, 2010+Babae<Filipino**Filipino/modules/images/atbp/form1.jpg",
    "Alin sa mga sumusunod ang hindi dapat ilagay sa patlang na itinuturo ng dilaw na palaso?=kaarawan>apleyido+lagda<unang pangalan**Filipino/modules/images/atbp/form1.jpg",
    "Ang ipinapakitang form ay kailangang punan at isumite ng mga ____.=dumarating sa bansa>umaalis sa bansa+may bahay sa bansa<may kamag-anak sa bansa**Filipino/modules/images/atbp/form2.jpg",
    "Alin sa mga sumusunod ang hindi maaaring ilagay sa patlang na itinuturo ng asul na palaso?=babae>Guzman+Rodriguez<Aquino**Filipino/modules/images/atbp/form2.jpg",
    "Alin sa mga sumusunod ang hindi maaaring ilagay sa patlang na itinuturo ng pulang palaso?=Abril 16, 2005>(0917)881-3735+8832-4735<contact@xigega.com**Filipino/modules/images/atbp/form2.jpg",
    "Alin sa mga sumusunod ang impormasyong hinihingi ng patlang na itinuturo ng pulang palaso?=kasarian>kaarawan+lugar ng kapanganakan<pagkamamamayan**Filipino/modules/images/atbp/form2.jpg",
    "Alin sa mga sumusunod ang impormasyong hinihingi ng patlang na itinuturo ng kahel na palaso?=hanapbuhay>kasarian+kaarawan<pagkamamamayan**Filipino/modules/images/atbp/form2.jpg",
    "Alin sa mga sumusunod ang dapat ilagay sa patlang na itinuturo ng itim na palaso?=lagda>kaarawan+apelyido<pagkamamamayan**Filipino/modules/images/atbp/form2.jpg",
    "Alin sa mga sumusunod ang impormasyong hinihingi ng patlang na itinuturo ng lilang palaso?=bansang pinanggalingan>bansang tatahanan+lungsod na pinanggalingan<lungsod na tatahanan**Filipino/modules/images/atbp/form2.jpg",
    "Alin sa mga sumusunod ang impormasyong hinihingi ng patlang na itinuturo ng berdeng palaso?=layunin ng paglalakbay>hanapbuhay+mga personal na datos<mga kamag-anak**Filipino/modules/images/atbp/form2.jpg",
    "Alin sa mga sumusunod ang dapat ilagay sa patlang na itinuturo ng dilaw na palaso?=wala>mensahe+lagda<pangalan**Filipino/modules/images/atbp/form2.jpg",
    "Ang ipinapakitang form ay para sa ____ sa bangko.=paglalabas ng pera>paglalagak ng pera+pagbabayad<pangungutang**Filipino/modules/images/atbp/form3.jpg",
    "Alin sa mga sumusunod ang impormasyong hinihingi ng patlang na itinuturo ng asul na palaso?=halagang kinukuha>halagang inilalagak+balanse ng ipon<halagang ibinabayad**Filipino/modules/images/atbp/form3.jpg",
    "Alin sa mga sumusunod ang dapat ilagay sa patlang na itinuturo ng berdeng palaso?=lagda>kaarawan+apelyido<pagkamamamayan**Filipino/modules/images/atbp/form3.jpg",
    "Alin sa mga sumusunod ang maaaring ilagay sa patlang na itinuturo ng pulang palaso?=Ricardo Enriquez>465-7-5238-0-1+One Hundred Pesos<Oktubre 25, 2020**Filipino/modules/images/atbp/form3.jpg",
    "Alin sa mga sumusunod ang maaaring ilagay sa patlang na itinuturo ng lilang palaso?=465-7-5238-0-1>Bernardo Carpio+Two Hundred Pesos<Pilipinas**Filipino/modules/images/atbp/form3.jpg",
    "Alin sa mga sumusunod ang maaaring ilagay sa patlang na itinuturo ng kahel na palaso?=Five Hundred Pesos>465-7-5238-0-1+Salome Cortez<Lungsod ng Pasay**Filipino/modules/images/atbp/form3.jpg",
    "Ang ipinapakitang form ay para sa ____ sa bangko.=paglalagak ng pera>paglalabas ng pera+pagbabayad<pangungutang**Filipino/modules/images/atbp/form4.jpg",
    "Alin sa mga sumusunod ang impormasyong hinihingi ng patlang na itinuturo ng asul na palaso?=petsa>halagang inilalagak+halagang kinukuha<kaarawan**Filipino/modules/images/atbp/form4.jpg",
    "Alin sa mga sumusunod ang maaaring ilagay sa patlang na itinuturo ng berdeng palaso?=465-7-5238-0-1>Lungsod ng Makati+contact@xigega.com<Five Hundred Pesos**Filipino/modules/images/atbp/form4.jpg",
    "Alin sa mga sumusunod ang maaaring ilagay sa patlang na itinuturo ng pulang palaso?=Joshua Flores>465-7-5238-0-1+One Hundred Pesos<Setyembre 12, 2019**Filipino/modules/images/atbp/form4.jpg",
    "Alin sa mga sumusunod ang impormasyong hinihingi ng patlang na itinuturo ng kahel na palaso?=uri ng transaksiyon>uri ng account+halagang inilalagak<uri ng negosyo**Filipino/modules/images/atbp/form4.jpg",
    "Alin sa mga sumusunod ang impormasyong hinihingi ng patlang na itinuturo ng lilang palaso?=uri ng account>uri ng transaksiyon+halagang inilalagak<uri ng negosyo**Filipino/modules/images/atbp/form4.jpg",
    "Ang ipinapakitang form ay para sa pagkuha ng lisensiya sa ____.=pagmamaneho>paglalakbay+pagpapakasal<pagnenegosyo**Filipino/modules/images/atbp/form5.jpg",
    "Alin sa mga sumusunod ang ahensiyang nagbibigay ng impormasyong hinihingi ng patlang na itinuturo ng asul na palaso?=BIR>NBI+DTI<SEC**Filipino/modules/images/atbp/form5.jpg",
    "Alin sa mga sumusunod ang hindi maaaring ilagay sa patlang na itinuturo ng berdeng palaso?=Hulyo 23, 2005>Alexander+Cuevas<Martin**Filipino/modules/images/atbp/form5.jpg",
    "Alin sa mga sumusunod ang impormasyong hinihingi ng patlang na itinuturo ng pulang palaso?=tirahan>petsa+kaarawan<lugar ng kapanganakan**Filipino/modules/images/atbp/form5.jpg",
    "Alin sa mga sumusunod ang impormasyong hinihingi ng patlang na itinuturo ng lilang palaso?=pagkamamamayan>kaarawan+lugar ng kapanganakan<kasarian**Filipino/modules/images/atbp/form5.jpg",
    "Alin sa mga sumusunod ang maaaring ilagay sa patlang na itinuturo ng kahel na palaso?=lalaki>Mario Alcantara+8881-2546<Lungsod ng Pasig**Filipino/modules/images/atbp/form5.jpg",
];
