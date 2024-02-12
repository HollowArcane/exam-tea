<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";
    
    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "user")
    { exit; }

    $date_debut = $_POST["date_debut"];
    $date_fin = $_POST["date_fin"];
    $database = dbConnect();

    try
    {
        $data = [
            "poids_total" => totalCueillette($database, $date_debut, $date_fin),
            "poids_restant" => quantiteRestante($database, $date_fin),
            "cout_revient" => sumDepense($database, $date_debut , $date_fin)
        ];

        echo json_encode($data);
    }
    catch (\Throwable $th)
    { var_dump($th); }
?>