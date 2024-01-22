<?php


require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];


    $query = "DELETE FROM tbl_ngo WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {

        echo "<script>alert('NGO ID $id has been deleted successfully.');</script>";
        echo "<script>window.location.href = 'manageNgo.php';</script>";
    } else {

        echo "Failed to delete NGO with ID $id.";
    }
}

mysqli_close($conn);
?>