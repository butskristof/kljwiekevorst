<?php
$this->layout('template', ['title' => 'Bouw - KLJ Wiekevorst', 'id' => 'bouw', 'extracss' => '/static/css/bouw.css']); ?>

<?php
require_once 'db.php';

$db = new Db();
$query = "SELECT * FROM `planningbouw` WHERE `date` > NOW() ORDER BY `date`";
$result = $db->select($query);

?>

<div class="container">
	<h1>Bouw</h1>

	<div class="col-md-10 offset-md-1">

		<h2>Wat zijn de plannen?</h2>

		<figure id="lokaal_picture" class="photo">
			<a href="/static/img/bouw/lokaal_kantschuifraam_md.png" class="mfp-link">
				<img src="/static/img/bouw/lokaal_kantschuifraam_md.png" alt="Bouwtekening nieuw KLJ-lokaal" class="img-responsive">
			</a>
			<p></p>
			<a href="/static/img/bouw/lokaal_kantgarages_md.png" class="mfp-link">
				<img src="/static/img/bouw/lokaal_kantgarages_md.png" alt="Bouwtekening nieuw KLJ-lokaal" class="img-responsive">
			</a>
			<figcaption>Bouwtekeningen nieuw KLJ-lokaal</figcaption>
		</figure>

		<p id="intro">Naast het huidige lokaal bouwen wij een tweede lokaal met speelzaal, wc’s en douches, een vergaderruimte en slaapzalen. Daarnaast komen er nog 4 materiaallokalen, voor de KLJ zelf, de Landelijke Gilde, de KWB en de Koninklijke Fanfare Onafhankelijkheid Wiekevorst.
			<br>
			Verder zal ons lokaal in de zomer verhuurd worden als kampplaats. Daarom zijn er op de bovenverdieping slaapzalen. Ook zal de huidige keuken uitgebreid worden zodat men daar ook voor een hele bende kan koken.</p>
		<p>Zo zie je maar, grote plannen, maar uiteraard ook veel werk aan de winkel en dus veel centjes nodig om dit te kunnen realiseren.</p>

		<h2>Financiering</h2>
		<p>Hieronder volgt een korte opsomming van de middelen waarmee wij geld willen ophalen:</p>
		<ul>
			<li>KWB / LG / KFOW betalen de werkelijke kost van hun materiaallokaal</li>
			<li>Eigen middelen van KLJ</li>
			<li>Subsidies gemeente</li>
			<li>Renteloze lening gemeente</li>
			<li>Andere subsidies (bv Cera, ...)</li>
			<li>Extra activiteiten</li>
