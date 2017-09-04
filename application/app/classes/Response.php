<?php

namespace App\Classes;

class Response
{
    public static function success($data)
    {
        http_response_code(200);
        echo json_encode(array('message' => 'Request to API successful', 'data' => $data));
    }
    
    public static function dataStored()
    {
        http_response_code(201);
    }
    
    public static function noContent()
    {
        http_response_code(204);
    }
    
    public static function notFound()
    {
        http_response_code(404);
        echo json_encode(array('message' => 'API not found'));
    }
}