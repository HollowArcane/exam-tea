<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";
    
    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin")
    { exit; }

    $nom = $_POST["nom"];
    $occupation = $_POST["occupation"];
    $rendement = $_POST["rendement"];

    try
    {
        insertVariety(dbConnect(), $nom, $occupation , $rendement);    
        echo "success";
    }
    catch (\Throwable $th)
    { var_dump($th); }
?>