<?php

require_once('settings.php');
$connection = @mysqli_connect($host, $user, $pwd, $sql_db);
$Query = "";

session_start();

if (!(isset($_SESSION['i'])))
{
    $i = 0;
}
else
{
    $checkoutList = $_SESSION['checkoutList'];
    $i = $_SESSION['i'];
}

if($_SERVER['REQUEST_METHOD'] == "GET")
{
    $itemName = $_GET['itemName'];
    $productID = $_GET['productID'];
    $quantity = $_GET['quantity'];

    if ($connection)
    {
        $sql = "SELECT * FROM products WHERE product_id = '{$productID}';";
        $result = @mysqli_query($connection, $sql);
        if(mysqli_num_rows($result) == 0)
        {
            echo json_encode("false");
            return;
        }
    }

    $checkoutSale = [$itemName, $productID, $quantity];

    for($j=0; $j<3; $j++)
    {
            $checkoutList[$i][$j] = $checkoutSale[$j];
    }
    $i++;
    
	$_SESSION['checkoutList'] = $checkoutList;
    $_SESSION['i'] = $i;
}

else if($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($connection) {
        $Query = "SELECT * FROM orders;";
	    $result = @mysqli_query($connection, $Query);
	    $order_increment = mysqli_num_rows($result) + 1;

        $Query = "INSERT INTO orders(order_id, total_cost) VALUES ('{$order_increment}','{$_POST['totalCost']}');";
        @mysqli_query($connection, $Query);
        
        
            for($j=0; $j<$i; $j++) {
                $Query = "INSERT INTO sales(order_id, sale_id, product_id, quantity) VALUES ('{$order_increment}','{$j}', '{$checkoutList[$j][1]}', '{$checkoutList[$j][2]}');";
                mysqli_query($connection, $Query);
            }
        
       
            
        $_SESSION['db_checkout_success'] = true;
    }
    else
    {
        echo "<p>Database connection failure</p>";
    }
    header("Refresh:0; url=checkout.php");
}
else {
    echo "<p>Something wrong</p>";
}
?>