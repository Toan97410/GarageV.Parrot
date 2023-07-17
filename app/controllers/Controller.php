<?php 
namespace App\Controllers;

use App\Middleware\SessionMiddleware;

class Controller {
    protected $sessionMiddleware;

    public function __construct() {
        $this->sessionMiddleware = new SessionMiddleware();
    }

    public function renderView($viewName, $data = []) {
        $view = ROOT . '/resources/views/' . $viewName . '.php';
        if (file_exists($view)) {
            extract($data);  // Extraction des données pour qu'elles soient utilisées comme des variables individuelles
            require $view;
        } else {
            throw new \Exception("La vue n'a pas été trouvé");
        }
    }

    public function redirect($url, $message = null) {
        if ($message) {
            $this->sessionMiddleware->getSession()->set('message', $message);
        }
        header('Location: ' . $url);
        exit();
    }
}