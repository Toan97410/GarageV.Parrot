CREATE DATABASE garagevparrot
  DEFAULT CHARACTER SET = 'utf8mb4';

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'worker', 'guest') DEFAULT 'guest',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE cars (
    id INT PRIMARY KEY AUTO_INCREMENT,
    marque VARCHAR(255),
    modele VARCHAR(255),
    kilometrage INT,
    carburant VARCHAR(255),
    boite_de_vitesse VARCHAR(255),
    annee_du_vehicule YEAR,
    chevaux_fiscaux INT,
    nombre_de_place INT,
    nombre_de_porte INT,
    couleur VARCHAR(255),
    prix DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
);

CREATE TABLE commentaire (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    contenu_commentaire VARCHAR(10000)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
);