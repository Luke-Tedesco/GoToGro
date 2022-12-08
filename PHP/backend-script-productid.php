<?php 
require_once('settings.php');
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
$searchTerm = $_GET['term'];
$sql = "SELECT * FROM products WHERE product_id LIKE '%".$searchTerm."%'"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
  $productdata = array(); 
  while($row = $result->fetch_assoc()) {
   $data['id']    = $row['product_id']; 
   $data['value'] = $row['product_id'];
   array_push($productdata, $data);
} 
}
 echo json_encode($productdata);
?>