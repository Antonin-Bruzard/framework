<?php

namespace Src;

class App
{
    private static ?App $_instance = null;
    private Router $router;

    public static function get(): App
    {
        if (!self::$_instance) {
            self::$_instance = new App();
        }

        return self::$_instance;
    }

    public function __construct()
    {
        $this->router = new Router();
    }

    public function router(): Router
    {
        return $this->router;
    }
}
