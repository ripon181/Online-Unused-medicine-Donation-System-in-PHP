<?php include("include/header.php"); ?>
<?php include("include/navbar.php"); ?>

            
            <!------------content-body------------>
            <div class="membermanageTable">
  <table class="table table-hover">
    <thead class="bg-light">
      <tr>
        <th scope="col">Serial</th>
        <th scope="col">Medicine Name</th>
        <th scope="col">Medicine Count</th>
        <th scope="col">NGO Name</th>
        <th scope="col">Purchased Date</th>
        <th scope="col">Expiry Date</th>
        <th scope="col">Details</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
        require_once '../config/config.php';

        if (isset($_POST['accept_id'])) {
            $accept_id = $_POST['accept_id'];

            $query = "UPDATE donate_medicine SET status = 'Accepted' WHERE id = '$accept_id'";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Medicine Accepted!');</script>";
            } else {
                echo "Error updating status: " . mysqli_error($conn);
            }
        }

        if (isset($_POST['reject_id'])) {
            $reject_id = $_POST['reject_id'];

            $query = "DELETE FROM donate_medicine WHERE id = '$reject_id'";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Medicine Rejected and Deleted!');</script>";
            } else {
                echo "Error deleting medicine: " . mysqli_error($conn);
            }
        }

        $query = "SELECT * FROM donate_medicine";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['medicinename'] . "</td>";
                echo "<td>" . $row['medicinecount'] . "</td>";
                echo "<td>" . $row['nearbyngo'] . "</td>";
                echo "<td>" . $row['purchaseddate'] . "</td>";
                echo "<td>" . $row['expirydate'] . "</td>";
                echo "<td>" . $row['details'] . "</td>";
                echo "<td>" . $row['status'] . "</td>"; 
                echo "<td>";
                echo "<form method='POST' action='managemedicineApprove.php'>";
                echo "<input type='hidden' name='accept_id' value='" . $row['id'] . "'>";
                echo "<button type='submit' class='btn btn-success'>Accept</button>";
                echo "</form>";
                echo "</td>";
                echo "<td>";
                echo "<form method='POST' action='managemedicineApprove.php'>";
                echo "<input type='hidden' name='reject_id' value='" . $row['id'] . "'>";
                echo "<button type='submit' class='btn btn-danger'>Reject</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "Error fetching data: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>



    </tbody>
  </table>
</div>




<?php include("include/footer.php"); ?>
       