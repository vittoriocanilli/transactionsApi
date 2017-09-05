<?php

namespace App\Classes;

use App\Models\{ TransactionModel };

class TransactionRequest extends Request
{
    public function processData()
    {
        $amount = $this->requestData["amount"];
        $timestamp = $this->requestData["timestamp"];
        
        $now = time() * 1000;
        $storingTransaction = ($now - $timestamp <= 60000);
        
        if($storingTransaction) {
            $model = new TransactionModel();
            $model->set($timestamp, $amount);
        }
        
        $this->responseData = $storingTransaction;
    }
    
    public function sendResponse()
    {
        if($this->responseData) {
            Response::dataStored();
        } else {
            Response::noContent();
        }
    }
}