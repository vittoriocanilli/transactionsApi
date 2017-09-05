<?php

namespace App\Models;

class AbstractModel
{
    protected $cacheServer;
    
    public function __construct()
    {
        $this->cacheServer = new \Memcached();
        $this->cacheServer->addServer("127.0.0.1", 11211);
    }
}