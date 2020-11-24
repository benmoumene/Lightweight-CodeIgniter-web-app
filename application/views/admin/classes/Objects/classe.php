<?php 
	namespace classes\Objects;
	use classes\Objects\Inheritables\abstractObjectFactory;
	
	include_once('Inheritables\abstractObjectFactory.php');
	
	class classe extends abstractObjectFactory{
		private $_Highschool;
		public function __construct(array $f){
			parent::__construct($f['id'],$f['name']);
			$this->_Highschool = $f['highschool'];
		}
		
		public function getHighschool(){
			return $this->_Highschool;		
		}
		
		public function toString(){
			printf("Classe: %s <br/> Nom de la classe: %s <br/>Classe de lycée: %s <br/>",$this->_Id,$this->_Name,$this->_Highschool);			
		}
	}
	
?>