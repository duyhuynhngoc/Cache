<?php
/**
 * Modified date: 5/7/2015
 * Modified by: Duy Huynh
 */

require_once "Memcache/Cache.php";

class CacheManager {

    public static function getCacher($app = 'APP', $server = 'localhost', $port = 11211)
    {
        return new Cache(array('app'=>$app, 'server' => $server, 'port' => $port));
    }
}