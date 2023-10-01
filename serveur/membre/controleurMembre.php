<?php
    require_once('includes/Membre.inc.php');
    require_once('modeleMembre.php');
    function securisation($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = strip_tags($donnees);
        return $donnees;
    }
    function Ctr_ajouter(){
        $nom = securisation($_POST['nom']);
        $prenom = securisation($_POST['prenom']);
        $courriel = securisation($_POST['courriel']);
        $daten = securisation($_POST['daten']);
        $sexe = securisation($_POST['sexe']);

        $membre = new Membre(0, $nom, $prenom, $courriel, $sexe, $daten);
        $msg = Mdl_ajouter($membre,$_POST['mdp']);
        return $msg;
    }
    Ctr_ajouter();
?>