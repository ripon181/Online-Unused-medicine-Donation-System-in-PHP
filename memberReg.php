<?php
require_once 'config/config.php';


function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $name = sanitize($_POST['name']);
    $gender = sanitize($_POST['gender']);
    $email = sanitize($_POST['email']);
    $age = sanitize($_POST['age']);
    $contact = sanitize($_POST['contact']);
    $address = sanitize($_POST['address']);
    $donertype = sanitize($_POST['donertype']);
    $password = sanitize($_POST['password']);
    $confirmPassword = sanitize($_POST['conpassword']);

   
    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
        $error = "Please fill in all the required fields.";
    } elseif ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    } else {
      
        $hashedPassword = md5($password);

      
        $query = "INSERT INTO tbl_members (name, gender, email, age, contact, address, donertype, password) VALUES ('$name', '$gender', '$email', '$age', '$contact', '$address', '$donertype', '$hashedPassword')";
        $result = mysqli_query($conn, $query);

       
        if ($result) {
          echo '<script>alert("Member Register Successfull !!!."); window.location.href = "memberlogin.php";</script>';
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
      <h2 class="text-center text-dark mt-5">Member Registration</h2>
      <div class="card my-5">

        <form class="card-body cardbody-color p-lg-5" method="POST" action="">
          <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
          <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
            </select>
          </div>
          <div class="mb-3">
          <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
          <label for="age">Age</label>
            <input type="text" class="form-control" id="age" name="age" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
          <label for="contact">Contact No</label>
            <input type="text" class="form-control" id="contact" name="contact" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
          <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
          <label for="donertype">Donar Type</label>
            <select name="donertype" id="donertype" class="form-control">
                <option value="Individual">Individual</option>
                <option value="Care Center">Care Center</option>
                <option value="Pharmacites">Pharmacites</option>
                <option value="Manufactures">Manufactures</option>
            </select>
          </div>
          <div class="mb-3">
          <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mb-3">
          <label for="conpassword">Confirm Password</label>
            <input type="password" class="form-control" id="conpassword" name="conpassword">
          </div>
          <input type="submit" class="btn btn-color px-5 mb-5 w-100" value="Sign Up">
          <div id="emailHelp" class="form-text text-center mb-5 text-dark"><a href="memberlogin.php" class="text-dark fw-bold"> Login Now</a>
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