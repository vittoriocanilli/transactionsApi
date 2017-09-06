<?php

namespace App\Classes;

use App\Models\{ TransactionModel };

class StatisticsRequest extends Request
{
    public function processData()
    {
        $model = new TransactionModel();
        $allTransactions = $model->getAll();
        
        $sum = array_sum($allTransactions);
        $max = max($allTransactions);
        $min = min($allTransactions);
        $count = count($allTransactions);
        
        $response = array(
            "sum" => $sum,
            "avg" => round($sum/$count, 2),
            "max" => $max,
            "min" => $min,
            "count" => $count
        );
        $this->responseData = $response;
    }
    
    public function sendResponse()
    {
        Response::success($this->responseData);
    }
}