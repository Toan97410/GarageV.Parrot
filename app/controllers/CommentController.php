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

    public function addCar() {
        $username = $_POST['username'];
        $contenu_commentaire = $_POST['contenu_commentaire'];

        $CommentairesModel = new Commentaires($this->database);
        $CommentairesModel->create($username, $contenu_commentaire);
        $this->redirect('/car', "La voiture a bien été ajoutée.");
    }
    public function edit($params) {
        $username = $_POST['username'];
        $contenu_commentaire = $_POST['username'];
        $id = $params['id'];
        $CommentairesModel = new Commentaires($this->database);
        $CommentairesModel->update($id, $username, $contenu_commentaire);
        $this->redirect('/commentaires', "La voiture a été mise à jour avec succès.");
    }

}