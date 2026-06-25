/* requires script.js */
document.addEventListener("DOMContentLoaded", function() {
	initReactDOM();
});

var	_QuizContainer;

function initReactDOM(){

		_QuizContainer = e(QuizContainer, null, null);
		ReactDOM.render(_QuizContainer, document.getElementById('content-container'));	
	
}

/* React.js Components */

/*
Quiz states:

-FetchingNextQuestion (AJAX)
-DisplayQuestion
-SubmittingNextQuestion (AJAX)
-DisplayResult

Quiz page components:
-Score
-Result
-Question
-Controls

Quiz controls:
-Submit
-skip

*/


var QuizContainer = React.createClass({

	getInitialState: function(){
		return{
			QuestionData: {},
			isRendering: true
		}
	},

	skipQuestion: function(){
		this.setState({isRendering: true});
		this.requestQuestionFromServer();
	},

	sendAnswerToServer: function(){
		
	},

	requestQuestionFromServer: function(){
		fetchRandomQuestion(function(fetchedQuestionData){
			this.setState({QuestionData: fetchedQuestionData, isRendering: false})
		}.bind(this));
	},

	renderingVars: {},

	resetRenderingVars: function(){
		const c = this.renderingVars;
		c.contentClass = '';
	},

	componentWillMount: function(){	
		this.requestQuestionFromServer();
	},

	componentWillUpdate: function(nextProps, nextState){
		const c = this.renderingVars;
		this.resetRenderingVars();

		if(!nextState.isRendering){
			/* not rendering */
			c.contentClass = ' animated slideInRight';
			c.contentClass  =' ';
		}else{
			c.contentClass  =' ';
		}

		// console.log('Data received: ');
		// console.log(nextState.QuestionData);
	},

	inputChanged: function(e){
		console.log(e);
		var params = {
			InputValues: {}
		};
		params.InputValues[e.target.name] = e.target.value;
		this.setState(params);
	},

	render: function(){
		const c = this.renderingVars;
		const qData = this.state.QuestionData;
		var heading = e(Heading, {mainTitle: qData.ModuleName}, null);
		if(!this.state.isRendering){
			var skipButton = e(ButtonClass, {onClick: this.skipQuestion}, 'Skip');
			var controls = e('div', {className: 'quiz-controls padding-10'}, skipButton);
			var content;
			if(qData.Content != null){
				content = qData.Content.map((item, i) => e(item.element, {className: item.className + ' ' + c.contentClass, key: i}, item.content));
			}

			var inputs;			
			if(qData.InputFields != null){
				inputs = qData.InputFields.map((item, i) => e('input', {type: item.type, name: item.name, key: i, onChange: this.inputChanged}, null));
			}

			var contentContainer = e('div', {className: 'quiz-content padding-30' + c.contentClass}, content, inputs);
		
		}else{
			var contentContainer = e('div', {className: 'quiz-content padding-10' + c.contentClass}, e(Spinner, null, null));
		}
		return e('div', {className: 'quiz-container padding-10 text-center ' + qData.QuestionType + ' ' + qData.Operation}, heading, contentContainer, controls);
	}

});

var ScoreContainer = React.createClass({
	render: function(){
		return e('div', {className: 'score-container'}, 'SCORE');
	}
});

var QuestionContainer = React.createClass({
	render: function(){
		return null;
	}
});


var AnswerField = React.createClass({

	render: function(){
		return e('input', this.props, null);
	}
});

/* AJAX calls for the quiz */
function fetchRandomQuestion(callback){
	var json = {requestType: 'fetchRandomQuestion', moduleID: getUrlParameter('m')};
	fetchData(json, function(fetchedQuestionData){
		// console.log('Fetched Random Question: ');
		// console.log(fetchedQuestionData);
		if(callback != null){
			callback(fetchedQuestionData);
		}
	});
}

function sendAnswers(callback){

}

