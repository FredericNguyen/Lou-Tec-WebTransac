<?php
    // Au début de PHP: Déclarer les types dans les paramétres des fonctions
    declare (strict_types=1);
    require_once(__DIR__."/serveur/Produit/ControleurProduit.php");
    require_once(__DIR__."/serveur/Membre/ControleurMembre.php");

    function CtrP_Produit(){

        $instanceCtr = ControleurProduit::getControleurProduit();
        echo $instanceCtr->CtrP_Actions();
    }

    function CtrM_Membre(){

        $instanceCtr = ControleurProduit::getControleurProduit();
        echo $instanceCtr->CtrP_Actions();
    }

    function CtrR_Actions_Routes(){
        $action=$_POST['type_req'];
        switch($action){
            case 'produit' :
                return  CtrP_Produit();
            case 'membre' :
                return  CtrM_Membre();
        }
        // Retour de la réponse au client
       
    }

    echo CtrR_Actions_Routes();
?>