<?php

namespace App\Controllers;

use App\Models\Car;
use App\Services\Config;
use Database\Database;

class OccasionController extends Controller{
   
    private $config;
    private $database;

    public function __construct() {
        parent::__construct();
        $this->config = Config::getInstance()->get('database');
        $this->database = new Database($this->config);
    }

    public function index() {
        $carModel = new Car($this->database);
        $cars = $carModel->getAll();
        extract(compact('cars'));
        $this->renderView('occasions', ['cars' => $cars]);
    }

}