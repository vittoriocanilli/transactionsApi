<?php

namespace App\Classes;

class UnsupportedRequest extends Request
{
    public function sendResponse()
    {
        Response::notFound();
    }
}