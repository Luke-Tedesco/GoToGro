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

  <?php
  include 'settings.php';

  $connection = @mysqli_connect($host, $user, $pwd, $sql_db);
  mysqli_select_db($connection, $sql_db);

  if (isset($_POST['username'])) {
    $uname = $_POST['username'];
    $password = $_POST['psw'];



    if ($_POST['action'] == 'admin') {
      $Query = "select * from admin where username='" . $uname . "'AND password='" . $password . "'";
      $result = @mysqli_query($connection, $Query);

      if (mysqli_num_rows($result) == 1) {
        header("Location: home-admin.php");
        exit();
      } else {
  ?>

        <div class="alert alert-warning alert-dismissible fade show loginAlert" role="alert">
          <strong>Incorrect Password</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
    } else if ($_POST['action'] == 'staff') {
      $usernameStaff = $_POST['username'];
      $passwordStaff = $_POST['psw'];
      $Query = "select * from staff where username='" . $usernameStaff . "'AND password='" . $passwordStaff . "'";
      $result = @mysqli_query($connection, $Query);

      if (mysqli_num_rows($result) == 1) {
        header("Location: home.php");
        exit();
      } else {
      ?>

        <div class="alert alert-warning alert-dismissible fade show loginAlert" role="alert">
          <strong>Incorrect Password</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php
      }
    }
  }
  ?>


  <div class="login-container">
    <h1 id="gotogroLogo">
      GoToGroGroceryStore
    </h1>

    <div class="registerContainer">
      <form action="" method="POST">
        <h1 id="loginText">Store Login</h1>
        <hr class="hr1" />
        <label for="user" class="userpw"><b>Username:</b></label>
        <input type="text" placeholder="Enter Username" name="username" id="login" class="form-control login" required />

        <label for="psw" class="userpw"><b>Password:</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="login" class="form-control login" required />
        <button type="submit" name="action" class="loginbtn" value="admin">Admin</button>
        <button type="submit" name="action" class="loginbtn" value="staff">Staff</button>
      </form>
    </div>
  </div>


  <div class="groceryimg">
    <img src="image/grocery.png" alt="groceryImage" width="100%" height="100%" style="opacity: 70%" draggable="false" />
  </div>


</body>

</html>