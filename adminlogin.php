<?php

require_once 'config/config.php';


function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);

    $hashedPassword = md5($password);
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$hashedPassword'";
    $result = mysqli_query($conn, $query);

    
    if ($result) {
       
        if (mysqli_num_rows($result) == 1) {
           
            session_start();
            $_SESSION['admin'] = $username;

 
            header('Location: admin/dashboard.php');
            exit();
        } else {
   
            $error = "Invalid username or password";
        }
    } else {
   
        $error = "Database error: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Unused Medicine Donation</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h2 class="text-center text-dark mt-5">Admin Login</h2>
      <div class="card my-5">
        <form class="card-body cardbody-color p-lg-5" method="POST" action="">
          <div class="text-center">
            <img src="assets/img/admin.jpg" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" id="Username" name="username" aria-describedby="emailHelp" placeholder="User Name">
          </div>
          <div class="mb-3 input-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <button type="button" class="btn btn-outline-secondary" id="togglePassword"><i class="far fa-eye"></i></button>
          </div>
          <input type="submit" class="btn btn-color px-5 mb-5 w-100" Value="Login">
          <?php
            // Display error message if set
            if (isset($error)) {
                echo '<p class="text-danger">' . $error . '</p>';
            }
          ?>
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
