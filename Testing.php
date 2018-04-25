<?php

class Testing
{
    static function testSite($url)
    {
        ini_set('default_socket_timeout', '5');
        $fp = fopen($url, "r");
        $res = fread($fp, 500);
        fclose($fp);
        if (strlen($res) > 0)
            return true;
        else
            return false;
    }
}