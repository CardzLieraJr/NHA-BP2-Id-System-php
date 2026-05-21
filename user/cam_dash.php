<?php
// Protect page: only allow logged-in admin users
include("../config/auth_admin.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    // Dynamic page title component
    include "../components/title.php";
    ?>

    <!-- =========================
         CSS FILES
    ========================== -->
    
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" />
    <link rel="stylesheet" href="side_bar/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">

    <!-- Local styles -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/slick/slick-theme.css" />
    <link rel="stylesheet" href="./assets/css/cardz.css">
    <link rel="stylesheet" href="./assets/css/datatables.min.css">
    <link rel="stylesheet" href="./assets/css/table.css">
</head>

<body>

    <!-- Sidebar trigger button -->
    <a href="#navigation" class="nav-trigger">
        Menu <span></span>
    </a>

    <main>
        <section>
            <div id="tm-bg"></div>
            <div id="tm-wrap">

                <div class="container-fluid">

                    <!-- =========================
                         PAGE TITLE
                    ========================== -->
                    <h1 class="bp2_title">
                        Balik Probinsya, Bagong Pag-asa (BP2)
                    </h1>

                    <br>

                    <!-- =========================
                         TABLE WRAPPER (RESPONSIVE)
                    ========================== -->
                    <div style="overflow-x:auto;">

                        <table id="table" style="width:100%;" border="1">

                            <!-- TABLE HEADER -->
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Batch</th>
                                    <th>Application Id</th>
                                    <th>Fullname</th>
                                    <th>Destination</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <!-- TABLE BODY -->
                            <tbody>
                                <?php
                                // Connect to database
                                include("../config/db.php");

                                // Get all members status records
                                $sql = "SELECT * FROM members_status";
                                $result = mysqli_query($conn, $sql);

                                // Check if records exist
                                if (mysqli_num_rows($result) > 0) {

                                    // Loop through each row
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        // Member photo path
                                        $avatar = $row["bb2_membersphoto"];

                                        echo "<tr>";

                                        // Photo column (fallback image if missing)
                                        echo "<td>
                                                <img src='$avatar' onerror=this.src='../camera/avatar.webp' width='50' height='30'>
                                              </td>";

                                        // Batch
                                        echo "<td>" . $row["bb2_batch"] . "</td>";

                                        // Application ID
                                        echo "<td>" . $row["bb2_app_id"] . "</td>";

                                        // Full name
                                        echo "<td>
                                                " . $row["bb2_fn"] . " 
                                                " . $row["bb2_mn"] . "  
                                                " . $row["bb2_ln"] . " 
                                                " . $row["bb2_sfx"] . "
                                              </td>";

                                        // Destination
                                        echo "<td>
                                                " . $row["bb2_desmunic"] . ", 
                                                " . $row["bb2_desprov"] . "
                                              </td>";

                                        // Action buttons (view, camera, print)
                                        echo "<td>
                                                <a href='pid.php?id=" . $row["bb2_id"] . "'>
                                                    <i class='fas fa-id-badge'></i>
                                                </a> | 

                                                <a href='camera.php?id=" . $row["bb2_id"] . "'>
                                                    <i class='fas fa-camera'></i>
                                                </a> | 

                                                <a href='printid.php?id=" . $row["bb2_id"] . "'>
                                                    <i class='fas fa-print'></i>
                                                </a>
                                              </td>";

                                        echo "</tr>";

                                        // Delete function script (NOTE: better to move outside loop)
                                        echo "<script>
                                                function deleteThis(delid)
                                                {
                                                    if(confirm('Do you want to delete this Record?'))
                                                    {
                                                        window.location.href='delete.php?del=' + delid;
                                                        return true;
                                                    }
                                                }
                                              </script>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>0 results</td></tr>";
                                }

                                // Close database connection
                                mysqli_close($conn);
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <br><br>

                    <!-- Back button -->
                    <center>
                        <a class="bp2_btn" href="../user">Back</a>
                    </center>

                    <br><br>

                </div>
            </div>

            <!-- Footer component -->
            <?php include("components/footer.php"); ?>

        </section>
    </main>

    <!-- Navigation / sidebar menu -->
    <?php include("components/nav.php"); ?>

    <!-- =========================
         JAVASCRIPT FILES
    ========================== -->
    <script src="side_bar/script.js"></script>
    <script src="slick/slick.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="datatables.min.js"></script>

    <!-- Footer layout script -->
    <script>
        function setupFooter() {
            var pageHeight = $('.tm-site-header-container').height() + $('footer').height() + 100;
            var main = $('.tm-main-content');

            if ($(window).height() < pageHeight) {
                main.addClass('tm-footer-relative');
            } else {
                main.removeClass('tm-footer-relative');
            }
        }

        $(function() {
            setupFooter();
            $(window).resize(setupFooter);

            // Update copyright year dynamically
            $('.tm-current-year').text(new Date().getFullYear());
        });
    </script>

    <!-- DataTable initialization -->
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                select: true,
                dom: 'lasdaBfrtip',
                buttons: ['copy', 'csv', 'excel', 'print', 'pdf', 'colvis']
            });
        });
    </script>

    <!-- Browser compatibility check -->
    <script>
        document.documentElement.className = "js";

        var supportsCssVars = function() {
            var t = document.createElement("style");

            t.innerHTML = "root: { --tmp-var: bold; }";
            document.head.appendChild(t);

            var supported = window.CSS &&
                window.CSS.supports &&
                window.CSS.supports("font-weight", "var(--tmp-var)");

            t.parentNode.removeChild(t);

            return supported;
        };

        if (!supportsCssVars()) {
            alert("Please use a modern browser (Chrome / Edge).");
        }
    </script>

</body>

</html>