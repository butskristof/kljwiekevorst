<?php
$this->layout('acts/acts_template', ['id' => '-9', 'groep' => '-9']);

require_once 'db.php';

$db = new Db();
// edit query for dates later than current
$result = $db->select("SELECT * FROM `-9`");

?>

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

						if ($moment->format("w") != 0) {
							// if act isn't on Sunday, add strong tags
							echo '<strong>' . $moment->format("l") . '</strong>';
						} else {
							echo $moment->format("l");
						}

						echo ' ' . $moment->format("dS F Y") . '<br>' . $moment->format("H:i");

						//					echo $moment->format('l dS F Y / H:i');
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

