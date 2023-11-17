<?php
    require_once("DaoAdmin.php");
    class ControleurAdmin{
        private static $instanceCtr = null;
        
        private function __construct() {
    	}
        public static function getControleurAdmin(){
            if (self::$instanceCtr == null) {
                self::$instanceCtr = new ControleurAdmin();
            }
            return self::$instanceCtr;
        }
        function CtrAdmin_listerMembres(){
            return DaoAdmin::getDaoAdmin()->MdlAdmin_listerMembre();
        }
        function CtrAdmin_activerDesactiverMembre(){
			$idm = $_POST['idm'];
            return DaoAdmin::getDaoAdmin()->MdlAdmin_activerDesactiverMembre($idm);
        }
        function CtrAdmin_actions(){
            $action = $_POST['action'];
            switch ($action) {
                case 'lister_Membres':
                    return $this->CtrAdmin_listerMembres();
                case'activer_desactiver':
                    return $this->CtrAdmin_activerDesactiverMembre();
       		 }
		}
	}
?>