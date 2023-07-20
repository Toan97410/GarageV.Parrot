<?php

namespace App\Models;

use Database\Database;
use Exception;
use PDOException;

class Commentaires extends Model {

    public function __construct(Database $database) {
        parent::__construct($database);
    }


    public function getAll() {
        $sql = "SELECT * FROM commentaire";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
    }

    public function create($nom, $commentaire) {
      $sql = "INSERT INTO commentaire (nom, commentaire) VALUES (?, ?)";
      try {
          $stmt = $this->database->connect()->prepare($sql);
          $stmt->execute([$nom, $commentaire]);
      } catch(PDOException $e) {
          throw new Exception('Erreur : ' . $e->getMessage());
      }
  }
  
  public function update($id, $nom, $commentaire) {
    $sql = "UPDATE commentaire SET nom = ?, commentaire = ? WHERE id = ?";
    try {
        $stmt = $this->database->connect()->prepare($sql);
        $stmt->execute([$nom, $commentaire, $id]);
    } catch(PDOException $e) {
        throw new Exception('Erreur : ' . $e->getMessage());
    }
}

public function findById($id) {
  $sql = "SELECT * FROM commentaire WHERE id = :id";
  try {
      $stmt = $this->database->connect()->prepare($sql);
      $stmt->execute(['id' => $id]);
      return $stmt->fetch();
  } catch(PDOException $e) {
      throw new Exception('Erreur : ' . $e->getMessage());
  }
}

public function deleteById($id) {
  $sql = "DELETE FROM commentaire WHERE id = :id";
  try {
      $stmt = $this->database->connect()->prepare($sql);
      $result = $stmt->execute(['id' => $id]);
      return $result;
  } catch(PDOException $e) {
      throw new Exception('Erreur : ' . $e->getMessage());
  }
}
}