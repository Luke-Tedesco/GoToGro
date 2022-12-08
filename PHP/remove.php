<?php
require_once('settings.php');
$connection = @mysqli_connect($host, $user, $pwd, $sql_db);

//echo "successful";

$staff_id = $_GET['staff_id'];

$Query = "DELETE FROM staff WHERE staff_id = '$staff_id'";

@mysqli_query($connection, $Query);

header('Location: staff.php');
?>