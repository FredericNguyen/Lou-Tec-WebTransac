<?php
    class Produit{
        private $titre;
        private $prix;
        private $img;

        public function __construct($titre, $prix, $img){
            $this->setTitre($titre);
            $this->setPrix($prix);
            $this->setImg($img);
        }

        public function getTitre() { return $this->titre ;}
        public function getPrix() { return $this->prix ;}
        public function getImg()  {return $this->img;}

        public function setTitre($titre) {
            $this->titre = $titre;
        }
        public function setPrix($prix) {
            $this->prix = $prix;
        }
        public function setImg($img) {
            $this->img = $img;
        }
    }
?>