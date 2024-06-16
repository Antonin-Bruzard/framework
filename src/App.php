<?php

namespace Src;

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

    public function route(): void
    {
        echo 'salut';
    }
}
