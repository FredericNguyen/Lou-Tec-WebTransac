<?php
    session_start();
    require_once('modeleConnexion.php');
    function Ctr_connexion(){
        $courriel = $_POST['courrielco'];
        $mdp = $_POST['mdpco'];

        $msg = Mdl_connexion(courriel,$mdp);
        return msg;
    }

    function Ctr_Deconnexion(){
        unset($_SESSION);
        session_destroy(); //on detruit le fichier du session
        header('Location: ../../serveur/index.php');//on se redirige dans le page d'accueil
        exit();
    }

    $action = $_POST['action'];
    switch($action){
        case 'connexion' : echo Ctr_connexion();
                       break;
        case 'deconnexion': Ctr_Deconnexion();
    }
?>
<a href="../../index.php">Retour a la page d'accueil"</a>