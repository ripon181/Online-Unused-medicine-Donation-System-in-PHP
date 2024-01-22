<?php
session_start();
require_once 'config/config.php';

function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if the user is already logged in
if (isset($_SESSION['logged_in_ngo_id'])) {
    header('Location: ngoDashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);

    if (empty($email) || empty($password)) {
        $error = "Please enter your email and password.";
    } else {
        $email = mysqli_real_escape_string($conn, $email);
        $hashedPassword = md5($password);

        $query = "SELECT * FROM tbl_ngo WHERE email = '$email' AND password = '$hashedPassword'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['logged_in_ngo_id'] = $row['id'];
            $_SESSION['member_id'] = $row['id']; 
            $_SESSION['member_email'] = $row['email']; 
            $_SESSION['currentNGO'] = $row['nearbyngo'];
            $_SESSION['ngo_name'] = $row['name'];

            header('Location: ngoDashboard.php');
            exit();
        } else {
            $error = "Invalid email or password. Please try again.";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h2 class="text-center text-dark mt-5">NGO Login</h2>
      <div class="card my-5">
        <form class="card-body cardbody-color p-lg-5" method="POST" action="">
          <div class="text-center">
            <img src="assets/img/ngo.jpg" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" id="Username" name="email" aria-describedby="emailHelp" placeholder="User Name">
          </div>
          <div class="mb-3 input-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <button type="button" class="btn btn-outline-secondary" id="togglePassword"><i class="far fa-eye"></i></button>
          </div>
          <input type="submit" class="btn btn-color px-5 mb-5 w-100" value="Login">
          <div id="emailHelp" class="form-text text-center text-dark">Not
            Registered? <a href="ngoRegister.php" class="text-dark fw-bold"> Create an Account</a>
          </div>
          <div class="mb-3">
              <a href="forgotPasswordNgo.php" class="text-dark">Forgot Password?</a>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
  // JavaScript to toggle password visibility
  const passwordInput = document.getElementById('password');
  const togglePasswordButton = document.getElementById('togglePassword');
  
  togglePasswordButton.addEventListener('click', function () {
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
    } else {
      passwordInput.type = 'password';
    }
  });
</script>  
</body>
</html>
