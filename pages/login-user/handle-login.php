<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";

    session_start();

    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = loginUser(dbConnect(), $email, $password);
    if($result == null)
    {
        echo "error";
        unset($_SESSION["id"]);
        unset($_SESSION["role"]);
    }
    else
    {
        $_SESSION["id"] = $result;
        $_SESSION["role"] = "user";
        echo "success"; 
    }
?>