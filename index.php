<?php
require('assets/config/system.config.php');
require('assets/class/mysqli.class.php');
require('assets/inc/connection.inc.php');
require('assets/inc/function.inc.php');
require('assets/inc/lang.inc.php');
include('assets/lang/' . $_SESSION['LANG'] . '.lang.php');


$version = date('Ymd');
#------Update Status-------#
$today = date('Y-m-d');
#Read file date
$chkDate = file('chk_date.txt');
$chkDate = $chkDate[0];
fclose($chkDate);

if (empty($chkDate) || ($chkDate < $today)) {
    #Write file date
    $wDate = fopen('chk_date.txt', 'w');
    fwrite($wDate, "$today");
    fclose($wDate);
    //Update Banner status
    $db->query(" UPDATE " . $tbl . "_banner SET  banner_status = '0' WHERE banner_end_date < '$today' AND banner_end_date != '0000-00-00' ");
    //Update Content status
    $db->query(" UPDATE " . $tbl . "_content SET  content_status = '0' WHERE content_end_date < '$today' AND content_end_date != '0000-00-00' ");
}
#-------//End Update Status-------#

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <?php include("assets/inc/gbl_metatag.inc.php"); ?>
    <meta name="keywords" content="<?= $config['KEYWORD']; ?>" />
    <meta name="description" content="<?= $config['SITE_NAME'] . ' ' . $config['SITE_DETAIL']; ?>" />

    <meta property="og:url" content="<?= $config['BASE_URL_MAIN']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= $config['SITE_DETAIL'] . ' | ' . $config['SITE_NAME']; ?>" />
    <meta property="og:description" content="<?= $config['BASE_URL_MAIN'] . ' ' . $config['SITE_DETAIL']; ?>" />
    <meta property="og:image" content="<?= $config['BASE_URL'] . 'assets/images/trend-image2.jpg?v=1001'; ?>" />

    <!-- title -->
    <title><?= 'เช่าคาราโอเกะ รายวัน-รายเดือน เช่าเครื่องเสียง ขายเครื่องคาราโอเกะ | ' . $config['SITE_NAME']; ?></title>

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

        <!-- hero slider -->
        <div class="hero-section">
            <div class="hero-scroll-box">
                <div class="hero-scroll">
                    <div class="scroller"></div>
                </div>
            </div>
            <div class="hero-slider owl-carousel owl-theme">
                <div class="hero-single" style="background: url(assets/img/hero/slider-4.jpg?v=<? $version ?>)">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="hero-content">
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        พีเค คาราโอเกะ <span>เครื่องเสียงระดับไฮเอนด์</span> ครบวงจร
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        ศูนย์เช่าเครื่องคาราโอเกะครบวงจร เช่าเครื่องคาราโอเกะรายวัน เช่าเครื่องคาราโอเกะรายเดือน พร้อมลิขสิทธิ์เพลงทุกค่ายเพลง เช่าเครื่องเสียง ติดตั้งระบบคาราโอเกะ ขายเครื่องคาราโอเกะ
                                    </p>
                                    <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                        <a href="tel:+66968402497" class="theme-btn">โทรหาเราสิ<i
                                                class="fas fa-arrow-right"></i></a>
                                        <a href="<?= $config['BASE_URL_MAIN'] . $_SESSION['LANG'] . '/เกี่ยวกับเรา/44/ทำไมต้องเลือกเรา'; ?>" class="theme-btn theme-btn2">เกี่ยวกับเรา<i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-single" style="background: url(assets/img/hero/slider-6.jpg?v=<? $version ?>)">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="hero-content">
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        เพลงทันสมัย <span>ถูกลิขสิทธิ์</span> ฮิตตามกระแส
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        ศูนย์เช่าเครื่องคาราโอเกะครบวงจร เช่าเครื่องคาราโอเกะรายวัน เช่าเครื่องคาราโอเกะรายเดือน พร้อมลิขสิทธิ์เพลงทุกค่ายเพลง เช่าเครื่องเสียง ติดตั้งระบบคาราโอเกะ ขายเครื่องคาราโอเกะ
                                    </p>
                                    <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                        <a href="tel:+66968402497" class="theme-btn">โทรหาเราสิ<i
                                                class="fas fa-arrow-right"></i></a>
                                        <a href="<?= $config['BASE_URL_MAIN'] . $_SESSION['LANG'] . '/เกี่ยวกับเรา/44/ทำไมต้องเลือกเรา'; ?>" class="theme-btn theme-btn2">เกี่ยวกับเรา<i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-single" style="background: url(assets/img/hero/slider-7.jpg?v=<? $version ?>)">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="hero-content">
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        เครื่องคาราโอเกะ <span>ทันสมัยที่สุด</span> ในไทย
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        ศูนย์เช่าเครื่องคาราโอเกะครบวงจร เช่าเครื่องคาราโอเกะรายวัน เช่าเครื่องคาราโอเกะรายเดือน พร้อมลิขสิทธิ์เพลงทุกค่ายเพลง เช่าเครื่องเสียง ติดตั้งระบบคาราโอเกะ ขายเครื่องคาราโอเกะ
                                    </p>
                                    <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                        <a href="tel:+66968402497" class="theme-btn">โทรหาเราสิ<i
                                                class="fas fa-arrow-right"></i></a>
                                        <a href="<?= $config['BASE_URL_MAIN'] . $_SESSION['LANG'] . '/เกี่ยวกับเรา/44/ทำไมต้องเลือกเรา'; ?>" class="theme-btn theme-btn2">เกี่ยวกับเรา<i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- hero slider end -->

        <!-- about area -->
        <div class="about-area py-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-left wow fadeInRight" data-wow-delay=".25s">
                            <div class="about-img">
                                <img class="img-1" src="assets/img/about/01.jpg" alt="">
                                <img class="img-2" src="assets/img/about/02.jpg" alt="">
                                <img class="img-3" src="assets/img/about/03.jpg" alt="">
                            </div>
                            <div class="about-experience">
                                <h5>ประสบการณ์ <br> มากกว่า</h5>
                                <span>10</span> <span style="font-size: 28px;">ปี</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-right wow fadeInLeft" data-wow-delay=".25s">
                            <div class="site-heading mb-3">
                                <span class="site-title-tagline">ทำไมต้องเลือกเรา?</span>
                                <h2 class="site-title">
                                    PK <span>KARAOKE</span>
                                </h2>
                                <h4> media light &amp; sound system</h4>
                                <div class="site-shadow-text wow fadeInRight" data-wow-delay=".35s">About Us</div>
                            </div>
                            <p class="about-text">เราให้บริการ เช่าเครื่องคาราโอเกะรายวัน เช่าเครื่องคาราโอเกะรายเดือน เช่าเครื่องเสียงรายวัน เช่าเครื่องเสียงรายเดือน และจำหน่ายสินค้าเครื่องเสียง เครื่องคาราโอเกะ และลิขสิทธิ์เพลง อุปกรณ์ชุดเครื่องเสียงบริการจัดส่งตรงถึงบ้านท่าน ด้วยประสบการณ์ที่ยาวนานกว่า 10 ปี ในวงการ เช่าเครื่องคาราโอเกะ พร้อมด้วยบุคลากรผู้เชี่ยวชาญ เรามั่นใจว่าเราสามารถสร้างความประทับใจในทุกความบันเทิงของลูกค้าได้ทุกรูปแบบ</p>
                            <div class="about-list-wrap">
                                <ul class="about-list list-unstyled">
                                    <li>
                                        <div class="about-item">
                                            <h4><span>01.</span> เครื่องคาราโอเกะทันสมัยที่สุดในไทย ภาพเสียงคมชัด</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="about-item">
                                            <h4><span>02.</span> มีเครื่องสียงหลากหลายตอบโจทย์ทุกความต้องการ</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="about-item">
                                            <h4><span>03.</span> ลิขสิทธิ์เพลงถูกต้องหมดปัญหาเรื่องการละเมิดลิขสิทธิ์</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="about-item">
                                            <h4><span>04.</span> บริการรับติดตั้งโดยผู้เชี่ยวชาญ</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="about-item">
                                            <h4><span>05.</span> ทดสอบการทำงานจนกว่าใช้งานได้อย่างสมบูรณ์</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <a href="<?= $config['BASE_URL_MAIN'] . $_SESSION['LANG'] . '/เกี่ยวกับเรา/44/ทำไมต้องเลือกเรา'; ?>" class="theme-btn">ดูเพิ่มเติม<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about area end -->


        <!-- video area -->
        <div class="video-area">
            <div class="container-fluid px-0">
                <div class="video-content pb-50" style="background-image: url(assets/img/video/01.jpg?v=<? $version ?>);">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class="video-info">
                                    <div class="site-heading mb-0">
                                        <span class="site-title-tagline text-white">เราให้บริการเช่า</span>
                                        <h2 class="site-title text-white" style="font-size: 36px;"><span>คาราโอเกะ, เช่าเครื่องคาราโอเกะพร้อมลิขสิทธิ์เพลง, เช่าเครื่องเสียง, อุปกรณ์ชุดเครื่องเสียง</span> </h2>
                                        <p class="text-white">บริการจัดส่งตรงถึงบ้านท่าน และมีบริการรับติดตั้งโดยผู้เชี่ยวชาญของเราและทำการทดสอบจนทุกอย่างที่ติดตั้งให้ดูดีและฟังดูดีที่สุด เพื่อให้คุณสามารถใช้งานได้อย่างราบรื่น ไม่สะดุดทุกความบันเทิง</p>
                                    </div>

                                    <a href="#" class="theme-btn mt-30">ดูเพิ่มเติม <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="video-wrapper">
                                    <a class="play-btn popup-youtube" href="https://www.youtube.com/watch?v=wew-tBvJ9k4">
                                        <i class="fas fa-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- video area end -->


        <!-- feature area -->
        <div class="feature-area fa-negative">
            <div class="container">
                <div class="feature-wrapper">
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-3">
                            <div class="feature-item wow fadeInUp" data-wow-delay=".25s">
                                <span class="count">01</span>
                                <div class="feature-icon">
                                    <img src="assets/img/icon/speaker.svg" alt="">
                                </div>
                                <h4 class="feature-title">Great Speakers</h4>
                                <p>It is a long established fact that a reader will be distracted.</p>
                                <a href="contact.html" class="theme-btn mt-20">Learn More<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="feature-item wow fadeInDown" data-wow-delay=".25s">
                                <span class="count">02</span>
                                <div class="feature-icon">
                                    <img src="assets/img/icon/learn.svg" alt="">
                                </div>
                                <h4 class="feature-title">Learn New Things</h4>
                                <p>It is a long established fact that a reader will be distracted.</p>
                                <a href="contact.html" class="theme-btn mt-20">Learn More<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="feature-item wow fadeInUp" data-wow-delay=".25s">
                                <span class="count">03</span>
                                <div class="feature-icon">
                                    <img src="assets/img/icon/meet.svg" alt="">
                                </div>
                                <h4 class="feature-title">Meet New People</h4>
                                <p>It is a long established fact that a reader will be distracted.</p>
                                <a href="contact.html" class="theme-btn mt-20">Learn More<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="feature-item wow fadeInDown" data-wow-delay=".25s">
                                <span class="count">04</span>
                                <div class="feature-icon">
                                    <img src="assets/img/icon/question.svg" alt="">
                                </div>
                                <h4 class="feature-title">Ask Questions</h4>
                                <p>It is a long established fact that a reader will be distracted.</p>
                                <a href="contact.html" class="theme-btn mt-20">Learn More<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- feature area end -->

        <!-- counter area -->
        <div class="counter-area pt-80 pb-80">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-5">
                        <div class="counter-info">
                            <div class="site-heading mb-3">
                                <span class="site-title-tagline text-white">เครื่องคาราโอเกะ</span>
                                <h2 class="site-title text-white">
                                    เครื่องคาราโอเกะทันสมัยที่สุดในไทย
                                </h2>
                            </div>
                            <p class="text-white">ภาพเสียงคมชัด เครื่องเสียงระดับไฮเอนด์ และลิขสิทธิ์เพลงทุกบริษัท</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="row g-4 justify-content-center">
                            <div class="col-md-6">
                                <div class="counter-box wow fadeInUp" data-wow-delay=".25s">
                                    <div class="icon">
                                        <img src="assets/img/icon/workshop.svg" alt="">
                                    </div>
                                    <div class="counter-content">
                                        <div class="counter-info">
                                            <span class="counter" style="font-size: 42px;" data-count="+" data-to="50000" data-speed="3000">50000</span>
                                            <span class="counter-unit">+</span>
                                        </div>
                                        <h6 class="title">คลังเพลงกว่า</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="counter-box wow fadeInDown" data-wow-delay=".25s">
                                    <div class="icon">
                                        <img src="assets/img/icon/participant.svg" alt="">
                                    </div>
                                    <div class="counter-content">
                                        <div class="counter-info">
                                            <span class="counter" data-count="+" data-to="260" data-speed="3000">260</span>
                                            <span class="counter-unit">K</span>
                                        </div>
                                        <h6 class="title">Event Participants</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="counter-box wow fadeInUp" data-wow-delay=".25s">
                                    <div class="icon">
                                        <img src="assets/img/icon/speaker-2.svg" alt="">
                                    </div>
                                    <div class="counter-content">
                                        <div class="counter-info">
                                            <span class="counter" data-count="+" data-to="120" data-speed="3000">120</span>
                                            <span class="counter-unit">+</span>
                                        </div>
                                        <h6 class="title">Skilled Speakers</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="counter-box wow fadeInDown" data-wow-delay=".25s">
                                    <div class="icon">
                                        <img src="assets/img/icon/award.svg" alt="">
                                    </div>
                                    <div class="counter-content">
                                        <div class="counter-info">
                                            <span class="counter" data-count="+" data-to="50" data-speed="3000">50</span>
                                            <span class="counter-unit">+</span>
                                        </div>
                                        <h6 class="title">Win Awards</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- counter area end -->


        <!-- products area -->
        <?php include('components/products.php'); ?>
        <!-- products area end -->


        <!-- portfolio area -->
        <?php include('components/portfolio.php'); ?>
        <!-- portfolio area end -->


        <!-- partner area -->
        <div class="partner-area partner-bg py-80" style="background-image: url(assets/img/shape/04.png?v=<? $version ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                            <h2 class="site-title">พีเค คารโอเกะ <span>โทรหาเราสิ</span></h2>
                        </div>
                    </div>
                </div>
                <div class="partner-contact wow fadeInUp" data-wow-delay=".25s">
                    <div class="text-center wow fadeInUp" data-wow-delay=".25s">
                        <a href="https://line.me/ti/p/~pk-karaoke" target="_blank" rel="noreferrer" class="theme-btn"><span class="fab fa-line"></span> เพิ่มเพื่อน LINE</a>
                    </div>
                    <a href="tel:+66868402497"><i class="far fa-phone"></i> 086-840-2497</a>
                    <a href="tel:+66909699524"><i class="far fa-phone"></i> 090-969-9524</a>
                    <a href="mailto:pk.office18@gmail.com"><i class="far fa-envelope"></i> pk.office18@gmail.com</a>
                    <div><i class="far fa-location-dot"></i> P.K. คาราโอเกะ บิ๊กซี สายไหม ห้อง AA41 - AA42 90/30 ถนนสายไหม แขวงสายไหม เขตสายไหม กรุงเทพฯ 10220</div>
                </div>

            </div>
        </div>
        <!-- partner area end -->

        <!-- gallery-area -->
        <div class="gallery-area py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                            <span class="site-title-tagline">แกลเลอรี่</span>
                            <h2 class="site-title">มาดู <span>Gallery</span> ของเรากัน</h2>
                            <div class="site-shadow-text wow fadeInRight" data-wow-delay=".35s">แกลเลอรี่ของเรา</div>
                        </div>
                    </div>
                </div>
                <div class="row g-4 popup-gallery">
                    <div class="col-md-7">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="gallery-item wow fadeInDown" data-wow-delay=".25s">
                                    <div class="gallery-img">
                                        <img src="assets/img/gallery/02.jpg" alt="">
                                        <a class="popup-img gallery-link" href="assets/img/gallery/02.jpg"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="gallery-item wow fadeInDown" data-wow-delay=".25s">
                                    <div class="gallery-img">
                                        <img src="assets/img/gallery/03.jpg" alt="">
                                        <a class="popup-img gallery-link" href="assets/img/gallery/03.jpg"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="gallery-item wow fadeInDown" data-wow-delay=".25s">
                                    <div class="gallery-img">
                                        <img src="assets/img/gallery/04.jpg" alt="">
                                        <a class="popup-img gallery-link" href="assets/img/gallery/04.jpg"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="gallery-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="gallery-img">
                                <img src="assets/img/gallery/01.jpg" alt="">
                                <a class="popup-img gallery-link" href="assets/img/gallery/01.jpg"><i
                                        class="fal fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- gallery-area end -->

        <!-- contact-area -->
        <?php include('components/contact.php'); ?>
        <!-- contact-area end -->


        <!-- blog-area -->
        <?php include('components/public_relations.php'); ?>
        <!-- blog-area end -->
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