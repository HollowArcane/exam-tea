<?php
    session_start();
        
    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "user")
    {
        header("Location: ../login-user");
        exit;
    }
?>
