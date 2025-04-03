<?php
require('assets/config/system.config.php');
require('assets/class/mysqli.class.php');
require('assets/inc/connection.inc.php');
require('assets/inc/function.inc.php');
require('assets/inc/lang.inc.php');
include('assets/lang/' . $_SESSION['LANG'] . '.lang.php');

$version = date('Ymd');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <?php include("assets/inc/gbl_metatag.inc.php"); ?>
    <meta name="keywords" content="<? $content_tag_header . ',' . $config['KEYWORD']; ?>" />
    <meta name="description" content="404 Page not found!" />

    <meta property="og:url" content="<? $config['BASE_URL_MAIN'] . '/404/'; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<? '404 Page not found!'; ?> | <? $config['SITE_NAME']; ?>" />
    <meta property="og:description" content="404 Page not found!" />
    <meta property="og:image" content="<? $config['BASE_URL'] . 'uploads/profiles/' . $content_profile . '?v=1001'; ?>" />

    <!-- title -->
    <title><?= '404 Page not found! | ' . $config['SITE_NAME']; ?></title>

    <!-- css -->
    <link rel="stylesheet" href="<?= $config['BASE_URL_MAIN']; ?>assets/css/bootstrap.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL_MAIN']; ?>assets/css/all-fontawesome.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL_MAIN']; ?>assets/css/animate.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL_MAIN']; ?>assets/css/magnific-popup.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL_MAIN']; ?>assets/css/owl.carousel.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL_MAIN']; ?>assets/css/style.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL_MAIN']; ?>assets/css/custom.css?v=<?= $version ?>">

    <?php include('assets/inc/gbl_tracking.inc.php'); ?>
</head>

<body>

    <!-- preloader -->
    <?php include('assets/inc/gbl_loader.inc.php'); ?>
    <!-- preloader end -->

    <!-- header area -->
    <?php include('assets/inc/gbl_header.inc.php'); ?>
    <!-- header area end -->

    <!-- popup search -->
    <div class="search-popup">
        <button class="close-search"><span class="far fa-times"></span></button>
        <form action="#">
            <div class="form-group">
                <input type="search" name="search-field" placeholder="Search Here..." required>
                <button type="submit"><i class="far fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- popup search end -->


    <!-- sidebar-popup -->
    <?php include('assets/inc/gbl_sidebar.inc.php'); ?>
    <!-- sidebar-popup end -->


    <main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/03.jpg)">
            <div class="container">
                <h2 class="breadcrumb-title">404 Error</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= $config['BASE_URL_MAIN']; ?>"><?= $home; ?></a></li>
                    <li class="active">404 Error</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- error area -->
        <div class="error-area py-120">
            <div class="container">
                <div class="col-md-8 mx-auto">
                    <div class="error-wrapper">
                        <div class="error-img">
                            <img src="assets/img/error/01.png" alt="">
                        </div>
                        <h2>Opos... Page Not Found!</h2>
                        <a href="<?= $config['BASE_URL_MAIN']; ?>" class="theme-btn">Go Back Home <i class="far fa-home"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- error area end -->

    </main>


    <!-- footer area -->
    <?php include('assets/inc/gbl_footer.inc.php'); ?>
    <!-- footer area end -->


    <!-- scroll-top -->
    <a href="#" id="scroll-top"><i class="far fa-arrow-up"></i></a>
    <!-- scroll-top end -->


    <!-- js -->
    <?php include('assets/inc/gbl_js.inc.php'); ?>

</body>

</html>