<?php
require_once 'config/config.php';

function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize the updated member details
    $id = $_POST['id'];
    $name = sanitize($_POST['name']);
    $gender = sanitize($_POST['gender']);
    $email = sanitize($_POST['email']);
    $age = sanitize($_POST['age']);
    $contact = sanitize($_POST['contact']);
    $address = sanitize($_POST['address']);
    $donertype = sanitize($_POST['donertype']);

    // Update the member details in the database
    $query = "UPDATE tbl_members SET name = '$name', gender = '$gender', email = '$email', age = '$age', contact = '$contact', address = '$address', donertype = '$donertype' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to a success page or desired destination after updating the details
        header('Location: memberDashboard.php');
        exit();
    } else {
        $error = "Failed to update member details. Please try again later.";
    }
}

// Retrieve the member details from the database based on the member ID
$id = $_GET['id'] ?? '';
if (!empty($id)) {
    $query = "SELECT * FROM tbl_members WHERE id = $id";
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
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h2 class="text-center text-dark mt-5">Edit Member Details</h2>
      <div class="card my-5">
      <?php if (isset($member) && !empty($member)) : ?>
        <form class="card-body cardbody-color p-lg-5" method="POST" action="">
          <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $member['name']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required>
              <option value="Male" <?php if ($member['gender'] === 'Male') echo 'selected'; ?>>Male</option>
              <option value="Female" <?php if ($member['gender'] === 'Female') echo 'selected'; ?>>Female</option>
              <option value="Others" <?php if ($member['gender'] === 'Others') echo 'selected'; ?>>Others</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $member['email']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="age">Age</label>
            <input type="text" class="form-control" id="age" name="age" value="<?php echo $member['age']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="contact">Contact No</label>
            <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $member['contact']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $member['address']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="donertype">Donor Type</label>
            <select name="donertype" id="donertype" class="form-control" required>
              <option value="Individual" <?php if ($member['donertype'] === 'Individual') echo 'selected'; ?>>Individual</option>
              <option value="Care Center" <?php if ($member['donertype'] === 'Care Center') echo 'selected'; ?>>Care Center</option>
              <option value="Pharmacies" <?php if ($member['donertype'] === 'Pharmacies') echo 'selected'; ?>>Pharmacies</option>
              <option value="Manufacturers" <?php if ($member['donertype'] === 'Manufacturers') echo 'selected'; ?>>Manufacturers</option>
            </select>
          </div>
          <input type="hidden" name="id" value="<?php echo $member['id']; ?>">
          <input type="submit" class="btn btn-color px-5 mb-5 w-100" value="Update">
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
