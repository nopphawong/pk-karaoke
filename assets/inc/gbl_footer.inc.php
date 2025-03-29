    
            <!-- contact area start -->
            <div class="total-registration ptb-80" id="register">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="section-title text-center mb-30">
                                <h2 class="text-uppercase color-black fz-35 mb-25 brl-2 ptb-10"><i class="fa fa-phone"></i> โทรหาเราสิ</h2>
                                <h3 class="fz-30 mb-25 color-blue"><a href="tel:+66968402497">096-840-2497</a></h3>
                                <h3 class="fz-30 mb-25 color-blue"><a href="tel:+66909699524">090-969-9524</a></h3>
                                <p><a href="https://line.me/ti/p/~pk-karaoke" target="_blank"><img height="36" border="0" src="https://scdn.line-apps.com/n/line_add_friends/btn/th.png"></a></p>
                                <h4 class="fz-24 mb-25">pk.office18@gmail.com</h4>
                                P.K. คาราโอเกะ บิ๊กซี สายไหม ห้อง AA41 - AA42 90/30 ถนนสายไหม แขวงสายไหม เขตสายไหม กรุงเทพฯ 10220
                            </div>
                        </div>
                        <div class="col-md-6">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3872.6120094188486!2d100.66456061385429!3d13.922124297076898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d7d98a702e1b5%3A0x331c061b8438c6c4!2z4Lia4Li04LmK4LiB4LiL4Li1IOC4oeC4suC4o-C5jOC5gOC4geC5h-C4lSDguKrguLLguKLguYTguKvguKE!5e0!3m2!1sth!2sth!4v1543071359171" width="100%" height="450" frameborder="0" style="border:0; width:100%" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!-- contact area end -->

            <!-- footer area start -->
            <footer class="footer-area ptb-30 bg-black">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="footer-copyright text-center">
                                <p class="fz-13 color-white mb-0">Copyright 2012 &copy; <a href="<?PHP echo $config['BASE_URL_MAIN']; ?>" class="color-white color-hover-main ls-1"><?PHP echo $config['SITE_NAME']; ?></a> ALL Right Reserved</p>
                                <p>
                                    <a href="https://www.facebook.com/pkkaraoke.th/" target="_blank" rel="nofollow" title="Facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="https://www.youtube.com/channel/UC84BZVBYKZ-FTWge91ByUCA/" target="_blank" rel="nofollow" title="Youtube"><i class="fa fa-youtube"></i></a>
                                    <a href="<?PHP echo $config['BASE_URL_MAIN'].'sitemap.html'; ?>" target="_blank" title="Sitemap"><i class="fa fa-sitemap"></i></a>
                                    <a href="<?PHP echo $config['BASE_URL_MAIN'].'rss-feed/'; ?>" target="_blank" title="Feed"><i class="fa fa-rss"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer area end -->
    
    <!-- Load Facebook SDK for JavaScript -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

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
            