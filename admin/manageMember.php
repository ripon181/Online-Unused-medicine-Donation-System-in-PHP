<?php include("include/header.php"); ?>
<?php include("include/navbar.php"); ?>

            
            <!------------content-body------------>
            <div class="membermanageTable">
  <table class="table table-hover">
    <thead class="bg-light">
      <tr>
        <th scope="col">Member Id</th>
        <th scope="col">Name</th>
        <th scope="col">Gender</th>
        <th scope="col">Email</th>
        <th scope="col">Age</th>
        <th scope="col">Phone</th>
        <th scope="col">Address</th>
        <th scope="col">Donor Type</th>
        <th scope="col">Action</th>
       
      </tr>
    </thead>
    <tbody>
      <?php
     
     require_once '../config/config.php';
      $query = "SELECT * FROM tbl_members";
      $result = mysqli_query($conn, $query);

    
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['contact'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['donertype'] . "</td>";
        echo "<td>";
        echo "<form method='POST' action='deleteMember.php'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<button type='submit' class='btn btn-danger'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    

      mysqli_close($conn);
      ?>
    </tbody>
  </table>
</div>

            
<?php include("include/footer.php"); ?>
       