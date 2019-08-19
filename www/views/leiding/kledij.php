<?php
/**
 * Seppe De Winter
 * 19 - 08 - 2019
 */

$this->layout('template', ['title' => 'Kledij - KLJ Wiekevorst', 'id' => 'kledij']);

// load configuration
$config = parse_ini_file('../private/secrets/leiding.ini');
$pwhash = $config['pwhash'];

require_once 'db.php';

$db = new Db();
$query = "SELECT * FROM `kledij_stock`";
$result = $db->select($query);

?>

<div class="container">
	<h1>Kledij Stock</h1>
	<div class="content">
		<?php
			echo "<b>Kledij</b>";
			echo "<table border='1'>
			<tr>
			<th>Id</th>
			<th>Item</th>
			<th>Hoeveelheid</th>
			</tr>";
			foreach ($result as $r)
			{
				echo "<tr>";
					echo "<td>" . $r[id] . "</td>";
					echo "<td>" . $r[item] . "</td>";
					echo "<td>" . $r[amount] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		?>
	</div>
</div>

