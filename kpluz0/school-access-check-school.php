<?php

	$mpluzschool="";
	$kpluzschool="";
	$username2="";
	if (isset($username1)){$username2=$username1;}
	if (isset($pass)){$pass=$pass;}
	
	//st. gabriel intl school: sgis stgabrielis
	if (md5($username2)=="b183a468099d98de34f7bbff0b92fd9c" and md5($pass)=="af8468a3041bbf93aba0e48024297dad")
		{
 		$schoolfull="St. Gabriel International School";
 		$grds=array("0","1","2","3","4","5","6","7","8","9","10","11","12");
		$chkstr="*sgis00010020sgis10011029sgis20012037sgis30012036sgis40014042sgis50015049sgis60016034sgis70017040sgis80018027sgis90019038sgisa001a043sgshB001B007sgshC001C011sgshM001M003sgshN001N005sgshP001P018sgshQ001Q004sgshR001R005sgshS001S018";
		$kpluzschool="yes"; $validpass=$pass; $offset=659061;
		}
	
	//makati hope christian school: mhcs makatihope
	if (md5($username2)=="a1cadfe06c9dcdc4820f63d70a2936fd" and md5($pass)=="c6417513d4987cc9ef16231bf7b5ee69")
		{
 		$schoolfull="Makati Hope Christian School";
 		$grds=array("0");
		$chkstr="*mhcs01010109";
		$kpluzschool="yes"; $validpass=$pass; 
		}
	
	//st. nicholas school of davao: snad nicholas
	if (md5($username2)=="69a3852970c0c8b93c93c57a7c22b489" and md5($pass)=="532ab4d2bbcc461398d494905db10c95")
		{
 		$schoolfull="St. Nicholas School of Davao";
 		$grds=array("0","1","2","3");
		$chkstr="*snad0010015snad10011007snad20012005snad30013001";
		$kpluzschool="yes"; $validpass=$pass; $offset=659061;
		}
	
	//st. agustin center for development of baliuag inc.: sacb sanagustin
	if (md5($username2)=="4817469a25d3a4cea57dc4a6e7f95dc6" and md5($pass)=="58d95eb34ce61ed277a3ec9096ad7137")
		{
 		$schoolfull="St. Agustin Center for Development of Baliuag, Inc.";
 		$grds=array("0","1","2","3");
		$chkstr="*sacb00010023sacb10011008sacb20012008sacb30013001";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
		}
	
	//school of life learning center and tutorial mission services, inc.: scts schooloflife
	if (md5($username2)=="4921f1162065316cd1f227e98b9f5565" and md5($pass)=="702aa9eecb8e69af6335dde768aa4ff2")
		{
 		$schoolfull="School of Life Learning Center and Tutorial Mission Services, Inc.";
 		$grds=array("1","2","3","4","5");
		$chkstr="*scts11011119scts21012130scts31013023scts41014123scts51015119scts61016111";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
		}
	
	//ped academy: peda pedacademy
	if (md5($username2)=="cda42a4eb99bd9f7339a5e7cf04e9671" and md5($pass)=="b8ba9bb3286b47febdd18195dc5582d8")
		{
 		$schoolfull="Ped Academy";
 		$grds=array("1","2","3","4","5","6");
		$chkstr="*peda10011012peda20012016pead30013009pead40014015peda50015005peda60016006";
		$kpluzschool="yes"; $validpass=$pass; $offset=9892906;
		}
	
	//weisheit inscribe learning academy inc: weis wila
	if (md5($username2)=="5188c493ed158707387a079cdfec3d92" and md5($pass)=="f62cdcb38e52b6dd392f2bfb69fd4e06")
		{
 		$schoolfull="Weisheit Inscribe Learning Academy Inc.";
 		$grds=array("0","1","2","3","4","5","6");
		$chkstr="*weis03010318weis13011315weis23012307weis33013305weis43014305weis53015305weis63016301";
		$kpluzschool="yes"; $validpass=$pass; $offset=9892906;
		}
		
	//new life christian school of cavite: NLcs newlife
	if (md5($username2)=="98154fb7707785aa91746d125e130619" and md5($pass)=="6a1e5a93fdabf7886371a936d9f9436e")
		{
 		$schoolfull="New Life Christian School of Cavite";
 		$grds=array("3","4","5","6","7","8","9","10");
		$chkstr="*NLcs30013022NLcs40014012NLcs50015017NLcs60016017NLcs70017044NLcs80018031NLcs90019032NLcsa001a035";
		$kpluzschool="yes"; $validpass=$pass; $offset=9892906;
		}
		
	//prince of peace integrated school: ppis prince
	if (md5($username2)=="99f0cbc584688e7c6e98fbb15d8de450" and md5($pass)=="2077e4a6bafa9b4e7b55e1fff16818af")
		{
 		$schoolfull="Prince of Peace Integrated School";
 		$grds=array("6","7","8");
		$chkstr="*ppis60016003ppis70017002ppis80018001";
		$kpluzschool="yes"; $validpass=$pass; $offset=9892906;
		}
		
	//burning bush: bbsh burningbush
	if (md5($username2)=="ee9115507816fff8751ca015ed265a30" and md5($pass)=="a9f0f906d802f567e4dcacbfeb2c0cfe")
		{
 		$schoolfull="Burning Bush Child Devt Center";
 		$grds=array("0");
		$chkstr="*bbsh04010426";
		$kpluzschool="yes"; $validpass=$pass; $offset=9892906;
		}
	
	//palmes: psoa palmes
		if (md5($username2)=="0b0dbb2e6874039607693d856fd9c501" and md5($pass)=="13acecb7a664cf2d669380067dca5977")
		{
 		$schoolfull="Palmes School of Antipolo";
 		$grds=array("5","6","7","8","9","10");
		$chkstr="*psoa52015228psoa62016228psoa72017219psoa82018219psoa92019209psoac001c011"; $offset=12963574;
		$kpluzschool="yes"; $validpass=$pass;
		}

	//christian academy: caom caomanila
	if (md5($username2)=="2589e2e5bd0e7da502f57285d4c2b6ae" and md5($pass)=="03758deb5acecbffcc9b78c2452f68c5")
		{
 		$schoolfull="Christian Academy of Manila";
 		$grds=array("0","1","2","3","4","5","6","7","8","9","10");
		$chkstr="*caom03010302caom13011310caom23012314caom33013310caom43014302caom53015306caom63016307caom73017308caom83018305caom93019304caomd001d003"; $offset=12963574;
		$kpluzschool="yes"; $validpass=$pass;
		}
	
	//mary heights: mhsp maryheights
	if (md5($username2)=="1bfdb5a90fa84ee61973843005aa66f6" and md5($pass)=="b2816eccd2f406c31f763055bde34763")
		{
 		$schoolfull="Mary Heights Learning Center";
 		$grds=array("0","1","2","3","4","5","6");
		$chkstr="*mhsp06010606mhsp16011610mhsp26012612mhsp36013608mhsp46014613mhsp56015615mhsp66016610"; $offset=12963574;
		$kpluzschool="yes"; $validpass=$pass;
		}
	
	//regis grace: rgms regisgrace
	if (md5($username2)=="04a429cf72d80fdec2cfb1581d085620" and md5($pass)=="31a5c6e13aad446588666160e9eb9ae4")
		{
 		$schoolfull="Regis Grace Montessori School";
 		$grds=array("1","2","3","4","5","6","7","8","9","10");
		$chkstr="*rgms12011222rgms22012214rgms32013219rgms42014228rgms52015217rgms62016238rgms72017214rgms82018221rgms92019229rgmsc001c017"; $offset=12963574;
		$kpluzschool="yes"; $validpass=$pass;
		}
	
	//tlims: tlms myshepherd
	if (md5($username2)=="6a555fe7b3b6a493609abf9ba9f8befc" and md5($pass)=="d5c4876ea124a9cd03f33f621e2b5be0")
		{
 		$schoolfull="The Lord is My Shepherd School";
 		$grds=array("3","4","5","6");
		$chkstr="*tlms32013210tlms42014210tlms52015215tlms62016215"; $offset=12963574;
		$kpluzschool="yes"; $validpass=$pass;
		}
		
	//smart achievers: saas achievers
	if (md5($username2)=="593be52a46f869eea8b31d146d21de7a" and md5($pass)=="01fa212d3f5f6d3f0b8aaa2d55e50a43") 
		{
 		$schoolfull="Smart Achievers Academy";
 		$grds=array("0","1","2","3","4","5","6","7","8","9","10");
		$chkstr="*saas01010103saas11011103saas21012110saas31013105saas41014106saas51015109saas61016108saas71017113saas81018114saas91019117saasb001b010";
		$kpluzschool="yes"; $validpass=$pass;
		}
		
	//smart kids: skmo smartkids
	if (md5($username2)=="8f1fa47f66db8cd104ba460b3c30ea6e" and md5($pass)=="737240b2b76747fcd6f0bc47799cac2f") 
		{
 		$schoolfull="Smartkids Montessori Olongapo";
 		$grds=array("0","1","2","3","4","5","6");
		$chkstr="*skmo01010110skmo11011104skmo21012106skmo31013108skmo41014106skmo51015103skmo61016107";
		$kpluzschool="yes"; $validpass=$pass;
		}
		
	//jesus is the rock: jitr therock
	if (md5($username2)=="0ca011aa4edd67244c22728c7f1c7955" and md5($pass)=="689dfb28ace7147809d052316379a599") 
		{
 		$schoolfull="Jesus is the Rock";
 		$grds=array("3","4","5","6");
		$chkstr="*jrck31013109jrck41014108jrck51015108jrck61016110"; $offset=12963574;
		$kpluzschool="yes"; $validpass=$pass;
		}

	//kids learning plus pasig: kdpp klearningpp
	if (md5($username2)=="2ea7b6e5fcab470d986e296c2961fb33" and md5($pass)=="664b5daa767995b367c291a819bd05cf") 
		{
 		$schoolfull="Kids Plus Learning - Pasig";
 		$grds=array("0","1","2","3","4","5","6","7");
		$chkstr="*kdpp00010013kdpp10011009kdpp20012004kdpp30013006kdpp40014003kdpp50015004kdpp70017003";
		$kpluzschool="yes"; $validpass=$pass;
		}
		
	//golden faith: gfam goldfaith
	if (md5($username2)=="9c2efa4f28963b8f2e8773da0f74522e" and md5($pass)=="9d9b0d3b41f2c2925ca45315cf3e74b5") 
		{
 		$schoolfull="Golden Faith Academy";
 		$grds=array("0","1","2","3","4","5","6","7","8","9","10");
		$chkstr="*gfam00010002gfam10011003gfam20012005gfam30013005gfam40014002gfam50015006gfam60016006gfam70017090gfam80018085gfam90019076gfama001a090";
		$kpluzschool="yes"; $validpass=$pass;
		}
		
	//student desk: sdim studesk
	if (md5($username2)=="c74eb08303aa98ce290148915e195961" and md5($pass)=="c256818481552832a89af974a7dae0f7") 
		{
 		$schoolfull="Studentdesk Integrated Montessori School";
 		$grds=array("0", "1","2","5");
		$chkstr="*sdim00010001sdim10011002sdim20012001sdim50015001";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
		}
		
	//mary infant jesus iligan: mijs maryij
	if (md5($username2)=="4545a2b41ae6404a1f95b9ffebe9f5e6" and md5($pass)=="3f5d1ed0a70e931057abe12a510f49da") 
		{
 		$schoolfull="Mary Infant Jesus School Iligan";
 		$grds=array("1","2","3","4","5","6");
		$chkstr="*mijs12011217mijs220122129mijs32013219mijs42014223mijs52015216mijs62016230";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
		}
		
	//mary infant jesus lanao norte: mijd maryijd
	if (md5($username2)=="039203c442b65ad09586401cb5ef871e" and md5($pass)=="4ddd71fe09b779b9947bbecb4724abd1") 
		{
 		$schoolfull="Mary Infant Jesus School Lanao del Norte";
 		$grds=array("1","2","3","4","5","6");
		$chkstr="*mijd12011210mijd22012217mijd32013215mijd42014207mijd52015207mijd62016206";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
		}
		
	//mary infant jesus cdo: mijc maryijc
	if (md5($username2)=="ce011dc380d9afe56bee1af1c9dac72e" and md5($pass)=="de1b728291b4a0875763842567c967ef") 
		{
		$chkstr="*mijc12011206mijc22012211mijc32013212mijc42014203mijc52015205mijc62016206";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
 		$schoolfull="Mary Infant Jesus School CDO";
 		$grds=array("1","2","3","4","5","6");
		}
		
	//muzon christian academy: mcat muzon
	if (md5($username2)=="43f3f791141688b63fef2fa215325e95" and md5($pass)=="5e44b213ef5c340c15524df194fef60e") 
		{
 		$schoolfull="Muzon Christian Academy";
 		$grds=array("0","1","2","3","4","5","6");
		$chkstr="*mcat00010027mcat10011013mcat20012012mcat30013005mcat40014007mcat50015005mcat60026004";
		$kpluzschool="yes"; $validpass=$pass; $offset=9892906;
		}
		
	//amado barrera: abec amado
	if (md5($username2)=="85295707257fb71bbcaa28e993dddb06" and md5($pass)=="7ffa19b9b00b6012372545e03d8024b0") 
		{
 		$schoolfull="Amado Barrera Educational Center";
 		$grds=array("0","1","2","3","4","5","6","7","8","9","10");
		$chkstr="*abec00010019abec10011024abec20012047abec30013039abec40014031abec50015030abec60016046abec70017036abec80018034abec90019025abeca001a019";
		$kpluzschool="yes"; $validpass=$pass; $offset=659061;
		}
		
	//st. jude: sjsa stjude
	if (md5($username2)=="fdfc11ffe796c8b59269b525789bf1d7" and md5($pass)=="c7f7521ec3fa31b29090310ea1bb2d0d") 
		{
 		$schoolfull="St. Jude School of Antipolo";
 		$grds=array("0","1","2","3","4","5","6","7","8","9","10");
		$chkstr="*sjsa00010005sjsa10011002sjsa20012007sjsa30013010sjsa40014007sjsa50015010sjsa60016005sjsa70017010sjsa80018008sjsa90019003sjsaa001a006";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
		}
		
	//sunhill batangas: smcb sunhillmc
	if (md5($username2)=="883772367ba9589aa2a241317548deb3" and md5($pass)=="1b380c3b02b82b3dedf8312bb08b8b6e") 
		{
 		$schoolfull="Sunhill Montesori Casa - Batangas";
 		$grds=array("0","1","2","3","4","5","6");
		$chkstr="*smcb00010032smcb10011017smcb20012021smcb30013024smcb40014019smcb50015027smcb60016024";
		$kpluzschool="yes"; $validpass=$pass; $offset=13182516;
		}
		
	//sunhill rosario: smcr sunhillmcr
	if (md5($username2)=="c3f29c3fc2390735ebcb6c2e349a6a2d" and md5($pass)=="85e99473d3b3f28a2fe73b0e66e28b30") 
		{
 		$schoolfull="Sunhill Montesori Casa - Rosario";
 		$grds=array("0","1","2","3","4","5","6");
		$chkstr="*smcr00010017smcr10011009smcr20012009smcr30013004smcr40014005smcr50015004smcr60016001";
		$kpluzschool="yes"; $validpass=$pass; $offset=13182516;
		}
		
	//sunhill tagaytay: smct sunhillmct
	if (md5($username2)=="1cba2300e3f6bf118e0697107fc37647" and md5($pass)=="6adf0ad047ee0f361b46ae474f31c9f5") 
		{
 		$schoolfull="Sunhill Montesori Casa - Tagaytay";
 		$grds=array("0","2","3","4","5","6");
		$chkstr="*smct00010001smct20012005smct30013002smct40014003smct50015002smct60016004";
		$kpluzschool="yes"; $validpass=$pass; $offset=13182516;
		}
		
	//sunhill bauan: sbau sunhillbau
	if (md5($username2)=="b517fc51b6966e5d79c9b7cbbefc9968" and md5($pass)=="0a820a00451fd67f9f6cb04ffbc04993") 
		{
 		$schoolfull="Sunhill Montesori Casa - Bauan";
 		$grds=array("0","1","2","3","4","5","6");
		$chkstr="*sbau00010003sbau10011002sbau20012011sbau30013015sbau40014017sbau50015010sbau60016016";
		$kpluzschool="yes"; $validpass=$pass; $offset=13182516;
		}
		
	//sunhill batangas: scen sunhillcen
	if (md5($username2)=="d9df84a81c59b8517c0efeaa568ebd36" and md5($pass)=="1f5d7cfa00bf588f44a0ff2b52ed0dfb") 
		{
 		$schoolfull="Sunhill Montesori Casa - Lucena";
 		$grds=array("0","1","2","3","4","5","6");
		$chkstr="*scen00010003scen10011005scen20012006scen30013006scen40014004scen50015007scen60016004";
		$kpluzschool="yes"; $validpass=$pass; $offset=13182516;
		}
		
	//nothridge: ngst northridge
	if (md5($username2)=="0c28eea250902b392c93e897a14eb6f0" and md5($pass)=="779ab56a2f904f1afe6640f7585bb314") 
		{
 		$schoolfull="Northridge Grade School and Therapy Center";
 		$grds=array("0","1","2","3","4","5","6");
		$chkstr="*ngst04010407ngst14011418ngst24012408ngst34013405pcsm44014403pcsm55015506ngst64016411";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
		}
		
	//marie franz: mfrz mfranz
	if (md5($username2)=="8201a6d7add2a9da21c3a1fd185127ea" and md5($pass)=="6f908d95abda1235463ad134e995fdfd") 
		{
 		$schoolfull="Marie Franz Learning School";
 		$grds=array("0","1","2","3");
		$chkstr="*mfrz00010001mfrz10011001mfrz20012002mfrz30013006";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
		}
		
	//baesa adventist academy: baac baesa
	if (md5($username2)=="11a632187e5f0c8a715da18bf594fc5e" and md5($pass)=="c60e994eae9f10373e37683ce49fbcc5") 
		{
 		$schoolfull="Baesa Adventist Academy";
 		$grds=array("7","8","9","10");
		$chkstr="*baac70017069baac80018077baac90019072baaca001a064";
		$kpluzschool="yes"; $validpass=$pass; $offset=13182516;
		}
		
	//discovery integrated academy: diap discovery
	if (md5($username2)=="329073dc95130582180dad74181644ce" and md5($pass)=="54818b05d116eadc7f67517a3a6e4b33") 
		{
 		$schoolfull="Discovery Integrated Academy";
 		$grds=array("0","1","2","3","4","6");
		$chkstr="*diap00010011diap10011014diap20012008diap30013005diap40014005diap60016001";
		$kpluzschool="yes"; $validpass=$pass; $offset=13182516;
		}
		
	//our lady of holy rosary: ohrs rosary
	if (md5($username2)=="af9532b6453e5ee6a57b427bc63abb0b" and md5($pass)=="0563ad2e2534af6f5bcd97ec0a126b3c") 
		{
 		$schoolfull="Our Lady of Holy Rosary";
 		$grds=array("0","1","2","3","4","5","6","7","8","9","10");
		$chkstr="*ohrs00010002ohrs10011008ohrs20012009ohrs30013008ohrs40014010ohrs50015009ohrs60016009ohrs70017006ohrs80018009ohrs90019009ohrsa001a006";
		$kpluzschool="yes"; $validpass=$pass; $offset=13182516;
		}
		
	//victoria heights intl.: vhsi ivictoria
	if (md5($username2)=="287a70e1b07fc0bc554e042d3e96e4f8" and md5($pass)=="a76fced2718409a1f6078ab2575cd3c8") 
		{
 		$schoolfull="Victoria Heights School International";
 		$grds=array("0","1","2","3","4","5","6","7","8","9","10");
		$chkstr="*vhsi00010030vhsi10011019vhsi20012019vhsi30013027vhsi40014021vhsi50015013vhsi60016015vhsi70017013vhsi80018013vhsi90019020vhsia001a004";
		$kpluzschool="yes"; $validpass=$pass; $offset=9892906;
		}
		
	//victoria heights manila: vhsm mvictoria
	if (md5($username2)=="e30122f28bbc8a0448667d08282e22cc" and md5($pass)=="b51909214d4678ae94f3e950f591fda5") 
		{
 		$schoolfull="Victoria Heights School Manila";
 		$grds=array("0","1","2","3","4","5","6","7");
		$chkstr="*vhsm00010011vhsm10011009vhsm20012015vhsm30013008vhsm40014008vhsm50015009vhsm60016006vhsm70017006";
		$kpluzschool="yes"; $validpass=$pass; $offset=9892906;
		}
		
	//Little Shepherd Child Devt Center: shcd shepherd
	if (md5($username2)=="a332374c9e52f981d44a3d34f3948a67" and md5($pass)=="ee03b2bc527809141a38236e74d0b7bf") 
		{
 		$schoolfull="Little Shepherd Child Development Center";
 		$grds=array("3","4","5","6");
		$chkstr="*shcd30013037shcd40014037shcd50015027shcd60016035";
		$kpluzschool="yes"; $validpass=$pass; $offset=9892906;
		}
		
	//Gain Christian Academy: gcha gainchr
	if (md5($username2)=="91a67131c5e7c86c5232a5ff4ceea997" and md5($pass)=="8a3b9fda10144c492ef960136d385695") 
		{
 		$schoolfull="Gain Christian Academy";
 		$grds=array("0","1","2","3");
		$chkstr="*gcha00010023gcha10011013gcha20012020gcha30013014";
		$kpluzschool="yes"; $validpass=$pass; $offset=9892906;
		}
		
	//Providence Christian School: pcsm providence
	if (md5($username2)=="1d6072bd25948270249f6280d2fa4c01" and md5($pass)=="fc52c21756c177325b755781195254d9") 
		{
 		$schoolfull="Providence Christian School";
 		$grds=array("1","2","3","5","6");
		$chkstr="*pcsm15011503pcsm25012506pcsm35013505pcsm55015505pcsm65016505";
		$kpluzschool="yes"; $validpass=$pass; $offset=9892906;
		}
		
	//Presbyterian Christian Academy: pcai presbyterian
	if (md5($username2)=="0f42302fb82b178027060678b14eb69d" and md5($pass)=="27db81fb54ac1b73c3c3e7a3f56a3d91") 
		{
 		$schoolfull="Presbyterian Christian Academy";
 		$grds=array("1","2","3","4","5","6",);
		$chkstr="*pcai14011403pcai24012401pcai34013404pcai54015402pcai6402pcai6501";
		$kpluzschool="yes"; $validpass=$pass; 		}
			
	//Mindhaven School, Inc.: mhsi mindhaven
	if (md5($username2)=="fd3d3120f247003f1990ac0f7c0860c6" and md5($pass)=="81e6bfc9a7aa08007d2b8dcea9cebf83") 
		{
 		$schoolfull="Mindahaven School, Inc.";
 		$grds=array("0","1","2","3","4","5","6");
		$chkstr="*mhsi00010004mhsi10011008mhsi20012004mhsi30013003mhsi40014007mhsi50015007mhsi60016007";
		$kpluzschool="yes"; $validpass=$pass; $offset=9892906;
		}
		
	//Angels' Light Learning Camp: angc angels
	if (md5($username2)=="fb79ef8c8b2e005ef405b373148e1cec" and md5($pass)=="82a7c395a86348dd4bfd11bb05b71cbf") 
		{
 		$schoolfull="Angels' Light Learning Camp";
 		$grds=array("1","2","3","4");
		$chkstr="*angc10011006angc20012011angc30013005angc40014007";
		$kpluzschool="yes"; $validpass=$pass; $offset=659061;
		}
		
	//Divine Heart: dhmm divine
	if (md5($username2)=="1ddb5cc0c684fcf3ff78abdff89a6469" and md5($pass)=="67d46ec7d84ba284982e634970c5b7df") 
		{
 		$schoolfull="Divine Heart of Mary Montessori School";
 		$grds=array("1","2","3","4","5","6","7","8","9","10");
		$chkstr="*dhmm13011312dhmm23012314dhmm33013307dhmm43014309dhmm53015306dhmm63016305dhmm73017302dhmm83018301dhmm93019301dhmmd001d003";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
		}
		
	//Vox Dei: voxd voxdei
	if (md5($username2)=="27a3a28a75858277d96520feae1775d9" and md5($pass)=="2e4c436dfca705f38e9f81d69f8e083e") 
		{
 		$schoolfull="Vox Dei Play and Learn Center";
 		$grds=array("0","1","2","3","4","5","6","7","8");
		$chkstr="*voxd00010007voxd10011019voxd20012009voxd30013021voxd40014015voxd50015020voxd60016022voxd70017004voxd80018006";
		$kpluzschool="yes"; $validpass=$pass; $offset=659061;
		}
		
	//E-minds Center for Learning: emnd eminds
	if (md5($username2)=="dceb02fcbb8c6ac5625c157cffb0e60a" and md5($pass)=="df9cf58050359633c75122c0b501281c") 
		{
 		$schoolfull="E-minds Center for Learning";
 		$grds=array("0");
		$chkstr="*emnd00010034emnd10011001";
		$kpluzschool="yes"; $validpass=$pass; $offset=659061;
		}
		
	//Eastern Pangasinan Christian Learning Center: epcc eastern
	if (md5($username2)=="db5a3f4c310cd78613c4de6129027055" and md5($pass)=="305167122a0bc3414f5c69f0de90ac6e") 
		{
 		$schoolfull="Eastern Pangasinan Christian Learning Center";
 		$grds=array("0","1","2","3","4","5","6");
		$chkstr="*epcc01010101epcc11011111epcc21012111epcc31013104epcc41044104epcc51015107epcc61016105";
		$kpluzschool="yes"; $validpass=$pass; $offset=659061;
		}

	//Balmor Christian School Inc.: bcsi balmorschool
	if (md5($username2)=="4ca975d8c26a49dc0d9ba9788b43e1ee" and md5($pass)=="9d7374ba415a528aac2821a92f66e72a") 
		{
 		$schoolfull="Balmor Christian School Inc.";
 		$grds=array("1","2","3","4","5","6");
		$chkstr="*bcsi12011230bcsi22012236bcsi32013226bcsi42014220bcsi52015214bcsi62016218";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
		}

	//Christ Jeross Christian Academy Foundation Inc.: cjca jeross
	if (md5($username2)=="a3273540bab25a44e9a0b5c2e727792e" and md5($pass)=="7b2980a2a2060bcdfe1c53905ffd8418") 
		{
 		$schoolfull="Christ Jeross Christian Academy Foundation Inc";
 		$grds=array("0","1","2","3","4","5","6","7","8","9","10");
		$chkstr="*cjca00010022cjcacjca10011034cjca20012025cjca30013016cjca40014024cjca50015020cjca60016016cjca70017038cjca80018034cjca90019020cjcaa001cjcaa040";
		$kpluzschool="yes"; $validpass=$pass; $offset=9892906;
		}

	//Genesis Christian Academy of Caloocan Inc.: gcac genesis
	if (md5($username2)=="514c2e6c667c23a02c5014c7926b57a0" and md5($pass)=="289ffeb2a745ccf51ca89a297f47e382") 
		{
 		$schoolfull="Genesis Christian Academy of Caloocan Inc.";
 		$grds=array("0","1","2","3","4","5","6","7","8","9","10");
		$chkstr="*gcac00010013gcac10011028gcac20012022gcac30013014gcac40014019gcac50015015gcac60016021gcac70017059gcac80018056gcac90019074gcaca001a080";
		$kpluzschool="yes"; $validpass=$pass; $offset=9892906;
		}
		
	//Holy Child: hcms holychild
	if (md5($username2)=="2db5cf854e07fb7767f92a3beba9571a" and md5($pass)=="85d6dcc31d2537abc3b1ed583234eda7") 
		{
 		$schoolfull="The Holy Child Montessori School";
 		$grds=array("0","1","2","3","4","5","6");
		$chkstr="*hcms00010006hcms10011009hcms20012004hcms30013005hcms40014001hcms50015005hcms60016005";
		$kpluzschool="yes"; $validpass=$pass; $offset=659061;
		}
		
	//St Joseph Montessori: sjms stjoseph
	if (md5($username2)=="fad09f20317998910073380dc40c2095" and md5($pass)=="999eb437f8cd3f9fc34390535c696a71") 
		{
 		$schoolfull="Saint Joseph Montessori Integrated School";
 		$grds=array("0","1","2","3","4","5","6","7","8","9","10");
		$chkstr="*sjms00010008sjms10011006sjms20012011sjms30013015sjms40014006sjms50015016sjms60016019sjms70017020sjms80018015sjms90019013sjmsa001a009";
		$kpluzschool="yes"; $validpass=$pass; $offset=659061;
		}
		
	//Thels Muslim-Christian Academy, Inc.: tmca thels
	if (md5($username2)=="ba95e309e54d9b845c97e0d70fa25bb9" and md5($pass)=="7c4cdba8fd629bbfea4ab09dd69e5fbf") 
		{
 		$schoolfull="Thels Muslim-Christian Academy, Inc.";
 		$grds=array("0","1","2","3","4","5","6");
		$chkstr="tmca03010319tmca13011312tmca23012309tmca33013308tmca43014304tmca53015307tmca63016304";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
		}
		
	//Children's Garden: cgph children
	if (md5($username2)=="a5c65e7153e6673044bcc0471aba2f75" and md5($pass)=="268184c12df027f536154d099d497b31") 
		{
 		$schoolfull="Children's Garden of the Philippines";
 		$grds=array("1","3","5","6");
		$chkstr="*cgph10011001cgph30013001cgph50015002cgph60016001";
		$kpluzschool="yes"; $validpass=$pass; $offset=659061;
		}
		
	//Grace Baptist Academy of Baguio City: gbcs gracebaptist
	if (md5($username2)=="b29258750e6d94f35e01e5dcf79abd8c" and md5($pass)=="7fe1efdd4b917e1217ac9dba4e0ad637") 
		{
 		$schoolfull="Grace Baptist Academy of Baguio City";
 		$grds=array("3","4","5","6","7","8","9","10");
		$chkstr="*gbcs34013412gbcs44014415gbcs54015414gbcs64016412gbcs74017426gbcs84018415gbcs94019412gbcse001e007";
		$kpluzschool="yes"; $validpass=$pass; 
		}
		
	//Pasig Community School Foundation: pcsf pasigcsf
	if (md5($username2)=="be0da1e318143c56af681d0df8f4fb76" and md5($pass)=="950843ad63b66f60c3e6afad42513ebd") 
		{
 		$schoolfull="Pasig Community School Foundation";
 		$grds=array("1","2","3","4","5","6","7","8","9","10","11","12");
		$chkstr="*pcsf10011016pcsf20012024pcsf30013016pcsf40014016pcsf50015018pcsf60016010pcsf70017017pcsf80018017pcsf90019023pcsfa001a012pcsfC001pcsfC007pcsfF001pcsfF007pcsfP001pcsfP009pcsfS001pcsfS009";
		$kpluzschool="yes"; $validpass=$pass; 
		}
		
		
	//JEM INTERNATIONAL WISDOMEMPIRE LEARNING AND DEVELOPMENT CENTER: jemi jemidavao
	if (md5($username2)=="455d8396a20b080df268c01f108b9491" and md5($pass)=="08d19a1712b102fe1acccfc33b74d917") 
		{
 		$schoolfull="JEM INTERNATIONAL WISDOMEMPIRE LEARNING AND DEVELOPMENT CENTER";
 		$grds=array("1","2","3","4","5","6");
		$chkstr="*jemi10011005jemi20012005jemi30013005jemi40014005jemi50015005jemi60016005";
		$kpluzschool="yes"; $validpass=$pass; 
		}
		
	//Sir Raymiel Academy, Incorporated: srai raymiel
	if (md5($username2)=="994de8c2a67abde8af1aee46c13a2d83" and md5($pass)=="d7faddab6a668016074ab4719470d4a0") 
		{
 		$schoolfull="Sir Raymiel Academy, Incorporated";
 		$grds=array("0","3","4","6","7","9","10");
		$chkstr="*srai00010003srai30013001srai40014001srai60016003srai70017003srai90019002sraia001a004";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
		}

		
	//Holy Triune God Learning Center: htgs holytriune
	if (md5($username2)=="867d4ce03071f3ea8998ff7f062b613d" and md5($pass)=="2417c12f7786d80850de38a892d4c70d") 
		{
 		$schoolfull="Holy Triune God Learning Center";
 		$grds=array("0","1","2","3","4","6");
		$chkstr="*srai00010003srai30013001srai40014001srai60016003srai70017003srai90019002sraia001a004";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
		}

	//Jack and Jill Learning Center Alternative School, Inc.: jjcs jackjill
	if (md5($username2)=="bbedf387680c1caad806b820c51e982c" and md5($pass)=="07c72e30ccfcb9b130abd0a33460aadb") 
		{
 		$schoolfull="Jack and Jill Learning Center Alternative School, Inc.";
 		$grds=array("1","2");
		$chkstr="*jjcs10011005jjcs20012006";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
		}
		
	//Living Faith School of Cavite: fsoc livingfaith
	if (md5($username2)=="f57f87b651a4771da205db524e73fb61" and md5($pass)=="621e58e57941d11f5d94a1ee08ab26f7") 
		{
 		$schoolfull="Living Faith School of Cavite";
 		$grds=array("0", "1","2","3","4","5","6");
		$chkstr="*fsoc00010001fscoc10011001fsoc20012007fsoc30013007fsoc40014009fsoc50015006fsoc60016009";
		$kpluzschool="yes"; $validpass=$pass; $offset=659061;
		}		
		
	//Smartkids Learning Playhouse, Inc.: skpi splayhouse
	if (md5($username2)=="2a1694cb6757ef2e5932a8591127db81" and md5($pass)=="b3a1e3e5074efca8ee82c70cd344aebc") 
		{
 		$schoolfull="Sir Raymiel Academy, Incorporated";
 		$grds=array("0","3","4","6","7","9","10");
		$chkstr="*skpi00010002skpi10011001skpi20012005skpi30013001skpi40014001skpi50015002skpi60016002";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
		}
		
		
	//Tubod Christian Academy: tcac tubodca
	if (md5($username2)=="b118c49390da6f1ba02bf0d4f8e9e3dc" and md5($pass)=="dc8f115788fb55e85cddd225c0b37384") 
		{
 		$schoolfull="Tubod Christian Academy";
 		$grds=array("0","1","2","3","4","6");
		$chkstr="*tcac00010009tcac10011012tcac20012009tcac30013012tcac40014008tcac50015008tcac60016011";
		$kpluzschool="yes"; $validpass=$pass; $offset=9892906;
		}
		
	//Sto. Nino National High School of Bacolod: snhs stonino
	if (md5($username2)=="b2ded3284539cb1f8712d7ccc4f3af76" and md5($pass)=="3e1de04de0fb2c30112713a712721e11") 
		{
 		$schoolfull="Sto. Nino National High School of Bacolod";
 		$grds=array("0","1","2","3","5","6");
		$chkstr="*snhs00010005snhs10011010snhs20012013snhs30013007snhs50015007snhs60016005";
		$kpluzschool="yes"; $validpass=$pass; $offset=9892906;
		}
		
	//Irisan Children's Learning Center: icci irisan
	if (md5($username2)=="8ea5a48f0b70b309b970dbca4e98f40a" and md5($pass)=="596486ab8c29c9aaf4cf52a04b9c7324") 
		{
 		$schoolfull="Irisan Children's Learning Center";
 		$grds=array("1","2","3","4","5","6","7","8","9","10");
		$chkstr="*icci10011009icci20012003cci30013003icci40014005icci50015006icci60016007icci70017003icci80018004icci90019008iccia001a003";
		$kpluzschool="yes"; $validpass=$pass; $offset=12963574;
		}
		
	//Homeschooling Buddy: hbkm hsbuddy
	if (md5($username2)=="7578779914dada8b467bbe79abbd6879" and md5($pass)=="0fcb70bf614fad4aaee307c7256e9b32") 
		{
 		$schoolfull="Homeschooling Buddy";
 		$grds=array("2","3","4","5","6");
		$chkstr="*hbkm23012301hbkm33013301hbkm43014303hbkm53015301hbkm63016301";
		$kpluzschool="yes"; $validpass=$pass; $offset=659061;
		}
		
	//individual cards: hmsk homeusers
	if (md5($username2)=="eeab8bfc486e3e8df0ae0dfdd37ea5d9" and md5($pass)=="9525656fc90bdc1a020faba1a0f34969") 
		{
 		$schoolfull="Home Users";
 		$grds=array("2","3","5","6","9","10");
		$chkstr="*hosk21012101hosk30013001hosk50015001hosk61016102hosk91019101hoska001a001";
		$kpluzschool="yes"; $validpass=$pass;
		}
		
	//individual cards: hosk homesk
	if (md5($username2)=="eefc3e185d0bbe82c54f6e1562bcfe05" and md5($pass)=="3b62bf8d5002fd38e76140640c24a97d") 
		{
 		$schoolfull="Home Users";
 		$grds=array("0","1","2","3","4","5","6","7","8","9","10");
		$chkstr="*hmsk21012101hmsk61016102hmsk71017101hmsk81018101hmsk91019101";
		$kpluzschool="yes"; $validpass=$pass;
		}

	if 	($kpluzschool=="yes"	or $mpluzschool=="yes")
		{
		$validpass=$pass;
		}


?>
