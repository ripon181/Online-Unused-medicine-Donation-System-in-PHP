<?php
require_once 'config/config.php';

function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $id = $_POST['id'];
    $password = sanitize($_POST['password']);
    $confirmPassword = sanitize($_POST['confirm_password']);

    
    if ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    } else {
       
        $hashedPassword = md5($password);

      
        $query = "UPDATE tbl_ngo SET password = '$hashedPassword' WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if ($result) {
           
            echo '<script>alert("Password Changed Successfull !!!."); window.location.href = "ngoDashboard.php";</script>';
            exit();
        } else {
            $error = "Failed to update password. Please try again later.";
        }
    }
}


$id = $_GET['id'] ?? '';
if (!empty($id)) {
    $query = "SELECT * FROM tbl_ngo WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $member = mysqli_fetch_assoc($result);
    } else {
        $error = "Member not found.";
    }
} else {
    $error = "Member ID not provided.";
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
      <a class="nav-item nav-link bg-info text-light" href="stockmanagement.php">Medicine Stock</a>
      <a class="nav-item nav-link bg-primary text-light" href="goodsStock.php">Goods Stock</a>
      <a class="nav-item nav-link bg-success text-light" href="moneyStock.php">Money Stock</a>
      <a class="nav-item nav-link bg-warning text-light" href="ngoChangePassword.php?id=id">Change PAssword</a>
      <a class="nav-item nav-link bg-danger text-light" href="logout.php">Logout</a>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h2 class="text-center text-dark mt-5">Change Password</h2>
      <div class="card my-5">
      <?php if (isset($member) && !empty($member)) : ?>
        <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $member['id']; ?>">
        <div class="mb-3">
            <label for="password">New Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <input type="submit" class="btn btn-color" value="Update Password">
    </form>
<?php else : ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
