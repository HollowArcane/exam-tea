<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";

    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin")
    { exit; }

    $id = $_GET["id"];
    echo json_encode(getParcelleById(dbConnect(), $id));
?>