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
    <link rel="stylesheet" href="assets/css/ngodashboard.css">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="text-center mt-5">
        <div class="card">
          <div class="card-body">
          <h2>Welcome Back ! <?php echo $_SESSION['ngo_name']; ?></h2>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-6">
        
          <a class="nav-item nav-link bg-info text-light" href="stockmanagement.php">Medicine Stock</a>
        </div>
        <div class="col-md-6">
       
          <a class="nav-item nav-link bg-primary text-light" href="goodsStock.php">Goods Stock</a>

        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-6">
         
          <a class="nav-item nav-link bg-success text-light" href="moneyStock.php">Money Stock</a>

        </div>
        <div class="col-md-6 mb-5">
         
          <a class="nav-item nav-link bg-warning text-light" href="ngoChangePassword.php?id=id">Change PAssword</a>

        </div>
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