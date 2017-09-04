<?php

require __DIR__.'/../vendor/autoload.php';

use App\Classes\{ TransactionRequest, StatisticsRequest, UnsupportedRequest };

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestData = explode("/",$_SERVER['REQUEST_URI']);
$requestApi = isset($requestData[1]) ? $requestData[1] : "";

if($requestMethod == "POST" && $requestApi == "transactions") { // TODO
    $request = new TransactionRequest($requestMethod, $requestApi);
} else if($requestMethod == "GET" && $requestApi == "statistics") {
    $request = new StatisticsRequest($requestMethod, $requestApi);
} else {
    $request = new UnsupportedRequest($requestMethod, $requestApi);
}
$request->processData();
$request->sendResponse();