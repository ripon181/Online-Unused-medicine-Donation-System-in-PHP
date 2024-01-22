
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
<nav class="navbar navbar-expand-lg">
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav">
      <a class="nav-item nav-link bg-info text-light" href="stockmanagement.php">Medicine Stock</a>
      <a class="nav-item nav-link bg-primary text-light" href="goodsStock.php">Goods Stock</a>
      <a class="nav-item nav-link bg-success text-light" href="moneyStock.php">Money Stock</a>
      <a class="nav-item nav-link bg-warning text-light" href="ngoChangePassword.php?id=id">Change PAssword</a>
      <a class="nav-item nav-link bg-danger text-light" href="logout.php">Logout</a>
    </div>
  </div>
</nav>
<div class="headline text-center">
 
<div class="stockmanagementtable">
  <table class="table table-hover">
    <thead class="bg-light">
      <tr>
        <th scope="col">Serial</th>
        <th scope="col">Medicine Name</th>
        <th scope="col">Medicine Count</th>
        <th scope="col">Purchased Date</th>
        <th scope="col">Expiry Date</th>
      </tr>
    </thead>
    <tbody>
    

<style>
  td{
    color:#fff;
  }
</style>
<?php

session_start();
$currentNGO = $_SESSION['member_id'];

        require_once 'config/config.php';
       
        $query = "SELECT * FROM donate_medicine WHERE nearbyngo = '$currentNGO'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['medicinename'] . "</td>";
                echo "<td>" . $row['medicinecount'] . "</td>";
                echo "<td>" . $row['purchaseddate'] . "</td>";
                echo "<td>" . $row['expirydate'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "Error fetching data: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>

    </tbody>
  </table>
</div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>