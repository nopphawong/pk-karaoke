<!-- footer area -->
<footer class="footer-area">
    <div class="footer-shape">
        <img src="assets/img/shape/01.png" alt="">
    </div>
    <div class="footer-widget">
        <div class="container">
            <div class="row footer-widget-wrapper pt-40 pb-30">
                <div class="col-md-6 col-lg-5">
                    <div class="footer-widget-box about-us">
                        <di class="footer-logo-bg">
                            <a href="<?= $config['BASE_URL_MAIN']; ?>" class="footer-logo">
                                <img src="<?= $config['BASE_URL_MAIN'] . 'assets/img/logo.png?v=' . date('Ymd'); ?>" alt="<?= $config['SITE_NAME']; ?>">
                            </a>
                        </di>

                        <p class="mb-3">
                            ด้วยประสบการณ์ที่ยาวนานกว่า 10 ปี ในวงการ เช่าเครื่องคาราโอเกะ พร้อมด้วยบุคลากรผู้เชี่ยวชาญ เรามั่นใจว่าเราสามารถสร้างความประทับใจในทุกความบันเทิงของลูกค้าได้ทุกรูปแบบ
                        </p>
                        <!-- <div class="footer-newsletter">
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
                        </div> -->
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Quick Links</h4>
                        <ul class="footer-list">
                            <li><a href="<?= $config['BASE_URL_MAIN'] .$_SESSION['LANG'] . '/บริการให้เช่า/43/เช่าชุดคาราโอเกะ'; ?>"><i class="fas fa-caret-right"></i> เช่าคาราโอเกะ</a></li>
                            <li><a href="<?= $config['BASE_URL_MAIN'] .$_SESSION['LANG'] . '/สินค้า/'; ?>"><i class="fas fa-caret-right"></i> สินค้า</a></li>
                            <li><a href="<?= $config['BASE_URL_MAIN'] .$_SESSION['LANG'] . '/ลิขสิทธิ์เพลง/'; ?>"><i class="fas fa-caret-right"></i> ลิขสิทธิ์เพลง</a></li>
                            <li><a href="<?= $config['BASE_URL_MAIN'] .$_SESSION['LANG'] . '/เพลงฮิต/'; ?>"><i class="fas fa-caret-right"></i> เพลงฮิต</a></li>
                            <li><a href="<?= $config['BASE_URL_MAIN'] .$_SESSION['LANG'] . '/ประชาสัมพันธ์/'; ?>"><i class="fas fa-caret-right"></i> ประชาสัมพันธ์</a></li>
                            <li><a href="<?= $config['BASE_URL_MAIN'] .$_SESSION['LANG'] . '/ติดต่อเรา/'; ?>"><i class="fas fa-caret-right"></i> ติดต่อเรา</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Our Social</h4>
                        <ul class="footer-list social">
                            <li><a href="https://www.facebook.com/pkkaraoke.th/" target="_blank" rel="nofollow"><i class="fab fa-facebook"></i> Facebook</a></li>
                            <li><a href="https://line.me/ti/p/~pk-karaoke" target="_blank" rel="noreferrer"><i class="fab fa-line"></i> Line</a></li>
                            <li><a href="https://www.youtube.com/channel/UC84BZVBYKZ-FTWge91ByUCA/" target="_blank" rel="nofollow"><i class="fab fa-youtube"></i> Youtube</a></li>
                            <li><a href="<?= $config['BASE_URL'] . 'sitemap.html'; ?>" target="_blank" rel="nofollow"><i class="fa-solid fa-sitemap"></i> Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Get In Touch</h4>
                        <ul class="footer-contact">
                            <li><a href="tel:+66868402497"><i class="far fa-phone"></i>086-840-2497</a></li>
                            <li><a href="tel:+66909699524"><i class="far fa-phone"></i>090-969-9524</a></li>
                            <li><a href="mailto:pk.office18@gmail.com"><i class="far fa-envelope"></i>pk.office18@gmail.com</a></li>
                            <li>P.K. คาราโอเกะ บิ๊กซี สายไหม ห้อง AA41 - AA42 90/30 ถนนสายไหม แขวงสายไหม เขตสายไหม กรุงเทพฯ 10220</li>

                        </ul>
                        <!-- <div class="footer-request">
                            <p>Book Your Ticket</p>
                            <a href="#" class="theme-btn">Buy Ticket<i class="fas fa-arrow-right"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-12 align-self-center">
                    <p class="copyright-text text-center">
                        &copy; Copyright <span id="date"></span> <a href="<?= $config['BASE_URL']; ?>"> PK Karaoke </a> All Rights Reserved.
                    </p>
                </div>
                <!-- <div class="col-md-6 align-self-center">
                    <ul class="footer-menu">
                        <li><a href="contact.html">Support</a></li>
                        <li><a href="terms.html">Terms Of Services</a></li>
                        <li><a href="privacy.html">Privacy Policy</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
    attribution=setup_tool
    page_id="246475539026250"
    logged_in_greeting="PK KARAOKE จำหน่ายและให้เช่าเครื่องคาราโอเกะ ถามเราสิ"
    logged_out_greeting="PK KARAOKE จำหน่ายและให้เช่าเครื่องคาราโอเกะ ถามเราสิ">
</div>

<?PHP /* ?>
    <!-- WhatsHelp.io widget -->
    <script type="text/javascript">
        (function () {
            var options = {
                facebook: "246475539026250", // Facebook page ID
                line: "//line.me/ti/p/~pk-karaoke", // Line QR code URL
                call: "0868402497", // Call phone number
                email: "pk.office18@gmail.com", // Email
                call_to_action: "สอบถามเช่าเครื่องคาราโอเกะ", // Call to action
                button_color: "#FF6550", // Color of button
                position: "right", // Position may be 'right' or 'left'
                order: "facebook,line,call,email", // Order of buttons
            };
            var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
    <!-- /WhatsHelp.io widget -->
    <?PHP */ ?>