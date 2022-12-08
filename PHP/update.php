<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<title> Update Staff's Detail </title>



<body>
    <header>
        <h1 class="Title">Staff's Detail</h1>
    </header>


    <!-- NAV BAR & Image under Header  -->
    <?php include 'nav-admin.inc'; ?>


    <!-- IMAGE -->
    <div class="employeeimg">
        <img src="image/employee.png" alt="employeeImage" width="100%" height="100%" draggable="false">
    </div>

    <?php

    require_once('settings.php');
    $connection = @mysqli_connect($host, $user, $pwd, $sql_db);
    $staff_id = $_GET['staff_id'];
    $Query = "Select * from staff where staff_id = '$staff_id'";
    $r = @mysqli_query($connection, $Query);
    $row = mysqli_fetch_array($r);
    ?>

    <!-- UPDATE FORM -->
    <div class="col-lg-6 m-auto">
        <form method="post">

            <br><br><br>
            <div class="card">
                <div class="card-header bg-dark">
                    <h1 class="text-white text-center"> Update Staff's Detail</h1>
                </div><br><br>

                <label class="updateLabel"> Firstname: </label>
                <input type="text" name="first_name" placeholder=<?php echo $row['first_name'] ?> class="form-control updateForm"><br>

                <label class="updateLabel"> Lastname: </label>
                <input type="text" name="last_name" placeholder=<?php echo $row['last_name'] ?> class="form-control updateForm"><br>

                <label class="updateLabel"> Username: </label>
                <input type="text" name="username" placeholder=<?php echo $row['username'] ?> class="form-control updateForm"><br>

                <label class="updateLabel"> Password: </label>
                <input type="text" name="password" placeholder=<?php echo $row['password'] ?> class="form-control updateForm"><br>

                <button class="btn btn-success updateButton" type="submit" name="done"> Submit </button><br>

            </div>

        </form>
    </div>


    <?php
    require_once('settings.php');
    $connection = @mysqli_connect($host, $user, $pwd, $sql_db);

    if (isset($_POST['done'])) {

        $staff_id = $_GET['staff_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];


        $Query = "UPDATE staff SET";

        if (isset($_POST['staff_id']) && $_POST['staff_id'] != "") {
            $Query .= " staff_id='$staff_id',";
        }

        if (isset($_POST['first_name']) && $_POST['first_name'] != "") {
            $Query .= " first_name='$first_name',";
        }

        if (isset($_POST['last_name']) && $_POST['last_name'] != "") {
            $Query .= " last_name='$last_name',";
        }

        if (isset($_POST['username']) && $_POST['username'] != "") {
            $Query .= " username='$username',";
        }

        if (isset($_POST['password']) && $_POST['password'] != "") {
            $Query .= " password='$password',";
        }

        $Query = rtrim($Query, ',');
        $Query .= " where staff_id=$staff_id";

        echo "$Query";

        // $Query = "UPDATE staff set staff_id='$staff_id', first_name='$first_name', last_name='$last_name', username='$username', password='$password' where staff_id=$staff_id";
        //$Query = "UPDATE staff set staff_id= '$staff_id', first_name= '$first_name', last_name='$last_name', username='$username', password='$password' where staff_id=$staff_id";

        @mysqli_query($connection, $Query);

        header('Location: staff.php');
    }
    ?>





</body>

</html>