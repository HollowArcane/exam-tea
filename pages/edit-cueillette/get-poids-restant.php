<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";
    
    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "user")
    { exit; }

    $lasts = [ 0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];
    $date_split = explode("-", $_POST["date"]);

    $date = $date_split[0]."-".$date_split[1]."-".$lasts[(int)$date_split[1]];
    $id = $_POST["idParcelle"];

    try
    {
        $data = quantiteRestante(dbConnect(), $date);
        foreach($data as $item)
        {
            if($item["id_parcelle"] == $id)
            { echo $item["reste"]; }
        }
    }
    catch (\Throwable $th)
    { var_dump($th); }
?>