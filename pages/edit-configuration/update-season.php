<?php
    require "../../inc/connexion.php";
    require "../../inc/function.php";
    
    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin")
    { exit; }

    $inputs = $_POST;

    $months = [
        "janvier" => 1, "fevrier" => 2, "mars" => 3, "avril" => 4,
        "mai" => 5, "juin" => 6, "juillet" => 7, "aout" => 8,
        "septembre" => 9, "octobre" => 10, "novembre" => 11, "decembre" => 12
    ];

    try
    {
        deleteRegeneration(dbConnect());
        foreach($inputs as $input => $value)
        {
            if($value == "on")
            { insertRegeneration(dbConnect(), $months[$input], $months[$input] < 10 ? '0'.$months[$input]: $months[$input]); }
        }
        echo "success";
    }
    catch (\Throwable $th)
    { var_dump($th); }
?>