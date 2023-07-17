<?php

namespace App\Models;

use Database\Database;
use Exception;
use PDOException;

class Car extends Model {

    public function __construct(Database $database) {
        parent::__construct($database);
    }

    public function getAll() {
        $sql = "SELECT * FROM cars";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
    }

    public function create($marque, $modele, $kilometrage, $carburant, $boite_de_vitesse, $annee_du_vehicule, $chevaux_fiscaux, $nombre_de_place, $nombre_de_porte, $couleur, $prix) {
        $sql = "INSERT INTO cars (marque, modele, kilometrage, carburant, boite_de_vitesse, annee_du_vehicule, chevaux_fiscaux, nombre_de_place, nombre_de_porte, couleur, prix) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute([$marque, $modele, $kilometrage, $carburant, $boite_de_vitesse, $annee_du_vehicule, $chevaux_fiscaux, $nombre_de_place, $nombre_de_porte, $couleur, $prix]);
        } catch(PDOException $e) {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
    }

    public function update($id, $marque, $modele, $kilometrage, $carburant, $boite_de_vitesse, $annee_du_vehicule, $chevaux_fiscaux, $nombre_de_place, $nombre_de_porte, $couleur, $prix) {
        $sql = "UPDATE cars SET marque = ?, modele = ?, kilometrage = ?, carburant = ?, boite_de_vitesse = ?, annee_du_vehicule = ?, chevaux_fiscaux = ?, nombre_de_place = ?, nombre_de_porte = ?, couleur = ?, prix = ? WHERE id = ?";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute([$marque, $modele, $kilometrage, $carburant, $boite_de_vitesse, $annee_du_vehicule, $chevaux_fiscaux, $nombre_de_place, $nombre_de_porte, $couleur, $prix, $id]);
        } catch(PDOException $e) {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
    }

    public function findById($id) {
        $sql = "SELECT * FROM cars WHERE id = :id";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        } catch(PDOException $e) {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
    }

    public function deleteById($id) {
        $sql = "DELETE FROM cars WHERE id = :id";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $result = $stmt->execute(['id' => $id]);
            return $result;
        } catch(PDOException $e) {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
    }

    public function findByMarque($marque) {
        $sql = "SELECT * FROM cars WHERE marque = :marque";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute(['marque' => $marque]);
            return $stmt->fetch();
        } catch(PDOException $e) {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
    }
    
}