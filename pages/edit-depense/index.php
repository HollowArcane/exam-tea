<?php
    session_start();
    
    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "user")
    {
        header("Location: ../login-user");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie des depenses</title>
    <link rel="stylesheet" href="../../assets/css/saisie_depenses.css">

    <script type="text/javascript" src="../../assets/js/function-XHR.js"></script>
    <script type="text/javascript" src="../../assets/js/function-DOM.js"></script>
    <script type="text/javascript" src="../../assets/js/function.js"></script>
    <script type="text/javascript" src="script.js" defer></script>
</head>
<body>
    
    <div class="container">      
        <header>
            <img src="../../assets/img/The-Star-Online.png" alt="">
            <ul>
                
                <li><a href="../edit-cueillette">Saisie de cueillettes</a></li>
                <li><a href="../edit-depense" class="active">Saisie des depenses</a></li>
                <li><a href="../result">Resultat</a></li>     
                <li><a href="../liste-paiement">Liste Paiement</a></li>         
                <li><a href="../login-user">Déconnexion</a></li>                
            </ul>
        </header>
        <div class="saisie_depenses">
            <div class="photo">
                <img src="../../assets/img/depenses.jpg" alt="">
            </div>
            <form id="form">              
                <div class="head">
                    <h1>Saisie des Depenses</h1>
                    <!-- <img src="../../img/Drinking tea-bro.png" alt="" style="width: 40%;"> -->
                </div>
                <div class="form-control">
                    <label for="nom">Date</label>
                    <input type="date" name="date" id="date" placeholder="date">
                </div>
                <div class="form-control">
                    <label>Choix categorie depense</label>
                    <select name="idCategorie" id="choix">
                        <option hidden>Choix categorie depense</option>
                        <option value="#">here</option>
                    </select>
                </div>
                <div class="form-control">
                    <label>Montant</label>
                    <input type="number" name="valeur" id="montant" placeholder="Montant" min="0">
                </div>

                <input type="submit" value="OK">
            </form>
        </div>

    </div>
</body>
</html>