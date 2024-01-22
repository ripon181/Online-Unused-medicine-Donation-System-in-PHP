<?php 
session_start();
require_once 'config/config.php';?>
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

<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="text-center mt-5">
      <div class="card">
  <div class="card-body">
        <h2>Welcome Back ! <?php echo $_SESSION['member_name']; ?></h2>
        </div>
</div>
      </div>
      <div class="row mt-4">
        <div class="col-md-6">
          <a class="nav-item nav-link bg-info text-light" href="donateMedicine.php">Donate Medicine</a>
        </div>
        <div class="col-md-6">
          <a class="nav-item nav-link bg-primary text-light" href="donateGoods.php">Donate Goods</a>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-6">
          <a class="nav-item nav-link bg-success text-light" href="donateMoney.php">Donate Money</a>
        </div>
        <div class="col-md-6">
          <a class="nav-item nav-link bg-warning text-light" href="viewTransection.php">Medicine Transactions</a>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-6">
          <a class="nav-item nav-link bg-secondary text-light" href="goodstransction.php">Goods Transactions</a>
        </div>
        <div class="col-md-6">
          <a class="nav-item nav-link bg-primary text-light" href="moneyTransection.php">Money Transactions</a>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-6">
          <a class="nav-item nav-link bg-success text-light" href="memberChangePass.php?id=id">Change Password</a>
        </div>
        <div class="col-md-6">
          <a class="nav-item nav-link bg-danger text-light" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
