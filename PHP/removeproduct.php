<?php

require_once('settings.php');
$connection = @mysqli_connect($host, $user, $pwd, $sql_db);
$pro_id = $_GET['product_id'];

$Query = "DELETE FROM products WHERE product_id = '$pro_id'";

@mysqli_query($connection, $Query);

header('Location: products.php');

?>