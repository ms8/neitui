<?php
/**
 * Created by JetBrains PhpStorm.
 * User: syd3050
 * Date: 14-3-24
 * Time: 下午2:24
 * To change this template use File | Settings | File Templates.
 */

class HttpSender {
    function sock_get($url)
    {
        $info = parse_url($url);
        $fp = fsockopen($info["host"], $info["port"], $errno, $errstr, 3);
        $head = "GET ".$info['path']." HTTP/1.0\r\n";
        $head .= "Host: ".$info['host']."\r\n";
        $head .= "\r\n";
        $write = fputs($fp, $head);
        fclose($fp);
    }
}