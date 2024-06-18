<?php

namespace Src;

use App\Attribute\Route;
use ReflectionClass;

class App
{
    private static ?App $_instance = null;

    public static function get(): App
    {
        if (!self::$_instance) {
            self::$_instance = new App();
        }

        return self::$_instance;
    }

    public function route($controller, $method, $args): void
    {
//        $url = $_SERVER['REDIRECT_URL'];

//        call_user_func_array([$controller, $method], $args);
    }

    public function registerController(string $controller): void
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


            }
        }
    }
}
