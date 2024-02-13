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
    <link rel="stylesheet" href="../../assets/css/resultat.css">

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
                <li><a href="../edit-depense">Saisie des depenses</a></li>
                <li><a href="../result">Resultat</a></li>   
                <li><a href="../liste-paiement" class="active">Liste Paiement</a></li>         
                <li><a href="../login-user">Déconnexion</a></li>       
            </ul>
        </header>
        <div class="resultat">
            <div class="photo">
                <img src="../../assets/img/diffe_rents-types-de.jpg" alt="">
            </div>
            <form id="form">              
                <div class="head">
                    <h1></h1>
                    <!-- <img src="../../img/Drinking tea-bro.png" alt="" style="width: 40%;"> -->
                </div>
                <div class="form-control">
                    <label for="nom">Date debut</label>
                    <input type="date" name="date_debut" id="date_debut" placeholder="Date Debut">
                </div>
                <div class="form-control">
                    <label for="nom">Date fin</label>
                    <input type="date" name="date_fin" id="date_fin" placeholder="Date Fin">
                </div>
                
                <input type="submit" value="OK">
            </form>
        </div>
        <div class="tableau" st>
            <table border="1" style="color: #fff;">
                <thead>
                    <tr>
                        <th>ID Parcelle</th>
                        <th>Quantité restant</th>
                    </tr>
                </thead>    
                <tbody id="table-body"></tbody>
            </table>
        </div>
    </div>
    
</body>
</html>