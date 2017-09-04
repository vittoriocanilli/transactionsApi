<?php

namespace App\Classes;

class StatisticsRequest extends Request
{
    public function processData()
    {
        $response = array(
            "sum" => 1000,
            "avg" => 100,
            "max" => 200,
            "min" => 50,
            "count" => 10
        ); //TODO
        $this->responseData = $response;
    }
    
    public function sendResponse()
    {
        Response::success($this->responseData);
    }
}