# ECFSTUDI
# Pour se connecter en tant qu'administrateur :
email : vincentparrot@gmail.com
mot de passe : vincent parrot

et en tant qu'employé : 
email : anasszehafi@gmail.com
mot de passe : anasszehafi

# Guide 




Le code pour la base de données :

CREATE DATABASE ecfgaragestudi;

USE ecfgaragestudi;

CREATE TABLE commentaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(255) NOT NULL,
    commentaire TEXT NOT NULL,
    etat VARCHAR(50) NOT NULL DEFAULT 'En attente d''approbation'
);

CREATE TABLE administrateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL
);
-- Insertion d'un administrateur exemple
INSERT INTO administrateur (nom, email, mot_de_passe)
VALUES ('vincent', 'vincentparrot@gmail.com', 'vincentparrot');


CREATE TABLE employe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL
);
--Pour tester--
INSERT INTO employe (nom, email, mot_de_passe)
VALUES ('anass', 'anasszehafi@gmail.com', 'anasszehafi');

CREATE TABLE voitures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modele VARCHAR(255) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    annee INT NOT NULL,
    kilometrage INT NOT NULL,
    image VARCHAR(255) NOT NULL
);


SELECT * FROM voitures
WHERE 
    (prix BETWEEN 0 AND 2000)
    OR (prix BETWEEN 2000 AND 5000)
    OR (prix BETWEEN 5000 AND 10000)
    OR (prix >= 10000)
    AND
    (kilometrage BETWEEN 0 AND 50000)
    OR (kilometrage BETWEEN 50000 AND 100000)
    OR (kilometrage >= 100000)
    AND
    (annee BETWEEN 2000 AND 2005)
    OR (annee BETWEEN 2005 AND 2010)
    OR (annee >= 2010);
