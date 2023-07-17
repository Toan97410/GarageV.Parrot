<?php

namespace App\Models;

use Database\Database;
use Exception;
use PDOException;

class User extends Model {

    public function __construct(Database $database) {
        parent::__construct($database);
    }

    public function getAll() {
        $sql = "SELECT * FROM users";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
    }

    public function create($username, $email, $password, $role = 'guest') {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute([$username, $email, $hashedPassword, $role]);
        } catch(PDOException $e) {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
    }
    

    public function update($id, $username, $email) {
        $sql = "UPDATE users SET username = ?, email = ? WHERE id = ?";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute([$username, $email, $id]);
        } catch(PDOException $e) {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
    }

    public function findByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = :username";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute(['username' => $username]);
            return $stmt->fetch();
        } catch(PDOException $e) {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
    }

    public function findById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        } catch(PDOException $e) {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
    }

    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute(['email' => $email]);
            return $stmt->fetch();
        } catch(PDOException $e) {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
    }

    public function deleteById($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $result = $stmt->execute(['id' => $id]);
            return $result;
        } catch(PDOException $e) {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
    }

    public function isAdmin($username) {
        $user = $this->findByUsername($username);
        if (!$user) {
            throw new Exception('Utilisateur non trouvé');
        }
        return $user['role'] === 'admin';
    }

    public function isWorker($username) {
        $user = $this->findByUsername($username);
        if (!$user) {
            throw new Exception('Utilisateur non trouvé');
        }
        return $user['role'] === 'worker';
    }
    
}