<?php

namespace Database;

use Exception;
use PDO;
use PDOException;

class Database {

    private $dsn;
    private $user;
    private $password;
    private $pdo;

    public function __construct(array $config) {
        $this->dsn = $config['dsn'];
        $this->user = $config['user'];
        $this->password = $config['password'];
    }

    public function connect() {
        if ($this->pdo === null) {
            try {
                $this->pdo = new PDO($this->dsn, $this->user, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception('Erreur de connexion : ' . $e->getMessage());
            }
        }
        return $this->pdo;
    }
}