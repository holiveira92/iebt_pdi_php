<?php

namespace App\Core;

use Closure;

class Router
{
    public Request $request;
    protected array $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get(string $path, Closure $callback)
    {
        $this->routes["get"][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            echo "404 - Route Not Found";
            exit;
        }

        echo call_user_func($callback);
    }
}