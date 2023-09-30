<?php
    require_once("../bd/connexion.inc.php");
    function Mdl_connexion($courriel, $mdp){
        global $connexion;
        $msg = "";
        try{
            $requete = "SELECT * FROM connexion WHERE courriel = ? AND password =?";
            $stmt = $connexion->prepare(requete);
            $stmt->bind_param("ss",$courriel,$mdp);
            $stmt->execute();
            $reponse = $stmt->get_result();
            if($reponse->num_rows !== 0){
                $ligne = $reponse->fetch_object();
                if($ligne->statut === 'A' ){
                    if($ligne->role === 'M'){
                        header('Location: ../membre/membre.php'); //on se dirige vers la page membre.
                        exit();
                    }
                    else{
                        header('Location: ../admin/admin.php'); //on se dirige vers la page membre.
                        exit();
                    }
                }else{
                    $msg = '<b>SVP contactez administrateur</b>';
                }
            }
        }catch(Exception $e){
            $msg = 'Erreur: '.$e.getMessage().'<br>';
        }finally{
            return msg; 
        }
    }
?>