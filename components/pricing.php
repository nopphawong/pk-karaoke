<?php
require('assets/inc/kgPager.class.php');

#----Get Data----#
$cateID     = '10';
$cateID     = ! empty($cateID) ? $cateID : 1;
$getCate    = $db->queryAndFetch(
    "  SELECT * FROM  " . $tbl . "_content_category c
                                        LEFT JOIN " . $tbl . "_content_category_" . $_SESSION['LANG'] . " l ON c.cate_id = l.cate_id 
                                        WHERE c.cate_id = %n
                                        LIMIT 1 ",
    $cateID
);

?>

<!-- pricing area -->
<div class="pricing-area bg pt-70 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                    <span class="site-title-tagline">สินค้าของเรา</span>
                    <h2 class="site-title">จำหน่าย <span>เครื่องคาราโอเกะ</span> เครื่องเสียง</h2>
                </div>
            </div>
        </div>
        <div class="row g-5">
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
            $pager_url = 'product_category.<?php?key=' . $search . '&page=';
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
                <div class="col-md-6 col-lg-4">
                    <div class="pricing-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="pricing-shape">
                            <img src="<?= $config['BASE_URL']; ?>assets/img/shape/06.jpg?v=<?= $version ?>" alt="">
                        </div>
                        <div class="pricing-header">
                            <h5><?= $resultContent['name']; ?></h5>
                        </div>
                        <div class="pricing-amount">
                            <strong>$80.00</strong>
                        </div>
                        <div class="pricing-feature">
                            <ul>
                                <li><i class="fas fa-check-circle"></i>Full event access</li>
                                <li><i class="fas fa-check-circle"></i>Exclusive Q & A sessions</li>
                                <li><i class="fas fa-check-circle"></i>Reserved seating for your comfort</li>
                                <li><i class="fas fa-check-circle"></i>Ask question privately</li>
                                <li><i class="fas fa-check-circle"></i>Tea and Cofee Break</li>
                            </ul>
                        </div>
                        <div class="pricing-btn-wrap">
                            <a href="#" class="theme-btn">Purchase Now <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- pricing area end -->