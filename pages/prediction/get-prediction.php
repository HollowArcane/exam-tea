<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";
    
    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin")
    { exit; }

    $date = $_POST["date"];

    try
    {
        $data = getFinalData(dbConnect(), $date);
        echo json_encode($data);
    }
    catch (\Throwable $th)
    { var_dump($th); }
?>