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
        <th scope="col">Bkash Number</th>
        <th scope="col">Transaction Number</th>
        <th scope="col">Money Amount</th>
      </tr>
    </thead>
    <tbody>
    <?php
        require_once 'config/config.php';

        $query = "SELECT * FROM tbl_money";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['bkash_number'] . "</td>";
                echo "<td>" . $row['tnx_number'] . "</td>";
                echo "<td>" . $row['money_amount'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "Error fetching data: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>

<style>
  td{
    color:#fff;
  }
</style>

    </tbody>
  </table>
</div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>