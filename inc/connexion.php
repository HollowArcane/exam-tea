<?php
    function dbConnect(){    
        $serveur = "localhost";
        $utilisateur = "root";
        $motDePasse = "43710";
        $nomBDD = "the";  
        $connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $nomBDD);
        if (!$connexion) {
            die("La connexion à la base de données a échoué : " . mysqli_connect_error());
        }
        return $connexion;
    }
?>