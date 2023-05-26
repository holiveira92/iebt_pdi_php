<?php

namespace App\Core;

class Request
{

    public function __construct()
    {
        
    }

    public function getPath(): string
    {
        $path = $_SERVER["REQUEST_URI"] ?? "/";
        $position = strpos($path, "?");

        if ($position === false) {
            return $path;
        }

        return substr($path, 0, $position);
    }

    public function getMethod(): string
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function getBody(): array
    {
        $body = [];

        if ($this->getMethod() === "get") {
            foreach($_GET as $key => $getData) {
                $body[$key] = $getData;
            }
        }
        
        if ($this->getMethod() === "post") {
            $post = json_decode(file_get_contents("php://input"), true);
            foreach($post as $key => $postData) {
                $body[$key] = $postData;
            }
        }

        return $body;
    }

}
