<?php
include("../php/db_procedural.php"); 

// sql to delete a record
$id = $_GET["del"];
$sql = "DELETE FROM members_status WHERE bb2_id=$id";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header("location:database_dash");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>