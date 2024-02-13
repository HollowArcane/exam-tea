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
    <title>Result</title>
    <link rel="stylesheet" href="../../assets/css/listes_paiements.css">

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
                <li><a href="../edit-cueillette">Saisie de cueillettes</a></li>
                <li><a href="../edit-depense">Saisie des depenses</a></li>
                <li><a href="../result">Resultat</a></li>   
                <li><a href="../liste-paiement" class="active">Liste Paiement</a></li>         
                <li><a href="../prediction">Prevision</a></li>      
                <li><a href="../login-user">Déconnexion</a></li>   
            </ul>
        </header>
        <div class="resultat">
            <form id="form">                            
                <div class="form-control">
                    <label for="date_debut">Date debut</label>
                    <input type="date" name="date_debut" id="date_debut" placeholder="Date Debut">
                </div>
                <div class="form-control">
                    <label for="date_fin">Date fin</label>
                    <input type="date" name="date_fin" id="date_fin" placeholder="Date Fin">
                </div>
                
                <input type="submit" value="OK">
            </form>
            <div class="tableau">
            <table border="1" style="color: #fff;">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Nom cueilleur</th>
                        <th>Poids</th>
                        <th>%Bonus(+) / %Mallus(-)</th>
                        <th>Montant Paiement</th>
                    </tr>
                </thead>
                <tbody id="list"></tbody>
            
            </table>
        </div>
        </div>
        <?php include "../footer.html"; ?>
    </div>
    
</body>
</html>