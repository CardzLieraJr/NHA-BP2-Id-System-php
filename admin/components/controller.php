<section>
    <div id="tm-bg"></div>
    <div id="tm-wrap">
        <div class="tm-main-content">
            <div class="container tm-site-header-container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-md-col-xl-6 mb-md-0 mb-sm-4 mb-4 tm-site-header-col">
                        <div class="tm-site-header">
                            <h1 class="mb-4">BP2 I'd System</h1>
                            <a style="display: block;text-align: left;line-height: 1.9;">Welcome Operator: <?php echo $admin_fullname; ?></a>
                            <img src="img/underline.png" class="img-fluid mb-4">
                            <p>BALIK PROBINSYA, BAGONG PAGASA PROGRAM aims to provide hope for better future of Filipinos through equity in resources throughout the country and boost countryside development.</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="content">
                            <div class="grid">
                                <div class="grid__item" id="home-link">
                                    <div class="product">

                                        <a href="cam_dash">
                                            <div class="tm-nav-link">
                                                <i class="fas fa-camera fa-3x tm-nav-icon"></i>
                                                <span class="tm-nav-text">Camera</span>
                                                <div class="product__bg"></div>
                                            </div>
                                        </a>
                                        <div class="product__description">
                                        </div>
                                    </div>
                                </div>

                                <div class="grid__item" id="team-link">
                                    <div class="product">
                                        <a href="database_dash">
                                            <div class="tm-nav-link">
                                                <i class="fas fa-database fa-3x tm-nav-icon"></i>
                                                <span class="tm-nav-text">Database</span>
                                                <div class="product__bg"></div>
                                            </div>
                                        </a>

                                        <div class="product__description">
                                            <div class="p-sm-4 p-2">
                                                <div class="row tm-reverse-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid__item">
                                    <div class="product">
                                        <div class="tm-nav-link">
                                            <i class="fas fa-keyboard fa-3x tm-nav-icon"></i>
                                            <span class="tm-nav-text">Create Data</span>
                                            <div class="product__bg"></div>
                                        </div>

                                        <div class="product__description">
                                            <div class="p-sm-4 p-2">
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <h2 class="tm-page-title">Create Bp2 I'd data</h2>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-12"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">

                                                        <?php
                                                        $successmodal = "none";
                                                        $bb2_app_id = "";
                                                        $bb2_app_id_error  = "";

                                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                            include("../config/db.php");
                                                            if (!empty($_POST["txt_bb2_app_id"])) {
                                                                $bb2_app_id  = nha_input($_POST["txt_bb2_app_id"]);
                                                                $sqlCheck = "SELECT * FROM members_status WHERE bb2_app_id = '$bb2_app_id';";
                                                                if ($checkResult = mysqli_query($conn, $sqlCheck)) {
                                                                    if (mysqli_num_rows($checkResult) == 1) {

                                                                        $bb2_app_id_error = "<span style='color:red;text-align:center;'>Project no. is already existed. kindly report to admin for the confirmation.</span>";
                                                                    }
                                                                }
                                                            }

                                                            $bb2_app_id                 = nha_input($_POST["txt_bb2_app_id"]);
                                                            $bb2_batch                  = nha_input($_POST["txt_bb2_batch"]);
                                                            $bb2_ln                     = nha_input($_POST["txt_bb2_ln"]);
                                                            $bb2_fn                     = nha_input($_POST["txt_bb2_fn"]);
                                                            $bb2_mn                     = nha_input($_POST["txt_bb2_mn"]);
                                                            $bb2_sfx                    = nha_input($_POST["txt_bb2_sfx"]);
                                                            $bb2_cn                     = nha_input($_POST["txt_bb2_cn"]);
                                                            $bb2_desprov                = nha_input($_POST["txt_bb2_desprov"]);
                                                            $bb2_desmunic               = nha_input($_POST["txt_bb2_desmunic"]);
                                                            $bb2_datebirthm             = nha_input($_POST["txt_bb2_datebirthm"]);
                                                            $bb2_datebirthd             = nha_input($_POST["txt_bb2_datebirthd"]);
                                                            $bb2_datebirthy             = nha_input($_POST["txt_bb2_datebirthy"]);
                                                            $bb2_blood                  = nha_input($_POST["txt_bb2_blood"]);
                                                            $bb2_civil                  = nha_input($_POST["txt_bb2_civil"]);
                                                            $bb2_cper                   = nha_input($_POST["txt_bb2_cper"]);
                                                            $bb2_cpernum                = nha_input($_POST["txt_bb2_cpernum"]);

                                                            date_default_timezone_set('Asia/Manila');
                                                            $bb2_registered_date     = date("Y-m-d h:i:s");

                                                            if (empty($bb2_app_id_error)) {
                                                                $sql = "INSERT INTO members_status    
                                                                    (
                                                                    bb2_app_id,
                                                                    bb2_batch,  
                                                                    bb2_ln,
                                                                    bb2_fn,
                                                                    bb2_mn,
                                                                    bb2_sfx,
                                                                    bb2_cn,
                                                                    bb2_desprov,
                                                                    bb2_desmunic,
                                                                    bb2_datebirthm,
                                                                    bb2_datebirthd,
                                                                    bb2_datebirthy,
                                                                    bb2_blood,
                                                                    bb2_civil,
                                                                    bb2_cper,
                                                                    bb2_cpernum,
                                                                    bb2_registered_date
                                                                    )
                                                                    VALUES(
                                                                    '$bb2_app_id',
                                                                    '$bb2_batch',
                                                                    '$bb2_ln',
                                                                    '$bb2_fn',
                                                                    '$bb2_mn',
                                                                    '$bb2_sfx',
                                                                    '$bb2_cn',
                                                                    '$bb2_desprov',
                                                                    '$bb2_desmunic',
                                                                    '$bb2_datebirthm',
                                                                    '$bb2_datebirthd',
                                                                    '$bb2_datebirthy',
                                                                    '$bb2_blood',
                                                                    '$bb2_civil',
                                                                    '$bb2_cper',    
                                                                    '$bb2_cpernum',                                                                                                                       
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

                                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-md-6 col-lg-6 col-xl-6">
                                                                    <input type="text" name="txt_bb2_app_id" class="form-control" placeholder="Id Number" required>
                                                                </div>

                                                                <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                                    <input type="text" name="txt_bb2_batch" class="form-control" placeholder="Batch" required>
                                                                </div>


                                                                <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                                                    <span>Fullname:</span>
                                                                </div>

                                                                <div class="form-group col-md-3 col-lg-3 col-xl-3">
                                                                    <input type="text" name="txt_bb2_ln" class="form-control" placeholder="Last Name" required>
                                                                </div>

                                                                <div class="form-group col-md-3 col-lg-3 col-xl-3">
                                                                    <input type="text" name="txt_bb2_fn" class="form-control" placeholder="First Name" required>
                                                                </div>

                                                                <div class="form-group col-md-3 col-lg-3 col-xl-3">
                                                                    <input type="text" name="txt_bb2_mn" class="form-control" placeholder="middle Name" required>
                                                                </div>

                                                                <div class="form-group col-md-3 col-lg-3 col-xl-3">
                                                                    <input type="text" name="txt_bb2_sfx" class="form-control" placeholder="sfx">
                                                                </div>


                                                                <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                                                    <input type="text" name="txt_bb2_cn" class="form-control" placeholder="Contact Number" required>
                                                                </div>


                                                                <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                                    <input type="text" name="txt_bb2_desmunic" class="form-control" placeholder="Municipality" required>
                                                                </div>

                                                                <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                                    <input type="text" name="txt_bb2_desprov" class="form-control" placeholder="Province" required>
                                                                </div>

                                                                <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                                                    <span>Birthdate:</span>
                                                                </div>

                                                                <div class="form-group col-md-4 col-lg-4 col-xl-4">
                                                                    <input type="text" name="txt_bb2_datebirthm" class="form-control" placeholder="Month" required>
                                                                </div>

                                                                <div class="form-group col-md-4 col-lg-4 col-xl-4">
                                                                    <input type="text" name="txt_bb2_datebirthd" class="form-control" placeholder="Day" required>
                                                                </div>

                                                                <div class="form-group col-md-4 col-lg-4 col-xl-4">
                                                                    <input type="text" name="txt_bb2_datebirthy" class="form-control" placeholder="Year" required>
                                                                </div>

                                                                <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                                    <input type="text" name="txt_bb2_blood" class="form-control" placeholder="Blood Type" required>
                                                                </div>

                                                                <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                                    <input type="text" name="txt_bb2_civil" class="form-control" placeholder="Civil Status" required>
                                                                </div>

                                                                <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                                    <input type="text" name="txt_bb2_cper" class="form-control" placeholder="Contact Person" required>
                                                                </div>

                                                                <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                                    <input type="text" name="txt_bb2_cpernum" class="form-control" placeholder="Contact Number" required>
                                                                </div>

                                                            </div>
                                                            <br>

                                                            <center>
                                                                <input type="submit" name="submit" value="Save" class="btn btn-primary">

                                                            </center>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid__item">
                                    <div class="product">
                                        <div class="tm-nav-link">

                                            <i class="fas fa-user-plus fa-3x tm-nav-icon"></i>
                                            <span class="tm-nav-text">Import Data</span>
                                            <div class="product__bg"></div>
                                        </div>

                                        <div class="product__description">
                                            <div class="pt-sm-4 pb-sm-4 pl-sm-5 pr-sm-5 pt-2 pb-2 pl-3 pr-3">
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <h2 class="tm-page-title">Import Database</h2>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-12">

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div>

                                                            <form method="post" action="file-uploadmember.php" enctype="multipart/form-data">
                                                                <input type="file" name="uploadfile">
                                                                <input type="submit" name="submit">
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid__item" id="team-link">
                <div class="product">
                    <a href="bp2_create_acc">
                        <div class="tm-nav-link">


                            <i class="fas fa-user fa-3x tm-nav-icon"></i>
                            <span class="tm-nav-text">Register New Account</span>
                            <div class="product__bg"></div>
                        </div>
                    </a>

                </div>
            </div>

            <div id="myModal" class="modal" style="display:<?php echo $successmodal; ?>;">
                <div class="modal-content">
                    <center>
                        <h1 style="color:black!important;">Registered!</h1>
                        <h6 style="color:black!important;">our new data was Successfully saved.</h6>
                        <a href="./" class="btn btn-danger btn-lg active" role="button" aria-pressed="true" style="text-transform:uppercase;">Close</a>
                    </center>
                </div>
            </div>

           <?php include("components/footer.php"); ?>
        </div>
    </div>

</section>