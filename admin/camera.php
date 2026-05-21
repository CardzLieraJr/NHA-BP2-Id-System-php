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

    <!-- ======================================================
         Favicon
    ======================================================= -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" />

    <!-- ======================================================
         CSS FILES
    ======================================================= -->

    <!-- Sidebar CSS -->
    <link rel="stylesheet" href="side_bar/style.css">

    <!-- Normalize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">

    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/cardz2.css">

    <!-- ======================================================
         PAGE STYLE
    ======================================================= -->
    <style>
        /* ======================================================
           BUTTON STYLE
        ======================================================= */
        .bp2_btn {
            background-color: #191434 !important;
            color: white;
            border-radius: 27px;
            padding: 10px 50px 10px 50px;
            text-transform: uppercase;
        }

        /* ======================================================
           CAMERA OUTER CONTAINER
        ======================================================= */
        #outer {
            width: 200px;
            height: 200px;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }

        /* ======================================================
           VIDEO STYLE - DESKTOP
        ======================================================= */
        video {
            width: 1883px !important;
            height: 800px !important;
            position: relative;
            top: 96px;
            display: block !important;
            margin-top: -251px;
            margin-left: auto !important;
            margin-right: auto !important;
            left: -409%;
        }

        /* ======================================================
           VIDEO STYLE - TABLET
        ======================================================= */
        @media screen and (max-width: 1000px) {

            video {
                width: 869px !important;
                height: 652px !important;
                position: relative;
                top: 431px;
                display: block !important;
                margin-top: -520px;
                margin-left: auto !important;
                margin-right: auto !important;
                left: -162%;
            }
        }

        /* ======================================================
           VIDEO STYLE - MOBILE
        ======================================================= */
        @media screen and (max-width: 768px) {

            video {
                width: 386px !important;
                height: 729px !important;
                position: relative;
                top: 168px;
                display: block !important;
                margin-top: -251px;
                margin-left: auto !important;
                margin-right: auto !important;
                left: -44%;
            }
        }
    </style>

</head>

