<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="styles/styles.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="script/checkout-admin.js"></script> <!-- For add item -->
  <style>
    .ui-helper-hidden-accessible {
      position: absolute;
      left: 0%;
    }
  </style>
</head>

<body>
  <header>
    <h1 class="Title">Check Out</h1>
  </header>


  <!-- NAV BAR -->
  <?php include 'nav-admin.inc'; ?>
  <input type="hidden" id="response" />
  <?php
  session_start();
  if (isset($_SESSION['db_checkout_success'])) {
  ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Checkout successful!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php
    unset($_SESSION['db_checkout_success']);
    unset($_SESSION['checkoutList']);
    unset($_SESSION['i']);
  } else {
    unset($_SESSION['checkoutList']);
    unset($_SESSION['i']);
  }
  ?>

  <!-- List table -->

  <table class="table table-bordered" id="results">

    <thead>

      <tr>
        <th scope="col">Item Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Net Price</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <!-- <th scope="row"></th>
        <td></td>
        <td></td> -->
      </tr>
      <tr>
    </tbody>
  </table>

  <!-- Add item form -->
  <div class="checkoutContainer">
    <form class="additemForm">

      <div class="itemDetails" id="test">
        <h1>ITEM DETAILS</h1>
      </div>

      <div class="addItem">
        <label for="name" class="form-label3">Name:</label>
        <input type="text" class="form-control3" id="itemName" name="itemName">
      </div>
      <div class="addItem">
        <label for="productID" class="form-label3">Product ID:</label>
        <input type="text" class="form-control3" id="productID" name="productID">
      </div>
      <div class="addItem">
        <label for="price" class="form-label3">Price:</label>
        <input type="text" class="form-control3" id="price" name="price">
      </div>
      <div class="addItem">
        <label for="quantity" class="form-label3">Quantity:</label>
        <input type="text" class="form-control3" id="quantity" name="quantity">
      </div>
      <button type="button" id="addItem" class="btn btn-primary additemButton">ADD ITEM</button>
      <button type="button" id="removeItem" class="btn btn-primary additemButton">REMOVE ITEM</button>
      <!-- Check Out Button -->

    </form>

    <form action="checkoutprocess-admin.php" method="post">
      <input type="hidden" name="totalCost" id="totalCost" />
      <button type="submit" id="submitCheckout" class="btn btn-primary checkOutButton">CHECK OUT</button>
    </form>
  </div>


  <div class="groceryimg">
    <img src="image/grocery.png" alt="groceryImage" width="100%" height="100%" draggable="false">
  </div>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="script/frontend-script.js"></script>

</body>

</html>