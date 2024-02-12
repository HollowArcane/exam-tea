<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";
    
    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin")
    { exit; }

    $id = $_GET["id"];
    $surface = $_POST["surface"];
    $variete = $_POST["variete"];

    try
    {
        updateParcelle(dbConnect(), $id, $surface, $variete);    
        echo "success";
    }
    catch (\Throwable $th)
    { var_dump($th); }
?>