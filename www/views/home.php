<?php $this->layout('template', ['title' => 'KLJ Wiekevorst', 'id' => 'home', 'extracss' => '/static/css/home.css']) ?>

<?php

// load config file as array
$config = parse_ini_file('../private/secrets/social.ini');

use RZ\MixedFeed\FacebookPageFeed;
use RZ\MixedFeed\InstagramFeed;
use RZ\MixedFeed\MixedFeed;

$feed = new MixedFeed([
//	new InstagramFeed(
//		'17407113053',
//		$config["instagram"],
//		null // you can add a doctrine cache provider
//	),
	new FacebookPageFeed(
		'kljwiekevorst',
		$config["facebook"],
		null, // you can add a doctrine cache provider
		[],    // And a fields array to retrieve too
		null // A specific Graph API Endpoint URL
	)
]);
$items = $feed->getAsyncCanonicalItems(8);

?>

<div class="hero-image">
	<div class="hero-text">
		<h2>KLJ Wiekevorst</h2>
		<p class="lead">
			KLJ Wiekevorst is een bruisende jeugdbeweging die al meer dan 90 jaar bestaat, waar kinderen en jongeren van 6 tot 35 jaar zich kunnen uitleven en plezier maken, week na week. Vandaag de dag telt onze vereniging zo’n 200 leden.
		</p>
	</div>
</div>

<div class="container">
	<h2 class="text-center">KLJ Wiekevorst op Facebook en Instagram</h2>
	<div id="fbbox">
		<div class="card-columns mt-3">
			<?php
			foreach ($items as $item) {
				// format date
				$date = $item->getDateTime();
				$moment = new \Moment\Moment($date->getTimestamp());
				$moment::setLocale("nl_NL");
				$platform = $item->getPlatform();
				$platformlogo = "";
				switch ($platform) {
					case "instagram":
						$platformlogo = "fab fa-instagram";
						break;
					case "facebook_page":
						$platformlogo = "fab fa-facebook-f";
						break;
				}
				?>
				<a href="<?= $item->getLink() ?>" class="custom-card" target="_blank">
				<div class="card">
					<?php
						if(count($item->getImages()) > 0) {
							echo '<img class="card-img-top" src="' . $item->getImages()[0]->getUrl() . '" alt="Card image cap">';
						}
					?>
					<div class="card-body">
						<p class="card-text"><?= mb_strimwidth($item->getMessage(), 0, 250, "..."); ?></p>
					</div>
					<div class="card-footer text-muted">
						<div class="row">
							<div class="col-2 col-sm-1">
								<i class="<?= $platformlogo ?>"></i>
							</div>
							<div class="col">
								<?= $moment->calendar() ?>
							</div>
						</div>
					</div>
				</div>
				</a>
			<?php
			}
			?>
		</div>
	</div>
</div>

