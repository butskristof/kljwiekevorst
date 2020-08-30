<?php
/**
 * Created by IntelliJ IDEA.
 * User: butskristof
 * Date: 24/05/2018
 * Time: 21:08
 */

$this->layout('template', ['title' => 'Contacttracing - KLJ Wiekevorst', 'id' => 'contacttracing', 'extracss' => '']) ?>

<div class="container" style="height: 95vh; margin-top: 1rem;">
	<div id="form-container" style="height: 100%; margin-top: 1rem;">
		<iframe
			id="gform"
			style="height: 100%; width: 100%;"
			src="https://docs.google.com/forms/d/e/1FAIpQLScazwI0b27h0AfAnmc3T9iR1qFQ28g3YuY6HQnRI_YDkfvsew/viewform?embedded=true"
			frameborder="0"
			marginheight="0"
			marginwidth="0">
			Loading…
		</iframe>
	</div>
	<div id="submitted" style="display: none;">
		Bedankt voor het invullen van je gegevens! <br>
		Klik <a href="/static/files/dranklijst-startact.pdf" target="_self">hier</a> om de dranklijst te bekijken.
	</div>

	<script type="text/javascript">
		let load = 0;

		document.getElementById('gform').onload = function(){
			/*Execute on every reload on iFrame*/
			load++;
			if (load > 1) {
				/*Second reload is a submit*/
				document.querySelector("#submitted").style.display = 'block';
				document.querySelector("#form-container").style.display = 'none';

				document.location.href = "/static/files/dranklijst-startact.pdf";
				// document.location.href = "https://google.com/";
			}
		}
	</script>
</div>
