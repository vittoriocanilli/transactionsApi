<?php

namespace App\Models;

class TransactionModel extends AbstractModel
{
    public function set($timestamp, $amount)
    {
        $this->cacheServer->set("transaction_".$timestamp, $amount, time() + 60);
    }
    
    public function get($timestamp)
    {
        return $this->cacheServer->get("transaction_".$timestamp);
    }
    
    public function getAll()
    {
        $allTimestamps = $this->cacheServer->getAllKeys();
        return $this->cacheServer->getMulti($allTimestamps);
    }
}
