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
<div class="viewTransectionTable">
  <table class="table table-hover">
    <thead class="bg-light">
      <tr>
        <th scope="col">Serial</th>
        <th scope="col">Bkash Number</th>
        <th scope="col">Transaction Number</th>
        <th scope="col">Money Amount</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
        require_once 'config/config.php';

        $query = "SELECT * FROM tbl_money WHERE status = 'Accepted'";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['bkash_number'] . "</td>";
          echo "<td>" . $row['tnx_number'] . "</td>";
          echo "<td>" . $row['money_amount'] . "</td>";
          echo "<td>Accepted</td>";
          echo "</tr>";
        }
        
        mysqli_close($conn);
      ?>
    </tbody>
  </table>

  <style>
    td{
      color:#fff;
    }
  </style>
</div>




<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>