<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";

    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin")
    { exit; }

    echo json_encode(getAllDepense(dbConnect()));
?>