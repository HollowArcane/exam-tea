<?php
    session_start();

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin")
    {
        header("Location: ../login-admin");
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories de depenses</title>
    <link rel="stylesheet" href="../../assets/css/categories.css">

    <script src="../../assets/js/function-XHR.js"></script>
    <script src="../../assets/js/function.js"></script>
    <script src="script.js" defer></script>
</head>
<body>
    <div class="container">
        <header>
            <img src="../../assets/img/The-Star-Online.png" alt="">
            <ul>
                <li><a href="../edit-parcelle">Parcelle</a></li>
                <li><a href="../edit-variete">Variete</a></li>
                <li><a href="../edit-cueilleur">Cueilleurs</a></li>
                <li><a href="../edit-depense-category" class="active">Categories</a></li>
                <li><a href="../edit-configuration">Configuration</a></li>
                <li><a href="../login-admin">Déconnexion</a></li>
            </ul>
        </header>

        <div class="categories">
            <div class="photo">
                <img src="../../assets/img/depenses.jpg" alt="">
            </div>
            <form update="<?= $_GET["id"] ?? null ?>" id="form">              
                <div class="head">
                    <h1>Categories de depenses</h1>
                    <!-- <img src="../../img/Drinking tea-bro.png" alt="" style="width: 40%;"> -->
                </div>
                <div class="form-control">
                    <label for="nom">Nom</label>
                    <input type="text" name="description" id="nom" placeholder="Nom">
                </div>
                

                <input type="submit" value="OK">
                <a href="../list-depense-category">Go to list CATEGORIES</a>
            </form>
        </div>
    </div>
</body>
</html>