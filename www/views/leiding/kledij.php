<?php
/**
 * Seppe De Winter
 * 19 - 08 - 2019
 */

$this->layout('template', [
	'title' => 'Kledij - KLJ Wiekevorst',
	'id' => 'kledij',
	'extracss' => '/static/css/kledij.css']
);

session_start();
require_once 'db.php';

$db = new Db();
$query = "SELECT * FROM `kledij_prijs`";
$kledij_items = $db->select($query);

//$db2 = new Db();
$query2 = "SELECT * FROM `kledij_stock`";
$result2 = $db->select($query2);

//$db6 = new Db();
$query6 = "SELECT * FROM `kledij_log`";
$result3 = $db->select($query6);

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
		$count = count($_SESSION["shopping_cart"]);
		$item_array = array(
		'item_id'		=>	$_GET["id"],
		'item_name'		=>	$_POST["hidden_name"],
		'item_price'		=>	$_POST["hidden_price"],
		'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
		echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
		'item_id'		=>	$_GET["id"],
		'item_name'		=>	$_POST["hidden_name"],
		'item_price'		=>	$_POST["hidden_price"],
		'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_POST["update_stock"]))
{
	for ($x = 1; $x <= 24; $x++) {
		$db4 = new Db();
		$location = "quantity_change_'$x'";
		$query4 = "UPDATE `kledij_stock` SET `amount` = '$_POST[$location]' WHERE `kledij_stock`.`id` = '$x';";
		$db4->update($query4);
	} 
	echo '<script type="text/javascript">alert("UPDATED STOCK");</script>';
	echo '<script>window.location="kledij.php"</script>';
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
			}
		}
	}
	if($_GET["action"] == "sell")
	{	
		// remove from cart and update stock
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			unset($_SESSION["shopping_cart"][$keys]);
			$quantity = $values["item_quantity"];
			$itemid = $values["item_id"];
			$itemname = $values["item_name"];
			$db3 = new Db();
			$query3 = "UPDATE `kledij_stock` SET `amount` = `amount` - '$quantity' WHERE `id` = '$itemid';";
			$db3->update($query3);
			
			$db5 = new Db();
			$query5 = "INSERT INTO `kledij_log` (`date`, `id`, `item`, `amount`) VALUES (CURRENT_DATE(), '$itemid', '$itemname', '$quantity');";
			$db5->update($query5);
		}
		echo '<script type="text/javascript">alert("kostprijs: €'.$_GET["price"].'");</script>';
		echo '<script>window.location="kledij.php"</script>';
	}
}
?>

<div class="container">
	<h1>KLJ Wiekevorst - Shop</h1>
	<div class="row">
	<?php
	foreach ($kledij_items as $item) {
	?>
	   <div class="col-md-4 col-sm-6 kledij-item">
		   <form method="post" action="kledij.php?action=add&id=<?php echo $item["id"]; ?>">
			   <div class="kledij-item-inner">
				   <img
					   src="<?= $item["image"] ?>"
					   alt="<?= $item["name"] ?>"
				   />

				   <h4 class="text-info">
					   <?= $item["item"] ?>
				   </h4>

				   <h4 class="text-danger">
					   € <?= $item["price"] ?>
				   </h4>

				   <div class="row d-flex">
					   <div class="col quantity-wrapper">
						   <input
							   type="number"
							   min="0"
							   name="quantity"
							   value="1"
							   class="form-control"
						   />
					   </div>
					   <div class="col submit-wrapper">
						   <input
							   type="submit"
							   name="add_to_cart"
							   class="btn btn-success"
							   value="Toevoegen"
						   />
					   </div>
				   </div>

				   <input
					   type="hidden"
					   name="hidden_name"
					   value="<?= $item["item"] ?>"
				   />

				   <input
					   type="hidden"
					   name="hidden_price"
					   value="<?= $item["price"] ?>"
				   />

			   </div>
		   </form>
	   </div>
	   <?php
	   }
	?>
	</div>
<div style="clear:both"></div>
<br />
<h3>Order Details</h3>
<div class="table-responsive">
<table class="table table-bordered">
<tr>
	<th width="40%">Item Name</th>
	<th width="10%">Quantity</th>
	<th width="20%">Price</th>
	<th width="15%">Total</th>
	<th width="5%">Action</th>
</tr>
<?php
if(!empty($_SESSION["shopping_cart"]))
{
	$total = 0;
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
?>
		<tr>
			<td><?php echo $values["item_name"]; ?></td>
			<td><?php echo $values["item_quantity"]; ?></td>
			<td>€ <?php echo $values["item_price"]; ?></td>
			<td>€ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
			<td><a href="kledij.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
		</tr>
		<?php
		$total = $total + ($values["item_quantity"] * $values["item_price"]);
	}
		?>
	<tr>
		<td colspan="3" align="right">Total</td>
		<td align="right">€ <?php echo number_format($total, 2); ?></td>
		<td><a href="kledij.php?action=sell&price=<?php echo $total; ?>"><span class="text-info"><b>Sell</b></span></a></td>
		</tr>
<?php
}
?>
</table>
</div>
</div>
</div>

<div class="container">
	<div class="content">
		<?php
			echo "<b>Kledij Stock</b>";
			echo "<table border='1'>
			<tr>
			<th>Id</th>
			<th>Item</th>
			<th>Hoeveelheid</th>
			<th>action</th>
			</tr>";
			foreach ($result2 as $item)
			{?>
				<form method="post" action="kledij.php?action=update">
				<?echo "<tr>";
					echo "<td name='id'>" . $item[id] . "</td>";
					echo "<td>" . $item[item] . "</td>";
					echo "<td>" . $item[amount] . "</td>";
				?>
					<td><input type="text" name="quantity_change_'<?php echo $item[id]?>'" value="<?php echo $item[amount]?>" class="form-control" /></td>
				<?php
				echo "</tr>";
				
			}
			echo "</table>";
		?>
	<input type="submit" name="update_stock" style="margin-top:5px;" class="btn btn-success" value="Update stock" />
	</div>
	
	<div class="content">
		<?php
			echo "<b>Kledij Logboek</b>";
			echo "<table border='1'>
			<tr>
			<th>Date</th>
			<th>Id</th>
			<th>Item</th>
			<th>Hoeveelheid verkocht</th>
			</tr>";
			foreach ($result3 as $item)
			{
				echo "<tr>";
					echo "<td>" . $item[date] . "</td>";
					echo "<td>" . $item[id] . "</td>";
					echo "<td>" . $item[item] . "</td>";
					echo "<td>" . $item[amount] . "</td>";
				echo "<tr>";
			}
			echo "</table>";
		?>
</div>

