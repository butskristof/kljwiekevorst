<?php
/**
 * Created by IntelliJ IDEA.
 * User: butskristof
 * Date: 2018-05-24
 * Time: 17:37
 */

$this->layout('template', ['title' => 'Huur - KLJ Wiekevorst', 'id' => 'huur', 'extracss' => '/static/css/huur.css']) ?>

<div class="container">
	<h1>Huur</h1>

	<p class="lead" id="geennieuweaanvragen">Omdat er momenteel druk gewerkt wordt aan onze nieuwbouw zullen er vanaf heden geen nieuwe huuraanvragen meer worden aangenomen.
		<br>Alle geplande huren gaan wel door zoals afgesproken.</p>

	<?php
	/*

	<p class="lead">Ons lokaal is te huur voor familiefeesten, communiefeesten, barbecues, ... </p>

	<figure id="lokaal_picture" class="photo_huur">
		<a href="/static/img/huur/lokaal.jpg" class="mfp-link">
			<img src="/static/img/huur/lokaal.jpg" alt="Straataanzicht lokaal KLJ Wiekevorst" class="img-responsive">
		</a>
		<figcaption>Straataanzicht lokaal KLJ Wiekevorst</figcaption>
	</figure>

	<h2>Verhuurmogelijkheden</h2>

	<p>
		Wij bieden u twee formules aan:

		<ul>
			<li>Zonder keuken kan u beschikken over:

				<ul>
					<li>-16-lokaal (8,5m x 9,5m) met deftige tafels en stoelen</li>
					<li>Herentoiletten: drie urinoirs, één toilet (tevens toegankelijk voor rolstoelgebruikers), lavabo</li>
					<li>Damestoiletten: twee toiletten, lavabo</li>
					<li>Inkomhal</li>
					<li>Opbergruimte onder de trap met het nodige poetsgerief, toiletpapier en vuilniszakken</li>
					<br>
					<li><strong>TARIEF: &euro; 100 + poetswaarborg van &euro; 50</strong></li>
				</ul>
			</li>

			<br>

			<li>Met keuken komt daar nog onze ruime en volledig uitgeruste keuken (5,5m x 4m) bij. Deze is verder voorzien van:
				<ul>
					<li>Grote gasbek</li>
					<li>Gasfornuis met vijf bekkens</li>
					<li>Oven</li>
					<li>Microgolfoven</li>
					<li>Huishoudelijke koelkast met vriesvakje</li>
					<li>Afwasbak</li>
					<li>Bij de documenten onderaan deze pagina kan u de inventaris van ons keukenmateriaal vinden</li>
					<br>
					<li><strong>TARIEF: &euro; 175 + poetswaarborg van &euro; 75</strong></li>
				</ul>
			</li>
		</ul>
	</p>

	<p></p>


	<h2>Enkele opmerkingen</h2>

		<ul>
			<li>Vuilniszakken zijn in het lokaal voorhanden, maar <u><b>dient u zelf mee te nemen naar huis</b></u>.</li>
			<li>Voor springkastelen of grote tenten, vragen wij een extra waarborg voor de staat van ons gras. Deze bedraagt dan &euro; 200 in plaats van &euro; 75.</li>
			<li>Er is 1 koelkast ter beschikking voor de huurders. </li>
			<li>Het lokaal dient te worden opgeleverd vòòr 12h30 op de dag na het gebruik.</li>
			<li>Parkeren kan op de voorziene parkeerplaatsen. Indien er te weinig plaats is, moet er achter de haag worden geparkeerd, zoals aangeduid op onderstaand plan.</li>
			<li><strong>Voor speciale gelegenheden is het aangeraden tijdig de huurverantwoordelijken in te lichten!</strong></li>
		</ul>

	<p>
		<figure class="photo_huur">
			<a href="/static/img/huur/grondplan.jpg" class="mfp-link">
				<img src="/static/img/huur/grondplan.jpg" alt="Grondplan terrein KLJ Wiekevorst" class="img-responsive">
			</a>
			<figcaption>Grondplan terrein KLJ Wiekevorst</figcaption>
		</figure>
	</p>

	<p>Verder kan u bij documenten ons volledig huisreglement doornemen. Wij vragen ook aan iedere huurder die bij ons het lokaal vastlegt dit door te nemen en te respecteren.</p>

	<p>Wegens geplande bouwwerken nemen we momenteel enkel verhuurmogelijkheden aan die voor eind 2018 vallen.</p>

	<h2>Contact</h2>

	<p>Contacteer één van onze huurverantwoordelijken</p>

	<div class="row">
		<div class="col-md-3">
			<address>
				<strong>Lander Van den Sande</strong> <br>
				+32 471 41 35 58‬ <br>
			</address>
		</div><!-- /col-md-3 -->
		<div class="col-md-3">
			<address>
				<strong>Volker Goossens</strong> <br>
				‭+32 468 15 74 27‬
			</address>
		</div><!-- /col-md-3 -->
	</div><!-- /row -->

	<h2>Documenten</h2>
	<ul>
		<li><a href="files/HUURREGLEMENT-KLJ-WIEKEVORST.pdf" target="_blank">Huurreglement</a></li>
		<li><a href="/static/files/verhuur/huisregels.pdf" target="_blank">Huisregels</a></li>
		<li><a href="/static/files/verhuur/inventaris_keuken.pdf" target="_blank">Inventaris keuken</a></li>
		<li><a href="/static/files/verhuur/grondplan.pdf" target="_blank">Plan van het lokaal</a></li>
	</ul>


	<h2>Foto's</h2>
	<div class="row">
		<div class="col-md-6">
			<figure class="photo_huur">
				<a href="/static/img/huur/grondplan.jpg" class="mfp-link">
					<img src="/static/img/huur/grondplan.jpg" alt="Grondplan terrein KLJ Wiekevorst" class="img-responsive">
				</a>
				<figcaption>Grondplan terrein KLJ Wiekevorst</figcaption>
			</figure>
		</div><!-- /col-md-6 -->
		<div class="col-md-6">
			<figure class="photo_huur">
				<a href="/static/img/huur/keuken.jpg" class="mfp-link">
					<img src="/static/img/huur/keuken.jpg" alt="Grondplan terrein KLJ Wiekevorst" class="img-responsive">
				</a>
				<figcaption>Keuken: 5,5m x 4m</figcaption>
			</figure>
		</div><!-- /col-md-6 -->
	</div><!-- /row -->
	*/
	?>
	<div class="responsiveCal">
		<iframe src="https://calendar.google.com/calendar/b/1/embed?height=600&amp;wkst=2&amp;bgcolor=%23D50000&amp;ctz=Europe%2FBrussels&amp;src=ZzFnOTJnaWxtaWZyanVkNm82bTlncjdqbTRAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23a2845e&amp;showTitle=0&amp;showNav=0&amp;title=Verhuur%20kalender%20KLJ%20Wiekevorst&amp;showDate=1&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=1&amp;showTz=0&amp;mode=MONTH&amp;hl=nl" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
	</div>
</div><!-- /container -->
