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
    <title>Saisie des cueillettes</title>
    <link rel="stylesheet" href="../../assets/css/saisie_cueillette.css">

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
                <li><a href="../edit-cueillette" class="active">Saisie de cueillettes</a></li>
                <li><a href="../edit-depense">Saisie des depenses</a></li>
                <li><a href="../result">Resultat</a></li>   
                <li><a href="../liste-paiement">Liste Paiement</a></li>         
                <li><a href="../prediction">Prevision</a></li>      
                <li><a href="../login-user">Déconnexion</a></li>   
            </ul>
        </header>
        <div class="saisie_cueillette">
            <div class="photo">
                <img src="../../assets/img/c.jpg" alt="">
            </div>
            <form id="form">              
                <div class="head">
                    <h1>Saisie des Cueillettes</h1>
                    <!-- <img src="../../img/Drinking tea-bro.png" alt="" style="width: 40%;"> -->
                </div>
                <div class="form-control">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" placeholder="date">
                </div>
                <div class="form-control">
                    <label>Choix cueilleur</label>
                    <select id="cueilleur" name="idCueilleur" id="choix">
                        <option value="#" hidden>Choix cueilleur</option>
                        <option value="#">here</option>
                    </select>
                </div>
                <div class="form-control">
                    <label>Choix de parcelles</label>
                    <select id="parcelle" name="idParcelle" id="choix">
                        <option value="#" hidden>Choix Parcelles</option>
                        <option value="#">here</option>
                    </select>
                </div>
                <div class="form-control">
                    <label>Poids Cueilli</label>
                    <input type="number" name="quantite" id="poids" placeholder="Poids Cueilli" min="3">
                </div>

                <input type="submit" value="OK">
            </form>
            
        </div>
        <?php include "../footer.html"; ?>
    </div>
</body>
</html>