<!DOCTYPE html>
<html class="no-js" lang="nl">
<head>
	<?php
	$this->insert('partials/head', ['title' => $this->e($title), 'extracss' => $this->e($extracss)]);
	?>
</head>
<body>

<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<?php
	$this->insert('partials/nav', ['id' => $this->e($id)]);
?>

<main role="main">

	<?=$this->section('content')?>

</main>

<?php $this->insert('partials/footer'); ?>

</body>
</html>
