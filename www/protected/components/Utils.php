<?php

/**
 * Created by JetBrains PhpStorm.
 * User: long
 * Date: 2/27/14
 * Time: 3:00 PM
 * To change this template use File | Settings | File Templates.
 */
class Utils {

    public static function autoSetValueToObject($model, $array) {//array la cac gia tri post
        $attributes = $model->attributeNames();

        foreach ($array as $key => $value) {// lay moi gia tri trong post vao value
            foreach ($attributes as $key1 => $attribute) {// lay moi attreibute -> $attreibute
                if ($attribute == $key) {// neu atttribute giong key
                    $model->$attribute = $value; //thi gan gia tri cua key cho attreibute do'
                }
            }
        }
        return $model;
    }

    public static function setAllErrorsToArray($getErrors) {// lay cac loi cho vao 1 mang
        $array_errors = array();
        foreach ($getErrors as $key => $errors) {
            foreach ($errors as $key1 => $value2) {
                array_push($array_errors, $value2);
            }
        }
        return $array_errors;
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

    public static function setSession($key, $value) {
        Yii::app()->session[$key] = $value;
//        if (!isset($_SESSION)) {
//            session_start();
//        }
//        $_SESSION[$key] = $value;
//        return $_SESSION[$key];
    }

    public static function delSession($key) {
//        if (!isset($_SESSION)) {
//            session_start();
//        }
//        if (isset($_SESSION[$key])) {
//            unset($_SESSION[$key]);
//            session_destroy();
//        } else {
//            
//        }
        unset(Yii::app()->session[$key]);
    }

//  Ham: set Cookie
//  param: name: ten cookie, value: gia tri truyen vao
    public static function setCookie($name, $value) {
        $cookie = new CHttpCookie($name, $value);
        Yii::app()->request->cookies[$name] = $cookie;
    }

//  Ham: get Cookie
//  param: name: ten cookie can lay
//  return: gia tri cua cookie     
    public static function getCookie($name) {
        return Yii::app()->request->cookies[$name]->value;
    }

//unset cookie, param:name: ten cookie
    public static function removeCookie($name) {
        unset(Yii::app()->request->cookies[$name]);
    }

    public static function paginate($total, $page = 1, $start = 0, $offset = 3) {
        $start = ($page - 1) * $offset;
        $total_page = ceil($total / $offset);
        return array("page" => $page,
            "start" => $start,
            "total" => $total_page,
            "offset" => $offset);
    }

    public static function removeHtmlString($string) {// bo cac tag HTML trong van ban
        return preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($string));
    }

    public static function CreateRegisterKey() {
        return substr(md5(rand(0, 10)), 0, 6);
    }

    public static function CreateMailContent($DisplayName, $secretKey, $userId) {
        return $cotent = "<p>Hello " . $DisplayName . ", please enter this <a href='" . $_SERVER['HTTP_HOST'] . Yii::app()->getBaseUrl() . "/index.php?r=user/ActiveUser&userId={$userId}&secretKey={$secretKey}" . "'>link</a> to active your account</p>";
    }

    public static function SendMail($mailContent, $mailAddress, $mailSubject) {
        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer;
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP();
        $mail->Host = 'smtp.googlemail.com:465';
        $mail->SMTPSecure = "ssl";
        $mail->SMTPAuth = true;
        $mail->Username = 'duchung3690@gmail.com';
        $mail->Password = 'hungdaica123';
        $mail->SetFrom('duchung3690@gmail.com', 'Lương Đức hùng');
        $mail->Subject = $mailSubject;
        $mail->AltBody = $mailContent;
        $mail->MsgHTML($mailContent);
        $mail->AddAddress($mailAddress);
        if ($mail->Send()) {
            return true;
        } else {
            return false;
        }
    }

    public static function setSecurePassword($pass) {//chuyen password sang dang hash kem theo secureKey
        $secureKey = base64_encode("education-online");
        $pass_encode = base64_encode($pass);
        return $output_encode = base64_encode($pass_encode . $secureKey);
    }

