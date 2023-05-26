<?php

namespace App\Core;

use Closure;

class Router
{
    public Request $request;
    protected Response $response;
    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response =  $response;
    }

    public function get(string $path, $callback)
    {
        $this->routes["get"][$path] = $callback;
    }

    public function post(string $path, $callback)
    {
        $this->routes["post"][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            echo $this->response
                ->setStatusHttpCode(404)
                ->handleData([], "ROTA NAO ENCONTRADA");
            exit;
        }

        return call_user_func($callback, $this->request);
    }
}
