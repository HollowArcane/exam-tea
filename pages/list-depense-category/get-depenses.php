<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";

    session_start();

    if(!isset($_SESSION["role"]))
    { exit; }

    echo json_encode(getDepenseCategorie(dbConnect()));
?>