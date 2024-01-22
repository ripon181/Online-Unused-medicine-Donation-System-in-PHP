<?php require_once 'config/config.php'; 
if(isset($_REQUEST['pwdrst']))
{
  $email = $_REQUEST['email'];
  $check_email = mysqli_query($conn,"select email from tbl_members where email='$email'");
  $res = mysqli_num_rows($check_email);
  if($res>0)
  {
    $message = '<div>
     <p><b>Hello!</b></p>
     <p>You are recieving this email because we recieved a password reset request for your account.</p>
     <br>
     <p><button class="btn btn-primary"><a href="http://localhost/online_unused_medicine_donation/passwordreset.php?secret='.base64_encode($email).'">Reset Password</a></button></p>
     <br>
     <p>If you did not request a password reset, no further action is required.</p>
    </div>';

include_once("SMTP/class.phpmailer.php");
include_once("SMTP/class.smtp.php");
$email = $email; 
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPAuth = true;                 
$mail->SMTPSecure = "tls";      
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587; 
$mail->Username = "sb.rownokripon@gmail.com";   //Enter your username/emailid
$mail->Password = "jkof obpl rwvc dwrm";   //Enter your password
$mail->FromName = "Online Unused Medicine Donation";
$mail->AddAddress($email);
$mail->Subject = "Reset Password";
$mail->isHTML( TRUE );
$mail->Body =$message;
if($mail->send())
{
  $msg = "We have e-mailed your password reset link!";
}
}
else
{
  $msg = "We can't find a user with that email address";
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

        <form id="validate_form" class="card-body cardbody-color p-lg-5" method="POST">

          <div class="text-center">
            <img src="assets/img/member.jpg" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
          </div>

          <div class="mb-3">
          <input type="text" name="email" id="email" placeholder="Enter Email" required 
       data-parsley-type="email" data-parsley-trigg
       er="keyup" class="form-control" />
        </div>
        <input type="submit" id="login" name="pwdrst" value="Send Password Reset Link" class="btn btn-success" />

          </div>
         <div class="error">
             <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
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