<?php
//session_start();
require_once('settings.php');
$connection = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($connection) {
	$response = @mysqli_query($connection, $Query);
} else {
	echo "<p>db connect not successful</p>";
}
?>