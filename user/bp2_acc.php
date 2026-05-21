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

    <style>
        .bp2_title {
            text-align: center;
            display: block;
            color: #191434 !important;
            font-family: fantasy;
        }

        table,
        tbody,
        tr,
        th,
        td {
            background-color: rgba(0, 0, 0, 0.0) !important;
        }

        th {
            font-family: monospace !important;
            font-weight: bold !important;
            text-transform: uppercase !important;
            background-color: #191434 !important;
            color: white !important;
        }

        td {
            color: black !important;
            font-family: monospace;

        }


        .bp2_btn {
            background-color: #191434 !important;
            color: white;
            border-radius: 27px;
            padding: 10px 50px 10px 50px;
            text-transform: uppercase;
        }


        @media screen and (max-width: 768px) {
            .bp2_title {
                text-align: left !important;
                display: block;
                color: #191434 !important;
                font-family: fantasy;
                font-size: 2.5rem;
                width: 87%;
            }

        }
    </style>

    <link rel="stylesheet" href="./assets/css/datatables.min.css">
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

                    <h1 class="bp2_title">Balik Probinsya, Bagong Pag-asa (BP2) <br> "User's Account" </h1>
                    <br>
                    <br>
                    <div style="overflow-x:auto;">

                        <table id="table" style="width:100%;" border="1">
                            <thead>
                                <tr>
                                    <th>Fullname</th>
                                    <th>Contact Number</th>
                                    <th>Fullname</th>
                                    <th>Destination</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                $sql = "SELECT * FROM nha_users";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td> " . $row["nha_bp2_fn"] . " " . $row["nha_bp2_mn"] . "  " . $row["nha_bp2_ln"] . " " . $row["nha_bp2_sfx"] . " </td>";
                                        echo "<td>" . $row["nha_bp2_cn"] . "</td>";
                                        echo "<td>" . $row["nha_bp2_email"] . "</td>";
                                        echo "<td>" . $row["bb2_registered_date"] . "</td>";
                                        echo "<td>
                        
                                <a  href='bp2_accupdate?id=" . $row["nha_bp2_user_id"] . "' >
                                    <i class='fas fa-edit'></i>
                                </a> 
                                | 
                                <a href='javascript:void(0)'  onClick='deleteThis(" . $row['nha_bp2_user_id'] . ")'>
                                    <i class='fas fa-trash-alt'></i>
                                </a>  
                                </td>";
                                        echo "</tr>";
                                        echo "<script>
                            function deleteThis(delid)
                                    {
                                        if(confirm('Do you want to delete this Record?'))
                                        {
                                            window.location.href='delete_users?del=' +delid+'';
                                            return true;
                                        }
                                    }
                                    </script>
                            
                            ";
                                    }
                                } else {
                                    echo "0 results";
                                }

                                mysqli_close($conn);
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <br>
                    <center>
                        <a class="bp2_btn" href="../admin">Back</a>
                    </center>
                    <br>
                    <br>
                </div>
            </div>
            <?php include("components/footer.php"); ?>
            </div>
            </div>

        </section>
    </main>

    <?php include("components/nav.php"); ?>

    <div class="overlay"></div>
    <script type="text/javascript" src="./assets/js/datatables.min.js"> </script>
    <script src="side_bar/script.js"></script>
    <script src="slick/slick.min.js"></script> <!-- http://kenwheeler.github.io/slick/ -->
    <script src="js/main.js"></script>
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

        /* DOM is ready
        ------------------------------------------------*/
        $(function() {

            setupFooter();

            $(window).resize(function() {
                setupFooter();
            });

            $('.tm-current-year').text(new Date().getFullYear()); // Update year in copyright           
        });
    </script>
    <script>
        $(document).ready(function() {

            $('#table').DataTable({
                select: true,
                dom: 'lasdaBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print', 'pdf', 'colvis'
                ]
            });
        });
    </script>
    <script>
        document.documentElement.className = "js";
        var supportsCssVars = function() {
            var e, t = document.createElement("style");
            return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e
        };
        supportsCssVars() || alert("Please view this in a modern browser such as latest version of Chrome or Microsoft Edge.");
    </script>
</body>
</html>