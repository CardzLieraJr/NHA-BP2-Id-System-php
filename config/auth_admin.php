<?php
// Start session to access login data
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include database connection file
include("db.php");

// --------------------------------------------------
// CHECK IF USER IS LOGGED IN
// If session email is not set, redirect to login page
// --------------------------------------------------
if (empty($_SESSION["nha_bp2_email"])) {
    header("Location: index.php");
    exit();
}

// Get logged-in user's email from session
$email = $_SESSION["nha_bp2_email"];

// Initialize variable for full name
$admin_fullname = "";

// --------------------------------------------------
// FETCH USER DATA SECURELY USING PREPARED STATEMENT
// --------------------------------------------------
$stmt = $conn->prepare("
    SELECT nha_bp2_fn, nha_bp2_mn, nha_bp2_ln, nha_bp2_sfx 
    FROM nha_users 
    WHERE nha_bp2_email = ?
");

// Bind email parameter to query
$stmt->bind_param("s", $email);

// Execute query
$stmt->execute();

// Get result
$result = $stmt->get_result();

// --------------------------------------------------
// CHECK IF USER EXISTS IN DATABASE
// --------------------------------------------------
if ($result && $result->num_rows > 0) {

    // Fetch user data
    $row = $result->fetch_assoc();

    // Build full name safely (ignores empty values)
    $admin_fullname = trim(
        implode(" ", array_filter([
            $row['nha_bp2_fn'],
            $row['nha_bp2_mn'],
            $row['nha_bp2_ln'],
            $row['nha_bp2_sfx']
        ]))
    );

} else {

    // --------------------------------------------------
    // INVALID USER OR SESSION HACK → FORCE LOGOUT
    // --------------------------------------------------
    session_unset();
    session_destroy();

    header("Location: index.php");
    exit();
}
?>