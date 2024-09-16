<?php

namespace RapidRoute;

use RapidRoute\Exception\HTTPException;
use RapidRoute\Exception\NotCallableException;

class Router
{
    private array $getRoutes = [];
    private array $postRoutes = [];
    private array $paramsRoutes;

    public function add(string $methd, string $urn, array|callable $action)
    {
        $methd = strtolower($methd);

        if (!in_array($methd, ['get', 'post'])) {
            throw new HTTPException('HTTP method not exists');
        }

        if (is_array($action)) {
            $action  = [new $action[0], $action[1]];
        }

        if (!$this->isCallable($action)) {
            throw new NotCallableException('The variable action is not a function');
        }

        match ($methd) {
            'get' => $this->getRoutes[$this->convertRouteToRegex($urn)] = $action,
            'post' => $this->postRoutes[$this->convertRouteToRegex($urn)] = $action,
        };
    }

    public function isCallable($action): bool
    {
        if (is_array($action)) {
            return is_callable($action);
        }

        return is_callable($action);
    }

    public function convertRouteToRegex($route) {
        return '@^' . preg_replace('/\{[a-zA-Z_][\w]*\}/', '([a-zA-Z0-9_-]+)', $route) . '$@';
    }
    
    public function dispatch(): void
    {
        $http_method = $_SERVER['REQUEST_METHOD'];
        $url_requested = $_SERVER['PATH_INFO'];

        $routes = $http_method === 'GET' ?  $this->getRoutes :  $this->postRoutes;

        foreach ($routes as $route => $action) {
            if (preg_match($route, $url_requested, $matches)) {
                $this->paramsRoutes = array_slice($matches, 1);
                call_user_func_array($action, $this->paramsRoutes);
                break;
            }
        }
    }
}
