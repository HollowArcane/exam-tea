<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";
    
    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "user")
    { exit; }

    $idCueilleur = $_POST["idCueilleur"];
    $idParcelle = $_POST["idParcelle"];
    $quantite = $_POST["quantite"];
    $date = $_POST["date"];

    try
    {
        insertCueillete(dbConnect(), $idCueilleur , $idParcelle , $quantite , $date);    
        echo "success";
    }
    catch (\Throwable $th)
    { var_dump($th); }
?>