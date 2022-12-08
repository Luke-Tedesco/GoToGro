<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script/products_script.js"></script>
    <script src="script/DeleteProductRow.js"></script>

</head>

<body>

    <header>
        <h1 class="Title">Products</h1>
    </header>


    <!-- NAV BAR & Image under Header  -->
    <?php include 'nav-admin.inc'; ?>

    <?php
    session_start();

    if (isset($_SESSION['db_success'])) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Product added successfully!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['db_success']);
    }
    ?>

    <!-- IMAGE -->
    <div class="groceryimg productImg">
        <img src="image/grocery.png" alt="ProductImage" width="100%" height="370%" draggable="false">
    </div>
    <br />
    <!-- Add Product FORM -->
    <form class="Product" action="Productprocess.php" method="post" id="product">
        <!-- "id = product" is for the javascript button-->
        <div class="row">
            <div class="col">
                <div class="mb-4">
                    <label for="Name" class="form-label">Product Name: </label>
                    <input type="text" class="ProductDetails" id="ProdName" name="ProdName" required placeholder="eg. Banana">
                </div>
            </div>
            <div class="col">
                <div class="mb-4">
                    <label for="phoneNumber" class="form-label">Product ID: </label>
                    <input type="text" class="ProductDetails" id="InputPhoneNumber" maxlength="10" name="ProdID" required placeholder="eg. BC1002">
                </div>
            </div>
            <div class="col">
                <div class="mb-4">
                    <label for="dateJoined" class="form-label">Product Price: </label>
                    <input type="text" class="ProductDetails" id="InputDateJoined" name="ProdPrice" required placeholder="eg. $10">
                </div>

            </div>
            <div class="measurement">
                <label for="Measurement">Measurement:</label>
                <select name="Measurement" id="measure">
                    <option value="KG">Kilogram</option>
                    <option value="G">Gram</option>
                    <option value="L">Litre</option>
                    <option value="ML">Millilitre</option>
                    <option value="E">Each</option>
                </select>
            </div>
        </div>
        <a href="addmember.php"> <button type="submit" class="btn btn-primary addproductButton">Add Product</button></a>
    </form>

    <br /><br />
    <!-- Display Table -->

    <table class="table tableMember">
        <thead class="thead-light">
            <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Measurement</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <?php
        include 'findproductprocess.php';
        while ($row = mysqli_fetch_array($response)) :
        ?>
            <tr align='center'>
                <td><?php echo $row['product_id']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td>$<?php echo $row['product_price']; ?></td>
                <td><?php echo $row['measurement']; ?></td>
                <td>
                    <button class="btn btn-danger operator removeProducts">
                        <a href='removeproduct.php?product_id=<?php echo $row['product_id']; ?>'>Remove</a>
                    </button>
                </td>
            </tr>
        <?php endwhile; ?>

    </table>





</body>

</html>