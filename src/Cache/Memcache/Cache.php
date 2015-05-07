<?php
/**
 * Modified date: 5/7/2015
 * Modified by: Duy Huynh
 */


class Cache {

    private $cacher = null;
    private $appName = 'APP';
    private $allKeys = '';

    /**
     * @param array $params: array('app'=>'APP', 'server'=>'server', 'port'=>'1122')
     * @throws \Exception
     */
    public function __construct($params = array())
    {
        if(isset($params['app']) && !empty($params['app']) && is_string($params['app']))
            $this->appName = $params['app'];

        $this->allKeys = $this->appName . '_ALL_CACHE_KEYS';

        //init and connect to memcache here
        $this->cacher = new \Memcache();

        if (!$this->cacher->connect($params['server'], $params['port']))
            throw new \Exception ("Could not connect Memcache Server (Server: " . $params['server'] . ", Port: " . $params['port'] . ").");

    }

    /**
     * Save data to memcache
     * @param $name
     * @param $obj
     * @return $this
     * @throws \Exception
     */
    public function save($name, $obj)
    {
        $key = $this->appName.$name;

        if (!$this->cacher->set($key, $obj, false))
            throw new \Exception ("Could not set data to Memcache '$name'.");

        $allKeys = $this->cacher->get($this->allKeys);

        if (!$allKeys) $allKeys = array();

        if (count($allKeys)==0 || !in_array($key, $allKeys))
            $allKeys[] = $key;

        $this->cacher->set($this->allKeys, $allKeys, false);

        return $this;
    }

    /**
     * Load data from cache, return null if not found
     * @param $name
     * @return mixed
     */
    public function load($name)
    {
        $key = $this->appName.$name;

        return $this->cacher->get($key);
    }

    /**
     * delete a cahed object of app
     * @param String $name
     * @return $this
     * @throws \Exception
     */
    public function delete($name)
    {
        $key = $this->appName.$name;

        if (!$this->cacher->delete($key))
            throw new \Exception ("Could not delete Memcache '$name' from Server.");

        return $this;
    }

    /**
     * Remove all memcache data of app
     * @return $this
     */
    public function removeAllCache()
    {
        $allKeys = $this->cacher->get($this->allKeys);

        if (is_array($allKeys))
        {
            for ($i=0; $i<count($allKeys); $i++)
            {
                $this->cacher->delete($allKeys[$i]);
            }
            $this->cacher->delete($this->allKeys);
        }

        return $this;
    }

    /**
     * Get all key name of app
     * @return array|string
     */
    public function getAllCaches()
    {
        return $this->cacher->get($this->allKeys);
    }

    /**
     * Fush cache
     * @throws \Exception
     */
    public function flush()
    {
        if (!$this->cacher->flush())
            throw new \Exception ("Could not flush memcache.");
    }
}