<?php

namespace Core;

use Core\Exceptions\MethodNotFoundException;
use Core\Exceptions\RouteNotFoundException;

class Router
{
    /**
     * All registered routes
     *
     * @var array
     */
    public array $routes = array(
        'GET' => array(),
        'POST' => array()
    );

    /**
     * Build up application
     * Make instance, require file which register routes, return object
     *
     * @param string $file
     * @return Router
     */
    public static function load(string $file): Router
    {
        $router = new self();

        require_once $file;

        return $router;
    }

    /**
     * Register GET routes
     *
     * @param $uri
     * @param $controller
     */
    public function get(string $uri, string $controller): void
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * Register POST routes
     *
     * @param $uri
     * @param $controller
     */
    public function post(string $uri, string $controller): void
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * Direct request based on current URL and request method
     *
     * @param $uri
     * @param $requestType
     * @return mixed
     * @throws MethodNotFoundException
     * @throws RouteNotFoundException
     */
    public function direct(string $uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {

            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );

        }

        throw new RouteNotFoundException();
    }

    /**
     * Make controller instance based on route
     *
     * @param $controller
     * @param $action
     * @return mixed
     * @throws MethodNotFoundException
     */
    protected function callAction(string $controller, string $action)
    {
        $controller = '\\Src\\Controllers\\' . $controller;

        $instance = new $controller;

        if (!method_exists($instance, $action)) {
            throw new MethodNotFoundException();
        }

        return $instance->$action();
    }
}
