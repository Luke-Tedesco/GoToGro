
<?php
require_once('settings.php');
$connection = @mysqli_connect($host, $user, $pwd, $sql_db);
$Query = "";

if ($connection) {


    if (!empty($_POST['firstname'])) {
        $firstname = $_POST['firstname'];
        $Query = "SELECT * FROM members WHERE first_name = '$firstname'";
    }

    if (!empty($_POST['lastname'])) {
        $lastname = $_POST['lastname'];
        $Query = "SELECT * FROM members WHERE last_name = '$lastname'";
    }

    if (!empty($_POST['memberID'])) {
        $memberid = $_POST['memberID'];
        $Query = "SELECT * FROM members WHERE member_id = '$memberid'";
    }

    if ($Query == NULL) {

        $Query = "SELECT * FROM members";
        $response = mysqli_query($connection, $Query);
        @mysqli_query($connection, $Query);
        //echo "$Query";

    } else {

        //$response = mysqli_query($connect, 'SELECT * FROM members');
        $response = mysqli_query($connection, $Query);
        @mysqli_query($connection, $Query);
    }
} else {
    echo "<p>DB CONNECT NOT</p>";
}

?>