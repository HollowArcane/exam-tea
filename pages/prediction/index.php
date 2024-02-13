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
    <title>Prevision</title>
    <link rel="stylesheet" href="../../assets/css/prevision.css">

    <script type="text/javascript" src="../../assets/js/function-DOM.js"></script>
    <script type="text/javascript" src="../../assets/js/function-XHR.js"></script>
    <script type="text/javascript" src="../../assets/js/function.js"></script>
    <script type="text/javascript" src="script.js" defer></script>
</head>
<body>
    
    <div class="container">      
        <header>
            <img src="../../assets/img/The-Star-Online.png" alt="">
            <ul>
                <li><a href="../edit-cueillette">Saisie de cueillettes</a></li>
                <li><a href="../edit-depense">Saisie des depenses</a></li>
                <li><a href="../result">Resultat</a></li>   
                <li><a href="../liste-paiement">Liste Paiement</a></li>         
                <li><a href="../prediction" class="active">Prevision</a></li>      
                <li><a href="../login-user">Déconnexion</a></li>   
            </ul>
        </header>
        <div class="prevision">
            
            <div class="formulaire">
                <form id="form">              
                    <div class="head">
                        <h1>Prevision</h1>
                        <!-- <img src="../../img/Drinking tea-bro.png" alt="" style="width: 40%;"> -->
                    </div>
                    <div class="form-control">
                        <label for="nom">Entrer une date</label>
                        <input type="date" name="date" id="date" placeholder="date">
                    </div>
                    
                    <input type="submit" value="Valider">
                </form>

                <div class="aff_restant">
                    <b>Poids total the restant : <span id="poids-total"></span></b>
                    <b>Montant : <span id="montant-total"></span></b>
                </div>
            </div>

            <!-- afficher -->
            <div id="crop-wrap" class="afficher"> </div>
            <!-- afficher -->
            
        </div>
        <?php include "../footer.html"; ?>
    </div>
</body>
</html>