<?php
    require_once("../bd/connexion.inc.php");
    function Mdl_ajouter($membre){
        global $connexion;
        $msg = "";
        try{
            $nom = $membre->getNom();
            $prenom = $membre->getprenom();
            $courriel = $membre->getCourriel();
            $sexe = $membre->getSexe();
            $daten = $membre->getDaten();
            $requete = "INSERT INTO membres VALUES (0,?,?,?,?,?)";
            $stmt = $connexion->prepare(requete);
            $stmt->bind_param("sssss",0,$nom,$prenom,$courriel,$sexe,$daten);
            $stmt->execute();
            $msg = 'Membre bien enregistre';
        }catch(Exception $e){
            $msg = 'Probleme dans la connexion a la base de donnee: '.$e;
        }finally{
            return msg;
        }
    }
?>