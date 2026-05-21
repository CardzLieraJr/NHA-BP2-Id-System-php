<nav class="nav-container" id="navigation">
    <header>
        <h2>BP2 - I'D SYSTEM <a style="display: block;text-align: left;line-height: 1.9;">Welcome Operator: <?php echo $admin_fullname; ?></a></h2>
    </header>

    <ul class="nav" style="display: block !important;">
        <li><a href="./">Home</a></li>
        <li><a href="cam_dash">Camera</a></li>
        <li><a href="database_dash">Database</a></li>
        <?php include("../config/db.php");
        $admin_email = $_SESSION["nha_bp2_email"];
        $sql = "SELECT * FROM nha_users Where nha_bp2_email='$admin_email' ";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>";
                echo " 
                <a href='admin_setting.php?id=" . $row["nha_bp2_user_id"] . "'>
              
                <i class='now-ui-icons files_single-copy-04'></i>
                <p>Profile Account</p>
                
                </a>";
            }
        }
        ?>

        </li>

        <li><a href="../auth/logout.php">Log Out</a></li>
    </ul>
</nav>