<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";
    
    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin")
    { exit; }

    $label = $_GET["label"];
    $value = $_POST["value"];

    try
    {
        updateConfiguration(dbConnect(), $label, $value);
        echo "success";
    }
    catch (\Throwable $th)
    { var_dump($th); }
?>