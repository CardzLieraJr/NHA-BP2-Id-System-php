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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" href="./assets/css/cardz.css">
    <link rel="stylesheet" href="datatables.min.css">
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
                    <h1 class="bp2_title">Balik Probinsya, Bagong Pag-asa (BP2) </h1>
                    <br>
                    <div style="overflow-x:auto;">

                        <table id="table" style="width:100%;" border="1">
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

                            <tbody>

                                <!-- form select php  -->
                                <?php
                                include("../config/db.php");

                                $sql = "SELECT * FROM members_status";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        $avatar = $row["bb2_membersphoto"];

                                        echo "<tr>";
                                        echo "<td> <img src='$avatar' onerror=this.src='../camera/avatar.webp' width='50' height='30'> </td>";
                                        echo "<td>" . $row["bb2_batch"] . "</td>";
                                        echo "<td>" . $row["bb2_app_id"] . "</td>";
                                        echo "<td> " . $row["bb2_fn"] . " " . $row["bb2_mn"] . "  " . $row["bb2_ln"] . " " . $row["bb2_sfx"] . " </td>";
                                        echo "<td>" . $row["bb2_desmunic"] . ", " . $row["bb2_desprov"] . "</td>";
                                        echo    "<td>
                                    <a href='pid.php?id=" . $row["bb2_id"] . "'>
                                        <i class='fas fa-id-badge'></i>
                                    </a> | 
                                 
                                    <a  href='printid.php?id=" . $row["bb2_id"] . "'>
                                        <i class='fas fa-print'></i></i>
                                    </a> | 

                                    <a  href='bp2_update?id=" . $row["bb2_id"] . "' >
                                        <i class='fas fa-edit'></i>
                                    </a> | 
                                
                                    <a href='javascript:void(0)'  onClick='deleteThis(" . $row['bb2_id'] . ")'>
                                        <i class='fas fa-trash-alt'></i>
                                    </a>  
                                </td>";
                                        echo "</tr>";
                                        echo "<script>
                                                function deleteThis(delid)
                                                {
                                                    if(confirm('Do you want to delete this Record?'))
                                                    {
                                                        window.location.href='delete.php?del=' +delid+'';
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
                    <?php
                    include("../config/db.php");
                    ?>
                    <br>
                    <br>
                    <center>
                        <a class="bp2_btn" href="../admin">Back</a>
                    </center>
                    <br>
                    <br>
                </div>
            </div>
            <footer>
                <p class="small tm-copyright-text" style="color:white;">Copyright &copy; <span>2020-2023 </span><a class="tm-text-highlight">Balik Probinsya, Bagong Pag-asa | System Developed By: Ricardo Liera Jr - Sr. System Analyst @ NHA-COSDD </a></p>

            </footer>
            </div>
            </div>

        </section>
    </main>

    <!-- ======================================================
       Sidebar Navigation
  ======================================================= -->
    <?php include("components/nav.php"); ?>
    <div class="overlay"></div>

    <script src="side_bar/script.js"></script>
    <script type="text/javascript" src="datatables.min.js"> </script>
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