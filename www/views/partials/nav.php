<?php
/**
 * Created by IntelliJ IDEA.
 * User: butskristof
 * Date: 24/05/2018
 * Time: 14:23
 */
?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
	<div class="container">
		<a class="navbar-brand" href="/">
			<img src="/static/img/logo/logo.png" alt="KLJ Wiekevorst logo" class="img-responsive">
			<span class="navtext">Wiekevorst</span>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="menu">
			<?php include('menu.php'); ?>
		</div><!-- /collapse -->
	</div><!-- /container -->
</nav>
