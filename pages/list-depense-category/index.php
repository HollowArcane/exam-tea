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
    <title>Liste des Categories</title>
    <link rel="stylesheet" href="../../assets/css/liste_categories.css">

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
                <li><a href="../edit-parcelle">Parcelle</a></li>
                <li><a href="../edit-variete">Variete</a></li>
                <li><a href="../edit-cueilleur">Cueilleurs</a></li>
                <li><a href="../edit-depense-category" class="active">Categories</a></li>
                <li><a href="../edit-configuration">Configuration</a></li>
                <li><a href="../login-admin">Déconnexion</a></li>
            </ul>
        </header>

        <div class="listes">
            <h1>Listes Varietes</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="liste"></tbody>
            </table>

            <a href="../edit-depense-category"><< Retour vers formulaire CATEGORIES</a>
        </div>
        <?php include "../footer.html"; ?>
    </div>
</body>
</html>