<?php

namespace App\Main;

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
        $this->routes[$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();

        if ($this->isRouterRegistered($path) === false) {
            echo "404 - Route Not Found";
            exit;
        }

        $callback = $this->routes[$path];
        
        echo call_user_func($callback);
    }

    public function isRouterRegistered(string $path)
    {
        return $this->routes[$path] ?? false;
    }

}
