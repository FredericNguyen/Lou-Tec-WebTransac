<?php
    session_start();
    require_once('modeleConnexion.php');
    function Ctr_connexion(){
        $courriel = $_POST['courrielco'];
        $mdp = $_POST['mdpco'];
        Mdl_connexion($courriel,$mdp);
    }

    function Ctr_Deconnexion(){
        unset($_SESSION);
        session_destroy(); //on detruit le fichier du session
        header('Location: ../../index.php');//on se redirige dans le page d'accueil
        exit();
    }

    $action = $_POST['action'];
    switch($action){
        case 'connexion' : 
            Ctr_connexion(); //echo Ctr_connexion();
            break;
        case 'deconnexion': 
            Ctr_Deconnexion();
            break;
    }
?>
