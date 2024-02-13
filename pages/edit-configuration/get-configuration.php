<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";
    
    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin")
    { exit; }

    try
    {
        $database = dbConnect();
        $data = [
            "min_poids" => getPoidsMinimal($database)[0]["valeur"],
            "bonus" => getBonus($database)[0]["valeur"],
            "malus" => getmalus($database)[0]["valeur"],
            "saison" => getRegeneration($database)
        ];

        echo json_encode($data);
    }
    catch (\Throwable $th)
    { var_dump($th); }
?>