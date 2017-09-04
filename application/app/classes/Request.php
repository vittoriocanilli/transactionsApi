<?php

namespace App\Classes;

class Request
{
    protected $method;
    protected $api;
    protected $requestData;
    protected $responseData;
    
    public function __construct($method, $api)
    {
        $this->method = $method;
        $this->method = $api;
        $this->requestData = $this->getRequestData();
    }
    
    public function processData()
    {
        $this->responseData = null;
    }
    
    public function sendResponse()
    {
        Response::success($this->responseData);
    }
    
    protected function getRequestData()
    {
        switch($this->method) {
            case "GET":
                return $_GET;
                break;
            case "POST":
                return $_POST;
                break;
        }
    }
}