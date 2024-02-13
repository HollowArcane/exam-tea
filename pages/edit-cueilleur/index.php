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
    <title>Cueilleurs</title>
    <link rel="stylesheet" href="../../assets/css/cueilleurs.css">

    <script type="text/javascript" src="../../assets/js/function-XHR.js"></script>
    <script type="text/javascript" src="../../assets/js/function.js"></script>
    <script type="text/javascript" src="script.js" defer></script>
</head>
<body>
    <div class="container">
        <header>
            <img src="../../assets/img/The-Star-Online.png" alt="">
            <ul>
                <li><a href="../edit-parcelle">Parcelle</a></li>
                <li><a href="../edit-variete">Variete</a></li>
                <li><a href="../edit-cueilleur" class="active">Cueilleurs</a></li>
                <li><a href="../edit-depense-category">Categories</a></li>
                <li><a href="../edit-configuration">Configuration</a></li>
                <li><a href="../login-admin">Déconnexion</a></li>
            </ul>
        </header>

        <div class="cueilleurs">
            <div class="photo">
                <img src="../../assets/img/cueilleurs.jpg" alt="">
            </div>
            <form update="<?= $_GET["id"] ?? null ?>" id="form">              
                <div class="head">
                    <h1>Cueilleurs</h1>
                    <!-- <img src="../../img/Drinking tea-bro.png" alt="" style="width: 40%;"> -->
                </div>
                <div class="form-control">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" placeholder="Nom">
                </div>
                <div class="form-control">
                    <label>Genre</label>
                    <select name="genre" id="genre">
                        <option value="Male">Masculin</option>
                        <option value="Female">Féminin</option>
                    </select>
                </div>
                <div class="form-control">
                    <label for="dtn">Date de naissance</label>
                    <input type="date" name="naissance" id="dtn" placeholder="Date de naissance">
                </div>
                <div class="form-control">
                    <label for="salaire">Salaire</label>
                    <input type="number" name="salaire" id="salaire" placeholder="Nom">
                </div>

                <input type="submit" value="OK">
                <a href="../list-cueilleur">Go to list CUEILLEURS</a>
            </form>
        </div>
    </div>
</body>
</html>