<?php

namespace App\Factories;

use App\Classes\{ TransactionRequest, StatisticsRequest, UnsupportedRequest };

class RequestFactory
{
    public static function make($httpMethod, $requestApi)
    {
        if($requestApi == "transactions") {
            if($httpMethod == "POST") {
                return new TransactionRequest($httpMethod);
            } else {
                return new UnsupportedRequest($httpMethod, "method");
            }
        } else if($requestApi == "statistics") {
            if($httpMethod == "GET") {
                return new StatisticsRequest($httpMethod);
            } else {
                return new UnsupportedRequest($httpMethod, "method");
            }
        } else {
            return new UnsupportedRequest($httpMethod, "api");
        }
    }
}