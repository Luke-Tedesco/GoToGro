<?php
require_once('settings.php');
$connection = @mysqli_connect($host, $user, $pwd, $sql_db);

//echo "successful";

$member_id = $_GET['member_id'];

$Query = "DELETE FROM members WHERE member_id = '$member_id'";

@mysqli_query($connection, $Query);

header('Location: findmember-admin.php');
?>