<!--			add links -->
			<li><strong><a href="#giften">Giften</a></strong></li>
			<li><strong><a href="#obligatielening">Obligatielening terugbetaald door toekomstige huurinkomsten</a></strong></li>
			<li><strong><a href="#vrijwilligers">Kosten beperken door inschakelen vrijwilligers</a></strong></li>
		</ul>

		<p>In de toekomst is het de bedoeling dat de lokalen tijdens de zomer verhuurd worden als kampplaats. <br>
			Met deze inkomsten willen wij ook een deel van het geleende geld terug betalen.
		</p>

		<h2>Een steentje bijdragen...</h2>

		<h3 id="obligatielening">Obligatielening</h3>
		<p>Om dit project te realiseren hebben wij heel wat geld nodig. Daarom zouden wij graag werken met een obligatielening. Wat is dat?</p>
		<p>Dat is een renteloze lening die wij uitschrijven en zullen afbetalen op een termijn van 15 jaar. Iedereen kan zich inschrijven en aan de hand van loting zullen wij jaarlijks 1/15 van de obligaties terugbetalen.</p>
		<p>De totale bouwkost is geschat op 375 000 euro en hiervan zouden wij de helft van willen lenen. <br>
			We starten met de uitgifte van een renteloze obligatielening op 15 jaar op naam voor een totaalbedrag van 187 500 euro, verdeeld over coupures van €2500, €1000, €500, €250 en €100.</p>
		<p>Volgende obligaties schrijven wij uit:</p>
		<ul>
			<li>30 coupures van 2500 euro</li>
			<li>30 coupures van 1000 euro</li>
			<li>60 coupures van 500 euro</li>
			<li>120 coupures van 250 euro</li>
			<li>225 coupures van 100 euro</li>
		</ul>
		<p>Elk jaar, startende van 2021 zullen wij een loting houden. De lotingen die er dat jaar uitkomen zullen datzelfde jaar terugbetaald worden. Uit de rest van de loten wordt het jaar erna weer een deel getrokken.</p>
		<p>Inschrijven voor de obligatielening doe je door een mail te sturen naar bouw@kljwiekevorst.be meet vermelding van <strong>naam, aantal coupures van elk bedrag, e-mailadres en telefoonnummer</strong>. Vanaf 28 februari 2019 zullen wij contracten opmaken voor iedereen die ingeschreven heeft en de nodige info bezorgen voor de betaling.</p>
		<p>Uiterste inschrijvingsdatum obligatielening: <strong>28-02-2019</strong>.</p>

		<h3 id="giften">Giften</h3>
		<p>Wil je ons steunen, dan kan je ook steeds een gift doen. Deze giften verlopen via KLJ Nationaal en zijn vanaf 40 euro fiscaal aftrekbaar.</p>
		<p>Hoe verkrijgen van een fiscaal attest:</p>
		<ul>
			<li>De schenking moet min. € 40 zijn</li>
			<li>De gift dient te gebeuren op het rekeningnummer van KLJ Nationaal: <strong>BE96 7343 7734 9005 (KREDBEBB)</strong></li>
			<li>Op naam van <strong>KLJ & Groene Kring vzw</strong>, Diestsevest 32 bus 3b, 3000 Leuven</li>
			<li>met vermelding van <strong>‘GIFT + 11006</strong> (afdelingsnummer KLJ Wiekevorst) + <strong>rijksregisternummer</strong> van de schenker’</li>
			<li>Indien je een schenking doet als vennootschap moet de vermelding er als volgt uitzien:
				<ul>
					<li><strong>‘GIFT + 11006</strong> (afdelingsnummer KLJ Wiekevorst) + <strong>ondernemingsnummer</strong> van de schenker’</li>
				</ul>
			</li>
			<li>KLJ & Groene Kring vzw zorgt voor een fiscaal attest</li>
		</ul>

		<h2 id="vrijwilligers">Een handje toesteken...</h2>
		<p>Wil je graag een handje toesteken en ons helpen met dit project? Super, dan kan je steeds het formulier hieronder invullen zodat wij weten wanneer je kan komen.</p>

		<h2>Planning</h2>
		<ul>
			<li>Start funderingswerken november 2018</li>
			<li>Start ruwbouw ecember 2018</li>
			<li>Start afwerking zo snel als mogelijk</li>
			<li>Doel is om verhuring kampen te starten in juli 2020 en ingebruikname door KLJ in september 2020.</li>
		</ul>
		<p>Hieronder vind je de dagen wanneer we aan de slag gaan.</p>

		<table class="table table-striped">
			<thead>
			<tr>
				<th scope="col" id="time">Tijdstip</th>
				<th scope="col" id="act">Activiteit</th>
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

                        echo $moment->format("l");

                        echo ' ' . $moment->format("dS F Y");
                        echo '<br>';
                        echo $moment->format("H:i");

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

		<h2>Contact</h2>
		<dl>
			<dt>Adres</dt>
			<dd>
				<address>KLJ Wiekevorst vzw <br>
				Dalstraat 22a <br>
				2222 Wiekevorst</address>
			</dd>
			<dt>E-mail</dt>
			<dd>bouw@kljwiekevorst.be</dd>
			<dt>GSM</dt>
			<dd>+32 470 51 16 50 (Joppe Van den Sande)</dd>
		</dl>
	</div>
</div>

<?php $this->start("extracss") ?>
<link rel="stylesheet" href="/static/css/bouw.css">
<?php $this->stop() ?>

