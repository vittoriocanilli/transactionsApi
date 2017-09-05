<?php

namespace App\Classes;

class UnsupportedRequest extends Request
{
    protected $unsupportedFeature;
    
    public function __construct($method, $unsupportedFeature)
    {
        parent::__construct($method);
        $this->unsupportedFeature = $unsupportedFeature;
    }
    
    public function sendResponse()
    {
        if($this->unsupportedFeature == "method") {
            Response::notAllowed();
        } else {
            Response::notFound();
        }
    }
}