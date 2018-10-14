<?php
/**
 * Created by IntelliJ IDEA.
 * User: butskristof
 * Date: 2018-05-25
 * Time: 13:25
 */

$this->layout('template', ['title' => 'Activiteiten ' . $this->e($groep) . ' - KLJ Wiekevorst', 'id' => $this->e($groep), 'extracss' => '/static/css/acts.css'])
?>

<?php

require_once 'db.php';

$db = new Db();
// edit query for dates later than current
$query = "SELECT * FROM `acts` WHERE `agegroup`='" . $this->e($groep) . "' AND `date` > NOW() ORDER BY `date`";
$result = $db->select($query);

?>

<div class="container">
	<h1>Activiteiten <?= $this->e($groep) ?></h1>

	<div class="row">
		<div class="col-md-10 offset-md-1" id="no-more-tables">


			<table class="table table-striped">
				<thead>
				<tr>
					<th scope="col" id="time">Tijdstip</th>
					<th scope="col" id="act">Activiteit</th>
					<th scope="col" id="resp">Verantwoordelijke</th>
				</tr>
				</thead>
				<tbody>
				<?php
				foreach ($result as $r) {
					?>

					<tr>
						<td scope="row" data-title="Tijdstip">
							<?php
							// format date
							$moment = new \Moment\Moment($r[date]);
							$moment::setLocale("nl_NL");

							if ($moment->format("w") != $this->e($normalday)) {
								// if act isn't on normal day, add strong tags
								echo '<strong>' . $moment->format("l") . '</strong>';
							} else {
								echo $moment->format("l");
							}

							echo ' ' . $moment->format("dS F Y");
							echo '<br>';
							if ($moment->format("H") != $this->e($normalhour)) {
								// if act isn't on normal hour, add strong tags
								echo '<strong>' . $moment->format("H:i") . '</strong>';
							} else {
								echo $moment->format("H:i");
							}

							?>
						</td>
						<td data-title="Activiteit">
							<?= $r[name] ?>
							<?php
							// if there's a remark, show it in strong
							if ($r[remark] != '') {
								echo '<br><strong>' . $r[remark] . '</strong>';
							}
							?>
						</td>
						<td data-title="Verantwoordelijke">
							<?= $r[responsible] ?>
						</td>
					</tr>

					<?php
				}
				?>
				</tbody>
			</table>

		</div>
	</div>


</div>
