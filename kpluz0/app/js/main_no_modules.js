/* requires script.js */
console.log('main_no_modules.js started.');

document.addEventListener("DOMContentLoaded", function() {
    console.log('DOMContentLoaded fired.');
    if (typeof React === 'undefined' || typeof ReactDOM === 'undefined') {
        console.error('React or ReactDOM not loaded.');
        return;
    }
    initReactDOM();
});

var MenuNavigation;

// Use absolute paths, now point to home.php with subject parameter
// Mandarin removed from all grade levels
var _subjectsSetup = [
    { title: "English", image: "/arville/kpluz0/images/subjects/png/1x/english.png", url: "/arville/kpluz0/home.php?subject=English" },
    { title: "Math", image: "/arville/kpluz0/images/subjects/png/1x/math.png", url: "/arville/kpluz0/home.php?subject=math" },
    { title: "Science", image: "/arville/kpluz0/images/subjects/png/1x/science.png", url: "/arville/kpluz0/home.php?subject=science" },
    { title: "Araling Panlipunan", image: "/arville/kpluz0/images/subjects/png/1x/ap.png", url: "/arville/kpluz0/home.php?subject=AP" },
    { title: "Filipino", image: "/arville/kpluz0/images/subjects/png/1x/filipino.png", url: "/arville/kpluz0/home.php?subject=Filipino" },
    { title: "MAPEH", image: "/arville/kpluz0/images/subjects/png/1x/mapeh.png", url: "/arville/kpluz0/home.php?subject=mapeh" },
    { title: "TLE", image: "/arville/kpluz0/images/subjects/png/1x/tle.png", url: "/arville/kpluz0/home.php?subject=tle" },
    { title: "GMRC", image: "/arville/kpluz0/images/subjects/png/1x/gmrc.png", url: "/arville/kpluz0/home.php?subject=gmrc" }
];

function initReactDOM() {
    console.log('initReactDOM() called.');
    try {
        if (typeof e === 'undefined') {
            console.warn('e (React.createElement) not defined; defining it.');
            var e = React.createElement;
        }
        var _Navigation = e(Navigation, {subjects: _subjectsSetup}, null);
        var container = document.getElementById('content-container');
        if (!container) {
            console.error('#content-container not found.');
            return;
        }
        MenuNavigation = ReactDOM.render(_Navigation, container);
        console.log('ReactDOM.render() completed.');
    } catch (error) {
        console.error('Error in initReactDOM():', error);
        document.getElementById('content-container').innerHTML = 
            '<div class="text-center text-danger"><h3>Error: ' + error.message + '</h3></div>';
    }
}

/* React Components (unchanged) */
var SubjectCardMenu = React.createClass({
    render: function() {
        var children = this.props.items.map(function(_subject, i) {
            return e(SubjectCard, {
                title: _subject.title,
                image: _subject.image,
                url: _subject.url,
                key: i
            });
        });
        return e('div', {className: 'subjects container'}, children);
    }
});

var SubjectCard = React.createClass({
    getDefaultProps: function() {
        return { title: 'Subject', image: '', subjectID: 0 };
    },
    goToModules: function() {
        window.location = this.props.url;
    },
    render: function() {
        return e('div', {
            className: 'subject-card transition shadow round-corner-20',
            onClick: this.goToModules
        },
            e('img', {className: 'svg-icon transition', src: this.props.image}, null),
            e('span', {className: 'title text-center transition'}, this.props.title)
        );
    }
});

var Navigation = React.createClass({
    getDefaultProps: function() { return { subjects: [] }; },
    render: function() {
        return e('div', null,
            e(Heading, {mainTitle: 'Welcome', subTitle: 'Click on a subject to begin.'}, null),
            e(SubjectCardMenu, {items: this.props.subjects}, null)
        );
    }
});

console.log('main_no_modules.js finished loading.');