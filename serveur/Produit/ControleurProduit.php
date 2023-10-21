<?php
       
    require_once("Produit.php");
    require_once("DaoProduit.php");

 class ControleurProduit { 
    static private $instanceCtr = null;
    
    private $reponse;

    private function __construct(){

    }

     // Retourne le singleton du modèle 
	static function  getControleurProduit():ControleurProduit{
		if(self::$instanceCtr == null){
			self::$instanceCtr = new ControleurProduit();  
		}
		return self::$instanceCtr;
	}

	function CtrF_Enregistrer(){
         $produit = new Produit(0, $_POST['nom'],$_POST['categorie'], $_POST['description'], $_POST['prix'], $_POST['qt_inventaire'],"Pochette");
         return DaoProduit::getDaoProduit()->MdlF_Enregistrer($produit); 
    }

    function CtrF_getAll(){
         return DaoProduit::getDaoProduit()->MdlF_getAll(); 
    }

    function CtrF_Enlever(){
        return DaoProduit::getDaoProduit()->MdlF_Enlever($_POST['idP']); 
   }

   function CtrF_listerParCateg(){
    return DaoProduit::getDaoProduit()->MdlF_listerParCateg($_POST['categorie']); 
    }

    function CtrF_getCateg(){
        return DaoProduit::getDaoProduit()->MdlF_getCateg(); 
        }
    function CtrP_Actions(){
        $action=$_POST['action'];
        switch($action){
            case "enregistrer" :
                return  $this->CtrF_Enregistrer();
            case 'supprimer' :
                return  $this->CtrF_Enlever();
            case "lister" :
                return $this->CtrF_getAll();
            case "listerParCateg":
                return $this->CtrF_listerParCateg();
            case "categories":
                return $this->CtrF_getCateg();
        }
        // Retour de la réponse au client
       
    }
}
?>