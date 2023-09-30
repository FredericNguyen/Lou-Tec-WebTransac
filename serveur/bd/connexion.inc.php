<?php
    require_once("../env/env.inc.php");
    //on fait la connexion a travers mysqli
    $connexion = new mysqli(SERVEUR, USAGER, MDP, BD);
    if($connexion -> connect_errno){
        echo 'Probleme de connexion avec la base de donnee';
        exit(); //on sort du programme par probleme de connexion a la base de donnee
    }
?>