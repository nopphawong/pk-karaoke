<?php
require('assets/config/system.config.php');
require('assets/class/mysqli.class.php');
require('assets/inc/connection.inc.php');
require('assets/inc/function.inc.php');
require('assets/inc/lang.inc.php');
include('assets/lang/' . $_SESSION['LANG'] . '.lang.php');

$version = date('Ymd');
#----Get Data----#
$viewID = numberic($_GET['view']);

if (empty($viewID)) { #Check Content id
    RedirectTo($config['BASE_URL_MAIN'] . $_SESSION['LANG'] . '/404/');
    exit();
} else {
    if (!empty($viewID)) {
        #Update view
        $db->query("UPDATE " . $tbl . "_content SET content_view = content_view+1 WHERE content_id = $viewID LIMIT 1");
        #Get Data
        $getContent = $db->queryAndFetch(
            "	SELECT 
                                                    l.content_name
                                                    , l.content_detail
                                                    , c.content_profile
                                                    , c.content_type 
                                                    , c.content_status
                                                    , c.content_view
                                                    , c.content_tag
                                                    , c.slide_position
                                                    , c.content_date
                                                    , c.content_time
                                                    , c.content_admin 
                                                    , a.cate_name
                                                    , a.cate_detail
                                                FROM  " . $tbl . "_content c 
                                                LEFT JOIN " . $tbl . "_content_category_" . $_SESSION['LANG'] . " a ON c.content_type = a.cate_id
                                                LEFT JOIN " . $tbl . "_content_" . $_SESSION['LANG'] . " l ON c.content_id = l.ref_content_id
                                                WHERE c.content_id = %n
                                                LIMIT 1",
            $viewID
        );
    }

    if (count($getContent) > 0) {
        $content_name        =    htmlspecialchars($getContent['content_name']);
        $content_detail        =    $getContent['content_detail'];
        $content_status        =    $getContent['content_status'];
        $content_view        =    number_format($getContent['content_view']);
        $content_date        =    date('j F, Y', strtotime($getContent['content_date']));
        $content_time        =    $getContent['content_time'];
        $content_admin        =    $getContent['content_admin'];
        $content_profile    =    $getContent['content_profile'];
        $content_slide        =    $getContent['slide_position'];
        $category_name        =    $getContent['cate_name'];
        $contentCate        =    $getContent['content_type'];
        $content_tag_header = !empty($getContent['content_tag']) ? ',' . htmlspecialchars($getContent['content_tag']) : '';
        $content_tag        = !empty($getContent['content_tag']) ? explode(',', $getContent['content_tag']) : explode(',', $config['KEYWORD']);
        $getGallery         = $db->queryAndFetchAll(" SELECT img_name FROM `" . $tbl . "_img_album` WHERE ref_id = $viewID ");
    } else {
        RedirectTo($config['BASE_URL_MAIN'] . $_SESSION['LANG'] . '/404/');
        exit();
    }
} #End check Content id
#----End Get Data----#
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <?php include("assets/inc/gbl_metatag.inc.php"); ?>
    <meta name="keywords" content="<?= getDesc($content_name, 200) . $content_tag_header . ',' . $config['KEYWORD']; ?>" />
    <meta name="description" content="<?= getDesc($content_detail, 200); ?>" />

    <meta property="og:url" content="<?= $config['BASE_URL_MAIN'] . $_SESSION['LANG'] . '/บริการให้เช่า/' . $viewID . '/' . getTitle($content_name); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= getDesc($content_name, 200); ?> | <?= $config['SITE_NAME']; ?>" />
    <meta property="og:description" content="<?= getDesc($content_detail, 200); ?>" />
    <meta property="og:image" content="<?= $config['BASE_URL_MAIN'] . 'uploads/profiles/' . $content_profile . '?v=' . date('Ymd'); ?>" />

    <!-- title -->
    <title><?= $content_name . ' | ' . $config['SITE_NAME']; ?></title>

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
                <h2 class="breadcrumb-title"><?= $content_name; ?></h2>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= $config['BASE_URL']; ?>"><?= $home; ?></a></li>
                    <li><a href="<?= $config['BASE_URL'] . $_SESSION['LANG'] . '/' . seoUrl($category_name) . '/'; ?>"><?= $category_name; ?></a></li>
                    <li class="active"><?= $content_name; ?></li>
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