<?php
    require_once("../bd/connexion.inc.php");
    function Mdl_connexion($courriel, $mdp){
        global $connexion;
        $msg = "";
        try{
            //on test l'existance du membre dans la table connexion
            $requete = "SELECT * FROM connexion WHERE courriel = ? AND password =?";
            $stmt = $connexion->prepare($requete);
            $stmt->bind_param("ss",$courriel,$mdp);
            $stmt->execute();
            $reponse = $stmt->get_result();
            if($reponse->num_rows > 0){
                $ligne = $reponse->fetch_object();
                if($ligne->statut === 'A' ){
                    $requete = "SELECT * FROM membres WHERE courriel = ?";
                    $stmt = $connexion->prepare($requete);
                    $stmt->bind_param("s",$courriel);
                    $stmt->execute();
                    $reponse = $stmt->get_result();
                    $ligne2 = $reponse->fetch_object();
                    if($ligne->role === 'M'){
                        //creation des variables de session
                        $_SESSION['role'] = 'M';
                        $_SESSION['prenom'] =  $ligne2->prenom;
                        $_SESSION['nom'] =  $ligne2->nom;
                        header('Location: ../membre/membre.php'); //on se dirige vers la page membre.
                        exit();
                    }
                    else{
                        //creation des variables de session
                        $_SESSION['role'] = 'A';
                        $_SESSION['prenom'] =  $ligne2->prenom;
                        $_SESSION['nom'] =  $ligne2->nom;
                        header('Location: ../admin/admin.php'); //on se dirige vers la page membre.
                        exit();
                    }
                }else{
                    $msg = '<b>SVP contactez administrateur</b>';
                }
            }
        }catch(Exception $e){
            $msg = 'Erreur: '.$e->getMessage().'<br>';
        }finally{
            return msg; 
        }
    }
?>