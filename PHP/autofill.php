<?php

require_once('settings.php');
$con = @mysqli_connect($host, $user, $pwd, $sql_db);
$query = "";

/* if($_SERVER['REQUEST_METHOD'] == "GET")
{
    $str = $_GET['str'];

    $Query = "SELECT * FROM products WHERE product_name LIKE '%".$str."%'";
    $result = @mysqli_query($connection, $Query);

    if (mysqli_num_rows($result) > 0)
    {
        $productdata = array(); 
        while($row = mysqli_num_rows($result))
        {
            $productdata[]
        }
    } */

$request = $_POST['request']; // request

// Get username list
if($request == 1){
 $search = $_POST['search'];

 $query = "SELECT * FROM products WHERE product_name like'".$search."%'";
 $result = mysqli_query($con,$query);
 
 while($row = mysqli_fetch_array($result) ){
  $response[] = array("value"=>$row['product_id'],"label"=>$row['product_name']);
 }

 // encoding array to json format
 echo json_encode($response);
 exit;
}

// Get details
if($request == 2){
 $userid = $_POST['userid'];
 $sql = "SELECT * FROM products WHERE product_id like '$userid'";

 $result = mysqli_query($con,$sql); 

 $users_arr = array();

 while($row = mysqli_fetch_array($result)){
  $userid = $row['product_id'];
  $name = $row['product_name'];
  $price = $row['product_price'];

  $users_arr[] = array("product_id" => $userid, "product_name" => $name, "product_price" => $price);
 }

 // encoding array to json format
 echo json_encode($users_arr);
 exit;
}
?>

