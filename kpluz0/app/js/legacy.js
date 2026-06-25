/* javascript for supporting legacy kpluz. Requires jQuery */

var spinner = $('.spinner-container');
$(document).ready(function(){
	var json = {requestType: 'getModuleData', moduleID: getUrlParameter('m')};
	fetchData(json, function(data){
		console.log(data);

		var subject = data.SubjectName;
		if(data.SubjectName == 'Araling Panlipunan'){
			subject = 'araling-panlipunan'
		}

		var src = '/' + subject.toLowerCase() +'/modules/'+data.LegacyUrl;
		console.log(src);
		createIframeContainer(src);

	});
});


function createIframeContainer(src){
	// $('head').append($("<link></link>",{rel: 'stylesheet', href: '/app/css/legacy.js'}));
	$('#content-container').append('<iframe id="iframe" class="" height="1000px" src="'+ src+'"></iframe>')

	$('#iframe').on('load',function(){
		$('#iframe').hide();
		$(spinner).show();
		var stylesheet = $("<link></link>",{rel: 'stylesheet', href: '/app/css/legacy.css'});
		$('#iframe').contents().find('body').append(stylesheet);
		
		$(stylesheet).on('load', function(){
			setTimeout(function() {
				$(spinner).hide();
				$('#iframe').show();
			}, 1200);
			$('footer').remove();
			$('#iframe').addClass('animated slideInLeft');
		});
	});
}