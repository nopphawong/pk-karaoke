<!-- header area -->
<header class="header">
    <!-- header top -->
    <div class="header-top">
        <div class="container">
            <div class="header-top-wrap">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="header-top-left">
                            <div class="header-top-contact">
                                <ul>
                                    <li><a href="#"><i class="far fa-location-dot"></i>
                                            P.K. คาราโอเกะ บิ๊กซี สายไหม ห้อง AA41 - AA42 90/30 ถนนสายไหม แขวงสายไหม เขตสายไหม กรุงเทพฯ 10220</a></li>
                                    <li><a href="mailto:pk.office18@gmail.com"><i class="far fa-envelopes"></i>
                                            pk.office18@gmail.com</a></li>
                                    <li><a href="tel:+66868402497"><i class="far fa-phone-volume"></i> 086-840-2497</a>
                                    </li>
                                    <li><a href="tel:+66909699524"><i class="far fa-phone-volume"></i> 090-969-9524</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="header-top-right">
                            <!-- <div class="header-top-lang">
                                <div class="dropdown">
                                    <a href="#" class="top-lang dropdown-toggle" data-bs-toggle="dropdown"><i
                                            class="fal fa-globe"></i> Language</a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">English</a></li>
                                        <li><a class="dropdown-item" href="#">German</a></li>
                                        <li><a class="dropdown-item" href="#">Russian</a></li>
                                        <li><a class="dropdown-item" href="#">Spanish</a></li>
                                    </ul>
                                </div>
                            </div> -->
                            <div class="header-top-social">
                                <span>Follow Us:</span>
                                <a href="https://www.facebook.com/pkkaraoke.th/" target="_blank" rel="nofollow"><i class="fab fa-facebook"></i></a>
                                <a href="https://line.me/ti/p/~pk-karaoke" target="_blank" rel="noreferrer"><i class="fab fa-line"></i></a>
                                <a href="https://www.youtube.com/channel/UC84BZVBYKZ-FTWge91ByUCA/" target="_blank" rel="nofollow"><i class="fab fa-youtube"></i></a>
                                <a href="<?= $config['BASE_URL_MAIN'] . 'sitemap.html'; ?>" target="_blank" rel="nofollow"><i class="fa-solid fa-sitemap"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navigation">
        <nav class="navbar navbar-expand-lg">
            <div class="container position-relative">
                <a href="<?= $config['BASE_URL']; ?>" class="navbar-brand">
                    <img src="<?= $config['BASE_URL'] . 'assets/img/logo.png?v=' . date('Ymd'); ?>" alt="<?= $config['SITE_NAME']; ?>">
                </a>
                <div class="mobile-menu-right">
                    <div class="search-btn">
                        <button type="button" class="nav-right-link search-box-outer"><i
                                class="far fa-search"></i></button>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-mobile-icon"><i class="far fa-bars"></i></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link <?= (($_GET['act'] == 'service') && ($_GET['view'] == $getAllProduct['content_id'])) ? 'active' : ''; ?>" href="<?= $config['BASE_URL'] . 'บริการให้เช่า/43/เช่าชุดคาราโอเกะ'; ?>">เช่าคาราโอเกะ</a></li>
                        <li class="nav-item"><a class="nav-link <?= ($_GET['act'] == 'product') ? 'active' : ''; ?>" href="<?= $config['BASE_URL'] . 'สินค้า/'; ?>">สินค้า</a></li>
                        <li class="nav-item"><a class="nav-link <?= ($_GET['act'] == 'copyright') ? 'active' : ''; ?>" href="<?= $config['BASE_URL'] . 'ลิขสิทธิ์เพลง/'; ?>">ลิขสิทธิ์เพลง</a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link <?= ($_GET['act'] == 'license') ? 'active' : ''; ?> dropdown-toggle" href="#" data-bs-toggle="dropdown">ใบอนุญาต</a>
                            <ul class="dropdown-menu fade-down" style="width: 300px;">
                                <?php
                                $getContent  = $db->queryResult("   SELECT c.content_id
                                                                                            , c.content_profile
                                                                                            , l.content_name as name
                                                                                            , l.content_detail as detail
                                                                                        FROM " . $tbl . "_content c
                                                                                        LEFT JOIN " . $tbl . "_content_" . $_SESSION['LANG'] . " l ON c.content_id = l.ref_content_id
                                                                                        WHERE c.content_status = '1' 
                                                                                        AND c.content_type IN(2)
                                                                                        ORDER BY l.content_name ASC
                                                                                    ");
                                while ($getAllProduct = $getContent->fetch()) {
                                ?>
                                    <li><a class="dropdown-item <?= (($_GET['act'] == 'license') && ($_GET['view'] == $getAllProduct['content_id'])) ? 'active' : ''; ?>" href="<?= $config['BASE_URL'] . 'ใบอนุญาตคาราโอเกะ/' . $getAllProduct['content_id'] . '/' . seoUrl($getAllProduct['name']); ?>"><?= $getAllProduct['name']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>

                        <li class="nav-item"><a class="nav-link <?= ($_GET['act'] == 'hit') ? 'active' : ''; ?>" href="<?= $config['BASE_URL'] . 'เพลงฮิต/'; ?>">เพลงฮิต</a></li>

                        <li class="nav-item"><a class="nav-link <?= ($_GET['act'] == 'news') ? 'active' : ''; ?>" href="<?= $config['BASE_URL'] . 'ประชาสัมพันธ์/'; ?>">ประชาสัมพันธ์</a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link <?= ($_GET['act'] == 'license') ? 'active' : ''; ?> dropdown-toggle" href="#" data-bs-toggle="dropdown">เกี่ยวกับเรา</a>
                            <ul class="dropdown-menu fade-down" style="width: 300px;">
                                <?php
                                $getContent  = $db->queryResult("   SELECT c.content_id
                                                                                            , c.content_profile
                                                                                            , l.content_name as name
                                                                                            , l.content_detail as detail
                                                                                        FROM " . $tbl . "_content c
                                                                                        LEFT JOIN " . $tbl . "_content_" . $_SESSION['LANG'] . " l ON c.content_id = l.ref_content_id
                                                                                        WHERE c.content_status = '1' 
                                                                                        AND c.content_type IN(3)
                                                                                        ORDER BY c.content_id ASC
                                                                                    ");
                                while ($getAllProduct = $getContent->fetch()) {
                                ?>
                                    <li><a class="dropdown-item <?= (($_GET['act'] == 'about') && ($_GET['view'] == $getAllProduct['content_id'])) ? 'active' : ''; ?>" href="<?= $config['BASE_URL'] . 'เกี่ยวกับเรา/' . $getAllProduct['content_id'] . '/' . seoUrl($getAllProduct['name']); ?>"><?= $getAllProduct['name']; ?></a></li>
                                <?php } ?>
                                <li><a class="dropdown-item <?= ($_GET['act'] == 'contact') ? 'active' : ''; ?>" href="<?= $config['BASE_URL'] . 'ติดต่อเรา/'; ?>">ติดต่อเรา</a></li>
                            </ul>
                        </li>


                    </ul>
                    <div class="nav-right">
                        <div class="search-btn">
                            <button type="button" class="nav-right-link search-box-outer"><i
                                    class="far fa-search"></i></button>
                        </div>
                        <div class="sidebar-btn">
                            <button type="button" class="nav-right-link"><i class="far fa-bars-sort"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- header area end -->