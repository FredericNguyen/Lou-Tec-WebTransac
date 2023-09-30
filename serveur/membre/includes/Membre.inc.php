<?php
    class Membre{
        private $idm;
        private $nom;
        private $prenom;
        private $courriel;
        private $sexe;
        private $daten;

        public function __construct($idm, $nom, $prenom, $courriel, $sexe, $daten){
            $this->idm = $idm;
            $this->setNom($nom);
            $this->setPrenom($prenom);
            $this->setCourriel($courriel);
            $this->setSexe($sexe);
            $this->setDaten($daten);
        }
        public function setIdm($idm){
            $this->idm = idm;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }
        public function setPrenom($prenom){
            $this->prenom = $prenom;
        }
        public function setCourriel($courriel){
            $this->courriel = $courriel;
        }
        public function setSexe($sexe){
            $this->sexe = $sexe;
        }
        public function setDaten($daten){
            $this->daten = $daten;
        }
        public function getIdm(){
            return $this->idm;
        }
        public function getNom(){
            return $this->nom;
        }
        public function getPrenom(){
            return $this->prenom;
        }
        public function getCourriel(){
            return $this->courriel;
        }
        public function getSexe(){
            return $this->sexe;
        }
        public function getDaten(){
            return $this->daten;
        }
        public function afficher(){
            $resultat = $this->idm.'  '.$this->prenom.'  '.$this->courriel.'  ';
            $sexe = "";
            if($this->sexe === 'M'){
                $sexe = 'Masculin';
            }
            elseif ($sexe->sexe === 'F'){
                $sexe = 'Feminin';
            }
            else $sexe = 'Autres';
            $resultat .= $sexe.'  '. $daten;
            return resultat;
        }
    }
?>