<?php
$this->layout('template', ['title' => 'Uniform - KLJ Wiekevorst', 'id' => 'info/uniform', 'extracss' => '/static/css/info.css']);

require_once 'db.php';

$db = new Db();

$prices = $db->select("SELECT price FROM `kledij_prijs` WHERE (id = 1) OR (id = 2) OR (id = 13) OR (id = 22)");

?>

<div class="container" id="uniform">
	<h1>
		Uniform
	</h1>

	<div class="col-md-10 offset-md-1">

		<p>In de toekomst kan je enkel nog een uniform kopen op bepaalde dagen voor en na de activiteit. Deze dagen zullen gecommuniceerd worden via het KLJ'ke, de website en Facebook. <br />
			Indien mogelijk vragen we om zo veel mogelijk met gepast geld te betalen.</p>
		<ul>
			<li>T-shirt jongens/meisjes: <?=$prices[1][price]?> EUR - <b>verplicht!</b></li>
			<li>Sjaaltje: <?=$prices[0][price]?> EUR - <b>verplicht!</b></li>
			<li>Trui: <?=$prices[2][price]?> EUR</li>
			<li>Hoodie +16 (trui met kap): <?=$prices[3][price]?> EUR</li>
		</ul>

		<div class="row">
			<div class="col-md-4">
				<p>
					<a href="/static/img/uniform/uniform00001.JPG" class="popup thumb mfp-link">
						<img src="/static/img/uniform/uniform00001.JPG" alt="Uniform KLJ Wiekevorst">
					</a>
				</p>
			</div>
			<div class="col-md-4">
				<p>
					<a href="/static/img/uniform/uniform00002.JPG" class="popup thumb mfp-link">
						<img src="/static/img/uniform/uniform00002.JPG" alt="Uniform KLJ Wiekevorst">
					</a>
				</p>
			</div>
			<div class="col-md-4">
				<p>
					<a href="/static/img/uniform/uniform00003.JPG" class="popup thumb mfp-link">
						<img src="/static/img/uniform/uniform00003.JPG" alt="Uniform KLJ Wiekevorst">
					</a>
				</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<p>
					<a href="/static/img/uniform/uniform00004.JPG" class="popup thumb mfp-link">
						<img src="/static/img/uniform/uniform00004.JPG" alt="Uniform KLJ Wiekevorst">
					</a>
				</p>
			</div>
			<div class="col-md-4">
				<p>
					<a href="/static/img/uniform/uniform00005.JPG" class="popup thumb mfp-link">
						<img src="/static/img/uniform/uniform00005.JPG" alt="Uniform KLJ Wiekevorst">
					</a>
				</p>
			</div>
			<div class="col-md-4">
				<p>
					<a href="/static/img/uniform/uniform00006.JPG" class="popup thumb mfp-link">
						<img src="/static/img/uniform/uniform00006.JPG" alt="Uniform KLJ Wiekevorst">
					</a>
				</p>
			</div>
		</div>

	</div>
</div>
