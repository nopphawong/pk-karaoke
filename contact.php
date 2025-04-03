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
    <meta name="keywords" content="<?= getDesc($contact_us, 200) . $content_tag_header . ',' . $config['KEYWORD']; ?>" />
    <meta name="description" content="<?= getDesc($contact_us, 200); ?>" />

    <meta property="og:url" content="<?= $config['BASE_URL_MAIN'] . $_SESSION['LANG'] . '/' . $contact_us . '/'; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= getDesc($contact_us, 200); ?> | <?= $config['SITE_NAME']; ?>" />
    <meta property="og:description" content="<?= getDesc($contact_us, 200); ?>" />
    <meta property="og:image" content="<?= $config['BASE_URL'] . 'uploads/profiles/' . $content_profile . '?v=1001'; ?>" />

    <!-- title -->
    <title><?= $contact_us . ' | ' . $config['SITE_NAME']; ?></title>

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
                <h2 class="breadcrumb-title"><?= $contact_us; ?></h2>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= $config['BASE_URL_MAIN']; ?>"><?= $home; ?></a></li>
                    <li class="active"><?= $contact_us; ?></li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- contact area -->
        <div class="contact-area py-120">
            <div class="container">
                <div class="contact-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="contact-info">
                                <div class="contact-info-icon">
                                    <i class="fal fa-map-location-dot"></i>
                                </div>
                                <div class="contact-info-content">
                                    <p>P.K. คาราโอเกะ บิ๊กซี สายไหม ห้อง AA41 - AA42 90/30 ถนนสายไหม แขวงสายไหม เขตสายไหม กรุงเทพฯ 10220</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-info">
                                <div class="contact-info-icon">
                                    <i class="fal fa-phone-volume"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h5>โทรหาเราสิ</h5>
                                    <p>096-840-2497</p>
                                    <p>090-969-9524</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-info">
                                <div class="contact-info-icon">
                                    <i class="fal fa-envelopes"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h5>อีเมล</h5>
                                    <p>pk.office18@gmail.com</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-30">
                    <?php include('components/contact.php'); ?>
                </div>

            </div>
        </div>
        <!-- end contact area -->

        <!-- map -->
        <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3872.6120094188486!2d100.66456061385429!3d13.922124297076898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d7d98a702e1b5%3A0x331c061b8438c6c4!2z4Lia4Li04LmK4LiB4LiL4Li1IOC4oeC4suC4o-C5jOC5gOC4geC5h-C4lSDguKrguLLguKLguYTguKvguKE!5e0!3m2!1sth!2sth!4v1543071359171"
                style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

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