    public static function getSecurePassword($pass_64encoded) {// giai ma password da ma hoa
        $secureKey = base64_encode("education-online");
        $split_securekey = str_replace($secureKey, "", base64_decode($pass_64encoded)); // cat secureKey ra khoi? chuoi~ chua password da ma hoa
        return base64_decode($split_securekey); //decode sang password
    }

    public static function actionGetAllAction() {
        $action_arr = array();
        $webroot = Yii::getPathOfAlias('webroot'); //lay duong dan cua thu muc goc
        $dir = $webroot . '/protected/controllers'; // lay duong dan controllers
        $files = scandir($dir); // lay danh sach cac file ra dang. mang? trong dir
        foreach ($files as $key => $value) {
            if ($key >= 2) {//trong array tra ve tu key thu 3 moi la file
                $class_name = str_replace("Controller", "", substr($value, 0, strlen($value) - 4)); // bo? .php
                $file = $dir . "/" . $value;
                $arr = file($file);
                foreach ($arr as $line) {
                    if (preg_match("/^public function action/", trim($line))) {
                        $action_name = str_replace("public function ", "", substr(trim($line), 0, strpos(trim($line), "(")));
                        $result = $class_name . "|" . $action_name;
                        array_push($action_arr, $result);
                    }
                }
            }
        }
        return $action_arr;
    }

    public static function GetActionName($actionName) {
        return str_replace("action", "", $actionName);
    }

    public static function ArrayToObject($array) {
        $array_of_objects = array();


        if (count($array) > 1) {
            foreach ($array as $key => $value) {
                $object = (object) $value;
                array_push($array_of_objects, $object);
            }
            return (object) $array_of_objects;
        } else {
            foreach ($array as $key => $value) {
                $object = (object) $value;
                return $object;
            }
        }
    }

    public static function ArrayToObject1($array) {// dung cho truong hop can foreach
        $array_of_objects = array();
        foreach ($array as $key => $value) {
            $object = (object) $value;
            array_push($array_of_objects, $object);
        }
        return (object) $array_of_objects;
    }

    public static function UploadImage($img) {
        if (file_exists("upload/" . $_FILES[$img]['name'])) {
            if (move_uploaded_file($_FILES[$img]["tmp_name"], "upload/" . "(1)" . $_FILES[$img]['name'])) {
                return true;
            } else {
                return false;
            }
        } else {
            if (move_uploaded_file($_FILES[$img]["tmp_name"], "upload/" . $_FILES[$img]['name'])) {
                return true;
            } else {
                return false;
            }
        }
    }

    //function convert time vd: 20/3/2014 12h 59ph -> 20/3/2014 ( tat ca dang int )
    public static function TimeConvert($time) {
        return $result = strtotime(date("d-F-Y", $time));
    }

    public static function DateConvert($time) {
        $timezone = +7; //(GMT +7:00) 
        return $new_time = gmdate(" G:i a, d-m", $time + 3600 * ($timezone + date("0")));
//        
//        return $result = date(" G:i a, d-m", $time);
    }

//function to get client IP
    public static function getIP() {
        $ip = $_SERVER['REMOTE_ADDR'];
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        return $ip;
    }

//    public static function var_dump($var) {
//        echo "<pre>";
//        var_dump($var);
//        echo "<pre>";
//        exit;
//    }

    
    //function to create readmore limit string
    public static function readMore($string) {
        $string = strip_tags($string);

        if (strlen($string) > 1500) {

            // truncate string
            $stringCut = substr($string, 0, 1500);

            // make sure it ends in a word so assassinate doesn't become ass...
            $string = substr($stringCut, 0, strrpos($stringCut, ' ')) . '... ';
        }
        echo $string;
    }
    
    //function used to get createdDate to display in top of an note's post
    //"d-F-Y"
    public static function getCreatedDate($createdDate){
        $createdDate = date(" d-F-Y", $createdDate);
        $array = explode("-", $createdDate);
        $list_of_date = array(array("day"=>$array[0],"month"=>$array[1],"year"=>$array[2]));
        return Utils::ArrayToObject($list_of_date);
    }

