<?php

    $servername = "localhost";
    $username   = "root";
    $password   = "root";
    $dbname     = "bb2";
    $port       = 3306; // MySQL port (NOT 8080)

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>