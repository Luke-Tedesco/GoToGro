<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script/update.js"></script>
    <script>
        function insert() {
            <?php

            require_once('settings.php');
            $connection = @mysqli_connect($host, $user, $pwd, $sql_db);

            if (isset($_POST['addStaff'])) {

                $Query = "SELECT * FROM staff;";
                $result = @mysqli_query($connection, $Query);
                

                $Query = "Select * from staff ORDER BY staff_id DESC LIMIT 1";
                $r = @mysqli_query($connection, $Query);
                $row = mysqli_fetch_array($r);
                if(mysqli_num_rows($r) <= 0){
                    $staff_increment = 20220518;
                }
                else{
                    $staff_increment = $row['staff_id'] + 4;
                }

                $Query = "INSERT INTO staff(staff_id, first_name, last_name, username, password) VALUES ('{$staff_increment}',
                                    '{$_POST['firstnameStaff']}', '{$_POST['lastnameStaff']}', '{$_POST['usernameStaff']}', '{$_POST['passwordStaff']}');";

                @mysqli_query($connection, $Query);
                //   session_start();
                $_SESSION['db_success'] = true;
            }
            ?>
            if ($_SESSION['db_success']) {
                window.location.reload();
            }
        }
    </script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script/addmember_script.js"></script>

</head>

<body>

    <header>
        <h1 class="Title">Staff</h1>
    </header>

    <!-- NAV BAR & Image under Header  -->
    <?php include 'nav-admin.inc'; ?>

    <!-- IMAGE -->
    <div class="employeeimg">
        <img src="image/employee.png" alt="employeeImage" width="100%" height="100%" draggable="false">
    </div>

    <!-- Add staff form -->

    <form class="addStaffForm" action="staff.php" method="POST">
        <div class="col">
            <div class="mb-4">
                <label for="firstname" class="form-label staffLabel">First Name: </label>
                <input type="text" class="form-control staffForm" id="Inputfirstname" name="firstnameStaff" required>
            </div>
        </div>
        <div class="col">
            <div class="mb-4">
                <label for="lastname" class="form-label staffLabel">Last Name:</label>
                <input type="text" class="form-control staffForm" id="InputLastName" name="lastnameStaff" required>
            </div>
        </div>
        <div class="col">
            <div class="mb-4">
                <label for="username" class="form-label staffLabel">Username:</label>
                <input type="text" class="form-control staffForm" id="InputUserName" name="usernameStaff" required>
            </div>
        </div>
        <div class="col">
            <div class="mb-4">
                <label for="password" class="form-label staffLabel">Password:</label>
                <input type="text" class="form-control staffForm" id="InputPassword" name="passwordStaff" required>
            </div>
        </div>
        <button type="submit" name="addStaff" class="btn btn-primary addstaffBtn" onclick="insert()">Add Staff</button>
    </form>



    <!-- Display Table -->

    <table class="table tableMember staff">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Staff ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php
        require_once('settings.php');
        include 'staffprocess.php';
        while ($row = mysqli_fetch_array($response)) :
        ?>
            <tr align='center'>
                <td><?php echo $row['staff_id']; ?></td>
                <td id= "fname" value ="<?php echo $row['first_name']; ?>"><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td>
                    <button id="btn1" class="btn btn-primary operator">
                        <a  id= "fname" href='update.php?staff_id=<?php echo $row['staff_id']; ?>'>Update</a>
                    </button>
                    <button class="btn btn-danger operator">
                        <a href='remove.php?staff_id=<?php echo $row['staff_id']; ?>'>Remove</a>
                    </button>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>