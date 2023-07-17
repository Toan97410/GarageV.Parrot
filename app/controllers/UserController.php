<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\Auth;
use App\Services\Config;
use Database\Database;

class UserController extends Controller{

    private $config;
    private $database;

    public function __construct() {
        parent::__construct();
        $this->config = Config::getInstance()->get('database');
        $this->database = new Database($this->config);
    }

    public function index() {
        $session = $this->sessionMiddleware->getSession();
        $userModel = new User($this->database);

        $user = $session->get('user');
        $username = $user['username'];

        if($username === NULL){
            $this->redirect('/occasions', "Accès refusé : vous devez être connecté pour effectuer cette action.");
        }

        if (!$userModel->isAdmin($username)) {
            $this->redirect('/occasions', "Accès refusé : vous devez être administrateur pour effectuer cette action.");
        }
        $users = $userModel->getAll();
        extract(compact('users'));
        $this->renderView('/admin/user/index', ['users' => $users]);
    }

    public function addUser() {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = 'worker';
        $userModel = new User($this->database);
        $userModel->create($username, $email, $password, $role);
        $this->redirect('/user', "Vous avez bien ajouté l'utilisateur suivant : <span class='gv-fw-700'>" . $username . "</span>");
    }

    public function register() {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = 'guest';
        $userModel = new User($this->database);
        $userModel->create($username, $email, $password, $role);

        $session = $this->sessionMiddleware->getSession();
        $auth = new Auth($userModel, $session);
        
        $user = $auth->attempt($username, $password);
        if ($user !== false) {
            $this->sessionMiddleware->getSession()->set('user', $user);
            $this->redirect('/occasions', "Vous êtes maintenant connecté!");
        } else {
            $this->redirect('/connexion', "La connexion a échoué, veuillez réessayer!");
        }
    }


    public function showEditForm($params) {
        $id = $params['id'];
        $userModel = new User($this->database);
        $user = $userModel->findById($id);
        $this->renderView('/admin/user/edit', ['user' => $user]);
    }
    
    public function edit($params) {
        $id = $params['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $userModel = new User($this->database);
        $userModel->update($id, $username, $email);
        $this->redirect('/user', "L'utilisateur : <span class='gv-fw-700'>" . $username . "</span> a été mis à jour avec succès.");
    }

    public function delete($params) {
        $id = $params['id'];
        $userModel = new User($this->database);
        $userById = $userModel->findById($id);
        $user = $userById['username'];
        $result = $userModel->deleteById($id);

        if($result) {
            $this->redirect('/user', "L'utilisateur : <span class='gv-fw-700'>" . $user . "</span> a bien été supprimer.");
        } else {
            $this->redirect('/user', "Erreur lors de la suppression de l'utilisateur");
        }
    }


      
    public function logout() {
        $session = $this->sessionMiddleware->getSession();
        $session->set('message', "Vous êtes déconnecté!");
        $session->logout();
    }
}