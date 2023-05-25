<?php

namespace App\Main;

class Application
{
    public Router $router;
    public Request $Request;

    public function __construct()
    {
        $this->router = new Router(new Request());
    }

    public function run()
    {
        $this->router->resolve();
    }
}
