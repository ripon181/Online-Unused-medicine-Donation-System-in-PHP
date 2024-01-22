<?php include("include/header.php"); ?>
<?php include("include/navbar.php"); ?>

            
            <!------------content-body------------>
            <div class="membermanageTable">
  <table class="table table-hover">
    <thead class="bg-light">
      <tr>
        <th scope="col">NGO Id</th>
        <th scope="col">NGO Name</th>
        <th scope="col">NGO Location</th>
        <th scope="col">NGO Email</th>
        <th scope="col">Action</th>
       
      </tr>
    </thead>
    <tbody>
      <?php
     
     require_once '../config/config.php';
      $query = "SELECT * FROM tbl_ngo";
      $result = mysqli_query($conn, $query);

    
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>";
        echo "<form method='POST' action='deleteNgo.php'>";
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
       