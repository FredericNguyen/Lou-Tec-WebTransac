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
         $produit = new Produit($_POST['code'],$_POST['depart'], $_POST['destination'], $_POST['transporteur'],"Pochette");
         return DaoProduit::getDaoProduit()->MdlF_Enregistrer($produit); 
    }

    function CtrF_getAll(){
         return DaoProduit::getDaoProduit()->MdlF_getAll(); 
    }

    function CtrF_Enlever(){
        $produit = new Produit($_POST['code'],"", "", "","Pochette");
        return DaoProduit::getDaoProduit()->MdlF_Enlever($produit); 
   }

   function CtrF_getMtlTrans(){
    return DaoProduit::getDaoProduit()->MdlF_getMtlTrans(); 
    }
    function CtrF_Actions(){
        $action=$_POST['action'];
        switch($action){
            case "enregistrer" :
                return  $this->CtrF_Enregistrer();
            case 'supprimer' :
                return  $this->CtrF_Enlever();
            case "lister" :
                return $this->CtrF_getAll();
            case "listerMtlTrans":
                return $this->CtrF_getMtlTrans();
        }
        // Retour de la réponse au client
       
    }
}
?>