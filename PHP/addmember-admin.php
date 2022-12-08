<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script/addmember_script.js"></script>
</head>

<body>

    <header>
        <h1 class="Title">Add Member</h1>
    </header>


    <!-- NAV BAR & Image under Header  -->
    <?php include 'nav-admin.inc'; ?>

    <?php
    session_start();

    if (isset($_SESSION['db_success'])) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Member added successfully!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['db_success']);
    }
    ?>

    <!-- IMAGE -->
    <div class="employeeimg">
        <img src="image/employee.png" alt="employeeImage" width="100%" height="100%" draggable="false">
    </div>

    <!-- Add Member FORM -->
    <div class="card1">
        <form class="addMemberForm" action="process-admin.php" method="post" id="addmember">
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name: </label>
                <input type="text" class="form-control" id="InputFirstName" name="firstname">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="InputLastName" name="lastname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email: </label>
                <input type="text" class="form-control" id="InputEmail" placeholder="name@domain.com" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number: </label>
                <input type="text" class="form-control" id="InputPhoneNumber" maxlength="10" name="phone">
            </div>
            <div class="mb-3">
                <label for="dateJoined" class="form-label">Date Joined:</label>
                <input type="date" class="form-control form-control1" id="InputDateJoined" name="datej">
            </div>
            <div class="mb-3">
                <label for="membershipExpiry" class="form-label">Membership Expiry: </label>
                <input type="date" class="form-control form-control2" id="InputMembershipExpiry" name="expiry">
            </div>
            <a href="addmember-admin.php"> <button type=" submit" class="btn btn-primary addmemberButton">ADD MEMBER</button></a>
        </form>
    </div>





</body>

</html>