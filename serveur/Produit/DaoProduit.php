<?php
// Au début de PHP: Déclarer les types dans les paramétres des fonctions
declare (strict_types=1);

require_once(__DIR__."/../bd/Connexion.php");
require_once("Produit.php");

class DaoProduit {
    static private $modelProduit = null;
    
    private $reponse=array();
	private $connexion = null;
    private function __construct(){
        
    }
    
// Retourne le singleton du modèle 
	static function  getDaoProduit():DaoProduit {
		if(self::$modelProduit == null){
			self::$modelProduit = new DaoProduit();  
		}
		return self::$modelProduit;
	}
	
	function MdlF_Enregistrer(Produit $produit):string {
             
        $connexion =  Connexion::getConnexion();
        
        $requette="INSERT INTO produits VALUES(?,?,?,?)";
        try{
            $donnees = [$produit->getCode(),$produit->getDepart(),$produit->getDestination(),$produit->getTransporteur()];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);
            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "Produit bien enregistre";
        }catch (Exception $e){
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Probléme pour enregistrer le produit";
        }finally {
          unset($connexion);
          return json_encode($this->reponse);
        }
    }
	
    function MdlF_getAll():string {

        $connexion = Connexion::getConnexion();
        $requette="SELECT * FROM produits";
        try{
            $stmt = $connexion->prepare($requette);
            $stmt->execute();
            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "";
            $this->reponse['listeProduits'] = array();
            while($ligne = $stmt->fetch(PDO::FETCH_OBJ)){
                $this->reponse['listeProduits'][] = $ligne;
            }
        }catch (Exception $e){ 
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Problème pour obtenir les données des produits";
            //$reponse['msg'] = $e->getMessage();
        }finally {
          unset($connexion);
          return json_encode($this->reponse);
        }
    }

    function MdlF_getMtlTrans():string {

        $connexion = Connexion::getConnexion();
        $requette="SELECT transporteur FROM produits WHERE depart = 'Montréal'";
        try{
            $stmt = $connexion->prepare($requette);
            $stmt->execute();
            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "";
            $this->reponse['listeProduits'] = array();
            while($ligne = $stmt->fetch(PDO::FETCH_OBJ)){
                $this->reponse['listeProduits'][] = $ligne;
            }
        }catch (Exception $e){ 
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Problème pour obtenir les données des produits".$e;
            //$reponse['msg'] = $e->getMessage();
        }finally {
          unset($connexion);
          return json_encode($this->reponse);
        }
    }

    function MdlF_Enlever(Produit $produit):string {
             
        $connexion =  Connexion::getConnexion();
        $requette="DELETE FROM Produits WHERE code = (?)";
        $donnees = [$produit->getCode()];
        try{
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);
            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "Produit bien enlever";
        }catch (Exception $e){
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Probléme pour enlever le produit";
        }finally {
          unset($connexion);
          return json_encode($this->reponse);
        }
    }
}
?>