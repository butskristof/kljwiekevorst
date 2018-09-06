<?php $this->layout('template', ['title' => 'KLJ Wiekevorst', 'id' => 'home', 'extracss' => '/static/css/home.css']) ?>

<div class="hero-image">
	<div class="hero-text">
		<h2>KLJ Wiekevorst</h2>
		<p class="lead">
			KLJ Wiekevorst is een bruisende jeugdbeweging die reeds 90 jaar bestaat, waar kinderen en jongeren van 6 tot 35 zich kunnen uitleven en plezier maken, week na week. Vandaag tellen we zo'n 150 leden.
		</p>
	</div>
</div>

<div class="container" id="fbbox">
	<div id="famax" class="famax">
	</div>
</div>

<?php $this->start("extrajs") ?>
<!-- famax -->
<script src="/static/famax/js/jquery.famax.min.js"></script>
<link rel="stylesheet" href="/static/famax/css/famax_grey.css">

<script>
	$("#famax").famax({accessToken:"547069738820042|lxBFa8Z5Ov3iEAbmBx1lC4I_1cM",fanPage:"https://www.facebook.com/kljwiekevorst",album:[],selectedTab:"p",alwaysUseDropdown:false,displayMetricsForPosts:true,displayMetricsForTags:false,skin:"grey",onClickAction:"popup",maxAttachments:3,notFoundImage:"",maxItemsDisplayed:25,maxResults:4,maxComments:12,innerOffset:40,outerOffset:40,minItemWidth:300,maxItemWidth:450,maxContainerWidth:1000});
</script>
<?php $this->stop("extrajs") ?>
