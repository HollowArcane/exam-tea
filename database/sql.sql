CREATE DATABASE the;
USE the;

create table admin(
    id INT PRIMARY KEY auto_increment,    
    nom VARCHAR(50), 
    email VARCHAR(255),     
    mdp VARCHAR(255)
);

create table variete(
    id INT PRIMARY KEY auto_increment,    
    nom VARCHAR(50), 
    occupation DOUBLE, 
    rendement FLOAT,
    prix FLOAT
);

create table parcelle(
    id INT PRIMARY KEY auto_increment,
    surface DOUBLE,
    variete INT REFERENCES variete(id)
);

create table categorie(
    id INT PRIMARY KEY auto_increment,
    description VARCHAR(255)
);

create table depense(
    idDepense INT PRIMARY KEY auto_increment,
    idCategorie INT REFERENCES categorie(id),
    valeur DOUBLE,
    date Date
);

CREATE TABLE cueillette (
    id INT PRIMARY KEY AUTO_INCREMENT,
    idCueilleur INT,
    idParcelle INT,
    quantite DOUBLE,
    date DATE    
);

create table cueilleur(
    id INT PRIMARY KEY auto_increment,    
    nom VARCHAR(50), 
    genre VARCHAR(25),     
    naissance VARCHAR(50),     
    salaire DOUBLE
);

create table user(
    id INT PRIMARY KEY auto_increment,    
    nom VARCHAR(50), 
    email VARCHAR(255),     
    mdp VARCHAR(255)
);

CREATE TABLE mois_regeneration(
    mois INT,
    label VARCHAR(2)
);

CREATE TABLE configuration(
    id INT PRIMARY KEY auto_increment,    
    description VARCHAR(50),
    valeur FLOAT
);

INSERT INTO configuration VALUES(NULL, 'poids minimum', 10),(NULL, 'bonus', 10),(NULL, 'malus', 10);





INSERT INTO mois_regeneration VALUES(1, '01'),(3, '03'),(4, '04');

CREATE OR REPLACE VIEW v_mois_regeneration AS
SELECT * FROM mois_regeneration
UNION ALL SELECT mois - 12, label FROM mois_regeneration; 

insert into user (nom , email , mdp) values ('mamihery' , 'mamihery@gmail.com' , sha1('mamihery') );

INSERT INTO admin (nom, email, mdp) VALUES
('Rambao', 'rambao@gmail.com', sha1('rambao')),
('Randrianjafy', 'randrianjafy@gmail.com', sha1('randrianjafy'));


INSERT INTO cueilleur (nom, genre, naissance, salaire) VALUES
('Cueilleur1', 'Male', '1990-01-15', 1500.00),
('Cueilleur2', 'Female', '1985-07-22', 1800.00);

INSERT INTO variete (nom, occupation, rendement , prix) VALUES  
('The Apple Variety',  100.00,  2.0 , 1000),
('The Orange Variety',  150.00,  1.5 , 1000),
('The Grape Variety',  200.00,  3.0 , 1000);

INSERT INTO parcelle (surface, variete) VALUES  
(10.00,  1),
(15.00,  2),
(20.00,  3);

INSERT INTO cueillette (idCueilleur, idParcelle, quantite, date) VALUES
(1, 1, 500, '2024-02-01'),
(1, 2, 300, '2024-02-02'),
(2, 2, 400, '2024-02-02');

INSERT INTO cueillette (idCueilleur, idParcelle, quantite, date) VALUES
(2, 1, 2, '2024-02-01');

insert into categorie (description) values 
('logistique'),
('carburant'),
('engrais');


CREATE VIEW v_pieds_par_parcelle AS
SELECT
    p.id AS id_parcelle,
    COALESCE(v.nom,"") AS nom_du_variete,
    p.surface * 10000 AS surface_metres_carres, 
    COALESCE(v.occupation,0) AS occupation_pieds_par_metre_carre,
    COALESCE(ROUND((p.surface * 10000) / v.occupation),0) AS nombre_de_pieds,
    COALESCE(ROUND((p.surface * 10000) / v.occupation) * v.rendement , 0) AS kg_cueillette_par_mois

FROM
    parcelle p
LEFT JOIN
    variete v ON p.variete = v.id;

CREATE VIEW v_salaire_par_cueillette AS
SELECT    
    ct.id,
    c.id as id_cueilleur,
    c.nom,
    ct.date,
    ct.quantite,
    ct.quantite * c.salaire as salaire 
FROM
    cueillette as ct
JOIN
    cueilleur c ON c.id = ct.idCueilleur;


CREATE OR REPLACE VIEW v_vente_cueillette AS
SELECT
    c.date, c.quantite*v.prix AS valeur
FROM 
    cueillette as c
JOIN 
    parcelle as p
ON
    p.id = c.idParcelle
JOIN
    variete as v
ON
    p.variete = v.id;


