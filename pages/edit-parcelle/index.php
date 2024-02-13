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
    <title>Acceuil Administrateur</title>
    <link rel="stylesheet" href="../../assets/css/parcelle.css">

    <script src="../../assets/js/function-XHR.js"></script>
    <script src="../../assets/js/function-DOM.js"></script>
    <script src="../../assets/js/function.js"></script>
    <script src="script.js" defer></script>
</head>
<body>
    <div class="container">

        <header>
            <img src="../../assets/img/The-Star-Online.png" alt="">
            <ul>
                <li><a href="../edit-parcelle" class="active">Parcelle</a></li>
                <li><a href="../edit-variete">Variete</a></li>
                <li><a href="../edit-cueilleur">Cueilleurs</a></li>
                <li><a href="../edit-depense-category">Categories</a></li>
                <li><a href="../edit-configuration">Configuration</a></li>
                <li><a href="../login-admin">Déconnexion</a></li>
            </ul>
        </header>
        
        <div class="parcelle">
            <div class="photo">
                <img src="../../assets/img/parcelle.jpg" alt="">
            </div>
            <form update="<?= $_GET["id"] ?? null ?>" id="form">              
                <div class="head">
                    <h1>Parcelle</h1>
                    <!-- <img src="../../img/Drinking tea-bro.png" alt="" style="width: 40%;"> -->
                </div>
                <div class="form-control">
                    <label for="surface">Surface en hectare</label>
                    <input type="number" name="surface" id="surface" placeholder="Surface en hectare">
                </div>
                <div class="form-control">
                    <label>Variete de thé à planter</label>
                    <select id="variete" name="variete">
                        <option value="" hidden>Choisir variete de the</option>
                        <option value="">Ato fotsiny</option>
                    </select>
                </div>

                <input type="submit" value="OK">
                <a href="../list-parcelle">Go to list</a>
            </form>
        </div>
    </div>
</body>
</html>