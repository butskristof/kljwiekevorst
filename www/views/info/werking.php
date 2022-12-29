<?php
$this->layout('template', ['title' => 'Werking - KLJ Wiekevorst', 'id' => 'info/werking']);
?>

<div class="container">
	<h1>Werking</h1>

	<div class="col-md-10 offset-md-1">

		<p>In onze werking zetelen</p>
		<ul>
			<li>Hoofdleiding: Rune Deckers</li>
			<li>Secretaris: Robbe Helsen</li>
			<li>Volwassenbegeleider: Kurt Vets</li>
			<li>Bestuurslid: Joppe Van den Sande	</li>
		</ul>
		<p>Wil je meer te weten komen over onze leiding? Kijk dan op de <a href="/leiding">leidingspagina</a>!</p>
		<br />
		<div class="photos">
			<p><a class="popup thumb mfp-link" href="/static/img/leiding1819.jpg"><img src="/static/img/leiding1819.jpg" alt="Leiding KLJ Wiekevorst 2018-2019" /></a> </p>
		</div>
	</div>
</div>

<?php $this->start("extracss") ?>
	<link rel="stylesheet" href="/static/css/info.css">
<?php $this->stop() ?>
