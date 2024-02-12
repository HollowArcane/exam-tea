<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";
    
    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin")
    { exit; }

    $desc = $_POST["description"];
    try
    {
        insertCategorie(dbConnect(), $desc);    
        echo "success";
    }
    catch (\Throwable $th)
    { var_dump($th); }
?>