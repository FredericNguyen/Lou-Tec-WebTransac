<?php
    require_once('modeleConnexion.php');
    function Ctr_connexion(){
        $courriel = $_POST['courrielco'];
        $mdp = $_POST['mdpco'];

        $msg = Mdl_connexion(courriel,$_POST['mdpco']);
    }
    $msg = Ctr_connexion($courriel, $mdp);
    echo $msg;
?>
<br>
<a href="../../index.php">Retour a la page d'accueil"</a>