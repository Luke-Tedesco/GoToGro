<?php
//setting header to json
header('Content-Type: application/json');

//database
require_once("settings.php");

//get connection
$mysqli = new mysqli($host, $user, $pwd, $sql_db);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("select products.product_name as product_id, SUM(quantity) AS quantity from sales INNER JOIN products on products.product_id = sales.product_id GROUP BY product_id ORDER BY quantity DESC LIMIT 20");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);