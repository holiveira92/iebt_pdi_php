<?php

namespace App\Main;

class Request
{
    public function __construct()
    {

    }

    public function getPath()
    {
        return $_SERVER["REQUEST_URI"] ?? "/";
    }
        
}
