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
		`							<label class="col-sm-3 col-form-label" for="acts[act${actCount}][time]">Datum</label>`+
		`							<div class="col-sm-9">`+
		`								<input type="date" name="acts[act${actCount}][time]" id="acts[act${actCount}][time]" class="form-control" autocomplete="off">` +
		`							</div>`+
		`						</div>`+
		``+
		`						<div class="form-group row">`+
		`							<label class="col-sm-3 col-form-label" for="acts[act${actCount}][name]">Activiteit</label>`+
		`							<div class="col-sm-9">`+
		`								<input type="text" name="acts[act${actCount}][name]" id="acts[act${actCount}][name]" class="form-control" autocomplete="off">` +
		`							</div>`+
		`						</div>`+
		``+
		`						<div class="form-group row">`+
		`							<label class="col-sm-3 col-form-label" for="acts[act${actCount}][remarks]">Opmerkingen</label>`+
		`							<div class="col-sm-9">`+
		`								<input type="text" name="acts[act${actCount}][remarks]" id="acts[act${actCount}][remarks]" class="form-control" autocomplete="off">` +
		`							</div>`+
		`						</div>`+
		``+
		`						<div class="form-group row">`+
		`							<label class="col-sm-3 col-form-label" for="acts[act${actCount}][responsible]">Responsible</label>`+
		`							<div class="col-sm-9">`+
		`								<input type="text" name="acts[act${actCount}][responsible]" id="acts[act${actCount}][responsible]" class="form-control" autocomplete="off">` +
		`							</div>`+
		`						</div>`+
		`					</fieldset>`;

	document.querySelector("#acts").appendChild(section);
}