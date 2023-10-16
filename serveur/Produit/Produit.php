<?php
declare (strict_types=1);

class Produit {
    private $idP;
    private $nom;
    private $categorie;
    private $description;
    private $prix, $qt_inventaire;
    private $pochette;

    function __construct(int $idP, string $nom, string $categorie, string $description, int $prix, int $qt_inventaire, string $pochette) {
        $this->setIdP($idP);
        $this->setNom($nom);
        $this->setCategorie($categorie);
        $this->setDescription($description);
        $this->setPrix($prix);
        $this->setQt_Inventaire($qt_inventaire);
        $this->setPochette($pochette);
    }

    function getIdP():int {
        return $this->idP;
    }
    function getNom():string {
        return $this->nom;
    }
    function getCategorie():string {
        return $this->categorie;
    }
    function getDescription():string {
        return $this->description;
    }
    function getPochette():string {
        return $this->pochette;
    }

    function setIdP(int $idP):void {
        if($idP > 0){
            $this->idP = $idP;
        }
    }
    function setNom(string $nom):void {
        $this->nom = $nom;
    }
    function setCategorie(string $categorie):void {
        $this->categorie = $categorie;
    }
    function setDescription(string $description):void {
        $this->description = $description;
    }
    function setPochette(string $pochette):void {
        $this->pochette = $pochette;
    }
    

    public function getQt_inventaire()
    {
        return $this->qt_inventaire;
    }
    public function setQt_inventaire($qt_inventaire)
    {
        $this->qt_inventaire = $qt_inventaire;

        return $this;
    }


    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }
}
?>