<?php
//session_start();
require_once('settings.php');
$connection = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($connection) {

	$Query = "SELECT * FROM products;";
	$result = @mysqli_query($connection, $Query);
	

	$Query = "INSERT INTO products (product_name, product_id, product_price, measurement) VALUES ('{$_POST['ProdName']}',
	 '{$_POST['ProdID']}', '{$_POST['ProdPrice']}', '{$_POST['Measurement']}')";

	@mysqli_query($connection, $Query);
	session_start();
	$_SESSION['db_success'] = true;

	header("Refresh:0; url=products.php");
} else {
	echo "<p>db connect not successful</p>";
}
?>