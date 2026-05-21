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

  <!-- ======================================================
       CSS Files
  ======================================================= -->

  <!-- Sidebar CSS -->
  <link rel="stylesheet" href="side_bar/style.css">

  <!-- Normalize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">

  <!-- Slick Slider -->
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="./assets/css/cardz.css">

</head>

<body>

  <!-- ======================================================
       Sidebar Trigger Button
  ======================================================= -->
  <a href="#navigation" class="nav-trigger">
    Menu <span></span>
  </a>

  <main>
    <section>

      <!-- Background -->
      <div id="tm-bg"></div>

      <!-- Main Wrapper -->
      <div id="tm-wrap">

        <div class="container-fluid">

          <?php

          // ======================================================
          // Function: Clean input data
          // ======================================================
          function update_input($data)
          {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

          // ======================================================
          // Database connection
          // ======================================================
          include("../config/db.php");

          // ======================================================
          // Get member ID from URL
          // Example: pid.php?id=1
          // ======================================================
          $id = $_GET["id"];

          // ======================================================
          // Get member information
          // ======================================================
          $sql = "SELECT * FROM members_status WHERE bb2_id = $id";

          $result = mysqli_query($conn, $sql);

          // ======================================================
          // Check if record exists
          // ======================================================
          if (mysqli_num_rows($result) > 0) {

            // ======================================================
            // Fetch member data
            // ======================================================
            while ($row = mysqli_fetch_assoc($result)) {

              // Member Photo
              $bb2_membersphoto_view = $row["bb2_membersphoto"];

              // Full Name
              $bb2_fn_view = $row["bb2_fn"];
              $bb2_mn_view = $row["bb2_mn"];
              $bb2_ln_view = $row["bb2_ln"];
              $bb2_sfx_view = $row["bb2_sfx"];

              // Application ID
              $bb2_app_id_view = $row["bb2_app_id"];

              // Destination
              $bb2_desmunic_view = $row["bb2_desmunic"];
              $bb2_desprov_view = $row["bb2_desprov"];

              // Birth Date
              $bb2_datebirthm_view = $row["bb2_datebirthm"];
              $bb2_datebirthd_view = $row["bb2_datebirthd"];
              $bb2_datebirthy_view = $row["bb2_datebirthy"];

              // Contact Number
              $bb2_cn_view = $row["bb2_cn"];

              // Back ID Information
              $bb2_blood_view = $row["bb2_blood"];
              $bb2_civil_view = $row["bb2_civil"];
              $bb2_cper_view = $row["bb2_cper"];
              $bb2_cpernum_view = $row["bb2_cpernum"];
            }
          } else {

            // ======================================================
            // No data found
            // ======================================================
            echo "0 results";
          }

          // ======================================================
          // Close database connection
          // ======================================================
          mysqli_close($conn);

          ?>

          <!-- ======================================================
               ID CARD CONTAINER
          ======================================================= -->
          <div class="container-fluid" style="width: 74px; margin-top: 174px;" id="kitty-one">

            <div class="row">

              <!-- ======================================================
                   FRONT ID CARD
              ======================================================= -->
              <div class="col-sm-8" style="margin-top: -185px; margin-left: -19px;">

                <!-- Member Photo -->
                <img
                  onerror="this.src='../camera/avatar.webp'"
                  src="<?php echo $bb2_membersphoto_view; ?>"
                  width="120"
                  height="120"
                  style="position: relative; top: 138px; left: -330px; margin-bottom: -197px; width: 205px; height: 210px;">

                <!-- Front ID Text -->
                <div style="position: relative; top: -325px; left: 215px;">

                  <!-- Full Name -->
                  <h1 style="position: relative; top: 730px; left: -571px; margin-bottom: -96px; font-size: 16px; text-align: center; width: 302px; display: block;">
                    <?php echo $bb2_fn_view . ' ' . $bb2_mn_view . ' ' . $bb2_ln_view . ' ' . $bb2_sfx_view; ?>
                  </h1>

                  <!-- Application ID -->
                  <h1 style="position: relative; top: 845px; left: -569px; margin-bottom: -43px; font-size: 16px; width: 301px; text-align: center; display: block;">
                    <?php echo $bb2_app_id_view; ?>
                  </h1>

                  <!-- Destination -->
                  <h1 style="position: relative; top: 901px; left: -589px; width: 347px; margin-bottom: -33px; font-size: 16px; text-align: center; display: block;">
                    <?php echo $bb2_desmunic_view . ' ' . $bb2_desprov_view; ?>
                  </h1>

                  <!-- Birth Date -->
                  <h1 style="position: relative; top: 941px; left: -568px; width: 300px; margin-bottom: -14px; font-size: 16px; margin-top: 10px; text-align: center; display: block;">
                    <?php echo $bb2_datebirthm_view . ' ' . $bb2_datebirthd_view . ' ' . $bb2_datebirthy_view; ?>
                  </h1>

                  <!-- Contact Number -->
                  <h1 style="display: block; font-variant: diagonal-fractions; position: relative; top: 971px; left: -569px; width: 301px; font-size: 16px;">
                    <?php echo $bb2_cn_view; ?>
                  </h1>

                </div>

                <!-- Front ID Template -->
                <img src="assets/img/front_final.webp" style="float: right; width: 500px; margin-top: -7px;">

              </div>

              <!-- ======================================================
                   BACK ID CARD
              ======================================================= -->
              <div class="col-sm-8" style="position: relative; margin-top: -674px; margin-left: 30px;">

                <div style="position: relative; top: -89px; left: -99px;">

                  <!-- Blood Type -->
                  <h1 style="position: relative; top: 270px; left: 225px; width: 243px; margin-bottom: -58px; color: white !important; font-size: 16px; text-align: center; display:block;">
                    <?php echo $bb2_blood_view; ?>
                  </h1>

                  <!-- Civil Status -->
                  <h1 style="position: relative; top: 342px; left: 224px; width: 244px; margin-bottom: -25px; color: white !important; font-size: 16px; text-align: center; display:block;">
                    <?php echo $bb2_civil_view; ?>
                  </h1>

                  <!-- Contact Person -->
                  <h1 style="position: relative; top: 383px; left: 224px; width: 245px; margin-bottom: -43px; color: white !important; font-size: 16px; text-align: center; display:block;">
                    <?php echo $bb2_cper_view; ?>
                  </h1>

                  <!-- Contact Person Number -->
                  <h1 style="position: relative; top: 441px; left: 224px; width: 245px; color: white !important; font-size: 16px; text-align: center; display:block;">
                    <?php echo $bb2_cpernum_view; ?>
                  </h1>

                </div>

                <!-- Back ID Template -->
                <img src="assets/img/back_final.webp" style="float: left; width: 500px; margin-top: 2px; display: block;">

              </div>

            </div>

            <br>

          </div>

          <!-- ======================================================
               BUTTONS
          ======================================================= -->
          <center>

            <!-- Print Button -->
            <button onclick="window.print();" class="bp2_btn">
              Print
            </button>

            <!-- Back Button -->
            <a id="advanced" href="cam_dash" class="bp2_btn">
              Back
            </a>

          </center>

        </div>
      </div>

      <!-- ======================================================
           Footer Component
      ======================================================= -->
      <div style="position: relative;top: 25px;;">
        <?php include("components/footer.php"); ?>
      </div>
    </section>
  </main>

  <!-- ======================================================
       Sidebar Navigation
  ======================================================= -->
  <?php include("components/nav.php"); ?>

  <!-- Sidebar Script -->
  <script src="side_bar/script.js"></script>

</body>

</html>