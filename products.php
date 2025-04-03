<?php
require('assets/config/system.config.php');
require('assets/class/mysqli.class.php');
require('assets/inc/connection.inc.php');
require('assets/inc/function.inc.php');
require('assets/inc/lang.inc.php');
include('assets/lang/' . $_SESSION['LANG'] . '.lang.php');
require('assets/inc/kgPager.class.php');

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
                <h2 class="breadcrumb-title">จำหน่ายเครื่องคาราโอเกะ เครื่องเสียง</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= $config['BASE_URL_MAIN']; ?>"><?= $home; ?></a></li>
                    <li class="active">จำหน่ายเครื่องคาราโอเกะ เครื่องเสียง</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- team single -->
        <div class="team-single py-120">
            <div class="container d-flex flex-column gap-4">
                <?php
                $search = !empty($_GET['key']) ? $db->escapeString(clean($_GET['key'])) : NULL;

                $query  = " SELECT c.content_id
											, c.content_profile
											, l.content_name as name
											, l.content_detail as detail
										FROM " . $tbl . "_content c
										LEFT JOIN " . $tbl . "_content_" . $_SESSION['LANG'] . " l ON c.content_id = l.ref_content_id
										WHERE c.content_status = '1' 
										AND c.content_type = $cateID ";
                $query  .= ! empty($search) ? " AND ( l.content_name LIKE '%$search%' OR l.content_detail LIKE '%$search%') " : "";

                $sql = $db->queryResult($query);
                $total_records = $sql->numRows;
                $scroll_page = $total_records;
                $per_page = $total_records;
                $current_page = $_GET['page'];
                $pager_url = 'product_category.php?key=' . $search . '&page=';
                $inactive_page_tag = 'class="active"';
                $previous_page_text = '<i class="fa fa-angle-left"></i>';
                $next_page_text = '<i class="fa fa-angle-right"></i>';
                $first_page_text = '&laquo; First page';
                $last_page_text = 'Last page &raquo;';

                $kgPagerOBJ = new kgPager();
                $kgPagerOBJ->pager_set($pager_url, $total_records, $scroll_page, $per_page, $current_page, $inactive_page_tag, $previous_page_text, $next_page_text, $first_page_text, $last_page_text, $pager_url_last);
                $getContent = $db->queryResult($query . " ORDER BY c.content_id ASC LIMIT " . $kgPagerOBJ->start . ", " . $kgPagerOBJ->per_page . "");
                $n = 0;
                while ($resultContent = $getContent->fetch()) {
                    ++$n;
                ?>
                    <div class="team-single-content">
                        <div class="row g-4 align-items-center">
                            <div class="col-md-4">
                                <div class="team-single-img">
                                    <img src="<?= $config['BASE_URL'] . 'uploads/profiles/' . $resultContent['content_profile'] . '?v=' . $version; ?>" alt="<?= htmlspecialchars($resultContent['name']); ?>">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="team-details">
                                    <h3 class="name"><?= $resultContent['name']; ?></h3>
                                    <div class="team-details-info">
                                        <?= $resultContent['detail']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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