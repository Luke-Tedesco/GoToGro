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


<body>
    <header>
        <h1 class="Title">Find Member</h1>
    </header>

    <!-- NAV BAR -->
    <?php include 'nav.inc'; ?>

    <!-- Find Member FORM -->

    <form class="findMemberForm" action="findmember.php" method="POST">
        <div class="row">
            <div class="col">
                <div class="mb-4">
                    <label for=" firstName" class="firstNames">First Name:</label>
                    <input type="textmember" class="firstName" id="firstName" name="firstname">
                </div>
            </div>
            <div class="col">
                <div class="mb-4">
                    <label for="lastName" class="lastNames">Last Name:</label>
                    <input type="textmember" class="lastName" id="lastName" name="lastname">
                </div>
            </div>
            <div class="col">
                <div class="mb-4">
                    <label for=" memberID" class="memberIDs">Member ID:</label>
                    <input type="textmember" class="memberID" id="memberID" name="memberID">
                </div>
            </div>
        </div>
        <button type="submit" value="submit" class="btn btn-primary searchButton">Search</button>
    </form>

    <!-- Display Table -->


    <table class="table tableMember">
        <thead class=" thead-dark">
            <tr>
                <th scope="col">Member ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Date Joined</th>
                <th scope="col">Membership Expiry</th>
            </tr>
        </thead>
        <?php
        include 'findprocess.php';
        while ($row = mysqli_fetch_array($response)) {
            print  "<tr align= 'center'> 
                    <td>" . $row['member_id'] . "</td>
                    <td>" . $row['first_name'] . "</td>
                    <td>" . $row['last_name'] . "</td>
                    <td>" . $row['phone_number'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['date_joined'] . "</td>
                    <td>" . $row['date_expired'] . "</td> 
                    </tr>";
        }
        ?>
    </table>


    <!-- IMAGE -->

    <div class="employeeimg">
        <img src="image/employee.png" alt="employeeImage" width="100%" height="100%" style="opacity: 70%" draggable="false">
    </div>


</body>

</html>