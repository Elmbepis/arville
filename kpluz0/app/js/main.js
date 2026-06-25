/* requires script.js */
document.addEventListener("DOMContentLoaded", function() {
	initReactDOM();
});

var MenuNavigation;

function initReactDOM(){
		
		fetchAllModules(function(data){
			console.log(data);
			_Navigation = e(Navigation, {modules: data.Modules, subjects: data.Subjects}, null);
			MenuNavigation = ReactDOM.render(_Navigation, document.getElementById('content-container'));
    		setNavigationState(history.state);
		});

}


window.addEventListener('popstate', function(event) {
    	setNavigationState(history.state);
}, false);


function setNavigationState(state){
	if(history.state != null){
    	MenuNavigation.setState(state);
    }
}

function storeNavigationState(state){
	var _state = state;
	history.pushState(_state, "", "?subject=" + _state.currentSubjectID);
}

/* AJAX functions */
function fetchSubjects(callback){   
	var json = {requestType: 'getSubjectsForUser'};
	fetchData(json, callback);
}

function fetchAllModules(callback){    
	var json = {requestType: 'getModulesForUser'};
	fetchData(json, callback);
}

/* React.js Components */
var ModuleNavigation = React.createClass({

	getDefaultProps: function(){
		return {
			isDisplayed: true
		};
	},

	listenToChildren: function(params){		
		/* simply pass update from child subject card to parent container */
		this.updateParent(params);
	},

	updateParent: function(params){
		/* inform the parent that the current selected module has changed */
		if(this.props.updateParent != null){
			this.props.updateParent(params);
		}
	},

	render: function(){		
		var style = {};

		if(this.props.currentSubjectID == -1){
			style = {display: 'none'}
		}

		var children = this.props.items.map(
			(_module) => e(ModuleNavigationCard,{ 
					key: _module.ModuleID,
					updateParent: this.listenToChildren,
					module: _module,
					currentSubjectID: this.props.currentSubjectID,
					currentModuleID: this.props.currentModuleID
				}, 
				null)
			);

		return e('div', {className: 'modules container', style: style}, children);
	}

});

var ModuleNavigationCard = React.createClass({

	getDefaultProps: function(){
		return {
			isDisplayed: true,
			currentSubjectID: -1,
			currentModuleID: -1,
			style: {
				display: 'none'
			}
		};
	},

	updateParent: function(){
		/* inform the parent that the current selected module has changed */
		if(this.props.updateParent != null){
			this.props.updateParent(
				{
					currentModuleID: this.props.module.ModuleID,
					currentModuleName: this.props.module.ModuleName
				});
		}
	},

	navigateToQuestions: function(){
		if(this.props.module.ModuleID != this.props.module.ParentModuleID){
			// window.location = '/app/quiz.php?m=' + this.props.module.ModuleID;
			window.location = '/app/legacy.php?m=' + this.props.module.ModuleID;
		}
	},

	componentWillUpdate: function(nextProps, nextState){
		// const c = this.props;
		const c = nextProps;
		const d = this.renderingVars;
		var fkSubjectID = parseInt(c.module.fkSubjectID);	
		this.resetRenderingVars();

		if(c.currentSubjectID == fkSubjectID){
			d.style.display = 'block';				

			if(parseInt(c.module.ModuleID) == parseInt(c.module.ParentModuleID)){
				d.subModuleClass +='parent-module shadow round-corner-6';
				d.content = e('h1', {className: 'heading text-left padding-20 text-white text-montserrat'}, this.props.module.ModuleName);
			}else if(parseInt(c.module.ModuleID) != parseInt(c.module.ParentModuleID)){
				d.subModuleClass +='sub-module shadow round-corner-6';
				var chevron = e('img', {src:'/images/svg/chevron_right.svg', className: 'icon'}, null)
				d.content = e('h3', {className: 'text-montserrat padding-20 text-normal'}, this.props.module.ModuleName, chevron);
			}
		
		}
	},
	
	resetRenderingVars: function(){
		const d = this.renderingVars;
		d.style = {display: 'none'}
		d.subModuleClass = ' ';
		d.content = null;
	},

	renderingVars: {},

	render: function(){		
		const c = this.renderingVars;
		return e('div', {className: 'module-card transition animated slideInLeft' + c.subModuleClass, style: c.style, onClick: this.navigateToQuestions}, c.content);		
	}

});

var SubjectCardMenu = React.createClass({

	listenToChildren: function(params){		
		/* simply pass update from child subject card to parent container */
		this.updateParent(params);
	},

	updateParent: function(params){
		/* inform parent that the subject ID has changed */
		if(this.props.updateParent != null){
			this.props.updateParent(params);
		}
	},

	render: function(){
		var style = {};
		
		if(this.props.currentSubjectID > -1){
			style = {display: 'none'}
		}

		var children = this.props.items.map((_subject) => e(SubjectCard,{
									subjectID: _subject.SubjectID, 
									title: _subject.SubjectName, 
									image: _subject.ImagePath, 
									legacyUrl: _subject.legacyUrl,
									updateParent: this.listenToChildren,
									key: _subject.SubjectID
								},
				null));
		return e('div', {className:'subjects container', style: style}, children);
		
	}

})

