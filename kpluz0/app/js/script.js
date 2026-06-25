const e = React.createElement;

document.addEventListener("DOMContentLoaded", function() {
	initToggle();
	initScrollMagic();
	initHeaderMargin();
});

window.addEventListener("resize", function(){
	initHeaderMargin();
});

function _scrollTo(x, y){
	window.scrollTo(x, y);
}

function scrollToTop(){
	_scrollTo(0, 0);
}

function initToggle(){
	/* Setup the menu hamburger button for mobile */
	var span = e('span', {className: 'shadow transition'}, null);
	var HeaderToggle = e(ButtonClass, {
		className: 'toggle',
		onClick: function(){
			document.getElementById('header').classList.toggle('active');
		}
	}, span,span,span);

	ReactDOM.render(HeaderToggle, document.getElementById('toggle-container'));
}

function initHeaderMargin(){
	var headerHeight = document.getElementById('header').clientHeight + "px";
	document.getElementById('content').style.marginTop = headerHeight;
}

function initScrollMagic(){
	var	controller = new ScrollMagic.Controller();
	var triggerElement = document.getElementById('indicator');
	var	scene = new ScrollMagic.Scene({triggerElement: triggerElement})
						.setClassToggle('header', 'scroll')
						.addTo(controller);
}

/* AJAX functions */
function fetchData(json, callback){

    var url = "/app/util/ajax.php";
    
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST",url,true);
	xmlhttp.setRequestHeader("Content-type", "application/json");

    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
        	console.log(this.responseText);
        	var result = JSON.parse(this.responseText);
        	if(callback!=undefined){
        		callback(result);
        	}
        }
    };

    xmlhttp.send(JSON.stringify(json));
}

/* Misc/util functions */
function parseQueryString(query) {
  var vars = query.split("&");
  var query_string = {};
  for (var i = 0; i < vars.length; i++) {
    var pair = vars[i].split("=");
    // If first entry with this name
    if (typeof query_string[pair[0]] === "undefined") {
      query_string[pair[0]] = decodeURIComponent(pair[1]);
      // If second entry with this name
    } else if (typeof query_string[pair[0]] === "string") {
      var arr = [query_string[pair[0]], decodeURIComponent(pair[1])];
      query_string[pair[0]] = arr;
      // If third or later entry with this name
    } else {
      query_string[pair[0]].push(decodeURIComponent(pair[1]));
    }
  }
  return query_string;
}

function getUrlParameter(variable){
	var query = window.location.search.substring(1);
	var qs = parseQueryString(query);
	return qs[variable];
}

/* Generic React.js Components */
var ButtonClass = React.createClass({
	getDefaultProps: function(){
		return {
			isDisplayed: true,
			className: 'cta shadow'
		};
	},
	render: function(){
		if(this.props.isDisplayed){
			return e('div', this.props, this.props.children);
		}
		return null;
	}
})

var Heading = React.createClass({

	render: function(){
		var mainTitle = e('h1', {className: 'text-montserrat text-thin'}, this.props.mainTitle);
		var subTitle = e('h5', {className: 'text-montserrat text-thin'}, this.props.subTitle);
		return e('div', {className: 'heading text-center padding-10 animated fadeInDown'}, mainTitle, subTitle);
	}

});

var Spinner = React.createClass({

	render: function(){
		return e('div', {className: 'spinner'}, null);
	}

});
