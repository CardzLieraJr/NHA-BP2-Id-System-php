<?php
include("../php/db_procedural.php"); 

// sql to delete a record
$id = $_GET["del"];
$sql = "DELETE FROM nha_users WHERE nha_bp2_user_id=$id";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header("location:bp2_acc");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>