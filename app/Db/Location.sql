CREATE DATABASE Location; 
Use Location;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    passwordHash VARCHAR(255) NOT NULL,
    photo VARCHAR(255),
    role ENUM('UTILISATEUR', 'ADMIN') DEFAULT 'UTILISATEUR'
) ENGINE=INNODB;

CREATE TABLE maison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT NOT NULL,
    nom VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    village VARCHAR(100) NOT NULL,
    pays ENUM('Belgique', 'France', 'Italie') NOT NULL,
    photo VARCHAR(255),
    FOREIGN KEY (admin_id) REFERENCES user(id) ON UPDATE CASCADE
) ENGINE=INNODB;

CREATE TABLE saison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    annee INT NOT NULL,
    type ENUM('BASSE', 'MOYENNE', 'HAUTE') NOT NULL,
    debut DATE NOT NULL,
    fin DATE NOT NULL
);

CREATE TABLE disponibilite (
    id INT AUTO_INCREMENT PRIMARY KEY,
    maison_id INT NOT NULL,
    debut DATE NOT NULL,
    fin DATE NOT NULL,
    statut ENUM('DISPONIBLE', 'INDISPONIBLE') NOT NULL,
    raison TEXT,
    FOREIGN KEY (maison_id) REFERENCES maison(id) ON DELETE CASCADE
);

CREATE TABLE reservation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    maison_id INT NOT NULL,
    debut DATE NOT NULL,
    fin DATE NOT NULL,
    statut ENUM('EN ATTENTE', 'CONFIRMÉE', 'ANNULÉE') DEFAULT 'EN ATTENTE',
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
    FOREIGN KEY (maison_id) REFERENCES maison(id) ON DELETE CASCADE
    --datePayementPrevue
);

CREATE TABLE paiement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT NOT NULL,
    montant DECIMAL(10,2) NOT NULL,
    date_paiement DATE,
    statut ENUM('EN ATTENTE', 'PAYÉ', 'ÉCHOUÉ') DEFAULT 'EN ATTENTE',
    FOREIGN KEY (reservation_id) REFERENCES reservation(id) ON DELETE CASCADE
);
/*
CREATE TABLE notification (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    message TEXT NOT NULL,
    date_envoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    lu BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
);
*/
-- savoir pq avoir mis on delete cascade 
-- savoir pq avoir mis Text
--rajouter table bloqué


UPDATE location.user 
SET role = 'ADMIN' 
WHERE username = 'Dylan';
