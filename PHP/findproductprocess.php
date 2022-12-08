
<?php
require_once('settings.php');
$connection = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($connection) {
    //testing
    //echo "<p>db connect successful</p>"; 

    $Query = "SELECT * FROM products ORDER BY product_id";
    //$response = mysqli_query($connect, 'SELECT * FROM products');
    $response = mysqli_query($connection, $Query);
    @mysqli_query($connection, $Query);
    //header("Refresh:1; url=products.php");

} else {
    echo "<p>db connect not successfull</p>";
}
?>