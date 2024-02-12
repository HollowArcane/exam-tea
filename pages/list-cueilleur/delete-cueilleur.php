<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";
    
    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin")
    { exit; }

    $id = $_GET["id"];

    try
    {
        deleteCueilleur(dbConnect(), $id);    
        echo "success";
    }
    catch (\Throwable $th)
    { var_dump($th); }
?>