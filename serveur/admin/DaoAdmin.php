<?php
    declare(strict_types= 1);
    require_once(__DIR__."/../bd/Connexion.php");
    class DaoAdmin{
        private static $modeleAdmin =null; 
        private $reponse = array();
        private $connexion = null;
        private function __construct() {
        }
        public static function getDaoAdmin() : DaoAdmin{
            if (self::$modeleAdmin === null) {
                self::$modeleAdmin = new DaoAdmin();
            }
            return self::$modeleAdmin;
        }
        function MdlAdmin_listerMembre():string{
            $connexion = Connexion::getConnexion();
            $requete = "SELECT * FROM membres";
            $requete2 = "SELECT idm, role, statut FROM connexion";
            $this->reponse['action'] = "lister_membres";
            try{ 
                $stmt = $connexion->prepare($requete);
                $stmt->execute();
                $this->reponse['listeMembres']= []; 
                while($ligne= $stmt->fetch(PDO::FETCH_OBJ)){
                    $this->reponse['listeMembres'][]= $ligne;
                    
                }
                $this->reponse['infoEtatMembres'] = []; 
                $stmt2 = $connexion->prepare($requete2);
                $stmt2->execute();
                while($ligne= $stmt2->fetch(PDO::FETCH_OBJ)){
                    $this->reponse['infoEtatMembres'][]= $ligne;
                }   
                $this->reponse['msg'] = "Transaction reussie"; 
            }catch(Exception $e) {
                $msg = 'Erreur: '.$e->getMessage();
                $this->reponse['msg'] = $msg;
            }finally{
                unset($connexion);
                return json_encode($this->reponse);
            }
        }
        function MdlAdmin_activerDesactiverMembre(int $idm) :string{
            try{
                $etat = $_POST['statut']; 
                $this->reponse["action"] = $etat == 'A' ? "activer": "desactiver";
                $connexion = Connexion::getConnexion();
                $requete1 ="SELECT * FROM connexion WHERE idm = ?";
                $stmt = $connexion->prepare($requete1);
                $stmt->execute([$idm]);
                if($stmt->rowCount() == 0){
                    $this->reponse["msg"] = "Membre inexistant";
                }
                else{       
                    $requete = "UPDATE connexion SET statut=? WHERE idm = ?";
                    $stmt = $connexion->prepare($requete);
                    $stmt->execute([$etat,$idm ]);
                    $this->reponse['msg'] = $etat == 'A' ? "Activation reussie": "Desactivation reussie";
                }       
            }catch(Exception $e) {
                $msg = 'Erreur : '.$e->getMessage();
                $this->reponse['msg'] = $msg;
            }finally{
                unset($connexion);
                return json_encode($this->reponse);
            }
        }
    }
?>
