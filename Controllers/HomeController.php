<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\Controller;

class HomeController extends Controller
{
    protected Response $response;

    public function __construct()
    {
        $this->response =  new Response();
    }

    public function get(Request $request)
    {
        $params = $request->getBody(); 
        echo $this->response
            ->setStatusHttpCode(200)
            ->handleData($params, "DADOS OBTIDOS COM SUCESSO VIA GET");
    }

    public function post(Request $request)
    {
       $body = $request->getBody();
       echo $this->response
            ->setStatusHttpCode(201)
            ->handleData($body, "DADOS ENVIADOS COM SUCESSO VIA POST");
    }
}
