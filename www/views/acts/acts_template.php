<?php
/**
 * Created by IntelliJ IDEA.
 * User: butskristof
 * Date: 2018-05-25
 * Time: 13:25
 */

$this->layout('template', ['title' => 'Activiteiten ' . $this->e($groep) . ' - KLJ Wiekevorst', 'id' => $this->e($groep), 'extracss' => '/static/css/acts.css'])
?>

<div class="container">
	<h1>Activiteiten <?= $this->e($groep) ?></h1>

	<?=$this->section('content')?>

</div>
