<?php
    function login($co, $mail, $mdp) {
        $query = "SELECT * FROM admin WHERE email = '$mail' AND mdp = SHA1('$mdp')";
        $result = mysqli_query($co, $query); 
        if ($row = mysqli_fetch_assoc($result)) {
            return $row['id'];
        } else {
            return null;
        }
    }

    function loginUser($co, $mail, $mdp) {
        $query = "SELECT * FROM user WHERE email = '$mail' AND mdp = SHA1('$mdp')";
        $result = mysqli_query($co, $query); 
        if ($row = mysqli_fetch_assoc($result)) {
            return $row['id'];
        } else {
            return null;
        }
    }

    #------ PARCELLE --------#

    function getAllParcelle($co) {
        $query = "SELECT * FROM parcelle";
        $result = mysqli_query($co, $query);  
        $array = array();
        while($row = mysqli_fetch_assoc($result)) {
            $array[] = $row; 
        }
        return $array;
    }    

    function getParcelleById( $co , $id ){
        $query = "SELECT * FROM parcelle WHERE id = '$id'";
        $result = mysqli_query($co, $query);         
        if ($row = mysqli_fetch_assoc($result)) {            
            return $row;
        }
    }

    function insertParcelle($co, $surface, $variete) {
        $query = "INSERT INTO parcelle (surface, variete) VALUES ('$surface', '$variete')";
        $result = mysqli_query($co, $query);
    }
    
    function updateParcelle($co, $id, $surface, $variete) {
        $query = "UPDATE parcelle SET surface = '$surface', variete = '$variete' WHERE id = '$id'";
        $result = mysqli_query($co, $query);        
    }
    
    function deleteParcelle($co, $id) {
        $query = "DELETE FROM parcelle WHERE id = '$id'";
        $result = mysqli_query($co, $query);
    }

    #------ VARIETE --------#
    function getAllVariety($co) {
        $query = "SELECT * FROM variete";
        $result = mysqli_query($co, $query);  
        $array = array();
        while($row = mysqli_fetch_assoc($result)) {
            $array[] = $row; 
        }
        return $array;
    }    

    function getVarietyById( $co , $id ){
        $query = "SELECT * FROM variete WHERE id = '$id'";
        $result = mysqli_query($co, $query);         
        if ($row = mysqli_fetch_assoc($result)) {            
            return $row;
        }
    }

    function insertVariety($co, $nom, $occupation , $rendement , $prix) {
        $query = "INSERT INTO variete (nom, occupation , rendement , prix) VALUES ('$nom', '$occupation', '$rendement')";
        $result = mysqli_query($co, $query);
    }
    
    function updateVariety($co, $id, $nom, $occupation , $rendement , $prix) {
        $query = "UPDATE variete SET nom = '$nom', occupation = '$occupation' , rendement = '$rendement' , prix = '$prix' WHERE id = '$id'";
        $result = mysqli_query($co, $query);
    }
    
    function deleteVariety($co, $id) {
        $query = "DELETE FROM variete WHERE id = '$id'";
        $result = mysqli_query($co, $query);
    }


    #------ CUEILLEUR --------#
    function getAllCueilleur($co) {
        $query = "SELECT * FROM cueilleur";
        $result = mysqli_query($co, $query);  
        $array = array();
        while($row = mysqli_fetch_assoc($result)) {
            $array[] = $row; 
        }
        return $array;
    }    

    function getCueilleurById( $co , $id ){
        $query = "SELECT * FROM cueilleur WHERE id = '$id'";
        $result = mysqli_query($co, $query);         
        if ($row = mysqli_fetch_assoc($result)) {            
            return $row;
        }
    }

    function insertCueilleur($co, $nom, $genre , $naissance , $salaire) {
        $query = "INSERT INTO cueilleur (nom, genre , naissance , salaire) VALUES ('$nom', '$genre', '$naissance , '$salaire')";
        $result = mysqli_query($co, $query);
    }
    
    function updateCueilleur($co, $id, $nom, $genre , $naissance , $salaire) {
        $query = "UPDATE cueilleur SET nom = '$nom', genre = '$genre' , naissance = '$naissance' WHERE id = '$id'";
        $result = mysqli_query($co, $query);
    }
    
    function deleteCueilleur($co, $id) {
        $query = "DELETE FROM cueilleur WHERE id = '$id'";
        $result = mysqli_query($co, $query);
    }
    
    #------ Depense --------#
    function getAllDepense($co) {
        $query = "SELECT * FROM depense";
        $result = mysqli_query($co, $query);  
        $array = array();
        while($row = mysqli_fetch_assoc($result)) {
            $array[] = $row; 
        }
        return $array;
    }    

    function insertCategorie($co, $desc) {
        $query = "INSERT INTO Categorie (description) VALUES ('$desc')";
        $result = mysqli_query($co, $query);
    }

    function updateDepense($co, $idDepense , $idCategorie , $valeur , $date) {        
        $query = "UPDATE depense SET idCategorie = '$idCategorie' , valeur = '$valeur' , date = '$date' WHERE idDepense = '$idDepense' ";
        $result = mysqli_query($co, $query);
    }

    function updateCategorie($co, $id , $desc) {        
        $query = "UPDATE categorie SET description = '$desc' WHERE id = '$id' ";
        $result = mysqli_query($co, $query);
    }

    function deleteCategorie($co, $id) {
        $query = "DELETE FROM Categorie WHERE id = '$id'";
        $result = mysqli_query($co, $query);
    }    

    function insertDepense($co, $idCategorie , $valeur , $date) {
        $query = "INSERT INTO depense (idCategorie, valeur , date) VALUES ('$idCategorie', '$valeur', '$date')";
        $result = mysqli_query($co, $query);
    }

    function deleteDepense($co, $id) {
        $query = "DELETE FROM depense WHERE idDepense = '$id'";
        $result = mysqli_query($co, $query);
    }    

    #------ Saisie Cueillete --------#    

    function insertCueillete($co, $idCueilleur , $idParcelle , $quantite , $date ){
        $query = "INSERT INTO cueillette (idCueilleur, idParcelle , quantite , date) VALUES ('$idCueilleur', '$idParcelle', '$quantite' , '$date')";
        $result = mysqli_query($co, $query);
    }

    #--------------------- 
    function getDepenseCategorie($co) {
        $query = "SELECT * FROM categorie";
        $result = mysqli_query($co, $query);  
        $array = array();
        while($row = mysqli_fetch_assoc($result)) {
            $array[] = $row; 
        }
        return $array;
    }    
    

    function totalCueillette($co , $dateDebut , $dateFin ){                
        $query = "SELECT SUM(quantite) as total_cueillette  FROM cueillette WHERE date BETWEEN '$dateDebut' AND '$dateFin' ;";
        $result = mysqli_query($co, $query);
        return mysqli_fetch_assoc($result)['total_cueillette'];    
    }    

    function quantiteRestante($co , $dateFin ){     
        $date_query = "SELECT CONCAT(CASE  WHEN mois < 0 THEN YEAR('$dateFin') - 1 ELSE YEAR('$dateFin') END, '-', label, '-01') AS result FROM v_mois_regeneration WHERE mois = (SELECT MAX(mois) FROM v_mois_regeneration WHERE MONTH('$dateFin') > mois)";
        
        $query = "SELECT vp.id_parcelle , (vp.kg_cueillette_par_mois - SUM(COALESCE(c.quantite, 0))) as reste  FROM v_pieds_par_parcelle as vp LEFT JOIN cueillette as c ON c.idParcelle = vp.id_parcelle  AND c.date BETWEEN ($date_query) AND '$dateFin' GROUP BY id_parcelle ";
        $result = mysqli_query($co, $query);
        $array = array();
        while($row = mysqli_fetch_assoc($result)) {
            $array[] = $row; 
        }
        return $array;
    }

    function sumDepense( $co , $dateDebut , $dateFin ){
        $query = " SELECT  SUM(valeur) as depense_total FROM depense WHERE date BETWEEN '$dateDebut' AND '$dateFin'  ";
        $result = mysqli_query($co, $query);     
        return mysqli_fetch_assoc($result)['depense_total'];    
    }

    #------------ PART 2 ------------------#
    function getPaiement($co , $dateDebut , $dateFin){
        $query = "SELECT
        v.nom,
        ct.date,
        ct.quantite,
        CASE
            WHEN ct.quantite < poid_min.valeur
            THEN malus.valeur*(ct.quantite - poid_min.valeur)
            ELSE bonus.valeur*(ct.quantite - poid_min.valeur)
        END as bonus,
        CASE
            WHEN ct.quantite < poid_min.valeur
            THEN v.salaire * (1 + (malus.valeur*(ct.quantite - poid_min.valeur)/100))
            ELSE v.salaire * (1 + (bonus.valeur*(ct.quantite - poid_min.valeur)/100))
        END as montant
    FROM
        cueillette as ct
    JOIN
        v_salaire_par_cueillette as v ON ct.idCueilleur = v.id_cueilleur
    JOIN
        configuration AS bonus ON bonus.description = 'bonus' JOIN configuration AS malus ON malus.description = 'malus' JOIN configuration AS poid_min ON poid_min.description = 'poids minimum' WHERE ct.date BETWEEN '$dateDebut' AND '$dateFin';";
        $result = mysqli_query($co, $query);     
        $array = array();
        while($row = mysqli_fetch_assoc($result)) {
            $array[] = $row; 
        }
        return $array;
    }

    function getMontantVente( $co , $dateDebut , $dateFin ){
        $query = " SELECT  SUM(valeur) as vente_total FROM v_vente_cueillette WHERE date BETWEEN '$dateDebut' AND '$dateFin'  ";
        $result = mysqli_query($co, $query);     
        return mysqli_fetch_assoc($result)['vente_total'];    
    }

    function getDepenseTotal( $co , $dateDebut , $dateFin){
        $paiements = getPaiement( $co , $dateDebut , $dateFin);
        $depense = (float)sumDepense( $co , $dateDebut , $dateFin);

        foreach($paiements as $paiement) {
            $depense += (float)$paiement['montant'];
        }

        return $depense;
    }

    function deleteRegeneration($co){
        $query = "delete from mois_regeneration"; 
        $result = mysqli_query($co, $query);     
    }

    function insertRegeneration( $co , $mois, $label ){
        $query = "insert into mois_regeneration values( $mois, '$label' )"; 
        $result = mysqli_query($co, $query);     
    }

    function insertConfiguration( $co , $desc , $valeur ){
        $query = "insert into configuration (description,valeur) values( '$desc', '$valeur' )"; 
        $result = mysqli_query($co, $query);     
    }

    function updateConfiguration( $co , $desc , $valeur ){
        $query = "update configuration set valeur = '$valeur' WHERE description = '$desc'"; 
        $result = mysqli_query($co, $query);     
    }

    function getRegeneration( $co ){
        $query = "select*from mois_regeneration "; 
        $result = mysqli_query($co, $query);     
        $array = array();
        while($row = mysqli_fetch_assoc($result)) {
            $array[] = $row; 
        }
        return $array;
    }

    function getPoidsMinimal( $co ){
        $query = "select*from configuration where description = 'poids minimum' "; 
        $result = mysqli_query($co, $query);     
        $array = array();
        while($row = mysqli_fetch_assoc($result)) {
            $array[] = $row; 
        }
        return $array;
    }

    function getBonus( $co ){
        $query = "select*from configuration where description = 'bonus' "; 
        $result = mysqli_query($co, $query);     
        $array = array();
        while($row = mysqli_fetch_assoc($result)) {
            $array[] = $row; 
        }
        return $array;
    }
    function getMalus( $co ){
        $query = "select*from configuration where description = 'malus' "; 
        $result = mysqli_query($co, $query);     
        $array = array();
        while($row = mysqli_fetch_assoc($result)) {
            $array[] = $row; 
        }
        return $array;
    }

    function getPrixVarieteByNom($co , $nom ){
        $query = "select prix from Variete where nom = '$nom' ";
        $result = mysqli_query($co, $query);     
        return mysqli_fetch_assoc($result)['prix'];
    }

    function getFinalData($co , $date) {        
        $quantiteRestante = quantiteRestante($co , $date );
        
        $query = "SELECT * FROM v_pieds_par_parcelle ";
        $result = mysqli_query($co, $query);
        
        
        $array = array();
    
        while ($row = mysqli_fetch_assoc($result)) {
            $tempArray = array();
    
            $tempArray['id'] = $row["id_parcelle"];
            $tempArray['nom'] = $row["nom_du_variete"];
            $tempArray['surface'] = $row["surface_metres_carres"];
            $tempArray['nombre_pieds'] = $row["nombre_de_pieds"];
            $tempArray['kg_par_mois'] = $row["kg_cueillette_par_mois"];
            for ($i=0; $i < count($quantiteRestante) ; $i++) { 
                if( $quantiteRestante[$i]['id_parcelle'] ==  $tempArray['id']  ){
                    $tempArray['reste'] = $quantiteRestante[$i]['reste'];
                }
            }    
            $tempArray['montant'] = getPrixVarieteByNom($co , $tempArray['nom']) * $tempArray['reste'];
            $array[] = $tempArray;
        }    
        return $array;
    }
    
    
?>