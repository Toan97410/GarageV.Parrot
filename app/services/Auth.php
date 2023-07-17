<?php

namespace App\Services;

use App\Models\User;
use App\Services\Session;
use Exception;

class Auth {

    private $userModel;
    private $session;

    public function __construct(User $userModel, Session $session) {
        $this->userModel = $userModel;
        $this->session = $session;
    }

    public function attempt($username, $password) {
        $user = $this->userModel->findByUsername($username);
        if (!$user) { return false; }
        if (password_verify($password, $user['password'])) {
            $this->session->set('user_id', $user['id']);
            return $user;
        }
        return false;
    }
    

    public function check() {
        return $this->session->exists('user_id');
    }

    public function user() {
        if ($this->check()) {
            return $this->userModel->findById($this->session->get('user_id'));
        }
        return null;
    }

    public function authorizeAdmin($username) {
        $username = $this->session->get('username');

        if ($username === NULL) {
            throw new Exception('Vous devez être connecté pour accéder à cette page.');
        }
    
        if (!$this->userModel->isAdmin($username)) {
            throw new Exception('Accès refusé : vous devez être administrateur pour effectuer cette action.');
        }
    }

    public function logout() {
        $this->session->remove('user_id');
    }
}