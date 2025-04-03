<?php
require('assets/config/system.config.php');
require('assets/class/mysqli.class.php');
require('assets/inc/connection.inc.php');
require('assets/inc/function.inc.php');
require('assets/inc/lang.inc.php');
include('assets/lang/' . $_SESSION['LANG'] . '.lang.php');

$version = date('Ymd');
#----Get Data----#
$chkCateID  = ! empty($_GET['cate']) ? numberic($_GET['cate']) : '';
$cateID     = ! empty($chkCateID) ? $chkCateID : 12;
$getCate = $db->queryAndFetch(" SELECT * FROM " . $tbl . "_content_category_" . $_SESSION['LANG'] . " WHERE cate_id = $cateID ");
#----End Get Data----#
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <?php include("assets/inc/gbl_metatag.inc.php"); ?>
    <meta name="keywords" content="<?PHP echo getDesc($getCate['cate_name'], 200) . $content_tag_header . ',' . $config['KEYWORD']; ?>" />
    <meta name="description" content="<?PHP echo getDesc($getCate['cate_detail'], 200); ?>" />

    <meta property="og:url" content="<?PHP echo $config['BASE_URL_MAIN'] . $_SESSION['LANG'] . '/บริการให้เช่า/'; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?PHP echo getDesc($getCate['cate_name'], 200); ?> | <?PHP echo $config['SITE_NAME']; ?>" />
    <meta property="og:description" content="<?PHP echo getDesc($getCate['cate_detail'], 200); ?>" />
    <meta property="og:image" content="<?PHP echo $config['BASE_URL'] . 'uploads/profiles/' . $content_profile . '?v=' . $version; ?>" />

    <!-- title -->
    <title><?PHP echo $getCate['cate_name'] . ' | ' . $config['SITE_NAME']; ?></title>

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
        <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/03.jpg?v=<?= $version ?>)">
            <div class="container">
                <h2 class="breadcrumb-title"><?PHP echo $getCate['cate_name']; ?></h2>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= $config['BASE_URL_MAIN']; ?>"><?= $home; ?></a></li>
                    <li class="active"><?PHP echo $getCate['cate_name']; ?></li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb end -->

        <div class="schedule-area py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                            <h2 class="site-title"><span><?PHP echo $getCate['cate_name']; ?></span></h2>
                            <div class="site-shadow-text wow fadeInRight" data-wow-delay=".35s"><?PHP echo $getCate['cate_name']; ?></div>
                        </div>
                    </div>
                </div>


                <!-- schedule area -->
                <div class="tab-content wow fadeInUp" data-wow-delay=".25s" id="pills-tabContent-schedule">
                    <div class="tab-pane fade show active" id="pills-schedule1" role="tabpanel" aria-labelledby="pills-schedule-tab1" tabindex="0">
                        <div class="row g-4">
                            <?PHP
                            $sqlServ  = "SELECT 
                                                            l.content_name
                                                            , l.content_detail
                                                            , c.content_profile
                                                            , c.content_id
                                                            , c.content_date
                                                        FROM  " . $tbl . "_content c 
                                                        LEFT JOIN " . $tbl . "_content_" . $_SESSION['LANG'] . " l ON c.content_id = l.ref_content_id
                                                        WHERE c.content_status = '1' 
                                                        AND c.content_type = $cateID
                                                        ORDER BY c.content_date DESC, c.content_time DESC ";
                            $getServ    = $db->queryResult($sqlServ);
                            $n  = 0;
                            while ($resultServ  = $getServ->fetch()) {
                                ++$n;
                            ?>
                                <div class="col-lg-12">
                                    <div class="schedule-item">
                                        <span class="schedule-count">0<?PHP echo $n; ?></span>
                                        <div class="schedule-content-wrap">
                                            <div class="schedule-img">
                                                <a href="<?PHP echo $config['BASE_URL_MAIN'] . $_SESSION['LANG'] . '/' . seoUrl($getCate['cate_name']) . '/' . $resultServ['content_id'] . '/' . seoUrl($resultServ['content_name']); ?>">
                                                    <img src="<?PHP echo $config['BASE_URL'] . 'uploads/profiles/' . $resultServ['content_profile'] . '?v=' . $version; ?>" alt="<?PHP echo htmlspecialchars($resultServ['content_name']); ?>">
                                                </a>
                                            </div>
                                            <div class="schedule-content">
                                                <div class="schedule-info">
                                                    <h4><a href="<?PHP echo $config['BASE_URL_MAIN'] . $_SESSION['LANG'] . '/' . seoUrl($getCate['cate_name']) . '/' . $resultServ['content_id'] . '/' . seoUrl($resultServ['content_name']); ?>"><?PHP echo $resultServ['content_name']; ?></a></h4>
                                                    <p><?PHP echo getDesc($resultServ['content_detail'], 200); ?></p>
                                                </div>
                                                <div class="schedule-bottom">

                                                    <a href="<?PHP echo $config['BASE_URL_MAIN'] . $_SESSION['LANG'] . '/' . seoUrl($getCate['cate_name']) . '/' . $resultServ['content_id'] . '/' . seoUrl($resultServ['content_name']); ?>" class="theme-btn">รายละเอียด<i class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?PHP } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- schedule area end -->

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