<hr>

<footer class="container">
		<span class="float-right">
				<p>&copy; <?= date('Y'); ?> KLJ Wiekevorst
			</span>
</footer>

<script src="/static/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="/static/js/vendor/jquery-3.2.1.min.js"></script>
<script src="/static/js/vendor/popper.min.js"></script>
<script src="/static/js/vendor/bootstrap.min.js"></script>

<script src="/static/js/plugins.js"></script>

<script src="/static/js/jquery.magnific-popup.min.js"></script>


<script>
	$(document).ready(function () {
		$('.mfp-link').magnificPopup({
			type: 'image',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			}
		})
	});
</script>

