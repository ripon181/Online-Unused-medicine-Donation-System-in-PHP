<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $goodsType = $_POST['goodsType'];
    $goodsQuantity = $_POST['goodsQuantity'];
    $notes = $_POST['notes'];

    require_once 'config/config.php'; 

   
    $query = "INSERT INTO donate_goods (goodsType, goodsQuantity, notes) 
              VALUES ('$goodsType', '$goodsQuantity', '$notes')";
    $result = mysqli_query($conn, $query);

  
    if ($result) {
      
      echo '<script>alert("Goods Donation Successfull !!!."); window.location.href = "memberDashboard.php";</script>';
        exit;
    } else {
      
        echo "<script>alert('Failed to donate Goods.');</script>";
    }

  
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Unused Medicine Donation</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/memberdashboard.css">
</head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav">
      <a class="nav-item nav-link bg-primary text-light" href="donateMedicine.php">Donate Medicine</a>
      <a class="nav-item nav-link bg-primary text-light" href="donateGoods.php">Donate Goods</a>
      <a class="nav-item nav-link bg-primary text-light" href="donateMoney.php">Donate Money</a>
      <a class="nav-item nav-link bg-info text-light" href="viewTransection.php">Medicine Transactions</a>
      <a class="nav-item nav-link bg-info text-light" href="goodstransction.php">Goods Transactions</a>
      <a class="nav-item nav-link bg-info text-light" href="moneyTransection.php">Money Transactions</a>
      <a class="nav-item nav-link bg-warning text-light" href="memberChangePass.php?id=id">Change PAssword</a>
      <a class="nav-item nav-link bg-danger text-light" href="logout.php">Logout</a>
    </div>
  </div>
</nav>
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h2 class="text-center text-dark mt-5">Goods Donation Form</h2>
      <div class="card my-5">

        <form class="card-body cardbody-color p-lg-5" method="POST" action="">
        <div class="mb-3">
  <label for="goodsType">Goods Type</label>
  <select class="form-control" id="goodsType" name="goodsType">
    <?php
    // Fetch nearby NGO names from the database
    require_once 'config/config.php'; // Adjust the path to your config file
    
    $query = "SELECT name FROM tbl_goods";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
  </select>
</div>

          <div class="mb-3">
            <label for="notes">Goods Quantity</label>
            <input type="text" class="form-control" id="notes" name="goodsQuantity" aria-describedby="emailHelp">
          </div>

          <div class="mb-3">
            <label for="notes">Note</label>
            <input type="text" class="form-control" id="notes" name="notes" aria-describedby="emailHelp">
          </div>



          <input type="submit" class="btn btn-color px-5 mb-5 w-100 mt-4" value="Donate Goods">
        </form>
      </div>

    </div>
  </div>
</div>


<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>