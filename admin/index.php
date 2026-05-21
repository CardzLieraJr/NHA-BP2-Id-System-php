<?php
// Admin authentication check (protects this page from unauthorized access)
include("../config/auth_admin.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    // Dynamic page title component
    include "../components/title.php";
    ?>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" />

    <!-- Sidebar custom styles -->
    <link rel="stylesheet" href="side_bar/style.css">

    <!-- Normalize CSS (makes styling consistent across browsers) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">

    <!-- Bootstrap CSS (layout framework) -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">

    <!-- Slick slider styles -->
    <link rel="stylesheet" type="text/css" href="./assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/slick/slick-theme.css" />

    <!-- Custom template styles -->
    <link rel="stylesheet" href="css/tooplate-style.css">

    <!-- DataTables styles (for tables with sorting/searching) -->
    <link rel="stylesheet" href="./assets/css/datatables.min.css">

</head>

<body>

    <!-- Mobile / sidebar navigation trigger button -->
    <a href="#navigation" class="nav-trigger">
        Menu <span></span>
    </a>

      <main>
        <?php
        // Main page content controller (loads different admin modules/pages)
        include("components/controller.php");
        ?>
    </main>

    <?php
    // Sidebar / navigation menu
    include("components/nav.php");
    ?>

    <!-- Sidebar toggle script -->
    <script src="side_bar/script.js"></script>

    <!-- jQuery (slim version) -->
    <script src="./assets/js/jquery-3.2.1.slim.min.js"></script>

    <!-- Animation library -->
    <script src="./assets/js/anime.min.js"></script>

    <!-- Custom JS main logic -->
    <script src="./assets/js/main.js"></script>

</body>
</html>