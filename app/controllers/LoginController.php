<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\Auth;
use App\Services\Config;
use Database\Database;

class LoginController extends Controller{

    private $userModel;

    public function __construct() {
        parent::__construct();
        $config = Config::getInstance()->get('database');
        $database = new Database($config);
        $this->userModel = new User($database);
    }
   
    public function index() {
        $this->renderView('connexion');
    }

    public function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $session = $this->sessionMiddleware->getSession();
        $auth = new Auth($this->userModel, $session);
        
        $user = $auth->attempt($username, $password);
        if ($user !== false) {
            $this->sessionMiddleware->getSession()->set('user', $user);
            $this->redirect('/occasions', "Vous êtes maintenant connecté!");
        } else {
            $this->redirect('/connexion', "La connexion a échoué, veuillez réessayer!");
        }
    }
}