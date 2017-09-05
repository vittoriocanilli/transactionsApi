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
        $storingTransaction = true; // TODO
        
        $model = new TransactionModel();
        $storedAmount = $model->get($timestamp);
        if($storedAmount) {
            die("transaction already stored with amount = ".$storedAmount);
        }
        
        if($storingTransaction) {
//             $model = new TransactionModel();
            $model->set($timestamp, $amount);
        }
        
        $this->responseData = $storingTransaction; // TODO
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