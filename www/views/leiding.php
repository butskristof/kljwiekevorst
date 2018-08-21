<?php
$this->layout('template', ['title' => 'Leiding - KLJ Wiekevorst', 'id' => 'leiding']);

require_once 'db.php';

$db = new Db();
$query = "SELECT * FROM `leiding`";
$result = $db->select($query);
shuffle($result);

?>

<div class="container">
	<h1>Leiding</h1>

	<div class="content">

		<?php
			foreach ($result as $r) { ?>
				<div class="row leiding">
					<div class="col-md-4 leidingpic">
						<?php
						if (empty($r[imgpath])) {
							?><img src="http://placehold.it/500x500" alt="">
						<?php
						} else {
							?>
							<p><a class="mfp-link" href="/static/img/leiding/<?=$r[imgpath]?>"><img src="/static/img/leiding/<?=$r[imgpath]?>" alt="<?=$r[name]?>" /></a> </p>
						<?php
						}
						?>
					</div>
					<div class="col-md-8">
						<h2><?=$r[name]?></h2>
						<p>
							<b>Naam:</b> <?=$r[name]?><br>
							<b>Bijnaam:</b> <?=$r[nickname]?><br>
							<b>Geboortedatum:</b> <?php
								// format date
								$moment = new \Moment\Moment($r[dateofbirth]);
								$moment::setLocale("nl_NL");
								echo $moment->format("j F Y");
							?><br>
							<b>Studie/werk:</b> <?=$r[studies]?><br>
							<b>Leiding sinds:</b> <?=$r[leader_since]?><br>
							<b>Leiding van:</b> <?=$r[leader_of]?><br>
							<b>Functie(s):</b> <?=$r[functions]?><br>
							<b>Hobby's:</b> <?=$r[hobbies]?><br>
							<b>Anekdote:</b> <?=$r[memory]?>
						</p>
					</div>
				</div>
				<hr>
			<?php }	?>

	</div>

</div>

<?php $this->start("extracss") ?>
<link rel="stylesheet" href="/static/css/leiding.css">
<?php $this->stop("extracss") ?>