var SubjectCard = React.createClass({

	getDefaultProps: function(){
		return {
			title: 'title for subject',
			image: '',
			subjectID: 0,
			updateParent: function(){console.log('This is a subject card without a callback.')}
		};
	},

	updateParent: function(){		/* inform parent that the subject ID has changed */		/* inform parent that the subject ID has changed */
		if(this.props.updateParent != null){
			this.props.updateParent({
				currentSubjectID : this.props.subjectID,
				currentSubjectName: this.props.title,
				currentModuleID: -1
			});
		}
	},

	render: function(){
		var image = e('img', {className: 'svg-icon transition', src: this.props.image}, null);
		var title = e('span', {className: 'title text-center transition'}, this.props.title)
		return e('div', {className: 'subject-card transition shadow round-corner-20', subjectID: this.props.subjectID, onClick: this.updateParent}, image, title)
	}
})

var Navigation = React.createClass({	
	
	getInitialState: function(){
		return {
			currentSubjectID: -1,
			currentSubjectName: null,
			currentModuleID: -1,
			currentModuleName: null,
			previousState: null
		};
	},

	getDefaultProps: function(){
		return {
		  modules: []
		};
	},

	listenToChildren: function(params){
		params.previousState = this.state;
		this.setState(params);
		storeNavigationState(params);
	},

	backButtonPressed: function(params){
		if(this.state.previousState!=null){
			this.setState(this.state.previousState);
		}
	},

	parseStateData: function(state){
		/*
		  returns:
		  			0 - if navigation is at the top level (subjects), 				<<this is the initial state: navigation has no previous state
		  			1 - if navigation is at the level directly below the top level  <<the previous state is the initial state
		  			2 - if navigation is at a lower/deeper level    				<<the state does not have a null previous state
		  			-1 - if navigation state is invalid
		*/
		var result = -1;

		if(state.currentSubjectID == -1 && state.currentModuleID == -1){
			result = 0;
		}else if(state.currentSubjectID > -1 && state.currentModuleID == -1){
			result = 1;
		}else if(state.currentSubjectID > -1 && state.currentModuleID > -1){
			result = 2;
		}
		return result;		
	},

	/* rendering variables */
	renderingVars:  {},

	resetRenderingVars: function(state){
		const r = this.renderingVars;
		r.NavTitle = 'Welcome';
		r.NavSubTitle = 'Click on a subject to begin.';
		r.NavControlsBreadcrumb = [];
		r.NavControlsClass = 'navigation-controls container animated transition ';
		r.NavControlsText = '';
		r.NavControlsTextClass = 'navigation-controls-heading animated transition';
		r.NavBackBtnClass = 'navigation-button animated transition ';
		r.NavBackBtnText = 'Subjects';
		r.NavBackBtnIsDisplayed = false;
		r.ParsedState = this.parseStateData(state);
	},

	componentWillMount: function(){
		this.resetRenderingVars(this.getInitialState());
		this.renderingVars.NavBackBtnClass += 'inactive';
		this.renderingVars.NavControlsClass += 'inactive';
	},

	componentWillUpdate: function(nextProps, nextState){

		const r = this.renderingVars;
		this.resetRenderingVars(nextState);

		/* prepare details prior to rendering */
		var _nextStateVal = this.parseStateData(nextState);
		switch(_nextStateVal){
			case 0:
					r.NavBackBtnClass += 'inactive';
					r.NavControlsClass += 'inactive';
					break;
			case 1:
					r.NavControlsText = nextState.currentSubjectName;
					r.NavBackBtnClass += 'active';
					r.NavControlsClass += 'active';
					r.NavTitle = e('span', {className: 'text-fredoka-one'}, nextState.currentSubjectName);
					r.NavSubTitle = 'Select a module to study.';
					r.NavBackBtnIsDisplayed = true;
					break;
			case 2:
					r.NavControlsText = nextState.currentModuleName;

					if(nextState.previousState.currentModuleID == -1){
						r.NavBackBtnText = nextState.previousState.currentSubjectName;
					}else{
						r.NavBackBtnText = nextState.previousState.currentModuleName;
					}

					r.NavBackBtnClass += 'active';
					r.NavControlsClass += 'active';
					r.NavTitle = e('span', {className: 'text-fredoka-one'}, nextState.currentModuleName);
					r.NavSubTitle = 'Select a module to practice.';
					r.NavBackBtnIsDisplayed = true;
					break;
			default:
					break;
		}
	},

	componentDidUpdate: function(prevProps, prevState){
		console.log('Navigation updated. Current state:')
		console.log(this.state);
	},

	render: function(){
		scrollToTop();
		const r = this.renderingVars;
		var _Heading = e(Heading, {mainTitle: r.NavTitle, subTitle: r.NavSubTitle}, null);		
		var _SubjectCardMenu = e(SubjectCardMenu, 
			{	
				items: this.props.subjects,
				currentSubjectID: this.state.currentSubjectID,
				currentModuleID: this.state.currentModuleID,
				updateParent: this.listenToChildren
			}, 
			null);
		var _ModuleNavigation = e(ModuleNavigation, 
			{
				items: this.props.modules,
				currentSubjectID: this.state.currentSubjectID,
				currentModuleID: this.state.currentModuleID,
				updateParent: this.listenToChildren
			}, 
			null);
		
		var _BackButtonChevron = e('img', {src: '/images/SVG/chevron_left.svg'}, null);
		var _BackButtonText = e('div', {className: 'padding-20 text-center navigation-button-text'}, r.NavBackBtnText);
		var _BackButton = e(ButtonClass, {onClick: this.backButtonPressed, className: r.NavBackBtnClass}, _BackButtonChevron, _BackButtonText);	
		var _NavControlsTitle = e('div',{className: r.NavControlsTextClass}, _Heading )
		var _NavControls = e('div', {className: r.NavControlsClass}, _BackButton, _NavControlsTitle);
		return e('div', {className: 'navigation state-' + r.ParsedState}, _Heading, _NavControls, _SubjectCardMenu, _ModuleNavigation);
	}

});