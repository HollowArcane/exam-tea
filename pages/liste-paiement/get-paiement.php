<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";
    
    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "user")
    { exit; }

    $date_debut = $_POST["date_debut"];
    $date_fin = $_POST["date_fin"];

    try
    {
        $data = getPaiement(dbConnect(), $date_debut, $date_fin);
        echo json_encode($data);
    }
    catch (\Throwable $th)
    { var_dump($th); }
?>