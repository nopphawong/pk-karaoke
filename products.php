<?php
require('assets/config/system.config.php');
require('assets/class/mysqli.class.php');
require('assets/inc/connection.inc.php');
require('assets/inc/function.inc.php');
require('assets/inc/lang.inc.php');
include('assets/lang/' . $_SESSION['LANG'] . '.lang.php');

$version = date('Ymd');
#----Get Data----#
$cateID     = '10'; #numberic($_GET['cate']);
$cateID     = ! empty($cateID) ? $cateID : 1;
$getCate    = $db->queryAndFetch(
    "  SELECT * FROM  " . $tbl . "_content_category c
                                        LEFT JOIN " . $tbl . "_content_category_" . $_SESSION['LANG'] . " l ON c.cate_id = l.cate_id 
                                        WHERE c.cate_id = %n
                                        LIMIT 1 ",
    $cateID
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <?php include("assets/inc/gbl_metatag.inc.php"); ?>
    <meta name="keywords" content="<?= $config['KEYWORD']; ?>" />
    <meta name="description" content="<?= $config['SITE_NAME'] . ' ' . $config['SITE_DETAIL']; ?>" />

    <meta property="og:url" content="<?= $config['BASE_URL_MAIN'] . $_SESSION['LANG'] . '/สินค้า/'; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= 'จำหน่ายเครื่องคาราโอเกะ เครื่องเสียง | ' . $config['SITE_NAME']; ?>" />
    <meta property="og:description" content="<?= $config['SITE_NAME'] . ' ' . $config['SITE_DETAIL']; ?>" />
    <meta property="og:image" content="<?= $config['BASE_URL_MAIN'] . 'assets/images/trend-image2.jpg?v=1001'; ?>" />

    <!-- title -->
    <title><?= 'จำหน่ายเครื่องคาราโอเกะ เครื่องเสียง | ' . $config['SITE_NAME']; ?></title>

    <!-- css -->
    <link rel="stylesheet" href="<?= $config['BASE_URL']; ?>assets/css/bootstrap.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL']; ?>assets/css/all-fontawesome.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL']; ?>assets/css/animate.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL']; ?>assets/css/magnific-popup.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL']; ?>assets/css/owl.carousel.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL']; ?>assets/css/style.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL']; ?>assets/css/custom.css?v=<?= $version ?>">

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
        <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/02.jpg?v=<?= $version ?>)">
            <div class="container">
                <h2 class="breadcrumb-title">จำหน่ายเครื่องคาราโอเกะ เครื่องเสียง</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= $config['BASE_URL']; ?>"><?= $home; ?></a></li>
                    <li class="active">จำหน่ายเครื่องคาราโอเกะ เครื่องเสียง</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- team single -->
        <div class="team-single py-120">
            <div class="container">
                <div class="team-single-content">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-4">
                            <div class="team-single-img">
                                <img src="assets/img/speaker/single.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="team-details">
                                <h3 class="name">Carson Stuckey</h3>
                                <span class="designation">Project Manager</span>
                                <div class="team-details-info">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters packages and web page editors now usepackages and web page editors now use.</p>
                                    <ul>
                                        <li><a href="#"><i class="far fa-buildings"></i> <span>Company:</span> Demo Company Ltd.</a></li>
                                        <li><a href="#"><i class="far fa-sliders"></i> <span>Experience:</span> 15 Years</a></li>
                                        <li><a href="#"><i class="far fa-envelope"></i> <span>Email:</span> carson@example.com</a></li>
                                        <li><a href="#"><i class="far fa-phone"></i> <span>Phone:</span> +2 123 456 7892</a></li>
                                        <li><a href="#"><i class="far fa-globe"></i> <span>Website:</span> www.example.com</a></li>
                                    </ul>
                                </div>
                                <div class="team-details-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-behance"></i></a>
                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- team single end -->

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