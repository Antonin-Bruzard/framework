<?php

namespace Src;

use App\Attribute\Route;
use JetBrains\PhpStorm\NoReturn;
use ReflectionClass;
use ReflectionException;

class Router
{
    private array $routes = [];

    /**
     * @throws ReflectionException
     */
    public function __construct()
    {

        $controllers = array_diff(scandir(__DIR__."/../app/Controller"), ['.', '..']);

        foreach ($controllers as $controller) {
            $controllerName = 'App\Controller\\' . str_replace(".php", "", $controller);
            $this->registerControllerRoutes($controllerName);
        }
    }

    /**
     * @throws ReflectionException
     */
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

    public function handle(string $path,array $args = []): void
    {
        if ($this->routes[$path]) {
            call_user_func_array(
                [
                    new $this->routes[$path]['controller'](),
                    $this->routes[$path]['method']
                ],
                $args
            );

            return;
        }

        call_user_func_array(
            [
                new $this->routes['/']['controller'](),
                $this->routes['/']['method']
            ]
            ,
            $args
        );
    }
}