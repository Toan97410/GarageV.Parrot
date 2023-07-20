<?php

namespace App\Services;

use App\Middleware\SessionMiddleware;

class Router {
    private $routes = [];
    private $middlewares = [];
    private $lastRoute = null;
    private $controllerNamespace = 'App\\Controllers\\';
    private $defaultController = 'ErrorController';
    private $defaultAction = 'error404';

    private function addRoute($method, $path, $callback) {
        $path = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z0-9]+)', $path);
        $this->routes[$method]['#^' . $path . '$#'] = $callback;
        $this->lastRoute = $path;
        return $this;
    }

    public function get($path, $callback) {
        return $this->addRoute('GET', $path, $callback);
    }

    public function post($path, $callback) {
        return $this->addRoute('POST', $path, $callback);
    }

    public function resolve() {
        $currentPath = $_SERVER['REQUEST_URI'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];
        $callback = null;
        
        foreach ($this->routes[$method] as $path => $callback) {
            if (preg_match($path, $currentPath, $matches)) {
                $callback = $this->routes[$method][$path];
                break;
            }
        }

        if (!$callback) {
            $controllerName = $this->controllerNamespace . $this->defaultController;
            $method = $this->defaultAction;
            $controller = new $controllerName($this, $this->middlewares);
            echo $controller->$method();
            return;
        }

        if (is_string($callback)) {
            $callback = explode('@', $callback);
            if (count($callback) !== 2) {
                throw new \Exception("Fonction de rappel invalide spécifiée.");
            }
            foreach ($this->middlewares as $middleware) {
                $middleware->handle();
            }
            $controllerName = $this->controllerNamespace . $callback[0];
            $controller = new $controllerName($this, $this->middlewares);
            $method = $callback[1];
            $params = array_slice($matches, 1);
            echo $controller->$method($params);
            return;
        }

        echo call_user_func($callback);
    }
}