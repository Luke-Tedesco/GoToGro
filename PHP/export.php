<?php

require_once "settings.php";

if (isset($_POST["csv"])) {

    $connection = @mysqli_connect($host, $user, $pwd, $sql_db);
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('product_key', 'product_id', 'product_name', 'product_price', 'measurement'));
    $query = "SELECT * FROM `products`";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }
    fclose($output);
}

if (isset($_POST["csv1"])) {

    $connection = @mysqli_connect($host, $user, $pwd, $sql_db);
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('Sales($)', 'Date'));
    $query = "SELECT SUM(total_cost) AS 'Sales ($)', date as 'Date' FROM Orders Group By DAY(date)";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }
    fclose($output);
}
