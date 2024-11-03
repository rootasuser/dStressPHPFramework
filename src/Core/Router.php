<?php

namespace dStress\Core;

class Router {
    private $routes = [];

    public function addRoute($path, $callback) {
        $this->routes[$path] = $callback;
    }

    public function handleRequest() {
        $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
        if (isset($this->routes[$requestUri])) {
            call_user_func($this->routes[$requestUri]);
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}
