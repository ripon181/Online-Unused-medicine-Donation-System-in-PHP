<?php include("include/header.php"); ?>
<?php include("include/navbar.php"); ?>

            
            <!------------content-body------------>
            <div class="membermanageTable">
  <table class="table table-hover">
    <thead class="bg-light">
      <tr>
        <th scope="col">Serial</th>
        <th scope="col">Bkash Number</th>
        <th scope="col">Transaction Number</th>
        <th scope="col">Money Amount</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
        require_once '../config/config.php';

        if (isset($_POST['accept_id'])) {
            $accept_id = $_POST['accept_id'];

            $query = "UPDATE tbl_money SET status = 'Accepted' WHERE id = '$accept_id'";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Money Accepted!');</script>";
            } else {
                echo "Error updating status: " . mysqli_error($conn);
            }
        }

        if (isset($_POST['reject_id'])) {
            $reject_id = $_POST['reject_id'];

            $query = "DELETE FROM tbl_money WHERE id = '$reject_id'";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Money Rejected and Deleted!');</script>";
            } else {
                echo "Error deleting Money: " . mysqli_error($conn);
            }
        }

        $query = "SELECT * FROM tbl_money";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['bkash_number'] . "</td>";
                echo "<td>" . $row['tnx_number'] . "</td>";
                echo "<td>" . $row['money_amount'] . "</td>";
                echo "<td>" . $row['status'] . "</td>"; 
                echo "<td>";
                echo "<form method='POST' action='managemoneyApprove.php'>";
                echo "<input type='hidden' name='accept_id' value='" . $row['id'] . "'>";
                echo "<button type='submit' class='btn btn-success'>Accept</button>";
                echo "</form>";
                echo "</td>";
                echo "<td>";
                echo "<form method='POST' action='managemoneyApprove.php'>";
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
       