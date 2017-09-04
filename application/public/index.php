<?php

require __DIR__.'/../vendor/autoload.php';

use App\Classes\{ Request };

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestData = explode("/",$_SERVER['REQUEST_URI']);
$requestApi = isset($requestData[1]) ? $requestData[1] : "";

$request = new Request($requestMethod);