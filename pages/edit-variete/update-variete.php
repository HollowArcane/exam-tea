<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";
    
    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin")
    { exit; }

    $id = $_GET["id"];
    $nom = $_POST["nom"];
    $occupation = $_POST["occupation"];
    $rendement = $_POST["rendement"];
    $prix = $_POST["prix"];

    try
    {
        updateVariety(dbConnect(), $id, $nom, $occupation , $rendement, $prix);    
        echo "success";
    }
    catch (\Throwable $th)
    { var_dump($th); }
?>