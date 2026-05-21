<?php
session_start();
?>

<?php
// Include database connection (procedural MySQLi)
include("php/db_procedural.php");

// Initialize variables for input and error messages
$nha_bp2_email = $nha_bp2_password_login = "";
$nha_bp2_emailErr = $nha_bp2_password_loginErr = "";

// Check if login button was clicked
if (isset($_POST["btnLogin"])) {

    // =========================
    // EMAIL VALIDATION
    // =========================
    if (empty($_POST["nha_bp2_email"])) {
        $nha_bp2_emailErr = "Invalid Email"; // error if empty
    } else {
        $nha_bp2_email = $_POST["nha_bp2_email"]; // assign email
    }

    // =========================
    // PASSWORD VALIDATION
    // =========================
    if (empty($_POST["nha_bp2_password_login"])) {
        $nha_bp2_password_loginErr = "Invalid Password!"; // error if empty
    } else {
        $nha_bp2_password_login = $_POST["nha_bp2_password_login"]; // assign password
    }

    // =========================
    // ONLY RUN LOGIN IF BOTH FIELDS ARE FILLED
    // =========================
    if ($nha_bp2_email && $nha_bp2_password_login) {

        // =========================
        // GET USER FROM DATABASE
        // =========================
        $stmt = $conn->prepare("SELECT * FROM nha_users WHERE nha_bp2_email = ?");
        $stmt->bind_param("s", $nha_bp2_email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if email exists
        if ($result->num_rows > 0) {

            // Fetch user data
            $row = $result->fetch_assoc();

            $db_password = $row["nha_bp2_password"]; // password from DB
            $role = $row["nha_bp2_ln_acc_type"]; // role (admin/user)

            // =========================
            // PASSWORD CHECK (CURRENTLY NOT HASHED)
            // =========================
            if ($nha_bp2_password_login == $db_password) {

                // Store session (user is logged in)
                $_SESSION['nha_bp2_email'] = $nha_bp2_email;

                // =========================
                // ROLE-BASED REDIRECT
                // =========================
                if ($role == 1) {
                    header("Location: admin/"); // admin page
                    exit;
                } else {
                    header("Location: user/"); // user page
                    exit;
                }
            } else {
                // Wrong password error
                $nha_bp2_password_loginErr = "Password is incorrect";
            }
        } else {
            // Email not found in database
            $nha_bp2_emailErr = "Email not registered";
        }
    }
}
?>