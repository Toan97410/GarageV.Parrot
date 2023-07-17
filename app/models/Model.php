<?php

namespace App\Models;

use Database\Database;

abstract class Model {
    protected $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }
}