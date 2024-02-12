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
    <title>Variete</title>
    <link rel="stylesheet" href="../../assets/css/variete.css">

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
                <li><a href="../edit-variete" class="active">Variete</a></li>
                <li><a href="../edit-cueilleur">Cueilleurs</a></li>
                <li><a href="../edit-depense-category">Categories</a></li>
                <li><a href="../listes.html">Listes</a></li>            </ul>
        </header>

        <div class="variete">
            <div class="photo">
                <img src="../../assets/img/diffe_rents-types-de.jpg" alt="">
            </div>
            <form id="form">              
                <div class="head">
                    <h1>Les varietes</h1>
                    <!-- <img src="../../img/Drinking tea-bro.png" alt="" style="width: 40%;"> -->
                </div>
                <div class="form-control">
                    <label for="nom">Nom Variete</label>
                    <input type="text" name="nom" id="nom" placeholder="Nom variete de the">
                </div>
                <div class="form-control">
                    <label for="password">Occupation</label>
                    <input type="number" name="occupation" id="Occupation" placeholder="Occupation" min="0">
                </div>
                <div class="form-control">
                    <label for="rendement">Rendement</label>
                    <input type="number" name="rendement" id="rendement" placeholder="Rendement par pied" min="0">
                </div>

                <input type="submit" value="OK">
            </form>
        </div>


    </div>
</body>
</html>