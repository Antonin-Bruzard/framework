<?php

namespace Src;

use App\Attribute\Route;
use JetBrains\PhpStorm\NoReturn;
use ReflectionClass;

class Router
{
    private $routes = [];

    public function __construct()
    {

        $controllers = array_diff(scandir(__DIR__."/../app/Controller"), ['.', '..']);

        foreach ($controllers as $controller) {
            $controllerName = 'App\Controller\\' . str_replace(".php", "", $controller);
            $this->registerControllerRoutes($controllerName);
        }
    }

    #[NoReturn]
    private function registerControllerRoutes(string $controller): void
    {
        $class = new ReflectionClass($controller);

        foreach ($class->getMethods() as $method) {
            $routeAttributes = $method->getAttributes(Route::class);
            if (empty($routeAttributes)) {
                continue;
            }
            foreach ($routeAttributes as $routeAttribute) {

                /* @var Route $route */
                $route = $routeAttribute->newInstance();

                $this->addRoute($route, $controller, $method->getName());
            }
        }
    }

    /**
     * vois si il faut ajouter un serielize + deserielize
     */

    private function addRoute(Route $route, string $controller, string $methodName): void
    {
        $this->routes[$route->getPath()] = [
            'controller' => $controller,
            'method' => $methodName
        ];
    }

    public function handle(string $path,array $args = [])
    {
        if ($this->routes[$path]) {
            call_user_func_array([$this->routes[$path]['controller'], $this->routes[$path]['method']], $args);

            return;
        }

        call_user_func_array([$this->routes['/']['controller'], $this->routes['/']['method']], $args);
    }
}