<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $medicinename = $_POST['medicinename'];
    $medicinecount = $_POST['medicinecount'];
    $purchaseddate = $_POST['purchaseddate'];
    $expirydate = $_POST['expirydate'];
    $details = $_POST['details'];
    $nearbyngo = $_POST['nearbyngo'];
    
    require_once 'config/config.php'; 

    $query = "INSERT INTO donate_medicine (medicinename, medicinecount, purchaseddate, expirydate, details, nearbyngo) 
VALUES ('$medicinename', '$medicinecount', '$purchaseddate', '$expirydate', '$details', '$nearbyngo')";

    $result = mysqli_query($conn, $query);

    if ($result) {
      echo '<script>alert("Medicine Donation Successfull !!!."); window.location.href = "memberDashboard.php";</script>';
        exit;
    } else {
        echo "<script>alert('Failed to donate medicine.');</script>";
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
      <!-- Navigation links ... -->
    </div>
  </div>
</nav>
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h2 class="text-center text-dark mt-5">Medicine Donation Form</h2>
      <div class="card my-5">

        <form class="card-body cardbody-color p-lg-5" method="POST" action="">
          <div class="mb-3">
            <label for="name">Medicine Name</label>
            <input type="text" class="form-control" id="medicinename" name="medicinename" aria-describedby="emailHelp">
          </div>

          <div class="mb-3">
            <label for="medicinecount">Medicine Count</label>
            <input type="text" class="form-control" id="medicinecount" name="medicinecount" aria-describedby="emailHelp">
          </div>

          <div class="mb-3">
            <label for="nearbyngo">Nearby NGO</label>
            <select class="form-control" id="nearbyngo" name="nearbyngo">
              <?php
              // Fetch nearby NGO names from the database
              require_once 'config/config.php';
              
              $query = "SELECT id, name FROM tbl_ngo";
              $result = mysqli_query($conn, $query);

              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
              }

              mysqli_close($conn);
              ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="purchaseddate">Purchased Date</label>
            <input type="date" class="form-control" id="purchaseddate" name="purchaseddate" aria-describedby="emailHelp">
          </div>

          <div class="mb-3">
            <label for="expirydate">Expiry Date</label>
            <input type="date" class="form-control" id="expirydate" name="expirydate" aria-describedby="emailHelp">
          </div>

          <div class="mb-3">
            <label for="expirydate">Medicine Details</label>
            <input type="text" class="form-control" id="details" name="details" aria-describedby="emailHelp">
          </div>


          <input type="submit" class="btn btn-color px-5 mb-5 w-100 mt-4" value="Donate Medicine">
        </form>
      </div>

    </div>
  </div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
