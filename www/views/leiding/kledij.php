<?php
/**
 * Seppe De Winter
 * 19 - 08 - 2019
 */

$this->layout('template', ['title' => 'Kledij - KLJ Wiekevorst', 'id' => 'kledij']);

session_start();
require_once 'db.php';

$db = new Db();
$query = "SELECT * FROM `kledij_prijs`";
$result = $db->select($query);

$db2 = new Db();
$query2 = "SELECT * FROM `kledij_stock`";
$result2 = $db2->select($query2);

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
			$query3 = "UPDATE `kledij_stock` SET `amount` = `amount` - '$quantity' WHERE `id` = '$itemid';";
			$db3 = new Db();
			$db3->update($query3);
		}
		echo '<script type="text/javascript">alert("kostprijs: €'.$_GET["price"].'");</script>';
		echo '<script>window.location="kledij.php"</script>';
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>KLJ Wiekevorst - Kledij Shop</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
		<br />
		<br />
		<br />
		<h3 align="center">KLJ Wiekevorst - Kledij Shop </h3><br />
		<br /><br />
		<?php
		foreach ($result as $r) 
		{
		?>
			<div class="col-md-4">
				<form method="post" action="kledij.php?action=add&id=<?php echo $r["id"]; ?>">
					<div style="border:3px solid #5cb85c; background-color:whitesmoke; border-radius:5px; padding:16px;" align="center">
						<img src="<?php echo $r["image"]; ?>" class="img-responsive" /><br />
 
						<h4 class="text-info"><?php echo $r["item"]; ?></h4>
 
						<h4 class="text-danger">€ <?php echo $r["price"]; ?></h4>
 
						<input type="text" name="quantity" value="1" class="form-control" />
 
						<input type="hidden" name="hidden_name" value="<?php echo $r["item"]; ?>" />
 
						<input type="hidden" name="hidden_price" value="<?php echo $r["price"]; ?>" />
 
						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
 
					</div>
				</form>
			</div>
		<?php
		}
		?>
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
		<br />
	</body>
</html>

<div class="container">
	<div class="content">
		<?php
			echo "<b>Kledij Stock</b>";
			echo "<table border='1'>
			<tr>
			<th>Id</th>
			<th>Item</th>
			<th>Hoeveelheid</th>
			</tr>";
			foreach ($result2 as $r)
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

