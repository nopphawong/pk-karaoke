<?PHP
	require('assets/config/system.config.php');
	require('assets/class/mysqli.class.php');
	require('assets/inc/connection.inc.php');
    require('assets/inc/function.inc.php');

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name       = $db->escapeString(clean($_POST['name']));
        $name       = str_replace(array("\r","\n"),array(" "," "),$name);
        $tel        = $db->escapeString(cleanTel($_POST['tel']));
        $email      = $db->escapeString(clean($_POST['email']));
        $email      = filter_var($email , FILTER_SANITIZE_EMAIL);
        $subject    = 'Member Contact';
        $message    = $db->escapeString(clean(nl2br($_POST['message'])));
        $captcha    = $db->escapeString(clean($_POST['captcha']));
        $to         = "arm_worawit@hotmail.com";
        $from       = "arm_worawit@hotmail.com"; 

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "กรุณากรอกข้อมูลให้ครบถ้วนค่ะ!!";
            exit;
        } else if( empty($captcha) || ( strtolower($captcha) != strtolower($_SESSION['captcha'])) ) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "กรุณากรอกอักขระให้ถูกต้องค่ะ!!";
            exit;
        } else {
            $_SESSION['captcha']    = '';
            $db->query("	INSERT INTO ".$tbl."_contact (
                                contact_name 
                                , contact_email 
                                , contact_tel 
                                , contact_subject 
                                , contact_detail 
                                , contact_to 
                                , contact_time 
                                , contact_ip 
                            )
                            VALUES (
                                '$name'
                                , '$email'
                                , '$tel'
                                , '$subject'
                                , '$message'
                                , '$to'
                                , NOW()
                                , '$_SERVER[REMOTE_ADDR]'
                            )
                        ");

            // Set the recipient email address.
            // FIXME: Update this to your desired email address.
            $recipient = $to;

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From:'.$name .'<'.$email.'>' . "\r\n";
            //$headers .= 'Cc:'.$cc . "\r\n";

            $body_message = "<table border='0' cellpadding='2' cellspacing='2' width='600'>
                            <tr><td>Name: ".$name." </td></tr>
                            <tr><td>Tel: ".$tel."</td></tr>
                            <tr><td>Email: ".$email."</td></tr>
                            <tr><td>Subject: ".$subject."</td></tr>
                            <tr><td>Message:".$message."</td></tr>
                            </table>";
            if(mail($to,$subject,$body_message,$headers)){
                // Set a 200 (okay) response code.
                http_response_code(200);
                echo "เราได้รับข้อความจากคุณแล้ว และจะทำการติดต่อกลับโดยเร็ว ^_^";
            }else{
                // Set a 500 (internal server error) response code.
                http_response_code(500);
                echo "Oops! Something went wrong and we couldn't send your message.";
            }
        }
    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
