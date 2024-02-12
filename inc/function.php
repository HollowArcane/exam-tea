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

    function insertVariety($co, $nom, $occupation , $rendement) {
        $query = "INSERT INTO variete (nom, occupation , rendement) VALUES ('$nom', '$occupation', '$rendement')";
        $result = mysqli_query($co, $query);
    }
    
    function updateVariety($co, $id, $nom, $occupation , $rendement) {
        $query = "UPDATE variete SET nom = '$nom', occupation = '$occupation' , rendement = '$rendement' WHERE id = '$id'";
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

    function insertDepense($co, $desc , $valeur) {
        $query = "INSERT INTO depense (nom, description , valeur) VALUES ('$nom', '$desc', '$valeur')";
        $result = mysqli_query($co, $query);
    }

    function deleteDepense($co, $id) {
        $query = "DELETE FROM depense WHERE id = '$id'";
        $result = mysqli_query($co, $query);
    }

    
?>
