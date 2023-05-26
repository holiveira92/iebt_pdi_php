<?php

namespace App\Core;

class Response
{

    public function setStatusHttpCode( int $code)
    {
        http_response_code($code);
        return $this;
    }

    public function handleData(array $data, string $message = "") 
    {
        return json_encode(
            array_merge(
                $data,
                [ "message" => $message ]
            )
        );
    }
}
