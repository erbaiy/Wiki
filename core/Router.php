<?php

namespace App\core;



class Router
{

    private $routes = [];
    public function get($uri, $callback)
    {
        $this->routes['get'][$uri] = $callback;
    }
    public function post($uri, $callback)
    {
        $this->routes['post'][$uri] = $callback;
    }
    public function dispatch($method, $uri)
    {
        if (array_key_exists($uri, $this->routes[$method])) {
        }
    }
}
