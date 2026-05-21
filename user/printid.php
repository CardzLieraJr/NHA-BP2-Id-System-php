<?php

// ======================================================
// Include admin authentication
// Protects page from unauthorized access
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

  <!-- load CSS -->
  <link rel="stylesheet" href="side_bar/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">
  <link rel="stylesheet" href="./assets/css/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
  <link rel="stylesheet" href="./assets/css/cardz.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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

          function update_input($data)
          {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

          include("../php/db_procedural.php");

          $id = $_GET["id"];
          $sql = "SELECT * FROM members_status WHERE bb2_id = $id";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {

              $bb2_membersphoto_view     = $row["bb2_membersphoto"];
              $bb2_fn_view              = $row["bb2_fn"];
              $bb2_mn_view               = $row["bb2_mn"];
              $bb2_ln_view               = $row["bb2_ln"];
              $bb2_sfx_view             = $row["bb2_sfx"];
              $bb2_app_id_view          = $row["bb2_app_id"];
              $bb2_desmunic_view        = $row["bb2_desmunic"];
              $bb2_desprov_view          = $row["bb2_desprov"];
              $bb2_datebirthm_view      = $row["bb2_datebirthm"];
              $bb2_datebirthd_view      = $row["bb2_datebirthd"];
              $bb2_datebirthy_view      = $row["bb2_datebirthy"];
              $bb2_cn_view              = $row["bb2_cn"];
              $bb2_blood_view           = $row["bb2_blood"];
              $bb2_civil_view           = $row["bb2_civil"];
              $bb2_cper_view            = $row["bb2_cper"];
              $bb2_cpernum_view          = $row["bb2_cpernum"];
            }
          } else {
            echo "0 results";
          }

          mysqli_close($conn);
          ?>

          <div class="container-fluid" style="width:114px;">
            <div class="row">
              <div class="col-sm-8" style="margin-top: -185px; margin-left: -19px;">
                <img onerror="this.src='../camera/avatar.webp'" src="<?php echo $bb2_membersphoto_view; ?>" width="120" height="120" style="position: relative; top: 138px; left: -304px; margin-bottom: -197px; width: 205px; height: 210px;">
                <div style="position: relative;top: -325px;left: 215px;">
                  <h1 style="position: relative; top: 730px; left: -571px; margin-bottom: -96px; font-size: 16px; text-align: center; width: 302px; display: block;">
                    <?php echo $bb2_fn_view . ' ' . $bb2_mn_view . ' ' . $bb2_ln_view . ' ' . $bb2_sfx_view; ?>
                  </h1>
                  <h1 style="position:relative; top: 845px; left: -569px; margin-bottom: -43px; font-size: 16px; width: 301px; text-align: center; display: block;"><?php echo $bb2_app_id_view; ?></h1>

                  <h1 style="position: relative; top: 901px; left: -589px; width: 347px; margin-bottom: -33px; font-size: 16px; text-align: center; display: block;">
                    <?php echo $bb2_desmunic_view . ' ' . $bb2_desprov_view  ?>
                  </h1>
                  <h1 style="position: relative;top: 941px;left: -568px;width: 300px;margin-bottom: -14px;font-size: 16px;margin-top: 10px;text-align: center;display: block;">
                    <?php echo $bb2_datebirthm_view . ' ' . $bb2_datebirthd_view . ' ' . $bb2_datebirthy_view;  ?>
                  </h1>
                  <h1 style="display: block;font-variant: diagonal-fractions;position: relative;top: 971px;left: -569px;width: 301px;font-size: 16px;">
                    <?php echo $bb2_cn_view; ?> 
                  </h1>
                </div>
                <img src="./assets/img/front_final.webp" style="float: right;width: 500px;margin-top: -7px;">
              </div>
              <div class="col-sm-8" style="position: relative;margin-top: -674px;margin-left: 30px;">
                <div style="position: relative;top: -89px;left: -99px;">

                  <h1 style=" position: relative;top: 270px;left: 225px;width: 243px;margin-bottom: -58px;color: white !important;font-size: 16px;text-align: center;display:block;">
                    <?php echo $bb2_blood_view; ?>
                  </h1>
                  <h1 style="position: relative;top: 342px;left: 224px;width: 244px;margin-bottom: -25px;color: white !important;font-size: 16px;text-align: center;display:block;">
                    <?php echo $bb2_civil_view; ?>
                  </h1>
                  <h1 style="position: relative;top: 383px;left: 224px;width: 245px;margin-bottom: -43px;color: white !important;font-size: 16px;text-align: center;display:block;">
                    <?php echo $bb2_cper_view; ?>
                  </h1>
                  <h1 style="position: relative;top: 441px;left: 224px;width: 245px;color: white !important;font-size: 16px;text-align: center;display:block;">
                    <?php echo   $bb2_cpernum_view  ?>
                  </h1>
                </div>
                <img src="./assets/img/back_final.webp" style="float: left;width: 500px;margin-top: 2px;display: block;">
              </div>
            </div>
            <br>
          </div>
          <center>
            <a href="cam_dash" class="bp2_btn">Back</a>
          </center>
        </div>
      </div>
      <!-- ======================================================
           Footer Component
      ======================================================= -->
        <?php include("components/footer.php"); ?>
      </div>
      </div>

    </section>
  </main>

  <!-- ======================================================
         SIDEBAR NAVIGATION
    ======================================================= -->
  <?php include("components/nav.php"); ?>

  <script src="side_bar/script.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      window.print();
    });
  </script>

</body>

</html>