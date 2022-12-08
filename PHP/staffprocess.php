<?php
require_once('settings.php');
$connection = @mysqli_connect($host, $user, $pwd, $sql_db);
$Query = "";

if ($connection) {


    if (!empty($_POST['first_name'])) {
        $firstnameStaff = $_POST['first_name'];
        $Query = "SELECT * FROM staff WHERE first_name = '$firstnameStaff'";
    }

    if (!empty($_POST['last_name'])) {
        $lastname = $_POST['lastname'];
        $Query = "SELECT * FROM staff WHERE last_name = '$lastname'";
    }

    if (!empty($_POST['username'])) {
        $usernameStaff = $_POST['username'];
        $Query = "SELECT * FROM staff WHERE username = '$usernameStaff'";
    }

    if (!empty($_POST['password'])) {
        $passwordStaff = $_POST['password'];
        $Query = "SELECT * FROM staff WHERE password = '$passwordStaff'";
    }


    if ($Query == NULL) {

        $Query = "SELECT * FROM staff";
        $response = mysqli_query($connection, $Query);
        @mysqli_query($connection, $Query);
        //echo "$Query";

    } else {

        //$response = mysqli_query($connect, 'SELECT * FROM members');
        $response = mysqli_query($connection, $Query);
        @mysqli_query($connection, $Query);
    }
} else {
    echo "<p>DB NOT CONNECTED</p>";
}
