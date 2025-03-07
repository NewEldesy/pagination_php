CREATE DATABASE gestion_gardiens;
USE gestion_gardiens;

-- Table des gardiens
CREATE TABLE Gardiens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    photo VARCHAR(255),
    description TEXT,
    competences TEXT,
    disponibilites TEXT,
    tarif DECIMAL(10, 2),
    note_moyenne DECIMAL(3, 2) DEFAULT 0,
    missions_realisees INT DEFAULT 0
);

-- Table des clients
CREATE TABLE Clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL
);

-- Table des missions
CREATE TABLE Missions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    gardien_id INT,
    date_debut DATETIME,
    date_fin DATETIME,
    statut ENUM('en_attente', 'en_cours', 'terminee') DEFAULT 'en_attente',
    FOREIGN KEY (client_id) REFERENCES Clients(id),
    FOREIGN KEY (gardien_id) REFERENCES Gardiens(id)
);

-- Table des notes
CREATE TABLE Notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gardien_id INT,
    client_id INT,
    note INT CHECK (note BETWEEN 1 AND 5),
    commentaire TEXT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (gardien_id) REFERENCES Gardiens(id),
    FOREIGN KEY (client_id) REFERENCES Clients(id)
);