<body>

    <!-- ======================================================
         SIDEBAR MENU BUTTON
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
                    // HANDLE CAMERA IMAGE SAVE
                    // ======================================================
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        // Database connection
                        include("../config/db.php");

                        // ======================================================
                        // Check if image data exists
                        // ======================================================
                        if (isset($_POST["mydata"])) {

                            define('UPLOAD_DIR', '');

                            // Base64 image data
                            $encoded_data = $_POST['mydata'];

                            // Remove image header
                            $img = str_replace(
                                'data:image/jpeg;base64,',
                                '',
                                $encoded_data
                            );

                            // Decode image
                            $data = base64_decode($img);

                            // Generate filename
                            $file_name =
                                '../camera/image_' .
                                date('Y-m-d-H-i-s', time()) .
                                '.png';

                            // Final file path
                            $file = UPLOAD_DIR . $file_name;

                            // Save image
                            $success = file_put_contents($file, $data);
                        }

                        // ======================================================
                        // Get Member ID
                        // ======================================================
                        $id = $_POST["id"];

                        // ======================================================
                        // Update member photo
                        // ======================================================
                        $sql = "
                            UPDATE members_status 
                            SET bb2_membersphoto='$file_name' 
                            WHERE bb2_id=$id
                        ";

                        // ======================================================
                        // Execute update
                        // ======================================================
                        if (mysqli_query($conn, $sql)) {

                            // Show success modal
                            $successmodal = "block!important";
                        } else {

                            // Show database error
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }

                        // Close connection
                        mysqli_close($conn);
                    }

                    // ======================================================
                    // INPUT SANITIZER FUNCTION
                    // ======================================================
                    function test_input($data)
                    {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);

                        return $data;
                    }

                    // ======================================================
                    // DATABASE CONNECTION
                    // ======================================================
                    include("../config/db.php");

                    // ======================================================
                    // GET MEMBER ID
                    // ======================================================
                    $id = $_GET["id"];

                    // ======================================================
                    // GET MEMBER PHOTO
                    // ======================================================
                    $sql = "SELECT * FROM members_status WHERE bb2_id = $id";

                    $result = mysqli_query($conn, $sql);

                    // ======================================================
                    // CHECK IF RECORD EXISTS
                    // ======================================================
                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {

                            // Current member photo
                            $bb2_membersphotoupdate =
                                $row["bb2_membersphoto"];
                        }
                    } else {

                        echo "0 results";
                    }

                    // Close DB
                    mysqli_close($conn);

                    ?>

                    <!-- ======================================================
                         CAMERA SECTION
                    ======================================================= -->
                    <div style="top: -267px; position: relative;">

                        <!-- ======================================================
                             WEBCAM CONTAINER
                        ======================================================= -->
                        <div
                            id="my_camera"
                            style="
                                width: 0px !important;
                                height: 210px !important;
                                margin-left: auto !important;
                                margin-right: auto !important;
                            ">
                        </div>

                        <!-- Snapshot preview -->
                        <div id="results"></div>

                        <!-- ======================================================
                             WEBCAM JS LIBRARY
                        ======================================================= -->
                        <script type="text/javascript" src="js/webcam.min.js"></script>

                        <!-- ======================================================
                             CAMERA CONFIGURATION
                        ======================================================= -->
                        <script language="JavaScript">
                            Webcam.set({
                                width: 205,
                                height: 210,
                                image_format: 'jpeg',
                                jpeg_quality: 90
                            });

                            Webcam.attach('#my_camera');
                        </script>

                        <!-- ======================================================
                             CAMERA BUTTONS
                        ======================================================= -->
                        <center>

                            <!-- Capture Button -->
                            <button
                                type="button"
                                onClick="take_snapshot()"
                                class="bp2_btn"
                                style="position: relative; top: 616px;">

                                SHOT

                            </button>

                            <!-- Back Button -->
                            <a
                                style="position: relative; top: 616px;"
                                href="cam_dash"
                                class="bp2_btn">

                                Back

                            </a>

                        </center>

                        <!-- ======================================================
                             IMAGE SAVE FORM
                        ======================================================= -->
                        <form id="myform" method="post" action="" enctype="multipart/form-data">

                            <!-- Hidden image data -->
                            <input id="mydata" type="hidden" name="mydata" value="" />

                            <!-- Member ID -->
                            <input
                                name="id"
                                type="hidden"
                                value="<?php echo $id; ?>">

                            <!-- Old image -->
                            <input name="clone_input" type="hidden" value="<?php echo $bb2_membersphotoupdate; ?>">

                        </form>

                    </div>

                    <!-- ======================================================
                         SNAPSHOT FUNCTION
                    ======================================================= -->
                    <script language="JavaScript">
                        function take_snapshot() {

                            // Take webcam snapshot
                            Webcam.snap(function(data_uri) {

                                // Display captured image
                                document.getElementById('results').innerHTML =
                                    '<h2>Here is your image:</h2>' +
                                    '<img src="' + data_uri + '"/>';

                                // Remove base64 image header
                                var raw_image_data =
                                    data_uri.replace(
                                        /^data\:image\/\w+\;base64\,/,
                                        ''
                                    );

                                // Set image data into hidden input
                                document.getElementById('mydata').value =
                                    raw_image_data;

                                // Submit form automatically
                                document.getElementById('myform').submit();
                            });
                        }
                    </script>

                    <!-- ======================================================
                         SUCCESS MODAL
                    ======================================================= -->
                    <div id="myModal" class="modal" style="display:<?php echo $successmodal; ?>;">

                        <div class="modal-content">

                            <center>

                                <!-- Success title -->
                                <h1 class="con_us">
                                    Captured!
                                </h1>

                                <!-- Success description -->
                                <h6 class="cont_des">
                                    SNAPSHOT WAS SUCCESSFULLY SAVE...THANK YOU!
                                </h6>

                                <!-- Close button -->
                                <a href="./" class="btn bp2_btn btn-lg active" role="button" aria-pressed="true" style="text-transform: uppercase; margin-bottom: 30px;">
                                    Close
                                </a>

                            </center>

                        </div>

                    </div>

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
         SIDEBAR NAVIGATION
    ======================================================= -->
    <?php include("components/nav.php"); ?>

    <!-- Sidebar Script -->
    <script src="side_bar/script.js"></script>

</body>

</html>