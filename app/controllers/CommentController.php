<?php

namespace App\Controllers;

use App\Models\Commentaires;
use App\Services\Auth;
use App\Services\Config;
use Database\Database;
class CommentController extends Controller{
   
    private $config;
    private $database;

    public function __construct() {
        parent::__construct();
        $this->config = Config::getInstance()->get('database');
        $this->database = new Database($this->config);
    }

    public function index() {
        $this->renderView('commentaires');
    }

    public function addCommentaires() {
        $username = $_POST['username'];
        $contenu_commentaire = $_POST['message'];

        $CommentairesModel = new Commentaires($this->database);
        $CommentairesModel->create($username, $contenu_commentaire);
        $this->redirect('/commentaires', "le commentaire à bien été envoyé");
    }
    public function edit($params) {
        $nom = $_POST['username'];
        $commentaire = $_POST['message'];
        $id = $params['id'];
        $CommentairesModel = new Commentaires($this->database);
        $CommentairesModel->update($id, $nom, $commentaire);
        $this->redirect('/commentaires', "le commentaire à bien été envoyé");
    }

    public function showEditForm($params) {
        $id = $params['id'];
        $CommentairesModel = new Commentaires($this->database);
        $commentaire = $CommentairesModel->findById($id);
        $this->renderView('/commentaires', ['commentaires' => $commentaire]);
    }
}