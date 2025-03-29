<?php
require('assets/config/system.config.php');
require('assets/class/mysqli.class.php');
require('assets/inc/connection.inc.php');
require('assets/inc/function.inc.php');
require('assets/inc/lang.inc.php');



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
    <title><?= $config['SITE_DETAIL'] . ' | ' . $config['SITE_NAME']; ?></title>
    <meta name="keywords" content="<?= $config['KEYWORD']; ?>" />
    <meta name="description" content="<?= $config['SITE_NAME'] . ' ' . $config['SITE_DETAIL']; ?>" />

    <meta property="og:url" content="<?= $config['BASE_URL']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= $config['SITE_DETAIL'] . ' | ' . $config['SITE_NAME']; ?>" />
    <meta property="og:description" content="<?= $config['SITE_NAME'] . ' ' . $config['SITE_DETAIL']; ?>" />
    <meta property="og:image" content="<?= $config['BASE_URL'] . 'assets/images/trend-image2.jpg?v=1001'; ?>" />

    <!-- title -->
    <title>HTML5 Template</title>

    <!-- css -->
    <link rel="stylesheet" href="<?= $config['BASE_URL']; ?>assets/css/bootstrap.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL']; ?>assets/css/all-fontawesome.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL']; ?>assets/css/animate.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL']; ?>assets/css/magnific-popup.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL']; ?>assets/css/owl.carousel.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $config['BASE_URL']; ?>assets/css/style.css?v=<?= $version ?>">

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
                <div class="hero-single" style="background: url(assets/img/hero/slider-1.jpg)">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="hero-content">
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        คาราโอเกะ <span>เครื่องเสียงระดับไฮเอนด์</span> ครบวงจร
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        ศูนย์เช่าเครื่องคาราโอเกะครบวงจร เช่าเครื่องคาราโอเกะรายวัน เช่าเครื่องคาราโอเกะรายเดือน พร้อมลิขสิทธิ์เพลงทุกค่ายเพลง เช่าเครื่องเสียง ติดตั้งระบบคาราโอเกะ ขายเครื่องคาราโอเกะ
                                    </p>
                                    <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                        <a href="tel:+66968402497" class="theme-btn">โทรหาเราสิ<i
                                                class="fas fa-arrow-right"></i></a>
                                        <a href="#" class="theme-btn theme-btn2">เกี่ยวกับเรา<i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-single" style="background: url(assets/img/hero/slider-2.jpg)">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="hero-content">
                                    <!-- <div class="hero-date" data-animation="fadeInDown" data-delay=".25s">
                                        <h1>25</h1>
                                        <div class="date-content">
                                            <span>May 2024</span>
                                            <p>25/B Milford Road, New York, USA</p>
                                        </div>
                                    </div> -->
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        เพลงทันสมัย <span>ถูกลิขสิทธิ์</span> ฮิตตามกระแส
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        ศูนย์เช่าเครื่องคาราโอเกะครบวงจร เช่าเครื่องคาราโอเกะรายวัน เช่าเครื่องคาราโอเกะรายเดือน พร้อมลิขสิทธิ์เพลงทุกค่ายเพลง เช่าเครื่องเสียง ติดตั้งระบบคาราโอเกะ ขายเครื่องคาราโอเกะ
                                    </p>
                                    <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                        <a href="tel:+66968402497" class="theme-btn">โทรหาเราสิ<i
                                                class="fas fa-arrow-right"></i></a>
                                        <a href="#" class="theme-btn theme-btn2">เกี่ยวกับเรา<i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-single" style="background: url(assets/img/hero/slider-3.jpg)">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="hero-content">
                                    <!-- <div class="hero-date" data-animation="fadeInDown" data-delay=".25s">
                                        <h1>25</h1>
                                        <div class="date-content">
                                            <span>May 2024</span>
                                            <p>25/B Milford Road, New York, USA</p>
                                        </div>
                                    </div> -->
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        เครื่องคาราโอเกะ <span>ทันสมัยที่สุด</span> ในไทย
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        ศูนย์เช่าเครื่องคาราโอเกะครบวงจร เช่าเครื่องคาราโอเกะรายวัน เช่าเครื่องคาราโอเกะรายเดือน พร้อมลิขสิทธิ์เพลงทุกค่ายเพลง เช่าเครื่องเสียง ติดตั้งระบบคาราโอเกะ ขายเครื่องคาราโอเกะ
                                    </p>
                                    <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                        <a href="tel:+66968402497" class="theme-btn">โทรหาเราสิ<i
                                                class="fas fa-arrow-right"></i></a>
                                        <a href="#" class="theme-btn theme-btn2">เกี่ยวกับเรา<i
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
                                <span>30</span>
                                <h5>Years Of <br> Experience</h5>
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
                            <a href="about.html" class="theme-btn">ดูเพิ่มเติม<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about area end -->


        <!-- video area -->
        <div class="video-area">
            <div class="container-fluid px-0">
                <div class="video-content pb-50" style="background-image: url(assets/img/video/01.jpg);">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class="video-info">
                                    <div class="site-heading mb-0">
                                        <span class="site-title-tagline text-white">บริการให้เช่า</span>
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


        <!-- pricing area -->
        <?php include('components/pricing.php'); ?>
        <!-- pricing area end -->


        <!-- portfolio area -->
        <?php include('components/portfolio.php'); ?>
        <!-- portfolio area end -->


        <!-- cta area -->
        <div class="cta-area pt-60 pb-60" style="background-image: url(assets/img/cta/01.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="cta-content wow fadeInUp" data-wow-delay=".25s">
                            <h1>Are you want to join our events ?</h1>
                            <p>It is a long established fact that a reader will be distracted by the readable <br> content of a page when looking at its layout.</p>
                            <a href="#" class="theme-btn">Register Now<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cta area end -->


        <!-- choose area -->
        <div class="choose-area py-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="choose-img wow fadeInLeft" data-wow-delay=".25s">
                            <img src="assets/img/choose/01.jpg" alt="">
                            <a href="#" class="theme-btn">Learn More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="choose-content wow fadeInUp" data-wow-delay=".25s">
                            <div class="site-heading mb-0">
                                <span class="site-title-tagline">Why Join</span>
                                <h2 class="site-title mb-10">Why You Should Join Our Event ?</h2>
                                <p>
                                    It is a long established fact that a reader will be distracted by the readable
                                    content of a page when looking at its layout.
                                </p>
                            </div>
                            <div class="choose-content-wrap">
                                <div class="choose-item">
                                    <div class="choose-item-icon">
                                        <img src="assets/img/icon/event.svg" alt="">
                                    </div>
                                    <div class="choose-item-info">
                                        <h4>Interactive Sessions</h4>
                                        <p>There are many variations of the passages available suffered.</p>
                                    </div>
                                </div>
                                <div class="choose-item">
                                    <div class="choose-item-icon">
                                        <img src="assets/img/icon/location.svg" alt="">
                                    </div>
                                    <div class="choose-item-info">
                                        <h4>Massive Locations</h4>
                                        <p>There are many variations of the passages available suffered.</p>
                                    </div>
                                </div>
                                <div class="choose-item">
                                    <div class="choose-item-icon">
                                        <img src="assets/img/icon/idea.svg" alt="">
                                    </div>
                                    <div class="choose-item-info">
                                        <h4>Implement Your Idea</h4>
                                        <p>There are many variations of the passages available suffered.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- choose area end -->


        <!-- testimonial-area -->
        <div class="testimonial-area bg py-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                            <span class="site-title-tagline">Testimonials</span>
                            <h2 class="site-title">What Our <span>Guest Say's</span> <br> About Us</h2>
                            <div class="site-shadow-text">Testimonials</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slider owl-carousel owl-theme wow fadeInUp" data-wow-delay=".25s">
                    <div class="testimonial-single">
                        <div class="testimonial-quote">
                            <div class="testimonial-rate">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p>
                                There are many variations of passage available the majority have
                                suffered to alteration in some form making it look like readable by injected humour.
                            </p>
                            <div class="testimonial-quote-icon">
                                <img src="assets/img/icon/quote.svg" alt="">
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="assets/img/testimonial/01.jpg" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Anderson Dele</h4>
                                <p>Our Guest</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-single">
                        <div class="testimonial-quote">
                            <div class="testimonial-rate">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p>
                                There are many variations of passage available the majority have
                                suffered to alteration in some form making it look like readable by injected humour.
                            </p>
                            <div class="testimonial-quote-icon">
                                <img src="assets/img/icon/quote.svg" alt="">
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="assets/img/testimonial/02.jpg" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Gordon Novak</h4>
                                <p>Our Guest</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-single">
                        <div class="testimonial-quote">
                            <div class="testimonial-rate">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p>
                                There are many variations of passage available the majority have
                                suffered to alteration in some form making it look like readable by injected humour.
                            </p>
                            <div class="testimonial-quote-icon">
                                <img src="assets/img/icon/quote.svg" alt="">
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="assets/img/testimonial/03.jpg" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Lucille Rucker</h4>
                                <p>Our Guest</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-single">
                        <div class="testimonial-quote">
                            <div class="testimonial-rate">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p>
                                There are many variations of passage available the majority have
                                suffered to alteration in some form making it look like readable by injected humour.
                            </p>
                            <div class="testimonial-quote-icon">
                                <img src="assets/img/icon/quote.svg" alt="">
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="assets/img/testimonial/04.jpg" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Elizabeth Galvan</h4>
                                <p>Our Guest</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial-area end -->


        <!-- gallery-area -->
        <div class="gallery-area py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                            <span class="site-title-tagline">Gallery</span>
                            <h2 class="site-title">Let's Check Our Photo <br> <span>Gallery</span></h2>
                            <div class="site-shadow-text wow fadeInRight" data-wow-delay=".35s">Our Gallery</div>
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


        <!-- partner area -->
        <div class="partner-area partner-bg py-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                            <span class="site-title-tagline">Sponsors</span>
                            <h2 class="site-title">Let's Check Our <span>Sponsors</span></h2>
                        </div>
                    </div>
                </div>
                <div class="partner-wrapper wow fadeInUp" data-wow-delay=".25s">
                    <div class="row g-5 justify-content-center">
                        <div class="col-6 col-md-2">
                            <img src="assets/img/partner/01.png" alt="thumb">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="assets/img/partner/02.png" alt="thumb">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="assets/img/partner/03.png" alt="thumb">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="assets/img/partner/04.png" alt="thumb">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="assets/img/partner/05.png" alt="thumb">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="assets/img/partner/06.png" alt="thumb">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="assets/img/partner/07.png" alt="thumb">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="assets/img/partner/08.png" alt="thumb">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="assets/img/partner/09.png" alt="thumb">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="assets/img/partner/10.png" alt="thumb">
                        </div>
                    </div>
                </div>
                <div class="text-center mt-40 wow fadeInUp" data-wow-delay=".25s">
                    <a href="#" class="theme-btn"><span class="fal fa-users"></span> Become Sponsors</a>
                </div>
            </div>
        </div>
        <!-- partner area end -->


        <!-- venue area -->
        <div class="venue-area py-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                            <span class="site-title-tagline">Venues</span>
                            <h2 class="site-title">Explore Our <span>Venues</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5 wow fadeInUp" data-wow-delay=".25s">
                    <div class="col-md-6 col-lg-4">
                        <div class="venue-item">
                            <div class="venue-img">
                                <img src="assets/img/venue/01.jpg" alt="">
                            </div>
                            <div class="venue-content">
                                <span>Venue 01</span>
                                <h6>Marine City Michigan</h6>
                                <p>New York, USA</p>
                                <div class="venue-play">
                                    <a class="popup-youtube" href="https://www.youtube.com/watch?v=ckHzmP1evNU">
                                        <span>Virtual Tour</span>
                                        <i class="fas fa-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="venue-item">
                            <div class="venue-img">
                                <img src="assets/img/venue/02.jpg" alt="">
                            </div>
                            <div class="venue-content">
                                <span>Venue 02</span>
                                <h6>Kansas City Omaha</h6>
                                <p>New York, USA</p>
                                <div class="venue-play">
                                    <a class="popup-youtube" href="https://www.youtube.com/watch?v=ckHzmP1evNU">
                                        <span>Virtual Tour</span>
                                        <i class="fas fa-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="venue-item">
                            <div class="venue-img">
                                <img src="assets/img/venue/03.jpg" alt="">
                            </div>
                            <div class="venue-content">
                                <span>Venue 03</span>
                                <h6>New Hampshire City</h6>
                                <p>New York, USA</p>
                                <div class="venue-play">
                                    <a class="popup-youtube" href="https://www.youtube.com/watch?v=ckHzmP1evNU">
                                        <span>Virtual Tour</span>
                                        <i class="fas fa-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- venue area end -->


        <!-- register-area -->
        <div class="quote-area mt-80 pb-80">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-7 ms-auto">
                        <div class="quote-content wow fadeInUp" data-wow-delay=".25s">
                            <div class="quote-head">
                                <h3>Register Now</h3>
                                <p>It is a long established fact that a reader will be distracted by the
                                    readable content of majority have suffered alteration page when looking at its layout.</p>
                            </div>
                            <div class="quote-form">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="far fa-user-tie"></i></span>
                                                <input type="text" class="form-control" placeholder="Your Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                                <input type="email" class="form-control" placeholder="Your Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="far fa-phone"></i></span>
                                                <input type="text" class="form-control" placeholder="Your Phone">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="far fa-box"></i></span>
                                                <select class="select form-select form-control">
                                                    <option value="">Choose Plan</option>
                                                    <option value="1">Plan One</option>
                                                    <option value="2">Plan Two</option>
                                                    <option value="3">Plan Three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-group textarea">
                                                <span class="input-group-text"><i class="far fa-comment-lines"></i></span>
                                                <textarea class="form-control" cols="30" rows="4"
                                                    placeholder="Your Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="theme-btn">Register Now<i class="fas fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- register-area end -->


        <!-- blog-area -->
        <div class="blog-area py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                            <span class="site-title-tagline">Our Blog</span>
                            <h2 class="site-title">Let's Check Our Latest <br> <span>News & Blog</span></h2>
                            <div class="site-shadow-text wow fadeInRight" data-wow-delay=".35s">Our Blog</div>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                            <span class="blog-date">20 May</span>
                            <div class="blog-item-img">
                                <img src="assets/img/blog/01.jpg" alt="Thumb">
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 1.50k Comments</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="#">There are many variations of passages orem available</a>
                                </h4>
                                <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInDown" data-wow-delay=".25s">
                            <span class="blog-date">25 May</span>
                            <div class="blog-item-img">
                                <img src="assets/img/blog/02.jpg" alt="Thumb">
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 1.25k Comments</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="#">All the generators on tend to repeat chunks</a>
                                </h4>
                                <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                            <span class="blog-date">30 May</span>
                            <div class="blog-item-img">
                                <img src="assets/img/blog/03.jpg" alt="Thumb">
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 1.78k Comments</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="#">It long established fact read will readable content</a>
                                </h4>
                                <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog-area end -->


        <!-- instagram -->
        <div class="instagram-area mb-120 wow fadeInUp" data-wow-delay=".25s">
            <div class="container">
                <a href="#" class="theme-btn mt-3"><span class="fab fa-instagram"></span> Follow Us</a>
                <div class="row g-4">
                    <div class="col-6 col-lg-2">
                        <div class="instagram-img">
                            <img src="assets/img/instagram/01.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <div class="instagram-img">
                            <img src="assets/img/instagram/02.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <div class="instagram-img">
                            <img src="assets/img/instagram/03.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <div class="instagram-img">
                            <img src="assets/img/instagram/04.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <div class="instagram-img">
                            <img src="assets/img/instagram/05.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <div class="instagram-img">
                            <img src="assets/img/instagram/06.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- instagram end -->

    </main>


    <!-- footer area -->
    <footer class="footer-area">
        <div class="footer-shape">
            <img src="assets/img/shape/01.png" alt="">
        </div>
        <div class="footer-widget">
            <div class="container">
                <div class="row footer-widget-wrapper pt-100 pb-70">
                    <div class="col-md-6 col-lg-5">
                        <div class="footer-widget-box about-us">
                            <a href="#" class="footer-logo">
                                <img src="assets/img/logo/logo-light.png" alt="">
                            </a>
                            <p class="mb-3">
                                We are many variations of passages available majority have suffered
                                in some injected content of a page when looking at its layout humour words believable.
                            </p>
                            <div class="footer-newsletter">
                                <p>Subscribe Our Newsletter</p>
                                <div class="subscribe-form">
                                    <form action="#">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email">
                                            <button class="theme-btn" type="submit">
                                                <span class="far fa-paper-plane"></span> Subscribe
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Quick Links</h4>
                            <ul class="footer-list">
                                <li><a href="about.html"><i class="fas fa-caret-right"></i> About Us</a></li>
                                <li><a href="blog.html"><i class="fas fa-caret-right"></i> Update News</a></li>
                                <li><a href="contact.html"><i class="fas fa-caret-right"></i> Contact Us</a></li>
                                <li><a href="testimonial.html"><i class="fas fa-caret-right"></i> Testimonials</a></li>
                                <li><a href="terms.html"><i class="fas fa-caret-right"></i> Terms Of Service</a></li>
                                <li><a href="privacy.html"><i class="fas fa-caret-right"></i> Privacy policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Our Social</h4>
                            <ul class="footer-list social">
                                <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                                <li><a href="#"><i class="fab fa-x-twitter"></i> Twitter</a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i> Youtube</a></li>
                                <li><a href="#"><i class="fab fa-whatsapp"></i> Whatsapp</a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i> Linkedin</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Get In Touch</h4>
                            <ul class="footer-contact">
                                <li><a href="tel:+21236547898"><i class="far fa-phone"></i>+2 123 654 7898</a></li>
                                <li><i class="far fa-map-marker-alt"></i>25/B Milford Road, New York</li>
                                <li><a href="mailto:info@example.com"><i
                                            class="far fa-envelope"></i>info@example.com</a></li>
                            </ul>
                            <div class="footer-request">
                                <p>Book Your Ticket</p>
                                <a href="#" class="theme-btn">Buy Ticket<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p class="copyright-text">
                            &copy; Copyright <span id="date"></span> <a href="#"> Eventu </a> All Rights Reserved.
                        </p>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <ul class="footer-menu">
                            <li><a href="contact.html">Support</a></li>
                            <li><a href="terms.html">Terms Of Services</a></li>
                            <li><a href="privacy.html">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->


    <!-- scroll-top -->
    <a href="#" id="scroll-top"><i class="far fa-arrow-up"></i></a>
    <!-- scroll-top end -->


    <!-- js -->
    <?php include('assets/inc/gbl_js.inc.php'); ?>

</body>

</html>