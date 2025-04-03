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
    #RedirectTo($config['BASE_URL'].'404.php');
    #exit();
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
        $content_name        = htmlspecialchars($getContent['content_name']);
        $content_detail        = $getContent['content_detail'];
        $content_status        = $getContent['content_status'];
        $content_view        = number_format($getContent['content_view']);
        $content_date        = date('j F, Y', strtotime($getContent['content_date']));
        $content_time        = $getContent['content_time'];
        $content_admin        = $getContent['content_admin'];
        $content_profile    = $getContent['content_profile'];
        $content_slide        = $getContent['slide_position'];
        $category_name        = $getContent['cate_name'];
        $contentCate        = $getContent['content_type'];
        $content_tag_header = ! empty($getContent['content_tag']) ? ',' . htmlspecialchars($getContent['content_tag']) : '';
        $content_tag        = ! empty($getContent['content_tag']) ? explode(',', $getContent['content_tag']) : explode(',', $config['KEYWORD']);
        $getGallery         = $db->queryAndFetchAll(" SELECT img_name FROM `" . $tbl . "_img_album` WHERE ref_id = $viewID ");
    } else {
        #RedirectTo($config['BASE_URL'].'404.php');
        #exit();
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

    <meta property="og:url" content="<?= $config['BASE_URL_MAIN'] . $_SESSION['LANG'] . '/content/view/' . $viewID . '/' . getTitle($content_name); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= getDesc($content_name, 200); ?> | <?= $config['SITE_NAME']; ?>" />
    <meta property="og:description" content="<?= getDesc($content_detail, 200); ?>" />
    <meta property="og:image" content="<?= $config['BASE_URL'] . 'uploads/profiles/' . $content_profile . '?v=1001'; ?>" />

    <!-- title -->
    <title><?= $content_name . ' | ' . $config['SITE_NAME']; ?></title>

    <!-- css -->
    <link rel="stylesheet" href="<?= $config['BASE_URL_MAIN']; ?>assets/css/bootstrap.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL_MAIN']; ?>assets/css/all-fontawesome.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL_MAIN']; ?>assets/css/animate.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL_MAIN']; ?>assets/css/magnific-popup.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL_MAIN']; ?>assets/css/owl.carousel.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL_MAIN']; ?>assets/css/style.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL_MAIN']; ?>assets/css/custom.css?v=<?= 10 ?>">

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
                <h2 class="breadcrumb-title"><?= $content_name; ?></h2>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= $config['BASE_URL_MAIN']; ?>"><?= $home; ?></a></li>
                    <li><a href="<?= $config['BASE_URL_MAIN'] . $_SESSION['LANG'] . '/' . seoUrl($category_name) . '/'; ?>"><?= $category_name; ?></a></li>
                    <li class="active"><?= $content_name; ?></li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb end -->



        <!-- blog single -->
        <div class="blog-single py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                            <h3 class="blog-details-title mb-20"><?= $content_name; ?></h3>
                            <div class="site-shadow-text wow fadeInRight" data-wow-delay=".35s"><?= $category_name; ?></div>
                        </div>
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-8">
                        <div class="blog-single-wrapper">
                            <div class="blog-single-content">
                                <?php if ($content_profile != '') { ?>
                                    <div class="blog-thumb-img">
                                        <img src="<?= 'http://www.pk-karaoke.com/uploads/profiles/' . $content_profile . '?v=1001' ?>" alt="<?= $content_name ?>">
                                    </div>
                                <?php } ?>
                                <div class="blog-info">
                                    <div class="blog-details">
                                        <?= $content_detail; ?>
                                    </div>
                                    <div class="blog-meta mt-50 gap-4">
                                        <a class="share-link"><i class="fa fa-calendar"></i> <?= $content_date; ?></a>
                                        <a class="share-link"><i class="fa fa-eye"></i> <?= $content_view; ?> Views</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog single end -->

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