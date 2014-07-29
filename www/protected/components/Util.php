<?php

Class Util {

    const DefaultUser = 5;
    const Active = 1;
    const DeActive = 0;
    const Admin = 3;
    const User = 4;

    /** kiểm tra địa chỉ mail
     * return true if valid mail,echo message if fail
     * @param type $email
     */
    public static function IsEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            echo "0Email không hợp lệ!";
            exit();
        }
    }

    /**
     * Check kiểu dữ liệu có phải là số
     * @param type $number
     * @param type $column_name
     * @return boolean
     */
    public static function IsNumber($number, $column_name) {
        if (ctype_digit($number) || $number == "") {
            return true;
        } else {
            echo " 0$column_name phải có giá trị là số ";
            exit();
        }
    }

    /**
     * check mảng các trường bắt buộc nhập dữ liệu
     * @param type $array
     */
    public static function CheckMustInput($array) {
        foreach ($array as $key => $value) {
            if (is_null($value) || $value == "") {
                $message1 = $key . " Là trường bắt buộc nhập";
                $array_message = "0" . $message1;
                echo $array_message;
                exit();
            } else {
                
            }
        }
    }

    /**
     * Thông báo lỗi ajax
     * @param type $flag 0:báo lỗi 1:báo thành công
     * @param type $message: nội dung thông báo
     */
    public static function showMessageError($flag, $message) {
        $array_message = $flag . $message;
        echo $array_message;
        exit();
    }

    /**
     * Send email using phpmailer
     * @param type $to_email
     * @param type $subject
     * @param type $content
     */
    public static function sendEmail($to_email, $subject, $content) {
        $mail = new PHPMailer();
        $mail->IsSMTP();                                      // Set mailer to use SMTP
       // $mail->Host = 'smtpout.secureserver.net';  // Specify main and backup server
        $mail->Host = 'smtpout.secureserver.net';  // Specify main and backup server
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'admin@cuoicaibeep.com';                            // SMTP username
        $mail->Password = 'long@123';                           // SMTP password
        //$mail->SMTPSecure = 'http';
        $mail->SMTPSecure = 'http';
        $mail->Port = 80; // Enable encryption, 'ssl' also accepted
        //$mail->Port = 3535; // Enable encryption, 'ssl' also accepted
        $mail->SMTPDebug = 1;
        $mail->From = 'admin@cuoicaibeep.com';
        $mail->FromName = 'Admin';
        $mail->AddAddress($to_email);  // Add a recipient
        $mail->CharSet="utf-8";
//        $mail->AddAddress('ellen@example.com');               // Name is optional
//        $mail->AddReplyTo('info@example.com', 'Information');
//        $mail->AddCC('cc@example.com');
//        $mail->AddBCC('bcc@example.com');

        $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//        $mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
//        $mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->IsHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body = $content;
//        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->Send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            exit;
        } else {
        echo 'Message has been sent';
        }
    }

    public static function sendEmailGmail($to_email, $subject, $content) {
        $mail = new PHPMailer;
        $mail->IsSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup server
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
//        $mail->Username = 'thanhlong29689@gmail.com';                            // SMTP username
        $mail->Username = 'testsonha@gmail.com';                            // SMTP username
//        $mail->Password = 'long296@';                           // SMTP password
        $mail->Password = '1597532486';                           // SMTP password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465; // Enable encryption, 'ssl' also accepted
        $mail->SMTPDebug = 1;
//        $mail->From = 'thanhlong29689@gmail.com';
        $mail->From = 'testsonha@gmail.com';
        $mail->FromName = 'SonHA';
        $mail->AddAddress($to_email);  // Add a recipient
//        $mail->AddAddress('ellen@example.com');               // Name is optional
//        $mail->AddReplyTo('info@example.com', 'Information');
//        $mail->AddCC('cc@example.com');
//        $mail->AddBCC('bcc@example.com');

        $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//        $mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
//        $mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->IsHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body = $content;
//        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->Send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            exit;
        } else {
            echo 'Message has been sent';
        }
    }

    /**
     * Hiển thị 50 kí tự trên table cho nội dung dài
     * @param type $text
     * @return type
     */
    public static function showLongText($text, $long) {
        return substr($text, 0, $long);
    }

    /**
     * hiển thị trên giao diện dạng chữ active và deactive
     * @param type $number
     * @return string
     */
    public static function showActiveName($number) {
        switch ($number) {
            case "1":
                return "active";
                break;
            default:
                return "deactive";
                break;
        }
    }

    /**
     * Hiển thị tên vai trò trên view, chỉ liên quan đến phân quyền
     * @param type $number
     * @return string
     */
    public static function showRoleName($number) {
        switch ($number) {
            case "3":
                return "admin";
                break;
            case "4":
                return "User";
                break;
            default:
                return "other";
                break;
        }
    }
    public static function showStatusServer($number) {
        switch ($number) {
            case "1":
                return "Tốt";
                break;
            case "2":
                return "Sắp đầy";
                break;
            case "3":
                return "Đầy";
                break;
            case "4":
                return "Mới";
                break;
            default:
                return "other";
                break;
        }
    }

    /**
     * lấy session nếu session chưa được gán thì trả về rỗng
     * @param type $key
     * @return string
     */
    public static function getSession($key) {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION[$key])) {
            $_SESSION[$key] = $_SESSION[$key];
        } else {
            $_SESSION[$key] = "";
        }
        return $_SESSION[$key];
    }

    public static function setSession($key,$value){
       if (!isset($_SESSION)) {
            session_start();
        } 
        $_SESSION[$key]=$value;
        return $_SESSION[$key];
    }
    public static function getDomain() {
        return $domain = Yii::app()->getBaseUrl(true);
        
    }

    public static function uploadImage($name_in_control, $flag) {
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["$name_in_control"]["name"]);
        $extension = end($temp);
