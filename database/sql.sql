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
    date DATE,
    FOREIGN KEY (idCueilleur) REFERENCES cueilleur(id),
    FOREIGN KEY (idParcelle) REFERENCES parcelle(id)
);

create table user(
    id INT PRIMARY KEY auto_increment,    
    nom VARCHAR(50), 
    email VARCHAR(255),     
    mdp VARCHAR(255)
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

INSERT INTO cueillette (idCueilleur, idParcelle, quantite, date) VALUES
(1, 1, 500, '2024-02-01'),
(1, 2, 300, '2024-02-02'),
(2, 2, 400, '2024-02-02');

insert into categorie (description) values 
('logistique'),
('carburant'),
('engrais');


------- VIEW ----------
CREATE VIEW v_pieds_par_parcelle AS
SELECT
    p.id AS id_parcelle,
    v.nom AS nom_du_variete,
    p.surface * 10000 AS surface_metres_carres, 
    v.occupation AS occupation_pieds_par_metre_carre,
    ROUND((p.surface * 10000) / v.occupation) AS nombre_de_pieds,
    ROUND((p.surface * 10000) / v.occupation) * v.rendement AS kg_cueillette_par_mois
FROM
    parcelle p
JOIN
    variete v ON p.variete = v.id;


CREATE VIEW v_cueillie_par_parcelle AS
SELECT 
    idParcelle as id_parcelle, 
    SUM(quantite) as quantite_total, 
    MONTH(date) as mois, 
    YEAR(date) as annees  
FROM 
    cueillette 
GROUP BY 
    id_parcelle , mois , annees ;


SELECT 
    vc.*,     
    vp.kg_cueillette_par_mois - vc.quantite_total  as quantite_restante
FROM
    v_pieds_par_parcelle as vp
JOIN
    v_cueillie_par_parcelle as vc
ON
    vp.id_parcelle = vc.id_parcelle
WHERE 
    mois = '02'
AND
    annees = '2024';



SELECT
    SUM(quantite) as total_cueillette,
    MONTH(date) as mois, 
    YEAR(date) as annees  
FROM
    cueillette
WHERE 
    MONTH(date) = '2'
GROUP BY
    mois , annees;



SELECT SUM(valeur) as depense_total , idCategorie , date FROM Depense WHERE MONTH(date) = '2'AND YEAR(date) = '2024';
