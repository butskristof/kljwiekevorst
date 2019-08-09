<?php
/**
 * Created by IntelliJ IDEA.
 * User: butskristof
 * Date: 2018-12-24
 * Time: 19:08
 */

$this->layout('template', ['title' => 'Activiteiten bouw ingeven - KLJ Wiekevorst', 'id' => 'enter_bouw']);

// function for form input validation/escaping
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data, ENT_QUOTES);
	return $data;
}

// load configuration
$config = parse_ini_file('../private/secrets/bouw.ini');
$pwhash = $config['pwhash'];

require_once 'db.php';

$db = new Db();

?>

<div class="container">
	<h1>Activiteiten bouw ingeven</h1>

	<div class="row">
		<div class="col-md-10 offset-1">
			<?php

				if (empty($_POST)) {
					// show login form
					?>

					<div class="loginform">
					<form action="#" method="post" name="login">
						<div class="form-group">
							<label for="password">Wachtwoord</label>
							<input type="password" class="form-control" name="password" id="password">
						</div>

						<input type="submit" name="submit_login" class="btn btn-primary">
					</form>
					</div>

				<?php
				} else {
					// determine whether logged in or submitted acts

					if (!empty($_POST['submit_login'])) {
						if (!password_verify($_POST['password'], $pwhash)) {
							// show error
							echo '<div class="alert alert-danger">Verkeerd wachtwoord.</div>';
						} else {
						// show act input form
						$query = "SELECT `name` FROM `agegroups`";
						$agegroups = $db->select($query);
						?>
						<form action="#" method="post">

							<div id="acts"></div>

							<button type="button" id="btnAddAct" class="btn btn-secondary">Activiteit toevoegen</button>
							<input type="submit" class="btn btn-primary" name="submit_acts" value="Indienen">

						</form>
						<?php
						}
					} else if (!empty($_POST['submit_acts'])) {
						// process form input data

						// initialise empty error array
						$errors = [];

						// initialise empty query string
						$fullquery = "";

						$actctr = 0;
						foreach ($_POST['acts'] as $act) {
							++$actctr;

							// test user input
							$act_date = test_input($act[time]);
							if ( !$act_date || strtotime($act_date) < strtotime('now')) {
								$errors[] = "Activiteit {$actctr}: datum ligt in het verleden of is ongeldig.";
							}

							$act_name = test_input($act[name]);
							if ( !$act_name ) {
								$errors[] = "Activiteit {$actnr}: naam is leeg.";
							}

							// these can be null
							$act_remarks = test_input($act[remarks]);
							$act_responsible = test_input($act[responsible]);

							// insert into db
							$query = "INSERT INTO `planningbouw`(`date`, `name`, `remark`) VALUES ('{$act_date}','{$act_name}','{$act_remarks}'); ";

							$fullquery .= $query;
						}

						if (empty($errors)) {
							$result = $db->multi_query($fullquery);

							echo '<div class="alert alert-success">Activiteiten doorgestuurd!</div>';
						} else {
							foreach ($errors as $error) {
								echo '<div class="alert alert-danger">Volgende fouten traden op:</div>';
								echo $error;
							}
						}
					}
				}
			?>


		</div>
	</div>
</div>

<?php $this->start('extracss') ?>
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<?php $this->stop() ?>

<?php $this->start('extrajs') ?>
<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
<script src="/static/js/enter_bouw_form.js"></script>
<?php $this->stop() ?>

