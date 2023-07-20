<?php

namespace App\Controllers;

use App\Models\Car;
use App\Services\Auth;
use App\Services\Config;
use Database\Database;
use App\Models\Image;


class CarController extends Controller{

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
        $this->renderView('/admin/car/index', ['cars' => $cars]);
    }

    public function addCar() {
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $kilometrage = $_POST['kilometrage'];
        $carburant = $_POST['carburant'];
        $boiteDeVitesse = $_POST['boite_de_vitesse'];
        $annee_du_vehicule = $_POST['annee_du_vehicule'];
        $chevauxFiscaux = $_POST['chevaux_fiscaux'];
        $nombreDePlace = $_POST['nombre_de_place'];
        $nombreDePorte = $_POST['nombre_de_porte'];
        $couleur = $_POST['couleur'];
        $prix = $_POST['prix'];


        $carModel = new Car($this->database);
        $carModel->create($marque, $modele, $kilometrage, $carburant, $boiteDeVitesse, $annee_du_vehicule, $chevauxFiscaux, $nombreDePlace, $nombreDePorte, $couleur, $prix);
        $this->redirect('/car', "La voiture a bien été ajoutée.");
    }

    public function showEditForm($params) {
        $id = $params['id'];
        $carModel = new Car($this->database);
        $car = $carModel->findById($id);
        $this->renderView('/admin/car/edit', ['car' => $car]);
    }
    
    public function edit($params) {
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $kilometrage = $_POST['kilometrage'];
        $carburant = $_POST['carburant'];
        $boiteDeVitesse = $_POST['boite_de_vitesse'];
        $annee_du_vehicule = $_POST['annee_du_vehicule'];
        $chevauxFiscaux = $_POST['chevaux_fiscaux'];
        $nombreDePlace = $_POST['nombre_de_place'];
        $nombreDePorte = $_POST['nombre_de_porte'];
        $couleur = $_POST['couleur'];
        $prix = $_POST['prix'];
        $id = $params['id'];
        $carModel = new Car($this->database);
        $carModel->update($id,$marque, $modele, $kilometrage, $carburant, $boiteDeVitesse, $annee_du_vehicule, $chevauxFiscaux, $nombreDePlace, $nombreDePorte, $couleur, $prix);
        $this->redirect('/car', "La voiture a été mise à jour avec succès.");
    }

    public function delete($params) {
        $id = $params['id'];
        $carModel = new Car($this->database);
        $carById = $carModel->findById($id);
        $result = $carModel->deleteById($id);
        if($result) {
            $this->redirect('/car', "La voiture a bien été supprimée.");
        } else {
            $this->redirect('/car', "Erreur lors de la suppression de la voiture");
        }
    }
}