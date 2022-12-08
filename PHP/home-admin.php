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
    <h1 class="Title">GoToGro Grocery Store</h1>
  </header>

  <!-- NAV BAR -->
  <?php include 'nav-admin.inc'; ?>

  <div class="groceryimg">
    <img src="image/grocery.png" alt="groceryImage" width="100%" height="100%" style="opacity: 70%" draggable="false" />
  </div>

  <!-- BUTTON -->
  <div class="buttonContainer">
    <div class="button-wrapper">
      <!-- MEMBER -->
      <div class="membersButton button__group-item">
        <a href="findmember-admin.php"><button type="submit" class="btn btn-primary function">MEMBERS</button></a>
        <p>Search, Add, and Remove members from the database</p>
      </div>

      <!-- CHECKOUT -->
      <div class="checkoutButton button__group-item">
        <a href="checkout-admin.php"><button type="submit" class="btn btn-primary function">CHECK OUT</button></a>
        <p>Add item to cart and submit sales record into database</p>
      </div>

      <!-- SALES -->
      <div class="salesButton button__group-item">
        <a href="sales-admin.php"><button type="submit" class="btn btn-primary function">SALES</button></a>
        <p>Export sales record to CSV files and Predict the required stock</p>
      </div>
    </div>
  </div>
</body>

</html>