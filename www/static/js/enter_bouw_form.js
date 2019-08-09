addEventListener("load", init, false);

document.querySelector("#btnAddAct").addEventListener("click", addActSection, false);

let actCount;

function init() {
	actCount = 0;
	addActSection();
}

function addActSection() {
	++actCount;
	let section = document.createElement("div");
	section.innerHTML = `<fieldset>`+
		`					<legend>Activiteit ${actCount}</legend>`+
		``+
		`						<div class="form-group row">`+
		`							<label class="col-sm-3 col-form-label" for="act${actCount}_time">Datum</label>`+
		`							<div class="col-sm-9">`+
		`								<input class="form-control" name="acts[act${actCount}][time]" id="act${actCount}_time">` +
		`							</div>`+
		`						</div>`+
		``+
		`						<div class="form-group row">`+
		`							<label class="col-sm-3 col-form-label" for="act${actCount}_name">Activiteit</label>`+
		`							<div class="col-sm-9">`+
		`								<input type="text" name="acts[act${actCount}][name]" id="act${actCount}_name" class="form-control" autocomplete="off">` +
		`							</div>`+
		`						</div>`+
		``+
		`						<div class="form-group row">`+
		`							<label class="col-sm-3 col-form-label" for="act${actCount}_remarks">Opmerkingen</label>`+
		`							<div class="col-sm-9">`+
		`								<input type="text" name="acts[act${actCount}][remarks]" id="act${actCount}_remarks" class="form-control" autocomplete="off">` +
		`							</div>`+
		`						</div>`+
		``+
		`					</fieldset>`;

	document.querySelector("#acts").appendChild(section);

	let $datepicker = $(`#act${actCount}_time`).datetimepicker({
		uiLibrary: 'bootstrap4',
		format: 'yyyy-mm-dd HH:MM'
	});
}
