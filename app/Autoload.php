<?php

namespace App;

class Autoload
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
            if (file_exists($file)) {
                // echo "<br/>Chargement de la classe $class à partir du fichier $file\n<br/>";
                require $file;
                return true;
            }
            // echo "<br/>Le fichier $file pour la classe $class n'a pas été trouvé\n<br/>";
            return false;
        });
    }
}