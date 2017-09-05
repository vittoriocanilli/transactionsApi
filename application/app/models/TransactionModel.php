<?php

namespace App\Models;

class TransactionModel extends AbstractModel
{
    public function set($timestamp, $amount)
    {
        $this->cacheServer->set("transaction_".$timestamp, $amount);
    }
    
    public function get($timestamp)
    {
        return $this->cacheServer->get("transaction_".$timestamp);
    }
}
