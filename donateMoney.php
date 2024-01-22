<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bkashNumber = $_POST['bkashNumber'];
    $tnxNumber = $_POST['tnxNumber'];
    $moneyAmount = $_POST['moneyAmount']; 
    
    
    require_once 'config/config.php'; 


    // Insert data into tbl_money
    $sql = "INSERT INTO tbl_money (bkash_number, tnx_number, money_amount)
            VALUES ('$bkashNumber', '$tnxNumber', '$moneyAmount')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Money Donation Successfull !!!."); window.location.href = "memberDashboard.php";</script>';
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }

    $conn->close();
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
      <h2 class="text-center text-dark mt-5">Money Donation Form</h2>
      <div class="card my-5">

      <form class="card-body cardbody-color p-lg-5" method="POST" action="">
    <div class="mb-3">
        <label for="moneyAmount">Money Amount</label>
        <input type="text" class="form-control" id="moneyAmount" name="moneyAmount" aria-describedby="emailHelp" required>
    </div>
    <button type="button" class="btn btn-color" data-bs-toggle="modal" data-bs-target="#paymentModal">
        Pay Now
    </button>



<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Make Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Please make your payment on bKash (01710101010) and then submit your transaction (tnx) number.</p>
                <form id="paymentForm">
                    <div class="mb-3">
                        <label for="bkashNumber" class="form-label">bKash Number</label>
                        <input type="text" class="form-control" id="bkashNumber" name="bkashNumber" required>
                    </div>
                    <div class="mb-3">
                        <label for="tnxNumber" class="form-label">Transaction Number (Tnx)</label>
                        <input type="text" class="form-control" id="tnxNumber" name="tnxNumber" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-color">Submit</button>
</div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Handle form submission
    $('#submitPayment').on('click', function() {
        // Get form data
        var bkashNumber = $('#bkashNumber').val();
        var tnxNumber = $('#tnxNumber').val();

        // You can further process the data here, like sending it to the server for handling
        // Example: Use AJAX to send data to the server

        // Close the modal
        $('#paymentModal').modal('hide');
    });
});
</script>
</form>

      </div>

    </div>
  </div>
</div>

<!-- Add jQuery (if not already added) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>