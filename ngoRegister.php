<?php
require_once 'config/config.php';

function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitize($_POST['name']);
    $location = sanitize($_POST['location']);
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    $confirmPassword = sanitize($_POST['conpassword']);

    if (empty($name) || empty($location) || empty($email) || empty($password) || empty($confirmPassword)) {
        $error = "Please fill in all the required fields.";
    } elseif ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    } else {
        $hashedPassword = md5($password);
        $query = "INSERT INTO tbl_ngo (name, location, email, password) VALUES ('$name', '$location', '$email', '$hashedPassword')";
        $result = mysqli_query($conn, $query);

        if ($result) {
          echo '<script>alert("NGO Register Successfull !!!."); window.location.href = "ngologin.php";</script>';
            exit();
        } else {
            $error = "Registration failed. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Unused Medicine Donation</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h2 class="text-center text-dark mt-5">NGO Registration</h2>
      <div class="card my-5">

        <form class="card-body cardbody-color p-lg-5" method="POST" action="">
          <div class="mb-3">
            <label for="name">NGO Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="name">NGO Location</label>
            <input type="text" class="form-control" id="location" name="location" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="name">NGO Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
          <label for="name">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mb-3">
          <label for="name">Confirm Password</label>
            <input type="password" class="form-control" id="conpassword" name="conpassword">
          </div>
          <input type="submit" class="btn btn-color px-5 mb-5 w-100" value="Sign Up">
          <div id="emailHelp" class="form-text text-center mb-5 text-dark"><a href="ngologin.php" class="text-dark fw-bold">Login
              Account</a>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>