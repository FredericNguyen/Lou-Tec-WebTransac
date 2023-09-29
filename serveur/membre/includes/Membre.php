<?php
    class Membre{
        private $idm;
        private $nom;
        private $prenom;
        private $courriel;
        private $sexe;
        private $daten;

        function __construct($idm, $nom, $prenom, $courriel, $sexe, $daten){
            $this->idm = idm;
            $this->setNom($nom);
            $this->setPrenom($prenom);
            $this->setCourriel($courriel);
            $this->setSexe($sexe);
            $this->setDaten($daten);
        }
        function setIdm($idm){
            $this->idm = idm;
        }
        function setNom($nom){
            $this->nom = $nom;
        }
        function setPrenom($prenom){
            $this->prenom = $prenom;
        }
        function setCourriel($courriel){
            $this->courriel = $courriel;
        }
        function setSexe($sexe){
            $this->sexe = $sexe;
        }
        function setDaten($daten){
            $this->daten = $daten;
        }
        function getIdm(){
            return $this->idm;
        }
        function getNom(){
            return $this->nom;
        }
        function getPrenom(){
            return $this->prenom;
        }
        function getCourriel(){
            return $this->courriel;
        }
        function getSexe(){
            return $this->sexe;
        }
        function getDaten(){
            return $this->daten;
        }
        function afficher(){
            $resultat = $this->idm.'  '.$this->prenom.'  '.$this->courriel.'  ';
            $sexe = "";
            if($this->sexe === 'M'){
                $sexe = 'Masculin';
            }
            elseif ($sexe->sexe === 'F'){
                $sexe = 'Feminin';
            }
            else $sexe = 'Autre';
            $resultat .= $sexe.'  '. $daten;
            return resultat;
        }
    }
?>