//echo "0".$_FILES["$name_in_control"]["size"]/1024;exit;
        if ((($_FILES["$name_in_control"]["type"] == "image/gif") || ($_FILES["$name_in_control"]["type"] == "image/jpeg") || ($_FILES["$name_in_control"]["type"] == "image/jpg") || ($_FILES["$name_in_control"]["type"] == "image/pjpeg") || ($_FILES["$name_in_control"]["type"] == "image/x-png") || ($_FILES["$name_in_control"]["type"] == "image/png")) && ($_FILES["$name_in_control"]["size"] / 1024 < 2048) && in_array($extension, $allowedExts)) {
            if ($_FILES["$name_in_control"]["error"] > 0) {
//    echo "0Return Code: " . $_FILES["$name_in_control"]["error"] . "<br>";
                echo "0Không thể upload file";
                exit;
            } else {
//    echo "Upload: " . $_FILES["$name_in_control"]["name"] . "<br>";
//    echo "Type: " . $_FILES["$name_in_control"]["type"] . "<br>";
//    echo "Size: " . ($_FILES["$name_in_control"]["size"] / 1024) . " kB<br>";
//    echo "Temp file: " . $_FILES["$name_in_control"]["tmp_name"] . "<br>";

                if (file_exists("upload/" . $_FILES["$name_in_control"]["name"])) {
//      echo "0".$_FILES["$name_in_control"]["name"] . " already exists. ";
                    if ($flag == "1") {
                        unlink("upload/" . $_FILES["$name_in_control"]["name"]);
                    } else {
                        echo "0" . $_FILES["$name_in_control"]["name"] . " File đã tồn tại. ";
                        exit;
                    }
                } else {
                    move_uploaded_file($_FILES["$name_in_control"]["tmp_name"], "upload/" . $_FILES["$name_in_control"]["name"]);
                    return "upload/" . $_FILES["$name_in_control"]["name"];
//      echo "1Stored in: " . "upload/" . $_FILES["$name_in_control"]["name"];
//      exit;
                }
            }
        } else {
            echo "0File không hợp lê.";
            exit;
        }
    }

    public static function allowHTML($input, array $config = array(), $method = 'sanitize') {
        //create new object
        $allowHTML = new allowHTML($config);
        //process input
        return $allowHTML->$method($input);
    }

    public static function get_facebook_like_button_statistics($url) {
        $fb_url_query = "http://api.facebook.com/method/fql.query?query=";
        $query = "SELECT  like_count, total_count, share_count, click_count from link_stat  where  url='" . $url . "'";
        $fb_url_query = $fb_url_query . urlencode($query);

        $c = curl_init();
        $timeout = 10;
        curl_setopt($c, CURLOPT_URL, $fb_url_query);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($c);
        curl_close($c);
        return $data;
    }
    public static function getWd($uid){
        //        Authentication::checkAuthorization(get_class($this) . "|" . __FUNCTION__);
        $key = "09";
//        $uid = "2";
        $sk = md5('andy' + $key + $uid + '0510');
//        $sk=md5('andy'.$key.$uid.'0510');
//        echo $sk;exit;
        $url = 'http://123.30.136.245:8080/s1/interface/index.php/Andy/index?key=' . $key . '&uid=' . $uid . '&sk=' . $sk . '';
//        $url='http://123.30.136.245:8080/s1/interface/index.php/Andy/index?key=09&uid=100000000&sk='.$sk;
        //echo $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
        curl_setopt($ch, CURLOPT_PROXY, 'http://proxy.shr.secureserver.net:3128');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $data = curl_exec($ch);
//        var_dump($data);
        
        curl_close($ch);
        
//        return Util::db_utf8_convert($data);
        return preg_replace('/[^(\x20-\x7F)]*/','', $data);;
//        $this->render("test",array(
//            "url"=>$url = 'http://123.30.136.245:8080/s1/index.html?key=' . $key . '&wk='.$data.'&uid=' . $uid,
//        ));
    }
    public static function db_utf8_convert($str)
{
    $convmap = array(0x80, 0x10ffff, 0, 0xffffff);
    return preg_replace('/\x{EF}\x{BF}\x{BD}/u', '', mb_encode_numericentity($str, $convmap, "UTF-8"));
}

}

?>
