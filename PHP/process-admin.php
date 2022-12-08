<?php
//session_start();
require_once('settings.php');
$connection = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($connection) {

	$Query = "SELECT * FROM members;";
	$result = @mysqli_query($connection, $Query);
	$member_increment = mysqli_num_rows($result) + 1000;

	$Query = "INSERT INTO members(member_id, first_name, last_name, phone_number, email, date_joined, date_expired) VALUES ('{$member_increment}',
							'{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['phone']}', '{$_POST['email']}', '{$_POST['datej']}',
							'{$_POST['expiry']}');";

	@mysqli_query($connection, $Query);
	session_start();
	$_SESSION['db_success'] = true;
	header("Refresh:0; url=addmember-admin.php");
} else {
	echo "<p>db connect not successful</p>";
}
?>