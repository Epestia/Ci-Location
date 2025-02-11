create database ExerciceCI;
use ExerciceCi;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL
);

INSERT INTO users (nom, prenom) VALUES ('Dupont', 'Jean'), ('Martin', 'Marie'), ('Lefevre', 'Claude'), ('Moreau', 'Sophie'), ('Durand', 'Louis'), ('Petit', 'Paul'), ('Robert', 'Lucie'), ('Richard', 'Elise'), ('Simon', 'Pierre'), ('Laurent', 'Julie');
SELECT * FROM users;
