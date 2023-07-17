<?php

namespace App\Services;

class Config {

    private static $instance = null;
    private $values;

    private function __construct() {
        $this->values = include ROOT . '/config/config.php';
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

    public function get($key) {
        return $this->values[$key] ?? null;
    }
}