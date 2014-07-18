<?php

/**
 * @author BAOHV
 *
 */
class CURL
{

    /**
     * @param string $url
     * @param array $fields
     * @param boolean $http_status
     * @return Ambigous <multitype:mixed , mixed>
     */
    public static function posturl($url = '', $fields = array(), $http_status = false)
    {
        //url-ify the data for the POST
        $fields_string = '';
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        if ($http_status) {
            //curl_setopt($ch, CURLOPT_HEADER, true);
            $result = array(
                'result' => curl_exec($ch),
                'http_status' => curl_getinfo($ch, CURLINFO_HTTP_CODE)
            );
        } else {
            $result = curl_exec($ch);
        }

        //close connection
        curl_close($ch);
        return $result;
    }

    /**
     * @param string $url
     * @return mixed
     */
    public static function geturl($url = '')
    {
        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);

        //close connection
        curl_close($ch);
        return $result;
    }

}