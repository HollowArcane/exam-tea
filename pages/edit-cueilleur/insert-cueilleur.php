<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";
    
    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin")
    { exit; }

    $nom = $_POST["nom"];
    $genre = $_POST["genre"];
    $naissance = $_POST["naissance"];
    $salaire = $_POST["salaire"];

    try
    {
        insertCueilleur(dbConnect(), $nom, $genre , $naissance , $salaire);    
        echo "success";
    }
    catch (\Throwable $th)
    { var_dump($th); }
?>