    public static function getTitleForUrl($title, $romanize = false)
    {
        if ($romanize) {
            $title = utf8_romanize(utf8_deaccent($title));
        }

        $aPattern = array(
            "a" => "á|à|ạ|ả|ã|ă|ắ|ằ|ặ|ẳ|ẵ|â|ấ|ầ|ậ|ẩ|ẫ|Á|À|Ạ|Ả|Ã|Ă|Ắ|Ằ |Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ",
            "o" => "ó|ò|ọ|ỏ|õ|ô|ố|ồ|ộ|ổ|ỗ|ơ|ớ|ờ|ợ|ở|ỡ|Ó|Ò|Ọ|Ỏ|Õ|Ô|Ố|Ồ |Ộ|Ổ|Ỗ|Ơ|Ớ|Ờ|Ợ|Ở|Ỡ",
            "e" => "é|è|ẹ|ẻ|ẽ|ê|ế|ề|ệ|ể|ễ|É|È|Ẹ|Ẻ|Ẽ|Ê|Ế|Ề|Ệ|Ể|Ễ",
            "u" => "ú|ù|ụ|ủ|ũ|ư|ứ|ừ|ự|ử|ữ|Ú|Ù|Ụ|Ủ|Ũ|Ư|Ứ|Ừ|Ự|Ử|Ữ",
            "i" => "í|ì|ị|ỉ|ĩ|Í|Ì|Ị|Ỉ|Ĩ",
            "y" => "ý|ỳ|ỵ|ỷ|ỹ|Ý|Ỳ|Ỵ|Ỷ|Ỹ",
            "d" => "đ|Đ",
        );
        while (list($key, $value) = each($aPattern)) {
            $title = @ereg_replace($value, $key, $title);
        }

        $title = strtr(
            $title,
            '`!"$%^&*()-+={}[]<>;:@#~,./?|' . "\r\n\t\\",
            '                             ' . '    '
        );
        $title = strtr($title, array('"' => '', "'" => ''));

        if ($romanize) {
            $title = preg_replace('/[^a-zA-Z0-9_ -]/', '', $title);
        }

        $title = preg_replace('/[ ]+/', '-', trim($title));
        $aPattern = array(
            "a" => "á|à|ạ|ả|ã|ă|ắ|ằ|ặ|ẳ|ẵ|â|ấ|ầ|ậ|ẩ|ẫ|Á|À|Ạ|Ả|Ã|Ă|Ắ|Ằ |Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ",
            "o" => "ó|ò|ọ|ỏ|õ|ô|ố|ồ|ộ|ổ|ỗ|ơ|ớ|ờ|ợ|ở|ỡ|Ó|Ò|Ọ|Ỏ|Õ|Ô|Ố|Ồ |Ộ|Ổ|Ỗ|Ơ|Ớ|Ờ|Ợ|Ở|Ỡ",
            "e" => "é|è|ẹ|ẻ|ẽ|ê|ế|ề|ệ|ể|ễ|É|È|Ẹ|Ẻ|Ẽ|Ê|Ế|Ề|Ệ|Ể|Ễ",
            "u" => "ú|ù|ụ|ủ|ũ|ư|ứ|ừ|ự|ử|ữ|Ú|Ù|Ụ|Ủ|Ũ|Ư|Ứ|Ừ|Ự|Ử|Ữ",
            "i" => "í|ì|ị|ỉ|ĩ|Í|Ì|Ị|Ỉ|Ĩ",
            "y" => "ý|ỳ|ỵ|ỷ|ỹ|Ý|Ỳ|Ỵ|Ỷ|Ỹ",
            "d" => "đ|Đ",
        );
        while (list($key, $value) = each($aPattern)) {
            $title = preg_replace('/' . $value . '/i', $key, $title);
        }
        return strtr($title, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz');
    }

    public static function simpleSlug($str)
    {
        $toLower = false;
        $slug = preg_replace('@[\s!:;_\?=\\\+\*/%&#]+@', '-', $str);
        if (true === $toLower) {
            $slug = mb_strtolower($slug, Yii::app()->charset);
        }
        $slug = trim($slug, '-');
        return $slug;
    }


    /**
     * shorten text (full word)
     *
     * @param string    source $text
     * @param integer    $max_length
     * @param string    (optional) append text $append
     *
     * @return string
     */
    public static function shorten_text($text, $max_length, $append = '...')
    {

        $text = trim($text);
        $len = mb_strlen($text, 'UTF-8');
        if ($len > $max_length) {
            $text = mb_substr($text, 0, $max_length);
            $lastBlankPos = mb_strrpos($text, ' ');
            if (false === $lastBlankPos) {
                return $text . $append;
            }

            $text = mb_substr($text, 0, $lastBlankPos + 1) . $append;
        }

        return $text;
    }

    /**
     * trim text
     *
     * @param string    $text source text
     * @param int        $max_length    max result text length
     * @param string    $append string apped
     *
     * @return string
     */
    public static function trim_text_by_length($text, $max_length, $append = '...')
    {
        if ($max_length >= mb_strlen($text, 'UTF-8')) {
            return $text;
        }

        return mb_substr($text, 0, $max_length, 'UTF-8') . $append;
    }

    /**
     * Get whole words from string...
     *
     * @param string $str String of words
     * @param integer $int Maximum string length
     * @param string $strApend Apend string if string will be cutted
     */
    public static function subwords($str, $int, $strAppend = '...')
    {
        $arr = explode(" ", $str);
        if (sizeof($arr) > $int) {
            $strsub = '';
            $arr = explode(" ", $str);
            for ($i = 0; $i < $int; $i++) {
                $strsub .= $arr[$i] . ' ';
            }
            return $strsub . $strAppend;
        }
        return $str;
    }

    /**
     * Get whole words from string...
     *
     * @param string $str String of words
     * @param integer $int Maximum string length
     * @param string $strApend Apend string if string will be cutted
     */
    public static function subwordsContent($str, $int, $strAppend = '...')
    {
        $arr = explode(" ", $str);
        if (sizeof($arr) > $int) {
            $strsub = '';
            //$str = preg_replace('<br />','',$str);
            $arr = explode(" ", $str);
            if (strpos($arr[$int - 1], "&lt;br") !== false) {
                $arr[$int - 1] = "";
            }
            for ($i = 0; $i < $int; $i++) {
                $strsub .= $arr[$i] . ' ';
            }
            return $strsub . $strAppend;
        }
        return $str;
    }


    public static function getTextEditor($str)
    {
        $str = html_entity_decode($str);
        $str = strip_tags($str, '<b><strong><br><br/><em><a><p>');
        //$str = stripArgumentFromTags($str);
        $str = htmlspecialchars($str, ENT_QUOTES);
        return $str;
    }

    public static function stripArgumentFromTags($htmlString)
    {
        $regEx = '/([^<]*<\s*[a-z](?:[0-9]|[a-z]{0,9}))(?:(?:\s*[a-z\-]{2,14}\s*=\s*(?:"[^"]*"|\'[^\']*\'))*)(\s*\/?>[^<]*)/i'; // match any start tag

        $chunks = preg_split($regEx, $htmlString, -1, PREG_SPLIT_DELIM_CAPTURE);
        $chunkCount = count($chunks);

        $strippedString = '';
        for ($n = 1; $n < $chunkCount; $n++) {
            $strippedString .= $chunks[$n];
        }

        return $strippedString;
    }

    public static function randomcode($len = 8)
    {
        $code = $lchar = NULL;
        for ($i = 0; $i < $len; $i++) {
            $char = chr(rand(48, 122));
            while (!preg_match('/^[0-9]+$/', $char)) {
                if ($char == $lchar) continue;
                $char = chr(rand(48, 90));
            }
            $code .= $char;
            $lchar = $char;
        }
        return $code;
    }

    /**
     * Ham lay Ngay dau tien cua tuan Sunday = 0; Monday = 1 ....
     * @param $iYear
     * @param $iWeekNumber
     * @return int
     */
    public static function getFirstDayOfWeek($iYear, $iWeekNumber)
    {
        if (is_null($iYear)) $iYear = date('Y');
        if ($iWeekNumber < 10) $iWeekNumber = '0' . $iWeekNumber;

        $iTime = strtotime($iYear . 'W' . $iWeekNumber);

        return $iTime;
    }
}
