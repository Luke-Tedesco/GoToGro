<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="styles/styles.css" />
  <link rel="stylesheet" href="styles/styles-sales.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <style>
    .chartjs-hidden-iframe {
      width: auto !important;
    }

    #bar-chart {
      height: auto !important;
      width: 100% !important;
    }
  </style>
</head>

<body>
  <header>
    <h1 class="Title">Sales</h1>
  </header>


  <!-- NAV BAR -->
  <?php include 'nav-admin.inc'; ?>

  <div class="groceryimg salesImg">
    <img src="image/grocery.png" alt="groceryImage" width="100%" height="155%" draggable="false">
  </div>

  <br>
  <div style="width: 40%; margin-left: 50px; margin-top: 20px;">
    <h2>Sales Report</h2>
    <canvas id="sales_bar-chart" width="inherit" height="inherit" ;></canvas>
  </div>

  <div class="ordersTable">
    <table class="table-bordered" style="text-align: center; float: right; width: 30%; margin-right: 70px; margin-top: -300px; background-color: lightgrey">
      <thead>
        <tr>
          <th scope="col">Date</th>
          <th scope="col">Sale ($)</th>
        </tr>
      </thead>
      <?php
      $Query = "SELECT SUM(total_cost) AS 'Sale', date as 'Date' FROM `Orders` Group By DAY(date) LIMIT 7";
      include 'findsaleprocess.php';
      while ($row = mysqli_fetch_array($response)) :
      ?>
        <tr align='center'>
          <td><?php echo $row['Date']; ?></td>
          <td><?php echo $row['Sale']; ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>

  <div id="leftbar">
    <div style="width: 70%; margin-left: 50px; margin-top: 20px;">
      <h2>Highest Grossing Items</h2>
      <p>The following graph displays the highest grossing items over the past week</p>
      <canvas id="bar-chart" width="inherit" height="inherit" ;></canvas>
    </div>
  </div>

  <div id="rightbar">
    <div class="csvButton">
      <form method="post" action="export.php">
        <input type="submit" name="csv1" class="btn btn-secondary generateCSV1" value="Export Sales to CSV">
      </form>
    </div>
  </div>

  <div id="rightbar">
    <div class="csvButton">
      <form method="post" action="export.php">
        <input type="submit" name="csv" class="btn btn-secondary generateCSV" value="Export Product to CSV">
      </form>
    </div>
  </div>

  <div class="salesTable">
    <table class="table-bordered" style="text-align: center; float: right; width: 30%; margin-right: 70px; margin-top: -550px; background-color: lightgrey;">
      <thead>
        <tr>
          <th scope="col">Product ID</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Price</th>
          <th scope="col">Measurement</th>
          <th scope="col">Sales</th>
        </tr>
      </thead>
      <?php
      $Query = "select products.product_id, products.product_name, products.product_price, products.measurement, SUM(quantity) as quantity from sales INNER JOIN products on products.product_id = sales.product_id GROUP BY product_id ORDER BY quantity DESC LIMIT 20";
      include 'findsaleprocess.php';
      while ($row = mysqli_fetch_array($response)) :
      ?>
        <tr align='center'>
          <td><?php echo $row['product_id']; ?></td>
          <td><?php echo $row['product_name']; ?></td>
          <td>$<?php echo $row['product_price']; ?></td>
          <td><?php echo $row['measurement']; ?></td>
          <td><?php echo $row['quantity']; ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>


  <!-- javascript -->
  <script type="text/javascript" src="script/jquery.min.js"></script>
  <script type="text/javascript" src="script/Chart.min.js"></script>
  <script type="text/javascript" src="script/get-salesdatagraph.js"></script>
</body>

</html>