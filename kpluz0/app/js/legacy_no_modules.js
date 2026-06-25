/* javascript for supporting legacy kpluz. Requires jQuery */


var iframeHeight = 0;

var spinner = $('.spinner-container');
$(document).ready(function(){
	$(spinner).hide();


	var headerHeight = $('header').outerHeight();
	iframeHeight = $(window).height() - headerHeight;

	$('#content').css('height', iframeHeight);

	var _subject = decodeURI(getUrlParameter('s'));
	console.log(_subject);
	createIframeContainer(_subject);

});


function createIframeContainer(src){
	$('#content-container').append('<iframe id="iframe" src="'+ src+'"></iframe>')
	$('#iframe').on('load',function(){
		
		var stylesheet = $("<link></link>",{rel: 'stylesheet', href: '/app/css/legacy.css'});
		// var height	=	$('#iframe').contents().find('body').outerHeight();
		$('#iframe').contents().find('body').append(stylesheet);
		$('#iframe').css('height', iframeHeight);
		$('footer').remove();
		

	});
}