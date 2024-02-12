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

    try
    {
        updateVariety(dbConnect(), $id, $nom, $occupation , $rendement);    
        echo "success";
    }
    catch (\Throwable $th)
    { var_dump($th); }
?>