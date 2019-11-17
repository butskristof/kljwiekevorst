addEventListener('load', init, false);
let calendar;

function init() {
	setupCalendar();
	checkCalendarFormat();
	addEventListener('resize', checkCalendarFormat, false);
}

function setupCalendar() {
	const calendarEl = document.querySelector("#calendar");

	const y = 2019;
	const m = 10;

	calendar = new FullCalendar.Calendar(calendarEl, {
		plugins: ['dayGrid', 'list'],
		defaultView: 'dayGridMonth',
		locale: 'nl',
		header: {
			left: 'prev,next today',
			center: 'title',
			right: ''
		},
		height: 'auto',
		firstDay: 1,
		eventTextColor: 'white',
		displayEventTime: false,
		events
	});

	calendar.render();
}

function checkCalendarFormat() {
	const width = window.innerWidth;
	if (width > 768) {
		changeToGrid();
	} else {
		changeToList();
	}
}

function changeToList() {
	calendar.changeView('listMonth', new Date());
}

function changeToGrid() {
	calendar.changeView('dayGridMonth');
}
