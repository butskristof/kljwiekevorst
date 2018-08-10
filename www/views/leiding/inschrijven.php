<?php
	$this->layout('template', ['title' => 'Nieuw lid ingeven - KLJ Wiekevorst', 'id' => 'inschijven']);

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}



?>

<div class="container">
	<h1>Nieuw lid ingeven</h1>

	<div class="row">
		<div class="col-md-10 offset-1">

			<form action="#" method="post">


<!--				VOORNAAM-->

				<div class="form-group row">
					<label for="first_name" class="col-sm-3 col-form-label">Voornaam</label>
					<div class="col-sm-9">
						<input type="text" name="first_name" id="first_name" class="form-control">
					</div>
				</div>

<!--				ACHTERNAAM-->

				<div class="form-group row">
					<label for="last_name" class="col-sm-3 col-form-label">Achternaam</label>
					<div class="col-sm-9">
						<input type="text" name="last_name" id="last_name" class="form-control">
					</div>
				</div>

<!--				GESLACHT -->

				<div class="form-group row">
					<label for="gender" class="col-sm-3 col-form-label">Geslacht</label>
					<div class="col-sm-9">
						<select name="gender" id="gender" class="form-control">
							<option value="male">Man</option>
							<option value="female">Vrouw</option>
						</select>
					</div>
				</div>

<!--				GEBOORTEDATUM -->
				<div class="form-group row">
					<label for="dateofbirth" class="col-sm-3 col-form-label">Geboortedatum</label>
					<div class="col-sm-9">
						<input name="dateofbirth" id="dateofbirth" class="form-control">
					</div>
				</div>


<!--				EMAIL -->

				<div class="form-group row">
					<label for="email" class="col-sm-3 col-form-label">E-mail</label>
					<div class="col-sm-9">
						<input type="email" class="form-control" name="email" id="email">
					</div>
				</div>

				<fieldset>
					<legend>Adres</legend>

					<div class="form-group row">
						<label for="address_nr" class="col-sm-3 col-form-label">Huisnummer</label>
						<div class="col-sm-9">
							<input type="text" name="address_nr" id="address_nr" class="form-control">
						</div>
					</div>

					<div class="form-group row">
						<label for="address_street" class="col-sm-3 col-form-label">Straat</label>
						<div class="col-sm-9">
							<input type="text" name="address_street" id="address_street" class="form-control">
						</div>
					</div>

					<div class="form-group row">
						<label for="address_city" class="col-sm-3 col-form-label">Plaats</label>
						<div class="col-sm-9">
							<input type="text" name="address_city" id="address_city" class="form-control">
						</div>
					</div>

					<div class="form-group row">
						<label for="address_postcode" class="col-sm-3 col-form-label">Postcode</label>
						<div class="col-sm-9">
							<input type="text" name="address_city" id="address_city" class="form-control">
						</div>
					</div>
				</fieldset>

				<button type="button" id="btnAddAct" class="btn btn-secondary">Activiteit toevoegen</button>
				<button type="submit" class="btn btn-primary">Indienen</button>

			</form>

		</div>
	</div>
</div>

<?php $this->start('extracss') ?>
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<?php $this->stop() ?>

<?php $this->start('extrajs') ?>
<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
<script>
	$('#dateofbirth').datepicker({
		uiLibrary: 'bootstrap4',
		format: 'yyyy-mm-dd'
	});
</script>
<?php $this->stop() ?>

