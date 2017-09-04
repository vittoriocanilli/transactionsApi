<?php

namespace App\Classes;

class TransactionRequest extends Request
{
    public function processData()
    {
        $amount = $this->requestData["amount"];
        $timestamp = $this->requestData["timestamp"];
        
        $now = time() * 1000;
        
        $this->responseData = ($now - $timestamp <= 60000); // TODO
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