<?php

namespace App\Controllers;

use App\Models\Car;
use App\Models\Commentaires;
use App\Services\Auth;
use App\Services\Config;
use Database\Database;
class HomeController extends Controller{
    
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
        $commentaireModel = new Commentaires($this->database);
        $commentaires = $commentaireModel->getAll();
        extract(compact('commentaires'));   
        $this -> renderView('home', ['cars' => $cars, 'commentaires' => $commentaires]);
    }
}