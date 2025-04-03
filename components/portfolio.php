<?php
$getCatePort = $db->queryAndFetch(" SELECT * FROM " . $tbl . "_content_category_" . $_SESSION['LANG'] . " cc 
                                        JOIN " . $tbl . "_content_category c ON cc.cate_id = c.cate_id
                                        WHERE cc.cate_id = 6 
                                    ");
?>

<!-- portfolio area -->
<div class="team-area py-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                    <span class="site-title-tagline">จากประสบการณ์กว่า 10 ปี เรามีลูกค้าที่เลือกใช้บริการกับเรามากมาย</span>
                    <h2 class="site-title">ผลงานของเรา</h2>
                    <div class="site-shadow-text">ผลงานของเรา</div>
                </div>
            </div>
        </div>
        <div class="row g-4 wow fadeInUp" data-wow-delay=".25s">
            <?php
            $sqlPort    = " SELECT 
                                            l.content_name
                                            , c.content_profile
                                            , c.content_id
                                            , c.content_date
                                        FROM  " . $tbl . "_content c 
                                        LEFT JOIN " . $tbl . "_content_" . $_SESSION['LANG'] . " l ON c.content_id = l.ref_content_id
                                        WHERE c.content_status = '1' 
                                        AND c.content_type = 6
                                        ORDER BY c.content_date DESC, c.content_time DESC ";
            $getPort    = $db->queryResult($sqlPort);
            while ($resultPort  = $getPort->fetch()) {
            ?>
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="<?= $config['BASE_URL'] . 'uploads/profiles/' . $resultPort['content_profile'] . '?v=' . date('ymd'); ?>" alt="<?= htmlspecialchars($resultPort['content_name']); ?>">
                        </div>
                        <div class="team-content">
                            <div class="info">
                                <h4><a href="#"><?= $resultPort['content_name']; ?></a></h4>
                                <span><?= date('j F, Y', strtotime($resultPort['content_date'])); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- portfolio area end -->