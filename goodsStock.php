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
        <th scope="col">Goods Type</th>
        <th scope="col">Goods Quantity</th>
        <th scope="col">Note</th>
      </tr>
    </thead>
    <tbody>
    <?php
        require_once 'config/config.php';

        $query = "SELECT * FROM donate_goods";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['goodsType'] . "</td>";
                echo "<td>" . $row['goodsQuantity'] . "</td>";
                echo "<td>" . $row['notes'] . "</td>";
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