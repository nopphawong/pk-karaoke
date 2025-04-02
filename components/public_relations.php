<?php
$version = date('Ymd');
$cateID     = 5;
$getCate    = $db->queryAndFetch(
    "  SELECT * FROM  " . $tbl . "_content_category c
                                        LEFT JOIN " . $tbl . "_content_category_" . $_SESSION['LANG'] . " l ON c.cate_id = l.cate_id 
                                        WHERE c.cate_id = %n
                                        LIMIT 1 ",
    $cateID
);

$chkPage    = ! empty($_GET['page']) ? numberic($_GET['page']) : 1;
$nowPage    = ! empty($chkPage) ? $chkPage : 1;
?>
<!-- blog-area -->
<div class="blog-area py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                    <h2 class="site-title"><span><?= $getCate['cate_name']; ?></span></h2>
                    <div class="site-shadow-text wow fadeInRight" data-wow-delay=".35s"><?= $getCate['cate_name']; ?></div>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <?php
            $search = ! empty($_GET['key']) ? $db->escapeString(clean($_GET['key'])) : NULL;
            $query  = " SELECT c.content_id
                                            , c.content_profile
                                            , c.content_view
                                            , c.content_date
                                            , l.content_name as name
                                            , l.content_detail as detail
                                        FROM " . $tbl . "_content c
                                        LEFT JOIN " . $tbl . "_content_" . $_SESSION['LANG'] . " l ON c.content_id = l.ref_content_id
                                        WHERE c.content_status = '1' 
                                        AND c.content_type = $cateID ";
            $query  .= ! empty($search) ? " AND ( l.content_name LIKE '%$search%' OR l.content_detail LIKE '%$search%') " : "";
            $sql = $db->queryResult($query);
            $total_records = $sql->numRows;
            $scroll_page = 3;
            $per_page = 3;
            $current_page = $nowPage;
            $pager_url = $config['BASE_URL'] . $_SESSION['LANG'] . '/' . seoUrl($getCate['cate_name']) . '/' . seoUrl($txtPages) . '-';
            $inactive_page_tag = 'class="current"';
            $previous_page_text = '<';
            $next_page_text = '>';
            $first_page_text = '&laquo; First page';
            $last_page_text = 'Last page &raquo;';

            $kgPagerOBJ = new kgPager();
            $kgPagerOBJ->pager_set($pager_url, $total_records, $scroll_page, $per_page, $current_page, $inactive_page_tag, $previous_page_text, $next_page_text, $first_page_text, $last_page_text, $pager_url_last);
            $getContent = $db->queryResult($query . " ORDER BY c.content_date DESC, c.content_time DESC LIMIT " . $kgPagerOBJ->start . ", " . $kgPagerOBJ->per_page . "");
            $n = 0;
            while ($resultContent = $getContent->fetch()) {
                ++$n;
            ?>
                <div class="col-md-6 col-lg-4">
                    <?php if ($resultContent['content_profile'] != '') { ?>
                        <div class="blog-item wow fadeInUp pe-auto" data-wow-delay=".25s">
                            <!-- <span class="blog-date">20 May</span> -->
                            <div class="blog-item-img">
                                <a href="<?= $config['BASE_URL'] . $_SESSION['LANG'] . '/' . seoUrl($getCate['cate_name']) . '/' . $resultContent['content_id'] . '/' . seoUrl($resultContent['name']); ?>">
                                    <img src="<?= 'http://www.pk-karaoke.com/uploads/profiles/' . $resultContent['content_profile'] . '?v=' . date('ymd'); ?>" alt="<?= htmlspecialchars($resultContent['name']); ?>">
                                </a>
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="<?= $config['BASE_URL'] . $_SESSION['LANG'] . '/' . seoUrl($getCate['cate_name']) . '/' . $resultContent['content_id'] . '/' . seoUrl($resultContent['name']); ?>"><i class="fa-solid fa-headphones-simple"></i> <?= getDesc($resultContent['name'], 80); ?></a></li>
                                        <li><a href="#"><i class="fa-solid fa-eye"></i> <?= number_format($resultContent['content_view']); ?> views</a></li>
                                    </ul>
                                </div>
                                <h5 class="blog-title">
                                    <a href="<?= $config['BASE_URL'] . $_SESSION['LANG'] . '/' . seoUrl($getCate['cate_name']) . '/' . $resultContent['content_id'] . '/' . seoUrl($resultContent['name']); ?>"><?= getDesc($resultContent['detail'], 180); ?></a>
                                </h5>
                                <a class="theme-btn" href="<?= $config['BASE_URL'] . $_SESSION['LANG'] . '/' . seoUrl($getCate['cate_name']) . '/' . $resultContent['content_id'] . '/' . seoUrl($resultContent['name']); ?>">ดูเพิ่มเติม<i class="fas fa-arrow-right"></i></a>

                                <div class="text-end">
                                    <i class="fa fa-calendar color-main"></i> <?= date('j F, Y', strtotime($resultContent['content_date'])); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- blog-area end -->