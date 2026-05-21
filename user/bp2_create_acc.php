<?php
// ======================================================
// Include admin authentication
// Prevents unauthorized access to this page
// ======================================================
include("../config/auth_admin.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    // ======================================================
    // Dynamic page title component
    // ======================================================
    include "../components/title.php";
    ?>

    <!-- ======================================================
       Favicon
  ======================================================= -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" />
    <link rel="stylesheet" href="side_bar/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/cardz.css">
</head>

<body>
    <a href="#navigation" class="nav-trigger">
        Menu <span></span>
    </a>
    <main>
        <section>
            <div id="tm-bg"></div>
            <div id="tm-wrap">
                <div class="container-fluid">
                    <?php
                    $successmodal = "none";

                    // Duplicate Data
                    $nha_bp2_email = "";
                    $nha_bp2_email_error  = "";

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        include("../php/db_procedural.php");
                        if (!empty($_POST["txt_nha_bp2_email"])) {
                            $nha_bp2_email  = nha_input($_POST["txt_nha_bp2_email"]);
                            $sqlCheck = "SELECT * FROM nha_users WHERE nha_bp2_email = '$nha_bp2_email';";
                            if ($checkResult = mysqli_query($conn, $sqlCheck)) {
                                if (mysqli_num_rows($checkResult) == 1) {

                                    $nha_bp2_email_error = "<span style='color:red;text-align:center;'>Project no. is already existed. kindly report to admin for the confirmation.</span>";
                                }
                            }
                        }
                        $nha_bp2_email            = nha_input($_POST["txt_nha_bp2_email"]);
                        $nha_bp2_fn               = nha_input($_POST["txt_nha_bp2_fn"]);
                        $nha_bp2_ln               = nha_input($_POST["txt_nha_bp2_ln"]);
                        $nha_bp2_mn               = nha_input($_POST["txt_nha_bp2_mn"]);
                        $nha_bp2_sfx              = nha_input($_POST["txt_nha_bp2_sfx"]);
                        $nha_bp2_cn               = nha_input($_POST["txt_nha_bp2_cn"]);
                        $nha_bp2_password         = nha_input($_POST["txt_nha_bp2_password"]);
                        $nha_bp2_cpassword        = nha_input($_POST["txt_nha_bp2_cpassword"]);
                        $nha_bp2_ln_acc_type      = nha_input($_POST["txt_nha_bp2_ln_acc_type"]);

                        date_default_timezone_set('Asia/Manila');
                        $bb2_registered_date = date("Y-m-d H:i:s");

                        if (empty($nha_bp2_email_error)) {
                            $sql = "INSERT INTO nha_users    
                                (
                                nha_bp2_email,
                                nha_bp2_fn,  
                                nha_bp2_ln,
                                nha_bp2_mn,
                                nha_bp2_sfx,
                                nha_bp2_cn,
                                nha_bp2_password,
                                nha_bp2_cpassword,
                                nha_bp2_ln_acc_type,
                                bb2_registered_date
                                )
                                VALUES(
                                '$nha_bp2_email',
                                '$nha_bp2_fn',
                                '$nha_bp2_ln',
                                '$nha_bp2_mn',
                                '$nha_bp2_sfx',
                                '$nha_bp2_cn',
                                '$nha_bp2_password',
                                '$nha_bp2_cpassword',
                                '$nha_bp2_ln_acc_type',                                                                                                                   
                                '$bb2_registered_date'
                                )";

                            if (mysqli_query($conn, $sql)) {

                                $successmodal = "block!important";
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }

                            mysqli_close($conn);
                        }
                    }

                    // Sercurity Purposes
                    function nha_input($data)
                    {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                    ?>

                    <div class="container">
                        <center>
                            <h2 class="tm-page-title">Register New Account</h2>
                            <br><br>
                            <center>
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

                                    <span style="float: left; ">Select Role</span>
                                    <select name="txt_nha_bp2_ln_acc_type" class="form-control" style="height: 65px;" required>
                                        <option value="">----------</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Staff</option>
                                    </select>

                                    <br>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                            <span>Fullname:</span>
                                        </div>

                                        <div class="form-group col-md-3 col-lg-3 col-xl-3">
                                            <input type="text" name="txt_nha_bp2_ln" class="form-control" placeholder="Last Name" required>
                                        </div>

                                        <div class="form-group col-md-3 col-lg-3 col-xl-3">
                                            <input type="text" name="txt_nha_bp2_fn" class="form-control" placeholder="First Name" required>
                                        </div>

                                        <div class="form-group col-md-3 col-lg-3 col-xl-3">
                                            <input type="text" name="txt_nha_bp2_mn" class="form-control" placeholder="middle Name" required>
                                        </div>

                                        <div class="form-group col-md-3 col-lg-3 col-xl-3">
                                            <input type="text" name="txt_nha_bp2_sfx" class="form-control" placeholder="sfx">
                                        </div>

                                        <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                            <input type="text" name="txt_nha_bp2_cn" class="form-control" placeholder="Contact Number" required>
                                        </div>

                                        <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                            <input type="email" name="txt_nha_bp2_email" class="form-control" placeholder="Email Address" required>
                                        </div>

                                        <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                            <input type="password" name="txt_nha_bp2_password" class="form-control" placeholder="Password" required>
                                        </div>

                                        <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                            <input type="password" name="txt_nha_bp2_cpassword" class="form-control" placeholder="Confirm Password" required>
                                        </div>

                                    </div>
                                    <br>
                                    <center>
                                        <input type="submit" name="submit" value="Save" class="btn btn-primary"> <a type="submit" class="btn btn-primary" href="./">Back</a>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="myModal" class="modal" style="display:<?php echo $successmodal; ?>;">
                        <div class="modal-content">
                            <center>
                                <h1 style="color: black!important;">SAVED!</h1>
                                <h6 style="color: black!important;">Your data was successfully updated.</h6>
                                <a href=" ./" class="btn btn-danger btn-lg active" role="button" aria-pressed="true" style="text-transform:uppercase;">Close</a>
                            </center>
                        </div>
                    </div>
                    <?php include("components/footer.php"); ?>
        </section>
    </main>
    <!-- ======================================================
       Sidebar Navigation
    ======================================================= -->
    <?php include("components/nav.php"); ?>
    <script src="side_bar/script.js"></script>
</body>
</html>