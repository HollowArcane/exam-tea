<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";
    
    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "user")
    { exit; }

    $idCategorie = $_POST["idCategorie"];
    $valeur = $_POST["valeur"];
    $date = $_POST["date"];

    try
    {
        insertDepense(dbConnect(), $idCategorie , $valeur , $date);    
        echo "success";
    }
    catch (\Throwable $th)
    { var_dump($th); }
?>