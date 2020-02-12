<?php
/**
 * Created by IntelliJ IDEA.
 * User: butskristof
 * Date: 07/09/2018
 * Time: 11:50
 */

$this->layout('template', ['title' => 'Activiteiten ingeven - KLJ Wiekevorst', 'id' => 'enter_acts']);

// function for form input validation/escaping
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data, ENT_QUOTES);
	return $data;
}

// load configuration
$config = parse_ini_file('../private/secrets/leiding.ini');
$pwhash = $config['pwhash'];

require_once 'db.php';

$db = new Db();

?>

<div class="container">
	<h1>Activiteiten ingeven</h1>

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

				<div class="form-group">
					<label for="acts_for">Activiteiten voor</label>
					<select class="form-control" id="acts_for" name="acts_for">
						<?php foreach ($agegroups as $ag) {
							?><option><?=$ag[name]?></option>
						<?php } ?>
					</select>
					</div>

				<div id="acts"></div>

				<button type="button" id="btnAddAct" class="btn btn-secondary">Activiteit toevoegen</button>
				<input type="submit" class="btn btn-primary" name="submit_acts" value="Indienen">

			</form>
			<?php
						}
					} else if (!empty($_POST['submit_acts'])) {
						// process form input data

						$agegroup = test_input($_POST['acts_for']);

						// initialise empty error array
						$errors = [];

						// initialise empty query string
						$fullquery = "";
						// initialise new email string
						$mail = "Activiteiten " . $agegroup . "<br><br>";
						$mail .= "<table><thead><tr><td>Datum</td><td>Act</td><td>Opmerkingen</td><td>Verantwoordelijke</td></tr><tbody>";
						$mailfooter = "</tbody></table>";

						$actctr = 0;
						foreach ($_POST['acts'] as $act) {
							++$actctr;

							// test user input
							$act_date = test_input($act[time]);
							if ( !$act_date || strtotime($act_date) < strtotime('now')) {
								$errors[] = "Activiteit {$actctr}: datum ligt in het verleden of is ongeldig.";
							}

							$mail .= "<tr><td>{$act_date}</td>";

							$act_name = test_input($act[name]);
							if ( !$act_name ) {
								$errors[] = "Activiteit {$actnr}: naam is leeg.";
							}
							$mail .= "<td>{$act_name}</td>";

							// these can be null
							$act_remarks = test_input($act[remarks]);
							$mail .= "<td>{$act_remarks}</td>";
							$act_responsible = test_input($act[responsible]);
							$mail .= "<td>{$act_responsible}</td></tr>";

							// insert into db
							$query = "INSERT INTO `acts`(`agegroup`, `date`, `name`, `remark`, `responsible`) VALUES ('{$agegroup}','{$act_date}','{$act_name}','{$act_remarks}','{$act_responsible}'); ";

							$fullquery .= $query;
						}

						if (empty($errors)) {
							$result = $db->multi_query($fullquery);

							// send email
							$subject = 'Activiteiten';

							// load configuration
							$config = parse_ini_file('../private/secrets/mailconfig.ini');

							$mailer = new \PHPMailer\PHPMailer\PHPMailer(true);
							try {
								// server settings
								$mailer->isSMTP();
								$mailer->Host = $config['host'];
								$mailer->SMTPAuth = true;
								$mailer->Username = $config['username'];
								$mailer->Password = $config['password'];
								$mailer->SMTPSecure = 'ssl';
								$mailer->Port = 465;

								// recipients
								$mailer->setFrom($config['username'], $config['name']);
                                $mailer->addAddress($config['recipient'], $config['recipient']);

								// content
								$mailer->isHTML(true);
								$mailer->Subject = $subject;
								$mailer->Body = $mail;

								$mailer->send();
							} catch (Exception $e) {
								echo "failed";
								echo $e;
							}
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
<script src="/static/js/enter_acts_form.js"></script>
<?php $this->stop() ?>
