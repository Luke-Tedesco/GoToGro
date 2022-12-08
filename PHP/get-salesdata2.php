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
$query = sprintf("SELECT SUM(total_cost) AS 'sales', date as 'date' FROM `Orders` Group By DAY(date)");

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