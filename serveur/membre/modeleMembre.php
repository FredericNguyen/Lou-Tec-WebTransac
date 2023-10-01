<?php
    require_once("../bd/connexion.inc.php");
    function Mdl_ajouter($membre, $mdp){
        global $connexion;
        $msg = "";
        try{
            $nom = $membre->getNom();
            $prenom = $membre->getprenom();
            $courriel = $membre->getCourriel();
            $sexe = $membre->getSexe();
            $daten = $membre->getDaten();
            //On va voir si le courriel existe deja dans la table menbres
            $requete = "SELECT * FROM membres WHERE courriel = ?";
            $stmt = $connexion->prepare($requete);
            $stmt->bind_param("s",$courriel);
            $stmt->execute();
            $reponse = $stmt->get_result();
            
            if($reponse->num_rows == 0){
               // $requete1 = "INSERT INTO membres VALUES (0,?,?,?,?,?)";
                $requete = "INSERT INTO membres (idm, nom, prenom, courriel, sexe, datenaissance) VALUES (0,?,?,?,?,?)";
                $stmt = $connexion->prepare($requete);
                $stmt->bind_param("sssss",$nom,$prenom,$courriel,$sexe,$daten);
                $stmt->execute();

                $idm = $connexion->insert_id; //apres une insertion
                $requete = "INSERT INTO connexion VALUES (?,?,'M','A',?)";
                $stmt = $connexion->prepare($requete);
                $stmt->bind_param("ssi",$courriel,$mdp,$idm);
                $stmt->execute();
                $msg="Membre ".$membre->getPrenom().", ".$membre->getNom()." bien enregistré.";
            } else { // Courriel existe déjà
                $msg = "Ce courriel est déja en cours d'utilisation !!!";
            }
        }catch(Exception $e) {
            $msg = 'Erreur : '.$e->getMessage();
        }finally{
            header("Location: ../../index.php?msg=$msg");
            exit();
        }
    }
?>