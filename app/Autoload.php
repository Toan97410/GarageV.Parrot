<?php

namespace App;

class Autoload
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
    }
}