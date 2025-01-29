/* mysql */
DROP DATABASE IF EXISTS portfolio;

CREATE DATABASE IF NOT EXISTS portfolio;

USE portfolio;

CREATE TABLE clients 
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(60) NOT NULL,
    email VARCHAR(60) NOT NULL,
    messages VARCHAR(500)
);