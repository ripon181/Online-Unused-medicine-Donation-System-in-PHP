<?php


require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];


    $query = "DELETE FROM tbl_members WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {

        echo "<script>alert('Member with ID $id has been deleted successfully.');</script>";
        echo "<script>window.location.href = 'manageMember.php';</script>";
    } else {

        echo "Failed to delete member with ID $id.";
    }
}

mysqli_close($conn);
?>
