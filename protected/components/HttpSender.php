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

        $socket = socket_create(2, 1, 6) ;

        $connection = socket_connect($socket, $info["host"], $info["port"]) or die(CJSON::encode(array('status'=>"Could not connet\n")));
        $head = "GET ".$info['path']." HTTP/1.1\r\n";
        $head .= "Host: ".$info['host'].":".$info["port"]."\r\n";
        $head.= "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\r\n";
        $head.="Accept-Encoding: gzip,deflate,sdch\r\n";
        $head.="Accept-Language: zh-CN,zh;q=0.8\r\n";
        $head.="Accept-Charset: GBK,utf-8;q=0.7,*;q=0.3\r\n";
        $head .= "\r\n";


        $response="";
        socket_write($socket, $head) or die(CJSON::encode(array('status'=>"Write failed")));
        $i=1;
        while ($i>0) {
            $buff = socket_read($socket, 1024, 1);
            $response.=$buff."\n";
            $i--;

        }
        socket_close($socket);
    }
}