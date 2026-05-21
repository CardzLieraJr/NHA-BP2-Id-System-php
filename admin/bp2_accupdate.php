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
          $idpass = $_GET["id"];
          $id = $_GET["id"];
          $errmodal = "none";
          $successmodal = "none";

          if (isset($_POST["changepassword"])) {
            include("../php/db_procedural.php");
            $nha_bp2_password     = update_input($_POST["txt_nha_bp2_password"]);
            $nha_bp2_cpassword     = update_input($_POST["txt_nha_bp2_cpassword"]);
            $ad_old_pass           = $_POST["txt_oldpass"];
            $ad_hide_pass         = $_POST["txt_hidepass"];


            $sql = "UPDATE nha_users SET nha_bp2_password='$nha_bp2_password', nha_bp2_cpassword='$nha_bp2_cpassword'  WHERE nha_bp2_user_id=$idpass";

            if ($ad_old_pass !== $ad_hide_pass) {
              $errmodal2 = "block!important";
            } else if ($nha_bp2_password !== $nha_bp2_cpassword) {
              $errmodal = "block!important";
            } else if (mysqli_query($conn, $sql)) {
              // echo " Admin Record updated successfully";
              $successmodal = "block!important";
            } else {
              echo "Error updating record: " . mysqli_error($conn);
            }

            mysqli_close($conn);
          }

          if (isset($_POST["editprofile"])) {
            include("../php/db_procedural.php");

            $id                           = $_POST["id"];
            $nha_bp2_ln_acc_type          = update_input($_POST["txt_nha_bp2_ln_acc_type"]);
            $nha_bp2_fn                   = update_input($_POST["txt_nha_bp2_fn"]);
            $nha_bp2_ln                   = update_input($_POST["txt_nha_bp2_ln"]);
            $nha_bp2_mn                   = update_input($_POST["txt_nha_bp2_mn"]);
            $nha_bp2_sfx                  = update_input($_POST["txt_nha_bp2_sfx"]);
            $nha_bp2_cn                   = update_input($_POST["txt_nha_bp2_cn"]);
            $nha_bp2_email                = update_input($_POST["txt_nha_bp2_email"]);

            $sql = "UPDATE nha_users SET 
        
            nha_bp2_ln_acc_type	          = '$nha_bp2_ln_acc_type',     
            nha_bp2_fn                    = '$nha_bp2_fn',
            nha_bp2_ln                    = '$nha_bp2_ln',
            nha_bp2_mn                    = '$nha_bp2_mn',
            nha_bp2_sfx                   = '$nha_bp2_sfx',
            nha_bp2_cn                    = '$nha_bp2_cn',
            nha_bp2_email                 = '$nha_bp2_email'

  
			WHERE nha_bp2_user_id = $id";
            if (mysqli_query($conn, $sql)) {
              $successmodal = "block!important";
            } else {
              echo "Error updating record: " . mysqli_error($conn);
            }
            mysqli_close($conn);
          }

          //Sercurity Purposes
          function update_input($data)
          {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

          include("../config/db.php");

          $id = $_GET["id"];
          $sql = "SELECT * FROM nha_users WHERE nha_bp2_user_id = '$id'";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

              $nha_bp2_ln_acc_type_print      = $row["nha_bp2_ln_acc_type"];
              if ($nha_bp2_ln_acc_type_print == 1) {
                $nha_bp2_ln_acc_type_text = "Admin";
              } elseif ($nha_bp2_ln_acc_type_print == 2) {
                $nha_bp2_ln_acc_type_text = "Staff";
              } else {
                $nha_bp2_ln_acc_type_text = "";
              }

              $nha_bp2_fn_print               = $row["nha_bp2_fn"];
              $nha_bp2_ln_print               = $row["nha_bp2_ln"];
              $nha_bp2_mn_print               = $row["nha_bp2_mn"];
              $nha_bp2_sfx_print              = $row["nha_bp2_sfx"];
              $nha_bp2_cn_print               = $row["nha_bp2_cn"];
              $nha_bp2_email_print            = $row["nha_bp2_email"];
              $nha_bp2_password_print         = $row["nha_bp2_password"];
            }
          } else {
            echo "0 results";
          }

          mysqli_close($conn);
          ?>

          <div class="container">
            <center>
              <h2 class="tm-page-title">Update Bp2 Account Profile...</h2>
              <br><br>
              <center>
                <form method="post" action="bp2_accupdate?id=<?php echo $id; ?>" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                      <a class='btn btn-primary' style='color:white !important;' onClick='openEditModal(this)' data-nha_bp2_user_id='".$row["nha_bp2_user_id"]."' title='Update'>
                        Change Password
                      </a>
                      <br><br><br>
                      <input name="id" type="hidden" value="<?php echo $id; ?>">
                      <select name="txt_nha_bp2_ln_acc_type" class="form-control" style="height: 65px;">
                        <option value="1" <?php if ($nha_bp2_ln_acc_type_print == 1) echo "selected"; ?>>
                          Admin
                        </option>
                        <option value="2" <?php if ($nha_bp2_ln_acc_type_print == 2) echo "selected"; ?>>
                          Staff
                        </option>
                      </select>
                    </div>

                    <div class="form-group col-md-12 col-lg-12 col-xl-12">
                      <span>Fullname:</span>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-xl-3">
                      <input type="text" name="txt_nha_bp2_ln" class="form-control" placeholder="Last Name" value="<?php echo $nha_bp2_ln_print; ?>">
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-xl-3">
                      <input type="text" name="txt_nha_bp2_fn" class="form-control" placeholder="First Name" value="<?php echo $nha_bp2_fn_print; ?>">
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-xl-3">
                      <input type="text" name="txt_nha_bp2_mn" class="form-control" placeholder="middle Name" value="<?php echo $nha_bp2_mn_print; ?>">
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-xl-3">
                      <input type="text" name="txt_nha_bp2_sfx" class="form-control" placeholder="sfx" value="<?php echo $nha_bp2_sfx_print; ?>">
                    </div>

                    <div class="form-group col-md-12 col-lg-12 col-xl-12">
                      <input type="text" name="txt_nha_bp2_cn" class="form-control" placeholder="Contact Number" value="<?php echo $nha_bp2_cn_print; ?>">
                    </div>

                    <div class="form-group col-md-12 col-lg-12 col-xl-12">
                      <input type="email" name="txt_nha_bp2_email" class="form-control" placeholder="Email Address" value="<?php echo $nha_bp2_email_print; ?>">
                    </div>
                  </div>
          </div>
          <br>
          <center>
            <input class="btn btn-primary" type="submit" name="editprofile" value="UPDATE"> <a class="btn btn-primary" href="./">Back</a>
          </center>
          </form>
        </div>
        <div id="myModal" class="modal" style="display:<?php echo $successmodal; ?>;">
          <div class="modal-content">
            <center>
              <h1 style="color:black!important;">SAVED!</h1>
              <h6 style="color:black!important;">Your data was successfully updated.</h6>
              <a href="./" class="btn btn-danger btn-lg active" role="button" aria-pressed="true" style="text-transform:uppercase;">Close</a>
            </center>
          </div>
        </div>

      </div>
      </div>
      <?php include("components/footer.php"); ?>
      </div>
      </div>
    </section>
  </main>

  <?php include("components/nav.php"); ?>

  <div class="overlay"></div>
  <div class="modal" id="modal_edit">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="width: 100%;margin: auto;display: block;position: relative;top: 139px;">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Change Password</h4>
          <span onclick="document.getElementById('modal_edit').style.display='none'" title="close" class="close fa fa-times">

        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group" style="position: relative;left: 16px;">
            <div class="container-fluid">
              <form method="post" action="admin_setting.php?id=<?php echo $id; ?>">
                <input type="hidden" id="nha_bp2_user_id" name="nha_bp2_user_id">
                <div class="row">
                  <div class="col-12">
                    <input value="<?php echo $nha_bp2_password_print; ?>" type="hidden" name="txt_hidepass" class="w3-input w3-border w3-round-large" placeholder="N/A" title="パスワードが間違っています。 再試行する Those password didn't match. Try again!" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number.">
                    <div class="col-12">
                      <input type="hidden" name="txt_oldpass" class="w3-input w3-border w3-round-large" style="width: 90%;" value="<?php echo $nha_bp2_password_print; ?>" required>
                    </div>

                    <div class="col-12">
                      <small>New Password</small>
                      <input type="password" name="txt_nha_bp2_password"" class=" w3-input w3-border w3-round-large" style="width: 90%;" required>
                    </div>

                    <div class="col-12">
                      <small>Confirm Password</small>
                      <input type="password" name="txt_nha_bp2_cpassword" class="w3-input w3-border w3-round-large" style="width: 90%;" required>
                    </div>

                  </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <input type="submit" name="changepassword" value="Save" class="button" style="width: 150px;margin-left: auto;margin-right: auto;display: block;">
            </div>
            </form>

            <script>
              function openEditModal(element) {
                document.getElementById("modal_edit").style.display = "block";
              }
            </script>
            <script src="side_bar/script.js"></script>
</body>
</html>