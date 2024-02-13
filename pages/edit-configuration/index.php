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
    <title>Configuration</title>
    <link rel="stylesheet" href="../../assets/css/configuration.css">

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
                <li><a href="../edit-cueilleur">Cueilleurs</a></li>
                <li><a href="../edit-depense-category">Categories</a></li>
                <li><a href="../edit-configuration" class="active">Configuration</a></li>
                <li><a href="../login-admin">Déconnexion</a></li>
            </ul>
        </header>
       
        <div class="configuration">
            <!-- configuration mois -->
            <div class="conf_mois">
                <h2>Configuration des mois ou le the peut se regenerer</h2> 
                <form id="form">
                   
                    <!-- <select name="the" id="the">
                        <option hidden>Choisir the</option>
                        <option value="">Variete de the<thead></thead></option>
                    </select> -->

                    <div class="check-month">
                        <div class="month-control">
                            <label>Janvier</label>
                            <input type="checkbox" name="janvier" id="janvier">
                        </div>
                        <div class="month-control">
                            <label>Fevrier</label>
                            <input type="checkbox" name="fevrier" id="fevrier">
                        </div>
                        <div class="month-control">
                            <label>Mars</label>
                            <input type="checkbox" name="mars" id="mars">                    </div>
                        <div class="month-control">
                            <label>Avril</label>
                            <input type="checkbox" name="avril" id="avril">
                        </div>
                        <div class="month-control">
                            <label>Mai</label>
                            <input type="checkbox" name="mai" id="mai">
                        </div>
                        <div class="month-control">
                            <label>Juin</label>
                            <input type="checkbox" name="juin" id="juin">
                        </div>
                        <div class="month-control">
                            <label>Juillet</label>
                            <input type="checkbox" name="juillet" id="juillet">
                        </div>
                        <div class="month-control">
                            <label>Aout</label>
                            <input type="checkbox" name="aout" id="aout">
                        </div>
                        <div class="month-control">
                            <label>Septembre</label>
                            <input type="checkbox" name="septembre" id="septembre">
                        </div>
                        <div class="month-control">
                            <label>Octobre</label>
                            <input type="checkbox" name="octobre" id="octobre">
                        </div>
                        <div class="month-control">
                            <label>Novembre</label>
                            <input type="checkbox" name="novembre" id="novembre">
                        </div>
                        <div class="month-control">
                            <label>Decembre</label>
                            <input type="checkbox" name="decembre" id="decembre">
                        </div>
                    </div>
                    <input type="submit" value="Sauvegarder">
                </form> 
            </div>
            <!-- fin configuration mois -->

            <!-- Configuration poids minimal journalier pour un cueilleur -->
            <div class="conf_poids_minimal">
                <h2>Configuration poids minimal Journalier pour un cueilleur</h2>
                <form id="min-poids-form">
                    <label>Poids minimal</label>
                    <input id="min-poids-input" name="value" type="number" placeholder="Entrer poids minimal">
                    <input type="submit" value="Valider">
                </form>
            </div>
            <!-- fin Configuration poids minimal journalier pour un cueilleur-->

            <!-- configuration bonus -->
            <div class="conf_bonus">
                <h2>Bonus pour les poids superieur au poids minimum</h2>
                <form id="bonus-form">
                    <label>Bonus</label>    
                    <input id="bonus-input" name="value" type="number" placeholder="Entrer Bonus">
                    <input type="submit" value="Valider">
                </form>
            </div>
            <!-- fin bonus -->

            <!-- configuration mallus -->
            <div class="conf_mallus">
                <h2>Mallus pour les poids inferieur au poids minimum</h2>
                <form id="malus-form">
                    <label>Mallus</label>    
                    <input id="malus-input" name="value" type="number" placeholder="Entrer Mallus">
                    <input type="submit" value="Valider">
                </form>
            </div>
            <!-- fin prix de vente -->
        </div>
        <?php include "../footer.html"; ?>
    </div>
</body>
</html>