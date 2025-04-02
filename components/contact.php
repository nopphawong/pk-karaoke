<!-- contact-area -->
<div class="quote-area mt-80 pb-80">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-7 ms-auto">
                <div class="quote-content wow fadeInUp" data-wow-delay=".25s">
                    <div class="quote-head">
                        <h3>ติดต่อสอบถาม</h3>
                        <p>ศูนย์เช่าเครื่องคาราโอเกะครบวงจร เช่าเครื่องคาราโอเกะรายวัน เช่าเครื่องคาราโอเกะรายเดือน พร้อมลิขสิทธิ์เพลงทุกค่ายเพลง เช่าเครื่องเสียง ติดตั้งระบบคาราโอเกะ ขายเครื่องคาราโอเกะ</p>
                    </div>
                    <div class="quote-form">
                        <form id="contact-form" action="mail.php" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-user-tie"></i></span>
                                        <input type="text" name="name" class="form-control" placeholder="<?PHP echo $your_name; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-phone"></i></span>
                                        <input type="tel" name="tel" class="form-control" placeholder="<?PHP echo $tel; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                        <input type="email" name="email" class="form-control" placeholder="<?PHP echo $email; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-group textarea">
                                        <span class="input-group-text"><i class="far fa-comment-lines"></i></span>
                                        <textarea name="message" class="form-control" cols="30" rows="4"
                                            placeholder="<?PHP echo $your_message; ?>" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 captcha-img">
                                    <img src="assets/libary/captcha/captcha_img.php">
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-puzzle-piece"></i></span>
                                        <input type="text" name="captcha" class="form-control" placeholder="กรุณากรอกอักขระ" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="theme-btn"><?PHP echo $send_message; ?><i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact-area end -->