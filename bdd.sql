/* mysql */
DROP DATABASE IF EXISTS demo_formulaire;

CREATE DATABASE IF NOT EXISTS demo_formulaire;

USE demo_formulaire;

CREATE TABLE tbl_formulaire 
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL
);