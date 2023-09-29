<?php
    require_once('includes/Membre.php');
    require_once('modeleMembre.php');
    function Ctr_ajouter(){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $courriel = $_POST['courriel'];
        $daten = $_POST['date'];
        $sexe = $_POST['sexe'];

        $membre = new Membre($idm, $nom, $prenom, $courriel, $sexe, $daten);
        $msg = Mdl_ajouter($membre);
    }
    $message = Ctr_ajouter();
    echo $msg;
?>