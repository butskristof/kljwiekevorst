<?php
/**
 * Created by IntelliJ IDEA.
 * User: butskristof
 * Date: 2018-05-25
 * Time: 12:49
 */

include_once 'db.php';
?>

<html>
<head>
	<title>DB test</title>
</head>
<body>
<?php
$db = new Db();
$result = $db->select("SELECT * FROM `acts`");

var_dump($result);
?>
</body>
</html>
