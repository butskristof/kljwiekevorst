<?php
	$this->layout('template', ['title' => 'Activiteiten ingeven - KLJ Wiekevorst', 'id' => 'enter_acts', 'extracss' => '/static/css/acts.css'])
?>

<div class="container">
	<h1>Activiteiten ingeven</h1>

	<?php
		require_once 'db.php';

		$db = new Db();

		if (!empty($_POST)) {
			// handle submission
			$agegroup = $_POST['acts_for'];

			foreach ($_POST['acts'] as $act) {
				// insert into db
				$query = "INSERT INTO `acts`(`agegroup`, `date`, `name`, `remark`, `responsible`) VALUES ('{$agegroup}','{$act[time]}','{$act[name]}','{$act[remarks]}','{$act[responsible]}')";

				$result = $db->query($query);
			}


		} else {
			$query = "SELECT `name` FROM `agegroups`";
			$agegroups = $db->select($query);
			?>

	<div class="row">
		<div class="col-md-10 offset-1">

			<form action="#" method="post">

				<div class="form-group">
					<label for="acts_for">Activiteiten voor</label>
					<select class="form-control" id="acts_for" name="acts_for">
						<?php
						foreach ($agegroups as $ag) {
							?><option><?=$ag[name]?></option><?php
						}
						?>
					</select>
				</div>

				<div id="acts"></div>

				<button type="button" id="btnAddAct" class="btn btn-secondary">Activiteit toevoegen</button>
				<button type="submit" class="btn btn-primary">Indienen</button>

			</form>

		</div>
	</div>
</div>

<?php
}

?>

<script src="/static/js/enter_acts_form.js"></script>
