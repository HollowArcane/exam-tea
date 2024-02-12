CREATE DATABASE the;
USE the;

create table admin(
    id INT PRIMARY KEY auto_increment,    
    nom VARCHAR(50), 
    email VARCHAR(255),     
    mdp VARCHAR(255)
);

create table cueilleur(
    id INT PRIMARY KEY auto_increment,    
    nom VARCHAR(50), 
    genre VARCHAR(25),     
    naissance VARCHAR(50),     
    salaire DOUBLE
);

create table variete(
    id INT PRIMARY KEY auto_increment,    
    nom VARCHAR(50), 
    occupation DOUBLE, 
    rendement FLOAT
);

create table parcelle(
    id INT PRIMARY KEY auto_increment,
    surface DOUBLE,
    variete INT REFERENCES variete(id)
);

create table depense(
    id INT PRIMARY KEY auto_increment,
    description VARCHAR(255),
    valeur DOUBLE  
);

INSERT INTO admin (nom, email, mdp) VALUES
('Rambao', 'rambao@gmail.com', sha1('rambao')),
('Randrianjafy', 'randrianjafy@gmail.com', sha1('randrianjafy'));


INSERT INTO cueilleur (nom, genre, naissance, salaire) VALUES
('Cueilleur1', 'Male', '1990-01-15', 1500.00),
('Cueilleur2', 'Female', '1985-07-22', 1800.00);

INSERT INTO variete (nom, occupation, rendement) VALUES  
('The Apple Variety',  100.00,  2.0),
('The Orange Variety',  150.00,  1.5),
('The Grape Variety',  200.00,  3.0);

INSERT INTO parcelle (surface, variete) VALUES  
(10.00,  1),
(15.00,  2),
(20.00,  3);
