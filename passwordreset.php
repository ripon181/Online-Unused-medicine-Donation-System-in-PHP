<?php require_once 'config/config.php'; 
if(isset($_REQUEST['pwdrst']))
{
  $email = $_REQUEST['email'];
  $password = md5($_REQUEST['password']);
  $conpassword = md5($_REQUEST['conpassword']);
  if($password == $conpassword)
  {
    $reset_pwd = mysqli_query($conn,"update tbl_members set password='$password' where email='$email'");
    if($reset_pwd>0)
    {
      $msg = 'Your password updated successfully <a href="memberlogin.php">Click here</a> to login';
    }
    else
    {
      $msg = "Error while updating password.";
    }
  }
  else
  {
    $msg = "Password and Confirm Password do not match";
  }
}

if(isset($_GET['secret'])) {
    $email = base64_decode($_GET['secret']);
    $check_details = mysqli_query($conn,"select email from tbl_members where email='$email'");
    $res = mysqli_num_rows($check_details);
    if($res>0) {
        // Your code for password reset here
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
      <h2 class="text-center text-dark mt-5">Reset Password</h2>
      <div class="card my-5">

        

          <div class="text-center">
            <img src="assets/img/member.jpg" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
          </div>

          <form id="validate_form" method="post" >  
      <input type="hidden" name="email" value="<?php echo $email; ?>"/>
      <div class="form-group">
       <label for="password">Password</label>
       <input type="password" name="password" id="password" placeholder="Enter Password" required 
       data-parsley-type="password" data-parsley-trigg
       er="keyup" class="form-control"/>
      </div>
      <div class="form-group">
       <label for="conpassword">Confirm Password</label>
       <input type="password" name="conpassword" id="conpassword" placeholder="Enter Confirm Password" required data-parsley-type="cpwd" data-parsley-trigg
       er="keyup" class="form-control"/>
      </div>
      <div class="form-group">
       <input type="submit" id="login" name="pwdrst" value="Reset Password" class="btn btn-success" />
       </div>
       
       <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
     </form>
      </div>

    </div>
  </div>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>