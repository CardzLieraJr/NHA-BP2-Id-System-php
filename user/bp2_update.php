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
    <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
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
                    // ======================================================
                    // HANDLE UPDATE REQUEST (EDIT PROFILE)
                    // ======================================================
                    if (isset($_POST["editprofile"])) {

                        include("../php/db_procedural.php");

                        // ======================================================
                        // INPUTS (sanitized)
                        // ======================================================
                        $id            = $_POST["id"];
                        $bb2_batch     = update_input($_POST["txt_bb2_batch"]);
                        $bb2_app_id    = update_input($_POST["txt_bb2_app_id"]);
                        $bb2_ln        = update_input($_POST["txt_bb2_ln"]);
                        $bb2_fn        = update_input($_POST["txt_bb2_fn"]);
                        $bb2_mn        = update_input($_POST["txt_bb2_mn"]);
                        $bb2_sfx       = update_input($_POST["txt_bb2_sfx"]);
                        $bb2_cn        = update_input($_POST["txt_bb2_cn"]);
                        $bb2_desprov   = update_input($_POST["txt_bb2_desprov"]);
                        $bb2_desmunic  = update_input($_POST["txt_bb2_desmunic"]);
                        $bb2_datebirthm = update_input($_POST["txt_bb2_datebirthm"]);
                        $bb2_datebirthd = update_input($_POST["txt_bb2_datebirthd"]);
                        $bb2_datebirthy = update_input($_POST["txt_bb2_datebirthy"]);
                        $bb2_blood     = update_input($_POST["txt_bb2_blood"]);
                        $bb2_civil     = update_input($_POST["txt_bb2_civil"]);
                        $bb2_cper      = update_input($_POST["txt_bb2_cper"]);
                        $bb2_cpernum   = update_input($_POST["txt_bb2_cpernum"]);

                        // ======================================================
                        // UPDATE QUERY
                        // ======================================================
                        $sql = "UPDATE members_status SET 
                            bb2_batch='$bb2_batch',
                            bb2_app_id='$bb2_app_id',
                            bb2_ln='$bb2_ln',
                            bb2_fn='$bb2_fn',
                            bb2_mn='$bb2_mn',
                            bb2_sfx='$bb2_sfx',
                            bb2_cn='$bb2_cn',
                            bb2_desprov='$bb2_desprov',
                            bb2_desmunic='$bb2_desmunic',
                            bb2_datebirthm='$bb2_datebirthm',
                            bb2_datebirthd='$bb2_datebirthd',
                            bb2_datebirthy='$bb2_datebirthy',
                            bb2_blood='$bb2_blood',
                            bb2_civil='$bb2_civil',
                            bb2_cper='$bb2_cper',
                            bb2_cpernum='$bb2_cpernum'
                            WHERE bb2_id=$id";

                        if (mysqli_query($conn, $sql)) {
                            $successmodal = "block!important";
                        } else {
                            echo "Error updating record: " . mysqli_error($conn);
                        }

                        mysqli_close($conn);
                    }


                    // ======================================================
                    // SANITIZER FUNCTION
                    // ======================================================
                    function update_input($data)
                    {
                        return htmlspecialchars(stripslashes(trim($data)));
                    }

                    // ======================================================
                    // FETCH DATA FOR DISPLAY (EDIT FORM)
                    // ======================================================
                    include("../php/db_procedural.php");

                    $id = $_GET["id"];

                    $sql = "SELECT * FROM members_status WHERE bb2_id = '$id'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {

                            $bb2_batch_print     = $row["bb2_batch"];
                            $bb2_app_id_print    = $row["bb2_app_id"];
                            $bb2_ln_print        = $row["bb2_ln"];
                            $bb2_fn_print        = $row["bb2_fn"];
                            $bb2_mn_print        = $row["bb2_mn"];
                            $bb2_sfx_print       = $row["bb2_sfx"];
                            $bb2_cn_print        = $row["bb2_cn"];
                            $bb2_desprov_print   = $row["bb2_desprov"];
                            $bb2_desmunic_print  = $row["bb2_desmunic"];
                            $bb2_datebirthm_print = $row["bb2_datebirthm"];
                            $bb2_datebirthd_print = $row["bb2_datebirthd"];
                            $bb2_datebirthy_print = $row["bb2_datebirthy"];
                            $bb2_blood_print     = $row["bb2_blood"];
                            $bb2_civil_print     = $row["bb2_civil"];
                            $bb2_cper_print      = $row["bb2_cper"];
                            $bb2_cpernum_print   = $row["bb2_cpernum"];
                        }
                    } else {
                        echo "0 results";
                    }

                    mysqli_close($conn);
                    ?>

                    <div class="container">
                        <center>
                            <h2 class="tm-page-title">Edit Bp2 I'd Profile...</h2>
                            <br><br>
                            <center>
                                <form method="post" action="bp2_update?id=<?php echo $id; ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-xl-6">
                                            <input name="id" type="hidden" value="<?php echo $id; ?>">
                                            <input type="text" name="txt_bb2_app_id" class="form-control" placeholder="Id Number" value="<?php echo $bb2_app_id_print; ?>">
                                        </div>

                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <input type="text" name="txt_bb2_batch" class="form-control" placeholder="Batch" value="<?php echo $bb2_batch_print; ?>">
                                        </div>

                                        <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                            <span>Fullname:</span>
                                        </div>

                                        <div class="form-group col-md-3 col-lg-3 col-xl-3">
                                            <input type="text" name="txt_bb2_ln" class="form-control" placeholder="Last Name" value="<?php echo $bb2_ln_print; ?>">
                                        </div>

                                        <div class="form-group col-md-3 col-lg-3 col-xl-3">
                                            <input type="text" name="txt_bb2_fn" class="form-control" placeholder="First Name" value="<?php echo $bb2_fn_print; ?>">
                                        </div>

                                        <div class="form-group col-md-3 col-lg-3 col-xl-3">
                                            <input type="text" name="txt_bb2_mn" class="form-control" placeholder="middle Name" value="<?php echo $bb2_mn_print; ?>">
                                        </div>

                                        <div class="form-group col-md-3 col-lg-3 col-xl-3">
                                            <input type="text" name="txt_bb2_sfx" class="form-control" placeholder="sfx" value="<?php echo $bb2_sfx_print; ?>">
                                        </div>

                                        <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                            <input type="text" name="txt_bb2_cn" class="form-control" placeholder="Contact Number" value="<?php echo $bb2_cn_print; ?>">
                                        </div>

                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <input type="text" name="txt_bb2_desmunic" class="form-control" placeholder="Municipality" value="<?php echo $bb2_desmunic_print; ?>">
                                        </div>

                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <input type="text" name="txt_bb2_desprov" class="form-control" placeholder="Province" value="<?php echo $bb2_desprov_print; ?>">
                                        </div>

                                        <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                            <span>Birthdate:</span>
                                        </div>

                                        <div class="form-group col-md-4 col-lg-4 col-xl-4">
                                            <input type="text" name="txt_bb2_datebirthm" class="form-control" placeholder="Month" value="<?php echo $bb2_datebirthm_print; ?>">
                                        </div>

                                        <div class="form-group col-md-4 col-lg-4 col-xl-4">
                                            <input type="text" name="txt_bb2_datebirthd" class="form-control" placeholder="Day" value="<?php echo $bb2_datebirthd_print; ?>">
                                        </div>

                                        <div class="form-group col-md-4 col-lg-4 col-xl-4">
                                            <input type="text" name="txt_bb2_datebirthy" class="form-control" placeholder="Year" value="<?php echo $bb2_datebirthy_print; ?>">
                                        </div>

                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <input type="text" name="txt_bb2_blood" class="form-control" placeholder="Blood Type" value="<?php echo $bb2_blood_print; ?>">
                                        </div>

                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <input type="text" name="txt_bb2_civil" class="form-control" placeholder="Civil Status" value="<?php echo $bb2_civil_print; ?>">
                                        </div>

                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <input type="text" name="txt_bb2_cper" class="form-control" placeholder="Contact Person" value="<?php echo $bb2_cper_print; ?>">
                                        </div>

                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <input type="text" name="txt_bb2_cpernum" class="form-control" placeholder="Contact Number" value="<?php echo $bb2_cpernum_print; ?>">
                                        </div>
                                    </div>
                                    <br>
                                    <center>
                                        <input class="btn btn-primary" type="submit" name="editprofile" value="UPDATE">
                                    </center>
                                </form>
                            </div>

                            <div id="myModal" class="modal" style="display:<?php echo $successmodal; ?>;">
                                <div class="modal-content">

                                    <center>
                                        <h1 style="color:black!important">SAVED!</h1>

                                        <h6 style="color:black!important">Your data was successfully updated.</h6>

                                        <a href="./" class="btn btn-danger btn-lg active" role="button" aria-pressed="true" style="text-transform:uppercase;">Close</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include("components/footer.php"); ?>
            </section>
        </main>
    <!-- ======================================================
       Sidebar Navigation
    ======================================================= -->
    <?php include("components/nav.php"); ?>

    <div class="overlay"></div>

    <script src="side_bar/script.js"></script>   
</body>
</html>