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
	
    function chargerPhotoProduit($nom_p){
        $photo = "avatar_membre.png";
        $dossierPhotos = __DIR__."/photos/";
        $objPhotoRecue = $_FILES['pochette'];
        if( $objPhotoRecue['tmp_name']!== ""){ // tester si une photo a été uplodée
            $nouveauNom = sha1($nom_p.time()); // Générateur d'un string unique comme nom du fichier uplodé
            // Nom original du fichier uplodé $objPhotoRecue -> name
            // strrchr : cherche le point (.) dans le nom du fichier à partir de la droit
            $extension = strrchr($objPhotoRecue['name'],".");  // Obtenir l'extension du fichier original
            $photo = $nouveauNom.$extension;
            @move_uploaded_file($objPhotoRecue['tmp_name'],$dossierPhotos.$photo);
        }
        return $photo;
    }

	function MdlF_Enregistrer(Produit $produit):string {
             
        $connexion =  Connexion::getConnexion();
        $photo = $this->chargerPhotoProduit($produit->getNom());
        $requette="INSERT INTO produits VALUES(0,?,?,?,?,?,current_timestamp(),?)";
        try{
            $donnees = [$produit->getNom(),$produit->getCategorie(),$produit->getDescription(),$produit->getPrix(), $produit->getQt_inventaire(), $photo];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);
            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "Produit bien enregistré";
        }catch (Exception $e){
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Problème pour enregistrer le produit";
        }finally {
          unset($connexion);
          return json_encode($this->reponse);
        }
    }

    function MdlF_Modifier(Produit $produit):string {
             
        $connexion =  Connexion::getConnexion();
        $photo = $this->chargerPhotoProduit($produit->getNom());
        if ($photo = "avatar_membre.png") {
            $photo = $_POST['anciennePochette'];
        }
        $requette="UPDATE produits SET nom = ?, categorie = ?, description = ?, prix = ?, qt_inventaire = ?, pochette = ? WHERE idP = ?";
        try{
            $donnees = [$produit->getNom(),$produit->getCategorie(),$produit->getDescription(),$produit->getPrix(), $produit->getQt_inventaire(), $photo, $produit->getIdP()];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);
            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "Produit bien enregistré";
        }catch (Exception $e){
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Problème pour modifier le produit";
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
            $this->reponse['msg'] = "Problème pour obtenir les données des produits".$e;
            //$reponse['msg'] = $e->getMessage();
        }finally {
          unset($connexion);
          return json_encode($this->reponse);
        }
    }

    function MdlF_listerParCateg(string $categorie):string {

        $connexion = Connexion::getConnexion();
        $requette="SELECT * FROM produits WHERE categorie = ?";
        try{
            $donnees = [$categorie];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);
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

    function MdlF_getCateg():string {

        $connexion = Connexion::getConnexion();
        $requette="SELECT nom FROM categories";
        try{
            $stmt = $connexion->prepare($requette);
            $stmt->execute();
            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "";
            $this->reponse['listeCategories'] = array();
            while($ligne = $stmt->fetch(PDO::FETCH_OBJ)){
                $this->reponse['listeCategories'][] = $ligne;
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

    function MdlF_chercher(string $mot_cle):string {

        $mot_cle = "%".$mot_cle."%";
        $connexion = Connexion::getConnexion();
        $requette="SELECT * FROM produits WHERE LOWER(nom) LIKE LOWER(?) OR LOWER(description) LIKE LOWER(?) ";
        try{
            $donnees = [$mot_cle, $mot_cle];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);
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

    function MdlF_Enlever(int $idP):string {
             
        $connexion =  Connexion::getConnexion();
        $requette="DELETE FROM produits WHERE idP = (?)";
        $donnees = [$idP];
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