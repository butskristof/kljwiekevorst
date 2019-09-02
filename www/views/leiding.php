<?php
$this->layout('template', ['title' => 'Leiding - KLJ Wiekevorst', 'id' => 'leiding']);

require_once 'db.php';

$img_location = "static/img/leiding/";
$img_extension = ".jpg";

$db = new Db();
$query = "SELECT `name`, `leader_of` FROM `leiding`";
$result = $db->select($query);
shuffle($result);
$query = "SELECT `name` FROM `agegroups`";
$groups = $db->select($query);

?>

<div class="hero-image">
</div>

<div class="container">
	<h1>Leiding</h1>

	<p class="lead">
		Ook het werkjaar 2019-2020 staat er weer een sterke leidingsploeg klaar om elke week het beste van zichzelf te geven. Hieronder kom je alles te weten over onze <?= count($result) ?> leid(st)ers!
		<br>
	</p>

	<div class="content">

		<?php
		foreach ($groups as $group) {
		?>
			<div class="group-block">
				<h2><?=$group["name"]?></h2>
				<div class="row">
					<?php
					$groupleaders = [];
					foreach ($result as $leader) {
						if (strpos($leader["leader_of"], $group["name"]) !== false) {
							$groupleaders[] = $leader;
						}
					}
					foreach ($groupleaders as $groupleader) {
						$pic_location = $img_location . str_replace(' ', '', strtolower($groupleader["name"])) . $img_extension;
					?>
						<div class="col-6 col-sm-4 col-md-3 leader-block-wrapper">
							<div class="leader-block">
								<img src="<?= file_exists($pic_location) ? $pic_location : "https://via.placeholder.com/400" ?>" alt="">
								<h3><?=$groupleader["name"]?></h3>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		<?php
		}
		?>
	</div>
</div>

<?php $this->start("extracss") ?>
<link rel="stylesheet" href="/static/css/leiding.css">
<?php $this->stop("extracss") ?>
