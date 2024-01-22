<?php include("include/header.php"); ?>
<?php include("include/navbar.php"); ?>

            
            <!------------content-body------------>
            <div class="membermanageTable">
  <table class="table table-hover">
    <thead class="bg-light">
      <tr>
        <th scope="col">Serial</th>
        <th scope="col">Goods Type</th>
        <th scope="col">Goods Quantity</th>
        <th scope="col">Note</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
        require_once '../config/config.php';

        if (isset($_POST['accept_id'])) {
            $accept_id = $_POST['accept_id'];

            $query = "UPDATE donate_goods SET status = 'Accepted' WHERE id = '$accept_id'";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Goods Accepted!');</script>";
            } else {
                echo "Error updating status: " . mysqli_error($conn);
            }
        }

        if (isset($_POST['reject_id'])) {
            $reject_id = $_POST['reject_id'];

            $query = "DELETE FROM donate_goods WHERE id = '$reject_id'";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Goods Rejected and Deleted!');</script>";
            } else {
                echo "Error deleting Goods: " . mysqli_error($conn);
            }
        }

        $query = "SELECT * FROM donate_goods";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['goodsType'] . "</td>";
                echo "<td>" . $row['goodsQuantity'] . "</td>";
                echo "<td>" . $row['notes'] . "</td>";
                echo "<td>" . $row['status'] . "</td>"; 
                echo "<td>";
                echo "<form method='POST' action='managegoodsApprove.php'>";
                echo "<input type='hidden' name='accept_id' value='" . $row['id'] . "'>";
                echo "<button type='submit' class='btn btn-success'>Accept</button>";
                echo "</form>";
                echo "</td>";
                echo "<td>";
                echo "<form method='POST' action='managegoodsApprove.php'>";
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
       